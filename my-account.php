
<!DOCTYPE html>
<html class="no-js" lang="en">
<?php include_once 'head-vars.php';?>
<body>

    <?php include_once 'navbar.php'?>

<?php $conn = mysqli_connect("localhost", "root", "", "ecommerce-project"); ?>

    <div class="offcanvas-overlay"></div>

    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="https://htmldemo.net/learts/learts/assets/images/bg/page-title-1.webp">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">My Account</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">My Account</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- My Account Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row learts-mb-n30">

                <!-- My Account Tab List Start -->
                <div class="col-lg-4 col-12 learts-mb-30">
                    <div class="myaccount-tab-list nav">
                        <!-- <a href="#dashboad" class="active" data-bs-toggle="tab">Dashboard <i class="far fa-home"></i></a> -->
                        <a href="#orders" data-bs-toggle="tab">Orders <i class="far fa-file-alt"></i></a>
                        <!-- <a href="#download" data-bs-toggle="tab">Download <i class="far fa-arrow-to-bottom"></i></a> -->
                        <a href="#address" data-bs-toggle="tab">address <i class="far fa-map-marker-alt"></i></a>
                        <a href="#account-info" data-bs-toggle="tab">Account Details <i class="far fa-user"></i></a>
                        <a href="login-register.php">Logout <i class="far fa-sign-out-alt"></i></a>
                    </div>
                </div>
                <!-- My Account Tab List End -->

                <!-- My Account Tab Content Start -->
                <div class="col-lg-8 col-12 learts-mb-30">
                    <div class="tab-content">


                        <?php
                        

                        $user = mysqli_query($conn,"SELECT * FROM users");

                        $sqlUser = "SELECT user_firstname, user_lastname, username, user_email, user_password  FROM users";
                        $userResult = mysqli_query($conn, $sqlUser);
                        // var_dump($userResult);

                        ?>

                        <!-- Single Tab Content Start -->
                        <!-- <div class="tab-pane fade show active" id="dashboad">
                            <div class="myaccount-content dashboad">

                            
                                <p>Hello <strong></strong><a href="login-register.php">Log out</a>)</p>
                                <p>From your account dashboard you can view your <span>recent orders</span>, manage your <span>shipping and billing addresses</span>, and <span>edit your password and account details</span>.</p>
                            </div>
                        </div> -->
                        
                        <!-- Single Tab Content End -->

                        <?php
                        

                        // $order = mysqli_query($conn,"SELECT * FROM orders");

                        // $sqlOrder = "SELECT * FROM orders";

                        $orderResult = mysqli_query($conn, "SELECT * FROM orders");
                        print_r($orderResult);
                        ?>


                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="orders">
                            <div class="myaccount-content order">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                                $i = 0;
                                            while ($row = mysqli_fetch_array($orderResult)){
                                            ?> 
                                            <tr>
                                                <td><?php echo $row["order_id"];?></td>
                                                <td><?php echo $row["order_date"];?></td>
                                                <td><?php echo $row["order_status"];?></td>
                                                <td><?php echo $row["order_total_amount"];?></td>
                                                <td><a href="shopping-cart.php">View</a></td>
                                            </tr>

                                            <?php
                                                $i++;
                                                }
                                                ?>
                                                <!-- how to connect the user with his/her order -->

                                            <!-- <tr>
                                                <td>2</td>
                                                <td>July 22, 2018</td>
                                                <td>Approved</td>
                                                <td>$200</td>
                                                <td><a href="shopping-cart.php">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>June 12, 2017</td>
                                                <td>On Hold</td>
                                                <td>$990</td>
                                                <td><a href="shopping-cart.php">View</a></td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <!-- <div class="tab-pane fade" id="download">
                            <div class="myaccount-content download">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Date</th>
                                                <th>Expire</th>
                                                <th>Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Haven - Free Real Estate PSD Template</td>
                                                <td>Aug 22, 2018</td>
                                                <td>Yes</td>
                                                <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                            </tr>
                                            <tr>
                                                <td>HasTech - Profolio Business Template</td>
                                                <td>Sep 12, 2018</td>
                                                <td>Never</td>
                                                <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> -->
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="address">
                            <div class="myaccount-content address">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <div class="row learts-mb-n30">
                                    <!-- <div class="col-md-6 col-12 learts-mb-30">
                                        <h4 class="title">Billing Address <a href="#" class="edit-link">edit</a></h4>
                                        <address>
                                            <p><strong>Alex Tuntuni</strong></p>
                                            <p>1355 Market St, Suite 900 <br>
                                                San Francisco, CA 94103</p>
                                            <p>Mobile: (123) 456-7890</p>
                                        </address>
                                    </div> -->


                                    <?php
                                                
                                            while ($row = mysqli_fetch_array($orderResult)){
                                    ?>                        

                                    <div class="col-md-6 col-12 learts-mb-30">
                                        <h4 class="title">Shipping Address <a href="#" class="edit-link">edit</a></h4>
                                        <address>
                                            <!-- <p><strong>Alex Tuntuni</strong></p> -->
                                            <p><?php echo $row["order_address"];?></p> <?php    }  ?> 
                                        <?php    while ($row = mysqli_fetch_array($userResult)){ ?>
                                            <p><?php echo $row["user_phone"];?></p>  <?php    }  ?>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->
                                 
                                           
                        
                        
                        

                          



                            <?php
                            $userResult = mysqli_query($conn,"SELECT * FROM users WHERE user_id='".$_GET['user_id']."'");
                                                        $row = mysqli_fetch_array($userResult);


                            if (count($_POST)>0){
                                mysqli_query($conn,"UPDATE users SET user_firstname='".$_POST['user_firstname']."',user_lastname='". $_POST['user_lastname']."' ,username='" . $_POST['username']. "',user_password='".$_POST['user_password']. "' WHERE user_id='".$_POST['user_id']."'");
                            $alert = "Data successfully updated";
                            header("Location: my-account.php");
                            exit();
                            }
                            

                            ?>


                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="account-info">
                            <div class="myaccount-content account-details">
                                <div class="account-details-form">
                                <?php if(isset($alert)) {echo $alert;}?>
                                    <form action="" method="post">
                                        <div class="row learts-mb-n30">
                                            <div class="col-md-6 col-12 learts-mb-30">
                                                <div class="single-input-item">
                                                    <label for="first-name">First Name <abbr class="required">*</abbr></label>
                                                    <input type="hidden" id="user_id"name = "user_id"value="<?php echo $row['user_id']?>">
                            
                                                    <input type="text" id="first-name"name = "user_firstname"value="<?php echo $row['user_firstname']?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 learts-mb-30">
                                                <div class="single-input-item">
                                                    <label for="last-name">Last Name <abbr class="required">*</abbr></label>
                                                    <input type="text" id="last-name"name = "user_lastname"value="<?php echo $row['user_lastname']?>">
                                                </div>
                                            </div>
                                            <div class="col-12 learts-mb-30">
                                                <label for="display-name">Display Name <abbr class="required">*</abbr></label>
                                                <input type="text" id="display-name" name = "username"value="<?php echo $row['username']?>">
                                                <p>This will be how your name will be displayed in the account section and in reviews</p>
                                            </div>
                                            <div class="col-12 learts-mb-30">
                                                <label for="email">Email Addres <abbr class="required">*</abbr></label>
                                                <input type="email" id="email" name = "user_email"value="<?php echo $row['user_email']?>">
                                            </div>
                                            <div class="col-12 learts-mb-30 learts-mt-30">
                                                <fieldset>
                                                    <legend>Password change</legend>
                                                    <div class="row learts-mb-n30">
                                                        <!-- <div class="col-12 learts-mb-30">
                                                            <label for="current-pwd">Current password (leave blank to leave unchanged)</label>
                                                            <input type="password" id="current-pwd">
                                                        </div> -->
                                                        <div class="col-12 learts-mb-30">
                                                            <label for="new-pwd">New password (leave blank to leave unchanged)</label>
                                                            <input type="password" id="new-pwd"name = "user_password"value="<?php echo $row['user_password']?>">
                                                        </div>
                                                        <div class="col-12 learts-mb-30">
                                                            <label for="confirm-pwd">Confirm new password</label>
                                                            <input type="password" id="confirm-pwd"name = "user_password"value="<?php echo $row['user_password']?>">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 learts-mb-30">
                                                <button class="btn btn-dark btn-outline-hover-dark">Save Changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- Single Tab Content End -->

                    </div>
                </div> <!-- My Account Tab Content End -->
            </div>
        </div>
    </div>
    <!-- My Account Section End -->

    <div class="footer2-section section section-padding">
        <div class="container">
            <div class="row learts-mb-n40">

                <div class="col-lg-6 learts-mb-40">
                    <div class="widget-about">
                        <img src="assets/images/logo/logo-2.webp" alt="">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod itaque recusandae commodi mollitia facere iure nisi, laudantium quis quas perferendis a minus dolores.</p>
                    </div>
                </div>

                <div class="col-lg-4 learts-mb-40">
                    <div class="row">
                        <div class="col">
                            <ul class="widget-list">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Store location</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Orders</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="widget-list">
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Support Policy</a></li>
                                <li><a href="#">Size Guide</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 learts-mb-40">
                    <ul class="widget-list">
                        <li> <i class="fab fa-twitter"></i> <a href="https://www.twitter.com/">Twitter</a></li>
                        <li> <i class="fab fa-facebook-f"></i> <a href="https://www.facebook.com/">Facebook</a></li>
                        <li> <i class="fab fa-instagram"></i> <a href="https://www.instagram.com/">Instagram</a></li>
                        <li> <i class="fab fa-youtube"></i> <a href="https://www.youtube.com/">Youtube</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="footer2-copyright section">
        <div class="container">
            <p class="copyright text-center">&copy; 2023 learts. All Rights Reserved</p>
        </div>
    </div>

    <!-- JS
============================================ -->

    <!-- Vendors JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.1.0.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Plugins JS -->
    <script src="assets/js/plugins/select2.min.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/swiper.min.js"></script>
    <script src="assets/js/plugins/slick.min.js"></script>
    <script src="assets/js/plugins/mo.min.js"></script>
    <script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>
    <script src="assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/plugins/isotope.pkgd.min.js"></script>
    <script src="assets/js/plugins/jquery.matchHeight-min.js"></script>
    <script src="assets/js/plugins/ion.rangeSlider.min.js"></script>
    <script src="assets/js/plugins/photoswipe.min.js"></script>
    <script src="assets/js/plugins/photoswipe-ui-default.min.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/ResizeSensor.js"></script>
    <script src="assets/js/plugins/jquery.sticky-sidebar.min.js"></script>
    <script src="assets/js/plugins/product360.js"></script>
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins/jquery.scrollUp.min.js"></script>
    <script src="assets/js/plugins/scrollax.min.js"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script> -->

    <!-- Main Activation JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>