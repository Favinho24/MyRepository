
-- Database: `Game`
--
CREATE DATABASE IF NOT EXISTS `Game`;
USE `Game`;

-- --------------------------------------------------------

--
-- Table structure for table `pj`
--

CREATE TABLE `pj` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `gold` bigint(20) NOT NULL,
  `hp` smallint(6) NOT NULL,
  `str` smallint(6) NULL,
  `iq` smallint(6) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pj`
--

/*
INSERT INTO `pj` (`id`, `id_usuario`, `nombre`, `oro`, `health`) VALUES
(1, 19, 'wa', 8, 100),
(2, 19, 'wea', 5, 100),
(5, 20, 'Warrior_default', 100, 100),
(6, 20, 'Wizard_default', 100, 100),
(21, 28, 'Warrior_default', 100, 100),
(22, 28, 'Wizard_default', 100, 100);
*/
-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

CREATE TABLE `Usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) UNIQUE NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Usuario`
--


-- --------------------------------------------------------

--
-- Table structure for table `Warrior`
--
/*
CREATE TABLE `Warrior` (
  `id_persona` int(11) NOT NULL,
  `strength` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Warrior`
--

INSERT INTO `Warrior` (`id_persona`, `strength`) VALUES
(1, 30),
(5, 80),
(21, 80);

-- --------------------------------------------------------

--
-- Table structure for table `Wizard`
--

CREATE TABLE `Wizard` (
  `id_persona` int(11) NOT NULL,
  `intelligence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Wizard`
--

INSERT INTO `Wizard` (`id_persona`, `intelligence`) VALUES
(2, 50),
(6, 80),
(22, 80);
*/
--
-- Indexes for dumped tables
--

--
-- Indexes for table `pj`
--
ALTER TABLE `pj`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pj_Usuario` (`id_usuario`);

--
-- Indexes for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Warrior`
--
/*
ALTER TABLE `Warrior`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indexes for table `Wizard`
--
ALTER TABLE `Wizard`
  ADD PRIMARY KEY (`id_persona`);
*/
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pj`
--
ALTER TABLE `pj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `Warrior`
--
/*
ALTER TABLE `Warrior`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Wizard`
--
ALTER TABLE `Wizard`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
  */
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pj`
--
ALTER TABLE `pj`
  ADD CONSTRAINT `fk_pj_Usuario` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


  delimiter //
  create trigger crearPersj after insert on usuario
  for each row
  begin
  insert into pj(id_usuario,nombre,gold,hp,str,iq) values(new.id,concat(new.nombre, '_Warrior'),100,200,20,5);
  insert into pj(id_usuario,nombre,gold,hp,str,iq) values(new.id,concat(new.nombre, '_Wizard'),100,150,5,20);
  end //
  delimiter ;

--
-- Constraints for table `Warrior`
--
/*
ALTER TABLE `Warrior`
  ADD CONSTRAINT `fk_Warrior_pj` FOREIGN KEY (`id_persona`) REFERENCES `pj` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Wizard`
--
ALTER TABLE `Wizard`
  ADD CONSTRAINT `fk_Wizard_pj` FOREIGN KEY (`id_persona`) REFERENCES `pj` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
*/
