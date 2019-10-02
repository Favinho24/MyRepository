<?php

  ob_start();
  session_start();
  require ('./Clases/Usuario.php');
  require ('./Clases/pj.php');
  require ('./DB/DBClass.php');
  require ('./DB/DBVars.php');

  $database = new DatabaseObject($host, $username, $password, $database);

  if (!$_SESSION['user'] && !$_SESSION['pass']) {
    header("Location: index.php");
  }
  $u=new Usuario($_SESSION['id_user'], $_SESSION['user'], $_SESSION['pass']);
  $id_user=$_SESSION['id_user'];

  $sel=$database->query("SELECT * FROM `pj` WHERE `id_usuario`='$id_user';");


  $id='';
  $UserID='';
  $nom='';
  $or='';
  $heal='';
  $str='';
  $iq='';
  $hp_max='';


    while ($reg=mysqli_fetch_array($sel)) {
      $id.='+'.$reg[0];
      $UserID.='+'.$reg[1];
      $nom.='+'.$reg[2];
      $or.='+'.$reg[3];
      $heal.='+'.$reg[4];
      $str.='+'.$reg[5];
      $iq.='+'.$reg[6];
	  $hp_max.='+'.$reg[7];
    }
    $ram=explode('+', $id);
    $y0=explode('+', $UserID);
    $y1=explode('+', $nom);
    $y2=explode('+', $or);
    $y3=explode('+', $heal);
    $y4=explode('+', $str);
    $y5=explode('+', $iq);
	$y6=explode('+', $hp_max);
	
	$_SESSION['idPj'] = $ram[1];

    // echo $y1[2];
    if (strpos($y1[1], 'Warrior') && strpos($y1[2], 'Wizard')) {
      $Wa = new pj($ram[1], $y0[1], $y1[1], $y2[1], $y3[1], $y4[1], $y5[1], $y6[1]);
      $Wi = new pj($ram[2], $y0[2], $y1[2], $y2[2], $y3[2], $y4[2], $y5[2], $y6[2]);
    }



    // echo $Wi->GetTodo();
    // echo "<br>";
    // echo $Wa->GetTodo();


    // YA ESTAN TANTO EL WIZARD COMO EL WARRIOR CARGADOS SOLO HAY QUE HACER EL
    // CSS Y HTML PARA QUE SE MUESTREN Y LA OPCION PARA QUE SE CREEN LOS PREDETERMINADOS!!

 ?>
