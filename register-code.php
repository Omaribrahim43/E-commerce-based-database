<?php 
include_once 'config/function.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function sendEmailVerify($name, $email, $verify_token) {
    $mail = new PHPMailer(true);
        $mail->isSMTP();    

        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'omar.migdadi43@gmail.com';
        $mail->Password   = 'ngsnlxfadyhdeyms';       

        $mail->SMTPSecure = 'tls';  
        $mail->Port       = 587 ;

        //Recipients
        $mail->setFrom('omar.migdadi43@gmail.com', $name);
        $mail->addAddress($email);
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );
        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Email verification';

        $email_template = "
                            <h2>You have registered with Home Made Harmony</h2>
                            <h5>Verify your email address to login with the bellow given link</h5><br/><br/>
                            <a href='http://localhost/php-project/verify-email.php?token=$verify_token'>Click Me</a>
                        ";

        $mail->Body = $email_template;
        $mail->send();
        // echo 'Message has been sent';

}
if(isset($_POST['signup'])) {
    $email = $_POST['registerEmail'];
    $name = $_POST['registerUserName'];
    $phone = $_POST['registerPhoneNumber'];
    $password = $_POST['registerPassword'];
    $verify_token = md5(rand());

    $check_email_query = "SELECT user_email FROM users WHERE user_email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0) {
        redirect('register.php', "Email Address already Exists");
    } else {
        $query = "INSERT INTO users (username, user_email, user_password, user_phone,verify_token) VALUES ('$name','$email','$password','$phone','$verify_token')";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            sendEmailVerify($name,$email,$verify_token);
            redirect('register.php', "Register Successfull. Pleace verify your Email Address.");
        } else {
            redirect('register.php', "Register Failed.");
        }
    }
}
?>