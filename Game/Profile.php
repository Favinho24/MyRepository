<?php
  require './php_calculate/Personajes.php';
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Inside the Shadows</title>
     <link rel="stylesheet" href="./style/contenedor.css">
     <link rel="icon" href="./resources/img/Inside the Shadows ico.ico">
     <link rel="stylesheet" href="./style/frame.css">
	 <link rel="stylesheet" href="./style/carga.css">
     <script src="./JS/CloseSession.js"></script>
	 <script src="./JS/Multiplayer.js"></script>
	 <script src="./JS/Tienda.js"></script>
     <script>
		var pj=null;
		var pjselectactual=null;
		var Wa_id= '<?php echo $Wa->GetIdCharacter(); ?>';
		var Wa_nom= '<?php echo $Wa->GetNombre(); ?>';
		var Wa_hp= '<?php echo $Wa->GetHP(); ?>';
		var Wa_hp_max= '<?php echo $Wa->GetHP_Max(); ?>';
		var Wa_str= '<?php echo $Wa->GetStr(); ?>';
		var Wa_iq= '<?php echo $Wa->GetIQ(); ?>';
		
		var Wi_id= '<?php echo $Wi->GetIdCharacter(); ?>';
		var Wi_nom= '<?php echo $Wi->GetNombre(); ?>';
		var Wi_hp= '<?php echo $Wi->GetHP(); ?>';
		var Wi_hp_max= '<?php echo $Wi->GetHP_Max(); ?>';
		var Wi_str= '<?php echo $Wi->GetStr(); ?>';
		var Wi_iq= '<?php echo $Wi->GetIQ(); ?>';
		
		function CloseSession() {
			ajax();
			window.location="./index.php";
		}
		function Multiplayer() {
			if (pj != null) {
				EnterMP(pj);
			}else{
				alert('Seleccione un Player');
			}
		}
    function Tienda() {
      if (pj!= null) {
        cargarTienda(pj);
      }else {
        alert('Seleccione un Player');
      }
    }
		function seleccionarpj(per, idwea) {

			if (per == pj){
				pj = null;
				document.getElementById(idwea).style.border='';
				pjselectactual=null;
				return;
			}
			if (pjselectactual != null) {
				document.getElementById(pjselectactual).style.border='';
			}

			pj=per;
			document.getElementById(idwea).style.border='1px solid red';
			pjselectactual=idwea;
		}
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
     <div class="contenedor" id='1c'>
       <h1>Mi Perfil</h1>
        <div class="frame" id='f1' onclick='seleccionarpj(<?php echo $Wa->GetIdCharacter(); ?>, this.id);'>
          <p>
             Nombre: <?php echo $Wa->GetNombre(); ?> <br><br>
             Oro: <?php echo $Wa->GetGold(); ?> <br><br>
             HP: <?php echo $Wa->GetHP(); ?> <br><br>
			 Vida Máxima: <?php echo $Wa->GetHP_Max(); ?><br><br>
             Fuerza: <?php echo $Wa->GetStr(); ?> <br><br>
             Inteligencia: <?php echo $Wa->GetIQ(); ?>
          </p>
            <img style="margin:auto;" src="./resources/img/Warrior.png" alt="Warrior" height="120" width="100">
        </div>
        <br>
        <div class="frame" id='f2' onclick='seleccionarpj(<?php echo $Wi->GetIdCharacter(); ?>, this.id);'>
          <p>
             Nombre: <?php echo $Wi->GetNombre(); ?> <br><br>
             Oro: <?php echo $Wi->GetGold(); ?> <br><br>
             HP: <?php echo $Wi->GetHP(); ?> <br><br>
			 Vida Máxima: <?php echo $Wi->GetHP_Max(); ?><br><br>
             Fuerza: <?php echo $Wi->GetStr(); ?> <br><br>
             Inteligencia: <?php echo $Wi->GetIQ(); ?>
          </p>
          <img style="margin:auto;" src="./resources/img/Wizard.png" alt="Wizard" height="120" width="100">
     </div>
	 
        <br><br><br><br>
        <input class="myButton buttonMultiplayer" type="button" name="multiplayer" value="Multiplayer" onclick="Multiplayer();">
        <input class="myButton buttonTienda" type="button" name="tienda" value="Tienda" onclick="Tienda();">
        <input class="myButton buttonExit" type="button" name="exit" value="Exit" onclick="CloseSession();">
   </body>
 </html>
