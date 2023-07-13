<?php
session_start();
$_SESSION['codes'] = $_SESSION['codes'] + 1;
echo $_SESSION['codes'];

?>