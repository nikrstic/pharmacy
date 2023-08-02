-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 04, 2023 at 05:20 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apoteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `kodovi`
--

DROP TABLE IF EXISTS `kodovi`;
CREATE TABLE IF NOT EXISTS `kodovi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vrednost` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kodovi`
--

INSERT INTO `kodovi` (`id`, `vrednost`) VALUES
(1, 'kApo4ZeNwq1'),
(2, 'lpdWj9wkQsi');

-- --------------------------------------------------------

--
-- Table structure for table `kodovi_has_products`
--

DROP TABLE IF EXISTS `kodovi_has_products`;
CREATE TABLE IF NOT EXISTS `kodovi_has_products` (
  `kodovi_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  PRIMARY KEY (`kodovi_id`,`products_id`),
  KEY `fk_kodovi_has_products_products1_idx` (`products_id`),
  KEY `fk_kodovi_has_products_kodovi1_idx` (`kodovi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kodovi_has_products`
--

INSERT INTO `kodovi_has_products` (`kodovi_id`, `products_id`) VALUES
(1, 1),
(2, 2),
(1, 4),
(2, 4),
(1, 5),
(2, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `kontaktirajte`
--

DROP TABLE IF EXISTS `kontaktirajte`;
CREATE TABLE IF NOT EXISTS `kontaktirajte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tema` varchar(50) DEFAULT NULL,
  `poruka` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kontaktirajte`
--

INSERT INTO `kontaktirajte` (`id`, `ime`, `email`, `tema`, `poruka`) VALUES
(1, 'Marko', 'marko@mail.com', 'Pohvala', 'Svaka cast'),
(2, 'Marta', 'marta@gmail.com', 'tema', 'predivna apoteka'),
(3, 'Hristina', 'hristina@mail.com', 'wow', 'wow wow wow');

-- --------------------------------------------------------

--
-- Table structure for table `loyaliti_kartica`
--

DROP TABLE IF EXISTS `loyaliti_kartica`;
CREATE TABLE IF NOT EXISTS `loyaliti_kartica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `broj` varchar(45) NOT NULL,
  `registracija_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_loyaliti_kartica_registracija1_idx` (`registracija_id`),
  KEY `fk_loyaliti_kartica_products1_idx` (`products_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loyaliti_kartica`
--

INSERT INTO `loyaliti_kartica` (`id`, `broj`, `registracija_id`, `products_id`) VALUES
(1, '486213', 1, 7),
(2, '794475', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(300) NOT NULL,
  `cena` int(11) NOT NULL,
  `dostupnost` int(11) NOT NULL,
  `ime` varchar(120) NOT NULL,
  `popust` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `link`, `cena`, `dostupnost`, `ime`, `popust`) VALUES
(1, 'https://plitvicemarketi.rs/images/thumbs/0012394_jabuka-crveni-delises-1kg_511.jpeg', 80, 197, 'jabuka', 0),
(2, 'https://vinmec-prod.s3.amazonaws.com/images/20220306_102242_060030_bromazepam.max-1800x1800.jpg', 750, 399, 'bromazepam', 1),
(3, 'https://www.decjisajt.rs/files/watermark/files/thumbs/files/images/proizvodi/bebioprema/elektricniuredjaji/thumbs_1200/thumbs_w/inhalator_pingvin1_1200_1200px_w.jpg', 12500, 80, 'inhalator', 1),
(4, 'https://online.idea.rs/images/products/183/183036493_1l.jpg?1648732587', 76, 4000, 'caj kamilica', 0),
(5, 'https://www.naturehub.rs/files/images/slike_proizvoda/1111111111141.jpg', 198, 1998, 'matcha caj', 1),
(6, 'https://simptomi.rs/wp-content/uploads/2022/08/6-min.jpg', 380, 1000, 'hemomicin', 0),
(7, '../../slike/izdvojeni proizvodi/caj.jpg', 338, 200, 'caj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registracija`
--

DROP TABLE IF EXISTS `registracija`;
CREATE TABLE IF NOT EXISTS `registracija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `lozinka` varchar(21000) NOT NULL,
  `email` varchar(40) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registracija`
--

INSERT INTO `registracija` (`id`, `username`, `lozinka`, `email`, `admin`) VALUES
(1, 'korisnik', '716b64c0f6bad9ac405aab3f00958dd1', 'korisnik@mail.com', 0),
(2, 'nikola', '25f9e794323b453885f5181f1b624d0b', 'nikola@mail.com', 1),
(3, 'kjhjhm,', 'e32f9849491e5be93b566844a96312c1', '8645fdg@midal.com', 0),
(4, 'nalog', '44c8333179fb77b2d7ed5c81b6a3567d', '8645fdsadg@midal.com', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kodovi_has_products`
--
ALTER TABLE `kodovi_has_products`
  ADD CONSTRAINT `fk_kodovi_has_products_kodovi1` FOREIGN KEY (`kodovi_id`) REFERENCES `kodovi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kodovi_has_products_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `loyaliti_kartica`
--
ALTER TABLE `loyaliti_kartica`
  ADD CONSTRAINT `fk_loyaliti_kartica_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_loyaliti_kartica_registracija1` FOREIGN KEY (`registracija_id`) REFERENCES `registracija` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
