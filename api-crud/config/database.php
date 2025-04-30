<?php
$host = 'localhost';  // Adresse de ton serveur MySQL
$dbname = 'eatsmartprojet';  // Nom de ta base de données
$username = 'root';  // Ton utilisateur MySQL
$password = '';  // Pas de mot de passe dans ton cas

try {
    // Connexion PDO avec encodage UTF-8 (utf8mb4 pour support complet des caractères)
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4", 
        $username, 
        $password
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit();
}
?>
