-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2016 at 08:23 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartphonebh`
--

-- --------------------------------------------------------

--
-- Table structure for table `autori`
--

DROP TABLE IF EXISTS `autori`;
CREATE TABLE IF NOT EXISTS `autori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` text COLLATE utf8_slovenian_ci NOT NULL,
  `prezime` text COLLATE utf8_slovenian_ci NOT NULL,
  `username` varchar(10) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `autori`
--

INSERT INTO `autori` (`id`, `ime`, `prezime`, `username`, `password`) VALUES
(1, 'Mirnes', 'Peljto', 'mpeljto', '$2y$10$crM7vM/geAMqFDHvDWjKL.ihwORm7o1m8CPUTaKm4IeM2LP0GIPpm'),
(2, 'Mujo', 'Mujic', 'mmujic', '$2y$10$5da4LQcYP7ZMtDRmiuZ8k.1UNIM.Zlmn/d8fujQyrTnf0NxL5Ei12'),
(4, 'admin', 'admin', 'admin', '$2y$10$0qIPBEVqcltZxQA71pPTgeRAAiy5rE9ZKZhPA7ZEpX8/OvcJd4iZS'),
(5, 'Gost', 'Gost', '', ''),
(6, 'Suljo', 'Suljic', 'ssuljic', '$2y$10$Vv6quzKHiyXVr6ZO/Q07dOV6kIFKgfK9oCfNhDWlMvB7ho1zDg0hS');

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

DROP TABLE IF EXISTS `komentari`;
CREATE TABLE IF NOT EXISTS `komentari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `novost` int(11) NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `datum` datetime NOT NULL,
  `autor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `novost` (`novost`),
  KEY `autor` (`autor`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`id`, `novost`, `tekst`, `datum`, `autor`) VALUES
(2, 4, 'drugi trik nije los', '2016-06-04 08:10:38', 1),
(3, 3, 'best phone today', '2016-06-04 08:16:49', 1),
(4, 12, 'proba huawei', '2016-06-04 08:19:01', 1),
(6, 7, 'Best htc phone', '2016-06-04 10:24:09', 2),
(8, 11, 'komentar unio gost', '2016-06-04 10:36:34', 5),
(9, 1, 'komentar dodao gost', '2016-06-04 10:47:11', 5),
(14, 2, 'test', '2016-06-04 10:51:18', 5),
(15, 22, 'komentar komentar', '2016-06-04 12:33:30', 5),
(16, 8, 'ispisi komentar', '2016-06-04 13:06:10', 2),
(17, 1, 'pozicija komentar', '2016-06-04 13:15:03', 2),
(18, 2, 'test2', '2016-06-04 13:15:34', 2),
(19, 4, 'test', '2016-06-04 13:16:16', 2),
(20, 3, 'hahahahh', '2016-06-04 13:16:55', 2),
(21, 23, 'ok', '2016-06-04 13:20:26', 2);

-- --------------------------------------------------------

--
-- Table structure for table `novosti`
--

DROP TABLE IF EXISTS `novosti`;
CREATE TABLE IF NOT EXISTS `novosti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` datetime NOT NULL,
  `putanja` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `altSlike` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `kodDrzave` varchar(5) COLLATE utf8_slovenian_ci NOT NULL,
  `brojAutora` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` int(11) NOT NULL,
  `OtvorenoZaKomentare` varchar(2) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `autor` (`autor`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `novosti`
--

INSERT INTO `novosti` (`id`, `datum`, `putanja`, `altSlike`, `kodDrzave`, `brojAutora`, `tekst`, `autor`, `OtvorenoZaKomentare`) VALUES
(1, '2016-05-22 13:33:50', 'XiaomiMi5.jpg', 'Xiaomi Mi5', 'ba', '+387 061/456-987', 'Xiaomi Mi5 ostvario rezultat preko 170 hiljada na Antutu 6', 1, 'DA'),
(2, '2016-05-22 11:25:10', 'apple6s.jpg', 'Apple 6s', 'ba', '+ 387 062/852-852', 'Apple iphone 6s je najnoviji Apple-ov smartphone koji dolazi sa novim ekranom osjetljivim na dodir.', 2, 'DA'),
(3, '2016-05-19 13:33:50', 'samsungs7.jpg', 'Samsung Galaxy S7', 'hr', '+ 385 644-856', 'Samsungov najnoviji flagship uredaj za 2016 godinu. Za detaljan review kliknite na sliku.', 2, 'DA'),
(4, '2016-04-22 10:35:00', 'android6tips.jpg', 'Android 6.0', 'hr', '+ 385 211-853', 'Korisni savjeti i trikovi u Android 6.0', 1, 'DA'),
(6, '2016-04-02 21:05:00', 'appleIpad.jpg', 'Apple Ipad 9.7', 'ba', '+ 387 222-563', 'Apple-ov novi 9.7 incni iPad ce kostati vise nego iPad Air 2. Kliknite da procitate vise.', 1, 'NE'),
(7, '2016-03-30 20:49:00', 'htc10.jpg', 'HTC 10', 'ba', '+387 563-852', 'HTC will have 5.1 inch display with resolution 1440 x 2560. Snapdragon 820 chip will power the device.', 2, 'DA'),
(8, '2016-03-28 20:49:00', 'windowsphone.jpg', 'Windows Phone', 'rs', '+ 386 845-963', 'Microsoft priznaje da Windows Phone nije prioritet ove godine.', 2, 'DA'),
(9, '2016-04-01 20:49:00', 'iphone5se.jpg', 'Iphone 5se', 'ba', '+387 062/456-987', 'Apple orders less processors for its devices this year?', 2, 'NE'),
(10, '2016-03-27 20:49:00', 'iphonesebattery.jpg', 'Iphone SE battery', 'ba', ' 387 400-800', 'iPhone SE has bigger battery than 5s?', 1, 'NE'),
(11, '2016-04-03 10:21:00', 'games.jpg', 'Games discount', 'rs', '+ 386 255-133', 'Applications which received price cut.', 1, 'DA'),
(12, '2016-04-22 12:49:00', 'huaweip9.jpg', 'Huawei P9', 'hr', '+ 385 100-100', 'Huawei P9 sa 4GB  RAM-a i 64 GB-a prostora za podatke dolazi uskoro?', 1, 'DA'),
(21, '2016-06-03 18:35:40', 'windowsphone.jpg', 'windows phone', 'ba', '+ 387 062/455-899', 'proba sa autor id', 4, 'DA'),
(22, '2016-06-03 14:45:45', 'xperiae.jpg', 'xperia', 'hr', '+ 385 062/956-856', 'dodao korisnik mirnes', 1, 'DA'),
(23, '2016-06-04 13:19:45', 'samsung.jpg', 'test', 'ba', '+ 387 062/455-899', 'test pozicje poruke', 2, 'DA');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `komentari_ibfk_1` FOREIGN KEY (`novost`) REFERENCES `novosti` (`id`),
  ADD CONSTRAINT `komentari_ibfk_2` FOREIGN KEY (`autor`) REFERENCES `autori` (`id`);

--
-- Constraints for table `novosti`
--
ALTER TABLE `novosti`
  ADD CONSTRAINT `novosti_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `autori` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
