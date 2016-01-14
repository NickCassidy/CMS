<?php

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

?>