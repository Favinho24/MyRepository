<?php

require ('../Clases/Usuario.php');
require ('../Clases/pj.php');
require ('../DB/DBClass.php');
require ('../DB/DBVars.php');

  if (isset($_POST['idpj'])) {
    $idpj=$_POST['idpj'];
  }else {
    echo 'error';
  }
  if (isset($_POST['action'])) {
    $action=$_POST['action'];
  }else {
    echo 'error';
  }

  $database = new DatabaseObject($host, $username, $password, $database);
  $sql='';
  if ($action == 'moreWaH') {
    $sql='hp_max';
  }elseif ($action == 'moreWaF'){
    $sql='str';
  }elseif ($action == 'moreWaA'){
    $sql='armadura';
  }elseif ($action == 'moreWiH'){
    $sql='hp_max';
  }elseif ($action == 'moreWiI'){
    $sql='iq';
  }elseif ($action == 'moreWiR'){
    $sql='rMagica';
  }else {
    echo 'Error en la seleccion';
  }

  $database->query("UPDATE pj SET ".$sql."=".$sql."+1 WHERE id=".$idpj.";");
  $database->query("UPDATE pj SET gold=gold-7 WHERE id=".$idpj.";");
  $vin = $database->query("SELECT nombre, gold, str, armadura, iq, rMagica, hp_max FROM pj WHERE id=".$idpj.";");
  $datos=array();
  while ($reg=mysqli_fetch_array($vin)) {
    $datos['nombre']=$reg['nombre'];
    $datos['gold']=$reg['gold'];
    $datos['str']=$reg['str'];
    $datos['ar']=$reg['armadura'];
    $datos['iq']=$reg['iq'];
    $datos['RM']=$reg['rMagica'];
    $datos['MH']=$reg['hp_max'];
  }
  print_r(json_encode($datos));
 ?>
