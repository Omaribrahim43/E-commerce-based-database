<?php 
$pageTitle = 'Wishlist';
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
                        <h1 class="title">Wishlist</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Wishlist</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- Wishlist Section Start -->
    <div class="section section-padding">
        <div class="container">
            <form class="cart-form" action="#">
                <table class="cart-wishlist-table table">
                    <thead>
                        <tr>
                            <th class="name" colspan="2">Product</th>
                            <th class="price">Unit Price</th>
                            <th class="add-to-cart">&nbsp;</th>
                            <th class="remove">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="thumbnail"><a href="product-details.php"><img src="https://htmldemo.net/learts/learts/assets/images/product/cart-product-1.webp" alt="wishlist-product-1"></a></td>
                            <td class="name"> <a href="product-details.php">Walnut Cutting Board</a></td>
                            <td class="price"><span>£100.00</span></td>
                            <td class="add-to-cart"><a href="#" class="btn btn-light btn-hover-dark"><i class="fas fa-shopping-cart mr-2"></i>Add to Cart</a></td>
                            <td class="remove"><a href="#" class="btn">×</a></td>
                        </tr>
                        <tr>
                            <td class="thumbnail"><a href="product-details.php"><img src="https://htmldemo.net/learts/learts/assets/images/product/cart-product-2.webp" alt="wishlist-product-2"></a></td>
                            <td class="name"> <a href="product-details.php">Lucky Wooden Elephant</a></td>
                            <td class="price"><span>£35.00</span></td>
                            <td class="add-to-cart"><a href="#" class="btn btn-light btn-hover-dark"><i class="fas fa-shopping-cart mr-2"></i>Add to Cart</a></td>
                            <td class="remove"><a href="#" class="btn">×</a></td>
                        </tr>
                        <tr>
                            <td class="thumbnail"><a href="product-details.php"><img src="https://htmldemo.net/learts/learts/assets/images/product/cart-product-3.webp" alt="wishlist-product-3"></a></td>
                            <td class="name"> <a href="product-details.php">Fish Cut Out Set</a></td>
                            <td class="price"><span>£9.00</span></td>
                            <td class="add-to-cart"><a href="#" class="btn btn-light btn-hover-dark"><i class="fas fa-shopping-cart mr-2"></i>Add to Cart</a></td>
                            <td class="remove"><a href="#" class="btn">×</a></td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col text-center mb-n3">
                        <a class="btn btn-light btn-hover-dark mr-3 mb-3" href="shop.php">Continue Shopping</a>
                        <a class="btn btn-dark btn-outline-hover-dark mb-3" href="shopping-cart.php">View Cart</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!-- Wishlist Section End -->
<?php 
include 'includes/footer.php';
include 'includes/scripts.php';
?>
