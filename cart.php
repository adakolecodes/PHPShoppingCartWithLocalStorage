<?php
session_start();
include "config/dbconnect.php";
include_once 'classes/Product.php';

// Check if $_SESSION['cart'] is set, and initialize it if not
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = json_encode([]);
}

// Retrieve cart contents from local storage
$cart = json_decode($_SESSION['cart'], true);//Cart data sent to retrieve_cart_items.php and stored in $_SESSION['cart'] which is accessible from here

// Initialize variables for total cost
$totalCost = 0;

// Create an instance of the Product class
$productInstance = new Product();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include_once "components/nav-bar.php"; ?>
    <?php include_once "components/feedback-message.php"; ?>
    <?php include_once "components/checkout.php"; ?>
    <?php include_once "components/orders-authenticate.php"; ?>
    <div class="container mt-5 mb-5">
        <div class="mb-5">
            <h1>Shopping Cart</h1>
            <hr>
        </div>
        <?php if(!empty($cart)){ ?>
            <!-- Cart table container -->
            <div>
                <?php include "components/cart-table.php"; ?>
            </div>
        <?php }else{?>
            <!-- Cart empty container -->
            <div>
                <div class="card">
                    <div class="card-header">
                        <h6>Cart</h6>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Your cart is empty.</p>
                        <a href="products.php" class="btn btn-dark btn-sm">Continue Shopping</a>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

    <script src="assets/js/cart.js"></script>
    <script>
        const canClearCart = "<?= $_SESSION['canClearCart'] ?>";
        if(canClearCart){
            localStorage.removeItem("cart");
        }
    </script>
    <?php unset($_SESSION['canClearCart']);?>
</body>
</html>