<?php

ob_start();
session_start();
require ('../Clases/Usuario.php');
require ('../Clases/pj.php');
require ('../DB/DBClass.php');
require ('../DB/DBVars.php');

if(isset($_POST['idLog'])){
	$idLog = $_POST['idLog'];
}else{
	echo 'error';
	exit;
}
if(isset($_POST['pj'])){
	$pj = $_POST['pj'];
}else{
	echo 'error';
	exit;
}

$database = new DatabaseObject($host, $username, $password, $database);

cargarEnemy();


function cargarEnemy(){
	global $database, $idLog, $pj;
	
	$vin=$database->query("SELECT idPj1, idPj2 FROM vinculo WHERE idLog= ". $idLog .";");

	$id1='';
	$id2='';
	
	while ($reg=mysqli_fetch_array($vin)) {
		$id1 = $reg['idPj1'];
		$id2 = $reg['idPj2'];
	}
	
	
	
	if ($id1 == $pj){
		$vin=$database->query("SELECT id, nombre, hp, hp_max FROM pj WHERE id= ".$id2.";");
	}else{
		$vin=$database->query("SELECT id, nombre, hp, hp_max FROM pj WHERE id= ".$id1.";");
	}
	
	$wea=array();

	while ($reg=mysqli_fetch_array($vin)) {
		$wea['id'] = $reg['id'];
		$wea['hp'] = $reg['hp'];
		$wea['hp_max'] = $reg['hp_max'];
		$wea['nombre'] = $reg['nombre'];
	}

	print_r(json_encode($wea));
}



 
?>