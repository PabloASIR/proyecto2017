
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}

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
            <span>password again:</span><input type="password" name="pass2" ><br>
            <span>email:</span><input type="email" name="email" required><br>
            <span>language:</span>
              <select id="language" name="language" class = "language" required>
                <option value="English">English</option>
                <option value="Spanish">Spanish</option>
              </select><br>

          <!--  <span>Image: </span>
            <input class="form-control" type="file" name="image" required /><br><br> -->
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
    $pass2=$_POST['pass2'];
    $email=$_POST['email'];
    $language=$_POST['language'];
if ($pass==$pass2){
  $consulta= "INSERT INTO users VALUES('',MD5('$pass'),'$login','$email','user','$language','./img/default.png','1');";
  $result = $connection->query($consulta);
  if (!$result) {
    //  print_r("$consulta");
     echo "el Usuario ya existe";
  } else {
      echo "New USER added";
      echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=../sign_in/login.html">';

  }
  echo '<br>';
  echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=register.php">';
  //echo "PRODUCT ADDED";
}else {
  echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=register.php">';
  echo 'Passwords don´t match';}
}


   ?>

<?php endif ?>
<br>
  </body>
</html>
