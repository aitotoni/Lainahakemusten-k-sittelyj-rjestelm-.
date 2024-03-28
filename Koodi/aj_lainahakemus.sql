-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28.03.2024 klo 09:40
-- Palvelimen versio: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aj_lainahakemus`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `käyttäjät`
--

CREATE TABLE `käyttäjät` (
  `käyttäjäID` int(11) NOT NULL,
  `etunimi` varchar(50) DEFAULT NULL,
  `sukunimi` varchar(50) DEFAULT NULL,
  `salasana` varchar(50) DEFAULT NULL,
  `käyttäjätunnus` int(11) DEFAULT NULL,
  `vuosipalkka` int(11) DEFAULT NULL,
  `tyyppi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `käyttäjät`
--

INSERT INTO `käyttäjät` (`käyttäjäID`, `etunimi`, `sukunimi`, `salasana`, `käyttäjätunnus`, `vuosipalkka`, `tyyppi`) VALUES
(1, 'Markus', 'Jalava', 'Markus123', 1, 15001, 0),
(2, 'Jussi', 'Kivistö', 'Jussi123', 2, 85000, 1),
(8, 'Karl', 'Quinto', 'Salasana123', 5, 15000, 0),
(11, 'Ylläpitäjä', '', 'Ylläpitäjä', 0, 50000, 2),
(12, 'William', 'Ketola', 'Ketola123', 6, 20000, 0),
(13, 'Etunimi', 'Sukunimi', 'Salasana', 15, 100000, 0),
(14, 'Vitalii', 'Sokha', 'Vitalii123', 16, 200, 0),
(15, 'Tuomas', 'Kivinen', '123', 20, 10000, 0),
(16, 'Tuomas', 'Kivinen', '123', 25, 10000, 0),
(17, 'Oliver', 'Pylväläinen', '123', 21, 5500, 0),
(18, 'Max', 'Järvinen', 'Max123', 30, 50000, 0);

-- --------------------------------------------------------

--
-- Rakenne taululle `lainat`
--

CREATE TABLE `lainat` (
  `summa` int(11) DEFAULT NULL,
  `pvm` date DEFAULT NULL,
  `käyttäjäID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `lainat`
--

INSERT INTO `lainat` (`summa`, `pvm`, `käyttäjäID`) VALUES
(2, '2024-03-06', 13),
(500, '2024-03-06', 1),
(1000, '2024-03-06', 1),
(1500, '2024-03-07', 1),
(1500, '2024-03-07', 1),
(2, '2024-03-07', 1),
(250, '2024-03-07', 1),
(2, '2024-03-07', 1),
(1, '2024-03-11', 1),
(1, '2024-03-11', 1),
(2, '2024-03-12', 1),
(2, '2024-03-12', 1),
(2, '2024-03-12', 1),
(1, '2024-03-12', 1),
(1, '2024-03-12', 1),
(1, '2024-03-12', 1),
(2, '2024-03-12', 1),
(2, '2024-03-12', 1),
(1, '2024-03-12', 1),
(1, '2024-03-12', 1),
(11, '2024-03-12', 8),
(1, '2024-03-18', 1),
(1, '2024-03-18', 1),
(1, '2024-03-18', 1),
(1, '2024-03-18', 1),
(22, '2024-03-18', 1),
(250, '2024-03-18', 8),
(7, '2024-03-18', 8),
(7, '2024-03-18', 8),
(22, '2024-03-18', 8),
(500, '2024-03-19', 17),
(500, '2024-03-19', 17),
(500, '2024-03-19', 17),
(500, '2024-03-19', 17),
(500, '2024-03-19', 17),
(500, '2024-03-19', 17),
(500, '2024-03-19', 17),
(22, '2024-03-19', 17),
(88, '2024-03-19', 17),
(390, '2024-03-19', 17),
(6, '2024-03-19', 17),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5, '2024-03-19', 1),
(5000, '2024-03-20', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `käyttäjät`
--
ALTER TABLE `käyttäjät`
  ADD PRIMARY KEY (`käyttäjäID`);

--
-- Indexes for table `lainat`
--
ALTER TABLE `lainat`
  ADD KEY `käyttäjäID` (`käyttäjäID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `käyttäjät`
--
ALTER TABLE `käyttäjät`
  MODIFY `käyttäjäID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `lainat`
--
ALTER TABLE `lainat`
  ADD CONSTRAINT `lainat_ibfk_1` FOREIGN KEY (`käyttäjäID`) REFERENCES `käyttäjät` (`käyttäjäID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
