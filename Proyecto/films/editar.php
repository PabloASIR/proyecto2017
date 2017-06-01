<!DOCTYPE html>
<html lang="">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="description" content="Smart Bottom Slide Out Menu" />
  <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
  <link rel="stylesheet" href="../style/admin.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href=" ">
  <title>edit film</title>

</head>
    <body>

      <?php
      $id = $_GET['id'];
      include_once("../connection.php");

      if ($result = $connection->query("SELECT * from films
        where film_id = '$id';")) {

        $obj = $result->fetch_object();

        echo "<form method='post'>";
        echo "Film_gender: <input type='text' name='gender' value='$obj->film_gender'\><br><br>";
        echo "film_name: <input type='text' name='name' value='$obj->film_name'\><br><br>";
        echo "film_sinopsis: <input type='text' name='sinopsis' value='$obj->film_sinopsis'\><br><br>";
        echo "film_duration: <input type='number' name='duration' value='$obj->film_duration'\><br><br>";
        echo "film_trailer: <input type='text' name='trailer' value='$obj->film_trailer'\><br><br>";
        echo "film_date_release: <input type='date' name='date_release' value='$obj->film_date_release'\><br><br>";
        echo "film_image: <input type='text' name='image' value='$obj->film_image'\><br><br>";
        echo "<button name='edit'>EDITAR</button>";
        echo "</from>";
      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }

      unset($obj);

      if (isset($_POST['edit'])) {

        //variables
        $gender=$_POST['gender'];
        $sinopsis=$_POST['sinopsis'];
        $name=$_POST['name'];
        $duration=$_POST['duration'];
        $trailer=$_POST['trailer'];
        $date_release=$_POST['date_release'];
        $image=$_POST['image'];

        //consulta
        $consulta="UPDATE films SET
        `film_gender` =  '$gender',
        `film_name` =  '$name',
        `film_sinopsis` =  '$sinopsis',
        `film_duration` =  '$duration',
        `film_trailer` =  '$trailer',
        `film_date_release` =  '$date_release',
        `film_image` =  '$image'
        WHERE  film_id =$id;";

        var_dump($consulta);
        if ($result = $connection->query($consulta))

           {
          header ("Location: ./index.php");
        } else {

              echo "Error: " . $result . "<br>" . mysqli_error($connection);
        }
      }
      unset($connection);
      ?>
      <input type="button" value="VOLVER" onClick="location.href='./index.php'" />

      <script type="text/javascript" src=" "></script>
    </body>
</html>
