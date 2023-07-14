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
            $worked_days = $userdetails[0]["worked_days"];
            $level = $userdetails[0]["level"];
            $_SESSION['balance'] = $userdetails[0]["balance"];
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

<?php

if (isset($_POST['btnSync'])) {
  if($codes != 60){
    $message = 'Generate 60 Codes Please';
    echo "<script>alert('$message');</script>";
  }
$data = array(
    "user_id" => $user_id,
    "codes" => $codes,
);
$apiUrl = API_URL."wallet.php";


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
    if ($responseData !== null && $codes == 60 && isset($responseData["today_codes"])) {
        $message = $responseData["message"];
        $today_codes = $responseData["today_codes"];
        $total_codes = $responseData["total_codes"];
        $_SESSION['balance'] = $responseData["balance"];
        $_SESSION['codes'] = 0;
        $codes = $_SESSION['codes'];
        echo "<script>alert('$message');</script>";

    } else {
        // echo "Failed to fetch transaction details.";
        // if ($responseData !== null) {
        //     echo " Error message: " . $responseData["message"];
        // }
    }
}

curl_close($curl);

}
?>
<?php

$user_id = $_SESSION['id'];

$data = array(
    "user_id" => $user_id,
);

$apiUrl = API_URL."studentdata_list.php";
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
        $studentdata = $responseData["data"];
        $name = $studentdata[0]["student_name"];
        $pincode = $studentdata[0]["pin_code"];
        $city = $studentdata[0]["ecity"];
        $id_number = $studentdata[0]["id_number"];
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
    .label-yellow-bold{
      font-weight: bold;
      color: #FFFF00;

    }
  </style>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-12" style="display: block; height: 100vh; background-color: rgb(90, 72, 119);">
    <div class="row" >
      <div class="col-3">
        <h5 class="text-white"id="codes"><?php echo  $codes?></h5>
        <form method="post" enctype="multipart/form-data">
          <button type="submit" name="btnSync" class="btn btn-primary" >Sync Now</button>
        </form>
        
        
      </div>
      <div class="col-4" style="height: 100%;">
        <!-- <p style="margin-bottom: 0; color: white;">Balance 5</p> -->
        <p style="margin-bottom: 0; color: white;">Today Codes <?php echo $today_codes .'+'. $codes; ?></p>
        <p style="margin-bottom: 0; color: white;">Total Codes <?php echo $total_codes .'+'. $codes; ?></p>
        <p style="margin-bottom: 0; color: white;">History Days <?php echo $worked_days ?></p>
        <p style="margin-bottom: 0; color: white;">Level <?php echo $level; ?></p>
      </div>
      <div class="col-4">
      <button class="btn btn-primary btn-block mb-3" onclick="withdrawal()">Withdrawal</button>
    </div>
