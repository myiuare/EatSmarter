<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Me Contacter</title>
</head>
<body>
<?php require_once(__DIR__ . '/header.php'); ?>


<h1>Me Contacter</h1>
<p>Si vous avez un problème avec votre commande, n'hésitez pas à me contacter :</p>

<form action="confirmation.php" method="get">
    <label for="nom">Nom :</label><br>
    <input type="text" id="nom" name="nom" required><br><br>

    <label for="email">Email :</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="probleme">Votre problème :</label><br>
    <textarea id="probleme" name="probleme" rows="5" required></textarea><br><br>

    <input type="submit" value="Envoyer">
</form>
<?php require_once(__DIR__ . '/footer.php'); ?>

</body>
</html>
