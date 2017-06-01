
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
  <title>new link film</title>

</head>
  <body>


      <?php

        if (!isset($_POST['server'])) : ?>
        <form action="newlink.php" method="post" >
        <!--    <span>film_id:</span><input type="text" name="id" required><br> -->
            <span>link_server:</span><input type="text" name="server" required><br>
            <span>link_url:</span><input type="text" name="url" ><br>
            <input type="submit" value="Enviar" name="send">
            <input type="hidden" name='idfilm' value="<?php echo $_GET['idfilm']; ?>" />
            <input type="button" value="Volver"  onClick="location.href='index.php?id=<?php echo $_SESSION['capitulo_actual']?>'" />

        </form>
   <?php else: ?>

      <?php  echo '<h3>Showing data coming from the form</h3>';
        //var_dump($_POST);
        //CREATING THE CONNECTION
        include_once("../connection.php");


  if (isset($_POST['send'])) {
      $idfilm = $_POST['idfilm'];
      $server = $_POST['server'];
      $url = $_POST['url'];


      $consulta = "INSERT INTO  links (
`link_id` ,`link_url` ,`link_server` ,`film_id` ,`chapter_id`)
VALUES (NULL ,  '$url',  '$server',  '$idfilm', NULL
);";
      var_dump($consulta);
      $result = $connection->query($consulta);

      if (!$result) {
          print_r("$consulta");
          echo 'Query Error';
      } else {
          echo 'New LINK added';
          header ("Location: ./index.php?id=".$_SESSION['capitulo_actual']);

      }
      $prueba = $_SESSION['capitulo_actual'];
      echo '<br>';
      echo "<form action='index.php?.$prueba'>
            <input type='submit' value='Volver' />
            </form>";

      //echo "PRODUCT ADDED";
  }

 ?>

<?php endif; ?>
<br>

  </body>
</html>
