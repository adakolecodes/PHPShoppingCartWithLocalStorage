<?php

class User{
    public function getUserByEmail($email, $pdo){
        $sql = "SELECT * FROM users WHERE customer_email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function createUser($name, $email){
        include "../config/dbconnect.php";
        $sql = "INSERT INTO users (customer_email, customer_name) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email]);
        return $stmt;
    }
}