<?php


$ds = DIRECTORY_SEPARATOR;  //1


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

/*
// close session
if(isset($_SESSION['settings']))
  unset($_SESSION['settings']);
*/


 
$storeFolder = $tempFolder;   //2
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
     
}
?>     
