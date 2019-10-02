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
		PCarga();
        ajax("POST","./php_calculate/Compra.php",'idItem='+e,"Comprar(0)");
        return;
    }else{
        estado = false;	
		cargarTienda(wea);	
    }
}




function PCarga() {
	
	document.getElementById('1c').style.height='30em';
	document.getElementById('1c').innerHTML='<div id="preloader_1"><span></span><span></span><span></span><span></span><span></span></div>';
	//setTimeout(PCarga(), 2000);
	//document.getElementById('1c').innerHTML='';
	
}

function constructorNombres() {
	document.getElementById('1c').style.height='auto';
	var cadena = "<div class='flotador' id='flot1'></div>";
	for(var i=0; i < objeto.length; i++){
		cadena += "<div class='ListaTexto' onclick='showI("+i+");' id='h_"+i+"'>"+objeto[i].nombre+"</div>";
	}
	document.getElementById('1c').innerHTML=cadena;
}
var leon=null;
function showI(i){
	if (leon!=null){
	document.getElementById('h_'+leon).style.textDecoration='';
	}
	document.getElementById('h_'+i).style.textDecoration='underline';
	document.getElementById('flot1').innerHTML='<h3 style="display:block; margin-Bottom:20px; text-align:center;font-family:Courier New;">'+objeto[i].nombre+'</h3><span class="l1">Daño: '+objeto[i].daño+'</span><span class="l1">Golpe Crítico: '+objeto[i].gc+'</span><span class="l1">Probabiilidad de Golpe Crítico: '+objeto[i].Prob_gc+'</span><span class="l1">Valor: $'+objeto[i].valor+'</span><span class="l1">Descripción: '+objeto[i].descripcion+'</span><span class="l1">Tipo: '+objeto[i].tipo+'</span><input style="display: block;position: relative; margin: auto;" type="button" value="Comprar" onclick="Comprar('+objeto[i].id+');">';	
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
    ajax_2.send(parametros)
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
                alert("PHP - fallo");
                return;
            }
            eval(fun);
        }
    }
    ajax_3.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
    ajax_3.send(parametros)
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

