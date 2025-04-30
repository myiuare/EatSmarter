<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Menu</title>
</head>
<body>

<h1>Plats Classic</h1>
<?php 
$platsClassic = platsParCategorie($plats, 'Classic');
foreach ($platsClassic as $plat): ?>
    <section>
        <h2><?php echo $plat['nom']; ?></h2>
        <img src="<?php echo $plat['image']; ?>" width="154" height="142">
        <h3><?php echo $plat['description']; ?></h3>
        <h3><?php echo $plat['prix']; ?></h3>
    </section>
<?php endforeach; ?>

<h1>Plats Spécialités</h1>
<?php 
$platsSpecialites = platsParCategorie($plats, 'Spécialité');
foreach ($platsSpecialites as $plat): ?>
    <section>
        <h2><?php echo $plat['nom']; ?></h2>
        <img src="<?php echo $plat['image']; ?>" width="154" height="142">
        <h3><?php echo $plat['description']; ?></h3>
        <h3><?php echo $plat['prix']; ?></h3>
    </section>
<?php endforeach; ?>

<h1>Desserts</h1>
<?php 
$dessertsCategory = platsParCategorie($desserts, 'Dessert');
foreach ($dessertsCategory as $dessert): ?>
    <section>
        <h2><?php echo $dessert['nom']; ?></h2>
        <img src="<?php echo $dessert['image']; ?>" width="154" height="142">
        <h3><?php echo $dessert['description']; ?></h3>
        <h3><?php echo $dessert['prix']; ?></h3>
    </section>
<?php endforeach; ?>

<h1>Boissons</h1>
<?php 
$boissonsCategory = platsParCategorie($boissons, 'Boisson');
foreach ($boissonsCategory as $boisson): ?>
    <section>
        <h2><?php echo $boisson['nom']; ?></h2>
        <img src="<?php echo $boisson['image']; ?>" width="154" height="142">
        <h3><?php echo $boisson['prix']; ?></h3>
    </section>
<?php endforeach; ?>

</body>
</html>
