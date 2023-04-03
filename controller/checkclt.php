<?php
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header("location:../views/login.php");
    die();
}
$login=$_POST["log"];
$pass = $_POST["pass"];
// require "../model/dbcrud.php";

require "../model/dbcrud.php";
$obj= new Crud();
$obj->checklog($login,$pass);








?>