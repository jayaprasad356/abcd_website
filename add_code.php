<?php
session_start();
if($_SESSION['codes'] >= 120){
    echo 'false';
}else{
    $_SESSION['codes'] = $_SESSION['codes'] + $_SESSION['per_code_val'];
    echo 'true';
}


?>