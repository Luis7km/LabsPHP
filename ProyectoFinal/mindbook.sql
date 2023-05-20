-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2022 a las 18:03:14
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mindbook`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_crear_comentario` (IN `id_user` INT, IN `id_publi` INT, IN `comentario` TEXT)   BEGIN
	set @s=concat("insert into comentarios (user_id, publi_id, comentario) values 
                  (",id_user,",
                  '",id_publi,"',
                  '",comentario,"');");
    PREPARE stmt from @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_crear_publicacion` (IN `id_user` INT, IN `contenido` TEXT, IN `imagen` MEDIUMBLOB, IN `tipo` VARCHAR(50))   BEGIN
	set @s=concat("insert into publicaciones (user_id, contenido, imagen, tipo) values 
                  (",id_user,",
                  '",contenido,"',
                  '",imagen,"',
                  '",tipo,"');");
    PREPARE stmt from @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_crear_usuario` (IN `nombre` VARCHAR(50), IN `apellido` VARCHAR(50), IN `email` VARCHAR(50), IN `usuario` VARCHAR(50), IN `contrasena` VARCHAR(50))   BEGIN
	set @s=concat("insert into usuarios (nombre, apellido, email, usuario, contrasena) values (
                 '",nombre,"',
                 '",apellido,"',
                 '",email,"',
                 '",usuario,"',
                 '",contrasena,"');");
    PREPARE stmt from @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_comentarios` (IN `id_pub` INT)   BEGIN
	set @s=concat("select C.comentario, U.usuario
                  from comentarios C, usuarios U
                  where C.publi_id =",id_pub," and C.user_id = U.user_id");
    prepare stmt from @s;
    execute stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_perfil` (IN `usuario` VARCHAR(50))   BEGIN
	set @s=concat("select * from usuarios where usuario='",usuario,"';");
    prepare stmt from @s;
    execute stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_publicacion` (IN `pub_id` INT)   BEGIN
	SET @s=concat("select P.pub_id, U.usuario, P.contenido, P.imagen 
                  from publicaciones P, usuarios U
                  where P.user_id = U.user_id and P.pub_id=",pub_id);
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_publicaciones` ()   BEGIN
	select P.pub_id, P.contenido, P.imagen, U.usuario
    from publicaciones P, usuarios U
    where P.user_id = U.user_id
    order by P.pub_id desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_publicaciones_publicas` ()   BEGIN
	select P.pub_id, P.contenido, P.imagen, U.usuario
    from publicaciones P, usuarios U
    where P.user_id = U.user_id AND P.tipo = 'publico'
    order by P.pub_id DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_publicaciones_usuario` (IN `usuario` VARCHAR(100))   BEGIN
	set @s=concat("select P.contenido, P.imagen
                  from publicaciones P, usuarios U
                  where P.user_id = U.user_id and U.usuario='",usuario,"'");
    PREPARE stmt from @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_usuarios` ()   BEGIN
	select usuario from usuarios;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_modificar_contrasena` (IN `id` INT, IN `pass` VARCHAR(100))   BEGIN
	set @s=concat("update usuarios set contrasena = '",pass,"' where user_id = ",id);
    PREPARE stmt from @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_modificar_usuario` (IN `id` INT, IN `nombre` VARCHAR(100), IN `apellido` VARCHAR(100), IN `email` VARCHAR(100))   BEGIN
	set @s=concat("update usuarios set 
                  nombre='",nombre,"',
                  apellido='",apellido,"',
                  email='",email,"' 
                  where user_id=",id);
    PREPARE stmt from @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_verificar_usuario` (IN `usuario` VARCHAR(50), IN `pass` VARCHAR(50))   BEGIN
	set @s=concat("select * from usuarios where usuario='",usuario,"' and contrasena='",pass,"';");
    prepare stmt from @s;
    execute stmt;
    DEALLOCATE PREPARE stmt;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `publi_id` int(10) UNSIGNED NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`user_id`, `publi_id`, `comentario`) VALUES
(23, 29, 'Saludos Luis, ten un buen dia.'),
(23, 28, 'Definitivamente es uno de sus mejores discos'),
(23, 33, 'Por aqui en San Miguelito esta lloviendo.'),
(22, 33, 'Gracias por avisarme Ru'),
(22, 34, 'Si estoy online, un gusto saludarte. Necesitas algo?'),
(23, 31, 'hoy es un buen dia para jugar'),
(24, 35, 'oh! Gorillaz'),
(24, 35, 'funcionara?'),
(24, 32, 'que buena estructura'),
(24, 35, 'es probable'),
(24, 34, 'Si no necesitas algo entonces me desconectare. Ten buen dia'),
(24, 34, 'Adios'),
(24, 34, 'Comentando desde aqui');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `pub_id` int(10) UNSIGNED NOT NULL,
  `contenido` text DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`pub_id`, `contenido`, `imagen`, `user_id`, `tipo`) VALUES
(28, 'Este es album de Interpol es excelente', 'Interpol_-_Turn_On_The_Bright_Lights.jpg', 22, 'publico'),
(29, 'Un saludo a todos mis familiares.', '', 22, 'privado'),
(30, 'Estoy teniendo un muy buen avance con mi proyecto final.', 'Captura de pantalla 2022-11-28 133122.png', 23, 'publico'),
(31, 'Alguien disponible para jugar warzone 2.0', '', 23, 'privado'),
(32, '', 'Captura de pantalla_20221121_063215.png', 23, 'publico'),
(33, 'Esta lloviendo hoy?', '', 22, 'privado'),
(34, 'Hola Luis, estas online?', '', 23, 'publico'),
(35, '', 'Captura de pantalla_20221118_054745.png', 23, 'publico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contrasena` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `nombre`, `apellido`, `usuario`, `email`, `contrasena`) VALUES
(22, 'Luis', 'Milla', 'Luis7km', 'luis.milla@utp.ac.pa', 'Lu1K7a6EzJn8I'),
(23, 'Ruperto', 'Howkings', 'RuHowk Ings', 'Ru123@gmail.com', 'Ru6frJqYEz5Wg'),
(24, 'Luis', 'Milla', 'LuisMilla', 'anthony.milla1997@gmail.com', 'Luq75xhnNAz02'),
(25, 'vhbre', 'erkhv', 'ekrvewkr', 'dvdvhb@kjdfbdkj.rbw', 'ekpxNNAv2b9cg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD KEY `fk_usuarios_comentarios` (`user_id`),
  ADD KEY `fk_publicaciones` (`publi_id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`pub_id`),
  ADD KEY `fk_usuarios` (`user_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `pub_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_publicaciones` FOREIGN KEY (`publi_id`) REFERENCES `publicaciones` (`pub_id`),
  ADD CONSTRAINT `fk_usuarios_comentarios` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`user_id`);

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `fk_usuarios` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
