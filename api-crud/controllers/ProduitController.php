<?php
// ProduitController.php

require_once "../config/database.php";  // Assurez-vous d'inclure la connexion à la base de données

// Fonction pour récupérer un plat spécifique par ID
function getPlatById($id_article) {
    global $pdo;
    // Préparer la requête pour récupérer un plat par son ID
    $stmt = $pdo->prepare("SELECT * FROM article WHERE id_article = :id_article");
    $stmt->bindParam(":id_article", $id_article, PDO::PARAM_INT);
    $stmt->execute();
    
    // Récupérer les données du plat
    $plat = $stmt->fetch(PDO::FETCH_OBJ);
    
    if ($plat) {
        echo json_encode($plat, JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(404);
        echo json_encode(["error" => "Plat non trouvé"]);
    }
}

function getPlats() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM article");
    $plats = $stmt->fetchAll(PDO::FETCH_OBJ);
    
    echo json_encode($plats, JSON_UNESCAPED_UNICODE);
}



function getPlatByNom($nom) {
    global $pdo;
    // Préparer la requête pour récupérer un plat par son nom
    $stmt = $pdo->prepare("SELECT * FROM article WHERE nom = :nom");
    $stmt->bindParam(":nom", $nom, PDO::PARAM_STR);  // Utiliser PDO::PARAM_STR pour le nom
    $stmt->execute();

    // Récupérer les données du plat
    $plat = $stmt->fetch(PDO::FETCH_OBJ);
    
    if ($plat) {
        // Si le plat existe, le renvoyer en JSON
        echo json_encode($plat, JSON_UNESCAPED_UNICODE);
    } else {
        // Si aucun plat n'est trouvé, renvoyer une erreur 404
        http_response_code(404);
        echo json_encode(["error" => "Plat non trouvé"]);
    }
}








// Fonction pour créer un plat
function createPlats() {
    global $pdo;
    $input = json_decode(file_get_contents("php://input"), true);  // Récupérer les données POST

    // Vérifier que les données sont complètes
    if (!isset($input["nom"]) || !isset($input["prix"]) || !isset($input["description"]) || !isset($input["id_categorie"]) || !isset($input["image_url"])) {
        http_response_code(400);  // Code erreur 400 : Mauvaise requête
        echo json_encode(["error" => "Données incomplètes"]);
        return;
    }

    // Préparer et exécuter la requête d'insertion
    $stmt = $pdo->prepare("INSERT INTO article (nom, prix, description, id_categorie, image_url) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$input["nom"], $input["prix"], $input["description"], $input["id_categorie"], $input["image_url"]]);

    // Réponse JSON
    echo json_encode(["message" => "Produit ajouté"]);
}
