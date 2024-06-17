-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-05-2024 a las 21:16:19
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.13
USE inventariotextil
-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventariotextil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriasprincipales`
--

DROP TABLE IF EXISTS `categoriasprincipales`;
CREATE TABLE IF NOT EXISTS `categoriasprincipales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categoriasprincipales`
--

INSERT INTO `categoriasprincipales` (`id`, `nombre`, `codigo`) VALUES
(1, 'tejido principal', '01'),
(2, 'tejido secundario', '02'),
(3, 'fornituras', '03'),
(4, 'otros', '04'),
(5, 'hilos', '05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `id_categoria` int DEFAULT NULL,
  `id_subcategoria` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_subcategoria` (`id_subcategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `id_categoria`, `id_subcategoria`) VALUES
(1, 'Pantalón Vaquero', 'Pantalón vaquero ajustado para mujer con diseño desgastado', 1, 2),
(2, 'Sudadera con Capucha', 'Sudadera con capucha y bolsillo delantero para hombre, disponible en varios colores', 1, 3),
(3, 'Vestido de Fiesta', 'Vestido de fiesta largo con escote en V y detalles de encaje', 2, 4),
(4, 'Zapatillas Deportivas', 'Zapatillas deportivas para correr con suela de alta amortiguación, ideales para entrenamientos intensos', 3, 5),
(5, 'Camisa de Algodón', 'Camisa de algodón de manga larga con cuello clásico y botones frontales', 1, 1),
(6, 'Blusa Floral', 'Blusa con estampado floral y mangas acampanadas, perfecta para ocasiones casuales', 1, 1),
(7, 'Jersey de Punto', 'Jersey de punto suave con cuello redondo y diseño texturizado', 1, 2),
(8, 'Bufanda Tejida', 'Bufanda tejida a mano con lana de alta calidad, ideal para los días fríos de invierno', 1, 2),
(9, 'Chaqueta Acolchada', 'Chaqueta acolchada con capucha desmontable y bolsillos con cremallera', 2, 3),
(10, 'Abrigo de Lana', 'Abrigo largo de lana con cinturón ajustable y forro interior suave', 2, 3),
(11, 'Cinturón de Cuero', 'Cinturón de cuero genuino con hebilla metálica resistente, disponible en diferentes tamaños', 2, 4),
(12, 'Bolso de Mano', 'Bolso de mano elegante con correa ajustable y compartimentos internos, ideal para llevar tus objetos esenciales', 2, 4),
(13, 'Cartera de Cuero', 'Cartera de cuero con múltiples ranuras para tarjetas y bolsillo con cremallera para monedas', 2, 5),
(14, 'Billetera de Piel', 'Billetera de piel de alta calidad con grabado en relieve y compartimentos para billetes y tarjetas', 2, 5),
(15, 'Pantalón de Mezclilla', 'Pantalón de mezclilla recto con efecto desgastado y detalles de roturas', 3, 6),
(16, 'Falda Plisada', 'Falda plisada midi con estampado floral y cintura elástica, perfecta para un look femenino y elegante', 3, 6),
(17, 'Vestido Casual', 'Vestido casual de algodón con estampado a rayas y cuello redondo, ideal para el día a día', 3, 7),
(18, 'Blusa Elegante', 'Blusa elegante de manga larga con cuello en V y detalles de encaje en las mangas', 3, 7),
(19, 'Chaqueta de Cuero', 'Chaqueta de cuero clásica con cierre de cremallera y bolsillos con solapa, perfecta para un estilo urbano', 3, 8),
(20, 'Gabardina Impermeable', 'Gabardina impermeable con cinturón ajustable y cuello alto, ideal para los días lluviosos de primavera', 3, 8),
(21, 'Camiseta de Algodón', 'Camiseta básica de algodón con cuello redondo y manga corta, ideal para el uso diario', 3, 9),
(22, 'Pantalón Chino', 'Pantalón chino de tela ligera y corte slim fit, perfecto para un look casual', 3, 9),
(23, 'Suéter de Lana Merino', 'Suéter de lana merino con cuello de pico y tejido suave, ideal para mantenerse abrigado en invierno', 3, 10),
(24, 'Abrigo de Plumón', 'Abrigo de plumón ligero y compacto con capucha desmontable, perfecto para viajes en climas fríos', 3, 10),
(25, 'Camisa Formal', 'Camisa formal de algodón con cuello italiano y puños abotonados, ideal para ocasiones especiales', 3, 11),
(26, 'Traje de Tres Piezas', 'Traje de tres piezas compuesto por saco, pantalón y chaleco, confeccionado en tejido de alta calidad', 3, 11),
(27, 'Chaqueta Vaquera', 'Chaqueta vaquera clásica con cierre de botones y bolsillos frontales, perfecta para un estilo retro', 3, 12),
(28, 'Falda de Cuero', 'Falda de cuero midi con detalle de botones en la parte delantera y cierre lateral, ideal para un look moderno', 3, 12),
(29, 'Parka Acolchada', 'Parka acolchada con capucha y ribetes de piel sintética, resistente al agua y al viento', 3, 13),
(30, 'Chaleco de Lana', 'Chaleco de lana acolchado con cierre de cremallera y bolsillos laterales, perfecto para combinar con otras prendas', 3, 13),
(31, 'Vestido de Encaje', 'Vestido de encaje elegante y femenino con escote en V y falda plisada, ideal para eventos formales', 3, 14),
(32, 'Mono de Mezclilla', 'Mono de mezclilla con cierre frontal y cinturón ajustable, perfecto para un look casual y moderno', 3, 14),
(33, 'Pantalón Cargo', 'Pantalón cargo con múltiples bolsillos y cintura ajustable, ideal para actividades al aire libre', 3, 15),
(34, 'Jersey de Punto Grueso', 'Jersey de punto grueso con cuello alto y diseño de ochos, ideal para los días más fríos del año', 3, 15),
(35, 'Abrigo de Lana Camel', 'Abrigo de lana en color camel con cierre cruzado y cinturón a juego, elegante y atemporal', 3, 16),
(36, 'Chaqueta Bomber', 'Chaqueta bomber ligera con estampado floral y detalles elásticos en cuello, puños y bajo', 3, 16),
(37, 'Saco de Traje', 'Saco de traje entallado con solapas en pico y bolsillos con tapeta, perfecto para ocasiones formales', 3, 17),
(38, 'Vestido de Punto', 'Vestido de punto acanalado con cuello alto y manga larga, cómodo y versátil para el día a día', 3, 17),
(39, 'Sudadera Oversize', 'Sudadera oversize con capucha y estampado gráfico en la parte delantera, ideal para un look urbano', 3, 18),
(40, 'Pantalón de Cuero', 'Pantalón de cuero ajustado con detalle de cremalleras en los bolsillos, perfecto para un estilo rockero', 3, 18),
(41, 'Cazadora Biker', 'Cazadora biker de piel con detalles acolchados en hombros y codos, imprescindible para un look rebelde', 3, 19),
(42, 'Gabardina Clásica', 'Gabardina clásica en color beige con cinturón ajustable y botones frontales, un básico atemporal', 3, 19),
(43, 'Chaquetón de Lana', 'Chaquetón de lana gruesa con cierre de botones y cuello alto, ideal para enfrentar los días más fríos del invierno', 3, 20),
(44, 'Parka Militar', 'Parka militar con capucha y bolsillos cargo, resistente y funcional para actividades al aire libre', 3, 20),
(45, 'Pantalón Jogger', 'Pantalón jogger de tela ligera y cintura elástica con cordón ajustable, cómodo y moderno para el día a día', 3, 21),
(46, 'Chaqueta Acolchada', 'Chaqueta acolchada con estampado camuflado y capucha desmontable, perfecta para un estilo urbano', 3, 21),
(47, 'Jersey de Cuello Alto', 'Jersey de cuello alto de punto grueso con detalle de trenzas y puños acanalados, ideal para los días fríos', 4, 22),
(48, 'Cardigan de Lana', 'Cardigan de lana con botones frontales y bolsillos laterales, versátil y cómodo para cualquier ocasión', 4, 22),
(49, 'Blazer de Terciopelo', 'Blazer de terciopelo con solapas de satén y cierre de un botón, elegante y sofisticado para eventos especiales', 4, 23),
(50, 'Chaqueta de Tweed', 'Chaqueta de tweed entallada con botones dorados y bolsillos con solapa, un clásico atemporal perfecto para el entretiempo', 4, 23),
(51, 'Vestido de Seda', 'Vestido de seda con estampado floral y escote en V, ligero y delicado para ocasiones especiales', 4, 24),
(52, 'Falda Midi Plisada', 'Falda midi plisada de tela satinada con estampado a rayas y cintura elástica, elegante y versátil', 4, 24),
(53, 'Blusa de Encaje', 'Blusa de encaje transparente con escote en pico y mangas acampanadas, ideal para un look romántico', 4, 25),
(54, 'Top de Croché', 'Top de croché con tirantes finos y diseño calado, perfecto para combinar con prendas de verano', 4, 25),
(55, 'Pantalón Palazzo', 'Pantalón palazzo de tela fluida y cintura alta con estampado de lunares, elegante y cómodo para cualquier ocasión', 4, 26),
(56, 'Mono de Lino', 'Mono de lino con escote halter y cinturón anudado en la cintura, fresco y ligero para el verano', 4, 26),
(57, 'Chaqueta Kimono', 'Chaqueta kimono de estilo japonés con estampado floral y cinturón a juego, perfecta para un look boho', 4, 27),
(58, 'Vestido Camisero', 'Vestido camisero de popelín con estampado de cuadros y cinturón anudado, ideal para un estilo preppy', 4, 27),
(59, 'Blusa Sin Mangas', 'Blusa sin mangas de gasa con detalle de volantes y escote en pico, fresca y femenina para el verano', 4, 28),
(60, 'Camiseta de Rayas', 'Camiseta de rayas marineras con cuello redondo y manga corta, un básico imprescindible en cualquier armario', 4, 28),
(61, 'Pantalón Culotte', 'Pantalón culotte de tiro alto y tejido ligero con pliegues en la parte delantera, elegante y moderno', 4, 29),
(62, 'Vestido Wrap', 'Vestido wrap cruzado con estampado de lunares y cinturón a juego, favorecedor y versátil para cualquier ocasión', 4, 29),
(63, 'Blusa Peplum', 'Blusa peplum de crepé con escote barco y detalle fruncido en la cintura, femenina y elegante para eventos formales', 4, 30),
(64, 'Sudadera con Capucha', 'Sudadera con capucha y bolsillo canguro, perfecta para un look casual y cómodo en cualquier momento', 4, 30),
(65, 'Pantalón de Tiro Alto', 'Pantalón de tiro alto de tela elástica y corte recto, versátil y favorecedor para cualquier ocasión', 5, 31),
(66, 'Shorts Vaqueros', 'Shorts vaqueros de tiro alto y corte boyfriend con rotos y desgastados, ideales para un look desenfadado', 5, 31),
(67, 'Falda Vaquera', 'Falda vaquera de cintura alta y corte A con botones frontales y bolsillos laterales, un básico versátil para el verano', 5, 32),
(68, 'Vestido Camisero Vaquero', 'Vestido camisero vaquero con cinturón a juego y detalle de bolsillos, perfecto para un estilo casual y desenfadado', 5, 32),
(69, 'Chaquetón de Piel', 'Chaquetón de piel sintética con cierre de cremallera y detalle de cinturón en la cintura, ideal para abrigarse con estilo', 5, 33),
(70, 'Abrigo de Lana Camel', 'Abrigo de lana en color camel con cierre cruzado y cinturón a juego, elegante y atemporal', 5, 33),
(71, 'Saco de Punto Oversize', 'Saco de punto oversize con diseño de ochos y bolsillos frontales, ideal para un look casual y relajado', 5, 34),
(72, 'Jersey de Cuello Alto', 'Jersey de cuello alto de punto grueso con detalle de trenzas y puños acanalados, ideal para los días fríos', 5, 34),
(73, 'Cardigan de Punto', 'Cardigan de punto con botones frontales y bolsillos laterales, versátil y cómodo para cualquier ocasión', 5, 35),
(74, 'Blazer de Tweed', 'Blazer de tweed entallado con solapas de pico y bolsillos con tapeta, elegante y sofisticado para cualquier ocasión', 5, 35),
(75, 'Chaqueta Acolchada', 'Chaqueta acolchada ligera con cierre de cremallera y bolsillos laterales, perfecta para el entretiempo', 5, 36),
(76, 'Parka de Plumón', 'Parka de plumón con capucha desmontable y ribetes de piel sintética, resistente al agua y al viento', 5, 36),
(77, 'Chaqueta Vaquera Oversize', 'Chaqueta vaquera oversize con efecto desgastado y detalle de borreguito en el cuello y puños, ideal para un look urbano', 5, 37),
(78, 'Sudadera Estampada', 'Sudadera estampada con capucha y detalle de bolsillo canguro, cómoda y versátil para el día a día', 5, 37),
(79, 'Camisa de Franela', 'Camisa de franela a cuadros con cuello button-down y bolsillo en el pecho, perfecta para un look casual de estilo lumberjack', 5, 38),
(80, 'Pantalón Cargo', 'Pantalón cargo con múltiples bolsillos y cintura ajustable, ideal para actividades al aire libre', 5, 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

DROP TABLE IF EXISTS `subcategorias`;
CREATE TABLE IF NOT EXISTS `subcategorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `id_categoria` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `nombre`, `id_categoria`) VALUES
(1, 'CALADA', 1),
(2, 'PUNTO', 1),
(3, 'FORROS', 2),
(4, 'ENTRETELAS', 2),
(5, 'OTROS', 2),
(6, 'Corchetes y autom', 3),
(7, 'Cintas', 3),
(8, 'Gross', 3),
(9, 'tanza', 3),
(10, 'bieses', 3),
(11, 'cord', 3),
(12, 'cremallera', 3),
(13, 'cremallera invisible', 3),
(14, 'cursores', 3),
(15, 'gomas el', 3),
(16, 'Hiladillo (blanco y negro)', 3),
(17, 'Gal', 3),
(18, 'Ballenas', 3),
(19, 'Pl', 3),
(20, 'Met', 3),
(21, 'Botones', 3),
(22, 'PASAMANERIA', 4),
(23, 'HOMBRERAS', 4),
(24, 'Texturados', 5),
(25, 'Torzal', 5),
(26, 'Poliester', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `rol` enum('admin','usuario') DEFAULT 'usuario',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  UNIQUE KEY `correo_electronico` (`correo_electronico`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `contrasena`, `correo_electronico`, `fecha_registro`, `rol`) VALUES
(1, 'anas.rami', '$2y$10$nrzOcYD9InXTusVYqwRJr.aJcQu1aTQmyM6Iix3ewpx7UzLJ4gCYm', 'anas.rami@educa.madrid.org', '2024-05-28 17:26:31', 'admin'),
(2, 'david.busto', '$2y$10$XWkOI/.RpzBEMd0G2A7mVOerHrOXSMPTfp.KIzH8U9IC8NsfZFFKm', 'david.busto@educa.madrid.org', '2024-05-28 17:26:32', 'usuario');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `fk_subcategorias_categoriasprincipales` FOREIGN KEY (`id_categoria`) REFERENCES `categoriasprincipales` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
