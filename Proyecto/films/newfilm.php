
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Smart Bottom Slide Out Menu" />
    <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
    <link rel="stylesheet" href="../style/admin.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href=" ">
    <title>new film</title>

  </head>
  <body>

      <!-- PHP STRUCTURE FOR CONDITIONAL HTML -->
      <!-- FIRST TIME. NO DATA IN THE POST (checking a required form field) -->
      <!-- So we must show the form -->

      <?php
		if (!isset($_POST["name"])) : ?>
        <form method="post" enctype='multipart/form-data'>
            <span>film_name:</span><input type="text" name="name" required><br>
            <span>film_sinopsis:</span><input type="text" name="sinopsis" ><br>
            <span>film_gender:</span><input type="text" name="gender" ><br>
            <span>film_duration:</span><input type="number" name="duration" ><br>
            <span>film_trailer:</span><input type="text" name="trailer"><br>
            <span>film_date_release:</span><input type="date" name="date_release" ><br>
            <label>Product Image: </label>
            <input class="form-control" type="file" name="image" required /><br><br>
	          <input type="submit" value="Enviar" name="send">
            <input type="button" value="Volver" onClick="location.href='index.php'" />

         <?php else: ?>

      <?php  echo "<h3>Showing data coming from the form</h3>";
        //var_dump($_POST);
        //CREATING THE CONNECTION
        include_once("../connection.php");

  ?>

  <?php
  if (isset($_POST['send'])) {
    $id=$_POST['id'];
    $sinopsis=$_POST['sinopsis'];
    $gender=$_POST['gender'];
    $name=$_POST['name'];
    $duration=$_POST['duration'];
    $trailer=$_POST['trailer'];
    $date_release=$_POST['date_release'];
    $tmp_file = $_FILES['image']['tmp_name'];
    $target_dir = "img/";
    foreach ($_FILES as $key => $value) {
      foreach ($value as $key2 => $value2) {
        if ($key2 == name ) {
          $nombre = $value2;
        }
      }
    }
    $target_file = strtolower($target_dir . basename($nombre));
    //Can we upload the file

    //var_dump($target_file);
    $valid= true;
    //Check if the file already exists
    if (file_exists("$target_file")) {
      echo "Sorry, file already exists. ";
      $valid = false;
    }
    //Check the size of the file. Up to 2Mb
    if ($_FILES['imagen']['size'] > (2048000)) {
      $valid = false;
      echo 'Oops!  Your file\'s size is to large.';
    }
    //Check the file extension: We need an image not any other different type of file
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); // We get the entension
    if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" && $file_extension!="gif") {
      $valid = false;
      echo "Only JPG, JPEG, PNG & GIF files are allowed";
    }
    if ($valid) {
      //Put the file in its place
      var_dump("$tmp_file --- $target_file");
      move_uploaded_file($tmp_file, $target_file);
      $consulta= "INSERT INTO films VALUES('$id','$gender','$name','$sinopsis','$duration','$trailer','$date_release','$target_file');";
      $result = $connection->query($consulta);
      header ("Location: ./index.php");

      if (!$result) {
          print_r("$consulta");
         echo "Query Error";
      } else {
          echo "New FILM added";
      }
      echo '<br>';
      echo "<form action='newfilm.php'>
            <input type='submit' value='Volver' />
            </form>";

      //echo "PRODUCT ADDED";
    }
  }
   ?>

<?php endif ?>
<br>

  </body>
</html>
