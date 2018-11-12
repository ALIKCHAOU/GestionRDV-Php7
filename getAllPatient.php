<?php
require 'header.php';
require 'connect.php';

?>
<a href='/'> Dèconection </a><br>
<?php 



  
$sql1 = "SELECT count(*) as total  FROM patientprofile ";
$result = connecte()->query($sql1);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo " le Nombre Total de  Patient : " . $row["total"]. "<br>";
    }
} else {
    echo "vous n'avez pas de compte ";
}

$sql = "SELECT * FROM patientprofile ";
$result = connecte()->query($sql);
 	
if ($result->num_rows > 0) {
    // output data of each row

	echo "<table border=1 style='width:80%'>
        <tr>
           <th>id</th>
		   <th>Date Profile</th>
           <th>Firstname</th>
           <th>Lastname</th> 
           <th>CIN</th>
           <th>PROF_PAT</th>
           <th>Age</th>
           <th>Adress</th>
           <th>Tel_PAT</th>
		   <th>Sex</th>
		   <th>Note Patient</th>
		   <th>Toal RDZ</th>
		   <th>EditProfile</th>
		   <th>FicheTech</th>
		   <th>Delete</th>
		   <th>listeRDV</th>
		   <th>GetRDV</th>
          </tr>";
    while($row = $result->fetch_assoc()) {
	
      
		
        echo "<tr><td>". $row["id"]. " </td><td>". $row["Profiledate"]."</td><td> " . $row["Nom_PAT"]. " </td><td>" . $row["Prenom_PAT"]. "</td><td>". $row["CIN_PAT"]." </td><td>". $row["PROF_PAT"]. "</td><td>" . $row["Age_PAT"]."</td><td>".$row["ADR_PAT"]."</td><td>" . $row["Tel_PAT"]. "</td><td>" . $row["SEX_PAT"]."</td><td>". $row["Note_PAT"]."</td>
		<td>".getlisteRDV($row["id"])."</td>
		<td> 		
		<form action='EditPatientProfile.php' method='post'>

          <input id='Id' name='IdPatient' type='hidden' value=". $row["id"]. ">
           <button name='submit' type='submit'>view&Edit</button>
        </form>		
		</td>
		<td><form action='FicheTechPatient.php' method='post'>

          <input id='Id' name='IdPatient' type='hidden' value=". $row["id"]. ">
           <button name='submit' type='submit'>view&Edit</button>
        </form></td>
		<td><form action='DeletePatient.php' method='post'>

          <input id='Id' name='IdPatient' type='hidden' value=". $row["id"]. ">
           <button name='submit' type='submit'>Delete</button>
        </form></td>
		<td><form action='ListeRDVPatient.php' method='post'>

          <input id='Id' name='IdPatient' type='hidden' value=". $row["id"]. ">
           <button name='submit' type='submit'>view</button>
        </form></td>
		<td><form action='rendezvous.php' method='post'>

          <input id='Id' name='IdPatient' type='hidden' value=". $row["id"]. ">
           <button name='submit' type='submit'>creer  RDV</button>
        </form></td>
		</tr>";

		 
    }
	
} else {
    echo "0 results";
}
echo" </table>";

connecte()->close();
//}
?>
<a href='doctor.php' >page d'accueil</a>

<?php
function getlisteRDV( $id )
{
// Check connection
if (connecte()->connect_error) {
    die("Connection failed: " . connecte()->connect_error);
} 
$sql1 = "SELECT count(*)   as TotalRDV  FROM rondezvous where 	idPatient='$id'  ";
$result = connecte()->query($sql1);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    	return $row["TotalRDV"];
    }
} else {
    echo "vous n'avez pas de RDV ";
}
connecte()->close();
	
	
	
}
?>
<?php

require 'footer.php';
?>
