

function ReLIFE(id){
	if(!estado3){
        ajax3("POST","./php_calculate/reloadLife.php","idpj="+id,"ReLIFE(0)");
        return;
    }else{
        estado2 = false;
		console.log(mensaje3);
    }
}
