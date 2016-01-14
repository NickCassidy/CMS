<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../js/jquery-1.3.2.js"></script>
<link href="../css/general.css" type="text/css" rel="stylesheet" />
</head>
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
    echo '<a href="index.php">Start again</a><br /><br /><a href="dropzone/index.php">Upload more photos</a><br /><br /><a href="addTitles.php">NEXT</a><br /><br />';
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

// read photo filenames into mysql table
foreach ($data as $row)
{
    $result = mysqli_query($con, "INSERT INTO $tableName (imageFile) VALUES ('$row')");
}

// set value of recordListingID and recordID equal to PID
$result = mysqli_query($con, "UPDATE $tableName SET recordListingID = PID");

$result = mysqli_query($con, "UPDATE $tableName SET recordID = PID");

$i=count ($dirArray);
echo "The following $i files were added to the database:" . "<br /><br />";

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
$dataThumbs = $dirArrayThumbs;

foreach ($dataThumbs as $row)
{
    $result = mysqli_query($con, "INSERT INTO $tableNameThumbs (imageThumbFile) VALUES ('$row')");
}   
    $result = mysqli_query($con, "UPDATE $tableNameThumbs SET recordID = PID");

$j=count ($dirArrayThumbs);

echo "The following $j files were added to the database:" . "<br /><br />";

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
