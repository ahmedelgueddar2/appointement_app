<?php 
session_start();
$idclt = $_SESSION["idclt"];
require "../model/connexion.php";
$req =$db->prepare("SELECT * FROM rendez_vous WHERE id_clt=? ");
$req->execute(array($idclt));
$result=$req->fetchAll(PDO::FETCH_ASSOC);
if(!$result){
    echo "ce client n'a pas de rendez vous";
}else{
    echo "<table class='table table-hover'>";
    echo "<thead>
    <tr>
      
      <th scope=\"col\">Nom_rdv</th>
      <th scope=\"col\">Service_rdv</th>
      <th scope=\"col\">Temps_rdv</th>
    </tr>
    </thead>
    ";
    foreach($result as $d){
        echo "<tr>
           <td>{$d["rd_name"]}</td>
           <td>{$d["rd_service"]}</td>
           <td>{$d["rd_time"]}</td>
           </tr>";
    }
    echo "<tbody>";
    echo "</tbody>";
    echo "</table>";
}




?>