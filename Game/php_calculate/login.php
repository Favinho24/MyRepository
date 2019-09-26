<?php

  ob_start();
  session_start();
  require ('../DB/DBClass.php');
  require ('../DB/DBVars.php');

  $database = new DatabaseObject($host, $username, $password, $database);


if (!empty($_REQUEST['ingresar'])) {

  $username = $_REQUEST['usuario'];

  $us = $database->fetch($database->query("SELECT `nombre`,`pass` FROM `Usuario` WHERE `nombre`='$username' LIMIT 1"));
  $foundu = $us['nombre'];
  $foundp = $us['pass'];

  try {
    //username
    if ($foundu == $_REQUEST['usuario'] && $foundp == md5($_REQUEST['password'])) {
      $us=$database->fetch($database->query("SELECT `id` FROM `Usuario` WHERE `nombre`='$username' LIMIT 1"));
      $_SESSION['id_user'] = $us['id'];
      $_SESSION['user'] = $_REQUEST['usuario'];
      $_SESSION['pass'] = $_REQUEST['password'];
      header("Location: ../Profile.php");
    }else {
      throw new Exception("Login Incorrecto. <a href='../LogIN.php'>Volver</a>");
    }
  } catch (\Exception $e) {
    echo $e->getMessage();
  }
}

$output = ob_get_clean();

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Inside the Shadows</title>
     <link rel="stylesheet" href="../style/contenedor.css">
     <link rel="stylesheet" href="../style/forms.css">
     <link rel="icon" href="../resources/img/Inside the Shadows ico.ico">
   </head>
   <body>
     <div class="topBar"><p class="title">Inside the Shadows</p><img id="img1" src="../resources/img/Inside the Shadows.png" alt="RPG Game logo"></div>
     <div class="navBar">
       <ul>
         <li><a href="../LogIN.php">Iniciar Sesión</a></li>
         <li><a href="../register.php">Registrarse</a></li>
         <li><a href="../index.php">Acerca de</a></li>
         <li><a href="#">FAQ</a></li>
       </ul>
     </div>
     <div class="contenedor">
       <h1>Inicio de Sesión</h1>
       <br>
       <p class="paragraph">
           <?php
           if (empty($_REQUEST['ingresar'])){
             echo '<p class="paragraph">Ingrese como se debe.</p>';
           }
           echo $output;
          ?>
         </p>
     </div>
   </body>
 </html>
