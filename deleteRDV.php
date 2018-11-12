<?php
require 'connect.php';
$ID_PAT=$_POST['IdPatient'];
$IdRDV=$_POST['IdRDV'];

if (connecte()->connect_error) {
    die("Connection failed: " . connecte()->connect_error);
} 
$sql1 ="DELETE  FROM rdv Where  idPatient='$ID_PAT' and  id='$IdRDV' ";
if (connecte()->query($sql1) === TRUE) {
    echo "RDV  deleted   successfully";
} else {
    echo "Error deleting record: " . connecte()->error;
}

?>
<a href="javascript:history.go(-1)">Home</a>