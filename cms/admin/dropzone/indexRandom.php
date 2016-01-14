<html> 
	<head>   
			<link href="../../css/general.css" type="text/css" rel="stylesheet" />
			<link href="downloads/css/dropzone.css" type="text/css" rel="stylesheet" />
			<script src="downloads/dropzone.min.js"></script>
 	</head>
 
		<body>
	
<?php 

echo '<h1>Upload ' . strtoupper($pagetype) . ' files</h1>'; 
?>
<!-- 3 -->
<a href="../index.php">Form</a><br /><br />

<?php

// conditional code to show relevant navigation 


?>
			<h2>Photos</h2>
				<form action="uploadRandom.php" class="dropzone"></form>
		</body>
 </html>
