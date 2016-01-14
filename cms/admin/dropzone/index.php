<html> 
	<head>   
			<link href="../../css/general.css" type="text/css" rel="stylesheet" />
			<link href="downloads/css/dropzone.css" type="text/css" rel="stylesheet" />
			<script src="downloads/dropzone.min.js"></script>
 	</head>
 
		<body>
	
<?php 

// retrieve settings from session 
 
// loop through the session array with foreach
session_start();
foreach($_SESSION['settings'] as $key=>$value)
    {
    // and print out the values
    $key.' = '."'".$value."'".";".'<br />';
    }
 
$pagetype = $_SESSION['settings']['$pagetype']; 


// validate form 
/*
if ( !preg_match( "/^[a-zA-Z0-9.,'?!:\s]{1,20}+$/", $pagetype)){ 
echo '<script type="text/javascript">alert("letters and numbers only");</script>';
echo '<script type="text/javascript">location.replace("../index.php");</script>';
}
*/

echo '<h1>Upload ' . strtoupper($pagetype) . ' files</h1>'; 
?>
<!-- 3 -->
<a href="../index.php">Start Again</a><br /><br />

<?php

// conditional code to show relevant navigation 

// get referrer page - this produces an array
$ref = $_SERVER['HTTP_REFERER'];
$ref = explode("/", $ref);

// get last page in array
$referringPage = end($ref);

// can get items in array by this eg $ref[6] 

if ($referringPage == 'index.php') 
{
echo '<a href="../addFilesToDbTables.php">Next</a><br />';
}
elseif ($referringPage == '') 
{
echo '<a href="../addFilesToDbTables.php">Next</a><br />';
}
elseif ($referringPage == 'createSessionNewClientPage.php') 
{
echo '<a href="../addFilesToDbTables.php">Next</a><br />';
}
elseif ($referringPage == 'previewPage.php')
{
echo '<a href="../addExtraFilesToDbTables.php">Next</a><br />';
}
elseif ($referringPage == 'addFilesToDbTables.php')
{
echo '<a href="../addExtraFilesToDbTables.php">Next</a><br />';
}
elseif ($referringPage == 'addExtraFilesToDbTables.php')
{
echo '<a href="../addExtraFilesToDbTables.php">Next</a><br />';
}
elseif ($referringPage == 'previewPageReditLive.php')
{
echo '<a href="../addExtraFilesToDbTables.php">Next</a><br />';
}

?>
			<h2>Large photos</h2>
				<form action="upload.php" class="dropzone"></form>
			<h2>Thumbnails</h2>
				<form action="uploadThumb.php" class="dropzone"></form>
		</body>
 </html>
