-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2020 a las 05:34:46
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `egresados_agroindustrial`
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

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`codigoDirector`, `contrasena`, `correoInstitucional`, `documento`) VALUES
(114, '114', '114', 114);

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
(1111111, '1111111', 777777, 0, '17@ufps.edu.co', '8', '2000-05-05', '2000-05-05', 4),
(1151612, '1254818', 1052253, 0, 'ivan@ufps.edu.co', '9', '2015-01-01', '2006-01-09', 1);

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
(1, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(3, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(4, 117, 3.5, '1313', '1212', 1111111),
(5, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(6, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(7, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(8, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(9, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(10, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(11, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(12, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(13, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(14, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(15, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(16, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(17, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(18, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(19, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(20, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(21, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(22, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(23, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(24, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(25, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(26, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(27, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(28, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(29, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(30, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(31, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(32, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(33, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(34, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(35, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(36, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(37, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(38, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(39, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(40, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(41, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(42, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(43, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(44, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(45, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(46, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(47, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(48, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(49, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(50, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(51, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(52, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(53, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(54, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(55, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(56, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(57, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(58, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(59, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(60, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612),
(61, 50, 3.47, 'FGSIANS', 'ACDNAIS15', 1151612);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojavida`
--

CREATE TABLE `hojavida` (
  `archivo` varchar(100) NOT NULL,
  `codigoEstudiante` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hojavida`
--

INSERT INTO `hojavida` (`archivo`, `codigoEstudiante`) VALUES
('almacen/hojasDeVida/1111111.pdf', 1111111),
('almacen/hojasDeVida/1151612.pdf', 1151612);

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
(114, '114', '114', '114', 'ha@com', '314', '114', 'hola@com'),
(777777, 'Siete', 'Numero', '171717171', 'ha@com', '314', 'CC', 'hola@com'),
(1052253, 'Ivan', 'Uribe Ramirez', '313542825', 'ha@com', '314', 'CC', 'hola@com');

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
('1212', 70, 70, 70, 70, 70, ''),
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
('1313', 61, 61, 61, 61, 71, ''),
('FGSIANS', 60, 60, 60, 60, 70, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesis`
--

CREATE TABLE `tesis` (
  `archivo` varchar(100) NOT NULL,
  `id_estudiante_tesis` int(7) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tesis`
--

INSERT INTO `tesis` (`archivo`, `id_estudiante_tesis`, `titulo`, `id`) VALUES
('xvideos.com/178123', 1151612, 'qwer', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesis_estudiante`
--

CREATE TABLE `tesis_estudiante` (
  `id` int(11) NOT NULL,
  `codigoEstudiante` int(11) NOT NULL,
  `id_tesis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tesis_estudiante`
--

INSERT INTO `tesis_estudiante` (`id`, `codigoEstudiante`, `id_tesis`) VALUES
(2, 1111111, 1),
(1, 1151612, 1);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigoEstudiante` (`id_estudiante_tesis`);

--
-- Indices de la tabla `tesis_estudiante`
--
ALTER TABLE `tesis_estudiante`
  ADD PRIMARY KEY (`codigoEstudiante`),
  ADD KEY `codigoEstudiante` (`codigoEstudiante`),
  ADD KEY `id_tesis` (`id_tesis`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `tesis`
--
ALTER TABLE `tesis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Filtros para la tabla `tesis_estudiante`
--
ALTER TABLE `tesis_estudiante`
  ADD CONSTRAINT `tesis_estudiante_ibfk_1` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoEstudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tesis_estudiante_ibfk_2` FOREIGN KEY (`id_tesis`) REFERENCES `tesis` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
