<?php
require_once __DIR__ . '/../config/database.php';

function getPanierService($id_user) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("
            SELECT p.id_panier, a.*
            FROM panier p
            JOIN album a ON a.id_album = p.id_album
            WHERE p.id_user = :id_user
        ");
        $stmt->execute(['id_user' => $id_user]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return ["error" => $e->getMessage()];
    }
}

function addToPanierService($id_user, $id_album) {
    global $pdo;
    try {
        // INSERT IGNORE grâce au UNIQUE(id_user, id_album) dans ta DB
        $stmt = $pdo->prepare("
            INSERT IGNORE INTO panier (id_user, id_album)
            VALUES (:id_user, :id_album)
        ");
        $stmt->execute([
            'id_user'  => $id_user,
            'id_album' => $id_album,
        ]);
        if ($stmt->rowCount() === 0) {
            return ["message" => "already_in_panier"];
        }
        return ["message" => "success"];
    } catch (PDOException $e) {
        return ["error" => $e->getMessage()];
    }
}

function removeFromPanierService($id_user, $id_album) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("
            DELETE FROM panier
            WHERE id_user = :id_user AND id_album = :id_album
        ");
        $stmt->execute([
            'id_user'  => $id_user,
            'id_album' => $id_album,
        ]);
        if ($stmt->rowCount() === 0) {
            return ["message" => "not_found"];
        }
        return ["message" => "success"];
    } catch (PDOException $e) {
        return ["error" => $e->getMessage()];
    }
}

function checkoutService($id_user) {
    global $pdo;
    try {
        $items = getPanierService($id_user);

        if (empty($items) || isset($items['error'])) {
            return isset($items['error'])
                ? $items
                : ["message" => "empty_panier"];
        }

        // Insertion en masse dans historique_achat
        $pdo->beginTransaction();
        $stmt = $pdo->prepare("
            INSERT INTO historique_achat (id_user, id_album)
            VALUES (:id_user, :id_album)
        ");
        foreach ($items as $item) {
            $stmt->execute([
                'id_user'  => $id_user,
                'id_album' => $item['id_album'],
            ]);
        }

        // Vide le panier après achat
        $del = $pdo->prepare("DELETE FROM panier WHERE id_user = :id_user");
        $del->execute(['id_user' => $id_user]);

        $pdo->commit();
        return ["message" => "success", "purchased" => $items];

    } catch (PDOException $e) {
        $pdo->rollBack();
        return ["error" => $e->getMessage()];
    }
}