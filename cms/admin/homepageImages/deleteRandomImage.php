<?php
header("Location: listRandomImages.php");

$file = $_GET['file'];

unlink('../dropzone/randomPhotos/'.$file);
?>
