

<?php 
$pageTitle = 'Contact Us';
include 'includes/head-vars.php';
include 'includes/navbar.php';
?>
    <div class="offcanvas-overlay"></div>

    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="https://htmldemo.net/learts/learts/assets/images/bg/page-title-1.webp">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Contact us</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Contact us</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- Contact Information & Map Section Start -->
    <div class="section section-padding">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title2 text-center">
                <h2 class="title">Keep in touch with us</h2>
                <p>Been tearing your hair out to find the perfect gift for your loved ones? Try visiting our nationwide local stores. You can also contact us to become partner or distributor. Call us, send us an email or make an appointment now.</p>
            </div>
            <!-- Section Title End -->

            <!-- Contact Information Start -->
            <div class="row learts-mb-n30">
                <div class="col-lg-4 col-md-6 col-12 learts-mb-30">
                    <div class="contact-info">
                        <h4 class="title">ADDRESS</h4>
                        <span class="info"><i class="icon fas fa-map-marker-alt"></i> 1234 Rainbow Street, Building C, Apartment 5
Amman, Jordan</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 learts-mb-30">
                    <div class="contact-info">
                        <h4 class="title">CONTACT</h4>
                        <span class="info"><i class="icon fas fa-phone-alt"></i> Mobile: (+962) – 777 - 2121 <br> Hotline: 0800 – 2222</span>
                        <span class="info"><i class="icon far fa-envelope"></i> Mail: <a href="#">contact@leartsstore.com</a></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 learts-mb-30">
                    <div class="contact-info">
                        <h4 class="title"> HOUR OF OPERATION</h4>
                        <span class="info"><i class="icon far fa-clock"></i> Monday – Friday : 09:00 – 20:00 <br> Sunday & Saturday: 10:30 – 22:00</span>
                    </div>
                </div>
            </div>
            <!-- Contact Information End -->

            <!-- Contact Map Start -->
            <div class="row learts-mt-60">
            <div class="col">
            <img src="assets/images/contact/location-map.PNG" alt="location-map" style="width: 100%; height: auto; max-width: 100%;">
            </div>
            </div>
            </div>
            </div>
            <!-- Contact Map End -->

     
    <!-- Contact Information & Map Section End -->

    <!-- Contact Form Section Start -->
    <div class="section section-padding pt-0">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title2 text-center">
                <h2 class="title">Send a message</h2>
            </div>
            <!-- Section Title End -->

            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <div class="contact-form">

                    <?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer;

    // Set PHPMailer to use SMTP
    $mail->isSMTP();

    // Specify SMTP server settings
    $mail->Host = 'smtp.example.com'; // Replace with your SMTP server address
    $mail->SMTPAuth = true;
    $mail->Username = 'your_username'; // Replace with your SMTP username
    $mail->Password = 'your_password'; // Replace with your SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Set sender and recipient
    $mail->setFrom($email, $name);
    $mail->addAddress('recipient@example.com', 'Recipient Name'); // Replace with the recipient's email

    // Set email subject and body
    $mail->Subject = 'Contact Form Submission';
    $mail->Body = "Name: $name\nEmail: $email\n\n$message";

    if ($mail->send()) {
        echo 'Email has been sent.';
    } else {
        echo 'Email could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>


<form id="contact-form" method="post" action="send_email.php">
    <div class="row learts-mb-n30">
        <div class="col-md-6 col-12 learts-mb-30"><input type="text" placeholder="Your Name *" name="name"></div>
        <div class="col-md-6 col-12 learts-mb-30"><input type="email" placeholder="Email *" name="email"></div>
        <div class="col-12 learts-mb-30"><textarea name="message" placeholder="Message"></textarea></div>
        <div class="col-12 text-center learts-mb-30"><button class="btn btn-dark btn-outline-hover-dark" name="submit" value="submit">Submit</button></div>
    </div>
</form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Contact Form Section End -->
<?php
include 'includes/footer.php';
include 'includes/scripts.php';
?>
