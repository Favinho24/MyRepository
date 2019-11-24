<?php

    ob_start();
    session_start();
    require ('../Clases/Usuario.php');
    require ('../Clases/pj.php');
    require ('../DB/DBClass.php');
    require ('../DB/DBVars.php');

    if (isset($_POST['attk'])){
      $option=$_POST['attk'];
    }else{
      echo 'error';
      exit;
    }
    $database = new DatabaseObject($host, $username, $password, $database);
    $wea='';
    $vin = $database->query("SELECT name, daño, gc, prob_gc, descrip, Tipo, icon FROM habilidades WHERE name = '".$option."'");
    $datos = array();
    while ($reg = mysqli_fetch_array($vin)){
      $datos['name']=$reg['name'];
      $datos['daño']=$reg['daño'];
      $datos['gc']=$reg['gc'];
      $datos['prob_gc']=$reg['prob_gc'];
      $datos['descrip']=$reg['descrip'];
      $datos['tipo']=$reg['Tipo'];
      $datos['icon']=$reg['icon'];
    }

    print_r(json_encode($datos));
 ?>
