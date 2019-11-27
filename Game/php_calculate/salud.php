<?php

require ('../Clases/Usuario.php');
require ('../Clases/pj.php');
require ('../DB/DBClass.php');
require ('../DB/DBVars.php');

if (isset($_POST['idpj'])){
  $idpj=$_POST['idpj'];
}else{
  echo 'error';
  exit;
}

 $database = new DatabaseObject($host, $username, $password, $database);

 $database->query("UPDATE pj SET hp=hp_max WHERE id=".$idpj.";");
 $database->query("UPDATE pj SET gold=gold-100 WHERE id=".$idpj.";");
 $vin = $database->query("SELECT nombre, hp, gold FROM pj WHERE id=".$idpj.";");
 $wea=array();
 while ($reg=mysqli_fetch_array($vin)) {
   $wea['nombre']=$reg['nombre'];
   $wea['hp']=$reg['hp'];
   $wea['gold']=$reg['gold'];
 }
 print_r(json_encode($wea));
 exit;
 ?>
