<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Menu</title>
</head>
<body>

<?php require_once(__DIR__ . '/header.php'); ?>


<?php 


$plats = [
    ["La Kofta", "Description : Il s’agit de boulettes de viande hachée concoctées avec des épices. Ces boulettes sont traditionnellement roulées et rôties sur un bâton en bois, à la manière d’une brochette.", "14,95$", "https://www.voyageegypte.fr/cdn/eg-public/kofta_egyptien_shutterstock_1940304430-MAX-w1000h600.jpg"],
    ["Baba Ganousch", "Description: Ce plat est à base d'aubergine (préalablement grillée), préparée en mousse, mélangée à du tahini.", "19,50$", "https://www.luxorandaswan.com/admin/uploads/1605829704Baba-Ganoush.jpg"],
    ["Le Chawarma", "Description : Viande épicée grillée sur une broche verticale, puis tranchée en lamelles.", "13,50$", "https://www.luxorandaswan.com/admin/uploads/1605829511Shawarma.png"]
];


$desserts = [
    ["Le Qatayef", "Le katayef ou qatayef est un dessert à base de crêpe farcie de crème nappée de pistaches.", "5,30$", "https://www.fooddolls.com/wp-content/uploads/2022/04/Atayef12726.jpg"],
    ["Le jalebi égyptien", "Le jilapi ou jalebi est un délicieux beignet léger trempé dans un sirop de sucre.", "4,78$", "https://www.diasporaco.com/cdn/shop/articles/hetal-jalebi_1200x1200.jpg?v=1614197120"],
    ["Le basbousa", "La basboussa est un gâteau de semoule au sirop de d'eau de fleur d'oranger.", "3,99$", "https://ilovearabicfood.com/wp-content/uploads/2020/08/01-Lotus-Basbousa.jpg"]
];


$boissons = [
    ["Coca-cola", "1,50$", "https://tp2019gmp1.wordpress.com/wp-content/uploads/2019/04/logo-coca-cola.png?w=648"],
    ["Sprite", "1,50$", "https://upload.wikimedia.org/wikipedia/commons/b/b9/Sprite_Logo.svg"],
    ["Fanta", "1,50$", "https://logo-marque.com/wp-content/uploads/2020/06/Fanta-Logo.png"]
];
?>

<h1>Plats</h1>
<?php foreach ($plats as $plat): ?>
    <section>
        <h2><?php echo $plat[0]; ?></h2>
        <img src="<?php echo $plat[3]; ?>" width="154" height="142">
        <h3><?php echo $plat[1]; ?></h3>
        <h3><?php echo $plat[2]; ?></h3>
    </section>
<?php endforeach; ?>

<h1>Desserts</h1>
<?php foreach ($desserts as $dessert): ?>
    <section>
        <h2><?php echo $dessert[0]; ?></h2>
        <img src="<?php echo $dessert[3]; ?>" width="154" height="142">
        <h3><?php echo $dessert[1]; ?></h3>
        <h3><?php echo $dessert[2]; ?></h3>
    </section>
<?php endforeach; ?>

<h1>Boissons</h1>
<?php foreach ($boissons as $boisson): ?>
    <section>
        <img src="<?php echo $boisson[2]; ?>" width="154" height="142">
        <h3><?php echo $boisson[0]; ?> - <?php echo $boisson[1]; ?></h3>
    </section>
<?php endforeach; ?>

<?php require_once(__DIR__ . '/footer.php'); ?>

</body>
</html>
