<!DOCTYPE html>
<html lang="">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="description" content="Smart Bottom Slide Out Menu" />
  <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
  <link rel="stylesheet" href="../style/admin.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href=" ">
  <title>series</title>

</head>

    <body>
      <?php
            //CREATING THE CONNECTION
            include_once("../connection.php");

            //MAKING A SELECT QUERY
            /* Consultas de selección que devuelven un conjunto de resultados */
            if ($result = $connection->query('SELECT * FROM series;')) {
                ?>
<h1>Series</h1>
      <table style="border:1px solid black">
      <thead>
        <tr>
          <th>serie_image</th>
          <th>serie_name</th>
          <th>serie_gender</th>
          <th>serie_sinopsis</th>
          <th>serie_trailer</th>
          <th>serie_date_release</th>
          <th>capitulos</th>
          <th>Borrar</th>
          <th>modificar</th>


      </thead>


      <?php

                //FETCHING OBJECTS FROM THE RESULT SET
                //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
                while ($obj = $result->fetch_object()) {
                    //PRINTING EACH ROW
                    echo '<tr>';
                    echo '<td><img src="'.$obj->serie_image.'" width=40% /></td>';
                    echo '<td>'.$obj->serie_name.'</td>';
                    echo '<td>'.$obj->serie_gender.'</td>';
                    echo '<td>'.substr($obj->serie_sinopsis,0,55).'</td>';
                    echo '<td>'.$obj->serie_trailer.'</td>';
                    echo '<td>'.$obj->serie_date_release.'</td>';


                    echo '<td><a title="chapters" href="chapters.php?id='.$obj->serie_id.'">
                    <img width="40" height="40" src="chapters.png" alt="Borrar" /></a></td>';

                    echo '<td><a title="Borrar" href="borrar.php?id='.$obj->serie_id.'">
                    <img width="40" height="40" src="del.png" alt="Borrar" /></a></td>';

                    echo '<td><a title="editar" href="editar.php?id='.$obj->serie_id.'">
                    <img width="40" height="40" src="mod.png" alt="editar" /></a></td>';


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
    <input type="button" value="new serie" onClick="location.href='newserie.php'" />

    <input type="button" value="Volver" onClick="location.href='../sign_in/panel-control.php'" />

      <script type="text/javascript" src=" "></script>
    </body>
</html>
