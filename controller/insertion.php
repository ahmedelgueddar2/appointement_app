<?php
if($_SERVER["REQUEST_METHOD"] !="POST"){
   
    header("location:../views/404.php");
    die();
}
// recuperation des données

require "../model/dbcrud.php";
$nom = @$_POST["full_name"];
$email = @$_POST["emailreg"];
$ville = @$_POST["ville"];
$passw = @$_POST["passreg"];
$fichier =@$_FILES["image"];
$imgsrc =@$fichier["name"];
$imgtmp =$fichier["tmp_name"]; 
if(isset($_POST["reg"]) && $_POST["g-recaptcha-response"]!= ""){

$secretapi="6Lf_aHcgAAAAALWswQdmTImlZwgTJz3maFJjclXa";
$verifyresp=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretapi.'&response='.$_POST["g-recaptcha-response"]);
$responsedata=json_decode($verifyresp);
if($responsedata->success){

   
$objet = new Crud();
if($fichier["name"]==""){
    $imgsrc="avatar.jpg";
    $testimg=False;
}else{
    $testimg=True;
}
$objet->insert($nom,$email,$ville,$passw,$imgsrc);
if(!$objet){
    // echo "probléme";
}else{
    
    if($testimg){
        move_uploaded_file($imgtmp,"../images/".$imgsrc);
    }
   header("location:../views/loginclt.php");
    
}
}
}else{
    echo "somethin wrong";
}
// header("location:../views/register.php");
// $rows=$objet->afficher();
// echo "<pre>";

// echo "</pre>";



?>