-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 04 mai 2024 à 16:40
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `campingmaouzeteixeiramacedo`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idcli` int NOT NULL AUTO_INCREMENT,
  `nomcli` varchar(30) NOT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `cp` varchar(6) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `mail` varchar(30) DEFAULT NULL,
  `motpasse` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idcli`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idcli`, `nomcli`, `adresse`, `cp`, `ville`, `telephone`, `mail`, `motpasse`) VALUES
(1, 'MAOUZE', '1 lot hameau du moulin', '71570', 'La chapelle de guinchay', '0781332244', 'maouze@gmail.com', 'mze875'),
(2, 'DURANT', '1 lot hameau du coeur', '71571', 'La chapelle des montagnes', '0787859244', 'durant@gmail.com', 'tintin154_5'),
(3, 'TEDDY', 'la rue des fleurs', '71571', 'Mâcon', '0787859887', 'teddy@gmail.com', 'teddy54'),
(4, 'MAZIZ', '1 lot beaujolais', '71000', 'Mâcon', '0735887415', 'maziz@chouette.com', 'mazizou123'),
(5, 'ALI', '9 lot du hameau', '69000', 'Lyon', '0755986423', 'ali@chouette.com', 'ali39'),
(6, 'DUPONT', '5 rue des Fleurs', '69000', 'Lyon', '0655443322', 'dupont@example.com', 'mdp123'),
(7, 'MARTIN', '10 avenue des Pins', '75001', 'Paris', '0711223344', 'martin@example.com', 'secret789'),
(8, 'LEBLANC', '22 rue de la Paix', '13005', 'Marseille', '0688776655', 'leblanc@example.com', 'mdp456'),
(9, 'MOREAU', '15 rue des Roses', '54000', 'Nancy', '0644332211', 'moreau@example.com', 'mdp101112'),
(10, 'LEROY', '25 avenue des Chênes', '13008', 'Marseille', '0755667788', 'leroy@example.com', 'mdp78910'),
(11, 'DERBAL', '3 lot des carrés', '78000', 'Saint Laurent', '0845667129', 'derbal@gmail.com', 'dErBAl4854'),
(12, 'DUBOIS', '25 Rue de la Paix', '75002', 'Paris', '0123456789', 'dubois@gmail.com', 'R2D2_DB'),
(13, 'LEROY', '30 Avenue des Champs-Élysées', '75009', 'Paris', '0234567890', 'leroy@gmail.com', 'royibogo_@'),
(14, 'GARCIA', '20 Rue de la Liberté', '69002', 'Lyon', '0345678901', 'garcia@gmail.com', 'garciAf7_'),
(15, 'MOREAU', '10 Rue de la République', '13002', 'Marseille', '0456789012', 'moreau@gmail.com', 'moreaufg-es54'),
(16, 'TRAN', '1 rue des chocolat', '78000', 'Paris', '0789656624', 'tran@gmail.com', 'tranlebg541'),
(76, 'DUCHAMPS', '7 rue des champs', '78000', 'Paris', '0758664418', 'duchamps@gmail.com', 'duchampparis123');

-- --------------------------------------------------------

--
-- Structure de la table `mobilhome`
--

DROP TABLE IF EXISTS `mobilhome`;
CREATE TABLE IF NOT EXISTS `mobilhome` (
  `idmob` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `numemp` int NOT NULL,
  `idtyp` int NOT NULL,
  PRIMARY KEY (`idmob`),
  UNIQUE KEY `numemp` (`numemp`),
  KEY `idtyp` (`idtyp`)
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mobilhome`
--

