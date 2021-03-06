-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2020 a las 23:13:47
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
(114, '114', 'garcia@quinte.com', 14);

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
  `direccion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `documento_convenio` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_estudiante`
--

CREATE TABLE `empresa_estudiante` (
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
  `materiasAprobadas` int(3) NOT NULL,
  `promedio` double NOT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaEgreso` date NOT NULL,
  `id_historial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`codigoEstudiante`, `contrasena`, `documento`, `egresado`, `correoInstitucional`, `semestreCursado`, `materiasAprobadas`, `promedio`, `fechaIngreso`, `fechaEgreso`, `id_historial`) VALUES
(1151654, 'AUU42AUL9DA', 1682022524, 0, 'gabrielarturogq@ufps.edu.co', '9', 40, 3.8, '2016-02-22', '2020-06-18', 114),
(1151687, 'KJH08AME7YV', 1093799851, 0, 'danielcaos@ufps.edu.co', '10', 30, 3.6, '2015-02-22', '2020-02-22', 113),
(1579977, 'CPB48LVQ7AQ', 1637021271, 0, 'ornare.In@ufps.edu.co', '12', 28, 2.9, '1900-01-05', '1900-01-20', 111),
(1621965, 'VRB16FXQ0CZ', 1627072999, 0, 'nunc@ufps.edu.co', '15', 27, 3, '1900-01-21', '1900-01-18', 109),
(1708278, 'BWE35XYO1ZO', 1685081889, 1, 'Suspendisse.aliquet@ufps.edu.co', '9', 15, 2, '1900-01-12', '0000-00-00', 100),
(2528059, 'MWU80CCB8AD', 1671052798, 0, 'nunc.sed@ufps.edu.co', '5', 22, 5, '1900-01-18', '1900-01-04', 97),
(2827305, 'YAU98EYL1HR', 1617061315, 1, 'convallis.erat@ufps.edu.co', '14', 27, 2, '1900-01-08', '0000-00-00', 108),
(3000542, 'TNT57NQN5HE', 1697112981, 1, 'nibh@ufps.edu.co', '3', 18, 3.7, '1900-01-20', '0000-00-00', 104),
(3537838, 'VPT11FGR1GL', 1639091715, 0, 'Aliquam.adipiscing.lobortis@ufps.edu.co', '14', 29, 3, '1900-01-27', '1900-01-02', 106),
(5694888, 'UMR86ZCZ6FQ', 1644091517, 1, 'et.risus.Quisque@ufps.edu.co', '4', 20, 5, '1900-01-24', '0000-00-00', 99),
(5934656, 'HWO82GQK4MP', 1676011930, 1, 'Integer.vitae@ufps.edu.co', '2', 22, 4, '1900-01-22', '0000-00-00', 107),
(6273738, 'ESA35ZYK2GN', 1687042392, 1, 'ipsum@ufps.edu.co', '2', 23, 3.5, '1900-01-18', '0000-00-00', 105),
(6525751, 'PCL66YYX4WI', 1616041104, 0, 'mi@ufps.edu.co', '15', 30, 3, '1900-01-31', '1900-01-13', 101),
(6546378, 'YJV54OMC1WU', 1692050897, 0, 'Aliquam.rutrum@ufps.edu.co', '8', 17, 4, '1900-01-01', '1900-01-12', 98),
(7659518, 'LGC13DCN1LJ', 1669112257, 1, 'Praesent.eu.nulla@ufps.edu.co', '8', 28, 3, '1900-01-19', '1900-01-06', 94),
(7777637, 'SBS99HQD0XQ', 1607022730, 0, 'non.egestas.a@ufps.edu.co', '14', 25, 4, '1900-01-22', '1900-01-26', 96),
(8482682, 'JYQ20NSU8CY', 1662012879, 0, 'bibendum.fermentum@ufps.edu.co', '9', 28, 3, '1900-01-26', '1900-01-13', 93),
(9039662, 'UUK18ZUR7LQ', 1601081299, 1, 'feugiat.metus@ufps.edu.co', '14', 22, 4, '1900-01-15', '1900-01-19', 110),
(9229367, 'ZOA05ZLN4QB', 1689121961, 1, 'est.ac.facilisis@ufps.edu.co', '8', 24, 2, '1900-01-27', '1900-01-28', 95),
(9356275, 'LRU15VES2QT', 1628101197, 0, 'nisi.Aenean@ufps.edu.co', '1', 30, 3.3, '1900-01-25', '1900-01-08', 112),
(9683011, 'NTE38YTR8IK', 1634100784, 0, 'justo@ufps.edu.co', '13', 26, 2, '1900-01-01', '1900-01-10', 103),
(9704369, 'AXU50FLE5CC', 1630030614, 0, 'ante.dictum.cursus@ufps.edu.co', '4', 28, 4.2, '1900-01-30', '1900-01-19', 102);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `titulo` varchar(75) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `responsable` varchar(50) NOT NULL,
  `ciudad` varchar(15) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `destinatario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id`, `titulo`, `direccion`, `fecha`, `hora`, `responsable`, `ciudad`, `descripcion`, `destinatario`) VALUES
