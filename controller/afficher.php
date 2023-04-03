<?php
session_start();
if(! isset($_SESSION["auto"])){
    header("location:http://127.1.1.0/appointement_app/views/adminlogin.php");
    die();
}
else{
    
    $idclt=$_GET["idclt"];
    $_SESSION["idclt"]=$idclt;
    
   

}
?>
<?php
include "../model/connexion.php";
$req=$db->prepare("SELECT * FROM clients WHERE id=?");
$req->execute(array($idclt));
$result = $req->fetch(PDO::FETCH_ASSOC);
if(!$result){
    echo "undefined client";
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        .back{
            position:absolute;
            top:20px;
            right:50px;
            font-size:20pt;
            cursor:pointer;
        }
    </style>
</head>
<body>
    <div class="back">
    <i class="fa-solid fa-arrow-left"></i>
    </div>
    <div class="container d-flex justify-content-center align-items-center"">
<div class="card">
  <div class="card-header">
  Client N° 
   <?= $result["id"] ;?>
  </div>
  <div class="card-body">
    <h5 class="card-title">Nom Client : <?= $result["nom"] ?></h5>
    <p class="card-text"><b>Email</b> : <?= $result["email"]?></p>
    <button  class="btn btn-primary" id="mybtn"><b>Rendez_vous</b></button>
    <button  class="btn btn-danger" id="mybtn2" style="display:none;"><b>Masquer Les RV</b></button>
    <div id="mytab"></div>
  </div>
</div>
</div>




<script>
   let btn = document.querySelector("#mybtn");
   let btn2 = document.querySelector("#mybtn2");
   let tabcontainer = document.querySelector("#mytab");
   let back= document.querySelector(".back");
   function getdata(){
    let xhr = new XMLHttpRequest();
    xhr.onload=()=>{
        if(xhr.status==200 && xhr.readyState==4){
            tabcontainer.innerHTML=xhr.response;
        }
    }
    xhr.open("GET","tableaff.php",true);
    xhr.send();




   }


   btn.onclick=()=>{
    btn2.style.display="inline";
    tabcontainer.style.display="block";
    getdata();
    
   }
   btn2.onclick=()=>{
    tabcontainer.style.display="none";
    btn2.style.display="none";
   }

    back.onclick=()=>{
        window.history.back();
    
    }
   
</script>
</body>
</html>
