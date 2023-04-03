<?php

$id=$_GET["idrdv"];
include "../../model/connexion.php";
$req= $db->prepare("DELETE FROM rendez_vous WHERE rd_id=?");
$req->execute(array($id));
header("location:http://127.1.1.0/appointement_app/views/admin/index.php");

?>
