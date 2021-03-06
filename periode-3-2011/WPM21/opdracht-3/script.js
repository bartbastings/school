// JavaScript Document

var slideShowSpeed = 5000
var crossFadeDuration = 3
var Pic = new Array()
Pic[0] = 'groenlinks1.jpg'
Pic[1] = 'groenlinks2.jpg'
Pic[2] = 'groenlinks3.jpg'
var t
var j = 0
var p = Pic.length
var preLoad = new Array()
for (i = 0; i < p; i++) {
	preLoad[i] = new Image()
	preLoad[i].src = Pic[i]
}

function runSlideShow () {
	if (document.all) {
		document.images.SlideShow.style.filter="blendTrans(duration=2)"
		document.images.SlideShow.style.filter="blendTrans(duration=crossFadeDuration)"
		document.images.SlideShow.filters.blendTrans.Apply()
	}
	document.images.SlideShow.src = preLoad[j].src
	if (document.all) {
		document.images.SlideShow.filters.blendTrans.Play()
	}
	j = j + 1
	if (j > (p-1)) j=0
	t = setTimeout('runSlideShow()', slideShowSpeed)
}

if (typeof renderTwitters != 'function') (function () {
	
	var browser = (function() {
		var b = navigator.userAgent.toLowerCase();
		return {
			webkit: /(webkit|khtml)/.test(b),
			opera: /opera/.test(b),
			msie: /msie/.test(b) && !(/opera/).test(b),
			mozilla: /mozilla/.test(b) && !(/(compatible|webkit)/).test(b)
		};
	})();
	
	var guid = 0;
	var readyList = [];
	var isReady = false;
	var monthDict = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
	
	window.ify = function() {
		var entities = {
			'"' : '&quot;',
			'&' : '&amp;',
			'<' : '&lt;',
			'>' : '&gt;'
		};
		return {
			"link": function(t) {
				return t.replace(/[a-z]+:\/\/[a-z0-9-_]+\.[a-z0-9-_:~%&\?\/.=]+[^:\.,\)\s*$]/ig, function(m) {
					return '<a href="' + m + '">' + ((m.length > 25) ? m.substr(0, 24) + '...' : m) + '</a>';
				});
			},
			"at": function(t) {
				return t.replace(/(^|[^\w]+)\@([a-zA-Z0-9_]{1,15})/g, function(m, m1, m2) {
					return m1 + '@<a href="http://twitter.com/' + m2 + '">' + m2 + '</a>';
				});
			},
			"hash": function(t) {
				return t.replace(/(^|[^\w'"]+)\#([a-zA-Z0-9_]+)/g, function(m, m1, m2) {
					return m1 + '#<a href="http://search.twitter.com/search?q=%23' + m2 + '">' + m2 + '</a>';
				});
			},
			"clean": function(tweet) {
				return this.hash(this.at(this.link(tweet)));
			}
		};
	}();
	
	window.renderTwitters = function (obj, options) {
		function node(e) {
			return document.createElement(e);
		}
		function text(t) {
			return document.createTextNode(t);
		}
		
		var target = document.getElementById(options.twitterTarget);
		var data = null;
		var ul = node('ul'), li, statusSpan, timeSpan, i, max = obj.length > options.count ? options.count : obj.length;
		
		for (i = 0; i < max && obj[i]; i++) {
			data = getTwitterData(obj[i]);
			
			if (options.ignoreReplies && obj[i].text.substr(0, 1) == '@') {
				max++;
				continue; // skip
			}
			
			li = node('li');
			
			if (options.template) {
				li.innerHTML = options.template.replace(/%([a-z_\-\.]*)%/ig, function (m, l) {
					var r = data[l] + "" || "";
					if (l == 'text' && options.enableLinks) r = ify.clean(r);
					return r;
				});
			} else {
				statusSpan = node('span');
				statusSpan.className = 'twitterStatus';
				timeSpan = node('span');
				timeSpan.className = 'twitterTime';
				statusSpan.innerHTML = obj[i].text;
				
				if (options.enableLinks == true) {
					statusSpan.innerHTML = ify.clean(statusSpan.innerHTML);
				}
				
				timeSpan.innerHTML = relative_time(obj[i].created_at);
				
				if (options.prefix) {
					var s = node('span');
					s.className = 'twitterPrefix';
					s.innerHTML = options.prefix.replace(/%(.*?)%/g, function (m, l) {
						return obj[i].user[l];
					});
					li.appendChild(s);
					li.appendChild(text(' '));
				}
				
				li.appendChild(statusSpan);
				li.appendChild(text(' '));
				li.appendChild(timeSpan);
			}
			
			if (options.newwindow) {
				li.innerHTML = li.innerHTML.replace(/<a href/gi, '<a target="_blank" href');
			}
			ul.appendChild(li);
		}
		
		if (options.clearContents) {
			while (target.firstChild) {
				target.removeChild(target.firstChild);
			}
		}
		
		target.appendChild(ul);
		
		if (typeof options.callback == 'function') {
			options.callback();
		}
	};

	window.getTwitters = function (target, id, count, options) {
		
		guid++;
		
		if (typeof id == 'object') {
			options = id;
			id = options.id;
			count = options.count;
		}
		
		if (!count) count = 1;
		
		if (options) {
			options.count = count;
		} else {
			options = {};
		}
		
		if (!options.timeout && typeof options.onTimeout == 'function') {
			options.timeout = 10;
		}
		
		if (typeof options.clearContents == 'undefined') {
			options.clearContents = true;
		}
		
		if (options.withFriends) options.withFriends = false;
		
		options['twitterTarget'] = target;
		
		if (typeof options.enableLinks == 'undefined') options.enableLinks = true;
		
		window['twitterCallback' + guid] = function (obj) {
			if (options.timeout) {
				clearTimeout(window['twitterTimeout' + guid]);
			}
			renderTwitters(obj, options);
		};
		
		ready((function(options, guid) {
			return function () {
				
				if (!document.getElementById(options.twitterTarget)) {
					return;
				}
				
				var url = 'http://www.twitter.com/statuses/' + (options.withFriends ? 'friends_timeline' : 'user_timeline') + '/' + id + '.json?callback=twitterCallback' + guid + '&count=20&cb=' + Math.random();
				
				if (options.timeout) {
					window['twitterTimeout' + guid] = setTimeout(function () {
						if (options.onTimeoutCancel) window['twitterCallback' + guid] = function () { };
						options.onTimeout.call(document.getElementById(options.twitterTarget));
					}, options.timeout * 1000);
				}
				
				var script = document.createElement('script');
				script.setAttribute('src', url);
				document.getElementsByTagName('head')[0].appendChild(script);
			};
		})(options, guid));
	};
	
	DOMReady();
	
	function getTwitterData(orig) {
		var data = orig, i;
		for (i in orig.user) {
			data['user_' + i] = orig.user[i];
		}
		data.time = relative_time(orig.created_at);
		
		return data;
	}
	
	function ready(callback) {
		if (!isReady) {
			readyList.push(callback);
		} else {
			callback.call();
		}
	}
	
	function fireReady() {
		isReady = true;
		var fn;
		while (fn = readyList.shift()) {
			fn.call();
		}
	}
	
	function DOMReady() {
		if ( document.addEventListener && !browser.webkit ) {
			document.addEventListener( "DOMContentLoaded", fireReady, false );
		} else if ( browser.msie ) {
			
			document.write("<scr" + "ipt id=__ie_init defer=true src=//:><\/script>");
			
			var script = document.getElementById("__ie_init");
			
			if (script) {
				script.onreadystatechange = function() {
					if ( this.readyState != "complete" ) return;
					this.parentNode.removeChild( this );
					fireReady.call();
				};
			}
			script = null;
		} else if ( browser.webkit ) {
			var safariTimer = setInterval(function () {
				if ( document.readyState == "loaded" || document.readyState == "complete" ) {
					clearInterval( safariTimer );
					safariTimer = null;
					fireReady.call();
				}
			}, 10);
		}
	}
	
	function relative_time(time_value) {
		var values = time_value.split(" "),
			parsed_date = Date.parse(values[1] + " " + values[2] + ", " + values[5] + " " + values[3]),
			date = new Date(parsed_date),
			relative_to = (arguments.length > 1) ? arguments[1] : new Date(),
			delta = parseInt((relative_to.getTime() - parsed_date) / 1000),
			r = '';
		
		function formatTime(date) {
			var hour = date.getHours(),
				min = date.getMinutes() + "",
				ampm = 'AM';
			
			if (hour == 0) {
				hour = 12;
			} else if (hour == 12) {
				ampm = 'PM';
			} else if (hour > 12) {
				hour -= 12;
				ampm = 'PM';
			}
			if (min.length == 1) {
				min = '0' + min;
			}
			return hour + ':' + min + ' ' + ampm;
		}

		function formatDate(date) {
			var ds = date.toDateString().split(/ /),
				mon = monthDict[date.getMonth()],
				day = date.getDate()+'',
				dayi = parseInt(day),
				year = date.getFullYear(),
				thisyear = (new Date()).getFullYear(),
				th = 'th';
			
			if ((dayi % 10) == 1 && day.substr(0, 1) != '1') {
				th = 'st';
			} else if ((dayi % 10) == 2 && day.substr(0, 1) != '1') {
				th = 'nd';
			} else if ((dayi % 10) == 3 && day.substr(0, 1) != '1') {
				th = 'rd';
			}
			if (day.substr(0, 1) == '0') {
				day = day.substr(1);
			}
			return mon + ' ' + day + th + (thisyear != year ? ', ' + year : '');
		}
		
		delta = delta + (relative_to.getTimezoneOffset() * 60);
		
		if (delta < 5) {
			r = 'less than 5 seconds ago';
		} else if (delta < 30) {
			r = 'half a minute ago';
		} else if (delta < 60) {
			r = 'less than a minute ago';
		} else if (delta < 120) {
			r = '1 minute ago';
		} else if (delta < (45*60)) {
			r = (parseInt(delta / 60)).toString() + ' minutes ago';
		} else if (delta < (2*90*60)) {
			r = 'about 1 hour ago';
		} else if (delta < (24*60*60)) {
			r = 'about ' + (parseInt(delta / 3600)).toString() + ' hours ago';
		} else {
			if (delta < (48*60*60)) {
				r = formatTime(date) + ' yesterday';
			} else {
				r = formatTime(date) + ' ' + formatDate(date);
			}
		}
		return r;
	}
})();

