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

      $insert5=("INSERT INTO `series` (`serie_id`, `serie_name`, `serie_gender`, `serie_sinopsis`, `serie_trailer`, `serie_date_release`, `serie_image`) VALUES
      (2, 'Stranger Things', 'terror', 'When a young boy disappears, his mother, a police chief, and his friends must confront terrifying forces in order to get him back. ', 'https://www.youtube.com/watch?v=udmlXQj4new', '2016-01-01', './img/strangerthings.jpg'),
      (7, 'Black Mirror', 'science fict', 'A television anthology series that shows the dark side of life and technology.', 'https://www.youtube.com/watch?v=jROLrhQkK78', '2010-01-01', 'img/blackmirror.jpg'),
      (8, 'Arrow ', 'action ', 'Spoiled billionaire playboy Oliver Queen is missing and presumed dead when his yacht is lost at sea. He returns five years later a changed man, determined to clean up the city as a hooded vigilante armed with a bow.', 'https://www.youtube.com/watch?v=0pdqf4P9MB8', '2012-01-01', 'img/arrow.jpg'),
      (9, 'Game of Thrones ', 'fantasy', 'Nine noble families fight for control over the mythical lands of Westeros. Meanwhile, a forgotten race hell-bent on destruction returns after being dormant for thousands of years.', 'https://www.youtube.com/watch?v=iGp_N3Ir7Do', '2011-01-01', 'img/gameofthrones.jpg');");
        $result = $connection->query($insert5);
                    if (!$result) {
                       echo "Query Error";
                     var_dump($insert5);
                  }


$insert1=("INSERT INTO `chapters` (`chapter_id`, `chapter_season`, `chapter_name`, `chapter_date_release`, `serie_id`, `chapter_number`) VALUES
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
(17, 1, 'El otro lado', '2016-11-30', 2, 8);");
$result = $connection->query($insert1);
            if (!$result) {
               echo "Query Error";
             var_dump($insert1);
          }


$insert2=("INSERT INTO `films` (`film_id`, `film_gender`, `film_name`, `film_sinopsis`, `film_duration`, `film_trailer`, `film_date_release`, `film_image`) VALUES
(1, 'animation', 'Brave ', 'Determined to make her own path in life, Princess Merida defies a custom that brings chaos to her kingdom. Granted one wish, Merida must rely on her bravery and her archery skills to undo a beastly curse. ', 93, 'https://www.youtube.com/watch?v=TEHWDA_6e3M', '2012-10-12', 'img/brave.jpg'),
(2, 'aventure', 'avatar', 'A paraplegic marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home. ', 148, 'https://www.youtube.com/watch?v=kbA9TfGphOI', '2009-10-10', 'img/avatar.jpg'),
(3, 'musical', 'La La Land', ' A jazz pianist falls for an aspiring actress in Los Angeles. ', 133, 'https://www.youtube.com/watch?v=0pdqf4P9MB8', '2017-01-01', 'img/lalaland.jpg'),
(5, 'science fiction', 'Rogue One', 'The Rebel Alliance makes a risky move to steal the plans for the Death Star, setting up the epic saga to follow. ', 133, 'https://www.youtube.com/watch?v=0pdqf4P9MB8', '2017-02-03', 'img/rougeone.jpg'),
(8, 'Unintentional comedy', 'Batman v Superman', 'Fearing that the actions of Superman are left unchecked, Batman takes on the Man of Steel, while the world wrestles with what kind of a hero it really needs. ', 120, 'https://www.youtube.com/watch?v=Vzi5Q5aIGJU', '2016-03-25', 'img/batmanvssuperman.jpg'),
(10, 'Action', 'Inception', ' A thief, who steals corporate secrets through use of dream-sharing technology, is given the inverse task of planting an idea into the mind of a CEO. ', 148, 'https://www.youtube.com/watch?v=66TuSJo4dZM', '2010-07-16', 'img/inception.jpg'),
(11, 'Unintentional comedy', 'Daredevil', 'A man blinded by toxic waste which also enhanced his remaining senses fights crime as an acrobatic martial arts superhero. ', 103, 'https://www.youtube.com/watch?v=LmP3YFk_YHA', '2003-02-14', 'img/daredevil.jpg');");
$result = $connection->query($insert2);
            if (!$result) {
               echo "Query Error";
             var_dump($insert2);
          }


$insert3=("INSERT INTO `links` (`link_id`, `link_url`, `link_server`, `film_id`, `chapter_id`) VALUES
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
(38, 'http://streamcloud.eu/ziy77kfmkymm/0128_Black.Mirror-HDiTunes_1x01_LiNkMaN.avi.html', 'streamcloud 720p', NULL, 9);");
$result = $connection->query($insert3);
            if (!$result) {
               echo "Query Error";
             var_dump($insert3);
          }


$insert4=("INSERT INTO `news` (`news_id`, `news_info`, `news_image`, `news_title`, `news_date`, `news_url`, `serie_id`, `film_id`) VALUES
(1, 'dejan de emitir juego de tronos porque no la ve ya ni el tato, han matao al que le gustaba a todo el mundo y la serie se ha ido a la puta, es algo tramboliko', 'img/juegodetronos.jpg', 'cancelan juego de tronos', '2017-02-10', 'https://cinefilosfrustrados.com/cancelan-juego-tronos-espana/', 9, NULL),
(8, 'Revelada la trama de la Segunda Temporada de Stranger Things y las criaturas que aparecerÃ¡n', 'img/stranger things (02).jpg', 'Segunda Temporada', '2017-10-31', 'http://cinefilosfrustrados.com/revelada-la-trama-la-segunda-temporada-stranger-things-las-criaturas-apareceran/', 2, NULL),
(9, 'La nueva temporada de Black Mirror tendrÃ¡ escenarios espaÃ±oles', 'img/black-mirror-740x431.jpg', 'Nueva temporada', '2017-06-23', 'http://www.noticiasenserie.com/black-mirror-tendra-escenarios-espanoles/', 7, NULL),
(10, 'Por quÃ© La La Land es la pelÃ­cula que mejor retrata a la generaciÃ³n millennial', 'img/la_la_land_9060_863x680.jpg', 'Obra de arte', '2017-06-23', 'http://www.revistavanityfair.es/actualidad/cine/articulos/la-la-land-critica-ryan-gosling-emma-stone-cancion-city-of-stars/23336', NULL, 3);");
$result = $connection->query($insert4);
            if (!$result) {
               echo "Query Error";
             var_dump($insert4);
          }

            header("Refresh:0; url=admin.php");

?>

    </body>
</html>
