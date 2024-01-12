-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 12 jan. 2024 à 15:59
-- Version du serveur : 10.6.12-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `draft-shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Chemises', 'Catégorie de chemises pour hommes et femmes', '2024-01-08 16:43:01', '2024-01-08 16:43:01'),
(2, 'Pantalons', 'Catégorie de pantalons pour hommes et femmes', '2024-01-08 16:43:01', '2024-01-08 16:43:01'),
(3, 'Robes', 'Catégorie de robes pour femmes', '2024-01-08 16:43:01', '2024-01-08 16:43:01'),
(4, 'Chaussures', 'Catégorie de chaussures pour hommes et femmes', '2024-01-08 16:43:01', '2024-01-08 16:43:01');

-- --------------------------------------------------------

--
-- Structure de la table `clothing`
--

CREATE TABLE `clothing` (
  `product_id` int(11) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `material_fee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clothing`
--

INSERT INTO `clothing` (`product_id`, `size`, `color`, `type`, `material_fee`) VALUES
(11, 'M', 'bleu', 'Manche courte', 1),
(12, '42', 'orange', 'sport', 1),
(13, 'M', 'Noir', 'Manche courte', 1),
(14, 'M', 'Noir', 'Manche courte', 1),
(20, 'M', 'Noir', 'Manche courte', 1),
(22, 'M', 'Noir', 'Manche courte', 1),
(24, 'M', 'Noir', 'Manche courte', 1),
(26, 'M', 'Black', 'T-Shirt', 10),
(27, 'M', 'Black', 'T-Shirt', 10),
(28, 'M', 'Black', 'T-Shirt', 10),
(29, 'M', 'Black', 'T-Shirt', 10);

-- --------------------------------------------------------

--
-- Structure de la table `electronic`
--

CREATE TABLE `electronic` (
  `product_id` int(11) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `warrantly_fee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `electronic`
--

