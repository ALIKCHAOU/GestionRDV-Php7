
<html>
<header>
<link rel = "stylesheet"   type = "text/css"   href = "creercompte.css" />


</header>
<?php 
date_default_timezone_set('Africa/Tunis');
require 'connect.php';
require 'header.php';
?>

<body>
<center><h2> creer compte </h2></center>

<?php

echo"
<form action='".insertPatient()."' method='post' >
    <span class='error'>* required field</span> <br>  
     <div><label for='Nom'>Nom : <span class='error'>*</span></label> <input type='text' id='Nom' name='Nom_PAT'  placeholder='Nom'   maxlength='10' minlength='3' required />  </div>
	<div><label for='Prenom'>Prenom :<span class='error'>*</span></label> <input type='text' id='Prenom'  name='Prenom_PAT'  maxlength='10'  minlength='3' placeholder='Prenom' required/></div>
	<div><label for='CIN'>CIN :<span class='error'>*</span></label>  <input type='tel' id='CIN' name='CIN_PAT' placeholder='CIN ' minlength='8' maxlength='8' pattern='[0-9]{8}' required/></div>
	<div><label for='PROF'> Profession :<span class='error'>*</span></label>   <input type='text'  id='PROF' name='PROF_PAT' placeholder='Profession'  maxlength='10'required/></div>
	<div> <label for='Login'>Login :<span class='error'>*</span></label>   <input type='text' id='Login' name='Login_PAT' placeholder='Login' required/></div>
	<div><label for='password'>Password :<span class='error'>*</span></label>   <input type='text' id='password' name='MotedePasse_PAT' placeholder='Mote de passe' required/></div>
	<div> <label for='confirm_password'> Confirmation Password :<span class='error'>*</span></label>   <input type='text' id='confirm_password' name='Confirmation Mote de passe' placeholder='Confirmation Mot de passe' required/></div>
	<div> <label for='TEL'>Tel : <span class='error'>*</span></label>	 <input type='tel' id='phone' name='Tel_PAT'  id='TEL'     placeholder='12 345 678'       pattern='[0-9]{8}'        required /></div>
	<label >SEX :</label><span class='error'>*</span><br>
	  <input type='radio' name='SEX_PAT' value='Mal' id='Mal' checked='checked' /> <label for='Mal'>Mal</label>
      <input type='radio' name='SEX_PAT' value='Femal' id='Femal' />  <label for='Femal'>Femal</label> <br>
	 <label for='naissance'>Date de naissance : <span class='error'>*</span></label> <input type='date' id='naissance' name='Age_PAT'       value=''  min='1903-01-02'        max='".date('Y-m-d')."'  pattern='[0-9]{4}-[0-9]{2}-[0-9]{2}'  required/><br>
	<label for='ADR'>Adress :</label><span class='error'>*</span> <br><textarea minlength='5'   id='ADR' name='ADR_PAT' placeholder='Adress' required /> </textarea><br>
	<br><label for='Note'>Note :</label><br> <textarea   id='Note' name='Note_PAT' placeholder='Notification'  /> </textarea><br>
	<input type='hidden' value='Patient' name='type' >
	<input type='hidden' value='".date('Y-m-d')."' name='Profiledate' >
	
    
	
	
    <button name='submitPatient' type='submit'>Valider</button>
	<button name='reset' type='reset'>Rest</button><br>

</form>";


?>

<div class='linka'><a  class='link'href="/gestionRendezvous/">Page d'accueil </a></div>
<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords confermation erreur");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

</script>
</body>
<?php

require 'footer.php';
?>
</html>
<?php 

function insertPatient()
{ 
 
 
	if (isset($_POST['submitPatient'])) {
   $Nom_PAT=$_POST['Nom_PAT'];
   $Prenom_PAT=$_POST['Prenom_PAT'];
   $CIN_PAT=$_POST['CIN_PAT'];
   $PROF_PAT=$_POST['PROF_PAT'];
   $Age_PAT = date('Y')-date("Y", strtotime($_POST['Age_PAT']));
   $ADR_PAT=$_POST['ADR_PAT'];
   $Tel_PAT=$_POST['Tel_PAT'];
   $SEX_PAT=$_POST['SEX_PAT'];
   $Login_PAT=$_POST['Login_PAT'];
   $MotedePasse_PAT=$_POST['MotedePasse_PAT'];
   $Note_PAT=$_POST['Note_PAT'];
   $type=$_POST['type'];
   $Profiledate=$_POST['Profiledate'];
   
  
   
   
	$sql = "INSERT INTO patientprofile (Nom_PAT, Prenom_PAT, CIN_PAT,PROF_PAT,Age_PAT,ADR_PAT,Tel_PAT,SEX_PAT,Login_PAT,MotedePasse_PAT,Note_PAT,Profiledate)
VALUES ('$Nom_PAT', ' $Prenom_PAT', '$CIN_PAT','$PROF_PAT','$Age_PAT','$ADR_PAT','$Tel_PAT','$SEX_PAT','$Login_PAT','$MotedePasse_PAT','$Note_PAT','$Profiledate')";
$sql1 = "INSERT INTO autentification ( 	Login,CIN,MotedePasse,Type)
VALUES ( '$Login_PAT','$CIN_PAT','$MotedePasse_PAT','$type')";

if (connecte()->query($sql) === TRUE) {
   
} else {
    echo "Error: " . $sql . "<br>" . connecte()->error;
}
if (connecte()->query($sql1) === TRUE) {
	 header('Location: index.php');
 
} else {
    echo "Error: " . $sql . "<br>" . connecte()->error;
}
}


connecte()->close();
}
?>

