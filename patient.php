<link rel = "stylesheet"   type = "text/css"   href = "patient.css" />
<?php
require 'header.php';
require 'connect.php';
?>
<?php

$login=$_GET['Login'];
$cin=$_GET['CIN'];  
$sql1 = "SELECT  id ,Nom_PAT,FicheTech, Prenom_PAT,PROF_PAT,Age_PAT,ADR_PAT,Tel_PAT,SEX_PAT,Note_PAT,Login_PAT ,MotedePasse_PAT FROM patientprofile Where CIN_PAT='$cin' and 	Login_PAT='$login'";
$result = connecte()->query($sql1);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		
        echo" 
     <form action='ProfilePatient.php' method='post'>
        
     <div><label for='Nom'>Nom :</label> <input type='text' id='Nom' name='Nom_PAT'   value=" . $row["Nom_PAT"]. "  readonly /> </div>
	<div> <label for='Prenom'>Prenom:</label> <input type='text' id='Prenom'  name='Prenom_PAT' value=" . $row["Prenom_PAT"]. " readonly /></div>
    <div> <label for='PROF'> SEX_PAT :</label>   <input type='text'  id='SEX_PAT' name='SEX_PAT' value=" . $row["SEX_PAT"]. " readonly /></div>
	<div> <label for='PROF'> Profession :</label>   <input type='text'  id='PROF' name='PROF_PAT' value=" . $row["PROF_PAT"]. " readonly /></div>
	<div> <label for='TEL'>Tel :</label>	 <input type='tel' id='phone' name='Tel_PAT'  id='TEL' value='" . $row["Tel_PAT"]. "'   readonly /></div>
	<div> <label for='naissance'>Age :</label> <input type='number'  id='naissance' name='Age_PAT'    value=" . $row["Age_PAT"]. "  readonly   /></div>
	<div> <label for='ADR'>Adress :</label> <br><textarea    id='ADR' name='ADR_PAT'  readonly /> " . $row["ADR_PAT"]. "</textarea></div>
	<div><label for='Note'>Note :</label><br> <textarea   id='Note' name='Note_PAT' readonly > " . $row["Note_PAT"]. "</textarea></div>
	 <div>	<label for='FicheTech'>Fiche Technique :</label><br> <textarea   id='FicheTech' name='FicheTech' readonly='readonly'  />" . $row["FicheTech"]. "  </textarea></div>
	<div><input id='Id' name='IdPatient' type='hidden' value=". $row["id"]. "></div>
	
    <button name='' type='submit'>Edit Profile</button> 


</form>";
echo"
<form action='rendezvous.php' method='post'>
<input id='Id' name='IdPatient' type='hidden' value=". $row["id"]. ">
 <button name='' type='submit'>Get RDV</button> 
</form>";


echo"
<form action='listRDVParPatient.php' method='post'>
<input id='Id' name='IdPatient' type='hidden' value=". $row["id"]. ">
 <button name='' type='submit'>liste RDV</button> 
</form>";






    }
} else {
    echo "vous n'avez pas de compte ";
}


?>

<a href="/" > deconnèction </a>
<?php

require 'footer.php';
?>


