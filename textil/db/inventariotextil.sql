-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: fdb1034.awardspace.net
-- Tiempo de generación: 17-06-2024 a las 21:10:33
-- Versión del servidor: 8.0.32
-- Versión de PHP: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `4429559_inventariotextil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriasprincipales`
--

CREATE TABLE `categoriasprincipales` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categoriasprincipales`
--

INSERT INTO `categoriasprincipales` (`id`, `nombre`) VALUES
(1, 'Tejido principal'),
(2, 'Tejido secundario'),
(3, 'Fornituras'),
(4, 'Otros'),
(5, 'Hilos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Nombre del producto',
  `descripcion` text COLLATE utf8mb4_unicode_ci COMMENT 'Descripción del producto',
  `id_categoria` int DEFAULT NULL COMMENT 'ID de la categoría del producto',
  `id_subcategoria` int DEFAULT NULL COMMENT 'ID de la subcategoría del producto',
  `id_subsubcategoria` int DEFAULT NULL COMMENT 'ID de la subsubcategoría del producto',
  `observaciones` text COLLATE utf8mb4_unicode_ci COMMENT 'Observaciones adicionales del producto',
  `tamano` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tamaño del producto',
  `color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Color del producto',
  `stock_inicial` int DEFAULT NULL COMMENT 'Stock inicial del producto',
  `stock_actual` int DEFAULT '0' COMMENT 'Stock actual del producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `id_categoria`, `id_subcategoria`, `id_subsubcategoria`, `observaciones`, `tamano`, `color`, `stock_inicial`, `stock_actual`) VALUES
(1, 'Camiseta básica blanca', 'Camiseta de algodón básica en color blanco', 1, 1, NULL, 'Ideal para uso diario', 'M', 'Blanco', 50, 32),
(2, 'Vaqueros slim fit azules', 'Pantalones vaqueros ajustados de color azul', 1, 2, NULL, 'Diseño moderno y cómodo', '32/32', 'Azul', 30, 30),
(4, 'qwert', 'qwert', 3, 15, 3, 'qwert', '22', 'negro', 122, 122),
(5, 'Prueba89', 'Asd', 3, 15, 4, 'Qwe', '10', 'Rojo', 8, 8),
(6, 'Tela ejemplo', '.', 2, 4, 0, '', '15 cm', 'Transparente', 90, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `id_categoria` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `nombre`, `id_categoria`) VALUES
(1, 'Calada', 1),
(2, 'Punto', 1),
(3, 'Forros', 2),
(4, 'Entretelas', 2),
(5, 'Otros', 2),
(6, 'Corchetes y automatico', 3),
(7, 'Cintas', 3),
(8, 'Bieses', 3),
(9, 'Cordón', 3),
(10, 'Cremallera', 3),
(11, 'Cursores', 3),
(12, 'Gomas elásticas', 3),
(13, 'Hiladillo', 3),
(14, 'Galon', 3),
(15, 'Ballenas', 3),
(16, 'Botones', 3),
(17, 'Pasamanería', 4),
(18, 'Hombreras', 4),
(19, 'Texturados', 5),
(20, 'Torzal', 5),
(21, 'Poliestrer', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subsubcategorias`
--

CREATE TABLE `subsubcategorias` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `id_subcategoria` int DEFAULT NULL,
  `id_categoria_principal` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `subsubcategorias`
--

INSERT INTO `subsubcategorias` (`id`, `nombre`, `id_subcategoria`, `id_categoria_principal`) VALUES
(1, 'Gross', 7, 3),
(2, 'Tanza', 7, 3),
(3, 'Plástico', 15, 3),
(4, 'Metálicas', 15, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uso_producto`
--

CREATE TABLE `uso_producto` (
  `id` int NOT NULL,
  `id_usuario` int DEFAULT NULL,
  `id_producto` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `uso_producto`
--

INSERT INTO `uso_producto` (`id`, `id_usuario`, `id_producto`, `cantidad`, `fecha`) VALUES
(1, 1, 84, 47, '0000-00-00 00:00:00'),
(2, 1, 81, 4, '2024-06-08 00:00:00'),
(3, 3, 96, 4, '2024-06-12 00:00:00'),
(4, 3, 85, 26, '2024-06-12 00:00:00'),
(5, 1, 81, 5, '2024-06-12 00:00:00'),
(6, 1, 97, 21, '2024-06-12 00:00:00'),
(7, 1, 97, 1, '2024-06-12 20:15:14'),
(8, 5, 81, 4, '2024-06-13 17:50:34'),
(9, 1, 134, 1, '2024-06-15 20:29:28'),
(10, 1, 1, 2, '2024-06-15 20:36:26'),
(11, 1, 1, 2, '2024-06-16 17:41:52'),
(12, 1, 1, 4, '2024-06-16 21:53:53'),
(13, 1, 3, 1, '2024-06-17 17:03:13'),
(14, 1, 1, 4, '2024-06-17 17:04:09'),
(15, 1, 3, 4, '2024-06-17 17:29:37'),
(16, 1, 3, 8, '2024-06-17 17:30:14'),
(17, 1, 1, 2, '2024-06-17 17:40:34'),
(18, 1, 1, 40, '2024-06-17 17:46:12'),
(19, 1, 1, 4, '2024-06-17 18:58:58'),
(20, 1, 5, 10, '2024-06-17 19:18:37'),
(21, 11, 6, 70, '2024-06-17 20:55:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `rol` enum('admin','usuario') DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `contrasena`, `correo_electronico`, `fecha_registro`, `rol`) VALUES
(1, 'anas.rami', '$2y$10$nrzOcYD9InXTusVYqwRJr.aJcQu1aTQmyM6Iix3ewpx7UzLJ4gCYm', 'anas.rami@educa.madrid.org', '2024-05-28 17:26:31', 'admin'),
(2, 'admin', '$2y$10$3cMExtCdRY5rDM5Yid9bpepu5hexD4Sjxqw1LXw3eM3.W/OhXD61e', 'admin@gmail.com', '2024-06-17 20:48:33', 'admin'),
(10, 'usuario', '$2y$10$VFKUlZDncvmzOtqAt0zFOuBvNwg7aorwClMjLgAN3wovp2s1zszAm', 'usuario@gmail.com', '2024-06-17 20:50:28', 'usuario'),
(11, 'user.prueba', '$2y$10$91Ki5Lbfn36Uhfg9vNNKf.FLKvCa1Sd6wYuWYGHSN1JCeemvAAmYe', 'user@gmail.com', '2024-06-17 20:53:17', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoriasprincipales`
--
ALTER TABLE `categoriasprincipales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `subsubcategorias`
--
ALTER TABLE `subsubcategorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subcategoria` (`id_subcategoria`),
  ADD KEY `id_categoria_principal` (`id_categoria_principal`);

--
-- Indices de la tabla `uso_producto`
--
ALTER TABLE `uso_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  ADD UNIQUE KEY `correo_electronico` (`correo_electronico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoriasprincipales`
--
ALTER TABLE `categoriasprincipales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `subsubcategorias`
--
ALTER TABLE `subsubcategorias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `uso_producto`
--
ALTER TABLE `uso_producto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `subcategorias_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoriasprincipales` (`id`);

--
-- Filtros para la tabla `subsubcategorias`
--
ALTER TABLE `subsubcategorias`
  ADD CONSTRAINT `subsubcategorias_ibfk_1` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategorias` (`id`),
  ADD CONSTRAINT `subsubcategorias_ibfk_2` FOREIGN KEY (`id_categoria_principal`) REFERENCES `categoriasprincipales` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
