<?php
include "qrcode.php"; 
// Create QRcode object 
$qc = new QRCODE(); 

// create text QR code 
$qc->TEXT("hghghghg"); 

// render QR code
$qc->QRCODE(400,"jsjsj.png");
?>