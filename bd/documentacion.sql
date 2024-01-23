-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2023 a las 20:37:28
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `documentacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cv`
--

CREATE TABLE `cv` (
  `id` int(11) NOT NULL,
  `num_trabajador` int(11) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `resumen` text DEFAULT NULL,
  `experiencia` text DEFAULT NULL,
  `educacion` text DEFAULT NULL,
  `habilidades` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cv`
--

INSERT INTO `cv` (`id`, `num_trabajador`, `direccion`, `resumen`, `experiencia`, `educacion`, `habilidades`) VALUES
(16, 3002, 'fefe', 'fefef', ' fefef', 'fefef', 'fefef');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_trabajador`
--

CREATE TABLE `datos_trabajador` (
  `num_trabajador` int(11) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `ap_paterno` varchar(50) NOT NULL,
  `ap_materno` varchar(50) NOT NULL,
  `edad` varchar(10) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `ine` varchar(50) DEFAULT NULL,
  `curp` varchar(200) DEFAULT NULL,
  `constancia_fiscal` varchar(50) DEFAULT NULL,
  `nss` varchar(50) DEFAULT NULL,
  `acta_nacimiento` varchar(50) DEFAULT NULL,
  `comprobante_domicilio` varchar(50) DEFAULT NULL,
  `certificado_medico` varchar(50) DEFAULT NULL,
  `solicitud_empleo` varchar(50) DEFAULT NULL,
  `certificado` varchar(50) DEFAULT NULL,
  `carta_no_penales` varchar(255) DEFAULT NULL,
  `carta_recomendacion` varchar(255) DEFAULT NULL,
  `reconocimiento` varchar(255) DEFAULT NULL,
  `curso` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_trabajador`
--

INSERT INTO `datos_trabajador` (`num_trabajador`, `sexo`, `nombre`, `ap_paterno`, `ap_materno`, `edad`, `telefono`, `ine`, `curp`, `constancia_fiscal`, `nss`, `acta_nacimiento`, `comprobante_domicilio`, `certificado_medico`, `solicitud_empleo`, `certificado`, `carta_no_penales`, `carta_recomendacion`, `reconocimiento`, `curso`) VALUES
(3001, 'hombre', 'Alfonso', 'Zapata', 'Pérez ', '21', '4981010919', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3002, 'hombre', 'Daniel', 'Cardoza', 'González', '22', '4981000607', 'empleados/3002/ine.pdf', 'empleados/3002/curp.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `usuario`, `password`) VALUES
(2, 'Alfonso', 'Zapata', 'alfonso01', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(3, 'Daniel', 'Cardoza', 'danielbs', '8cb2237d0679ca88db6464eac60da96345513964');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_num_trabajador` (`num_trabajador`);

--
-- Indices de la tabla `datos_trabajador`
--
ALTER TABLE `datos_trabajador`
  ADD PRIMARY KEY (`num_trabajador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
