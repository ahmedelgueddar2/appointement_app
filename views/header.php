<?php
// if($_SERVER["REQUEST_METHOD"] != "POST"){
//   echo "you can't access";
//     die();
// }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- bootstrp -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<!-- Font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap'); 
*{
    font-family: poppins;
}

.navbar-brand{
    color:rgb(22, 188, 248)!important;
    font-size: 22pt !important;
    
}
.navbar-brand span{
    font-weight: bold;
    text-shadow: 0.5px 1px 1px black,-0.5px -1px 1px black ;
}
.nav-link{
    color: rgb(0, 0, 0)!important;
    font-size:12pt  !important;
    transition: 0.1s linear !important;
    font-weight: bold !important;


}
.nav-link:hover{
    color:rgb(55, 135, 247)!important;
}


</style>


</head>
<body>
<nav class="navbar navbar-expand-lg bg-light" style="box-shadow:1px 0px 10px teal;"  >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">The <span>D</span>octor</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="client.php">Acceuil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="appointement.php">Prendre Un RV</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="profil.php">
            Profil
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="decon.php">Deconnexion</a>
        </li>
      
      </ul>
    </div>
  </div>
</nav>
<script>
  let links = document.querySelectorAll(".nav-link");
 links.forEach(function(e){
   e.onclick=()=>{
     e.classList.toggle("act");
   }
 })
</script>
