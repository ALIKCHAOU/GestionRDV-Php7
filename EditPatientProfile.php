<link rel = "stylesheet"   type = "text/css"   href = "EditPatientProfile.css" />

<?php 

require 'connect.php';
$ID_PAT=$_POST['IdPatient'];

$sql1 = "SELECT Nom_PAT, Prenom_PAT,PROF_PAT,Age_PAT,ADR_PAT,Tel_PAT,SEX_PAT,Note_PAT,FicheTech FROM patientprofile Where id= '$ID_PAT'";
$result = connecte()->query($sql1);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		
        echo" 
     <form action='".UpadatePatient()."' method='post'>
      <div>  
     <div><label for='Nom'>Nom :</label> <input type='text' id='Nom' name='Nom_PAT'   value=" . $row["Nom_PAT"]. " placeholder='Nom'   maxlength='10' minlength='3' required   />  </div>
	 <div><label for='Prenom'>Prenom :</label> <input type='text' id='Prenom'  name='Prenom_PAT' value=" . $row["Prenom_PAT"]. " maxlength='10'  minlength='3'placeholder='Prenom' required /> </div>
     <div><label for='SEX_PAT'> SEX_PAT :</label>   <input type='text'  id='SEX_PAT' name='SEX_PAT' value=" . $row["SEX_PAT"]. " /> </div>
	<div> <label for='PROF'> Profession :</label>   <input type='text'  id='PROF' name='PROF_PAT' value=" . $row["PROF_PAT"]. " placeholder='Profession'  maxlength='10'required /> </div>
	<div> <label for='TEL'>Tel :</label>	 <input type='tel' id='phone' name='Tel_PAT'  id='TEL' value='" . $row["Tel_PAT"]. "'  required  /> </div>
	<div> <label for='naissance'>Age :</label> <input type='number'  id='naissance' name='Age_PAT'    value=" . $row["Age_PAT"]. "  required  /> </div>
	<div> <label for='ADR'>Adress :</label> <br><textarea    id='ADR' name='ADR_PAT' required /> " . $row["ADR_PAT"]. "</textarea> </div>
	<div><label for='Note'>Note :</label><br> <textarea   id='Note' name='Note_PAT' required > " . $row["Note_PAT"]. "</textarea> </div>
	</div>
	<div>
	<div><label for='FicheTech'>Fiche Technique :</label><br> <textarea   id='FicheTech' name='FicheTech'  />" . $row["FicheTech"]. "  </textarea> </div>
	<input id='Id' name='IdPatient' type='hidden' value=". $ID_PAT. "><br>
    <button name='UpadatePatient' id='save'type='submit'>Save</button>
	</div>


</form>";
  
    }
} else {
    echo "vous n'avez pas de compte ";
}
?>
<div class='btn'>
<a href='getAllPatient.php'>liste Patient</a>
<a href='doctor.php'>page d'accueil</a>

<a onclick='window.print()'>Imprimer</a>
</div>
<?php

require 'footer.php';
?>
<?php 

function UpadatePatient()
{  
	if (isset($_POST['UpadatePatient'])) {
   $IdPatient=$_POST['IdPatient'];
   $Nom_PAT=$_POST['Nom_PAT'];
   $Prenom_PAT=$_POST['Prenom_PAT'];  
   $PROF_PAT=$_POST['PROF_PAT'];
   $Age_PAT = $_POST['Age_PAT'];
   $ADR_PAT=$_POST['ADR_PAT'];
   $Tel_PAT=$_POST['Tel_PAT'];
   $SEX_PAT=$_POST['SEX_PAT'];
   $Note_PAT=$_POST['Note_PAT'];
   $FicheTech=$_POST['FicheTech'];

   
 
   
   
	if (connecte()->connect_error) {
    die("Connection failed: " . connecte()->connect_error);
} 

$sql = "UPDATE patientprofile SET Nom_PAT='$Nom_PAT' ,Prenom_PAT='$Prenom_PAT' ,PROF_PAT='$PROF_PAT',Age_PAT='$Age_PAT',Tel_PAT='$Tel_PAT', Note_PAT='$Note_PAT',FicheTech='$FicheTech'  WHERE id='$IdPatient' ";

if (connecte()->query($sql) === TRUE) {
	
    echo "Patient updated successfully";

	

} else {
    echo "Error updating record: " . connecte()->error;
}

connecte()->close();
	}
}
?>