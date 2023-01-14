-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 14 jan. 2023 à 15:51
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `grading_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `student_info`
--

DROP TABLE IF EXISTS `student_info`;
CREATE TABLE IF NOT EXISTS `student_info` (
  `STUDENT_ID` int(50) NOT NULL AUTO_INCREMENT,
  `LRN_NO` varchar(15) NOT NULL,
  `LASTNAME` varchar(30) NOT NULL,
  `FIRSTNAME` varchar(30) NOT NULL,
  `MIDDLENAME` varchar(30) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `DATE_OF_BIRTH` date NOT NULL,
  `ADDRESS` varchar(20) NOT NULL,
  `BIRTH_PLACE` varchar(50) NOT NULL,
  `PARENT_GUARDIAN` varchar(50) NOT NULL,
  `P_ADDRESS` varchar(60) NOT NULL,
  `INT_COURSE_COMP` varchar(50) NOT NULL,
  `SCHOOL_YEAR` varchar(10) NOT NULL,
  `GEN_AVE` varchar(6) NOT NULL,
  `TOTAL_NO_OF_YEARS` varchar(5) NOT NULL,
  `PROGRAM` varchar(10) NOT NULL,
  `passwordt` varchar(25) NOT NULL,
  `USER_TYPE` varchar(22) NOT NULL DEFAULT 'ETUDIANT',
  PRIMARY KEY (`STUDENT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `student_info`
--

INSERT INTO `student_info` (`STUDENT_ID`, `LRN_NO`, `LASTNAME`, `FIRSTNAME`, `MIDDLENAME`, `GENDER`, `DATE_OF_BIRTH`, `ADDRESS`, `BIRTH_PLACE`, `PARENT_GUARDIAN`, `P_ADDRESS`, `INT_COURSE_COMP`, `SCHOOL_YEAR`, `GEN_AVE`, `TOTAL_NO_OF_YEARS`, `PROGRAM`, `passwordt`, `USER_TYPE`) VALUES
(1, '12345648', 'Smith', 'John', '', 'MALE', '1999-06-23', 'Sample', 'My Town', 'My guardian', 'Sample', '', '2015-2016', '1', '', '1', '', ''),
(2, '1234', 'Esdras', 'DZANGA', '', 'MALE', '2023-01-13', 'Camp chic', 'Congo', 'joh', 'sangmelima', '', '2016-2017', '-1', '', '2', '', ''),
(3, 'UIECC2022', 'MOUYARI', 'Breme', '', 'MALE', '2023-01-13', 'chic', 'Sangmelima', 'Vivian', 'Capable', '', '2016-2017', '2', '', '', '', ''),
(4, 'UIECC202', 'Verly', 'Esdras', '', 'MALE', '2023-01-13', 'camp chic', 'Congo', 'Jos', 'Ndfdfd', '', '2016-2017', '2', '', '', '', ''),
(5, 'fgfggf', 'Jud', 'Temple', '', 'MALE', '2023-01-14', 'camp chic', 'Congo', 'john', 'chic', '', '2016-2017', '1', '', '', '', ''),
(6, 'UIECC20223', 'Jos', 'Maick', '', 'MALE', '2023-01-14', 'camp chic', 'Congo', 'john', 'chic', '', '2016-2017', '2', '', '', '123', ''),
(7, 'UIECC2022g', 'Wen', 'May', '', 'MALE', '2023-01-14', 'camp chic', 'Congo', 'john', 'camp chic', '', '2016-2017', '2', '', '', '123', 'ETUDIANT');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
