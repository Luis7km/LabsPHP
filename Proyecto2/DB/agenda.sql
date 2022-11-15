-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2022 a las 10:30:20
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_actividades` (IN `llave` SMALLINT(5), IN `titulo` VARCHAR(100), IN `fecha` VARCHAR(100), IN `hora` VARCHAR(100), IN `ubicacion` TEXT, IN `correo` VARCHAR(100), IN `repeticion` VARCHAR(100), IN `tipo` VARCHAR(100))   BEGIN
	set @s = concat("update recordatorio set titulo='",titulo,"',fecha='",fecha,"',hora='",hora,"',ubicacion='",ubicacion,"',correo='",correo,"',repeticion='",repeticion,"',tipo='",tipo,"' where id=",llave,";");
    
    prepare stmt from @s;
    execute stmt;
    DEALLOCATE prepare stmt;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_actividad` (IN `llave` SMALLINT(5))   BEGIN
	set @s = concat("delete from recordatorio where id=",llave,";");
    
    prepare stmt from @s;
    execute stmt;
    DEALLOCATE prepare stmt;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_actividad` (IN `titulo` VARCHAR(100), IN `fecha` VARCHAR(100), IN `hora` VARCHAR(100), IN `ubicacion` TEXT, IN `correo` VARCHAR(100), IN `repeticion` VARCHAR(100), IN `tipo` VARCHAR(100))   BEGIN
	set @s= CONCAT("insert into recordatorio (titulo, fecha, hora, ubicacion, correo, repeticion, tipo) values ('",titulo,"','",fecha,"','",hora,"','",ubicacion,"','",correo,"','",repeticion,"','",tipo,"');");
    prepare stmt from @s;
    execute stmt;
    deallocate PREPARE stmt;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_actividad` (IN `id` SMALLINT(5))   begin
	set @s = concat("select id, titulo, fecha, hora, ubicacion, correo, repeticion, tipo from recordatorio where id='",id,"';");
    prepare stmt from @s;
    execute stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_actividades` ()   begin
	select id, titulo, fecha, hora, left(ubicacion, 15) as ubicacion, correo, repeticion, tipo from recordatorio;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_actividades_hoy` ()   BEGIN
	select id, titulo, fecha, hora, left(ubicacion, 15) as ubicacion, correo, repeticion, tipo from recordatorio where fecha = CURDATE();
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recordatorio`
--

CREATE TABLE `recordatorio` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ubicacion` text NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `repeticion` varchar(100) DEFAULT NULL,
  `tipo` enum('Deporte','Estudio','Trabajo','Fiesta','Reunion','Viaje','Super Mercado') NOT NULL DEFAULT 'Deporte'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recordatorio`
--

INSERT INTO `recordatorio` (`id`, `titulo`, `fecha`, `hora`, `ubicacion`, `correo`, `repeticion`, `tipo`) VALUES
(1, 'Jugar futbol', '2022-10-19', '19:00:10', 'En la cancha de la cinta costera', '123luis@correo.com', 'todo el diaa', 'Deporte'),
(10, 'Terminar el proyecto de DES7', '2022-10-19', '17:00:00', 'Universidad Tecnologica de Pnama', '123luis@correo.com', 'todo el dia', 'Estudio'),
(11, 'Torneo de Rocket League', '2022-10-19', '17:00:00', 'En mi casa, con la PC Gamer', '123luis@correo.com', '20 minutos', 'Deporte'),
(12, 'Semestral de DES 7', '2022-12-02', '17:50:10', 'Universidad Tecnologica de Panama', 'luis.milla@utp.ac.pa', '30 minutos', 'Estudio'),
(13, 'Escapar de Latam', '2022-12-31', '00:00:00', 'Barco pesquero en la cinta costera', 'luis.milla@utp.ac.pa', '10 minutos', 'Viaje');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `recordatorio`
--
ALTER TABLE `recordatorio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `recordatorio`
--
ALTER TABLE `recordatorio`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
