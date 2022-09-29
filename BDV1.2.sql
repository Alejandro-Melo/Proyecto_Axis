-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2022 a las 05:46:04
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `ID_Imagen` int(11) NOT NULL,
  `Ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_producto`
--

CREATE TABLE `imagen_producto` (
  `ID_Producto` int(11) NOT NULL,
  `ID_Imagen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE `paquete` (
  `ID_Paquete` int(11) NOT NULL,
  `Descripcion` varchar(2048) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `ID_Pedido` int(11) NOT NULL,
  `Estado` enum('Pago_Pendiente','Pago_Realizado','Enviado','Finalizado') DEFAULT NULL,
  `Fecha_pe` datetime NOT NULL,
  `Importe` int(11) NOT NULL,
  `ID_U` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_Producto` int(11) NOT NULL,
  `Cantidad_Stock` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` varchar(2048) NOT NULL,
  `Ventas` int(11) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Rut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_Producto`, `Cantidad_Stock`, `Nombre`, `Descripcion`, `Ventas`, `Precio`, `Rut`) VALUES
(1, 2, 'Agustin Mendoza S.A', 'Patata', 0, 123123, 981231);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_paquete`
--

CREATE TABLE `producto_paquete` (
  `ID_Producto` int(11) NOT NULL,
  `ID_Paquete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `Rut` int(11) NOT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`Rut`, `Direccion`, `Nombre`) VALUES
(91823, 'Varella 332323', 'Alejandro'),
(123213, 'Varella 3323', 'Alejandro'),
(981231, 'Pepeito Sacallama 2314', 'Pistacho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_telefonos`
--

CREATE TABLE `proveedor_telefonos` (
  `Rut` int(11) NOT NULL,
  `telefono` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor_telefonos`
--

INSERT INTO `proveedor_telefonos` (`Rut`, `telefono`) VALUES
(91823, '9217321-92173213213-2323113-23231131451'),
(123213, '123123-123123123123-12312312312123133'),
(981231, '0993827-096403949-2337790413');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `stock`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `stock` (
`Nombre` varchar(255)
,`Stock` int(11)
,`Ventas` int(11)
,`Precio` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_U` int(11) NOT NULL,
  `Tipo_usuario` varchar(255) NOT NULL,
  `Contrasenia` varchar(255) NOT NULL,
  `Date_creation` datetime NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_U`, `Tipo_usuario`, `Contrasenia`, `Date_creation`, `Email`, `Activo`) VALUES
(1, 'Jefe', '8640908ff2cff6a730e8d4f57d4c3c5dd10d12f2232bcfe83a575f89fb145843', '2022-09-21 17:27:28', 'alejandromelomaggio@gmail.com', 1),
(6, 'Cliente', '8640908ff2cff6a730e8d4f57d4c3c5dd10d12f2232bcfe83a575f89fb145843', '2022-09-27 23:26:09', 'jkashda@gmail.com', 0),
(8, 'Jefe', '8640908ff2cff6a730e8d4f57d4c3c5dd10d12f2232bcfe83a575f89fb145843', '2022-09-28 18:52:13', 'alejandromelogamer689@gmail.com', 0),
(10, 'Comprador', '8640908ff2cff6a730e8d4f57d4c3c5dd10d12f2232bcfe83a575f89fb145843', '2022-09-28 19:19:02', 'alejandromelogamer6389@gmail.com', 0),
(11, 'Cliente', '8640908ff2cff6a730e8d4f57d4c3c5dd10d12f2232bcfe83a575f89fb145843', '2022-09-28 22:04:23', 'uawdu2@yahoo.com', 0);

-- --------------------------------------------------------

--
-- Estructura para la vista `stock`
--
DROP TABLE IF EXISTS `stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stock`  AS SELECT `producto`.`Nombre` AS `Nombre`, `producto`.`Cantidad_Stock` AS `Stock`, `producto`.`Ventas` AS `Ventas`, `producto`.`Precio` AS `Precio` FROM `producto` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`ID_Imagen`);

--
-- Indices de la tabla `imagen_producto`
--
ALTER TABLE `imagen_producto`
  ADD KEY `ID_Producto` (`ID_Producto`),
  ADD KEY `ID_Imagen` (`ID_Imagen`);

--
-- Indices de la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`ID_Paquete`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ID_Pedido`,`ID_U`),
  ADD KEY `ID_U` (`ID_U`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_Producto`),
  ADD KEY `Rut` (`Rut`);

--
-- Indices de la tabla `producto_paquete`
--
ALTER TABLE `producto_paquete`
  ADD PRIMARY KEY (`ID_Producto`,`ID_Paquete`),
  ADD KEY `ID_Paquete` (`ID_Paquete`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Rut`);

--
-- Indices de la tabla `proveedor_telefonos`
--
ALTER TABLE `proveedor_telefonos`
  ADD PRIMARY KEY (`Rut`,`telefono`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_U`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `ID_Imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
  MODIFY `ID_Paquete` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `ID_Pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_U` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagen_producto`
--
ALTER TABLE `imagen_producto`
  ADD CONSTRAINT `imagen_producto_ibfk_1` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`),
  ADD CONSTRAINT `imagen_producto_ibfk_2` FOREIGN KEY (`ID_Imagen`) REFERENCES `imagen` (`ID_Imagen`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`ID_U`) REFERENCES `usuario` (`ID_U`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`Rut`) REFERENCES `proveedor` (`Rut`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto_paquete`
--
ALTER TABLE `producto_paquete`
  ADD CONSTRAINT `producto_paquete_ibfk_1` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`) ON DELETE CASCADE,
  ADD CONSTRAINT `producto_paquete_ibfk_2` FOREIGN KEY (`ID_Paquete`) REFERENCES `paquete` (`ID_Paquete`) ON DELETE CASCADE;

--
-- Filtros para la tabla `proveedor_telefonos`
--
ALTER TABLE `proveedor_telefonos`
  ADD CONSTRAINT `proveedor_telefonos_ibfk_1` FOREIGN KEY (`Rut`) REFERENCES `proveedor` (`Rut`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
