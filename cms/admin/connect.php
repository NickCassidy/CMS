<?php
// connect to db

//running on live
$con = mysqli_connect('localhost','simonun','simonpw','website2');

//running on localhost
//$con = mysqli_connect('localhost','root','root','website2');

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>