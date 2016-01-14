<html>
<head>
<link href="css/general.css" type="text/css" rel="stylesheet" />
</head>
<body>

<?php

$item = $_GET['item'];

//retrieve settings from session 
//require 'createSession.php';
require 'getSession.php';

// call db connect script
require 'connect.php';

$sql = "DELETE from $tableName WHERE PID = $item";

$result = mysqli_query($con,$sql);

if (!mysqli_query($con,$sql))
{
    die('Error: ' . mysqli_error($con));
}

$sql = "DELETE from $tableNameThumbs WHERE PID = $item";

$result = mysqli_query($con,$sql);

if (!mysqli_query($con,$sql))
{
    die('Error: ' . mysqli_error($con));
}

// reset PID and recordListingID count in tables...

$result = mysqli_query($con,"SET @num := 0");
$result = mysqli_query($con,"UPDATE $tableName SET PID = @num := (@num+1)");
$result = mysqli_query($con,"ALTER TABLE $tableName AUTO_INCREMENT=1");

$result = mysqli_query($con,"SET @num := 0");
$result = mysqli_query($con,"UPDATE $tableName SET recordListingID = @num := (@num+1)");
$result = mysqli_query($con,"ALTER TABLE $tableName AUTO_INCREMENT=1");

$result = mysqli_query($con,"SET @num := 0");
$result = mysqli_query($con,"UPDATE $tableNameThumbs SET PID = @num := (@num+1)");
$result = mysqli_query($con,"ALTER TABLE $tableNameThumbs AUTO_INCREMENT=1");

$result = mysqli_query($con,"SET @num := 0");
$result = mysqli_query($con,"UPDATE $tableName SET recordListingID = @num := (@num+1)");
$result = mysqli_query($con,"ALTER TABLE $tableNameThumbs AUTO_INCREMENT=1");

mysqli_close($con);

require 'addTitles.php';
?>

</body>
</html>