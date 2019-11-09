
-- Base de datos: `Game`
--
CREATE DATABASE IF NOT EXISTS `Game`;
USE `Game`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidades`
--

CREATE TABLE `habilidades` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `daño` int(11) NOT NULL,
  `gc` int(11) NOT NULL,
  `prob_gc` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `descrip` varchar(255) NOT NULL,
  `Tipo` enum('Hechizo','Arma') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `habilidades`
--

INSERT INTO `habilidades` (`id`, `name`, `daño`, `gc`, `prob_gc`, `valor`, `descrip`, `Tipo`) VALUES
(1, 'Golpe Magico', 5, 7, 10, 10, 'Golpe Basico de Magia', 'Hechizo'),
(2, 'Kunai', 5, 7, 10, 10, 'Golpe Melee Basico', 'Arma'),
(3, 'Golpe Magico Fuerte', 6, 8, 8, 15, 'Golpe Magico con Fuerza', 'Hechizo'),
(4, 'Bola de Fuego', 8, 9, 8, 16, 'Bola Simple de Fuego', 'Hechizo'),
(5, 'Combustion', 8, 10, 7, 17, 'Combustion Espontanea', 'Hechizo'),
(6, 'Super Fuerza', 10, 12, 6, 20, 'Super Fuerza Momentanea', 'Hechizo'),
(7, 'Torbellino', 9, 10, 10, 19, 'Torbellino de Poder', 'Hechizo'),
(8, 'Gomu Gomu no Pistola', 15, 18, 15, 30, 'One Piece no power', 'Hechizo'),
(9, 'Makankosappo', 20, 25, 18, 50, 'Piccoro\'s rayito', 'Hechizo'),
(10, 'Kamahameha', 40, 50, 20, 80, 'Kakaroto\'s power', 'Hechizo'),
(11, 'Genkidama', 60, 65, 20, 140, 'KI del Universo', 'Hechizo'),
(12, 'Rasengan', 40, 45, 25, 120, 'Minato\'s Technique', 'Hechizo'),
(13, 'Chidori', 34, 50, 26, 120, 'Fail appling lightning chakra to Rasengan', 'Hechizo'),
(14, 'RasenShuriken', 70, 80, 30, 160, 'Naruto\'s Full Technique', 'Hechizo'),
(15, 'Chasquido de Thanos', 90, 900, 50, 500, 'Deleteador Infinito', 'Hechizo'),
(16, 'Lanza', 7, 8, 10, 12, 'Arma Blanca con distancia', 'Arma'),
(17, 'Espada', 9, 10, 12, 20, 'Espada Clasica', 'Arma'),
(18, 'Katana', 12, 14, 12, 25, 'Espada Clasica Oriental', 'Arma'),
(19, 'Dagas', 9, 15, 10, 20, 'Dagas Tipicas Duales', 'Arma'),
(20, 'Balloneta', 16, 20, 15, 30, 'Balloneta 1° Guerra Mundial', 'Arma'),
(21, 'Karambit', 15, 25, 20, 50, 'Karambit CSGO', 'Arma'),
(22, 'Navaja', 20, 25, 15, 60, 'Navaja del Peluca', 'Arma'),
(23, 'Cuchillo de Leñador', 5, 30, 16, 65, 'Machete sin filo pero con potencia', 'Arma'),
(24, 'Chuchara Afilada', 1, 1000, 1, 90, 'Chuchara Afilada de Carcelero', 'Arma'),
(25, 'Guitarra 4 cuerdas', 36, 40, 25, 100, 'Te Rompe los Oidos de lo mal que suena', 'Arma'),
(26, 'Lapicera Afilada', 60, 80, 19, 200, 'Keanu Reeves no Legendary Weapon', 'Arma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pj`
--

CREATE TABLE `pj` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `gold` bigint(20) NOT NULL,
  `hp` smallint(6) NOT NULL,
  `str` smallint(6) DEFAULT NULL,
  `iq` smallint(6) DEFAULT NULL,
  `hp_max` int(11) NOT NULL,
  `tiempo` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pj`
--

INSERT INTO `pj` (`id`, `id_usuario`, `nombre`, `gold`, `hp`, `str`, `iq`, `hp_max`, `tiempo`) VALUES
(23, 29, 'Favio24_Warrior', 330, 500, 20, 5, 500, NULL),
(24, 29, 'Favio24_Wizard', 300, 150, 5, 20, 150, NULL),
(27, 35, 'Tomas_Warrior', 100, 200, 20, 5, 200, NULL),
(28, 35, 'Tomas_Wizard', 100, 150, 5, 20, 150, NULL),
(29, 36, 'favinho_Warrior', 8, 200, 20, 5, 200, NULL),
(30, 36, 'favinho_Wizard', 1090, 889, 5, 20, 999, NULL);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_h`
--

CREATE TABLE `p_h` (
  `id` int(11) NOT NULL,
  `idPj` int(11) NOT NULL,
  `idHab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(30, 23, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `photo` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id`, `nombre`, `pass`) VALUES
(29, 'Favio24', '25f9e794323b453885f5181f1b624d0b'),
(35, 'Tomas', '25f9e794323b453885f5181f1b624d0b', NULL),
(36, 'favinho', '25f9e794323b453885f5181f1b624d0b', NULL);

--
-- Disparadores `Usuario`
--
DELIMITER $$
CREATE TRIGGER `crearPersj` AFTER INSERT ON `Usuario` FOR EACH ROW begin
  insert into pj(id_usuario,nombre,gold,hp,str,iq, hp_max) values(new.id,concat(new.nombre, '_Warrior'),100,200,20,5, 200);
  insert into pj(id_usuario,nombre,gold,hp,str,iq, hp_max) values(new.id,concat(new.nombre, '_Wizard'),100,150,5,20, 150);
  end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vinculo`
--

CREATE TABLE `vinculo` (
  `idLog` bigint(20) NOT NULL,
  `idUsuario1` int(11) NOT NULL,
  `idUsuario2` int(11) NOT NULL,
  `idPj1` int(11) NOT NULL,
  `idPj2` int(11) NOT NULL,
  `UsuarioTurno` int(11) NOT NULL,
  `log` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vinculo`
--

INSERT INTO `vinculo` (`idLog`, `idUsuario1`, `idUsuario2`, `idPj1`, `idPj2`, `UsuarioTurno`, `log`) VALUES
(366, 36, 0, 30, 0, 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pj`
--
ALTER TABLE `pj`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pj_Usuario` (`id_usuario`);

--
-- Indices de la tabla `p_h`
--
ALTER TABLE `p_h`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `vinculo`
--
ALTER TABLE `vinculo`
  ADD PRIMARY KEY (`idLog`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `pj`
--
ALTER TABLE `pj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `p_h`
--
ALTER TABLE `p_h`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `vinculo`
--
ALTER TABLE `vinculo`
  MODIFY `idLog` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pj`
--
ALTER TABLE `pj`
  ADD CONSTRAINT `fk_pj_Usuario` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
