<?php
require_once __DIR__ . '/../services/UserService.php';

function createUser($config) {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $remember = trim($_POST['remember'] ?? '');

    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8) {
        http_response_code(400);
        header('Content-Type: application/json');
        echo json_encode(["error" => "Invalid Credentials"]);
        notification('error', 'Invalid Credentials');
        exit;
    }

    $result = createUserService($email, $password);

    if($result['message'] === "success"){
        require_once __DIR__ . '/../utils/TokenUtils.php';
        $token = createToken(['email' => $email, 'exp' => time() + 86400], $config);
        if($remember === "on"){
            setcookie("token", $token, time() + 3600, "/");
        } else {
            $_SESSION['token'] = $token;
        }
        notification('success', 'Inscription réussie, bienvenue !');
        http_response_code(303);
        header("Location: /Track-Loader/");
        exit;
    } elseif($result['message'] === "User already exists") {
        notification('error', 'Un compte existe déjà avec cet email.');
        http_response_code(303);
        header('Location: /Track-Loader/pages/register.php');
        exit;
    } else {
        notification('error', 'Erreur lors de l\'inscription.');
        http_response_code(500);
        header('Location: /Track-Loader/pages/register.php');
        exit;
    }
}

function loginUser($config){
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $remember = trim($_POST['remember'] ?? '');

    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        header('Content-Type: application/json');
        echo json_encode(["error" => "Email invalide ou inexistant"]);
        exit;
    }
    if (strlen($password) < 8) {
        http_response_code(400);
        header('Content-Type: application/json');
        notification("error","Mot de passe trop court");
        exit;
    }

    $result = loginUserService($email, $password);

    if($result['message'] === "success"){
        require_once __DIR__ . '/../utils/TokenUtils.php';
        $token = createToken(['email' => $email, 'exp' => time() + 86400], $config);
        if($remember === "on"){
            setcookie("token", $token, time() + 3600, "/");
        } else {
            $_SESSION['token'] = $token;
        }
        notification('success', 'Connexion réussie !');
        http_response_code(303);
        header("Location: /Track-Loader/");
        exit;
    } else {
        notification('error', 'Identifiants invalides');
        http_response_code(303);
        header('Location: /Track-Loader/pages/login.php');
        exit;
    }
}

function logoutUser(){
    setcookie('logout_notif', json_encode([
        'type' => 'success',
        'message' => 'Déconnexion réussie.'
    ]), time() + 60, '/');

    if (session_status() === PHP_SESSION_ACTIVE){
        session_unset();
        session_destroy();
    };

    if (isset($_COOKIE['token'])){
        unset($_COOKIE['token']); 
        setcookie('token', '', 1, '/'); 
    };

    http_response_code(303);
    header("Location: /Track-Loader/");
    die();

}