<?php
require "../model/dbcrud.php";
$obj1 = new Crud();

$result = $obj1->affichrdv();
if(!$result){
    echo "<div class='alert alert-danger' >
    <b>Vous N'avez Aucun Rendez-Vous Enregistré</b></div>";
}else{
    echo "<table class='table table-hover mt-5'>";
    echo "<thead>
    <tr>
      <th scope=\"col\">Date</th>
      <th scope=\"col\">Nom_de_Rendez_vous</th>
      <th scope=\"col\">Docteur</th>
     
    </tr>
  </thead>";
  echo "<tbody>";
  foreach($result as $d){

     echo "<tr>
             <td>{$d['rd_time']}</td>
             <td>{$d['rd_name']}</td>
             <td>{$d['rd_service']}</td>
     
     
     
           </tr>";
         

  }
  echo "</tbody></table>";

}












?>