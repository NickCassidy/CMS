<?php
$dbhost							= "localhost";
$dbuser							= "simonun";
$dbpass							= "simonpw";
$dbname							= "website2";

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ("Error connecting to mysql");
mysql_select_db($dbname);
?>