--
-- Base de datos: `Game`
--
CREATE DATABASE IF NOT EXISTS `Game`;
USE `Game`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` text NOT NULL,
  `idpj1` int(11) NOT NULL,
  `idpj2` int(11) NOT NULL,
  `fechayhora` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idpj1` (`idpj1`),
  KEY `idpj2` (`idpj2`)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidades`
--

CREATE TABLE IF NOT EXISTS `habilidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `daño` int(11) NOT NULL,
  `gc` int(11) NOT NULL,
  `prob_gc` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `descrip` varchar(255) NOT NULL,
  `Tipo` enum('Hechizo','Arma') NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

--
-- Volcado de datos para la tabla `habilidades`
--

INSERT INTO `habilidades` (`id`, `name`, `daño`, `gc`, `prob_gc`, `valor`, `descrip`, `Tipo`, `icon`) VALUES
(1, 'Golpe Magico', 5, 7, 10, 10, 'Golpe Basico de Magia', 'Hechizo', 'fist.png'),
(2, 'Kunai', 5, 7, 10, 10, 'Golpe Melee Basico', 'Arma', 'kunai.png'),
(3, 'Golpe Magico Fuerte', 6, 8, 8, 15, 'Golpe Magico con Fuerza', 'Hechizo', 'supa-fist.png'),
(4, 'Bola de Fuego', 8, 9, 8, 16, 'Bola Simple de Fuego', 'Hechizo', 'fireball.ico'),
(5, 'Combustion', 8, 10, 7, 17, 'Combustion Espontanea', 'Hechizo', 'fuego.png'),
(6, 'Super Fuerza', 10, 12, 6, 20, 'Super Fuerza Momentanea', 'Hechizo', 'musculo.png'),
(7, 'Torbellino', 9, 10, 10, 19, 'Torbellino de Poder', 'Hechizo', 'whirlwind.png'),
(8, 'Gomu Gomu no Pistola', 15, 18, 15, 30, 'One Piece no power', 'Arma', 'gomugomu.png'),
(9, 'Makankosappo', 20, 25, 18, 50, 'Piccoro\'s rayito', 'Hechizo', 'makankosappo.png'),
(10, 'Kamahameha', 40, 50, 20, 80, 'Kakaroto\'s power', 'Hechizo', 'kamehameha.png'),
(11, 'Genkidama', 60, 65, 20, 140, 'KI del Universo', 'Hechizo', 'genkidama.png'),
(12, 'Rasengan', 40, 45, 25, 120, 'Minato\'s Technique', 'Hechizo', 'rasengan.ico'),
(13, 'Chidori', 34, 50, 26, 120, 'Fail applying lightning chakra to Rasengan', 'Hechizo', 'chidori.png'),
(14, 'RasenShuriken', 70, 80, 30, 160, 'Naruto\'s Full Technique', 'Hechizo', 'rasengan-shuriken.png'),
(15, 'Chasquido de Thanos', 90, 900, 50, 500, 'Deleteador Infinito', 'Hechizo', 'infinity_gauntlet.png'),
(16, 'Lanza', 7, 8, 10, 12, 'Arma Blanca con distancia', 'Arma', 'lanza.png'),
(17, 'Espada', 9, 10, 12, 20, 'Espada Clasica', 'Arma', 'sword.png'),
(18, 'Katana', 12, 14, 12, 25, 'Espada Clasica Oriental', 'Arma', 'katana.ico'),
(19, 'Dagas', 9, 15, 10, 20, 'Dagas Tipicas Duales', 'Arma', 'daga.png'),
(20, 'Balloneta', 16, 20, 15, 30, 'Balloneta 1° Guerra Mundial', 'Arma', 'bayonet.png'),
(21, 'Karambit', 15, 25, 20, 50, 'Karambit CSGO', 'Arma', 'karambit.png'),
(22, 'Navaja', 20, 25, 15, 60, 'Navaja del Peluca', 'Arma', 'navaja.png'),
(23, 'Cuchillo de Leñador', 5, 30, 16, 65, 'Machete sin filo pero con potencia', 'Arma', 'cuchillo.png'),
(24, 'Chuchara Afilada', 1, 1000, 1, 90, 'Chuchara Afilada de Carcelero', 'Arma', 'spoon.png'),
(25, 'Guitarra 4 cuerdas', 36, 40, 25, 100, 'Te Rompe los Oidos de lo mal que suena', 'Arma', 'guitar.png'),
(26, 'Lapicera Afilada', 60, 80, 19, 200, 'Keanu Reeves no Legendary Weapon', 'Arma', 'boligrafo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidas`
--

CREATE TABLE IF NOT EXISTS `partidas` (
  `idplayer` int(11) NOT NULL,
  `pj` int(11) NOT NULL DEFAULT 0,
  `pg` int(11) NOT NULL DEFAULT 0,
  `pp` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idplayer`)
);


--
-- Estructura de tabla para la tabla `pj`
--

CREATE TABLE IF NOT EXISTS `pj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `gold` bigint(20) NOT NULL,
  `hp` smallint(6) NOT NULL,
  `str` smallint(6) DEFAULT NULL,
  `armadura` smallint(6) DEFAULT NULL,
  `iq` smallint(6) DEFAULT NULL,
  `rMagica` smallint(6) DEFAULT NULL,
  `hp_max` int(11) NOT NULL,
  `tiempo` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pj_Usuario` (`id_usuario`)
);



--
-- Disparadores `pj`
--
DELIMITER $$
CREATE TRIGGER `Bloq_pj` BEFORE UPDATE ON `pj` FOR EACH ROW BEGIN
	IF new.hp < 1 THEN
    	set new.tiempo=SYSDATE();
    ELSE
    	set new.tiempo=null;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertarEnPartidas` AFTER INSERT ON `pj` FOR EACH ROW BEGIN
	INSERT INTO `partidas` (`idplayer`, `pj`, `pg`, `pp`) VALUES (new.id, '0', '0', '0');
    if (new.hp_max = 150) THEN
    	INSERT into p_h(idPj, idHab) values (new.id, 1);
    end if;
    if (new.hp_max = 200) THEN
    	INSERT into p_h(idPj, idHab) values (new.id, 2);
    end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_h`
--

CREATE TABLE IF NOT EXISTS `p_h` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPj` int(11) NOT NULL,
  `idHab` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Volcado de datos para la tabla `p_h`
--

INSERT INTO `p_h` (`id`, `idPj`, `idHab`) VALUES
(1, 23, 2),
(2, 24, 1),
(12, 23, 8),
(13, 29, 2),
(14, 29, 6),
(15, 29, 26),
(16, 29, 3),
(17, 29, 5),
(18, 29, 1),
(19, 29, 1),
(20, 29, 2),
(21, 29, 1),
(22, 29, 1),
(23, 29, 1),
(24, 30, 1),
(25, 24, 10),
(26, 30, 15),
(27, 30, 16),
(28, 30, 5),
(29, 30, 8),
(30, 23, 13),
(31, 27, 2),
(32, 33, 23),
(33, 27, 24),
(34, 37, 1),
(35, 38, 2),
(36, 39, 2),
(37, 40, 1),
(38, 28, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `photo` longblob DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
);

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id`, `nombre`, `pass`, `photo`) VALUES
(29, 'Favio24', '25f9e794323b453885f5181f1b624d0b', null),
(35, 'Tomas', '25f9e794323b453885f5181f1b624d0b', NULL),
(36, 'favinho', '25f9e794323b453885f5181f1b624d0b', NULL),
(39, 'FavioC', '25f9e794323b453885f5181f1b624d0b', NULL),
(42, 'weiaxd', '25f9e794323b453885f5181f1b624d0b', NULL),
(43, 'Fernandito4122', '25d55ad283aa400af464c76d713c07ad', NULL);

--
-- Disparadores `Usuario`
--
DELIMITER $$
CREATE TRIGGER `crearPersj` AFTER INSERT ON `Usuario` FOR EACH ROW begin
  insert into pj(id_usuario,nombre,gold,hp,str,armadura,iq,rMagica,hp_max) values(new.id,concat(new.nombre, '_Warrior'),100,200,20,50,5,10,200);
  insert into pj(id_usuario,nombre,gold,hp,str,armadura,iq,rMagica,hp_max) values(new.id,concat(new.nombre, '_Wizard'),100,150,5,10,20,50,150);
  end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vinculo`
--

CREATE TABLE IF NOT EXISTS `vinculo` (
  `idLog` bigint(20) NOT NULL AUTO_INCREMENT,
  `idUsuario1` int(11) NOT NULL,
  `idUsuario2` int(11) NOT NULL,
  `idPj1` int(11) NOT NULL,
  `idPj2` int(11) NOT NULL,
  `UsuarioTurno` int(11) NOT NULL,
  `log` text DEFAULT NULL,
  `adds` text DEFAULT NULL,
  PRIMARY KEY (`idLog`)
);

--
-- Volcado de datos para la tabla `vinculo`
--

INSERT INTO `vinculo` (`idLog`, `idUsuario1`, `idUsuario2`, `idPj1`, `idPj2`, `UsuarioTurno`, `log`) VALUES
(739, 35, 36, 28, 29, 36, ' hicieron 0 puntos de daño usando Kunai');

--
-- Disparadores `vinculo`
--
DELIMITER $$
CREATE TRIGGER `partidasJugadas` BEFORE UPDATE ON `vinculo` FOR EACH ROW BEGIN
IF !(new.idPj2 <=> null) and (new.log <=> ' inició la partida')
THEN
	update partidas set pj=pj+1 WHERE idplayer=old.idPj1;
    update partidas set pj=pj+1 WHERE idplayer=new.idPj2;
   end if;
END
$$
DELIMITER ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`idpj1`) REFERENCES `pj` (`id`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`idpj2`) REFERENCES `pj` (`id`);

--
-- Filtros para la tabla `partidas`
--
ALTER TABLE `partidas`
  ADD CONSTRAINT `fk_idPlayer` FOREIGN KEY (`idplayer`) REFERENCES `pj` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pj`
--
ALTER TABLE `pj`
  ADD CONSTRAINT `fk_pj_Usuario` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

--
-- Volcado de datos para la tabla `pj`
--

INSERT INTO `pj` (`id`, `id_usuario`, `nombre`, `gold`, `hp`, `str`, `armadura`, `iq`, `rMagica`, `hp_max`, `tiempo`) VALUES
(23, 29, 'Favio24_Warrior', 730, 87, 20, 50, 5, 10, 500, NULL),
(24, 29, 'Favio24_Wizard', 650, 100, 5, 10, 20, 50, 150, NULL),
(27, 35, 'Tomas_Warrior', 0, 200, 20, 50, 5, 10, 200, NULL),
(28, 35, 'Tomas_Wizard', 90, 70, 5, 10, 20, 50, 150, NULL),
(29, 36, 'favinho_Warrior', 298, 103, 20, 50, 5, 10, 200, NULL),
(30, 36, 'favinho_Wizard', 1690, 190, 5, 10, 20, 50, 999, NULL),
(33, 39, 'FavioC_Warrior', 35, 188, 20, 50, 5, 10, 200, NULL),
(34, 39, 'FavioC_Wizard', 100, 150, 5, 10, 20, 50, 150, NULL),
(35, 43, 'Fernandito4122_Warrior', 600, 500, 20, 50, 5, 10, 200, NULL),
(36, 43, 'Fernandito4122_Wizard', 300, 500, 5, 10, 20, 50, 150, NULL);
