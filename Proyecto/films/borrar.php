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
      include_once("../connection.php");

      $id = $_GET['id'];
      $seleccion = "SELECT * FROM films where film_id=$id;";
      $consulta = "DELETE FROM films where film_id=$id;";




//echo ($image);
        if ($result = $connection->query($seleccion)) {
          $obj = $result->fetch_object();
          $image = $obj->film_image;
          var_dump($image);

            if ($result1 = $connection->query($consulta)) {
              unlink("$image");

            }else {
                            mysqli_error($connection);
                        }}


              header ("Location: ./index.php");

      /*  echo '<br>';
        echo "<form action='index.php'>
              <input type='submit' value='Volver' />
              </form>";*/
       ?>
      <script type="text/javascript" src=" "></script>
    </body>
</html>
