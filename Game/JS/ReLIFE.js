
function ReLIFE(id){
	if(!estado3){
        ajax3("POST","./php_calculate/reloadLife.php","idpj="+id,"ReLIFE(0)");
        return;
    }else{
        estado3 = false;
		//console.log(id);
		if ((dateDiff(Wi_tiempo)) == 'false'){
        document.getElementById('f2').style.pointerEvents = "none";
        document.getElementById('demoWi').innerHTML='espere 1 hora apartir de: '+ Wi_tiempo.substr(10, 6);
      }else {
        document.getElementById('f2').style.pointerEvents = "auto";
        document.getElementById('demoWi').innerHTML='';
        ReLIFE2(Wi_id);
      }


    }
}


function ReLIFE2(id){
	if(!estado3){
        ajax3("POST","./php_calculate/reloadLife.php","idpj="+id,"ReLIFE2(0)");
        return;
    }else{
        estado3 = false;
		//location.reload(true);
    }
}


