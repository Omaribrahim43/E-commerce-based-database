<?php 
    include_once 'test.php';
 
    $emailErrors = "";
    $passwordErrors = ""; 
    
    if (isset($_POST["signin"])) {
        $registerEmail = $_POST["registerEmail"];
        $registerPassword = $_POST["registerPassword"];

        $sql = "SELECT user_email, user_password FROM users WHERE user_email='$registerEmail'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($registerPassword, $row["user_password"])) {
                header("Location: index.php");
            } else {
                $passwordErrors = "Invalid password.";
            }
        } else {
            $emailErrors = "User not found.";
        }
    }
?>

<?php 
$pageTitle = 'Lost password';
include 'includes/head-vars.php';
include 'includes/navbar.php';
?>

<div class="offcanvas-overlay"></div>

<!-- Page Title/Header Start -->
<div class="page-title-section section" data-bg-image="https://htmldemo.net/learts/learts/assets/images/bg/page-title-1.webp">
    <div class="container">
    <div class="page-title">
                        <h1 class="title">login</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">login</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>    </div>
</div>
<!-- Page Title/Header End -->

<!-- Login & Register Section Start -->
<div class="section section-padding">
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-6 offset-lg-3">
                <div class="user-login-register bg-light">
                    <div class="login-register-title">
                    <h2 class="title">Login</h2>
                            <p class="desc">Great to have you back!</p>   
                            </div>                 
                    <div class="login-register-form">
                        <form method="post" id='sign-in-form'>
                            <div class="row learts-mb-n50">
                                <div class="col-12 learts-mb-50">
                                    <input type="email" id="registerEmail" name="registerEmail" placeholder=" email address">
                                    <?php if (!empty($emailErrors)) echo "<span style='color: red;'>$emailErrors</span>"; ?>
                                </div>
                                <div class="col-12 learts-mb-50">
                                    <input type="password" id="registerPassword" name="registerPassword" placeholder="Password">
                                    <?php if (!empty($passwordErrors)) echo "<span style='color: red;'>$passwordErrors</span>"; ?>
                                </div>
                                
                                <div class="col-12 text-center learts-mb-50">
                                        <button class="btn btn-dark btn-outline-hover-dark"  id="sign-in" value="signin" name="signin" >login</button>
                                    </div>
                                    <div class="col-12 learts-mb-50">
                                        <div class="row learts-mb-n20">
                                            <div class="col-12 learts-mb-20">
                                                <!-- <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="rememberMe">
                                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                                </div> -->
                                            </div>
                                            <div class="col-12 learts-mb-20">
                                                <a href="lost-password.php" class="fw-400">Lost your password?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

<?php
include 'includes/footer.php';
include 'includes/scripts.php';
?>
