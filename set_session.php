<?php
// set_session.php

// Start the session
session_start();

// Check if the 'codes' parameter is passed in the URL
if (isset($_GET['codes'])) {
  // Get the session value from the URL
  $sessionValue = $_GET['codes'];

  // Set the session value
  $_SESSION['codes'] = $sessionValue;
}
?>
