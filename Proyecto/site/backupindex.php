<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>indice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Smart Bottom Slide Out Menu" />
    <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />

</head>

<body>
  <?php
  session_start();

  //echo '()<img src="$imagen" width=80% />)';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  } else {
      echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=../sign_in/login.html">';
      session_destroy();
      echo 'No estas registrado';
      exit;
  }
      if (isset($_SESSION['user_nicename']) && $_SESSION['user_nicename'] == 'user') {
          $logueado = $_SESSION['username'];
          $imagen = $_SESSION['user_image'];
          include_once("../connection.php");

           ?>

      <div id="contenedor_global">

        <div id="cabecera">
           cabecera
         </div>
         <div id="perfil">

        <div id="foto"><a href="perfil.php" id="imagen" title="usuario"><?php echo "<img
           style='width:47px; height:47px;'
           src='../users/$imagen'>"; ?></div>
           <div id="texto">
           <a href="perfil.php"><?php echo "$logueado"; ?></a></span></a><br>
           <a href="../sign_in/logout.php">Cerrar Sesion</a></span></a>
         </div>
       </div>

            <div id="cuerpo">

<div id="contenido">
  <li>Esta es la pestaña del home</li><br>
<?php  $result = $connection->query('SELECT count(*) AS total FROM films;');
$obj=$result->fetch_object();
$pelis=$obj->total;
?>
<a href='color/gris.php?usuario=<?php echo $logueado; ?>'><img width="40px" height="40px" src="img/gris.png"  /></a>
<a href='color/rojo.php?usuario=<?php echo $logueado; ?>'><img width="40px" height="40px" src="img/rojo.png"  /></a>
<a href='color/verde.php?usuario=<?php echo $logueado; ?>'><img width="40px" height="40px" src="img/verde.png"  /></a>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
      // data.addRows([
        ['Task', 'Hours per Day'],
        ['Series',    7],
        ['Films',  <?php echo "$pelis" ?>],
        ['News',  2]

      ]);

      var options = {
        title: 'My Daily Activities'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
  <div id="piechart" style="width: 450px; height: 250px;"></div>



<br>

</div>



                <ul id="navigation">
                  <li class="a"><a id="u" style="color:#F3F781;" title="Home">Home</a></li>
                    <li class="a"><a id="u" href="news.php" title="news">News</a></li>
                    <li class="a"><a id="u" href="films.php" title="films">Films</a></li>
                    <li class="a"><a id="u" href="series.php" title="series">Series</a></li>
                    <li class="a"><a id="u" title="calendar">Calendar</a></li>
                  </ul>


                <!-- The JavaScript -->
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                <script type="text/javascript">
                    $(function() {
                        var d = 300;
                        $('#navigation #u').each(function() {
                            var $this = $(this);
                            var r = Math.floor(Math.random() * 41) - 20;
                             $this.css({
                                 '-moz-transform': 'rotate(' + r + 'deg)',
                                 '-webkit-transform': 'rotate(' + r + 'deg)',
                                 'transform': 'rotate(' + r + 'deg)'
                             });
                            // $('#content').css({
                            //     '-moz-transform': 'rotate(' + r + 'deg)',
                            //     '-webkit-transform': 'rotate(' + r + 'deg)',
                            //     'transform': 'rotate(' + r + 'deg)'
                            // });
                            $this.stop().animate({
                                'marginTop': '-70px'
                            }, d += 150);
                        });
                        $('#navigation > .a').hover(
                            function() {
                                var $this = $(this);
                                $('a', $this).stop().animate({
                                    'marginTop': '-40px'
                                }, 200);
                            },
                            function() {
                                var $this = $(this);
                                $('a', $this).stop().animate({
                                    'marginTop': '-70px'
                                }, 200);
                            }
                        ).click(function() {
                            var $this = $(this);
                            var name = this.className;
                            $('#content').animate({
                                marginTop: -600
                            }, 300, function() {
                                var $this = $(this);
                                var r = Math.floor(Math.random() * 41) - 20;
                                $this.css({
                                    '-moz-transform': 'rotate(' + r + 'deg)',
                                    '-webkit-transform': 'rotate(' + r + 'deg)',
                                    'transform': 'rotate(' + r + 'deg)'
                                });
                                $('#' + name).show();
                                $this.animate({
                                    marginTop: -200
                                }, 300);
                            })
                        });
                    });
                </script>

            </div>

            <!-- <div id="pie">
                pie
            </div> -->
        </div>
<?php
      } ?>
