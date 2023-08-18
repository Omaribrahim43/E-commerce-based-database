<?php
include_once 'test.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $registerEmail = $_POST["registerEmail"];
    $registerUserName = $_POST["registerUserName"];
    $registerPassword = $_POST["registerPassword"]; 
    $registerConfrimPassword = $_POST["registerConfrimPassword"]; 

    // Check if the email is a Gmail address using regular expression
    if (!preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/', $registerEmail)) {
        $emailError = "Please use a Gmail address for registration.";
    } else {
        // Check if the password starts with an uppercase letter
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/', $registerPassword))  {
            $passwordError = "Password should contain one uppercase letter, lowercase letters, digit, and special character";
        } else {
            // Check if passwords match
            if ($registerPassword !== $registerConfrimPassword) {
                $confirmPasswordError = "Passwords do not match.";
            } else {
                // Hash the password
                $hashedPassword = password_hash($registerPassword, PASSWORD_DEFAULT);

                // Check if email already exists in the database
                $emailCheckQuery = "SELECT * FROM users WHERE user_email = '$registerEmail'";
                $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

                if (mysqli_num_rows($emailCheckResult) > 0) {
                    $emailError = "Email address is already registered.";
                } else {
                    // Insert the new user record
                    $sql = "INSERT INTO users (username, user_email, user_password) VALUES ('$registerUserName', '$registerEmail', '$hashedPassword')";

                if ($conn->query($sql) === TRUE) {
                    header("Location: login.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }
}}

?>
<?php 
$pageTitle = 'Login & Register';
include 'includes/head-vars.php';
include 'includes/navbar.php';



// if(isset($_SESSION['loggedInStatus'])) {
//     redirect('index.php', 'You are already logged in.');
// }
?>
    <div class="offcanvas-overlay"></div>

    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="https://htmldemo.net/learts/learts/assets/images/bg/page-title-1.webp">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Register</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Register</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

            <div class="col-lg-6 offset-lg-3">
                    <div class="user-login-register">
                        <div class="login-register-title" >
                            <h2 class="title">Register</h2>
                            <p class="desc">If you don’t have an account, register now!</p>
                        </div>
                        <div class="login-register-form">
                   

<form  method="post" id="sign-up-form">
    <!-- Your form fields here -->

    <div class="col-12 learts-mb-20">
        <label for="registerEmail">Email address <abbr class="required" required>*</abbr></label>
        <input type="text" id="registerEmail" name="registerEmail">
        <?php if (!empty($emailError)) echo "<span style='color: red;'>$emailError</span>"; ?>

    </div>

    <div class="col-12 learts-mb-20">
        <label for="registerUserName">User name <abbr class="required" required>*</abbr></label>
        <input type="text" id="registerUserName" name="registerUserName">
        <?php if (!empty($usernameError)) echo "<span style='color: red;'>$usernameError</span>"; ?>

    </div>

    <div class="col-12 learts-mb-20">
        <label for="registerPassword">Enter Password <abbr class="required" required>*</abbr></label>
        <input type="password" id="registerPassword" name="registerPassword">
        <?php if (!empty($passwordError)) echo "<span style='color: red;'>$passwordError</span>"; ?>

    </div>

    <div class="col-12 learts-mb-20">
        <label for="registerConfirmPassword">Confirm Password <abbr class="required" required>*</abbr></label>
        <input type="password" id="registerConfrimPassword" name="registerConfrimPassword">
        <?php if (!empty($confirmPasswordError)) echo "<span style='color: red;'>$confirmPasswordError</span>"; ?>


    </div>


    <div class="col-12 text-center learts-mb-50">
        <button class="btn btn-dark btn-outline-hover-dark" type="submit" id="sign-up" name="signup" >Register</button>
    </div>
</form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- Login & Register Section End -->

<?php
include 'includes/footer.php';
include 'includes/scripts.php';
?>
