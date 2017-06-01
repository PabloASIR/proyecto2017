<!DOCTYPE html>
<html lang="">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="description" content="Smart Bottom Slide Out Menu" />
  <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
  <link rel="stylesheet" href="../style/admin.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href=" ">
  <title>edit serie</title>

</head>
    <body>

      <?php
      $id = $_GET['id'];
      include_once("../connection.php");

      if ($result = $connection->query("SELECT * from series
        where serie_id = '$id';")) {

        $obj = $result->fetch_object();

        echo "<form method='post'>";
        echo "serie_gender: <input type='text' name='gender' value='$obj->serie_gender'\><br><br>";
        echo "serie_name: <input type='text' name='name' value='$obj->serie_name'\><br><br>";
        echo "serie_sinopsis: <input type='text' name='sinopsis' value='$obj->serie_sinopsis'\><br><br>";
        echo "serie_trailer: <input type='text' name='trailer' value='$obj->serie_trailer'\><br><br>";
        echo "serie_date_release: <input type='date' name='date_release' value='$obj->serie_date_release'\><br><br>";
        // echo "serie_image: <input name='image' value='$obj->serie_image'\><br><br>";
        echo "<button name='edit'>EDITAR</button>";?>
        <input type="button" value="Volver"  onClick="location.href='./index.php'" />
<?php
        echo "</from>";
      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }

      unset($obj);

      if (isset($_POST['edit'])) {

        //variables
        $gender=$_POST['gender'];
        $name=$_POST['name'];
        $sinopsis=$_POST['sinopsis'];
        $trailer=$_POST['trailer'];
        $date_release=$_POST['date_release'];
        $image=$_POST['image'];

        //consulta
        $consulta="UPDATE series SET
        `serie_gender` =  '$gender',
        `serie_name` =  '$name',
        `serie_sinopsis` =  '$sinopsis',
        `serie_trailer` =  '$trailer',
        `serie_date_release` =  '$date_release',
        `serie_image` =  '$image'
        WHERE serie_id =$id;";

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

      <script type="text/javascript" src=" "></script>
    </body>
</html>
