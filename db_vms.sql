-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 31 juil. 2021 à 11:07
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
-- Base de données : `db_vms`
--

-- --------------------------------------------------------

--
-- Structure de la table `info_visitor`
--

DROP TABLE IF EXISTS `info_visitor`;
CREATE TABLE IF NOT EXISTS `info_visitor` (
  `Serial` int(11) NOT NULL AUTO_INCREMENT,
  `Name` char(50) NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `Purpose` varchar(100) NOT NULL,
  `meetingTo` varchar(100) NOT NULL,
  `day` varchar(50) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `Date` date NOT NULL,
  `TimeIN` time NOT NULL,
  `ReceiptID` int(6) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Comment` varchar(100) NOT NULL,
  `TimeOUT` time DEFAULT NULL,
  `registeredBy` varchar(30) NOT NULL,
  `loggedOutBy` varchar(30) NOT NULL DEFAULT 'Receptionniste',
  PRIMARY KEY (`Serial`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `info_visitor`
--

INSERT INTO `info_visitor` (`Serial`, `Name`, `Contact`, `Purpose`, `meetingTo`, `day`, `month`, `year`, `Date`, `TimeIN`, `ReceiptID`, `Status`, `Comment`, `TimeOUT`, `registeredBy`, `loggedOutBy`) VALUES
(1, 'Tchinda', 9841120696, 'Fun', 'Hellp', '16', 1, 2019, '2019-01-16', '18:28:06', 145513, 'OFFLINE', 'asd', '16:07:39', 'sumit', 'admin'),
(2, 'wilfiried', 9841120696, 'Hello', 'BAba', '16', 1, 2019, '2019-01-16', '18:29:38', 514571, 'ONLINE', 'hello', '18:32:01', 'sumit', 'sumit'),
(3, 'Ursula chelsea', 9861549710, 'Etikai', 'Sumit', '16', 1, 2019, '2019-01-16', '21:39:59', 658639, 'ONLINE', 'hello', '21:41:46', 'sumit', 'sumit'),
(4, 'Krishna smith', 9865321458, 'meet', 'job', '04', 7, 2020, '2020-07-04', '15:18:04', 617285, 'ONLINE', 'new employee', '00:00:00', 'sumit', ''),
(5, 'kisan', 9865324512, 'new job ', 'for meeting', '05', 7, 2020, '2020-07-05', '12:35:18', 820264, 'ONLINE', 'new customer', '00:00:00', 'Projectworlds', ''),
(12, 'tchinda', 2376566666, 'visite de courtoisie', 'directeur technique', '22', 7, 2021, '2021-07-22', '11:24:29', 781189, 'ONLINE', 'rendez vous de coutoisie', NULL, 'admin', 'Receptionniste');

-- --------------------------------------------------------

--
-- Structure de la table `login_info`
--

DROP TABLE IF EXISTS `login_info`;
CREATE TABLE IF NOT EXISTS `login_info` (
  `SnoPrimary` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `pass` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`SnoPrimary`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `login_info`
--

INSERT INTO `login_info` (`SnoPrimary`, `userName`, `pass`) VALUES
(1, 'Projectworlds', 'Projectworlds'),
(2, 'shreya', 'shreya');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
