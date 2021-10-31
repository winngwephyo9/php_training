<?php
include "library/qrlib.php";
if (isset($_POST['generateQr']) == 'generateQr') {
  $QR_TEXT = $_POST['qrText'];
  $DIRECTORY = "generated-qr/";
  $FILENAME = 'QR-' . rand() . '.png';
  QRcode::png($QR_TEXT, $DIRECTORY . $FILENAME, 'L', 4, 2);
  echo "success^" . $DIRECTORY . $FILENAME;
}
