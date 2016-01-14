<?php
//header("Location: preview/liveToPreview.php");
// above code loads dropzone page automatically while code below is executed

//kill session
session_destroy('settings');

$pagetype = $_GET['pagetype'];

/// directory where photos are uploaded to
$log_directory = 'dropzone/clients/'.$pagetype.'Temp';

// directory where thumb photos are uploaded to
$log_directory_thumbs = 'dropzone/clients/'.$pagetype.'ThumbsTemp';

// table to insert filenames into
$tableName = $pagetype;

// table to insert thumbnail filenames into
$tableNameThumbs = $pagetype.'Thumbs';

//$pagetypeURL = $rootURL .'/admin/dropzone/'.$pagetype.'Perm/';
$pagetypeURL = 'dropzone/clients/'.$pagetype.'Perm/';

//$pagetypeThumbsURL = $rootURL .'/admin/dropzone/'.$pagetype.'ThumbsPerm/';
$pagetypeThumbsURL = 'dropzone/clients/'.$pagetype.'ThumbsPerm';

// directory where photos are moved to
$final_directory = 'dropzone/clients/'.$pagetype.'Perm';

// directory where thumb photos are moved to
$final_directory_thumbs = 'dropzone/clients/'.$pagetype.'ThumbsPerm';

$tempFolderThumbs = $pagetype.'ThumbsTemp';

$tempFolder = $pagetype.'Temp';

$tableNameLive = $pagetype.'Live';

$tableNameThumbsLive = $tableNameThumbs. 'Live';

// store content in a session
session_start();
 
// create an array
$data = array('$pagetype'=>$pagetype,'$log_directory'=>$log_directory, '$log_directory_thumbs'=>$log_directory_thumbs,'$tableName'=>$tableName,'$tableNameThumbs'=>$tableNameThumbs,'$pagetypeURL'=>$pagetypeURL,'$pagetypeThumbsURL'=>$pagetypeThumbsURL,'$final_directory'=>$final_directory,'$final_directory_thumbs'=>$final_directory_thumbs,'$tempFolderThumbs'=>$tempFolderThumbs, '$tempFolder'=>$tempFolder, '$tableNameLive'=>$tableNameLive, '$tableNameThumbsLive' => $tableNameThumbsLive);
 
// put the array in a session variable
$_SESSION['settings']=$data;

echo $pagetype;

?>

