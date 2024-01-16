-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2024 a las 15:31:48
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
-- Base de datos: `calculo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_corriente`
--

CREATE TABLE `consumo_corriente` (
  `consumo_maximo` varchar(20) DEFAULT NULL,
  `consumo_maximo_fase` varchar(20) DEFAULT NULL,
  `consumo_promedio_trifasico` varchar(20) DEFAULT NULL,
  `corriente_promedio_fase` varchar(20) DEFAULT NULL,
  `consumo_maximo_est` varchar(20) DEFAULT NULL,
  `corriente_maxima_fase` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `general`
--

CREATE TABLE `general` (
  `peso_pantalla` varchar(20) DEFAULT NULL,
  `modulos` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_pantalla`
--

CREATE TABLE `info_pantalla` (
  `id` int(11) NOT NULL,
  `tamano_horizontal` int(11) DEFAULT NULL,
  `tamano_vertical` int(11) DEFAULT NULL,
  `voltaje_de_acometida` int(11) DEFAULT NULL,
  `pixel_pitch` int(11) DEFAULT NULL,
  `voltaje_de_operacion` int(11) DEFAULT NULL,
  `brillo` int(11) DEFAULT NULL,
  `area_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `info_pantalla`
--

INSERT INTO `info_pantalla` (`id`, `tamano_horizontal`, `tamano_vertical`, `voltaje_de_acometida`, `pixel_pitch`, `voltaje_de_operacion`, `brillo`, `area_total`) VALUES
(1, 5, 2, 220, NULL, NULL, NULL, 10),
(2, 5, 3, 120, NULL, NULL, NULL, 15),
(3, 5, 3, 120, NULL, NULL, NULL, 15),
(4, 5, 3, 120, NULL, NULL, NULL, 15),
(5, 5, 3, 120, NULL, NULL, NULL, 15),
(6, 5, 3, 120, NULL, NULL, NULL, 15),
(7, 5, 3, 120, NULL, NULL, NULL, 15),
(8, 5, 2, 120, NULL, NULL, NULL, 10),
(9, 5, 2, 120, NULL, NULL, NULL, 10),
(10, 5, 2, 120, NULL, NULL, NULL, 10),
(11, 5, 2, 120, NULL, NULL, NULL, 10),
(12, 5, 2, 120, NULL, NULL, NULL, 10),
(13, 5, 2, 120, NULL, NULL, NULL, 10),
(14, 5, 2, 120, NULL, NULL, NULL, 10),
(15, 5, 2, 120, NULL, NULL, NULL, 10),
(16, 5, 2, 120, NULL, NULL, NULL, 10),
(17, 5, 2, 120, NULL, NULL, NULL, 10),
(18, 5, 2, 120, NULL, NULL, NULL, 10),
(19, 5, 2, 120, NULL, NULL, NULL, 10),
(20, 5, 2, 120, NULL, NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo_resolcion`
--

CREATE TABLE `modulo_resolcion` (
  `modulo_horizontal` varchar(20) DEFAULT NULL,
  `modulo_vertical` varchar(20) DEFAULT NULL,
  `resolucion_horizontal` varchar(20) DEFAULT NULL,
  `resolucion_vertical` varchar(20) DEFAULT NULL,
  `px_totales` varchar(20) DEFAULT NULL,
  `n_salidas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantillas_calculo_pantallas`
--

CREATE TABLE `plantillas_calculo_pantallas` (
  `marca_referencia` varchar(20) DEFAULT NULL,
  `dimension_horizontal` int(11) DEFAULT NULL,
  `dimension_vertical` int(11) DEFAULT NULL,
  `resolucion_horizontal` int(11) DEFAULT NULL,
  `resolucion_vertical` int(11) DEFAULT NULL,
  `peso_kg` int(11) DEFAULT NULL,
  `mto` varchar(20) DEFAULT NULL,
  `consumo_promedio_m2` int(11) DEFAULT NULL,
  `maximo_consumo_m2` int(11) DEFAULT NULL,
  `brillo_nits` int(11) DEFAULT NULL,
  `contraste` int(11) DEFAULT NULL,
  `tasa_refesh` int(11) DEFAULT NULL,
  `voltaje` int(11) DEFAULT NULL,
  `durabilidad` int(11) DEFAULT NULL,
  `pitch_mm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plantillas_calculo_pantallas`
--

INSERT INTO `plantillas_calculo_pantallas` (`marca_referencia`, `dimension_horizontal`, `dimension_vertical`, `resolucion_horizontal`, `resolucion_vertical`, `peso_kg`, `mto`, `consumo_promedio_m2`, `maximo_consumo_m2`, `brillo_nits`, `contraste`, `tasa_refesh`, `voltaje`, `durabilidad`, `pitch_mm`) VALUES
('Ligthlink C391R', 500, 1000, 128, 256, 13, 'Frontal Posterior', 229, 415, 1000, 4000, 1920, 220, 100, 3),
('Kslim3.9', 500, 1000, 128, 256, 11, 'Frontal Posterior', 169, 305, 8000, 4000, 1920, 110, 100, 3),
('UsurfaceIII8', 800, 900, 96, 108, 21, 'Posterior', 267, 650, 0, 5500, 2840, 110, 100, 8),
('UsurfaceIII6', 800, 900, 120, 135, 21, 'Posterior', 155, 533, 6500, 5500, 2840, 110, 100, 6),
('Unilumin P6', 480, 480, 80, 80, 9, 'Posterior', 240, 528, 0, 0, 2000, 220, 0, 6),
('Utile 6.9', 500, 1000, 72, 144, 15, '288x192', 110, 272, 6500, 0, 0, 220, 0, 6),
('Utile 3.9 TM', 500, 500, 128, 128, 8, 'Posterior', 191, 300, 1200, 5000, 1000, 110, 100, 3),
('Meshh', 300, 1200, 32, 128, 4, 'Frontal Posterior', 0, 556, 0, 0, 0, 110, 100, 8),
('Pantalla 120', 960, 960, 120, 120, 15, '', 267, 650, 0, 0, 0, 0, 0, 8),
('UsurfaceIII 6 (10.00', 800, 900, 120, 135, 17, 'Posterior', 267, 650, 10000, 16500, 1920, 110, 100, 6),
('Upad III 6 TM', 500, 1000, 72, 144, 15, 'Posterior', 212, 640, 5500, 3000, 1920, 110, 100, 6),
('Upad III 6 TM -90', 1000, 500, 144, 72, 15, 'Posterior', 212, 640, 5500, 3000, 1920, 110, 100, 6),
('CIEL LG', 500, 1000, 256, 256, 13, 'Frontal Posterior', 229, 415, 1000, 4000, 1920, 220, 100, 3),
('Unilumin 1.9', 480, 480, 252, 252, 8, 'Posterior', 220, 660, 1200, 5000, 1000, 110, 100, 3),
('3,9 outdoor', 500, 1000, 128, 256, 12, 'Posterior', 300, 800, 4000, 0, 3840, 110, 100, 3),
('Argento', 640, 640, 80, 80, 12, 'Posterior', 483, 690, 6000, 0, 1920, 110, 100, 8),
('Tapa Azul', 640, 640, 108, 108, 10, 'Posterior', 217, 310, 4000, 0, 1920, 220, 0, 5),
('Leyard', 640, 480, 80, 60, 12, 'Posterior', 468, 780, 10000, 0, 0, 110, 100000, 8),
('Lemass', 640, 480, 256, 192, 7, 'Posterior', 163, 490, 1200, 0, 3840, 110, 100, 2),
('DIP 10', 960, 960, 96, 96, 48, 'Posterior', 1082, 1545, 10000, 0, 0, 110, 100, 10),
('UPAD 2,6', 500, 500, 192, 192, 8, 'Posterior', 110, 272, 0, 0, 0, 110, 0, 2),
('3,9', 500, 1000, 128, 256, 8, 'Posterior', 350, 700, 6000, 0, 3840, 220, 100, 3),
('king led', 500, 1000, 128, 256, 12, 'Posterior', 300, 800, 4000, 0, 3840, 110, 100, 3),
('USK 3.9 OUTDOOR', 500, 1000, 128, 256, 17, 'Frontal Posterior', 184, 556, 5000, 6500, 7680, 110, 100, 3),
('UGM CURVE', 500, 1000, 128, 256, 10, 'Posterior', 80, 240, 800, 3000, 3840, 110, 100, 3),
('SAMSUNG QM85R-B', 1053, 1870, 2160, 3840, 48, 'Posterior', 142, 156, 500, 4000, 594000000, 110, 50, 0),
('Absen 3.9', 500, 1000, 128, 256, 17, 'Frontal Posterior', 190, 590, 5000, 6500, 7680, 110, 100, 3),
('SAMSUNG IE040A', 960, 540, 240, 135, 10, 'Frontal Posterior', 116, 347, 800, 5000, 3840, 110, 100, 4),
('Monitor 16', 526, 296, 1920, 1080, 4, 'Posterior', 144, 0, 0, 0, 0, 0, 0, 0),
('', 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0),
('', 0, 0, 0, 0, 0, '', 468, 1, 0, 0, 0, 0, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `info_pantalla`
--
ALTER TABLE `info_pantalla`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `info_pantalla`
--
ALTER TABLE `info_pantalla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
