<?php

	ob_start();
	session_start();
	require ('../Clases/Usuario.php');
	require ('../Clases/pj.php');
	require ('../DB/DBClass.php');
	require ('../DB/DBVars.php');
	
	if(isset($_POST['pj'])){
		$idPersonaje = $_POST['pj'];
	}else{
		echo 'error';
		exit;
	}
	
	$database = new DatabaseObject($host, $username, $password, $database);
	
	Search(1, $database);
	
	$vin=$database->query("SELECT * FROM `vinculo` WHERE `idUsuario2`='';");
	
	$id='';
	$usuario1='';
	while ($reg=mysqli_fetch_array($vin)) {
		$id = $reg["idLog"]; 
		$usuario1 = $reg["idUsuario1"];
		break;
	}
	
	if($id == ''){
		$sql = "INSERT into `vinculo`(idUsuario1, idUsuario2, idPj1, idPj2, UsuarioTurno) VALUES (".$_SESSION['id_user'].", 0, ".$idPersonaje.", 0, 0)";
	}else{
		$sql = "UPDATE `vinculo` SET idUsuario2 = " .$_SESSION['id_user']. ", idPj2 = " . $idPersonaje . ", UsuarioTurno = " . $usuario1 . " WHERE idLog = " . $id;
	}

	$database->query($sql);
	$id=Search(0, $database);
	echo $id;
	
	function Search($i, $database){

		$vin=$database->query("SELECT * FROM vinculo WHERE idUsuario1=".$_SESSION['id_user']." OR idUsuario2=".$_SESSION['id_user'].";");
		
		$id=array();
		while ($reg=mysqli_fetch_array($vin)) {
		$id[]= $reg["idLog"];   
		}
	
		if($i == 1){
			foreach ($id as $e) {
				$database->query("DELETE FROM vinculo WHERE idLog=".$e.";");
			}
		}else{
			return $id[0];
		}
	
	}
?>
