-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2017 a las 00:06:34
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
(1, 'Miguel Angel Flores Reyes', 'miguelfr0305@hotmail.com', 'root', '$2y$10$YpUo7GD/pmxtMSpVWnhfQOXfBEwszieeq7SxpOK0dluRxvJ655PsG', 15, '2017-10-15', NULL, 0, 0),
(2, 'Edgard Alexander Barrera Flamenco', 'edgfard@hotmail.com', 'Chito1015', '$2y$10$Bl1VrRxzwW63ZlaTiX3UKuUyZWddhCpOJvkPpt7qOBD50OuR13UYe', 13, '2017-10-15', NULL, 0, 0),
(3, 'Jorge Alberto Aquino Cruz', 'aquino@hotmail.com', 'Fortunato666', '$2y$10$kvTvYgy6LO/4l4Zk2kq65OtDT049ALxh157keJ2F82CjwYs.7LSpq', 11, '2017-10-15', NULL, 0, 0),
(4, 'Miguel Angel Galdamez Canales', 'pelo@hotmail.com', 'Pelo', '$2y$10$cof//SvDEg4cq9ieEunbvedAG20BOZkQA6Bo/7DUDr5MmS4Eg/XIC', 11, '2017-10-15', NULL, 0, 0),
(5, 'Miguel Angel Flores Aguilar', 'miguel@hotmail.com', 'Father', '$2y$10$XGwrIlrUb1oPcbOkRscYP.Vah96qL9frfuMqv/SvvjhSq8SFtwujO', 3, '2017-10-15', NULL, 0, 0),
(6, 'Veronica Isabel Reyes Villatoro', 'vero@hotmail.com', 'Verito', '$2y$10$YXNrnyy7CI10z/sAwNwRAu7gklqMb5ObZNdQfRvujt8Cl27llU8SS', 13, '2017-10-15', NULL, 0, 0),
(7, 'Erick Fabricio Arevalo Henriquez', 'erick@hotmail.com', 'Megazerox', '$2y$10$QjOPNGQFWzItzvMmlJFMW.o75QP7WLz3cTeIFch5wZ7i6jA5UWxzW', 8, '2017-10-15', NULL, 0, 0),
(8, 'Dennis Alberto Benavides Chavarria', 'dennis@hotmail.com', 'D3nnis', '$2y$10$.ArJYunqJnTRaRe4VNXO6eLL3lCc1rgFecUvH7MN.QrMsg5YUk3Ti', 10, '2017-10-15', NULL, 0, 0),
(9, 'Erick Ricardo Bonilla Ascencio', 'erick@gmail.com', 'Erick', '$2y$10$byOLn/lv9UuYKzoKSd6U..ZofPmOKPIIcPd.vW7Mrbt3/85Xr.4hm', 16, '2017-10-15', NULL, 0, 0),
(10, 'Ricardo Jesus Lam Navarro', 'lam@hotmail.com', 'MajorRialix', '$2y$10$HSng3gTtuzxYeUgrxeQ93OTo3pIB9uRcgEF5ba8qyo3QSlOVO4eM.', 3, '2017-10-15', NULL, 0, 0),
(11, 'Miguel Alejandro Melendez Martinez', 'for@hotmail.com', 'Alejandro725', '$2y$10$ip5zTEU6Ta3MGRJ7OuBKr.e5ieKAyOaBGB1scjOss4mEQo6FAQ8vW', 13, '2017-10-15', NULL, 0, 0);

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

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `fecha`, `id_registro`) VALUES
(1, '2017-10-15', 33),
(2, '2017-10-15', 32),
(3, '2017-10-15', 35),
(4, '2017-10-15', 36);

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
(1, 32, 'Muy Buen Producto me encanto', 1, 10, 1, '2017-10-15'),
(2, 33, 'Buen producto pero le falta algo mejor', 1, 8, 1, '2017-10-15'),
(3, 34, 'Producto bastante bueno, buena historia lo recomiendo', 2, 9, 1, '2017-10-15'),
(4, 35, 'El mejor producto de la historia', 3, 10, 1, '2017-10-15'),
(5, 36, 'Producto bastante bueno aunque le falto algo', 4, 8, 1, '2017-10-15'),
(6, 36, 'No me gusto tanto el producto pero es pasable', 1, 6, 1, '2017-10-15'),
(7, 36, 'Es bastante bueno aunque el final no me gusto', 3, 9, 1, '2017-10-15'),
(8, 32, 'Que producto tan bueno, valio cada centavo', 2, 10, 1, '2017-10-15'),
(9, 32, 'Muy bueno me encanto el final, es muy extra&ntilde;o pero genial', 4, 9, 1, '2017-10-15'),
(10, 33, 'Muy buena historia, aunque el final es horrible', 5, 7, 1, '2017-10-15');

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
  `pagado` decimal(7,2) NOT NULL,
  `id_reconocimiento` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `id_producto`, `cantidad`, `tarjeta`, `id_registro`, `fecha`, `numero`, `codigo_postal`, `direccion`, `pagado`, `id_reconocimiento`) VALUES
