var delete_cookie = function(name) {
    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
};

function ajax7(){
    if(!estado){
        ajax("POST","./php_calculate/CloseSession.php","ajax7(0)");
		//delete_cookie('PHPSESSID');
		//console.log('wea');
        return;
    }else{
        estado = false;
    }
}





