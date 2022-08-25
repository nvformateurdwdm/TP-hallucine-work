-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 26 août 2022 à 00:21
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hallucine`
--

-- --------------------------------------------------------

--
-- Structure de la table `castings`
--

CREATE TABLE `castings` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `about` text NOT NULL,
  `birthdate` date NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `castings`
--

INSERT INTO `castings` (`id`, `firstname`, `lastname`, `sex`, `about`, `birthdate`, `type`) VALUES
(1, 'Patrick', 'Swayze', 0, 'Fiche descriptive de Patrick Swayze', '2018-08-02', 3),
(2, 'James', 'Cameron', 0, 'Fiche de James Cameron.', '2022-08-03', 1),
(3, 'Viggo', 'Mortensen', 0, 'Fiche de Viggo.', '2014-08-08', 3),
(4, 'Sigourney', 'Weaver', 1, 'Fiche de Sigourney.', '2012-08-16', 1),
(7, 'Louis', 'de Funès', 1, 'Fiche de Louis de Funès', '1914-07-31', 3),
(8, 'Geneviève', 'Grad', 1, 'Fiche de Geneviève Gabrielle Grad', '1944-07-05', 3),
(9, 'Michel', 'Galabru', 1, 'Fiche de Michel Louis Edmond Galabru', '1922-10-27', 3),
(10, 'Jean', 'Girault', 1, 'Fiche de Jean GIRAULT', '1924-05-09', 1),
(11, 'Jérôme', 'Salle', 1, 'Fiche de Jérôme Salle', '1980-07-06', 4),
(12, 'Caryl', 'Ferey', 1, 'Fiche de Caryl Ferey', '1984-07-08', 1),
(13, 'Gilles', 'Lellouche', 1, 'Fiche de Gilles LELLOUCHE', '1979-06-04', 3),
(14, 'Joanna', 'Kulig', 1, 'Fiche de Joanna Kulig', '1984-05-23', 3),
(15, 'Marina', 'Foïs', 1, 'Fiche de Marina Foïs', '1970-01-21', 3),
(16, 'Kad', 'Merad', 1, 'Fiche de Kad Merrad', '1964-03-27', 3),
(17, 'Joey', 'Starr', 1, 'Fiche de Joey Starr', '1975-06-23', 3),
(18, 'Maïwenn', '', 1, 'Fiche de Maïwenn', '1967-07-21', 1),
(19, 'Rodrigo', 'Sorogoyen', 1, 'Fiche de Rodigro Sorogoyen', '1954-05-06', 4),
(20, 'Isabel', 'Peña', 1, 'Fiche de Isabel Peña', '1984-05-23', 1),
(21, 'Ludovic', 'Boukherma', 0, 'Fiche de Ludovic Boukherma', '1983-06-05', 1),
(22, 'Clint', 'Eastwood', 1, 'Fiche de Clint Eastwood', '1955-07-08', 3),
(23, 'Sergio', 'Leone', 1, 'Fiche de Sergio Leone', '1955-06-07', 1),
(24, 'Sam', 'Smith', 0, 'Fiche de Sam Smith', '1975-06-23', 3),
(25, 'Jean-Pascal', 'Zadi', 0, 'Fiche Jean-Pascal Zadi', '1980-08-22', 3),
(26, 'Jordan', 'Peele', 0, 'Fiche de Jordan Peele', '1979-02-21', 1),
(27, 'Daniel', 'Kaluuya', 0, 'Fiche de Daniel', '1989-02-24', 3),
(28, 'Keke', 'Palmer', 1, 'Fiche de Keke Palmer', '1993-08-26', 3),
(29, 'Tom', 'Cruise', 0, 'Fiche de Tom Cruise', '1962-07-03', 3),
(31, 'Chris', 'Hemsworth', 0, 'Fiche de Chris Hemsworth', '1983-08-11', 3);

-- --------------------------------------------------------

--
-- Structure de la table `casting_types`
--

CREATE TABLE `casting_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `casting_types`
--

INSERT INTO `casting_types` (`id`, `name`) VALUES
(1, 'réalisateur'),
(2, 'producteur'),
(3, 'acteur'),
(4, 'scénariste');

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'comédie'),
(2, 'fantastique'),
(3, 'horreur'),
(4, 'science fiction');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `runtime` int(6) NOT NULL,
  `description` text NOT NULL,
  `release_date` date NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `image_url`, `runtime`, `description`, `release_date`, `added_date`) VALUES
