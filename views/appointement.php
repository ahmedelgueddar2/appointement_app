<?php
session_start();
if($_SESSION["autoriser"]!="oui"){
    header("location:loginclt.php");
}


?>
<?php
require "header.php";


?>
<?php echo @$_SESSION["success-alert"]; ?>
<div class="container mt-4">
<form action="../controller/insertion2.php" method="POST">
 <label for="" class="mt-2">
    <b>Nom de Rendez-vous</b>
 </label>  
 <div class="input-group mb-3 mt-3">
  <input type="text" class="form-control" placeholder="RV NAME" name="rvname">
</div>
 <label for="" class="mt-2">
    <b>Service Souhaitez</b>
 </label>  
 <div class="input-group mb-3 mt-3">
 <select class="form-select"  name="rvservice">
  <option selected value="Consultation">Consultation</option>
  <option value="Service One"> Service One</option>
  <option value="Service Two">Service Two</option>
  <option value="Service Three">Service Three</option>
</select>
</div>
<label for="" class="mt-2">
    <b>Date et Heure De Rendez Vous</b>
 </label>  
 <div class="input-group mb-3 mt-3">
  <input type="datetime-local" class="form-control" placeholder="Time RV" name="timerv">
</div>
<div class=" d-flex justify-content-end mt-5">
   <input type="submit" value="Book Appointement" class="btn btn-primary" name="takerdv">
</div>




</form>
</div>
</body>
</html>