<?php
require 'header.php';
require 'connect.php';

?>
<?php 

  
 $thisday=date('Y-m-d');

// Check connection
  
$sql1 = "SELECT * FROM rondezvous where DAT_RDV>='$thisday'  ";
$result = connecte()->query($sql1);
if ($result->num_rows > 0) {
    echo "<table border=1 style='width:80%'>
        <tr>
           <th>id</th>
		   <th>DAT_RDV</th>
           <th>HEURE_RDV</th>
           <th>Patient</th> 
		   <th>AnnulerRDV</th>
		<tr>";
    while($row = $result->fetch_assoc()) {
		 echo "<tr><td>". $row["id"]. " </td><td>". $row["DAT_RDV"]."</td><td> " . $row["HEURE_RDV"]. " </td><td>".getNamePatienFromid($row["idPatient"])."</td>
		 
		 <td><input type='submit' value='DeleteDRV'></td>";
       
    }
} else {
    echo "vous n'avez pas de Rendez vous ";
}
 echo "</table >";
?>

<a href='getAllPatient.php'><div class='link'> Get All Patient Profile </div></a>
<a href='searchPatient.php' ><div class='link'>search Patient</div></a>
<a href='doctor.php'>page d'accueil</a>
<a onclick='window.print()'>Imprimer</a>


<?php

require 'footer.php';
?>

<?php 

function getNamePatienFromid($ID_PAT)
{
	


// Check connection
if (connecte()>connect_error) {
    die("Connection failed: " . connecte()->connect_error);
} 
$sql1 = "SELECT 	Nom_PAT ,Prenom_PAT FROM patientprofile where  	id='$ID_PAT' ";
$result = connecte()->query($sql1);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    	return  "".$row["Nom_PAT"]." ".$row["Prenom_PAT"];
		
    }
} else {
    echo "vous n'avez pas de  RDV  ";
}
	
}
?>