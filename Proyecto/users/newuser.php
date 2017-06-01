
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="description" content="Smart Bottom Slide Out Menu" />
  <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
  <link rel="stylesheet" href="../style/admin.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href=" ">
  <title>users</title>

</head>
  <body>

      <!-- PHP STRUCTURE FOR CONDITIONAL HTML -->
      <!-- FIRST TIME. NO DATA IN THE POST (checking a required form field) -->
      <!-- So we must show the form -->

      <?php
		if (!isset($_POST["login"])) : ?>
        <form method="post" enctype='multipart/form-data'>
            <span>user name:</span><input type="text" name="login" required><br>
            <span>password:</span><input type="password" name="pass" ><br>
            <span>password again:</span><input type="password" name="pass2" ><br>
            <span>email:</span><input type="email" name="email" required><br>
            <span>language:</span>
              <select id="language" name="language" class = "language" required>
                <option value="English">English</option>
                <option value="Spanish">Spanish</option>
              </select><br>
              <span>nicename:</span>
              <select id="nicename" name="nicename" class = "nicename" required>
                <option value="admin">admin</option>
                <option value="user">user</option>
              </select><br><br>

          <!--  <span>Image: </span>
            <input class="form-control" type="file" name="image" required /><br><br> -->
	          <input type="submit" value="Enviar" name="send">
            <input type="button" value="Volver" onClick="location.href='index.php'" />

         <?php else: ?>

      <?php  echo "<h3>Showing data coming from the form</h3>";
        //var_dump($_POST);
        //CREATING THE CONNECTION
        //CREATING THE CONNECTION
        include_once("../connection.php");
  ?>

  <?php
  if (isset($_POST['send'])) {
    $login=$_POST['login'];
    $pass=$_POST['pass'];
    $pass2=$_POST['pass2'];
    $email=$_POST['email'];
    $language=$_POST['language'];
    $nicename=$_POST['nicename'];
if ($pass==$pass2){
  if ($nicename=="admin") {
    $consulta= "INSERT INTO users VALUES('',MD5('$pass'),'$login','$email','$nicename','$language','./img/root.jpg','1');";
  }else {
    $consulta= "INSERT INTO users VALUES('',MD5('$pass'),'$login','$email','$nicename','$language','./img/default.png','1');";
  }
  $result = $connection->query($consulta);
  if (!$result) {
      print_r("$consulta");
     echo "Query Error";
  } else {
      echo "New USER added";
  }
  echo '<br>';
  echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=./index.php">';
  //echo "PRODUCT ADDED";
}else {
  echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=./newuser.php">';
  echo 'Passwords don´t match';}
}


   ?>

<?php endif ?>
<br>
  </body>
</html>
