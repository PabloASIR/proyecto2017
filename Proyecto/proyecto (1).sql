-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-03-2017 a las 10:54:12
-- Versión del servidor: 5.5.53-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chapters`
--

CREATE TABLE IF NOT EXISTS `chapters` (
  `chapter_id` int(5) NOT NULL AUTO_INCREMENT,
  `chapter_season` int(2) NOT NULL,
  `chapter_name` varchar(30) NOT NULL,
  `chapter_date_release` date NOT NULL,
  `serie_id` int(5) NOT NULL,
  `chapter_number` int(11) NOT NULL,
  PRIMARY KEY (`chapter_id`),
  KEY `serie_id` (`serie_id`),
  KEY `serie_id_2` (`serie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `chapters`
--

INSERT INTO `chapters` (`chapter_id`, `chapter_season`, `chapter_name`, `chapter_date_release`, `serie_id`, `chapter_number`) VALUES
(4, 1, 'La desapariciÃ³n de Will', '2016-02-09', 2, 1),
(5, 1, 'La loca de la calle Maple', '2016-10-13', 2, 2),
(6, 1, 'Todo estÃ¡ bien', '2016-03-22', 2, 3),
(7, 1, 'El cuerpo', '2016-10-13', 2, 4),
(9, 1, 'El himno nacional', '2011-02-02', 7, 1),
(10, 1, '15 millones de crÃ©ditos', '2011-02-24', 7, 2),
(11, 1, 'toda tu historia', '2011-02-22', 7, 3),
(13, 1, 'piloto', '2017-02-09', 8, 1),
(14, 1, 'La pulga y el acrÃ³bata', '2017-02-24', 2, 5),
(15, 1, 'El monstruo', '2016-11-23', 2, 6),
(16, 1, 'La baÃ±era', '2016-11-30', 2, 7),
(17, 1, 'El otro lado', '2016-11-30', 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `film_id` int(5) NOT NULL AUTO_INCREMENT,
  `film_gender` varchar(25) NOT NULL,
  `film_name` varchar(50) NOT NULL,
  `film_sinopsis` varchar(800) NOT NULL,
  `film_duration` int(3) NOT NULL,
  `film_trailer` varchar(150) NOT NULL,
  `film_date_release` date NOT NULL,
  `film_image` varchar(80) NOT NULL,
  PRIMARY KEY (`film_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `films`
--

INSERT INTO `films` (`film_id`, `film_gender`, `film_name`, `film_sinopsis`, `film_duration`, `film_trailer`, `film_date_release`, `film_image`) VALUES
(1, 'animation', 'Brave ', 'Determined to make her own path in life, Princess Merida defies a custom that brings chaos to her kingdom. Granted one wish, Merida must rely on her bravery and her archery skills to undo a beastly curse. ', 93, 'https://www.youtube.com/watch?v=TEHWDA_6e3M', '2012-10-12', 'img/brave.jpg'),
(2, 'aventure', 'avatar', 'A paraplegic marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home. ', 148, 'https://www.youtube.com/watch?v=kbA9TfGphOI', '2009-10-10', 'img/avatar.jpg'),
(3, 'musical', 'La La Land', ' A jazz pianist falls for an aspiring actress in Los Angeles. ', 133, 'https://www.youtube.com/watch?v=0pdqf4P9MB8', '2017-01-01', 'img/lalaland.jpg'),
(5, 'science fiction', 'Rogue One', 'The Rebel Alliance makes a risky move to steal the plans for the Death Star, setting up the epic saga to follow. ', 133, 'https://www.youtube.com/watch?v=0pdqf4P9MB8', '2017-02-03', 'img/rougeone.jpg'),
(8, 'Unintentional comedy', 'Batman v Superman', 'Fearing that the actions of Superman are left unchecked, Batman takes on the Man of Steel, while the world wrestles with what kind of a hero it really needs. ', 120, 'https://www.youtube.com/watch?v=Vzi5Q5aIGJU', '2016-03-25', 'img/batmanvssuperman.jpg'),
(10, 'Action', 'Inception', ' A thief, who steals corporate secrets through use of dream-sharing technology, is given the inverse task of planting an idea into the mind of a CEO. ', 148, 'https://www.youtube.com/watch?v=66TuSJo4dZM', '2010-07-16', 'img/inception.jpg'),
(11, 'Unintentional comedy', 'Daredevil', 'A man blinded by toxic waste which also enhanced his remaining senses fights crime as an acrobatic martial arts superhero. ', 103, 'https://www.youtube.com/watch?v=LmP3YFk_YHA', '2003-02-14', 'img/daredevil.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `link_id` int(5) NOT NULL AUTO_INCREMENT,
  `link_url` varchar(150) NOT NULL,
  `link_server` varchar(24) NOT NULL,
  `film_id` int(5) DEFAULT NULL,
  `chapter_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`link_id`),
  KEY `film_id` (`film_id`),
  KEY `chapter_id` (`chapter_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `links`
--

INSERT INTO `links` (`link_id`, `link_url`, `link_server`, `film_id`, `chapter_id`) VALUES
(9, 'http://streamcloud.eu/8rd72ajjxtm8/Brave__Indomable__MicroHD_1080p_AC3_5.1.mkv.html', 'streamcloud 1080p', 1, NULL),
(12, 'adsgafdgadgsxgsfdg', 'powvideo 2', NULL, 5),
(13, 'adsgafdgadgsxgsfdg', 'streamcloud 2', NULL, 5),
(14, 'streamcloud.com/dsadasdasd', 'streamcloud ', NULL, 5),
(20, 'http://streamcloud.eu/3kmry6ga8qal/B095_2012_Brave.Indomable_HDRip_ESP_LiNkMaN.avi.html', 'Streamcloud HDRip', 1, NULL),
(24, 'http://streamcloud.eu/lnvpmnsybqck/Avatar.BRrip.AC3_5.1.es.verion.extendida.mkv.html', 'StreamCloud Brip', 2, NULL),
(25, 'http://powvideo.net/1ksot2236ak1', 'Powvideo 720p', 2, NULL),
(26, 'http://streamin.to/tdnu6hrcaise', 'streamin 1080p', 3, NULL),
(27, 'http://powvideo.net/k74yfhaa441e', 'Powvideo', 8, NULL),
(28, 'http://streamcloud.eu/u82jjc6kyjul', 'streamcloud 720p', 10, NULL),
(29, 'http://streamcloud.eu/1rul98cvyomn/DrDev.720p.mkv.html', 'streamcloud 720p', 11, NULL),
(30, 'http://streamcloud.eu/1ezxsjqlygvr/Stranger_Things_1x01.avi.html', 'streamcloud 720p', NULL, 4),
(31, 'http://powvideo.net/jkk7wb4zzgkg', 'Powvideo 720p', NULL, 6),
(32, 'http://streamcloud.eu/4t6d13npj2xm/strangT.103esp.mp4.html', 'streamcloud 720p', NULL, 6),
(33, 'http://streamcloud.eu/8psfiht6qv3b/Stranger.Things.1x04.m720p.mkv.html', 'streamcloud 720p', NULL, 7),
(34, 'http://streamcloud.eu/v9r29ffxfpcw/Strngr_Thngs_1x05.mkv.html', 'streamcloud 1080p', NULL, 14),
(35, 'http://powvideo.net/c9bok7hky2v4', 'Powvideo 720p', NULL, 15),
(36, 'http://streamcloud.eu/n4tczel6svtu/Stranger.Things.1x07.HDTV.XviD._www.DivxTotaL.com_.avi.html', 'streamcloud 720p', NULL, 16),
(37, 'http://streamcloud.eu/xbhjitnab2mc/Strnhngs720p1x08.mkv.html', 'streamcloud 720p', NULL, 17),
(38, 'http://streamcloud.eu/ziy77kfmkymm/0128_Black.Mirror-HDiTunes_1x01_LiNkMaN.avi.html', 'streamcloud 720p', NULL, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(5) NOT NULL AUTO_INCREMENT,
  `news_info` varchar(650) NOT NULL,
  `news_image` varchar(80) NOT NULL,
  `news_title` varchar(30) NOT NULL,
  `news_date` date NOT NULL,
  `news_url` varchar(150) NOT NULL,
  `serie_id` int(5) DEFAULT NULL,
  `film_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`news_id`),
  KEY `serie_id` (`serie_id`),
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`news_id`, `news_info`, `news_image`, `news_title`, `news_date`, `news_url`, `serie_id`, `film_id`) VALUES
(1, 'dejan de emitir juego de tronos porque no la ve ya ni el tato, han matao al que le gustaba a todo el mundo y la serie se ha ido a la puta, es algo tramboliko', 'img/juegodetronos.jpg', 'cancelan juego de tronos', '2017-02-10', 'https://cinefilosfrustrados.com/cancelan-juego-tronos-espana/', 9, NULL),
(8, 'Revelada la trama de la Segunda Temporada de Stranger Things y las criaturas que aparecerÃ¡n', 'img/stranger things (02).jpg', 'Segunda Temporada', '2017-10-31', 'http://cinefilosfrustrados.com/revelada-la-trama-la-segunda-temporada-stranger-things-las-criaturas-apareceran/', 2, NULL),
(9, 'La nueva temporada de Black Mirror tendrÃ¡ escenarios espaÃ±oles', 'img/black-mirror-740x431.jpg', 'Nueva temporada', '2017-06-23', 'http://www.noticiasenserie.com/black-mirror-tendra-escenarios-espanoles/', 7, NULL),
(10, 'Por quÃ© La La Land es la pelÃ­cula que mejor retrata a la generaciÃ³n millennial', 'img/la_la_land_9060_863x680.jpg', 'Obra de arte', '2017-06-23', 'http://www.revistavanityfair.es/actualidad/cine/articulos/la-la-land-critica-ryan-gosling-emma-stone-cancion-city-of-stars/23336', NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rate_films`
--

CREATE TABLE IF NOT EXISTS `rate_films` (
  `user_id` int(5) NOT NULL DEFAULT '0',
  `film_id` int(5) NOT NULL DEFAULT '0',
  `comments` varchar(650) NOT NULL,
  `grade` int(2) NOT NULL,
  PRIMARY KEY (`user_id`,`film_id`),
  KEY `user_id` (`user_id`),
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rate_films`
--

INSERT INTO `rate_films` (`user_id`, `film_id`, `comments`, `grade`) VALUES
(1, 2, 'qrwqerqwerwerwr', 5),
(2, 1, '', 5),
(2, 2, '', 4),
(2, 3, '', 2),
(2, 5, '', 5),
(2, 8, '', 1),
(2, 10, '', 4),
(2, 11, '', 1),
(12, 1, '', 4),
(12, 2, 'es mu bonita xd lol omg jajajaj ', 1),
(13, 1, '', 5),
(13, 2, '', 5),
(13, 3, '', 3),
(13, 5, '', 5),
(13, 8, '', 1),
(13, 10, '', 5),
(13, 11, '', 1),
(17, 1, '', 5),
(17, 3, '', 2),
(17, 5, '', 4),
(17, 8, '', 2),
(17, 10, '', 5),
(17, 11, '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rate_series`
--

CREATE TABLE IF NOT EXISTS `rate_series` (
  `user_id` int(5) NOT NULL,
  `serie_id` int(5) NOT NULL,
  `comments` varchar(650) NOT NULL,
  `grade` int(2) NOT NULL,
  PRIMARY KEY (`user_id`,`serie_id`),
  KEY `user_id` (`user_id`),
  KEY `serie_id` (`serie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rate_series`
--

INSERT INTO `rate_series` (`user_id`, `serie_id`, `comments`, `grade`) VALUES
(2, 2, '', 3),
(2, 7, '', 5),
(2, 8, '', 5),
(2, 9, '', 5),
(8, 7, '', 4),
(12, 9, '', 3),
(13, 2, '', 5),
(13, 7, '', 5),
(13, 8, '', 3),
(13, 9, '', 2),
(17, 2, '', 5),
(17, 8, '', 5),
(17, 9, '', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `see_chapters`
--

CREATE TABLE IF NOT EXISTS `see_chapters` (
  `chapter_id` int(5) NOT NULL DEFAULT '0',
  `user_id` int(5) NOT NULL DEFAULT '0',
  `saw` tinyint(1) NOT NULL,
  PRIMARY KEY (`chapter_id`,`user_id`),
  KEY `chapter_id` (`chapter_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `see_chapters`
--

INSERT INTO `see_chapters` (`chapter_id`, `user_id`, `saw`) VALUES
(4, 2, 1),
(4, 12, 1),
(4, 16, 1),
(5, 2, 1),
(5, 16, 1),
(6, 2, 0),
(6, 16, 1),
(7, 16, 1),
(9, 13, 1),
(9, 16, 1),
(10, 16, 0),
(13, 16, 0),
(14, 12, 1),
(14, 16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `see_films`
--

CREATE TABLE IF NOT EXISTS `see_films` (
  `user_id` int(5) NOT NULL,
  `film_id` int(5) NOT NULL,
  `saw` tinyint(4) NOT NULL,
  PRIMARY KEY (`user_id`,`film_id`),
  KEY `user_id` (`user_id`),
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `see_films`
--

INSERT INTO `see_films` (`user_id`, `film_id`, `saw`) VALUES
(2, 2, 1),
(12, 1, 1),
(12, 2, 1),
(12, 8, 0),
(13, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE IF NOT EXISTS `series` (
  `serie_id` int(5) NOT NULL AUTO_INCREMENT,
  `serie_name` varchar(18) NOT NULL,
  `serie_gender` varchar(25) NOT NULL,
  `serie_sinopsis` varchar(650) NOT NULL,
  `serie_trailer` varchar(150) NOT NULL,
  `serie_date_release` date NOT NULL,
  `serie_image` varchar(80) NOT NULL,
  PRIMARY KEY (`serie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`serie_id`, `serie_name`, `serie_gender`, `serie_sinopsis`, `serie_trailer`, `serie_date_release`, `serie_image`) VALUES
(2, 'Stranger Things', 'terror', 'When a young boy disappears, his mother, a police chief, and his friends must confront terrifying forces in order to get him back. ', 'https://www.youtube.com/watch?v=udmlXQj4new', '2016-01-01', './img/strangerthings.jpg'),
(7, 'Black Mirror', 'science fict', 'A television anthology series that shows the dark side of life and technology.', 'https://www.youtube.com/watch?v=jROLrhQkK78', '2010-01-01', 'img/blackmirror.jpg'),
(8, 'Arrow ', 'action ', 'Spoiled billionaire playboy Oliver Queen is missing and presumed dead when his yacht is lost at sea. He returns five years later a changed man, determined to clean up the city as a hooded vigilante armed with a bow.', 'https://www.youtube.com/watch?v=0pdqf4P9MB8', '2012-01-01', 'img/arrow.jpg'),
(9, 'Game of Thrones ', 'fantasy', 'Nine noble families fight for control over the mythical lands of Westeros. Meanwhile, a forgotten race hell-bent on destruction returns after being dormant for thousands of years.', 'https://www.youtube.com/watch?v=iGp_N3Ir7Do', '2011-01-01', 'img/gameofthrones.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_pass` varchar(64) NOT NULL,
  `user_login` varchar(12) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_nicename` varchar(12) NOT NULL DEFAULT 'user',
  `user_language` varchar(12) NOT NULL,
  `user_image` varchar(80) NOT NULL DEFAULT './img/default.png',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_login` (`user_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_pass`, `user_login`, `user_email`, `user_nicename`, `user_language`, `user_image`) VALUES
(1, 'f8032d5cae3de20fcec887f395ec9a6a', 'root', 'root@sefilms.es', 'admin', 'Spanish', './img/root.jpg'),
(2, '81dc9bdb52d04dc20036dbd8313ed055', 'pablo', 'pablosasser@gmail.com', 'user', 'English', '../users/img/wallpaper.png'),
(8, 'f8032d5cae3de20fcec887f395ec9a6a', 'pekechis', 'pekechis@gmail.com', 'user', 'English', '../users/img/qmxwgm7k_400x400.jpeg'),
(12, 'f8032d5cae3de20fcec887f395ec9a6a', 'prueba', 'prueba@mail.com', 'user', 'English', '../users/img/1065-img_2529.jpg'),
(13, 'f8032d5cae3de20fcec887f395ec9a6a', 'ana', 'ana@mail.com', 'user', 'Spanish', '../users/img/5443b7ca288f1fe173228cb05756d382.jpg'),
(15, 'f8032d5cae3de20fcec887f395ec9a6a', 'felipe', 'felipe@mail.com', 'banned', 'English', './img/default.png'),
(16, 'f8032d5cae3de20fcec887f395ec9a6a', 'alicia', 'alicia@mail.com', 'user', 'Spanish', '../users/img/whatsapp image 2017-03-02 at 16.35.41.jpeg'),
(17, 'f8032d5cae3de20fcec887f395ec9a6a', 'test', 'test@mail.com', 'banned', 'English', '../users/img/657-the-internet-is-on-fire.jpg');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_ibfk_1` FOREIGN KEY (`serie_id`) REFERENCES `series` (`serie_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `films` (`film_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `links_ibfk_2` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`chapter_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`serie_id`) REFERENCES `series` (`serie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `films` (`film_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rate_films`
--
ALTER TABLE `rate_films`
  ADD CONSTRAINT `rate_films_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_films_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `films` (`film_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rate_series`
--
ALTER TABLE `rate_series`
  ADD CONSTRAINT `rate_series_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_series_ibfk_2` FOREIGN KEY (`serie_id`) REFERENCES `series` (`serie_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `see_chapters`
--
ALTER TABLE `see_chapters`
  ADD CONSTRAINT `see_chapters_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`chapter_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `see_chapters_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `see_films`
--
ALTER TABLE `see_films`
  ADD CONSTRAINT `see_films_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `see_films_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `films` (`film_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
