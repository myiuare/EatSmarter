<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=eatsmartprojet;charset=utf8', 'root', '');
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Rechercher par ID
    if (isset($_GET['ID'])) {
        $id = $_GET['ID'];
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

    // Rechercher par nom (recherche partielle insensible à la casse)
    } elseif (isset($_GET['nom'])) {
        $nom = '%' . $_GET['nom'] . '%'; // Pour la recherche partielle
        $sql = 'SELECT id_article, nom, prix, description, image_url FROM article WHERE nom LIKE :nom';
        $stmt = $mysqlClient->prepare($sql);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->execute();
        $plats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($plats) {
            echo json_encode($plats);
        } else {
            echo json_encode(['error' => "Aucun plat trouvé avec le nom recherché."]);
        }

    // Aucun filtre → retourne tous les plats
    } else {
        $sql = 'SELECT id_article, nom, prix, description, image_url FROM article';
        $stmt = $mysqlClient->prepare($sql);
        $stmt->execute();
        $plats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($plats);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
