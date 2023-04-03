<?php

// if($_SESSION["autoriser"] != "oui"){
//     header("location:../views/client.php");
//     die();
// }
require "../model/dbcrud.php";
$rvid=rand(1000,9000);
$rv_name=$_POST["rvname"];
$rv_ser=$_POST["rvservice"];
$rv_time=$_POST["timerv"];
$client=$_SESSION["id"];

$obj = new Crud();
$obj->insert2($rvid,$rv_name,$rv_ser,$rv_time,$client);

if(!$obj){
    echo "problem";
}else{
    $_SESSION["success-alert"]="<div class=\"d-flex justify-content-center mt-2\">
     <div class=\"alert alert-success mt-4\">
     <b>the Appointement inserted successfully 👌</B> 
     </div>
    </div>";
    header("location:../views/appointement.php");
}


?>