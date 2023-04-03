<?php
$server="127.1.1.0";
$userdb="root";
$pass="";
$dbname="rv";
try{
  
    $db= new PDO("mysql:host=$server;dbname=$dbname",$userdb,$pass);
   

}
catch(PDOException $e){
    echo "connexion failed ".$e->getMessage();
}


?>