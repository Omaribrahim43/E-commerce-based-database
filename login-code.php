<?php

require_once 'config/function.php';

if(isset($_POST['loginBtn'])){
    $emailInput = validate($_POST['email']);
    $passwordInput = validate($_POST['password']);

    $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
    $password = filter_var($passwordInput, FILTER_SANITIZE_STRING);

    if($email != '' && $password != ''){
        $query = "SELECT * FROM users WHERE user_email='$email' AND user_password = '$password' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result) {
            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if($row['role'] == 'admin') {
                    if($row['is_ban'] == 1) {
                        redirect('login-register.php', 'Your Account has been banned. Please contact the admin.');
                    }

                    $_SESSION['loggedInStatus'] = true;
                    $_SESSION['loggedInUserRole'] = $row['role'];
                    $_SESSION['loggedInUserData'] = [
                        'name' => $row['username'],
                        'email' => $row['user_email']
                    ];
                    $_SESSION['user_id'] = $row['user_id'];
                    // var_dump($_SESSION);
                    // exit;
                    redirect('admin/index.php', 'Invalid Email Address or Password.');

                } else {
                    if($row['is_ban'] == 1) {
                        
                        redirect('login-register.php', 'Your Account has been banned. Please contact the admin.');

                    }
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['loggedInStatus'] = true;
                    $_SESSION['loggedInUserRole'] = $row['role'];
                    $_SESSION['loggedInUserData'] = [
                        'name' => $row['username'],
                        'email' => $row['user_email']
                    ];
                    // var_dump($_SESSION);
                    // exit;
                    redirect('index.php', 'Logged In Successfuly!');
                }
            } else {
                redirect('login-register.php', 'Invalid Email Address or Password.');
            }
        } else {
            redirect('login-register.php', 'Somthing Went Wrong');
        }
    }
}
?>