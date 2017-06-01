
<?php
  session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="description" content="Smart Bottom Slide Out Menu" />
  <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
  <link rel="stylesheet" href="../style/admin.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href=" ">
  <title>new chapter</title>

</head>
  <body>


      <?php

        if (!isset($_POST['name'])) : ?>
        <form action="newchapter.php" method="post" >
        <!--    <span>film_id:</span><input type="text" name="id" required><br> -->
            <span>chapter_name:</span><input type="text" name="name" required><br>
            <span>chapter_number:</span><input type="number" name="number" ><br>
            <span>chapter_season:</span><input type="number" name="season" ><br>
            <span>chapter_date_release:</span><input type="date" name="date_release" ><br>
	          <input type="submit" value="Enviar" name="send">
            <input type="hidden" name='idserie' value="<?php echo $_GET['idserie']; ?>" />
            <input type="button" value="Volver"  onClick="location.href='chapters.php?id=<?php echo $_SESSION['serie_actual']?>'" />

      </form>
   <?php else: ?>

      <?php  echo '<h3>Showing data coming from the form</h3>';
        //var_dump($_POST);
        //CREATING THE CONNECTION
        include_once("../connection.php");


  if (isset($_POST['send'])) {
      $id = $_POST['idserie'];
      $name = $_POST['name'];
      $number = $_POST['number'];
      $season = $_POST['season'];
      $date_release = $_POST['date_release'];

      $consulta = "INSERT INTO chapters (`chapter_id` ,`chapter_season` ,
`chapter_name` ,`chapter_date_release` ,`serie_id` ,`chapter_number`)
VALUES (NULL , '$season', '$name', '$date_release', '$id', '$number');";
      var_dump($consulta);
      $result = $connection->query($consulta);

      if (!$result) {
          print_r("$consulta");
          echo 'Query Error';
      } else {
          echo 'New CHAPTER added';
          header ("Location: ./chapters.php?id=".$_SESSION['serie_actual']);

      }
      echo '<br>';
      echo "<form action='chapters.php?$id'>
            <input type='submit' value='Volver' />
            </form>";

      //echo "PRODUCT ADDED";
  }

 ?>

<?php endif; ?>
<br>

  </body>
</html>
