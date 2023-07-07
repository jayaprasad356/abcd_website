<?php
$user_id = 11; // Replace with the actual user_id

$data = array(
    "user_id" => $user_id,
);

$apiUrl = "https://abcd.graymatterworks.com/api/transaction_lists.php"; // Replace with the actual API URL

$curl = curl_init($apiUrl);

curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($curl);

$datetime = ""; 

if ($response === false) {
    // Error in cURL request
    echo "Error: " . curl_error($curl);
} else {
    // Successful API response
    $responseData = json_decode($response, true);
    if ($responseData !== null && $responseData["success"]) {
        // Display transaction details
        $transactions = $responseData["data"];
        if (!empty($transactions)) {
            $datetime = $transactions[0]["datetime"];
            $amount = $transactions[0]["amount"];
        } else {
            echo "No transactions found.";
        }
    } else {
        echo "Failed to fetch transaction details.";
        if ($responseData !== null) {
            echo " Error message: " . $responseData["message"];
        }
    }
}

curl_close($curl);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>wallet</title>
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
      background-color: rgb(255, 255, 255);
      font-size: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(203, 196, 196, 0.437);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .small-box {
      width: 300px;
      margin-top: -280px;
      height: 200px;
      padding: 10px 20px 30px;
      background-color: rgb(255, 255, 255);
      font-size: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(9, 7, 7, 0.437);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .small-box h5 {
      top: 130px;
      margin-top: -20px;
      padding-top: 50px;
    }

    .small-box h6 {
      margin-top: 0;
      line-height: 0;
    }

    .withdrawal-button {
      margin-top: 10px;
      width: 230px;
      height: 30px;
      font-size: 18px;
      border-radius: 5px;
    }

    .box1 button.withdrawal-button {
      background-color: rgb(109, 87, 137);
      color: white;
    }

    .box2 button.withdrawal-button {
      background-color: rgb(243, 211, 8);
      color: white;
    }
    footer {
      position: absolute;
      bottom: 0;
      left: 0;
      margin: 10px;
      display: flex;
      align-items: center;
      font-size: 14px;
    }
    
    footer svg {
      margin-right: 5px;
    }

    /* Additional CSS for the person icon */
    .regform .person-icon {
      position: absolute;
      top: 520px;
      bottom:100px;
      left: 490px;
      fill: #333; /* Change the fill color of the icon */
    }
    .regform .wallet-icon {
      position: absolute;
      top: 520px;
      bottom:100px;
      left: 560px;
      fill: #333; /* Change the fill color of the icon */
      color:#333;
    }
    .regform .home-icon {
      position: absolute;
      top: 520px;
      bottom:100px;
      left: 630px;
      fill: #333; /* Change the fill color of the icon */
      color:#333;
    }
    .regform .men-icon {
      position: absolute;
      top: 520px;
      bottom:100px;
      left: 700px;
      fill: #333; /* Change the fill color of the icon */
      color:#333;
    }
    .regform .map-icon {
      position: absolute;
      top: 520px;
      bottom:100px;
      left: 760px;
      fill: #333; /* Change the fill color of the icon */
      color:#333;
    }
    .box2{
      background-color: rgb(109, 87, 137);
      position: absolute;
      width: 330px;
      height: 60px;
      top:270px;
    }
    .box2 p{
      color:white;
      position: absolute;
      font-size: 15px;
      left:54px;
      top:-2px;
    }
    .box2 p1{
      color:white;
      position: absolute;
      font-size: 12px;
      left:54px;
      top:34px;
    }
    .box2 .currency-icon{
      color:white;
      position: absolute;
      font-size: 12px;
      left:10px;
      top:13px;
      background-color:skyblue;
    }
    .box3{
      position: absolute;
      width: 45px;
      height: 22px;
      left:270px;
      top:20px;
      font-size: 13px;
      background-color:white;
      color:green;
    }
  </style>
</head>
<body>
  <div class="regform">
  <a href="profile.php">
    <svg class="person-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
      </svg>
  </a>
      <a href ="wallet.php">
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
    <div class="small-box">
      <h5>balance=$204.0+0.00</h5>
      <h6>Total codes refund paid - rs 0.00</h6>
      <h6>Total codes refund paid - rs 0.00</h6>
      <h6>Total codes refund paid - rs 0.00</h6>
      <div class="box1">
        <a href="withdrawal.php">
      <button class="withdrawal-button">Withdrawal</button>
    </a>
    </div>
    </div>
    <div class="box2">
    <svg class="currency-icon" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
  <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z"/>
</svg>
<div class="box3">
<p2> +<?php echo $amount; ?></p2>
</div>
      <p>Amount Credited for Qr code</p>  
     <p1><?php echo $datetime; ?></p1>
    </div>
</div>
</body>
</html>
