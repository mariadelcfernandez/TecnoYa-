-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2021 a las 04:46:52
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fernandez_maria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(10) NOT NULL,
  `descripcion` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `descripcion`) VALUES
(1, 'Computadoras'),
(2, 'Monitores'),
(3, 'Almacenamiento'),
(4, 'Accesorios'),
(5, 'Audios-Videos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `consulta_id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `telefono` varchar(13) COLLATE latin1_general_ci NOT NULL,
  `mensaje` varchar(130) COLLATE latin1_general_ci NOT NULL,
  `baja` varchar(10) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`consulta_id`, `nombre`, `email`, `telefono`, `mensaje`, `baja`) VALUES
(1, 'Carlos Gamarra', 'caarlos@gmail.com', '3795120404', 'Hola buen día\r\nQuisiera saber a que precio esta el Disco solido 480 gb. Gracias', 'SI'),
(2, 'Gonzalez Alex', 'alex25@gmail.com', '3794602523', 'Hola buenas.\r\nPodrían decirme si tienen en stock y a que precio esta el cable HDMI de 3 metros. Muchas gracias', 'SI'),
(3, 'Mirtha Campos', 'Mirta@hotmail.com', '3794251308', 'Hola mundo', 'NO'),
(4, 'Horacio Ruben', 'horacio@gmail.com', '3794251288', 'Quisiera saber a que precio esta una Pc con Disco de 1TB, 16GB de Ram- Placa de Video de 6 GB y Mouse teclado. Gracias', 'NO'),
(5, ' Javier Altamirano', 'javier@gmail.com', '3794361385', 'Hola. Quisiera saber a que precio esta una Noteboock  Lenovo con Disco de 1TB, 16GB de Ram- Placa de Video de 6 GB y Mouse tclado.', 'NO'),
(6, 'Ricardo Eschvesters', 'ricardo@gmail.com', '3794254072', 'Hola buen día. Quisiera saber a que precio esta una computadora con Disco de 1TB, 16GB de Ram- Placa de Video de 6 GB y Mouse tcla', 'NO'),
(7, 'Ricardo Eschvesters', 'ricardos@gmail.com', '3794254072', 'Hola buen día. Quisiera saber a que precio esta una computadora con Disco de 1TB, 16GB de Ram- Placa de Video de 6 GB y Mouse tcla', 'NO'),
(8, 'Ricardo Eschvesters', 'ricchar@gmail.com', '3795666998', 'Hola. Podrían decirme si arreglan notebook ?', 'NO'),
(9, 'Carla Garcia', 'carlas@gmail.com', '3795010798', 'Hola. Podrían decirme si arreglan Tablet?. Gracias', 'NO'),
(10, 'Jose Ignacio', 'Josue@hotmal.com', '3795471236', 'Hola. Podrían cuanto esta una  tablet marca Apple y cuales tiene? Gracias', 'NO '),
(11, 'Celeste Blanco', 'celeste@gmail.com', '3795208475', 'Hola buen día. Quisiera saber que si tiene incluida placa graficadora en algún modelo de las notebook ', 'NO'),
(12, 'Victor Javier', 'kennel_liebig@hotmail.com', '3794251308', 'Hola. Podrían decirme si arreglan tablet?. Gracias', 'NO'),
(13, 'Mauro', 'mauro@gmail.com', '3794251485', 'Hola buen dia. Quisiera saber que si tiene incluida placa graficadora en algún modelo de las notebook ', 'NO'),
(14, 'Alejandro Javier', 'ale@gmail.com', '3795621436', 'Hola buenas trades. Les consulto si es que tienen cable UTP 5', 'NO'),
(15, 'Victor Javier', 'VJ@hotmail.com', '3794254072', 'Hola. Podrían decirme si arreglan tablet?. Gracias', 'NO'),
(16, 'Garcia Ariel', 'ariel@gmail.com', '3794254079', 'Hola buenas. Quisiera saber a que precio esta una Noteboock  HP con Disco de 1TB, 16GB de Ram- Placa de Video de 6 GB y Mouse tcla', 'NO'),
(17, 'Katia Gonzalez', 'katia25@gmail.com', '3794362530', 'Hola buen día, Me podrían decir si aceptan dólares como parte de pago. Gracias', 'NO'),
(18, 'Victor Javier', 'inred@gmail.com', '3795632330', 'Hola buen día. Quisiera saber a que precio esta una computadora con Disco de 1TB, 16GB de Ram- Placa de Video de 6 GB y Mouse tcla', 'NO'),
(19, 'Victor Javier', 'horf@gmail.com', '379425232', 'Hola buen dia. Quisiera saber que si tiene incluida placa graficadora en algún modelo de las notebook ', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `perfil_id` int(11) NOT NULL,
  `descripcion` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`perfil_id`, `descripcion`) VALUES
