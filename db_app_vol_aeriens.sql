-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 28 mai 2020 à 21:37
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_app_vol_aeriens`
--

-- --------------------------------------------------------

--
-- Structure de la table `passager`
--

CREATE TABLE `passager` (
  `id_passager` int(11) NOT NULL,
  `nom_passager` varchar(60) NOT NULL,
  `prenom_passager` varchar(60) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `phone_passager` int(11) NOT NULL,
  `email_passager` varchar(60) NOT NULL,
  `cin_passager` varchar(60) NOT NULL,
  `n_passport_passager` varchar(60) NOT NULL,
  `date_create_passager` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_user_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `passager`
--

INSERT INTO `passager` (`id_passager`, `nom_passager`, `prenom_passager`, `date_de_naissance`, `phone_passager`, `email_passager`, `cin_passager`, `n_passport_passager`, `date_create_passager`, `id_user_created`) VALUES
(1, 'BEN', 'Reda', '0000-00-00', 600000000, 're@gmail.com', 'CIN_BEN', 'NUM_PASPORT_BEN', '2020-05-22 17:03:23', 3),
(2, 'RF', 'Ayoub', '0000-00-00', 622222222, 'ayoub@gmail.com', 'CIN_RF', 'NUM_PASPORT_RF', '2020-05-22 17:03:23', 4),
(3, 'rachid', 'mes', '2020-05-02', 600000000, 'mes@gmail.com', 'CIN_MES', 'NUM_PASPORT_MES', '2020-05-26 21:41:58', 1),
(4, 'KR', 'Mahdi', '2020-05-02', 600000000, 'ma@gmail.com', 'CIN_KR', 'NUM_PASPORT_KR', '2020-05-26 21:45:16', 2),
(5, 'ti', 'ti', '2020-05-13', 600000000, 'ti', 'ti', 'ti', '2020-05-28 05:07:13', 8),
(9, 'RH', 'Taoufiq', '1998-06-15', 600000000, 'ta@gmail.com', 'CIN_RH', 'NUM_PASPORT_RH', '2020-05-28 12:22:48', 1);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id_reservation` int(11) NOT NULL,
  `id_vol` int(11) NOT NULL,
  `id_passager` int(11) NOT NULL,
  `date_reservation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id_reservation`, `id_vol`, `id_passager`, `date_reservation`) VALUES
(1, 1, 1, '2020-05-22 17:04:59'),
(2, 2, 2, '2020-05-22 17:04:59'),
(3, 26, 4, '2020-05-28 06:26:06'),
(4, 26, 4, '2020-05-28 06:26:39'),
(6, 26, 4, '2020-05-28 10:13:16'),
(8, 26, 9, '2020-05-28 12:22:48'),
(9, 26, 9, '2020-05-28 12:23:03');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `statut` varchar(5) NOT NULL,
  `cin` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `password`, `statut`, `cin`) VALUES
(1, 'RH', 'Taoufiq', 'ta@gmail.com', 'ta123', 'Admin', 'CIN_RH'),
(2, 'KR', 'Mahdi', 'ma@gmail.com', 'ma123', 'Admin', 'CIN_KR'),
(3, 'MH', 'Ah', 'ah@gmail.com', 'ah123', 'User', '_'),
(4, 'BR', 'Ya', 'ya@gmail.com', 'ya123', 'User', '_'),
(5, 'KAN', 'Hania', 'hania@gmail.com', 'hania123', 'Admin', 'CIN-KAN'),
(6, 'mhmhn', 'mhmhp', 'mhmh@gmail.com', 'mhmh123', 'User', '_'),
(7, 'lmn', 'lmp', 'lm@gmail.com', 'lm123', 'User', '_'),
(8, 'ti', 'ti', 'ti', 'ti', 'User', 'ti');

-- --------------------------------------------------------

--
-- Structure de la table `vols`
--

