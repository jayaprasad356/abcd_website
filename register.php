<?php
// Assuming the constants are defined in 'includes/crud.php'
include_once('includes/crud.php');

session_start();
ob_start();

function generateDeviceID()
{
    return uniqid(); // Using PHP's uniqid() function to generate a random unique ID
}

if (isset($_POST['btnSignup'])) {
    // Gather user input data
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $city = $_POST["city"];
    $dob = $_POST["dob"];
    $device_id = generateDeviceID(); // Generate a new device ID

    // Prepare data to be sent to the API
    $data = array(
        "mobile" => $mobile,
        "password" => $password,
        "name" => $name,
        "email" => $email,
        "city" => $city,
        "dob" => $dob,
        "device_id" => $device_id,
    );

    $apiUrl = "https://abcd.graymatterworks.com/api/register.php";// Replace with the actual API URL for registration

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
            if (isset($responseData["success"], $responseData["message"], $responseData["data"][0]['id'])) {
                if ($responseData["success"] && isset($responseData["user_verify"]) && isset($responseData["device_verify"])) {
                    $_SESSION['id'] = $responseData["data"][0]['id'];
                    $_SESSION['codes'] = 0;
                    $message = $responseData["message"];
                    echo "<script>alert('$message');</script>";
                    header("Location: index.php");
                    exit();
                } else {
                    // Handle unsuccessful registration
                    $message = isset($responseData["message"]) ? $responseData["message"] : "Registration failed. Please try again.";
                    echo "<script>alert('$message');</script>";

                    // If the user needs to register, redirect to the registration page
                    if (isset($responseData["register_required"]) && $responseData["register_required"]) {
                        header("Location: index.php");
                        exit();
                    }
                }
            } else {
                // Handle unexpected response format
                $message = "Unexpected response from the server.";
                echo "<script>alert('$message');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Document</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .label-yellow-bold {
      font-weight: bold;
      color: #FFFF00;
    }
  </style>
</head>
<body>
<form method="post" enctype="multipart/form-data">
  <div class="container">
  <div class="row justify-content-center">
  <div class="col-12 col-sm-12" style="background-color: rgb(90, 72, 119); min-height: 100vh;">
    <div class="row justify-content-center align-items-center">
      <div class="col-10 col-sm-6">
        <div class="d-flex align-items-center mb-3">
          <a href="register.php" class="me-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-arrow-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
  </a>
      </div>
    </div>
    <div class="row justify-content-center mt-0">
          <div class="col-8 col-sm-2 text-center">
           <p style="color:white;">Create  Account</p>
          </div>
        </div>
        <div class="row justify-content-center mt-4">
          <div class="col-10 col-sm-6">
            <div class="form-group mb-3">
              <label for="name" id="name" class="label-yellow-bold">Name:</label>
              <input type="text" id="name" name="name" placeholder="Name" class="form-control" required />
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-10 col-sm-6">
            <div class="form-group mb-3">
              <label for="mobile" id="mobile" class="label-yellow-bold">phone no:</label>
              <input type="text" id="mobile" name="mobile" placeholder="phone_number" class="form-control" required />
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-10 col-sm-6">
            <div class="form-group mb-3">
              <label for="password" id="password" class="label-yellow-bold">Password:</label>
              <input type="password" id="password" name="password" placeholder="password" class="form-control" required />
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-10 col-sm-6">
            <div class="form-group mb-3">
              <label for="dob" id="dob" class="label-yellow-bold">select Date of Birth:</label>
              <input type="date" id="dob" name="dob" placeholder="DOB" class="form-control" required />
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-10 col-sm-6">
            <div class="form-group mb-3">
              <label for="email" id="email" class="label-yellow-bold">email:</label>
              <input type="text" id="email" name="email" placeholder="email" class="form-control" required />
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-10 col-sm-6">
            <div class="form-group mb-3">
              <label for="city" id="city" class="label-yellow-bold">city:</label>
              <input type="text" id="city" name="city" placeholder="city" class="form-control" required />
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-10 col-sm-6">
            <div class="form-group mb-3">
              <label for="refer_code" id="refer_code" class="label-yellow-bold">Refer code:</label>
              <input type="text" id="refer_code" name="refer_code" placeholder="Refer code" class="form-control" required />
            </div>
          </div>
        </div>
        <div class="row justify-content-center mt-4">
          <div class="col-8 col-sm-4 text-center">
            <button type="submit" name="btnSignup" class="btn btn-primary">Sign up</button>
          </div>
        </div>
</div>

    </div>
  </div>
</form>

<script>
  window.addEventListener('DOMContentLoaded', function() {
    // Get the checkbox element
    var checkbox = document.getElementById('checkbox');
    // Set the "checked" attribute to true
    checkbox.checked = true;
  });
</script>


</body>
</html>
