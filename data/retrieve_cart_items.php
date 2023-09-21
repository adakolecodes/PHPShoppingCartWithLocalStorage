<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the cart data from the request
    $cartData = json_decode(file_get_contents("php://input"), true);

    // Check if the cart data is valid
    if (!isset($cartData['cartItems'])) {
        echo json_encode(['error' => 'Invalid cart data']);
        exit;
    }

    // Store the cart data in the session
    $_SESSION['cart'] = json_encode($cartData['cartItems']);

    // Respond with a success message
    echo json_encode(['message' => 'Cart items updated successfully']);
}else{
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
    exit;
}
?>
