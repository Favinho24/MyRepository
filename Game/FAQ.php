<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inside the Shadows</title>
    <link rel="stylesheet" href="./style/contenedor.css">
    <link rel="icon" href="./resources/img/Inside the Shadows ico.ico">
    <script>
    function Iniciando() {
      if ("<?php echo $_SESSION['user']; ?>" && "<?php echo $_SESSION['pass']; ?>"){
        document.getElementById('loginButton').innerHTML='Perfil';
        document.getElementById('lista').style.marginLeft='53%';;
      }
    }
    </script>
  </head>
  <body onload="Iniciando();">
    <div class="topBar"><p class="title">Inside the Shadows</p><img id="img1" src="./resources/img/Inside the Shadows.png" alt="RPG Game logo"></div>
    <div class="navBar">
      <ul id='lista'>
        <li><a href="LogIN.php" id='loginButton'>Iniciar Sesión</a></li>
        <li><a href="register.php">Registrarse</a></li>
        <li><a href="index.php">Acerca de</a></li>
        <li><a href="FAQ.php">FAQ</a></li>
      </ul>
    </div>
    <div class="contenedor">
      <h1>Frecuent Answers and Questions</h1>
      <p class="paragraph">
        <ul class="list">
          <li class="row"><b>Como jugar?</b> <br>
            <p style='text-align:justify'>
            Simplemente se Pide la creacion de una cuenta, para registro del jugador, y a continuacion se crearán automaticamente 2 Characters
            Uno será un Warrior y el otro un Wizzard.<br>El modo en que el juego está construido no permite crear mas personajes, solamente se centra en el
            dessarrollo de los personajes por defecto, estos cuentan con un set de características, alqgunas compartidas, otras no. Existe tambien un menu
            de habilidades por obtener para poder retrse online con otros jugadores. Y un pequeño inventario que lista las propiedades de cada personaje.
            </p>
          </li>
          <li class="row"><b>Como conseguir oro?</b><br>
            <p style='text-align:justify'>
              El Oro se consigue matando a otros enemigos en la pantalla de multijugador, esto se logra tras bajar la vida hasta 0 de tu oponente.
              Lo ideal es hacerlo sin perder mucha de tu vida en el proceso, dado que el oro sirve para comprar mas habilidades de pelea.<br>
              Existe otra forma en la que se podria ganar Oro, haciendo que el rival huya de la partida, de esa manera el personaje que se queda son pelea
              es recompensado con 50 monedas de oro. Actualmente no existe otro medio por el que llega a obtener mas oro.
            </p>
          </li>
          <li class="row"><b>Como funciona el Multijugador?</b><br>
            <p style='text-align:justify'>
              La Pantalla de Multijugador pretende poner en linea a todos los jugadores deseosos de proceder a la lucha con sus nuevas habilidades equipadas,
              este es un entorno de guerra y emociones varias en las que los participantes se encuentran para rivalizar los unos contra otros
              y de esa manera poder resaltar sobre el resto dandose un baño en el orgullo y la victoria.
            </p>
          </li>
          <li class="row"><b>Como usar la tienda?</b><br>
            <p style='text-align:justify'>
              Tal y como se podria utilizar, el metodo para usar la Tienda es bastante intuitivo. Simplemente seleccionas al personaje al que le deseas
              equipar un nuevo objeto y haces clic en la Tienda. Alli dentro seleccionas el ataque que te guste, tenindo en cuentas las aptitudes de tu
              personaje y las caracteristicas del objeto, y posteriormente le das al boton comprar, cuando termines la compra, dirijete a tu perfil para ver a tu
              personaje con sus nuevos accesorios en el inventario.
            </p>
          </li>
          <li class="row"><b>Funcionamiento del Sistema</b><br>
            <p style='text-align:justify'>
              Todo el sistema esta basado en PHP, JavaScript, HTML y en el sector de almacenamiento, MySQL. En combinacion con los otros lenguajes, lo que
              el usuario ve principalmente son frutos del uso de HTML, CSS y JavaScript que le dan ese entorno visual generico. El juego en si consta de dos
              personajes pertenecientes a cada usuario que se registre en el sistema. Estos personajes tienen capacidades base por defecto que pueden ser
              utilizadas para maximizar el poder de sus ataques con sus armas. En principio la POO es utilizada para guardar toda la informacion pertinente
              de cada personaje por cada usuario, para de esta manera poder gestionar las variables de una manera mas facil y sin sobrecargar la BD de
              consultas repetitivas e innecesarias. El sistema esta hecho para que el usuario adquiera items con el Oro del juego, este Oro será obtenido
              por la rendicion en batalla de su contricante o su inminente eliminacion, siendo las ganancias 50 Oro y 100 Oro respectivamente.<br>
              Por su parte en la tienda simplemente tenemos una lista recolectada desde la BD que pretende mostrarle al usuario las habilidades disponibles
              a adquirir, esta claro que las habilidades existentes tienen diferentes valores en sus caracteristicas por lo que dependiendo de la naturaleza del
              personaje estariamos hablando de un mejor o peor uso de estas skills.<br>
              El inventario simplemente muestra la propiedad de cada personaje.<br><br>
              El sistema de MP es dentro de todo el mas complejo. Se basa siempre en la conexion por medio de la BD para generar un entorno de partida y interaccion
              entre personajes, esto tiene su desventaja dado que es necesario estar consultando repititivamente la BD para obtener la ultima informacion
              disponible de la partida.<br>
              Ademas contamos con una pequeña reseña de cada habilidad antes de darle uso, una pantalla de log que muestra el desarrollo de la partida en el tiempo,
              un sector dedicado a la vida del contricante, asi como tambien uno dedicado a nuesto personaje con cada una de sus cualidades importantes para el
              combate, y por ultimo una pequeña ventana de chat en la que se mantiene unaconversacion con el contrincante.<br><br>
              En lineas Generales es necesario una cuenta para ingresar, existen requisitos minimos: como el largo de la pass, etc. Pero en pocas palabras
              no deja de ser un juego de combate entre personajes pertenecientes a un usuario que cuentan con Armadura, Resistencia Mágica, IQ, Fuerza, etc.
              Y por supuesto el factor aleatorio que no beneficia a nadie pero afecta los golpes criticos, la posibilidad de Esquive, la cantidad útil de Restencia
              o Armadura por personaje, entre otros.
            </p>
          </li>
        </ul>
</p>
    </div>
  </body>
</html>