INSERT INTO `mobilhome` (`idmob`, `nom`, `numemp`, `idtyp`) VALUES
(101, 'Van Gogh', 143, 11),
(102, 'Picasso', 163, 12),
(103, 'Monet', 144, 11),
(104, 'Cézanne', 159, 13),
(105, 'De Vinci', 149, 14),
(106, 'Manet', 162, 12),
(107, 'Degas', 145, 11),
(108, 'Dali', 158, 13),
(109, 'Rembrandt', 148, 14),
(110, 'Michel-Ange', 195, 19),
(111, 'Vermeer', 140, 19),
(112, 'Chagall', 114, 15),
(113, 'Courbet', 161, 12),
(114, 'Rubens', 146, 11),
(115, 'Boticelli', 110, 16),
(116, 'Raphaël', 113, 15),
(117, 'Kandinsky', 157, 13),
(118, 'Munch', 112, 15),
(119, 'Magritte', 139, 19),
(120, 'Goya', 138, 19),
(121, 'Miro', 109, 16),
(122, 'Pissaro', 156, 13),
(123, 'Seurat', 137, 18),
(124, 'Braque', 136, 18),
(125, 'Toulouse-Lautrec', 122, 17),
(126, 'Hopper', 155, 13),
(127, 'Warhol', 111, 15),
(128, 'Modigliani', 147, 11),
(129, 'Velasquez', 160, 12),
(130, 'Morisot', 196, 16),
(131, 'Ingres', 154, 13),
(132, 'Duchamp', 150, 14),
(133, 'Bacon', 151, 14),
(134, 'Brueghel', 121, 17),
(135, 'Bosch', 115, 19),
(136, 'Caillebotte', 135, 18),
(137, 'Cassat', 152, 14),
(138, 'Signac', 153, 13),
(139, 'David', 120, 17),
(140, 'Corrot', 116, 17),
(180, 'Zoe', 6, 14),
(181, 'Wood', 1, 14),
(182, 'Chèvre', 2, 14),
(183, 'Louis', 3, 14),
(184, 'Booly', 4, 14),
(185, 'Cherry', 5, 14),
(186, 'Lemon', 7, 14),
(187, 'Spite', 10, 17),
(188, 'Karuba', 11, 17),
(189, 'Kara', 20, 17),
(190, 'Or', 25, 17),
(191, 'Fleury', 27, 12),
(192, 'Zufy', 28, 12),
(193, 'Fleurs', 30, 12),
(194, 'Rosa', 31, 12),
(195, 'Lila', 34, 12),
(196, 'Tulipe', 32, 12),
(197, 'Eau', 33, 12),
(198, 'Château', 40, 19),
(199, 'Palace', 41, 19),
(200, 'Perrier', 42, 19),
(202, 'Sunset Villa', 50, 13),
(203, 'Paradise Retreat', 51, 13),
(204, 'Ocean Breeze Haven', 55, 13),
(209, 'Harbor Haven', 56, 11),
(210, 'Seaview Sanctuary', 57, 11),
(211, 'Marina Retreat', 58, 11),
(212, 'Lighthouse Lodge', 59, 11),
(213, 'Sailor Rest', 60, 11),
(214, 'Anchors Away', 61, 11),
(215, 'Seashell Cottage', 62, 11),
(216, 'Wavecrest Villa', 63, 11),
(217, 'Coral Cove', 64, 15),
(218, 'Palm Paradise', 65, 15),
(219, 'Tropical Retreat', 66, 15),
(220, 'Island Oasis', 67, 15),
(221, 'Bamboo Breeze', 68, 15),
(222, 'Jungle Haven', 69, 15),
(223, 'Tiki Retreat', 70, 15),
(224, 'Rainforest Refuge', 71, 15),
(225, 'Mountain Retreat', 72, 16),
(226, 'Alpine Chalet', 73, 16),
(227, 'Ski Lodge', 74, 16),
(228, 'Snowy Haven', 75, 16),
(229, 'Peak View Retreat', 76, 16),
(230, 'Mountain Majesty', 77, 16),
(231, 'Summit Sanctuary', 78, 16),
(232, 'Valley Vista', 79, 16),
(233, 'Forest Haven', 80, 17),
(234, 'Wilderness Retreat', 81, 17),
(235, 'Cabin Escape', 82, 17),
(236, 'Lakeside Lodge', 83, 17),
(237, 'Riverside Retreat', 84, 17),
(238, 'Mountain View Cabin', 85, 17),
(239, 'Tranquil Woods', 86, 17),
(240, 'Lakefront Cottage', 87, 17),
(241, 'Desert Oasis', 88, 18),
(242, 'Cactus Hideaway', 89, 18),
(243, 'Sands Retreat', 90, 18),
(244, 'Dune Haven', 91, 18),
(245, 'Oasis Vista', 92, 18),
(246, 'Sahara Serenity', 93, 18),
(247, 'Desert Dream', 94, 18),
(248, 'Mirage Manor', 95, 18);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `idphoto` int NOT NULL AUTO_INCREMENT,
  `nomfichier` varchar(30) NOT NULL,
  `idtyp` int DEFAULT NULL,
  PRIMARY KEY (`idphoto`),
  KEY `idtyp` (`idtyp`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`idphoto`, `nomfichier`, `idtyp`) VALUES
