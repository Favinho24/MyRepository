
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


