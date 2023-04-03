<?php 
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header("location:../views/index.php");
    die();
}
$login=$_POST["logadmin"];
$pass = $_POST["passadmin"];
// require "../model/dbcrud.php";

require "../model/dbcrud.php";
$obj= new Crud();
$obj->checklogadmin($login,$pass);








?>