-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 17 nov. 2018 à 11:33
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wall_street`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(2, 'admin', '940c0f26fd5a30775bb1cbd1f6840398d39bb813');

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

DROP TABLE IF EXISTS `artiste`;
CREATE TABLE IF NOT EXISTS `artiste` (
  `id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`id`, `nom`, `photo`, `description`) VALUES
(1, 'Banksy', 'banksy.jpg', 'Banksy serait né à Bristol en Grande-Bretagne en 1974. Difficile de sortir du conditionnel car l’artiste a passé sa vie à échapper aux médias afin de garder l’anonymat.\r\nIndigné, irrévérencieux, révolutionnaire, il adore provoquer, choquer voire perturber la société et c\'est ce qui fait toute l\'importance de son oeuvre.Enfant chéri du monde artistique de par le monde et cauchemar des autorités policières, son art est un mélange d\'ironie, d\'humour et comporte très souvent des messages très clairs, dans l\'optique où ils ne sont pas interprétés au premier degré. \r\nPochoirs, peintures, sculptures, détournements d’objets urbains ou d’œuvres classiques,transposition d\'images,une partie peinte à l\'aérosol installations… Banksy est un artiste polyvalent.  \r\n'),
(2, 'Jef Aérosol', 'jefaerosol.jpg', 'Tantôt pochoiriste,peintre ou musicien, Jef Aérosol est un artiste aux multiples talents.\r\nEnfant du rock, il est biberonné aux Clash, Hendrix, Dylan et autres Rolling Stones dont il collectionne les posters. Ces affiches épinglées sur les murs de sa chambre sont ses premières sources d’inspiration. Son travail est  identifiable par la flèche rouge qu’il appose systématiquement comme signature. Fan des plasticiens Ernest Pignon-Ernestou du photographe Georges Rousse, Jef Aérosol s’essaie très tôt à la technique du photo-graphisme.  L’art de transformer les images à partir de photomatons, de photocopies, de découpages et de collages qui jouent avec l’ombre et la lumière. Ces fabrications maisons deviendront ses premiers pochoirs.\r\n'),
(3, 'C 215', 'c215.jpg', 'C215 alias Christian Guémy est un artiste urbain, pochoiriste français né en 1973.Il s’est d’abord initié au graffiti, qu’il a délaissé rapidement pour se consacrer au pochoir.Passionné par la Renaissance, il se forge une culture humaniste.C215 puise ses influences au travers des siècles d’art.Armé de sa bombe et de son spray, C215 redonne aux murs gris et sales un nouveau souffle esthétique, dans des zones industrielles où le béton ne laisse jusqu’alors pas de place à l’émotion. Il les habille de portraits colorés, réalisés au pochoir ou à main levée. Les œuvres de C215 sont principalement à tailles humaines pour être au plus proches du réel et des passants, il va s’en dégager des couleurs étincelantes et un éclairage particulièrement travaillé. On va percevoir le caractère de ses modèles à travers les traits et les expressions qui sont dépeints. Il peint des scènes de rue ainsi que des portraits de sans abris, mendiants, réfugiés, d’orphelins, toutes ces personnes laissées pour compte par la société capitaliste. \r\n'),
(4, 'MiSS.Tic', 'misstic.jpg', 'Grande figure du Street Art, Miss.Tic a fait des rues de la capitale sa plus belle galerie, elle est depuis trente ans la reine du street art à la française.Miss.Tic bombe au pochoir, sur les murs, des billets d\'humeur illustrés de portraits de femmes, légendés de phrases pertinentes et impertinentes. Son image fétiche est une belle brune sexy, très proche de son propre personnage, exposée dans des postures lascives mais jamais vulgaires. Elle s\'accompagne souvent d\'une phrase mi-philosophique mi-humoristique mais toujours poétique. Dans son atelier parisien, elle réalise ses pochoirs à l\'aide de matrices fabriquées à partir de photos agrandies et découpées au cutter et inspirées de photos tirées dans les magazines féminins Elle développe l\'image de la femme pour la promouvoir sans questionnement. C\'est de l\'art accessible à tous, personne n\'y résiste.\r\n'),
(5, 'Blek Le Rat', 'bleklerat.jpg', 'Blek le rat est le pseudonyme de Xavier Prou,un des tout premiers artistes graffiti à Paris et le fondateur du mouvement du pochoir. Ses premiers pochoirs représentent des petits rats noirs qu’il fait courir le long des murs. Le rat, l’anagramme du mot ART, est pour Blek « le seul animal qui survivra l’apocalypse » un pseudo à la gloire d’un animal qui le fascine et qu’il commence à peindre dans tout Paris dans les années 80, histoire de rappeler aux parisiens que les rats sont partout dans leur ville.Des rongeurs, il évolue vers les silhouettes de personnages, puis lassé des interventions policières, il décide de ne peindre que sur des murs légaux. Ses œuvres représentent souvent des figures d’anonymes ou de célébrités en taille réelle Ses peintures représentent généralement des figures anonymes ou célèbres, de taille réelle. Il puise souvent son inspiration dans des personnages du quotidien, issus de la réalité urbaine, dont il reproduit ensuite l\'image dans le décor où il évolue.\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `oeuvre`
--

DROP TABLE IF EXISTS `oeuvre`;
CREATE TABLE IF NOT EXISTS `oeuvre` (
  `id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `localisation` varchar(250) NOT NULL,
  `artiste_id` tinyint(2) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign_key` (`artiste_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `oeuvre`
--

INSERT INTO `oeuvre` (`id`, `titre`, `photo`, `localisation`, `artiste_id`) VALUES
(1, 'Dreams', 'bdreams.jpg', 'Boston / Massachusetts / U.S.A', 1),
(2, 'Minnie', 'bminnie.jpg', 'Paris / France', 1),
(3, 'Mother Caring', 'bmothercaring.jpg', 'New York / U.S.A', 1),
(4, 'Out of bed', 'boutofbed.jpg', 'Melrose et Orange Avenue / Los Angeles / U.S.A', 1),
(5, 'Steve Jobs', 'bstevejobs.jpg', 'Calais / Hauts-de-France / France', 1),
(6, 'The girl', 'bthegirl.png', 'Bataclan / Paris / France', 1),
(7, 'Basquiat', 'jbasquiat.jpg', 'Brooklyn / New York / U.S.A', 2),
(8, 'Chuuut', 'jchuuut.jpg', 'Quartier Beauboug / Paris / France', 2),
(9, 'John Lennon', 'jjohnlennon.jpg', 'Quartier Mouffetard / Paris / France', 2),
(10, 'Nelson Mandela', 'jnelsonmandela.jpg', 'Caen / Normandie / France', 2),
(11, 'Octobre rose', 'joctobrerose.jpg', 'C.H.U / Bordeaux / France', 2),
(12, 'Sitting Kid', 'jsittingkid.jpg', 'Quartier des Buttes Chaumont / Paris', 2),
(13, 'Angel', 'blangel.jpg', 'Dubai / Emirats Arabes Unis', 5),
(14, 'Blek that\'s better', 'blblekthatsbetter.png', 'Londres / Angleterre', 5),
(15, 'Homeless', 'blhomeless.jpg', 'Canal St Martin / Paris / France', 5),
(16, 'Joseph Beuys', 'bljosephbeuys.png', 'Paris / France', 5),
(17, 'Runnig Man in Berlin', 'blrunningmaninberlin.jpg', 'Berlin / Allemagne', 5),
(18, 'Thug of war', 'blthugofwar.jpg', 'Oregon / U.S.A', 5),
(19, 'Bird girl', 'cbirdgirl.jpg', 'Paris 13e / France', 3),
(20, 'Dali', 'cdali.jpg', 'Madrid / Espagne', 3),
(21, 'Le chat', 'clechat.jpg', 'Djerba / Tunisie', 3),
(22, 'Catwoman', 'ccatwoman.jpg', 'Vincennes / France', 3),
(23, 'Moon girl', 'cmoongirl.jpg', 'Londres / Angleterre', 3),
(24, 'Vieil homme', 'cvieilhomme.png', 'Vitry / France', 3),
(25, 'Abus', 'mabus.jpg', 'Paris / France', 4),
(26, 'Art Rock', 'martrock.jpg', 'Butte aux cailles / Paris 13e / France', 4),
(27, 'Ca va passer', 'mcavapasser.jpg', 'Paris / France', 4),
(28, 'Illusion', 'millusion.jpg', 'Paris 13e / France', 4),
(29, 'Le Vain', 'mlevain.jpg', 'Paris / France', 4),
(30, 'Simple', 'msimple.jpg', 'Paris / France', 4),
(31, 'ggg', 'Banksy.on.the.thekla.arp.jpg', 'lll', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `oeuvre`
--
ALTER TABLE `oeuvre`
  ADD CONSTRAINT `artiste_id_artiste_id` FOREIGN KEY (`artiste_id`) REFERENCES `artiste` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