(1, 1, 2, 1234567891234567, 33, '2017-10-15', 78774628, 11111, 'Alameda juan pablo segundo, casa azul#31', '4.00', 'NdKH'),
(2, 2, 3, 1234567812345678, 33, '2017-09-15', 78774628, 11111, 'Alameda juan poablo', '52.00', '5WMP'),
(3, 4, 10, 1234567812345678, 33, '2017-09-15', 78774628, 11111, 'Alameda juan poablo', '52.00', '5WMP'),
(4, 3, 2, 1234567891234567, 33, '2017-08-15', 78837827, 1001, 'Alameda juanes', '6.00', 'zPSe'),
(5, 5, 10, 1234567891234567, 32, '2017-10-15', 77889776, 11111, 'Villa Olimpica porton blanco casa#34', '50.00', 'WXWQ'),
(6, 4, 4, 1234567891234567, 32, '2017-07-15', 77889776, 1111, 'Villa Olimpica porton blanco casa#34', '20.00', 'wMsu'),
(7, 1, 2, 1234567891234567, 32, '2017-07-15', 77889776, 1111, 'Villa Olimpica porton blanco casa#34', '20.00', 'wMsu'),
(8, 2, 4, 1234567891234567, 32, '2017-06-15', 77889776, 1111, 'Villa Olimpica porton blanco casa#34', '16.00', 'NTrg'),
(9, 1, 2, 1234567891234567, 35, '2017-10-15', 25253232, 10111, 'Avenida la esperanza, colonia lunar casa 25', '36.00', 'LGmH'),
(10, 2, 3, 1234567891234567, 35, '2017-10-15', 25253232, 10111, 'Avenida la esperanza, colonia lunar casa 25', '36.00', 'LGmH'),
(11, 4, 5, 1234567891234567, 35, '2017-10-15', 25253232, 10111, 'Avenida la esperanza, colonia lunar casa 25', '36.00', 'LGmH'),
(12, 5, 25, 1234567891234567, 35, '2017-03-15', 25253232, 10100, 'Avenida la esperanza, colonia lunar casa 25', '125.00', 'RiqO'),
(13, 3, 5, 1234567891234567, 35, '2017-02-15', 25253232, 1001, 'Avenida la esperanza, colonia lunar casa 25', '35.00', 'DXD8'),
(14, 2, 5, 1234567891234567, 35, '2017-02-15', 25253232, 1001, 'Avenida la esperanza, colonia lunar casa 25', '35.00', 'DXD8'),
(15, 5, 5, 1234567891234567, 36, '2017-10-15', 78831683, 15055, 'Alameda suiza, casa los volcanes #60', '25.00', 'xlQP'),
(16, 3, 4, 1234567891234567, 36, '2017-06-15', 78831683, 10555, 'Alameda suiza, casa los volcanes #60', '14.00', 'ZKVU'),
(17, 1, 1, 1234567891234567, 36, '2017-06-15', 78831683, 10555, 'Alameda suiza, casa los volcanes #60', '14.00', 'ZKVU'),
(18, 2, 1, 1234567891234567, 36, '2017-01-15', 78774628, 10555, 'Alameda suiza, casa los volcanes #60', '4.00', 'ECHo');

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
(3, 'Comics New Roads'),
(4, 'Blizzard'),
(5, 'Bluehole Studio Inc');

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
  `imagen` mediumblob NULL,
  `cantidad` int(10) NOT NULL,
  `clasificacion` int(2) UNSIGNED NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `precio_producto`, `id_tipo_producto`, `id_distribucion`, `descripcion`, `imagen`, `cantidad`, `clasificacion`, `fecha`) VALUES
