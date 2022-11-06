-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2019 a las 19:54:03
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contactos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `telemovil` int(9) NOT NULL,
  `telefijo` int(9) NOT NULL,
  `teletrabajo` int(9) DEFAULT NULL,
  `emailprivado` varchar(30) NOT NULL,
  `emailtrabajo` varchar(30) DEFAULT NULL,
  `direccion` varchar(50) NOT NULL,
  `poblacion` varchar(30) NOT NULL,
  `codpostal` int(5) NOT NULL,
  `region` varchar(20) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `fechanac` date NOT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `apellidos`, `telemovil`, `telefijo`, `teletrabajo`, `emailprivado`, `emailtrabajo`, `direccion`, `poblacion`, `codpostal`, `region`, `pais`, `fechanac`, `foto`) VALUES
(1, 'Carlos David', 'Utrilla Mateo', 654321098, 97123456, 0, 'cdum@hotmail.com', 'carlos.utrillan@gmail.com', 'Pº Rosales', 'Zaragoza', 50008, 'Aragón', 'España', '1977-04-20', ''),
(2, 'pepe', 'papa', 6123, 9123, 0, 'cd@um.es', '', 'calle pepa', 'madrid', 123456, 'madrid', 'spain', '2019-06-02', ''),
(3, 'pepe', 'papa', 6123456, 9123456, 0, 'cd@um.77', '', 'calle pepa', 'madrid', 123456, 'madrid', 'spain', '2019-06-02', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
