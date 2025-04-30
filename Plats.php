<?php
// Initialiser une session cURL
$ch = curl_init();

// Définir l'URL de l'API locale pour récupérer tous les plats
curl_setopt($ch, CURLOPT_URL, 'http://localhost/SaraLeal/EatSmart-main/api-crud/api/index.php');

// Indiquer que nous voulons récupérer le résultat sous forme de chaîne
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Exécuter la requête et récupérer la réponse JSON
$response = curl_exec($ch);

// Fermer la session cURL pour libérer les ressources
curl_close($ch);

// Vérifier si la requête a réussi
if ($response === false) {
    die("Erreur lors de la récupération des données de l'API.");
}

// Convertir la réponse JSON en tableau PHP associatif
$data = json_decode($response, true);

// Vérifier si la réponse est vide ou invalide
if (!$data) {
    die("Aucune donnée reçue ou format JSON invalide.");
}

// Afficher les plats sous forme de liste HTML avec des liens
echo "<h2>Plats disponibles :</h2><ul>";
foreach ($data as $produit) {
    // Créer un lien vers la page des détails de chaque plat
    echo "<li><a href='plats.php?id=" . htmlspecialchars($produit['id_article']) . "'>" . htmlspecialchars($produit['nom']) . "</a> - " . htmlspecialchars($produit['prix']) . " €</li>";
}
echo "</ul>";

// Récupérer l'ID du plat depuis l'URL si elle existe
$id_article = isset($_GET['id']) ? $_GET['id'] : null;

if ($id_article) {
    // Si un ID est passé, récupérer un plat spécifique
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://localhost/SaraLeal/EatSmart-main/api-crud/api/index.php?id_article=' . $id_article);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response === false) {
        die("Erreur lors de la récupération des données de l'API.");
    }

    $data = json_decode($response, true);

    if (!$data) {
        die("Aucune donnée reçue ou format JSON invalide.");
    }

    if (isset($data[0])) {
        $plat = $data[0]; // On suppose que l'API renvoie un tableau, même pour un seul plat
        echo "<h2>Plat : " . htmlspecialchars($plat['nom']) . "</h2>";
        echo "<p><strong>Prix:</strong> " . htmlspecialchars($plat['prix']) . " €</p>";
        echo "<p><strong>Description:</strong> " . htmlspecialchars($plat['description']) . "</p>";
        echo "<p><strong>Catégorie:</strong> " . htmlspecialchars($plat['id_categorie']) . "</p>";
        echo "<img src='" . htmlspecialchars($plat['image_url']) . "' alt='" . htmlspecialchars($plat['nom']) . "' style='width:300px; height:auto;'>";
    } else {
        echo "<p>Plat non trouvé.</p>";
    }
} else {
    // Si aucun ID n'est passé, afficher tous les plats
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://localhost/SaraLeal/EatSmart-main/api-crud/api/index.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response === false) {
        die("Erreur lors de la récupération des données de l'API.");
    }

    $data = json_decode($response, true);

    if (!$data) {
        die("Aucune donnée reçue ou format JSON invalide.");
    }

    echo "<h2>Plats disponibles :</h2><ul>";
    foreach ($data as $produit) {
        echo "<li><a href='plats.php?id=" . htmlspecialchars($produit['id_article']) . "'>" . htmlspecialchars($produit['nom']) . "</a> - " . htmlspecialchars($produit['prix']) . " €</li>";
    }
    echo "</ul>";
}
?>
