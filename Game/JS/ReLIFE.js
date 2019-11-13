
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
				document.getElementById('attkInfo').innerHTML='<center><b>'+InfoAttack.name+'</b><br><br>Daño:'+InfoAttack.daño+'<br>Golpe Crítico: '+InfoAttack.gc+'<br> Probabilidad GC: '+InfoAttack.prob_gc+'<br>Descripcion: '+InfoAttack.descrip+'<br>Tipo Attk: '+InfoAttack.tipo+'</center>';
				document.getElementById('attkInfo').classList.add("anim");
				//document.getElementById('attkInfo').style = "";
				//document.getElementById('attkInfo').style.animation.name: levantar;
				//document.getElementById('attkInfo').style.animation.duration: 4s;
		}
}
