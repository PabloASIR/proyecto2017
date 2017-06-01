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
      include_once("../../connection.php");
$prueba=$_GET['usuario'];

if ($result = $connection->query("UPDATE users SET `user_theme` = '1' WHERE user_login ='$prueba';"))
   {
  header ("Location: ../index.php");
} else {

      echo "Error: " . $result . "<br>" . mysqli_error($connection);
}

unset($connection);
?>

       ?>
      <script type="text/javascript" src=" "></script>
    </body>
</html>
