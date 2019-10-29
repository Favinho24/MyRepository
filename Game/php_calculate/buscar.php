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
	$vin=$database->query("SELECT * FROM vinculo WHERE `idLog`=".$men."");
	//echo json_encode($vin);
	//if (json_encode($vin) == {"current_field":null,"field_count":null,"lengths":null,"num_rows":null,"type":null}{"estado":"wait","vida":"999\/999","vidaEnemigo":"Sin cargar\/Sin cargar","log":null}) {
	//	echo 'Huyo';
	//	exit;
	//}


	$id1='';
	$id2='';
	$idP1='';
	$idP2='';
	$turno='';
	$log='';

	while ($reg=mysqli_fetch_array($vin)) {
		$id1= $reg["idUsuario1"];
		$id2= $reg["idUsuario2"];
		$idP1= $reg["idPj1"];
		$idP2= $reg["idPj2"];
		$turno= $reg["UsuarioTurno"];
		$log= $reg["log"];
	}

	$datosMandar = array();

	if($turno == 0 ) {
		$datosMandar['estado'] = "wait";
		$datosMandar['vida'] = cargarVida();
		$datosMandar['vidaEnemigo'] = cargarVidaEnemigo();
		$datosMandar['log'] = $log;
	}elseif ($turno == $_SESSION['id_user']){
		$datosMandar['estado'] = "You GO";
		$datosMandar['vida'] = cargarVida();
		$datosMandar['vidaEnemigo'] = cargarVidaEnemigo();
		$datosMandar['log'] = $log;
	}else{
		$datosMandar['estado'] = "Found";
		$datosMandar['vida'] = cargarVida();
		$datosMandar['vidaEnemigo'] = cargarVidaEnemigo();
		$datosMandar['log'] = $log;
	}





	print_r(json_encode($datosMandar));
	//==============================================================
	function cargarVida(){
		global $database, $pj;

		$vin=$database->query("SELECT hp, `hp_max` FROM pj WHERE `id` = '".$pj."'");
		$hp = "Sin cargar";
		$hp_m = "Sin cargar";
		while ($reg=mysqli_fetch_array($vin)) {
			$hp= $reg["hp"];
			$hp_m = $reg["hp_max"];
		}

		return $hp.'/'.$hp_m;
	}

	function cargarVidaEnemigo(){
		global $database, $pj, $idP1, $idP2;

		if($pj == $idP1){
			$vin=$database->query("SELECT hp, `hp_max` FROM pj WHERE `id` = '".$idP2."'");
		}else{
			$vin=$database->query("SELECT hp, `hp_max` FROM pj WHERE `id` = '".$idP1."'");
		}


		$hp = "";
		$hp_m = "";
		while ($reg=mysqli_fetch_array($vin)) {
			$hp= $reg["hp"];
			$hp_m = $reg["hp_max"];
		}

		return $hp.'/'.$hp_m;
	}
?>
