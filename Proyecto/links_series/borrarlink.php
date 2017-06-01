
<?php
  session_start();


?>
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
      //CREATING THE CONNECTION
      include_once("../connection.php");


      $id = $_GET['id'];
      $seleccion = "SELECT * FROM links where link_id=$id;";
    //  $idchapter= $obj->chapter_id;

      $consulta4 = "DELETE FROM links WHERE link_id = $id";

//echo ($image);
        if ($result = $connection->query($seleccion)) {
            $obj = $result->fetch_object();
            //$image = $obj->serie_image;
            //var_dump($image);
            echo '0';
            // var_dump($consulta4);
            // var_dump($consulta3);
            // var_dump($consulta2);
            // var_dump($consulta1);

            $result4 = $connection->query($consulta4);

                        //unlink("$image");
                    } else {
                        mysqli_error($connection);
                    }

              //  mysqli_error($connection);

          //  mysqli_error($connection);
          header ("Location: ./index.php?id=".$_SESSION['capitulo_actual']);

      /*  echo '<br>';
        echo "<form action='index.php'>
              <input type='submit' value='Volver' />
              </form>";*/
       ?>
      <script type="text/javascript" src=" "></script>
    </body>
</html>
