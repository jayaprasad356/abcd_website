<?php
include_once('includes/crud.php');
session_start();
ob_start();

if (isset($_POST['btnSignin'])) {
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $device_id = md5($_SERVER['HTTP_USER_AGENT']);
    //$deviceId = 'web';

    $data = array(
        "mobile" => $mobile,
        "password" => $password,
        "device_id" => $device_id,
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
                    $_SESSION['codes'] = 0;
                    echo '<script>alert("Login successful.");</script>';
                    header("location:home_c.php");
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

$apiUrl = "https://abcd.graymatterworks.com/api/settings.php"; // Replace with the actual API URL

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
        <div class="text-center py-4">
          <img src="img/logo.jpeg" alt="" width="130" height="130" style="border-radius: 50%;">
        </div>
        <div class="row justify-content-center mt-4">
          <div class="col-10 col-sm-6">
            <div class="form-group mb-3">
              <label for="mobile" id="mobile" class="label-yellow-bold">Mobile:</label>
              <input type="text" id="mobile" name="mobile" placeholder="Enter mobile" class="form-control" />
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-10 col-sm-6">
            <div class="form-group mb-3">
              <label for="password" id="password" class="label-yellow-bold">Password:</label>
              <input type="password" id="password" name="password" placeholder="Enter password" class="form-control" />
            </div>
          </div>
        </div>
        <div class="position-absolute top-9 start-30">
          <div class="row justify-content-center">
            <div class="col-4 col-sm-20 text-start">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
              <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
            </svg>
          </div>
</div>
        </div>
        <div class="row justify-content-center mt-2">
          <div class="col-12 col-sm-8 text-center">
            <a href="<?php echo $job_details_link; ?>" style="color: white;">
              I have read and agree to the job details and terms &amp; conditions
            </a>
          </div>
        </div>
        <div class="row justify-content-center mt-3">
          <div class="col-10 col-sm-6 text-start">
            <input class="check" type="checkbox" id="checkbox" name="remember">
          </div>
        </div>
        <div class="row justify-content-center mt-4">
          <div class="col-8 col-sm-4 text-center">
            <button type="submit" name="btnSignin" class="btn btn-primary">Sign in</button>
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
