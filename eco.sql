-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2023 a las 21:27:12
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eco`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `compraProducto` (IN `p_ProductoTalleId` INT, IN `p_cantidadVender` INT)   BEGIN
    DECLARE v_ProductoTalleId INT;
    DECLARE v_cantidadProductoTalle INT;
	DECLARE v_cantidadActual INT;
    

    -- Obtener el ID en producto talle
    SELECT id INTO v_ProductoTalleId
    FROM producto_talle
    WHERE id = p_ProductoTalleId;
    
    -- Obtener cantidad en la tabla producto talle
    SELECT cantidad INTO v_cantidadProductoTalle
    FROM producto_talle
    WHERE id = p_ProductoTalleId;
    
    SET v_cantidadActual = v_cantidadProductoTalle - p_cantidadVender;

    -- Actualizar la cantidad en alumno materia
    UPDATE producto_talle
    SET cantidad = v_cantidadActual
    WHERE id = p_ProductoTalleId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `compraProductos` (IN `p_ProductoTalleId` INT, IN `p_cantidadVender` INT)   BEGIN
    DECLARE v_ProductoTalleId INT;
    DECLARE v_cantidadProductoTalle INT;
	DECLARE v_cantidadActual INT;
    

    -- Obtener el ID en producto talle
    SELECT id INTO v_ProductoTalleId
    FROM producto_talle
    WHERE id = p_ProductoTalleId;
    
    -- Obtener cantidad en la tabla producto talle
    SELECT cantidad INTO v_cantidadProductoTalle
    FROM producto_talle
    WHERE id = p_ProductoTalleId;
    
    SET v_cantidadActual = v_cantidadProductoTalle - p_cantidadVender;

    -- Actualizar la cantidad en alumno materia
    UPDATE producto_talle
    SET cantidad = v_cantidadActual
    WHERE id = p_ProductoTalleId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modProducto` (IN `p_id` INT, IN `p_nombre` VARCHAR(20), IN `p_precio` INT, IN `p_categoria` VARCHAR(20))   BEGIN
    DECLARE v_categoriaId INT;
    
    -- Obtener el ID en categoria mediante parametro
    SELECT id INTO v_categoriaId
    FROM categorias
    WHERE  categoriaNombre = p_categoria;
	UPDATE productos set nombre = p_nombre, precio = p_precio, categoriaId = v_categoriaId where id = p_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoriaNombre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoriaNombre`) VALUES
(1, 'remera'),
(2, 'buzo'),
(3, 'camisa'),
(4, 'pantalon'),
(5, 'vestido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `categoriaId` int(11) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `fechaAlta` datetime DEFAULT NULL,
  `usuarioAlta` varchar(255) DEFAULT NULL,
  `fechaMod` datetime DEFAULT NULL,
  `usuarioMod` varchar(255) DEFAULT NULL,
  `fechaBaja` datetime DEFAULT NULL,
  `usuarioBaja` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `categoriaId`, `img`, `fechaAlta`, `usuarioAlta`, `fechaMod`, `usuarioMod`, `fechaBaja`, `usuarioBaja`) VALUES
(1, 'euphoria', 9200, 1, 'img/euphoria.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'farah', 8400, 1, 'img/farah.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'helen', 7800, 1, 'img/helen.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'nerea', 6300, 1, 'img/nerea.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'nature', 5300, 1, 'img/nature.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'selena', 5600, 2, 'img/selena.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'constance', 6500, 2, 'img/constance.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'dream', 12000, 2, 'img/dream.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'lucky', 5600, 2, 'img/lucky.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'happy', 8900, 3, 'img/happy.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'margie', 8600, 3, 'img/margie.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'jackie', 14900, 3, 'img/jackie.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'ornella', 14900, 3, 'img/ornella.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'alegra', 8800, 3, 'img/allegra.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'nikki', 24800, 3, 'img/nikki.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'lukka', 15600, 4, 'img/lukka.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'dylan', 10400, 4, 'img/dylan.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'mikkel', 13900, 4, 'img/mikkel.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'selva', 22400, 5, 'img/selva.webp', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'parker', 14600, 4, 'img/parker.webp', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Disparadores `productos`
--
DELIMITER $$
CREATE TRIGGER `insertProducto` BEFORE INSERT ON `productos` FOR EACH ROW BEGIN
    SET NEW.usuarioAlta = USER();
    SET NEW.fechaAlta = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateProductos` BEFORE UPDATE ON `productos` FOR EACH ROW BEGIN
    SET NEW.usuarioMod = USER();
    SET NEW.fechaMod = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_talle`
--

CREATE TABLE `producto_talle` (
  `id` int(11) NOT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `idTalle` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_talle`
