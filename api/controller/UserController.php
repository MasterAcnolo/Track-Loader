<?php
require_once __DIR__ . '/../services/UserService.php';

function createUser($config) {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $remember = trim($_POST['remember'] ?? '');

    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(["error" => "Email invalide ou inexistant"]);
        exit;
    }
    if (strlen($password) < 8) {
        http_response_code(400);
        echo json_encode(["error" => "Mot de passe trop court"]);
        exit;
    }

    $result = createUserService($email, $password);

    if($result['message'] === "success"){

        require_once __DIR__ . '/../utils/TokenUtils.php';
        
        $token = createToken(['email' => $email, 'exp' => time() + 86400], $config);

        if($remember === "on"){
            setcookie("token", $token, time() + 3600, "/");
        };

        header("Location: /Track-Loader/");
        exit;
    }

    echo json_encode($result);
}

function logoutUser(){
    if ($_SESSION){
        session_unset();
        session_destroy();
    };

    if ($_COOKIE['token']){
        unset($_COOKIE['token']); 
        setcookie('token', '', 1, '/'); 
    };

    header("Location: /Track-Loader/");
    die();

}