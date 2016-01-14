<?php
header("Location: dropzone/index.php");
// above code loads dropzone page automatically while code below is executed

//kill session
session_destroy('settings');

//require 'dropTablesAndTempFiles.php';
//require 'validateForm.php';

$pagetype = $_GET['pagetype'];

// make photo directories in dropzone folder
mkdir('dropzone/clients/'.$pagetype.'Temp');
mkdir('dropzone/clients/'.$pagetype.'Perm');
mkdir('dropzone/clients/'.$pagetype.'ThumbsTemp');
mkdir('dropzone/clients/'.$pagetype.'ThumbsPerm');
mkdir('../clients/'.$pagetype);

// copy basic index.php and generateList.php from client to new directory 
copy('../clientpage/index.php', '../clients/'.$pagetype.'/index.php');
copy('../clientpage/generateList.php', '../clients/'.$pagetype.'/generateList.php');

// directory where photos are uploaded to
$log_directory = 'dropzone/clients/'.$pagetype.'Temp';

// directory where thumb photos are uploaded to
$log_directory_thumbs = 'dropzone/clients/'.$pagetype.'ThumbsTemp';

// table to insert filenames into
$tableName = $pagetype;

// table to insert thumbnail filenames into
$tableNameThumbs = $pagetype.'Thumbs';

//$pagetypeURL = $rootURL .'/'. 'dropzone/'.$pagetype.'Perm/';
$pagetypeURL = 'dropzone/clients/'.$pagetype.'Perm/';

// this bit new 180514 - added trailing / to thumbsPerm
//$pagetypeThumbsURL = $rootURL . '/admin/' .'dropzone/'.$pagetype.'ThumbsPerm/';
$pagetypeThumbsURL = 'dropzone/clients/'.$pagetype.'ThumbsPerm/';

// directory where photos are moved to
$final_directory = 'dropzone/clients/'.$pagetype.'Perm';

// directory where thumb photos are moved to
$final_directory_thumbs = 'dropzone/clients/'.$pagetype.'ThumbsPerm';

$tempFolderThumbs = 'clients/'.$pagetype.'ThumbsTemp';

$tempFolder = 'clients/'.$pagetype.'Temp';

$tableNameLive = $tableName.'Live';

$tableNameThumbsLive = $tableNameThumbs. 'Live';

// store content in a PHP session
session_start();
 
// create an array
$data = array('$pagetype'=>$pagetype,'$log_directory'=>$log_directory, '$log_directory_thumbs'=>$log_directory_thumbs,'$tableName'=>$tableName,'$tableNameThumbs'=>$tableNameThumbs,'$pagetypeURL'=>$pagetypeURL,'$pagetypeThumbsURL'=>$pagetypeThumbsURL,'$final_directory'=>$final_directory,'$final_directory_thumbs'=>$final_directory_thumbs,'$tempFolderThumbs'=>$tempFolderThumbs, '$tempFolder'=>$tempFolder, '$tableNameLive'=>$tableNameLive, '$tableNameThumbsLive' => $tableNameThumbsLive);
 
// put the array in a session variable
$_SESSION['settings']=$data;

// this bit new 180514
//require 'createClientTable.php';
require 'connect.php';

// check if clientTable exists or not - if exists write new clientname into it. If it doesn't create table
if ($con->query ("DESCRIBE clientTable"  )) {

// add client names to client table in db
$result = mysqli_query($con, "INSERT INTO clientTable (clientName) VALUE ('$pagetype')");

} else {

$sql = "CREATE TABLE clientTable (PID INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(PID), clientName VARCHAR(30))";
$result = mysqli_query($con,$sql);

if (mysqli_query($con,$sql))
{
    // echo "<br />The " . $tableName . " database table has been created successfully. <br />";
}
else
{
    echo "Error creating table: " . mysqli_error($con);
}
}
 
?>

