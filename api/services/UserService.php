<?php
require_once __DIR__ . '/../config/database.php';

function createUserService($email, $password) {

    global $pdo; // Récuperer le PDO
    
    try {
        $stmt = $pdo->prepare("
            INSERT INTO user (email, password) 
            VALUES (:email, :password)
        ");
        $stmt->execute([
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        return ["message" => "success"];
    

    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();

        if(str_contains($errorMessage, "SQLSTATE[23000]")){
            return ["message" => "User already exists"];
        };

        return ["error" => $errorMessage];
    }
}

function loginUserService($email, $password) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("
            SELECT email, password FROM user 
            WHERE email = :email
        ");

        $stmt->execute([
            'email' => $email,
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return ["message" => "Invalid Credentials"];
        }

        if (!password_verify($password, $user['password'])) {
            return ["message" => "Invalid Credentials"];
        }

        return ["message" => "success", "user" => $user];

    } catch (PDOException $e) {
        return ["error" => $e->getMessage()];
    }
}