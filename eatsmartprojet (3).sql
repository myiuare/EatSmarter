-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 30 avr. 2025 à 14:48
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eatsmartprojet`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` decimal(15,2) DEFAULT NULL,
  `description` varchar(480) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_categorie` int(11) NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_article`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `nom`, `prix`, `description`, `id_categorie`, `image_url`) VALUES
(7, 'Le Qatayef', '5.30', 'Le katayef ou qatayef est un dessert a base de crepe farcie de creme nappee de pistaches.', 2, 'https://www.fooddolls.com/wp-content/uploads/2022/04/Atayef12726.jpg\r\n'),
(3, 'Le Chawarma', '13.50', 'Viande epicee grillee sur une broche verticale, puis tranchee en lamelles.', 1, 'https://www.luxorandaswan.com/admin/uploads/1605829511Shawarma.png'),
(2, 'Baba Ganousch', '19.50', 'Ce plat est a base d\'aubergine (prealablement grillee), preparee en mousse, melangee à du tahini.', 1, 'https://www.luxorandaswan.com/admin/uploads/1605829704Baba-Ganoush.jpg\r\n'),
(1, 'La Kofta', '14.00', 'Il s agit de boulettes de viande hachee concoctees avec des epices. Ces boulettes sont traditionnellement roulees et roties sur un baton en bois, a la maniere d une brochette.', 1, 'https://www.voyageegypte.fr/cdn/eg-public/kofta_egyptien_shutterstock_1940304430-MAX-w1000h600.jpg'),
(8, 'Le jalebi egyptien', '4.78', 'Le jilapi ou jalebi est un delicieux beignet leger trempe dans un sirop de sucre.', 2, 'https://www.orientale.fr/images--I--8008.jpg'),
(9, 'Le basbousa', '3.99', 'La basboussa est un gateau de semoule au sirop de d eau de fleur d\'oranger.', 2, 'https://ilovearabicfood.com/wp-content/uploads/2020/08/01-Lotus-Basbousa.jpg'),
(13, 'Coca-cola', '1.50', NULL, 3, 'https://tp2019gmp1.wordpress.com/wp-content/uploads/2019/04/logo-coca-cola.png?w=648'),
(14, 'Sprite', '1.50', NULL, 3, 'https://upload.wikimedia.org/wikipedia/commons/b/b9/Sprite_Logo.svg'),
(15, 'Fanta', '1.50', NULL, 3, 'https://logo-marque.com/wp-content/uploads/2020/06/Fanta-Logo.png');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom`) VALUES
(1, 'Plats'),
(2, 'Desserts'),
(3, 'Boissons');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date_commande` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `user_id`, `date_commande`) VALUES
(1, 1, '2025-04-25 14:06:30'),
(2, 1, '2025-04-28 09:42:18'),
(3, 1, '2025-04-28 09:43:11'),
(4, 1, '2025-04-28 09:44:13'),
(5, 1, '2025-04-30 13:41:22'),
(6, 1, '2025-04-30 15:39:12');

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `id_article` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  PRIMARY KEY (`id_article`,`id_commande`),
  KEY `id_commande` (`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

DROP TABLE IF EXISTS `ligne_commande`;
CREATE TABLE IF NOT EXISTS `ligne_commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commande_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `commande_id` (`commande_id`),
  KEY `article_id` (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`id`, `commande_id`, `article_id`, `quantite`) VALUES
(1, 1, 2, 1),
(2, 1, 5, 3),
(3, 2, 9, 1),
(4, 3, 8, 1),
(5, 3, 9, 1),
(6, 3, 14, 1),
(7, 4, 1, 1),
(8, 4, 8, 2),
(9, 4, 13, 2),
(10, 5, 2, 1),
(11, 5, 5, 3),
(12, 6, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
