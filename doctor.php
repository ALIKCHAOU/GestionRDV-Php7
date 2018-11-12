<link rel = "stylesheet"   type = "text/css"   href = "doctor.css" />
<?php
require 'header.php';

?>
<div class='deconnection'><a href='/gestionRendezvous'> Dèconection </a></div>
<center><h1>Welcome  Doctoor </h1></center>


<div class='conatainerdoc'>
<div class='link'> <a href='getAllPatient.php'>Get All Patient Profile </a></div>
<div class='link'><a href='searchPatient.php' >chercher Patient</a></div>

<div class='link'><a href='getAllRDV.php' >Liste de tout les Rendez  vous</a></div>

<div class='link'><a href='getRDVTODAY.php' >Liste des  Rendez  vous de aujourd'hui </a></div>

<div class='link'><a href='#' >Liste des  Rendez  vous la semaine prochaine</a></div>

<div class='link'><a href='#' >Liste des  Rendez  vous le mois prochain</a></div>

</div>

<?php

require 'footer.php';
?>