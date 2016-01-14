<?php 
// form security
if ( !preg_match( "/^[a-zA-Z0-9.,?!:\s]{1,100}+$/", $pagetype)){ 
echo '<script type="text/javascript">alert("letters and numbers only");</script>';
echo '<script type="text/javascript">location.replace("index.php");</script>';
}
?>