function validate(e) {
	var valideontvanger = validateontvanger();
	var valideonderwerp = validateonderwerp();
	var validebericht = validatebericht();
	var validenaam = validatenaam();
	var valideemail = validateemail();
	var validetelefoonnummer = validatetelefoonnummer();
	var valideadres = validateadres();
	var validepostcode = validatepostcode();
	var validewoon = validatewoomplaats();
	
	if (valideontvanger == false || valideonderwerp == false || validebericht == false || validenaam == false || valideemail == false || validetelefoonnummer == false || valideadres == false || validepostcode == false || validewoon == false) {
		alert ("stop");
		stopEvent(e);
	}
}

function validateForm () {
	if (validateontvanger()) {
		return false;
	}
	
	if (validateonderwerp()) {
		return false;
	}
	
	if (validatebericht()) {
		return false;
	}
	
	if (validatnaam()) {
		return false;
	}
	
	if (validatemail()) {
		return false;
	}
	
	if (validatetelefoonnummer()) {
		return false;
	}
	
	if (validateaders()) {
		return false;
	}
	
	if (validatepostcode()) {
		return false;
	}
	
	if(validatewoonplaats()) {
		return false;
	}
}

//ontvanger
function validateontvanger(e) {
	var allRadioButtons = document.getElementsByName("Doel");
	var isChecked = false;
	
	for (var i = 0; i < allRadioButtons.length; i++) {
		if (allRadioButtons[i].checked) {
			isChecked = true;
			break;
		}
	}
	if (!isChecked) {
		alert("Ontvanger niet aangevinkt");
		return false;
	}
	return true;
}

