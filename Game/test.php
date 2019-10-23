<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inside the Shadows</title>
    <link rel="stylesheet" href="./style/contenedor.css">
    <link rel="icon" href="./resources/img/Inside the Shadows ico.ico">
    <script>
      //console.log(pj);
      var coso = document.getElementById('img1').innerHTML;
      console.log(coso);
    </script>
  </head>
  <body>
    <div class="topBar"><p class="title">Inside the Shadows</p><img id="img1" src="./resources/img/Inside the Shadows.png" alt="RPG Game logo"></div>
    <div class="navBar">
      <ul>
        <li><a href="LogIN.php">Iniciar Sesión</a></li>
        <li><a href="register.php">Registrarse</a></li>
        <li><a href="index.php">Acerca de</a></li>
        <li><a href="#">FAQ</a></li>
      </ul>
    </div>
    <div class="contenedor">


      <div id='rival'>
		<h3 style='text-align:center;' id='suPersonaje'>''</h3>
		<div style='display:inline-block; padding: 20px;'><img src='./resources/img/rival.png' height=140px></div>
		<div style='display:inline-block;'>
			<div style='display:block;'>Vida<span id='VidaEl'><span class='barraEl'></span></span></div><br>
			<div style='display:block;'>Max Vida<span id='MaxVidaEl'><span class='barraEl'></span></span></div>
		</div>
	  </div>
	  <div id='log'><div class='wei'></div></div>
	  <div id='yo'>
		<h3 style='text-align:center;' id='miPersonaje'>''</h3>
		<div style='display:inline-block; margin-bottom:15px;padding:20px'><img src='./resources/img/sagiri.png' height=140px></div>
		<div style='display:inline-block;'>
			<div style='display:block;'>Vida<span id='VidaYo'><span class='barraYo'></span></span></div><br>
			<div style='display:block;'>Fuerza: <span id='Yo'></span></div><br>
			<div style='display:block;'>Inteligencia</div><br>
			<div style='display:block;'><input type='button' value='Atacar' name='atacar'><select></select></div><br>
		</div>
	  </div>
    </div>


  </body>
</html>