(2, 'L\'année du Requin', 'l-annee-du-requin.jpg', 65789, 'Ceci est la desc de l\'année du requin', '2013-08-01', '2022-08-11 00:00:00'),
(3, 'Le gendarme de Saint-Tropez', 'le-gendarme-de-saint-tropez.jpg', 5700, 'Suite à une promotion, le gendarme Cruchot quitte son petit village provincial pour prendre se nouvelles fonctions dans la commune de Saint-Tropez. Sa fille unique, la charmante Nicole est folle de joie et ne tarde pas à se faire une foule de nouveaux amis « yé-yé » tout en s’attirant de sacrés ennuis, tandis que Cruchot prend activement la direction d’opérations difficiles et délicates…', '2018-08-01', '2022-08-11 00:00:00'),
(4, 'Kompromat', 'kompromat.jpg', 6000, 'Russie, 2017. Mathieu Roussel est arrêté et incarcéré sous les yeux de sa fille. Expatrié français, il est victime d’un « kompromat », de faux documents compromettants utilisés par les services secrets russes pour nuire à un ennemi de l’Etat. Menacé d’une peine de prison à vie, il ne lui reste qu’une option : s’évader, et rejoindre la France par ses propres moyens…', '2022-09-07', '2022-08-11 00:00:00'),
(6, 'Le bon, la brute et le truand', 'le-bon-la-brute-et-le-truand.jpg', 10800, 'Pendant la Guerre de Sécession, trois hommes, préférant s\'intéresser à leur profit personnel, se lancent à la recherche d\'un coffre contenant 200 000 dollars en pièces d\'or volés à l\'armée sudiste. Tuco sait que le trésor se trouve dans un cimetière, tandis que Joe connaît le nom inscrit sur la pierre tombale qui sert de cache. Chacun a besoin de l\'autre. Mais un troisième homme entre dans la course : Setenza, une brute qui n\'hésite pas à massacrer femmes et enfants pour parvenir à ses fins.', '1968-03-08', '2022-08-11 00:00:00'),
(7, 'L\'avare', 'l-avare.jpg', 5700, 'Harpagon, un bourgeois avare, a une fils, Cléante, et une fille, Elise. Cette dernière est amoureuse de Valère, qui ne trouve d\'autre solution pour se rapprocher de sa bien aimée que de se faire embaucher chez son père comme intendant. Cléante, lui, aime Marianne, une jeune femme sans aucune fortune que Harpagon veut aussi épouser. Le vieux bourgeois décide de marier sa fille au Seigneur Anselme car il accepte d\'en faire son épouse sans dote...', '1980-03-05', '2022-08-11 00:00:00'),
(8, 'As Bestas', 'as-bestas.jpg', 6086, 'Antoine et Olga, un couple de Français, sont installés depuis longtemps dans un petit village de Galice. Ils ont une ferme et restaurent des maisons abandonnées pour faciliter le repeuplement. Tout devrait être idyllique mais un grave conflit avec leurs voisins fait monter la tension jusqu’à l’irréparable…', '2022-07-20', '2022-08-11 00:00:00'),
(9, 'Polisse', 'polisse.jpg', 7209, 'Le quotidien des policiers de la BPM (Brigade de Protection des Mineurs) ce sont les gardes à vue de pédophiles, les arrestations de pickpockets mineurs mais aussi la pause déjeuner où l’on se raconte ses problèmes de couple ; ce sont les auditions de parents maltraitants, les dépositions des enfants, les dérives de la sexualité chez les adolescents, mais aussi la solidarité entre collègues et les fous rires incontrôlables dans les moments les plus impensables ; c’est savoir que le pire existe, et tenter de faire avec… Comment ces policiers parviennent-ils à trouver l’équilibre entre leurs vies privées et la réalité à laquelle ils sont confrontés, tous les jours ? Fred, l’écorché du groupe, aura du mal à supporter le regard de Melissa, mandatée par le ministère de l’intérieur pour réaliser un livre de photos sur cette brigade.', '2011-09-19', '2022-08-11 00:00:00'),
(17, 'Nope', 'nope.jpg', 7200, 'Les habitants d’une vallée perdue du fin fond de la Californie sont témoins d’une découverte terrifiante à caractère surnaturel.', '2022-08-26', '2022-08-13 00:00:00'),
(18, 'Thor: Love and Thunder', 'thor-love-and-thunder.jpg', 95, 'Thor demande l\'aide de Valkyrie, Korg et de l\'ex-petite amie Jane Foster pour combattre Gorr le dieu boucher, qui a l\'intention de les faire disparaître.', '2022-06-23', '2022-08-17 00:00:00'),
(23, 'Terminator: Dark Fate', 'terminator-dark-fate.jpg', 168, 'Sarah Connor et un cyborg hybride doivent protéger une jeune fille d\'un nouveau Terminator liquide venant du futur.', '2019-10-23', '2022-08-19 00:00:00'),
(24, 'Top Gun: Maverick', 'top-gun-maverick.jpg', 126, 'Après plus de trente ans de service en tant que l\'un des meilleurs aviateurs de la Marine, Pete Mitchell est à sa place, étant un pilote d\'essai courageux et esquivant l\'avancement en grade qui le clouerait au sol.', '2022-05-18', '2022-08-19 14:30:38');

