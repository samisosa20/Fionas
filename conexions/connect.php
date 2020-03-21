<?php

$servername = "localhost";
$username = "root";
$password = "%SAMgut95%";
$db = "fionadb";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
   //die("Connection failed: " . mysqli_connect_error());
   echo 100;
} 
/*else {
	echo "Connected successfully";
}*/
?>