<?php
require_once __DIR__ . '/../services/PanierServices.php';
require_once __DIR__ . '/../helpers/helpers.php';
require_once __DIR__ . '/../utils/TokenUtils.php';

function getPanier($config) {
    $user = getAuthUser($config);
    if (!$user) {
        notification('error', 'Vous devez être connecté.');
        sendJson(401, ["error" => "Non authentifié"]);
        exit;
    }

    $result = getPanierService($user['id_user']);

    if (isset($result['error'])) {
        sendJson(500, ["error" => $result['error']]);
        exit;
    }

    sendJson(200, ["panier" => $result]);
}

function addToPanier($config, $id_album) {
    $user = getAuthUser($config);
    if (!$user) {
        notification('error', 'Vous devez être connecté.');
        http_response_code(303);
        header("Location: /Track-Loader/pages/login.php");
        exit;
    }

    $result = addToPanierService($user['id_user'], $id_album);

    if ($result['message'] === "success") {
        notification('success', 'Album ajouté au panier !');
    } elseif ($result['message'] === "already_in_panier") {
        notification('error', 'Cet album est déjà dans votre panier.');
    } else {
        notification('error', 'Erreur lors de l\'ajout au panier.');
    }

    http_response_code(303);
    header("Location: /Track-Loader/pages/album.php?id=$id_album");
    exit;
}

function removeFromPanier($config, $id_album) {
    $user = getAuthUser($config);
    if (!$user) {
        sendJson(401, ["error" => "Non authentifié"]);
        exit;
    }

    $result = removeFromPanierService($user['id_user'], $id_album);

    if ($result['message'] === "success") {
        notification('success', 'Album retiré du panier');
        http_response_code(303);
        header("Location: /Track-Loader/pages/cart.php");
        exit;
    } elseif ($result['message'] === "not_found") {
        notification('error', 'Album non trouvé dans le panier');
        http_response_code(303);
        header("Location: /Track-Loader/pages/cart.php");
        exit;
    } else {
        notification('error', 'Erreur lors de la suppression');
        http_response_code(303);
        header("Location: /Track-Loader/pages/cart.php");
        exit;
    }
}

function checkout($config) {
    $user = getAuthUser($config);
    if (!$user) {
        notification('error', 'Vous devez être connecté.');
        http_response_code(303);
        header("Location: /Track-Loader/pages/login.php");
        exit;
    }

    $result = checkoutService($user['id_user']);

    if ($result['message'] === "success") {
        notification('success', 'Achat confirmé ! Merci pour votre commande.');
        http_response_code(303);
        header("Location: /Track-Loader/");
        exit;
    } elseif ($result['message'] === "empty_panier") {
        notification('error', 'Votre panier est vide.');
        http_response_code(303);
        header("Location: /Track-Loader/pages/cart.php");
        exit;
    } else {
        notification('error', 'Erreur lors du paiement.');
        http_response_code(303);
        header("Location: /Track-Loader/pages/cart.php");
        exit;
    }
}

// Helper interne : récupère l'user connecté depuis le token
function getAuthUser($config) {
    return $_SESSION['user'] ?? null;
}