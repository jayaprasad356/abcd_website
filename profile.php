<?php
$user_id = 11; // Replace with the actual user_id

$data = array(
    "user_id" => $user_id,
);

$apiUrl = "https://abcd.graymatterworks.com/api/userdetails.php"; // Replace with the actual API URL

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
        $userdetails = $responseData["data"];
        if (!empty($userdetails)) {
            $name = $userdetails[0]["name"];
            $total_codes = $userdetails[0]["total_codes"];
            $withdrawal = $userdetails[0]["withdrawal"];
            $refer_code = $userdetails[0]["refer_code"];
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
  <title>profile</title>
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
      height: 600px;
      padding: 10px 20px 30px;
      background-color: rgb(224, 217, 231);
      font-size: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(203, 196, 196, 0.437);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .box-container {
  display: flex;
  justify-content: space-between;
}
.box-container h6 {
    margin-top: 50px;
}

.small-box1 {
    position: absolute;
    bottom:330px;
    right:520px;
  width: 50px;
  height: 10px;
  padding: 10px 20px 30px;
  background-color: rgb(255, 255, 255);
  font-size: 13px;
  box-shadow: 0 0 5px rgba(9, 7, 7, 0.437);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
}

.small-box10 {
    position: absolute;
    top:500px;
    right:480px;
  width: 250px;
  height: 30px;
  padding: 10px 20px 30px;
  font-size: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(9, 7, 7, 0.437);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background-color: rgb(109, 87, 137);
}

.small-box2 {
    position: absolute;
    bottom:330px;
    left:530px;
  width: 50px;
  height: 10px;
  padding: 10px 20px 30px;
  background-color: rgb(255, 255, 255);
  font-size: 12px;
  box-shadow: 0 0 5px rgba(9, 7, 7, 0.437);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
}
.small-box2 h6 {
    position: absolute;
    bottom:-7px;
    left:9px;
    right:10px;
}

    .small-box {
      
        margin-top: -70px;
        margin-left:10px;
        margin-bottom:150px;
      width: 260px;
      height: 240px; /* Adjust the height as desired */
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


    .top-half {
      width: 100%;
      height: 40%;
      background-color: rgb(90, 72, 119); /* Change the color for the top half */
      border-radius: 10px 10px 0 0;
      margin-top:-100px;
    }
    

    .small-box5 {
  position: absolute;
  top: 80%;
  left: 46%;
  height: 30px;
  width: 110px;
  background-color: rgb(15, 140, 243);
  color: #000000; /* Dark black color */
  font-family: bold;
  border-color: rgb(15, 140, 243);
  font-weight: bold; /* Make the font bold */
}
   
      /* Additional CSS for the person icon */
      .regform .person-icon {
      position: absolute;
      top: 580px;
      bottom:100px;
      left: 490px;
      fill: #333; /* Change the fill color of the icon */
    }
    .regform .wallet-icon {
      position: absolute;
      top: 580px;
      bottom:100px;
      left: 560px;
      fill: #333; /* Change the fill color of the icon */
      color:#333;
    }
    .regform .home-icon {
      position: absolute;
      top: 580px;
      bottom:100px;
      left: 630px;
      fill: #333; /* Change the fill color of the icon */
      color:#333;
    }
    .regform .men-icon {
      position: absolute;
      top: 580px;
      bottom:100px;
      left: 700px;
      fill: #333; /* Change the fill color of the icon */
      color:#333;
    }
    .regform .map-icon {
      position: absolute;
      top: 580px;
      bottom:100px;
      left: 760px;
      fill: #333; /* Change the fill color of the icon */
      color:#333;
    }
    .small-box .test-icon {
      position: absolute;
      top: 120px;
      bottom:100px;
      fill: #333; /* Change the fill color of the icon */
      color:#333;
    }
   
    .top-half {
        background-color: rgb(109, 87, 137);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 10px;
}

.top-half h5 {
  color: rgb(243, 239, 239);
  margin: 0;
  position: absolute;
    bottom:530px;
    right:730px; 
}

.top-half svg {
  fill: white;
  color: white;
  position: absolute;
    bottom:530px;
    right:480px; 
}
.small-box p{
    position: absolute;
    bottom:380px;
    right:560px; 
}
.small-box3 {
    position: absolute;
    width:190px;
    height: 30px;
    top:260px;
    right:530px;
    background-color: rgb(109, 87, 137);
    color: black;
  /* Add other styles as needed */
}
.small-box4 {
    position: absolute;
    width:120px;
    height: 25px;
    top:340px;
    right:570px;
    background-color: rgb(243, 211, 8);
    color: black;
  /* Add other styles as needed */
}
.small-box10 p{
    position: absolute;
    top:-20px;
    right:30px;
    color:white;
}
.small-box6{
    position: absolute;
    width:150px;
    height:30px;
    top:30px;
    left:70px;
    font-size: 12px;
    background-color: aliceblue;
}
.box11 h6{
  font-family: Arial, sans-serif;
    position: absolute;
    bottom:230px;
    left:560px;
    font-size: 8px;
}
.small-box .img {
  position: absolute;
  bottom: 100px;
  top:100px;
  color: yellow;
  font-size: 15px;
}
.small-box img {
  position: absolute;
  bottom: 430px;
  width: 100px; /* Adjust the width as per your requirement */
  height: 100px; /* The height will adjust proportionally */
  border-radius: 60%; /* Make the image rounded */
}

  </style>
</head>
<body>
    <div class="regform">
        <div class="top-half">
          <h5>profile</h5>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
          </svg>
        </div>
    <div class="bottom-half">
           <!-- <button class="small-box5">Apply Leave</button>-->
      <svg class="person-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
      </svg>
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
    <div class="small-box">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbM-2IhHeIHlulPlhBeI_F6pSRxwxd_KcGsYM3Bm_NMX6LM6I54d4i6KR_nW6z07PB7KI&usqp=CAU">
          <p><?php echo $name; ?></p>
          <div class="box-container">
            <div class="small-box1"><h6>Total Codes <?php echo $total_codes; ?></h6></div>
            <div class="small-box2"><h6>Total Withdrawals <?php echo $withdrawal; ?></h6></div>
          </div>
        <!-- <div class="box4">
            <button class="small-box3">MY REFERAL EARN</button>
          </div>
          
          <div class="box5">
            <button class="small-box4">TRIAL EARNING</button>
          </div>-->
    </div>
    <div class="small-box10">
      <p>Your Refer Code: <?php echo $refer_code; ?></p>
      <button class="small-box6">copy to share</button>
    </div>
   <!-- <div class="box11">
        <h6>click above to show your 6% earning</h6>
      </div>-->

</div>
</body>
</html>
