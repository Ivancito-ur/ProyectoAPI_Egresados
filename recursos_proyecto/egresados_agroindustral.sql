-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2020 a las 23:21:44
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `egresados_agroindustral`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `codigoDirector` int(7) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `correoInstitucional` varchar(100) NOT NULL,
  `documento` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `nitEmpresa` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `celular` int(13) NOT NULL,
  `direccion` int(25) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_estudiante`
--

CREATE TABLE `empresa_estudiante` (
  `id` int(11) NOT NULL,
  `codigoEstudiante` int(7) NOT NULL,
  `fecha_registro` date NOT NULL,
  `empresaNit` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `codigoEstudiante` int(7) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `documento` int(20) NOT NULL,
  `egresado` tinyint(1) NOT NULL,
  `correoInstitucional` varchar(100) NOT NULL,
  `semestreCursado` varchar(10) NOT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaEgreso` date NOT NULL,
  `id_historial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`codigoEstudiante`, `contrasena`, `documento`, `egresado`, `correoInstitucional`, `semestreCursado`, `fechaIngreso`, `fechaEgreso`, `id_historial`) VALUES
(1151612, '1254818', 1052253, 0, 'ivan@ufps.edu.co', '9', '2015-01-01', '2006-04-02', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `materiasAprobadas` int(3) NOT NULL,
  `promedio` double NOT NULL,
  `idSaberPro` varchar(100) NOT NULL,
  `idSaber11` varchar(100) NOT NULL,
  `codigoEstudiante` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `materiasAprobadas`, `promedio`, `idSaberPro`, `idSaber11`, `codigoEstudiante`) VALUES
(1, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojavida`
--

CREATE TABLE `hojavida` (
  `archivo` varchar(100) NOT NULL,
  `codigoEstudiante` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertalaboral`
--

CREATE TABLE `ofertalaboral` (
  `idOferta` varchar(200) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `sueldo` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fechaNotificacion` date NOT NULL,
  `fechaAceptacion` date NOT NULL,
  `nitEmpresa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `documento` int(20) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(7) NOT NULL,
  `tipo_documento` varchar(15) NOT NULL,
  `direccion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`documento`, `nombres`, `apellidos`, `celular`, `correo`, `telefono`, `tipo_documento`, `direccion`) VALUES
(1052253, 'Ivan', 'Uribe Ramirez', '313542825', 'ivan@gmail.com', '541525', 'CC', 'Av 12 E RG cols');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebassaber11`
--

CREATE TABLE `pruebassaber11` (
  `idSaber11` varchar(100) NOT NULL,
  `lectura_critica` int(3) NOT NULL,
  `matematica` int(3) NOT NULL,
  `sociales_ciudadanas` int(3) NOT NULL,
  `naturales` int(3) NOT NULL,
  `ingles` int(3) NOT NULL,
  `archivo_url` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pruebassaber11`
--

INSERT INTO `pruebassaber11` (`idSaber11`, `lectura_critica`, `matematica`, `sociales_ciudadanas`, `naturales`, `ingles`, `archivo_url`) VALUES
('ACDNAIS15', 70, 70, 70, 70, 70, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebassaberpro`
--

CREATE TABLE `pruebassaberpro` (
  `idSaberPro` varchar(100) NOT NULL,
  `lectura_critica` int(3) NOT NULL,
  `razonamiento_cuantitativo` int(3) NOT NULL,
  `competencias_ciudadana` int(3) NOT NULL,
  `comunicacion_escrita` int(3) NOT NULL,
  `ingles` int(3) NOT NULL,
  `archivo_url` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pruebassaberpro`
--

INSERT INTO `pruebassaberpro` (`idSaberPro`, `lectura_critica`, `razonamiento_cuantitativo`, `competencias_ciudadana`, `comunicacion_escrita`, `ingles`, `archivo_url`) VALUES
('FGSIANS', 60, 60, 60, 60, 70, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesis`
--

CREATE TABLE `tesis` (
  `archivo` varchar(100) NOT NULL,
  `codigoEstudiante` int(7) NOT NULL,
  `titulo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`codigoDirector`),
  ADD KEY `documento` (`documento`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`nitEmpresa`);

--
-- Indices de la tabla `empresa_estudiante`
--
ALTER TABLE `empresa_estudiante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigoEstudiante` (`codigoEstudiante`),
  ADD KEY `ksdcij` (`empresaNit`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`codigoEstudiante`),
  ADD KEY `id_historial` (`id_historial`),
  ADD KEY `documento` (`documento`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSaberPro` (`idSaberPro`),
  ADD KEY `idSaber11` (`idSaber11`);

--
-- Indices de la tabla `hojavida`
--
ALTER TABLE `hojavida`
  ADD PRIMARY KEY (`codigoEstudiante`),
  ADD KEY `codigoEstudiante` (`codigoEstudiante`);

--
-- Indices de la tabla `ofertalaboral`
--
ALTER TABLE `ofertalaboral`
  ADD PRIMARY KEY (`idOferta`),
  ADD KEY `nitEmpresa` (`nitEmpresa`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`documento`);

--
-- Indices de la tabla `pruebassaber11`
--
ALTER TABLE `pruebassaber11`
  ADD PRIMARY KEY (`idSaber11`);

--
-- Indices de la tabla `pruebassaberpro`
--
ALTER TABLE `pruebassaberpro`
  ADD PRIMARY KEY (`idSaberPro`);

--
-- Indices de la tabla `tesis`
--
ALTER TABLE `tesis`
  ADD PRIMARY KEY (`codigoEstudiante`),
  ADD KEY `codigoEstudiante` (`codigoEstudiante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `director_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `persona` (`documento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa_estudiante`
--
ALTER TABLE `empresa_estudiante`
  ADD CONSTRAINT `empresa_estudiante_ibfk_1` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoEstudiante`),
  ADD CONSTRAINT `empresa_estudiante_ibfk_2` FOREIGN KEY (`empresaNit`) REFERENCES `empresas` (`nitEmpresa`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`id_historial`) REFERENCES `historial` (`id`),
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`documento`) REFERENCES `persona` (`documento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `idSaber11` FOREIGN KEY (`idSaber11`) REFERENCES `pruebassaber11` (`idSaber11`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idSaberPro` FOREIGN KEY (`idSaberPro`) REFERENCES `pruebassaberpro` (`idSaberPro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hojavida`
--
ALTER TABLE `hojavida`
  ADD CONSTRAINT `hojavida_ibfk_1` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoEstudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ofertalaboral`
--
ALTER TABLE `ofertalaboral`
  ADD CONSTRAINT `nitEmpresa` FOREIGN KEY (`nitEmpresa`) REFERENCES `empresa` (`nitEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tesis`
--
ALTER TABLE `tesis`
  ADD CONSTRAINT `tesis_ibfk_1` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoEstudiante`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
