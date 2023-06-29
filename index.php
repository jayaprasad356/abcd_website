<?php
include_once('includes/crud.php');
session_start();
    ob_start(); 
if (isset($_POST['btnSignin'])) {
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $deviceId = 'web';

  
    $data = array(
        "mobile" => $mobile,
        "password" => $password,
        "device_id" => $deviceId,
    );

    $curl = curl_init(API_URL);

    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($curl);

    if ($response === false) {
        // Error in cURL request
        echo "Error: " . curl_error($curl);
    } else {
        // Successful API response
        $responseData = json_decode($response, true);
        if ($responseData["success"] && $responseData["user_verify"] && $responseData["device_verify"]) {
          $_SESSION['id'] = $responseData["data"][0]['id'];
            echo '<script>alert("Login successful.");</script>';
            header("location:home.php");
            exit();
        } else {
            echo '<script>alert("Response: ' . $responseData["message"] . '");</script>';
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
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
      height: 580px;
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
  .box9 {
    position: absolute;
    top: 180px; /* Adjust the top value to move it down */
    left: 470px;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    color: #000;
  }
  .input {
    width: 400px; /* Adjust the desired width */
  }

  .input input {
    width: 80%; /* Adjust the desired width */
    height: 30px; /* Adjust the desired height */
    font-size: 13px;
    border-radius: 10px;
  }
  .box10 {
    position: absolute;
    top: 250px; /* Adjust the top value to move it down */
    left: 470px;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    color: #000;
  }
  .input {
    width: 400px; /* Adjust the desired width */
    
  }

  .input input {
    width: 80%; /* Adjust the desired width */
    height: 30px; /* Adjust the desired height */
    font-size: 13px;
    border-radius: 10px;
  }
  .regform p2{
    position: absolute;
      bottom:390px;
      left: 475px;
      font-size: 14px;
      color:rgb(246, 246, 244);
      
}
.regform p3{
    position: absolute;
      bottom:320px;
      left: 475px;
      font-size: 14px;
      color:rgb(244, 244, 241);
      
}
.regform p{
    position: absolute;
      bottom:245px;
      left: 700px;
      font-size: 14px;
      color:rgb(244, 244, 241);
      
}
.regform p4{
    position: absolute;
      bottom:220px;
      left: 520px;
      font-size: 10px;
      color:rgb(244, 244, 241);
      
}
.regform p5{
    position: absolute;
    right: 555px;
    bottom:35px;
    color:white;
      
}
.small-box3{
    position: absolute;
      bottom:160px;
      left: 525px;
      font-size: 14px;
      height: 40px;
        width: 200px;
        background-color: rgb(93, 93, 228);
        border-radius: 10px;
      color:rgb(2, 2, 2);
  }
  .small-box4{
    position: absolute;
      bottom:110px;
      left: 525px;
      font-size: 14px;
      height: 40px;
        width: 200px;
        background-color: rgb(225, 200, 58);
        border-radius: 10px;
      color:rgb(2, 2, 2);
  }
  .eye-icon{
    position: absolute;
    left: 765px;
    bottom:290px;
  }
  .check{
    position: absolute;
    right: 745px;
    bottom:217px;
  }
  .whatsapp-icon{
    position: absolute;
    right: 665px;
    bottom:27px;
    color:rgb(244, 248, 244);
  }
  .three-icon{
    position: absolute;
    right: 485px;
    bottom:530px;
    color:rgb(244, 248, 244);
  }
  </style>
</head>
<body>
  <div class="regform">
    <p2>phone number</p2>
    <p3>password</p3>
    <p>forgot password</p>
    <p4>i have read and agree the job details and terms & condition </p4>
    <p5>whatsapp us</p5>
    
    <div class="box9">
    <form method="post" enctype="multipart/form-data">
      <div class="input">
        <input type="mobile" id="mobile" name="mobile" placeholder="phone number" class="form-control" required>
      </div>
    </div>
    <div class="box10">
      <div class="input">
        <input type="password" id="password" name="password" placeholder="password" class="form-control" required>
      </div>
    </div>
    <svg class="eye-icon"xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
      </svg>
      <svg class="whatsapp-icon"xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
      </svg>
      <button class="small-box3" id="signInButton" name="btnSignin" >Sign In</button>
      </form>
      
      <button class="small-box4">create new account</button>
      <svg class="three-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
      </svg>
      <input class="check" type="checkbox" id="checkbox" name="remember">
    </div>
</div>


</body>
</html>
