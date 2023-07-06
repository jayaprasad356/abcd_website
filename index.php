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

    $apiUrl = "https://abcd.graymatterworks.com/api/login.php"; // Replace with the actual API URL

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
        // Successful API response
        $responseData = json_decode($response, true);

        if ($responseData === null) {
            // Error decoding response
            echo "Error decoding API response.";
        } else {
            // Check if the expected elements exist in the response data
            if (isset($responseData["success"], $responseData["user_verify"], $responseData["device_verify"], $responseData["data"][0]['id'])) {
                if ($responseData["success"] && $responseData["user_verify"] && $responseData["device_verify"]) {
                    $_SESSION['id'] = $responseData["data"][0]['id'];
                    echo '<script>alert("Login successful.");</script>';
                    header("location:home.php");
                    exit();
                } else {
                }
            } else {
                echo "Incomplete response data.";
            }
        }
    }
}
?>

<?php
// Define the data for the API request
$data = [
  
];

$apiUrl = "https://localhost/abcd_web/api/settings.php"; // Replace with the actual API URL

$curl = curl_init($apiUrl);

// Set the POST request options
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

// Execute the cURL request
$response = curl_exec($curl);

// Check for errors in the cURL request
if ($response === false) {
    echo "Error: " . curl_error($curl);
} else {
    // Successful API response
    $responseData = json_decode($response, true);
    if ($responseData !== null && $responseData["success"]) {
        // Display transaction details
        $settings = $responseData["data"];
        if (!empty($settings)) {
            $job_details_link = $settings[0]["job_details_link"];
        } else {
            echo "No transactions found.";
        }
    } else {
        echo "Failed to fetch transaction details.";
        if ($responseData !== null && isset($responseData["message"])) {
            echo " Error message: " . $responseData["message"];
        }
    }
}

// Close the cURL session
curl_close($curl);
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
    top: 200px; /* Adjust the top value to move it down */
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
    top: 275px; /* Adjust the top value to move it down */
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
      bottom:380px;
      left: 475px;
      font-size: 14px;
      color:rgb(246, 246, 244);
      
}
.regform p3{
    position: absolute;
      bottom:300px;
      left: 475px;
      font-size: 14px;
      color:rgb(244, 244, 241);
      
}
.regform p{
    position: absolute;
      bottom:220px;
      left: 700px;
      font-size: 14px;
      color:rgb(244, 244, 241);
      
}
.regform p4{
    position: absolute;
      bottom:190px;
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
      bottom:120px;
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
      bottom:70px;
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
    bottom:265px;
  }
  .check{
    position: absolute;
    right: 745px;
    bottom:188px;
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
  img {
    position: absolute;
    right: 580px;
    bottom:430px;    
     border-radius: 50%;
    max-width: 100px; 
     height: auto; 
      }
  </style>
</head>
<body>
  <div class="regform">
    <p2>phone number</p2>
    <p3>password</p3>
    <a href="<?php echo $job_details_link; ?>">
    <p4>i have read and agree the job details and terms & condition </p4>
</a>
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
      <button class="small-box3" id="signInButton" name="btnSignin" >Sign In</button>
      </form>
    <img src="img/logo.jpeg">
<input class="check" type="checkbox" id="checkbox" name="remember">

<script>
window.addEventListener('DOMContentLoaded', function() {
  // Get the checkbox element
  var checkbox = document.getElementById('checkbox');
  
  // Set the "checked" attribute to true
  checkbox.checked = true;
});
</script>

    </div>
</div>


</body>
</html>
