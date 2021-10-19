<?php
include "library/qrlib.php";
if (isset($_POST['generateQr']) == 'generateQr') {
  $qrText = $_POST['qrText']; 
  $directory = "generated-qr/"; 
  $fileName = 'QR-' . rand() . '.png';
  QRcode::png($qrText, $directory . $fileName, 'L', 4, 2); 
  echo "success^" . $directory . $fileName; 
}
