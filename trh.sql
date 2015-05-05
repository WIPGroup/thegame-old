-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vytvořeno: Úte 05. kvě 2015, 19:15
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
  `vlastnictvi` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `hraci`
--

INSERT INTO `hraci` (`idhrace`, `jmeno`, `heslo`, `vlastnictvi`) VALUES
(1, 'root', 'root', '176;260;79;137;0;0;0;0;0;0;16;0;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;5'),
(2, 'test1', 'test1', '343;402;371;11;0;0;0;0;0;0;0;0'),
(3, 'test2', 'test2', '647;341;346;2;0;0;0;0;0;0;0;0');

-- --------------------------------------------------------

--
-- Struktura tabulky `kupony`
--

CREATE TABLE IF NOT EXISTS `kupony` (
`idkuponu` int(11) NOT NULL,
  `kod` varchar(16) NOT NULL,
  `obsah` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `kupony`
--

INSERT INTO `kupony` (`idkuponu`, `kod`, `obsah`) VALUES
(1, 'f5g4df6g', '10;0;0;0;0;0;0;0;0;0;0;0');

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
(1430845254, 1, 'Vytvořena nabídka Iron(5) za Gold(5)');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=439 ;

--
-- Vypisuji data pro tabulku `obchod`
--

INSERT INTO `obchod` (`idnab`, `hrac`, `nabizi`, `mnoznabizi`, `chce`, `mnozchce`) VALUES
(14, 2, 1, 1000, 2, 1000),
(24, 3, 0, 23, 2, 500),
(128, 1, 0, 250, 4, 1),
(129, 1, 0, 13, 5, 1),
(152, 3, 1, 15, 2, 10),
(153, 3, 1, 15, 2, 10),
(154, 3, 1, 15, 2, 10),
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
(301, 3, 1, 15, 2, 10),
(302, 3, 1, 15, 2, 10),
(303, 3, 1, 15, 2, 10),
(304, 3, 1, 15, 2, 10),
(305, 3, 1, 15, 2, 10),
(306, 3, 1, 15, 2, 10),
(307, 3, 1, 15, 2, 10),
(308, 3, 1, 15, 2, 10),
(309, 3, 1, 15, 2, 10),
(310, 3, 1, 15, 2, 10),
(311, 3, 1, 15, 2, 10),
(312, 3, 1, 15, 2, 10),
(313, 3, 1, 15, 2, 10),
(314, 3, 1, 15, 2, 10),
(315, 3, 1, 15, 2, 10),
(316, 3, 1, 15, 2, 10),
(317, 3, 1, 15, 2, 10),
(318, 3, 1, 15, 2, 10),
(319, 3, 1, 15, 2, 10),
(320, 3, 1, 15, 2, 10),
(321, 3, 1, 15, 2, 10),
(322, 3, 1, 15, 2, 10),
(323, 3, 1, 15, 2, 10),
(324, 3, 1, 15, 2, 10),
(325, 3, 1, 15, 2, 10),
(326, 3, 1, 15, 2, 10),
(327, 3, 1, 15, 2, 10),
(328, 3, 1, 15, 2, 10),
(329, 3, 1, 15, 2, 10),
(330, 3, 1, 15, 2, 10),
(331, 3, 1, 15, 2, 10),
(332, 3, 1, 15, 2, 10),
(333, 3, 1, 15, 2, 10),
(334, 3, 1, 15, 2, 10),
(335, 3, 1, 15, 2, 10),
(336, 3, 1, 15, 2, 10),
(337, 3, 1, 15, 2, 10),
(338, 3, 1, 15, 2, 10),
(339, 3, 1, 15, 2, 10),
(340, 3, 1, 15, 2, 10),
(341, 3, 1, 15, 2, 10),
(342, 3, 1, 15, 2, 10),
(343, 3, 1, 15, 2, 10),
(344, 3, 1, 15, 2, 10),
(345, 3, 1, 15, 2, 10),
(346, 3, 1, 15, 2, 10),
(347, 3, 1, 15, 2, 10),
(348, 3, 1, 15, 2, 10),
(349, 3, 1, 15, 2, 10),
(350, 3, 1, 15, 2, 10),
(351, 3, 1, 15, 2, 10),
(352, 3, 1, 15, 2, 10),
(353, 3, 1, 15, 2, 10),
(354, 3, 1, 15, 2, 10),
(355, 3, 1, 15, 2, 10),
(356, 3, 1, 15, 2, 10),
(357, 3, 1, 15, 2, 10),
(358, 3, 1, 15, 2, 10),
(359, 3, 1, 15, 2, 10),
(360, 3, 1, 15, 2, 10),
(361, 3, 1, 15, 2, 10),
(362, 3, 1, 15, 2, 10),
(363, 3, 1, 15, 2, 10),
(364, 3, 1, 15, 2, 10),
(365, 3, 1, 15, 2, 10),
(366, 3, 1, 15, 2, 10),
(367, 3, 1, 15, 2, 10),
(368, 3, 1, 15, 2, 10),
(369, 3, 1, 15, 2, 10),
(370, 3, 1, 15, 2, 10),
(371, 3, 1, 15, 2, 10),
(372, 3, 1, 15, 2, 10),
(373, 3, 1, 15, 2, 10),
(374, 3, 1, 15, 2, 10),
(375, 3, 1, 15, 2, 10),
(376, 3, 1, 15, 2, 10),
(377, 3, 1, 15, 2, 10),
(378, 3, 1, 15, 2, 10),
(379, 3, 1, 15, 2, 10),
(380, 3, 1, 15, 2, 10),
(381, 3, 1, 15, 2, 10),
(382, 3, 1, 15, 2, 10),
(383, 3, 1, 15, 2, 10),
(384, 3, 1, 15, 2, 10),
(385, 3, 1, 15, 2, 10),
(386, 3, 1, 15, 2, 10),
(387, 3, 1, 15, 2, 10),
(388, 3, 1, 15, 2, 10),
(389, 3, 1, 15, 2, 10),
(390, 3, 1, 15, 2, 10),
(391, 3, 1, 15, 2, 10),
(392, 3, 1, 15, 2, 10),
(393, 3, 1, 15, 2, 10),
(394, 3, 1, 15, 2, 10),
(395, 3, 1, 15, 2, 10),
(396, 3, 1, 15, 2, 10),
(397, 3, 1, 15, 2, 10),
(398, 3, 1, 15, 2, 10),
(399, 3, 1, 15, 2, 10),
(400, 3, 1, 15, 2, 10),
(401, 3, 1, 15, 2, 10),
(402, 3, 1, 15, 2, 10),
(403, 3, 1, 15, 2, 10),
(404, 3, 1, 15, 2, 10),
(405, 3, 1, 15, 2, 10),
(406, 3, 1, 15, 2, 10),
(407, 3, 1, 15, 2, 10),
(408, 3, 1, 15, 2, 10),
(409, 3, 1, 15, 2, 10),
(410, 3, 1, 15, 2, 10),
(411, 3, 1, 15, 2, 10),
(412, 3, 1, 15, 2, 10),
(413, 3, 1, 15, 2, 10),
(414, 3, 1, 15, 2, 10),
(415, 3, 1, 15, 2, 10),
(416, 3, 1, 15, 2, 10),
(417, 3, 1, 15, 2, 10),
(418, 3, 1, 15, 2, 10),
(419, 3, 1, 15, 2, 10),
(420, 3, 1, 15, 2, 10),
(421, 3, 1, 15, 2, 10),
(422, 3, 1, 15, 2, 10),
(423, 3, 1, 15, 2, 10),
(424, 3, 1, 15, 2, 10),
(425, 3, 1, 15, 2, 10),
(426, 3, 1, 15, 2, 10),
(427, 3, 1, 15, 2, 10),
(428, 3, 1, 15, 2, 10),
(429, 3, 1, 15, 2, 10),
(430, 3, 1, 15, 2, 10),
(431, 3, 1, 15, 2, 10),
(432, 3, 1, 15, 2, 10),
(433, 3, 1, 15, 2, 10),
(434, 3, 1, 15, 2, 10),
(435, 3, 1, 15, 2, 10),
(436, 1, 1, 5, 2, 5),
(437, 1, 1, 5, 2, 5),
(438, 1, 1, 5, 2, 5);

-- --------------------------------------------------------

--
-- Struktura tabulky `recepty`
--

CREATE TABLE IF NOT EXISTS `recepty` (
`idreceptu` int(11) NOT NULL,
  `vyrobek` int(11) NOT NULL,
  `suroviny` varchar(500) NOT NULL,
  `doba` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `recepty`
--

INSERT INTO `recepty` (`idreceptu`, `vyrobek`, `suroviny`, `doba`) VALUES
(1, 10, '1;1;0;0;0;0;0;0;0;0;0;0', 10);

-- --------------------------------------------------------

--
-- Struktura tabulky `veci`
--

CREATE TABLE IF NOT EXISTS `veci` (
`idveci` int(11) NOT NULL,
  `nazev` varchar(50) NOT NULL,
  `typ` varchar(16) NOT NULL,
  `vykon` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Vypisuji data pro tabulku `veci`
--

INSERT INTO `veci` (`idveci`, `nazev`, `typ`, `vykon`) VALUES
(0, 'Money', '', 0),
(1, 'Gold', '', 0),
(2, 'Iron', '', 0),
(3, 'Silicon', '', 0),
(4, 'CPU-AMD', 'cpu', 2),
(5, 'CPU-Intel', 'cpu', 3),
(6, 'GPU', 'gpu', 5),
(7, 'HDD', 'hdd', 1),
(8, 'MemoryChip', '', 0),
(9, 'PSU', 'psu', 10),
(10, 'RAM', 'ram', 1),
(11, 'SSD', 'hdd', 2);

-- --------------------------------------------------------

--
-- Struktura tabulky `vyroba`
--

CREATE TABLE IF NOT EXISTS `vyroba` (
`idvyroby` int(11) NOT NULL,
  `hrac` int(11) NOT NULL,
  `recept` int(11) NOT NULL,
  `hotovo` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Vypisuji data pro tabulku `vyroba`
--

INSERT INTO `vyroba` (`idvyroby`, `hrac`, `recept`, `hotovo`) VALUES
(2, 1, 1, 1431750672);

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
 ADD PRIMARY KEY (`idkuponu`), ADD KEY `idkuponu` (`idkuponu`);

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
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `hraci`
--
ALTER TABLE `hraci`
MODIFY `idhrace` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pro tabulku `kupony`
--
ALTER TABLE `kupony`
MODIFY `idkuponu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `obchod`
--
ALTER TABLE `obchod`
MODIFY `idnab` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=439;
--
-- AUTO_INCREMENT pro tabulku `recepty`
--
ALTER TABLE `recepty`
MODIFY `idreceptu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `veci`
--
ALTER TABLE `veci`
MODIFY `idveci` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pro tabulku `vyroba`
--
ALTER TABLE `vyroba`
MODIFY `idvyroby` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
