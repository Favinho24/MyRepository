<?php
  ob_start();
  require ('../DB/DBClass.php');
  require ('../DB/DBVars.php');

$database = new DatabaseObject($host, $username, $password, $database);

  if(isset($_POST['idpj'])){
  	$idpj = $_POST['idpj'];
  }else{
  	echo 'error';
  	exit;
  }

  $database->query("UPDATE pj SET hp=hp_max where id='".$idpj."';");
  
 ?>
