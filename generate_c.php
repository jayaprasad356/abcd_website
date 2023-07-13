<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="row">
      <div class="col-12 col-sm-12" style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color: rgb(90, 72, 119);">
        <div class="row">
          <div class="col-6">
            <img src="img/qrcode.png" alt="" width="200" height="200">
          </div>
          <div class="col-6">
            <p class="text-light">QR CODE is generated</p>
          </div>
          
        </div>
        
      </div>
      </div>

    </div>

  </div>

  <script>
    setTimeout(() => {
          window.location.href = 'home_c.php';
        }, 2000);
  </script>
</body>

</html>