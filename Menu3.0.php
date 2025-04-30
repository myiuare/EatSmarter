<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Menu</title>
</head>
<body>
<?php require_once(__DIR__ . '/header.php'); ?>

<?php 

try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=eatsmartprojet;charset=utf8', 'root', '');
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT nom, prix, description, image_url FROM article';
    $stmt = $mysqlClient->prepare($sql);
    $stmt->execute();

    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<br> <b>' . htmlspecialchars($data['nom'])  . '<br> </b>' ;
        echo ' <i>Description : ' . htmlspecialchars($data['description']) . '</i><br>';
        echo '<br> <b>'. htmlspecialchars($data['prix']) . '</b> <br>';

        echo '<img src="' . $data["image_url"] . '" alt="Image" style="width: 300px; height: auto; margin: 10px;">';
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}

?>

<?php require_once(__DIR__ . '/footer.php'); ?>

</body>
</html>
