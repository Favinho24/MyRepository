
function ReLIFE(id){
	if(!estado3){
        ajax3("POST","./php_calculate/reloadLife.php","idpj="+id,"ReLIFE(0)");
        return;
    }else{
        estado3 = false;
		document.getElementById('hpWa').innerHTML='HP: '+mensaje3;
		//console.log(id);
		WiLife();
    }
}


function ReLIFE2(id){
	if(!estado3){
        ajax3("POST","./php_calculate/reloadLife.php","idpj="+id,"ReLIFE2(0)");
        return;
    }else{
        estado3 = false;
		document.getElementById('hpWi').innerHTML='HP: '+mensaje3;
		//location.reload(true);
    }
}

function AttacksInfo(attk){
	if(!estado3){
        ajax3("POST","./php_calculate/attackInfo.php","attk="+attk,"AttacksInfo(0)");
        return;
    }else{
        estado3 = false;
				var InfoAttack = "";
				InfoAttack = JSON.parse(mensaje3);
				document.getElementById('attkInfo').innerHTML='<center><b>'+InfoAttack.name+'</b><br><br>Damage: '+InfoAttack.daño+'<br>Critical Damage: '+InfoAttack.gc+'<br> C.Damage %: '+InfoAttack.prob_gc+'%<br>Description: '+InfoAttack.descrip+'<br>Attk type: '+InfoAttack.tipo+'</center>';
				document.getElementById('attkInfo').classList.add("anim");
				document.getElementById('attkIcon').src='./resources/icons/'+InfoAttack.icon;
				//document.getElementById('attkInfo').style = "";
				//document.getElementById('attkInfo').style.animation.name: levantar;
				//document.getElementById('attkInfo').style.animation.duration: 4s;
		}
}

function ChatBD(msj, log){
	if(!estado3){
        ajax3("POST","./php_calculate/chat.php","msj="+msj+"&id="+players,"ChatBD(0, 0)");
        return;
    }else{
        estado3 = false;
		console.log(mensaje3);
		ChatDB(players);
		}
}
var chat = '';
function ChatDB(loga){
	if(!estado3){
        ajax3("POST","./php_calculate/chatSolicitud.php","wa="+loga,"ChatDB(0)");
        return;
    }else{
        estado3 = false;

		try {



				chat = JSON.parse(mensaje3);


			//console.log(chat);
			//console.log('///////////////////////////////');
		}catch(error){
			console.log(error);
			chat = 'No se pudo decodificar el Chat';
			console.log(mensaje3);
			return;
		}
				//chat=mensaje3;
		}
}
var players='';
function Players(log){
	if(!estado4){
        ajax4("POST","./php_calculate/players.php","log="+log,"Players(0)");
        return;
    }else{
        estado4 = false;
		players = mensaje4;
		}
}
