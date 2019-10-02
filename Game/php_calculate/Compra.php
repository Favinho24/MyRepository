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

  $database = new DatabaseObject($host, $username, $password, $database);
  $result = $database->query("INSERT INTO p_h(idPj, idHab) VALUES ('".$_SESSION['idPj']."','".$item."');");  
 ?>