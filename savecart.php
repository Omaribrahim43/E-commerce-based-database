
<?php
include 'includes/head-vars.php';
// session_start();

if(isset($_SESSION['loggedInStatus']) && $_SESSION['loggedInStatus'] == true){
           
            $loggedInId = $_SESSION['loggedInUserData']['id'];
            $array_product=$_SESSION['cart'];
        //   print_r($_SESSION['cart']);
          foreach ($_SESSION['cart'] as $item) {
           $product_id = $item['productid'];
           $product_quantity = $item['quantity']; 

           
           $sql_c= "INSERT INTO cart (user_id,product_id,product_quantity)
           VALUES ('$loggedInId','$product_id','$product_quantity')";
           $result = mysqli_query($conn, $sql_c);
           if (mysqli_query($conn, $sql_c)) {
               echo "inserted succsessfully";
        } else {
            echo "Error: " . mysqli_error($conn);
            // header('Location: shopping-cart.php');
        }
        }
           header('Location: checkout.php');
        }
         else {
            $loggedInID = NULL;
            header('Location: shopping-cart.php');

        } 
         

        ?>