<link rel = "stylesheet"   type = "text/css"   href = "rendezvous.css" />
<?php
require 'header.php';
require 'connect.php';

?>



<?php

date_default_timezone_set('Africa/Tunis');
$ID_PAT=$_POST['IdPatient'];
$next_date = new DateTime();
$next_date->modify('+1 day');

function insertRDV()
{ 
$ID_PAT=$_POST['IdPatient'];  
	if (isset($_POST['confirmationRDV'])) {
     $rondezvous=$_POST['rondezvous']; 
     $date=$_POST['date'];
     $Conformation =$_POST['Conformation']; 
	 $ID_PAT=$_POST['IdPatient'];
	
  //echo(strftime("%w", $date));

   if(date("w", strtotime($_POST['date']))==0 || date("w", strtotime($_POST['date']))==6)
   {  echo 'on travaille pas le weekend ' ;}
   else if(valideRDV( $date,$rondezvous)){
	   $sql1 = "INSERT INTO rondezvous ( verificationTel,DAT_RDV,HEURE_RDV,idPatient)
VALUES ( '$Conformation','$date','$rondezvous','$ID_PAT')";
if (connecte()->query($sql1) === TRUE) {    echo "New RDV created successfully le $date a $rondezvous  pour <br>";
echo getNamePatienFromid($ID_PAT) ;}
} 
 else {
    echo "le rendez vous est pris pour quelqu un d autre essai de changer le Heur ou la date " ;}
   

}
}

function valideRDV($date ,$rondezvous)
{
	$sq = "select HEURE_RDV ,DAT_RDV From  rondezvous  Where HEURE_RDV='$rondezvous' and  DAT_RDV='$date'" ;
$result = connecte()->query($sq);
if ($result->num_rows > 0)
{ 
	
	return false  ; }
else {
	
	return true ;
}


}
function getNamePatienFromid($ID_PAT)
{
	

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
    echo "vous n'avez pas de  DE COMPTE   ";
}	
}



?>

<?php

$ID_PAT=$_POST['IdPatient'];



    date_default_timezone_set('Africa/Tunis');
    echo "	<form action='".insertRDV()."' method='post'>
	<p>Formulaire de prise de rendez_vous :</p>
	<div><label>Déterminez le jour</label> <input type='date' name='date'    min='".$next_date->format('Y-m-d')."' max='2019-12-31' required > </div>
	<div><label>Déterminez  la plage horaire </label>  
  <input type='radio'name='rondezvous' value='8H_9H'checked>08H_09H 
  <input type='radio'name='rondezvous' value='9H_10H'>09H_10H
  <input type='radio'name='rondezvous' value='10H_11H'> 10H_11H
  <input type='radio'name='rondezvous' value='11H_12H'>11H_12H
  <input type='radio'name='rondezvous' value='14H_15H'> 14H_15H
  <input type='radio'name='rondezvous' value='15H_16H'>15H_16H
  <input type='radio'name='rondezvous' value='16H_17H'>16H_17H
  <input type='radio'name='rondezvous' value='17H_18H'>17H_18H
  </div>
  
  
  <div>Telephone Conformation
  <input type='radio'name='Conformation'value='oui'>oui
  <input type='radio'name='Conformation'value='non' checked>non
  </div>
  <input id='Id' name='IdPatient' type='hidden' value=". $ID_PAT. ">
	
  <input type='submit' value='confirmationRDV' name='confirmationRDV'>
  </form>";
?>
<a href="javascript:history.go(-1)">Home</a>
<?php

require 'footer.php';
?>




