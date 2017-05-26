<!DOCTYPE html>
<html>
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="stylesv2.css" />

    <title>Iniciar sesion GRAMA</title>

  </head>
  <body>
    <header class="flexdad navbar">
        <div class="dentro logo navbar_logo">
            <a class="navbar-brand" href="index.php" alt="logo"></a>
        </div>
        <div class="topmenu">
        <ul class="navmenu listanavmenu">
          <li >
            <a href="AcercaDe.html">
              <span>Acerca de Nosotros</span>
            </a>
          </li>
          <li >
            <a href="Productos.html">
              <span>Productos</span>
            </a>
        </li>
          <li >
            <a href="Servicios.html">
              <span>Servicios</span>
            </a>
        </li>
        </ul>
      </div>

      </header>
<?php
session_start();
require_once("Database_connect.php");

$conn = new Connection();

$db = $conn->getConnection();


if(isset($_SESSION["session_username"])){

header("Location: index.php");
}

if(isset($_GET["login"])){

if(!empty($_POST['usuario']) && !empty($_POST['pass'])) {
 $username=$_POST['usuario'];
 $password=$_POST['pass'];

$st = $db->prepare("SELECT * FROM usuarios WHERE correo_electronico='".$username."' AND password='".$password."'");

$st->execute();

$numrows=$st->rowCount();

 if($numrows!=0)
{
 while($row=$st->fetch(PDO::FETCH_ASSOC))
 {
 $dbusername=$row['correo_electronico'];
 $dbpassword=$row['password'];
 $dbadmin=$row['codigo_admin'];
 }
require_once 'config.php';
$admin = ADMIN;
if($username == $dbusername && $password == $dbpassword && $admin == $dbadmin)
{

 $_SESSION['session_username']=$username;
 $_SESSION['session_id']=$admin;
/* Redirect browser */
 header("Location: index.php");
 }else
 if($username == $dbusername && $password == $dbpassword)
 {

  $_SESSION['session_username']=$username;

 /* Redirect browser */
  header("Location: index.php");
  }
 
  else {?>

<div class="formularyTable horicenter">
 <span>Usuario o contraseña incorrectos</span>
</div>
<button type="button"><a href="Inicio_sesion.html">Regresar</a></button>
</body>
</html>
<?php
 }

}} else {
 $message = "Todos los campos son requeridos!";
}
}

if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
