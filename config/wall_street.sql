-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 30 oct. 2018 à 13:25
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
(2, 'admin', '$2y$10$y.x0AzafXw82Qw3LEXLMbOdpQMRyRlXP7j//P7rk17El8rtMBAVBi');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`id`, `nom`, `photo`, `description`) VALUES
(1, 'Banksy', 'banksy.jpg', 'Quapropter a natura mihi videtur potius quam ab indigentia orta amicitia, applicatione magis animi cum quodam sensu amandi quam cogitatione quantum illa res utilitatis esset habitura. Quod quidem quale sit, etiam in bestiis quibusdam animadverti potest, quae ex se natos ita amant ad quoddam tempus et ab eis ita amantur ut facile earum sensus appareat. Quod in homine multo est evidentius, primum ex ea caritate quae est inter natos et parentes, quae dirimi nisi detestabili scelere non potest; deinde cum similis sensus exstitit amoris, si aliquem nacti sumus cuius cum moribus et natura congruamus, quod in eo quasi lumen aliquod probitatis et virtutis perspicere videamur.'),
(2, 'Jef Aérosol', 'jefaerosol.jpg', 'Quapropter a natura mihi videtur potius quam ab indigentia orta amicitia, applicatione magis animi cum quodam sensu amandi quam cogitatione quantum illa res utilitatis esset habitura. Quod quidem quale sit, etiam in bestiis quibusdam animadverti potest, quae ex se natos ita amant ad quoddam tempus et ab eis ita amantur ut facile earum sensus appareat. Quod in homine multo est evidentius, primum ex ea caritate quae est inter natos et parentes, quae dirimi nisi detestabili scelere non potest; deinde cum similis sensus exstitit amoris, si aliquem nacti sumus cuius cum moribus et natura congruamus, quod in eo quasi lumen aliquod probitatis et virtutis perspicere videamur.'),
(3, 'C 215', 'c215.jpg', 'Quapropter a natura mihi videtur potius quam ab indigentia orta amicitia, applicatione magis animi cum quodam sensu amandi quam cogitatione quantum illa res utilitatis esset habitura. Quod quidem quale sit, etiam in bestiis quibusdam animadverti potest, quae ex se natos ita amant ad quoddam tempus et ab eis ita amantur ut facile earum sensus appareat. Quod in homine multo est evidentius, primum ex ea caritate quae est inter natos et parentes, quae dirimi nisi detestabili scelere non potest; deinde cum similis sensus exstitit amoris, si aliquem nacti sumus cuius cum moribus et natura congruamus, quod in eo quasi lumen aliquod probitatis et virtutis perspicere videamur.'),
(4, 'MiSS.Tic', 'misstic.jpg', 'Quapropter a natura mihi videtur potius quam ab indigentia orta amicitia, applicatione magis animi cum quodam sensu amandi quam cogitatione quantum illa res utilitatis esset habitura. Quod quidem quale sit, etiam in bestiis quibusdam animadverti potest, quae ex se natos ita amant ad quoddam tempus et ab eis ita amantur ut facile earum sensus appareat. Quod in homine multo est evidentius, primum ex ea caritate quae est inter natos et parentes, quae dirimi nisi detestabili scelere non potest; deinde cum similis sensus exstitit amoris, si aliquem nacti sumus cuius cum moribus et natura congruamus, quod in eo quasi lumen aliquod probitatis et virtutis perspicere videamur.'),
(5, 'Blek Le Rat', 'bleklerat.jpg', 'Quapropter a natura mihi videtur potius quam ab indigentia orta amicitia, applicatione magis animi cum quodam sensu amandi quam cogitatione quantum illa res utilitatis esset habitura. Quod quidem quale sit, etiam in bestiis quibusdam animadverti potest, quae ex se natos ita amant ad quoddam tempus et ab eis ita amantur ut facile earum sensus appareat. Quod in homine multo est evidentius, primum ex ea caritate quae est inter natos et parentes, quae dirimi nisi detestabili scelere non potest; deinde cum similis sensus exstitit amoris, si aliquem nacti sumus cuius cum moribus et natura congruamus, quod in eo quasi lumen aliquod probitatis et virtutis perspicere videamur.');

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
  `date` year(4) NOT NULL,
  `artiste_id` tinyint(2) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign_key` (`artiste_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `oeuvre`
