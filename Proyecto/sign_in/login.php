<!DOCTYPE html>

<html lang="en">

<head>
    <title>Login</title>

    <meta charset="utf-8">
</head>
<style>

body {
    background-image: url("login.png");
    background-color: #cccccc;
    background-size:100%;
    background-repeat: no-repeat;
    overflow-x hidden;
}
#login {
    align-self: center;
    position: absolute;
    margin-left: 310px;
    margin-top:100px;
}
input[type="text"], input[type="password"]{
    margin-top:18px;
    background: #ffffff44;
    text-decoration: none;
    border-style: none;
    border-radius: 6px;
    padding: 5px 10px;
    width: 110%;
    color: white;
    font-size: 1.4em;
}
input[type="password"]{

}

input[type="submit"], input[type="button"]{
  margin-top: 85px;
margin-left: 30px;
text-decoration: none;
background: #ffffff00;
width: 130px;
height: 34px;
font-size:14pt;
color: #fff;
BORDER: rgb(128,128,128) 1px;
}
input[type="button"]{
    margin-left: 22px;
}

  @media all and (max-width: 769px) {

  }


</style>

<body>

  <?php
  session_start();
$nombre="../connection.php";
$directorio = "../instalador";
$index="../instalador/index.php";
$tablas="../instalador/tablas.php";
$sample="../instalador/sample.php";
$sampledata="../instalador/sampledata.php";
$admin="../instalador/admin.php";
if(file_exists($nombre)){
require_once($nombre);
if(file_exists($index)){
unlink($index);
unlink($tablas);
unlink($sample);
unlink($sampledata);
unlink($admin);
rmdir($directorio);
}
}else{
header("Location:../instalador/index.php");
}
?>

    <div id="login">
        <form action="checklogin.php" method="post">
            <!--<label>Nombre Usuario o email:</label><br><-->
            <input name="username" type="text" id="username" placeholder="user o email" required><br>
              <!--<label>Password:</label><br><--><br>
            <input name="password" type="password" id="password" placeholder="Password" formenctype=""required>  <br>

            <input type="submit" name="Submit" value="LOGIN">
            <input type="button" value="REGISTER" onClick="location.href='../sign_up/register.php'" />
        </form>
    </div>

</body>

</html>
