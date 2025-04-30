<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Récupération des données JSON envoyées
$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input['user_id']) || !isset($input['articles'])) {
    echo json_encode(["error" => "Paramètres manquants"]);
    exit;
}

try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=eatsmartprojet;charset=utf8', 'root', '');
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 1. Insertion dans la table "commande"
    $stmt = $mysqlClient->prepare("INSERT INTO commande (user_id, date_commande) VALUES (?, NOW())");
    $stmt->execute([$input['user_id']]);
    $commande_id = $mysqlClient->lastInsertId();

    // 2. Insertion des articles dans "ligne_commande"
    $stmtLigne = $mysqlClient->prepare("INSERT INTO ligne_commande (commande_id, article_id, quantite) VALUES (?, ?, ?)");

    foreach ($input['articles'] as $article) {
        if (isset($article['id']) && isset($article['quantite'])) {
            $stmtLigne->execute([$commande_id, $article['id'], $article['quantite']]);
        }
    }

    echo json_encode(["success" => true, "commande_id" => $commande_id]);

} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
