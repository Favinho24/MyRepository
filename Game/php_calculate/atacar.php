<?php
  
	ob_start();
	session_start();
	require ('../Clases/Usuario.php');
	require ('../Clases/pj.php');
	require ('../DB/DBClass.php');
	require ('../DB/DBVars.php');

	if (isset($_POST['option'])){
		$option=$_POST['option'];
	}else{
		echo 'error';
		exit;
	}
	if (isset($_POST['idp2'])){
		$idp2=$_POST['idp2'];
	}else{
		echo 'error';
		exit;
	}
	if (isset($_POST['pj'])){
		$idp1=$_POST['pj'];
	}else{
		echo 'error';
		exit;
	}
	if (isset($_POST['idLog'])){
		$idLog=$_POST['idLog'];
	}else{
		echo 'error';
		exit;
	}
	
	$database = new DatabaseObject($host, $username, $password, $database);
  
	hacerDaño();
  
	function hacerDaño(){
	
		global $database, $idp2, $option, $idp1, $idLog;
		
		$vin=$database->query("SELECT daño, gc, prob_gc, Tipo FROM habilidades WHERE name='".$option."';");

		$daño='';
		$gc='';
		$prob_gc='';
		$tipo='';
		$hp='';
		$hp_max='';
		$str='';
		$iq='';

		while ($reg=mysqli_fetch_array($vin)) {
			$daño = $reg['daño'];
			$gc = $reg['gc'];
			$prob_gc = $reg['prob_gc'];
			$tipo=$reg['Tipo'];
		}
		
		$vin=$database->query("SELECT hp, hp_max FROM pj WHERE id='".$idp2."';");
	
		
		while ($reg=mysqli_fetch_array($vin)) {
			$hp=$reg['hp'];
			$hp_max=$reg['hp_max'];
		}
		
		$vin=$database->query("SELECT str, iq FROM pj WHERE id='".$idp1."';");
	
		
		while ($reg=mysqli_fetch_array($vin)) {
			$str=$reg['str'];
			$iq=$reg['iq'];
		}
		
		if ($tipo == 'Arma'){
			$daño=$daño+$str;
		}else if($tipo == 'Hechizo'){
			$daño=$daño+$iq;
		}
		
		
		$pro=rand(1, 1000);
		$ev=rand(1, 100);

		if ($prob_gc >= $pro){
			$daño=$daño+$gc;
		}
		
		if(10 >= $ev){
			echo 'Miss';
			exit;
		}
		
		
		
		$database->query("UPDATE pj SET hp=hp-".$daño." WHERE id=".$idp2.";");
		
		$idUsuario1='';
		$idUsuario2='';
		$UsuarioTurno='';
		$vin=$database->query("SELECT idUsuario1, idUsuario2, UsuarioTurno FROM vinculo WHERE idLog='".$idLog."';");
	
		
		while ($reg=mysqli_fetch_array($vin)) {
			$idUsuario1=$reg['idUsuario1'];
			$idUsuario2=$reg['idUsuario2'];
			$UsuarioTurno=$reg['UsuarioTurno'];
		}
		
		if($UsuarioTurno == $idUsuario1){
			$database->query("UPDATE vinculo SET UsuarioTurno='".$idUsuario2."' WHERE idLog='".$idLog."';");
		}else{
			$database->query("UPDATE vinculo SET UsuarioTurno='".$idUsuario1."' WHERE idLog='".$idLog."';");
		}
	
		echo 'Se hicieron '.$daño.' puntos de daño';
		exit;
		
		
	}



 /*Hacer un trigger que verifique la no duplicacion de los nombres de ataques*/ 
 
 ?>
 
 
 
 
 