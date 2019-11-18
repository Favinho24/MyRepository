<?php

  require ('../DB/DBClass.php');
  require ('../DB/DBVars.php');

  $database = new DatabaseObject($host, $username, $password, $database);

  $vin = $database->query("select p.nombre, s.pj as 'Partidas Jugadas', s.pg as 'Partidas Ganadas', s.pp as 'Partidas Perdidas' from pj p JOIN partidas s on p.id=s.idplayer ORDER by s.pg desc");
  $no = '';
  $pj = '';
  $pg = '';
  $pp = '';
  while ($reg = mysqli_fetch_array($vin)) {
    $no.=$reg['nombre'].'-';
    $pj.=$reg['Partidas Jugadas'].'-';
    $pg.=$reg['Partidas Ganadas'].'-';
    $pp.=$reg['Partidas Perdidas'].'-';
  }


  echo ($no.'+'.$pj.'+'.$pg.'+'.$pp);
  exit;

 ?>
