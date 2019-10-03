<?php

  ob_start();
  session_start();
  require ('../Clases/Usuario.php');
  require ('../Clases/pj.php');
  require ('../Clases/OTienda.php');
  require ('../DB/DBClass.php');
  require ('../DB/DBVars.php');
  
  if (isset($_POST['idItem'])) {
    $item=$_POST['idItem'];
  }else {
    echo "error";
  }
  if (isset($_POST['pj'])) {
    $pj=$_POST['pj'];
  }else {
    echo "error";
  }

  $database = new DatabaseObject($host, $username, $password, $database);
  
  $wea = $database->query("SELECT gold FROM pj WHERE id= '".$pj."';");  
  
  $gold='';
  
  while($reg=mysqli_fetch_array($wea)){
	  $gold = $reg['gold'];
  }
  
  $wea = $database->query("SELECT valor FROM habilidades WHERE id= '".$item."';");  
  
  $valor='';
  
  while($reg=mysqli_fetch_array($wea)){
	  $valor = $reg['valor'];
  }
  
  if ($gold >= $valor){
	  $database->query("INSERT INTO p_h(idPj, idHab) VALUES ('".$pj."','".$item."');");
	  $database->query("UPDATE pj SET gold = gold-".$valor." WHERE id = '".$pj."';");
  }else {
	 echo "errror"; 
  }
  
  
 ?>