-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2022 a las 08:20:19
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `miaruiz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombreC` varchar(100) NOT NULL,
  `direccionC` varchar(100) NOT NULL,
  `telefonoC` varchar(50) NOT NULL,
  `fechaModC` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombreC`, `direccionC`, `telefonoC`, `fechaModC`) VALUES
(22, 'MATEO BENITEZ JUAN', 'COL. EX-NORMAL TUXTEPEC', '9128752781', '10/01/2022'),
(23, 'JOSEFINA ENRIQUEZ PEÑA', 'AV. INDEPENDENCIA NO. 241', '9128750017', '10/01/2022'),
(24, 'AGUSTINA CARRERA NEGRETE', 'AV. INDEPENDENCIA NO. 779', '9128754273', '10/01/2022'),
(25, 'VICTORIA EUGENIA CUEVAS JIMENEZ', 'AV. 20 DE NOVIEMBRE NO.1024', '9128751417', '10/01/2022'),
(26, 'CAMILO MORA MUÑOZ', 'CARRETERA A LOMA ALTA S/N.', '9128753932', '10/01/2022');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombreP` varchar(50) NOT NULL,
  `precioP` varchar(50) NOT NULL,
  `descriP` varchar(100) NOT NULL,
  `fotoP` varchar(100) NOT NULL,
  `fechaMod` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombreP`, `precioP`, `descriP`, `fotoP`, `fechaMod`) VALUES
(52, 'Spider Man', '250', 'Matel', 'Spider Maníndice111.png', '08/01/2022'),
(54, 'Pelota de basket ball', '125.50', 'Nike', 'Pelota de basket ballbasket.jpg', '10/01/2022'),
(55, 'Bisicleta', '3000', 'mzk rodada 26', 'Bisicletamkz-bicialuminioama.jpg', '10/01/2022'),
(56, 'avion', '120.5', 'matel', 'avionaavion.jpg', '10/01/2022'),
(57, 'oso de peluche', '50', 'xxxxx', 'oso de pelucheoso.jpg', '10/01/2022'),
(58, 'Bateria', '125.5', 'hasbro', 'Bateriabate.jpg', '10/01/2022');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `usuario`, `pwd`, `tipo`) VALUES
(6, 'Jesus Velasco', '202cb962ac59075b964b07152d234b70', 0),
(7, 'Judith Castillo', '202cb962ac59075b964b07152d234b70', 1),
(9, 'Keydi Castillo', '202cb962ac59075b964b07152d234b70', 0),
(11, 'mia', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  `fk_producto` int(11) NOT NULL,
  `cantidadV` int(50) NOT NULL,
  `fechaVenta` varchar(50) NOT NULL,
  `precioV` varchar(50) NOT NULL,
  `fk_vendio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `fk_cliente`, `fk_producto`, `cantidadV`, `fechaVenta`, `precioV`, `fk_vendio`) VALUES
(66, 24, 56, 1, '2022-01-10', '120.5', 7),
(67, 23, 56, 2, '2022-01-10', '120.5', 7),
(69, 25, 57, 3, '2022-01-09', '50', 7),
(70, 24, 55, 1, '2022-01-09', '3000', 7),
(71, 23, 52, 1, '2022-01-10', '250', 6),
(72, 24, 54, 2, '2022-01-09', '125.50', 6),
(73, 25, 57, 1, '2022-01-26', '50', 6),
(74, 26, 58, 3, '2022-01-13', '125.5', 7),
(75, 26, 52, 3, '2022-01-09', '250', 7),
(77, 24, 56, 1, '2022-01-11', '120.5', 11);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `ventas_ibfk_1` (`fk_producto`),
  ADD KEY `fk_cliente` (`fk_cliente`),
  ADD KEY `ventas_ibfk_3` (`fk_vendio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`fk_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`fk_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`fk_vendio`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
