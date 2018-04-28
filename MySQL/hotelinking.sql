-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2018 a las 19:58:09
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotelinking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codes`
--

CREATE TABLE `codes` (
  `idCode` int(11) NOT NULL,
  `code` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `redeemed` varchar(1) COLLATE utf8_bin DEFAULT NULL,
  `idUs` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `codes`
--

INSERT INTO `codes` (`idCode`, `code`, `redeemed`, `idUs`, `updated_at`, `created_at`) VALUES
(6, 'prova', 's', 2, '2018-04-27', '2018-04-27'),
(8, '5ae49f879927f', 's', 2, NULL, NULL),
(9, '5ae49fa7b7262', 's', 2, NULL, NULL),
(10, '5ae49ff0823d3', 's', 2, NULL, NULL),
(11, '5ae4a25f70b50', 's', 2, NULL, NULL),
(12, '5ae4a27a098e1', 'n', 2, NULL, NULL),
(13, '5ae4a2859c140', 'n', 2, NULL, NULL),
(14, '5ae4a30793b5b', 's', 2, NULL, NULL),
(15, '5ae4b42f1f041', 'n', 2, NULL, NULL),
(16, '5ae4b436d501a', 'n', 2, NULL, NULL),
(17, '5ae4b50b5889a', 'n', 26, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `user` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `pass` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `user`, `pass`, `updated_at`, `created_at`) VALUES
(2, 'nasicoll22@gmail.com', 'Ignasi', 'hola', '2018-04-27', '2018-04-27'),
(25, 'tomas@gmail.com', 'Tomas', 'tomas', NULL, NULL),
(26, 'jose@gmail.com', 'Jose', 'jose', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`idCode`),
  ADD KEY `idUs` (`idUs`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `codes`
--
ALTER TABLE `codes`
  MODIFY `idCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `codes`
--
ALTER TABLE `codes`
  ADD CONSTRAINT `codes_ibfk_1` FOREIGN KEY (`idUs`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
