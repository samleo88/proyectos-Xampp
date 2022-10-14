-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-08-2019 a las 00:53:30
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `viacrucis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicaciones`
--

CREATE TABLE IF NOT EXISTS `aplicaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `url_imagen` varchar(200) NOT NULL,
  `orden` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `aplicaciones`
--

INSERT INTO `aplicaciones` (`id`, `nombre`, `url`, `url_imagen`, `orden`) VALUES
(1, 'Roles usuarios', 'apli_roles.php', '', 0),
(2, 'Roles aplicaciones', 'roles_aplicaciones.php', '', 0),
(4, 'Usuarios', 'usuario.php', '', 6),
(24, 'Roles', 'roles.php', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `entidad` varchar(1000) NOT NULL,
  `responsable` varchar(1000) NOT NULL,
  `correo` varchar(1000) NOT NULL,
  `nit` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`, `entidad`, `responsable`, `correo`, `nit`) VALUES
(1, 'Administrador', '', '', '', ''),
(8, 'Administrador de Proyecto', '', '', '', ''),
(10, 'Proyecto 1', 'Colpatria', 'Juan Gonzalez', 'soporte@colpatria.com', '4545'),
(11, 'Proyecto 2 EAN', 'EAN educativo', 'Estudiante', '1@gmail.com', '13579'),
(12, 'PROYECTO 2', 'ENTDAD', 'RESP', 'jhon.freddyc@gmail.com', '89898989');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_aplicaciones`
--

CREATE TABLE IF NOT EXISTS `rol_aplicaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_rol` int(11) NOT NULL,
  `cod_aplicacion` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Volcado de datos para la tabla `rol_aplicaciones`
--

INSERT INTO `rol_aplicaciones` (`id`, `cod_rol`, `cod_aplicacion`) VALUES
(1, 1, 1),
(34, 1, 2),
(36, 1, 4),
(38, 8, 3),
(40, 8, 22),
(41, 8, 21),
(42, 10, 17),
(43, 10, 18),
(44, 10, 19),
(45, 10, 20),
(47, 10, 12),
(48, 10, 13),
(49, 10, 14),
(50, 10, 15),
(51, 10, 16),
(52, 1, 24),
(53, 8, 23),
(54, 10, 11),
(55, 8, 25),
(56, 8, 4),
(58, 11, 11),
(59, 11, 15),
(61, 12, 11),
(62, 12, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuarios`
--

CREATE TABLE IF NOT EXISTS `rol_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_rol` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `rol_usuarios`
--

INSERT INTO `rol_usuarios` (`id`, `cod_rol`, `cod_usuario`) VALUES
(2, 1, 1),
(11, 8, 2),
(12, 8, 1),
(13, 10, 1),
(14, 9, 5),
(15, 8, 5),
(16, 10, 5),
(17, 11, 8),
(18, 12, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_padre` int(11) NOT NULL,
  `celular` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `apellido`, `clave`, `estado`, `id_padre`, `celular`, `email`) VALUES
(1, 'admin', 'Administrador', 'Sistema de informaciÃ³n', '123456', 1, 1, '11111', 'soporte@inmetaltec.com'),
(5, 'gerente', 'Gerente de Proyecto', '', '123456', 1, 1, 'g', 'aa@gmail.com'),
(6, 'wrinconl8280', 'William', 'RincÃ³n', '123', 1, 1, '310111111111', 'wrinconl8280@universidadean.edu.co');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