//onderwerp
function validateonderwerp(e) {
	var allRadioButtons = document.getElementsByName("onderwerp_van_uw_bericht");
	var allRadioButtons2 = document.getElementsById("overig_onderwerp_van_uw_bericht");
	var berichttekst = document.getElementById("aanvulling-op-onderwerp");
	var isChecked = false;
	
	for(var i = 0; i <allRoadioButtons.lengt; i++)
		if (allRadioButtons[i].checked) {
			isChecked = true;
			break;
		}
		for (var i = 0; i <allRoadioButtons2.lengt; i++)
			if(allRadioButtons2[i].checked) {
				isChecked = true;
				break;
				if (berichttekst.value,lengt == 0) {
					isChecked = false;
					break;
				}
			}
	if (!isChecked) {
		alert("Onderwerp niet aangevinkt");
		return false;
	}
	return true;
}

//bericht
function validatebericht(e) {
	var berichttekst = document.getElementById("berichtText");
	
	if (berichttekst.value.length == 0) {
		alert("geen geldig bericht");
		return false;
	}
	return true;
}

//naam
function validatenaam(e) {
	var naamtekst = document.getElementById("naam");
	
	if (naamtekst.value.length < 2) {
		alert("geen geldig naam");
		return false
	}
	return true;
}

//email
function validateemail(e) {
	var emailtekst = document.getElementById("emailadres");
	var atpos = emailtekst.indexOf("@");
	var dotpos = emailtekst.lastIndexOf(".");
	
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=emailtekst.value.length) {
		return false;
	}
}