(9, 'nuevo evento', 'calle 13', '2020-06-02', '02:02:00', 'yo', 'cucuta', 'sss', 'TODOS');

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
(86, 117, 3.5, '1', '1', 1111111),
(87, 1, 1, '1', '1', 555555),
(88, 12, 3.5, '1', '1', 1222),
(89, 22211, 22111, '1', '1', 1323),
(90, 14, 5.5, '9', '9', 14),
(91, 15, 6.5, '10', '10', 15),
(92, 16, 7.5, '11', '11', 16),
(93, 28, 3, '99748478199', '8459454699', 8482682),
(94, 28, 3, '63412261199', '69650174699', 7659518),
(95, 24, 2, '68486497699', '86213797599', 9229367),
(96, 25, 4, '14218275399', '4686879799', 7777637),
(97, 22, 5, '3647472399', '9638408799', 2528059),
(98, 17, 4, '2519437299', '66289135199', 6546378),
(99, 20, 5, '24542837799', '31681798199', 5694888),
(100, 15, 2, '11812459099', '83605151199', 1708278),
(101, 30, 3, '34695369099', '68325162199', 6525751),
(102, 28, 4.2, '66595375599', '90991132199', 9704369),
(103, 26, 2, '65912412399', '32842827299', 9683011),
(104, 18, 3.7, '94457876099', '38896183699', 3000542),
(105, 23, 3.5, '51860918999', '7548667499', 6273738),
(106, 29, 3, '42873711999', '7665319199', 3537838),
(107, 22, 4, '60694134599', '53506350099', 5934656),
(108, 27, 2, '89722377899', '98487190999', 2827305),
(109, 27, 3, '93533368799', '94926540799', 1621965),
(110, 22, 4, '88263160799', '44221900499', 9039662),
(111, 28, 2.9, '18954600199', '9244033799', 1579977),
(112, 30, 3.3, '79403974399', '56514665999', 9356275),
(113, 30, 3.6, '21802658199', '17644946699', 1151687),
(114, 40, 3.8, '36823586299', '29724389099', 1151654),
(116, 117, 3.5, '1313', '1212', 1111111),
(117, 1, 1, '1', '1', 555555),
(118, 12, 3.5, '1', '1', 12),
(119, 13, 4.5, '1', '1', 13),
(120, 14, 5.5, '9', '9', 14),
(121, 15, 6.5, '10', '10', 15),
(122, 16, 7.5, '11', '11', 16),
(124, 117, 3.5, '1313', '1212', 1111111),
(125, 1, 1, '1', '1', 555555),
(126, 12, 3.5, '7', '7', 12),
(127, 13, 4.5, '8', '8', 13),
(128, 14, 5.5, '9', '9', 14),
(129, 15, 6.5, '10', '10', 15),
(130, 16, 7.5, '11', '11', 16),
(131, 28, 3, '99748478199', '8459454699', 8482682),
(132, 28, 3, '63412261199', '69650174699', 7659518),
(133, 24, 2, '68486497699', '86213797599', 9229367),
(134, 25, 4, '14218275399', '4686879799', 7777637),
(135, 22, 5, '3647472399', '9638408799', 2528059),
(136, 17, 4, '2519437299', '66289135199', 6546378),
(137, 20, 5, '24542837799', '31681798199', 5694888),
(138, 15, 2, '11812459099', '83605151199', 1708278),
(139, 30, 3, '34695369099', '68325162199', 6525751),
(140, 28, 4.2, '66595375599', '90991132199', 9704369),
(141, 26, 2, '65912412399', '32842827299', 9683011),
(142, 18, 3.7, '94457876099', '38896183699', 3000542),
(143, 23, 3.5, '51860918999', '7548667499', 6273738),
(144, 29, 3, '42873711999', '7665319199', 3537838),
(145, 22, 4, '60694134599', '53506350099', 5934656),
(146, 27, 2, '89722377899', '98487190999', 2827305),
(147, 27, 3, '93533368799', '94926540799', 1621965),
(148, 22, 4, '88263160799', '44221900499', 9039662),
(149, 28, 2.9, '18954600199', '9244033799', 1579977),
(150, 30, 3.3, '79403974399', '56514665999', 9356275),
(151, 30, 3.6, '21802658199', '17644946699', 1151687),
(152, 40, 3.8, '36823586299', '29724389099', 1151656),
(153, 28, 3, '99748478199', '8459454699', 8482682),
(154, 28, 3, '63412261199', '69650174699', 7659518),
(155, 24, 2, '68486497699', '86213797599', 9229367),
(156, 25, 4, '14218275399', '4686879799', 7777637),
(157, 22, 5, '3647472399', '9638408799', 2528059),
(158, 17, 4, '2519437299', '66289135199', 6546378),
(159, 20, 5, '24542837799', '31681798199', 5694888),
(160, 15, 2, '11812459099', '83605151199', 1708278),
(161, 30, 3, '34695369099', '68325162199', 6525751),
(162, 28, 4.2, '66595375599', '90991132199', 9704369),
(163, 26, 2, '65912412399', '32842827299', 9683011),
(164, 18, 3.7, '94457876099', '38896183699', 3000542),
(165, 23, 3.5, '51860918999', '7548667499', 6273738),
(166, 29, 3, '42873711999', '7665319199', 3537838),
(167, 22, 4, '60694134599', '53506350099', 5934656),
(168, 27, 2, '89722377899', '98487190999', 2827305),
(169, 27, 3, '93533368799', '94926540799', 1621965),
(170, 22, 4, '88263160799', '44221900499', 9039662),
(171, 28, 2.9, '18954600199', '9244033799', 1579977),
(172, 30, 3.3, '79403974399', '56514665999', 9356275),
(173, 30, 3.6, '21802658199', '17644946699', 1151687),
(174, 40, 3.8, '36823586299', '29724389099', 1151656),
(175, 28, 3, '99748478199', '8459454699', 8482682),
(176, 28, 3, '63412261199', '69650174699', 7659518),
(177, 24, 2, '68486497699', '86213797599', 9229367),
(178, 25, 4, '14218275399', '4686879799', 7777637),
(179, 22, 5, '3647472399', '9638408799', 2528059),
(180, 17, 4, '2519437299', '66289135199', 6546378),
(181, 20, 5, '24542837799', '31681798199', 5694888),
(182, 15, 2, '11812459099', '83605151199', 1708278),
(183, 30, 3, '34695369099', '68325162199', 6525751),
(184, 28, 4.2, '66595375599', '90991132199', 9704369),
(185, 26, 2, '65912412399', '32842827299', 9683011),
(186, 18, 3.7, '94457876099', '38896183699', 3000542),
(187, 23, 3.5, '51860918999', '7548667499', 6273738),
(188, 29, 3, '42873711999', '7665319199', 3537838),
(189, 22, 4, '60694134599', '53506350099', 5934656),
(190, 27, 2, '89722377899', '98487190999', 2827305),
(191, 27, 3, '93533368799', '94926540799', 1621965),
(192, 22, 4, '88263160799', '44221900499', 9039662),
(193, 28, 2.9, '18954600199', '9244033799', 1579977),
(194, 30, 3.3, '79403974399', '56514665999', 9356275),
(195, 30, 3.6, '21802658199', '17644946699', 1151687),
(196, 40, 3.8, '36823586299', '29724389099', 1151656),
(197, 28, 3, '99748478199', '8459454699', 8482682),
(198, 28, 3, '63412261199', '69650174699', 7659518),
(199, 24, 2, '68486497699', '86213797599', 9229367),
(200, 25, 4, '14218275399', '4686879799', 7777637),
(201, 22, 5, '3647472399', '9638408799', 2528059),
(202, 17, 4, '2519437299', '66289135199', 6546378),
(203, 20, 5, '24542837799', '31681798199', 5694888),
(204, 15, 2, '11812459099', '83605151199', 1708278),
(205, 30, 3, '34695369099', '68325162199', 6525751),
(206, 28, 4.2, '66595375599', '90991132199', 9704369),
(207, 26, 2, '65912412399', '32842827299', 9683011),
(208, 18, 3.7, '94457876099', '38896183699', 3000542),
(209, 23, 3.5, '51860918999', '7548667499', 6273738),
(210, 29, 3, '42873711999', '7665319199', 3537838),
(211, 22, 4, '60694134599', '53506350099', 5934656),
(212, 27, 2, '89722377899', '98487190999', 2827305),
(213, 27, 3, '93533368799', '94926540799', 1621965),
(214, 22, 4, '88263160799', '44221900499', 9039662),
(215, 28, 2.9, '18954600199', '9244033799', 1579977),
(216, 30, 3.3, '79403974399', '56514665999', 9356275),
(217, 30, 3.6, '21802658199', '17644946699', 1151687),
(218, 40, 3.8, '36823586299', '29724389099', 1151656),
(219, 28, 3, '99748478199', '8459454699', 8482682),
(220, 28, 3, '63412261199', '69650174699', 7659518),
(221, 24, 2, '68486497699', '86213797599', 9229367),
(222, 25, 4, '14218275399', '4686879799', 7777637),
(223, 22, 5, '3647472399', '9638408799', 2528059),
(224, 17, 4, '2519437299', '66289135199', 6546378),
(225, 20, 5, '24542837799', '31681798199', 5694888),
(226, 15, 2, '11812459099', '83605151199', 1708278),
(227, 30, 3, '34695369099', '68325162199', 6525751),
(228, 28, 4.2, '66595375599', '90991132199', 9704369),
(229, 26, 2, '65912412399', '32842827299', 9683011),
(230, 18, 3.7, '94457876099', '38896183699', 3000542),
(231, 23, 3.5, '51860918999', '7548667499', 6273738),
(232, 29, 3, '42873711999', '7665319199', 3537838),
(233, 22, 4, '60694134599', '53506350099', 5934656),
(234, 27, 2, '89722377899', '98487190999', 2827305),
(235, 27, 3, '93533368799', '94926540799', 1621965),
(236, 22, 4, '88263160799', '44221900499', 9039662),
(237, 28, 2.9, '18954600199', '9244033799', 1579977),
(238, 30, 3.3, '79403974399', '56514665999', 9356275),
(239, 30, 3.6, '21802658199', '17644946699', 1151687),
(240, 40, 3.8, '36823586299', '29724389099', 1151656),
(241, 28, 3, '99748478199', '8459454699', 8482682),
(242, 28, 3, '63412261199', '69650174699', 7659518),
(243, 24, 2, '68486497699', '86213797599', 9229367),
(244, 25, 4, '14218275399', '4686879799', 7777637),
(245, 22, 5, '3647472399', '9638408799', 2528059),
(246, 17, 4, '2519437299', '66289135199', 6546378),
(247, 20, 5, '24542837799', '31681798199', 5694888),
(248, 15, 2, '11812459099', '83605151199', 1708278),
(249, 30, 3, '34695369099', '68325162199', 6525751),
(250, 28, 4.2, '66595375599', '90991132199', 9704369),
(251, 26, 2, '65912412399', '32842827299', 9683011),
(252, 18, 3.7, '94457876099', '38896183699', 3000542),
(253, 23, 3.5, '51860918999', '7548667499', 6273738),
(254, 29, 3, '42873711999', '7665319199', 3537838),
(255, 22, 4, '60694134599', '53506350099', 5934656),
(256, 27, 2, '89722377899', '98487190999', 2827305),
(257, 27, 3, '93533368799', '94926540799', 1621965),
(258, 22, 4, '88263160799', '44221900499', 9039662),
(259, 28, 2.9, '18954600199', '9244033799', 1579977),
(260, 30, 3.3, '79403974399', '56514665999', 9356275),
(261, 30, 3.6, '21802658199', '17644946699', 1151687),
(262, 40, 3.8, '36823586299', '29724389099', 1151656),
(263, 28, 3, '99748478199', '111', 8482682),
(264, 28, 3, '63412261199', '69650174699', 7659518),
(265, 24, 2, '68486497699', '86213797599', 9229367),
(266, 25, 4, '14218275399', '4686879799', 7777637),
(267, 22, 5, '3647472399', '9638408799', 2528059);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojavida`
--

CREATE TABLE `hojavida` (
  `archivo` varchar(100) NOT NULL,
  `codigoEstudiante` int(7) NOT NULL,
  `autorizar` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hojavida`
