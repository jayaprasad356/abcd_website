<?php
$user_id = "20"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $account_num = $_POST["account_num"];
    $holder_name = $_POST["holder_name"];
    $bank = $_POST["bank"];
    $branch = $_POST["branch"];
    $ifsc = $_POST["ifsc"];

   
    $data = array(
        "account_num" => $account_num,
        "holder_name" => $holder_name,
        "bank" => $bank,
        "branch" => $branch,
        "ifsc" => $ifsc,
        "user_id" => $user_id,
    );

    $apiUrl = "https://abcd.graymatterworks.com/api/updatebank.php"; // Replace with the actual API URL

    $curl = curl_init($apiUrl);

    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($curl);

    if ($response === false) {
        // Error in cURL request
        echo "Error: " . curl_error($curl);
    } else {
        $responseData = json_decode($response, true);
        if ($responseData["success"]) {
            echo '<script>alert("Bank details updated successfully.");</script>';
            
        } else {
            echo '<script>alert("User not found or an error occurred.");</script>';
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
  <title>update_bank</title>
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
      height: 550px;
      padding: 10px 20px 30px;
      background-color:white;
      font-size: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(203, 196, 196, 0.437);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .withdrawal-button {
      position: absolute;
      left:540px;
      top:270px;
      width: 200px;
      height: 30px;
      font-size: 18px;
      border-radius: 5px;
      background-color: rgb(109, 87, 137);
    }
    .top-half .withdrawal-button1 {
      position: absolute;
      bottom: 10px; /* Adjust the top position to overlap the top box */
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

    .top-half {
        background-color: rgb(109, 87, 137);
        height: 40px;
        width: 330px;
        bottom:230px;
        position: absolute;
        position:relative;  
}
.box1 p{
    left:495px;
        bottom:460px;
        position: absolute;
}
input[type=text] {
    position: absolute;
    top:110px;
left:500px;
  width: 22%;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid purple;
} 
.box2 p{
    left:495px;
        bottom:395px;
        position: absolute;
}
input[type=text5] {
    position: absolute;
    top:180px;
left:500px;
  width: 22%;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid purple;
}     
.box3 p{
    left:495px;
        bottom:320px;
        position: absolute;
}
input[type=varchar] {
    position: absolute;
    top:250px;
left:500px;
  width: 22%;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid purple;
} 
.box4 p{
    left:495px;
        bottom:250px;
        position: absolute;
}
input[type=text1] {
    position: absolute;
    top:320px;
left:500px;
  width: 22%;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid purple;
} 
.box5 p{
    left:495px;
        bottom:180px;
        position: absolute;
}
input[type=text2] {
    position: absolute;
    top:400px;
left:500px;
  width: 22%;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid purple;
} 
.box7{
    position: absolute;
    top:200px;
left:0px;
width:100px;
}

  </style>
</head>
<body>
  <div class="regform">
    <div class="top-half">
        <h4>Bank Account</h4>
        <a href="withdrawal.php">
        <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
          </svg>
</a>
    </div>
</div>
<form method="post" action="">
<div class="box1">
    <p>Account number</p>
  <input type="text"  id="account_num" name="account_num" placeholder="account_num" class="form-control" required>
</div>
<div class="box2">
  <p>Account Holder Name</p>
  <input type="text5"  id="holder_name" name="holder_name" placeholder="holder_name" class="form-control" required>
</div>
<div class="box3">
  <p>Bank Name</p>
  <input type="varchar"  id="bank" name="bank" placeholder="bank" class="form-control" required>
</div>
<div class="box4">
  <p>Branch</p>
  <input type="text1"  id="branch" name="branch" placeholder="branch" class="form-control" required>
</div>
<div class="box5">
  <p>IFSC Code</p>
  <input type="text2"  id="ifsc" name="ifsc" placeholder="ifsc" class="form-control" required>
</div>
<div class="box7">
      <button class="withdrawal-button" id="updateButton">update Bank</button>
    </div>
</form>
</div>
</body>
</html>
