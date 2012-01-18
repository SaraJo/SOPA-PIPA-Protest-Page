<?php
/*
Plugin Name: Stop SOPA/PIPA
Plugin URI: 
Description: Sets site to a standardized landing page for the internet blackout planned for 1/18/2012. Additionally sets site into maintanance mode using a 503 response
Author: Mike Avello
Version: 1.0
Author URI: http://mikeavello.com/
*/

/* Check to see if locations are changed in wp-config */
if ( !defined('WP_CONTENT_URL') ) {
	define('stopSOPA_pluginPath',get_option('siteurl').'/wp-content/plugins/'.plugin_basename(dirname(__FILE__)).'/');
} else {
	define('stopSOPA_pluginPath',WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/');
}

if(!function_exists('stopSOPA_header')):
function stopSOPA_header($status_header, $header, $text, $protocol) {
	if ( !is_user_logged_in() ) {
		return "$protocol 503 Service Unavailable";
	}
}
endif;

if(!function_exists('stopSOPA_content')):
function stopSOPA_content() {
	if ( !is_user_logged_in() ) {
		$pluginPath = stopSOPA_pluginPath; 
		
		$page = '
<html>
<head>
<link href="http://fonts.googleapis.com/css?family=Six+Caps" rel="stylesheet" type="text/css">
   <link href="http://fonts.googleapis.com/css?family=Stint+Ultra+Condensed" rel="stylesheet" type="text/css">
<style>
body {
   color: #fff;
   font-size: 88px;
   margin: 50px auto;
   text-align:center;
   width:800px;
   background: #121110 url(' . $pluginPath . 'darth_stripe_sm.png) repeat;
}

p {
   padding:0;
   margin:1em 0;  
   font-size:18px;
   font-family: Arial;
   letter-spacing:3px;
   line-height: 1em;
}

a {
  text-decoration: none;
  color:#bb7711;
}

a:hover {
   color:#bb5500;
}

.bills{
  text-decoration:underline;
  color:white;
  letter-spacing:0px;
}

.act{
  font-family: "Stint Ultra Condensed";
  font-size:218px;
  padding:0;
  margin:0;
  letter-spacing:5px;
}
.save{
  font-family: "Stint Ultra Condensed";
  font-size:108px;
  padding:0;
  margin:0;
  letter-spacing:5px;
}

.link{
  color: #FFC273;
  letter-spacing:0;
  padding: 2em;
  line-height: 2em;
}

.orange a:hover {
}
</style>
</head>
<body>
   <div>
     <hr>
     <p class="save">SAVE THE INTERNET.</p>
      <p>This site has been taken down in protest of bills currently being considered in the US
      House and Senate. Called <a class="bills" href="http://thomas.loc.gov/cgi-bin/bdquery/z?d112:h.r.3261:">SOPA</a> and 
      <a  class="bills" href="http://www.opencongress.org/bill/112-s968/show">PIPA</a>,<br /> these bills threaten 
      to destroy the Internet as we know it.</p>
      <p>If either one passes, your favorite sites could disappear forever.</p>
      <hr>
      <a href="http://americancensorship.org/modal/call-form-moz.html">
         <p class="act">ACT NOW.</p>
      </a>
      <p><span><a class="link" href="http://americancensorship.org/modal/call-form-moz.html">CALL YOUR SENATOR AND ASK THEM TO VOTE "NO" FOR PIPA</a></span>

        <span> <a class="link" href="https://github.com/SaraJo/SOPA-PIPA-Protest-Page">JOIN US</a></p>

   <div>
</body>
</html>

';
		die($page);
	}
}
endif;



if (function_exists('add_filter') ):
add_filter('status_header', 'stopSOPA_header', 10, 4);
add_action('get_header', 'stopSOPA_content');
else:
// Prevent direct invocation by user agents.
die('STOP SOPA/PIPA!');
endif;
?>