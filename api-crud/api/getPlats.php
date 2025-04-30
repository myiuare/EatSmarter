<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Permet à toutes les origines d'accéder à l'API

try {
    // Connexion à la base de données
    $mysqlClient = new PDO('mysql:host=localhost;dbname=eatsmartprojet;charset=utf8', 'root', '');
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cas où un ID est passé dans l'URL (recherche d'un plat spécifique)
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = 'SELECT id_article, nom, prix, description, image_url FROM article WHERE id_article = :id';
        $stmt = $mysqlClient->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $plat = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($plat) {
            echo json_encode($plat);
        } else {
            echo json_encode(['error' => "Aucun plat trouvé avec l'ID $id."]);
        }
    

    // Cas où un nom de plat est passé dans l'URL (recherche par nom)
    } elseif (isset($_GET['nom'])) {
        $nom = '%' . $_GET['nom'] . '%'; // Recherche partielle (insensible à la casse)
        $sql = 'SELECT id_article, nom, prix, description, image_url FROM article WHERE nom LIKE :nom';
        $stmt = $mysqlClient->prepare($sql);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->execute();
        $plats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($plats) {
            // Si des plats sont trouvés, on les retourne en JSON
            echo json_encode($plats);
        } else {
            // Si aucun plat ne correspond, on retourne une erreur
            echo json_encode(['error' => "Aucun plat trouvé avec le nom recherché."]);
        }

    // Cas où aucun ID ni nom n'est fourni (on retourne tous les plats)
    } else {
        $sql = 'SELECT id_article, nom, prix, description, image_url FROM article';
        $stmt = $mysqlClient->prepare($sql);
        $stmt->execute();
        $plats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($plats); // Retourne tous les plats
    }

} catch (PDOException $e) {
    // En cas d'erreur de connexion à la base de données, on retourne l'erreur
    echo json_encode(['error' => 'Erreur de connexion à la base de données : ' . $e->getMessage()]);
}
?>
