<?php
header("Location: previewPageReditLive.php");
// above code loads preview page automatically while code below is executed
?>
<html>
<head>
<link href="../../css/general.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="contentWrap">
<h1>Done</h1> 
<?php

require '../connect.php';
require '../createSessionEditLiveClient.php';

// retrieve settings from session 
 
// loop through the session array with foreach
session_start();
foreach($_SESSION['settings'] as $key=>$value)
    {
    // and print out the values
    $key.' = '."'".$value."'".";".'<br />';
    }

$pagetype = $_SESSION['settings']['$pagetype']; 
$log_directory = $_SESSION['settings']['$log_directory']; 
$log_directory_thumbs = $_SESSION['settings']['$log_directory_thumbs']; 
$tableName = $_SESSION['settings']['$tableName']; 
$tableNameThumbs = $_SESSION['settings']['$tableNameThumbs']; 
$pagetypeURL = $_SESSION['settings']['$pagetypeURL']; 
$pagetypeThumbsURL = $_SESSION['settings']['$pagetypeThumbsURL']; 
$final_directory = $_SESSION['settings']['$final_directory'];
$final_directory_thumbs = $_SESSION['settings']['$final_directory_thumbs'];
$tempFolderThumbs = $_SESSION['settings']['$tempFolderThumbs'];
$tempFolder = $_SESSION['settings']['$tempFolder'];
$newClient = $_SESSION['settings']['$newClient'];
$tableNameLive = $_SESSION['settings']['$tableNameLive'];
$tableNameThumbsLive = $_SESSION['settings']['$tableNameThumbsLive'];

// create new preview tables
$sql="CREATE TABLE $tableName LIKE $tableNameLive";
$result = mysqli_query($con,$sql);

$sql="CREATE TABLE $tableNameThumbs LIKE $tableNameThumbsLive";
$result = mysqli_query($con,$sql);


// copy content from live tables to preview tables 
$sql="INSERT INTO $tableName SELECT * FROM $tableNameLive";
$result = mysqli_query($con,$sql);

$sql="INSERT INTO $tableNameThumbs SELECT * FROM $tableNameThumbsLive";
$result = mysqli_query($con,$sql);

//require '../moveFilesReditLive.php';

//kill session
session_destroy('settings');

?>

</div>
</body>
</html>