-- --------------------------------------------------------

--
-- Structure de la table `movies_castings`
--

CREATE TABLE `movies_castings` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `casting_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `movies_castings`
--

INSERT INTO `movies_castings` (`id`, `movie_id`, `casting_id`) VALUES
(6, 4, 13),
(7, 2, 16),
(8, 2, 15),
(9, 2, 25),
(10, 2, 21),
(11, 7, 7),
(12, 3, 7),
(13, 3, 8),
(14, 3, 9),
(15, 3, 10),
(16, 4, 12),
(17, 4, 11),
(18, 4, 14),
(19, 6, 22),
(20, 6, 23),
(21, 7, 10),
(22, 8, 15),
(23, 8, 19),
(24, 8, 20),
(25, 9, 17),
(26, 9, 15),
(27, 9, 18),
(28, 24, 29),
(29, 18, 31);

-- --------------------------------------------------------

--
-- Structure de la table `movies_genres`
--

CREATE TABLE `movies_genres` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `movies_genres`
--

INSERT INTO `movies_genres` (`id`, `movie_id`, `genre_id`) VALUES
(3, 8, 1),
(4, 8, 2),
(5, 4, 4),
(6, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `movies_users_ratings`
--

CREATE TABLE `movies_users_ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `rate` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `movies_users_ratings`
--

INSERT INTO `movies_users_ratings` (`id`, `user_id`, `movie_id`, `rate`) VALUES
(9, 2, 9, 34),
(12, 4, 8, 75),
(15, 1, 4, 44),
(19, 1, 8, 87);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sex` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `sex`) VALUES
(1, 'Nicolas', 'Védrine', 'nicolas.vedrine@gmail.com', '$2y$10$fPbW61cUV2pX8.R31smpLOD6hEpbZGacYFEpnCDqd2Qv.sL0bJ10G', 0),
(2, 'Kévin', 'Kali', 'kevin.kali@gmail.com', '$2y$10$fPbW61cUV2pX8.R31smpLOD6hEpbZGacYFEpnCDqd2Qv.sL0bJ10G', 0),
(3, 'Bernet', 'Boisdur', 'bernet.boisdur@gmail.com', '$2y$10$fPbW61cUV2pX8.R31smpLOD6hEpbZGacYFEpnCDqd2Qv.sL0bJ10G', 0),
(4, 'Alex', 'Hubert', 'alex.hubert@gmail.com', '$2y$10$fPbW61cUV2pX8.R31smpLOD6hEpbZGacYFEpnCDqd2Qv.sL0bJ10G', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `castings`
--
ALTER TABLE `castings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Index pour la table `casting_types`
--
ALTER TABLE `casting_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movies_castings`
--
ALTER TABLE `movies_castings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`) USING BTREE,
  ADD KEY `casting_id` (`casting_id`) USING BTREE;

--
-- Index pour la table `movies_genres`
--
ALTER TABLE `movies_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`) USING BTREE,
  ADD KEY `genre_id` (`genre_id`) USING BTREE;

--
-- Index pour la table `movies_users_ratings`
--
ALTER TABLE `movies_users_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `castings`
--
ALTER TABLE `castings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `casting_types`
--
ALTER TABLE `casting_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `movies_castings`
--
ALTER TABLE `movies_castings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `movies_genres`
--
ALTER TABLE `movies_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `movies_users_ratings`
--
ALTER TABLE `movies_users_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `castings`
--
ALTER TABLE `castings`
  ADD CONSTRAINT `castings_ibfk_1` FOREIGN KEY (`type`) REFERENCES `casting_types` (`id`);

--
-- Contraintes pour la table `movies_castings`
--
ALTER TABLE `movies_castings`
  ADD CONSTRAINT `movies_castings_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `movies_castings_ibfk_2` FOREIGN KEY (`casting_id`) REFERENCES `castings` (`id`);

--
-- Contraintes pour la table `movies_genres`
--
ALTER TABLE `movies_genres`
  ADD CONSTRAINT `movies_genres_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `movies_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

--
-- Contraintes pour la table `movies_users_ratings`
--
ALTER TABLE `movies_users_ratings`
  ADD CONSTRAINT `movies_users_ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `movies_users_ratings_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
