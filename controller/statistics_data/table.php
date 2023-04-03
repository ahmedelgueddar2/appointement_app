<?php 
require "../../model/dbcrud.php";
$obj = new Crud();
$data=$obj->rdv_clt();
// echo "<pre>";
// print_r($data);
// echo "</pre>";
echo "<table class='table table-hover'>";
echo "<thead>
<tr>
  <th scope=\"col\">Nom Client</th>
  <th scope=\"col\">Nom_rdv</th>
  <th scope=\"col\">Service_rdv</th>
  <th scope=\"col\">Temps_rdv</th>
  <th scope=\"col\">Action</th>
</tr>
</thead>
";
foreach($data as $d){
    echo "<tr>
       <td>{$d["nom"]}</td>
       <td>{$d["rd_name"]}</td>
       <td>{$d["rd_service"]}</td>
       <td>{$d["rd_time"]}</td>
       <td>
       <a href='../../controller/afficher.php?idclt={$d["id"]}' class='btn btn-success'>Afficher</a>
       <a href='modifier.php?idclt={$d["id"]}&idrdv={$d["rd_id"]}' class='btn btn-info'>Modifier</a>
       <a href='delete.php?idrdv={$d["rd_id"]}' class='btn btn-danger' onclick=\"confirm('Vous Voulez Vraiment Supprimer')\">Supprimer</a>
       </td>
       </tr>";
}
echo "<tbody>";
echo "</tbody>";
echo "</table>";
$datadyali=$obj->villestatistic();
// echo "<pre>";
// print_r($datadyali);
// echo "</pre>";
$ville1=$datadyali[0][0];
$pourcville1=$datadyali[0][1];
$ville2=$datadyali[1][0];
$pourcville2=$datadyali[1][1];
$ville3=$datadyali[2][0];
$pourcville3=$datadyali[2][1];
$villes=[$ville1,$ville2,$ville3];
$dataville=[$pourcville1,$pourcville2,$pourcville3];

?>