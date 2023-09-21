<?php

class Product{
    public function getAllProducts(){
        include "config/dbconnect.php";
        $sql = "SELECT * FROM products ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function getProductById($id){
        include "config/dbconnect.php";
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        return $product;
    }

    public function createOrder($data){
        include "../config/dbconnect.php";
        $sql = "INSERT INTO orders (order_number, user_id, product_id, product_name, product_price, quantity, item_cost, shipping_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                $data['order_number'],
                $data['user_id'], 
                $data['product_id'], 
                $data['product_name'], 
                $data['product_price'], 
                $data['quantity'], 
                $data['item_cost'], 
                $data['shipping_address']
            ]
        );
        return $stmt;
    }

    public function getGroupedCustomerOrders($email){
        include "config/dbconnect.php";
        $sql = "SELECT orders.id, orders.order_number, orders.shipping_address, orders.date_of_order, GROUP_CONCAT(orders.product_name) AS productName FROM orders, users WHERE orders.user_id = users.id AND users.customer_email = ? GROUP BY orders.order_number ORDER BY orders.id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $order = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $order;
    }
}