--

INSERT INTO `producto_talle` (`id`, `idProducto`, `idTalle`, `cantidad`) VALUES
(42, 1, 4, 98),
(43, 2, 4, 99),
(44, 3, 4, 99),
(45, 4, 4, 100),
(46, 5, 4, 100),
(47, 6, 4, 100),
(48, 7, 4, 100),
(49, 8, 4, 100),
(50, 9, 4, 100),
(51, 10, 4, 100),
(52, 11, 4, 100),
(53, 12, 4, 100),
(54, 13, 4, 100),
(55, 14, 4, 100),
(56, 15, 4, 100),
(57, 16, 4, 100),
(58, 17, 4, 100),
(59, 18, 4, 100),
(60, 19, 4, 100),
(61, 20, 4, 100),
(93, 1, 3, 100),
(94, 2, 3, 100),
(95, 3, 3, 100),
(96, 4, 3, 100),
(97, 5, 3, 100),
(98, 6, 3, 100),
(99, 7, 3, 100),
(100, 8, 3, 100),
(101, 9, 3, 100),
(102, 10, 3, 100),
(103, 11, 3, 100),
(104, 12, 3, 100),
(105, 13, 3, 100),
(106, 14, 3, 100),
(107, 15, 3, 100),
(108, 16, 3, 100),
(109, 17, 3, 100),
(110, 18, 3, 100),
(111, 19, 3, 100),
(112, 20, 3, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talle`
--

CREATE TABLE `talle` (
  `id` int(11) NOT NULL,
  `talleCodigo` varchar(4) DEFAULT NULL,
  `talleNombre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `talle`
--

INSERT INTO `talle` (`id`, `talleCodigo`, `talleNombre`) VALUES
(1, 'XS', 'extra pequeño'),
(2, 'S', 'pequeño'),
(3, 'M', 'medio'),
(4, 'L', 'Grande'),
(5, 'XL', 'extra grande'),
(6, 'XXL', 'doble extra grande');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `valorSalt` varchar(50) DEFAULT NULL,
  `hashContrasena` varchar(100) NOT NULL,
  `esAdmin` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `telefono`, `valorSalt`, `hashContrasena`, `esAdmin`) VALUES
(9, 'Elias', 'Alegre', 'eliasalegre96@gmail.com', '01130615889', 'ada07e0f5a8d01eebf257160f31b8e7d', '$2y$10$S1Nah4kkBKLgHJ7vTHtYXO5Exx.bquaiLecH65uez1mdADd2Luc/W', 'no'),
(12, 'Lucas', 'Navarro', 'navarrolucas4668@gmail.com', '01127535916', '885a9fa3390379f00a5b5ea492eb2a9f', '$2y$10$59JSpFY3N5161vHBnkOu6ez3zG219scm2rHkCAf3anuriqGe.T7vS', 'si'),
(13, 'pruebaUsuario', 'pa', 'prueba@gmail.com', '1127535913', 'e3c05891a4d7cd98d4e8aa061179cde1', '$2y$10$hOL1Sp48Y6yd.X4aZn047Ox/qoB6K9T.G99XGWzT3tUcuCfW07wsK', 'no');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoriaId` (`categoriaId`);

--
-- Indices de la tabla `producto_talle`
--
ALTER TABLE `producto_talle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idTalle` (`idTalle`);

--
-- Indices de la tabla `talle`
--
ALTER TABLE `talle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `producto_talle`
--
ALTER TABLE `producto_talle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `talle`
--
ALTER TABLE `talle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoriaId`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `producto_talle`
--
ALTER TABLE `producto_talle`
  ADD CONSTRAINT `producto_talle_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `producto_talle_ibfk_2` FOREIGN KEY (`idTalle`) REFERENCES `talle` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
