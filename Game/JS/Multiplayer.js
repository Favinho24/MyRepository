var wea='';
var coso='';
var log='';

function EnterMP(pj){
    if(!estado){
		coso = pj;
        ajax("POST","./php_calculate/LookPlay.php","pj="+pj,"EnterMP(0)");
        return;
    }else{
        estado = false;
        PCarga();
		wea=mensaje;
		CargarDatos(coso);
    }
}

var bo=true;
var xd=0;
var xd1=0;
var xd2=0;
var jaxd=0;
var wexd=0;

function Buscar(mensajex){
	if(!estado){
        ajax("POST","./php_calculate/buscar.php","mensaje="+mensajex+"&pj="+pj,"Buscar(0)");
        return;
    }else{
        estado = false;
		//console.log(mensaje);
		var objeto = "";
		try{
			objeto = JSON.parse(mensaje);
		}catch(error){
			//console.log(mensaje);
			console.log(error);
			console.log("Fallo - decodificar json");
			return;
		}

		if(objeto.estado == 'wait'){
			//console.log('espere');
			xd1=0;
			xd2=0;
			if (xd>60){
				alert("No hay Partidas a la redonda, vuelva mas tarde");
				location.reload(true);
			}
			xd=xd+1;
			console.log(xd);
			setTimeout("Buscar("+wea+");", 3000);
		}else if(objeto.estado == 'You GO'){
			document.getElementById('inputA').disabled=false;
			document.getElementById('huirButton').disabled=false;
      document.getElementById('reinforce').disabled=false;
      document.getElementById('fullHP').disabled=false;
      document.getElementById('partHP').disabled=false;
			if (bo){
				Enemy(wea, pj);
				bo=false;
			}else{
				setTimeout("Buscar("+wea+");", 3000);
			}

			xd=0;
			xd2=0;
			if (xd1>60){
				alert("Ta has ido AFK, partida cancelada");
				location.reload(true);
			}
			xd1=xd1+1;
			console.log(xd1);

			document.getElementById('VidaElID').style.width = calcItemVida(objeto.vidaEnemigo, 130)+'px';
			document.getElementById('VidaYoID').style.width = calcItemVida(objeto.vida, 400)+'px';
			document.getElementById('miVida').innerHTML = objeto.vida;


			Players(wea);
			ChatDB(players);
			chat = JSON.stringify(chat);
			document.getElementById('chat01').innerHTML=chat.replace(/\]/g, '').replace(/\[/g, '').replace(/"/g, '').replace(/,/g, '<br>');


			if (objeto.log != null){
				if (((document.getElementById('logPanel').innerHTML).split('<br>', 10000))[((document.getElementById('logPanel').innerHTML).split('<br>', 10000)).length-1] != 'Te'+objeto.log) {
					document.getElementById('logPanel').innerHTML=document.getElementById('logPanel').innerHTML+'<br>'+'Te'+objeto.log;
				}
			}
			if (objeto.log == ' Huyo' && jaxd==0) {
        jaxd=1;
        Aparecer();
				//alert('Se ha cancelado la partida');
				//location.reload(true);
			}
			if (objeto.log.includes(' oponente muerto') && jaxd==0) {
        jaxd=1;
        document.getElementById('imgSatania').src='./resources/img/satania-laugh.gif';
        Aparecer();
			}

		}else if(objeto.estado == 'Found'){
			document.getElementById('inputA').disabled=true;
			document.getElementById('huirButton').disabled=true;
      document.getElementById('reinforce').disabled=true;
			document.getElementById('fullHP').disabled=true;
      document.getElementById('partHP').disabled=true;
			if (bo){
				Enemy(wea, pj);
				bo=false;
			}else{
				setTimeout("Buscar("+wea+");", 3000);
			}
			xd=0;
			xd1=0;
			if (xd2>60){
				alert("El otro player está AFK, partida cancelada");
				location.reload(true);
			}
			xd2=xd2+1;
			console.log(xd2);

			document.getElementById('VidaElID').style.width = calcItemVida(objeto.vidaEnemigo, 130)+'px';
			document.getElementById('VidaYoID').style.width = calcItemVida(objeto.vida, 400)+'px';
			document.getElementById('miVida').innerHTML = objeto.vida;

			Players(wea);
			ChatDB(players);
			chat = JSON.stringify(chat);
			document.getElementById('chat01').innerHTML=chat.replace(/\]/g, '').replace(/\[/g, '').replace(/"/g, '').replace(/,/g, '<br>');


			if (objeto.log != null){
				if (((document.getElementById('logPanel').innerHTML).split('<br>', 10000))[((document.getElementById('logPanel').innerHTML).split('<br>', 10000)).length-1] != 'Se'+objeto.log) {
					document.getElementById('logPanel').innerHTML=document.getElementById('logPanel').innerHTML+'<br>'+'Se'+objeto.log;
				}
			}
			if (objeto.log == ' Huyo' && wexd==0) {
        wexd=1;
        document.getElementById('imgSatania').src='./resources/img/loli-running.gif';
        document.getElementById('imgSatania').style.height='400px';
        document.getElementById('imgSatania').style.width='430px';
        Aparecer();
				//alert('Se ha cancelado la partida');
				//location.reload(true);
			}
			if (objeto.log.includes(' oponente muerto') && wexd==0) {
        wexd=1;
        document.getElementById('imgSatania').src='./resources/img/Kanna-Head-Pat.png';
        Aparecer();
			}

		}else{
			setTimeout("Buscar("+wea+");", 3000);
		}
		console.log(objeto);
	}
}

function calcItemVida(vida, largo) {
	var vidaactual = vida.substring(0, vida.indexOf('/'));
	var vidatotal = vida.substring(vida.indexOf('/')+1, 7);
	var barVida;
	barVida = (vidaactual * largo)/vidatotal;
	return barVida;
}

function Lobby() {
  //Huir();
	location.reload(true);
}

function InfoAttacks() {
	var e = document.getElementById('selectAtack');
	var e = e.options[e.selectedIndex].text;
	AttacksInfo(e);
}

function Enter(a){
  if (a.keyCode == 13){
    return "true";
  }else {
    return "false";
  }
}


function InsertChat(e, texto){
  if (Enter(e) == "true"){
    ChatBD('<b>'+document.getElementById('miPersonaje').innerHTML+': '+'</b>'+texto, wea);
    if (texto != '') {
      document.getElementById('chat02').value='';
    }

  }
}

function Aparecer() {
  document.getElementById("imgSatania").style.visibility='visible';
  var popup = document.getElementById("myPopup");
  var coso = document.getElementById("boy");
  popup.classList.toggle("show");
  coso.classList.toggle("showe");
}


function GenerarEntorno(ac){
//-------------------------------------
// Volver a mi perfil Button
// <input type='button' value='Volver a Mi Perfil' onclick='Lobby();'>
//-------------------------------------

	document.getElementById('1c').innerHTML="<div id='rival'><h3 style='text-align:center;' id='suPersonaje'>''</h3><div style='display:inline-block; padding: 20px;'><img src='./resources/img/rival.png' height=140px></div><div style='display:inline-block;'><div style='display:block;'>HP<span id='VidaEl'><span class='barraEl' id='VidaElID'></span></span></div><br></div></div><div id='log'><div class='wei' id='logPanel' style='overflow:auto;'></div></div><div id='yo'><h3 style='text-align:center;' id='miPersonaje'>''</h3><div style='display:inline-block; margin-bottom:15px;padding:20px;vertical-align: top;'><img src='./resources/img/sagiri.png' height=140px></div><div style='display:inline-block;'><div style='display:block;'>HP<span id='VidaYo'><span class='barraYo' id='VidaYoID'><p id='miVida' style='display:contents;'></p></span></span></div><br><div style='display:block;' id='strtxt'>Strength: <span id='FuerzaYo'></span><br><br>Armour: <span id='ArmaduraYo'></span><br><br>Gold: <span id='OroYoWa'></span></div><br><div style='display:block;' id='iqtxt'>IQ: <span id='IQYo'></span><br><br>Magic Resistance: <span id='RMagYo'></span><br><br>Oro: <span id='OroYoWi'></span></div><br><div style='display:block;'><input type='button' value='Attack' name='atacar' onclick='atacar();' id='inputA'> <select id='selectAtack' onclick='InfoAttacks();'>"+ac+"</select> <input type='button' id='huirButton' value='Run Away' onclick='Huir();'><img style='margin-left:20px;vertical-align: middle;' id='attkIcon' width='50px' height='50px' alt='.'></div><br></div><div style='display:inline-block;width: 240px;height: auto;border:1px solid black;left: 6%;position: relative;' id='attkInfo'></div><br><div style='display:inline-block; margin-left:148px;'><a id='partHP' title='Restore 1/4 HP ($100)' href='javascript:PartHP();'><img class='imgSMP' src='./resources/icons/medicalPils.ico' height=40px width=40px></a> <a id='fullHP' title='Restore Full HP ($200)' href='javascript:FullHP();'><img class='imgSMP' src='./resources/icons/fullHeart.ico' height=40px width=40px></a> <a id='reinforce' href='javascript:Reinforce();' title='Reinforce ($60)'><img class='imgSMP' src='./resources/icons/shield.ico' height=40px width=40px></a></div></div><div id='chat'><div id='chat00' class='chatLog'><div id='chat01'></div><input id='chat02' placeholder='Write a messaje and hit Enter' type='text' name='txtchat' onkeypress='InsertChat(event, this.value);'></div></div></div><div class='popup' align='center' style='position:relative; height:0px'><div class='popuptext' id='myPopup' onclick='Lobby();'><img id= 'imgSatania' src='./resources/img/satania-lose.png' width='500px' height='500px'></div></div>";
	if (Wa_id==pj) {
		document.getElementById('miPersonaje').innerHTML=Wa_nom;
		document.getElementById('VidaYoID').style.width = calcItemVida(Wa_hp+'/'+Wa_hp_max, 400) + 'px';
		document.getElementById('miVida').innerHTML = Wa_hp+'/'+Wa_hp_max;
		document.getElementById('FuerzaYo').innerHTML=Wa_str;
    document.getElementById('OroYoWa').innerHTML=Wa_gold;
		document.getElementById('iqtxt').innerHTML='';
		document.getElementById('ArmaduraYo').innerHTML=Wa_arm;

	}else if(Wi_id==pj){
		document.getElementById('miPersonaje').innerHTML=Wi_nom;
		document.getElementById('VidaYoID').style.width = calcItemVida(Wi_hp+'/'+Wi_hp_max, 400) + 'px';
		document.getElementById('miVida').innerHTML = Wi_hp+'/'+Wi_hp_max;
		document.getElementById('strtxt').innerHTML='';
		document.getElementById('IQYo').innerHTML=Wi_iq;
    document.getElementById('OroYoWi').innerHTML=Wi_gold;
		document.getElementById('RMagYo').innerHTML=Wi_rMag;
	}

	setTimeout("Buscar("+wea+");", 1);
}

function CargarDatos(ese){
	if(!estado){
        ajax("POST","./php_calculate/Ataques.php","pj="+ese,"CargarDatos(0)");
        return;
    }else{
        estado = false;

		var datos = "";
		try{
			datos = JSON.parse(mensaje);
		}catch(error){
			alert("Error - decode json");
		}

		//console.log(datos);

		GenerarEntorno(datos.armas);
    }
}

var opa= '' ;
function Enemy(csa, go){
	if(!estado){
		//console.log(go);
        ajax("POST","./php_calculate/enemy.php","idLog="+csa+"&pj="+go,"Enemy(0, 0)");
        return;
    }else{
        estado = false;
		//console.log(mensaje);
		var datos = "";
		try{
			datos = JSON.parse(mensaje);
		}catch(error){
			alert("Error - decode json");
		}

		//document.getElementById('VidaEl').innerHTML=datos.hp;
		document.getElementById('suPersonaje').innerHTML=datos.nombre;
		opa=datos.id;
		setTimeout("Buscar("+wea+");", 1);
    }
}

function pjactual(){
  if (Wa_id==pj){
    return 'Wa';
  }else{
    return 'Wi';
  }
}


function atacar(){
    if(!estado2){
		var feo=document.getElementById('selectAtack').value;
		//alert(feo+'///'+opa+'///'+coso+'///'+wea);
        ajax2("POST","./php_calculate/atacar.php","option="+feo+"&idp2="+opa+"&pj="+coso+"&idLog="+wea,"atacar()");
        return;
    }else{
        estado2 = false;
		//alert(mensaje2);
		//log =mensaje2;
		setTimeout("Buscar("+wea+");", 1);
    }
}
function Huir(){
	if(!estado2){
        ajax2("POST","./php_calculate/huir.php","idLog="+wea,"Huir()");
        return;
    }else{
        estado2 = false;
		console.log(mensaje2);
		//setTimeout("Buscar("+wea+");", 1);
    }
}
function PartHP(){
  if (pjactual() == 'Wa') {
    if ((document.getElementById('OroYoWa').innerHTML) < 50) {
      alert('No es posible la Compra, no hay suficiente dinero');
      return;
    }
  }else {
    if ((document.getElementById('OroYoWi').innerHTML) < 50) {
      alert('No es posible la Compra, no hay suficiente dinero');
      return;
    }
  }


	if(!estado2){
        ajax2("POST","./php_calculate/partHP.php","idpj="+coso+"&idLog="+wea,"PartHP()");
        return;
    }else{
        estado2 = false;
        if (pjactual() == 'Wa') {
          document.getElementById('OroYoWa').innerHTML=mensaje2;
        }else {
          document.getElementById('OroYoWi').innerHTML=mensaje2;
        }
		//setTimeout("Buscar("+wea+");", 1);
    }
}
function FullHP(){
  if (pjactual() == 'Wa') {
    if ((document.getElementById('OroYoWa').innerHTML) < 200) {
      alert('No es posible la Compra, no hay suficiente dinero');
      return;
    }
  }else {
    if ((document.getElementById('OroYoWi').innerHTML) < 200) {
      alert('No es posible la Compra, no hay suficiente dinero');
      return;
    }
  }

	if(!estado2){
        ajax2("POST","./php_calculate/fullHP.php","idpj="+coso+"&idLog="+wea,"FullHP()");
        return;
    }else{
        estado2 = false;
        console.log(mensaje2);
    if (pjactual() == 'Wa') {
      document.getElementById('OroYoWa').innerHTML=mensaje2;
    }else {
      document.getElementById('OroYoWi').innerHTML=mensaje2;
    }

		//setTimeout("Buscar("+wea+");", 1);
    }
}

function Reinforce(){
  if (pjactual() == 'Wa') {
    if ((document.getElementById('OroYoWa').innerHTML) < 60) {
      alert('No es posible la Compra, no hay suficiente dinero');
      return;
    }
  }else {
    if ((document.getElementById('OroYoWi').innerHTML) < 60) {
      alert('No es posible la Compra, no hay suficiente dinero');
      return;
    }
  }

	if(!estado2){
        ajax2("POST","./php_calculate/reinforce.php","idpj="+coso+"&idLog="+wea,"Reinforce()");
        return;
    }else{
        estado2 = false;
        if (pjactual() == 'Wa') {
          document.getElementById('OroYoWa').innerHTML=mensaje2;
        }else {
          document.getElementById('OroYoWi').innerHTML=mensaje2;
        }
		//setTimeout("Buscar("+wea+");", 1);
    }
}
