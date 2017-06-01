
<?php
  session_start();


?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="description" content="Smart Bottom Slide Out Menu" />
  <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
  <link rel="stylesheet" href="../style/admin.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href=" ">
  <title>chapters</title>

</head>
    
    <body>
      <?php
            //CREATING THE CONNECTION
            include_once("../connection.php");

            //MAKING A SELECT QUERY
            /* Consultas de selección que devuelven un conjunto de resultados */
            $id = $_GET['id'];

            $_SESSION['serie_actual']=$id;

          //  var_dump($_SESSION['serie_actual']);
            $seleccion = "SELECT * FROM chapters where serie_id=$id;";
            $consulta = "SELECT * FROM series where serie_id=$id;";

            if ($result = $connection->query($seleccion)) {
                //$obj = $result->fetch_object();
                if ($result1 = $connection->query($consulta)) {
                    $obj2 = $result1->fetch_object();

                    echo "<h1>$obj2->serie_name</h1>";
                    //var_dump($result);
                  //  var_dump($seleccion."<br>");
                  //  var_dump($obj);
                  //  var_dump($obj->chapter_name);
        ?>

      <table style="border:1px solid black">
      <thead>
        <tr>
          <th>chapter_number</th>
          <th>chapter_name</th>
          <th>chapter_date_release</th>
          <th>links</th>
          <th>modificar</th>
          <th>Borrar</th>


      </thead>
      <?php

                //FETCHING OBJECTS FROM THE RESULT SET
                //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
                while ($obj = $result->fetch_object()) {
                    //PRINTING EACH ROW
                    echo '<tr>';
                    echo '<td>'.$obj->chapter_season.'X'.$obj->chapter_number.'</td>';
                    echo '<td>'.$obj->chapter_name.'</td>';
                    echo '<td>'.$obj->chapter_date_release.'</td>';

                    echo '<td><a title="links" href="../links_series/index.php?id='.$obj->chapter_id.'">
                    <img width="40" height="40" src="links.png" alt="links" /></a></td>';

                    echo '<td><a title="editar" href="editarchapter.php?id='.$obj->chapter_id.'">
                    <img width="40" height="40" src="mod.png" alt="editar" /></a></td>';

                    echo '<td><a title="Borrar" href="borrarchapter.php?id='.$obj->chapter_id.'">
                    <img width="40" height="40" src="del.png" alt="Borrar" /></a></td>';





                    //echo <td><button class="btn" action="borrar."></button></td>

                    echo '</tr>';
                }
                } else {
                    mysqli_error($connection);
                }
                mysqli_error($connection);
            }

    //header ("Location: ./index.php");

/*  echo '<br>';
echo "<form action='index.php'>
    <input type='submit' value='Volver' />
    </form>";*/
?>
</table>
<input type="button" value="new chapter" onClick="location.href='newchapter.php?idserie=<?php echo $_GET['id']; ?>'" />

<input type="button" value="Volver" onClick="location.href='./index.php'" />
</body>
</html>
