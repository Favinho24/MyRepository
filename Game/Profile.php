<?php
  require './php_calculate/Personajes.php';
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Inside the Shadows</title>
     <link rel="stylesheet" href="./style/contenedor.css">
     <link rel="stylesheet" href="./style/lose.css">
     <link rel="stylesheet" href="./style/moreButton.css">
     <link rel="icon" href="./resources/img/Inside the Shadows ico.ico">
     <link rel="stylesheet" href="./style/frame.css">
	 <link rel="stylesheet" href="./style/carga.css">
     <script src="./JS/CloseSession.js"></script>
	 <script src="./JS/Multiplayer.js"></script>
	 <script src="./JS/Tienda.js"></script>
   <script src="./JS/ReLIFE.js"></script>
   <script src="./JS/Ranking.js"></script>
   <script src="./JS/Powa.js"></script>
     <script>

     function dateDiff(date) {
        var d = new Date();
        var da = new Date(date);
        if ((Math.floor((d-da) / (1000*60*60))) > 0 ) {
          return 'true';
		}else if(date == '') {
			return 'sinDatos';
		}else {
          return 'false';
        }
       //return 'true';
     }




    var pj=null;
 		var pjselectactual=null;

		var Wa_id= '<?php echo $Wa->GetIdCharacter(); ?>';
		var Wa_nom= '<?php echo $Wa->GetNombre(); ?>';
    var Wa_gold= '<?php echo $Wa->GetGold(); ?>';
		var Wa_hp= '<?php echo $Wa->GetHP(); ?>';
		var Wa_hp_max= '<?php echo $Wa->GetHP_Max(); ?>';
		var Wa_str= '<?php echo $Wa->GetStr(); ?>';
		var Wa_arm= '<?php echo $Wa->GetArm(); ?>';
    var Wa_tiempo= '<?php echo $Wa->GetTiempo(); ?>';

    //

		var Wi_id= '<?php echo $Wi->GetIdCharacter(); ?>';
		var Wi_nom= '<?php echo $Wi->GetNombre(); ?>';
    var Wi_gold= '<?php echo $Wi->GetGold(); ?>';
		var Wi_hp= '<?php echo $Wi->GetHP(); ?>';
		var Wi_hp_max= '<?php echo $Wi->GetHP_Max(); ?>';
		var Wi_iq= '<?php echo $Wi->GetIQ(); ?>';
    var Wi_rMag= '<?php echo $Wi->GetRMag(); ?>';
    var Wi_tiempo= '<?php echo $Wi->GetTiempo(); ?>';

    function WiLife(){
		if ((dateDiff(Wi_tiempo)) == 'false'){
			document.getElementById('f2').style.pointerEvents = "none";
			document.getElementById('demoWi').innerHTML='espere 1 hora apartir de: '+ Wi_tiempo.substr(10, 6);
		}else if((dateDiff(Wa_tiempo)) == 'true'){
			document.getElementById('f2').style.pointerEvents = "auto";
			document.getElementById('demoWi').innerHTML='';
			ReLIFE2(Wi_id);
		}
	}

	function disables() {
    document.getElementById('WaGold').innerHTML=Wa_gold;
    document.getElementById('hpWa').innerHTML=Wa_hp;
    document.getElementById('WaMH').innerHTML=Wa_hp_max;
    document.getElementById('WaSt').innerHTML=Wa_str;
    document.getElementById('WaAr').innerHTML=Wa_arm;
    //-------------------
    document.getElementById('WiGold').innerHTML=Wi_gold;
    document.getElementById('hpWi').innerHTML=Wi_hp;
    document.getElementById('WiMH').innerHTML=Wi_hp_max;
    document.getElementById('WiIQ').innerHTML=Wi_iq;
    document.getElementById('WiRM').innerHTML=Wi_rMag;
		  //console.log(dateDiff(Wa_tiempo));

		  if ((dateDiff(Wa_tiempo)) == 'false'){
			document.getElementById('f1').style.pointerEvents = "none";
			document.getElementById('demoWa').innerHTML='espere 1 hora apartir de: '+ Wa_tiempo.substr(10, 6);
			WiLife();
		  }else if((dateDiff(Wa_tiempo)) == 'true'){
			document.getElementById('f1').style.pointerEvents = "auto";
			document.getElementById('demoWa').innerHTML='';
			ReLIFE(Wa_id);
		  }else if((dateDiff(Wa_tiempo)) == 'sinDatos'){
			WiLife();
		  }
    }


		function CloseSession() {
			ajax7();
			window.location="./index.php";
		}
		function Multiplayer() {
			if (pj != null) {
				EnterMP(pj);
			}else{
				alert('Seleccione un Player');
			}
		}
		function Inventario() {
			if (pj != null) {
				Inventory(pj);
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
   <body onload="disables();">
     <div class="topBar"><p class="title">Inside the Shadows</p><img id="img1" src="./resources/img/Inside the Shadows.png" alt="RPG Game logo"></div>
     <div class="navBar">
       <ul id='ulNav' id='idul'>
         <li><a href="LogIN.php" id='IS'>Iniciar Sesión</a></li>
         <li><a href="register.php">Registrarse</a></li>
         <li><a href="index.php">Acerca de</a></li>
         <li><a href="FAQ.php">FAQ</a></li>
       </ul>
	   <script>
		document.getElementById('IS').innerHTML='Perfil';
		document.getElementById('ulNav').style.marginLeft='50%';
	   </script>
     </div>
     <div class="contenedor" id='1c'>
       <h1>Mi Perfil</h1>
        <div class="frame" id='f1' onclick='seleccionarpj(<?php echo $Wa->GetIdCharacter(); ?>, this.id);'>
          <p>
             Nombre: <?php echo $Wa->GetNombre(); ?> <br><br>
             Oro: <span id='WaGold'></span><br><br>
             HP: <span id='hpWa'></span><br><br>
			       Vida Máxima: <span id='WaMH'></span>  <a id='moreWaH' class="motto" onclick="MottoPowa(this.id, <?php echo $Wa->GetIdCharacter(); ?>);">+</a><br><br>
             Fuerza: <span id='WaSt'></span> <a id='moreWaF' class="motto" onclick="MottoPowa(this.id, <?php echo $Wa->GetIdCharacter(); ?>);">+</a><br><br>
             Armadura: <span id='WaAr'></span> <a id='moreWaA' class="motto" onclick="MottoPowa(this.id, <?php echo $Wa->GetIdCharacter(); ?>);">+</a>
          </p>
            <img style="margin:auto;" src="./resources/img/Warrior.png" alt="Warrior" height="120" width="100">
            <p id='demoWa'></p><br><br>
            <div style="position: absolute; top: 46%; right: 2%;width: 10%; height: 14%; text-align: center;"><input type="button" name='warrior' value="Health" onclick='Salud(this.name, <?php echo $Wa->GetIdCharacter(); ?>);' class="hpButton"></div>
        </div>
        <br>
        <div class="frame" id='f2' onclick='seleccionarpj(<?php echo $Wi->GetIdCharacter(); ?>, this.id);'>
          <p>
             Nombre: <?php echo $Wi->GetNombre(); ?> <br><br>
             Oro: <span id='WiGold'></span><br><br>
             HP: <span id='hpWi'></span><br><br>
			       Vida Máxima: <span id='WiMH'></span> <a id='moreWiH' class="motto" onclick="MottoPowa(this.id, <?php echo $Wi->GetIdCharacter(); ?>);">+</a><br><br>
             Inteligencia: <span id='WiIQ'></span> <a id='moreWiI' class="motto" onclick="MottoPowa(this.id, <?php echo $Wi->GetIdCharacter(); ?>);">+</a><br><br>
             Resistencia Mágica: <span id='WiRM'></span> <a id='moreWiR' class="motto" onclick="MottoPowa(this.id, <?php echo $Wi->GetIdCharacter(); ?>);">+</a>
          </p>
          <img style="margin:auto;" src="./resources/img/Wizard.png" alt="Wizard" height="120" width="100">
          <p id='demoWi'></p><br><br>
          <div style="position: absolute; top: 46%; right: 2%;width: 10%; height: 14%; text-align: center;"><input type="button" name='wizard' value="Health" onclick='Salud(this.name, <?php echo $Wi->GetIdCharacter(); ?>);' class="hpButton"></div>
     </div>

        <br><br><br><br>
		<input class="myButton buttonRanking" type="button" name="ranking" value="Ranking" onclick="Ranking();">
		<input class="myButton buttonInventario" type="button" name="inventario" value="Inventario" onclick="Inventario();">
        <input class="myButton buttonMultiplayer" type="button" name="multiplayer" value="Multiplayer" onclick="Multiplayer();">
        <input class="myButton buttonTienda" type="button" name="tienda" value="Tienda" onclick="Tienda();">
        <input class="myButton buttonExit" type="button" name="exit" value="Exit" onclick="CloseSession();">
</div><div class='weu' id='boy'></div>
   </body>
 </html>
