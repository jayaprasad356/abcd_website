<?php
include_once('includes/crud.php');
session_start();
$codes = $_SESSION['codes'];
$user_id = $_SESSION['id']; // Replace with the actual user_id

$data = array(
    "user_id" => $user_id,
);
$apiUrl = API_URL."userdetails.php";


$curl = curl_init($apiUrl);

curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($curl);


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
            $today_codes = $userdetails[0]["today_codes"];
            $total_codes = $userdetails[0]["total_codes"];
            $name = $userdetails[0]["name"];
            $mobile = $userdetails[0]["mobile"];
            $email = $userdetails[0]["email"];
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
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-12" style="background-color: rgb(90, 72, 119); min-height: 100vh;">
        <div class="row mt-4">
          <div class="col-12 col-md-6">
            <div class="form-group mb-5">
              <input type="text" id="name" name="name" placeholder="<?php echo $name?>" class="form-control form-control-lg"required />
            </div>
            <div class="form-group mb-5">
              <input type="text" id="mobile" name="mobile" placeholder="<?php echo $mobile?>" class="form-control form-control-lg" required />
            </div>
            <div class="form-group mb-5">
              <input type="text" id="email" name="email" placeholder="<?php echo $email?>" class="form-control form-control-lg" required />
            </div>
            <div class="form-group mb-5">
              <input type="text" id="today-codes" name="today-codes" placeholder="<?php echo $today_codes?> " class="form-control form-control-lg" required />
            </div>
            <div class="form-group mb-5">
              <input type="password" id="total-codes" name="total-codes" placeholder="<?php echo $total_codes?>" class="form-control form-control-lg" required />
            </div>
            <div class="form-group mb-5">
              <input type="password" id="total-withdrawals" name="total-withdrawals" placeholder="<?php echo $withdrawal?>" class="form-control form-control-lg" required />
            </div>
          </div>
          <div class="col-12 col-md-6 ">
          <div class="form-group mb-5">
            <button type="button" class="btn btn-primary btn-lg">My Referal Earning</button>
          </div>
          <div class="form-group mb-5">
            <button type="button" class="btn btn-primary btn-lg">Trail Earning</button>
          </div>
          <div class="form-group mb-5">
            <button type="button" class="btn btn-primary btn-lg">Apply Leave</button>
          </div>
          <div class="col-12 col-md-6 ">
          <div class="box-below-button d-flex justify-content-center align-items-center">
    <!-- Referral Code Box -->
    <div class="card p-4 text-center" style="width: 350px;">
      <p class="label-dark-bold">Your Referral Code:<?php echo $refer_code?></p>
     
      <div class="form-group mt-3">
        <button type="button" class="btn btn-primary btn-lg">Copy To Share</button>
      </div>
      <div class="form-group mt-3">
      <p class="small">Refer your friend and family members and earn $50 Bonus + $250 refund + 2000 codes  advance salery </p>
    </div>
    </div>
  </div>
</div>
</div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-0CEGJX+3z5S83MH21CCgRxmzT+GJKTAJYWMo2yHhaAjo5Lska3fdB5dH31jQoCa" crossorigin="anonymous"></script>
</body>
</html>
