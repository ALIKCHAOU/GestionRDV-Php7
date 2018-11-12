<link rel = "stylesheet"   type = "text/css"   href = "index.css" />


<?php
require 'header.php';
require 'connect.php';
?>
<?php
echo"
<form method='post' action='".autentifcation()."'>

 <div><label for='Login'>Login :</label>   <input type='text' id='Login' name='Login' placeholder='Login' required/></div>
<div class='cin'><label for='CIN' >CIN :</label> <input type='text' id='CIN' name='CIN' placeholder='Mot de passe' required/></div>
<div class='password'><label for='Motdepasse' >Password :</label>   <input type='password' id='Motdepasse' name='motdepasse' placeholder='Mot de passe' required/></div>
<div class='connect'><input type='submit' name='Seconnecter' value='Se connecter'/><a href='creercompte.php' >creer compte</a></div>
</form>";
?>




<?php

require 'footer.php';
?>
<?php 

function autentifcation()
{ 

if (isset($_POST['Seconnecter'])) {

	$login=$_POST['Login'];
	$motdepass=$_POST['motdepasse'];
	$cin=$_POST['CIN'];
	
	
$sql = "SELECT Type FROM autentification WHERE Login = '$login' and MotedePasse = '$motdepass' and CIN = '$cin'";
$result = connecte()->query($sql);
	if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "Type: " . $row["Type"]. "<br>";
		if( $row["Type"]=="medecin")
		{ echo "hello doctor";
	     
		  header('Location: doctor.php');
		  }
	   else{
		  
		    header("Location: patient.php?Login=$login&CIN=$cin");} 
	   }
    }
	else {
    echo "vous n'avez pas de compte ";
}
} 
 connecte()->close();

}	
?>