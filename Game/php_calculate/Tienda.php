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
	$result = $database->query("SELECT * FROM habilidades WHERE id not IN (SELECT idHab FROM p_h WHERE idPj='".$player."');");

	$a = array();
  while ($reg=mysqli_fetch_array($result)) {
	$T = new Tienda($reg['id'], $reg['name'], $reg['daño'], $reg['gc'], $reg['prob_gc'], $reg['valor'], $reg['descrip'], $reg['Tipo']);
	$a[] = $T->GetTodo();
 }
	print_r(json_encode($a, JSON_UNESCAPED_UNICODE));


 ?>
