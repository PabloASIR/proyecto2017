<!DOCTYPE html>
<html lang="">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="description" content="Smart Bottom Slide Out Menu" />
  <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
  <link rel="stylesheet" href="../style/admin2.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href=" ">
  <title>news</title>

</head>
    <body>
      <?php
            //CREATING THE CONNECTION
            include_once("../connection.php");

            //MAKING A SELECT QUERY
            /* Consultas de selección que devuelven un conjunto de resultados */
            if ($result = $connection->query('SELECT *
              FROM news;')) {

                ?>
<h1>News</h1>
      <table style="border:1px solid black">
      <thead>
        <tr>
          <th>news_image</th>
          <th>news_title</th>
          <th>news_info</th>
          <th>news_date</th>
          <th>news_url</th>
          <th>name</th>
          <th>Borrar</th>
          <th>modificar</th>


      </thead>


      <?php

                //FETCHING OBJECTS FROM THE RESULT SET
                //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
                while ($obj = $result->fetch_object()) {
                    //PRINTING EACH ROW
                    echo '<tr>';
                    echo '<td><img src="'.$obj->news_image.'" width=40% /></td>';
                    echo '<td>'.$obj->news_title.'</td>';
                    echo '<td>'.substr($obj->news_info,0,65)."...".'</td>';
                    echo '<td>'.$obj->news_date.'</td>';
                    echo '<td>'.substr($obj->news_url,0,55).'</td>';

                    if ($obj->film_id == NULL) {
                      $serie=$obj->serie_id;
                      $result2 = $connection->query("SELECT serie_name
                      FROM series WHERE serie_id='$serie;'");
                      $obj2 = $result2->fetch_object();
                      echo '<td>'.$obj2->serie_name.'</td>';

                  }else{
                    $pelicula=$obj->film_id;
                    $result3 = $connection->query("SELECT film_name
                    FROM films WHERE film_id='$pelicula;'");
                    $obj3 = $result3->fetch_object();
                    echo '<td>'.$obj3->film_name.'</td>';
                                    }
                    echo '<td><a title="Borrar" href="borrar.php?id='.$obj->news_id.'">
                    <img width="40" height="40" src="del.png" alt="Borrar" /></a></td>';

                    echo '<td><a title="editar" href="editar.php?id='.$obj->news_id.'">
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
    <input type="button" value="add news" onClick="location.href='addnews.php'" />
    <!-- <input type="button" value="add film news" onClick="location.href='addnews2.php'" /> -->


    <input type="button" value="Volver" onClick="location.href='../sign_in/panel-control.php'" />


      <script type="text/javascript" src=" "></script>
    </body>
</html>
