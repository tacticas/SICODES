-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2017 a las 18:06:51
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eminus2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apPaterno` varchar(20) DEFAULT NULL,
  `apMaterno` varchar(20) DEFAULT NULL,
  `eMail` varchar(50) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `idEscuela` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `matricula`, `nombre`, `apPaterno`, `apMaterno`, `eMail`, `telefono`, `contrasena`, `idEscuela`) VALUES
(1, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(2, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(3, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(4, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(5, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(6, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(7, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(8, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(9, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(10, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(11, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(12, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(13, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(14, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(15, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(16, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(17, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(18, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(19, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(20, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(21, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(22, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(23, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(24, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(25, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(26, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1),
(27, 'S14013636', 'Nombre', 'Apellido', 'Apellido', 'correo@mail.com', '2288575757', 'password', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