(1, '1-admin'),
(2, '2-cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `categoria_id` int(10) NOT NULL,
  `precio_costo` double(7,2) NOT NULL,
  `precio_venta` double(7,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_min` int(11) NOT NULL,
  `imagen` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `baja` varchar(2) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `descripcion`, `categoria_id`, `precio_costo`, `precio_venta`, `stock`, `stock_min`, `imagen`, `baja`) VALUES
(3, 'Motherboard ASUS-650 SSD-16GB- Core I7 -I5', 1, 20260.00, 25990.00, 29, 1, './assets/img/nuevoProdu/placaasus.jpg', 'SI'),
(4, 'Motherboard Asrock HDM-J0 -16GB- Core I7 -I5', 2, 18260.00, 30500.00, 22, 1, 'assets/img/nuevoProdu/monitorphilips32.jpg', 'NO'),
(5, 'DISCO WESTEM DIGITAL-650 SSD-3.1hz-GB- Cache 4 MB', 3, 7600.00, 9950.00, 16, 1, 'assets/img/nuevoProdu/memosolido.jpg', 'NO'),
(6, 'DISCO SSD KINGSTON DIGITAL-650 SSD-3.1hz-GB- Cache 4 MB', 3, 8600.00, 10550.00, 1, 1, './assets/img/nuevoProdu/discossd580.jpg', 'NO'),
(7, 'DISCO SSD WESTEM DIGITAL-650 SSD-3.1hz-GB- Cache 2 MB', 3, 7650.00, 9860.00, 27, 1, './assets/img/nuevoProdu/memopssd500.jpg', 'NO'),
(8, 'CAMARAS HIDIVISION CABLES UTP 5 ', 4, 13000.00, 15900.00, 99, 1, './assets/img/nuevoProdu/hiDivision.png', 'NO'),
(9, 'Motherboard GIGABIT-650 SSD-16GB- Core I7 -I5', 1, 20260.00, 25200.00, 28, 1, './assets/img/nuevoProdu/gigabyte7390m.jpg', 'NO'),
(10, 'Parlantes 11500 watt Potente-Bluetooch-karaoke', 5, 45000.00, 59800.00, 30, 1, './assets/img/nuevoProdu/parlante500watt.jpg', 'NO'),
(11, 'DISCO KINGSTON DIGITAL-480 SSD-3.1hz-GB- Cache 4 MB', 3, 7650.00, 10100.00, 30, 1, './assets/img/nuevoProdu/memossd.jpg', 'NO'),
(13, 'Parlante 300watt -Bluetooth-Micrófono', 5, 7650.00, 10650.00, 30, 1, './assets/img/nuevoProdu/parlante500watt.jpg', 'NO'),
(14, 'Memoria Kingston  DDR416 RAM 3200hz', 3, 5650.00, 7630.00, 27, 1, 'assets/img/nuevoProdu/ddr4-fury.png', 'NO'),
(15, 'Parlante 1300watt -Bluetooth-Micrófono', 5, 18260.00, 23520.00, 29, 1, './assets/img/nuevoProdu/parlan.jpg', 'NO'),
(18, 'PC GIGABYT-480SSD-8GB- Core I7 2,6Hhz-con kits de Mouse-Teclado', 2, 18260.00, 24620.00, 30, 1, 'assets/img/nuevoProdu/mothers-gigabite.jpg', 'NO'),
(20, 'Parlante JBL -25watt -Bluetooth-Micrófono', 5, 5600.00, 8020.00, 30, 1, './assets/img/nuevoProdu/jbl2.jpg', 'NO'),
(21, 'Notebook Dell Vostro i5 4gb 1tb Windows Pro 10', 2, 42800.00, 52500.00, 27, 1, './assets/img/nuevoProdu/note2.jpg', 'NO'),
(22, 'Notebook Odyssey Samsung  Intel® Core i7 16RAM', 2, 65000.00, 95920.00, 30, 1, './assets/img/nuevoProdu/noteDell.jpg', 'SI'),
(23, 'Monitor 24\" HD -HDMI-', 2, 13210.00, 17690.00, 30, 1, './assets/img/nuevoProdu/monitorLeonovo.png', 'SI'),
(24, 'Monitor 19\" HD -HDMI-DMI', 2, 7600.00, 13950.00, 30, 1, './assets/img/nuevoProdu/monitorkit.jpg', 'NO'),
(25, 'Monitor todo en uno 32\"  BLACK -HDMI-DMI', 2, 15000.00, 19900.00, 6, 1, './assets/img/nuevoProdu/allinone.jpg', 'SI'),
(26, 'Motherboard ASUS-650 SSD-16GB- Core I7 -I5', 1, 65000.00, 99999.99, 30, 1, 'assets/img/nuevoProdu/Computadoras-oficial-home.jpg', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `apellido` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `nombre` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `usuario` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `baja` varchar(2) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `apellido`, `nombre`, `email`, `usuario`, `pass`, `perfil_id`, `baja`) VALUES
(1, 'Fernández', 'María del Carmen', 'kennel.liebig@gmail.com', 'admin', '123', 1, 'NO'),
(2, 'Balmaceda', 'katia', 'mirta@hotmail.com', 'katia', '123', 2, 'NO'),
(11, 'González ', 'jose', 'josei@gmail.com', 'jose', '123', 2, 'NO'),
(12, 'Frete', 'Victor ', 'victor@gmail.com', 'victor', '123', 2, 'SI'),
(13, 'González ', 'Horacio', 'horacio@gmail.com', 'horacio', 'horacio', 2, 'NO'),
(14, 'González ', 'Karen Lucia', 'karen@gmail.com', 'karen', '123', 1, 'NO'),
(15, 'Romero', 'Alejandro', 'ale@gmail.com', 'alejandro', '123', 1, 'NO'),
(16, 'González ', 'Victor Javier', 'javi@gmail.com', 'javier', '123', 2, 'NO'),
(17, 'Giménez', 'Fernando Oscar', 'oscar@hotmail.com', 'oscar', '123', 2, 'NO'),
(18, 'Aponte', 'Dario', 'dario@yahoo.com.ar', 'dario', '123', 2, 'NO'),
(19, 'Lezcano', 'Milagros Felisa', 'milagros@gmail.com', 'milagros', '123', 2, 'NO'),
(20, 'Flores', 'Mauro Nahuel', 'mauro@gmail.com', 'mauro', '123', 2, 'NO'),
(21, 'Moreira', 'Cristian', 'cristian@gmail.com', 'cristian', '123', 2, 'NO'),
(22, 'Martinez', 'Belén', 'belu@gmail.com', 'belen', '123', 2, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_cabecera`
--

CREATE TABLE `ventas_cabecera` (
  `id_ventas` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total_venta` double(10,2) NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'PENDIENTE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas_cabecera`
--

INSERT INTO `ventas_cabecera` (`id_ventas`, `fecha`, `id_usuario`, `total_venta`, `estado`) VALUES
(1, '2021-06-24', 2, 9950.00, 'PAGO'),
(2, '2021-06-24', 2, 9950.00, 'PAGO'),
(3, '2021-06-24', 2, 20500.00, 'PAGO'),
(4, '2021-06-24', 2, 26450.00, 'PAGO'),
(5, '2021-06-24', 2, 9950.00, 'PAGO'),
(6, '2021-06-24', 2, 31050.00, 'PAGO'),
(7, '2021-06-25', 2, 9950.00, 'PAGO'),
(8, '2021-06-25', 2, 25990.00, 'PAGO'),
(9, '2021-06-25', 2, 71370.00, 'PAGO'),
(10, '2021-06-25', 2, 105000.00, 'PAGO'),
(11, '2021-06-28', 2, 10550.00, 'PAGO'),
(12, '2021-06-30', 22, 9860.00, 'PAGO'),
(13, '2021-06-30', 22, 9860.00, 'PAGO'),
(14, '2021-06-30', 22, 266220.00, 'PAGO'),
(15, '2021-06-30', 22, 276170.00, 'PAGO'),
(16, '2021-06-30', 22, 7630.00, 'PAGO'),
(17, '2021-06-30', 2, 59800.00, 'PAGO'),
(18, '2021-06-30', 2, 274300.00, 'PAGO'),
(19, '2021-06-30', 2, 274300.00, 'PAGO'),
(20, '2021-06-30', 2, 38506.00, 'PAGO'),
(21, '2021-06-30', 2, 29850.00, 'PAGO'),
(22, '2021-06-30', 2, 29850.00, 'PAGO'),
(23, '2021-06-30', 2, 29850.00, 'PAGO'),
(24, '2021-06-30', 2, 29850.00, 'PAGO'),
(25, '2021-06-30', 2, 78060.00, 'PAGO'),
(26, '2021-06-30', 2, 78060.00, 'PENDIENTE'),
(27, '2021-06-30', 2, 70500.00, 'PENDIENTE'),
(28, '2021-06-30', 2, 63520.00, 'PENDIENTE'),
(29, '2021-06-30', 2, 19900.00, 'PENDIENTE'),
(30, '2021-06-30', 2, 58950.00, 'PENDIENTE'),
(31, '2021-06-30', 2, 9950.00, 'PENDIENTE'),
(32, '2021-06-30', 2, 9950.00, 'PENDIENTE'),
(33, '2021-06-30', 2, 9950.00, 'PENDIENTE'),
(34, '2021-06-30', 2, 9950.00, 'PENDIENTE'),
(35, '2021-06-30', 2, 25200.00, 'PENDIENTE'),
(36, '2021-06-30', 2, 30500.00, 'PENDIENTE'),
(37, '2021-06-30', 2, 61000.00, 'PENDIENTE'),
(38, '2021-07-04', 2, 9950.00, 'PENDIENTE'),
(39, '2021-07-04', 2, 9950.00, 'PENDIENTE'),
(40, '2021-07-04', 2, 30500.00, 'PENDIENTE'),
(41, '2021-07-05', 2, 25200.00, 'PENDIENTE'),
(42, '2021-07-05', 2, 28950.00, 'PENDIENTE'),
(43, '2021-07-05', 2, 9950.00, 'PENDIENTE'),
(44, '2021-07-05', 2, 52500.00, 'PAGO'),
(45, '2021-07-05', 2, 45760.00, 'PENDIENTE'),
(46, '2021-07-05', 2, 9860.00, 'PAGO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id_detalles` int(10) NOT NULL,
  `id_ventas` int(11) NOT NULL,
  `id` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id_detalles`, `id_ventas`, `id`, `cantidad`, `precio`, `total`) VALUES
(1, 1, 3, 1, 75000.00, 75000.00),
(2, 2, 5, 1, 9950.00, 9950.00),
(3, 3, 4, 1, 20500.00, 20500.00),
(4, 4, 6, 1, 10550.00, 10550.00),
(5, 4, 8, 1, 15900.00, 15900.00),
(6, 5, 5, 1, 9950.00, 9950.00),
(7, 6, 4, 1, 20500.00, 20500.00),
(8, 6, 6, 1, 10550.00, 10550.00),
(9, 7, 5, 1, 9950.00, 9950.00),
(10, 8, 3, 1, 25990.00, 25990.00),
(11, 9, 4, 1, 20500.00, 20500.00),
(12, 9, 14, 1, 7630.00, 7630.00),
(13, 9, 15, 1, 23520.00, 23520.00),
(14, 9, 7, 2, 9860.00, 19720.00),
(15, 10, 21, 2, 52500.00, 105000.00),
(16, 11, 6, 1, 10550.00, 10550.00),
(17, 19, 6, 26, 10550.00, 274300.00),
(18, 24, 5, 3, 9950.00, 29850.00),
(19, 29, 5, 2, 9950.00, 19900.00),
(20, 31, 5, 1, 9950.00, 9950.00),
(21, 33, 5, 1, 9950.00, 9950.00),
(22, 34, 5, 1, 9950.00, 9950.00),
(23, 35, 9, 1, 25200.00, 25200.00),
(24, 36, 4, 1, 30500.00, 30500.00),
(25, 37, 4, 2, 30500.00, 61000.00),
(26, 38, 5, 1, 9950.00, 9950.00),
(27, 39, 5, 1, 9950.00, 9950.00),
(28, 40, 4, 1, 30500.00, 30500.00),
(29, 41, 9, 1, 25200.00, 25200.00),
(30, 43, 5, 1, 9950.00, 9950.00),
(31, 44, 21, 1, 52500.00, 52500.00),
(32, 45, 4, 1, 30500.00, 30500.00),
(33, 45, 14, 2, 7630.00, 15260.00),
(34, 46, 7, 1, 9860.00, 9860.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`) USING BTREE;

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`consulta_id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`perfil_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `perfil_id` (`perfil_id`);

--
-- Indices de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD PRIMARY KEY (`id_ventas`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id_detalles`),
  ADD KEY `id_ventas` (`id_ventas`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `consulta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id_detalles` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `productos` (`categoria_id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`perfil_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD CONSTRAINT `ventas_cabecera_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD CONSTRAINT `ventas_detalle_ibfk_1` FOREIGN KEY (`id_ventas`) REFERENCES `ventas_cabecera` (`id_ventas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_detalle_ibfk_2` FOREIGN KEY (`id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
