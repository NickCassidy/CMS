<?php
				
// retrieve settings from session to display name of page that's being edited - loop through the session array with foreach
session_start();
foreach($_SESSION['settings'] as $key=>$value)
    {
    // and print out the values
    $key.' = '."'".$value."'".";".'<br />';
    }
$pagetype = $_SESSION['settings']['$pagetype']; 

// this will display the page that's being previewed
echo '<h3>' .$pagetype.' preview </h3>';


// this is the php function for copying the generateList.php page. Need to pass the $pagetype variable into buildPage function
buildPage($pagetype);

// buildPage function renames and moves the preview generateList.php file to the $pagename folder where the actual live webpage resides so it can be picked up by the page 
function buildPage($pagetype){
$file = 'generateList.php';
$newfile = '../'.$pagetype.'/generateList.php';

if (!copy($file, $newfile)) {
    echo "  Couldn't create $file...\n";
}
}
?>