(1, '01001.png', 11),
(2, '01002.jpg', 11),
(3, '01003.jpg', 11),
(4, '01004.jpg', 11),
(5, '01005.jpg', 11),
(6, '02001.jpg', 12),
(7, '02002.jpg', 12),
(8, '02003.jpg', 12),
(9, '02004.jpg', 12),
(10, '02005.jpg', 12),
(11, '02006.jpg', 12),
(12, '03001.jpg', 13),
(13, '03002.jpg', 13),
(14, '03003.jpg', 13),
(15, '03004.jpg', 13),
(16, '04001.jpg', 14),
(17, '04002.jpg', 14),
(18, '04003.jpg', 14),
(19, '04004.jpg', 14),
(20, '04005.jpg', 14),
(21, '05001.jpg', 15),
(22, '05002.jpg', 15),
(23, '05003.jpg', 15),
(24, '05004.jpg', 15),
(25, '06001.jpg', 16),
(26, '06002.jpg', 16),
(27, '06003.jpg', 16),
(28, '06004.jpg', 16),
(29, '07001.jpg', 17),
(30, '07002.jpg', 17),
(31, '07003.jpg', 17),
(32, '07004.jpg', 17),
(33, '08001.png', 18),
(34, '08002.jpg', 18),
(35, '08003.jpg', 18),
(36, '08004.jpg', 18),
(37, '08005.jpg', 18),
(38, '09001.png', 19),
(39, '09002.jpg', 19),
(40, '09003.jpg', 19),
(41, '09004.jpg', 19);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idres` int NOT NULL AUTO_INCREMENT,
  `dateres` date NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  `regleon` tinyint(1) NOT NULL DEFAULT '0',
  `idmob` int NOT NULL,
  `idcli` int NOT NULL,
  PRIMARY KEY (`idres`),
  KEY `idmob` (`idmob`),
  KEY `idcli` (`idcli`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idres`, `dateres`, `datedebut`, `datefin`, `regleon`, `idmob`, `idcli`) VALUES
(1, '2024-01-27', '2024-07-03', '2024-07-10', 0, 104, 1),
(2, '2024-02-27', '2024-05-01', '2024-05-08', 1, 105, 2),
(3, '2024-03-24', '2024-04-02', '2024-05-09', 0, 106, 3),
(4, '2024-08-01', '2025-11-20', '2025-11-27', 0, 119, 8),
(5, '2024-04-02', '2024-07-03', '2024-05-10', 1, 106, 4),
(6, '2024-03-05', '2024-09-01', '2024-09-08', 1, 109, 5),
(7, '2024-04-01', '2024-10-10', '2024-10-17', 0, 111, 7),
(8, '2024-05-15', '2024-11-20', '2024-11-27', 1, 113, 9),
(9, '2024-07-10', '2025-01-15', '2025-01-22', 1, 117, 10),
(10, '2024-08-01', '2025-10-20', '2025-10-27', 0, 119, 6),
(11, '2024-04-22', '2024-10-10', '2024-10-17', 0, 180, 11),
(12, '2024-01-22', '2024-11-20', '2024-11-27', 1, 180, 5),
(13, '2024-02-12', '2024-05-01', '2024-10-08', 0, 122, 8),
(14, '2024-04-22', '2024-04-22', '2024-04-29', 1, 105, 1),
(15, '2024-04-22', '2024-07-05', '2024-07-12', 1, 130, 1),
(16, '2024-04-22', '2024-07-05', '2024-07-12', 1, 130, 1),
(17, '2024-04-22', '2024-08-06', '2024-08-13', 1, 116, 1),
(18, '2024-04-22', '2024-08-06', '2024-08-13', 1, 116, 1),
(19, '2024-04-22', '2024-08-06', '2024-08-13', 1, 116, 1),
(20, '2024-04-22', '2024-08-06', '2024-08-13', 1, 116, 1),
(21, '2024-04-22', '2024-08-06', '2024-08-13', 1, 116, 1),
(22, '2024-05-01', '2024-05-08', '2024-05-15', 1, 122, 1),
(23, '2024-05-03', '2024-05-15', '2024-05-22', 1, 108, 2),
(24, '2024-05-03', '2024-05-16', '2024-05-23', 0, 115, 2),
(25, '2024-05-03', '2024-05-23', '2024-05-30', 0, 136, 2),
(26, '2024-05-04', '2024-05-10', '2024-05-17', 0, 102, 76),
(27, '2024-05-04', '2024-05-21', '2024-05-28', 1, 118, 76);

