<?php

  ob_start();
  require ('../DB/DBClass.php');
  require ('../DB/DBVars.php');

  $database = new DatabaseObject($host, $username, $password, $database);

if (!empty($_REQUEST['register'])) {
  $username = $database->clean($_REQUEST['usuario']);
  $password = $database->clean($_REQUEST['password']);

  try {
    //username
    $a=$database->fetch($database->query("SELECT `nombre` FROM `Usuario` WHERE `nombre`='$username' LIMIT 1;"));
    if ($a['nombre']) {
      throw new Exception("Usuario ya existente");
    }
    if (strlen($username) < 5) {
      throw new Exception("Minimo 5 Caracteres");
    }
    if (strlen($username) > 50) {
      throw new Exception("Máximo 50 Caracteres");
    }

    if (!ctype_alnum($username)) {
      throw new Exception("Solo letras y numeros permitidos en el Usuario");
    }

    //password
    if (strlen($password) < 8) {
      throw new Exception("La contraseña tiene que tener com minimo 8 caracteres");
    }

    //Submit to the database
    $password = md5($password);
    $database->query("INSERT INTO `Usuario` (
      `nombre`,
      `pass`
    )
    VALUES (
      '$username',
      '$password'
    )");

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
       <h1>Registro</h1>
       <br>
           <?php
           if ($database->affected_rows() > 0 && $output=='') {
                echo '<p class="paragraph">Registro Existoso  <a href="../index.php">Volver</a> </p>';
           }else {
             echo '<p class="paragraph">'.$output.'. <a href="../index.php">Volver</a></p>';
           } ?>
         </p>
     </div>
   </body>
 </html>
