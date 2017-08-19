-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 16 jan 2014 om 23:55
-- Serverversie: 5.6.14
-- PHP-versie: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `stapp`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `muziek`
--

CREATE TABLE IF NOT EXISTS `muziek` (
  `id_muziek` int(11) NOT NULL AUTO_INCREMENT,
  `muziek_genres` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_muziek`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Gegevens worden uitgevoerd voor tabel `muziek`
--

INSERT INTO `muziek` (`id_muziek`, `muziek_genres`) VALUES
(1, 'Dance'),
(2, 'Nederlandstalig'),
(3, 'Rock'),
(4, 'Pop'),
(5, 'Urban');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `soortevent`
--

CREATE TABLE IF NOT EXISTS `soortevent` (
  `soort_id` int(11) NOT NULL AUTO_INCREMENT,
  `soort_event` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`soort_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `soortevent`
--

INSERT INTO `soortevent` (`soort_id`, `soort_event`) VALUES
(1, 'DJ'),
(2, 'Live artiest'),
(3, 'Themafeest');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_cafe`
--

CREATE TABLE IF NOT EXISTS `tbl_cafe` (
  `caf_id` int(11) NOT NULL,
  `caf_naam` varchar(255) DEFAULT NULL,
  `caf_email` varchar(255) DEFAULT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL,
  `caf_adres` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`caf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `tbl_cafe`
--

INSERT INTO `tbl_cafe` (`caf_id`, `caf_naam`, `caf_email`, `wachtwoord`, `caf_adres`) VALUES
(1, 'de bakkerij', 'info@debakkerij.org', 'bdd42db035ce5b5ed256a74e49c9b291', 'stratumseind 95'),
(2, 'duck', 'duck@gmail.com', '6074cdcfe2404e445a8b0f674abe48f8', 'stratumseind 3');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_event`
--

CREATE TABLE IF NOT EXISTS `tbl_event` (
  `event_id` int(255) NOT NULL AUTO_INCREMENT,
  `event_type` varchar(255) DEFAULT NULL,
  `event_image` varchar(255) DEFAULT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_start_date` varchar(255) DEFAULT NULL,
  `event_end_date` varchar(255) DEFAULT NULL,
  `event_start_time` varchar(255) DEFAULT NULL,
  `event_end_time` varchar(255) DEFAULT NULL,
  `event_beschrijving` varchar(255) DEFAULT NULL,
  `event_muziek` varchar(255) DEFAULT NULL,
  `event_bezoekers` varchar(255) DEFAULT NULL,
  `event_cafe` varchar(255) DEFAULT NULL,
  `event_likes` int(255) DEFAULT '0',
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `tbl_event`
--

INSERT INTO `tbl_event` (`event_id`, `event_type`, `event_image`, `event_name`, `event_start_date`, `event_end_date`, `event_start_time`, `event_end_time`, `event_beschrijving`, `event_muziek`, `event_bezoekers`, `event_cafe`, `event_likes`) VALUES
(1, 'Live artiest', 'concert-sting-in-istanbul.jpg', 'Sting', '15-01-2014', 'Dag-Maand-Jaar', '00:00', '00:00', '<p>asdfsdf</p>', 'Pop', NULL, 'de bakkerij', 5),
(2, 'DJ', '', 'Buzz', '15-01-2014', 'Dag-Maand-Jaar', '00:00', '00:00', '<p>sdafsaf</p>', 'Nederlandstalig', NULL, '', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_event_status`
--

CREATE TABLE IF NOT EXISTS `tbl_event_status` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_message` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `deleted` enum('') DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `create_time` time DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `wachtwoord` varchar(32) DEFAULT NULL,
  `geslacht` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Gegevens worden uitgevoerd voor tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `email`, `wachtwoord`, `geslacht`) VALUES
(1, 'mathijsvanderpalen@hotmail.com', '2ee97bbf4b8e437c55ea0448ce483e86', 'M'),
(4, 'henk@hotmail.com', 'd50b484170d3236929f21ccabe0149f4', 'M'),
(5, 'brit@gmail.com', 'ba17413fc1cf8dba1c98e6560be0db3b', 'V');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_useragenda`
--

CREATE TABLE IF NOT EXISTS `tbl_useragenda` (
  `agen_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`agen_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=258 ;

--
-- Gegevens worden uitgevoerd voor tabel `tbl_useragenda`
--

INSERT INTO `tbl_useragenda` (`agen_id`, `user_id`, `event_id`) VALUES
(221, 1, 27),
(222, 1, 28),
(223, 1, 23),
(224, 1, 27),
(225, 1, 28),
(226, 1, 27),
(227, 1, 23),
(228, 1, 27),
(229, 1, 28),
(230, 1, 28),
(231, 1, 28),
(232, 1, 28),
(233, 1, 28),
(234, 1, 28),
(235, 1, 28),
(236, 1, 28),
(237, 1, 28),
(238, 1, 28),
(239, 1, 28),
(240, 1, 28),
(241, 1, 23),
(242, 1, 23),
(243, 1, 23),
(251, 1, 0),
(257, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
