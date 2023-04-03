<?php 
include "../../model/dbcrud.php";
$obj= new Crud();
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