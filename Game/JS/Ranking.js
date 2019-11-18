function Ranking(){
    if(!estado4){
        ajax4("POST","./php_calculate/Ranking.php","","Ranking()");
        return;
    }else{
        estado = false;
		var cadena='';
		//var ranking = JSON.parse(mensaje4);

		var nom = mensaje4.split("+")[0];
		var pj = mensaje4.split("+")[1];
		var pg = mensaje4.split("+")[2];
		var pp = mensaje4.split("+")[3];

		document.getElementById('1c').style.height='auto';
		for (var i=0; i < nom.split("-").length; i++) {
			cadena += "<tr><td>"+nom.split("-")[i]+'</td><td>'+pj.split("-")[i]+'</td><td>'+pg.split("-")[i]+'</td><td>'+pp.split("-")[i]+"</td></tr>";
		 }
		document.getElementById('1c').innerHTML="";
		document.getElementById('1c').innerHTML='<center><table id="tableRanking" border="1|1" style="font-size:20px; border: 2px solid skyblue; margin:25px; position:relative; box-shadow: -8px 13px 5px 0px rgba(0,0,0,0.75);"><tr style="textAlign:center; borderStyle:2"><th>Nombre</th><th>Partidas Jugadas</th><th>Partidas Ganadas</th><th>Partidas Perdidas</th></tr>'+cadena+'</table></center>';
    }
}