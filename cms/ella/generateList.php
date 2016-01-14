<?php
require '../admin/root.php';
require '../admin/connect.php';

//close session
if(isset($_SESSION['settings']))
unset($_SESSION['settings']);

// get name of current directory so it can be applied assigned to pagetype
$cur_dir = basename(__DIR__);

$tableNameLive = $cur_dir. 'Live';

$pagetypeURL = '../'. 'admin/'. 'dropzone/'.$cur_dir.'Perm/';

$pagetypeThumbsURL = '../'. 'admin/' . 'dropzone/'.$cur_dir.'ThumbsPerm';

// retrieve image file name from db
$result = mysqli_query($con,"SELECT imageFile FROM $tableNameLive");

// count number of rows in db so as to generate same number of list items
$num_rows = mysqli_num_rows($result);

// loop to generate each list item
for ($i=0; $i<=$num_rows; $i++)

  {

$result = mysqli_query($con,"SELECT imageFile FROM $tableNameLive where recordListingID ='$i'");
    while($row = mysqli_fetch_array($result))
        {
           echo '<li>' . "\n" . '<a href="#">'."\n";
        }

// retrieve large image file name from db

$result = mysqli_query($con,"SELECT imageFile FROM $tableNameLive where recordListingID='$i'");

   while($row = mysqli_fetch_array($result))
       {
           echo '<img src=' . $pagetypeThumbsURL .'/'. $row['imageFile'] .'  '. 'data-large=' . $pagetypeURL . $row['imageFile'] .' '. 'data-description="';
       }

    
$result = mysqli_query($con,"SELECT title FROM $tableNameLive where recordListingID='$i'");
      while($row = mysqli_fetch_array($result))
       {    
           echo $row['title'] . '"/>'."\n".'</a>'. "\n" . '</li>' . "\n\n";
       }
       
}

	mysqli_close($con);
?>



