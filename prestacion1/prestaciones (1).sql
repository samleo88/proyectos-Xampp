-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-05-2017 a las 03:11:58
-- Versión del servidor: 5.7.10-log
-- Versión de PHP: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prestaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `pregunta` varchar(50) NOT NULL,
  `respuesta` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `id_extreme` varchar(50) NOT NULL,
  `tipo` int(2) NOT NULL,
  `imagen` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `usuario`, `pass`, `nombre`, `apellido`, `pregunta`, `respuesta`, `correo`, `id_extreme`, `tipo`, `imagen`) VALUES
(1, 'invitado', '202cb962ac59075b964b07152d234b70', 'Administrador', 'Administrador', 'donde vives', 'en la casa', 'ccarch81@gmail.com', 'e6173408b6ec032e6765142bba1da08d', 2, 'avatar3.png'),
(2, 'admin', '202cb962ac59075b964b07152d234b70', 'YONATHAN', 'DUQUE', 'HEROE DE LA INFANCIA', 'ZORRO', 'Y@Y.COM', '', 1, 'avatar3.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(10) NOT NULL,
  `cedula` int(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `fechai` date NOT NULL,
  `cod` varchar(20) NOT NULL,
  `ultimal` date DEFAULT NULL,
  `estado` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `cedula`, `nombre`, `apellido`, `correo`, `fechai`, `cod`, `ultimal`, `estado`) VALUES
(24, 1335, 'QUIEN SEA', 'JIMENEZ', 'JOND_141@GMAIL.COM', '2015-12-01', 'A0003', '2016-05-27', 'L'),
(23, 2121224, 'FGFDDG', 'GHGFGF', 'HFGHGFGHF@SADDSASD.COM', '2016-05-01', 'A0002', '2016-05-13', 'L'),
(25, 21212121, 'YON', 'SUA', 'ASSA@SSA.COM', '2016-09-21', 'A0004', '2017-01-10', 'L'),
(26, 123, 'EMPLEADO', 'NUEVO', 'A@A.COM', '2017-05-01', 'A0005', NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion`
--

CREATE TABLE `liquidacion` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `causa` varchar(100) NOT NULL,
  `tiempo` int(11) NOT NULL,
  `sueldo` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `liquidacion`
--

INSERT INTO `liquidacion` (`id`, `codigo`, `cargo`, `departamento`, `causa`, `tiempo`, `sueldo`) VALUES
(10, 'A0003', 'SUPERVISOR', 'VENTAS', 'CORRUPCION', 6, 15000),
(9, 'A0002', 'ASDSADSADASDA ', 'ASDSASDSA', 'ASDASDADS', 0, 121210),
(11, 'A0004', 'SASA', 'SAASSA', 'SASASA', 4, 234324);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salario`
--

CREATE TABLE `salario` (
  `id` int(11) NOT NULL,
  `fechac` date NOT NULL,
  `fechaf` date NOT NULL,
  `salario` int(11) NOT NULL,
  `nombremes` varchar(20) NOT NULL,
  `dias` int(3) NOT NULL,
  `interes` int(11) NOT NULL,
  `totaldias` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salario`
--

INSERT INTO `salario` (`id`, `fechac`, `fechaf`, `salario`, `nombremes`, `dias`, `interes`, `totaldias`) VALUES
(1, '2015-12-15', '2016-01-14', 4889, 'Enero 15', 0, 15, 31),
(2, '2016-01-15', '2016-02-14', 5622, 'Febrero 15', 0, 16, 28),
(3, '2016-02-15', '2016-03-14', 5622, 'Marzo 15', 15, 15, 31),
(7, '2016-05-15', '2016-06-14', 6747, 'junio 15', 15, 16, 30),
(5, '2016-03-15', '2016-04-14', 5622, 'abril 15 ', 0, 15, 30),
(6, '2016-05-15', '2016-06-14', 6747, 'mayo 15', 0, 16, 31),
(9, '2016-06-15', '2016-07-14', 7422, 'Julio 15', 15, 16, 31);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`cedula`),
  ADD UNIQUE KEY `id_empleado` (`id_empleado`),
  ADD UNIQUE KEY `cod` (`cod`);

--
-- Indices de la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `salario`
--
ALTER TABLE `salario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `salario`
--
ALTER TABLE `salario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
