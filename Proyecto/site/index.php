<!DOCTYPE html PUBLIC>
<html>
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
<head>
    <title>indice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Smart Bottom Slide Out Menu" />
    <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
    <link rel="stylesheet" href=<?php
    $consulta="SELECT user_theme from users where user_login='$logueado';";
    $result = $connection->query($consulta);
    $obj=$result->fetch_object();
    $tema=$obj->user_theme;

    if ($tema==1) {
      echo "styletheme1.css";
    }if ($tema==2) {
      echo "styletheme2.css";
    }if($tema==3) {
      echo "styletheme3.css";
    }
    ?> type="text/css" media="screen" />

</head>

<body>


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


<a href='color/gris.php?usuario=<?php echo $logueado; ?>'><img width="40px" height="40px" src="img/gris.png"  /></a>
<a href='color/rojo.php?usuario=<?php echo $logueado; ?>'><img width="40px" height="40px" src="img/rojo.png"  /></a>
<a href='color/verde.php?usuario=<?php echo $logueado; ?>'><img width="40px" height="40px" src="img/verde.png"  /></a>

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
