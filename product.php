<?php
session_start();
include "config/dbconnect.php";
include_once 'classes/Product.php';
if(!isset($_GET['id'])){
    header("Location: products.php");
}else{
    $productInstance = new Product();
    $id = $_GET['id'];
    $product = $productInstance->getProductById($id);

    //Access product in cart session
    $cart = json_decode($_SESSION['cart'], true);
    foreach($cart as $cartItem){
        if($cartItem['productId'] == $product['id']){
            $productInCart = $cartItem;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include_once "components/nav-bar.php"; ?>
    <?php include_once "components/feedback-message.php"; ?>
    <?php include_once "components/orders-authenticate.php"; ?>
    <div class="container mt-5 mb-5">
        <div class="row mb-5">
            <div class="col-md-4">
                <img src="uploads/<?php echo $product['product_image']; ?>" class="img-fluid rounded-4 shadow-sm" alt="">
            </div>
            <div class="col-md-8">
                <div>
                    <h4><?php echo $product['product_name']; ?></h4>
                    <h1>$<?php echo number_format($product['product_price'], 2); ?></h1>
                    <p class="text-muted"><?php echo $product['product_category']; ?></p>
                    <p><?php echo $product['product_description']; ?></p>
                    
                    <!-- Add to cart button -->
                    <!-- Dynamically show label of add to cart button (both button does same thing and has same attributes, only label changes) -->
                    <?php if((!empty($productInCart)) && $productInCart['quantity'] >= 1){ ?>
                        <button type="button" class="btn btn-dark btn-sm" id="addToCart" data-product-id="<?php echo $product['id']; ?>" data-product-name="<?php echo $product['product_name']; ?>" data-product-price="<?php echo $product['product_price']; ?>" data-quantity="1">+</button>
                    <?php }else{ ?>
                        <button type="button" class="btn btn-dark btn-sm" id="addToCart" data-product-id="<?php echo $product['id']; ?>" data-product-name="<?php echo $product['product_name']; ?>" data-product-price="<?php echo $product['product_price']; ?>" data-quantity="1">Add to Cart</button>
                    <?php } ?>

                    <!-- Display the quantity if the product is in the cart -->
                    <span id="quantityLabel_<?php echo $product['id']; ?>"></span>

                    <!-- Decrement Button -->
                    <!-- Dynamically show decrement button only if the product is in the cart -->
                    <?php if((!empty($productInCart)) && $productInCart['quantity'] >= 1): ?>
                        <button type="button" class="btn btn-danger btn-sm" id="decrementCart" data-product-id="<?php echo $product['id']; ?>">-</button>
                        <a href="cart.php" class="btn btn-link btn-sm">View cart</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

    <script src="assets/js/cart.js"></script>
</body>
</html>