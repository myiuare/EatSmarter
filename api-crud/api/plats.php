<?php
// Vérifier si l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $idPlat = $_GET['id']; // Récupérer l'ID du plat
} else {
    echo "Aucun ID spécifié.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Détails du plat</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        .plat { border: 1px solid #ccc; padding: 20px; margin: 10px; }
        .image-plat { width: 300px; height: auto; }
    </style>
</head>
<body>
    <?php require_once(__DIR__ . '/header.php'); ?>

    <h1>Détails du plat</h1>

    <div id="plat-details"></div> <!-- Section pour afficher les détails du plat -->

    <script>
        // Récupérer l'ID du plat à partir de l'URL
        const platId = <?php echo $idPlat; ?>;
        
        // Effectuer l'appel API pour récupérer les détails du plat
        fetch(`http://localhost/SaraLeal/EatSmart-main/api-crud/api/getPlats.php?ID=${platId}`)
            .then(response => response.json())
            .then(data => {
                console.log(data); // Afficher la réponse de l'API dans la console pour déboguer
                if (data.error) {
                    // Si l'API renvoie une erreur (par exemple, plat non trouvé), afficher l'erreur
                    document.getElementById('plat-details').innerHTML = `<p>${data.error}</p>`;
                } else {
                    // Si les données sont valides, afficher les informations du plat
                    document.getElementById('plat-details').innerHTML = `
                        <div class="plat">
                            <h2>${data.nom}</h2>
                            <img src="${data.image_url}" alt="${data.nom}" class="image-plat">
                            <p>${data.description}</p>
                            <strong>Prix : ${data.prix} €</strong>
                        </div>
                    `;
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                document.getElementById('plat-details').innerHTML = '<p>Erreur de chargement des détails du plat.</p>';
            });
    </script>

    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>
