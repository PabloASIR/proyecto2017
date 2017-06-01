<!DOCTYPE html>
<html lang="">
  <head>
    <title>films</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Smart Bottom Slide Out Menu" />
    <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
    <link rel="stylesheet" href="../style/admin.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href=" ">
    </head>
    <body>
      <?php
            include_once("../connection.php");

            //MAKING A SELECT QUERY
            /* Consultas de selección que devuelven un conjunto de resultados */
            if ($result = $connection->query('SELECT * FROM films;')) {
                ?>
<h1>Films</h1>
      <table style="border:1px solid black">
      <thead>
        <tr>
          <th>film_image</th>
          <th>film_name</th>
          <th>serie_sinopsis</th>
          <th>film_gender</th>
          <th>film_duration</th>
          <th>film_trailer</th>
          <th>film_date_release</th>
          <th>links</th>
          <th>edit</th>
          <th>delete</th>



      </thead>


      <?php

                //FETCHING OBJECTS FROM THE RESULT SET
                //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
                while ($obj = $result->fetch_object()) {
                    //PRINTING EACH ROW
                    echo '<tr>';
                    echo '<td><img src="'.$obj->film_image.'" width=40% /></td>';
                    echo '<td>'.$obj->film_name.'</td>';
                    echo '<td>'.substr($obj->film_sinopsis,0,55).'</td>';
                    echo '<td>'.$obj->film_gender.'</td>';
                    echo '<td>'.$obj->film_duration.'</td>';
                    echo '<td>'.$obj->film_trailer.'</td>';
                    echo '<td>'.$obj->film_date_release.'</td>';

                    echo '<td><a title="links" href="../links_films/index.php?id='.$obj->film_id.'">
                    <img width="40" height="40" src="links.png" alt="links" /></a></td>';

                    echo '<td><a title="editar" href="editar.php?id='.$obj->film_id.'">
                    <img width="40" height="40" src="mod.png" alt="editar" /></a></td>';

                    echo '<td><a title="Borrar" href="borrar.php?id='.$obj->film_id.'">
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
    <input type="button" value="new film" onClick="location.href='newfilm.php'" />

    <input type="button" value="Volver" onClick="location.href='../sign_in/panel-control.php'" />


      <script type="text/javascript" src=" "></script>
    </body>
</html>
