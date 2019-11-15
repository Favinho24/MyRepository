<?php

session_start();
require ('../DB/DBClass.php');
require ('../DB/DBVars.php');

if (isset($_POST['log'])){
  $wea=$_POST['log'];
}else{
  echo 'error';
  exit;
}


$database = new DatabaseObject($host, $username, $password, $database);

$vin = $database->query("SELECT idPj1, idPj2 FROM vinculo WHERE idLog=".$wea.";");
$id=array();

while ($reg = mysqli_fetch_array($vin)){
  $id[]=$reg['idPj1'];
  $id[]=$reg['idPj2'];
}

print_r($id[0].' '.$id[1]);

 ?>