</div>





      <div class="form-group mb-3">
        <label for="name" id="l_name" class="label-yellow-bold"><?php echo $name; ?></label>
        <input type="text" id="name" name="name" placeholder="Enter Name" class="form-control" />
      </div>
      <div class="form-group mb-3">
      <label class="label-yellow-bold" id="l_otp"><?php echo $id_number; ?></label>
        <div class="row">
          <div class="col-1">
            <input type="text" id="otp_1" name="otp_1" class="form-control" maxlength="1" oninput="moveToNext(this, 'otp_2')" />
          </div>
          <div class="col-1">
            <input type="text" id="otp_2" name="otp_2" class="form-control" maxlength="1" oninput="moveToNext(this, 'otp_3')" />
          </div>
          <div class="col-1">
            <input type="text" id="otp_3" name="otp_3" class="form-control" maxlength="1" oninput="moveToNext(this, 'otp_4')" />
          </div>
          <div class="col-1">
            <input type="text" id="otp_4" name="otp_4" class="form-control" maxlength="1" oninput="moveToNext(this, 'otp_5')" />
          </div>
          <div class="col-1">
            <input type="text" id="otp_5" name="otp_5" class="form-control" maxlength="1" oninput="moveToNext(this, 'otp_6')" />
          </div>
          <div class="col-1">
            <input type="text" id="otp_6" name="otp_6" class="form-control" maxlength="1" oninput="moveToNext(this, 'otp_7')" />
          </div>
          <div class="col-1">
            <input type="text" id="otp_7" name="otp_7" class="form-control" maxlength="1" oninput="moveToNext(this, 'otp_8')" />
          </div>
          <div class="col-1">
            <input type="text" id="otp_8" name="otp_8" class="form-control" maxlength="1" oninput="moveToNext(this, 'otp_9')" />
          </div>
          <div class="col-1">
            <input type="text" id="otp_9" name="otp_9" class="form-control" maxlength="1" oninput="moveToNext(this, 'otp_10')" />
          </div>
          <div class="col-1">
            <input type="text" id="otp_10" name="otp_10" class="form-control" maxlength="1" />
          </div>
            
        </div>
      </div>
      <div class="form-group mb-3">
        <label for="name" id="l_city" class="label-yellow-bold"><?php echo $city; ?></label>
        <input type="text" id="city" name="city" placeholder="Enter City" class="form-control" />
      </div>
      <div class="form-group mb-3">
        <label for="name" id="l_pincode" class="label-yellow-bold"><?php echo $pincode; ?></label>
        <input type="text" id="pincode" name="pincode" placeholder="Enter Pincode" class="form-control" />
      </div>
      <div style="display: flex; justify-content: center;">
        <button type="button" onclick="generate()" class="btn btn-primary">Generate</button>
      </div>


    </div>
  </div>
</div>


<script>
function moveToNext(currentInput, nextInputId) {
  const maxLength = parseInt(currentInput.getAttribute('maxlength'));
  const currentLength = currentInput.value.length;

  if (currentLength === maxLength) {
    document.getElementById(nextInputId).focus();
  }
}
function syncnow() {
  if(codes != 60){
    alert("Please Generate 60 Codes")
  }


    // 

}
function withdrawal() {
  window.location.href = 'withdrawal_c.php';

}
function profile() {
  window.location.href = 'profile.php';

}
function generate() {
  var name = document.getElementById("name").value;
  var l_name = document.getElementById("l_name").innerHTML;

  var city = document.getElementById("city").value;
  var l_city = document.getElementById("l_city").innerHTML;

  var pincode = document.getElementById("pincode").value;
  var l_pincode = document.getElementById("l_pincode").innerHTML;


  var l_otp = document.getElementById("l_otp").innerHTML;
  var otp_1 = document.getElementById("otp_1").value;
  var otp_2 = document.getElementById("otp_2").value;
  var otp_3 = document.getElementById("otp_3").value;
  var otp_4 = document.getElementById("otp_4").value;
  var otp_5 = document.getElementById("otp_5").value;
  var otp_6 = document.getElementById("otp_6").value;
  var otp_7 = document.getElementById("otp_7").value;
  var otp_8 = document.getElementById("otp_8").value;
  var otp_9 = document.getElementById("otp_9").value;
  var otp_10 = document.getElementById("otp_10").value;

  var otp = otp_1 + otp_2 + otp_3 + otp_4 + otp_5 + otp_6 + otp_7 + otp_8 + otp_9 + otp_10;
  if(name != l_name){
    alert('name wrong');
    return;

  }
  if(otp != l_otp){
    alert('id wrong');
    return;

  }
  if(city != l_city){
    alert('city wrong');
    return;

  }
  if(pincode != l_pincode){
    alert('pincode wrong');
    return;
  }

  
// Define the URL of the PHP script
var url = 'add_code.php';

// Send an AJAX request to the PHP script
$.ajax({
  url: url,
  type: 'POST',
  dataType: 'text',
  data: {
    action: 'myFunction' // Send the name of the PHP function as data
  },
  success: function(response) {
    
    window.location.href = 'generate_c.php';
  },
  error: function(xhr, status, error) {

  }
});


    // 

}
</script>






</body>

</html>