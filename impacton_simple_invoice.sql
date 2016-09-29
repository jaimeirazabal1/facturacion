
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-09-2016 a las 02:05:30
-- Versión del servidor: 10.0.20-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u669571457_factu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `telefono_cliente` char(30) NOT NULL,
  `email_cliente` varchar(64) NOT NULL,
  `direccion_cliente` varchar(255) NOT NULL,
  `status_cliente` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `codigo_producto` (`nombre_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `empresa_id`, `nombre_cliente`, `telefono_cliente`, `email_cliente`, `direccion_cliente`, `status_cliente`, `date_added`) VALUES
(1, 4, 'Manuel Almerida', '4248275543', 'alexander715@gmail.com', 'calle', 1, '2016-09-26 08:11:25'),
(2, 4, 'Jairo lopex', '', '', '', 1, '2016-09-26 08:50:12'),
(4, 4, 'Jaime Irazabal\\', '04143299925', 'jaimeirazabal1@gmail.com', 'Carrizalc\r\nUrb Tara de corralito', 1, '2016-09-29 00:02:30'),
(5, 4, 'Pepe', '12345789', 'jaimeirazabal1@gmail.com', 'Carrizal\r\nUrb Tara de corralito', 1, '2016-09-29 00:51:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE IF NOT EXISTS `detalle_factura` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` double NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `numero_cotizacion` (`numero_factura`,`id_producto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`id_detalle`, `numero_factura`, `id_producto`, `cantidad`, `precio_venta`) VALUES
(4, 2, 1, 1, 120),
(3, 1, 1, 5, 120),
(5, 2, 1, 1, 120),
(6, 2, 1, 1, 120),
(7, 2, 1, 1, 120),
(8, 3, 1, 1, 120),
(9, 4, 1, 1, 120),
(10, 4, 1, 1, 120),
(11, 4, 1, 1, 120),
(12, 5, 1, 1, 120),
(13, 5, 2, 1, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `rif` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `rif`) VALUES
(4, 'Jaig', '123456789'),
(3, 'te.c.a', ''),
(6, 'Empresa 2', ''),
(7, 'Alexander', '125265232');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `condiciones` varchar(30) NOT NULL,
  `total_venta` varchar(20) NOT NULL,
  `estado_factura` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_factura`),
  UNIQUE KEY `numero_cotizacion` (`numero_factura`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_factura`, `empresa_id`, `numero_factura`, `fecha_factura`, `id_cliente`, `id_vendedor`, `condiciones`, `total_venta`, `estado_factura`) VALUES
(2, 4, 1, '2016-09-26 11:02:02', 1, 1, '1', '642', 1),
(3, 4, 2, '2016-09-26 11:03:23', 1, 1, '1', '513.6', 1),
(4, 4, 3, '2016-09-26 11:03:58', 1, 1, '1', '128.4', 2),
(5, 4, 4, '2016-09-26 11:32:37', 1, 1, '1', '385.2', 1),
(6, 4, 5, '2016-09-26 23:08:41', 1, 1, '1', '149.8', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE IF NOT EXISTS `presupuesto` (
  `presupuesto` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `codigo_producto` char(20) NOT NULL,
  `nombre_producto` char(255) NOT NULL,
  `status_producto` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL,
  `precio_producto` double NOT NULL,
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `codigo_producto` (`codigo_producto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_producto`, `empresa_id`, `codigo_producto`, `nombre_producto`, `status_producto`, `date_added`, `precio_producto`) VALUES
(1, 4, '001', 'aria', 1, '2016-09-26 08:11:48', 120),
(2, 4, '002', 'Jabon', 1, '2016-09-26 20:36:09', 20),
(3, 4, '003', '9898', 1, '2016-09-29 00:51:49', 12),
(4, 4, '1919', 'Nombre producto', 1, '2016-09-29 00:54:54', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp`
--

CREATE TABLE IF NOT EXISTS `tmp` (
  `id_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `precio_tmp` double(8,2) DEFAULT NULL,
  `session_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

--
-- Volcado de datos para la tabla `tmp`
--

INSERT INTO `tmp` (`id_tmp`, `id_producto`, `cantidad_tmp`, `precio_tmp`, `session_id`) VALUES
(45, 1, 20, 120.00, 'e9uhsah8jgjfeqeb68pepmu406'),
(46, 1, 125, 120.00, 'e9uhsah8jgjfeqeb68pepmu406'),
(47, 1, 1, 120.00, '06dfe615d7b3f3f75849090905f51ada'),
(48, 1, 1, 120.00, '06dfe615d7b3f3f75849090905f51ada'),
(49, 2, 1, 20.00, '06dfe615d7b3f3f75849090905f51ada'),
(50, 2, 1, 20.00, '06dfe615d7b3f3f75849090905f51ada'),
(51, 2, 1, 20.00, '06dfe615d7b3f3f75849090905f51ada'),
(52, 2, 1, 20.00, '3ae7886b470a5c1f6b5f1851eb097a59'),
(64, 3, 1, 12.00, 'c93deaf34fcc5ae44dd068b77a7a9b6d'),
(63, 2, 1, 20.00, 'c93deaf34fcc5ae44dd068b77a7a9b6d'),
(62, 1, 1, 120.00, 'c93deaf34fcc5ae44dd068b77a7a9b6d'),
(57, 1, 1, 120.00, '3ae7886b470a5c1f6b5f1851eb097a59'),
(61, 4, 1, 99.00, 'c93deaf34fcc5ae44dd068b77a7a9b6d'),
(60, 1, 1, 120.00, 'c93deaf34fcc5ae44dd068b77a7a9b6d');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `empresa_id` int(11) NOT NULL,
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `empresa_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `date_added`) VALUES
(1, 4, 'Prueba', 'programador', 'admin', '$2y$10$MPVHzZ2ZPOWmtUUGCq3RXu31OTB.jo7M9LZ7PmPQYmgETSNn19ejO', 'admin@admin.com', '2016-05-21 15:06:00'),
(2, 4, 'Jaime Alfonso', 'Irazabal Gonzalez', 'jaimeirazabal1', '$2y$10$0f3ZjtxZWtR3Gzjvw2dzAui8IJsxoZ1tAb.d56coVo/513MgXzst.', 'jaimeirazabal1@gmail.com', '2016-09-29 00:44:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
