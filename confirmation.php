
<?php require_once(__DIR__ . '/header.php'); ?>

<?php
// Récupérer les paramètres dans l'URL
$email = isset($_GET['email']) ? $_GET['email'] : 'Non spécifié';
$probleme = isset($_GET['probleme']) ? $_GET['probleme'] : 'Non spécifié';
$nom = isset($_GET['nom']) ? $_GET['nom'] : 'Non spécifié;'
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Confirmation de Contact</title>
</head>
<body>

<h1>Confirmation de votre soumission</h1>

<p><strong> Nom : </strong> <?php echo htmlspecialchars($nom); ?></p>

<p><strong>Email :</strong> <?php echo htmlspecialchars($email); ?></p>

<p><strong>Problème :</strong> <?php echo htmlspecialchars($probleme); ?></p>
<?php require_once(__DIR__ . '/header.php'); ?>

</body>
</html>
