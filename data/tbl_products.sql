-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 27 août 2020 à 03:56
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `phpsamples`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `average_rating` float(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `name`, `price`, `category`, `product_image`, `average_rating`) VALUES
(1, 'Tiny Handbags', 100.00, 'Fashion', 'gallery/handbag.jpeg', 5.0),
(2, 'Men\'s Watch', 300.00, 'Generic', 'gallery/watch.jpeg', 4.0),
(3, 'Trendy Watch', 550.00, 'Generic', 'gallery/trendy-watch.jpeg', 4.0),
(4, 'Travel Bag', 820.00, 'Travel', 'gallery/travel-bag.jpeg', 5.0),
(5, 'Plastic Ducklings', 200.00, 'Toys', 'gallery/ducklings.jpeg', 4.0),
(6, 'Wooden Dolls', 290.00, 'Toys', 'gallery/wooden-dolls.jpeg', 5.0),
(7, 'Advanced Camera', 600.00, 'Gadget', 'gallery/camera.jpeg', 4.0),
(8, 'Jewel Box', 180.00, 'Fashion', 'gallery/jewel-box.jpeg', 5.0),
(9, 'Perl Jewellery', 940.00, 'Fashion', 'gallery/perls.jpeg', 5.0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
