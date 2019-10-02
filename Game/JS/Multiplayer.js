var wea='';
var coso='';
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
		console.log(mensaje);
		var objeto = "";
		try{
			objeto = JSON.parse(mensaje);
		}catch(error){
			console.log("Fallo - decodificar json");
			return;
		}
		
		if(objeto.estado == 'wait'){
			//console.log('espere');
			setTimeout("Buscar("+wea+");", 3000);
		}else if(objeto.estado == 'You GO'){
			document.getElementById('inputA').disabled=false;
			if (bo){
				Enemy(wea, pj);
				bo=false;
			}else{
				setTimeout("Buscar("+wea+");", 3000);
			}
			
			document.getElementById('VidaEl').innerHTML = objeto.vidaEnemigo;
			document.getElementById('VidaYo').innerHTML = objeto.vida;
			
			
		}else if(objeto.estado == 'Found'){
			document.getElementById('inputA').disabled=true;
			if (bo){
				Enemy(wea, pj);
				bo=false;
			}else{
				setTimeout("Buscar("+wea+");", 3000);
			}
			
			document.getElementById('VidaEl').innerHTML = objeto.vidaEnemigo;
			document.getElementById('VidaYo').innerHTML = objeto.vida;
		}else{
			setTimeout("Buscar("+wea+");", 3000);
		}
		console.log(objeto);
     
    }
}



function GenerarEntorno(ac){
	
	document.getElementById('1c').innerHTML="<div id='rival'><h3 style='text-align:center;' id='suPersonaje'>''</h3><div style='display:inline-block; padding: 20px;'><img src='./resources/img/rival.png' height=140px></div><div style='display:inline-block;'><div style='display:block;'>Vida<span id='VidaEl'><span class='barraEl' id='VidaElID'></span></span></div><br></div></div><div id='log'><div class='wei'></div></div><div id='yo'><h3 style='text-align:center;' id='miPersonaje'>''</h3><div style='display:inline-block; margin-bottom:15px;padding:20px'><img src='./resources/img/sagiri.png' height=140px></div><div style='display:inline-block;'><div style='display:block;'>Vida<span id='VidaYo'><span class='barraYo' id='VidaYoID'></span></span></div><br><div style='display:block;'>Fuerza: <span id='FuerzaYo'></span></div><br><div style='display:block;'>Inteligencia: <span id='IQYo'></span></div><br><div style='display:block;'><input type='button' value='Atacar' name='atacar' onclick='atacar();' id='inputA'><select id='selectAtack'>"+ac+"</select></div><br></div></div></div>";
	if (Wa_id==pj) {
		document.getElementById('miPersonaje').innerHTML=Wa_nom;
		document.getElementById('VidaYo').innerHTML=Wa_hp;
		document.getElementById('FuerzaYo').innerHTML=Wa_str;
		document.getElementById('IQYo').innerHTML=Wa_iq;
	}else if(Wi_id==pj){
		document.getElementById('miPersonaje').innerHTML=Wi_nom;
		document.getElementById('VidaYo').innerHTML=Wi_hp;
		document.getElementById('FuerzaYo').innerHTML=Wi_str;
		document.getElementById('IQYo').innerHTML=Wi_iq;
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
		console.log(mensaje);
		var datos = "";
		try{
			datos = JSON.parse(mensaje);
		}catch(error){
			alert("Error - decode json");
		}
		
		document.getElementById('VidaEl').innerHTML=datos.hp;
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
		console.log(mensaje2);
		document.getElementById('log').innerHTML=mensaje2;
		
		setTimeout("Buscar("+wea+");", 1);
    }
}
