-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2017 at 01:03 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_piscine`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateurs`
--

CREATE TABLE IF NOT EXISTS `administrateurs` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrateurs`
--

INSERT INTO `administrateurs` (`id`, `code`, `mdp`) VALUES
(1, 123, 'lol'),
(2, 456, 'lollol');

-- --------------------------------------------------------

--
-- Table structure for table `demandes_amis`
--

CREATE TABLE IF NOT EXISTS `demandes_amis` (
  `id` int(11) NOT NULL,
  `demandeur` varchar(255) NOT NULL,
  `cible` varchar(255) NOT NULL,
  `accepter` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demandes_amis`
--

INSERT INTO `demandes_amis` (`id`, `demandeur`, `cible`, `accepter`) VALUES
(29, 'lenouzz', 'pseudoo', 'O'),
(30, 'pseudoo', 'lenouzz', 'O'),
(31, 'hugogol', 'lenouzz', 'N'),
(32, 'pseudoo', 'hugogol', 'O'),
(33, 'hugogol', 'pseudoo', 'O'),
(36, 'kourga', 'lenouzz', 'N'),
(37, 'lenouzz', 'kourga', 'O'),
(38, 'kourga', 'lenouzz', 'O');

-- --------------------------------------------------------

--
-- Table structure for table `messenger`
--

CREATE TABLE IF NOT EXISTS `messenger` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `editeur` varchar(255) NOT NULL,
  `receveur` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messenger`
--

INSERT INTO `messenger` (`id`, `message`, `editeur`, `receveur`) VALUES
(1, 'Coucou adri !', 'lenouzz', 'kourga'),
(2, 'Coucou tu vas bien ?', 'kourga', 'lenouzz'),
(3, 'Oui et toi ?', 'lenouzz', 'kourga'),
(5, 'Tu fais quoi ?', 'kourga', 'lenouzz'),
(6, 'je fais mes devoirs', 'lenouzz', 'kourga'),
(7, 'Kuku !', 'kourga', 'lenouzz'),
(8, 'Kiki !', 'kourga', 'lenouzz'),
(9, 'Coucou pseudoo!', 'lenouzz', 'pseudoo'),
(10, 'Coucou lenouzz ca va ?', 'pseudoo', 'lenouzz');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL,
  `chemin` varchar(255) NOT NULL,
  `utilisateur` varchar(255) NOT NULL,
  `album` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `chemin`, `utilisateur`, `album`) VALUES
(1, 'images/.jpg', 'azerty', 1),
(2, 'NULL', 'azerty', 1),
(3, 'images/3.jpg', 'pseudoo', 1),
(4, 'images/4.jpg', 'pseudoo', 1),
(5, 'NULL', '', 0),
(6, 'NULL', '', 0),
(7, 'images/7.png', '', 0),
(8, 'images/8.png', '', 0),
(9, 'images/9.png', '', 0),
(12, 'images/12.jpg', '', 0),
(13, 'images/13.jpg', '', 0),
(14, 'images/14.jpg', 'hugogol', 1),
(15, 'images/15.jpg', 'hugogol', 1),
(16, 'NULL', '', 0),
(17, 'NULL', '', 0),
(18, 'NULL', '', 0),
(19, 'NULL', '', 0),
(20, 'NULL', '', 0),
(21, 'images/21.png', '', 0),
(22, 'NULL', '', 0),
(23, 'NULL', '', 0),
(24, 'NULL', '', 0),
(25, 'NULL', '', 0),
(26, 'images/26.png', '', 0),
(27, 'images/27.png', '', 0),
(28, 'images/28.png', '', 0),
(29, 'images/29.png', '', 0),
(30, 'images/30.jpg', 'kourga', 1),
(31, 'images/31.jpg', 'kourga', 1),
(32, 'images/32.png', 'lenouzz', 0),
(33, 'images/33.jpg', 'lenouzz', 0),
(34, 'images/34.jpg', 'lenouzz', 0),
(35, 'images/35.jpg', 'lenouzz', 0),
(36, 'images/36.jpg', 'lenouzz', 0),
(37, 'images/37.jpg', 'kourga', 3),
(38, 'images/38.jpg', 'kourga', 2);

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE IF NOT EXISTS `publications` (
  `id` int(11) NOT NULL,
  `nom_pub` varchar(255) NOT NULL,
  `date_pub` datetime NOT NULL,
  `statut` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `sentiment` varchar(255) NOT NULL,
  `acti` varchar(255) NOT NULL,
  `secu` varchar(255) NOT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `jaime` int(11) NOT NULL,
  `dislike` int(11) NOT NULL,
  `love` int(11) NOT NULL,
  `rire` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `nom_pub`, `date_pub`, `statut`, `lieu`, `sentiment`, `acti`, `secu`, `owner`, `photo`, `commentaire`, `jaime`, `dislike`, `love`, `rire`) VALUES
(31, 'Test', '2017-10-10 13:56:54', 'Je teste', 'Paris', 'Bien :)', 'Je bronze', 'public', 'hugogol', 'images/21.png', '', 0, 0, 0, 0),
(40, 'Panpan', '2017-04-20 11:40:09', 'dOUDOU', 'Paris', 'Ca va', 'Je taffe', 'public', 'lenouzz', 'images/35.jpg', '', 0, 0, 0, 0),
(41, 'Soleil', '2017-04-20 11:44:20', 'Je suis au soleil', 'Paris', 'Ca va', 'Je bronze', 'public', 'lenouzz', 'images/36.jpg', '', 0, 0, 0, 0),
(42, 'Soleil', '2017-04-20 12:35:00', 'Je suis au soleil', 'Paris', 'C', '', 'public', 'kourga', 'images/37.jpg', 'Moche soleil', 2, 1, 1, 0),
(43, '', '0000-00-00 00:00:00', '', '', '', '', '', NULL, '', 'Tres beau soleil !', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `majeure` varchar(255) NOT NULL,
  `date_naiss` date NOT NULL,
  `ville` varchar(255) NOT NULL,
  `num` varchar(255) NOT NULL,
  `photoProfil` varchar(255) NOT NULL,
  `photoCouverture` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `pseudo`, `nom`, `mdp`, `age`, `majeure`, `date_naiss`, `ville`, `num`, `photoProfil`, `photoCouverture`) VALUES
(41, 'gugu@hotmail.fr', 'pseudoo', 'Cheh', '123', 22, 'Energie et environnement', '2015-03-10', 'Chatou', '00987654', 'images/3.jpg', 'images/4.jpg'),
(42, 'lenaogbi@ymail.com', 'lenouzz', 'Ogbi', '123Lele123', 22, 'Energie et environnement', '1994-10-13', 'Chatou', '0648128889', 'images/10.jpg', 'images/11.jpg'),
(43, 'massis@hotmail.fr', 'hugogol', 'Massis', '123', 21, 'SystÃ¨mes embarques', '1996-10-04', 'Paris', '0675678765', 'images/14.jpg', 'images/15.jpg'),
(44, 'adrien@hotmail.fr', 'kourga', 'kourganoff', '123', 20, 'SystÃ¨mes embarques', '1996-07-25', 'Boulogne', '064897643', 'images/30.jpg', 'images/31.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demandes_amis`
--
ALTER TABLE `demandes_amis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messenger`
--
ALTER TABLE `messenger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `demandes_amis`
--
ALTER TABLE `demandes_amis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `messenger`
--
ALTER TABLE `messenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
