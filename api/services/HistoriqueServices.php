<?php
require_once __DIR__ . '/../config/database.php';

function getHistoriqueService($id_user) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("
            SELECT a.name AS title, a.author_name AS artist,
                   a.cover, a.price,
                   h.purchase_date
            FROM historique_achat h
            JOIN album a ON a.id_album = h.id_album
            WHERE h.id_user = :id_user
            ORDER BY h.purchase_date DESC
        ");
        $stmt->execute(['id_user' => $id_user]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return ["error" => $e->getMessage()];
    }
}