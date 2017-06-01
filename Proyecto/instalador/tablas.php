<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href=" ">
    </head>
    <body>

<?php
require_once("../connection.php");

$query1=("CREATE TABLE IF NOT EXISTS `chapters` (
  `chapter_id` int(5) NOT NULL AUTO_INCREMENT,
  `chapter_season` int(2) NOT NULL,
  `chapter_name` varchar(30) NOT NULL,
  `chapter_date_release` date NOT NULL,
  `serie_id` int(5) NOT NULL,
  `chapter_number` int(11) NOT NULL,
  PRIMARY KEY (`chapter_id`),
  KEY `serie_id` (`serie_id`),
  KEY `serie_id_2` (`serie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;");
$result = $connection->query($query1);
            if (!$result) {
               echo "Query Error";
             var_dump($query1);
          }

$query2=("CREATE TABLE IF NOT EXISTS `films` (
  `film_id` int(5) NOT NULL AUTO_INCREMENT,
  `film_gender` varchar(25) NOT NULL,
  `film_name` varchar(50) NOT NULL,
  `film_sinopsis` varchar(800) NOT NULL,
  `film_duration` int(3) NOT NULL,
  `film_trailer` varchar(150) NOT NULL,
  `film_date_release` date NOT NULL,
  `film_image` varchar(80) NOT NULL,
  PRIMARY KEY (`film_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;");
$result = $connection->query($query2);
            if (!$result) {
               echo "Query Error";
             var_dump($query2);
          }
$query3=("CREATE TABLE IF NOT EXISTS `links` (
  `link_id` int(5) NOT NULL AUTO_INCREMENT,
  `link_url` varchar(150) NOT NULL,
  `link_server` varchar(24) NOT NULL,
  `film_id` int(5) DEFAULT NULL,
  `chapter_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`link_id`),
  KEY `film_id` (`film_id`),
  KEY `chapter_id` (`chapter_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;");
$result = $connection->query($query3);
            if (!$result) {
               echo "Query Error";
             var_dump($query3);
          }

$query4=("CREATE TABLE IF NOT EXISTS `news` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;");
$result = $connection->query($query4);
            if (!$result) {
               echo "Query Error";
             var_dump($query4);
          }
$query5=("CREATE TABLE IF NOT EXISTS `rate_films` (
  `user_id` int(5) NOT NULL DEFAULT '0',
  `film_id` int(5) NOT NULL DEFAULT '0',
  `comments` varchar(650) NOT NULL,
  `grade` int(2) NOT NULL,
  PRIMARY KEY (`user_id`,`film_id`),
  KEY `user_id` (`user_id`),
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
$result = $connection->query($query5);
            if (!$result) {
               echo "Query Error";
             var_dump($query5);
          }


$query6=("CREATE TABLE IF NOT EXISTS `rate_series` (
  `user_id` int(5) NOT NULL,
  `serie_id` int(5) NOT NULL,
  `comments` varchar(650) NOT NULL,
  `grade` int(2) NOT NULL,
  PRIMARY KEY (`user_id`,`serie_id`),
  KEY `user_id` (`user_id`),
  KEY `serie_id` (`serie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
$result = $connection->query($query6);
            if (!$result) {
               echo "Query Error";
             var_dump($query6);
          }

$query7=("CREATE TABLE IF NOT EXISTS `see_chapters` (
  `chapter_id` int(5) NOT NULL DEFAULT '0',
  `user_id` int(5) NOT NULL DEFAULT '0',
  `saw` tinyint(1) NOT NULL,
  PRIMARY KEY (`chapter_id`,`user_id`),
  KEY `chapter_id` (`chapter_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
$result = $connection->query($query7);
            if (!$result) {
               echo "Query Error";
             var_dump($query7);
          }

$query8=("CREATE TABLE IF NOT EXISTS `see_films` (
  `user_id` int(5) NOT NULL,
  `film_id` int(5) NOT NULL,
  `saw` tinyint(4) NOT NULL,
  PRIMARY KEY (`user_id`,`film_id`),
  KEY `user_id` (`user_id`),
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
$result = $connection->query($query8);
            if (!$result) {
               echo "Query Error";
             var_dump($query8);
          }

$query9=("CREATE TABLE IF NOT EXISTS `series` (
  `serie_id` int(5) NOT NULL AUTO_INCREMENT,
  `serie_name` varchar(18) NOT NULL,
  `serie_gender` varchar(25) NOT NULL,
  `serie_sinopsis` varchar(650) NOT NULL,
  `serie_trailer` varchar(150) NOT NULL,
  `serie_date_release` date NOT NULL,
  `serie_image` varchar(80) NOT NULL,
  PRIMARY KEY (`serie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;");
$result = $connection->query($query9);
            if (!$result) {
               echo "Query Error";
             var_dump($query9);
          }

$query10=("CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_pass` varchar(64) NOT NULL,
  `user_login` varchar(12) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_nicename` varchar(12) NOT NULL DEFAULT 'user',
  `user_language` varchar(12) NOT NULL,
  `user_image` varchar(80) NOT NULL DEFAULT './img/default.png',
  `user_theme` int(1) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_login` (`user_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;");
$result = $connection->query($query10);
            if (!$result) {
               echo "Query Error";
             var_dump($query10);
          }

$alter1=("ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_ibfk_1`
  FOREIGN KEY (`serie_id`)
  REFERENCES `series` (`serie_id`)
  ON DELETE CASCADE ON UPDATE CASCADE;");
  $result = $connection->query($alter1);
              if (!$result) {
                 echo "Query Error";
               var_dump($alter1);
            }


$alter2=("ALTER TABLE `links`
  ADD CONSTRAINT `links_ibfk_1`
  FOREIGN KEY (`film_id`)
  REFERENCES `films` (`film_id`)
  ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `links_ibfk_2`
  FOREIGN KEY (`chapter_id`)
  REFERENCES `chapters` (`chapter_id`)
  ON DELETE CASCADE ON UPDATE CASCADE;");
  $result = $connection->query($alter2);
              if (!$result) {
                 echo "Query Error";
               var_dump($alter2);
            }


$alter3=("ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1`
  FOREIGN KEY (`serie_id`)
  REFERENCES `series` (`serie_id`)
  ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_ibfk_2`
  FOREIGN KEY (`film_id`)
  REFERENCES `films` (`film_id`)
  ON DELETE CASCADE ON UPDATE CASCADE;");
  $result = $connection->query($alter3);
              if (!$result) {
                 echo "Query Error";
               var_dump($alter3);
            }


$alter4=("ALTER TABLE `rate_films`
  ADD CONSTRAINT `rate_films_ibfk_1`
  FOREIGN KEY (`user_id`)
  REFERENCES `users` (`user_id`)
  ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_films_ibfk_2`
  FOREIGN KEY (`film_id`)
  REFERENCES `films` (`film_id`)
  ON DELETE CASCADE ON UPDATE CASCADE;");
  $result = $connection->query($alter4);
              if (!$result) {
                 echo "Query Error";
               var_dump($alter4);
            }


$alter5=("ALTER TABLE `rate_series`
  ADD CONSTRAINT `rate_series_ibfk_1`
  FOREIGN KEY (`user_id`)
  REFERENCES `users` (`user_id`)
  ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_series_ibfk_2`
  FOREIGN KEY (`serie_id`)
  REFERENCES `series` (`serie_id`)
  ON DELETE CASCADE ON UPDATE CASCADE;");
  $result = $connection->query($alter5);
              if (!$result) {
                 echo "Query Error";
               var_dump($alter5);
            }


$alter6=("ALTER TABLE `see_chapters`
  ADD CONSTRAINT `see_chapters_ibfk_1`
  FOREIGN KEY (`chapter_id`)
  REFERENCES `chapters` (`chapter_id`)
  ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `see_chapters_ibfk_2`
  FOREIGN KEY (`user_id`)
  REFERENCES `users` (`user_id`)
  ON DELETE CASCADE ON UPDATE CASCADE;");
  $result = $connection->query($alter6);
              if (!$result) {
                 echo "Query Error";
               var_dump($alter6);
            }


$alter7=("ALTER TABLE `see_films`
  ADD CONSTRAINT `see_films_ibfk_1`
  FOREIGN KEY (`user_id`)
  REFERENCES `users` (`user_id`)
  ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `see_films_ibfk_2`
  FOREIGN KEY (`film_id`)
  REFERENCES `films` (`film_id`)
  ON DELETE CASCADE ON UPDATE CASCADE;");
  $result = $connection->query($alter7);
              if (!$result) {
                 echo "Query Error";
               var_dump($alter7);
            }

header("Refresh:0; url=sample.php");


 ?>


    </body>
</html>
