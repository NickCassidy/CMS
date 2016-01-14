<?php
header("Location: index.php");
// above code loads dropzone page automatically while code below is executed

$pagetype = $_GET['pagetype'];

require 'connect.php';

$tableName = $pagetype;
$tableNameLive = $pagetype.'Live';
$tableNameThumbs = $pagetype.'Thumbs';
$tableNameThumbsLive = $pagetype.'ThumbsLive';

$sql="DROP TABLE IF EXISTS $tableName";
$result = mysqli_query($con,$sql);

$sql="DROP TABLE IF EXISTS $tableNameLive";
$result = mysqli_query($con,$sql);

$sql="DROP TABLE IF EXISTS $tableNameThumbs";
$result = mysqli_query($con,$sql);

$sql="DROP TABLE IF EXISTS $tableNameThumbsLive";
$result = mysqli_query($con,$sql);

?>