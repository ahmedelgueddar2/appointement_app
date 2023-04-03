<?php 
session_start();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Aceuill</title>
    <style>
      .container{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
projcard-container {
  /* margin: 50px 0; */
}

/* Actual Code: */
.projcard-container,
.projcard-container * {
  box-sizing: border-box;
}
.projcard-container {
  margin-left: auto;
  margin-right: auto;
  width: 1000px;
  margin-top:40px;
}
.projcard {
  position: relative;
  width: 100%;
  height: 300px;
  margin-bottom: 40px;
  border-radius: 10px;
  background-color: #fff;
  border: 2px solid #ddd;
  font-size: 18px;
  overflow: hidden;
  cursor: pointer;
  box-shadow: 0 4px 21px -12px rgba(0, 0, 0, .66);
  transition: box-shadow 0.2s ease, transform 0.2s ease;
}
.projcard:hover {
  box-shadow: 0 34px 32px -33px rgba(0, 0, 0, .18);
  transform: translate(0px, -3px);
}
.projcard::before {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-image: linear-gradient(-70deg, #424242, transparent 50%);
  opacity: 0.07;
}
.projcard:nth-child(2n)::before {
  background-image: linear-gradient(-250deg, #424242, transparent 50%);
}
.projcard-innerbox {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}
.projcard-img {
  position: absolute;
  height: 300px;
  width: 400px;
  top: 0;
  left: 0;
  transition: transform 0.2s ease;
}
.projcard:nth-child(2n) .projcard-img {
  left: initial;
  right: 0;
}
.projcard:hover .projcard-img {
  transform: scale(1.05) rotate(1deg);
}
.projcard:hover .projcard-bar {
  width: 70px;
}
.projcard-textbox {
  position: absolute;
  top: 7%;
  bottom: 7%;
  left: 430px;
  width: calc(100% - 470px);
  font-size: 17px;
}
.projcard:nth-child(2n) .projcard-textbox {
  left: initial;
  right: 430px;
}
.projcard-textbox::before,
.projcard-textbox::after {
  content: "";
  position: absolute;
  display: block;
  background: #ff0000bb;
  background: #fff;
  top: -20%;
  left: -55px;
  height: 140%;
  width: 60px;
  transform: rotate(8deg);
}
.projcard:nth-child(2n) .projcard-textbox::before {
  display: none;
}
.projcard-textbox::after {
  display: none;
  left: initial;
  right: -55px;
}
.projcard:nth-child(2n) .projcard-textbox::after {
  display: block;
}
.projcard-textbox * {
  position: relative;
}
.projcard-title {
  font-family: 'Voces', 'Open Sans', arial, sans-serif;
  font-size: 24px;
}
.projcard-subtitle {
  font-family: 'Voces', 'Open Sans', arial, sans-serif;
  color: #888;
}
.projcard-bar {
  left: -2px;
  width: 50px;
  height: 5px;
  margin: 10px 0;
  border-radius: 5px;
  background-color: #424242;
  transition: width 0.2s ease;
}
.time{
    position: absolute;
    right: 2px;
    bottom:1px;
}



    </style>
</head>
<body>
    <?php
    require "header.php";
    
    
    ?><br>
  <div class="alert alert-success" style="font-size:20pt;"> Bonjour 

    <span style='color:black;text-shadow:2px 2px 7px green;font-size:24pt;'>
     <?= ucwords($_SESSION["clt"]); ?>  
     
    </span>
    Bienvenue Chez The Doctor Family 
</div>
<h3 style="text-decoration:underline; padding-bottom:200px; ">Les Derniers Publications</h3>
<?php 
require "../model/dbcrud.php";
$obj=new Crud();
;
if(!$obj->selectpost()){
  echo "<div class='alert alert-danger' >
  <b>Aucune Publication n'a ete poster</b></div>";
}else{
   $data=$obj->selectpost();
   echo "<div class=\"container\">";
   foreach($data as $d){
    echo "<div class=\"projcard-container\">
    
        <div class=\"projcard projcard-blue\">
          <div class=\"projcard-innerbox\">
            <img class=\"projcard-img\" src=\"../images/{$d['srcimg']}\" />
            <div class=\"projcard-textbox\">
              <div class=\"projcard-title\">{$d["title"]}</div>
              
              <div class=\"projcard-bar\"></div>
              <div class=\"projcard-description\">{$d["description"]}</div>
              <b class=\"time\">{$d["datepost"]}</b>
            </div>
          </div>
        </div>";
   }
   echo "</div>";
}


?>
<script>
    // script pour enlever la selection
    document.onselectstart=(e)=>{
        e.preventDefault();
    }

</script>
</body>
</html>