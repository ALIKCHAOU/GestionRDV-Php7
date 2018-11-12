<link rel = "stylesheet"   type = "text/css"   href = "ficheTechnique.css" />

<?php
require 'connect.php';
$ID_PAT=$_POST['IdPatient'];



$sql1 = "SELECT Nom_PAT, Prenom_PAT,PROF_PAT,Age_PAT,ADR_PAT,Tel_PAT,SEX_PAT,Note_PAT,FicheTech FROM patientprofile Where id= '$ID_PAT'";
$result = $conn->query($sql1);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		
        echo" 
     <form action='FicheTechPatient.php' method='post'>
        <div>
      <div> <label for='Nom'>Nom :</label> <input type='text' id='Nom' name='Nom_PAT'   value=" . $row["Nom_PAT"]. "  readonly='readonly' />  </div>
	  <div> <label for='Prenom'>Prenom :</label> <input type='text' id='Prenom'  name='Prenom_PAT' value=" . $row["Prenom_PAT"]. " readonly='readonly'  /></div>
      <div> <label for='PROF'> SEX :</label>   <input type='text'  id='SEX_PAT' name='SEX_PAT' value=" . $row["SEX_PAT"]. " readonly='readonly' /></div>
	  <div> <label for='PROF'> Profession :</label>   <input type='text'  id='PROF' name='PROF_PAT' value=" . $row["PROF_PAT"]. " readonly='readonly'/></div>
	  <div> <label for='TEL'>Tel :</label>	 <input type='tel' id='phone' name='Tel_PAT'  id='TEL' value='" . $row["Tel_PAT"]. "'  readonly='readonly'  /></div>
	  <div> <label for='naissance'>Age :</label> <input type='number'  id='naissance' name='Age_PAT'    value=" . $row["Age_PAT"]. " readonly='readonly'   /></div>
	  <div> <label for='ADR'>Adress :</label> <br><textarea    id='ADR' name='ADR_PAT' readonly='readonly' /> " . $row["ADR_PAT"]. "</textarea></div>
	  <div><label for='Note'>Note :</label><br> <textarea   id='Note' name='Note_PAT' readonly='readonly'   > " . $row["Note_PAT"]. "</textarea></div>
     </div>

	 <div>	<label for='FicheTech'>Fiche Technique :</label><br> <textarea   id='FicheTech' name='FicheTech'  />" . $row["FicheTech"]. "  </textarea>
	<input id='Id' name='IdPatient' type='hidden' value=". $ID_PAT. "><br>
    <button name='UpadatePatient'  id='save' type='submit'>Save</button> </div>

	
    
	
	


</form>";
  
    }
} else {
    echo "vous n'avez pas de compte ";
}
    

  



?>
<?php 
<a href='getAllPatient.php'>liste Patient</a>
<a href='doctor.php'>page d'accueil</a>

<a onclick='window.print()'>Imprimer</a>
<?php

require 'footer.php';
?>
