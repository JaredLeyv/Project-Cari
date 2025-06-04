-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 04-06-2025 a las 05:11:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `leyvaley`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `ID_Administrador` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Numero_Celular` varchar(10) DEFAULT NULL,
  `Username` varchar(20) NOT NULL,
  `Passwordd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`ID_Administrador`, `Nombre`, `Apellidos`, `Numero_Celular`, `Username`, `Passwordd`) VALUES
(1, 'Admi', 'Admi', '2333333', 'Admi', 'Admi'),
(6, 'Alessandriii', 'asdsa', 'sasas', 'asas', 'asa'),
(7, 'a', 'a', 'a', 'a', 'a'),
(8, 'Cris', 'Sala', '2323', 'cr', 'cr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `NombreProducto` varchar(25) NOT NULL,
  `Precio` float NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Nombre` varchar(20) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Numero_Celular` varchar(10) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Username` varchar(20) NOT NULL,
  `Passwordd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Nombre`, `Apellidos`, `Numero_Celular`, `Direccion`, `Username`, `Passwordd`) VALUES
('branduu', 'branduu', '3523532454', NULL, 'brand', 'brand'),
('Criss', 'Leyva', '454646', NULL, 'jared', 'null'),
('dasf', 'dasda', '243434', NULL, 'a', 'a'),
('Fernanda', 'Soliz', '3453553', NULL, 'fer', 'fer'),
('Jared ', 'Leyva', '24243535', NULL, 'jared', 'jared');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `Folio` int(11) NOT NULL,
  `NombreCliente` varchar(20) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Pago` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`Folio`, `NombreCliente`, `Fecha`, `Pago`) VALUES
