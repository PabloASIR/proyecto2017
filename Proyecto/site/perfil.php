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
      echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=../sign_in/login.html">';
      session_destroy();
      echo 'No estas registrado';
      exit;
  }
      if (isset($_SESSION['user_nicename']) && $_SESSION['user_nicename'] == 'user') {
          $logueado = $_SESSION['username'];
          $imagen = $_SESSION['user_image'];
           ?>
<?php
        include_once("../connection.php");

          //MAKING A SELECT QUERY
          /* Consultas de selección que devuelven un conjunto de resultados */
          if ($result = $connection->query("SELECT *
            FROM users WHERE user_login = '$logueado' ;")) {
              $obj = $result->fetch_object();
?>

      <div id="contenedor_global">

        <div id="cabecera">

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

  <div id="lateral">
    <?php echo "<img style='width:90%; height:25%; margin-top:5%;' src='../users/$imagen'>"; ?>


    <?php if (!isset($_FILES['image']))  :?>

               <div id="container">
                 <form method="post" enctype='multipart/form-data'>
                     <input class="form-control" type="file" name="image" required />
                     <input class="btn btn-primary" type="submit" value="Send" />
               </form>
                   </div>


                     <?php else: ?>

                     <?php
           //Temp file. Where the uploaded file is stored temporary
           $tmp_file = $_FILES['image']['tmp_name'];
           //Dir where we are going to store the file
           $target_dir = '../users/img/';
           //Full name of the file.
           $target_file = strtolower($target_dir.basename($_FILES['image']['name']));
           //Can we upload the file
           $valid = true;

          if($imagen!=="./img/default.png" && $imagen!=="./img/root.jpg"){
               //Check if the file already exists
               if (file_exists($target_file)) {
                 unlink("../users/$imagen");
               }
               //Check the size of the file. Up to 2Mb
               if ($_FILES['imagen']['size'] > (2048000)) {
                 $valid = false;
               echo 'Oops!  Your file\'s size is to large.';
              }

            //Check the file extension: We need an image not any other different type of file
            $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); // We get the entension
            if ($file_extension != 'jpg' && $file_extension != 'jpeg' && $file_extension != 'png' && $file_extension != 'gif') {
              $valid = false;
                 echo 'Only JPG, JPEG, PNG & GIF files are allowed';
               }


             if ($valid) {
                 var_dump($target_file);

                 if(move_uploaded_file($tmp_file, $target_file)){
                       $_SESSION['user_image']=$target_file;
                       echo "subido";
                   }else{
                       echo "error";
                   }

             //Put the file in its place
            // move_uploaded_file($tmp_file, $target_file);

             //INSERTING THE NEW PRODUCT
             $query = "UPDATE users  SET  user_image = '$target_file'
             WHERE  user_login='$obj->user_login';";
             $result = $connection->query($query);
             header ("Location: ./perfil.php");

            }
         }else {
             //Check the size of the file. Up to 2Mb
             //Check the size of the file. Up to 2Mb
             if ($_FILES['imagen']['size'] > (2048000)) {
               $valid = false;
             echo 'Oops!  Your file\'s size is to large.';
            }

          //Check the file extension: We need an image not any other different type of file
          $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); // We get the entension
          if ($file_extension != 'jpg' && $file_extension != 'jpeg' && $file_extension != 'png' && $file_extension != 'gif') {
            $valid = false;
               echo 'Only JPG, JPEG, PNG & GIF files are allowed';
             }


           if ($valid) {
               var_dump($target_file);

               if(move_uploaded_file($tmp_file, $target_file)){
                     $_SESSION['user_image']=$target_file;
                     echo "subido";
                 }else{
                     echo "error";
                 }

           //Put the file in its place
          // move_uploaded_file($tmp_file, $target_file);

           //INSERTING THE NEW PRODUCT
           $query = "UPDATE users  SET  user_image = '$target_file'
           WHERE  user_login='$obj->user_login';";
           $result = $connection->query($query);
           header ("Location: ./perfil.php");
             }
           }
           ?>
         <?php endif ?>

  </div>



  <!-- <li>Datos Usuario</li><br> -->
  <div class="profile" style="width:80%;">
            <div class="profile">
          <div id="profile_content">
<?php
                  echo '<p><b>Email:</b> '.$obj->user_email.'</p>';
                  echo '<p><b>Username:</b> '.$obj->user_login.'</p>';
                  echo '<p><b>password:</b> ******** <a href="changepass.php">(change)</a></p>';
                  echo '<p><b>Language:</b> '.$obj->user_language.'</p>';
 ?>
          </div>
        </div>

<?php } ?>
</div>
</div>



                <ul id="navigation">
                  <li class="a"><a id="u" href="index.php" title="Home">Home</a></li>
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
