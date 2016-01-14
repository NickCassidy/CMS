<?php

// remove hidden files from array ie those with value of . or .. 
/*
array_search() returns the key of the element it finds, which can be used to remove that element from the original array using unset(). It will return FALSE on failure, however it can return a false-y value on success (if key is 0 for example), which is why the strict comparison !== operator is used.

The if() statement will check whether array_search() returned a value, and will only perform an action if it did.
*/

if(($key = array_search('.', $dirArray)) !== false) {
    unset($dirArray[$key]);
}

if(($key = array_search('..', $dirArray)) !== false) {
    unset($dirArray[$key]);
}

// reset array keys so they are consecutively numbered
$dirArray = array_values($dirArray);


// do the same for thumbs

if(($key = array_search('.', $dirArrayThumbs)) !== false) {
    unset($dirArrayThumbs[$key]);
}

if(($key = array_search('..', $dirArrayThumbs)) !== false) {
    unset($dirArrayThumbs[$key]);
}

// reset array keys so they are consecutively numbered
$dirArrayThumbs = array_values($dirArrayThumbs);

?>