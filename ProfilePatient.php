<?php
require 'header.php';
require 'connect.php';

?>
<?php 
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
   $Login_PAT=$_POST['Login_PAT'];
   $MotedePasse_PAT=$_POST['MotedePasse_PAT'];
   $CIN=$_POST['CIN_PAT'];

   
 
   
   
	if (connecte()->connect_error) {
    die("Connection failed: " . connecte()->connect_error);
} 

$sql = "UPDATE patientprofile SET Nom_PAT='$Nom_PAT' ,Login_PAT='$Login_PAT',Prenom_PAT='$Prenom_PAT',MotedePasse_PAT='$MotedePasse_PAT' ,PROF_PAT='$PROF_PAT',Age_PAT='$Age_PAT',Tel_PAT='$Tel_PAT', Note_PAT='$Note_PAT' WHERE id='$IdPatient' ";

if (connecte()->query($sql) === TRUE) {
	
    echo "Patient updated successfully";
	

} else {
    echo "Error updating record: " . connecte()->error;
}
// update autentification 

$sql = " UPDATE autentification SET Login='$Login_PAT',MotedePasse='$MotedePasse_PAT'  WHERE  CIN='$CIN' ";

if (connecte()->query($sql) === TRUE) {
	
    echo "autentification  updated successfully";
	

} else {
    echo "Error updating record: " . connecte()->error;
}





connecte()->close();
	}
?>

<?php 


$ID_PAT=$_POST['IdPatient'];



$sql1 = "SELECT Nom_PAT,CIN_PAT, Prenom_PAT,PROF_PAT,Age_PAT,ADR_PAT,Tel_PAT,SEX_PAT,Login_PAT ,MotedePasse_PAT,Note_PAT  FROM patientprofile Where id= '$ID_PAT'";
$result = connecte()->query($sql1);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		
        echo" 
     <form action='' method='post'>
        
     <div><label for='Nom'>Nom :<span class='error'>*</span></label> <input type='text' id='Nom' name='Nom_PAT'   value=" . $row["Nom_PAT"]. "   required/>  </div>
	<div> <label for='Prenom'>Prenom :<span class='error'>*</span></label> <input type='text' id='Prenom'  name='Prenom_PAT' value=" . $row["Prenom_PAT"]. "  required /></div>
    <div> <label for='SEX_PAT'> SEX_PAT :<span class='error'>*</span></label>   <input type='text'  id='SEX_PAT' name='SEX_PAT' value=" . $row["SEX_PAT"]. " required /></div>
	<div> <label for='PROF'> Profession :<span class='error'>*</span></label>   <input type='text'  id='PROF' name='PROF_PAT' value=" . $row["PROF_PAT"]. " required /></div>
	<div> <label for='TEL'>Tel :<span class='error'>*</span></label>	 <input type='tel' id='phone' name='Tel_PAT'  id='TEL' value='" . $row["Tel_PAT"]. "'  required  /></div>
	<div> <label for='naissance'>Age :<span class='error'>*</span></label> <input type='number'  id='naissance' name='Age_PAT'    value=" . $row["Age_PAT"]. "   required /></div>
	<div> <label for='ADR'>Adress :<span class='error'>*</span></label> <br><textarea    id='ADR' name='ADR_PAT' required /> " . $row["ADR_PAT"]. "</textarea></div>
    <div><label for='Note'>Note :<span class='error'>*</span></label><br> <textarea   id='Note' name='Note_PAT' > " . $row["Note_PAT"]. "</textarea></div>
     <div><label for='CIN'>CIN :<span class='error'>*</span></label>  <input type='tel' id='CIN' value='" . $row["CIN_PAT"]. "' name='CIN_PAT' placeholder='CIN '  readonly /></div>
	<div> <label for='Login'>Login :<span class='error'>*</span></label>   <input type='text' id='Login' name='Login_PAT' value=" . $row["Login_PAT"]. "  /></div>
	<div><label for='password'>Password :<span class='error'>*</span></label>   <input type='text' id='password' name='MotedePasse_PAT' value=" . $row["MotedePasse_PAT"]. "  /></div>
	<input id='Id' name='IdPatient' type='hidden' value=". $ID_PAT. ">
	

	
    
	
	
    <button name='UpadatePatient' type='submit'>Save</button> 


</form>";
  
    }
} else {
    echo "vous n'avez pas de compte ";
}
    


connecte()->close();


?>

   <a href="javascript:history.go(-1)">Home</a>
   <?php

require 'footer.php';
?>
