-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2022 a las 05:48:14
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
CREATE DATABASE IF NOT EXISTS `consultorio_ug` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `consultorio_ug`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `cat_id` int(11) NOT NULL,
  `cat_nombre` varchar(30) NOT NULL,
  `cat_descripcion` varchar(100) NOT NULL,
  `cat_estado` int(1) NOT NULL,
  `cat_usuarioActualizacion` varchar(12) NOT NULL,
  `cat_fechaActualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cat_id`, `cat_nombre`, `cat_descripcion`, `cat_estado`, `cat_usuarioActualizacion`, `cat_fechaActualizacion`) VALUES
(1, 'Venta Libre', 'Este tipo de medicamento se vende libremente', 1, '', '2021-03-19 15:50:44'),
(2, 'Con Receta Médica', 'Venta solo con supervisión de un Doctor', 1, '', '2021-03-19 15:55:58');

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

--
-- Volcado de datos para la tabla `datos_pacient`
--

INSERT INTO `datos_pacient` (`id`, `name_pac`, `apellido_pac`, `corre_pac`, `celular_pac`, `preg_pac`, `opinion_pac`, `direccion_pac`) VALUES
(42, 'Pepe', 'Suarez', 'sadad', '54564654', NULL, 'sdasd', 'dasda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `med_id` int(11) NOT NULL,
  `med_codigo` varchar(10) NOT NULL,
  `med_nombre` varchar(50) NOT NULL,
  `med_descripcion` varchar(200) NOT NULL,
  `med_estado` int(11) NOT NULL,
  `med_precio` int(11) NOT NULL,
  `med_idCategoria` int(11) NOT NULL,
  `med_usuarioActualizacion` varchar(12) NOT NULL,
  `med_fechaActualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`med_id`, `med_codigo`, `med_nombre`, `med_descripcion`, `med_estado`, `med_precio`, `med_idCategoria`, `med_usuarioActualizacion`, `med_fechaActualizacion`) VALUES
(1, '154POOP', 'PARACETAMOL', 'Tableta de 8 cápsulas', 1, 1, 1, 'usuario', '2021-03-19 20:15:21'),
(2, '123', 'Aspirina', 'Es aspirina', 0, 1, 1, 'usuario', '2022-03-20 05:08:28'),
(3, '123', 'Aspirina', '                    Es una aspirina', 1, 5, 1, 'usuario', '2022-03-20 05:08:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `cedula` varchar(10) DEFAULT NULL,
  `nombres` varchar(64) DEFAULT NULL,
  `apellidos` varchar(64) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `genero` varchar(14) DEFAULT NULL,
  `especialidad` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '0927587006', 'Douglas Javier', 'Gallardo', '0989997750', 'Masculino', 'Soltero'),
(5, '099988888', 'Carla', 'Gallardo', '0878878787', 'Femenino', 'Casado');

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
  ADD PRIMARY KEY (`med_id`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
