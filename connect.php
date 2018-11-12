<?php
//require 'connect.php';connecte()
function connecte()
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else
{ 
          return $conn ;}
// Check connection

}
//$result =connecte()->query($sql1);
?>
