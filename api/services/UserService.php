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
        http_response_code(500);
        $errorMessage = $e->getMessage();

        if(str_contains($errorMessage, "SQLSTATE[23000]")){
            return ["message" => "User already exists"];
        };

        return ["error" => $errorMessage];
    }
}