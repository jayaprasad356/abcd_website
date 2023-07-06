<?php

session_start();

$user_id = 11; // Replace with the actual user_id

$data = array(
    "user_id" => $user_id,
);

$apiUrl = "https://abcd.graymatterworks.com/api/userdetails.php"; // Replace with the actual API URL

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
            $balance = $userdetails[0]["balance"];
            $total_codes = $userdetails[0]["total_codes"];
            $worked_days = $userdetails[0]["worked_days"];
            $level = $userdetails[0]["level"];
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


$apiUrl = "https://localhost/abcd_web/api/studentdata_list.php"; // Replace with the actual API URL

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
        if (!empty($userdetails)) {
            $student_name = $studentdata[0]["student_name"];
            $pin_code = $studentdata[0]["pin_code"];
            $ecity = $studentdata[0]["ecity"];
            $id_number = $studentdata[0]["id_number"];
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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
  <link rel="stylesheet" href="register.css">
  <style>
  body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: -50px;
      margin: 0;
      padding: 0;
    }

    .regform {
      width: 300px;
      height: 500px; /* Increase the height value */
      padding: 10px 20px 30px;
      background-color: rgb(248, 245, 250);
      font-size: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(9, 7, 7, 0.437);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .header {
      width: 100%;
      background-color: rgb(90, 72, 119);
      padding: 5px;
      border-radius: 5px 5px 0 0;
      text-align: left;
      font-weight: bold;
      color: white;
      margin-top: -540px;
      font-size: 12px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 10px;
    }

    .header h1 {
      margin: 0;
    }
    
    .content {
      background-color: rgb(90, 72, 119);
      width: 100%;
      height: 100%;
      margin-bottom: -540px;
      border: 3px solid white;
      position: relative;
    }
    
    .circle {
      position: absolute;
      width: 50px;
      height: 50px;
      background-color: rgb(90, 72, 119);
      border-radius: 50%;
      top: 20px;
      left: 15px;
      border: 10px solid white;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      color: white;
      font-weight: bold;
    }
    
    .box {
      width: 100px;
      height: 40px;
      background-color: rgb(244, 232, 7);
      position: absolute;
      top: 15px;
      left: 100px;
      font-size: 14px;
      border: 2px solid white;
    }
    .box p {
      margin: 0;
      padding: 0;
      font-size: 15px;
      line-height: 1.2;
      text-align: center;
    }
    .box2 p {
      margin: 0;
      padding: 0;
      font-size: 15px;
      line-height: 1.2;
      text-align: center;
    }
    .header svg {
      width: 20px;
      height: 20px;
      fill: currentColor;
    }
   
    .box3 {
  width: 80px;
  height: 30px;
  background-color: #3a393b;
  position: absolute;
  top: 100px;
  left: 10px;
  font-size: 12px;
  display: flex;
  justify-content: center;
  align-items: center;
  color: rgba(12, 9, 9, 0.893);
  border-radius: 10%;
}
.box3 .symbol {
  position: absolute;
  top: 70px; /* Adjust the top value to position the symbol */
  left: 70%; /* Position it in the center */
  transform: translateX(-50%); /* Center it horizontally */
  font-size: 20px;
  color: rgba(247, 245, 245, 0.893);
  white-space: nowrap; /* Prevent line breaks */
}

.box3 h4 {
  margin: 0;
  padding: 0;
  left:20px;
  margin-top: 10px;
  font-size: 12px;
  text-align: center;
  position: absolute;
  color: rgba(193, 13, 118, 0.893);
  top: 40px; /* Adjust the top value to position it below the Small Box */
  white-space: nowrap; /* Prevent text from wrapping */
}

    .box4 {
  position: absolute;
  top: 65px;
  left: 100px;
  font-size: 10px;
  color: white;
  text-align: center;
}
.box4 p2{
  position: absolute;
  top: 2px;
  left: 100px;
}
.box4 p3{
  position: absolute;
  top: 20px;
  left: 100px;
}
.box4 p4{
  position: absolute;
  top: 37px;
  left: 100px;
}
.box4 p {
  margin: 0; /* Remove margin */
  padding: 0; /* Remove padding */
  font-size: 16px; /* Adjust font size if needed */
}
.input {
  width: 100%;
  display: flex;
  justify-content: center;
}

.input input {
  width: 90%; /* Adjust the width as needed */
  height: 40px; /* Adjust the height as needed */
  justify-content: center;
  border-radius: 10px;
}
.box5 {
    position: absolute;
    top: 140px; /* Adjust the top value to move it down */
    left: -5px;
    width: 100%;
    height: 100px; /* Adjust the height as needed */
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    color: #000;
  }
  .box5 p{
    position: absolute;
    top: -50px; /* Adjust the top value to move it down */
    left: -110px;
    width: 140%;
    height: 100px; /* Adjust the height as needed */
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    color: #dfee10;
  }

  .box9 {
    position: absolute;
    top: 295px; /* Adjust the top value to move it down */
    left: -50px;
    width: 100%;
    height: 100px; /* Adjust the height as needed */
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    color: #000;
  }
 
  .box7 {
    position: absolute;
    top: 215px; /* Adjust the top value to move it down */
    left: -2px;
    width: 100%;
    height: 100px; /* Adjust the height as needed */
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    color: #000;
  }
  .box7 p{
    position: absolute;
    top: -50px; /* Adjust the top value to move it down */
    right:20px;
    width: 140%;
    height: 100px; /* Adjust the height as needed */
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    color: #dfdf16;
  }
  .box8 {
    position: absolute;
    top: 360px; /* Adjust the top value to move it down */
    left: -5px;
    width: 100%;
    height: 100px; /* Adjust the height as needed */
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    color: #000;
    
  }
  .box8 p{
    position: absolute;
    top: -50px; /* Adjust the top value to move it down */
    right:40px;
    width: 140%;
    height: 100px; /* Adjust the height as needed */
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    color: #dfdf16;
  }
  .box6 {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .otp-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 3px; /* Adjust the spacing between the boxes */
    }

    .otp-input {
        width: 20px; /* Adjust the width of each box */
        height: 30px; /* Adjust the height of each box */
        font-size: 14px;
        text-align: center;
    }

    .account-number p {
        font-size: 16px;
        margin: 0;
        padding: 0;
    }
    .box9 h5{
      position: relative; /* or position: absolute; */
  left: 110px; /* Adjust the value as needed */
  margin-bottom: 100px;
  color:#dfdf16;
  
    }
    /* Additional CSS for the person icon */
    .regform .person-icon {
      position: absolute;
      top: 560px;
      bottom:100px;
      left: 490px;
      fill: #333; /* Change the fill color of the icon */
    }
    .regform .wallet-icon {
      position: absolute;
      top: 560px;
      bottom:100px;
      left: 560px;
      fill: #333; /* Change the fill color of the icon */
      color:#333;
    }
    .regform .home-icon {
      position: absolute;
      top: 560px;
      bottom:100px;
      left: 630px;
      fill: #333; /* Change the fill color of the icon */
      color:#333;
    }
    .regform .men-icon {
      position: absolute;
      top: 560px;
      bottom:100px;
      left: 700px;
      fill: #333; /* Change the fill color of the icon */
      color:#333;
    }
    .regform .map-icon {
      position: absolute;
      top: 560px;
      bottom:100px;
      left: 770px;
      fill: #333; /* Change the fill color of the icon */
      color:#333;
    }
    .small-box3{
    position: absolute;
      top:450px;
      left: 50px;
      font-size: 14px;
      height: 40px;
        width: 200px;
        background-color:yellow;
        border-radius: 10px;
      color:rgb(2, 2, 2);
  }
  .circle p {
color:white;
}
  </style>
</head>
<body>
<div class="regform">
<a href="profile.php">
  <svg class="person-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
  </svg>
  </a>
 <a href="wallet.php">
  <svg class="wallet-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
    <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
  </svg>
</a>
  <svg class="home-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
  </svg>
  <svg class="men-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  </svg>
  <svg class="map-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-compass-fill" viewBox="0 0 16 16">
    <path d="M15.5 8.516a7.5 7.5 0 1 1-9.462-7.24A1 1 0 0 1 7 0h2a1 1 0 0 1 .962 1.276 7.503 7.503 0 0 1 5.538 7.24zm-3.61-3.905L6.94 7.439 4.11 12.39l4.95-2.828 2.828-4.95z"/>
  </svg>
    <div class="header">
      <h1>ABCD App</h1>
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
      </svg>
    </div>
    <div class="content">
    <div class="circle">
  <p id="sessionValue"><?php echo $_SESSION['codes']; ?></p>
</div>


      <div class="box">
        <p>wallet balance <?php echo $balance; ?></p>
      </div>
      <div class="box3">
        <p>Small Box</p>
      </div>
      <form action="#" method="POST">
  <div>
    <button class="small-box3" id="generate">GENERATE</button>
  </div>
  <div class="box8">
    <div style="display: flex; justify-content: center;"><p><?php echo $pin_code; ?></p></div>
    <div class="input" style="margin-top: 10px; display: flex; justify-content: center;">
      <input type="text" id="name1" name="name1" placeholder="pincode" class="form-control" required>
    </div>
  </div>
  <div class="box7">
    <div style="display: flex; justify-content: center;"><p><?php echo $ecity; ?></p></div>
    <div class="input" style="margin-top: 10px; display: flex; justify-content: center;">
      <input type="text" id="name2" name="name2" placeholder="city" class="form-control" required>
    </div>
  </div>

  <div class="box9">
    <div style="display: flex; justify-content: center;"><h5><?php echo $id_number; ?></h5></div>
    <form>
      <div class="otp-container">
        <input type="text" class="otp-input" maxlength="1" pattern="\d" required>
        <input type="text" class="otp-input" maxlength="1" pattern="\d" required>
        <input type="text" class="otp-input" maxlength="1" pattern="\d" required>
        <input type="text" class="otp-input" maxlength="1" pattern="\d" required>
        <input type="text" class="otp-input" maxlength="1" pattern="\d" required>
        <input type="text" class="otp-input" maxlength="1" pattern="\d" required>
        <input type="text" class="otp-input" maxlength="1" pattern="\d" required>
        <input type="text" class="otp-input" maxlength="1" pattern="\d" required>
        <input type="text" class="otp-input" maxlength="1" pattern="\d" required>
      </div>
    </form>
  </div>
  <script>
const generateButton = document.getElementById('generate');
generateButton.addEventListener('click', (event) => {
  event.preventDefault();

  // Get the input values
  const name1 = document.getElementById('name1').value.trim();
  const name2 = document.getElementById('name2').value.trim();
  const name3 = document.getElementById('name3').value.trim();

  if (name1 !== '' || name2 !== '' || name3 !== '') {
    // Set the session value as 1 using AJAX
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        // Redirect to 'home.php' after 2 seconds
        setTimeout(() => {
          window.location.href = 'home.php';
        }, 2000);
      }
    };
    xhr.open('GET', 'set_session.php?codes=1', true);
    xhr.send();

    // Update the session value inside the circle
    const sessionValueElement = document.getElementById('sessionValue');
    sessionValueElement.innerText = '1';
  } else {
    // Display error message
    const errorMessage = "Incorrect input. Please enter the correct values.";
    alert(errorMessage);
  }
});

</script>

  <div class="box5">
    <div style="display: flex; justify-content: center;"><p><?php echo $student_name; ?></p></div>
    <div class="input" style="margin-top: 10px; display: flex; justify-content: center;">
      <input type="text" id="name3" name="name3" placeholder="Name" class="form-control" required>
    </div>
  </div> 
</form>

      <div class="box4">
        <p>total codes <p2><?php echo $total_codes; ?></p2></p>
        <p>history days <p3><?php echo $worked_days; ?></p3></p>
        <p>level <p4><?php echo $level; ?></p4></p>
      </div>
    </div>
</div>
</body>
</html>

