<?php
session_start();
if(! isset($_SESSION["auto"])){
    header("location:http://127.1.1.0/appointement_app/views/adminlogin.php");
    die();
}
else{
$id_clt=$_GET["idclt"];
$id_rdv=$_GET["idrdv"];
include "../../model/connexion.php";
$req1=$db->prepare("SELECT * FROM clients WHERE id=?");
$req1->execute(array($id_clt));
$data=$req1->fetch(PDO::FETCH_ASSOC);
$req2=$db->prepare("SELECT * FROM rendez_vous WHERE rd_id=?  ");
$req2->execute(array($id_rdv));
// if($data){
//     print_r($data);
// }
$data2=$req2->fetch(PDO::FETCH_ASSOC);




}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Afficher</title>
    <style>
        .container{
            height:100vh;
            
        }
        .card{
            transition:0.3s;
            width:600px;
        }
        .card:hover{
            box-shadow:1px 1px 10px black;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center"">
<div class="card">
  <div class="card-header">
 Modifier Rendez_vous du client
  
  </div>
  <div class="card-body">
    <h5 class="card-title">Nom Client : <b><?= $data["nom"]?> </h5>
    <p class="card-text">Email :<b> <?= $data["email"]?></b> </p>
    <form action="" method="POST">
    <div class="">
  <label class="form-label">Nom Du rendez vous</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nom de rendez_vous" value="<?= $data2["rd_name"] ?>" name="namerv" required>
</div>
    <div class="">
  <label class="form-label">Date Du rendez_vous</label>
  <input type="datetime-local"   class="form-control" id="exampleFormControlInput1" value="<?= $data2["rd_time"]  ?>" name="daterv" required>
</div>
    <div class="">
     <input type="submit" value="Modifier Rv" class=" mt-2 btn btn-primary" name="mofifier_sub">
</div>

 
    </form>

    <?php 
    if(isset($_POST["mofifier_sub"])){
        $newname=$_POST["namerv"];
        $newdate=$_POST["daterv"];
        $req3=$db->prepare("UPDATE rendez_vous SET rd_name=?,rd_time=? WHERE rd_id=?");
        $req3->execute(array($newname,$newdate,$id_rdv));
        header("location:http://127.1.1.0/appointement_app/views/admin/");

    }
    
    
    ?>
   
    
  </div>
</div>
</div>





</body>
</html>