(1, 'PRODUCTO1', '2.00', 3, 1, 'Ese es el primer producto','', 3, 0, '2017-10-15');
INSERT INTO `productos` (`id_producto`, `nombre_producto`, `precio_producto`, `id_tipo_producto`, `id_distribucion`, `descripcion`, `imagen`, `cantidad`, `clasificacion`, `fecha`) VALUES
(2, 'PRODUCTO2', '4.00', 1, 2, 'Este es el segundo producto','', 4, 0, '2017-10-15');
INSERT INTO `productos` (`id_producto`, `nombre_producto`, `precio_producto`, `id_tipo_producto`, `id_distribucion`, `descripcion`, `imagen`, `cantidad`, `clasificacion`, `fecha`) VALUES
(3, 'PRODUCTO3', '3.00', 5, 3, 'Este es el tercer producto','', 19, 0, '2017-10-15');
INSERT INTO `productos` (`id_producto`, `nombre_producto`, `precio_producto`, `id_tipo_producto`, `id_distribucion`, `descripcion`, `imagen`, `cantidad`, `clasificacion`, `fecha`) VALUES
(4, 'PRODUCTO4', '4.00', 4, 4, 'Este es el cuarto producto','', 21, 0, '2017-10-15');
INSERT INTO `productos` (`id_producto`, `nombre_producto`, `precio_producto`, `id_tipo_producto`, `id_distribucion`, `descripcion`, `imagen`, `cantidad`, `clasificacion`, `fecha`) VALUES
(5, 'PRODUCTO5', '5.00', 2, 5, 'Este es el quinto producto', '', 10, 0, '2017-10-15');

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
(32, 'Angel Miguel Reyes Flores', 'miguel@hotmail.com', 'miguel', '$2y$10$3ZhcmjgW2WmBGUnxmzXq0OPw.8yjWrghtUqQv6mwKI/UuWFE9zWNG', 1, '0000-00-00', NULL, 0),
(33, 'Alexander Edgar Barrera Flamenco', 'flamencos@hotmail.com', 'Chilos', '$2y$10$wRI8MaJHuTGwe8V7/ruJBe3eZIqKbYekGqnpFFheK/IwAOsS2Xw9O', 1, '0000-00-00', NULL, 0),
(34, 'Carlos Alexander Lemus Guardados', 'rocker@gmail.com', 'carlos', '$2y$10$CqbznGCubW32Jwsco0x37OfOsTcEQ3RwLRutDWcYFcTdOgXtjYQNm', 1, '0000-00-00', NULL, 0),
(35, 'Adam Wade Gontier', 'Adma@hotmail.com', 'TDG', '$2y$10$Ve1kPuJ/gDSkv41/dDA.o.cmakKAix9gg1aXFJ5yQiTPwiZ06Bq..', 1, '0000-00-00', NULL, 0),
(36, 'Fatima Sarai Gochez Reyes', 'fafa@hotmail.com', 'MercyMainBTW', '$2y$10$XXwOXZ5KesPjX9gMUuCU2.MMlJ.1MRACdN8ofPNvy2k8mMNyFnVHO', 1, '0000-00-00', NULL, 0);

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
(3, 'Ambos'),
(1, 'Comics'),
(5, 'Comics cromados'),
(4, 'Fotomontaje'),
(2, 'Peliculas');

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
(3, 'Maestro', 1, 1, 1, 1, 1),
(8, 'Oro', 0, 1, 1, 1, 0),
(10, 'Plata', 0, 0, 1, 1, 0),
(11, 'Platino', 1, 1, 1, 1, 0),
(13, 'Gran Maestro', 1, 1, 1, 0, 1),
(15, 'Top 500', 1, 1, 1, 1, 1),
(16, 'Bronze', 1, 0, 1, 0, 0);

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
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `distribucion`
--
ALTER TABLE `distribucion`
  MODIFY `id_distribucion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `tipo_comentario`
--
ALTER TABLE `tipo_comentario`
  MODIFY `id_tipo_comentario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id_tipo_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `vista_carrito`
--
ALTER TABLE `vista_carrito`
  MODIFY `id_vista_carrito` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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
