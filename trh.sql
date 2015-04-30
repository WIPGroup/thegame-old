-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vytvořeno: Čtv 30. dub 2015, 19:08
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
`idhrace` int(11) NOT NULL,
  `jmeno` varchar(50) NOT NULL,
  `heslo` varchar(100) NOT NULL,
  `vlastnictvi` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `hraci`
--

INSERT INTO `hraci` (`idhrace`, `jmeno`, `heslo`, `vlastnictvi`) VALUES
(1, 'root', 'root', '84;15;8'),
(2, 'test1', 'test1', '100;0;0'),
(3, 'test2', 'test2', '94;0;0');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Vypisuji data pro tabulku `obchod`
--

INSERT INTO `obchod` (`idnab`, `hrac`, `nabizi`, `mnoznabizi`, `chce`, `mnozchce`) VALUES
(11, 3, 1, 1, 2, 1),
(13, 2, 2, 5, 1, 10),
(14, 2, 1, 1000, 2, 1000),
(16, 1, 1, 2, 2, 10);

-- --------------------------------------------------------

--
-- Struktura tabulky `veci`
--

CREATE TABLE IF NOT EXISTS `veci` (
`idveci` int(11) NOT NULL,
  `nazev` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `veci`
--

INSERT INTO `veci` (`idveci`, `nazev`) VALUES
(1, 'Dřevo'),
(2, 'Písek');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `hraci`
--
ALTER TABLE `hraci`
 ADD PRIMARY KEY (`idhrace`), ADD UNIQUE KEY `id` (`idhrace`), ADD KEY `id_2` (`idhrace`);

--
-- Klíče pro tabulku `obchod`
--
ALTER TABLE `obchod`
 ADD PRIMARY KEY (`idnab`), ADD KEY `id` (`idnab`);

--
-- Klíče pro tabulku `veci`
--
ALTER TABLE `veci`
 ADD PRIMARY KEY (`idveci`), ADD UNIQUE KEY `id` (`idveci`), ADD KEY `id_2` (`idveci`);

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
MODIFY `idnab` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pro tabulku `veci`
--
ALTER TABLE `veci`
MODIFY `idveci` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
