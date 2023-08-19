<?php

require 'config/function.php';

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
                if($row['verify_status'] == '1'){
                    if($row['role'] == 'admin') {
                        if($row['is_ban'] == 1) {
                            redirect('login.php', 'Your Account has been banned. Please contact the admin.');
                        }

                        $_SESSION['loggedInStatus'] = true;
                        $_SESSION['loggedInUserRole'] = $row['role'];
                        $_SESSION['loggedInUserData'] = [
                            'name' => $row['username'],
                            'email' => $row['user_email']
                        ];

                        redirect('admin/index.php', 'Invalid Email Address or Password.');
                    } else {
                        if($row['is_ban'] == 1) {
                            redirect('login.php', 'Your Account has been banned. Please contact the admin.');
                        }
                        
                        $_SESSION['loggedInStatus'] = true;
                        $_SESSION['loggedInUserRole'] = $row['role'];
                        $_SESSION['loggedInUserData'] = [
                            'name' => $row['username'],
                            'email' => $row['user_email']
                        ];

                        redirect('index.php', 'Logged In Successfuly!');
                    }
                } else {
                    redirect('login.php', 'Please verify your email.');
                }
            } else {
                redirect('login.php', 'Invalid Email Address or Password.');
            }
        } else {
            redirect('login.php', 'Somthing Went Wrong');
        }
    }
}
?>