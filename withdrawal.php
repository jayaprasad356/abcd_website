<?php
$user_id = 1; // Replace with the actual user_id

$data = array(
    "user_id" => $user_id,
);

$apiUrl = "https://abcd.graymatterworks.com/api/withdrawal_lists.php"; // Replace with the actual API URL

$curl = curl_init($apiUrl);

curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($curl);

$datetime = ""; // Initialize the variable

if ($response === false) {
    // Error in cURL request
    echo "Error: " . curl_error($curl);
} else {
    // Successful API response
    $responseData = json_decode($response, true);
    if ($responseData !== null && $responseData["success"]) {
        // Display transaction details
        $withdrawals = $responseData["data"];
        if (!empty($withdrawals)) {
            $datetime = $withdrawals[0]["datetime"];
            $amount = $withdrawals[0]["amount"];
            $status = $withdrawals[0]["status"];
        } else {
            echo "No data found.";
        }
    } else {
        echo "Failed to fetch data details.";
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
  <title>withdrawal</title>
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
      background-color: rgb(181, 177, 177);
      font-size: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(203, 196, 196, 0.437);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .small-box {
      width: 270px;
      margin-top: -150px;
      height: 200px;
      padding: 10px 20px 30px;
      background-color: rgb(255, 255, 255);
      font-size: 20px;
      box-shadow: 0 0 10px rgba(9, 7, 7, 0.437);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .small-box1 {
      position: absolute;
      bottom:130px;
      width: 270px;
      height: 40px;
      padding: 10px 20px 30px;
      background-color: rgb(255, 255, 255);
      font-size: 20px;
      box-shadow: 0 0 10px rgba(9, 7, 7, 0.437);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .withdrawal-button {
      position: absolute;
      left:505px;
      top:270px;
      width: 270px;
      height: 30px;
      font-size: 18px;
      border-radius: 5px;
      background-color: rgb(109, 87, 137);
    }
    .top-half .withdrawal-button1 {
      position: absolute;
      bottom: 5px; /* Adjust the top position to overlap the top box */
      left: 82%; /* Center the button horizontally */
      transform: translateX(-50%); /* Center the button horizontally */
      width: 100px;
      height: 30px;
      font-size: 10px;
      border-radius: 5px;
      background-color: rgb(255, 254, 254);
    }
    .top-half .arrow-icon 
    {
      position: absolute;
      top: 10px;
      bottom:100px;
      left: 10px;
    
    }
    .top-half h4 
    {
      position: absolute;
      bottom:-16px;
      left: 40px;
      color:white;
    
    }
    .box1 button.withdrawal-button {
      background-color: rgb(109, 87, 137);
      color: white;
    }

    .top-half {
        background-color: rgb(109, 87, 137);
        height: 40px;
        width: 330px;
        bottom:190px;
        position: absolute;
        position:relative;  
}
.box3 h3{
    position: absolute;
      bottom:430px;
      left: 600px;
      font-size: 20px;
      
}
.box3 h4{
    position: absolute;
      bottom:410px;
      left: 620px;
      font-size: 14px;
      
}
.box3 h2{
    position: absolute;
      bottom:380px;
      left: 500px;
      font-size: 13px;
      
}
.box3::after {
      content: "";
      display: block;
      width: 280px;
      height: 2px;
      background-color: #333;
      position: absolute;
      top:210px;
      left:500px;
    }
    .box3 h6{
    position: absolute;
      bottom:300px;
      left: 500px;
      font-size: 12px;
      color:red;
      
}
.small-box1 p{
  position: absolute;
      bottom:33px;
      left: 20px;
      font-size: 16px;
}
.small-box1 p1{
  position: absolute;
      bottom:29px;
      left: 20px;
      font-size: 16px;
}
.small-box1 p2{
  position: absolute;
      bottom:11px;
      left: 20px;
      font-size: 10px;
}
.small-box1 p3{
  position: absolute;
      bottom:0px;
      left: 150px;
      font-size: 17px;
}
.small-box1 p4{
  position: absolute;
      bottom:0px;
      left: 150px;
      font-size: 15px;
      color:red;
}

  </style>
</head>
<body>
  <div class="regform">
    <div class="top-half">
        <h4>wallet</h4>
        <a href="wallet.php">
        <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
          </svg>
</a>
          <a href="update_bank.php">
        <button class="withdrawal-button1">update bank</button>
</a>
    </div>
    
    <div class="small-box">
      <div class="box1">
      <button class="withdrawal-button">Withdrawal</button>
    </div>
    <div class="box3">
        <h3>Balance ($)</h3>
        <h4>₹<?php echo $amount; ?></h4>
        <h2>Enter Amount</h2>
        <h6>minimum withdrawal rs.250</h6>
    </div>
    </div>
    <div class="small-box1">
    <p>Amount  <p3>₹<?php echo $amount; ?></p3></p>
    <p1>Status: 
<?php
if ($status === "paid") {
    echo '<p4 style="color: green;">'.$status.'</p4>';
} elseif ($status === "cancelled") {
    echo '<p4 style="color: red;">'.$status.'</p4>';
} elseif ($status === "blocked") {
    echo '<p4 style="color: orange;">'.$status.'</p4>';
} else {
    echo $status;
}
?>
</p1>

    <p2 style="margin-top: 10px;"><?php echo $datetime; ?></p2>
    </div>
</div>
</body>
</html>
