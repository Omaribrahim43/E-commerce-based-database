<?php 
require '../config/function.php';
if(isset($_SESSION['loggedInStatus'])){
    if(isset($_SESSION['loggedInUserRole'])) {
        $role = $_SESSION['loggedInUserRole'];
        $email = $_SESSION['loggedInUserData']['email'];

        $query = "SELECT * FROM users WHERE user_email='$email' AND role='$role' LIMIT 1";
        $result = mysqli_query($conn, $query);
        if($result) {
            if(mysqli_num_rows($result) == 0) {
                logoutSession();
                redirect('../login-register.php', 'Access Denied');
            } else {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if($row['role'] != 'admin') {
                    logoutSession();
                    redirect('../login-register.php', 'Access Denied');
                }
            }
        }
        else{
            logoutSession();
            redirect('../login-register.php', 'Somthing Went Wrong.');
        }
    } else {
        redirect('../login-register.php', 'Login to Continue');
    }
}

?>