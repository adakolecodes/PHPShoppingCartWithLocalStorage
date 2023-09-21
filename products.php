<?php
session_start();
include_once 'classes/Product.php';
$productInstance = new Product();
$products = $productInstance->getAllProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include_once "components/nav-bar.php"; ?>
    <?php include_once "components/feedback-message.php"; ?>
    <?php include_once "components/orders-authenticate.php"; ?>
    <div class="container mt-5 mb-5">
        <div class="mb-5">
            <h1>Products</h1>
            <p>Total Products: <?php echo count($products); ?></p>
            <hr>
        </div>
        <div class="mb-5">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php foreach($products as $product): ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="uploads/<?php echo $product['product_image']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $product['product_name']; ?></h3>
                                <h5 class="card-title">$<?php echo number_format($product['product_price'], 2); ?></h5>
                                <p class="card-text d-inline-block text-truncate" style="max-width: 250px;"><?php echo $product['product_description']; ?></p>
                                <p class="card-text text-muted"><?php echo $product['product_category']; ?></p>
                                <a href="product.php?id=<?php echo $product['id']; ?>" class="btn btn-secondary btn-sm">View Product</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>