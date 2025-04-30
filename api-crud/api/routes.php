<?php
require_once "../config/database.php";  // Assurez-vous d'inclure la connexion à la base de données
require_once "../controllers/ProduitController.php";  // Assurez-vous d'inclure le contrôleur

$requestMethod = $_SERVER["REQUEST_METHOD"];
$id_article = isset($_GET['id_article']) ? $_GET['id_article'] : null;  // Récupérer le paramètre 'id_article' depuis l'URL
$nom = isset($_GET['nom']) ? $_GET['nom'] : null;  // Récupérer le paramètre 'nom' depuis l'URL

switch ($requestMethod) {
    case "GET":
        if ($id_article) {
            getPlatById($id_article);
        } elseif ($nom) {
            getPlatByNom($nom);
        } else {
            getPlats();
        }
        break;

    case "POST":
        createPlats();  
        break;

    default:
        http_response_code(405);  
        echo json_encode(["error" => "Méthode non supportée"]);
        break;
}
