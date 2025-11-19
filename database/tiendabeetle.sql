-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2025 a las 20:33:29
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
-- Base de datos: `tiendabeetle`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails_predefinidos`
--

CREATE TABLE `emails_predefinidos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `cuerpo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `instrucciones` text DEFAULT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `estado` enum('pendiente','confirmado','cancelado') DEFAULT 'pendiente',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `producto_id`, `provincia`, `ciudad`, `direccion`, `instrucciones`, `descripcion`, `imagen`, `estado`, `fecha`) VALUES
(1, 4, 1, 'Misiones', 'Posadas', 'Calle Falsa 213', 'Casa de porton verde', 'Quiero la imagen centrada en la taza', '1763570755_gatosYinYan.jpg', 'confirmado', '2025-11-19 16:45:55'),
(3, 4, 3, 'Misiones', 'Misiones', 'Calle Falsa 123', 'Casa de porton verde', 'Quiero la estampa en medio de la botella', '1763571251_imperialesLogo (2).png', 'cancelado', '2025-11-19 16:54:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `destacado` tinyint(1) NOT NULL DEFAULT 0,
  `stock` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT 1,
  `creado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `imagen`, `nombre`, `categoria`, `descripcion`, `precio`, `destacado`, `stock`, `estado`, `creado`) VALUES
(1, 'imgs/tazaCeramicaNacional.png', 'Taza de Cerámica Nacional', 'Cerámica', 'Dimensiones: 9,5cm de alto por 8cm de diámetro.', 8000, 1, 24, 1, '2025-11-17 17:27:09'),
(2, 'imgs/botellaHomero.png', 'Botella de Plástico 500cc', 'Plástico', 'Botella de plástico no hermética. Dimensiones: 16cm de alto por 7,5cm de diámetro.', 12000, 0, 6, 0, '2025-11-17 17:30:43'),
(3, 'imgs/botellaAluminio.png', 'Botella de Aluminio', 'Metálico', 'Botella de aluminio hermética. Dimensiones: 16cm de alto por 7,5 de diámetro.', 16000, 1, 6, 1, '2025-11-17 17:30:43'),
(4, 'imgs/tazaPlastico.png', 'Taza de Plástico', 'Plástico', 'Dimensiones: 9,5cm de alto por 8cm de diámetro.', 4000, 0, 0, 1, '2025-11-17 17:32:26'),
(5, 'imgs/vasoCafe.png', 'Vaso de Café', 'Plástico', 'Vaso de café de plástico no hermético.', 6000, 0, 3, 1, '2025-11-17 17:34:52'),
(6, 'imgs/mateChico.png', 'Mate de Cerámica', 'Cerámica', 'Dimensiones: 9cm de alto y 8cm de diámetro.', 9000, 1, 4, 1, '2025-11-17 17:34:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `contraseña` text DEFAULT NULL,
  `rol` int(11) DEFAULT 0,
  `estado` int(11) NOT NULL DEFAULT 1,
  `creado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `usuario`, `contraseña`, `rol`, `estado`, `creado`) VALUES
(2, 'sebamatiasmonzon@gmail.com', 'Sebastian Monzon', '$2y$10$ac.uB9ZuSA8IJhJnhZlFhOoGHyiL5TEtdO8klbBlV4vfCTV08XSZm', 1, 1, '2025-11-16 19:33:18'),
(3, 'antonellagxomez00@gmail.com', 'antonella', '$2y$10$we7peo/oBcXsnbf/oFThzuDJCyorxNwqcoJxcgDKKU73Su.jsWcYa', 0, 1, '2025-11-17 18:55:29'),
(4, 'zebamonzon@hotmail.com', 'Bobolo', '$2y$10$SfHlSL8QdtQkaMza9YOFbeUDMnp4es8uB8XIpDkQfwSoWzFpoETg6', 0, 1, '2025-11-19 16:22:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `emails_predefinidos`
--
ALTER TABLE `emails_predefinidos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `emails_predefinidos`
--
ALTER TABLE `emails_predefinidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
