var objeto = "";
var wea = '';
function cargarTienda(pj){
    if(!estado){
		objeto=null;
		wea = pj;
		PCarga();
        ajax("POST","./php_calculate/Tienda.php",'pj='+pj,"cargarTienda(0)");
        return;
    }else{
        estado = false;

		try{
			objeto = JSON.parse(mensaje);
		}catch(error) {
			alert("ERROR - Decode json");
			return;
		}
		//console.log(mensaje);
		setTimeout('constructorNombres()', 2500);
		//constructorNombres();

    }
}



function Comprar(e){
    if(!estado){
		console.log(e);
		PCarga();
        ajax("POST","./php_calculate/Compra.php",'idItem='+e+"&pj="+pj,"Comprar(0)");
        return;
    }else{
        estado = false;
		if(mensaje == 'errror'){
			alert('Insuficientes Fondos');
		}else{
			alert('Compra Exitosa');
		}
		cargarTienda(wea);
    }
}




function PCarga() {

	//document.getElementById('1c').style.height='auto';
	document.getElementById('1c').innerHTML='<div style="height:25em;"><div id="preloader_1"><span></span><span></span><span></span><span></span><span></span></div></div>';
	//setTimeout(PCarga(), 2000);
	//document.getElementById('1c').innerHTML='';

}

function constructorNombres() {
	//document.getElementById('1c').style.height='auto';
	var cadena = "<div class='flotador' id='flot1'></div>";
	for(var i=0; i < objeto.length; i++){
		cadena += "<div style='display:flex; line-height:normal; position: relative; left: 3%; align-items: center;'><div class='ListaTexto' onclick='showI("+i+");' id='h_"+i+"'>"+objeto[i].nombre+"</div><img style='position:relative; display:inline-block; left:2%' src='./resources/icons/"+objeto[i].icon+"' width='50px' height='50px' alt='*img*'></div>";
	}
	document.getElementById('1c').innerHTML=cadena;
}
var leon=null;
function showI(i){
	if (leon!=null){
	document.getElementById('h_'+leon).style.textDecoration='';
	document.getElementById('h_'+leon).style.color='black';
	}
	document.getElementById('h_'+i).style.textDecoration='underline';
	document.getElementById('h_'+i).style.color='white';
	document.getElementById('flot1').innerHTML='<h3 style="display:block; margin-Bottom:20px; text-align:center;font-family:Courier New;">'+objeto[i].nombre+'</h3><span class="l1">Daño: '+objeto[i].daño+'</span><span class="l1">Golpe Crítico: '+objeto[i].gc+'</span><span class="l1">Probabiilidad de Golpe Crítico: '+objeto[i].Prob_gc+'%</span><span class="l1">Valor: $'+objeto[i].valor+'</span><span class="l1">Descripción: '+objeto[i].descripcion+'</span><span class="l1">Tipo: '+objeto[i].tipo+'</span><input style="display: block;position: relative; margin: auto;" type="button" value="Comprar" onclick="Comprar('+objeto[i].id+');">';
	leon=i;
}



function Inventory(pj){
	if(!estado){
		objeto=null;
		PCarga();
        ajax("POST","./php_calculate/inventario.php",'pj='+pj,"Inventory(0)");
        return;
    }else{
        estado = false;
        try{
			objeto = JSON.parse(mensaje);
		}catch(error) {
			alert("ERROR - Decode json objeto");
			return;
		}
		//console.log(Object.keys(objeto).length);
		setTimeout('constructorItems()', 2500);
		//constructorItems();

    }
}

function constructorItems() {

	var cadena = "<div class='flotador' id='flot8'></div>";
	for(var i=0; i < objeto.length; i++){
		cadena += "<div style='display:flex; line-height:normal; position: relative; left: 3%; align-items: center;'><div class='ListaTexto' onclick='showItem("+i+");' id='j_"+i+"'>"+objeto[i].nombre+"</div><img style='position:relative; display:inline-block; left:2%' src='./resources/icons/"+objeto[i].icon+"' width='50px' height='50px' alt='*img*'></div>";
	}
	document.getElementById('1c').innerHTML=cadena;
	//document.getElementById('idul').style.height='160%';
	var h = document.getElementById('j_0').clientHeight;
	console.log(h);
	h = h * Object.keys(objeto).length;
	console.log(h);
	h = 280+h;
	console.log(h);
	document.getElementById('1c').style.height=h+60+'px';

}

