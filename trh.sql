-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2015 at 10:56 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hardware_pcbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `hraci`
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
-- Dumping data for table `hraci`
--

INSERT INTO `hraci` (`idhrace`, `jmeno`, `heslo`, `vlastnictvi`, `body`, `vyzkum`) VALUES
(1, 'root', 'greyjoy', '11684;340;3517;2391;1884;76;59;69;72;74;72;43;177;45;48;48;48;48;39;39;39;39;39;39;39;39;40;40;39;39;39;39;39;36;39;39;39;49;50;50;49;49;50;53;93;49;49;94;37;38;38;36;38;38;38;38;87;87;87;87;36;37;37;37;37;36;37;37;36;36;37;37;37;37;37;36;36;36;37;36;36;37;36;36;37;36;36;36;36;36;36;36;36;36;36;36;35;36;36;36;36;35;36;36;36;36;36;36;36;36;36;36;36;36;36;36;36;36;35;56;36;31;34;36;36;41;36;36;35;36;36;83;35;36;36;36;35;41;36;36;36;36;35;83', 192893778, 7072);

-- --------------------------------------------------------

--
-- Table structure for table `kupony`
--

CREATE TABLE IF NOT EXISTS `kupony` (
  `kod` varchar(16) NOT NULL,
  `obsah` varchar(500) NOT NULL,
  `cas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kupony`
--

INSERT INTO `kupony` (`kod`, `obsah`, `cas`) VALUES
('e2ebleh7', '0;541;122;1131;16;0;0;0;0;0', 1436649950),
('igxluke1', '0;7;170;1137;11;0;0;0;0;0', 1436649950),
('ke0igihw', '0;265;34154;3;6;0;0;0;0;0', 1436649950),
('kw76bqeb', '0;139;34146;1;17;0;0;0;0;0', 1436649950),
('q6j7p139', '0;101779;6;1;43;0;0;0;0;0', 1436649950),
('v6myx1hz', '0;577;10;1138;5;0;0;0;0;0', 1436649950),
('vjjpy92u', '0;721;34022;4;1;0;0;0;0;0', 1436649950),
('vlzq7ds2', '0;520;139;4;3396;0;0;0;0;0', 1436649950),
('w1j3fb51', '0;88672;4415;12;6;0;0;0;0;0', 1436649950),
('ybg92vkx', '0;2;1;0;0;0;0;0;0;0', 1436649950),
('z458uepc', '0;94;241;155;2947;0;0;0;0;0', 1436649950);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `cas` int(11) NOT NULL,
  `hrac` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
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
(1435922089, 1, 'Složena sestava 0;0;0;0;0;1;1;2;0;1;2;0;1 o výkonu 10'),
(1435937028, 1, 'Použit kupón ysot4udy (Železo(05) Southbridge(01) Flash Bios(05) Graphics(0123) )'),
(1435937045, 1, 'Použit kupón 20xh0zcn (Železo(6) Měď(65) Zlato(42) )'),
(1436023211, 1, 'Použit kupón 9vcr1pl4 (Peníze(1) Železo(1) Měď(1) Zlato(1) Křemík(1) Northbridge(1) Southbridge(1) Flash Bios(1) RAM slots(1) PCI-e(1) Core(1) L3 Cache(1) Graphics(1) Controller(1) Graphics core(1) VRAM(1) PCB(1) MOSFET(1) Intel D975XBX (Pentium)(1) Abit IP35 (Core)(1) Asus P5Q Deluxe (Core)(1) Asus EVGA 132-CK-NF78-A1 (Core)(1) Asus P7P55D Deluxe (Nehalem)(1) EVGA P55 Classified (Nehalem)(1) EVGA X58 Classified 4x SLI (Nehalem)(1) Pentium 4 630 (Pentium)(1) Pentium D 960 (Pentium)(1) Celeron E3500 (Core)(1) Pentium E5500 (Core)(1) Core 2 Duo E8400 (Core)(1) Core 2 Quad Q9300 (Core)(1) Core 2 Quad Q9650 (Core)(1) Core i3 550 (Nehalem)(1) Core i5 760 (Nehalem)(1) Core i7 950 (Nehalem)(1) Core i7-E 980x (Nehalem)(1) nVidia 6800 Ultra(1) AMD x850 XT PE(1) nVidia 7600 GT(1) AMD x1950 XT(1) nVidia 7950 GX2(1) nVidia 8600 GT(1) AMD 2900 XT(1) nVidia 8800 Ultra(1) RAM(1) HDD(1) SSD(1) PSU(1) )'),
(1436023373, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;1;1;0;0;1;0;0;1;1;0;1;1 o výkonu 5200'),
(1436025704, 1, 'Uskutečněn nákup Železo(1000) za Měď(1000) od test1'),
(1436025741, 1, 'Uskutečněn nákup Železo(15) za Měď(10) od test2'),
(1436025744, 1, 'Zrušena nabídka Peníze(13) za Northbridge(1)'),
(1436025753, 1, 'Zrušena nabídka Peníze(250) za Křemík(1)'),
(1436094657, 1, 'Spuštěna výroba 1x Celeron E3500 (Core)'),
(1436094724, 1, 'Dokončena výroba 1x Celeron E3500 (Core)'),
(1436103975, 1, 'Uskutečněn nákup Železo(15) za Měď(10) od test2'),
(1436116990, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;1;0;1;0;0;0;0;1;1;0;1 o výkonu 300'),
(1436117602, 2, 'Použit kupón 8fhht62l (Železo(3) Měď(5) Zlato(6) Křemík(1) Northbridge(1) Southbridge(1) Flash Bios(1) RAM slots(1) PCI-e(1) Core(1) L3 Cache(1) Graphics(1) )'),
(1436180313, 1, 'Použit kupón 370pu5v9 (RAM(50) PSU(50) )'),
(1436217992, 1, 'Uskutečněn nákup Železo(15) za Měď(10) od test2'),
(1436218031, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;4;1;0;1 o výkonu 0'),
(1436218196, 1, 'Vytvořena nabídka Core(1) za Flash Bios(1)'),
(1436218640, 1, 'Spuštěna výroba 1x Northbridge'),
(1436218701, 1, 'Dokončena výroba 1x Northbridge'),
(1436218777, 1, 'Vytvořena nabídka nVidia 7950 GX2(1) za Zlato(1000)'),
(1436264859, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;0;1;4;0;1;1 o výkonu 22400'),
(1436264888, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;1;0;1;1;1;6;0;1;1 o výkonu 36000'),
(1436264930, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;1;1;0;0;0;0;0;4;1;0;1 o výkonu 1200'),
(1436264953, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;1;1;1;0;0;0;0;0;4;1;0;1 o výkonu 2000'),
(1436265361, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;1;0;1;1;1;6;0;1;1 o výkonu 60000'),
(1436265386, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;1;0;1;1;1;6;1;0;1 o výkonu 18000'),
(1436265402, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;1;0;1;1;1;6;0;1;1 o výkonu 36000'),
(1436265637, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;1;0;1;1;1;6;1;0;1 o výkonu 18000'),
(1436265653, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;1;1;1;0;0;0;0;1;6;0;1;1 o výkonu 60000'),
(1436266236, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;1;0;0;1;1;0;1 o výkonu 4300'),
(1436266276, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;1;0;1;1;0;1;0;1;1 o výkonu 5600'),
(1436266907, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;0;0;1;1;1;0;1 o výkonu 1700'),
(1436266941, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;1;1;1;0;0;0;0;1;6;1;0;1 o výkonu 13800'),
(1436267160, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;1;0;0;0;0;2;0;1;1 o výkonu 6800'),
(1436267743, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;1;0;0;1;0;0;4;1;0;1 o výkonu 17200'),
(1436283173, 1, 'Použit kupón 6efl61gd (Peníze(1000) Železo(1000) Měď(1000) Zlato(1000) Křemík(1000) Northbridge(10) Southbridge(10) Flash Bios(10) RAM slots(10) PCI-e(10) Core(10) L3 Cache(10) Graphics(10) Controller(10) Graphics core(10) VRAM(10) PCB(10) MOSFET(10) Intel D975XBX (Pentium)(1) Abit IP35 (Core)(1) Asus P5Q Deluxe (Core)(1) Asus EVGA 132-CK-NF78-A1 (Core)(1) Asus P7P55D Deluxe (Nehalem)(1) EVGA P55 Classified (Nehalem)(1) EVGA X58 Classified 4x SLI (Nehalem)(1) Pentium 4 630 (Pentium)(1) Pentium D 960 (Pentium)(1) Celeron E3500 (Core)(1) Pentium E5500 (Core)(1) Core 2 Duo E8400 (Core)(1) Core 2 Quad Q9300 (Core)(1) Core 2 Quad Q9650 (Core)(1) Core i3 550 (Nehalem)(1) Core i5 760 (Nehalem)(1) Core i7 950 (Nehalem)(1) Core i7-E 980x (Nehalem)(1) nVidia 6800 Ultra(1) AMD x850 XT PE(1) nVidia 7600 GT(1) AMD x1950 XT(1) nVidia 7950 GX2(1) nVidia 8600 GT(1) AMD 2900 XT(1) nVidia 8800 Ultra(1) RAM(1) HDD(1) SSD(1) PSU(1) )'),
(1436283289, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;2;2;6;0;1;1 o výkonu 60000'),
(1436297859, 1, 'Vytvořena nabídka Core i5 760 (Nehalem)(1) za PCI-e(10)'),
(1436303673, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;2;1;0;0;0;0;0;0;4;1;0;1 o výkonu 1200'),
(1436303753, 1, 'Použit kupó 5f74983k (AMD x850 XT PE(3) nVidia 7600 GT(3) AMD x1950 XT(3) nVidia 7950 GX2(3) nVidia 8600 GT(3) AMD 2900 XT(3) nVidia 8800 Ultra(5) )'),
(1436303776, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;4;4;0;0;1 o výkonu 0'),
(1436303839, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;1;4;0;0;1 o výkonu 0'),
(1436303846, 1, 'Rozebrána sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;1;4;0;0;1 o výkonu 0'),
(1436303858, 1, 'Rozebrána sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;4;4;0;0;1 o výkonu 0'),
(1436303878, 1, 'Použit kupó g4d18zay (HDD(5) SSD(5) )'),
(1436303895, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;4;4;0;1;1 o výkonu 34400'),
(1436306580, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;1;0;0;0;0;0;0;1;0;0;1 o výkonu 0'),
(1436310668, 1, 'Uskutečněn nákup Železo(15) za Měď(10) od test2'),
(1436310671, 1, 'Uskutečněn nákup Železo(15) za Měď(10) od test2'),
(1436313177, 1, 'Spuštěna výroba 1x Northbridge'),
(1436313180, 1, 'Spuštěna výroba 1x Southbridge'),
(1436313183, 1, 'Spuštěna výroba 1x Southbridge'),
(1436313195, 1, 'Spuštěna výroba 1x Northbridge'),
(1436313196, 1, 'Spuštěna výroba 1x Pentium D 960 (Pentium)'),
(1436313235, 1, 'Spuštěna výroba 1x Northbridge'),
(1436313238, 1, 'Dokončena výroba 1x Northbridge'),
(1436313241, 1, 'Dokončena výroba 1x Southbridge'),
(1436313244, 1, 'Dokončena výroba 1x Southbridge'),
(1436313256, 1, 'Dokončena výroba 1x Northbridge'),
(1436313256, 1, 'Dokončena výroba 1x Pentium D 960 (Pentium)'),
(1436313296, 1, 'Dokončena výroba 1x Northbridge'),
(1436337458, 1, 'Uskutečněn nákup Železo(15) za Měď(10) od test2'),
(1436337505, 1, 'Spuštěna výroba 1x Northbridge'),
(1436337566, 1, 'Dokončena výroba 1x Northbridge'),
(1436337676, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;1;1;0;0;4;1;0;1 o výkonu 12000'),
(1436337753, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;4;1;0;1 o výkonu 4800'),
(1436338013, 1, 'Rozebrána sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;1;1;0;0;4;1;0;1 o výkonu 12000'),
(1436339271, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;4;1;0;1 o výkonu 4800'),
(1436353739, 1, 'Rozebrána sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;1;0;0;0;0;2;0;1;1 o výkonu 6800'),
(1436353740, 1, 'Rozebrána sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;1;0;0;1;0;0;4;1;0;1 o výkonu 17200'),
(1436353740, 1, 'Rozebrána sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;2;2;6;0;1;1 o výkonu 60000'),
(1436353741, 1, 'Rozebrána sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;2;1;0;0;0;0;0;0;4;1;0;1 o výkonu 1200'),
(1436353742, 1, 'Rozebrána sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;4;4;0;1;1 o výkonu 34400'),
(1436353743, 1, 'Rozebrána sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;1;0;0;0;0;0;0;1;0;0;1 o výkonu 0'),
(1436353746, 1, 'Rozebrána sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;4;1;0;1 o výkonu 4800'),
(1436353747, 1, 'Rozebrána sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;4;1;0;1 o výkonu 4800'),
(1436353797, 1, 'Použit kupó n8dwgzzj (Pentium 4 630 (Pentium)(5) Pentium D 960 (Pentium)(5) Celeron E3500 (Core)(5) Pentium E5500 (Core)(5) Core 2 Duo E8400 (Core)(5) Core 2 Quad Q9300 (Core)(5) Core 2 Quad Q9650 (Core)(5) Core i3 550 (Nehalem)(5) Core i5 760 (Nehalem)(5) Core i7 950 (Nehalem)(5) Core i7-E 980x (Nehalem)(5) nVidia 6800 Ultra(1) nVidia 7600 GT(1) AMD x1950 XT(1) nVidia 7950 GX2(1) nVidia 8600 GT(1) AMD 2900 XT(1) nVidia 8800 Ultra(1) RAM(50) HDD(50) SSD(50) PSU(50) )'),
(1436353820, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;1;1;1;1;6;0;1;1 o výkonu 40800'),
(1436353991, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;1;0;0;0;1;1;0;0;0;0;6;0;1;1 o výkonu 33600'),
(1436354002, 1, 'Rozebrána sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;1;0;0;0;1;1;0;0;0;0;6;0;1;1 o výkonu 33600'),
(1436354016, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;1;1;0;0;0;0;0;4;1;0;1 o výkonu 1200'),
(1436354024, 1, 'Rozebrána sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;1;1;0;0;0;0;0;4;1;0;1 o výkonu 1200'),
(1436354034, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;1;1;0;0;0;0;0;4;1;0;1 o výkonu 1200'),
(1436354036, 1, 'Rozebrána sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;1;1;0;0;0;0;0;4;1;0;1 o výkonu 1200'),
(1436354047, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;1;1;0;0;0;0;0;4;1;0;1 o výkonu 1200'),
(1436354051, 1, 'Rozebrána sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;1;1;0;0;0;0;0;4;1;0;1 o výkonu 1200'),
(1436354393, 1, 'Použit kupó 7lo1tyvs (Železo(10) Měď(10) Zlato(10) )'),
(1436354590, 1, 'Vytvořena nabídka Peníze(1) za Flash Bios(1)'),
(1436354593, 1, 'Zrušena nabídka Peníze(1) za Flash Bios(1)'),
(1436354618, 1, 'Spuštěna výroba 1x Northbridge'),
(1436354679, 1, 'Dokončena výroba 1x Northbridge'),
(1436354750, 1, 'Použit kupón a0gdltly (Flash Bios(3) PCI-e(12) Core(16) )'),
(1436355459, 1, 'Použit kupón qxrq4mj4 (Měď(123) )'),
(1436355474, 1, 'Použit kupón anad3kuo (Pentium 4 630 (Pentium)(3) Pentium D 960 (Pentium)(3) Celeron E3500 (Core)(3) Pentium E5500 (Core)(3) Core 2 Duo E8400 (Core)(3) Core 2 Quad Q9300 (Core)(3) Core 2 Quad Q9650 (Core)(5) )'),
(1436355727, 1, 'Použit kupón ihouxigq (Železo(098) Měď(079) Křemík(68) RAM slots(024) PCI-e(8) )'),
(1436355914, 1, 'Použit kupón tcahxvws (Železo(10) Měď(10) Zlato(10) )'),
(1436355927, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;1;1;0;1 o výkonu 300'),
(1436355952, 1, 'Spuštěna výroba 1x Northbridge'),
(1436355959, 1, 'Spuštěna výroba 3x Northbridge'),
(1436356014, 1, 'Dokončena výroba 1x Northbridge'),
(1436356020, 1, 'Dokončena výroba 3x Northbridge'),
(1436468314, 1, 'Spuštěna výroba 1x Northbridge'),
(1436468326, 1, 'Sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;1;1;1;1;6;0;1;1 o výkonu 40800 přepnuta na výzkum.'),
(1436468383, 1, 'Sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;1;1;1;1;6;0;1;1 o výkonu 40800 přepnuta na body.'),
(1436468385, 1, 'Dokončena výroba 1x Northbridge'),
(1436468396, 1, 'Uskutečněn nákup Peníze(23) za Měď(500) od test2'),
(1436468420, 1, 'Spuštěna výroba 1x Flash Bios'),
(1436468435, 1, 'Vytvořena nabídka Peníze(1) za Zlato(1)'),
(1436468438, 1, 'Zrušena nabídka Peníze(1) za Zlato(1)'),
(1436468857, 1, 'Dokončena výroba 1x Flash Bios'),
(1436470275, 1, 'Použit kupón 7m0ovvag (Peníze(1) Železo(1) Měď(1) Zlato(1) Křemík(1) Northbridge(1) Southbridge(1) Flash Bios(1) RAM slots(1) PCI-e(1) Core(1) L3 Cache(1) Graphics(1) Controller(1) Graphics core(1) VRAM(1) PCB (GPU)(1) MOSFET(1) DRAM(1) PCB (RAM)(1) HEAD(1) SPINDLE(1) ACTUATOR(1) PLATTER(1) NAND Flash(1) Controller(1) CACHE(1) SATA(1) Kondík(1) PCB (PSU)(1) Intel D975XBX (Pentium)(1) Abit IP35 (Core)(1) Asus P5Q Deluxe (Core)(1) Asus EVGA 132-CK-NF78-A1 (Core)(1) Asus P7P55D Deluxe (Nehalem)(1) EVGA P55 Classified (Nehalem)(1) EVGA X58 Classified 4x SLI (Nehalem)(1) ASUS H61-PLUS (Sandy Bridge)(1) MSI Z68A-GD65 (Sandy Bridge)(1) ASRock X79 Extreme11 (Sandy Bridge)(1) MSI B75A-G43 (Ivy Bridge)(1) Gigabyte GA-Z77X-UP7 (Ivy Bridge)(1) MSI Big Bang XPower II (Ivy Bridge)(1) GIGABYTE GA-B85M-D3H (Hashwell)(1) Gigabyte GA-Z97X-UD5H (Hashwell)(1) ASUS ROG RAMPAGE V EXTREME (Hashwell)(1) Pentium 4 630 (Pentium)(1) Pentium D 960 (Pentium)(1) Celeron E3500 (Core)(1) Pentium E5500 (Core)(1) Core 2 Duo E8400 (Core)(1) Core 2 Quad Q9300 (Core)(1) Core 2 Quad Q9650 (Core)(1) Core i3 550 (Nehalem)(1) Core i5 760 (Nehalem)(1) Core i7 950 (Nehalem)(1) Core i7-E 980x (Nehalem)(1) Pentium G645 (Sandy Bridge)(1) Core i5 2500k (Sandy Bridge)(1) Core i7 2700k (Sandy Bridge)(1) Core i7-E 3930k (Sandy Bridge)(1) Pentium G2130 (Ivy Bridge)(1) Core i3 3220 (Ivy Bridge)(1) Core i5 3350P (Ivy Bridge)(1) Core i5 3570K (Ivy Bridge)(1) Core i7 3770K (Ivy Bridge)(1) Pentium G3258 (Hashwell)(1) Core i5 4690K (Hashwell)(1) Xeon 1230 v3 (Hashwell)(1) Core i7 4790K (Hashwell)(1) Core i7-E 5930K (Hashwell)(1) Core i7-E 5960X (Hashwell)(1) Xeon 2699 v3 (Hashwell)(1) AMD x850 XT PE(1) nVidia 6800 Ultra(1) nVidia 7600 GT(1) AMD x1950 XT(1) nVidia 7950 GX2(1) nVidia 8600 GT(1) AMD 2900 XT(1) nVidia 8800 Ultra(1) RAM(1) HDD(1) SSD(1) PSU(1) )'),
(1436478028, 1, 'Složena sestava 0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;1;1;0;1 o výkonu 2300'),
(1436539095, 1, 'Rozebrána sestava EVGA X58 Classified 4x SLI (Nehalem)(1x) ASUS ROG RAMPAGE V EXTREME (Hashwell)(1x) Core 2 Quad Q9650 (Core)(1x) Core i3 550 (Nehalem)(1x) Core i5 760 (Nehalem)(1x) Core i7 950 (Nehalem)(1x) Core i7-E 980x (Nehalem)(6x) Core i5 2500k (Sandy Bridge)(1x) Core i7 2700k (Sandy Bridge)(1x)  o výkonu 40800 a spotřebě  W.'),
(1436540336, 1, 'Spuštěna výroba 1x Southbridge'),
(1436540422, 1, 'Dokončena výroba 1x Southbridge'),
(1436546389, 1, 'Použit kupón wc1xlgnv (Kingston 1GB(20) Kingston KC 960(50) Corsair AX1500i(50) )'),
(1436546418, 1, 'Složena sestava Gigabyte GA-Z97X-UD5H (Hashwell)(1x) Xeon 1230 v3 (Hashwell)(1x) nVidia 7600 GT(1x) AMD x1950 XT(1x) nVidia 7950 GX2(1x) Kingston 1GB(1x) Kingston KC 960(1x) Corsair AX1500i(1x)  o výkonu 716800 a spotřebě 419 W.'),
(1436546453, 1, 'Složena sestava Asus EVGA 132-CK-NF78-A1 (Core)(1x) Core 2 Quad Q9300 (Core)(1x) AMD 2900 XT(1x) Kingston 1GB(3x) Kingston KC 960(1x) Corsair AX1500i(1x)  o výkonu 2150400 a spotřebě 322 W.'),
(1436546463, 1, 'Použit kupón hreg39eg (Kingston 1GB(6) WD Black(6) Seasonic G550W(6) )'),
(1436546481, 1, 'Složena sestava ASUS H61-PLUS (Sandy Bridge)(1x) Core i7-E 3930k (Sandy Bridge)(1x) nVidia 8800 Ultra(1x) Kingston 1GB(2x) Kingston KC 960(1x) Corsair AX1500i(1x)  o výkonu 3072000 a spotřebě 279 W.'),
(1436546516, 1, 'Složena sestava Asus P5Q Deluxe (Core)(1x) Core 2 Duo E8400 (Core)(1x) nVidia 9600 GT(1x) Kingston 1GB(4x) WD Black(1x) Seasonic G550W(1x)  o výkonu 27200 a spotřebě 183 W.'),
(1436546541, 1, 'Složena sestava Intel D975XBX (Pentium)(1x) Pentium 4 630 (Pentium)(1x) nVidia 6800 Ultra(1x) nVidia 8600 GT(1x) Kingston 1GB(2x) WD Black(1x) Seasonic G550W(1x)  o výkonu 2400 a spotřebě 275 W.'),
(1436548437, 1, 'Uskutečněn nákup Železo(15) za Měď(10) od test2'),
(1436558577, 1, 'Složena sestava ASUS H61-PLUS (Sandy Bridge)(1x) Core i7 2700k (Sandy Bridge)(1x) Kingston 1GB(2x) Kingston KC 960 1024 GB(1x) Corsair AX1500i(1x)  o výkonu 0 a spotřebě 104 W.'),
(1436566521, 1, 'Použit kupón damr6zgy (Peníze(99) Železo(99) Měď(999) Zlato(99) Křemík(9) Northbridge(9) Southbridge(9) Flash Bios(9) RAM slots(9) PCI-e(9) Core(9) L3 Cache(9) Graphics(9) Controller(9) Graphics core [64](9) VRAM(9) PCB (GPU)(9) MOSFET(9) DRAM [1024](9) PCB (RAM)(9) HEAD(9) SPINDLE(9) ACTUATOR(9) PLATTER(9) NAND Flash(9) Controller(9) CACHE(9) SATA(9) Kondík(9) PCB (PSU)(9) Intel D975XBX (Pentium)(9) Abit IP35 (Core)(9) Asus P5Q Deluxe (Core)(9) Asus EVGA 132-CK-NF78-A1 (Core)(9) Asus P7P55D Deluxe (Nehalem)(9) EVGA P55 Classified (Nehalem)(9) EVGA X58 Classified 4x SLI (Nehalem)(9) ASUS H61-PLUS (Sandy Bridge)(9) MSI Z68A-GD65 (Sandy Bridge)(9) ASRock X79 Extreme11 (Sandy Bridge)(9) MSI B75A-G43 (Ivy Bridge)(9) Gigabyte GA-Z77X-UP7 (Ivy Bridge)(9) MSI Big Bang XPower II (Ivy Bridge)(9) GIGABYTE GA-B85M-D3H (Haswell)(9) Gigabyte GA-Z97X-UD5H (Haswell)(9) ASUS ROG RAMPAGE V EXTREME (Haswell)(9) Pentium 4 630 (Pentium)(9) Pentium D 960 (Pentium)(9) Celeron E3500 (Core)(9) Pentium E5500 (Core)(9) Core 2 Duo E8400 (Core)(9) Core 2 Quad Q9300 (Core)(9) Core 2 Quad Q9650 (Core)(9) Core i3 550 (Nehalem)(9) Core i5 760 (Nehalem)(9) Core i7 950 (Nehalem)(9) Core i7-E 980x (Nehalem)(9) Pentium G645 (Sandy Bridge)(9) Core i5 2500k (Sandy Bridge)(9) Core i7 2700k (Sandy Bridge)(9) Core i7-E 3930k (Sandy Bridge)(9) Pentium G2130 (Ivy Bridge)(9) Core i3 3220 (Ivy Bridge)(9) Core i5 3350P (Ivy Bridge)(9) Core i5 3570K (Ivy Bridge)(9) Core i7 3770K (Ivy Bridge)(9) Pentium G3258 (Haswell)(9) Core i5 4690K (Haswell)(9) Xeon 1230 v3 (Haswell)(9) Core i7 4790K (Haswell)(9) Core i7-E 5930K (Haswell)(9) Core i7-E 5960X (Haswell)(9) Xeon 2699 v3 (Haswell)(9) nVidia 6800 Ultra(9) AMD x850 XT PE(9) nVidia 7600 GT(9) AMD x1950 XT(9) nVidia 7950 GX2(9) nVidia 8600 GT(9) nVidia 9600 GT(9) AMD 2900 XT(9) AMD 3870(9) nVidia 9800 GTX(9) nVidia 8800 Ultra(9) nVidia 260(9) nVidia 285(9) nVidia 9800 GX2(9) AMD 3870(9) AMD 3870x2(9) nVidia 465(9) nVidia 640(9) AMD 5870(9) nVidia 480(9) AMD 6870(9) nVidia 750ti(9) nVidia 295(9) AMD 4870x2(9) nVidia 560ti(9) nVidia 660ti(9) nVidia 960(9) nVidia 580(9) AMD 6970(9) nVidia 760(9) nVidia 680(9) AMD 7970(9) AMD 280X(9) nVidia 770(9) AMD 5970(9) AMD 290X(9) nVidia 590(9) nVidia Titan(9) nVidia 970(9) nVidia 780ti(9) nVidia 980ti(9) nVidia Titan X(9) AMD 7990(9) nVidia 690(9) AMD 295X2(9) nVidia Titan Z(9) Kingston 1GB(9) Kingston 2GB(9) Crucial Ballistix 4GB(9) Kingston 8GB HyperX Fury(9) WD Green(9) WD Blue(9) WD Black(9) WD VelociRaptor(9) Crucial MX200 64 GB(9) SAMSUNG 850 PRO 128 GB(9) Crucial MX200 256 GB(9) Intel 730 512 GB(9) Kingston KC 960 1024 GB(9) SAMSUNG 850 PRO 2048 GB(9) Corsair CX430(9) Corsair RM450(9) Corsair CX500(9) Corsair CS550(9) Seasonic G550W(9) Seasonic P660(9) Corsair HX750(9) Enermax Platimax 850W(9) Corsair HX1000i(9) Seasonic X1250(9) Corsair AX1500i(9) )'),
(1436566586, 1, 'Složena sestava Intel D975XBX (Pentium)(1x) Pentium D 960 (Pentium)(1x) AMD x850 XT PE(1x) Kingston 1GB(1x) WD Green(1x) Corsair CX430(1x)  o výkonu 500 a spotřebě 189 W.'),
(1436566937, 1, 'Složena sestava Intel D975XBX (Pentium)(1x) Pentium D 960 (Pentium)(1x) nVidia 7600 GT(1x) Kingston 2GB(1x) WD Green(1x) Corsair CX430(1x)  o výkonu 1000 a spotřebě 169 W.'),
(1436609490, 1, 'Spuštěna výroba 10x Northbridge'),
(1436609552, 1, 'Dokončena výroba 10x Northbridge'),
(1436612110, 1, 'Rozebrána sestava Intel D975XBX (Pentium)(1x) ASUS H61-PLUS (Sandy Bridge)(1x) Pentium E5500 (Core)(1x) Core i7-E 980x (Nehalem)(1x) Pentium G645 (Sandy Bridge)(1x) Core i7 2700k (Sandy Bridge)(1x)  o výkonu 300 a spotřebě 0 W.'),
(1436612111, 1, 'Rozebrána sestava Asus P5Q Deluxe (Core)(1x) Core 2 Quad Q9650 (Core)(1x) AMD x850 XT PE(1x) AMD 3870(1x) nVidia 9800 GTX(1x) nVidia 260(1x)  o výkonu 2300 a spotřebě 0 W.'),
(1436612112, 1, 'Rozebrána sestava Asus P5Q Deluxe (Core)(1x) Core 2 Duo E8400 (Core)(1x) nVidia 9600 GT(1x) Kingston 1GB(4x) WD Black(1x) Seasonic G550W(1x)  o výkonu 27200 a spotřebě 183 W.'),
(1436612114, 1, 'Rozebrána sestava Intel D975XBX (Pentium)(1x) Pentium 4 630 (Pentium)(1x) nVidia 6800 Ultra(1x) nVidia 8600 GT(1x) Kingston 1GB(2x) WD Black(1x) Seasonic G550W(1x)  o výkonu 2400 a spotřebě 275 W.'),
(1436612116, 1, 'Rozebrána sestava ASUS H61-PLUS (Sandy Bridge)(1x) Core i7 2700k (Sandy Bridge)(1x) Kingston 1GB(2x) Kingston KC 960 1024 GB(1x) Corsair AX1500i(1x)  o výkonu 0 a spotřebě 104 W.'),
(1436612117, 1, 'Rozebrána sestava Intel D975XBX (Pentium)(1x) Pentium D 960 (Pentium)(1x) AMD x850 XT PE(1x) Kingston 1GB(1x) WD Green(1x) Corsair CX430(1x)  o výkonu 500 a spotřebě 189 W.'),
(1436612119, 1, 'Rozebrána sestava Intel D975XBX (Pentium)(1x) Pentium D 960 (Pentium)(1x) nVidia 7600 GT(1x) Kingston 2GB(1x) WD Green(1x) Corsair CX430(1x)  o výkonu 1000 a spotřebě 169 W.'),
(1436613290, 1, 'Složena sestava Intel D975XBX (Pentium)(1x) Pentium D 960 (Pentium)(1x) AMD x850 XT PE(1x) Kingston 1GB(1x) WD Green(1x) Corsair CX430(1x)  o výkonu 250 a spotřebě 189 W.'),
(1436625726, 1, 'Rozebrána sestava Intel D975XBX (Pentium)(1x) Pentium D 960 (Pentium)(1x) AMD x850 XT PE(1x) Kingston 1GB(1x) WD Green(1x) Corsair CX430(1x)  o výkonu 250 a spotřebě 189 W.'),
(1436625867, 1, 'Složena sestava Intel D975XBX (Pentium)(1x) Pentium 4 630 (Pentium)(1x) nVidia 6800 Ultra(2x) Crucial Ballistix 4GB(1x) WD VelociRaptor(1x) Corsair CS550(1x)  o výkonu 1 a spotřebě 289 W.'),
(1436629335, 1, 'Složena sestava Abit IP35 (Core)(1x) Pentium E5500 (Core)(1x) AMD 2900 XT(1x) Kingston 2GB(4x) Kingston KC 960 1024 GB(1x) Enermax Platimax 850W(1x)  o výkonu 1 a spotřebě 295 W.'),
(1436643915, 1, 'Složena sestava Intel D975XBX (Pentium)(1x) Pentium D 960 (Pentium)(1x) AMD x850 XT PE(1x) Kingston 1GB(1x) WD Green(1x) Corsair CX430(1x)  o výkonu 80 a spotřebě 189 W.'),
(1436644464, 1, 'Složena sestava Intel D975XBX (Pentium)(1x) Pentium D 960 (Pentium)(1x) AMD x850 XT PE(1x) Kingston 1GB(1x) WD Green(1x) Corsair CX430(1x)  o výkonu 80 a spotřebě 189 W.'),
(1436644597, 1, 'Složena sestava Intel D975XBX (Pentium)(1x) Pentium D 960 (Pentium)(1x) AMD x850 XT PE(1x) Kingston 1GB(1x) WD Green(1x) Corsair CX430(1x)  o výkonu 80 a spotřebě 189 W.'),
(1436646530, 1, 'Použit kupón tbynlprb (Peníze(99) Železo(99) Měď(999) Zlato(99) Křemík(9) Northbridge(9) Southbridge(9) Flash Bios(9) RAM slots(9) PCI-e(9) Core(9) L3 Cache(9) Graphics(9) Controller(9) Graphics core [64](9) VRAM(9) PCB (GPU)(9) MOSFET(9) DRAM [1024](9) PCB (RAM)(9) HEAD(9) SPINDLE(9) ACTUATOR(9) PLATTER(9) NAND Flash(9) Controller(9) CACHE(9) SATA(9) Kondík(9) PCB (PSU)(9) Intel D975XBX (Pentium)(9) Abit IP35 (Core)(9) Asus P5Q Deluxe (Core)(9) Asus EVGA 132-CK-NF78-A1 (Core)(9) Asus P7P55D Deluxe (Nehalem)(9) EVGA P55 Classified (Nehalem)(9) EVGA X58 Classified 4x SLI (Nehalem)(9) ASUS H61-PLUS (Sandy Bridge)(9) MSI Z68A-GD65 (Sandy Bridge)(9) ASRock X79 Extreme11 (Sandy Bridge)(9) MSI B75A-G43 (Ivy Bridge)(9) Gigabyte GA-Z77X-UP7 (Ivy Bridge)(9) MSI Big Bang XPower II (Ivy Bridge)(9) GIGABYTE GA-B85M-D3H (Haswell)(9) Gigabyte GA-Z97X-UD5H (Haswell)(9) ASUS ROG RAMPAGE V EXTREME (Haswell)(9) Pentium 4 630 (Pentium)(9) Pentium D 960 (Pentium)(9) Celeron E3500 (Core)(9) Pentium E5500 (Core)(9) Core 2 Duo E8400 (Core)(9) Core 2 Quad Q9300 (Core)(9) Core 2 Quad Q9650 (Core)(9) Core i3 550 (Nehalem)(9) Core i5 760 (Nehalem)(9) Core i7 950 (Nehalem)(9) Core i7-E 980x (Nehalem)(9) Pentium G645 (Sandy Bridge)(9) Core i5 2500k (Sandy Bridge)(9) Core i7 2700k (Sandy Bridge)(9) Core i7-E 3930k (Sandy Bridge)(9) Pentium G2130 (Ivy Bridge)(9) Core i3 3220 (Ivy Bridge)(9) Core i5 3350P (Ivy Bridge)(9) Core i5 3570K (Ivy Bridge)(9) Core i7 3770K (Ivy Bridge)(9) Pentium G3258 (Haswell)(9) Core i5 4690K (Haswell)(9) Xeon 1230 v3 (Haswell)(9) Core i7 4790K (Haswell)(9) Core i7-E 5930K (Haswell)(9) Core i7-E 5960X (Haswell)(9) Xeon 2699 v3 (Haswell)(9) nVidia 6800 Ultra(9) AMD x850 XT PE(9) nVidia 7600 GT(9) AMD x1950 XT(9) nVidia 7950 GX2(9) nVidia 8600 GT(9) nVidia 9600 GT(9) AMD 2900 XT(9) AMD 3870(9) nVidia 9800 GTX(9) nVidia 8800 Ultra(9) nVidia 260(9) nVidia 285(9) nVidia 9800 GX2(9) AMD 3870(9) AMD 3870x2(9) nVidia 465(9) nVidia 640(9) AMD 5870(9) nVidia 480(9) AMD 6870(9) nVidia 750ti(9) nVidia 295(9) AMD 4870x2(9) nVidia 560ti(9) nVidia 660ti(9) nVidia 960(9) nVidia 580(9) AMD 6970(9) nVidia 760(9) nVidia 680(9) AMD 7970(9) AMD 280X(9) nVidia 770(9) AMD 5970(9) AMD 290X(9) nVidia 590(9) nVidia Titan(9) nVidia 970(9) nVidia 780ti(9) nVidia 980ti(9) nVidia Titan X(9) AMD 7990(9) nVidia 690(9) AMD 295X2(9) nVidia Titan Z(9) Kingston 1GB(9) Kingston 2GB(9) Crucial Ballistix 4GB(9) Kingston 8GB HyperX Fury(9) WD Green(9) WD Blue(9) WD Black(9) WD VelociRaptor(9) Crucial MX200 64 GB(9) SAMSUNG 850 PRO 128 GB(9) Crucial MX200 256 GB(9) Intel 730 512 GB(9) Kingston KC 960 1024 GB(9) SAMSUNG 850 PRO 2048 GB(9) Corsair CX430(9) Corsair RM450(9) Corsair CX500(9) Corsair CS550(9) Seasonic G550W(9) Seasonic P660(9) Corsair HX750(9) Enermax Platimax 850W(9) Corsair HX1000i(9) Seasonic X1250(9) Corsair AX1500i(9) )'),
(1436646541, 1, 'Použit kupón fyr8bj21 (Peníze(99) Železo(99) Měď(999) Zlato(99) Křemík(9) Northbridge(9) Southbridge(9) Flash Bios(9) RAM slots(9) PCI-e(9) Core(9) L3 Cache(9) Graphics(9) Controller(9) Graphics core [64](9) VRAM(9) PCB (GPU)(9) MOSFET(9) DRAM [1024](9) PCB (RAM)(9) HEAD(9) SPINDLE(9) ACTUATOR(9) PLATTER(9) NAND Flash(9) Controller(9) CACHE(9) SATA(9) Kondík(9) PCB (PSU)(9) Intel D975XBX (Pentium)(9) Abit IP35 (Core)(9) Asus P5Q Deluxe (Core)(9) Asus EVGA 132-CK-NF78-A1 (Core)(9) Asus P7P55D Deluxe (Nehalem)(9) EVGA P55 Classified (Nehalem)(9) EVGA X58 Classified 4x SLI (Nehalem)(9) ASUS H61-PLUS (Sandy Bridge)(9) MSI Z68A-GD65 (Sandy Bridge)(9) ASRock X79 Extreme11 (Sandy Bridge)(9) MSI B75A-G43 (Ivy Bridge)(9) Gigabyte GA-Z77X-UP7 (Ivy Bridge)(9) MSI Big Bang XPower II (Ivy Bridge)(9) GIGABYTE GA-B85M-D3H (Haswell)(9) Gigabyte GA-Z97X-UD5H (Haswell)(9) ASUS ROG RAMPAGE V EXTREME (Haswell)(9) Pentium 4 630 (Pentium)(9) Pentium D 960 (Pentium)(9) Celeron E3500 (Core)(9) Pentium E5500 (Core)(9) Core 2 Duo E8400 (Core)(9) Core 2 Quad Q9300 (Core)(9) Core 2 Quad Q9650 (Core)(9) Core i3 550 (Nehalem)(9) Core i5 760 (Nehalem)(9) Core i7 950 (Nehalem)(9) Core i7-E 980x (Nehalem)(9) Pentium G645 (Sandy Bridge)(9) Core i5 2500k (Sandy Bridge)(9) Core i7 2700k (Sandy Bridge)(9) Core i7-E 3930k (Sandy Bridge)(9) Pentium G2130 (Ivy Bridge)(9) Core i3 3220 (Ivy Bridge)(9) Core i5 3350P (Ivy Bridge)(9) Core i5 3570K (Ivy Bridge)(9) Core i7 3770K (Ivy Bridge)(9) Pentium G3258 (Haswell)(9) Core i5 4690K (Haswell)(9) Xeon 1230 v3 (Haswell)(9) Core i7 4790K (Haswell)(9) Core i7-E 5930K (Haswell)(9) Core i7-E 5960X (Haswell)(9) Xeon 2699 v3 (Haswell)(9) nVidia 6800 Ultra(9) AMD x850 XT PE(9) nVidia 7600 GT(9) AMD x1950 XT(9) nVidia 7950 GX2(9) nVidia 8600 GT(9) nVidia 9600 GT(9) AMD 2900 XT(9) AMD 3870(9) nVidia 9800 GTX(9) nVidia 8800 Ultra(9) nVidia 260(9) nVidia 285(9) nVidia 9800 GX2(9) AMD 3870(9) AMD 3870x2(9) nVidia 465(9) nVidia 640(9) AMD 5870(9) nVidia 480(9) AMD 6870(9) nVidia 750ti(9) nVidia 295(9) AMD 4870x2(9) nVidia 560ti(9) nVidia 660ti(9) nVidia 960(9) nVidia 580(9) AMD 6970(9) nVidia 760(9) nVidia 680(9) AMD 7970(9) AMD 280X(9) nVidia 770(9) AMD 5970(9) AMD 290X(9) nVidia 590(9) nVidia Titan(9) nVidia 970(9) nVidia 780ti(9) nVidia 980ti(9) nVidia Titan X(9) AMD 7990(9) nVidia 690(9) AMD 295X2(9) nVidia Titan Z(9) Kingston 1GB(9) Kingston 2GB(9) Crucial Ballistix 4GB(9) Kingston 8GB HyperX Fury(9) WD Green(9) WD Blue(9) WD Black(9) WD VelociRaptor(9) Crucial MX200 64 GB(9) SAMSUNG 850 PRO 128 GB(9) Crucial MX200 256 GB(9) Intel 730 512 GB(9) Kingston KC 960 1024 GB(9) SAMSUNG 850 PRO 2048 GB(9) Corsair CX430(9) Corsair RM450(9) Corsair CX500(9) Corsair CS550(9) Seasonic G550W(9) Seasonic P660(9) Corsair HX750(9) Enermax Platimax 850W(9) Corsair HX1000i(9) Seasonic X1250(9) Corsair AX1500i(9) )'),
(1436646554, 1, 'Použit kupón rkla4wh2 (Peníze(99) Železo(99) Měď(999) Zlato(99) Křemík(9) Northbridge(9) Southbridge(9) Flash Bios(9) RAM slots(9) PCI-e(9) Core(9) L3 Cache(9) Graphics(9) Controller(9) Graphics core [64](9) VRAM(9) PCB (GPU)(9) MOSFET(9) DRAM [1024](9) PCB (RAM)(9) HEAD(9) SPINDLE(9) ACTUATOR(9) PLATTER(9) NAND Flash(9) Controller(9) CACHE(9) SATA(9) Kondík(9) PCB (PSU)(9) Intel D975XBX (Pentium)(9) Abit IP35 (Core)(9) Asus P5Q Deluxe (Core)(9) Asus EVGA 132-CK-NF78-A1 (Core)(9) Asus P7P55D Deluxe (Nehalem)(9) EVGA P55 Classified (Nehalem)(9) EVGA X58 Classified 4x SLI (Nehalem)(9) ASUS H61-PLUS (Sandy Bridge)(9) MSI Z68A-GD65 (Sandy Bridge)(9) ASRock X79 Extreme11 (Sandy Bridge)(9) MSI B75A-G43 (Ivy Bridge)(9) Gigabyte GA-Z77X-UP7 (Ivy Bridge)(9) MSI Big Bang XPower II (Ivy Bridge)(9) GIGABYTE GA-B85M-D3H (Haswell)(9) Gigabyte GA-Z97X-UD5H (Haswell)(9) ASUS ROG RAMPAGE V EXTREME (Haswell)(9) Pentium 4 630 (Pentium)(9) Pentium D 960 (Pentium)(9) Celeron E3500 (Core)(9) Pentium E5500 (Core)(9) Core 2 Duo E8400 (Core)(9) Core 2 Quad Q9300 (Core)(9) Core 2 Quad Q9650 (Core)(9) Core i3 550 (Nehalem)(9) Core i5 760 (Nehalem)(9) Core i7 950 (Nehalem)(9) Core i7-E 980x (Nehalem)(9) Pentium G645 (Sandy Bridge)(9) Core i5 2500k (Sandy Bridge)(9) Core i7 2700k (Sandy Bridge)(9) Core i7-E 3930k (Sandy Bridge)(9) Pentium G2130 (Ivy Bridge)(9) Core i3 3220 (Ivy Bridge)(9) Core i5 3350P (Ivy Bridge)(9) Core i5 3570K (Ivy Bridge)(9) Core i7 3770K (Ivy Bridge)(9) Pentium G3258 (Haswell)(9) Core i5 4690K (Haswell)(9) Xeon 1230 v3 (Haswell)(9) Core i7 4790K (Haswell)(9) Core i7-E 5930K (Haswell)(9) Core i7-E 5960X (Haswell)(9) Xeon 2699 v3 (Haswell)(9) nVidia 6800 Ultra(9) AMD x850 XT PE(9) nVidia 7600 GT(9) AMD x1950 XT(9) nVidia 7950 GX2(9) nVidia 8600 GT(9) nVidia 9600 GT(9) AMD 2900 XT(9) AMD 3870(9) nVidia 9800 GTX(9) nVidia 8800 Ultra(9) nVidia 260(9) nVidia 285(9) nVidia 9800 GX2(9) AMD 3870(9) AMD 3870x2(9) nVidia 465(9) nVidia 640(9) AMD 5870(9) nVidia 480(9) AMD 6870(9) nVidia 750ti(9) nVidia 295(9) AMD 4870x2(9) nVidia 560ti(9) nVidia 660ti(9) nVidia 960(9) nVidia 580(9) AMD 6970(9) nVidia 760(9) nVidia 680(9) AMD 7970(9) AMD 280X(9) nVidia 770(9) AMD 5970(9) AMD 290X(9) nVidia 590(9) nVidia Titan(9) nVidia 970(9) nVidia 780ti(9) nVidia 980ti(9) nVidia Titan X(9) AMD 7990(9) nVidia 690(9) AMD 295X2(9) nVidia Titan Z(9) Kingston 1GB(9) Kingston 2GB(9) Crucial Ballistix 4GB(9) Kingston 8GB HyperX Fury(9) WD Green(9) WD Blue(9) WD Black(9) WD VelociRaptor(9) Crucial MX200 64 GB(9) SAMSUNG 850 PRO 128 GB(9) Crucial MX200 256 GB(9) Intel 730 512 GB(9) Kingston KC 960 1024 GB(9) SAMSUNG 850 PRO 2048 GB(9) Corsair CX430(9) Corsair RM450(9) Corsair CX500(9) Corsair CS550(9) Seasonic G550W(9) Seasonic P660(9) Corsair HX750(9) Enermax Platimax 850W(9) Corsair HX1000i(9) Seasonic X1250(9) Corsair AX1500i(9) )'),
(1436651633, 1, 'Složena sestava Intel D975XBX (Pentium)(1x) Pentium D 960 (Pentium)(1x) AMD x850 XT PE(1x) Kingston 1GB(1x) WD Green(1x) Corsair CX430(1x)  o výkonu 80 a spotřebě 189 W.'),
(1436651661, 1, 'Rozebrána sestava Intel D975XBX (Pentium)(1x) Pentium D 960 (Pentium)(1x) AMD x850 XT PE(1x) Kingston 1GB(1x) WD Green(1x) Corsair CX430(1x)  o výkonu 80 a spotřebě 189 W.'),
(1436651667, 1, 'Rozebrána sestava Intel D975XBX (Pentium)(1x) Pentium D 960 (Pentium)(1x) AMD x850 XT PE(1x) Kingston 1GB(1x) WD Green(1x) Corsair CX430(1x)  o výkonu 80 a spotřebě 189 W.'),
(1436651673, 1, 'Rozebrána sestava Intel D975XBX (Pentium)(1x) Pentium D 960 (Pentium)(1x) AMD x850 XT PE(1x) Kingston 1GB(1x) WD Green(1x) Corsair CX430(1x)  o výkonu 80 a spotřebě 189 W.'),
(1436652352, 1, 'Složena sestava Intel D975XBX (Pentium)(1x) Pentium D 960 (Pentium)(1x) AMD x850 XT PE(1x) Kingston 1GB(1x) WD Green(1x) Corsair CX430(1x)  o výkonu 20 a spotřebě 189 W.'),
(1436652357, 1, 'Rozebrána sestava Intel D975XBX (Pentium)(1x) Pentium 4 630 (Pentium)(1x) nVidia 6800 Ultra(2x) Crucial Ballistix 4GB(1x) WD VelociRaptor(1x) Corsair CS550(1x)  o výkonu 1 a spotřebě 289 W.'),
(1436652360, 1, 'Rozebrána sestava Abit IP35 (Core)(1x) Pentium E5500 (Core)(1x) AMD 2900 XT(1x) Kingston 2GB(4x) Kingston KC 960 1024 GB(1x) Enermax Platimax 850W(1x)  o výkonu 1 a spotřebě 295 W.'),
(1436652362, 1, 'Rozebrána sestava Intel D975XBX (Pentium)(1x) Pentium D 960 (Pentium)(1x) AMD x850 XT PE(1x) Kingston 1GB(1x) WD Green(1x) Corsair CX430(1x)  o výkonu 80 a spotřebě 189 W.'),
(1436653289, 1, 'Složena sestava Abit IP35 (Core)(1x) Pentium E5500 (Core)(1x) AMD x850 XT PE(1x) Kingston 2GB(4x) WD Blue(1x) Corsair RM450(1x)  o výkonu 208 a spotřebě 170 W.'),
(1436653324, 1, 'Sestava Abit IP35 (Core)(1x) Pentium E5500 (Core)(1x) AMD x850 XT PE(1x) Kingston 2GB(4x) WD Blue(1x) Corsair RM450(1x)  o výkonu 208 a spotřebě 170 W přepnuta na výzkum.'),
(1436653326, 1, 'Sestava Abit IP35 (Core)(1x) Pentium E5500 (Core)(1x) AMD x850 XT PE(1x) Kingston 2GB(4x) WD Blue(1x) Corsair RM450(1x)  o výkonu 208 a spotřebě 170 W přepnuta na body.'),
(1436654547, 1, 'Složena sestava Asus EVGA 132-CK-NF78-A1 (Core)(1x) Core 2 Quad Q9650 (Core)(1x) nVidia 660ti(1x) Kingston 2GB(1x) WD Blue(1x) Corsair CX430(1x)  o výkonu 467.2 a spotřebě 256 W.'),
(1436654555, 1, 'Rozebrána sestava Abit IP35 (Core)(1x) Pentium E5500 (Core)(1x) AMD x850 XT PE(1x) Kingston 2GB(4x) WD Blue(1x) Corsair RM450(1x)  o výkonu 208 a spotřebě 170 W.'),
(1436655087, 1, 'Složena sestava EVGA X58 Classified 4x SLI (Nehalem)(1x) Core i7-E 980x (Nehalem)(1x) AMD 295X2(1x) Kingston 2GB(1x) WD Black(1x) Corsair CX500(1x)  o výkonu 0 a spotřebě 643 W.'),
(1436655096, 1, 'Rozebrána sestava EVGA X58 Classified 4x SLI (Nehalem)(1x) Core i7-E 980x (Nehalem)(1x) AMD 295X2(1x) Kingston 2GB(1x) WD Black(1x) Corsair CX500(1x)  o výkonu 0 a spotřebě 643 W.'),
(1436655513, 1, 'Složena sestava EVGA X58 Classified 4x SLI (Nehalem)(1x) Core i5 760 (Nehalem)(1x) AMD 5970(1x) Crucial Ballistix 4GB(1x) WD Black(1x) Corsair CX500(1x)  o výkonu 1224 a spotřebě 408 W.'),
(1436658787, 1, 'Složena sestava Abit IP35 (Core)(1x) Core 2 Duo E8400 (Core)(1x) nVidia 7600 GT(1x) Crucial Ballistix 4GB(4x) WD Black(1x) Corsair CX500(1x)  o výkonu 470.4 a spotřebě 152 W.'),
(1436658809, 1, 'Složena sestava Asus P7P55D Deluxe (Nehalem)(1x) Core i7-E 980x (Nehalem)(1x) nVidia 6800 Ultra(3x) Kingston 1GB(4x) WD Green(1x) Corsair CX430(1x)  o výkonu 0 a spotřebě 433 W.'),
(1436658826, 1, 'Rozebrána sestava Asus P7P55D Deluxe (Nehalem)(1x) Core i7-E 980x (Nehalem)(1x) nVidia 6800 Ultra(3x) Kingston 1GB(4x) WD Green(1x) Corsair CX430(1x)  o výkonu 0 a spotřebě 433 W.'),
(1436658827, 1, 'Rozebrána sestava Abit IP35 (Core)(1x) Core 2 Duo E8400 (Core)(1x) nVidia 7600 GT(1x) Crucial Ballistix 4GB(4x) WD Black(1x) Corsair CX500(1x)  o výkonu 470 a spotřebě 152 W.'),
(1436658830, 1, 'Rozebrána sestava Asus EVGA 132-CK-NF78-A1 (Core)(1x) Core 2 Quad Q9650 (Core)(1x) nVidia 660ti(1x) Kingston 2GB(1x) WD Blue(1x) Corsair CX430(1x)  o výkonu 467 a spotřebě 256 W.'),
(1436658831, 1, 'Rozebrána sestava Intel D975XBX (Pentium)(1x) Pentium D 960 (Pentium)(1x) AMD x850 XT PE(1x) Kingston 1GB(1x) WD Green(1x) Corsair CX430(1x)  o výkonu 20 a spotřebě 189 W.'),
(1436658832, 1, 'Rozebrána sestava EVGA X58 Classified 4x SLI (Nehalem)(1x) Core i5 760 (Nehalem)(1x) AMD 5970(1x) Crucial Ballistix 4GB(1x) WD Black(1x) Corsair CX500(1x)  o výkonu 1224 a spotřebě 408 W.'),
(1436659035, 1, 'Složena sestava MSI Z68A-GD65 (Sandy Bridge)(1x) Core i5 2500k (Sandy Bridge)(1x) nVidia Titan X(1x) Kingston 8GB HyperX Fury(1x) Kingston KC 960 1024 GB(1x) Corsair CX500(1x)  o výkonu 5280 a spotřebě 351 W.'),
(1436659728, 1, 'Složena sestava Asus P7P55D Deluxe (Nehalem)(1x) Core i7-E 980x (Nehalem)(1x) nVidia 6800 Ultra(3x) Kingston 1GB(4x) WD Green(1x) Corsair CX430(1x)  o výkonu 0 a spotřebě 433 W.'),
(1436659741, 1, 'Rozebrána sestava Asus P7P55D Deluxe (Nehalem)(1x) Core i7-E 980x (Nehalem)(1x) nVidia 6800 Ultra(3x) Kingston 1GB(4x) WD Green(1x) Corsair CX430(1x)  o výkonu 0 a spotřebě 433 W.'),
(1436688248, 1, 'Spuštěna výroba 1x Northbridge'),
(1436688250, 1, 'Spuštěna výroba 1x Southbridge'),
(1436688297, 1, 'Složena sestava EVGA X58 Classified 4x SLI (Nehalem)(1x) Core i7-E 980x (Nehalem)(1x) nVidia 6800 Ultra(2x) nVidia 7600 GT(2x) Kingston 1GB(6x) WD Green(1x) Corsair HX1000i(1x)  o výkonu 73.6 a spotřebě 474 W.'),
(1436688461, 1, 'Dokončena výroba 1x Northbridge'),
(1436688461, 1, 'Dokončena výroba 1x Southbridge'),
(1436689157, 1, 'Složena sestava Gigabyte GA-Z77X-UP7 (Ivy Bridge)(1x) Core i5 3350P (Ivy Bridge)(1x) nVidia Titan(2x) AMD 295X2(2x) Kingston 8GB HyperX Fury(4x) SAMSUNG 850 PRO 2048 GB(1x) Corsair AX1500i(1x)  o výkonu 0 a spotřebě 1584 W.'),
(1436689175, 1, 'Rozebrána sestava EVGA X58 Classified 4x SLI (Nehalem)(1x) Core i7-E 980x (Nehalem)(1x) nVidia 6800 Ultra(2x) nVidia 7600 GT(2x) Kingston 1GB(6x) WD Green(1x) Corsair HX1000i(1x)  o výkonu 74 a spotřebě 474 W.'),
(1436689177, 1, 'Rozebrána sestava MSI Z68A-GD65 (Sandy Bridge)(1x) Core i5 2500k (Sandy Bridge)(1x) nVidia Titan X(1x) Kingston 8GB HyperX Fury(1x) Kingston KC 960 1024 GB(1x) Corsair CX500(1x)  o výkonu 5280 a spotřebě 351 W.'),
(1436689178, 1, 'Rozebrána sestava Gigabyte GA-Z77X-UP7 (Ivy Bridge)(1x) Core i5 3350P (Ivy Bridge)(1x) nVidia Titan(2x) AMD 295X2(2x) Kingston 8GB HyperX Fury(4x) SAMSUNG 850 PRO 2048 GB(1x) Corsair AX1500i(1x)  o výkonu 0 a spotřebě 1584 W.'),
(1436689353, 1, 'Složena sestava Gigabyte GA-Z97X-UD5H (Haswell)(1x) Core i7 4790K (Haswell)(1x) AMD x850 XT PE(3x) Crucial Ballistix 4GB(2x) WD Black(1x) Corsair AX1500i(1x)  o výkonu 312 a spotřebě 359 W.'),
(1436689362, 1, 'Rozebrána sestava Gigabyte GA-Z97X-UD5H (Haswell)(1x) Core i7 4790K (Haswell)(1x) AMD x850 XT PE(3x) Crucial Ballistix 4GB(2x) WD Black(1x) Corsair AX1500i(1x)  o výkonu 312 a spotřebě 359 W.'),
(1436689423, 1, 'Složena sestava Asus EVGA 132-CK-NF78-A1 (Core)(1x) Core 2 Quad Q9300 (Core)(1x) nVidia 9800 GTX(1x) AMD 4870x2(1x) AMD 6970(1x) Crucial Ballistix 4GB(4x) WD Black(1x) Seasonic X1250(1x)  o výkonu 2352 a spotřebě 767 W.'),
(1436689452, 1, 'Složena sestava GIGABYTE GA-B85M-D3H (Haswell)(1x) Core i7 4790K (Haswell)(1x) nVidia 9600 GT(1x) Crucial Ballistix 4GB(1x) SAMSUNG 850 PRO 2048 GB(1x) Seasonic G550W(1x)  o výkonu 756 a spotřebě 190 W.'),
(1436690023, 1, 'Složena sestava Gigabyte GA-Z77X-UP7 (Ivy Bridge)(1x) Core i7 3770K (Ivy Bridge)(1x) nVidia Titan Z(1x) Kingston 8GB HyperX Fury(2x) SAMSUNG 850 PRO 128 GB(1x) Corsair CS550(1x)  o výkonu 7000 a spotřebě 461 W.');

-- --------------------------------------------------------

--
-- Table structure for table `obchod`
--

CREATE TABLE IF NOT EXISTS `obchod` (
  `idnab` int(11) NOT NULL,
  `hrac` int(11) NOT NULL,
  `nabizi` int(11) NOT NULL,
  `mnoznabizi` int(11) NOT NULL,
  `chce` int(11) NOT NULL,
  `mnozchce` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=309 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `obchod`
--

INSERT INTO `obchod` (`idnab`, `hrac`, `nabizi`, `mnoznabizi`, `chce`, `mnozchce`) VALUES
(159, 3, 1, 15, 2, 10),
(161, 3, 1, 15, 2, 10),
(162, 3, 1, 15, 2, 10),
(163, 3, 1, 15, 2, 10),
(164, 3, 1, 15, 2, 10),
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
(296, 3, 1, 15, 2, 10),
(297, 3, 1, 15, 2, 10),
(298, 3, 1, 15, 2, 10),
(299, 3, 1, 15, 2, 10),
(300, 3, 1, 15, 2, 10),
(303, 1, 5, 1, 0, 1),
(304, 1, 10, 1, 7, 1),
(305, 1, 40, 1, 3, 1000),
(306, 1, 33, 1, 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `recepty`
--

CREATE TABLE IF NOT EXISTS `recepty` (
  `idreceptu` int(11) NOT NULL,
  `vyrobek` int(11) NOT NULL,
  `suroviny` varchar(500) NOT NULL,
  `doba` int(11) NOT NULL,
  `vyzkum` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recepty`
--

INSERT INTO `recepty` (`idreceptu`, `vyrobek`, `suroviny`, `doba`, `vyzkum`) VALUES
(1, 5, '0;180;60;2;6;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(2, 6, '0;206;69;2;7;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(3, 7, '0;480;160;5;16;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(4, 8, '0;360;120;4;12;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(5, 9, '0;720;240;8;24;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(6, 10, '0;1200;400;13;40;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(7, 11, '0;900;300;10;30;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(8, 12, '0;3600;1200;40;120;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(9, 13, '0;1800;600;20;60;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(10, 14, '0;90;30;1;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(11, 15, '0;179;60;2;6;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(12, 16, '0;450;150;5;15;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(13, 17, '0;180;60;2;6;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(14, 18, '0;781;261;9;27;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(15, 19, '0;249;83;3;9;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(16, 20, '0;92;31;2;4;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(17, 21, '0;497;166;6;17;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(18, 22, '0;92;31;2;4;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(19, 23, '0;90;30;1;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(20, 24, '0;4594;1531;51;153;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(21, 25, '0;3063;1021;34;102;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(22, 26, '0;444;148;5;15;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(23, 27, '0;179;60;2;6;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(24, 28, '0;90;30;1;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(25, 29, '0;113;38;2;4;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(26, 30, '0;0;0;0;0;50;40;2;4;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 1),
(27, 31, '0;0;0;0;0;60;45;2;4;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(28, 32, '0;0;0;0;0;80;60;3;4;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(29, 33, '0;0;0;0;0;95;80;4;4;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(30, 34, '0;0;0;0;0;13;10;3;4;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(31, 35, '0;0;0;0;0;16;15;4;4;4;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(32, 36, '0;0;0;0;0;20;20;4;6;4;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(33, 37, '0;0;0;0;0;7;4;2;2;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(34, 38, '0;0;0;0;0;14;11;3;4;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(35, 39, '0;0;0;0;0;20;20;6;8;4;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(36, 40, '0;0;0;0;0;9;7;2;4;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(37, 41, '0;0;0;0;0;16;12;4;4;4;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(38, 42, '0;0;0;0;0;20;20;6;8;4;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(39, 43, '0;0;0;0;0;11;9;2;4;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(40, 44, '0;0;0;0;0;16;14;4;4;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(41, 45, '0;0;0;0;0;20;20;6;8;4;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(42, 46, '0;0;0;0;0;0;0;0;0;0;2;2;0;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 1),
(43, 47, '0;0;0;0;0;0;0;0;0;0;2;4;0;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 1),
(44, 48, '0;0;0;0;0;0;0;0;0;0;1;1;0;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(45, 49, '0;0;0;0;0;0;0;0;0;0;2;2;0;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(46, 50, '0;0;0;0;0;0;0;0;0;0;2;6;0;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(47, 51, '0;0;0;0;0;0;0;0;0;0;4;6;0;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(48, 52, '0;0;0;0;0;0;0;0;0;0;4;12;0;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 2),
(49, 53, '0;0;0;0;0;0;0;0;0;0;4;4;0;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 3),
(50, 54, '0;0;0;0;0;0;0;0;0;0;4;8;0;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 3),
(51, 55, '0;0;0;0;0;0;0;0;0;0;8;8;0;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 3),
(52, 56, '0;0;0;0;0;0;0;0;0;0;12;12;0;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 3),
(53, 57, '0;0;0;0;0;0;0;0;0;0;2;3;1;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 4),
(54, 58, '0;0;0;0;0;0;0;0;0;0;4;6;2;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 4),
(55, 59, '0;0;0;0;0;0;0;0;0;0;8;8;2;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 4),
(56, 60, '0;0;0;0;0;0;0;0;0;0;12;12;0;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 4),
(57, 61, '0;0;0;0;0;0;0;0;0;0;2;3;1;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 5),
(58, 62, '0;0;0;0;0;0;0;0;0;0;4;3;2;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 5),
(59, 63, '0;0;0;0;0;0;0;0;0;0;4;6;0;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 5),
(60, 64, '0;0;0;0;0;0;0;0;0;0;4;6;2;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 5),
(61, 65, '0;0;0;0;0;0;0;0;0;0;8;8;2;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 5),
(62, 66, '0;0;0;0;0;0;0;0;0;0;2;3;1;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 6),
(63, 67, '0;0;0;0;0;0;0;0;0;0;4;6;2;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 6),
(64, 68, '0;0;0;0;0;0;0;0;0;0;8;8;0;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 6),
(65, 69, '0;0;0;0;0;0;0;0;0;0;8;8;2;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 6),
(66, 70, '0;0;0;0;0;0;0;0;0;0;12;15;0;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 6),
(67, 71, '0;0;0;0;0;0;0;0;0;0;16;20;0;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 6),
(68, 72, '0;0;0;0;0;0;0;0;0;0;36;45;0;4;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 6),
(69, 73, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;2;8;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(70, 74, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;4;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(71, 75, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;4;2;6;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(72, 76, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;8;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(73, 77, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;2;16;4;14;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(74, 78, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;4;2;8;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(75, 79, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;8;2;9;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(76, 80, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;5;8;3;21;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(77, 81, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;5;8;3;10;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(78, 82, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;2;8;3;14;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(79, 83, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;10;12;3;14;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(80, 84, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;3;14;2;18;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(81, 85, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;4;16;3;20;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(82, 86, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;4;16;4;19;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(83, 87, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;13;16;3;15;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(84, 88, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;10;16;4;22;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(85, 89, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;6;16;2;10;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(86, 90, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;6;16;1;4;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(87, 91, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;25;16;3;18;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(88, 92, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;8;25;3;27;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(89, 93, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;18;16;3;14;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(90, 94, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;10;32;1;6;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(91, 95, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;8;28;4;28;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(92, 96, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;25;32;4;30;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(93, 97, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;7;20;2;21;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(94, 98, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;21;32;2;15;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(95, 99, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;16;32;1;12;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(96, 100, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;8;25;3;24;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(97, 101, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;24;32;3;21;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(98, 102, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;18;32;2;17;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(99, 103, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;24;32;2;19;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(100, 104, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;32;48;2;25;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(101, 105, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;32;64;2;25;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(102, 106, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;24;32;2;23;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(103, 107, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;50;32;4;30;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(104, 108, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;44;64;3;25;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(105, 109, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;16;48;4;36;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(106, 110, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;42;96;3;25;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(107, 111, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;26;64;2;14;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(108, 112, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;45;48;3;25;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(109, 113, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;44;96;3;25;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(110, 114, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;48;192;3;25;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(111, 115, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;64;96;4;37;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(112, 116, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;48;64;4;30;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(113, 117, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;88;128;4;50;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(114, 118, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;90;192;4;37;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(115, 119, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(116, 120, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;2;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(117, 121, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;4;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(118, 122, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;8;4;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(119, 123, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;1;1;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(120, 124, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;5;2;5;5;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(121, 125, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;15;3;15;15;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(122, 126, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;30;5;30;30;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(123, 127, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;1;32;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(124, 128, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;2;2;64;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(125, 129, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;4;4;64;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(126, 130, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;8;8;128;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(127, 131, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;16;16;256;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(128, 132, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;32;32;512;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(129, 133, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;43;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(130, 134, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;45;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(131, 135, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;50;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(132, 136, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;55;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(133, 137, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;55;2;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(134, 138, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;66;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(135, 139, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;75;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(136, 140, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;85;3;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(137, 141, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;100;4;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(138, 142, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;125;4;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0),
(139, 143, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;150;5;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0', 60, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sestavy`
--

CREATE TABLE IF NOT EXISTS `sestavy` (
  `idsestavy` int(11) NOT NULL,
  `hrac` int(11) NOT NULL,
  `vykon` int(11) NOT NULL,
  `spotreba` int(11) NOT NULL,
  `obsah` varchar(500) NOT NULL,
  `sbercas` int(11) NOT NULL,
  `vyzkum` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sestavy`
--

INSERT INTO `sestavy` (`idsestavy`, `hrac`, `vykon`, `spotreba`, `obsah`, `sbercas`, `vyzkum`) VALUES
(72, 1, 2352, 767, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;4;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0', 1436691188, 0),
(73, 1, 756, 190, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;1;0;0;0;0;0;0', 1436691188, 0),
(74, 1, 7000, 461, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;1;0;0;0;2;0;0;0;0;0;1;0;0;0;0;0;0;0;1;0;0;0;0;0;0;0', 1436691188, 0);

-- --------------------------------------------------------

--
-- Table structure for table `veci`
--

CREATE TABLE IF NOT EXISTS `veci` (
  `idveci` int(11) NOT NULL,
  `nazev` varchar(50) NOT NULL,
  `typ` varchar(16) NOT NULL,
  `vykon` int(11) NOT NULL,
  `spotreba` int(11) NOT NULL,
  `socket` varchar(50) NOT NULL,
  `sloty` varchar(50) NOT NULL,
  `popis` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `veci`
--

INSERT INTO `veci` (`idveci`, `nazev`, `typ`, `vykon`, `spotreba`, `socket`, `sloty`, `popis`) VALUES
(0, '€', '', 0, 0, '', '', 'Základní prostředek pro směnu, počítač z ních ale neposkládáš.'),
(1, 'Železo', '', 0, 0, '', '', 'Surovina s chemickou značkou Fe.'),
(2, 'Měď', '', 0, 0, '', '', 'Surovina s chemickou značkou Cu.'),
(3, 'Zlato', '', 0, 0, '', '', 'Surovina s chemickou značkou Au.'),
(4, 'Kremík', '', 0, 0, '', '', 'Surovina s chemickou značkou Si.'),
(5, 'Northbridge', '', 0, 0, '', '', 'Súčiastka na základnú dosku.'),
(6, 'Southbridge', '', 0, 0, '', '', 'Súčiastka na základnú dosku.'),
(7, 'Flash Bios', '', 0, 0, '', '', 'Súčiastka na základnú dosku.'),
(8, 'RAM Sloty', '', 0, 0, '', '', 'Súčiastka na základnú dosku.'),
(9, 'PCI-e Sloty', '', 0, 0, '', '', 'Súčiastka na základnú dosku.'),
(10, 'Core', '', 0, 0, '', '', 'Súčiastka na základnú procesor.'),
(11, 'L3 Cache', '', 0, 0, '', '', 'Súčiastka na základnú procesor.'),
(12, 'Integreted Graphics', '', 0, 0, '', '', 'Súčiastka na základnú procesor.'),
(13, 'Controller', '', 0, 0, '', '', 'Súčiastka na základnú procesor.'),
(14, 'Graphics core [64]', '', 0, 0, '', '', 'Súčiastka na grafickú kartu.'),
(15, 'VRAM', '', 0, 0, '', '', 'Súčiastka na grafickú kartu.'),
(16, 'PCB (GPU)', '', 0, 0, '', '', 'Súčiastka na grafickú kartu.'),
(17, 'MOSFET', '', 0, 0, '', '', 'Súčiastka na grafickú kartu.'),
(18, 'DRAM [1024]', '', 0, 0, '', '', 'Súčiastka na RAM.'),
(19, 'PCB (RAM)', '', 0, 0, '', '', 'Súčiastka na RAM.'),
(20, 'HEAD', '', 0, 0, '', '', 'Súčiastka na HDD.'),
(21, 'SPINDLE', '', 0, 0, '', '', 'Súčiastka na HDD.'),
(22, 'ACTUATOR', '', 0, 0, '', '', 'Súčiastka na HDD.'),
(23, 'PLATTER', '', 0, 0, '', '', 'Súčiastka na HDD.'),
(24, 'NAND Flash', '', 0, 0, '', '', 'Súčiastka na SSD.'),
(25, 'Controller', '', 0, 0, '', '', 'Súčiastka na SSD.'),
(26, 'CACHE', '', 0, 0, '', '', 'Súčiastka na SSD.'),
(27, 'SATA', '', 0, 0, '', '', 'Súčiastka na SSD.'),
(28, 'Kondík', '', 0, 0, '', '', 'Súčiastka na Zdroj.'),
(29, 'PCB (PSU)', '', 0, 0, '', '', 'Súčiastka na Zdroj.'),
(30, 'Intel D975XBX (Pentium)', 'mb', 1, 0, 'Pentium', '4;3;1', 'Procesor architektúry Pentium'),
(31, 'Abit IP35 (Core)', 'mb', 1, 0, 'Core', '4;1;1', 'Procesor architektúry Core'),
(32, 'Asus P5Q Deluxe (Core)', 'mb', 1, 0, 'Core', '4;2;1', 'Procesor architektúry Core'),
(33, 'Asus EVGA 132-CK-NF78-A1 (Core)', 'mb', 1, 0, 'Core', '4;3;1', 'Procesor architektúry Core'),
(34, 'Asus P7P55D Deluxe (Nehalem)', 'mb', 1, 0, 'Nehalem', '4;3;1', 'Třída Nehalem'),
(35, 'EVGA P55 Classified (Nehalem)', 'mb', 1, 0, 'Nehalem', '4;4;1', 'Třída Nehalem'),
(36, 'EVGA X58 Classified 4x SLI (Nehalem)', 'mb', 1, 0, 'Nehalem', '6;4;1', 'Třída Nehalem'),
(37, 'ASUS H61-PLUS (Sandy Bridge)', 'mb', 1, 0, 'Sandy Bridge', '2;1;1', 'Třída Sandy Bridge'),
(38, 'MSI Z68A-GD65 (Sandy Bridge)', 'mb', 1, 0, 'Sandy Bridge', '4;2;1', 'Třída Sandy Bridge'),
(39, 'ASRock X79 Extreme11 (Sandy Bridge)', 'mb', 1, 0, 'Sandy Bridge', '8;4;1', 'Třída Sandy Bridge-E'),
(40, 'MSI B75A-G43 (Ivy Bridge)', 'mb', 1, 0, 'Ivy Bridge', '4;2;1', 'Třída Ivy Bridge'),
(41, 'Gigabyte GA-Z77X-UP7 (Ivy Bridge)', 'mb', 1, 0, 'Ivy Bridge', '4;4;1', 'Třída Ivy Bridge'),
(42, 'MSI Big Bang XPower II (Ivy Bridge)', 'mb', 1, 0, 'Ivy Bridge', '8;4;1', 'Třída Ivy Bridge-E'),
(43, 'GIGABYTE GA-B85M-D3H (Haswell)', 'mb', 1, 0, 'Haswell', '4;2;1', 'Třída Haswell'),
(44, 'Gigabyte GA-Z97X-UD5H (Haswell)', 'mb', 1, 0, 'Haswell', '4;3;1', 'Třída Haswell'),
(45, 'ASUS ROG RAMPAGE V EXTREME (Haswell)', 'mb', 1, 0, 'Haswell', '8;4;1', 'Třída Haswell-E'),
(46, 'Pentium 4 630 (Pentium)', 'cpu', 150, 84, 'Pentium', '', 'Pentium 4 630'),
(47, 'Pentium D 960 (Pentium)', 'cpu', 250, 95, 'Pentium', '', 'Pentium D 960'),
(48, 'Celeron E3500 (Core)', 'cpu', 450, 65, 'Core', '', 'Celeron E3500'),
(49, 'Pentium E5500 (Core)', 'cpu', 600, 65, 'Core', '', ''),
(50, 'Core 2 Duo E8400 (Core)', 'cpu', 850, 65, 'Core', '', ''),
(51, 'Core 2 Quad Q9300 (Core)', 'cpu', 1400, 95, 'Core', '', ''),
(52, 'Core 2 Quad Q9650 (Core)', 'cpu', 1500, 95, 'Core', '', ''),
(53, 'Core i3 550 (Nehalem)', 'cpu', 1150, 73, 'Nehalem', '', ''),
(54, 'Core i5 760 (Nehalem)', 'cpu', 1700, 95, 'Nehalem', '', ''),
(55, 'Core i7 950 (Nehalem)', 'cpu', 2150, 130, 'Nehalem', '', ''),
(56, 'Core i7-E 980x (Nehalem)', 'cpu', 2500, 130, 'Nehalem', '', ''),
(57, 'Pentium G645 (Sandy Bridge)', 'cpu', 750, 65, 'Sandy Bridge', '', ''),
(58, 'Core i5 2500k (Sandy Bridge)', 'cpu', 2200, 95, 'Sandy Bridge', '', ''),
(59, 'Core i7 2700k (Sandy Bridge)', 'cpu', 2600, 95, 'Sandy Bridge', '', ''),
(60, 'Core i7-E 3930k (Sandy Bridge)', 'cpu', 300, 130, 'Sandy Bridge', '', 'Sandy Bridge-E'),
(61, 'Pentium G2130 (Ivy Bridge)', 'cpu', 800, 55, 'Ivy Bridge', '', ''),
(62, 'Core i3 3220 (Ivy Bridge)', 'cpu', 1450, 55, 'Ivy Bridge', '', ''),
(63, 'Core i5 3350P (Ivy Bridge)', 'cpu', 1800, 69, 'Ivy Bridge', '', ''),
(64, 'Core i5 3570K (Ivy Bridge)', 'cpu', 2200, 77, 'Ivy Bridge', '', ''),
(65, 'Core i7 3770K (Ivy Bridge)', 'cpu', 2750, 77, 'Ivy Bridge', '', ''),
(66, 'Pentium G3258 (Haswell)', 'cpu', 1500, 53, 'Haswell', '', ''),
(67, 'Core i5 4690K (Haswell)', 'cpu', 2350, 88, 'Haswell', '', ''),
(68, 'Xeon 1230 v3 (Haswell)', 'cpu', 2750, 80, 'Haswell', '', ''),
(69, 'Core i7 4790K (Haswell)', 'cpu', 2750, 88, 'Haswell', '', ''),
(70, 'Core i7-E 5930K (Haswell)', 'cpu', 3250, 140, 'Haswell', '', 'Haswell-E'),
(71, 'Core i7-E 5960X (Haswell)', 'cpu', 3500, 140, 'Haswell', '', 'Haswell-E'),
(72, 'Xeon 2699 v3 (Haswell)', 'cpu', 5000, 145, 'Haswell', '', 'Haswell-E'),
(73, 'nVidia 6800 Ultra', 'gpu', 230, 95, '', '', 'popis gpu'),
(74, 'AMD x850 XT PE', 'gpu', 260, 85, '', '', 'popis gpu'),
(75, 'nVidia 7600 GT', 'gpu', 280, 65, '', '', 'popis gpu'),
(76, 'AMD x1950 XT', 'gpu', 300, 125, '', '', 'popis gpu'),
(77, 'nVidia 7950 GX2', 'gpu', 370, 143, '', '', 'popis gpu'),
(78, 'nVidia 8600 GT', 'gpu', 430, 80, '', '', 'popis gpu'),
(79, 'nVidia 9600 GT', 'gpu', 450, 96, '', '', 'popis gpu'),
(80, 'AMD 2900 XT', 'gpu', 500, 215, '', '', 'popis gpu'),
(81, 'AMD 3870', 'gpu', 600, 105, '', '', 'popis gpu'),
(82, 'nVidia 9800 GTX', 'gpu', 600, 140, '', '', 'popis gpu'),
(83, 'nVidia 8800 Ultra', 'gpu', 630, 140, '', '', 'popis gpu'),
(84, 'nVidia 260', 'gpu', 700, 182, '', '', 'popis gpu'),
(85, 'nVidia 285', 'gpu', 850, 204, '', '', 'popis gpu'),
(86, 'nVidia 9800 GX2', 'gpu', 900, 197, '', '', 'popis gpu'),
(87, 'AMD 3870', 'gpu', 900, 150, '', '', 'popis gpu'),
(88, 'AMD 3870x2', 'gpu', 980, 255, '', '', 'popis gpu'),
(89, 'nVidia 465', 'gpu', 1000, 105, '', '', 'popis gpu'),
(90, 'nVidia 640', 'gpu', 1100, 49, '', '', 'popis gpu'),
(91, 'AMD 5870', 'gpu', 1200, 188, '', '', 'popis gpu'),
(92, 'nVidia 480', 'gpu', 1300, 270, '', '', 'popis gpu'),
(93, 'AMD 6870', 'gpu', 1350, 140, '', '', 'popis gpu'),
(94, 'nVidia 750ti', 'gpu', 1350, 60, '', '', 'popis gpu'),
(95, 'nVidia 295', 'gpu', 1400, 289, '', '', 'popis gpu'),
(96, 'AMD 4870x2', 'gpu', 1400, 300, '', '', 'popis gpu'),
(97, 'nVidia 560ti', 'gpu', 1400, 210, '', '', 'popis gpu'),
(98, 'nVidia 660ti', 'gpu', 1460, 150, '', '', 'popis gpu'),
(99, 'nVidia 960', 'gpu', 1550, 120, '', '', 'popis gpu'),
(100, 'nVidia 580', 'gpu', 1560, 244, '', '', 'popis gpu'),
(101, 'AMD 6970', 'gpu', 1580, 210, '', '', 'popis gpu'),
(102, 'nVidia 760', 'gpu', 1580, 175, '', '', 'popis gpu'),
(103, 'nVidia 680', 'gpu', 1600, 190, '', '', 'popis gpu'),
(104, 'AMD 7970', 'gpu', 1630, 250, '', '', 'popis gpu'),
(105, 'AMD 280X', 'gpu', 1630, 250, '', '', 'popis gpu'),
(106, 'nVidia 770', 'gpu', 1650, 230, '', '', 'popis gpu'),
(107, 'AMD 5970', 'gpu', 1700, 300, '', '', 'popis gpu'),
(108, 'AMD 290X', 'gpu', 1850, 250, '', '', 'popis gpu'),
(109, 'nVidia 590', 'gpu', 1900, 365, '', '', 'popis gpu'),
(110, 'nVidia Titan', 'gpu', 1900, 250, '', '', 'popis gpu'),
(111, 'nVidia 970', 'gpu', 1900, 145, '', '', 'popis gpu'),
(112, 'nVidia 780ti', 'gpu', 1980, 250, '', '', 'popis gpu'),
(113, 'nVidia 980ti', 'gpu', 2100, 250, '', '', 'popis gpu'),
(114, 'nVidia Titan X', 'gpu', 2200, 250, '', '', 'popis gpu'),
(115, 'AMD 7990', 'gpu', 2300, 375, '', '', 'popis gpu'),
(116, 'nVidia 690', 'gpu', 2350, 300, '', '', 'popis gpu'),
(117, 'AMD 295X2', 'gpu', 2500, 500, '', '', 'popis gpu'),
(118, 'nVidia Titan Z', 'gpu', 2500, 375, '', '', 'popis gpu'),
(119, 'Kingston 1GB', 'ram', 1, 3, '', '', 'popis ram'),
(120, 'Kingston 2GB', 'ram', 2, 3, '', '', 'popis ram'),
(121, 'Crucial Ballistix 4GB', 'ram', 4, 3, '', '', 'popis ram'),
(122, 'Kingston 8GB HyperX Fury', 'ram', 8, 3, '', '', 'popis ram'),
(123, 'WD Green', 'hdd', 1, 6, '', '', 'popis hdd'),
(124, 'WD Blue', 'hdd', 2, 8, '', '', 'popis hdd'),
(125, 'WD Black', 'hdd', 3, 10, '', '', 'popis hdd'),
(126, 'WD VelociRaptor', 'hdd', 4, 12, '', '', 'popis hdd'),
(127, 'Crucial MX200 64 GB', 'hdd', 8, 3, '', '', 'popis ssd'),
(128, 'SAMSUNG 850 PRO 128 GB', 'hdd', 16, 3, '', '', 'popis ssd'),
(129, 'Crucial MX200 256 GB', 'hdd', 32, 3, '', '', 'popis ssd'),
(130, 'Intel 730 512 GB', 'hdd', 64, 3, '', '', 'popis ssd'),
(131, 'Kingston KC 960 1024 GB', 'hdd', 128, 3, '', '', 'popis ssd'),
(132, 'SAMSUNG 850 PRO 2048 GB', 'hdd', 256, 3, '', '', 'popis ssd'),
(133, 'Corsair CX430', 'psu', 430, 0, '', '', 'popis psu'),
(134, 'Corsair RM450', 'psu', 450, 0, '', '', 'popis psu'),
(135, 'Corsair CX500', 'psu', 500, 0, '', '', 'popis psu'),
(136, 'Corsair CS550', 'psu', 550, 0, '', '', 'popis psu'),
(137, 'Seasonic G550W', 'psu', 550, 0, '', '', 'popis psu'),
(138, 'Seasonic P660', 'psu', 660, 0, '', '', 'popis psu'),
(139, 'Corsair HX750', 'psu', 750, 0, '', '', 'popis psu'),
(140, 'Enermax Platimax 850W', 'psu', 850, 0, '', '', 'popis psu'),
(141, 'Corsair HX1000i', 'psu', 1000, 0, '', '', 'popis psu'),
(142, 'Seasonic X1250', 'psu', 1250, 0, '', '', 'popis psu'),
(143, 'Corsair AX1500i', 'psu', 1500, 0, '', '', 'popis psu');

-- --------------------------------------------------------

--
-- Table structure for table `vyroba`
--

CREATE TABLE IF NOT EXISTS `vyroba` (
  `idvyroby` int(11) NOT NULL,
  `hrac` int(11) NOT NULL,
  `recept` int(11) NOT NULL,
  `pocet` int(11) NOT NULL,
  `hotovo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vyzkumy`
--

CREATE TABLE IF NOT EXISTS `vyzkumy` (
  `idvyzkumu` int(11) NOT NULL,
  `nazev` varchar(200) NOT NULL,
  `body` bigint(11) NOT NULL,
  `popis` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vyzkumy`
--

INSERT INTO `vyzkumy` (`idvyzkumu`, `nazev`, `body`, `popis`) VALUES
(0, 'Základ', 0, 'Máš to jednoduché, počítač už za Vás vymysleli...'),
(1, 'Pentium', 0, 'Nejako sa začínať musí'),
(2, 'Core', 576000, 'Dostávate sa do dôb vlády Core 2 Quad'),
(3, 'Nehalem', 13455360, 'Core or not to core ? Whut ?'),
(4, 'Sandy Bridge', 35251200, 'Výrobné procesy blízkej minulosti.'),
(5, 'Ivy Bridge', 152064000, 'Moar...!'),
(6, 'Hashwell', 1000000000000000000, 'Unlock your bragging rights.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hraci`
--
ALTER TABLE `hraci`
  ADD PRIMARY KEY (`idhrace`),
  ADD UNIQUE KEY `id` (`idhrace`),
  ADD KEY `id_2` (`idhrace`);

--
-- Indexes for table `kupony`
--
ALTER TABLE `kupony`
  ADD PRIMARY KEY (`kod`),
  ADD UNIQUE KEY `kod` (`kod`),
  ADD KEY `kod_2` (`kod`),
  ADD KEY `kod_3` (`kod`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD KEY `cas` (`cas`);

--
-- Indexes for table `obchod`
--
ALTER TABLE `obchod`
  ADD PRIMARY KEY (`idnab`),
  ADD KEY `id` (`idnab`);

--
-- Indexes for table `recepty`
--
ALTER TABLE `recepty`
  ADD PRIMARY KEY (`idreceptu`),
  ADD KEY `id` (`idreceptu`);

--
-- Indexes for table `sestavy`
--
ALTER TABLE `sestavy`
  ADD PRIMARY KEY (`idsestavy`),
  ADD KEY `idsestavy` (`idsestavy`);

--
-- Indexes for table `veci`
--
ALTER TABLE `veci`
  ADD PRIMARY KEY (`idveci`),
  ADD UNIQUE KEY `id` (`idveci`),
  ADD KEY `id_2` (`idveci`);

--
-- Indexes for table `vyroba`
--
ALTER TABLE `vyroba`
  ADD PRIMARY KEY (`idvyroby`),
  ADD UNIQUE KEY `idvyroby` (`idvyroby`),
  ADD KEY `id` (`idvyroby`),
  ADD KEY `idvyroby_2` (`idvyroby`);

--
-- Indexes for table `vyzkumy`
--
ALTER TABLE `vyzkumy`
  ADD PRIMARY KEY (`idvyzkumu`),
  ADD UNIQUE KEY `idvyzkumu` (`idvyzkumu`),
  ADD KEY `idvyzkumu_2` (`idvyzkumu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hraci`
--
ALTER TABLE `hraci`
  MODIFY `idhrace` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `obchod`
--
ALTER TABLE `obchod`
  MODIFY `idnab` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=309;
--
-- AUTO_INCREMENT for table `recepty`
--
ALTER TABLE `recepty`
  MODIFY `idreceptu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `sestavy`
--
ALTER TABLE `sestavy`
  MODIFY `idsestavy` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `veci`
--
ALTER TABLE `veci`
  MODIFY `idveci` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `vyroba`
--
ALTER TABLE `vyroba`
  MODIFY `idvyroby` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `vyzkumy`
--
ALTER TABLE `vyzkumy`
  MODIFY `idvyzkumu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
