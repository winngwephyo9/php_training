<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tutorial7</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h2 class="card-title">Generate QR Code</h2>
    <form id="generateQrForm" class="form-signin">
      <div class="form-label-group">
        <label for="inputEmail"><b>Text For QR</b> <span style="color: #FF0000">*</span></label>
        <input type="text" name="qrText" id="qrText" required placeholder="Enter something to generate QR">
      </div> <br />
      <div id="generatedQr text-center">
        <img src="" id="generatedQrImg" class="center-block">
      </div> <br />
      <button type="submit" name="generateQrBtn" id="generateQrBtn" class="btn-submit">Generate QR</button>
    </form>
  </div>
  <script type="text/javascript" src="js/generate-qr.js"></script>
  <script src="js/library/jquery-3.4.1.min.js"></script>
</body>

</html>