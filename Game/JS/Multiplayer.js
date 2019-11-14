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
      ChatDB(wea);
      if (chat != '') {
        if (((document.getElementById('chat01').innerHTML).split('<br>', 10000))[((document.getElementById('chat01').innerHTML).split('<br>', 10000)).length-1] != chat) {
          document.getElementById('chat01').innerHTML=document.getElementById('chat01').innerHTML+ '<br>' +chat;
        }
      }
			setTimeout("Buscar("+wea+");", 3000);
		}else if(objeto.estado == 'You GO'){
			document.getElementById('inputA').disabled=false;
			document.getElementById('huirButton').disabled=false;
			if (bo){
				Enemy(wea, pj);
				bo=false;
			}else{
				setTimeout("Buscar("+wea+");", 3000);
			}


			document.getElementById('VidaElID').style.width = calcItemVida(objeto.vidaEnemigo, 130)+'px';
			document.getElementById('VidaYoID').style.width = calcItemVida(objeto.vida, 400)+'px';
			document.getElementById('miVida').innerHTML = objeto.vida;
			//if (ChatDB(wea) != '' || ChatDB(wea) != 'undefined') {
      ChatDB(wea);
      if (chat != '') {
        if (((document.getElementById('chat01').innerHTML).split('<br>', 10000))[((document.getElementById('chat01').innerHTML).split('<br>', 10000)).length-1] != chat) {
          document.getElementById('chat01').innerHTML=document.getElementById('chat01').innerHTML+ '<br>' +chat;
        }
      }
			//}
			if (objeto.log != null){
				if (((document.getElementById('logPanel').innerHTML).split('<br>', 10000))[((document.getElementById('logPanel').innerHTML).split('<br>', 10000)).length-1] != 'Te'+objeto.log) {
					document.getElementById('logPanel').innerHTML=document.getElementById('logPanel').innerHTML+'<br>'+'Te'+objeto.log;
				}
			}
			if (objeto.log == ' Huyo') {
				alert('Se ha cancelado la partida');
				location.reload(true);
			}
			if (objeto.log == ' oponente muerto') {
				alert('Haz Muerto');
				location.reload(true);
			}

		}else if(objeto.estado == 'Found'){
			document.getElementById('inputA').disabled=true;
			document.getElementById('huirButton').disabled=true;
			if (bo){
				Enemy(wea, pj);
				bo=false;
			}else{
				setTimeout("Buscar("+wea+");", 3000);
			}
			document.getElementById('VidaElID').style.width = calcItemVida(objeto.vidaEnemigo, 130)+'px';
			document.getElementById('VidaYoID').style.width = calcItemVida(objeto.vida, 400)+'px';
			document.getElementById('miVida').innerHTML = objeto.vida;
			//if (ChatDB(wea) != '' || ChatDB(wea) != 'undefined') {
      ChatDB(wea);
      if (chat != '') {
        if (((document.getElementById('chat01').innerHTML).split('<br>', 10000))[((document.getElementById('chat01').innerHTML).split('<br>', 10000)).length-1] != chat) {
          document.getElementById('chat01').innerHTML=document.getElementById('chat01').innerHTML+ '<br>' +chat;
        }
      }
			//}

			if (objeto.log != null){
				if (((document.getElementById('logPanel').innerHTML).split('<br>', 10000))[((document.getElementById('logPanel').innerHTML).split('<br>', 10000)).length-1] != 'Se'+objeto.log) {
					document.getElementById('logPanel').innerHTML=document.getElementById('logPanel').innerHTML+'<br>'+'Se'+objeto.log;
				}
			}
			if (objeto.log == ' Huyo') {
				alert('Se ha cancelado la partida');
				location.reload(true);
			}
			if (objeto.log == ' oponente muerto') {
				alert('Ha Muerto Tu Oponente');
				location.reload(true);
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
    ChatBD(Wa_nom+': '+texto, wea);
    if (texto != '') {
      document.getElementById('chat01').innerHTML=document.getElementById('chat01').innerHTML+ '<br>' +Wa_nom+': '+texto;
      document.getElementById('chat02').value='';
    }

  }
}


function GenerarEntorno(ac){
//-------------------------------------
// Volver a mi perfil Button
// <input type='button' value='Volver a Mi Perfil' onclick='Lobby();'>
//-------------------------------------

	document.getElementById('1c').innerHTML="<div id='rival'><h3 style='text-align:center;' id='suPersonaje'>''</h3><div style='display:inline-block; padding: 20px;'><img src='./resources/img/rival.png' height=140px></div><div style='display:inline-block;'><div style='display:block;'>Vida<span id='VidaEl'><span class='barraEl' id='VidaElID'></span></span></div><br></div></div><div id='log'><div class='wei' id='logPanel' style='overflow:auto;'></div></div><div id='yo'><h3 style='text-align:center;' id='miPersonaje'>''</h3><div style='display:inline-block; margin-bottom:15px;padding:20px'><img src='./resources/img/sagiri.png' height=140px></div><div style='display:inline-block;'><div style='display:block;'>Vida<span id='VidaYo'><span class='barraYo' id='VidaYoID'><p id='miVida' style='display:contents;'></p></span></span></div><br><div style='display:block;' id='strtxt'>Fuerza: <span id='FuerzaYo'></span><br><br>Armadura: <span id='ArmaduraYo'></span></div><br><div style='display:block;' id='iqtxt'>Inteligencia: <span id='IQYo'></span><br><br>Resistencia Mágica: <span id='RMagYo'></span></div><br><div style='display:block;'><input type='button' value='Atacar' name='atacar' onclick='atacar();' id='inputA'><select id='selectAtack' onclick='InfoAttacks();'>"+ac+"</select> <input type='button' id='huirButton' value='Huir' onclick='Huir();'> </div><br></div><div style='display:inline-block;width: 240px;height: auto;border:1px solid black;left: 20px;position: relative;' id='attkInfo'></div></div><div id='chat'><div id='chat00' class='chatLog'><div id='chat01'></div><input id='chat02' placeholder='Escriba un mensaje y pulse Enter' type='text' name='txtchat' onkeypress='InsertChat(event, this.value);'></div></div></div>";
	if (Wa_id==pj) {
		document.getElementById('miPersonaje').innerHTML=Wa_nom;
		document.getElementById('VidaYoID').style.width = calcItemVida(Wa_hp+'/'+Wa_hp_max, 400) + 'px';
		document.getElementById('miVida').innerHTML = Wa_hp+'/'+Wa_hp_max;
		document.getElementById('FuerzaYo').innerHTML=Wa_str;
		document.getElementById('iqtxt').innerHTML='';
		document.getElementById('ArmaduraYo').innerHTML=Wa_arm;

	}else if(Wi_id==pj){
		document.getElementById('miPersonaje').innerHTML=Wi_nom;
		document.getElementById('VidaYoID').style.width = calcItemVida(Wi_hp+'/'+Wi_hp_max, 400) + 'px';
		document.getElementById('miVida').innerHTML = Wi_hp+'/'+Wi_hp_max;
		document.getElementById('strtxt').innerHTML='';
		document.getElementById('IQYo').innerHTML=Wi_iq;
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

function atacar(){
	if(!estado2){
		var feo=document.getElementById('selectAtack').value
        ajax2("POST","./php_calculate/atacar.php","option="+feo+"&idp2="+opa+"&pj="+coso+"&idLog="+wea,"atacar()");
        return;
    }else{
        estado2 = false;
		//console.log(mensaje2);
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
