<link rel = "stylesheet"   type = "text/css"   href = "searchPatient.css" />

<?php
require 'connect.php';
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `patientprofile` WHERE CONCAT(`id`, `Prenom_PAT`, `Nom_PAT`, `CIN_PAT`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query =  "SELECT *   FROM patientprofile ";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
	
    $filter_Result = mysqli_query(connecte(), $query);
    return $filter_Result;
}

?>
<?php
require 'header.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>SEARCH Patient</title>
        
    </head>
    <body>
        
        <form action="searchPatient.php" method="post">
		<h3>Use  id or Prenom_PAT or  Nom_PAT or  CIN_PAT to search</h3>
		<div class='search'>
            <input type="text" name="valueToSearch" placeholder="Value To Search">
            <input type="submit" name="search" value="search" id='search'>
          </div> 
            <table>
               <tr>
			 <th>id</th>
		   <th>Profiledate</th>          
		   <th>Firstname</th>
           <th>Lastname</th>
           <th>CIN</th>
           <th>PROF_PAT</th>
           <th>Age_PAT</th>
           <th>Tel_PAT</th>
           <th>Note</th>		   
          
          </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
				  
                    <td><?php echo $row['id'];?></td>
					 <td><?php echo $row['Profiledate'];?></td>
                    <td><?php echo $row['Nom_PAT'];?></td>
                    <td><?php echo $row['Prenom_PAT'];?></td>
                    <td><?php echo $row['CIN_PAT'];?></td>
					<td><?php echo $row['PROF_PAT'];?></td>
					<td><?php echo $row['Age_PAT'];?></td>
					<td><?php echo $row['Tel_PAT'];?></td>					
					<td><?php echo $row['Note_PAT'];?></td>
					
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        <div class='btn'>
<a href='getAllPatient.php'>liste Patient</a>
<a href='doctor.php'>page d'accueil</a>

<a  onclick='window.print()'>Imprimer</a>
</div>
    </body>
	<?php

require 'footer.php';
?>
</html>