(1, 'Jared ', '2024-05-28', 19),
(2, 'Jared ', '2024-05-28', 19),
(3, 'Jared ', '2024-05-28', 19),
(4, 'Jared ', '2024-05-28', 19),
(5, 'Jared ', '2024-05-28', 19),
(6, 'Jared ', '2024-05-28', 19),
(7, 'Jared ', '2024-05-28', 19),
(8, 'branduu', '2024-05-28', NULL),
(9, 'branduu', '2024-05-28', 91),
(10, 'branduu', '2024-05-28', 21),
(11, 'branduu', '2024-05-28', 52),
(12, 'branduu', '2024-05-28', 71),
(13, 'branduu', '2024-05-28', 49),
(14, 'branduu', '2024-05-28', 65),
(15, 'branduu', '2024-05-28', 158),
(16, 'branduu', '2024-05-28', 81),
(17, 'branduu', '2024-05-28', 71),
(18, 'Jared ', '2024-05-28', NULL),
(19, 'Fernanda', '2024-05-28', 19),
(20, 'Jared ', '2024-05-28', 19.15),
(21, 'Jared ', '2024-05-28', 19.15),
(22, 'Jared ', '2024-05-28', 89),
(23, 'Jared ', '2024-05-28', 72.15),
(24, 'Jared ', '2024-05-29', 74),
(25, 'Jared ', '2024-05-29', 37),
(26, 'Jared ', '2024-05-29', 37),
(27, 'Jared ', '2024-05-29', 37),
(28, 'Jared ', '2024-05-29', 37),
(29, 'Jared ', '2024-05-29', 37),
(30, 'Jared ', '2024-05-29', 115),
(31, 'Jared ', '2024-05-29', NULL),
(32, 'Jared ', '2024-05-29', 69),
(33, 'Jared ', '2024-05-29', 46),
(34, 'Jared ', '2024-05-29', 273.65),
(35, 'Jared ', '2024-05-29', 10),
(36, 'Jared ', '2024-05-29', 10),
(37, 'Jared ', '2024-05-29', 10),
(38, 'Jared ', '2024-05-29', 21),
(39, 'Jared ', '2024-05-29', 21),
(40, 'Jared ', '2024-05-29', 10),
(41, 'Jared ', '2024-05-29', 10),
(42, 'Jared ', '2024-05-29', 19.15),
(43, 'Jared ', '2024-05-29', 191.5),
(44, 'Jared ', '2024-05-29', 21),
(45, 'Jared ', '2024-05-29', 16),
(46, 'Jared ', '2024-05-29', 23),
(47, 'Jared ', '2024-05-29', 32.13),
(48, 'Jared ', '2024-05-29', 75.34),
(49, 'Jared ', '2024-05-29', 134.05),
(50, 'Jared ', '2024-05-29', 63),
(51, 'Jared ', '2024-05-29', 21),
(52, 'Jared ', '2024-05-29', 57.45),
(53, 'Jared ', '2024-05-29', 42),
(54, 'Jared ', '2024-05-29', 57.45),
(55, 'Jared ', '2024-05-29', 10),
(56, 'Jared ', '2024-05-29', 21),
(57, 'Jared ', '2024-05-29', 42),
(58, 'Jared ', '2024-05-30', 60),
(59, 'Jared ', '2024-05-30', 168),
(60, 'Jared ', '2024-05-30', 230),
(61, 'Jared ', '2024-05-30', 19.15),
(62, 'Jared ', '2024-05-30', 18),
(63, 'Jared ', '2024-05-30', 306.4),
(64, 'Jared ', '2024-05-30', 21),
(65, 'Jared ', '2024-05-30', 462),
(66, 'Jared ', '2024-05-31', 10),
(67, 'Criss', '2025-04-10', 31),
(68, 'Criss', '2025-05-28', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID_Producto` int(11) NOT NULL,
  `NombreProducto` varchar(25) NOT NULL,
  `Categoria` varchar(20) DEFAULT NULL,
  `Precio` float DEFAULT NULL,
  `Existencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID_Producto`, `NombreProducto`, `Categoria`, `Precio`, `Existencia`) VALUES
(1, 'Coca 600 ml', 'Refrescos', 21, 0),
(3, 'Chokis 73gr', 'Galletas', 19.15, 0),
(4, 'Gatorade 500ml', 'Variados', 23, 0),
(5, 'Arroz Maisa 500gr', 'Abarrotes', 10, 5),
(6, 'Elote Herdez 300gr', 'Abarrotes', 16.04, 1),
(8, 'Doritos Nacho 73gr', 'Sabritas', 21, 2),
(9, 'Cheetos Flaming 70gr', 'Sabritas', 16.09, 110),
(10, 'Pepsi 600ml', 'Refrescos', 18, 3),
(11, 'Emperador Senzo 70gr', 'Galletas', 19, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoxpedido`
--

CREATE TABLE `productoxpedido` (
  `Folio` int(11) NOT NULL,
  `NombreProducto` varchar(25) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productoxpedido`
--

INSERT INTO `productoxpedido` (`Folio`, `NombreProducto`, `cantidad`) VALUES
(1, 'Chokis 73gr', 1),
(2, 'Chokis 73gr', 1),
(3, 'Chokis 73gr', 1),
(4, 'Chokis 73gr', 1),
(5, 'Chokis 73gr', 1),
(6, 'Chokis 73gr', 1),
(7, 'Chokis 73gr', 1),
(9, 'Chokis 73gr', 1),
(9, 'Coca 2lt ', 2),
(10, 'Coca 600 ml', 1),
(11, 'Coca 2lt ', 1),
(11, 'Elote Herdez 300gr', 1),
(12, 'Chokis 73gr', 1),
(12, 'Coca 2lt ', 1),
(12, 'Elote Herdez 300gr', 1),
(13, 'Arroz Maisa 500gr', 1),
(13, 'Cheetos Flaming 70gr', 1),
(13, 'Gatorade 500ml', 1),
(14, 'Arroz Maisa 500gr', 1),
(14, 'Cheetos Flaming 70gr', 1),
(14, 'Elote Herdez 300gr', 1),
(14, 'Gatorade 500ml', 1),
(15, 'Arroz Maisa 500gr', 5),
(15, 'Coca 2lt ', 3),
(16, 'Arroz Maisa 500gr', 1),
(16, 'Chokis 73gr', 1),
(16, 'Coca 2lt ', 1),
(16, 'Elote Herdez 300gr', 1),
(17, 'Chokis 73gr', 1),
(17, 'Coca 2lt ', 1),
(17, 'Elote Herdez 300gr', 1),
(19, 'Chokis 73gr', 1),
(20, 'Chokis 73gr', 1),
(21, 'Chokis 73gr', 1),
(22, 'Arroz Maisa 500gr', 1),
(22, 'Coca 2lt ', 1),
(22, 'Coca 600 ml', 1),
(22, 'Doritos Nacho 73gr', 1),
(23, 'Cheetos Flaming 70gr', 1),
(23, 'Chokis 73gr', 1),
(23, 'Coca 2lt ', 1),
(24, 'Coca 2lt ', 2),
(25, 'Coca 2lt ', 1),
(26, 'Coca 2lt ', 1),
(27, 'Coca 2lt ', 1),
(28, 'Coca 2lt ', 1),
(29, 'Coca 2lt ', 1),
(30, 'Gatorade 500ml', 5),
(32, 'Gatorade 500ml', 3),
(33, 'Gatorade 500ml', 2),
(34, 'Chokis 73gr', 11),
(34, 'Coca 600 ml', 3),
(35, 'Arroz Maisa 500gr', 1),
(36, 'Arroz Maisa 500gr', 1),
(37, 'Arroz Maisa 500gr', 1),
(38, 'Doritos Nacho 73gr', 1),
(39, 'Doritos Nacho 73gr', 1),
(40, 'Arroz Maisa 500gr', 1),
(41, 'Arroz Maisa 500gr', 1),
(42, 'Chokis 73gr', 1),
(43, 'Chokis 73gr', 10),
(44, 'Coca 600 ml', 1),
(45, 'Elote Herdez 300gr', 1),
(46, 'Gatorade 500ml', 1),
(47, 'Cheetos Flaming 70gr', 1),
(47, 'Elote Herdez 300gr', 1),
(48, 'Chokis 73gr', 2),
(48, 'Coca 600 ml', 1),
(48, 'Elote Herdez 300gr', 1),
(49, 'Chokis 73gr', 7),
(50, 'Coca 600 ml', 3),
(51, 'Coca 600 ml', 1),
(52, 'Chokis 73gr', 3),
(53, 'Coca 2lt ', 1),
(53, 'Coca 600 ml', 1),
(54, 'Chokis 73gr', 3),
(55, 'Arroz Maisa 500gr', 1),
(56, 'Coca 600 ml', 1),
(57, 'Coca 600 ml', 2),
(58, 'Arroz Maisa 500gr', 6),
(59, 'Coca 2lt ', 8),
(60, 'Gatorade 500ml', 10),
(61, 'Chokis 73gr', 1),
(62, 'Pepsi 600ml', 1),
(63, 'Chokis 73gr', 16),
(64, 'Coca 600 ml', 1),
(65, 'Coca 600 ml', 22),
(66, 'Arroz Maisa 500gr', 1),
(67, 'Arroz Maisa 500gr', 1),
(67, 'Doritos Nacho 73gr', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID_Administrador`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`NombreProducto`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Nombre`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`Folio`,`NombreCliente`),
  ADD KEY `NombreCliente` (`NombreCliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_Producto`);

--
-- Indices de la tabla `productoxpedido`
--
ALTER TABLE `productoxpedido`
  ADD PRIMARY KEY (`Folio`,`NombreProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `ID_Administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `Folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`NombreCliente`) REFERENCES `clientes` (`Nombre`);

--
-- Filtros para la tabla `productoxpedido`
--
ALTER TABLE `productoxpedido`
  ADD CONSTRAINT `productoxpedido_ibfk_1` FOREIGN KEY (`Folio`) REFERENCES `pedidos` (`Folio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
