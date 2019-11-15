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

  $id=array();
  $id[]=(explode(' ', $wea))[0];
  $id[]=(explode(' ', $wea))[1];

  $database = new DatabaseObject($host, $username, $password, $database);

  $vin=$database->query("SELECT texto FROM chat WHERE (idpj1='".$id[0]."' OR idpj2='".$id[0]."') AND (idpj1='".$id[1]."' OR idpj2='".$id[1]."') ORDER BY fechayhora limit 50;");
  $msj=array();
  while ($reg = mysqli_fetch_array($vin)){
   $msj[]=$reg['texto'];
  }
  print_r (json_encode($msj));
  exit;

 ?>
