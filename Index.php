<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        /* Reset de base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        /* En-tête */
        .header {
            background-color: #1a4756; /* Couleur bleu foncé comme votre deuxième image */
            color: white;
            text-align: center;
            padding: 20px 0;
        }
        
        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 5px;
        }
        
        .header p {
            font-size: 1.2rem;
        }
        
        /* Menu de navigation */
        .nav-menu {
            background-color: #2d6277; /* Bleu plus clair pour le menu */
            padding: 15px 0;
            text-align: center;
			 align-items: center;
        }
        
        .nav-menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        
        .nav-menu ul li {
            margin: 0 15px;
        }
        
        .nav-menu ul li a {
            text-decoration: none;
            color: white;
            font-weight: normal;
            font-size: 1.1rem;
            padding: 10px 15px;
            transition: background-color 0.3s ease;
        }
        
        .nav-menu ul li a:hover, .nav-menu ul li a.active {
            color: #fff;
            text-decoration: underline;
        }
        
        /* Conteneur principal */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Section de bienvenue */
        .welcome-section {
            text-align: center;
            margin: 40px 0;
        }
        
        .welcome-section h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 30px;
        }
        
        .welcome-img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        
        .welcome-text {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            font-size: 1.1rem;
            line-height: 1.8;
        }
        
        /* Bouton CTA */
        .cta-button {
            display: inline-block;
            background-color: #8B4513;
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        
        .cta-button:hover {
            background-color: #CD853F;
        }
        
        /* Section des spécialités */
        .specialties-section {
            margin: 60px 0;
            text-align: center;
        }
        
        .specialties-section h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 30px;
        }
        
        .specialties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }
        
        .specialty-item {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .specialty-item:hover {
            transform: translateY(-5px);
        }
        
        .specialty-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        
        /* Prix en rouge comme dans la deuxième image */
        .price {
            color: #e63946;
            font-weight: bold;
            font-size: 1.2rem;
            margin-top: 10px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .nav-menu ul {
                flex-direction: column;
            }
            
            .nav-menu ul li {
                margin: 5px 0;
            }
            
            .specialties-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }
    </style>
</head>

<body>
    <!-- En-tête -->
    <header class="header">
        <h1>Restaurant</h1>
        <p>Des produits frais et savoureux chaque jour</p>
    </header>
    
    <!-- Menu de navigation -->
    <nav class="nav-menu">
        <ul>
            <li><a href="Index.php" class="active">Accueil</a></li>
            <li><a href="Menu 5.0.php">Menu</a></li>
            <li><a href="commander.php">Commander</a></li>
            <li><a href="a_propos.php">À Propos</a></li>
            <li><a href="me_contacter.php">Contact</a></li>
        </ul>
    </nav>
    
    <div class="container">
        <!-- Section de bienvenue -->
        <section class="welcome-section">
            <h2>Bienvenue dans notre Restaurant à spécialités égyptien</h2>
            <img src="https://media.istockphoto.com/id/1490753206/fr/photo/plats-%C3%A9gyptiens-orientaux-vue-de-dessus.jpg?s=612x612&w=0&k=20&c=n7VCqwSVo9vKtBrN3vyQmcbcfe87Ri99m0F8l-QLe9g=" alt="Pâtisseries de la boulangerie" class="welcome-img">
            <div class="welcome-text">
                <a href="Menu 5.0.php" class="cta-button">Découvrir nos produits</a>
            </div>
        </section>
        
        <!-- Section des spécialités -->
        <section class="specialties-section">
            <h2>Les meilleurs Vente</h2>
            <div class="specialties-grid">
                <div class="specialty-item">
                    <img src="images/baguettes.jpg" alt="Le Qatayef" class="specialty-img">
                </div>
                <div class="specialty-item">
                    <img src="images/croissants.jpg" alt="Le jalebi égyptien" class="specialty-img">
                </div>
                <div class="specialty-item">
                    <img src="images/tartes.jpg" alt="Le basbousa" class="specialty-img">
                </div>
            </div>
        </section>
    </div>
    
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>