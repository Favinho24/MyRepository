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
  if (isset($_POST['id'])){
		$id=$_POST['id'];
	}else{
		echo 'error';
		exit;
	}

  $id1=(explode(' ', $id))[0];
  $id2=(explode(' ', $id))[1];

  $database = new DatabaseObject($host, $username, $password, $database);
  $database->query("INSERT INTO chat (texto, idpj1, idpj2, fechayhora) VALUES ('".$msj."', '".$id1."', '".$id2."', CURRENT_TIMESTAMP());");


  exit;

 ?>
