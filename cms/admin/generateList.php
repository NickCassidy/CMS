
<?php
require '../root.php';
require '../connect.php';
// get name of current directory so it can be applied assigned to pagetype
$cur_dir = basename(__DIR__);

$tableNameLive = $cur_dir. 'Live';

$pagetypeURL = $rootURL .'/'. 'dropzone/'.$cur_dir.'Perm/';

$pagetypeThumbsURL = $rootURL .'/'. 'dropzone/'.$cur_dir.'ThumbsPerm/';

echo 'current directory is '.$cur_dir;
echo 'from '.$tableNameLive;

// list generator
 
// retrieve image file name from db
$result = mysqli_query($con,"SELECT imageFile FROM $tableNameLive");

// count number of rows in db so as to generate same number of list items
$num_rows = mysqli_num_rows($result);

// loop to generate each list item
for ($i=1; $i<=$num_rows; $i++)
{
	echo '<li>' . "\n" . '<a class="thumb"';

	// retrieve image file name from db
	$result = mysqli_query($con,"SELECT imageFile FROM $tableNameLive where recordListingID='$i'");
	while($row = mysqli_fetch_array($result))
  	{
  	echo ' href="' . $pagetypeURL . $row['imageFile'] . '">' . '</a>' . "\n";
  	}

	// retrieve thumbnail image name from db to generate URL
	$result = mysqli_query($con,"SELECT imageFile FROM $tableNameLive where recordListingID='$i'");
	while($row = mysqli_fetch_array($result))
  	{
  	echo '<img src="' . $pagetypeThumbsURL . $row['imageFile'] . '">' . "\n";
  	}

  	// allow formatting for title
  	echo '<div class="caption">' . "\n" . '<div class="image-desc">' . "\n";
	
	// retrieve title from db 
	$titleResult = mysqli_query($con,"SELECT title FROM $tableNameLive where recordListingID='$i'");
	while($title = mysqli_fetch_array($titleResult))
  	{
  	echo $title['title'];
  	}
  	
 

  	echo "\n" . '</div>' . "\n" . '</div>' . "\n" . '</li>' . "\n\n";

}


	mysqli_close($con);
?>



