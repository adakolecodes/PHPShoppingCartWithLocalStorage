<?php
session_start();

if(!isset($_GET['viewOrders'])) {
    header("Location: products.php");
    exit();
}else{
    $GET = filter_var_array($_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = $GET['customer_email'];

    include "config/dbconnect.php";
    include_once 'classes/User.php'; $userInstance = new User();
    include_once 'classes/Product.php'; $productInstance = new Product();

    $user = $userInstance->getUserByEmail($email, $pdo);
    if(!$user) { $_SESSION['error'] = "User does not exist"; header("Location: products.php"); exit(); }
    $customer_name = $user['customer_name'];
    $orders = $productInstance->getGroupedCustomerOrders($email);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include_once "components/nav-bar.php"; ?>
    <?php include_once "components/orders-authenticate.php"; ?>
    <div class="container mt-5 mb-5">
        <div class="mb-3">
            <h1>My Orders</h1>
            <p>Hi <?php echo $customer_name; ?></p>
            <hr>
        </div>
        <div>
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th>Order number</th>
                        <th>Product(s)</th>
                        <th>Shipping address</th>
                        <th>Date of order</th>
                        <th>View order</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['order_number']; ?></td>
                            <td><?php echo $order['productName']; ?></td>
                            <td><?php echo $order['shipping_address']; ?></td>
                            <td><?php echo $order['date_of_order']; ?></td>
                            <td><a href="order.php?order_number=<?php echo $order['order_number']; ?>">View</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>