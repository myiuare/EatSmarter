
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Menu</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        .plat { border: 1px solid #ccc; padding: 10px; margin: 10px; }
        .image-plat { width: 200px; height: auto; }
    </style>
</head>
<body>
<?php require_once(__DIR__ . '/header.php'); ?>

<h1>Menu</h1>

<form id="commandeForm">
    <div id="menu">
        <?php
        try {
            $mysqlClient = new PDO('mysql:host=localhost;dbname=eatsmartprojet;charset=utf8', 'root', '');
            $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'SELECT id_article, nom, prix, description, image_url FROM article';
            $stmt = $mysqlClient->prepare($sql);
            $stmt->execute();

            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="plat">';
                echo '<h3><a href="plats.php?id=' . $data['id_article'] . '">' . htmlspecialchars($data['nom']) . '</a></h3>';
                echo '<p>' . htmlspecialchars($data['description']) . '</p>';
                echo '<strong>' . htmlspecialchars($data['prix']) . ' €</strong><br>';
                echo '<img src="' . $data["image_url"] . '" class="image-plat"><br>';
                echo 'Quantité : <input type="number" name="quantite[' . $data['id_article'] . ']" min="0" value="0"><br>';
                echo '</div>';
            }
        } catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
        }
        ?>
    </div>

    <button type="submit">Commander</button>
</form>

<script>
    document.getElementById('commandeForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const articles = [];

        for (const [key, value] of formData.entries()) {
            const match = key.match(/^quantite\[(\d+)\]$/);
            if (match && parseInt(value) > 0) {
                articles.push({ id: parseInt(match[1]), quantite: parseInt(value) });
            }
        }

        if (articles.length === 0) {
            alert("Veuillez sélectionner au moins un plat.");
            return;
        }

        fetch('api-crud/api/commander.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                user_id: <?php echo isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : 1; ?>,
                articles: articles
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert("Commande envoyée avec succès ! ID : " + data.commande_id);
                window.location.reload();
            } else {
                alert("Erreur lors de la commande : " + data.error);
            }
        });
    });
</script>

<?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>
