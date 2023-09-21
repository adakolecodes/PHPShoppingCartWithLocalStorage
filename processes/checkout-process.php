<?php

session_start();

if(isset($_POST['order'])){
    include "../config/dbconnect.php";
    include_once '../classes/User.php';
    include_once '../classes/Product.php';

    $userInstance = new User();
    $productInstance = new Product();

    $POST = filter_var_array($_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $customer_email = $POST['customer_email'];
    $customer_name = $POST['customer_name'];
    $shipping_address = $POST['shipping_address'];
    //Generate a random number for order number
    $order_number = rand(100, 999) . time();

    //Validate empty inputs
    if(empty($customer_email) || empty($customer_name) || empty($shipping_address)){
        $_SESSION['error'] = 'Please fill in all fields';
        header("Location: ../cart.php");
        exit();
    }

    //Define data array
    //Get product from cart and store in data array
    $cart = json_decode($_SESSION['cart'], true);

    //Check if user is registered or not
    $user = $userInstance->getUserByEmail($customer_email, $pdo);
    //If user is not registered, register user and insert order, else insert order
    if(!$user){
        if($userInstance->createUser($customer_email, $customer_name)){
            //Get user id
            $createdUser = $userInstance->getUserByEmail($customer_email, $pdo);
            if($createdUser){
                $userId = $createdUser['id'];
                foreach($cart as $cartItem){
                    $data = [
                        'order_number' => $order_number,
                        'user_id' => $userId,
                        'product_id' => $cartItem['productId'],
                        'product_name' => $cartItem['productName'],
                        'product_price' => $cartItem['productPrice'],
                        'quantity' => $cartItem['quantity'],
                        'item_cost' => $cartItem['productPrice'] * $cartItem['quantity'],
                        'shipping_address' => $shipping_address
                    ];

                    $productInstance->createOrder($data);
                }

                $_SESSION['success'] = 'Order placed successfully';
                $_SESSION['canClearCart'] = true;
                unset($_SESSION['cart']);
                header("Location: ../cart.php");
            }else{
                $_SESSION['error'] = "An error occured!";
                header("Location: ../cart.php");
            }
        }else{
            $_SESSION['error'] = "An error occured!";
            header("Location: ../cart.php");
        }
    }else{
        $userId = $user['id'];
        foreach($cart as $cartItem){
            $data = [
                'order_number' => $order_number,
                'user_id' => $userId,
                'product_id' => $cartItem['productId'],
                'product_name' => $cartItem['productName'],
                'product_price' => $cartItem['productPrice'],
                'quantity' => $cartItem['quantity'],
                'item_cost' => $cartItem['productPrice'] * $cartItem['quantity'],
                'shipping_address' => $shipping_address
            ];

            $productInstance->createOrder($data);
        }

        $_SESSION['success'] = 'Order placed successfully';
        $_SESSION['canClearCart'] = true;
        unset($_SESSION['cart']);
        header("Location: ../cart.php");
    }
}?>