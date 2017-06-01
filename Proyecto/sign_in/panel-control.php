<!DOCTYPE html>
<html lang="en">

<head>
    <title>Panel de Control</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Smart Bottom Slide Out Menu" />
    <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />

</head>

<body>

<?php
session_start();



//echo '()<img src="$imagen" width=80% />)';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

}else {
      echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=login.html">';
      session_destroy();
      echo 'No estas registrado';
      exit;

  }

    if (isset($_SESSION['user_nicename']) && $_SESSION['user_nicename'] == 'admin') {
      $logueado=$_SESSION['username'];
      $imagen=$_SESSION['user_image'];
      include_once("../connection.php");



?>
      <div id="perfil">

     <div id="foto"><a href="perfil.php" id="imagen" title="usuario"><?php echo "<img
        style='width:47px; height:47px;'
        src='../users/$imagen'>"; ?></div>
        <div id="texto">
        <a href="perfil.php"><?php echo "$logueado"; ?></a></span></a><br>
        <a href="../sign_in/logout.php">Cerrar Sesion</a></span></a>
      </div>
     </div>

  <h1>Panel de Control</h1>
  <p></p>

    <div id="film">
    <a href ="../films/">Peliculas</a>
    </div>

    <div id="series">
    <a href ="../series/">Series</a></li>
    </div>

    <div id="users">
    <a href ="../users/">Usuarios</a></li>
    </div>

    <div id="news">
    <a href ="../news/">Noticias</a></li>
    </div>

  <?php
   $result = $connection->query('SELECT count(*) AS total FROM films;');
  $result2 = $connection->query('SELECT count(*) AS total FROM series;');
  $result3 = $connection->query('SELECT count(*) AS total FROM news;');
  $result4 = $connection->query('SELECT count(*) AS total FROM users WHERE user_nicename = "admin";');
  $result5 = $connection->query('SELECT count(*) AS total FROM users WHERE user_nicename = "user";');
  $result6 = $connection->query('SELECT count(*) AS total FROM users WHERE user_nicename = "banned";');

  $obj=$result->fetch_object();
  $obj2=$result2->fetch_object();
  $obj3=$result3->fetch_object();
  $obj4=$result4->fetch_object();
  $obj5=$result5->fetch_object();
  $obj6=$result6->fetch_object();

  $pelis=$obj->total;
  $series=$obj2->total;
  $news=$obj3->total;
  $admin=$obj4->total;
  $user=$obj5->total;
  $banned=$obj6->total;


?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
      // data.addRows([
        ['Task', 'Hours per Day'],
        ['Series',  <?php echo "$series" ?>],
        ['Films',  <?php echo "$pelis" ?>],
        ['News',  <?php echo "$news" ?>]
      ]);

      var options = {
        title: 'Proporción contenido'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
  <div id="piechart" style="width: 450px; height: 250px;"></div>


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Admin',  <?php echo "$admin" ?>],
            ['Users',  <?php echo "$user" ?>],
            ['Banned',  <?php echo "$banned" ?>]
          ]);

          var options = {
            title: 'Proporción de usuarios',
            pieHole: 0.4,
          };

          var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
          chart.draw(data, options);
        }
      </script>
      <div id="donutchart" style="width: 450px; height: 250px;"></div>



<?php


} else {
    echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=login.html">';
    session_destroy();
    echo 'No tienes permiso para acceder a esta pagina, ';
    echo 'hasta luego maricarmen';


//   echo "<br><a href='login.html'>Login</a>";
//echo "<br><br><a href='../sign_up/newuser.php'>Registrarme</a>";
}
  ?>
</body>
</html>
