<?php

	ob_start();
	session_start();
	require ('../Clases/Usuario.php');
	require ('../Clases/pj.php');
	require ('../DB/DBClass.php');
	require ('../DB/DBVars.php');

	if (isset($_POST['option'])){
		$option=$_POST['option'];
	}else{
		echo 'error';
		exit;
	}
	if (isset($_POST['idp2'])){
		$idp2=$_POST['idp2'];
	}else{
		echo 'error';
		exit;
	}
	if (isset($_POST['pj'])){
		$idp1=$_POST['pj'];
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

	hacerDaño();

	function hacerDaño(){

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
    }





		global $database, $idp2, $option, $idp1, $idLog;

		$vin=$database->query("SELECT name, daño, gc, prob_gc, Tipo FROM habilidades WHERE name='".$option."';");

		global $daño;
		$neim='';
		$gc='';
		$prob_gc='';
		$tipo='';
		$nom='';
		$arm='';
		$rMag='';
		$hp='';
		$hp_max='';
		$str='';
		$iq='';

		while ($reg=mysqli_fetch_array($vin)) {
			$neim = $reg['name'];
			$daño = $reg['daño'];
			$gc = $reg['gc'];
			$prob_gc = $reg['prob_gc'];
			$tipo=$reg['Tipo'];
		}

		$vin=$database->query("SELECT nombre, hp, hp_max, armadura, rMagica FROM pj WHERE id='".$idp2."';");


		while ($reg=mysqli_fetch_array($vin)) {
			$nom=$reg['nombre'];
			$hp=$reg['hp'];
			$hp_max=$reg['hp_max'];
			$arm=$reg['armadura'];
			$rMag=$reg['rMagica'];
		}

		$vin=$database->query("SELECT str, iq FROM pj WHERE id='".$idp1."';");


		while ($reg=mysqli_fetch_array($vin)) {
			$str=$reg['str'];
			$iq=$reg['iq'];
		}

		$rival='';
		if ((explode('_', $nom))[1] == 'Warrior') {
			$rival='wa';
		}else if ((explode('_', $nom))[1] == 'Wizard'){
			$rival='wi';
		}

		$arm = mt_rand(0, $arm);
		$rMag = mt_rand(0, $rMag);

		if ($tipo == 'Arma'){
			if ($rival == 'wa') {
				$daño=$daño+$str-$arm;
			}else {
				$daño=$daño+$str;
			}
		}else if($tipo == 'Hechizo'){
			if ($rival == 'wi') {
				$daño=$daño+$iq-$rMag;
			}else {
				$daño=$daño+$str;
			}
		}



		$pro=rand(1, 1000);
		$ev=rand(1, 100);

		if ($prob_gc >= $pro){
			$daño=$daño+$gc;
		}

		if(10 >= $ev){
			echo ' ha Evadido';
      AcabarTurno(' ha Evadido');
			exit;
		}
		if ($daño < 0) {
			$daño=0;
		}
		echo 'hola';
		if (($hp - $daño) <= 0) {
			echo ' oponente muerto usando '.$neim;
			$database->query("UPDATE pj SET hp=hp-".$daño." WHERE id=".$idp2.";");
			$database->query("UPDATE partidas SET pp=pp+1 WHERE idplayer=".$idp2.";");
			$database->query("UPDATE pj SET gold=gold+100 WHERE id=".$idp1.";");
			$database->query("UPDATE partidas SET pg=pg+1 WHERE idplayer=".$idp1.";");
			AcabarTurno(' oponente muerto usando '.$neim);
			exit;
		}


		$database->query("UPDATE pj SET hp=hp-".$daño." WHERE id=".$idp2.";");
		AcabarTurno(' hicieron '.$daño.' puntos de daño usando '.$neim);
		echo ' hicieron '.$daño.' puntos de daño usando '.$neim;
		exit;



	}




 /*Hacer un trigger que verifique la no duplicacion de los nombres de ataques*/

 ?>
