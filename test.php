<?php
// test.php

// Start the session
session_start();

// Retrieve the session value
$sessionValue = isset($_SESSION['codes']) ? $_SESSION['codes'] : '';

// Display the session value
echo "Session Value: " . $sessionValue;
?>
