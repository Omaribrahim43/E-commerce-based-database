<?php 
require '../config/function.php';
if(isset($_SESSION['loggedInStatus'])) {
    logoutSession();
    redirect('../login-register.php', 'Logged Out Successfuly');
}
?>