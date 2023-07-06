
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>generate</title>
  <link rel="stylesheet" href="register.css">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      padding: 0;
    }

    .regform {
      width: 300px;
      height: 500px;
      padding: 10px 20px 30px;
      background-color: rgb(109, 87, 137);
      font-size: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(196, 197, 203, 0.437);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .box11 {
    position: absolute;
    top: 100px; 
    left: 470px;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    color: #000;
  }
  .input {
    width: 400px;
    
  }

  .input input {
    width: 80%; /* Adjust the desired width */
    height: 30px; /* Adjust the desired height */
    font-size: 13px;
    border-radius: 10px;
  }

    /* Additional CSS for the person icon */
    .regform .person-icon {
      position: absolute;
      top: 560px;
      bottom:100px;
      left: 490px;
      fill: #333; /* Change the fill color of the icon */
    }
    .regform .wallet-icon {
      position: absolute;
      top: 560px;
      bottom:100px;
      left: 560px;
      fill: #333; /* Change the fill color of the icon */
      color:#333;
    }
    .regform .home-icon {
      position: absolute;
      top: 560px;
      bottom:100px;
      left: 630px;
      fill: #333; /* Change the fill color of the icon */
      color:#333;
    }
    .regform .men-icon {
      position: absolute;
      top: 560px;
      bottom:100px;
      left: 700px;
      fill: #333; /* Change the fill color of the icon */
      color:#333;
    }
    .regform .map-icon {
      position: absolute;
      top: 560px;
      bottom:100px;
      left: 770px;
      fill: #333; /* Change the fill color of the icon */
      color:#333;
    }
    .regform .qr-icon{
        position: absolute;
      top: 100px;
      bottom:100px;
    }
    .regform p{
        position: absolute;
      bottom:290px;
        color:white;
        font-size: 15px;
    }
    .regform p1{
        position: absolute;
      bottom:260px;
        color:yellow;
        font-size: 15px;
    }
    .regform .img {
  position: absolute;
  bottom: 200px;
  top:100px;
  color: yellow;
  font-size: 15px;
}

.regform img {
    position: absolute;
  bottom: 150px;
  width: 200px; /* Adjust the width as per your requirement */
  height: 80px; /* The height will adjust proportionally */
}

  </style>
</head>
<body>
  <div class="regform">
  <svg  class="qr-icon" xmlns="http://www.w3.org/2000/svg" width="120" height="150" fill="white" class="bi bi-qr-code" viewBox="0 0 16 16">
  <path d="M2 2h2v2H2V2Z"/>
  <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z"/>
  <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z"/>
  <path d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z"/>
  <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z"/>
</svg>
<p>code generate successful</p>
<p1>Refer and Earn Rs.640.0 instanly</p1>
  <a href="profile.php">
  <svg class="person-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
  </svg>
  </a>
  <a href="wallet.php">
      <svg class="wallet-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
        <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
      </svg>
      </a>
      <a href="home.php">
  <svg class="home-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
  </svg>
</a>
  <svg class="men-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  </svg>
  <svg class="map-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-compass-fill" viewBox="0 0 16 16">
    <path d="M15.5 8.516a7.5 7.5 0 1 1-9.462-7.24A1 1 0 0 1 7 0h2a1 1 0 0 1 .962 1.276 7.503 7.503 0 0 1 5.538 7.24zm-3.61-3.905L6.94 7.439 4.11 12.39l4.95-2.828 2.828-4.95z"/>
  </svg>
  <img src="https://www.idfcfirstbank.com/content/dam/idfcfirstbank/images/blog/earn-money-by-referring-personal-loan-717x404.jpg" alt="Earn money by referring personal loan">
</div>


</body>
</html>