var leon=null;
function showItem(i){
	if (leon!=null){
	document.getElementById('j_'+leon).style.textDecoration='';
	document.getElementById('j_'+leon).style.color='black';
	}
	document.getElementById('j_'+i).style.textDecoration='underline';
	document.getElementById('j_'+i).style.color='white';
	document.getElementById('flot8').innerHTML='<h3 style="display:block; margin-Bottom:20px; text-align:center;font-family:Courier New;">'+objeto[i].nombre+'</h3><span class="l1">Daño: '+objeto[i].daño+'</span><span class="l1">Golpe Crítico: '+objeto[i].gc+'</span><span class="l1">Probabiilidad de Golpe Crítico: '+objeto[i].Prob_gc+'</span><span class="l1">Valor: $'+objeto[i].valor+'</span><span class="l1">Descripción: '+objeto[i].descripcion+'</span><span class="l1">Tipo: '+objeto[i].tipo+'</span>';
	leon=i;
}

//===================================================================================================================
var mensaje;
var estado = false;
function ajax(metodo, direccion, parametros,fun){
    mensaje = "";
    estado = true;

    ajax_2 = objetoAjax();
    ajax_2.open(metodo, direccion, true);
    ajax_2.onreadystatechange = function() {
        if (ajax_2.readyState == 4){
            mensaje = (ajax_2.responseText)
            if(mensaje == "error"){
                alert("PHP - fallo");
                return;
            }
            eval(fun);
        }
    }
    ajax_2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax_2.send(parametros);
    return;
}
var mensaje2;
var estado2 = false;
function ajax2(metodo, direccion, parametros,fun){
    mensaje2= "";
    estado2 = true;

    ajax_3 = objetoAjax();
    ajax_3.open(metodo, direccion, true);
    ajax_3.onreadystatechange = function() {
        if (ajax_3.readyState == 4){
            mensaje2 = (ajax_3.responseText)
            if(mensaje2 == "error"){
                alert("PHP - fallo 2");
                return;
            }
            eval(fun);
        }
    }
    ajax_3.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax_3.send(parametros)
    return;
}
var mensaje3;
var estado3 = false;
function ajax3(metodo, direccion, parametros,fun){
    mensaje3= "";
    estado3 = true;

    ajax_4 = objetoAjax();
    ajax_4.open(metodo, direccion, true);
    ajax_4.onreadystatechange = function() {
        if (ajax_4.readyState == 4){
            mensaje3 = (ajax_4.responseText)
            if(mensaje3 == "error"){
                alert("PHP - fallo 3");
                return;
            }
            eval(fun);
        }
    }
    ajax_4.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax_4.send(parametros)
    return;
}
var mensaje4;
var estado4 = false;
function ajax4(metodo, direccion, parametros,fun){
    mensaje4= "";
    estado4 = true;

    ajax_5 = objetoAjax();
    ajax_5.open(metodo, direccion, true);
    ajax_5.onreadystatechange = function() {
        if (ajax_5.readyState == 4){
            mensaje4 = (ajax_5.responseText)
            if(mensaje4 == "error"){
                alert("PHP - fallo 4");
                return;
            }
            eval(fun);
        }
    }
    ajax_5.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax_5.send(parametros);
    return;
}
var mensaje5;
var estado5 = false;
function ajax5(metodo, direccion, parametros,fun){
    mensaje5= "";
    estado5 = true;

    ajax_6 = objetoAjax();
    ajax_6.open(metodo, direccion, true);
    ajax_6.onreadystatechange = function() {
        if (ajax_6.readyState == 4){
            mensaje5 = (ajax_6.responseText)
            if(mensaje5 == "error"){
                alert("PHP - fallo 5");
                return;
            }
            eval(fun);
        }
    }
    ajax_6.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax_6.send(parametros);
    return;
}


function objetoAjax(){
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {

        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false; }
    }

    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
      xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}
