-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2022 a las 05:42:28
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultorio_ug`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_pacient`
--

CREATE TABLE `datos_pacient` (
  `id` int(11) NOT NULL,
  `name_pac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido_pac` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `corre_pac` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular_pac` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `preg_pac` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `opinion_pac` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion_pac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `inventariable` tinyint(4) NOT NULL,
  `stock` int(11) NOT NULL,
  `fabricacion` int(11) NOT NULL,
  `caducidad` int(11) NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id`, `codigo`, `descripcion`, `inventariable`, `stock`, `fabricacion`, `caducidad`, `activo`) VALUES
(2, 'OINQDNCOIC', 'Umbral', 1, 45, 2017, 2021, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `cedula` varchar(10) DEFAULT NULL,
  `nombres` varchar(64) DEFAULT NULL,
  `apellidos` varchar(64) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `genero` varchar(14) DEFAULT NULL,
  `estado_civil` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `cedula`, `nombres`, `apellidos`, `celular`, `genero`, `estado_civil`) VALUES
(1, '0927587006', 'Douglas', 'Gallardo', '0989997750', 'Masculino', 'Soltero');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_pacient`
--
ALTER TABLE `datos_pacient`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_pacient`
--
ALTER TABLE `datos_pacient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
