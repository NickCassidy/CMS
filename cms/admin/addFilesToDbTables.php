<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/general.css" type="text/css" rel="stylesheet" />
<body>
<div class="contentWrap"></div>
<h1>Files</h1>
<?php

// check that the number of photo files matches the number of thumbnails
require 'matchingFileNumbers.php';

// amend menu depending on whether there are a matching no of files
if ($noOfPhotoFiles != $noOfThumbFiles)
{
    echo '<a href="index.php">Start again</a><br /><br />';
}
else 
{
    echo '<a href="index.php">Start again</a><br /><br /><a href="dropzone/index.php">Add more photos</a><p>or</p><a href="addTitles.php">NEXT</a><br /><br />';
}

require 'getSession.php';

// add images and thumbs to db
require 'connect.php';

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

// remove invisible files from array
require 'handleInvisibleFiles.php';

// store array in a variable
$data = $dirArray;

$sql="DROP TABLE IF EXISTS $tableName";
$result = mysqli_query($con,$sql);

// create table
$sql="CREATE TABLE $tableName (PID INT(10) NOT NULL AUTO_INCREMENT, PRIMARY KEY(PID), imageFile VARCHAR(50) NOT NULL, title  VARCHAR(255), recordListingID INT(10) NOT NULL, recordID INT(10) NOT NULL)";

// execute query
if (mysqli_query($con,$sql))
{
    // echo "<br />The " . $tableName . " database table has been created successfully. <br />";
}
else
{
    echo "Error creating table: " . mysqli_error($con);
}

// read photo filenames into mysql table
foreach ($data as $row)
{
    $result = mysqli_query($con, "INSERT INTO $tableName (imageFile) VALUES ('$row')");
}

// set value of recordListingID and recordID equal to PID - recordID and recordListingID are used for jQuery reordering items 
// recordID will additionally be used as a foreign key for thumb table 
$result = mysqli_query($con, "UPDATE $tableName SET recordListingID = PID");

$result = mysqli_query($con, "UPDATE $tableName SET recordID = PID");

$i=count ($dirArray);

echo "The following $i large photos were successfully uploaded:" . "<br /><br />";

foreach($dirArray as $value)
{
    echo $value . '<br />';
}

echo '<br />';

// now deal with thumbs

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

// remove invisible files from array
require 'handleInvisibleFiles.php';

// store array in a variable
$data = $dirArray;

// store array in a variable
$dataThumbs = $dirArrayThumbs;

$sql="DROP TABLE IF EXISTS $tableNameThumbs";
$result = mysqli_query($con,$sql);

// create table
$sql="CREATE TABLE $tableNameThumbs (PID INT(10) NOT NULL AUTO_INCREMENT, PRIMARY KEY(PID), recordID INT(10) NOT NULL, imageThumbFile VARCHAR(50))";

// Execute query
if (mysqli_query($con,$sql))
{
    //echo "<br />The " . $tableNameThumbs . " database table has been created successfully. <br />";
}
else
{
    echo "Error creating table: " . mysqli_error($con);
}

foreach ($dataThumbs as $row)
{
    $result = mysqli_query($con, "INSERT INTO $tableNameThumbs (imageThumbFile) VALUES ('$row')");
}

$result = mysqli_query($con, "UPDATE $tableNameThumbs SET recordID = PID");

$j=count ($dirArrayThumbs);

echo "The following $j thumbnail photos were successfully uploaded:" . "<br /><br />";

foreach($dirArrayThumbs as $valueThumbs)
{
    echo $valueThumbs . '<br />';
}

mysqli_close($con);
 
?>

<?php
    require 'moveFiles.php';
?>

</body>
</html>
