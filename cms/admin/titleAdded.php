<html>
		<head>
			<link href="../css/general.css" type="text/css" rel="stylesheet" />
		</head>
	<body>

<?php

// retrieve settings from session 
 
require 'getSession.php';

$titleText = $_POST[title];

// form security
if ( !preg_match( "/^[a-zA-Z0-9.',?!:\s]{1,100}+$/", $titleText)){ 
echo '<script type="text/javascript">alert("Only letters and numbers are allowed");</script>';
echo '<script type="text/javascript">location.replace("index.php");</script>';
}

// call db connect script
require 'connect.php';

$sql="UPDATE $pagetype SET title = ('$_POST[title]') WHERE PID = ('$_POST[id]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

mysqli_close($con);

// load add title page again
require 'addTitles.php'
?>

	</body>
</html>