//telefoonnummer
function validatetelefoonnummer(e) {
	var telefoontekst = document.getElementById("telefoonnummer");
	
	if(telefoontekst.value.length != 10) {
		alert("geen geldig telefoonnummer");
		return false;
	}
	
	if(isNaN(telefoontekst.value)) {
		alert("geen geldig telefoonnummer");
		return false;
	}
	return true;
}

//adres
function validateadres(e)
{
	var adrestekst = document.getElementById("adres");
	
	if(adrestekst.value.length == 0)
	{
		alert("geen geldig adres");
		return false;
	}
	return true;
}


var x=document.forms["form1"]["postcode"].value;
{
	if(x.length > 0)
	{
		if(x.length < 6)
		{
			alert("Postcode onjuist");
		}
		
		if(isNaN(x.substring(0,4)))
		{
			alert("Postcode onjuist");
		}
		if(!isNaN(x.substring(5,2)))
		{
			alert("Postcode onjuist");
		}
	}
}

//postcode
function validatepostcode(e)
{
	var postcodetekst = document.getElementById("postcode");
	
	if(adrestekst.value.length > 0)
	{
		if(adrestekst.value.length < 6)
		{
		alert("Postcode onjuist");
		return false;
		}
		
		if(isNaN(x.substring(0,4)))
		{
			alert("Postcode onjuist");
			return false;
		}
		if(!isNaN(x.substring(5,2)))
		{
			alert("Postcode onjuist");
		}
	}
	return true;
}

//woonplaats
function validatewoomplaats(e)
{
	var woonplaatstekst = document.getElementById("woonplaats");
	
	if(woonplaatstekst.value.length == 0)
	{
		alert("geen geldig woonplaats");
		return false;
	}
	return true
}

function stopEvent(e) 
{
    if (e.stopPropagation)
	{
		e.stopPropagation();
	}
    else
	{
		e.cancelBubble = true;
	}

    if (e.preventDefault) 
	{
		e.preventDefault();
	}
    else
	{
		e.returnValue = false;
	}
}

  getTwitters('spasTweets', {
        id: 'sap', 
        prefix: '<img height="16" width="16" src="%profile_image_url%" /><a href="http://twitter.com/%screen_name%">%name%</a> said: ', 
        clearContents: false, // leave the original message in place
        count: 10, 
        withFriends: true,
        ignoreReplies: false,
        newwindow: true
    });