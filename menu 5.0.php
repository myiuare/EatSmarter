<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - EatsMat</title>
	<link rel="stylesheet" href="style.css">
    <style>
   
        
        /* Conteneur principal */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Titre de la page */
        .page-title {
            text-align: center;
            margin: 30px 0;
            color: #e63946;
            font-size: 2.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        /* Grille des articles */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        /* Carte d'article */
        .menu-item {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 20px rgba(0, 0, 0, 0.15);
        }
        
        /* Image de l'article */
        .menu-item-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }
        
        /* Conteneur des informations */
        .menu-item-info {
            padding: 20px;
        }
        
        /* Nom de l'article */
        .menu-item-name {
            font-size: 1.5rem;
            color: #333;
           
        }
        
        /* Description de l'article */
        .menu-item-desc {
            color: #666;
            margin-bottom: 15px;
            font-style: italic;
        }
        
        /* Prix de l'article */
        .menu-item-price {
            font-weight: bold;
            font-size: 1.2rem;
            color: #e63946;
            display: inline-block;
            background-color: #f8f8f8;
            padding: 5px 15px;
            border-radius: 20px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .menu-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
            }
            
            .page-title {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 480px) {
            .menu-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <?php require_once(__DIR__ . '/header.php'); ?>
    
    <div class="container">
        <h1 class="page-title">Notre Menu</h1>
        
        <div class="menu-grid">
            <?php 
            try {
                $mysqlClient = new PDO('mysql:host=localhost;dbname=eatsmatprojet;charset=utf8', 'root', '');
                $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = 'SELECT nom, prix, description, image_url FROM article';
                $stmt = $mysqlClient->prepare($sql);
                $stmt->execute();

                while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="menu-item">';
                    echo '<img src="' . htmlspecialchars($data["image_url"]) . '" alt="' . htmlspecialchars($data['nom']) . '" class="menu-item-img">';
                    echo '<div class="menu-item-info">';
                    echo '<h2 class="menu-item-name">' . htmlspecialchars($data['nom']) . '</h2>';
                    echo '<p class="menu-item-desc">' . htmlspecialchars($data['description']) . '</p>';
                    echo '<span class="menu-item-price">' . htmlspecialchars($data['prix']) . ' €</span>';
                    echo '</div>'; // Fermeture .menu-item-info
                    echo '</div>'; // Fermeture .menu-item
                }
            } catch (PDOException $e) {
                echo '<div class="error-message">Erreur de connexion : ' . $e->getMessage() . '</div>';
            }
            ?>
        </div>
    </div>
    
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>