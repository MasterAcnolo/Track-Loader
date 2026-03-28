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
            SELECT id_user, email, password FROM user 
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

function getUserByEmailService($email) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("
            SELECT id_user, email FROM user
            WHERE email = :email
        ");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    } catch (PDOException $e) {
        return null;
    }
}

function deleteUserService($idUser) {
    global $pdo;

    $sql = "DELETE FROM user WHERE id_user = :id_user";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['id_user' => $idUser])) {
        return ['message' => 'success'];
    }

    return ['message' => 'error'];
}