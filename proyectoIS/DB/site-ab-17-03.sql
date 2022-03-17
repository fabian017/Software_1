-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2022 a las 09:48:12
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
(3, 'Oriental', 1501, '25000.00', 'Jaguares vs Atletico Bucaramanga', '2022-03-26'),
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
  `pass` varchar(20) NOT NULL,
  `rol` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `correo`, `username`, `pass`, `rol`) VALUES
(1234, 'Prueba', 'Tres', 'prueba23@sas.com', 'prueba32', '1234', 0),
(123456789, 'Prueba', 'Uno', 'prueba@ss.com', 'prueba1234', '1234', 0),
(1005187917, 'Fabian', 'Jimenez', 'fabian.jovalle@gmail.com', '2181685', '1234', 1),
(1005340350, 'Sebastian', 'Mora', 'sebasdark@outlook.es', '2181960', '27251010', 1),
(1234567891, 'Prueba', 'Tres', 'prueba3@sas.com', 'prueba3', '1234', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleboleta`
--

CREATE TABLE `detalleboleta` (
  `id` int(11) NOT NULL,
  `idboleta` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idventa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalleboleta`
--

INSERT INTO `detalleboleta` (`id`, `idboleta`, `idcliente`, `idventa`) VALUES
(2, 4, 1005340350, 7);

--
-- Disparadores `detalleboleta`
--
DELIMITER $$
CREATE TRIGGER `disminucion_boletas` AFTER INSERT ON `detalleboleta` FOR EACH ROW BEGIN 
	UPDATE boleta as p SET p.cantidad=p.cantidad-1 WHERE p.id=NEW.idboleta;
	/* UPDATE venta as v SET v.total=v.total+NEW.cantidad*(SELECT p.precio FROM producto p WHERE p.id=NEW.idproducto) WHERE v.id=NEW.idventa; */
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `restaurar_cantidadb` AFTER DELETE ON `detalleboleta` FOR EACH ROW BEGIN 
	UPDATE boleta p SET p.cantidad=p.cantidad+1 WHERE p.id=OLD.idboleta;
   /* UPDATE venta as v SET v.total=v.total-OLD.cantidad*(SELECT p.precio FROM producto p WHERE p.id=OLD.idproducto) WHERE v.id=OLD.idventa; */
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `id` int(11) NOT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `idventa` int(11) DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`id`, `idproducto`, `cantidad`, `idventa`, `idcliente`) VALUES
(24, 14, 1, NULL, 1005340350),
(25, 16, 1, NULL, 1234),
(26, 15, 4, NULL, 1234);

--
-- Disparadores `detalleventa`
--
DELIMITER $$
CREATE TRIGGER `disminucion_producto` AFTER INSERT ON `detalleventa` FOR EACH ROW BEGIN 
	UPDATE producto as p SET p.unidades=p.unidades-NEW.cantidad WHERE p.id=NEW.idproducto;
	/* UPDATE venta as v SET v.total=v.total+NEW.cantidad*(SELECT p.precio FROM producto p WHERE p.id=NEW.idproducto) WHERE v.id=NEW.idventa; */
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `restaurar_cantidad` AFTER DELETE ON `detalleventa` FOR EACH ROW BEGIN 
	UPDATE producto p SET p.unidades=p.unidades+OLD.cantidad WHERE p.id=OLD.idproducto;
   /* UPDATE venta as v SET v.total=v.total-OLD.cantidad*(SELECT p.precio FROM producto p WHERE p.id=OLD.idproducto) WHERE v.id=OLD.idventa; */
END
$$
DELIMITER ;

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
(14, 'Camiseta hombre 2021', '85000.00', 47, 'Camiseta local leoparda 100% algodon temporada 2021'),
(15, 'Pocillo Leopardo', '15000.00', 37, 'Consume tus bebidas como un verdadero hincha leopardo'),
(16, 'Kit entrenamiento', '110000.00', 37, 'Uniforme completo para los niños, incluye pantaloneta y medias');

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
(7, 1005340350, '2022-03-17', '0.00');

--
-- Disparadores `venta`
--
DELIMITER $$
CREATE TRIGGER `auditoria_venta_estado` BEFORE DELETE ON `venta` FOR EACH ROW BEGIN 
	DELETE FROM detalleventa  WHERE idventa=OLD.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `creacion_venta` AFTER UPDATE ON `venta` FOR EACH ROW BEGIN 
	UPDATE detalleboleta db,venta v SET 	db.idventa=NEW.id WHERE db.idcliente=v.idcliente AND db.idventa=NULL;
  /*  UPDATE venta v SET 	v.total=v.total+(SELECT SUM(b.precio) from detalleboleta db,boleta b WHERE db.idboleta=b.id and db.idventa=NEW.id;) WHERE db.idcliente=NEW.idcliente; */ 
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
  ADD KEY `idventa-2` (`idventa`),
  ADD KEY `id-cliente-db` (`idcliente`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id-producto` (`idproducto`),
  ADD KEY `id-venta22` (`idventa`),
  ADD KEY `idcliente-dv` (`idcliente`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleboleta`
--
ALTER TABLE `detalleboleta`
  ADD CONSTRAINT `id-cliente-db` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idventa-2` FOREIGN KEY (`idventa`) REFERENCES `venta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `id-producto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id-venta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id-venta22` FOREIGN KEY (`idventa`) REFERENCES `venta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idcliente-dv` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `id-cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
