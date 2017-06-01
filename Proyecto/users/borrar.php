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
      $seleccion = "SELECT * FROM users where user_id=$id;";
      $consulta5 = "DELETE FROM users where user_id=$id;";
      $consulta2 = "DELETE FROM see_chapters where user_id=$id;";
      $consulta3 = "DELETE FROM rate_films where user_id=$id;";
      $consulta4 = "DELETE FROM see_film where user_id=$id;";
      $consulta1 = "DELETE FROM rate_series where user_id=$id;";



//echo ($image);
        if ($result = $connection->query($seleccion)) {
          $obj = $result->fetch_object();
          $image = $obj->user_image;
          var_dump($image);

          $default="./img/default.png";
          $default2="./img/root.jpg";
          if ($image!=$default && $image!=$default2) {
            unlink("$image");
          }

            if ($result1 = $connection->query($consulta1)) {
              echo ('1');


              if ($result2 = $connection->query($consulta2)) {
                echo ('2');
                if ($result3 = $connection->query($consulta3)) {
                  echo ('3');                       echo ("$consulta4");

                    $result4 = $connection->query($consulta4);
                      //if ($result4==false){
                        echo ('4');
                        if ($result5 = $connection->query($consulta5)) {
                          echo ('5');
                        //    echo "film $id delete.";
                          //  echo'<br>';

                        } else {
                            mysqli_error($connection);
                        }}
                    }
                } else {
                }
                mysqli_error($connection);
            }
            mysqli_error($connection);
      //  }
              //  mysqli_error($connection);

              header ("Location: ./index.php");

      /*  echo '<br>';
        echo "<form action='index.php'>
              <input type='submit' value='Volver' />
              </form>";*/
       ?>
      <script type="text/javascript" src=" "></script>
    </body>
</html>
