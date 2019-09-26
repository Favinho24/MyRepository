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


    while ($reg=mysqli_fetch_array($sel)) {
      $id.='+'.$reg[0];
      $UserID.='+'.$reg[1];
      $nom.='+'.$reg[2];
      $or.='+'.$reg[3];
      $heal.='+'.$reg[4];
      $str.='+'.$reg[5];
      $iq.='+'.$reg[6];
    }
    $ram=explode('+', $id);
    $y0=explode('+', $UserID);
    $y1=explode('+', $nom);
    $y2=explode('+', $or);
    $y3=explode('+', $heal);
    $y4=explode('+', $str);
    $y5=explode('+', $iq);

    // echo $y1[2];
    if (strpos($y1[1], 'Warrior') && strpos($y1[2], 'Wizard')) {
      $Wa = new pj($ram[1], $y0[1], $y1[1], $y2[1], $y3[1], $y4[1], $y5[1]);
      $Wi = new pj($ram[2], $y0[2], $y1[2], $y2[2], $y3[2], $y4[2], $y5[2]);
    }



    echo $Wi->GetTodo();



  // echo $id_usuario;

  // global $Wa;
  // global $Wi;
  // //
  // function WarriorWizard($id_usuario, $database)
  // {
  //   echo $id_usuario;
  //
  //   $resultado = $database->query("SELECT * FROM `character` WHERE `id_usuario`='.$id_usuario.';");
  //   $rows = mysqli_num_rows($resultado);
  //
  //   print_r($resultado);
  //
  //   $id='';
  //   $UserID='';
  //   $nom='';
  //   $or='';
  //   $heal='';
  //
  //   if ($rows > 0 && $rows < 3) {
  //     while ($reg=mysqli_fetch_array($resultado)) {
  //       $id.='+'.$reg[0];
  //       $UserID.='+'.$reg[1];
  //       $nom.='+'.$reg[2];
  //       $or.='+'.$reg[3];
  //       $heal.='+'.$reg[4];
  //     }
  //   }
  //   echo $id;
  //
  //   if ($id) {
  //     $ram=explode('+', $id);
  //     $resultado2 = $database->query("SELECT `strength` FROM `Warrior` w JOIN `character` c ON w.id_persona=c.id WHERE c.id='$ram[1]' LIMIT 1;");
  //     $resultado3 = $database->query("SELECT `intelligence` FROM `Wizard` w JOIN `character` c ON w.id_persona=c.id WHERE c.id='$ram[2]' LIMIT 1;");
  //
  //     $r2=mysqli_fetch_array($resultado2);
  //     $r3=mysqli_fetch_array($resultado3);
  //
  //     $y0=explode('+', $UserID);
  //     $y1=explode('+', $nom);
  //     $y2=explode('+', $or);
  //     $y3=explode('+', $heal);
  //     // echo $ram[1];
  //     //
  //     // echo $y1[1];
  //     // echo $y2[1];
  //     // echo $y3[1];
  //     // echo $r2[0];
  //
  //     $Wa = new Warrior($ram[1], $y0[1], $y1[1], $y2[1], $y3[1], $ram[1], $r2[0]);
  //     $Wi = new Wizard($ram[2], $y0[2], $y1[2], $y2[2], $y3[2], $ram[2], $r3[0]);
  //   }
  //   if (empty($Wa) && empty($Wi)) {
  //     return false;
  //   }else {
  //     return true;
  //   }
  // }
  // if (!WarriorWizard($id_usuario, $database)) {
  //   $database->query("INSERT INTO `character` (`id_usuario`, `nombre`, `oro`, `health`) VALUES ('$id_usuario','Warrior_default', '100', '100')");
  //   $database->query("INSERT INTO `character` (`id_usuario`, `nombre`, `oro`, `health`) VALUES ('$id_usuario','Wizard_default', '100', '100')");
  //   $resultado = $database->query("SELECT `id` FROM `character` WHERE `id_usuario`='.$id_usuario.';");
  //   $id_new='';
  //   while ($reg=mysqli_fetch_array($resultado)) {
  //     $id_new.='+'.$reg[0];
  //   }
  //   $ram=explode('+', $id_new);
  //   $database->query("INSERT INTO `Warrior` VALUES ('$ram[1]','80')");
  //   $database->query("INSERT INTO `Wizard` VALUES ('$ram[2]','80')");
  // }


    // YA ESTAN TANTO EL WIZARD COMO EL WARRIOR CARGADOS SOLO HAY QUE HACER EL
    // CSS Y HTML PARA QUE SE MUESTREN Y LA OPCION PARA QUE SE CREEN LOS PREDETERMINADOS!!

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Inside the Shadows</title>
     <link rel="stylesheet" href="./style/contenedor.css">
     <link rel="icon" href="./resources/img/Inside the Shadows ico.ico">
     <script>
      //  function warrior_fun() {
      //    var hola="";
      //  }
     </script>
   </head>
   <body>
     <div class="topBar"><p class="title">Inside the Shadows</p><img id="img1" src="./resources/img/Inside the Shadows.png" alt="RPG Game logo"></div>
     <div class="navBar">
       <ul>
         <li><a href="LogIN.php">Iniciar Sesión</a></li>
         <li><a href="register.php">Registrarse</a></li>
         <li><a href="index.php">Acerca de</a></li>
         <li><a href="#">FAQ</a></li>
       </ul>
     </div>
     <div class="contenedor">
       <h1>Perfil y Datos de la Cuenta</h1>
       <input type="button" name="Warrior" value="warrior" onclick="warrior_fun()">
       <input type="button" name="Wizzard" value="wizzard">
         <!-- <form method="post" action="" style="left:20%; width: 25%; top: 37%;position:absolute;border:1px solid black;">
           <div class="" style="text-align:left;margin: 10px;"><input style="width: 94%;" type="text" name="" value="" placeholder="<?php echo $u->GetName(); ?>"><br></div>
           <div class="" style="text-align:left;margin: 10px;"><input style="width: 94%;" class="pass" type="password" name="password" value="<?php echo $u->GetPass(); ?>"><br></div>
           <div class="" style="text-align:left;margin: 10px;"><input style="width: 94%; margin-left:3%;" type="submit" name="change" value="Change"><br></div>
         </form>
         <div style="border:1px solid black; height:100%; width:0px;display: inline-block; position: absolute; right:50%;"></div> -->

         <!-- Warrior Panel  -->

           <form method="post" action="" style="right: 35%;top:37%; position:absolute;border:1px solid black;display: inline-block">
             <div class="" style="height: 40px;text-align:left; margin: 10px;"><p>Warrior</p><br></div>
             <div class="" style="height: 20px;text-align:left; margin: 10px;"><p style="margin: -1px;">Nombre: <?php echo $Wa->GetNombre(); ?></p><br></div>
             <div class="" style="height: 20px;text-align:left; margin: 10px;"><p style="margin: -1px;">Oro: <?php echo $Wa->GetOro(); ?></p><br></div>
             <div class="" style="height: 20px;text-align:left; margin: 10px;"><p style="margin: -1px;">Salud: <?php echo $Wa->GetHealth(); ?></p><br></div>
             <div class="" style="height: 20px;text-align:left; margin: 10px;"><p style="margin: -1px;">Fuerza: <?php echo $Wa->GetStrength(); ?></p><br></div>
           </form>

           <!-- Wizard Panel -->

           <form method="post" action="" style="right: 35.2%;top:67%; position:absolute;border:1px solid black;display: inline-block">
             <div class="" style="height: 40px;text-align:left; margin: 10px;"><p>Wizard</p><br></div>
             <div class="" style="height: 20px;text-align:left; margin: 10px;"><p style="margin: -1px;">Nombre: <?php echo $Wi->GetNombre(); ?></p><br></div>
             <div class="" style="height: 20px;text-align:left; margin: 10px;"><p style="margin: -1px;">Oro: <?php echo $Wi->GetOro(); ?></p><br></div>
             <div class="" style="height: 20px;text-align:left; margin: 10px;"><p style="margin: -1px;">Salud: <?php echo $Wi->GetHealth(); ?></p><br></div>
             <div class="" style="height: 20px;text-align:left; margin: 10px;"><p style="margin: -1px;">Intelligencia: <?php echo $Wi->GetIntelligence(); ?></p><br></div>
           </form>
     </div>
   </body>
 </html>
