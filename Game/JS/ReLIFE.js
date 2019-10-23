function ReLIFE(id){

	ajax2 = objetoAjax();
	ajax2.open("POST", "./php_calculate/reloadLife.php", true);
	ajax2.onreadystatechange = function() {
		if (ajax2.readyState == 4){
			mensaje = (ajax2.responseText)

      if(mensaje == "error"){
        console.log("Algo salió mal");
        console.log(mensaje);
        return;
      }


			console.log(mensaje);

		}
	}
	ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax2.send("idpj="+id);
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
