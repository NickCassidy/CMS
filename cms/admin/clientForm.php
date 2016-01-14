<html>
<head>
<link href="../css/general.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<h1>Delete photos</h1> 
		<div id="contentWrap">

						<form action="deleteItem.php" method="get">
							<select name="item">
							<option selected="selected">Choose photo</option>
<?php
require 'clientFormDropdown.php';
?>
						</select>
					<input type="submit" value="Submit"> 
					</form>
		</div>
</body>
</html> 