</body>

</html>
<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>indice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Smart Bottom Slide Out Menu" />
    <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />

</head>

<body>
  <?php
  session_start();

  //echo '()<img src="$imagen" width=80% />)';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  } else {
      echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=../sign_in/login.html">';
      session_destroy();
      echo 'No estas registrado';
      exit;
  }
      if (isset($_SESSION['user_nicename']) && $_SESSION['user_nicename'] == 'user') {
          $logueado = $_SESSION['username'];
          $imagen = $_SESSION['user_image'];
          include_once("../connection.php");

           ?>

      <div id="contenedor_global">

        <div id="cabecera">
           cabecera
         </div>
         <div id="perfil">

        <div id="foto"><a href="perfil.php" id="imagen" title="usuario"><?php echo "<img
           style='width:47px; height:47px;'
           src='../users/$imagen'>"; ?></div>
           <div id="texto">
           <a href="perfil.php"><?php echo "$logueado"; ?></a></span></a><br>
           <a href="../sign_in/logout.php">Cerrar Sesion</a></span></a>
         </div>
       </div>

            <div id="cuerpo">

<div id="contenido">
  <li>Esta es la pestaña del home</li><br>
<?php  $result = $connection->query('SELECT count(*) AS total FROM films;');
$obj=$result->fetch_object();
$pelis=$obj->total;
?>
<a href='color/gris.php?usuario=<?php echo $logueado; ?>'><img width="40px" height="40px" src="img/gris.png"  /></a>
<a href='color/rojo.php?usuario=<?php echo $logueado; ?>'><img width="40px" height="40px" src="img/rojo.png"  /></a>
<a href='color/verde.php?usuario=<?php echo $logueado; ?>'><img width="40px" height="40px" src="img/verde.png"  /></a>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
      // data.addRows([
        ['Task', 'Hours per Day'],
        ['Series',    7],
        ['Films',  <?php echo "$pelis" ?>],
        ['News',  2]

      ]);

      var options = {
        title: 'My Daily Activities'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
  <div id="piechart" style="width: 450px; height: 250px;"></div>



<br>

</div>



                <ul id="navigation">
                  <li class="a"><a id="u" style="color:#F3F781;" title="Home">Home</a></li>
                    <li class="a"><a id="u" href="news.php" title="news">News</a></li>
                    <li class="a"><a id="u" href="films.php" title="films">Films</a></li>
                    <li class="a"><a id="u" href="series.php" title="series">Series</a></li>
                    <li class="a"><a id="u" title="calendar">Calendar</a></li>
                  </ul>


                <!-- The JavaScript -->
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                <script type="text/javascript">
                    $(function() {
                        var d = 300;
                        $('#navigation #u').each(function() {
                            var $this = $(this);
                            var r = Math.floor(Math.random() * 41) - 20;
                             $this.css({
                                 '-moz-transform': 'rotate(' + r + 'deg)',
                                 '-webkit-transform': 'rotate(' + r + 'deg)',
                                 'transform': 'rotate(' + r + 'deg)'
                             });
                            // $('#content').css({
                            //     '-moz-transform': 'rotate(' + r + 'deg)',
                            //     '-webkit-transform': 'rotate(' + r + 'deg)',
                            //     'transform': 'rotate(' + r + 'deg)'
                            // });
                            $this.stop().animate({
                                'marginTop': '-70px'
                            }, d += 150);
                        });
                        $('#navigation > .a').hover(
                            function() {
                                var $this = $(this);
                                $('a', $this).stop().animate({
                                    'marginTop': '-40px'
                                }, 200);
                            },
                            function() {
                                var $this = $(this);
                                $('a', $this).stop().animate({
                                    'marginTop': '-70px'
                                }, 200);
                            }
                        ).click(function() {
                            var $this = $(this);
                            var name = this.className;
                            $('#content').animate({
                                marginTop: -600
                            }, 300, function() {
                                var $this = $(this);
                                var r = Math.floor(Math.random() * 41) - 20;
                                $this.css({
                                    '-moz-transform': 'rotate(' + r + 'deg)',
                                    '-webkit-transform': 'rotate(' + r + 'deg)',
                                    'transform': 'rotate(' + r + 'deg)'
                                });
                                $('#' + name).show();
                                $this.animate({
                                    marginTop: -200
                                }, 300);
                            })
                        });
                    });
                </script>

            </div>

            <!-- <div id="pie">
                pie
            </div> -->
        </div>
<?php
      } ?>
</body>

</html>
