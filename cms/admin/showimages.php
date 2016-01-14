<?php 

// retrieve settings from session 
 
require 'getSession.php';

require 'connect.php';

$query = "SELECT * FROM $pagetype";
$res = mysqli_query($con, $query) or die(mysql_error());

echo '<div id="contentWrap">';
echo '     <div id="contentLeft">';
echo '          <ul>';

while($row = mysqli_fetch_array($res,MYSQLI_ASSOC))
{
echo '               <li id="recordsArray_">' . $row['recordListingID'] . '. '. '<img src="'.$pagetypeThumbsURL.'/' .$row ['imageFile'].'">   ' .$row[       'title'] . '</li>';
}

echo '          </ul>';

echo '     </div>';
echo '</div>';

mysqli_close($con);

?>