-- --------------------------------------------------------

--
-- Structure de la table `typemobil`
--

DROP TABLE IF EXISTS `typemobil`;
CREATE TABLE IF NOT EXISTS `typemobil` (
  `idtyp` int NOT NULL AUTO_INCREMENT,
  `libtyp` varchar(60) NOT NULL,
  `nbpers` int DEFAULT NULL,
  `descripcourte` text,
  `descriplongue` text,
  `tarifsemaine` int DEFAULT NULL,
  PRIMARY KEY (`idtyp`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typemobil`
--

INSERT INTO `typemobil` (`idtyp`, `libtyp`, `nbpers`, `descripcourte`, `descriplongue`, `tarifsemaine`) VALUES
(11, 'SweetFlower sur Pilotis 5 personnes', 5, '43m2 dont terrasse semi-couverte 11m2 - 2 chambres  - Longueur 10 m / largeur 5,25 m', 'Pour les amoureux de la nature avec tout le confort : 2 chambres séparées avec chauffage, coin repas avec cuisine, grande terrasse sur pilotis. Le + : le coin douche, vasque et wc séparé et chauffage dans chaque pièce. Découvrez notre cabane eco pour le plaisir de toute la famille. N\'hésitez plus réservez.... 1 chambre avec un lit de 140x190, 1 chambre avec 2 lits de 80x190 et un lit superposé, chauffage dans chaque pièce, 5 couettes, 5 oreillers. Kitchenette équipée : frigo-congèle, 1 évier, plaque 4 feux, cafetière électrique, micro-onde, douche, vasque, WC, 1 salon de jardin (1 table + 6 chaises). , un kit vaisselle standard. TV inclus dans le tarif', 469),
(12, 'Eco-Lodge Sahari 5 personnes', 5, '2 chambres - Environ 34 m² dont Terrasse couverte. Longueur 7 m / largeur 4,25 m. Une autre façon de camper.', 'Pour les amoureux de la nature avec tout le confort : 2 chambres separees , coin repas avec cuisine, grande terrasse sur pilotis. Le + : le coin douche, vasque et wc. Découvrez notre tente eco pour le plaisir de toute la famille. N\'hésitez plus réservez.... 1 chambre avec un lit de 140x190, 1 chambre avec 2 lits de 80x190 et un lit superposé, 5 couvertures, 5 oreillers. Kitchenette équipée : petit frigo, 1 évier, plaque 2 feux, cafetière électrique, micro-onde, douche, vasque et WC, 1 salon de jardin (1 table + 6 chaises). , un kit vaisselle standard.', 399),
(13, 'Mobil-Home 2-3 personnes', 3, 'Environ 19 m² + Terrasse bois 7,50 m² Longueur 5,30 m / largeur 4 m', 'Un salon avec banquette en L équipé d’un lit tiroir (140 x 190). Une cuisine équipée, frigo, plaque 2 feux, cafetière électrique, micro-onde. Une grande chambre  lit 2 personnes 140 x 190. Salle de bain et douche, WC, 1 salon de jardin (1 table + 4 chaises),  3 oreillers, 2 couettes, kit vaisselle standard.', 343),
(14, 'Mobil-Home Confort 4 personnes', 4, 'Environ 29  m²  avec Terrasse semi-couverte. Longueur 7,62 m / largeur 4 m ', '1 grande chambre avec un lit de 140x190, 1 chambre avec 2 lits de 80x190, un grand séjour, coin repas et cuisine toute équipée : frigo-congélateur, plaque 4 feux, cafetière électrique, micro-onde, salle de bain et douche, WC, 1 salon de jardin (1 table + 4 chaises). 4 couvertures, 4 oreillers, un kit vaisselle standard + TV', 439),
(15, 'Mobil-Home Grand Confort 4-6 personnes', 6, 'Environ 29 m² avec Terrasse bois couverte de 11 m² Longueur 8,10 m / largeur 4 m', '1 grande chambre avec un lit de 140x190, 1 chambre avec 2 lits de 80x190, un grand séjour comprenant dans le salon 1 couchage (140x190), coin repas et cuisine tout équipée : frigo-congélateur, plaque 4 feux, cafetière électrique, micro-onde, TV, salle de bain et douche, WC, 1 salon de jardin (1 table + 6 chaises). 6 couvertures, 6 oreillers, un kit vaisselle standard.', 420),
(16, 'Mobil-Home Grand Confort 6 personnes', 6, 'Environ 31 m² + terrasse bois semi-couverte 11 m² Longueur 8,62 m / largeur 4 m', '1 grande chambre avec un lit de 140x190, 2 chambres avec 2 lits de 80x190, un grand séjour, coin repas et cuisine toute équipée : frigo-congélateur, plaque 4 feux, cafetières électriques, micro-onde, TV, salle de bain et douche, WC, 1 salon de jardin (1 table + 6 chaises). 6 couvertures, 6 oreillers, un kit vaisselle standard.', 525),
(17, 'Mobil-Home Luxe 6 personnes', 6, 'Environ 37 m² + terrasse bois semi-couverte 15 m² Longueur 8,62 m / largeur 4 m', '1 grande chambre avec un lit de 140x190, 2 chambre avec 2 lits de 80x190, un grand séjour, coin repas et cuisine toute équipée : frigo-congélateur, plaque 4 feux, four ou lave-vaisselle, cafetière électrique, micro-onde, salle de bain et douche, WC. 1 salon de jardin (1 table + 6 chaises) 2 Chiliennes. 5 couettes, 6 oreillers, un kit vaisselle standard. Volets roulants. TV inclus.', 553),
(18, 'Chalet 4-6 personnes', 6, 'Environ 34 m²  avec terrasse couverte + terrasse ext. Longueur 6,67 m / largeur 6,67 m', '1 grande chambre avec un lit de 140x190, 1 chambre avec 2 lits de 80x190, un grand séjour comprenant 1 couchage (140x190), coin repas et cuisine toute équipée : frigo-congélateur, plaque 4 feux, lave-vaisselle, cafetière électrique, micro-onde. Salle de bain et douche, WC. 1 salon de jardin (1 table + 6 chaises) 2 chiliennes. 6 couettes, 6 oreillers, un kit vaisselle standard. Volets roulants.', 420),
(19, 'Chalet 6 personnes', 7, 'Environ 34 m²  avec terrasse couverte + terrasse ext. Longueur 7,2 m / largeur 6,67 m', '1 grande chambre avec un lit de 140x190, 2 chambres avec 2 lits de 80x190, un grand séjour, coin repas et cuisine toute équipée : frigo-congélateur, plaque 4 feux, lave-vaisselle, cafetière électrique, micro-onde. Salle de bain et douche, WC. 1 salon de jardin (1 table + 6 chaises) 2 chiliennes. 5 couettes, 6 oreillers, un kit vaisselle standard. Volets roulants.', 462);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mobilhome`
--
ALTER TABLE `mobilhome`
  ADD CONSTRAINT `mobilhome_ibfk_1` FOREIGN KEY (`idtyp`) REFERENCES `typemobil` (`idtyp`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`idtyp`) REFERENCES `typemobil` (`idtyp`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idmob`) REFERENCES `mobilhome` (`idmob`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`idcli`) REFERENCES `client` (`idcli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
