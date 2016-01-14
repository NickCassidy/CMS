<html>
<head>
<link href="../../css/general.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="contentWrap">
<h1>Done</h1> 
<?php

require '../connect.php';

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

$sql="DROP TABLE IF EXISTS $tableNameLive";
$result = mysqli_query($con,$sql);

$sql="DROP TABLE IF EXISTS $tableNameThumbsLive";
$result = mysqli_query($con,$sql);

// make tables content available to live
$sql="ALTER TABLE $tableName RENAME TO $tableNameLive";
$result = mysqli_query($con,$sql);

$sql="ALTER TABLE $tableNameThumbs RENAME TO $tableNameThumbsLive";
$result = mysqli_query($con,$sql);

echo '<h2>Site page</h2>';
echo '<a href="'.'../../'.$pagetype.'">See live site page</a><br /><br />'; 

echo '<h2>Client page</h2>';
echo '<a href="'.'../../clients/'.$pagetype.'">See live client page</a>'; 

require '../moveFiles.php';

//kill session
session_destroy('settings');

?>

</div>
</body>
</html?