<?php
$user_id = 1; // Replace with the actual user_id
$user_id = 1;
$data = array(
    "user_id" => $user_id,
);

$apiUrl = "https://abcd.graymatterworks.com/api/withdrawal_lists.php"; // Replace with the actual API URL

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
        $withdrawals = $responseData["data"];
        if (!empty($withdrawals)) {
            $datetime = $withdrawals[0]["datetime"];
            $amount = $withdrawals[0]["amount"];
            $status = $withdrawals[0]["status"];
        } else {
            echo "No data found.";
        }
        if (count($withdrawals) > 1) {
          $datetime2 = $withdrawals[1]["datetime"];
          $amount2 = $withdrawals[1]["amount"];
          $status2 = $withdrawals[1]["status"];
      }
      if (count($withdrawals) > 2) {
          $datetime3 = $withdrawals[2]["datetime"];
          $amount3 = $withdrawals[2]["amount"];
          $status3 = $withdrawals[2]["status"];
      }
     
    } else {
        echo "Failed to fetch data details.";
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
    <div class="col-12 col-sm-12" style="display: block; height: 129vh; background-color: rgb(90, 72, 119);">
    <div class="row">
      <div class="col-6" style="display: block; justify-content: center;">
      <a href="home_c.php">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg>
  </a>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="form-group mb-3">
        <div class="row">
        <div class="col-12" style="display: flex; justify-content: center;">
  <p><small class="text-white"><b>Balance Rs.<?php echo $amount; ?></b></small></p>
</div>

    </div>
          <label for="name" id="l_name" class="label-yellow-bold">Enter Amount</label>
          <input type="text" id="amount" name="amount" placeholder="Enter Amount" class="form-control" />
        </div>
        <p><small class="text-white">Minimum Withdrawal Rs.500</small></p>
      </div>
    </div>
    <div class="row">
      <div class="col-6" style="display: flex; justify-content: center;">
      <button  class="btn btn-primary" onclick="withdrawal()" >Withdrawal</button>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-6">
        <div class="card bg-info">
          <div class="card-header">
            Amount - ₹ <?php echo $amount; ?>
          </div>
          <div class="card-body">
            <h5 class="card-title">Status - <?php
if ($status === "paid") {
    echo '<p4 style="color: green;">'.$status.'</p4>';
} elseif ($status === "cancelled") {
    echo '<p4 style="color: red;">'.$status.'</p4>';
} elseif ($status === "blocked") {
    echo '<p4 style="color: orange;">'.$status.'</p4>';
} else {
    echo $status;
}
?></h5>

            <p class="card-text"><?php echo $datetime; ?></p>
          </div>
        </div>
</div>
</div>
</br>
<!-- Add this section below the existing card -->
<div class="col-6">
  <div class="card bg-info">
    <div class="card-header">
      Amount - ₹ <?php echo $amount2; ?>
    </div>
    <div class="card-body">
      <h5 class="card-title">Status - <?php
if ($status2 === "paid") {
    echo '<p4 style="color: green;">'.$status2.'</p4>';
} elseif ($status2 === "cancelled") {
    echo '<p4 style="color: red;">'.$status2.'</p4>';
} elseif ($status2 === "blocked") {
    echo '<p4 style="color: orange;">'.$status2.'</p4>';
} else {
    echo $status2;
}
?></h5>
      <p class="card-text"><?php echo $datetime2; ?></p>
    </div>
  </div>
</div>
<br>
<!-- Add this section below the existing card -->
<div class="col-6">
  <div class="card bg-info">
    <div class="card-header">
      Amount - ₹ <?php echo $amount3; ?>
    </div>
    <div class="card-body">
      <h5 class="card-title">Status - <?php
if ($status2 === "paid") {
    echo '<p4 style="color: green;">'.$status3.'</p4>';
} elseif ($status2 === "cancelled") {
    echo '<p4 style="color: red;">'.$status3.'</p4>';
} elseif ($status2 === "blocked") {
    echo '<p4 style="color: orange;">'.$status3.'</p4>';
} else {
    echo $status2;
}
?></h5>
      <p class="card-text"><?php echo $datetime3; ?></p>
    </div>
  </div>
</div>
</div>
      </div>

    </div>

    </div>
  </div>
</div>
<br>


<script>
function moveToNext(currentInput, nextInputId) {
  const maxLength = parseInt(currentInput.getAttribute('maxlength'));
  const currentLength = currentInput.value.length;

  if (currentLength === maxLength) {
    document.getElementById(nextInputId).focus();
  }
}
function syncnow() {
  var codes = document.getElementById("codes").innerHTML;
  if(codes != 60){
    alert("Please Generate 60 Codes")
  }


    // 

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