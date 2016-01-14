<html>
<head>
<link href="../css/general.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="contentWrap">
		<div id="contentTop">

<?php

$pagetype = $_GET['pagetype'];

echo '<h2>PREVIEW content for '.$pagetype. ' has been deleted</h2>';

require 'connect.php';

$tableName = $pagetype;
$tableNameLive = $pagetype.'Live';
$tableNameThumbs = $pagetype.'Thumbs';
$tableNameThumbsLive = $pagetype.'ThumbsLive';

$sql="DROP TABLE IF EXISTS $tableName";
$result = mysqli_query($con,$sql);

/*$sql="DROP TABLE IF EXISTS $tableNameLive";
$result = mysqli_query($con,$sql);*/

$sql="DROP TABLE IF EXISTS $tableNameThumbs";
$result = mysqli_query($con,$sql);

/*$sql="DROP TABLE IF EXISTS $tableNameThumbsLive";
$result = mysqli_query($con,$sql);*/

// delete temp files 
$targetDir = $pagetype.'Temp';
$targetDirThumbs = $pagetype.'ThumbsTemp';

$path = 'dropzone/'.$targetDir.'/';
$pathThumbs = 'dropzone/'.$targetDirThumbs.'/';

// Loop over all of the .jpg files in the directories
foreach(glob($path ."*.jpg*") as $file) 
{
    unlink($file); 
}

foreach(glob($pathThumbs ."*.jpg*") as $file) 
{
    unlink($file); 
}

echo '<a href="index.php">Back</a>';

?>

</div>
</div>
</body>
</html>