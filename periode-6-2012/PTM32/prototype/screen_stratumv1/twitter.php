<?php
include('includes/functions.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

	<title>Scherm Stratumseind</title>

<!-- stylesheets -->
	<link href="style.css" rel="stylesheet" type="text/css">

<!-- scripts -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="jquery.totemticker.js"></script>
    <script type="text/javascript" src="newtick.js"></script>
	<script type="text/javascript">
		$(function(){
			$('.vertical-ticker').totemticker({
				row_height	:	'155px',
			});
		});
		$(function(){
    $("ul#ticker01").liScroll();
});
	</script>

</head>

<?php

$ch = curl_init();
$url = 'http://kinderopvangbanholt.nl/twitter-api-php-master/index.php?type=json';		
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);		
$json = curl_exec($ch); 
curl_close($ch);
$json = json_decode($json, true);
		
echo '<ul>';
foreach($json['tweet'] as $tweet){
		echo '<li>';
		echo $tweet['username'].': '.$tweet['text'];
		echo '</li>';
};
echo '</ul>';
?>

<body>
	<div class="logo">   
    	<img src="images/logo.jpg">
    </div><!-- logo -->
    
    <div class="uitgelicht">
    	<img src="images/eventuit.jpg">
    </div><!-- uitgelicht -->
    
    <div id="agenda">
    
    	<div class="line">
        	<img src="images/aline.png">
        </div>
        
        <div id="day1" class="vrijdag days">
        	<p>VRIJDAG</p>
        </div>    
        <div id="day2" class="zaterdag days">
        	<p>ZATERDAG</p>
        </div>    
        <div id="day3" class="zondag days">
        	<p>ZONDAG</p>
        </div>    
        <div  id="day4"class="donderdag days">
        	<p>DONDERDAG</p>
        </div> 
        
        <div class="daynumber">
        	<p>
			<?php
			echo date("d",time());	
			?>
            </p>
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
        
	</div><!-- agenda -->
    
	<footer>
		<div id="twlogo">
    		<img src="images/twlogo.png">
    	</div><!-- twlogo -->
        
        <ul id="ticker01">
    		<li>#Stratum Wat een mooi feestje was het weer hier ...&nbsp;&nbsp;</li>
   			<li>#Stratum Pfoe een beetje te veel gedronken maar wel erg gezellig ...&nbsp;&nbsp;</li>
    		<li>#Stratum Net ruzie gehad met een politie agent (0_o) ...&nbsp;&nbsp;</li>
    <!-- eccetera -->
		</ul>
	</footer>

</body>

</html>
