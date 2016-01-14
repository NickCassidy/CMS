<?php

// retrieve settings from session 
 
require 'getSession.php';

// get root URL
require 'root.php';
require 'connect.php';
 
// retrieve array of file names from db
$result = mysqli_query($con,"SELECT imageFile FROM $tableName");

// count number of rows in db - it'll be the same for the images and the thumbs 
$num_rows = mysqli_num_rows($result);

// loop to retrieve filename of each item - images and thumbs - then rename the files - to move them into the perm directory
for ($i=1; $i<=$num_rows; $i++)

{
	$result = mysqli_query($con,"SELECT imageFile FROM $tableName where recordID='$i'");
	while($row = mysqli_fetch_array($result))
    {
  	     rename($log_directory .'/' . $row['imageFile'], $final_directory .'/' . $row['imageFile']);
    }

// retrieve image file name from db
	$result = mysqli_query($con,"SELECT imageThumbFile FROM $tableNameThumbs where recordID='$i'");
	while($row = mysqli_fetch_array($result))
  	{
      	 rename($log_directory_thumbs . '/' . $row['imageThumbFile'], $final_directory_thumbs . '/' . $row['imageThumbFile']);
    }
}

mysqli_close($con);

?>