<!DOCTYPE html>
<html lang="">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="description" content="Smart Bottom Slide Out Menu" />
  <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
  <link rel="stylesheet" href="../style/admin2.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href=" ">
  <title>users</title>

</head>

    <body>
      <?php
            //CREATING THE CONNECTION
            include_once("../connection.php");



            //MAKING A SELECT QUERY
            /* Consultas de selección que devuelven un conjunto de resultados */
            if ($result = $connection->query('SELECT * FROM users;')) {
                ?>
<h1>Users</h1><br>

      <table style="border:1px solid black">
      <thead>
        <tr>
          <th>image</th>
          <th>login</th>
          <th>pass</th>
          <th>email</th>
          <th>nicename</th>
          <th>language</th>
          <th>banear</th>
          <th>edit</th>
          <th>delete</th>



      </thead>


      <?php


                //FETCHING OBJECTS FROM THE RESULT SET
                //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
                while ($obj = $result->fetch_object()) {
                    //PRINTING EACH ROW
                    echo '<tr>';
                    echo '<td><img src="'.$obj->user_image.'" width=80% /></td>';
                    //echo '<td>'.$obj->user_registered.'</td>';
                    echo '<td>'.$obj->user_login.'</td>';
                    echo '<td>'.$obj->user_pass.'</td>';
                    echo '<td>'.$obj->user_email.'</td>';
                    echo '<td>'.$obj->user_nicename.'</td>';
                    echo '<td>'.$obj->user_language.'</td>';

                    echo '<td><a title="ban" href="ban.php?id='.$obj->user_id.'">
                    <img width="40" height="40" src="ban.png" alt="asignar" /></a></td>';

                    echo '<td><a title="editar" href="editar.php?id='.$obj->user_id.'">
                    <img width="40" height="40" src="mod.png" alt="editar" /></a></td>';

                    echo '<td><a title="Borrar" href="borrar.php?id='.$obj->user_id.'">
                    <img width="40" height="40" src="del.png" alt="Borrar" /></a></td>';




                    //echo <td><button class="btn" action="borrar."></button></td>


                    echo '</tr>';
                }

                          //Free the result. Avoid High Memory Usages
                          $result->close();
                unset($obj);
                unset($connection);
            }

       ?>
    </table>
    <input type="button" value="new user" onClick="location.href='newuser.php'" />

    <input type="button" value="Volver" onClick="location.href='../sign_in/panel-control.php'" />

    <input type="button" value="imprimir" onClick="location.href='imprimir.php'" />

      <script type="text/javascript" src=" "></script>
    </body>
</html>
