-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2022 a las 23:30:25
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
-- Base de datos: `site-ab`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta`
--

CREATE TABLE `boleta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `partido` varchar(50) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `boleta`
--

INSERT INTO `boleta` (`id`, `nombre`, `cantidad`, `precio`, `partido`, `fecha`) VALUES
(1, 'Sur Alta', 1200, '15000.00', 'Jaguares vs Atletico Bucaramanga', '2022-03-26'),
(2, 'Norte Alta', 1200, '15000.00', 'Jaguares vs Atletico Bucaramanga', '2022-03-26'),
(3, 'Oriental', 1500, '25000.00', 'Jaguares vs Atletico Bucaramanga', '2022-03-26'),
(4, 'Occidental', 1500, '35000.00', 'Jaguares vs Atletico Bucaramanga', '2022-03-26'),
(5, 'Occidental Alta', 1500, '50000.00', 'Jaguares vs Atletico Bucaramanga', '2022-03-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `correo`, `username`, `pass`) VALUES
(1234, 'Prueba', 'Tres', 'prueba23@sas.com', 'prueba32', '1234'),
(123456789, 'Prueba', 'Uno', 'prueba@ss.com', 'prueba1234', '1234'),
(1234567891, 'Prueba', 'Tres', 'prueba3@sas.com', 'prueba3', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleboleta`
--

CREATE TABLE `detalleboleta` (
  `id` int(11) NOT NULL,
  `idboleta` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `id` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`id`, `idventa`, `idproducto`, `cantidad`) VALUES
(14, 6, 16, 8);

--
-- Disparadores `detalleventa`
--
DELIMITER $$
CREATE TRIGGER `disminucion_producto` AFTER INSERT ON `detalleventa` FOR EACH ROW BEGIN 
	UPDATE producto as p SET p.unidades=p.unidades-NEW.cantidad WHERE p.id=NEW.idproducto;
	UPDATE venta as v SET v.total=v.total+NEW.cantidad*(SELECT p.precio FROM producto p WHERE p.id=NEW.idproducto) WHERE v.id=NEW.idventa;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `restaurar_cantidad` AFTER DELETE ON `detalleventa` FOR EACH ROW BEGIN 
	UPDATE producto p SET p.unidades=p.unidades+OLD.cantidad WHERE p.id=OLD.idproducto;
    UPDATE venta as v SET v.total=v.total-OLD.cantidad*(SELECT p.precio FROM producto p WHERE p.id=OLD.idproducto) WHERE v.id=OLD.idventa;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventab`
--

CREATE TABLE `detalleventab` (
  `id` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `iddetalleboleta` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `unidades` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `precio`, `unidades`, `descripcion`) VALUES
(13, 'Camiseta hombre 2022', '95000.00', 44, 'Camiseta local leoparda 100% algodon temporada 2022'),
(14, 'Camiseta hombre 2021', '85000.00', 48, 'Camiseta local leoparda 100% algodon temporada 2021'),
(15, 'Pocillo Leopardo', '15000.00', 41, 'Consume tus bebidas como un verdadero hincha leopardo'),
(16, 'Kit entrenamiento', '110000.00', 30, 'Uniforme completo para los niños, incluye pantaloneta y medias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `total` decimal(11,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `idcliente`, `fecha`, `total`) VALUES
(6, 1234, '2022-03-16', '880000.00');

--
-- Disparadores `venta`
--
DELIMITER $$
CREATE TRIGGER `auditoria_venta_estado` BEFORE DELETE ON `venta` FOR EACH ROW BEGIN 
	DELETE FROM detalleventa  WHERE idventa=OLD.id;
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `detalleboleta`
--
ALTER TABLE `detalleboleta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id-boleta` (`idboleta`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`id`,`idventa`),
  ADD KEY `id-producto` (`idproducto`),
  ADD KEY `id-venta` (`idventa`);

--
-- Indices de la tabla `detalleventab`
--
ALTER TABLE `detalleventab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id-venta2` (`idventa`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id-cliente` (`idcliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boleta`
--
ALTER TABLE `boleta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalleboleta`
--
ALTER TABLE `detalleboleta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleboleta`
--
ALTER TABLE `detalleboleta`
  ADD CONSTRAINT `id-boleta` FOREIGN KEY (`idboleta`) REFERENCES `boleta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `id-producto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id-venta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalleventab`
--
ALTER TABLE `detalleventab`
  ADD CONSTRAINT `id-venta2` FOREIGN KEY (`idventa`) REFERENCES `venta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `id-cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
