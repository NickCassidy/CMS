<?php

// retrieve settings from session 
 
require 'getSession.php';

// read files into an array
$dirArray = array();

if (is_dir($log_directory))
{
        if ($handle = opendir($log_directory))
        {
                while(($file = readdir($handle)) !== FALSE)
                {
                        $dirArray[] = $file;
                }
                closedir($handle);
        }
}


// count how many files have been uploaded to the photo directory
$noOfPhotoFiles = count ($dirArray);

// read thumb files into an array
$dirArrayThumbs = array();

if (is_dir($log_directory_thumbs))
{
        if ($handle = opendir($log_directory_thumbs))
        {
                while(($file = readdir($handle)) !== FALSE)
                {
                        $dirArrayThumbs[] = $file;
                }
                closedir($handle);
        }
}


// count how many thumb files there are in the directory
$noOfThumbFiles = count ($dirArrayThumbs);


if ($noOfPhotoFiles != $noOfThumbFiles)
{
echo '<h4 class="alertText">There are ' .$noOfPhotoFiles.' large photos and '.$noOfThumbFiles.' thumbnail photos. <br />The number of large & thumbnail photos must match. Please start again.</h4>';
}

?>




