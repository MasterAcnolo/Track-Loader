<?php
require_once __DIR__ . '/../services/UserService.php';
require_once __DIR__ . '/../helpers/helpers.php';
require_once __DIR__ . '/../utils/TokenUtils.php';

function createUser($config) {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $remember = trim($_POST['remember'] ?? '');

    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8) {
        sendJson(400, ["error" => "Invalid Credentials"]);
        notification('error', 'Invalid Credentials');
        exit;
    }

    $result = createUserService($email, $password);

    if ($result['message'] === "success") {
        $user = getUserByEmailService($email);
        $token = createToken(['email' => $email, 'exp' => time() + 86400], $config);

        if ($remember === "on") {
            setcookie("token", $token, time() + 3600, "/");
        } else {
            $_SESSION['token'] = $token;
        }

        $_SESSION['user'] = [
            'id_user' => $user['id_user'],
            'email'   => $email
        ];

        notification('success', 'Inscription réussie, bienvenue !');
        http_response_code(303);
        header("Location: /Track-Loader/");
        exit;

    } elseif ($result['message'] === "User already exists") {
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

function loginUser($config) {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $remember = trim($_POST['remember'] ?? '');

    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        sendJson(400, ["error" => "Email invalide ou inexistant"]);
        exit;
    }

    if (strlen($password) < 8) {
        sendJson(400, ["error" => "Mot de passe trop court"]);
        notification("error", "Mot de passe trop court");
        exit;
    }

    $result = loginUserService($email, $password);

    if ($result['message'] === "success") {
        $token = createToken(['email' => $email, 'exp' => time() + 86400], $config);

        if ($remember === "on") {
            setcookie("token", $token, time() + 3600, "/");
        } else {
            $_SESSION['token'] = $token;
        }

        $_SESSION['user'] = [
            'id_user' => $result['user']['id_user'],
            'email'   => $email
        ];

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

function logoutUser() {
    setcookie('logout_notif', json_encode([
        'type'    => 'success',
        'message' => 'Déconnexion réussie.'
    ]), time() + 60, '/');

    if (session_status() === PHP_SESSION_ACTIVE) {
        session_unset();
        session_destroy();
    }

    if (isset($_COOKIE['token'])) {
        unset($_COOKIE['token']);
        setcookie('token', '', 1, '/');
    }

    http_response_code(303);
    header("Location: /Track-Loader/");
    die();
}

function deleteUser() {
    if (!isset($_SESSION['user']['id_user'])) {
        notification('error', 'Utilisateur non connecté.');
        http_response_code(303);
        header('Location: /Track-Loader/pages/login.php');
        exit;
    }

    $idUser = $_SESSION['user']['id_user'];

    $result = deleteUserService($idUser);

    if ($result['message'] === 'success') {
        session_unset();
        session_destroy();

        if (isset($_COOKIE['token'])) {
            unset($_COOKIE['token']);
            setcookie('token', '', 1, '/');
        }

        notification('success', 'Compte supprimé.');
        http_response_code(303);
        header('Location: /Track-Loader/');
        exit;
    } else {
        notification('error', 'Erreur lors de la suppression.');
        http_response_code(500);
        header('Location: /Track-Loader/');
        exit;
    }
}
function changePassword($config) {
    if (!isset($_SESSION['user']['id_user'])) {
        notification('error', 'Utilisateur non connecté.');
        header('Location: /Track-Loader/pages/account.php');
        exit;
    }

    $idUser = $_SESSION['user']['id_user'];
    $currentPassword = trim($_POST['current_password'] ?? '');
    $newPassword = trim($_POST['new_password'] ?? '');
    $confirmPassword = trim($_POST['confirm_password'] ?? '');

    if (!$currentPassword || !$newPassword || !$confirmPassword) {
        notification('error', 'Tous les champs sont obligatoires');
        header('Location: /Track-Loader/pages/account.php');
        exit;
    }

    if (strlen($newPassword) < 8) {
        notification('error', 'Le nouveau mot de passe doit contenir au moins 8 caractères');
        header('Location: /Track-Loader/pages/account.php');
        exit;
    }

    if ($newPassword !== $confirmPassword) {
        notification('error', 'Les mots de passe ne correspondent pas');
        header('Location: /Track-Loader/pages/account.php');
        exit;
    }

    $result = verifyUserPasswordService($idUser, $currentPassword);
    if ($result['message'] !== 'success') {
        notification('error', 'Ancien mot de passe incorrect');
        header('Location: /Track-Loader/pages/account.php');
        exit;
    }

    $update = updateUserPasswordService($idUser, $newPassword);
    if ($update['message'] === 'success') {
        notification('success', 'Mot de passe modifié avec succès');
    } else {
        notification('error', 'Erreur lors de la modification du mot de passe');
    }

    header('Location: /Track-Loader/pages/account.php');
    exit;
}