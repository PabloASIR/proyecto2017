
<?php
  session_start();


?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="description" content="Smart Bottom Slide Out Menu" />
  <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
  <link rel="stylesheet" href="../style/admin.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href=" ">
  <title>edit chapter</title>

</head>
    <body>

      <?php
      $id = $_GET['id'];
      include_once("../connection.php");

      if ($result = $connection->query("SELECT * from chapters
        where chapter_id = '$id';")) {

        $obj = $result->fetch_object();

        echo "<form method='post'>";
      //  echo "serie_gender: <input name='gender' value='$obj->serie_gender'\><br><br>";
        echo "chapter_name: <input type='text' name='name' value='$obj->chapter_name'\><br><br>";
        echo "chapter_number: <input type='number' name='number' value='$obj->chapter_number'\><br><br>";
        echo "chapter_season: <input type='number' name='season' value='$obj->chapter_season'\><br><br>";
        echo "chapter_date_release: <input type='date' name='date_release' value='$obj->chapter_date_release'\><br><br>";
      //  echo "serie_image: <input name='image' value='$obj->serie_image'\><br><br>";
        echo "<button name='edit'>EDITAR</button>"; ?>
        <input type="button" value="Volver"  onClick="location.href='chapters.php?id=<?php echo $_SESSION['serie_actual']?>'" />
<?php
        echo "</from>";
      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }

      unset($obj);

      if (isset($_POST['edit'])) {

        //variables
        $name=$_POST['name'];
        $number=$_POST['number'];
        $season=$_POST['season'];
        $date_release=$_POST['date_release'];
        //$image=$_POST['image'];

        //consulta
        $consulta="UPDATE chapters SET  `chapter_season` =  '$season',
`chapter_name` =  '$name',
`chapter_date_release` =  '$date_release',
`chapter_number` =  '$number' WHERE chapter_id =$id;";

        var_dump($consulta);
        if ($result = $connection->query($consulta))

           {
          header ("Location: ./chapters.php?id=".$_SESSION['serie_actual']);
        } else {

              echo "Error: " . $result . "<br>" . mysqli_error($connection);
        }
      }
      unset($connection);
      ?>

      <script type="text/javascript" src=" "></script>
    </body>
</html>
