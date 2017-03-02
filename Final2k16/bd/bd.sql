-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2016 a las 01:07:05
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_abm`
--

CREATE TABLE `tabla_abm` (
  `primary_key` int(6) NOT NULL,
  `atributo1` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `atributo2` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `atributo3` varchar(25) CHARACTER SET utf32 COLLATE utf32_spanish2_ci NOT NULL,
  `atributon` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tabla_abm`
--

INSERT INTO `tabla_abm` (`primary_key`, `atributo1`, `atributo2`, `atributo3`, `atributon`) VALUES
(12, 'Dato 1', '1234', 'opcion1', '23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(6) NOT NULL,
  `email` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `perfil` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `clave`, `perfil`) VALUES
(1, 'comp@comp.com', '1234', 'comprador'),
(2, 'vend@vend.com', '1234', 'vendedor'),
(3, 'admin@admin.com', '1234', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla_abm`
--
ALTER TABLE `tabla_abm`
  ADD PRIMARY KEY (`primary_key`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla_abm`
--
ALTER TABLE `tabla_abm`
  MODIFY `primary_key` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
