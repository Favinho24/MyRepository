<?php
  ob_start();
  session_start();
  require ('../DB/DBClass.php');
  require ('../DB/DBVars.php');

  if (isset($_POST['idLog'])){
    $idLog=$_POST['idLog'];
  }else{
    echo 'error';
    exit;
  }

  	$database = new DatabaseObject($host, $username, $password, $database);
    $database->query("UPDATE vinculo SET `log` = ' Huyo' WHERE idLog='".$idLog."';");
	
	$pos1 = $database->query("select p.id from Usuario u join pj p on u.id=p.id_usuario WHERE p.id in (SELECT idpj1 FROM vinculo) and u.id!='".$_SESSION["id_user"]."';");
	$pos2 = $database->query("select p.id from Usuario u join pj p on u.id=p.id_usuario WHERE p.id in (SELECT idpj2 FROM vinculo) and u.id!='".$_SESSION["id_user"]."';");
	$w1='';
	$w2='';
	while($we=mysqli_fetch_array($pos1)){
		$w1 = $we['id'];
	}
	while($we=mysqli_fetch_array($pos2)){
		$w2 = $we['id'];
	}
	
	
	if ($w1 == ''){
		$database->query("UPDATE pj SET gold=gold+50 WHERE id='".$w2."';");
	} elseif ($w2 == ''){
		$database->query("UPDATE pj SET gold=gold+50 WHERE id='".$w1."';");
	}else{
		echo 'Error en la Huida';
	}

	exit;
 ?>
