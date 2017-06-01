<!DOCTYPE html>
<html lang="">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="description" content="Smart Bottom Slide Out Menu" />
  <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
  <link rel="stylesheet" href="../style/admin.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href=" ">
  <title>users</title>

</head>
    <body>

      <?php
      $id = $_GET['id'];
      //CREATING THE CONNECTION
      include_once("../connection.php");

      if ($result = $connection->query("SELECT * from users
        where user_id = '$id';")) {

        $obj = $result->fetch_object();

        echo "<form method='post'>";
        //echo "Film_gender: <input name='gender' value='$obj->film_gender'\><br><br>";
        echo "user_login: <input type='text' name='user_login' value='$obj->user_login'\><br><br>";
        echo "user_email: <input type='email' name='user_email' value='$obj->user_email'\><br><br>";
        //echo "user_pass: <input name='passworld' type='password' value='$obj->user_pass'\><br><br>";
        if ($obj->user_nicename == "admin") {
          echo "<span>user_nicename:</span>
          <select id='user_nicename' name='user_nicename' class = 'user_nicename' required>
            <option selected value='admin'>admin</option>
            <option value='user'>user</option>
            <option value='banned'>banned</option>
          </select><br><br>";        }
          if ($obj->user_nicename == "user") {
            echo "<span>user_nicename:</span>
            <select id='user_nicename' name='user_nicename' class = 'user_nicename' required>
              <option value='admin'>admin</option>
              <option selected value='user'>user</option>
              <option value='banned'>banned</option>
            </select><br><br>";        }
            if ($obj->user_nicename == "banned") {
              echo "<span>user_nicename:</span>
              <select id='user_nicename' name='user_nicename' class = 'user_nicename' required>
                <option value='admin'>admin</option>
                <option value='user'>user</option>
                <option selected value='banned'>banned</option>
              </select><br><br>";        }


        if ($obj->user_language == "Spanish") {
          echo "<span>user_language:</span>
          <select id='user_language' name='user_language' class = 'user_language' value='$obj->user_language' required>
            <option selected value='Spanish'>Spanish</option>
            <option value='English'>English</option>
          </select><br><br>";        }
          if ($obj->user_language == "English") {
            echo "<span>user_language:</span>
            <select id='user_language' name='user_language' class = 'user_language' value='$obj->user_language' required>
              <option value='Spanish'>Spanish</option>
              <option selected value='English'>English</option>
            </select><br><br>";        }

        echo "<button name='edit'>EDITAR</button>";
        echo "<input type='button' value='Volver' onClick=location.href='./index.php' />";

        echo "</from>";
      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }

      unset($obj);

      if (isset($_POST['edit'])) {

        //variables
        $login=$_POST['user_login'];
        $email=$_POST['user_email'];
        $pass=$_POST['user_pass'];
        $nicename=$_POST['user_nicename'];
        $language=$_POST['user_language'];
      //  $image=$_POST['image'];

        //consulta
        $consulta="UPDATE users SET
        `user_login` =  '$login',
        `user_email` =  '$email',
        `user_nicename` =  '$nicename',
        `user_language` =  '$language'
        WHERE  user_id =$id;";

        var_dump($consulta);
        if ($result = $connection->query($consulta))

           {
          header ("Location: ./index.php");
        } else {

              echo "Error: " . $result . "<br>" . mysqli_error($connection);
        }
      }
      unset($connection);
      ?>

      <script type="text/javascript" src=" "></script>
    </body>
</html>
