<?php
session_start();
include_once("../connection.php");


$logueado = $_SESSION['username'];
$id = $_GET['id'];

$iduserc="SELECT user_id from users where user_login = '$logueado';";

$iduser = $connection->query($iduserc);
$objeto = $iduser->fetch_object();
$iduserf = $objeto->user_id;
$visto1="SELECT saw FROM see_chapters WHERE user_id = '$objeto->user_id'
AND chapter_id = '$id';";
$result5 = $connection->query($visto1);
$obj=$result5->fetch_object();
$visto = $obj->saw;
var_dump($visto);
if ($visto == '1') {
  $consulta= "UPDATE see_chapters SET  `saw` =  '0'
  WHERE chapter_id ='$id' AND user_id ='$objeto->user_id';";
}
else if ($visto == '0') {
  $consulta= "UPDATE see_chapters SET  `saw` =  '1'
  WHERE chapter_id ='$id' AND user_id ='$objeto->user_id';";
} else {
  $consulta= "INSERT INTO see_chapters (
  `chapter_id` ,`user_id` ,`saw`)
  VALUES ('$id',  '$iduserf',  '1');";
}
var_dump($consulta);
if ($result = $connection->query($consulta))

   {
     $consulta2="SELECT serie_id from chapters WHERE chapter_id = '$id'";
     var_dump($consulta2);
     $result2 = $connection->query($consulta2);
     $obj2 = $result2->fetch_object();
     $idserie="$obj2->serie_id";

  header ("Location: ./serieinfo.php?id=$idserie");
} else {

      echo "Error: " . $result . "<br>" . mysqli_error($connection);
}

unset($connection);
?>