--

INSERT INTO `oeuvre` (`id`, `titre`, `photo`, `localisation`, `date`, `artiste_id`) VALUES
(1, 'Dreams', 'bdreams.jpg', 'Boston / Massachusetts / U.S.A', 2010, 1),
(2, 'Minnie', 'bminnie.jpg', 'Paris / France', 2018, 1),
(3, 'Mother Caring', 'bmothercaring.jpg', 'New York / U.S.A', 2007, 1),
(4, 'Out of bed', 'boutofbed.jpg', 'Melrose et Orange Avenue / Los Angeles / U.S.A', 2008, 1),
(5, 'Steve Jobs', 'bstevejobs.jpg', 'Calais / Hauts-de-France / France', 2015, 1),
(6, 'The girl', 'bthegirl.png', 'Bataclan / Paris / France', 2018, 1),
(7, 'Basquiat', 'jbasquiat.jpg', 'Brooklyn / New York / U.S.A', 2010, 2),
(8, 'Chuuut', 'jchuuut.jpg', 'Quartier Beauboug / Paris / France', 2011, 2),
(9, 'John Lennon', 'jjohnlennon.jpg', 'Quartier Mouffetard / Paris / France', 2010, 2),
(10, 'Nelson Mandela', 'jnelsonmandela.jpg', 'Caen / Normandie / France', 2011, 2),
(11, 'Octobre rose', 'joctobrerose.jpg', 'C.H.U / Bordeaux / France', 2013, 2),
(12, 'Sitting Kid', 'jsittingkid.jpg', 'Quartier des Buttes Chaumont / Paris', 2013, 2),
(13, 'Angel', 'blangel.jpg', 'Dubai / Emirats Arabes Unis', 2015, 5),
(14, 'Blek that\'s better', 'blblekthatsbetter.png', 'Londres / Angleterre', 2012, 5),
(15, 'Homeless', 'blhomeless.jpg', 'Canal St Martin / Paris / France', 2013, 5),
(16, 'Joseph Beuys', 'bljosephbeuys.png', 'Paris / France', 1991, 5),
(17, 'Runnig Man in Berlin', 'blrunningmaninberlin.jpg', 'Berlin / Allemagne', 2010, 5),
(18, 'Thug of war', 'blthugofwar.jpg', 'Oregon / U.S.A', 2018, 5),
(19, 'Bird girl', 'cbirdgirl.jpg', 'Paris 13e / France', 2008, 3),
(20, 'Dali', 'cdali.jpg', 'Madrid / Espagne', 2015, 3),
(21, 'Le chat', 'clechat.jpg', 'Djerba / Tunisie', 2012, 3),
(22, 'Lincoln', 'clincoln.jpg', 'Vincennes / France', 2016, 3),
(23, 'Moon girl', 'cmoongirl.jpg', 'Londres / Angleterre', 2014, 3),
(24, 'Vieil homme', 'cvieilhomme.png', 'Vitry / France', 2017, 3),
(25, 'Abus', 'mabus.jpg', 'Paris / France', 2016, 4),
(26, 'Art Rock', 'martrock.jpg', 'Butte aux cailles / Paris 13e / France', 2013, 4),
(27, 'Ca va passer', 'mcavapasser.jpg', 'Paris / France', 1990, 4),
(28, 'Illusion', 'millusion.jpg', 'Paris 13e / France', 2010, 4),
(29, 'Le Vain', 'mlevain.jpg', 'Paris / France', 1995, 4),
(30, 'Simple', 'msimple.jpg', 'Paris / France', 1985, 4);

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
