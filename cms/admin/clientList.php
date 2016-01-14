
<html>
<head>
<link href="../css/general.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="contentWrap">
		<h1>Client List</h1>
			
<?php
echo '<a href="index.php">Form</a>';

echo '<p>Click to see client webpage (opens in new browser window)...</p>';

// this taken from here http://stackoverflow.com/questions/4050511/how-to-list-files-and-folder-in-a-dir-php

// Create recursive dir iterator which skips dot folders
$dir = new RecursiveDirectoryIterator('../clients', FilesystemIterator::SKIP_DOTS);

// Flatten the recursive iterator, folders come before their files
$it  = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::SELF_FIRST);

// Maximum depth is 1 level deeper than the base folder
$it->setMaxDepth(0);
	
// Basic loop displaying different messages based on file or folder
foreach ($it as $fileinfo) {
    if ($fileinfo->isDir()) {
     echo '<a href="'.'../clients/'. $fileinfo->getFilename() .'" target="_blank">'.$fileinfo->getFilename().'</a><br />';
    }
}

?>
</div>
</body>
</html>