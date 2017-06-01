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

if (!isset($_POST["login"])) : ?>
    <form method="post" enctype='multipart/form-data'>
      <fieldset>
        <legend>create admin user</legend>
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
$consulta= "INSERT INTO users VALUES('',MD5('$pass'),'$login','$email','admin','$language','./img/root.jpg','1');";
$result = $connection->query($consulta);
if (!$result) {
//  print_r("$consulta");
 echo "error,el usuario ya existe";
} else {
  echo "New admin added";
  // echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=../sign_in/login.php">';

}
echo '<br>';
echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=../sign_in/login.php">';
//echo "PRODUCT ADDED";
}else {
echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=./admin.php">';
echo 'Passwords don´t match';}
}


?>

<?php endif ?>

    </body>
</html>
