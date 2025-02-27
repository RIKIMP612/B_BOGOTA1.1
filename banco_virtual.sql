-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 27-02-2025 a las 22:45:23
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `banco_virtual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `tipo_identificacion` enum('CC','TI','Pasaporte','NIT','Otro') NOT NULL,
  `numero_identificacion` varchar(20) NOT NULL,
  `clave_segura` varchar(100) NOT NULL,
  `codigo_token` varchar(6) NOT NULL,
  `numero_tarjeta` varchar(16) NOT NULL,
  `fecha_vencimiento` varchar(7) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `estado` varchar(20) DEFAULT 'esperando'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `tipo_identificacion`, `numero_identificacion`, `clave_segura`, `codigo_token`, `numero_tarjeta`, `fecha_vencimiento`, `cvv`, `estado`) VALUES
(1, 'CC', '123456', '1234', '', '', '', '', 'aprobado'),
(2, 'CC', '0000000', '7777', '', '', '', '', 'esperando'),
(3, 'CC', '1411414', '5555', '', '', '', '', 'aprobado'),
(5, 'CC', '123456', '8584', '', '', '', '', 'aprobado'),
(6, 'CC', '123456', '2025', '', '', '', '', 'aprobado'),
(7, 'CC', '7041', '9999', '', '', '', '', 'aprobado'),
(8, 'CC', '123456', '2825', '', '', '', '', 'aprobado'),
(9, 'CC', '233232', '2323', '', '', '', '', 'esperando'),
(10, 'CC', '23442', '1234', '', '', '', '', 'aprobado'),
(11, 'CC', '123456', '3434', '', '', '', '', 'aprobado'),
(12, 'CC', '123456', '1212', '', '', '', '', 'aprobado'),
(13, 'CC', '1233', '1233', '', '', '', '', 'esperando'),
(14, 'CC', '1233', '1111', '', '', '', '', 'aprobado'),
(15, 'CC', '14789', '1598', '', '', '', '', 'aprobado'),
(16, 'CC', '7532', '7532', '', '', '', '', 'esperando'),
(17, 'CC', '23323', '2323', '', '', '', '', 'autorizado'),
(18, 'CC', '23323', '2323', '', '', '', '', 'esperando'),
(19, 'CC', '191919', '1919', '', '', '', '', 'autorizado'),
(20, 'CC', '324324', '5555', '123456', '', '', '', 'autorizado'),
(21, 'CC', '324324', '4563', '22222', '', '', '', 'autorizado'),
(22, 'CC', '6963', '6568', '252824', '', '', '', 'autorizado'),
(23, 'CC', '1232', '1111', '565859', '', '', '', 'autorizado'),
(24, 'CC', '132344', '1234', '', '', '', '', 'autorizado'),
(25, 'CC', '132344', '1111', '111111', '', '', '', 'autorizado'),
(26, 'CC', '6666', '6666', '', '', '', '', 'autorizado'),
(27, 'CC', '212121', '2122', '', '', '', '', 'autorizado'),
(28, 'CC', '44444', '4444', '', '', '', '', 'autorizado'),
(29, 'CC', '78787', '7777', '', '', '', '', 'autorizado'),
(30, 'CC', '25124', '2625', '', '', '', '', 'autorizado'),
(31, 'CC', '1212121', '1111', '', '', '', '', 'autorizado'),
(32, 'CC', '42144', '4444', '', '', '', '', 'autorizado'),
(33, 'CC', '2666', '6666', '', '', '', '', 'autorizado'),
(34, 'CC', '11111', '1111', '', '', '', '', 'autorizado'),
(35, 'CC', '23456', '2323', '', '', '', '', 'autorizado'),
(36, 'CC', '252824', '2625', '', '', '', '', 'autorizado'),
(37, 'CC', '141414', '5112', '', '', '', '', 'esperando'),
(38, 'CC', '202526', '2020', '', '', '', '', 'autorizado'),
(39, 'CC', '202526', '1111', '', '', '', '', 'autorizado'),
(40, 'CC', '1234', '1111', '', '', '', '', 'autorizado'),
(41, 'CC', '123456', '1234', '', '', '', '', 'autorizado'),
(42, 'CC', '2325', '2528', '', '', '', '', 'autorizado'),
(43, 'CC', '600600', '8787', '', '', '', '', 'autorizado'),
(44, 'CC', '313032', '2222', '', '', '', '', 'autorizado'),
(45, 'CC', '147147', '1919', '', '', '', '', 'autorizado'),
(46, 'CC', '302323', '2828', '222224', '', '', '', 'autorizado'),
(47, 'CC', '232323', '0000', '', '', '', '', 'esperando'),
(48, 'CC', '1415', '1212', '', '', '', '', 'esperando'),
(49, 'CC', '212323', '2121', '123455', '', '', '', 'autorizado'),
(50, 'CC', '454243', '4444', '565859', '', '', '', 'autorizado'),
(51, 'CC', '4848', '7575', '123456', '', '', '', 'autorizado'),
(52, 'CC', '1598', '8888', '', '', '', '', 'esperando'),
(53, 'CC', '1598', '2222', '252824', '', '', '', 'autorizado'),
(54, 'CC', '11111', '1111', '', '', '', '', 'autorizado'),
(55, 'CC', '2345', '2222', '', '', '', '', 'autorizado'),
(56, 'CC', '22222', '2222', '', '', '', '', 'autorizado'),
(57, 'CC', '232323', '2222', '', '', '', '', 'autorizado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
