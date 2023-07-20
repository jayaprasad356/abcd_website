<?php
include_once('includes/crud.php');
session_start();

if (!isset($_SESSION['id'])) {
  header("location:index.php");
}

$user_id = $_SESSION['id']; // Replace with the actual user_id
$data = array(
    "user_id" => $user_id,
);


if (isset($_POST['btnUpdate'])) {
    // Gather user input data and sanitize it
    $account_num = isset($_POST["account_num"]) ? htmlspecialchars($_POST["account_num"]) : "";
    $holder_name = isset($_POST["holder_name"]) ? htmlspecialchars($_POST["holder_name"]) : "";
    $bank = isset($_POST["bank"]) ? htmlspecialchars($_POST["bank"]) : "";
    $branch = isset($_POST["branch"]) ? htmlspecialchars($_POST["branch"]) : "";
    $ifsc = isset($_POST["ifsc"]) ? htmlspecialchars($_POST["ifsc"]) : "";

    // Prepare data to be sent to the API
    $data = array(
        "user_id" => $user_id,
        "account_num" => $account_num,
        "holder_name" => $holder_name,
        "bank" => $bank,
        "branch" => $branch,
        "ifsc" => $ifsc,
    );

   
    $apiUrl = API_URL."updatebank.php"; 
    // Initialize cURL session
    $curl = curl_init($apiUrl);

    // Set cURL options
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    // Execute the cURL request
    $response = curl_exec($curl);

    if ($response === false) {
        // Error in cURL request
        echo "Error: " . curl_error($curl);
    } else {
        // Decode the JSON response from the API
        $responseData = json_decode($response, true);
        if ($responseData["success"]) {
            echo '<script>alert("Bank details updated successfully.");</script>';
        } else {
            echo '<script>alert("User not found or an error occurred.");</script>';
        }
    }

    // Close cURL session
    curl_close($curl);
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
          <a href="withdrawal_c.php" class="me-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-arrow-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
  </a>
      </div>
    </div>
    <div class="row justify-content-center mt-0">
          <div class="col-8 col-sm-2 text-center">
           <p style="color:white;">Update Bank Details</p>
          </div>
        </div>
        <div class="row justify-content-center mt-4">
          <div class="col-10 col-sm-6">
            <div class="form-group mb-3">
              <label for="account_num" id="account_num" class="label-yellow-bold">Account Number:</label>
              <input type="text" id="account_num" name="account_num" placeholder="account_num" class="form-control" required />
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-10 col-sm-6">
            <div class="form-group mb-3">
              <label for="holder_name" id="holder_name" class="label-yellow-bold">Account Holder Name:</label>
              <input type="text" id="holder_name" name="holder_name" placeholder="holder_name" class="form-control" required />
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-10 col-sm-6">
            <div class="form-group mb-3">
              <label for="bank" id="bank" class="label-yellow-bold">Bank Name:</label>
              <input type="text" id="bank" name="bank" placeholder="bank" class="form-control" required />
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-10 col-sm-6">
            <div class="form-group mb-3">
              <label for="branch" id="branch" class="label-yellow-bold">Branch:</label>
              <input type="text" id="branch" name="branch" placeholder="branch" class="form-control" required />
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-10 col-sm-6">
            <div class="form-group mb-3">
              <label for="ifsc" id="ifsc" class="label-yellow-bold">IFSC Code:</label>
              <input type="text" id="ifsc" name="ifsc" placeholder="ifsc" class="form-control" required />
            </div>
          </div>
        </div>
        <div class="row justify-content-center mt-4">
          <div class="col-8 col-sm-4 text-center">
            <button type="submit" name="btnUpdate" class="btn btn-primary">update</button>
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
