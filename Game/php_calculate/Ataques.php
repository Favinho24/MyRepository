<?php

ob_start();
session_start();
require ('../Clases/Usuario.php');
require ('../Clases/pj.php');
require ('../DB/DBClass.php');
require ('../DB/DBVars.php');

$datosDevolver = array();


if(isset($_POST['pj'])){
	$idPersonaje = $_POST['pj'];
}else{
	echo 'error';
	exit;
}



$database = new DatabaseObject($host, $username, $password, $database);

cargarArmas();

print_r(json_encode($datosDevolver));



//==========================================================================================================================
//Funciones
//==========================================================================================================================
function cargarArmas(){
	global $database, $datosDevolver, $idPersonaje;

	$vin=$database->query("SELECT name FROM habilidades WHERE id IN (SELECT idHab FROM `p_h` WHERE `idPj`='".$idPersonaje."');");

	$concat='';

	while ($reg=mysqli_fetch_array($vin)) {
		$concat .= '<option>'.$reg["name"].'</option>';
	}

	$datosDevolver['armas'] = $concat;
}


 ?>
