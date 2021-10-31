<?php
$TXTFILE = 'file\file1.txt';
$EXCELFILE = 'file\file2.excel';
$CSVFILE = 'file\file3.csv';
$DOCFILE = 'file\file4.doc';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial5 _ Read ALL File</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  <div class="accordion_container">
    <div class="accordion_head">Text File<span class="plusminus">+</span></div>
    <div class="accordion_body" style="display: none;">
      <p><?php
          echo file_get_contents($TXTFILE);
          ?>
      </p>
    </div>
    <div class="accordion_head">Excel File<span class="plusminus">+</span></div>
    <div class="accordion_body" style="display: none;">
      <p><?php
          echo file_get_contents($EXCELFILE);
          ?>
      </p>
    </div>
    <div class="accordion_head">CSV File<span class="plusminus">+</span></div>
    <div class="accordion_body" style="display: none;">
      <p><?php
          echo file_get_contents($CSVFILE);
          ?>
      </p>
    </div>
    <div class="accordion_head">Doc File<span class="plusminus">+</span></div>
    <div class="accordion_body" style="display: none;">
      <p><?php
          echo file_get_contents($DOCFILE);
          ?>
      </p>
    </div>

  </div>
  <script src="js/library/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/accordion.js"></script>
</body>

</html>