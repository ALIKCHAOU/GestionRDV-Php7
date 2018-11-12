<?php
$ID_PAT=$_POST['IdPatient'];
require 'connect.php';

// sql get cin and login from patient table   
$sql1 = "SELECT 	CIN_PAT,Login_PAT FROM patientprofile Where id= '$ID_PAT'";
$result = connecte()->query($sql1);
if ($result->num_rows > 0)
{{
    
    while($row = $result->fetch_assoc()) {
		 $CIN=$row["CIN_PAT"];
		 $login=$row["Login_PAT"];
		 echo $CIN ;
		 echo $login;
		
	}
	 }
} else {
    echo "vous n'avez pas de compte ";
}
// delete a patient  from autentification table
$sql = "DELETE  FROM autentification Where Login='$login' and CIN='$CIN' ";
if (connecte()->query($sql) === TRUE) {
    echo "Record deleted from autentification  successfully";
} else {
    echo "Error deleting record: " . connecte()->error;
}








// sql to delete a patient from    patientprofile table


$sql = "DELETE  FROM patientprofile Where id= '$ID_PAT'";


if (connecte()->query($sql) === TRUE) {
    echo "Record deleted from  patientprofile successfully";
} else {
    echo "Error deleting record: " . connecte()->error;
}
// sql to delete All Patient RDV form    rdv  table

connecte()->close();
?>
<a href='doctor.php' >page d'accueil</a>
<a href='getAllPatient.php'>liste Patient</a>