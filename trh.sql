-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vytvořeno: Čtv 23. dub 2015, 08:28
-- Verze serveru: 5.5.43-0ubuntu0.14.10.1
-- Verze PHP: 5.5.12-2ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `trh`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `hraci`
--

CREATE TABLE IF NOT EXISTS `hraci` (
`id` int(11) NOT NULL,
  `jmeno` varchar(50) NOT NULL,
  `heslo` varchar(100) NOT NULL,
  `vlastnictvi` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `hraci`
--

INSERT INTO `hraci` (`id`, `jmeno`, `heslo`, `vlastnictvi`) VALUES
(1, 'root', 'root', '100;12;8'),
(2, 'test1', 'test1', '100;0;0'),
(3, 'test2', 'test2', '100;0;0');

-- --------------------------------------------------------

--
-- Struktura tabulky `obchod`
--

CREATE TABLE IF NOT EXISTS `obchod` (
`id` int(11) NOT NULL,
  `hrac` int(11) NOT NULL,
  `predmet` int(11) NOT NULL,
  `mnozstvi` int(11) NOT NULL,
  `penize` int(11) NOT NULL,
  `smer` varchar(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `obchod`
--

INSERT INTO `obchod` (`id`, `hrac`, `predmet`, `mnozstvi`, `penize`, `smer`) VALUES
(1, 1, 1, 4, 10, 'p'),
(2, 1, 1, 2, 6, 'k');

-- --------------------------------------------------------

--
-- Struktura tabulky `polozky`
--

CREATE TABLE IF NOT EXISTS `polozky` (
`id` int(11) NOT NULL,
  `nazev` varchar(50) NOT NULL,
  `cena` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `polozky`
--

INSERT INTO `polozky` (`id`, `nazev`, `cena`) VALUES
(1, 'Dřevo', '10'),
(2, 'Písek', '5');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `hraci`
--
ALTER TABLE `hraci`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `id_2` (`id`);

--
-- Klíče pro tabulku `obchod`
--
ALTER TABLE `obchod`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Klíče pro tabulku `polozky`
--
ALTER TABLE `polozky`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `hraci`
--
ALTER TABLE `hraci`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pro tabulku `obchod`
--
ALTER TABLE `obchod`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pro tabulku `polozky`
--
ALTER TABLE `polozky`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
