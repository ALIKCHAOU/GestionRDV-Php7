<?php
require 'header.php';
require 'connect.php';

?>
<?php
 if (isset($_POST['savePresence']))
	{
		$presnce=$_POST['Presence'] ;
		$id=$_POST['IdPatient'] ;
		$DAT_RDV=$_POST['DAT_RDV']; 
		$HEURE_RDV=$_POST['HEURE_RDV'];
	
	$sql = "UPDATE `rondezvous` SET  `Presence`='$presnce' WHERE  idPatient='$id' and DAT_RDV='$DAT_RDV' and HEURE_RDV='$HEURE_RDV' ";
	if (connecte()->query($sql) === TRUE) {
	
    echo "Patient presence update  successfully";

	

} else {
    echo "Error updating record: " . connecte()->error;
}
connecte()->close();
	}


?>
<?php 


 $thisday=date('Y-m-d');


// Check connection
  
$sql1 = "SELECT * FROM rondezvous where DAT_RDV ='$thisday'  ";
$result = connecte()->query($sql1);
if ($result->num_rows > 0) {
    echo "<form  action='getRDVTODAY.php'  method='post'>
	<table border=1 style='width:80%'>
        <tr>
           <th>id</th>
		   <th>DAT_RDV</th>
           <th>HEURE_RDV</th>
           <th>Patient</th>
		   <th> Presence</th> 	
           <th>Modifier Presence</th> 		   
		<tr>";
    while($row = $result->fetch_assoc()) {
		 echo "<tr><td>". $row["id"]. " </td><td>". $row["DAT_RDV"]."</td><td> " . $row["HEURE_RDV"]. " </td><td>".getNamePatienFromid($row["idPatient"])."</td><td>" . $row["Presence"]. "</td><td>
		 

	<form  action='getRDVTODAY.php'  method='post'>
  <input type='radio' name='Presence' value='present'> present
  <input type='radio' name='Presence' value='absent'>absent 
  <input id='Id' name='IdPatient' type='hidden' value=". $row["idPatient"]. ">
    <input  name='DAT_RDV' type='hidden' value=".$row["DAT_RDV"].">
   <input  name='HEURE_RDV' type='hidden' value=".$row["HEURE_RDV"].">
  <input type='submit' name='savePresence' value='savePresence'>
  </form>
</form></td></tr>";


       
    }
}
 
 else {
    echo "vous n'avez pas de RDV aujourd'hui ";
}
echo "</table>";

	
?>
<?php 

function getNamePatienFromid($ID_PAT)
{
	
$sql1 = "SELECT 	Nom_PAT, Prenom_PAT  FROM patientprofile where  	id='$ID_PAT' ";
$result = connecte()->query($sql1);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    	return  $row["Nom_PAT"]." ". $row["Prenom_PAT"];
		
    }
} else {
    echo "vous n'avez pas de  RDV  ";
}	
}
?>

<a href='doctor.php'>page d'accueil</a>
<a onclick='window.print()'>Imprimer</a>
<?php
require 'footer.php';
?>
