<?php

require 'connect.php';

//create client table at outset

$clientTable = 'clientTable';

$sql = "CREATE TABLE $clientTable (PID INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(PID), clientName VARCHAR(30))";
$result = mysqli_query($con,$sql);

echo 'ok';
?>