INSERT INTO `electronic` (`product_id`, `brand`, `warrantly_fee`) VALUES
(18, 'Samsung', 10),
(19, 'Apple', 10),
(21, 'Apple', 10),
(23, 'Apple', 10),
(25, 'Apple', 10);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `photos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`photos`)),
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `photos`, `price`, `description`, `quantity`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'Chemise à rayures', '[\"stripe_image1.jpg\", \"stripe_image2.jpg\", \"stripe_image3.jpg\"]', 2999, 'Chemise élégante à rayures pour hommes', 20, '2024-01-08 16:51:12', '2024-01-08 16:51:12', 1),
(2, 'Chemisier en soie', '[\"silk_blouse1.jpg\", \"silk_blouse2.jpg\"]', 3999, 'Chemisier en soie pour femmes', 15, '2024-01-08 16:51:12', '2024-01-08 16:51:12', 1),
(3, 'Pantalon chino', '[\"chino_pants1.jpg\", \"chino_pants2.jpg\"]', 3499, 'Pantalon chino décontracté pour hommes', 25, '2024-01-08 16:51:12', '2024-01-08 16:51:12', 2),
(4, 'Jean slim', '[\"slim_jeans1.jpg\", \"slim_jeans2.jpg\"]', 4499, 'Jean slim pour femmes', 18, '2024-01-08 16:51:12', '2024-01-08 16:51:12', 2),
(5, 'Robe de cocktail', '[\"cocktail_dress1.jpg\", \"cocktail_dress2.jpg\"]', 5999, 'Robe de cocktail élégante pour femmes', 12, '2024-01-08 16:51:12', '2024-01-08 16:51:12', 3),
(6, 'Robe d\'été', '[\"summer_dress1.jpg\", \"summer_dress2.jpg\"]', 4999, 'Robe d\'été légère pour femmes', 20, '2024-01-08 16:51:12', '2024-01-08 16:51:12', 3),
(7, 'Chaussures de sport', '[\"sport_shoes1.jpg\", \"sport_shoes2.jpg\"]', 7999, 'Chaussures de sport confortables pour hommes et femmes', 15, '2024-01-08 16:51:12', '2024-01-08 16:51:12', 4),
(8, 'Escarpins classiques', '[\"classic_heels1.jpg\", \"classic_heels2.jpg\"]', 6999, 'Escarpins classiques pour femmes', 10, '2024-01-08 16:51:12', '2024-01-08 16:51:12', 4),
(9, 'T-shirt 232', '[\"t-shirt.jpg\"]', 1000, 'Un t-shirt très jolie', 24, '2024-01-09 12:22:30', '2024-01-09 13:09:03', 1),
(10, 'Jean bleu', '[\"jean-rouge.jpg\"]', 9099, 'Un jean bleu très jolie', 24, '2024-01-09 13:18:25', '2024-01-09 13:18:25', 2),
(11, 'T-shirt', '[\"tshirt.jpg\"]', 2000, 'Un t-shirt', 10, '2024-01-09 15:45:12', '2024-01-10 10:42:43', 1),
(12, 'basket', '[\"basket.jpg\"]', 5000, 'Une paire de basket', 10, '2024-01-09 15:52:44', '2024-01-09 16:09:06', 4),
(13, 'T-shirt', '[\"tshirt.jpg\"]', 10, 'Un t-shirt', 10, '2024-01-09 17:33:24', '2024-01-09 17:33:24', 1),
(14, 'T-shirt', '[\"tshirt.jpg\"]', 10, 'Un t-shirt', 10, '2024-01-09 17:35:59', '2024-01-09 17:35:59', 1),
(15, 'Tablette', '[\"tablette.jpg\"]', 100, 'Une tablette', 10, '2024-01-09 17:35:59', '2024-01-09 17:35:59', 2),
(16, 'Tablette', '[\"tablette.jpg\"]', 100, 'Une tablette', 10, '2024-01-09 17:38:26', '2024-01-09 17:38:26', 2),
(17, 'Tablette', '[\"tablette.jpg\"]', 100, 'Une tablette', 10, '2024-01-09 17:38:46', '2024-01-09 17:38:46', 2),
(18, 'Tablette', '[\"tablette.jpg\"]', 20000, 'Une tablette', 10, '2024-01-09 17:39:46', '2024-01-10 10:42:43', 2),
(19, 'Tablette', '[\"tablette.jpg\"]', 100, 'Une tablette', 10, '2024-01-09 17:40:22', '2024-01-09 17:40:22', 2),
(20, 'T-shirt', '[\"tshirt.jpg\"]', 10, 'Un t-shirt', 10, '2024-01-10 10:34:14', '2024-01-10 10:34:14', 1),
(21, 'Tablette', '[\"tablette.jpg\"]', 100, 'Une tablette', 10, '2024-01-10 10:34:14', '2024-01-10 10:34:14', 2),
(22, 'T-shirt', '[\"tshirt.jpg\"]', 10, 'Un t-shirt', 74, '2024-01-10 10:39:45', '2024-01-11 07:47:44', 1),
(23, 'Tablette', '[\"tablette.jpg\"]', 100, 'Une tablette', 58, '2024-01-10 10:39:45', '2024-01-11 07:47:44', 2),
(24, 'T-shirt', '[\"tshirt.jpg\"]', 10, 'Un t-shirt', 10, '2024-01-10 10:42:43', '2024-01-10 10:42:43', 1),
(25, 'Tablette', '[\"tablette.jpg\"]', 100, 'Une tablette', 10, '2024-01-10 10:42:43', '2024-01-10 10:42:43', 2),
(26, 'T-Shirt', '[\"tshirt.jpg\"]', 100, 'This is a T-Shirt', 10, '2021-01-01 00:00:00', '2021-01-01 00:00:00', 1),
(27, 'T-Shirt 2', '[\"tshirt.jpg\"]', 200, 'This is a T-Shirt', 20, '2021-01-01 00:00:00', '2024-01-11 08:53:34', 1),
(28, 'T-Shirt 2', '[\"tshirt.jpg\"]', 200, 'This is a T-Shirt', 20, '2021-01-01 00:00:00', '2024-01-11 14:12:41', 1),
(29, 'T-Shirt 2', '[\"tshirt.jpg\"]', 200, 'This is a T-Shirt', 20, '2024-01-11 13:45:47', '2024-01-11 13:45:47', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clothing`
--
ALTER TABLE `clothing`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `electronic`
--
ALTER TABLE `electronic`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clothing`
--
ALTER TABLE `clothing`
  ADD CONSTRAINT `clothing_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Contraintes pour la table `electronic`
--
ALTER TABLE `electronic`
  ADD CONSTRAINT `electronic_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
