<?php

  session_start();
  require ('../DB/DBClass.php');
  require ('../DB/DBVars.php');

  if (isset($_POST['msj'])){
		$msj=$_POST['msj'];
	}else{
		echo 'error';
		exit;
	}
  if (isset($_POST['log'])){
		$wea=$_POST['log'];
	}else{
		echo 'error';
		exit;
	}

  $database = new DatabaseObject($host, $username, $password, $database);

  $database->query("UPDATE vinculo SET msj='".$msj."' WHERE idLog='".$wea."';");

 ?>
