-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 22 mai 2020 à 19:43
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
  `age_passager` int(11) NOT NULL,
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

INSERT INTO `passager` (`id_passager`, `nom_passager`, `prenom_passager`, `age_passager`, `phone_passager`, `email_passager`, `cin_passager`, `n_passport_passager`, `date_create_passager`, `id_user_created`) VALUES
(1, 'BEN', 'Reda', 26, 600000000, 're@gmail.com', 'CIN_BEN', 'NUM_PASPORT_BEN', '2020-05-22 17:03:23', 3),
(2, 'RF', 'Ayoub', 34, 622222222, 'ayoub@gmail.com', 'CIN_RF', 'NUM_PASPORT_RF', '2020-05-22 17:03:23', 4);

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
(2, 2, 2, '2020-05-22 17:04:59');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `statut` varchar(5) NOT NULL,
  `cin` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `age`, `email`, `password`, `statut`, `cin`) VALUES
(1, 'RH', 'Taoufiq', 22, 'ta@gmail.com', 'ta123', 'Admin', 'CIN_RH'),
(2, 'KR', 'Mahdi', 23, 'ma@gmail.com', 'ma123', 'Admin', 'CIN_KR'),
(3, 'MH', 'Ah', 24, 'ah@gmail.com', 'ah123', 'User', '_'),
(4, 'BR', 'Ya', 20, 'ya@gmail.com', 'ya123', 'User', '_');

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
  `id_admin_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vols`
--

INSERT INTO `vols` (`id_vol`, `nam`, `price`, `image`, `date_created`, `pays_depart`, `pays_arrive`, `date_vol`, `hour_vol`, `minute_vol`, `nb_place_initial`, `nb_place_rest`, `id_admin_created`) VALUES
(1, 'Voyage en famille', 10000, 'vol.jpg', '2020-05-22 16:49:55', 'maroc', 'paris', '2020-05-26', 8, 8, 60, 60, 1),
(2, 'Voyage de travel', 1500, 'vol.jpg', '2020-05-22 16:49:55', 'USA', 'canada', '2020-06-02', 10, 10, 10, 20, 2),
(5, 'Voyage de travel', 40000, 'vol.jpg', '2020-05-22 16:55:27', 'maroc', 'italie', '2020-05-26', 6, 6, 60, 60, 1),
(6, 'Voyage en famille', 6000, 'vol.jpg', '2020-05-22 16:55:27', 'holanda', 'maroc', '2020-05-28', 4, 4, 20, 20, 2);

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
  MODIFY `id_passager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `vols`
--
ALTER TABLE `vols`
  MODIFY `id_vol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
