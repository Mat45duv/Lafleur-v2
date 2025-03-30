-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 30 mars 2025 à 07:30
-- Version du serveur : 11.4.0-MariaDB
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fleur`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id_cli` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cli` varchar(100) NOT NULL,
  `prenom_cli` varchar(100) NOT NULL,
  `adresse_cli` varchar(255) NOT NULL,
  `mail_cli` varchar(100) NOT NULL,
  `motdepasse_cli` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cli`),
  UNIQUE KEY `mail_cli` (`mail_cli`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_cli`, `nom_cli`, `prenom_cli`, `adresse_cli`, `mail_cli`, `motdepasse_cli`) VALUES
(1, 'Dupont', 'Jean', '12 Rue des Fleurs, Paris', 'jean.dupont@example.com', '123'),
(2, 'DUVIVE', 'user1', '1 rue de la champ', 'm@m.fr', '$2y$10$kOEO25FlI0FugkT7E7RPZePsrtyWxHkBGFdcvpt0rLUSHdyvuezAe');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_facture` varchar(20) DEFAULT NULL,
  `date_facture` date DEFAULT NULL,
  `montant` varchar(20) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

DROP TABLE IF EXISTS `factures`;
CREATE TABLE IF NOT EXISTS `factures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_facture` varchar(20) NOT NULL,
  `date_facture` date NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero_facture` (`numero_facture`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_livraison` varchar(20) DEFAULT NULL,
  `date_livraison` date DEFAULT NULL,
  `adresse_livraison` varchar(100) DEFAULT NULL,
  `statut` varchar(20) DEFAULT NULL,
  `facture_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livraisons`
--

DROP TABLE IF EXISTS `livraisons`;
CREATE TABLE IF NOT EXISTS `livraisons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_livraison` varchar(20) NOT NULL,
  `date_livraison` date NOT NULL,
  `adresse_livraison` varchar(255) NOT NULL,
  `statut` enum('En cours','Expédié','Livré','Annulé') NOT NULL DEFAULT 'En cours',
  `facture_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero_livraison` (`numero_livraison`),
  KEY `facture_id` (`facture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL CHECK (`quantite` > 0),
  `prix_unitaire` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `produit_id` (`produit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id_pro` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pro` varchar(150) NOT NULL,
  `desc_pro` text NOT NULL,
  `prix_pro` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_pro`, `nom_pro`, `desc_pro`, `prix_pro`, `image_url`) VALUES
(1, 'Rose Rouge', 'Symbole de l\'amour, idéale pour les occasions romantiques.', 15.00, 'images/rose_rouge.jpg'),
(2, 'Tulipe Jaune', 'Représente le soleil et la joie, parfaite pour égayer une pièce.', 12.00, 'images/tulipe_jaune.jpg'),
(3, 'Lys Blanc', 'Symbole de pureté et d\'élégance, parfait pour un mariage.', 20.00, 'images/lys_blanc.jpg'),
(4, 'Orchidée Violette', 'Une touche exotique et sophistiquée pour votre intérieur.', 25.00, 'images/orchidee_violette.jpg'),
(5, 'Tournesol', 'Apporte de la chaleur et de la bonne humeur à votre espace.', 18.00, 'images/tournesol.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id_cli`) ON DELETE CASCADE;

--
-- Contraintes pour la table `livraisons`
--
ALTER TABLE `livraisons`
  ADD CONSTRAINT `livraisons_ibfk_1` FOREIGN KEY (`facture_id`) REFERENCES `factures` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id_cli`) ON DELETE CASCADE,
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id_pro`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