CREATE TABLE `vols` (
  `id_vol` int(11) NOT NULL,
  `nam` varchar(60) NOT NULL,
  `price` float NOT NULL,
  `image` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pays_depart` varchar(60) NOT NULL,
  `pays_arrive` varchar(60) NOT NULL,
  `date_vol` date NOT NULL,
  `hour_vol` int(11) NOT NULL,
  `minute_vol` int(11) NOT NULL,
  `nb_place_initial` int(11) NOT NULL,
  `nb_place_rest` int(11) NOT NULL,
  `statu_vol` varchar(10) NOT NULL,
  `id_admin_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vols`
--

INSERT INTO `vols` (`id_vol`, `nam`, `price`, `image`, `date_created`, `pays_depart`, `pays_arrive`, `date_vol`, `hour_vol`, `minute_vol`, `nb_place_initial`, `nb_place_rest`, `statu_vol`, `id_admin_created`) VALUES
(1, 'Voyage en famille', 10000, 'vol.jpg', '2020-05-26 00:10:14', 'maroc', 'paris', '2020-05-26', 8, 8, 60, 60, 'active', 1),
(2, 'Voyage de travel', 1500, 'vol.jpg', '2020-05-26 08:08:10', 'USA', 'canada', '2020-06-02', 10, 10, 10, 10, 'annule', 2),
(5, 'Voyage de travel', 40000, 'vol.jpg', '2020-05-26 00:45:05', 'maroc', 'italie', '2020-05-26', 6, 6, 60, 60, 'annule', 2),
(6, 'Voyage en famille', 6000, 'Vol.jpg', '2020-05-26 16:31:04', 'Holanda', 'Maroc', '2020-05-28', 4, 4, 22, 8, 'active', 2),
(7, 'Voyage en famille', 10000, 'vol.jpg', '2020-05-26 00:11:06', 'maroc', 'canada', '2020-05-28', 6, 6, 10, 10, 'active', 1),
(8, 'Voyage en famille', 10000, 'vol.jpg', '2020-05-26 00:11:58', 'maroc', 'canada', '2020-05-28', 6, 6, 10, 10, 'active', 1),
(9, 'Voyage en famille', 15000, 'vol.jpg', '2020-05-26 00:12:07', 'maroc', 'holan', '2020-05-26', 4, 4, 6, 6, 'active', 1),
(10, 'Voyage de travel', 20000, 'vol.jpg', '2020-05-26 00:12:21', 'maroc', 'france', '2020-06-28', 8, 8, 12, 12, 'active', 1),
(11, 'Voyage en famille', 10000, 'vol.jpg', '2020-05-26 00:12:41', 'canada', 'maroc', '2020-05-15', 2, 2, 6, 6, 'active', 1),
(12, 'Voyage en famille', 15000, 'vol.jpg', '2020-05-26 00:13:10', 'maroc', 'canada', '2020-05-15', 1, 1, 2, 2, 'active', 1),
(13, 'Voyage en famille', 15000, 'vol.jpg', '2020-05-26 00:14:22', 'holanda', 'france', '2020-06-28', 9, 9, 12, 12, 'active', 1),
(14, 'Voyage en famille', 15000, 'vol.jpg', '2020-05-26 00:14:11', 'maroc', 'canada', '2020-06-06', 4, 4, 14, 14, 'active', 1),
(15, 'Voyage en famille', 15000, 'vol.jpg', '2020-05-26 04:40:38', 'maroc', 'canada', '2020-05-29', 1, 1, 2, 2, 'active', 2),
(16, 'Voyage en famille', 20000, 'vol.jpg', '2020-05-26 04:40:51', 'canada', 'france', '2020-05-28', 2, 2, 4, 4, 'active', 1),
(17, 'Voyage de travel', 20000, 'Vol.jpg', '2020-05-28 19:25:40', 'Maroc', 'Paris', '2020-05-29', 1, 1, 2, 2, 'active', 1),
(18, 'Voyage en famille', 20000, 'vol.jpg', '2020-05-26 04:41:01', '', '', '0000-00-00', 0, 0, 2, 2, 'active', 1),
(19, 'Voyage en famille', 20000, 'vol.jpg', '2020-05-26 04:39:44', 'maroc', 'paris', '2020-05-14', 2, 2, 2, 2, 'active', 1),
(20, 'Voyage en famille', 20000, 'vol.jpg', '2020-05-26 04:41:10', '', '', '2020-05-15', 1, 1, 4, 4, 'active', 1),
(21, 'Voyage en famille', 15000, 'vol.jpg', '2020-05-26 00:14:33', 'Maroc', 'Canada', '2020-05-04', 4, 4, 8, 8, 'active', 1),
(22, 'Voyage en famille', 15000, 'Vol.jpg', '2020-05-26 00:14:45', 'Maroc', 'Canada', '2020-05-30', 2, 2, 3, 3, 'active', 1),
(23, 'Voyage en famille', 15000, 'Vol.jpg', '2020-05-26 04:41:18', '', '', '2020-05-30', 2, 2, 3, 3, 'active', 1),
(24, 'Voyage de travel', 40000, 'Vol.jpg', '2020-05-26 00:15:03', 'Holanda', 'Maroc', '2020-04-04', 4, 4, 4, 4, 'active', 1),
(25, 'Voyage de travel', 20000, 'Vol.jpg', '2020-05-26 00:15:12', 'Canada', 'Maroc', '2020-04-02', 2, 2, 2, 2, 'active', 1),
(26, 'Voyage en famille', 20000, 'Vol.jpg', '2020-05-27 18:19:45', 'Maroc', 'Canada', '2020-05-28', 2, 2, 10, 10, 'active', 1),
(27, 'Voyage de travel', 20000, 'Vol.jpg', '2020-05-28 19:24:17', 'Maroc', 'Canada', '2020-06-04', 4, 4, 4, 4, 'active', 1),
(28, 'Voyage en famille', 40000, 'Vol.jpg', '2020-05-26 00:52:32', 'Maroc', 'France', '2020-04-27', 4, 4, 4, 4, 'active', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `passager`
--
ALTER TABLE `passager`
  ADD PRIMARY KEY (`id_passager`),
  ADD KEY `id_user_created` (`id_user_created`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_passager` (`id_passager`),
  ADD KEY `id_vol` (`id_vol`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vols`
--
ALTER TABLE `vols`
  ADD PRIMARY KEY (`id_vol`),
  ADD KEY `id_admin_created` (`id_admin_created`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `passager`
--
ALTER TABLE `passager`
  MODIFY `id_passager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `vols`
--
ALTER TABLE `vols`
  MODIFY `id_vol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `passager`
--
ALTER TABLE `passager`
  ADD CONSTRAINT `passager_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_passager`) REFERENCES `passager` (`id_passager`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`id_vol`) REFERENCES `vols` (`id_vol`);

--
-- Contraintes pour la table `vols`
--
ALTER TABLE `vols`
  ADD CONSTRAINT `vols_ibfk_1` FOREIGN KEY (`id_admin_created`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
