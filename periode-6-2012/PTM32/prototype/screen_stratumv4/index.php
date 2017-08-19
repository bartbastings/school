<?php
include('php/twitter.php');
?>
<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<title>Scherm Stratumseind v4</title>
	<link href="css/stylesheet.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.totemticker.js"></script>
	<script type="text/javascript" src="js/newtick.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="js/global.js"></script>
    <script type="text/javascript" src="js/twitter.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
		showDayevents("day1event");
		getTweets()
	});
	</script>
	</head>
	<body>
    <div class="first">
    	<div class="logo"><img src="images/logo_03.png" alt="logo"></div>
        <div class="uitgelicht"><img src="images/eventuit.jpg"></div>
        <div class="statestieken">
        	<div class="donutChart">
            	<div id="visitorsChart" class="chart"></div>
                <div class="imgChart visitorsImgChart"></div>
				<h3 id="bezoekers">verwachte bezoekers</h3>
            </div>
            <div class="donutChart">
            	<div id="genderChart" class="chart"></div>
                <div class="imgChart genderImgChart"></div>
				<h3 id="vrouw">vrouw</h3>
				<h3 id="man">man</h3>
			</div>
            <div class="genre">
            <img src="images/genre_dance.png" alt='genreImage'>
            <h3>Dance</h3>
            </div>
		</div>
    </div>
    <!-- uitgelicht end -->
    
    <div class="second">
    	<div class="line"> <img src="images/aline.png"> </div>
    	<div id="day1" class="vrijdag days">
    		<p>VRIJDAG</p>
        </div>
        <div id="day2" class="zaterdag days">
            <p>ZATERDAG</p>
        </div>
        <div id="day3" class="zondag days">
            <p>ZONDAG</p>
        </div>
        <div id="day4"class="donderdag days">
            <p>DONDERDAG</p>
        </div>
        <div class="daynumber">
            <p>19</p>
        </div>
        <div class="month">
            <p>december</p>
        </div>
        <div class="day">
            <p>VRIJDAG</p>
        </div>
        <ul id="day1event" class="vertical-ticker">
            <li><img src="images/event1.jpg"></li>
            <li><img src="images/event1.jpg"></li>
            <li><img src="images/event1.jpg"></li>
            <li><img src="images/event1.jpg"></li>
            <li><img src="images/event1.jpg"></li>
        </ul>
        <ul id="day2event" class="vertical-ticker">
            <li><img src="images/event2.jpg"></li>
            <li><img src="images/event2.jpg"></li>
            <li><img src="images/event2.jpg"></li>
            <li><img src="images/event2.jpg"></li>
            <li><img src="images/event2.jpg"></li>
            <li><img src="images/event2.jpg"></li>
        </ul>
        <ul id="day3event" class="vertical-ticker">
            <li><img src="images/event3.jpg"></li>
            <li><img src="images/event3.jpg"></li>
            <li><img src="images/event3.jpg"></li>
            <li><img src="images/event3.jpg"></li>
            <li><img src="images/event3.jpg"></li>
            <li><img src="images/event3.jpg"></li>
        </ul>
        <ul id="day4event" class="vertical-ticker">
            <li><img src="images/event2.jpg"></li>
            <li><img src="images/event2.jpg"></li>
            <li><img src="images/event2.jpg"></li>
            <li><img src="images/event2.jpg"></li>
            <li><img src="images/event2.jpg"></li>
            <li><img src="images/event2.jpg"></li>
        </ul>
    </div>
    <footer>
    	<div id="twitterLogo"><img src="images/twlogo.png"></div>
        <ul id="tweetNewsFeed">
        <?php
        foreach($json['tweet'] as $tweet){
			echo '<li>'.$tweet['username'].': '.$tweet['text'].'</li>';
			};
		?>
		</ul>
	</footer>
</body>
</html>

</body>
</html>
