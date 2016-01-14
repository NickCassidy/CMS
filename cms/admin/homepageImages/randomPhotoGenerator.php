<?php

$imagesDir = 'admin/dropzone/randomPhotos/';

$images = glob($imagesDir . '*.{jpg}', GLOB_BRACE);

$randomImage = $images[array_rand($images)];

echo '<img class="rotator" src="'.$randomImage.'">';

?>
