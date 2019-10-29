<?php
session_start();
if (isset($_SESSION['adminId'])) {

    unset($_SESSION['adminId']);
    unset( $_SESSION['adminEmail']);

    setcookie('email', $email, time()-20);
    header("Location:index.php");
}else{
    header("Location:index.php");
}
?>