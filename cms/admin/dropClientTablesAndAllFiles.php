<html>
<head>
<link href="../css/general.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="contentWrap">
		<div id="contentTop">
			
<?php
 
// get clientName from form 
$pagetype = $_GET['clientName'];

echo '<h2>PREVIEW and LIVE content for '.$pagetype. ' has been deleted</h2>';

// connect to db
require 'connect.php';

$tableName = $pagetype;
$tableNameLive = $pagetype.'Live';
$tableNameThumbs = $pagetype.'Thumbs';
$tableNameThumbsLive = $pagetype.'ThumbsLive';

// ditch all of the tables 
$sql="DROP TABLE IF EXISTS $tableName";
$result = mysqli_query($con,$sql);

$sql="DROP TABLE IF EXISTS $tableNameLive";
$result = mysqli_query($con,$sql);

$sql="DROP TABLE IF EXISTS $tableNameThumbs";
$result = mysqli_query($con,$sql);

$sql="DROP TABLE IF EXISTS $tableNameThumbsLive";
$result = mysqli_query($con,$sql);

// delete files from live directories. 
$targetDir = $pagetype.'Perm';
$targetDirThumbs = $pagetype.'ThumbsPerm';

// live directories paths & names
$path = 'dropzone/clients/'.$targetDir.'/';
$pathThumbs = 'dropzone/clients/'.$targetDirThumbs.'/';

// Loop over all of the .jpg files in the live directories and unlink
foreach(glob($path ."*.jpg*") as $file) 
{
    unlink($file); 
}

foreach(glob($pathThumbs ."*.jpg*") as $file) 
{
    unlink($file); 
}

// delete the directories
rmdir($path);
rmdir($pathThumbs);

// delete temp files 
$targetDir = $pagetype.'Temp';
$targetDirThumbs = $pagetype.'ThumbsTemp';

$path = 'dropzone/clients/'.$targetDir.'/';
$pathThumbs = 'dropzone/clients/'.$targetDirThumbs.'/';

// Loop over all of the .jpg files in the folders
foreach (glob($path ."*.jpg*") as $file) 
{
    unlink($file); 
}

foreach (glob($pathThumbs ."*.jpg*") as $file) 
{
    unlink($file); 
}

// delete the directories
rmdir($path);
rmdir($pathThumbs);


// remove client folder containing client generateList.php and index.php files 

$targetDir = $pagetype;
$path = '../clients/'.$targetDir.'/';

// Loop over all of the .php files in the folder
foreach (glob($path ."*.php*") as $file) 
{
    unlink($file); 
}

rmdir($path);



// remove clientName from clientTable 
$sql="DELETE FROM clientTable WHERE clientName='$pagetype'";
$result = mysqli_query($con,$sql);

echo '<a href="index.php">Back</a>';

?>
</div>
</div>
</body>
</html>