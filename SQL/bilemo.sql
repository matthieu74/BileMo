-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 26 Juin 2017 à 15:21
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bilemo`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `name`, `phone_number`, `address1`, `city`, `country`, `postal_code`) VALUES
(1, 'client BileMo', 132456789, '12 rue des telecom', 'Paris', 'France', 75002);

-- --------------------------------------------------------

--
-- Structure de la table `feature`
--

CREATE TABLE `feature` (
  `id` int(11) NOT NULL,
  `feature_category_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `feature`
--

INSERT INTO `feature` (`id`, `feature_category_id`, `description`) VALUES
(1, 1, 'RAM 4Go'),
(2, 2, '159.5 x 73.4 x 8.1 mm'),
(3, 3, 'IP68'),
(4, 4, '173 g'),
(5, 5, 'Android 7.0 (Nougat)'),
(6, 6, 'Octo Core 2,3 GHz (Quad 2,3 GHz + Quad 1,7 GHz)'),
(7, 7, '12 mégapixels'),
(8, 8, 'Super AMOLED');

-- --------------------------------------------------------

--
-- Structure de la table `feature_category`
--

CREATE TABLE `feature_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `feature_category`
--

INSERT INTO `feature_category` (`id`, `name`) VALUES
(1, 'Memory'),
(2, 'Size'),
(3, 'Water proof'),
(4, 'Weight'),
(5, 'OS'),
(6, 'Chipset'),
(7, 'Camera'),
(8, 'Screen');

-- --------------------------------------------------------

--
-- Structure de la table `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `phone_brand_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price_excl_tax` double NOT NULL,
  `price_incl_tax` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `phone`
--

INSERT INTO `phone` (`id`, `phone_brand_id`, `name`, `description`, `price_excl_tax`, `price_incl_tax`) VALUES
(1, 2, 'Galaxy S8+', 'Le Samsung Galaxy S8 + bouscule les codes esthétiques et repousse les limites des écrans tels que vous les connaissiez. Son écran Infinity sublime la richesse des images et offre une immersion spectaculaire. Un nouveau monde s’ouvre au creux de votre main. Sortez du cadre.', 800, 900);

-- --------------------------------------------------------

--
-- Structure de la table `phone_brand`
--

CREATE TABLE `phone_brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `phone_brand`
--

INSERT INTO `phone_brand` (`id`, `name`, `country`) VALUES
(1, 'Apple', 'Us'),
(2, 'Samsung', 'South Korea'),
(3, 'Sony', 'US'),
(4, 'LG', 'South Korea');

-- --------------------------------------------------------

--
-- Structure de la table `phone_feature`
--

CREATE TABLE `phone_feature` (
  `phone_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `phone_feature`
--

INSERT INTO `phone_feature` (`phone_id`, `feature_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `client_id`, `username`, `email`, `password`) VALUES
(1, 1, 'user', 'user@user.fr', '$2y$10$4Vl61Fn8SwFdgA5lmcAoY.YAwbXUb7K7fXNKZ0ENBsxUUStLcDz2O');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1FD77566CA5501D5` (`feature_category_id`);

--
-- Index pour la table `feature_category`
--
ALTER TABLE `feature_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_444F97DD8CB2C304` (`phone_brand_id`);

--
-- Index pour la table `phone_brand`
--
ALTER TABLE `phone_brand`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `phone_feature`
--
ALTER TABLE `phone_feature`
  ADD PRIMARY KEY (`phone_id`,`feature_id`),
  ADD KEY `IDX_8F95F9543B7323CB` (`phone_id`),
  ADD KEY `IDX_8F95F95460E4B879` (`feature_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8D93D64919EB6921` (`client_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `feature`
--
ALTER TABLE `feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `feature_category`
--
ALTER TABLE `feature_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `phone_brand`
--
ALTER TABLE `phone_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `feature`
--
ALTER TABLE `feature`
  ADD CONSTRAINT `FK_1FD77566CA5501D5` FOREIGN KEY (`feature_category_id`) REFERENCES `feature_category` (`id`);

--
-- Contraintes pour la table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `FK_444F97DD8CB2C304` FOREIGN KEY (`phone_brand_id`) REFERENCES `phone_brand` (`id`);

--
-- Contraintes pour la table `phone_feature`
--
ALTER TABLE `phone_feature`
  ADD CONSTRAINT `FK_8F95F9543B7323CB` FOREIGN KEY (`phone_id`) REFERENCES `phone` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_8F95F95460E4B879` FOREIGN KEY (`feature_id`) REFERENCES `feature` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D64919EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
