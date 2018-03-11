-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 23 Février 2017 à 16:26
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bd_zorobabel_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `tb_boulangerie`
--

CREATE TABLE IF NOT EXISTS `tb_boulangerie` (
`idBoulangerie` int(11) NOT NULL,
  `nomBoulangerie` varchar(50) DEFAULT NULL,
  `communeBoulangerie` varchar(50) DEFAULT NULL,
  `adresseBoulangerie` varchar(50) DEFAULT NULL,
  `idchefBoulangerie` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='contient toutes les information consernant une boulagerie de la société zorobale';

--
-- Contenu de la table `tb_boulangerie`
--

INSERT INTO `tb_boulangerie` (`idBoulangerie`, `nomBoulangerie`, `communeBoulangerie`, `adresseBoulangerie`, `idchefBoulangerie`) VALUES
(1, 'Zorobabel Lubumbashi', 'Lubumbashi', '12 Av Femme Katangaise ', 1),
(2, 'Zorobabel Kampemba', 'Kampemba', '123 Av Savonnier', 1),
(3, 'Zorobabel Kamalondo', 'Kamalondo', '466 Av Lumumba ', 1),
(4, 'Zorobabel Ruashi', 'Ruashi', '456 Av Kimushi', 1),
(5, 'Zorobabel Annexe', 'Annexe', '978 Av Dispensaire', 1),
(6, 'Zorobabel Katuba', 'Katuba', '12 Av Manika', 1),
(7, 'Zorobabel Kenya', 'Kenya', '947 Av sakania', 1),
(8, 'Zorobabel Lubumbashi', 'Lubumbashi', '2345 Av Maniema', 1),
(9, 'Zorobabel Lubumbashi', 'Lubumbashi', '456 Av Lomami', 1),
(10, 'Zorobabel Lubumbashi', 'Lubumbashi', '875 Av Tabora', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tb_chef_boulangerie`
--

CREATE TABLE IF NOT EXISTS `tb_chef_boulangerie` (
`idChef` int(11) NOT NULL,
  `nomComplet` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `addresse` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='repertoire de tous les chefs des boulangeris zorobale';

--
-- Contenu de la table `tb_chef_boulangerie`
--

INSERT INTO `tb_chef_boulangerie` (`idChef`, `nomComplet`, `email`, `phone`, `addresse`, `username`, `password`) VALUES
(1, 'Ngudia Nkashama Manassé', 'ngudiamanasse@gmail.com', '+243976322706', '12 Av Savonnier Q/Bel-air C/Kapemba', 'manasoft', 'clarkmanasoft');

-- --------------------------------------------------------

--
-- Structure de la table `tb_client`
--

CREATE TABLE IF NOT EXISTS `tb_client` (
`idclient` int(11) NOT NULL,
  `nom_complet` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tb_client`
--

INSERT INTO `tb_client` (`idclient`, `nom_complet`, `email`, `phone`, `adresse`, `login`, `password`) VALUES
(1, 'szfgh', 'sdfghjk@esisalama.org', 'gff', 'dgfd', 'fd', 'fd'),
(2, 'manasoft ngudia', 'ngudiamanasse@gmail.com', '0976322706', '12 av savonnir q/bel-air c/kapemba', 'manasoft', 'manasoft'),
(3, 'clark', 'clark@gmail.com', '0976322706', '12 AV femme katangaise C/lububumbashi', 'clark', 'clark'),
(4, 'soft', 'soft@gmail.com', '0876534567', '12 AV kamalondo', 'soft', 'soft'),
(5, 'Benita Nkelende', 'benita@gmail.com', '0978460461', '51 AV 7 C/Katuba', 'benita', 'benita');

-- --------------------------------------------------------

--
-- Structure de la table `tb_commande`
--

CREATE TABLE IF NOT EXISTS `tb_commande` (
`idCommande` int(11) NOT NULL,
  `idClient` int(11) DEFAULT NULL,
  `total_cmd` double DEFAULT NULL,
  `adresse_livraison` varchar(255) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `etat_commande` varchar(150) DEFAULT NULL,
  `date_commande` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tb_commande`
--

INSERT INTO `tb_commande` (`idCommande`, `idClient`, `total_cmd`, `adresse_livraison`, `latitude`, `longitude`, `etat_commande`, `date_commande`) VALUES
(10, 2, 6500, '12 av Savonnier C/Kapemba', 23, 56, 'En cours', '2017-02-19 22:28:35'),
(11, 2, 20000, '67 Av Makomeno C/Lubumbashi', 34, 67, 'En cours', '2017-02-21 21:26:26'),
(12, 4, 3500, '97 Av 30 juin C/Kampemba', 45, 37, 'En cours', '2017-02-21 21:41:04'),
(13, 5, 4500, '51 Av 7 C/Katuba', 45, 28, 'En cours', '2017-02-23 16:34:07');

-- --------------------------------------------------------

--
-- Structure de la table `tb_ligne_commande`
--

CREATE TABLE IF NOT EXISTS `tb_ligne_commande` (
`idLignecmd` int(11) NOT NULL,
  `idProduit` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `idCommande` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tb_livraison`
--

CREATE TABLE IF NOT EXISTS `tb_livraison` (
`idLivraison` int(11) NOT NULL,
  `idLivreur` int(11) DEFAULT NULL,
  `idCommande` int(11) DEFAULT NULL,
  `num_plaque_vehicule` varchar(10) DEFAULT NULL,
  `imei_smarthphone` varchar(100) DEFAULT NULL,
  `heure_depart` datetime DEFAULT NULL,
  `heure_livraison` datetime DEFAULT NULL,
  `accuse_reception` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tb_livreur`
--

CREATE TABLE IF NOT EXISTS `tb_livreur` (
`idLivreur` int(11) NOT NULL,
  `nom_complet` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `profession` varchar(50) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `num_permis` varchar(150) DEFAULT NULL,
  `dure_permis` datetime DEFAULT NULL,
  `pseudo` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tb_produit`
--

CREATE TABLE IF NOT EXISTS `tb_produit` (
`idProduit` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `poids` float DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `garniture` varchar(50) DEFAULT NULL,
  `typeproduit` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `idBoulangerie` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tb_produit`
--

INSERT INTO `tb_produit` (`idProduit`, `nom`, `prix`, `poids`, `description`, `garniture`, `typeproduit`, `image`, `stock`, `statut`, `idBoulangerie`) VALUES
(1, 'Pain Carré', 1500, 2, 'pain carré au levain', '100', 'commun', 'image1.jpg', 20, 'Active', 1),
(2, 'Pain au fromant', 2500, 1.5, 'pain au fromat', '100', 'commun', 'image3.jpg', 20, 'Active', 1),
(3, 'Pain blanc carré', 3000, 1.5, 'pain blanc carré avec levain', '100', 'commun', 'image4.jpg', 20, 'Active', 6),
(4, 'pain au levain', 1250, 1, 'pain au levain trop bon', '50', 'commun', 'image8.jpg', 20, 'Active', 3),
(5, 'pain complet', 1500, 2, 'pain complet', '50', 'commun', 'image2.jpg', 20, 'Active', 1),
(6, 'baguette', 3500, 1.3, 'baguettes diverses', '100', 'commun', 'image3.jpg', 20, 'Active', 2),
(7, 'baguette speciale', 1000, 2.5, 'baguettes speciales', '50', 'specialité', 'image5.jpg', 20, 'Active', 1),
(8, 'pain familial', 1000, 3.5, 'pain ideal pour toute la famille', '30', 'specialite', 'image6.jpg', 20, 'Active', 5),
(9, 'croissant', 3000, 0.5, 'croissant tres delicieux', '100', 'commun', 'image7.jpg', 20, 'Active', 1),
(10, 'croissant au beurre', 3500, 0.5, 'croissant contenant du beurre tres delicieux', '100', 'specilite', 'image9.jpg', 20, 'Active', 4),
(11, 'courone garnis', 1500, 0.3, 'pain couroné tres bon pour les princesses', '100', 'specialite', 'image10.jpg', 20, 'Active', 3),
(12, 'pain hambourg', 1000, 0.1, 'pain hambourg ', '100', 'specialite', 'image11.jpg', 20, 'Active', 7),
(13, 'pain simple', 500, 0.1, 'pain simple ', '100', 'commun', 'image12.jpg', 20, 'Active', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tb_boulangerie`
--
ALTER TABLE `tb_boulangerie`
 ADD PRIMARY KEY (`idBoulangerie`), ADD KEY `tb_boulangerie_tb_chef_boulangerie_idChef_fk` (`idchefBoulangerie`);

--
-- Index pour la table `tb_chef_boulangerie`
--
ALTER TABLE `tb_chef_boulangerie`
 ADD PRIMARY KEY (`idChef`);

--
-- Index pour la table `tb_client`
--
ALTER TABLE `tb_client`
 ADD PRIMARY KEY (`idclient`);

--
-- Index pour la table `tb_commande`
--
ALTER TABLE `tb_commande`
 ADD PRIMARY KEY (`idCommande`), ADD KEY `tb_commande_tb_client_idclient_fk` (`idClient`);

--
-- Index pour la table `tb_ligne_commande`
--
ALTER TABLE `tb_ligne_commande`
 ADD PRIMARY KEY (`idLignecmd`), ADD KEY `tb_ligne_commande_tb_commande_idCommande_fk` (`idCommande`), ADD KEY `tb_ligne_commande_tb_produit_idProduit_fk` (`idProduit`);

--
-- Index pour la table `tb_livraison`
--
ALTER TABLE `tb_livraison`
 ADD PRIMARY KEY (`idLivraison`), ADD KEY `tb_livraison_tb_livreur_idLivreur_fk` (`idLivreur`), ADD KEY `tb_livraison_tb_commande_idCommande_fk` (`idCommande`);

--
-- Index pour la table `tb_livreur`
--
ALTER TABLE `tb_livreur`
 ADD PRIMARY KEY (`idLivreur`);

--
-- Index pour la table `tb_produit`
--
ALTER TABLE `tb_produit`
 ADD PRIMARY KEY (`idProduit`), ADD KEY `tb_produit_tb_boulangerie_idBoulangerie_fk` (`idBoulangerie`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `tb_boulangerie`
--
ALTER TABLE `tb_boulangerie`
MODIFY `idBoulangerie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `tb_chef_boulangerie`
--
ALTER TABLE `tb_chef_boulangerie`
MODIFY `idChef` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `tb_client`
--
ALTER TABLE `tb_client`
MODIFY `idclient` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `tb_commande`
--
ALTER TABLE `tb_commande`
MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `tb_ligne_commande`
--
ALTER TABLE `tb_ligne_commande`
MODIFY `idLignecmd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tb_livraison`
--
ALTER TABLE `tb_livraison`
MODIFY `idLivraison` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tb_livreur`
--
ALTER TABLE `tb_livreur`
MODIFY `idLivreur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tb_produit`
--
ALTER TABLE `tb_produit`
MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tb_boulangerie`
--
ALTER TABLE `tb_boulangerie`
ADD CONSTRAINT `tb_boulangerie_tb_chef_boulangerie_idChef_fk` FOREIGN KEY (`idchefBoulangerie`) REFERENCES `tb_chef_boulangerie` (`idChef`);

--
-- Contraintes pour la table `tb_commande`
--
ALTER TABLE `tb_commande`
ADD CONSTRAINT `tb_commande_tb_client_idclient_fk` FOREIGN KEY (`idClient`) REFERENCES `tb_client` (`idclient`);

--
-- Contraintes pour la table `tb_ligne_commande`
--
ALTER TABLE `tb_ligne_commande`
ADD CONSTRAINT `tb_ligne_commande_tb_commande_idCommande_fk` FOREIGN KEY (`idCommande`) REFERENCES `tb_commande` (`idCommande`),
ADD CONSTRAINT `tb_ligne_commande_tb_produit_idProduit_fk` FOREIGN KEY (`idProduit`) REFERENCES `tb_produit` (`idProduit`);

--
-- Contraintes pour la table `tb_livraison`
--
ALTER TABLE `tb_livraison`
ADD CONSTRAINT `tb_livraison_tb_commande_idCommande_fk` FOREIGN KEY (`idCommande`) REFERENCES `tb_commande` (`idCommande`),
ADD CONSTRAINT `tb_livraison_tb_livreur_idLivreur_fk` FOREIGN KEY (`idLivreur`) REFERENCES `tb_livreur` (`idLivreur`);

--
-- Contraintes pour la table `tb_produit`
--
ALTER TABLE `tb_produit`
ADD CONSTRAINT `tb_produit_tb_boulangerie_idBoulangerie_fk` FOREIGN KEY (`idBoulangerie`) REFERENCES `tb_boulangerie` (`idBoulangerie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
