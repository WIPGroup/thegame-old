-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vytvořeno: Pon 04. kvě 2015, 07:52
-- Verze serveru: 5.5.42-cll
-- Verze PHP: 5.4.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `rctorg_antre`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `hraci`
--

CREATE TABLE IF NOT EXISTS `hraci` (
  `idhrace` int(11) NOT NULL,
  `jmeno` varchar(50) NOT NULL,
  `heslo` varchar(100) NOT NULL,
  `vlastnictvi` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `hraci`
--

INSERT INTO `hraci` (`idhrace`, `jmeno`, `heslo`, `vlastnictvi`) VALUES
(1, 'root', 'root', '209;141;189;137'),
(2, 'test1', 'test1', '343;402;371;11'),
(3, 'test2', 'test2', '646;341;236;2');

-- --------------------------------------------------------

--
-- Struktura tabulky `obchod`
--

CREATE TABLE IF NOT EXISTS `obchod` (
  `idnab` int(11) NOT NULL,
  `hrac` int(11) NOT NULL,
  `nabizi` int(11) NOT NULL,
  `mnoznabizi` int(11) NOT NULL,
  `chce` int(11) NOT NULL,
  `mnozchce` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `obchod`
--

INSERT INTO `obchod` (`idnab`, `hrac`, `nabizi`, `mnoznabizi`, `chce`, `mnozchce`) VALUES
(14, 2, 1, 1000, 2, 1000),
(24, 3, 0, 23, 2, 500),
(121, 3, 1, 1, 0, 1),
(128, 1, 0, 250, 100, 1),
(129, 1, 0, 13, 101, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `veci`
--

CREATE TABLE IF NOT EXISTS `veci` (
  `idveci` int(11) NOT NULL,
  `nazev` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `veci`
--

INSERT INTO `veci` (`idveci`, `nazev`) VALUES
(0, 'Money'),
(1, 'Gold'),
(2, 'Iron'),
(3, 'Silicon'),
(100, 'CPU-AMD'),
(101, 'CPU-Intel'),
(102, 'GPU'),
(103, 'HDD'),
(104, 'MemoryChip'),
(105, 'PSU'),
(106, 'RAM'),
(107, 'SSD');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `hraci`
--
ALTER TABLE `hraci`
  ADD PRIMARY KEY (`idhrace`),
  ADD UNIQUE KEY `id` (`idhrace`),
  ADD KEY `id_2` (`idhrace`);

--
-- Klíče pro tabulku `obchod`
--
ALTER TABLE `obchod`
  ADD PRIMARY KEY (`idnab`),
  ADD KEY `id` (`idnab`);

--
-- Klíče pro tabulku `veci`
--
ALTER TABLE `veci`
  ADD PRIMARY KEY (`idveci`),
  ADD UNIQUE KEY `id` (`idveci`),
  ADD KEY `id_2` (`idveci`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `hraci`
--
ALTER TABLE `hraci`
  MODIFY `idhrace` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pro tabulku `obchod`
--
ALTER TABLE `obchod`
  MODIFY `idnab` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT pro tabulku `veci`
--
ALTER TABLE `veci`
  MODIFY `idveci` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
