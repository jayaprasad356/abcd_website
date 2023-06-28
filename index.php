<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $city = $_POST["city"];
    $dob = $_POST["dob"];
    $device_id = $_POST["device_id"];

    $api_url = "https://localhost/abcd_web/api/register.php";

    $data = array(
        "name" => $name,
        "mobile" => $mobile,
        "password" => $password,
        "email" => $email,
        "city" => $city,
        "dob" => $dob,
        "device_id" => $device_id,
    );

    $curl = curl_init($api_url);

    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($curl);

    if ($response === false) {
        // Error in cURL request
        echo "Error: " . curl_error($curl);
    } else {
      
        $responseData = json_decode($response, true);
        if ($responseData["success"]) {
            echo '<script>alert("Registered successfully.");</script>';
            header("Location: login.php"); 
            exit();
        } else {
            echo '<script>alert("User already registered.");</script>';
        }
    }

    curl_close($curl);
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
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
      width: 330px;
      height: 750px;
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
    .regform .arrow-icon{
    position: absolute;
      bottom:540px;
      left: 480px;
      font-size: 12px;
      color:red;
      
}
.regform h4{
    position: absolute;
      bottom:525px;
      left: 590px;
      font-size: 14px;
      color:rgb(249, 246, 246);
      
}
.regform p{
    position: absolute;
      bottom:480px;
      left: 470px;
      font-size: 14px;
      color:rgb(242, 242, 15);
      
}
.regform p1{
    position: absolute;
      bottom:410px;
      left: 470px;
      font-size: 14px;
      color:rgb(242, 242, 15);
      
}
.regform p2{
    position: absolute;
      bottom:330px;
      left: 470px;
      font-size: 14px;
      color:rgb(242, 242, 15);
      
}
.regform p3{
    position: absolute;
      bottom:250px;
      left: 470px;
      font-size: 14px;
      color:rgb(242, 242, 15);
      
}
.regform p4{
    position: absolute;
      bottom:170px;
      left: 470px;
      font-size: 14px;
      color:rgb(242, 242, 15);
      
}
.regform p5{
    position: absolute;
      bottom:90px;
      left: 470px;
      font-size: 14px;
      color:rgb(242, 242, 15);
      
}
.regform p6{
    position: absolute;
      bottom:10px;
      left: 470px;
      font-size: 14px;
      color:rgb(242, 242, 15);
      
}
.box7 {
    position: absolute;
    top: 80px; /* Adjust the top value to move it down */
    left: 470px;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    color: #000;
  }
  .input {
    width:350px; /* Adjust the desired width */
  }

  .input input {
    width: 100%; /* Adjust the desired width */
    height: 50px; /* Adjust the desired height */
    font-size: 13px;
    border-radius: 10px;
  }

  .box8 {
    position: absolute;
    top: 165px; /* Adjust the top value to move it down */
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
  .box9 {
    position: absolute;
    top: 240px; /* Adjust the top value to move it down */
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
    top: 320px; /* Adjust the top value to move it down */
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
  .box11 {
    position: absolute;
    top: 400px; /* Adjust the top value to move it down */
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
  .box12 {
    position: absolute;
    top: 480px; /* Adjust the top value to move it down */
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
  .box13 {
    position: absolute;
    top: 560px; /* Adjust the top value to move it down */
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
  .small-box3{
    position: absolute;
      top:630px;
      left: 535px;
      font-size: 14px;
      height: 40px;
        width: 200px;
        background-color: rgb(93, 93, 228);
        border-radius: 10px;
      color:rgb(2, 2, 2);
  }
  </style>
</head>
<body>
  <div class="regform">
    <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-arrow-left" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
    </svg>
    <h4>create an account</h4>
    <p>Name</p>
    <p1>Phone No</p1>
    <p2>Password</p2>
    <p3>Select Date of Birth</p3>
    <p4>Email</p4><p5>City</p5>
    <p6>Device id</p6>
    <div class="box7">
    <form method="post" action="index.php">
      <div class="input">
        <input type="text" id="name" name="name" placeholder="Name" class="form-control" required>
      </div>
    </div>
    <div class="box8">
      <div class="input">
        <input type="text" id="mobile" name="mobile" placeholder="phone number" class="form-control" required>
      </div>
    </div>
    <div class="box9">
      <div class="input">
        <input type="password" id="password" name="password" placeholder="password" class="form-control" required>
      </div>
    </div>
    <div class="box10">
      <div class="input">
        <input type="date" id="dob" name="dob" placeholder="DOB" class="form-control" required>
      </div>
    </div>
    <div class="box11">
      <div class="input">
        <input type="email" id="email" name="email" placeholder="email" class="form-control" required>
      </div>
    </div>
    <div class="box12">
      <div class="input">
        <input type="text" id="city" name="city" placeholder="city" class="form-control" required>
      </div>
    </div>
    <div class="box13">
      <div class="input">
        <input type="text" id="device_id" name="device_id" placeholder="device_id" class="form-control" required>
      </div>
    </div>
      <button class="small-box3" id="signInButton">sign up</button>
    </div>
</form>
</body>
</html>
