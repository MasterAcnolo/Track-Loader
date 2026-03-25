<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $description = htmlspecialchars($_POST['description']);

    require __DIR__ . '/../config/database.php'; // $pdo est défini dans database.php

    try {
        $stmt = $pdo->prepare("
            INSERT INTO user (pseudo, email, password, description) 
            VALUES (:pseudo, :email, :password, :description)
        ");

        $stmt->execute([
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        echo "Utilisateur créé ";

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}