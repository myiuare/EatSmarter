<?php
$apiUrl = "http://localhost/SaraLeal/EatSmart-main/api-crud/api/getPlats.php";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$plats = json_decode($response, true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des plats</title>
</head>
<body>
    <h1>Nos plats</h1>
    <ul>
        <?php foreach ($plats as $plat): ?>
            <li>
                <a href="plats.php?id=<?= urlencode($plat['id_article']) ?>">
                    <?= htmlspecialchars($plat['nom']) ?> – <?= htmlspecialchars($plat['prix']) ?> €
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
