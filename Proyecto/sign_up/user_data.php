
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}
    //NO SE USA

table {
  font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;
    margin: 45px;
    width: 480px;
    text-align: center;
    border-collapse: collapse;
  }

th {
  font-size: 20px;
  font-weight: normal;
  padding: 7px;
  background: #b9c9fe;
  border-top: 4px
  solid #aabcfe;
  border-bottom: 1px
  solid #fff;
  color: #039;
 }

td {
  padding: 8px;
  background: #e8edff;
  border-bottom: 1px
  solid #fff;
  color: #669;
  border-top: 1px
  solid transparent;
}

tr:hover td {
  background: #d0dafd;
  color: #339;
}
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>
  <body>
      <!-- PHP STRUCTURE FOR CONDITIONAL HTML -->
      <!-- FIRST TIME. NO DATA IN THE POST (checking a required form field) -->
      <!-- So we must show the form -->

      <?php
		if (!isset($_POST["login"])) : ?>
        <form method="post" enctype='multipart/form-data'>
          <fieldset>
            <legend>Sign Up</legend>
            <span>user name:</span><input type="text" name="login" required><br>
            <span>password:</span><input type="password" name="pass" ><br>
            <span>email:</span><input type="email" name="email" required><br>
            <span>language:</span>
              <select id="language" name="language" class = "language" required>
                <option value="English">English</option>
                <option value="Spanish">Spanish</option>
              </select><br>

            <span>Image: </span>
            <input class="form-control" type="file" name="image" required /><br><br>
	          <input type="submit" value="Enviar" name="send">
            <input type="button" value="Volver" onClick="location.href='../sign_in/login.html'" />

	         </fieldset>
         <?php else: ?>

      <?php  echo "<h3>Showing data coming from the form</h3>";
        //var_dump($_POST);
        //CREATING THE CONNECTION
        include_once("../connection.php");

  ?>

  <?php
  if (isset($_POST['send'])) {
    $login=$_POST['login'];
    $pass=$_POST['pass'];
    $email=$_POST['email'];
    $language=$_POST['language'];
    $tmp_file = $_FILES['image']['tmp_name'];
    $target_dir = "../users/img/";
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
      $consulta= "INSERT INTO users VALUES('','1',MD5('$pass'),'$login','$email','user','$language','$target_file');";
      $result = $connection->query($consulta);
      if (!$result) {
          print_r("$consulta");
         echo "Query Error";
      } else {
          echo "New USER added";
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
