<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inside the Shadows</title>
    <link rel="stylesheet" href="./style/contenedor.css">
    <link rel="stylesheet" href="./style/forms.css">
    <link rel="icon" href="./resources/img/Inside the Shadows ico.ico">
  </head>
  <body>
    <div class="topBar"><p class="title">Inside the Shadows</p><img id="img1" src="./resources/img/Inside the Shadows.png" alt="RPG Game logo"></div>
    <div class="navBar">
      <ul>
        <li><a href="LogIN.php">Iniciar Sesión</a></li>
        <li><a href="register.php">Registrarse</a></li>
        <li><a href="index.php">Acerca de</a></li>
        <li><a href="FAQ.php">FAQ</a></li>
      </ul>
    </div>
    <div class="contenedor">
      <h1>Registro</h1>
        <form method="post" action="./php_calculate/registration.php">
          <div class="inputs"><input class="user" type="text" name="usuario" placeholder='Usuario'><br></div>
          <div class="inputs"><input class="pass" type="password" name="password" placeholder='Password'><br></div>
          <div class="inputs"><input type="submit" value="Registrarse" name='register'></div>
        </form>
    </div>
  </body>
</html>
