<?php

require 'connect.php';
// code to populate add titles dropdown with correct number of items  

$clientName = 'clientName';

// retrieve image file name from db
$result = mysqli_query($con,"SELECT $clientName FROM clientTable");

// loop to generate each dropdown item

$i=1;
//for ($i=1; $i<=$num_rows; $i++){
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){


echo '<option value ="'.$row[$clientName].'" name="clientName">'.$row[$clientName].'</option>';
$i++;
}

?>