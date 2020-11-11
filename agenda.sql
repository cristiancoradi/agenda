-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2020 a las 23:41:07
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `idContacto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`idContacto`, `nombre`, `email`, `telefono`) VALUES
(1, 'Cristian Coradi', 'Coradicristian214@gmail.com', '0800999999913'),
(2, 'Juan Gomez', 'juangomez_1871@gmail.com', '0800999329912'),
(3, 'Emanuel Centurion', 'ema_centurion2000@gmail.com', '4729991732135'),
(4, 'Jose arrigoni', 'arrigonijose666@gmail.com', '0800682581231'),
(5, 'javier manzur', 'javi_manzur1970@gmail.com', '3416453483721'),
(6, 'Guadalupe Rolon', 'guadalupe_rolon2001@gmail.com', '8348791235766'),
(7, 'lucas federer', 'federer_lucas1987@hotmail.es', '4729127452135');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes`
--

CREATE TABLE `redes` (
  `idRed` int(11) NOT NULL,
  `nombreRed` text NOT NULL,
  `enlaceRed` text NOT NULL,
  `idContacto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `redes`
--

INSERT INTO `redes` (`idRed`, `nombreRed`, `enlaceRed`, `idContacto`) VALUES
(1, 'Instagram', 'https://www.instagram.com/crisstian_20/', 1),
(2, 'Facebook', 'https://www.facebook.com/cristian.coradi.20/', 1),
(3, 'Instagram', 'https://www.instagram.com/guadalupe_2354/\r\n', 6),
(4, 'Facebook', 'https://www.facebook.com/guadalupe.rolon.23/\r\n', 6),
(5, 'Facebook', 'https://www.facebook.com/jose.arrigoni.14/\r\n', 4),
(6, 'Facebook', 'https://www.facebook.com/juan.gomez.358/\r\n', 2),
(7, 'Facebook', 'https://www.facebook.com/javi.manzur/\r\n', 5),
(8, 'Facebook', 'https://www.facebook.com/ema.centurion.12/\r\n', 3),
(9, 'Instagram', 'https://www.instagram.com/juse_7298/', 4),
(10, 'Instagram', 'https://www.instagram.com/javimanzur_7313/', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`idContacto`);

--
-- Indices de la tabla `redes`
--
ALTER TABLE `redes`
  ADD PRIMARY KEY (`idRed`),
  ADD KEY `idContacto` (`idContacto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `idContacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `redes`
--
ALTER TABLE `redes`
  MODIFY `idRed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `redes`
--
ALTER TABLE `redes`
  ADD CONSTRAINT `RedesContactos` FOREIGN KEY (`idContacto`) REFERENCES `contactos` (`idContacto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
