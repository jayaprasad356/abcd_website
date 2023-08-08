<?php
session_start();
if($_SESSION['codes'] >= 120){
    echo 'false';
}else{
    $_SESSION['codes'] = $_SESSION['codes'] + 1;
    echo 'true';
}


?>