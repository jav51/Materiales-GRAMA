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
            <a class="navbar-brand" href="index.html" alt="logo"></a>
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
include("cabecera.php");

$conn = new Connection();

$db = $conn->getConnection();


if(isset($_SESSION["session_username"])){

header("Location: index.html");
}

if(isset($_GET["login"])){

if(!empty($_POST['usuario']) && !empty($_POST['pass'])) {
 $username=$_POST['usuario'];
 $password=$_POST['pass'];

$query = $db->prepare("SELECT * FROM usuarios WHERE correo_electronico='".$usuario."' AND password='".$pass."'");

$st = $query->execute();

$numrows=$st->rowCount();
 if($numrows!=0)
{
 while($row=$st->fetch(PDO::FETCH_ASSOC))
 {
 $dbusername=$row['usuario'];
 $dbpassword=$row['pass'];
 }

if($username == $dbusername && $password == $dbpassword)

{

 $_SESSION['session_username']=$username;

/* Redirect browser */
 header("Location: index.html");
 }
 }
 else{

   $query = $db->prepare("SELECT * FROM empleados WHERE correoElectronico='".$usuario."' AND password='".$pass."'");

   $st = $query->execute();

   $numrows=$st->rowCount();
    if($numrows!=0)
   {
    while($row=$st->fetch(PDO::FETCH_ASSOC))
    {
    $dbusername=$row['usuario'];
    $dbpassword=$row['pass'];
    }

   if($username == $dbusername && $password == $dbpassword)
   {

    $_SESSION['session_username']=$username;

    header("Location: index.html");
    }
 }
 else {

$message = "Nombre de usuario ó contraseña invalida!";
 }

}} else {
 $message = "Todos los campos son requeridos!";
}
}

?>

 <div class="container mlogin">
 <div id="login">
 <h1>Logueo</h1>
<form name="loginform" id="loginform" action="" method="POST">
 <p>
 <label for="user_login">Nombre De Usuario<br />
 <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
 </p>
 <p>
 <label for="user_pass">Contraseña<br />
 <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
 </p>
 <p class="submit">
 <input type="submit" name="login" class="button" value="Entrar" />
 </p>
 <p class="regtext">No estas registrado? <a href="register.php" >Registrate Aquí</a>!</p>
</form>

</div>

</div>

 <?php include("includes/footer.php"); ?>

 <?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
