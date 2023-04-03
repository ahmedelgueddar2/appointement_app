<?php
session_start();
if(@$_SESSION["autoriser"] != "oui"){
  header("location:404.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../css/client.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
</head>
<body style="background-color:whitesmoke; color:black;">
    <?php
    require "header.php";
    
    ?>
    <div class="d-flex justify-content-end m-5">
<button class="h-25 btn btn-primary mt-4 p-3" id="download"><i class="fa-solid fa-download"></i> Télechargers La Fiche Profil</button></div>
<!-- PDF  -->
<div class="cardsss" id="invoice">  
<div class="container mt-5">
<div class="row">
  <div class="col-sm-8">
    <h3>Profil</h3>
    <img src="../images/<?php echo $_SESSION["srcimg"]; ?>" width="150px" height="150px" alt="">
  </div>
  <div class="col-sm-4 mt-5">
    <h3><b>
      <?php
      echo $_SESSION["clt"];
      
      ?>
    </b></h3>
  </div>
  
  <div class="col-sm-8 mt-5">
  <span class="mt-5" style="font-size:15pt;" >Email :</span>
   <h5>
     <B>
       <?php
       echo $_SESSION["mailclt"];
       ?>
    </B>
   </h5>

  </div>
  <div class="col-sm-4 mt-5 ">
  <span class="mt-5" style="font-size:15pt;" >Ville :</span>
   <h5>
     <B>
       <?php
       echo $_SESSION["ville"];
       ?>
    </B>
   </h5>
  </div>

</div>
<h2 class="mt-5" style="text-align:center;">Rendez-Vous</h2>
<?php 
// Affichage des rendez-vous
include "../controller/showrv.php";

?>
<div class="d-flex justify-content-around mt-5 flex-wrap-wrap" style="flex-wrap:wrap !important;">
<?php

require "../QR/qrcode.php";
$qc = new QRCODE(); 

// create text QR code 
$qc->TEXT("Nom :{$_SESSION['clt']} \n Ville : {$_SESSION['ville']} \n Email :{$_SESSION['mailclt']}"); 

// render QR code
$qc->QRCODE(400,"../images/code.png");


?>
<img src="../images/code.png" alt="" width="170px" height="170px">





</div>

</div>
</div>
<script>
  // this is script for downoading page as pdf
  window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'FicheProfil.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
</script>
</body>
</html>