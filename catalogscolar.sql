-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 27, 2024 at 04:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalogscolar`
--
CREATE DATABASE IF NOT EXISTS `catalogscolar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `catalogscolar`;

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id_admin` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `telefon` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_absente`
--

CREATE TABLE `catalog_absente` (
  `id_elev` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `data` date NOT NULL,
  `data_motivate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_note`
--

CREATE TABLE `catalog_note` (
  `id_elev` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `data` date NOT NULL,
  `nota` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clase`
--

CREATE TABLE `clase` (
  `id_clase` int(11) NOT NULL,
  `an_studiu` varchar(50) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `profil` varchar(50) NOT NULL,
  `specializare` varchar(50) NOT NULL,
  `intensiv` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diriginti`
--

CREATE TABLE `diriginti` (
  `id_profesor` int(11) NOT NULL,
  `id_clasa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discipline`
--

CREATE TABLE `discipline` (
  `id_discipline` int(11) NOT NULL,
  `denumire` varchar(50) NOT NULL,
  `denumire_scurta` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elevi`
--

CREATE TABLE `elevi` (
  `id_elev` int(11) NOT NULL,
  `nr_matricol` varchar(50) DEFAULT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `CNP` varchar(13) DEFAULT NULL,
  `data_nasterii` date DEFAULT NULL,
  `judet` varchar(50) DEFAULT NULL,
  `localitate` varchar(50) DEFAULT NULL,
  `adresa` varchar(255) DEFAULT NULL,
  `telefon` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_clasa` int(11) DEFAULT NULL,
  `id_parinte` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incadrari`
--

CREATE TABLE `incadrari` (
  `id_profesor` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `id_clasa` int(11) NOT NULL,
  `nr_ore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mesaje`
--

CREATE TABLE `mesaje` (
  `id_mesaj` int(11) NOT NULL,
  `from_id_user` int(11) NOT NULL,
  `to_id_user` int(11) NOT NULL,
  `subiect` varchar(50) NOT NULL,
  `mesaj` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parinti`
--

CREATE TABLE `parinti` (
  `id_parinte` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `CNP` varchar(13) NOT NULL,
  `telefon` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `calitate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profesori`
--

CREATE TABLE `profesori` (
  `id_profesor` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `telefon` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `secretari`
--

CREATE TABLE `secretari` (
  `id_secretar` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `telefon` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setari`
--

CREATE TABLE `setari` (
  `id` int(11) NOT NULL,
  `nume_scoala` varchar(100) NOT NULL,
  `localitate` varchar(50) NOT NULL,
  `descriere` varchar(100) NOT NULL,
  `telefon` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nota_subsol` varchar(100) NOT NULL,
  `an_scolar` varchar(9) NOT NULL,
  `semestrul` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

CREATE TABLE `utilizatori` (
  `id_utilizator` int(11) NOT NULL,
  `nume_utilizator` varchar(50) NOT NULL,
  `parola` varchar(50) NOT NULL,
  `rol_utilizator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `catalog_absente`
--
ALTER TABLE `catalog_absente`
  ADD UNIQUE KEY `id_disciplina` (`id_disciplina`),
  ADD UNIQUE KEY `data` (`data`),
  ADD UNIQUE KEY `id_elev` (`id_elev`);

--
-- Indexes for table `catalog_note`
--
ALTER TABLE `catalog_note`
  ADD UNIQUE KEY `id_disciplina` (`id_disciplina`),
  ADD UNIQUE KEY `data` (`data`),
  ADD UNIQUE KEY `id_elev` (`id_elev`);

--
-- Indexes for table `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id_clase`);

--
-- Indexes for table `diriginti`
--
ALTER TABLE `diriginti`
  ADD UNIQUE KEY `id_profesor` (`id_profesor`),
  ADD UNIQUE KEY `id_clasa` (`id_clasa`);

--
-- Indexes for table `discipline`
--
ALTER TABLE `discipline`
  ADD PRIMARY KEY (`id_discipline`);

--
-- Indexes for table `elevi`
--
ALTER TABLE `elevi`
  ADD PRIMARY KEY (`id_elev`),
  ADD KEY `id_clasa` (`id_clasa`),
  ADD KEY `id_parinte` (`id_parinte`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `incadrari`
--
ALTER TABLE `incadrari`
  ADD UNIQUE KEY `id_profesor` (`id_profesor`),
  ADD UNIQUE KEY `id_disciplina` (`id_disciplina`),
  ADD UNIQUE KEY `id_clasa` (`id_clasa`);

--
-- Indexes for table `mesaje`
--
ALTER TABLE `mesaje`
  ADD PRIMARY KEY (`id_mesaj`),
  ADD KEY `from_id_user` (`from_id_user`),
  ADD KEY `to_id_user` (`to_id_user`);

--
-- Indexes for table `parinti`
--
ALTER TABLE `parinti`
  ADD PRIMARY KEY (`id_parinte`);

--
-- Indexes for table `profesori`
--
ALTER TABLE `profesori`
  ADD PRIMARY KEY (`id_profesor`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `secretari`
--
ALTER TABLE `secretari`
  ADD PRIMARY KEY (`id_secretar`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `setari`
--
ALTER TABLE `setari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`id_utilizator`),
  ADD UNIQUE KEY `nume_user` (`nume_utilizator`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clase`
--
ALTER TABLE `clase`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discipline`
--
ALTER TABLE `discipline`
  MODIFY `id_discipline` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elevi`
--
ALTER TABLE `elevi`
  MODIFY `id_elev` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mesaje`
--
ALTER TABLE `mesaje`
  MODIFY `id_mesaj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parinti`
--
ALTER TABLE `parinti`
  MODIFY `id_parinte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profesori`
--
ALTER TABLE `profesori`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `secretari`
--
ALTER TABLE `secretari`
  MODIFY `id_secretar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `id_utilizator` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilizatori` (`id_utilizator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catalog_absente`
--
ALTER TABLE `catalog_absente`
  ADD CONSTRAINT `catalog_absente_ibfk_1` FOREIGN KEY (`id_disciplina`) REFERENCES `discipline` (`id_discipline`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `catalog_absente_ibfk_2` FOREIGN KEY (`id_elev`) REFERENCES `elevi` (`id_elev`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `catalog_note`
--
ALTER TABLE `catalog_note`
  ADD CONSTRAINT `catalog_note_ibfk_1` FOREIGN KEY (`id_disciplina`) REFERENCES `discipline` (`id_discipline`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `catalog_note_ibfk_2` FOREIGN KEY (`id_elev`) REFERENCES `elevi` (`id_elev`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `diriginti`
--
ALTER TABLE `diriginti`
  ADD CONSTRAINT `diriginti_ibfk_1` FOREIGN KEY (`id_clasa`) REFERENCES `clase` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diriginti_ibfk_2` FOREIGN KEY (`id_profesor`) REFERENCES `profesori` (`id_profesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `elevi`
--
ALTER TABLE `elevi`
  ADD CONSTRAINT `elevi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilizatori` (`id_utilizator`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `elevi_ibfk_2` FOREIGN KEY (`id_clasa`) REFERENCES `clase` (`id_clase`) ON UPDATE CASCADE,
  ADD CONSTRAINT `elevi_ibfk_3` FOREIGN KEY (`id_parinte`) REFERENCES `parinti` (`id_parinte`) ON UPDATE CASCADE;

--
-- Constraints for table `incadrari`
--
ALTER TABLE `incadrari`
  ADD CONSTRAINT `incadrari_ibfk_1` FOREIGN KEY (`id_clasa`) REFERENCES `clase` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incadrari_ibfk_2` FOREIGN KEY (`id_profesor`) REFERENCES `profesori` (`id_profesor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `incadrari_ibfk_3` FOREIGN KEY (`id_disciplina`) REFERENCES `discipline` (`id_discipline`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profesori`
--
ALTER TABLE `profesori`
  ADD CONSTRAINT `profesori_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilizatori` (`id_utilizator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `secretari`
--
ALTER TABLE `secretari`
  ADD CONSTRAINT `secretari_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilizatori` (`id_utilizator`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
