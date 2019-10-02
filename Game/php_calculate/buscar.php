<?php 

	session_start();
	require ('../DB/DBClass.php');
	require ('../DB/DBVars.php');
	
	if(isset($_POST['mensaje'])){
		$men = $_POST['mensaje'];
	}else{
		echo 'error';
	}
	
	if(isset($_POST['pj'])){
		$pj = $_POST['pj'];
	}else{
		echo 'error';
	}
	
	
	
	$database = new DatabaseObject($host, $username, $password, $database);
	$vin=$database->query("SELECT * FROM vinculo WHERE idLog=".$men."");
	
	$id1='';
	$id2='';
	$idP1='';
	$idP2='';
	$turno='';
	
	while ($reg=mysqli_fetch_array($vin)) {
		$id1= $reg["idUsuario1"]; 
		$id2= $reg["idUsuario2"]; 
		$idP1= $reg["idPj1"]; 
		$idP2= $reg["idPj2"]; 
		$turno= $reg["UsuarioTurno"]; 
	}
	
	$datosMandar = array();
	
	if($turno == 0 ) {
		$datosMandar['estado'] = "wait";
		$datosMandar['vida'] = cargarVida();
		$datosMandar['vidaEnemigo'] = cargarVidaEnemigo();
	}elseif ($turno == $_SESSION['id_user']){
		$datosMandar['estado'] = "You GO";
		$datosMandar['vida'] = cargarVida();
		$datosMandar['vidaEnemigo'] = cargarVidaEnemigo();
	}else{
		$datosMandar['estado'] = "Found";
		$datosMandar['vida'] = cargarVida();
		$datosMandar['vidaEnemigo'] = cargarVidaEnemigo();
	}
	
	
	
	
	
	print_r(json_encode($datosMandar));
	//==============================================================
	function cargarVida(){
		global $database, $pj;
		
		$vin=$database->query("SELECT hp FROM pj WHERE id = '".$pj."'");
		$hp = "Sin cargar";
		while ($reg=mysqli_fetch_array($vin)) {
			$hp= $reg["hp"]; 
		}
		
		return $hp;
	}
	
	function cargarVidaEnemigo(){
		global $database, $pj, $idP1, $idP2;
		
		if($pj == $idP1){
			$vin=$database->query("SELECT hp FROM pj WHERE id = '".$idP2."'");
		}else{
			$vin=$database->query("SELECT hp FROM pj WHERE id = '".$idP1."'");
		}
		
		
		$hp = "Sin carga";
		while ($reg=mysqli_fetch_array($vin)) {
			$hp= $reg["hp"]; 
		}
		
		return $hp;
	}
?>