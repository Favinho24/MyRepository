<?php

  ob_start();
  session_start();
  require ('../Clases/Usuario.php');
  require ('../Clases/pj.php');
  require ('../Clases/OTienda.php');
  require ('../DB/DBClass.php');
  require ('../DB/DBVars.php');
  
  if (isset($_POST['pj'])) {
    $player=$_POST['pj'];
  }else {
    echo "error";
  }

  $database = new DatabaseObject($host, $username, $password, $database);
  
  $wea = $database->query("SELECT * FROM habilidades WHERE id IN (SELECT idHab FROM p_h WHERE idPj=".$player.");");  
  
  $name=array();
  
  while($reg=mysqli_fetch_array($wea)){
	$T = new Tienda($reg['id'], $reg['name'], $reg['daño'], $reg['gc'], $reg['prob_gc'], $reg['valor'], $reg['descrip'], $reg['Tipo']);
	$name[] = $T->GetTodo();
  }

	print_r(json_encode($name, JSON_UNESCAPED_UNICODE));
  
 ?>