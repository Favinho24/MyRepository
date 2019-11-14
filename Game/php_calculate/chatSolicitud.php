<?php

  session_start();
  require ('../DB/DBClass.php');
  require ('../DB/DBVars.php');

  if (isset($_POST['wa'])){
    $wea=$_POST['wa'];
  }else{
    echo 'error';
    exit;
  }

  $database = new DatabaseObject($host, $username, $password, $database);

  $vin=$database->query("SELECT msj FROM vinculo WHERE idLog=".$wea.";");
  $msj='';
  while($reg=mysqli_fetch_array($vin)){
    $msj=$reg['msj'];
  }
  echo $msj;
  exit;

 ?>
