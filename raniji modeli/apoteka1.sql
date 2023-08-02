-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 02, 2023 at 06:28 PM
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
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `lozinka` varchar(15000) NOT NULL,
  `popust` tinyint(4) NOT NULL DEFAULT '0',
  `admin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `link`, `cena`, `dostupnost`, `ime`) VALUES
(1, 'https://plitvicemarketi.rs/images/thumbs/0012394_jabuka-crveni-delises-1kg_511.jpeg', 80, 200, 'jabuka'),
(2, 'https://vinmec-prod.s3.amazonaws.com/images/20220306_102242_060030_bromazepam.max-1800x1800.jpg', 750, 400, 'bromazepam'),
(3, 'https://www.decjisajt.rs/files/watermark/files/thumbs/files/images/proizvodi/bebioprema/elektricniuredjaji/thumbs_1200/thumbs_w/inhalator_pingvin1_1200_1200px_w.jpg', 12500, 80, 'inhalator'),
(4, 'https://online.idea.rs/images/products/183/183036493_1l.jpg?1648732587', 76, 4000, 'caj kamilica'),
(5, 'https://www.naturehub.rs/files/images/slike_proizvoda/1111111111141.jpg', 198, 2000, 'matcha caj'),
(6, 'https://simptomi.rs/wp-content/uploads/2022/08/6-min.jpg', 380, 1000, 'hemomicin'),
(7, '../../slike/izdvojeni proizvodi/caj.jpg', 338, 200, 'caj'),
(8, 'kurkuma1.jpg', 564, 523, 'kurkuma'),
(9, 'kurkuma1.jpg', 432, 64554, 'knln'),
(10, 'kurkuma.jpg', 67, 3, 'hjgjh'),
(11, 'kurkuma.jpg', 543, 635, 'jkfsd');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registracija`
--

INSERT INTO `registracija` (`id`, `username`, `lozinka`, `email`) VALUES
(1, 'djASHHASDA', '25d55ad283aa400af464c76d713c07ad', 'AKJh@madsa.com'),
(2, 'jdoiasjd', 'e32f9849491e5be93b566844a96312c1', 'iajsdoisji@mail.com'),
(3, 'khdskjfsaioif', 'd064d90a8af3fbea6ad763ebe9120a56', 'sdkljaiofsho@mail.com'),
(4, 'nikola', '25f9e794323b453885f5181f1b624d0b', 'jhguyg@mail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
