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
$tableNameLive = $_SESSION['settings']['$tableNameLive'];
$tableNameThumbsLive = $_SESSION['settings']['$tableNameThumbsLive'];


// list generator
// get root URL
require '../root.php';
require '../connect.php';
 
// retrieve image file name from db
$result = mysqli_query($con,"SELECT PID FROM $tableName");

// count number of rows in db so as to generate same number of list items
$num_rows = mysqli_num_rows($result);

// loop to generate each list item
for ($i=0; $i<=$num_rows; $i++)

{

$result = mysqli_query($con,"SELECT imageFile FROM $tableName where recordListingID ='$i'");
    while($row = mysqli_fetch_array($result))
        {
	         echo '<li>' . "\n" . '<a href="#">'."\n";
        }

// retrieve large image file name from db

$result = mysqli_query($con,"SELECT imageFile FROM $tableName where recordListingID='$i'");

	 while($row = mysqli_fetch_array($result))
  	   {
           echo '<img src="../../admin/' . $pagetypeThumbsURL .'/'. $row['imageFile'] .' " '. 'data-large="../../admin/' . $pagetypeURL . $row['imageFile'] .' " '. 'data-description="';
  	   }

  	
$result = mysqli_query($con,"SELECT title FROM $pagetype where recordListingID='$i'");
      while($row = mysqli_fetch_array($result))
       {    
  	       echo $row['title'] . '"/>'."\n".'</a>'. "\n" . '</li>' . "\n\n";
       }
}


	mysqli_close($con);
?>
