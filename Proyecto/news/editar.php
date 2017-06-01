<!DOCTYPE html>
<html lang="">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="description" content="Smart Bottom Slide Out Menu" />
  <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
  <link rel="stylesheet" href="../style/admin.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href=" ">
  <title>edit news</title>

</head>
    <body>
      <?php
      $id = $_GET['id'];
      include_once("../connection.php");

      if ($result = $connection->query("SELECT * from news
        where news_id = '$id';")) {

        $obj = $result->fetch_object();

        echo "<form method='post'>";
      //  echo "serie_gender: <input name='gender' value='$obj->serie_gender'\><br><br>";
        echo "news_title: <input type='text' name='title' value='$obj->news_title'\><br><br>";
        echo "news_info: <input type='text' name='info' value='$obj->news_info'\><br><br>";
        echo "news_url: <input type='text' name='url' value='$obj->news_url'\><br><br>";
        echo "news_date: <input type='date' name='date' value='$obj->news_date'\><br><br>";
      //  echo "serie_image: <input name='image' value='$obj->serie_image'\><br><br>";
        echo "<button name='edit'>EDITAR</button>"; ?>
        <input type="button" value="Volver"  onClick="location.href='index.php?'" />
  <?php
        echo "</from>";
      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }

      unset($obj);

      if (isset($_POST['edit'])) {

        //variables
        $title=$_POST['title'];
        $info=$_POST['info'];
        $url=$_POST['url'];
        $date=$_POST['date'];
        //$image=$_POST['image'];

        //consulta
        $consulta="UPDATE news SET  `news_info` =  '$info',
        `news_title` =  '$title',`news_date` =  '$date',`news_url` =  '$url' WHERE news_id =$id;";

        var_dump($consulta);
        if ($result = $connection->query($consulta))

           {
          header ("Location: ./index.php?");
        } else {

              echo "Error: " . $result . "<br>" . mysqli_error($connection);
        }
      }
      unset($connection);
      ?>

      <script type="text/javascript" src=" "></script>
    </body>
  </html>
