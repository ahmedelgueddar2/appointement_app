-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 26 déc. 2022 à 09:54
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rv`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `email`, `pass`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123'),
(2, 'omar', 'omar@gmail.com', 'omar123'),
(3, 'chihab', 'chihab@gmail.com', 'chihab123');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `pass` varchar(30) NOT NULL,
  `src` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `email`, `ville`, `pass`, `src`) VALUES
(38, 'OMAR CHAOUKAT', 'chawkatomar@gmail.com', 'Eljadida', 'omar123', 'avatar.jpg'),
(39, 'youness alaoui', 'youness@gmail.com', 'Casablanca', '123', 'b1.jpeg'),
(40, 'sara alaoui', 'sara@gmail.com', 'Casablanca', 'sara123', 'WhatsApp Image 2022-01-15 at 23.57.02 - Copie - Co'),
(43, 'souad', 'souad@gmail.com', 'ELJADIDA', 'souad123', 'avatar.jpg'),
(44, 'chihab eddine yassir', 'chihab@gmail.com', 'Casablanca', 'chihab123', 'avatar.jpg'),
(45, 'karima fouad', 'karima@gmail.com', 'Rabat', 'karima123', 'avatar.jpg'),
(46, 'salim kedari', 'salim@gmail.com', 'Rabat', 'salim123', 'avatar.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `num_post` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `srcimg` varchar(255) NOT NULL,
  `datepost` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`num_post`, `title`, `description`, `srcimg`, `datepost`) VALUES
(4, 'la medecine Aujourd\'hui', '       Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem, similique rerum. Eveniet ad, unde rem itaque officia temporibus eos delectus voluptate voluptates ratione assumenda perferendis consectetur dolorum quam consequuntur corporis!\r\n', 'cover-facebook.png', '2022-06-26 16:47:00'),
(5, 'juste un test titre', 'ueyuzedyzueyzueyzur zdjheziuydzid zdhziyd_zid zhdihzydihzd zikdhzihd\r\nfzdjzidhgzuidgz zskdhzihdzihd zdkhzihdizhd zkdrhziydhizhdz\r\nhuzidhzdihzdihzd zdhjzodhzidhzihd zidhzihdzidhzid zdhizidhzihdz', 'website-mockup-psd.jpg', '2022-06-28 16:23:00'),
(6, 'hello there', 'bonjour nass zuinin hada desc test', 'logo.png', '2022-06-28 23:38:00');

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `rd_id` int(11) NOT NULL,
  `rd_name` varchar(255) NOT NULL,
  `rd_service` varchar(255) NOT NULL,
  `rd_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_clt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`rd_id`, `rd_name`, `rd_service`, `rd_time`, `id_clt`) VALUES
(1380, 'rv3', 'Service Two', '2022-05-30 18:32:00', 38),
(1479, 'rvvv', 'Consultation', '2022-06-21 22:29:48', 38),
(2150, 'rv3', 'Service Two', '2022-07-02 23:06:00', 43),
(2639, 'rdv12', 'Consultation', '2022-07-02 15:26:00', 40),
(2916, 'rendez vous dentiste', 'Service One', '2022-06-06 00:30:00', 40),
(3902, 'rv1', 'Consultation', '2022-06-22 12:20:00', 38),
(4486, 'rdv123', 'Consultation', '2022-06-12 22:34:00', 38),
(5910, 'omar', 'Service Two', '2022-08-18 23:28:00', 38),
(7896, 'rdv88', 'Service Two', '2022-07-08 12:11:00', 39),
(8086, 'Rdvtestcenter', 'Service One', '2022-08-30 00:18:00', 38);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`num_post`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`rd_id`),
  ADD KEY `id_clt` (`id_clt`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `num_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `rendez_vous_ibfk_1` FOREIGN KEY (`id_clt`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
