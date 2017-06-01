
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
  <title>link series</title>

</head>

    <body>
      <?php
            //CREATING THE CONNECTION
            include_once("../connection.php");

            //MAKING A SELECT QUERY
            /* Consultas de selección que devuelven un conjunto de resultados */
            $id = $_GET['id'];
            $_SESSION['capitulo_actual']=$id;

            $consulta = "SELECT * FROM chapters where chapter_id=$id;"; //ARREGLAR
            $seleccion = "SELECT * FROM links where chapter_id='$id';";
          //  var_dump($consulta);
            if ($result = $connection->query($seleccion)) {

                if ($result1 = $connection->query($consulta)) {
                  $obj2 = $result1->fetch_object();
                  echo "<h1>$obj2->chapter_name</h1>";

        ?>

      <table style="border:1px solid black">
      <thead>
        <tr>
          <th>link_server</th>
          <th>link_url</th>
          <th>edit</th>
          <th>delete</th>


      </thead>
      <?php

                //FETCHING OBJECTS FROM THE RESULT SET
                //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
                while ($obj = $result->fetch_object()) {
                    //PRINTING EACH ROW
                    echo '<tr>';
                    echo '<td>'.$obj->link_server.'</td>';
                    echo '<td>'.$obj->link_url.'</td>';

                    echo '<td><a title="editar" href="editarlink.php?id='.$obj->link_id.'">
                    <img width="40" height="40" src="mod.png" alt="editar" /></a></td>';

                    echo '<td><a title="Borrar" href="borrarlink.php?id='.$obj->link_id.'">
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
<input type="button" value="new link" onClick="location.href='newlink.php?idchapter=<?php echo $_GET['id']; ?>'" />

<input type="button" value="volver" onClick="location.href='../series/chapters.php?id=<?php echo $_SESSION['serie_actual']; ?>'" />

</body>
</html>
