<?php
require 'header.php';
require 'connect.php';

?>
<?php
$thisday=date('Y-m-d');
$ID_PAT=$_POST['IdPatient'];
// Check connection
if (connecte()->connect_error) {
    die("Connection failed: " . connecte()->connect_error);
} 
$sql1 = "SELECT count(*)   as TotalRDV  FROM rondezvous where 	idPatient='$ID_PAT' and DAT_RDV >= '$thisday' ";
$result = connecte()->query($sql1);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    	echo "vous avez  ". $row["TotalRDV"] ."  dans les prochains jours";
		
    }
} else {
    echo "vous n'avez pas de RDV dans les prochains jours  ";
}


///
$sql2 = "SELECT id,DAT_RDV,HEURE_RDV,idPatient  FROM rondezvous where 	idPatient='$ID_PAT' and DAT_RDV >= '$thisday' ";
$result = connecte()->query($sql2);
if ($result->num_rows > 0) {
   echo "<table border=1 style='width:80%'>
        <tr>
           <th>id</th>
		   <th>Name Patient</th>
		   <th>DAT_RDV</th>
           <th>HEURE_RDV</th>
		   <th>Annuler</th>
            
		<tr>";
    while($row = $result->fetch_assoc()) {
		 echo "<tr><td>". $row["id"]. " </td><td>".getNamePatienFromid($ID_PAT)."</td><td> " . $row["DAT_RDV"]. " </td><td>" .$row["HEURE_RDV"]. "</td>
		 <td><form action='deleteRDV.php' method='post'>
               <input id='IdPatient' name='IdPatient' type='hidden' value=".$ID_PAT.">
			   <input id='IdRDV' name='IdRDV' type='hidden' value=". $row["id"]. ">
			   
              <button name='submit'>AnnulerRDV</button>
        </form></td><tr>";
		 
		
       
    }
	}
	else {
    echo "vous n'avez pas de compte ";
}
 echo "</table>"; 
?>


<?php 
$ID_PAT=$_POST['IdPatient'];
function getNamePatienFromid($ID_PAT)
{
	


// Check connection
if (connecte()->connect_error) {
    die("Connection failed: " . connecte()->connect_error);
} 
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
<div>
<button onclick='window.print()' >Inprimer </button>
<a href="javascript:history.go(-1)">Home</a>
</div>
<?php

require 'footer.php';
?>
