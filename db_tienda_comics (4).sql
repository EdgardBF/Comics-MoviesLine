-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2017 a las 09:45:34
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tienda_comics`
--
CREATE DATABASE IF NOT EXISTS `db_tienda_comics` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `db_tienda_comics`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

DROP TABLE IF EXISTS `administradores`;
CREATE TABLE `administradores` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo_usuario` int(10) UNSIGNED NOT NULL,
  `fecha_cambio_contra` date NOT NULL,
  `fecha_baneo` date DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `conexion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_admin`, `nombre`, `correo`, `usuario`, `clave`, `id_tipo_usuario`, `fecha_cambio_contra`, `fecha_baneo`, `estado`, `conexion`) VALUES
(1, 'Miguel Angel Flores Reyes', 'miguelfr0305@hotmail.com', 'miguel009', '$2y$10$Y8NPUbDDAPZrc8KkBrNvN.QPzDguZ6oJgT1JpQubipAl0WYBcdJvy', 15, '2017-10-07', NULL, 0, 0),
(2, 'magikrp', 'miguel@hotmail.com', 'gg', '$2y$10$IrYdpnphCYHyk5x7ZEbYxeq3hmlyOynlpaQV0fAvYrwhO/Pq7BGL6', 10, '2017-10-08', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE `carrito` (
  `id_carrito` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `id_registro` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `id_comentario` int(10) UNSIGNED NOT NULL,
  `id_registro` int(10) UNSIGNED NOT NULL,
  `comentario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_producto` int(10) UNSIGNED DEFAULT NULL,
  `calificacion` int(10) UNSIGNED DEFAULT NULL,
  `id_tipo_comentario` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_registro`, `comentario`, `id_producto`, `calificacion`, `id_tipo_comentario`, `fecha`) VALUES
(1, 31, 'Buenas', 5, 8, 1, '2017-10-07'),
(2, 31, 'que buena', 5, 7, 1, '2017-10-07'),
(3, 31, 'noches', 2, 4, 1, '2017-10-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE `compra` (
  `id_compra` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) UNSIGNED NOT NULL,
  `tarjeta` bigint(16) UNSIGNED NOT NULL,
  `id_registro` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `numero` int(11) NOT NULL,
  `codigo_postal` int(11) NOT NULL,
  `direccion` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `pagado` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `id_producto`, `cantidad`, `tarjeta`, `id_registro`, `fecha`, `numero`, `codigo_postal`, `direccion`, `pagado`) VALUES
(1, 5, 10, 1234567891234567, 31, '2017-09-08', 77889776, 1000, 'jh', '20.00'),
(2, 1, 25, 1234567891234567, 31, '2017-10-08', 77889776, 1000, 'dfgdfgfdgd', '50.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribucion`
--

DROP TABLE IF EXISTS `distribucion`;
CREATE TABLE `distribucion` (
  `id_distribucion` int(10) UNSIGNED NOT NULL,
  `distribucion` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `distribucion`
--

INSERT INTO `distribucion` (`id_distribucion`, `distribucion`) VALUES
(1, 'Marvel'),
(2, 'DC Comcis'),
(3, 'New Generation'),
(4, 'The Comics world');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

DROP TABLE IF EXISTS `noticia`;
CREATE TABLE `noticia` (
  `id_noticia` int(11) UNSIGNED NOT NULL,
  `imagen` mediumblob NOT NULL,
  `titulo_imagen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha` date NOT NULL,
  `id_admin` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id_producto` int(11) UNSIGNED NOT NULL,
  `nombre_producto` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `precio_producto` decimal(5,2) NOT NULL,
  `id_tipo_producto` int(11) UNSIGNED NOT NULL,
  `id_distribucion` int(11) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` mediumblob NOT NULL,
  `cantidad` int(10) NOT NULL,
  `clasificacion` int(2) UNSIGNED NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

DROP TABLE IF EXISTS `registro`;
CREATE TABLE `registro` (
  `id_registro` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `fecha_cambio_contra` date NOT NULL,
  `fecha_baneo` date DEFAULT NULL,
  `conexion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id_registro`, `nombre`, `correo`, `usuario`, `clave`, `estado`, `fecha_cambio_contra`, `fecha_baneo`, `conexion`) VALUES
(1, 'Edgard', 'sd@hsdf.com', 'alex', '$2y$10$RzRhUDm8GEYQbFMeuM.87uVz7txOpw2vnrh0nHRZ5EC4bzLX.tJ.W', 0, '2017-07-18', '0000-00-00', 0),
(25, 'Miguel Angel Flores Reyes', 'miguelfr0305@hotmail.com', 'Miguel009VGC', '$2y$10$wdN/i1WuBNGOupiIh2lt.uaEKmEGl.BQ6dq/B6XWiqbMDuTwGSpYC', 1, '0000-00-00', '0000-00-00', 0),
(26, 'Edgard Alexander Barrera Flamenco', 'edgardino@hotmail.com', 'edgard', '$2y$10$LDTDPvwT52d8Ciku9t6g/emCcrGyYCKrUOVrWHydT1DXrPXg.o7hS', 0, '0000-00-00', '0000-00-00', 0),
(27, 'flaminquito', 'hol@hol.com', 'hols', '$2y$10$SyN7YVlZpjk0C4UmEOkVCubQmhfPwpMnlAAc7rpFCgLNdDlQYRPIe', 0, '0000-00-00', '0000-00-00', 0),
(29, 'hola', 'miguelfr0305@hotmail.com\r\n', 'car', '$2y$10$E07dFP7cREBp993xvxkUMu30PQPazXd2w7HzVracGDx0mH85158/S', 3, '2017-07-20', '0000-00-00', 0),
(31, 'miguel angel flores reyes', 'miguelfr0305@gg.com', 'miguel', '$2y$10$Gnuw1zYXywiyYM9t7h8j5.2taDNCrnVoVR1GNeeQUF86X.OXHzqJG', 1, '0000-00-00', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_comentario`
--

DROP TABLE IF EXISTS `tipo_comentario`;
CREATE TABLE `tipo_comentario` (
  `id_tipo_comentario` int(10) UNSIGNED NOT NULL,
  `tipo_comentario` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

DROP TABLE IF EXISTS `tipo_producto`;
CREATE TABLE `tipo_producto` (
  `id_tipo_producto` int(10) UNSIGNED NOT NULL,
  `tipo_producto` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id_tipo_producto`, `tipo_producto`) VALUES
(1, 'Comcis'),
(2, 'peliculas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `seleccionar` tinyint(1) NOT NULL,
  `crear` tinyint(1) NOT NULL,
  `leer` tinyint(1) NOT NULL,
  `actualizar` tinyint(1) NOT NULL,
  `eliminar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `tipo`, `seleccionar`, `crear`, `leer`, `actualizar`, `eliminar`) VALUES
(1, 'la vida', 1, 1, 0, 1, 1),
(3, 'Maestro', 1, 1, 1, 1, 1),
(8, 'Oro', 0, 1, 1, 1, 0),
(10, 'Plata', 0, 0, 1, 1, 0),
(11, 'Platino', 1, 1, 1, 1, 0),
(13, 'Gran Maestro', 1, 1, 1, 0, 1),
(15, 'Top 500', 1, 1, 1, 1, 1),
(16, 'Bronze', 1, 0, 1, 0, 0),
(17, 'ELLA', 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vista_carrito`
--

DROP TABLE IF EXISTS `vista_carrito`;
CREATE TABLE `vista_carrito` (
  `id_vista_carrito` int(10) UNSIGNED NOT NULL,
  `id_carrito` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_registro` (`id_registro`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_registro` (`id_registro`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_tipo_comentario` (`id_tipo_comentario`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_registro` (`id_registro`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `distribucion`
--
ALTER TABLE `distribucion`
  ADD PRIMARY KEY (`id_distribucion`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `nombre_producto` (`nombre_producto`),
  ADD KEY `id_tipo_producto` (`id_tipo_producto`),
  ADD KEY `id_distribucion` (`id_distribucion`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `tipo_comentario`
--
ALTER TABLE `tipo_comentario`
  ADD PRIMARY KEY (`id_tipo_comentario`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id_tipo_producto`),
  ADD UNIQUE KEY `tipo_producto` (`tipo_producto`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `vista_carrito`
--
ALTER TABLE `vista_carrito`
  ADD PRIMARY KEY (`id_vista_carrito`),
  ADD KEY `id_carrito` (`id_carrito`),
  ADD KEY `id_producto` (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `distribucion`
--
ALTER TABLE `distribucion`
  MODIFY `id_distribucion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `tipo_comentario`
--
ALTER TABLE `tipo_comentario`
  MODIFY `id_tipo_comentario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id_tipo_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `vista_carrito`
--
ALTER TABLE `vista_carrito`
  MODIFY `id_vista_carrito` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `administradores_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id_registro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
