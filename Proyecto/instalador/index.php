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
		if (!isset($_POST["name"])) : ?>
      <form method="post" enctype='multipart/form-data'>
        <fieldset>

          <legend>Introduce datos</legend>
          <!-- <span>username:</span><input type="text" name="login" required><br>
          <span>password:</span><input type="password" name="pass" ><br> -->
          <span>ip address:</span><input type="text" name="ip" required><br>
          <span>name DDBB:</span><input type="text" name="name" required><br>
          <span>username DDBB:</span><input type="text" name="username" required><br>
          <span>password DDBB:</span><input type="password" name="pass" ><br>


         </fieldset>
         <input type="submit" value="Enviar" name="send">

       </form>
     <?php else: ?>

      <?php
      $username=$_POST["username"];
      $ip=$_POST["ip"];
      $name=$_POST["name"];
      $pass=$_POST["pass"];
      $a = '<?php $connection = new mysqli("'.$ip.'", "'.$username.'", "'.$pass.'", "'.$name.'");';
      $file=fopen("../connection.php","w");
      fwrite($file,$a);
      fclose($file);
      $connection = new mysqli("$ip","$username","$pass");
      $consulta= "create database $name;";
       $result = $connection->query($consulta);
         if (!$result) {
                 echo "Query Error";
               var_dump($consulta);
            }
            header("Refresh:0; url=tablas.php");

       ?>

     <?php endif ?>

    </body>
</html>
