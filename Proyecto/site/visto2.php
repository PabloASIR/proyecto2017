<?php
session_start();
include_once("../connection.php");


$logueado = $_SESSION['username'];
$id = $_GET['id'];

$iduserc="SELECT user_id from users where user_login = '$logueado';";

$iduser = $connection->query($iduserc);
$objeto = $iduser->fetch_object();
$iduserf = $objeto->user_id;
$visto1="SELECT saw FROM see_films WHERE user_id = '$objeto->user_id'
AND film_id = '$id';";
$result5 = $connection->query($visto1);
$obj=$result5->fetch_object();
$visto = $obj->saw;
var_dump($visto);
if ($visto == '1') {
  $consulta= "UPDATE see_films SET  `saw` =  '0'
  WHERE film_id ='$id' AND user_id ='$objeto->user_id';";
}
else if ($visto == '0') {
  $consulta= "UPDATE see_films SET  `saw` =  '1'
  WHERE film_id ='$id' AND user_id ='$objeto->user_id';";
} else {
  $consulta= "INSERT INTO see_films (
  `film_id` ,`user_id` ,`saw`)
  VALUES ('$id',  '$iduserf',  '1');";
}
var_dump($consulta);
if ($result = $connection->query($consulta))

   {
     $consulta2="SELECT film_id from films WHERE film_id = '$id'";
     var_dump($consulta2);
     $result2 = $connection->query($consulta2);
     $obj2 = $result2->fetch_object();
     $idfilm="$obj2->film_id";

  header ("Location: ./filminfo.php?id=$idfilm");
} else {

      echo "Error: " . $result . "<br>" . mysqli_error($connection);
}

unset($connection);
?>
