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
if (isset($_POST['idLog'])){
  $idLog=$_POST['idLog'];
}else{
  echo 'error';
  exit;
}

$database = new DatabaseObject($host, $username, $password, $database);
$database->query("UPDATE pj SET hp=hp_max WHERE id=".$idpj.";");
$database->query("UPDATE pj SET gold=gold-200 WHERE id=".$idpj.";");

$vin=$database->query("SELECT nombre, gold FROM pj WHERE id=".$idpj.";");
$NOMBRE='';
$gold='';
while ($reg=mysqli_fetch_array($vin)) {
  $NOMBRE=$reg['nombre'];
  $gold=$reg['gold'];
}
print_r ($gold);
AcabarTurno(' Restauró la vida total del player '.$NOMBRE);


exit;




















function AcabarTurno($Log){
  global $database, $idLog;

  $idUsuario1='';
  $idUsuario2='';
  $UsuarioTurno='';
  $vin=$database->query("SELECT idUsuario1, idUsuario2, UsuarioTurno, `log` FROM vinculo WHERE idLog='".$idLog."';");

  while ($reg=mysqli_fetch_array($vin)) {
    $idUsuario1=$reg['idUsuario1'];
    $idUsuario2=$reg['idUsuario2'];
    $UsuarioTurno=$reg['UsuarioTurno'];
  }

  if($UsuarioTurno == $idUsuario1){
    $database->query("UPDATE vinculo SET UsuarioTurno='".$idUsuario2."', `log`='".$Log."' WHERE idLog='".$idLog."';");
  }else{
    $database->query("UPDATE vinculo SET UsuarioTurno='".$idUsuario1."', `log`='".$Log."' WHERE idLog='".$idLog."';");
  }
exit;
}
 ?>
