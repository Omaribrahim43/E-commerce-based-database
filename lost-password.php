
<?php 
$pageTitle = 'Lost password';
include 'includes/head-vars.php';
include 'includes/navbar.php';
?>
    <div class="offcanvas-overlay"></div>

    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="https://htmldemo.net/learts/learts/assets/images/bg/page-title-1.webp ">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Lost Password</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Lost Password</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- Lost Password Section Start -->
    <div class="section section-padding">
        <div class="container">

            <div class="lost-password">
                <p>Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.</p>
                <form action="#">
                    <div class="row learts-mb-n30">
                        <div class="col-12 learts-mb-30">
                            <label for="userName">Username or email</label>
                            <input id="userName" type="text">
                        </div>
                        <div class="col-12 text-center learts-mb-30">
                            <button class="btn btn-dark btn-outline-hover-dark">reset password</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
    <!-- Lost Password Section End -->
<?php
include 'includes/footer.php';
include 'includes/scripts.php';
?>