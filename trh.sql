-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vytvořeno: Pát 03. čec 2015, 17:06
-- Verze serveru: 5.6.24-0ubuntu2
-- Verze PHP: 5.6.4-4ubuntu6

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
  `vlastnictvi` varchar(500) NOT NULL,
  `body` int(11) NOT NULL,
  `vyzkum` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `hraci`
--

INSERT INTO `hraci` (`idhrace`, `jmeno`, `heslo`, `vlastnictvi`, `body`, `vyzkum`) VALUES
(1, 'root', 'root', '10000;1000;1000;1000;1000;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 11952534, 10886234),
(2, 'test1', 'test1', '10000;1000;1000;1000;1000;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 0, 0),
(3, 'test2', 'test2', '10000;1000;1000;1000;1000;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `kupony`
--

CREATE TABLE IF NOT EXISTS `kupony` (
  `kod` varchar(16) NOT NULL,
  `obsah` varchar(500) NOT NULL,
  `cas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `kupony`
--

INSERT INTO `kupony` (`kod`, `obsah`, `cas`) VALUES
('20xh0zcn', '0;6;65;42;0;0;0;0;0;0;0;0;0', 1435758108),
('2zzgoys7', '0;0;42;86;0;0;0;8;0;0;0;0;86', 1435758108),
('7lo1tyvs', '0;10;10;10;0;0;0;0;0;0;0;0', 1435758108),
('8fhht62l', '0;3;5;6;1;1;1;1;1;1;1;1;1', 1435758108),
('a0gdltly', '0;0;0;0;0;0;0;3;0;12;16;0;0', 1435758108),
('bt9s3lwt', '0;654;0;0;0;0;0;0;0;0;0;0;0', 1435758108),
('c2boqll4', '0000001;0;0;0;0;0;0;0;0;0;0;0;0', 1435758108),
('dnsmbfg1', '40;0;0;0;0;0;0;0;0;0;0;0', 1435758108),
('f5g4df6a', '10;0;0;0;0;0;0;0;0;0;0;0', 1435758108),
('f5g4df6b', '10;0;0;0;0;0;0;0;0;0;0;0', 1435758108),
('f5g4df6g', '10;0;0;0;0;0;0;0;0;0;0;0', 1435758108),
('h4kk8ow1', '0;0;0;0;0;0;0;5;0;0;0;0;0', 1435758108),
('ihouxigq', '0;098;079;0;68;0;0;0;024;8;0;0;0', 1435758108),
('lb5r8j9y', '0;12;6;18;0;0;0;0;0;0;0;0;0', 1435758108),
('lwcalhoc', '0;123;25;68;0;0;0;0;0;0;0;0;0', 1435758108),
('nqsrjqs1', '0000001;0;0;0;0;0;0;0;0;0;0;0;0', 1435758108),
('o50ccqe1', '0;0;0;0952;0;0;0;0;0;0;0;0;0', 1435758108),
('ov8le6n1', '0;0;5;0;0;0;0;0;0;0;0;0;0', 1435758108),
('qk43b6xm', '015;0;0;0;0;0;0;0;0;0;0;0;0', 1435758108),
('qxrq4mj4', '0;0;123;0;0;0;0;0;0;0;0;0;0', 1435758108),
('tcahxvws', '0;10;10;10;0;0;0;0;0;0;0;0', 1435758108),
('td09q8iu', '1;0;0;0;0;0;0;0;0;0;0;0;0', 1435758108),
('ttjpsynm', '015;0;0;0;0;0;0;0;0;0;0;0;0', 1435758108),
('v40ol2yt', '40;0;0;0;0;0;0;0;0;0;0;0', 1435758108),
('vkbyeeep', '1;0;0;0;0;0;0;0;0;0;0;0;0', 1435758108),
('ysot4udy', '0;05;0;0;0;0;01;05;0;0;0;0;0123', 0),
('z0fq53ib', '0;0;0;0;0;23;2;0;19;0;0;51;0', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `cas` int(11) NOT NULL,
  `hrac` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `log`
--

INSERT INTO `log` (`cas`, `hrac`, `text`) VALUES
(1430843624, 1, 'Koupě 1(15) za 2(10) od 3'),
(1430844340, 1, 'Koupě 1(15) za 2(10) od test2'),
(1430844580, 1, 'Koupě (15) za (10) od test2'),
(1430844681, 1, 'Koupě Gold(15) za Iron(10) od test2'),
(1430844767, 1, 'Uskutečněn nákup Gold(15) za Iron(10) od test2'),
(1430845185, 1, 'Vytvořena nabídka Iron(5) za Gold(5'),
(1430845254, 1, 'Vytvořena nabídka Iron(5) za Gold(5)'),
(1430846450, 1, 'Zrušena nabídka Iron(5) za Gold(5)'),
(1430846840, 1, 'Spuštěna výroba RAM'),
(1430846891, 1, 'Spuštěna výroba RAM'),
(1430846892, 1, 'Spuštěna výroba RAM'),
(1430847096, 1, 'Spuštěna výroba RAM'),
(1430847107, 1, 'Dokončena výroba RAM'),
(1430847368, 1, 'Spuštěna výroba RAM'),
(1430847369, 1, 'Spuštěna výroba RAM'),
(1430847370, 1, 'Spuštěna výroba RAM'),
(1430847370, 1, 'Spuštěna výroba RAM'),
(1430847370, 1, 'Spuštěna výroba RAM'),
(1430847371, 1, 'Spuštěna výroba RAM'),
(1430847371, 1, 'Spuštěna výroba RAM'),
(1430847372, 1, 'Spuštěna výroba RAM'),
(1430847375, 1, 'Spuštěna výroba RAM'),
(1430847378, 1, 'Spuštěna výroba RAM'),
(1430847378, 1, 'Dokončena výroba RAM'),
(1430847379, 1, 'Dokončena výroba RAM'),
(1430847380, 1, 'Dokončena výroba RAM'),
(1430847380, 1, 'Dokončena výroba RAM'),
(1430847380, 1, 'Dokončena výroba RAM'),
(1430847380, 1, 'Spuštěna výroba RAM'),
(1430847381, 1, 'Dokončena výroba RAM'),
(1430847381, 1, 'Dokončena výroba RAM'),
(1430847381, 1, 'Spuštěna výroba RAM'),
(1430847381, 1, 'Spuštěna výroba RAM'),
(1430847397, 1, 'Dokončena výroba RAM'),
(1430847397, 1, 'Dokončena výroba RAM'),
(1430847397, 1, 'Dokončena výroba RAM'),
(1430847397, 1, 'Dokončena výroba RAM'),
(1430847397, 1, 'Dokončena výroba RAM'),
(1430847397, 1, 'Dokončena výroba RAM'),
(1430857764, 1, 'Spuštěna výroba RAM'),
(1430857797, 1, 'Dokončena výroba RAM'),
(1430935254, 1, 'Vytvořena nabídka Money(1) za Money(1)'),
(1430935621, 1, 'Vytvořena nabídka Money(1) za Money(1)'),
(1430935731, 1, 'Uskutečněn nákup Gold(15) za Iron(10) od test2'),
(1430940404, 1, 'Použit kupón f5g8af6h (0(10) '),
(1430941014, 1, 'Použit kupón f5g8df6h ('),
(1430941092, 1, 'Použit kupón f5g4df6h (Money() )'),
(1430941135, 1, 'Použit kupón f5g4df6c (Money(10) )'),
(1431003646, 1, 'Uskutečněn nákup Gold(15) za Iron(10) od test2'),
(1431003685, 1, 'Použit kupón 6oomv3ty (Iron(100) )'),
(1431107324, 1, 'Uskutečněn nákup Gold(15) za Iron(10) od test2'),
(1431202222, 1, 'Spuštěna výroba RAM'),
(1431202232, 1, 'Dokončena výroba RAM'),
(1431202242, 1, 'Spuštěna výroba RAM'),
(1431202252, 1, 'Dokončena výroba RAM'),
(1431202313, 1, 'Spuštěna výroba RAM'),
(1431202323, 1, 'Dokončena výroba RAM'),
(1431202423, 1, 'Spuštěna výroba RAM'),
(1431202433, 1, 'Dokončena výroba RAM'),
(1431202500, 1, 'Spuštěna výroba PSU'),
(1431202599, 1, 'Dokončena výroba PSU'),
(1431202777, 1, 'Spuštěna výroba PSU'),
(1431202881, 1, 'Dokončena výroba PSU'),
(1431204503, 1, 'Spuštěna výroba PSU'),
(1431204607, 1, 'Dokončena výroba PSU'),
(1431245356, 1, 'Spuštěna výroba PSU'),
(1431245419, 1, 'Spuštěna výroba RAM'),
(1431245430, 1, 'Dokončena výroba RAM'),
(1431245438, 1, 'Spuštěna výroba PSU'),
(1431245460, 1, 'Dokončena výroba PSU'),
(1431245542, 1, 'Dokončena výroba PSU'),
(1431245596, 1, 'Spuštěna výroba RAM'),
(1431245607, 1, 'Dokončena výroba RAM'),
(1431248734, 1, 'Spuštěna výroba PSU'),
(1431248838, 1, 'Dokončena výroba PSU'),
(1431277620, 1, 'Spuštěna výroba PSU'),
(1431277725, 1, 'Dokončena výroba PSU'),
(1431277894, 1, 'Spuštěna výroba SSD'),
(1431280449, 1, 'Vytvořena nabídka Money(1) za Money(1)'),
(1431280465, 1, 'Vytvořena nabídka Money(1) za Gold(1)'),
(1431280467, 1, 'Vytvořena nabídka Money(1) za Gold(1)'),
(1431280682, 1, 'Zrušena nabídka Money(1) za Money(1)'),
(1431280727, 1, 'Zrušena nabídka Money(1) za Gold(1)'),
(1431280744, 1, 'Zrušena nabídka Money(1) za Money(1)'),
(1431280752, 1, 'Zrušena nabídka Money(1) za Gold(1)'),
(1431282484, 1, 'Spuštěna výroba RAM'),
(1431282484, 1, 'Spuštěna výroba RAM'),
(1431282484, 1, 'Spuštěna výroba RAM'),
(1431282485, 1, 'Spuštěna výroba RAM'),
(1431282487, 1, 'Spuštěna výroba RAM'),
(1431282494, 1, 'Dokončena výroba RAM'),
(1431282494, 1, 'Dokončena výroba RAM'),
(1431282494, 1, 'Dokončena výroba RAM'),
(1431282495, 1, 'Dokončena výroba RAM'),
(1431282497, 1, 'Dokončena výroba RAM'),
(1431282544, 1, 'Spuštěna výroba RAM'),
(1431282554, 1, 'Dokončena výroba RAM'),
(1431282559, 1, 'Spuštěna výroba PSU'),
(1431282663, 1, 'Dokončena výroba PSU'),
(1431282757, 1, 'Spuštěna výroba RAM'),
(1431282768, 1, 'Dokončena výroba RAM'),
(1431352305, 1, 'Spuštěna výroba x RAM'),
(1431352348, 1, 'Spuštěna výroba 3x RAM'),
(1431352359, 1, 'Dokončena výroba 3x RAM'),
(1431370427, 1, 'Dokončena výroba 1x SSD'),
(1431370437, 1, 'Spuštěna výroba 1x SSD'),
(1431370447, 1, 'Spuštěna výroba 1x PSU'),
(1431370691, 1, 'Dokončena výroba 1x PSU'),
(1431370697, 1, 'Spuštěna výroba 2x RAM'),
(1431370708, 1, 'Dokončena výroba 2x RAM'),
(1431370712, 1, 'Spuštěna výroba 1x PSU'),
(1431370817, 1, 'Dokončena výroba 1x PSU'),
(1431370841, 1, 'Spuštěna výroba 1x RAM'),
(1431370852, 1, 'Dokončena výroba 1x RAM'),
(1431370854, 1, 'Spuštěna výroba 1x PSU'),
(1431370959, 1, 'Dokončena výroba 1x PSU'),
(1431882687, 1, 'Dokončena výroba 1x RAM'),
(1431882687, 1, 'Dokončena výroba 1x SSD'),
(1432491336, 1, 'Vytvořena nabídka Money(1) za GPU(1)'),
(1432491365, 1, 'Zrušena nabídka Money(1) za GPU(1)'),
(1432578094, 1, 'Vytvořena nabídka GPU(1) za Money(1)'),
(1432578157, 1, 'Zrušena nabídka GPU(1) za Money(1)'),
(1432579924, 1, 'Vytvořena nabídka CPU-Intel(1) za Money(1)'),
(1433149045, 1, 'Vytvořena nabídka GPU(1) za Money(1)'),
(1433149076, 1, 'Zrušena nabídka GPU(1) za Money(1)'),
(1433149107, 1, 'Vytvořena nabídka Gold(1) za Money(1)'),
(1433149112, 1, 'Zrušena nabídka Gold(1) za Money(1)'),
(1433149222, 1, 'Složena sestava 0;0;0;0;0;1;1;2;0;1;2;0;1 o výkonu 6'),
(1433149376, 1, 'Složena sestava 0;0;0;0;0;1;1;2;0;1;2;0;1 o výkonu 6'),
(1433149859, 1, 'Složena sestava 0;0;0;0;0;1;1;2;0;1;2;0;1 o výkonu 6'),
(1433150333, 1, 'Složena sestava 0;0;0;0;0;1;1;2;0;1;2;0;1 o výkonu 6'),
(1433150399, 1, 'Složena sestava 0;0;0;0;0;1;1;2;0;1;2;0;1 o výkonu 6'),
(1433681199, 1, 'Spuštěna výroba 1x PSU'),
(1433752121, 1, 'Dokončena výroba 1x PSU'),
(1433752422, 1, 'Složena sestava 0;0;0;0;0;1;1;2;0;1;2;0;1 o výkonu 6'),
(1433788567, 1, 'Složena sestava 0;0;0;0;0;1;1;2;0;1;2;0;1 o výkonu 6'),
(1433788583, 1, 'Složena sestava 0;0;0;0;0;1;1;2;0;1;2;0;1 o výkonu 6'),
(1435229747, 1, 'Spuštěna výroba 1x RAM'),
(1435229758, 1, 'Dokončena výroba 1x RAM'),
(1435230618, 1, 'Spuštěna výroba 1x RAM'),
(1435230629, 1, 'Dokončena výroba 1x RAM'),
(1435258132, 1, 'Složena sestava 0;0;0;0;0;1;1;2;0;1;2;0;1 o výkonu 6'),
(1435424624, 1, 'Složena sestava 0;0;0;0;0;1;1;2;0;1;2;0;1 o výkonu 10'),
(1435681080, 1, 'Složena sestava 0;0;0;0;0;1;1;2;0;1;2;0;1 o výkonu 10'),
(1435681087, 1, 'Složena sestava 0;0;0;0;0;1;1;2;0;1;2;0;1 o výkonu 10'),
(1435696218, 1, 'Spuštěna výroba 1x RAM'),
(1435696230, 1, 'Dokončena výroba 1x RAM'),
(1435758183, 1, 'Spuštěna výroba 1x SSD'),
(1435907779, 1, 'Dokončena výroba 1x SSD'),
(1435907810, 1, 'Použit kupón x7nljfgt (Silicon(031) CPU-AMD(02) CPU-Intel(056) MemoryChip(02) RAM(034) )'),
(1435907871, 1, 'Použit kupón x7nljfgt (Silicon(031) CPU-AMD(02) CPU-Intel(056) MemoryChip(02) RAM(034) )'),
(1435907971, 1, 'Použit kupón x7nljfgt (Silicon(031) CPU-AMD(02) CPU-Intel(056) MemoryChip(02) RAM(034) )'),
(1435922089, 1, 'Složena sestava 0;0;0;0;0;1;1;2;0;1;2;0;1 o výkonu 10');

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
) ENGINE=InnoDB AUTO_INCREMENT=304 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `obchod`
--

INSERT INTO `obchod` (`idnab`, `hrac`, `nabizi`, `mnoznabizi`, `chce`, `mnozchce`) VALUES
(14, 2, 1, 1000, 2, 1000),
(24, 3, 0, 23, 2, 500),
(128, 1, 0, 250, 4, 1),
(129, 1, 0, 13, 5, 1),
(155, 3, 1, 15, 2, 10),
(156, 3, 1, 15, 2, 10),
(157, 3, 1, 15, 2, 10),
(158, 3, 1, 15, 2, 10),
(159, 3, 1, 15, 2, 10),
(160, 3, 1, 15, 2, 10),
(161, 3, 1, 15, 2, 10),
(162, 3, 1, 15, 2, 10),
(163, 3, 1, 15, 2, 10),
(164, 3, 1, 15, 2, 10),
(165, 3, 1, 15, 2, 10),
(166, 3, 1, 15, 2, 10),
(167, 3, 1, 15, 2, 10),
(168, 3, 1, 15, 2, 10),
(169, 3, 1, 15, 2, 10),
(170, 3, 1, 15, 2, 10),
(171, 3, 1, 15, 2, 10),
(172, 3, 1, 15, 2, 10),
(173, 3, 1, 15, 2, 10),
(174, 3, 1, 15, 2, 10),
(175, 3, 1, 15, 2, 10),
(176, 3, 1, 15, 2, 10),
(177, 3, 1, 15, 2, 10),
(178, 3, 1, 15, 2, 10),
(179, 3, 1, 15, 2, 10),
(180, 3, 1, 15, 2, 10),
(181, 3, 1, 15, 2, 10),
(182, 3, 1, 15, 2, 10),
(183, 3, 1, 15, 2, 10),
(184, 3, 1, 15, 2, 10),
(185, 3, 1, 15, 2, 10),
(186, 3, 1, 15, 2, 10),
(187, 3, 1, 15, 2, 10),
(188, 3, 1, 15, 2, 10),
(189, 3, 1, 15, 2, 10),
(190, 3, 1, 15, 2, 10),
(191, 3, 1, 15, 2, 10),
(192, 3, 1, 15, 2, 10),
(193, 3, 1, 15, 2, 10),
(194, 3, 1, 15, 2, 10),
(195, 3, 1, 15, 2, 10),
(196, 3, 1, 15, 2, 10),
(197, 3, 1, 15, 2, 10),
(198, 3, 1, 15, 2, 10),
(199, 3, 1, 15, 2, 10),
(200, 3, 1, 15, 2, 10),
(201, 3, 1, 15, 2, 10),
(202, 3, 1, 15, 2, 10),
(203, 3, 1, 15, 2, 10),
(204, 3, 1, 15, 2, 10),
(205, 3, 1, 15, 2, 10),
(206, 3, 1, 15, 2, 10),
(207, 3, 1, 15, 2, 10),
(208, 3, 1, 15, 2, 10),
(209, 3, 1, 15, 2, 10),
(210, 3, 1, 15, 2, 10),
(211, 3, 1, 15, 2, 10),
(212, 3, 1, 15, 2, 10),
(213, 3, 1, 15, 2, 10),
(214, 3, 1, 15, 2, 10),
(215, 3, 1, 15, 2, 10),
(216, 3, 1, 15, 2, 10),
(217, 3, 1, 15, 2, 10),
(218, 3, 1, 15, 2, 10),
(219, 3, 1, 15, 2, 10),
(220, 3, 1, 15, 2, 10),
(221, 3, 1, 15, 2, 10),
(222, 3, 1, 15, 2, 10),
(223, 3, 1, 15, 2, 10),
(224, 3, 1, 15, 2, 10),
(225, 3, 1, 15, 2, 10),
(226, 3, 1, 15, 2, 10),
(227, 3, 1, 15, 2, 10),
(228, 3, 1, 15, 2, 10),
(229, 3, 1, 15, 2, 10),
(230, 3, 1, 15, 2, 10),
(231, 3, 1, 15, 2, 10),
(232, 3, 1, 15, 2, 10),
(233, 3, 1, 15, 2, 10),
(234, 3, 1, 15, 2, 10),
(235, 3, 1, 15, 2, 10),
(236, 3, 1, 15, 2, 10),
(237, 3, 1, 15, 2, 10),
(238, 3, 1, 15, 2, 10),
(239, 3, 1, 15, 2, 10),
(240, 3, 1, 15, 2, 10),
(241, 3, 1, 15, 2, 10),
(242, 3, 1, 15, 2, 10),
(243, 3, 1, 15, 2, 10),
(244, 3, 1, 15, 2, 10),
(245, 3, 1, 15, 2, 10),
(246, 3, 1, 15, 2, 10),
(247, 3, 1, 15, 2, 10),
(248, 3, 1, 15, 2, 10),
(249, 3, 1, 15, 2, 10),
(250, 3, 1, 15, 2, 10),
(251, 3, 1, 15, 2, 10),
(252, 3, 1, 15, 2, 10),
(253, 3, 1, 15, 2, 10),
(254, 3, 1, 15, 2, 10),
(255, 3, 1, 15, 2, 10),
(256, 3, 1, 15, 2, 10),
(257, 3, 1, 15, 2, 10),
(258, 3, 1, 15, 2, 10),
(259, 3, 1, 15, 2, 10),
(260, 3, 1, 15, 2, 10),
(261, 3, 1, 15, 2, 10),
(262, 3, 1, 15, 2, 10),
(263, 3, 1, 15, 2, 10),
(264, 3, 1, 15, 2, 10),
(265, 3, 1, 15, 2, 10),
(266, 3, 1, 15, 2, 10),
(267, 3, 1, 15, 2, 10),
(268, 3, 1, 15, 2, 10),
(269, 3, 1, 15, 2, 10),
(270, 3, 1, 15, 2, 10),
(271, 3, 1, 15, 2, 10),
(272, 3, 1, 15, 2, 10),
(273, 3, 1, 15, 2, 10),
(274, 3, 1, 15, 2, 10),
(275, 3, 1, 15, 2, 10),
(276, 3, 1, 15, 2, 10),
(277, 3, 1, 15, 2, 10),
(278, 3, 1, 15, 2, 10),
(279, 3, 1, 15, 2, 10),
(280, 3, 1, 15, 2, 10),
(281, 3, 1, 15, 2, 10),
(282, 3, 1, 15, 2, 10),
(283, 3, 1, 15, 2, 10),
(284, 3, 1, 15, 2, 10),
(285, 3, 1, 15, 2, 10),
(286, 3, 1, 15, 2, 10),
(287, 3, 1, 15, 2, 10),
(288, 3, 1, 15, 2, 10),
(289, 3, 1, 15, 2, 10),
(290, 3, 1, 15, 2, 10),
(291, 3, 1, 15, 2, 10),
(292, 3, 1, 15, 2, 10),
(293, 3, 1, 15, 2, 10),
(294, 3, 1, 15, 2, 10),
(295, 3, 1, 15, 2, 10),
(296, 3, 1, 15, 2, 10),
(297, 3, 1, 15, 2, 10),
(298, 3, 1, 15, 2, 10),
(299, 3, 1, 15, 2, 10),
(300, 3, 1, 15, 2, 10),
(303, 1, 5, 1, 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `recepty`
--

CREATE TABLE IF NOT EXISTS `recepty` (
`idreceptu` int(11) NOT NULL,
  `vyrobek` int(11) NOT NULL,
  `suroviny` varchar(500) NOT NULL,
  `doba` int(11) NOT NULL,
  `vyzkum` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `recepty`
--

INSERT INTO `recepty` (`idreceptu`, `vyrobek`, `suroviny`, `doba`, `vyzkum`) VALUES
(1, 10, '1;1;0;0;0;0;0;0;0;0;0;0', 10, 0),
(2, 9, '0;10;20;5;0;0;0;0;0;0;0;0', 103, 0),
(3, 11, '0;20;10;50;0;0;0;0;0;0;0;0', 86400, 0),
(4, 5, '0;10;10;10;0;0;0;0;0;0;0;0', 1000, 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `sestavy`
--

CREATE TABLE IF NOT EXISTS `sestavy` (
`idsestavy` int(11) NOT NULL,
  `hrac` int(11) NOT NULL,
  `vykon` int(11) NOT NULL,
  `obsah` varchar(500) NOT NULL,
  `sbercas` int(11) NOT NULL,
  `vyzkum` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `sestavy`
--

INSERT INTO `sestavy` (`idsestavy`, `hrac`, `vykon`, `obsah`, `sbercas`, `vyzkum`) VALUES
(7, 1, 6, '0;0;0;0;0;1;1;2;0;1;2;0;1', 1435935861, 0),
(8, 1, 6, '0;0;0;0;0;1;1;2;0;1;2;0;1', 1435935861, 1),
(9, 1, 6, '0;0;0;0;0;1;1;2;0;1;2;0;1', 1435935861, 1),
(10, 1, 10, '0;0;0;0;0;1;1;2;0;1;2;0;1', 1435935861, 0),
(11, 1, 10, '0;0;0;0;0;1;1;2;0;1;2;0;1', 1435935861, 0),
(12, 1, 10, '0;0;0;0;0;1;1;2;0;1;2;0;1', 1435935861, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `veci`
--

CREATE TABLE IF NOT EXISTS `veci` (
`idveci` int(11) NOT NULL,
  `nazev` varchar(50) NOT NULL,
  `typ` varchar(16) NOT NULL,
  `vykon` int(11) NOT NULL,
  `socket` varchar(50) NOT NULL,
  `sloty` varchar(50) NOT NULL,
  `popis` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `veci`
--

INSERT INTO `veci` (`idveci`, `nazev`, `typ`, `vykon`, `socket`, `sloty`, `popis`) VALUES
(0, 'Peníze', '', 0, '', '', 'Základní prostředek pro směnu, počítač z ních ale neposkládáš.'),
(1, 'Železo', '', 0, '', '', 'Surovina s chemickou značkou Fe.'),
(2, 'Měď', '', 0, '', '', 'Surovina s chemickou značkou Cu.'),
(3, 'Zlato', '', 0, '', '', 'Surovina s chemickou značkou Au.'),
(4, 'Křemík', '', 0, '', '', 'Surovina s chemickou značkou Si.'),
(5, 'Northbridge', '', 0, '', '', 'Materiál na komponentu.'),
(6, 'Southbridge', '', 0, '', '', 'Materiál na komponentu.'),
(7, 'Flash Bios', '', 0, '', '', 'Materiál na komponentu.'),
(8, 'RAM slots', '', 0, '', '', 'Materiál na komponentu.'),
(9, 'PCI-e', '', 0, '', '', 'Materiál na komponentu.'),
(10, 'Core', '', 0, '', '', 'Materiál na komponentu.'),
(11, 'L3 Cache', '', 0, '', '', 'Materiál na komponentu.'),
(12, 'Graphics', '', 0, '', '', 'Materiál na komponentu.'),
(13, 'Controller', '', 0, '', '', 'Materiál na komponentu.'),
(14, 'Graphics core', '', 0, '', '', 'Materiál na komponentu.'),
(15, 'VRAM', '', 0, '', '', 'Materiál na komponentu.'),
(16, 'PCB', '', 0, '', '', 'Materiál na komponentu.'),
(17, 'MOSFET', '', 0, '', '', 'Materiál na komponentu.'),
(18, 'Intel D975XBX (Pentium)', 'mb', 1, 'Pentium', '4;3;1', 'Třída Pentium'),
(19, 'Abit IP35 (Core)', 'mb', 1, 'Core', '4;1;1', 'Třída Core'),
(20, 'Asus P5Q Deluxe (Core)', 'mb', 1, 'Core', '4;2;1', 'Třída Core'),
(21, 'Asus EVGA 132-CK-NF78-A1 (Core)', 'mb', 1, 'Core', '4;3;1', 'Třída Core'),
(22, 'Asus P7P55D Deluxe (Nehalem)', 'mb', 1, 'Nehalem', '4;3;1', 'Třída Nehalem'),
(23, 'EVGA P55 Classified (Nehalem)', 'mb', 1, 'Nehalem', '4;4;1', 'Třída Nehalem'),
(24, 'EVGA X58 Classified 4x SLI (Nehalem)', 'mb', 1, 'Nehalem', '6;4;1', 'Třída Nehalem'),
(25, 'Pentium 4 630 (Pentium)', 'cpu', 300, 'Pentium', '', 'Pentium 4 630'),
(26, 'Pentium D 960 (Pentium)', 'cpu', 500, 'Pentium', '', 'Pentium D 960'),
(27, 'Celeron E3500 (Core)', 'cpu', 900, 'Core', '', 'Celeron E3500'),
(28, 'Pentium E5500 (Core)', 'cpu', 1200, 'Core', '', ''),
(29, 'Core 2 Duo E8400 (Core)', 'cpu', 1700, 'Core', '', ''),
(30, 'Core 2 Quad Q9300 (Core)', 'cpu', 2800, 'Core', '', ''),
(31, 'Core 2 Quad Q9650 (Core)', 'cpu', 3000, 'Core', '', ''),
(32, 'Core i3 550 (Nehalem)', 'cpu', 2300, 'Nehalem', '', ''),
(33, 'Core i5 760 (Nehalem)', 'cpu', 3400, 'Nehalem', '', ''),
(34, 'Core i7 950 (Nehalem)', 'cpu', 4300, 'Nehalem', '', ''),
(35, 'Core i7-E 980x (Nehalem)', 'cpu', 5000, 'Nehalem', '', ''),
(36, 'nVidia 6800 Ultra', 'gpu', 2300, '0', '', 'popis gpu'),
(37, 'AMD x850 XT PE', 'gpu', 2600, '0', '', 'popis gpu'),
(38, 'nVidia 7600 GT', 'gpu', 2800, '0', '', 'popis gpu'),
(39, 'AMD x1950 XT', 'gpu', 3000, '0', '', 'popis gpu'),
(40, 'nVidia 7950 GX2', 'gpu', 3700, '0', '', 'popis gpu'),
(41, 'nVidia 8600 GT', 'gpu', 4300, '0', '', 'popis gpu'),
(42, 'AMD 2900 XT', 'gpu', 5000, '0', '', 'popis gpu'),
(43, 'nVidia 8800 Ultra', 'gpu', 6300, '0', '', 'popis gpu'),
(44, 'RAM', 'ram', 1, '0', '', 'popis ram'),
(45, 'HDD', 'hdd', 1, '0', '', 'popis hdd'),
(46, 'SSD', 'hdd', 2, '0', '', 'popis ssd'),
(47, 'PSU', 'psu', 1000000000, '0', '', 'popis psu');

-- --------------------------------------------------------

--
-- Struktura tabulky `vyroba`
--

CREATE TABLE IF NOT EXISTS `vyroba` (
`idvyroby` int(11) NOT NULL,
  `hrac` int(11) NOT NULL,
  `recept` int(11) NOT NULL,
  `pocet` int(11) NOT NULL,
  `hotovo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `vyzkumy`
--

CREATE TABLE IF NOT EXISTS `vyzkumy` (
`idvyzkumu` int(11) NOT NULL,
  `nazev` varchar(200) NOT NULL,
  `body` bigint(11) NOT NULL,
  `popis` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `vyzkumy`
--

INSERT INTO `vyzkumy` (`idvyzkumu`, `nazev`, `body`, `popis`) VALUES
(0, 'Základ', 0, 'Nějak se začínat musí.'),
(1, 'Pentium', 1000, 'Začínáme pentiem.'),
(2, 'Core', 10000, 'Vylepšujeme na core.'),
(3, 'Nehalem', 100000, 'Další vylepšení.'),
(4, 'Sandy Bridge', 1000000, 'Čím dál tím lepší.'),
(5, 'Placeholder', 10000000, 'Aby bylo videt ze to jede'),
(6, 'Quantum Computers!!!', 9223372036854775807, 'To chceš');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `hraci`
--
ALTER TABLE `hraci`
 ADD PRIMARY KEY (`idhrace`), ADD UNIQUE KEY `id` (`idhrace`), ADD KEY `id_2` (`idhrace`);

--
-- Klíče pro tabulku `kupony`
--
ALTER TABLE `kupony`
 ADD PRIMARY KEY (`kod`), ADD UNIQUE KEY `kod` (`kod`), ADD KEY `kod_2` (`kod`), ADD KEY `kod_3` (`kod`);

--
-- Klíče pro tabulku `log`
--
ALTER TABLE `log`
 ADD KEY `cas` (`cas`);

--
-- Klíče pro tabulku `obchod`
--
ALTER TABLE `obchod`
 ADD PRIMARY KEY (`idnab`), ADD KEY `id` (`idnab`);

--
-- Klíče pro tabulku `recepty`
--
ALTER TABLE `recepty`
 ADD PRIMARY KEY (`idreceptu`), ADD KEY `id` (`idreceptu`);

--
-- Klíče pro tabulku `sestavy`
--
ALTER TABLE `sestavy`
 ADD PRIMARY KEY (`idsestavy`), ADD KEY `idsestavy` (`idsestavy`);

--
-- Klíče pro tabulku `veci`
--
ALTER TABLE `veci`
 ADD PRIMARY KEY (`idveci`), ADD UNIQUE KEY `id` (`idveci`), ADD KEY `id_2` (`idveci`);

--
-- Klíče pro tabulku `vyroba`
--
ALTER TABLE `vyroba`
 ADD PRIMARY KEY (`idvyroby`), ADD UNIQUE KEY `idvyroby` (`idvyroby`), ADD KEY `id` (`idvyroby`), ADD KEY `idvyroby_2` (`idvyroby`);

--
-- Klíče pro tabulku `vyzkumy`
--
ALTER TABLE `vyzkumy`
 ADD PRIMARY KEY (`idvyzkumu`), ADD UNIQUE KEY `idvyzkumu` (`idvyzkumu`), ADD KEY `idvyzkumu_2` (`idvyzkumu`);

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
MODIFY `idnab` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=304;
--
-- AUTO_INCREMENT pro tabulku `recepty`
--
ALTER TABLE `recepty`
MODIFY `idreceptu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pro tabulku `sestavy`
--
ALTER TABLE `sestavy`
MODIFY `idsestavy` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pro tabulku `veci`
--
ALTER TABLE `veci`
MODIFY `idveci` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT pro tabulku `vyroba`
--
ALTER TABLE `vyroba`
MODIFY `idvyroby` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pro tabulku `vyzkumy`
--
ALTER TABLE `vyzkumy`
MODIFY `idvyzkumu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
