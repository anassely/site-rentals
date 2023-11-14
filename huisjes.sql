-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 mrt 2022 om 15:18
-- Serverversie: 10.4.21-MariaDB
-- PHP-versie: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `huisjes`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `additions`
--

CREATE TABLE `additions` (
  `addition_id` int(11) NOT NULL,
  `addition_name` varchar(255) NOT NULL,
  `addition_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `additions`
--

INSERT INTO `additions` (`addition_id`, `addition_name`, `addition_price`) VALUES
(1, 'fiets', 5),
(2, 'kinderfietsje', 2.5),
(3, 'tweepersoons beddengoed', 1),
(4, 'eenpersoons beddengoed', 0.5),
(5, 'handdoeken', 0.2),
(6, 'theedoeken', 0.1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `huisjes`
--

CREATE TABLE `cottages` (
  `cottage_id` varchar(2) DEFAULT NULL,
  `cottage_name` varchar(50) DEFAULT NULL,
  `cottage_excerpt` varchar(255) DEFAULT NULL,
  `cottage_descr` longtext DEFAULT NULL,
  `cottage_img` varchar(255) DEFAULT NULL,
  `cottage_img2` varchar(255) NOT NULL,
  `cottage_img3` varchar(255) NOT NULL,
  `cottage_img4` varchar(255) NOT NULL,
  `cottage_price_a` double DEFAULT NULL,
  `cottage_price_c` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `cottages`
--

INSERT INTO `cottages` (`cottage_id`, `cottage_name`, `cottage_excerpt`, `cottage_descr`, `cottage_img`, `cottage_img2`, `cottage_img3`, `cottage_img4`, `cottage_price_a`, `cottage_price_c`) VALUES
('1', 'IJmuiden cottage', 'Genieten van de duinen, het strand en de zee.', 'Een vakantie hier geeft je alle mogelijkheden, activiteiten gedurende de dag zoals surfen of wandelen in de duinen. In de avond lekker bijkomen van een actieve dag bij de open haard of in de hot tub.', 'ijmuiden.jpg', 'ijmuiden-strand.jpg', 'ijmuiden-hottub.jpg', 'ijmuiden-haard.jpg', 60, 20),
('2', 'Assen bungalow', 'Midden in de bossen van Drente staat dit prachtige huis', 'Na een flinke boswandeling of een bezoek aan de hunebedden kun je na een frisse duik gezellig dineren bij het zwembad. Of je neemt een verfrissende douche in de buitenlucht. Ook een bezoek aan de stad is mogelijk. Een vakantie om nooit te vergeten!', 'assen.jpg', 'assen-bos.jpg', 'assen-douche.jpg', 'assen-zwembad.jpg', 60, 15),
('3', 'Espelo entree', 'Vlakbij het Nationaal Park De Sallandse Heuvelrug ligt deze prachtige villa.', 'Genieten van een wandeling door het Nationaal Park De Sallandse Heuvelrug of je springt op de mountainbike voor een mooie rit door het bos. Je kunt de ochtend beginnen met een frisse duik in je eigen privé zwembad om daarna van een heerlijk ontbijt te genieten. Hier ga je je helemaal thuis voelen als je van luxe en natuur houdt!', 'espelo.jpg', 'espelo-bos.jpg', 'espelo-heuvels.jpg', 'espelo-interieur.jpg', 70, 15),
('4', 'Weustenrade woning', 'Natuurhuisje op bungalowpark', 'In dit kleine bungalowpark staat dit prachtige natuurhuisje. In 20 minuten wandel je naar het strand of je maakt een rit op de fiets door de bossen bij de duinen. In vijf minuten loop je naar het dorp waar je kan genieten van goede restaurants en gezellig cafés.', 'weustenrade.jpg', 'weustenrade-strand.jpg', 'weustenrade-mountainbike.jpg', 'weustenrade-omgeving.jpg', 55, 12.5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cottages_facilities`
--

CREATE TABLE `cottages_facilities` (
  `property_id` int(11) NOT NULL,
  `cottage_id` int(11) DEFAULT NULL,
  `facility_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `cottages_facilities`
--

INSERT INTO `cottages_facilities` (`property_id`, `cottage_id`, `facility_id`) VALUES
(1, 1, 4),
(2, 2, 2),
(3, 3, 3),
(4, 4, 3),
(5, 1, 3),
(6, 2, 1),
(7, 1, 5),
(8, 3, 1),
(9, 3, 6),
(10, 1, 7),
(11, 4, 7);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `facilities`
--

CREATE TABLE `facilities` (
  `facility_id` int(11) NOT NULL,
  `facility_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `facilities`
--

INSERT INTO `facilities` (`facility_id`, `facility_name`) VALUES
(1, 'zwembad'),
(2, 'buiten douche'),
(3, 'wifi'),
(4, 'ronde hottub'),
(5, 'open haard'),
(6, 'terras'),
(7, 'strand');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `additions`
--
ALTER TABLE `additions`
  ADD PRIMARY KEY (`addition_id`);

--
-- Indexen voor tabel `cottages`
--
ALTER TABLE `cottages`
  ADD UNIQUE KEY `id` (`cottage_id`);

--
-- Indexen voor tabel `cottages_facilities`
--
ALTER TABLE `cottages_facilities`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexen voor tabel `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facility_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `additions`
--
ALTER TABLE `additions`
  MODIFY `addition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `cottages_facilities`
--
ALTER TABLE `cottages_facilities`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
