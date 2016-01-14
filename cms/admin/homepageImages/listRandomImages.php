<html>
<head>
<link href="../../css/general.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="contentWrap">
<h1>Manage homepage images</h1>
<a href ="../dropzone/indexRandom.php">Add more photos</a><br /><br />
<a href="../index.php">Back to form</a><br /><br />

<form action="deleteRandomImage.php" method="get">
							<select name="file">
							<option selected="selected">Choose photo</option>

	<?php
	$path = '../dropzone/randomPhotos';
	foreach (new DirectoryIterator($path) as $fileInfo) {
    if($fileInfo->isDot()) continue;
    $file =  $path.$fileInfo->getFilename();
   	echo '<option value="'.$fileInfo.'">'.$fileInfo.'</option>';
	}
	?>

</select>
<input type="submit" value="Delete photo"> 
</form>
		
	<?php
	$path = '../dropzone/randomPhotos';
	foreach (new DirectoryIterator($path) as $fileInfo) {
    if($fileInfo->isDot()) continue;
    $file =  $path.$fileInfo->getFilename();
   	echo '<img class="randomHomepagePix" src="'.$path.'/'.$fileInfo.'"><br />'.$fileInfo.'<br /><br />';
	}
	?>

</div>
</body>
</html>