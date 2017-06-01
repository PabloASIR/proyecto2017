
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
  <title>edit film</title>

</head>
    <body>

      <?php
      $id = $_GET['id'];
      include_once("../connection.php");

      if ($result = $connection->query("SELECT * from links
        where link_id = '$id';")) {

        $obj = $result->fetch_object();

        echo "<form method='post'>";
      //  echo "serie_gender: <input name='gender' value='$obj->serie_gender'\><br><br>";
        echo "link_server: <input type='text' name='server' value='$obj->link_server'\><br><br>";
        echo "link_url: <input type='text' name='url' value='$obj->link_url'\><br><br>";
        //echo "chapter_season: <input name='season' value='$obj->chapter_season'\><br><br>";
      //  echo "chapter_date_release: <input type='date' name='date_release' value='$obj->chapter_date_release'\><br><br>";
      //  echo "serie_image: <input name='image' value='$obj->serie_image'\><br><br>";
        echo "<button name='edit'>EDITAR</button>"; ?>
        <input type="button" value="Volver"  onClick="location.href='index.php?id=<?php echo $_SESSION['capitulo_actual']?>'" />
<?php
        echo "</from>";
      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }

      unset($obj);

      if (isset($_POST['edit'])) {

        //variables
        $server=$_POST['server'];
        $url=$_POST['url'];

        //$image=$_POST['image'];

        //consulta
        $consulta="UPDATE links SET  `link_url` =  '$url',
`link_server` =  '$server' WHERE  link_id ='$id';";

        var_dump($consulta);
        if ($result = $connection->query($consulta))

           {
          header ("Location: ./index.php?id=".$_SESSION['capitulo_actual']);
        } else {

              echo "Error: " . $result . "<br>" . mysqli_error($connection);
        }
      }
      unset($connection);
      ?>

      <script type="text/javascript" src=" "></script>
    </body>
</html>