--

INSERT INTO `hojavida` (`archivo`, `codigoEstudiante`, `autorizar`) VALUES
('almacen/hojasDeVida/1151656.pdf', 1151654, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id` int(11) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `cuerpo` varchar(255) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `destinatario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `id` int(11) NOT NULL,
  `empleo` varchar(150) NOT NULL,
  `jornada` varchar(50) NOT NULL,
  `salario` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `requerimientos` varchar(300) NOT NULL,
  `nitEmpresa` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
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
(12, 'quinteroaa', 'aaaasss', '11', 'd', '10', 'CC', 'd'),
(13, 'gabriel2', 'garcia2', '13', '13', '13', 'CC', '13'),
(14, '14', '14', '14', '14', '14', 'CC', '14'),
(15, '15', '15', '15', '15', '15', 'CC', '15'),
(16, '16', '16', '16', '16', '16', 'CC', '16'),
(234234, 'xxxxx', 'xxxxx', '34523453', 'y@gmail.com', '23421', 'CC', 'dfsjovid'),
(777777, 'gabriel arturo', 'garcia quintero', '171717171', '17@gmail.com', '717171', 'CC', 'Aven 7 con 7'),
(1052253, 'Ivan', 'Uribe Ramirez', '313542825', 'ivan@gmail.com', '541525', 'CC', 'Av 12 E RG cols'),
(1004804515, 'gabriel ', 'garcia', '3241555415', 'garcia@gmail.com', '12122', 'CC', 'calle 232'),
(1093799851, 'Daniel', 'Calderon Ospinal', '3212769935', 'garc', '2034512', 'CC', 'calle 36'),
(1601081299, 'Evelyn', 'Nash', '2171141246', 'gravida.Praesent.eu@gmail.com', '8829506', 'CC', '283 Cras Road'),
(1607022730, 'Hayes', 'Crawford', '2667549591', 'lorem.vitae.odio@gmail.com', '4795741', 'CC', '8499 Non, Stree'),
(1616041104, 'Erich', 'Workman', '6252365102', 'Maecenas.iaculis@gmail.com', '2127498', 'CC', 'Ap #654-8198 Ri'),
(1617061315, 'Jesse', 'Marquez', '3512116668', 'tincidunt.adipiscing.Mauris@gmail.com', '4546246', 'CC', '844-6395 Hymena'),
(1627072999, 'Reuben', 'Gilbert', '3182283923', 'consectetuer.euismod.est@gmail.com', '4606665', 'CC', '965-1438 Nec, R'),
(1628101197, 'Zane', 'Mcdaniel', '3968590490', 'enim.Curabitur.massa@gmail.com', '3539265', 'CC', 'P.O. Box 436, 2'),
(1630030614, 'Jolene', 'Kaufman', '8196059596', 'in@gmail.com', '3988197', 'CC', '373-8402 Risus.'),
(1634100784, 'Tate', 'Steele', '9231783486', 'a.enim@gmail.com', '3349372', 'CC', '339-4387 Egesta'),
(1637021271, 'Wallace', 'Allen', '59', 'gabriel@hotmail.com', '3156505', 'CC', 'Ap'),
(1639091715, 'Cooper', 'Cohen', '9048629237', 'vitae.orci@gmail.com', '1025311', 'CC', '6406 A, St.'),
(1644091517, 'Colt', 'Spence', '2385837408', 'ligula.eu.enim@gmail.com', '2292884', 'CC', '838-8038 Mi. Av'),
(1662012879, 'Mannix', 'Saunders', '6603337554', 'dolor.nonummy@gmail.com', '8413495', 'CC', 'P.O. Box 349, 9'),
(1669112257, 'Abbot', 'Gill', '3931655651', 'non@gmail.com', '7857330', 'CC', '7895 Molestie R'),
(1671052798, 'Chancellor', 'Guerrero', '3654041778', 'semper.egestas@gmail.com', '7569275', 'CC', 'P.O. Box 740, 1'),
(1676011930, 'Kitra', 'Hayes', '8453737902', 'nulla.In@gmail.com', '4106996', 'CC', 'Ap #951-769 Viv'),
(1682022524, 'Gabriel', 'Garcia', '1111', 'garciaquinteroga@gmail.com', '1102506', 'CC', 'P.O. Box 842, 5'),
(1685081889, 'Kato', 'Morris', '8456224085', 'volutpat.Nulla.dignissim@gmail.com', '6255565', 'CC', 'P.O. Box 632, 7'),
(1687042392, 'Quemby', 'Finley', '2404324799', 'est@gmail.com', '7978122', 'CC', '495-345 Turpis.'),
(1689121961, 'Prescott', 'Hodges', '9627736149', 'aliquet.lobortis.nisi@gmail.com', '3009169', 'CC', 'Ap #693-839 Eni'),
(1692050897, 'Larissa', 'Burton', '1166516468', 'fermentum.arcu.Vestibulum@gmail.com', '9773174', 'CC', 'P.O. Box 296, 3'),
(1697112981, 'Walker', 'Santana', '3219879001', 'auctor.velit.Aliquam@gmail.com', '5556862', 'CC', '250-687 Condime');

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
('1', 1, 1, 1, 1, 1, ''),
('10', 10, 10, 10, 10, 10, ''),
('11', 11, 11, 11, 11, 11, ''),
('111', 87, 48, 88, 89, 23, ''),
('1212', 70, 70, 70, 70, 70, ''),
('17644946699', 80, 83, 85, 82, 75, ''),
('29724389099', 1, 69, 30, 85, 23, ''),
('31681798199', 45, 10, 100, 6, 60, ''),
('32842827299', 86, 82, 84, 6, 10, ''),
('38896183699', 78, 87, 44, 6, 20, ''),
('44221900499', 49, 100, 48, 48, 22, ''),
('4686879799', 89, 63, 62, 42, 93, ''),
('53506350099', 80, 75, 67, 100, 60, ''),
('56514665999', 84, 93, 43, 7, 5, ''),
('66289135199', 45, 35, 37, 98, 52, ''),
('68325162199', 41, 84, 7, 48, 78, ''),
('69650174699', 79, 77, 55, 85, 78, ''),
('7', 7, 7, 7, 7, 7, ''),
('7548667499', 19, 47, 89, 96, 11, ''),
('7665319199', 29, 66, 14, 44, 3, ''),
('8', 8, 8, 8, 8, 8, ''),
('83605151199', 20, 34, 37, 5, 53, ''),
('8459454699', 87, 48, 88, 89, 23, ''),
('86213797599', 85, 34, 9, 26, 21, ''),
('9', 9, 9, 9, 9, 9, ''),
('90991132199', 52, 98, 59, 12, 21, ''),
('9244033799', 69, 2, 88, 50, 73, ''),
('94926540799', 59, 53, 42, 27, 47, ''),
('9638408799', 45, 29, 77, 83, 49, ''),
('98487190999', 80, 78, 38, 95, 42, '');

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
('1', 1, 1, 11, 1, 11, ''),
('10', 10, 10, 10, 10, 10, ''),
('11', 11, 11, 11, 11, 11, ''),
('11812459099', 90, 20, 51, 19, 90, ''),
('1313', 61, 61, 61, 61, 71, ''),
('14218275399', 49, 30, 63, 48, 32, ''),
('18954600199', 28, 74, 57, 37, 26, ''),
('21802658199', 65, 75, 70, 63, 60, ''),
('24542837799', 10, 17, 17, 86, 31, ''),
('2519437299', 63, 46, 10, 87, 70, ''),
('34695369099', 11, 81, 33, 73, 88, ''),
('3647472399', 53, 3, 3, 31, 87, ''),
('36823586299', 8, 65, 82, 45, 40, ''),
('42873711999', 11, 37, 55, 84, 14, ''),
('51860918999', 29, 48, 56, 70, 15, ''),
('60694134599', 31, 13, 34, 51, 56, ''),
('63412261199', 22, 47, 4, 99, 52, ''),
('65912412399', 53, 3, 16, 65, 77, ''),
('66595375599', 67, 45, 57, 72, 48, ''),
('68486497699', 51, 28, 40, 80, 23, ''),
('7', 7, 7, 7, 7, 7, ''),
('79403974399', 99, 61, 28, 9, 22, ''),
('8', 8, 8, 8, 8, 8, ''),
('88263160799', 32, 45, 28, 34, 23, ''),
('89722377899', 46, 92, 57, 15, 56, ''),
('9', 9, 9, 9, 9, 9, ''),
('93533368799', 51, 36, 2, 79, 9, ''),
('94457876099', 29, 51, 27, 65, 13, ''),
('99748478199', 63, 94, 25, 76, 1, ''),
('FGSIANS', 60, 60, 60, 60, 70, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesis`
--

CREATE TABLE `tesis` (
  `archivo` varchar(100) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tesis`
--

INSERT INTO `tesis` (`archivo`, `titulo`, `id`) VALUES
('almacen/tesis/87Realidad.pdf', 'primera tesis', 86),
('almacen/tesis/8672427020-Problemas-Rsueltos-PL.pdf', 'segunda tesis', 87),
('almacen/tesis/8872427020-Problemas-Rsueltos-PL.pdf', 'tercera tesis', 88),
('almacen/tesis/89Rv_limitaciones.pdf', 'cuarta tesis', 89),
('almacen/tesis/90pau-programacion.pdf', 'quinta tesis', 90),
('almacen/tesis/91articulo_revision_ejemplo.pdf', 'Calidad y servicio den infra estructura de las man', 91);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesis_estudiante`
--

CREATE TABLE `tesis_estudiante` (
  `fecha_asignacion` date NOT NULL,
  `codigoEstudiante` int(11) NOT NULL,
  `id_tesis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tesis_estudiante`
--

INSERT INTO `tesis_estudiante` (`fecha_asignacion`, `codigoEstudiante`, `id_tesis`) VALUES
('2021-06-20', 1151654, 86),
('2021-06-20', 1151687, 87),
('2021-06-20', 1579977, 88),
('2021-06-20', 1708278, 89),
('2021-06-20', 2528059, 90),
('2010-07-20', 9683011, 91),
('2010-07-20', 9704369, 91);

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
  ADD PRIMARY KEY (`codigoEstudiante`,`empresaNit`) USING BTREE,
  ADD KEY `ksdcij` (`empresaNit`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`codigoEstudiante`),
  ADD KEY `id_historial` (`id_historial`),
  ADD KEY `documento` (`documento`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_1` (`nitEmpresa`);

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tesis`
--
ALTER TABLE `tesis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

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
  ADD CONSTRAINT `empresa_estudiante_ibfk_2` FOREIGN KEY (`empresaNit`) REFERENCES `empresas` (`nitEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`id_historial`) REFERENCES `historial` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Filtros para la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`nitEmpresa`) REFERENCES `empresas` (`nitEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tesis_estudiante`
--
ALTER TABLE `tesis_estudiante`
  ADD CONSTRAINT `tesis_estudiante_ibfk_1` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoEstudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tesis_estudiante_ibfk_2` FOREIGN KEY (`id_tesis`) REFERENCES `tesis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
