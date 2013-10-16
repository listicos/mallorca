-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-07-2013 a las 19:44:26
-- Versión del servidor: 5.1.69
-- Versión de PHP: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `clickandbooking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adjuntos`
--

CREATE TABLE IF NOT EXISTS `adjuntos` (
  `id_adjunto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(95) DEFAULT NULL,
  `ruta` text,
  `tipo` varchar(45) DEFAULT NULL,
  `ext` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_adjunto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `adjuntos`
--

INSERT INTO `adjuntos` (`id_adjunto`, `nombre`, `ruta`, `tipo`, `ext`) VALUES
(1, 'Primera foto', '/recursos/apartamentos/1.jpg', 'apartamento', 'jpg'),
(2, 'Alguna cosa', '/recursos/apartamentos/2.jpg', 'apartamento', 'jpg'),
(4, '3.jpg', '/recursos/apartamentos/52d4acae5c9a1548cb432a4d208ab219.jpg', 'apartamento', 'jpg'),
(5, '2.jpg', '/recursos/apartamentos/3ea91af2da132a7538599594044ee5a8.jpg', 'apartamento', 'jpg'),
(6, '1.jpg', '/recursos/apartamentos/e03f0fb121003c6e5b08d30491b77ac9.jpg', 'apartamento', 'jpg'),
(7, '3.jpg', '/recursos/apartamentos/447b69e100de42b210b8e8264c6a87ea.jpg', 'apartamento', 'jpg'),
(8, '2.jpg', '/recursos/apartamentos/d4ae600c9dfde30e2b7711bb63a26fdb.jpg', 'apartamento', 'jpg'),
(9, '1.jpg', '/recursos/apartamentos/81b477d450cb334fc7b0f6bb42700a53.jpg', 'apartamento', 'jpg'),
(10, '000e5a8c63015790221d2de3fa9ab272.jpg', '/recursos/apartamentos/8d4a221792ed70f459d4ef9a2c2bcec9.jpg', 'apartamento', 'jpg'),
(11, '2.jpg', '/recursos/apartamentos/b8f37dde22b25a744b7541d3d614d6ad.jpg', 'apartamento', 'jpg'),
(12, '29167af4f6945a572ab99c1188b81cc2.jpg', '/recursos/apartamentos/00657b0a276f42379302380afdcab374.jpg', 'apartamento', 'jpg'),
(13, 'f4fe9bdb8a0e411d84fbddf647827200.jpg', '/recursos/apartamentos/56c1c566198c9a236eeb7ddc8a5a19ca.jpg', 'apartamento', 'jpg'),
(14, '1.jpg', '/recursos/apartamentos/f40fa3ec18598ad20ca7d80e9cc8b024.jpg', 'apartamento', 'jpg'),
(15, 'account.png', '/recursos/apartamentos/af7fa567743d33582de6342d3f80020e.png', 'apartamento', 'png'),
(16, 'responsive.png', '/recursos/apartamentos/3e1114070dd79a17d98487b6aad7958d.png', 'apartamento', 'png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alojamientos`
--

CREATE TABLE IF NOT EXISTS `alojamientos` (
  `id_alojamiento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `pax_minimo` int(11) DEFAULT NULL,
  `pax_maximo` int(11) DEFAULT NULL,
  `pax_bebe_maximo` varchar(45) DEFAULT NULL,
  `pax_ninios_minimo` varchar(45) DEFAULT NULL,
  `pax_ninios_maximo` varchar(45) DEFAULT NULL,
  `pax_adultos_maximo` varchar(45) DEFAULT NULL,
  `pax_adultos_minimo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_alojamiento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `alojamientos`
--

INSERT INTO `alojamientos` (`id_alojamiento`, `nombre`, `codigo`, `pax_minimo`, `pax_maximo`, `pax_bebe_maximo`, `pax_ninios_minimo`, `pax_ninios_maximo`, `pax_adultos_maximo`, `pax_adultos_minimo`) VALUES
(1, 'Habitación privada', 'est', 2, 10, '1', '0', '2', '10', '1'),
(2, 'Habitación compartida', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Casa/apto. entero', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos`
--

CREATE TABLE IF NOT EXISTS `apartamentos` (
  `id_apartamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) DEFAULT NULL,
  `id_apartamentos_tipo` int(11) NOT NULL,
  `id_direccion` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_moneda` int(11) NOT NULL,
  `horario_entrada` time DEFAULT NULL,
  `horario_salida` time DEFAULT NULL,
  `descripcion_corta` text,
  `descripcion_larga` text,
  `id_idioma` int(11) NOT NULL,
  `descripcion_servicios` text,
  `descripcion_condiciones` text,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estatus` varchar(45) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_contrato` int(11) NOT NULL,
  `tarifa_base` double DEFAULT NULL,
  `tarifa_semana` double DEFAULT NULL,
  `tarifa_mes` varchar(45) DEFAULT NULL,
  `estadia_maxima` int(11) DEFAULT NULL,
  `estadia_minima` int(11) DEFAULT NULL,
  `huesped_adicional_apartir` int(11) DEFAULT NULL,
  `huesped_adicional_costo` double DEFAULT NULL,
  `costo_limpieza` double DEFAULT NULL,
  `deposito_seguridad` double DEFAULT NULL,
  `precio_fin_semana` double DEFAULT NULL,
  `normas` text,
  `tamanio` double DEFAULT NULL,
  `capacidad_personas` int(11) DEFAULT NULL,
  `habitaciones` int(11) DEFAULT NULL,
  `camas` int(11) DEFAULT NULL,
  `tipo_cama` varchar(45) DEFAULT NULL,
  `banio` double DEFAULT NULL,
  `mascotas` tinyint(1) DEFAULT NULL,
  `manual` text,
  PRIMARY KEY (`id_apartamento`),
  KEY `fk_apartamentos_apartamentos_tipos1_idx` (`id_apartamentos_tipo`),
  KEY `fk_apartamentos_direcciones1_idx` (`id_direccion`),
  KEY `fk_apartamentos_empresas1_idx` (`id_empresa`),
  KEY `fk_apartamentos_monedas1_idx` (`id_moneda`),
  KEY `fk_apartamentos_idiomas1_idx` (`id_idioma`),
  KEY `fk_apartamentos_usuarios1_idx` (`id_usuario`),
  KEY `fk_apartamentos_contratos1_idx` (`id_contrato`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `apartamentos`
--

INSERT INTO `apartamentos` (`id_apartamento`, `nombre`, `id_apartamentos_tipo`, `id_direccion`, `id_empresa`, `id_moneda`, `horario_entrada`, `horario_salida`, `descripcion_corta`, `descripcion_larga`, `id_idioma`, `descripcion_servicios`, `descripcion_condiciones`, `tiempo_creacion`, `ultima_modificacion`, `estatus`, `id_usuario`, `id_contrato`, `tarifa_base`, `tarifa_semana`, `tarifa_mes`, `estadia_maxima`, `estadia_minima`, `huesped_adicional_apartir`, `huesped_adicional_costo`, `costo_limpieza`, `deposito_seguridad`, `precio_fin_semana`, `normas`, `tamanio`, `capacidad_personas`, `habitaciones`, `camas`, `tipo_cama`, `banio`, `mascotas`, `manual`) VALUES
(1, 'LES ONES CB063', 1, 1, 1, 2, '00:00:00', '00:00:00', 'Esta es una descripción corta', '     Apartamento de 2 habitaciones con capacidad para 4/6 personas y vistas frontales al mar desde la terraza. Se compone de salón comedor con sofá cama y salida a la terraza equipada con mobiliario de jardín , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 2 cuartos de baño uno de ellos con bañera de hidromasaje y cocina independiente totalmente equipada.El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias de la vivienda. Plaza de aparcamiento para coche grande.\r\nNO SE ADMITEN GRUPOS DE JOVENES. Es exclusivo para familias debido a la tranquilidad del complejo y de los vecinos.\r\n\r\nLos Apartamentos Les Ones están en Salou, a solo 150 metros de la playa Capellans. Cuentan con vistas al mar e incluyen aire acondicionado, balcón privado y un jardín con una piscina compartida al aire libre rodeada de tumbonas.\r\nLos apartamentos Les Ones disponen de un salón con sofá cama y TV de pantalla plana, un baño con bañera de hidromasaje y una zona de cocina con fogones, microondas, horno, lavavajillas y lavadora.\r\nLos Apartamentos Les Ones disponen de aparcamiento privado gratuito y una recepción con servicio de información turística.\r\nSe encuentran a solo 8 minutos en coche de PortAventura, a 15 minutos en coche de Tarragona y a 2 km de la estación de tren de Salou, que comunica con el centro de Barcelona en aproximadamente 75 minutos.', 1, 'Descripción de servicios', 'Descripción de condiciones', '2013-06-13 01:38:26', '2013-07-03 06:47:53', 'activo', 1, 1, 30, 1300, '5000', 30, 2, 4, 20, 10, 10, 25, ' No se permiten mascotas', 125, 5, 2, 3, 'Cama', 2, 0, '  Las llaves están abajo de la maceta '),
(2, 'ACANTILADOS CB013', 1, 4, 1, 1, '15:00:00', '12:00:00', '', '    Exclusivo ático en primera línea de playa en Salou con capacidad para 6 personas distribuidas en 4 habitaciones.Amplio salón comedor con espectaculares vistas al mar y decoración de diseño, cocina independiente con barra americana totalmente equipada con todas las facilidades y sistema de OSMOSYS decalificador de agua. 2 habitaciones con camas de matrimonio y colchones de latex , 2 habitaciones con cama individual , baño con ducha de hidromasaje y aseo.POSIBILIDAD DE PLAZA DE PARKING LOS MESES DE JULIO Y AGOSTO. \r\nEl edificio, de 8 Plantas, a pie de la playa larga de Salou, cerca de restaurantes, comercios y la famosa fuente luminosa. Se encuentra a tan solo 1,7Km del parque Port Aventura y costa caribe, a 10 min a pie del centro de Salou y 5 min de la zona de animación 20 Km aeropuerto    ', 1, '', '', '2013-06-13 13:23:11', '2013-07-03 06:51:08', '', 1, 1, 0, 0, '0', 7, 1, 0, 0, 0, 0, 0, ' No se permite fumar ni mascotas', 0, 2, 2, 2, 'Cama', 1, 0, '    Las llaves están abajo de la maceta  '),
(3, ' BARCINO CB021', 1, 5, 1, 1, '15:00:00', '12:00:00', '', '   Apartamento de 3 habitaciones con capacidad para 6 personas en 1ª linea de playa.Salón comedor con pantalla plana , sofá cama y salida a la terraza cerrada con puertas correderas , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 1 habitación con 1 cama individual , cocina independiente equipada y baño completo. El apartamento dispone de aire acondicionado y calefacción por conductos excepto en la habitación individual.\r\nEstos apartamentos cómodos y elegantes se encuentran a sólo 10 metros de la playa de Llevant y están orientados al mar. Disponen de aire acondicionado y de una terraza amueblada con vistas al mar.\r\nLos Apartamentos Barcino, de 3 dormitorios, presentan una decoración funcional y suelo de madera. En el salón comedor hay un sofá, un sofá cama y una TV de plasma. La cocina está equipada con lavadora, microondas, horno y fogones.\r\nA menos de 300 metros encontrará numerosos bares, restaurantes y tiendas. El centro está a 5 minutos a pie.\r\nLos Apartamentos Barcino están a menos de 10 minutos en coche del parque temático PortAventura, que incluye un parque acuático y un campo de golf. La ciudad histórica de Tarragona está a 10 km y el aeropuerto de Reus, a 20 minutos en coche.   ', 1, '', '', '2013-06-13 15:44:59', '2013-07-03 06:53:00', '', 1, 1, 30, 0, '0', 7, 1, 0, 0, 0, 0, 0, '  No se permiten mascotas', 100, 4, 2, 4, 'Cama', 1.5, 0, '   Las llaves están abajo de la maceta '),
(4, ' ALEXANDRIA CB085', 1, 6, 1, 1, '15:00:00', '12:00:00', '', '            Apartamento de 3 habitaciones con capacidad para 6 personas en pleno centro de Salou. El apartamento se compone de salón comedor con Tv de pantalla plana , sofá tipo cheslongue y salida a la terraza equipada con mesa y sillas de jardín. 1 habitación con cama de matrimonio , 2 habitaciones con 2 camas individuales. Cocina abierta equipada y baño con ducha.', 1, '', '', '2013-06-13 16:01:30', '2013-07-03 06:58:55', '', 1, 1, 40, 1000, '3500', 7, 1, 0, 0, 0, 0, 0, ' No se permite fumar', 132, 4, 2, 4, 'Cama', 8, 1, '       Las llaves están abajo de la maceta'),
(5, 'ALTAIR CB022 ', 1, 7, 1, 1, '15:00:00', '12:00:00', '', '    Apartamento 1ª línea de playa con capacidad para 4/6 personas. Se compone de un amplio salón comedor con aire acondicionado y bomba de calor con acceso a la zona de terraza cerrada y con vistas frontales al mar 1 habitación con cama de matrimonio ,1 habitación con litera 1x2 , cocina equipada y baño completo.\r\nLos Apartamentos Altair se encuentran a tan solo 10 metros de la playa de Levante. Ofrecen un alojamiento amplio y luminoso con una terraza cerrada y vistas panorámicas al mar.\r\nLos apartamentos presentan una decoración luminosa y funcional. El salón, de planta abierta, cuenta con un sofá y TV , la cocina dispone de cafetera, lavadora, microondas, horno y fogones.\r\nA menos de 300 metros encontrará muchos bares, restaurantes y tiendas. El centro está a 5 minutos a pie.\r\nLos apartamentos del Altair están a menos de 10 minutos en coche del parque temático, el parque acuático y el complejo de golf de PortAventura. La histórica ciudad de Tarragona está a 10 km y el aeropuerto de Reus, a 20 minutos en coche.', 1, '', '', '2013-06-14 07:05:59', '2013-07-03 07:02:32', '', 1, 1, 0, 0, '0', 7, 1, 0, 0, 0, 0, 0, 'No se permiten mascotas', 100, 4, 2, 4, 'Cama', 1.5, 0, '   Las llaves están abajo de la maceta'),
(6, 'ARQUBACH CB027', 1, 11, 1, 1, '15:00:00', '12:00:00', '', '  Impresionante piso de diseño con 4 habitaciones y 4 baños con capacidad para 8 personas en Salou. Amplio salón comedor equipado con televisor de gran tamaño de pantalla plana , DIGITAL + y con salida a terraza.Cocina tipo isla moderna y equipada con televisor de pantalla plana y todos los electrodomésticos necesarios. Cuenta con un total de 4 habitaciones dobles y 4 baños, 3 habitaciones tipo suite, 2 con cama de matrimonio , 2 con 2 camas de 90 cm. La habitación principal cuenta con televisor de pantalla plana y vestidor. \r\nEl residencial cuenta con piscina comunitaria rodeada de césped. A 700 m del centro de Salou, cerca de comercios, restaurantes y servicios. A 10 min a pie de la playa y a 3.5 Km de Port Aventura.\r\nLos Apartamentos ArqUbach están situados en Salou, a solo 3.5 km del parque temático PortAventura. El establecimiento cuenta con piscina de temporada al aire libre y apartamentos con terraza privada.\r\nLos apartamentos ArqUbach presentan una decoración moderna con suelos de parqué. Todos están equipados con lavavajillas, lavadora cocina con vitroceramica, horno, microondas , cafetera y tostadora.\r\nLos Apartamentos Arqubach se encuentran a solo 5 minutos en coche del centro de Salou, a 15 minutos en coche del aeropuerto de Reus y a 20 minutos del centro de Tarragona. Además, están bien comunicados con las autopistas A-7 y AP-7.\r\nEl residencial cuenta con piscina comunitaria rodeada de césped. A 700 m del centro de Salou, cerca de comercios, restaurantes y servicios. A 10 min a pie de la playa y a 5 Km de Port Aventura.', 1, '', '', '2013-06-19 16:56:58', '2013-07-03 07:05:48', '', 1, 1, 0, 0, '0', 7, 1, 0, 0, 0, 0, 0, 'No se permiten mascotas', 100, 4, 2, 4, '', 1.5, 0, '  Las llaves están abajo de la maceta'),
(7, 'COSTA D’OR II CB036', 1, 12, 1, 1, '15:00:00', '12:00:00', '', ' Apartamento de 1 habitación con capacidad para 2/4 personas en primera linea de playa. Se compone de salón comedor con sofá cama , split de aire frío/caliente y salida a la terraza equipada con mobiliario de jardín. 1 habitación con 2 camas individuales , cocina americana totalmente equipada y baño completo.\r\nEstos apartamentos sencillos y agradables están entre Salou y Cambrils, en una zona residencial tranquila situada a 25 metros de la playa. Disponen de un balcón amueblado con toldo y ofrecen vistas al mar.\r\nLos Apartamentos Costa D’Or, II tienen una decoración práctica de estilo playero y cuentan con aire acondicionado. Incluyen un salón comedor luminoso con TV y sofá cama, y una zona de cocina con lavadora, horno, fogones y cafetera.\r\nLos apartamentos se encuentran a 15 minutos a pie del puerto de Salou y a 3 km del centro de Salou y de Cambrils. A 5 minutos a pie hay varios restaurantes y bares.\r\nLos apartamentos del Costa D’Or, II están a solo 6 km del parque temático PortAventura, a 3,5 km del campo de golf Cambrils Par 3 y a 13 km de la ciudad histórica de Tarragona. El aeropuerto de Reus está a 25 minutos en coche.\r\nLOS MESES DE JULIO Y AGOSTO LA ESTANCIA MÍNIMA ES DE 7 NOCHES DE SÁBADO A SÁBADO. ', 1, '', '', '2013-07-03 04:54:31', '2013-07-03 06:27:35', '', 1, 1, 0, 0, '0', 7, 1, 0, 0, 0, 0, 0, ' COSTA D’OR II CB036 ', 100, 4, 2, 4, '', 1.5, 1, ' Este es el manul '),
(8, 'LAS DUNAS', 1, 13, 1, 1, '15:00:00', '12:00:00', '', ' Apartamento de 3 habitaciones con capacidad para 6/8 personas en zona residencial de Cambrils. Se compone de salón comedor con sofá cama , TV pantalla plana vía satélite y salida a la terraza equipada con mobiliario de jardín. 1 habitación con cama de matrimonio , 2 habitación con 2 camas individuales cocina totalmente equipada y 2 cuartos de baño. El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias.\r\nEstos apartamentos están situados en la Costa Dorada, a 200 metros de la playa y a 10 minutos a pie del puerto deportivo. Presentan una decoración moderna y ofrecen acceso a una piscina compartida al aire libre y a una amplia zona ajardinada. \r\nLos Apartamentos Las Dunas cuentan con 2 o 3 dormitorios, conexión Wi-Fi gratuita y terraza privada. Además, incluyen una cocina totalmente equipada y una zona de estar con un cómodo sofá cama y TV de pantalla plana. \r\nEl centro de Cambrils se halla a 5 minutos en coche, mientras que Salou y Port Aventura están a 15 minutos, también en coche. La ciudad histórica de Tarragona queda a 25 km. \r\nSe proporciona aparcamiento privado gratuito. ', 1, '', '', '2013-07-03 05:16:21', '2013-07-03 06:26:38', '', 1, 1, 0, 0, '0', 7, 1, 0, 0, 0, 0, 0, ' LAS DUNAS ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(9, 'LAS DUNAS', 1, 14, 1, 1, '15:00:00', '12:00:00', '', ' Apartamento de 2 habitaciones con capacidad para 4/6 personas en zona residencial de Cambrils. Se compone de salón comedor con sofá cama , TV pantalla plana vía satélite y salida a la terraza equipada con mobiliario de jardín. 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales cocina totalmente equipada y 2 cuartos de baño. El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias.\r\nEstos apartamentos están situados en la Costa Dorada, a 200 metros de la playa y a 10 minutos a pie del puerto deportivo. Presentan una decoración moderna y ofrecen acceso a una piscina compartida al aire libre y a una amplia zona ajardinada. \r\nLos Apartamentos Las Dunas cuentan con 2 o 3 dormitorios, conexión Wi-Fi gratuita y terraza privada. Además, incluyen una cocina totalmente equipada y una zona de estar con un cómodo sofá cama y TV de pantalla plana. \r\nEl centro de Cambrils se halla a 5 minutos en coche, mientras que Salou y Port Aventura están a 15 minutos, también en coche. La ciudad histórica de Tarragona queda a 25 km. \r\nSe proporciona aparcamiento privado gratuito. ', 1, '', '', '2013-07-03 05:19:31', '2013-07-03 06:26:07', '', 1, 1, 0, 0, '0', 7, 1, 0, 0, 0, 0, 0, ' LAS DUNAS ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(10, 'ARQUUS CB030', 1, 15, 1, 1, '15:00:00', '12:00:00', '', ' Apartamento con capacidad para 2/4 personas en la 7ª planta del edificio ARQUUS I en pleno centro de Salou. Salón comedor con sofá cama y salida a la terraza , 1 habitación con cama de matrimonio , cocina americana y baño completo. A 400m de la playa , 50 m de la zona de ocio , 2,4 de Port Aventura y 11km de Tarragona.\r\nLos apartamentos ARQUUS están a 400 metros de la playa de Llevant y del paseo marítimo. Ofrecen piscina al aire libre de temporada, jardines , sala con sillones para la lectura y balcón privado amueblado con vistas a la ciudad y a la montaña. ( la temporada de la piscina es desde el 15.06 hasta el 15.09 )\r\nLos Apartamentos presentan una bonita decoración con muebles tradicionales. El salón/comedor de planta abierta cuenta con sofá cama nido y TV. La zona de cocina incluye lavadora, fogones, microondas , cafetera y tostadora.\r\nLos apartamentos están distribuidos en 2 edificios en la principal calle comercial y de ocio nocturno de la localidad , donde encontrará varios bares, restaurantes y tiendas. El puerto deportivo de Salou está a 15 minutos a pie.\r\nLa estación de tren de Salou se encuentra a 2 km y el aeropuerto de Reus, a 15 km. Tarragona está a 15 minutos en coche ', 1, '', '', '2013-07-03 05:22:06', '2013-07-03 06:25:32', '', 1, 1, 0, 0, '0', 7, 1, 0, 0, 0, 0, 0, ' ARQUUS CB030 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(11, 'ARQUUS CB058', 1, 16, 1, 1, '15:00:00', '12:00:00', '', ' Apartamento esquinero de 2 habitaciones con capacidad para 4/6 personas.Se compone de salón comedor con televisor de pantalla plana y salida a la terraza equipada con mesa y sillas , 1 habitación con cama de matrimonio , 1 habitación con litera , baño completo y cocina totalmente equipada.\r\nEstos luminosos apartamentos están a 400 metros de la playa de Llevant y del paseo marítimo. Ofrecen piscina al aire libre compartida, jardines y balcón privado amueblado con vistas a la ciudad y a la montaña.\r\n\r\nLos Apartamentos ARQUUS cuentan con decoración en tonos pastel y muebles tradicionales. El salón-comedor, de planta abierta, dispone de sofá cama y TV y la zona de cocina incluye lavadora, microondas, fogones y tostadora.\r\n\r\nLos apartamentos se encuentran en 4 edificios de la famosa calle Carles Buiges, donde encontrará varios bares, restaurantes y tiendas. El puerto deportivo de Salou está a 15 minutos a pie.\r\n\r\nLos Apartamentos ARQQUS tienen zona de lectura y están a 2 km de Cap de Salou y sus preciosas calas y a 10 minutos en coche del parque temático PortAventura ', 1, '', '', '2013-07-03 05:25:17', '2013-07-03 06:24:57', '', 1, 1, 0, 0, '0', 7, 1, 0, 0, 0, 0, 0, ' ARQUUS CB058 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(12, 'ARQUUS CB081', 1, 17, 1, 1, '15:00:00', '12:00:00', '', ' Amplio apartamento de 1 habitación mas 1 camarote con capacidad para 4/6 personas en pleno centro turístico de Salou. Se compone de salón comedor con salida a la terraza con vistas a la ciudad , 1 habitación con 2 camas individuales , 1 camarote con litera 1x2 abatible , cocina americana equipada y baño completo.\r\n\r\nEstos apartamentos luminosos se encuentran a 400 metros de la playa de Llevant y del paseo marítimo. Cuentan con jardines con piscina al aire libre compartida y balcón privado amueblado con vistas a las montañas y a la ciudad.\r\nLos Apartamentos Arquus Center presentan una bonita decoración y disponen de muebles tradicionales, salón comedor de planta abierta con sofá cama y TV y zona de cocina con lavadora, microondas, fogones y tostadora.\r\nLos apartamentos están distribuidos en 4 edificios en la famosa calle Carles Buiges, donde los huéspedes encontrarán bares, restaurantes y tiendas. El puerto deportivo de Salou está a 15 minutos a pie.\r\nLos apartamentos Arquus cuentan con zona de lectura y se encuentran a 2 km del cabo de Salou y de sus preciosas calas. El parque temático PortAventura está a 10 minutos en coche.\r\nLa estación de trenes de Salou se encuentra a 2 km, mientras que el aeropuerto de Reus está a 15 km. Tarragona se encuentra a 15 minutos en coche.\r\nEl complejo dispone de piscina comunitaria de temporada abierta desde el 15.06 al 15.09 ', 1, '', '', '2013-07-03 05:27:34', '2013-07-03 06:24:08', '', 1, 1, 0, 0, '0', 7, 1, 0, 0, 0, 0, 0, ' ARQUUS CB081 ', 100, 4, 2, 4, '', 1.5, 1, ' Las llaves están abajo de la maceta '),
(13, 'ATALAYA MAR CB068', 1, 18, 1, 1, '15:00:00', '12:00:00', '', ' Estudio en planta baja con capacidad para 2/4 personas situado en el centro turístico de Salou. Se compone de salón comedor con salida a la terraza equipada con mobiliario de jardín y toldo. 1 habitación tipo camarote con cama de matrimonio , baño completo con plato de ducha y cocina americana.\r\nEl complejo ATALAYA MAR situado a escasos metros de 2 bonitas playas y muy cerca de la principal zona de tiendas , souvenirs y locales de ocio nocturno. El complejo dispone de piscina al aire libre rodeada de una zona para extender las toallas , zona de juegos infantiles y acceso directo a la playa a escasos metros desde el complejo. ', 1, '', '', '2013-07-03 05:30:42', '2013-07-03 06:23:32', '', 1, 1, 0, 0, '0', 7, 1, 0, 0, 0, 0, 0, ' ATALAYA MAR CB068 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(14, 'ATENEA III CB059', 1, 19, 1, 1, '15:00:00', '12:00:00', '', ' Apartamento de 2 habitaciones con capacidad para 4/6 personas en zona residencial y familiar de Salou. Se compone de salón comedor con sofá cama , split de aire acondicionado y salida a la amplia terraza con vistas a la ciudad. 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , cocina americana cerrada con puertas correderas y baño completo.\r\nEl complejo dispone de piscina al aire libre rodeada de un gran jardín con zonas de sol y sobra y alumbrado nocturno. ', 1, '', '', '2013-07-03 05:46:01', '2013-07-03 06:19:29', '', 1, 1, 0, 0, '0', 7, 1, 0, 0, 0, 0, 0, ' ATENEA III CB059 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(15, 'BARCINO CB021', 1, 20, 1, 1, '15:00:00', '12:00:00', '', ' Apartamento de 3 habitaciones con capacidad para 6 personas en 1ª linea de playa.Salón comedor con pantalla plana , sofá cama y salida a la terraza cerrada con puertas correderas , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 1 habitación con 1 cama individual , cocina independiente equipada y baño completo. El apartamento dispone de aire acondicionado y calefacción por conductos excepto en la habitación individual.\r\nEstos apartamentos cómodos y elegantes se encuentran a sólo 10 metros de la playa de Llevant y están orientados al mar. Disponen de aire acondicionado y de una terraza amueblada con vistas al mar.\r\nLos Apartamentos Barcino, de 3 dormitorios, presentan una decoración funcional y suelo de madera. En el salón comedor hay un sofá, un sofá cama y una TV de plasma. La cocina está equipada con lavadora, microondas, horno y fogones.\r\nA menos de 300 metros encontrará numerosos bares, restaurantes y tiendas. El centro está a 5 minutos a pie.\r\nLos Apartamentos Barcino están a menos de 10 minutos en coche del parque temático PortAventura, que incluye un parque acuático y un campo de golf. La ciudad histórica de Tarragona está a 10 km y el aeropuerto de Reus, a 20 minutos en coche. ', 1, '', '', '2013-07-03 05:49:46', '2013-07-03 06:20:40', '', 1, 1, 0, 0, '0', 7, 1, 0, 0, 0, 0, 0, ' BARCINO CB021 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(16, 'BELLO HORIZONTE CB054', 1, 21, 1, 1, '15:00:00', '12:00:00', '', ' Apartamento de 3 habitaciones con capacidad para 6 personas en 1ª linea de playa. Se compone de Salón comedor con split de aire acondicionado/bomba de calor , sofá , Tv de pantalla plana y salida a la terraza con vistas frontales al mar. 1 habitación con cama de matrimonio , 2 habitaciones con 2 camas individuales , cocina independiente equipada , baño completo y aseo.\r\n\r\nEstos bonitos apartamentos están situados frente a la playa, a 5 minutos a pie del centro de Salou. Disponen de acceso directo a la playa de Llevant, aire acondicionado y una terraza amueblada con vistas al mar.\r\nLos Apartamentos Bello Horizonte presentan una decoración agradable y cuentan con 3 dormitorios y una sala de estar con una TV de plasma y un sofá. También incluyen una cocina sencilla equipada con horno, lavadora, lavavajillas y microondas.\r\nLos apartamentos se encuentran en una zona tranquila, pero están muy cerca a pie de varios bares, restaurantes y tiendas. Además, están a 15 minutos a pie del puerto de Salou.\r\nEl establecimiento Bello Horizonte ofrece toallas, ropa de cama, conexión a internet y aparcamiento por un suplemento. Además, está situado a 4 km de PortAventura y a 25 minutos en coche del aeropuerto de Reus. ', 1, '', '', '2013-07-03 05:53:58', '2013-07-03 06:21:14', '', 1, 1, 0, 0, '0', 7, 1, 0, 0, 0, 0, 0, ' BELLO HORIZONTE CB054 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(17, 'BLUE MOON CB026 ', 1, 22, 1, 1, '15:00:00', '12:00:00', '', ' Apartamento duplex de 4 habitaciones dobles y 105 m2 distribuidos en 2 plantas, en la planta baja, con mobiliario moderno y de buen gusto salón-comedor con sofá cheslongue de piel , mesa de comedor , TV de pantalla plana, conexión a internet por wifi y salida a la amplia terraza equipada con mobiliario y toldos. Aire acondicionado y bomba de calor por conductos en todas las estancias del apartamento. 1 habitación con 2 camas (90 cm), . Cocina (horno, vitrocerámica, microondas, congelador,lavadora). Ducha/WC. Planta superior: 2 dorm., cada habitación con 1 cama de matrimonio. 1 dorm. con 2 x 1 literas. Baño/WC, doble lavabo.\r\nLos Apartamentos Blue Moon están situados a solo 500 metros de la playa de Salou y ofrecen una piscina al aire libre, un parque infantil y aparcamiento privado gratuito. Todos los apartamentos son dúplex, tienen 4 dormitorios y cuentan con terraza amueblada y conexión Wi-Fi gratuita.\r\nTodos los apartamentos del Blue Moon son elegantes y funcionales y disponen de 2 baños, salón-comedor con TV de pantalla plana, aire acondicionado y una moderna zona de cocina con vitrocerámica, lavavajillas y lavadora.\r\nLos Apartamentos Blue Moon están situados en una zona residencial de Salou, a solo 5 minutos a pie de las tiendas, restaurantes y discotecas del centro.\r\nLa estación de tren de Salou se encuentra a 500 metros de los apartamentos, mientras que el parque temático PortAventura está a 10 minutos en coche y el aeropuerto de Reus, a 15 minutos de distancia. ', 1, '', '', '2013-07-03 05:57:29', '2013-07-03 06:21:47', '', 1, 1, 0, 0, '0', 7, 1, 0, 0, 0, 0, 0, ' BLUE MOON CB026  ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(18, 'CAP SALOU CB003', 1, 23, 1, 1, '15:00:00', '12:00:00', '', ' Apartamento de 2 habitaciones con capacidad para 4/6 personas en la tranquila y familiar zona del Cabo Salou con unas impresionantes vistas al mar. Se compone de salón comedor con sofá cama , tv de pantalla plana y salida a la terraza. 1 habitación con cama de matrimonio , 1 habitación con litera , cocina americana totalmente equipada y baño completo. ESTE APARTAMENTO ESTÁ DESTINADO UNICAMENTE A FAMILIAS CON NIÑOS.\r\n\r\nEl establecimiento Apartamentos Cap Salou se encuentra a sólo 100 metros de la playa de Cala Font y a 6 km del centro de Salou. Dispone de apartamentos familiares con aire acondicionado y terraza privada con vistas al mar.\r\nLos apartamentos Cap Salou cuentan con 1 dormitorio doble, 1 dormitorio con literas, salón comedor con sofá cama y TV de pantalla plana y zona de cocina con fogones, horno, microondas, lavadora y lavavajillas.\r\nLos apartamentos están a sólo 15 minutos en coche del parque temático PortAventura y a 20 minutos también en coche de la preciosa ciudad de Tarragona y de sus ruinas romanas. El centro de Barcelona se encuentra a 1 hora y 15 minutos en coche. ', 1, '', '', '2013-07-03 06:05:46', '2013-07-03 06:22:21', '', 1, 1, 0, 0, '0', 7, 1, 0, 0, 0, 0, 0, ' CAP SALOU CB003 ', 100, 4, 2, 4, '', 1.5, 1, ' Las llaves están abajo de la maceta '),
(19, 'CALA DORADA CB074', 1, 24, 1, 1, '15:00:00', '12:00:00', '', ' Apartamento exterior de 3 habitaciones con capacidad para 6 personas y con vistas al mar desde todas las estancias. Se compone de salón comedor con TV de pantalla plana , split de aire acondicionado/ bomba de calor y salida a la terraza equipada con mesa , sillas y 2 tumbonas. 3 habitaciones con cama de matrimonio , 2 baños completos y cocina independiente equipada. Todo el apartamento tiene suelos de parquet y presenta una decoración funcional.\r\nEl establecimiento Apartamentos Cala Dorada ofrece un ambiente familiar y se encuentra en Salou, a 100 metros de la playa Larga. Ofrece una piscina al aire libre de temporada, un parque infantil y apartamentos con aire acondicionado y terraza privada amueblada con vistas al mar.\r\nEstos apartamentos tienen suelo de parqué, 2 baños, lavadora y una sala de estar con sofá, TV de pantalla plana y reproductor de CD. La cocina cuenta con nevera, microondas y cafetera.\r\nPor un suplemento diario, se ofrece conexión a internet mediante USB. Los apartamentos se encuentran a 3 km de PortAventura y a 300 metros de algunas tiendas, bares, restaurantes y discotecas.\r\nESTE APARTAMENTO ES EXCLUSIVO PARA FAMILIAS.\r\nPISCINA DE TEMPORADA 15.06 AL 15.09\r\nEN JULIO Y AGOSTO LA ESTANCIA MÍNIMA ES DE 7 NOCHES DE SÁBADO A SÁBADO. ', 1, '', '', '2013-07-03 06:15:51', '2013-07-03 06:22:51', '', 1, 1, 0, 0, '0', 7, 1, 0, 0, 0, 0, 0, ' CALA DORADA CB074 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(20, 'TARRACO MAR CB049', 1, 25, 1, 1, '15:00:00', '12:00:00', '', 'Casa unifamiliar de 3 plantas y piscina privada situada en la zona residencial de La Punta de La Mora ( Tarragona ) de 4 habitaciones dobles y 3 baños con capacidad para 8/10 personas. En la planta -1 nos encontramos con la plaza de garaje cerrado con capacidad para 3 coches , en la planta 0 nos encontramos con el amplio salón comedor de 47m2 con acceso a la terraza ,cocina equipada , 1 habitación con cama de matrimonio y 1 baño completo con plato de ducha , en la planta +1 nos encontramos con 2 habitaciones con 2 camas individuales cada una , 1 baño completo con plato de ducha y la habitación principal tipo suite con baño completo y bañera , terraza de 20m2. En la zona de piscina hay hamacas y mesa con sillas y sombrilla. A 600m de una fantastica playa de arena fina y multitud de actividades. A 5 Km del centro de la ciudad de Tarragona , declarada Patrimonio Mundial por la UNESCO , donde hay infinidad de lugares de interés como anfiteatro romano , tren turistico , centros comerciales etc etc.  ', 1, '', '', '2013-07-03 07:10:44', '2013-07-03 07:10:44', '', 1, 1, 0, 0, '0', 7, 1, 0, 0, 0, 0, 0, 'No se permite fumar , ni mascotas', 100, 4, 2, 4, '', 1.5, 0, 'Las llaves están abajo de la maceta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos_adjuntos`
--

CREATE TABLE IF NOT EXISTS `apartamentos_adjuntos` (
  `id_apartamento` int(11) NOT NULL,
  `id_adjunto` int(11) NOT NULL,
  `id_apartamento_adjunto` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_apartamento_adjunto`),
  KEY `fk_apartamentos_has_adjuntos_adjuntos1_idx` (`id_adjunto`),
  KEY `fk_apartamentos_has_adjuntos_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `apartamentos_adjuntos`
--

INSERT INTO `apartamentos_adjuntos` (`id_apartamento`, `id_adjunto`, `id_apartamento_adjunto`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 4, 4),
(1, 5, 5),
(1, 6, 6),
(1, 7, 7),
(1, 8, 8),
(1, 9, 9),
(1, 10, 10),
(1, 11, 11),
(1, 12, 12),
(1, 13, 13),
(1, 14, 14),
(1, 15, 15),
(1, 16, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos_alojamientos`
--

CREATE TABLE IF NOT EXISTS `apartamentos_alojamientos` (
  `id_apartamento` int(11) NOT NULL,
  `id_alojamiento` int(11) NOT NULL,
  `id_apartamento_alojamiento` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_apartamento_alojamiento`),
  KEY `fk_apartamentos_has_alojamientos_alojamientos1_idx` (`id_alojamiento`),
  KEY `fk_apartamentos_has_alojamientos_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Volcado de datos para la tabla `apartamentos_alojamientos`
--

INSERT INTO `apartamentos_alojamientos` (`id_apartamento`, `id_alojamiento`, `id_apartamento_alojamiento`) VALUES
(14, 1, 39),
(15, 1, 40),
(16, 1, 41),
(17, 1, 42),
(18, 1, 43),
(19, 1, 44),
(13, 1, 45),
(12, 1, 46),
(11, 1, 47),
(10, 1, 48),
(9, 1, 49),
(8, 1, 50),
(7, 1, 51),
(1, 1, 64),
(2, 1, 65),
(3, 1, 66),
(4, 1, 67),
(5, 1, 68),
(6, 1, 69),
(20, 1, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos_instalaciones`
--

CREATE TABLE IF NOT EXISTS `apartamentos_instalaciones` (
  `id_apartamento` int(11) NOT NULL,
  `id_instalacion` int(11) NOT NULL,
  `id_apartamento_instalacion` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_apartamento_instalacion`),
  KEY `fk_apartamentos_has_instalaciones_instalaciones1_idx` (`id_instalacion`),
  KEY `fk_apartamentos_has_instalaciones_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=746 ;

--
-- Volcado de datos para la tabla `apartamentos_instalaciones`
--

INSERT INTO `apartamentos_instalaciones` (`id_apartamento`, `id_instalacion`, `id_apartamento_instalacion`) VALUES
(14, 111, 361),
(14, 118, 362),
(14, 134, 363),
(14, 144, 364),
(14, 156, 365),
(14, 173, 366),
(14, 186, 367),
(14, 205, 368),
(14, 215, 369),
(14, 216, 370),
(14, 222, 371),
(15, 111, 372),
(15, 133, 373),
(15, 147, 374),
(15, 151, 375),
(15, 173, 376),
(15, 194, 377),
(15, 208, 378),
(15, 209, 379),
(15, 217, 380),
(15, 219, 381),
(16, 105, 382),
(16, 112, 383),
(16, 114, 384),
(16, 143, 385),
(16, 156, 386),
(16, 164, 387),
(16, 169, 388),
(16, 195, 389),
(16, 202, 390),
(16, 212, 391),
(16, 217, 392),
(16, 223, 393),
(17, 113, 394),
(17, 117, 395),
(17, 118, 396),
(17, 143, 397),
(17, 157, 398),
(17, 166, 399),
(17, 168, 400),
(17, 182, 401),
(17, 202, 402),
(17, 211, 403),
(17, 212, 404),
(17, 216, 405),
(17, 222, 406),
(18, 105, 407),
(18, 118, 408),
(18, 140, 409),
(18, 149, 410),
(18, 165, 411),
(18, 172, 412),
(18, 199, 413),
(18, 202, 414),
(18, 213, 415),
(18, 219, 416),
(19, 105, 417),
(19, 133, 418),
(19, 151, 419),
(19, 166, 420),
(19, 173, 421),
(19, 202, 422),
(19, 214, 423),
(19, 223, 424),
(13, 114, 425),
(13, 133, 426),
(13, 146, 427),
(13, 156, 428),
(13, 164, 429),
(13, 176, 430),
(13, 189, 431),
(13, 202, 432),
(13, 203, 433),
(13, 214, 434),
(13, 217, 435),
(13, 223, 436),
(12, 112, 437),
(12, 138, 438),
(12, 149, 439),
(12, 172, 440),
(12, 205, 441),
(12, 218, 442),
(11, 105, 443),
(11, 133, 444),
(11, 139, 445),
(11, 143, 446),
(11, 148, 447),
(11, 161, 448),
(11, 180, 449),
(11, 194, 450),
(11, 202, 451),
(11, 203, 452),
(11, 211, 453),
(11, 217, 454),
(11, 224, 455),
(10, 108, 456),
(10, 132, 457),
(10, 149, 458),
(10, 164, 459),
(10, 170, 460),
(10, 194, 461),
(10, 206, 462),
(10, 211, 463),
(10, 216, 464),
(10, 221, 465),
(9, 112, 466),
(9, 117, 467),
(9, 143, 468),
(9, 147, 469),
(9, 161, 470),
(9, 178, 471),
(9, 191, 472),
(9, 202, 473),
(9, 209, 474),
(9, 217, 475),
(9, 222, 476),
(8, 105, 477),
(8, 112, 478),
(8, 143, 479),
(8, 157, 480),
(8, 164, 481),
(8, 166, 482),
(8, 174, 483),
(8, 208, 484),
(8, 212, 485),
(8, 225, 486),
(1, 105, 646),
(1, 106, 647),
(1, 109, 648),
(1, 112, 649),
(1, 114, 650),
(1, 115, 651),
(1, 117, 652),
(1, 118, 653),
(1, 133, 654),
(1, 136, 655),
(1, 143, 656),
(1, 144, 657),
(1, 147, 658),
(1, 149, 659),
(1, 150, 660),
(1, 153, 661),
(1, 156, 662),
(1, 159, 663),
(1, 165, 664),
(1, 173, 665),
(1, 176, 666),
(1, 179, 667),
(1, 182, 668),
(1, 185, 669),
(2, 105, 670),
(2, 106, 671),
(2, 108, 672),
(2, 109, 673),
(2, 111, 674),
(2, 112, 675),
(2, 114, 676),
(2, 115, 677),
(2, 118, 678),
(2, 144, 679),
(2, 147, 680),
(2, 150, 681),
(2, 153, 682),
(3, 105, 683),
(3, 106, 684),
(3, 107, 685),
(3, 108, 686),
(3, 109, 687),
(3, 110, 688),
(3, 111, 689),
(3, 112, 690),
(3, 113, 691),
(3, 115, 692),
(3, 116, 693),
(3, 118, 694),
(3, 131, 695),
(3, 133, 696),
(3, 134, 697),
(3, 136, 698),
(3, 137, 699),
(3, 139, 700),
(3, 140, 701),
(3, 142, 702),
(3, 218, 703),
(3, 221, 704),
(3, 224, 705),
(4, 105, 706),
(4, 108, 707),
(4, 111, 708),
(4, 114, 709),
(4, 117, 710),
(4, 136, 711),
(4, 144, 712),
(4, 147, 713),
(4, 182, 714),
(4, 202, 715),
(4, 223, 716),
(5, 105, 717),
(5, 139, 718),
(5, 152, 719),
(5, 173, 720),
(5, 186, 721),
(5, 194, 722),
(5, 202, 723),
(5, 206, 724),
(5, 225, 725),
(6, 112, 726),
(6, 115, 727),
(6, 143, 728),
(6, 172, 729),
(6, 202, 730),
(6, 203, 731),
(6, 222, 732),
(20, 117, 733),
(20, 118, 734),
(20, 142, 735),
(20, 143, 736),
(20, 145, 737),
(20, 173, 738),
(20, 174, 739),
(20, 189, 740),
(20, 194, 741),
(20, 205, 742),
(20, 214, 743),
(20, 217, 744),
(20, 224, 745);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos_lugares_cercanos`
--

CREATE TABLE IF NOT EXISTS `apartamentos_lugares_cercanos` (
  `id_apartamento` int(11) NOT NULL,
  `id_lugar_cercano` int(11) NOT NULL,
  `id_apartamento_lugar_cercano` int(11) NOT NULL AUTO_INCREMENT,
  `valor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_apartamento_lugar_cercano`),
  KEY `fk_apartamentos_has_lugares_cercanos_lugares_cercanos1_idx` (`id_lugar_cercano`),
  KEY `fk_apartamentos_has_lugares_cercanos_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `apartamentos_lugares_cercanos`
--

INSERT INTO `apartamentos_lugares_cercanos` (`id_apartamento`, `id_lugar_cercano`, `id_apartamento_lugar_cercano`, `valor`) VALUES
(1, 1, 1, '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos_pagos_tipos`
--

CREATE TABLE IF NOT EXISTS `apartamentos_pagos_tipos` (
  `id_apartamento` int(11) NOT NULL,
  `id_pago_tipo` int(11) NOT NULL,
  `id_apartamento_pago_tipo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_apartamento_pago_tipo`),
  KEY `fk_apartamentos_has_pagos_tipos_pagos_tipos1_idx` (`id_pago_tipo`),
  KEY `fk_apartamentos_has_pagos_tipos_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Volcado de datos para la tabla `apartamentos_pagos_tipos`
--

INSERT INTO `apartamentos_pagos_tipos` (`id_apartamento`, `id_pago_tipo`, `id_apartamento_pago_tipo`) VALUES
(1, 1, 58),
(3, 0, 59),
(3, 1, 60),
(3, 2, 61),
(4, 1, 62),
(4, 5, 63);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos_tipos`
--

CREATE TABLE IF NOT EXISTS `apartamentos_tipos` (
  `id_apartamentos_tipo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_apartamentos_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `apartamentos_tipos`
--

INSERT INTO `apartamentos_tipos` (`id_apartamentos_tipo`, `nombre`) VALUES
(1, 'Apartamento'),
(2, 'Casa'),
(3, 'Bed & Breakfast'),
(4, 'Loft'),
(5, 'Cabaña'),
(6, 'Villa'),
(7, 'Dormitorio compartido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE IF NOT EXISTS `ciudades` (
  `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `id_provincia` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_ciudad`),
  KEY `fk_ciudades_provincias1_idx` (`id_provincia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id_ciudad`, `nombre`, `id_provincia`, `codigo`) VALUES
(1, 'Cambrils', 1, 'cmb'),
(2, 'La pineda', 1, 'lap'),
(3, 'Salou', 1, NULL),
(4, 'Tarragona', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condiciones_compra`
--

CREATE TABLE IF NOT EXISTS `condiciones_compra` (
  `id_condicion_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_apartamento` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_condicion_compra`),
  KEY `fk_condiciones_compra_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `condiciones_compra`
--

INSERT INTO `condiciones_compra` (`id_condicion_compra`, `id_apartamento`, `nombre`, `descripcion`) VALUES
(1, 1, 'Esta es una condición de compra', 'Esta es la descripción de una condición de co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE IF NOT EXISTS `contratos` (
  `id_contrato` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `porcentaje` double DEFAULT NULL,
  PRIMARY KEY (`id_contrato`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`id_contrato`, `nombre`, `tiempo_creacion`, `ultima_modificacion`, `fecha_inicio`, `fecha_fin`, `precio`, `porcentaje`) VALUES
(1, 'contrato comisionable 2012', '2013-05-30 06:40:37', '2013-05-30 06:40:37', '2013-05-29 22:40:25', '2014-05-29 22:40:28', 123, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE IF NOT EXISTS `cuentas` (
  `id_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `iban` varchar(50) DEFAULT NULL,
  `swif` varchar(50) DEFAULT NULL,
  `id_moneda` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `titular` varchar(60) DEFAULT NULL,
  `cvv` varchar(4) DEFAULT NULL,
  `c_d` int(11) DEFAULT NULL,
  `c_a` int(11) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_cuenta`),
  KEY `fk_cuentas_monedas1_idx` (`id_moneda`),
  KEY `fk_cuentas_empresas1_idx` (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id_cuenta`, `iban`, `swif`, `id_moneda`, `id_empresa`, `titular`, `cvv`, `c_d`, `c_a`, `numero`) VALUES
(1, '364823648726374', '87236487236487236487', 1, 1, '0', '0', 0, 0, '0'),
(2, '123123', '123123123', 1, 2, '0', '0', 0, 0, '0'),
(3, '7777777777', '21ewqsd', 1, 3, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE IF NOT EXISTS `direcciones` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `calle` varchar(65) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `codigo_postal` varchar(45) DEFAULT NULL,
  `id_pais` int(11) NOT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  `referencia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_direccion`),
  KEY `fk_direcciones_paises_idx` (`id_pais`),
  KEY `fk_direcciones_provincias1_idx` (`id_provincia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id_direccion`, `calle`, `numero`, `provincia`, `codigo_postal`, `id_pais`, `lat`, `lon`, `id_provincia`, `referencia`) VALUES
(1, 'Esta es una calle', '23D', '38683 Acantilados de los Gigantes, Santa Cruz', '77500', 1, 40.367272305706, -3.76659813125002, 1, '  Cerca de la plaza '),
(2, '123123', '123', '12321', '12', 1, 40, -3, 1, ''),
(3, 'Calle2 ', '411', 'Cantabria', '#777777777', 1, 40.4113554, -3.7028359, NULL, NULL),
(4, '', '123', '38683 Acantilados, Santa Cruz de Tenerife, Es', '77500', 1, 40.4634651719155, -3.78307762343752, 1, '    Cerca de la plaza  '),
(5, '', '123', 'Madrid, España', '77500', 1, 40.4922570123504, -3.634643734375, 1, '     Cerca de la plaza '),
(6, '', '', 'Madrid, España', '77500', 1, 40.4281450383692, -3.69878888281255, 1, '     Cerca de la plaza'),
(7, '', '123', 'Madrid, España', '77521', 1, 40.4397736355409, -3.69280387187496, 1, '   Cerca de la plaza'),
(8, '', '', 'Catalunya, Barcelona, España', '77500', 1, 40.4113554, -3.7028359, 1, '123'),
(9, '', '', 'Catalunya, Barcelona, España', '77500', 1, 40.4113554, -3.7028359, 1, '123'),
(10, '', '123', 'Cancún, México', '77500', 1, 21.1645669881895, -86.8398859364623, 1, '123'),
(11, '', '123', 'Madrid, España', '77500', 1, 40.4031818371368, -3.69005728984371, 1, '  Cerca de la plaza'),
(12, '', '', 'Madrid, España', '77500', 1, 40.4157298388015, -3.70653678203121, 1, ' Estas es una dirección '),
(13, '', '', 'Madrid, España', '77500', 1, 40.4449994104326, -3.69692374492183, 1, ' Cerca de una plaza '),
(14, '', '', 'Madrid, España', '77500', 1, 40.4261847196306, -3.67220450664058, 1, ' Cerca de la plaza '),
(15, '', '', 'Madrid, España', '77500', 1, 40.4282755008173, -3.73125602031246, 1, ' Cerca de la plaza '),
(16, '', '', 'Madrid, España', '775002', 1, 40.4251393046645, -3.72850943828121, 1, ' Cerca de la plaza '),
(17, '', '', 'Madrid, España', '775002', 1, 40.390631495989, -3.68181754374996, 1, ' Cerca de la plaza '),
(18, '', '', 'Madrid, España', '775002', 1, 40.4335021694299, -3.70104361796871, 1, ' Cerca de la plaza '),
(19, '', '', 'Madrid, España', '77752', 1, 40.3979528126279, -3.67769767070308, 1, ' Cerca de la plaza '),
(20, '', '', 'Madrid, España', '77521', 1, 40.3979528126279, -3.68456412578121, 1, ' Cerca de la plaza '),
(21, '', '', 'Madrid, España', '77752', 1, 40.4376832118353, -3.71202994609371, 1, ' Cerca de la plaza '),
(22, '', '', 'Madrid, España', '77521', 1, 40.4335021694299, -3.69143058085933, 1, ' Cerca de la plaza '),
(23, '', '', 'Madrid, España', '77521', 1, 40.3989986500219, -3.67495108867183, 1, ' Cerca de la plaza '),
(24, '', '', 'Madrid, España', '77521', 1, 40.4073647643092, -3.68044425273433, 1, ' Cerca de la plaza '),
(25, '', '', 'Madrid, España', '77521', 1, 40.4113554, -3.7028359, 1, 'Cerca de la plaza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponbilidades`
--

CREATE TABLE IF NOT EXISTS `disponbilidades` (
  `id_disponibilidad` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_final` datetime DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `precio_fin_semana` double DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `id_apartamento` int(11) NOT NULL,
  `anotacion` text,
  PRIMARY KEY (`id_disponibilidad`),
  KEY `fk_disponbilidades_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Volcado de datos para la tabla `disponbilidades`
--

INSERT INTO `disponbilidades` (`id_disponibilidad`, `fecha_inicio`, `fecha_final`, `precio`, `precio_fin_semana`, `estatus`, `id_apartamento`, `anotacion`) VALUES
(7, '2013-07-04 00:00:00', '2013-07-04 00:00:00', 0, 0, 'no disponible', 1, 'Tarifa'),
(8, '2013-07-05 00:00:00', '2013-07-05 00:00:00', 0, 0, 'no disponible', 1, 'Tarifa'),
(9, '2013-07-06 00:00:00', '2013-07-06 00:00:00', 0, 0, 'no disponible', 1, 'Tarifa'),
(10, '2013-07-07 00:00:00', '2013-07-07 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(11, '2013-07-08 00:00:00', '2013-07-08 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(12, '2013-07-09 00:00:00', '2013-07-09 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(13, '2013-07-10 00:00:00', '2013-07-10 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(14, '2013-07-11 00:00:00', '2013-07-11 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(15, '2013-07-12 00:00:00', '2013-07-12 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(16, '2013-07-13 00:00:00', '2013-07-13 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(17, '2013-07-14 00:00:00', '2013-07-14 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(18, '2013-07-15 00:00:00', '2013-07-15 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(19, '2013-07-16 00:00:00', '2013-07-16 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(20, '2013-07-17 00:00:00', '2013-07-17 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(21, '2013-07-18 00:00:00', '2013-07-18 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(22, '2013-07-19 00:00:00', '2013-07-19 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(23, '2013-07-20 00:00:00', '2013-07-20 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(24, '2013-07-21 00:00:00', '2013-07-21 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(25, '2013-07-22 00:00:00', '2013-07-22 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(26, '2013-07-23 00:00:00', '2013-07-23 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(27, '2013-07-24 00:00:00', '2013-07-24 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(28, '2013-07-25 00:00:00', '2013-07-25 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(29, '2013-07-26 00:00:00', '2013-07-26 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(30, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(31, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(32, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(33, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(34, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(35, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(36, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(37, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(38, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(39, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(40, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(41, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(42, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(43, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(44, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(45, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(46, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(47, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(48, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(49, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(50, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(51, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(52, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(53, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(54, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(55, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(56, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(57, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(58, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(59, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(60, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(61, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(62, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(63, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(64, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(65, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(66, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(67, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(68, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(69, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(70, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(71, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(72, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(73, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(74, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(75, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(76, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(77, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(78, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(79, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(80, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(81, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(82, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(83, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(84, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(85, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 30, 0, 'disponible', 1, 'Tarifa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido_paterno` varchar(45) DEFAULT NULL,
  `apellido_materno` varchar(45) DEFAULT NULL,
  `nombre_fiscal` varchar(65) DEFAULT NULL,
  `cif` text,
  `id_direccion` int(11) NOT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`),
  KEY `fk_empresa_direcciones1_idx` (`id_direccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nombre`, `apellido_paterno`, `apellido_materno`, `nombre_fiscal`, `cif`, `id_direccion`, `tiempo_creacion`, `ultima_modificacion`, `email`) VALUES
(1, 'Rubén', 'Velázquezs', 'Calva', 'Listico''s Software', '2176381726387126387', 1, '2013-05-30 06:35:19', '2013-05-30 06:35:19', 'listico__@hotmail.com'),
(2, 'Ruben', 'Velazquez', 'Calva', 'Una nueva inmobiliaria', '123123', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ruben.listico.ds@gmail.com'),
(3, 'Ruben', 'uhiu', 'iuh', 'Hotel Fuerte Ventura Libre', '11111111111111', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huespedes`
--

CREATE TABLE IF NOT EXISTS `huespedes` (
  `id_huesped` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_direccion` int(11) NOT NULL,
  PRIMARY KEY (`id_huesped`),
  KEY `fk_huesped_usuarios1_idx` (`id_usuario`),
  KEY `fk_huespedes_direcciones1_idx` (`id_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huespedes_cuentas`
--

CREATE TABLE IF NOT EXISTS `huespedes_cuentas` (
  `huespedes_id_huesped` int(11) NOT NULL,
  `cuentas_id_cuenta` int(11) NOT NULL,
  `id_huesped_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_huesped_cuenta`),
  KEY `fk_huespedes_has_cuentas_cuentas1_idx` (`cuentas_id_cuenta`),
  KEY `fk_huespedes_has_cuentas_huespedes1_idx` (`huespedes_id_huesped`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE IF NOT EXISTS `idiomas` (
  `id_idioma` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_idioma`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id_idioma`, `nombre`) VALUES
(1, 'Español');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalaciones`
--

CREATE TABLE IF NOT EXISTS `instalaciones` (
  `id_instalacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `id_instalacion_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_instalacion`),
  KEY `fk_instalaciones_instalaciones_categoria1_idx` (`id_instalacion_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=226 ;

--
-- Volcado de datos para la tabla `instalaciones`
--

INSERT INTO `instalaciones` (`id_instalacion`, `nombre`, `id_instalacion_categoria`) VALUES
(105, 'Aire acondicionado', 1),
(106, 'Suelo de moqueta', 1),
(107, 'Chimenea', 1),
(108, 'Plancha para ropa', 1),
(109, 'Entrada privada', 1),
(110, 'Insonorización', 1),
(111, 'Lavadora', 1),
(112, 'Piscina privada', 1),
(113, 'Vestidor', 1),
(114, 'Equipo de planchado', 1),
(115, 'Caja fuerte', 1),
(116, 'Zona de estar', 1),
(117, 'Suelo de madera', 1),
(118, 'Secadora', 1),
(131, 'Camas extra largas', 1),
(132, 'Calefacción', 1),
(133, 'Bañera de hidromasaje', 1),
(134, 'Sofá', 1),
(135, 'Suelo de baldosa', 1),
(136, 'Escritorio', 1),
(137, 'Armario', 1),
(138, 'Ventilador', 1),
(139, 'Habitaciones comunicadas', 1),
(140, 'Mosquitera', 1),
(141, 'Sofá cama', 1),
(142, 'Plancha para pantalones', 1),
(143, 'Bañera', 2),
(144, 'Baño', 2),
(145, 'Bañera de hidromasaje', 2),
(146, 'Ducha', 2),
(147, 'Bidé', 2),
(148, 'Artículos de aseo gratuitos', 2),
(149, 'Baño compartido', 2),
(150, 'Zapatillas', 2),
(151, 'Bañera o ducha', 2),
(152, 'Aseo adicional', 2),
(153, 'Aseo compartido', 2),
(154, 'Aseo', 2),
(155, 'Albornoz', 2),
(156, 'Secador de pelo', 2),
(157, 'Sauna', 2),
(158, 'Ordenador', 3),
(159, 'Videoconsola -  PS2', 3),
(160, 'TV por cable', 3),
(161, 'Soporte para iPod', 3),
(162, 'Radio', 3),
(163, 'Video', 3),
(164, 'iPad', 3),
(165, 'Videoconsola - PS3', 3),
(166, 'Reproductor de CD', 3),
(167, 'Caja fuerte con capacidad para ordenador port', 3),
(168, 'TV vía satélite', 3),
(169, 'Videojuegos', 3),
(170, 'Videoconsola', 3),
(171, 'Videoconsola - Nintendo Wii', 3),
(172, 'Reproductor de DVD', 3),
(173, 'TV de pantalla plana/de plasma/LCD', 3),
(174, 'Teléfono', 3),
(175, 'Videoconsola - Xbox 360', 3),
(176, 'Ordenador portátil', 3),
(177, 'Fax', 3),
(178, 'TV de pago', 3),
(179, 'TV', 3),
(180, 'Ordenador', 3),
(181, 'Videoconsola -  PS2', 3),
(182, 'TV por cable', 3),
(183, 'Soporte para iPod', 3),
(184, 'Radio', 3),
(185, 'Video', 3),
(186, 'iPad', 3),
(187, 'Videoconsola - PS3', 3),
(188, 'Reproductor de CD', 3),
(189, 'Caja fuerte', 3),
(190, 'TV vía satélite', 3),
(191, 'Videojuegos', 3),
(192, 'Videoconsola', 3),
(193, 'Videoconsola - Nintendo Wii', 3),
(194, 'Reproductor de DVD', 3),
(195, 'TV de pantalla plana/de plasma/LCD', 3),
(196, 'Teléfono', 3),
(197, 'Videoconsola - Xbox 360', 3),
(198, 'Ordenador portátil', 3),
(199, 'Fax', 3),
(200, 'TV de pago', 3),
(201, 'TV', 3),
(202, 'Zona de comedor', 4),
(203, 'Barbacoa', 4),
(204, 'Cocina', 4),
(205, 'Frigorífico', 4),
(206, 'Horno', 4),
(207, 'Lava-vajillas', 4),
(208, 'Zona de cocina', 4),
(209, 'Tetera - Cafetera', 4),
(210, 'Fogones', 4),
(211, 'Hervidor eléctrico', 4),
(212, 'Utensilios de cocina', 4),
(213, 'Tostadora', 4),
(214, 'Minibar', 4),
(215, 'Microondas', 4),
(216, 'Toallas - sábanas con suplemento', 5),
(217, 'Reloj despertador', 5),
(218, 'Balcón', 6),
(219, 'Vistas al lago', 6),
(220, 'Patio', 6),
(221, 'Vistas al jardín', 6),
(222, 'Vistas a la piscina', 6),
(223, 'Vistas al mar', 6),
(224, 'Vistas a la montaña', 6),
(225, 'Vistas a un lugar de interés', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalaciones_categoria`
--

CREATE TABLE IF NOT EXISTS `instalaciones_categoria` (
  `id_instalacion_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_instalacion_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `instalaciones_categoria`
--

INSERT INTO `instalaciones_categoria` (`id_instalacion_categoria`, `nombre`) VALUES
(1, 'Complementos de la habitación'),
(2, 'Cuarto de baño'),
(3, 'Medios de comunicación'),
(4, 'Comida y bebida'),
(5, 'Servicios adicionales'),
(6, 'Exterior / Vistas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares_cercanos`
--

CREATE TABLE IF NOT EXISTS `lugares_cercanos` (
  `id_lugar_cercano` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `medida` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_lugar_cercano`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `lugares_cercanos`
--

INSERT INTO `lugares_cercanos` (`id_lugar_cercano`, `nombre`, `medida`, `tipo`) VALUES
(1, 'Playa', 'KM', 'global'),
(2, 'Centro', 'KM', 'global'),
(3, 'Aeropuerto', 'KM', 'global'),
(4, 'Transportes públicos', 'KM', 'global');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedas`
--

CREATE TABLE IF NOT EXISTS `monedas` (
  `id_moneda` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `simbolo` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `tasa_cambio` double DEFAULT NULL,
  PRIMARY KEY (`id_moneda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `monedas`
--

INSERT INTO `monedas` (`id_moneda`, `nombre`, `simbolo`, `codigo`, `tasa_cambio`) VALUES
(1, 'Euro', '€', 'EUR', 1),
(2, 'Dolar', '$', 'USD', 0.772439364);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opiniones`
--

CREATE TABLE IF NOT EXISTS `opiniones` (
  `id_opinion` int(11) NOT NULL AUTO_INCREMENT,
  `opinion` text,
  `puntuacion` double DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `ultima_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_apartamento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_opinion`),
  KEY `fk_opiniones_apartamentos1_idx` (`id_apartamento`),
  KEY `fk_opiniones_usuarios1_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `opiniones`
--

INSERT INTO `opiniones` (`id_opinion`, `opinion`, `puntuacion`, `fecha_creacion`, `ultima_actualizacion`, `id_apartamento`, `id_usuario`) VALUES
(1, 'Este es un excelente lugar! Lo recomiendo 100%.', 10, '2013-06-07 08:00:00', '2013-06-06 16:17:49', 1, 1),
(2, 'Muy mal lugar', 4, '2013-06-05 08:00:00', '2013-06-06 16:17:49', 1, 1),
(3, 'No me gusta para nada!', 3.5, '2013-06-18 10:59:38', '2013-06-18 10:59:38', 4, 1),
(4, 'Nice!', 10, '2013-06-18 03:22:23', '2013-06-18 03:22:23', 2, 1),
(5, 'Cool!', 10, '2013-06-18 03:23:04', '2013-06-18 03:23:04', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_tipos`
--

CREATE TABLE IF NOT EXISTS `pagos_tipos` (
  `id_pago_tipo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_pago_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos_tipos`
--

INSERT INTO `pagos_tipos` (`id_pago_tipo`, `nombre`) VALUES
(0, 'Paypal'),
(1, 'Master Card'),
(2, 'American Express'),
(3, 'Dinner'),
(4, 'Visa'),
(5, 'Paypal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) DEFAULT NULL,
  `nombre_completo` varchar(255) DEFAULT NULL,
  `iso3` varchar(3) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `numero` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pais`, `codigo`, `nombre_completo`, `iso3`, `nombre`, `numero`) VALUES
(1, 724, 'España', 'ESP', 'ES', 724),
(2, 36, 'Australia', 'AUS', 'AU', 36),
(3, 484, 'México', 'MEX', 'MX', 484),
(4, 276, 'Alemania', 'DEU', 'DE', 276),
(5, 643, 'Russia', 'RUS', 'RU', 643);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `id_provincia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(105) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `id_pais` int(11) NOT NULL,
  PRIMARY KEY (`id_provincia`),
  KEY `fk_provincias_paises1_idx` (`id_pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `nombre`, `codigo`, `id_pais`) VALUES
(1, 'Tarragona', 'tr', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE IF NOT EXISTS `reservaciones` (
  `id_reservacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_huesped` int(11) NOT NULL,
  `tiempoCreacion` timestamp NULL DEFAULT NULL,
  `ultimaModificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_apartamento` int(11) NOT NULL,
  `fecha_entrada` datetime DEFAULT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `huespedes` int(11) DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `id_cuenta` int(11) NOT NULL,
  PRIMARY KEY (`id_reservacion`),
  KEY `fk_reservaciones_huespedes1_idx` (`id_huesped`),
  KEY `fk_reservaciones_apartamentos1_idx` (`id_apartamento`),
  KEY `fk_reservaciones_cuentas1_idx` (`id_cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscripciones`
--

CREATE TABLE IF NOT EXISTS `subscripciones` (
  `id_subscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_subscripcion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario_grupo` int(11) NOT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `apellido_materno` varchar(45) DEFAULT NULL,
  `apellido_paterno` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuarios_usuarios_grupos1_idx` (`id_usuario_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`, `tiempo_creacion`, `ultima_modificacion`, `id_usuario_grupo`, `estatus`, `telefono`, `apellido_materno`, `apellido_paterno`) VALUES
(1, 'Rubén', 'admin', 'admin', '2013-05-30 06:27:11', '2013-05-30 06:27:11', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_grupos`
--

CREATE TABLE IF NOT EXISTS `usuarios_grupos` (
  `id_usuario_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios_grupos`
--

INSERT INTO `usuarios_grupos` (`id_usuario_grupo`, `nombre`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apartamentos`
--
ALTER TABLE `apartamentos`
  ADD CONSTRAINT `fk_apartamentos_apartamentos_tipos1` FOREIGN KEY (`id_apartamentos_tipo`) REFERENCES `apartamentos_tipos` (`id_apartamentos_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_direcciones1` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_empresas1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_monedas1` FOREIGN KEY (`id_moneda`) REFERENCES `monedas` (`id_moneda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_idiomas1` FOREIGN KEY (`id_idioma`) REFERENCES `idiomas` (`id_idioma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_contratos1` FOREIGN KEY (`id_contrato`) REFERENCES `contratos` (`id_contrato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `apartamentos_adjuntos`
--
ALTER TABLE `apartamentos_adjuntos`
  ADD CONSTRAINT `fk_apartamentos_has_adjuntos_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_has_adjuntos_adjuntos1` FOREIGN KEY (`id_adjunto`) REFERENCES `adjuntos` (`id_adjunto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `apartamentos_alojamientos`
--
ALTER TABLE `apartamentos_alojamientos`
  ADD CONSTRAINT `fk_apartamentos_has_alojamientos_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_has_alojamientos_alojamientos1` FOREIGN KEY (`id_alojamiento`) REFERENCES `alojamientos` (`id_alojamiento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `apartamentos_instalaciones`
--
ALTER TABLE `apartamentos_instalaciones`
  ADD CONSTRAINT `fk_apartamentos_has_instalaciones_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_has_instalaciones_instalaciones1` FOREIGN KEY (`id_instalacion`) REFERENCES `instalaciones` (`id_instalacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `apartamentos_lugares_cercanos`
--
ALTER TABLE `apartamentos_lugares_cercanos`
  ADD CONSTRAINT `fk_apartamentos_has_lugares_cercanos_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_has_lugares_cercanos_lugares_cercanos1` FOREIGN KEY (`id_lugar_cercano`) REFERENCES `lugares_cercanos` (`id_lugar_cercano`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `apartamentos_pagos_tipos`
--
ALTER TABLE `apartamentos_pagos_tipos`
  ADD CONSTRAINT `fk_apartamentos_has_pagos_tipos_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_has_pagos_tipos_pagos_tipos1` FOREIGN KEY (`id_pago_tipo`) REFERENCES `pagos_tipos` (`id_pago_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `fk_ciudades_provincias1` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `condiciones_compra`
--
ALTER TABLE `condiciones_compra`
  ADD CONSTRAINT `fk_condiciones_compra_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `fk_cuentas_monedas1` FOREIGN KEY (`id_moneda`) REFERENCES `monedas` (`id_moneda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cuentas_empresas1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `fk_direcciones_paises` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_direcciones_provincias1` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `disponbilidades`
--
ALTER TABLE `disponbilidades`
  ADD CONSTRAINT `fk_disponbilidades_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `fk_empresa_direcciones1` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `huespedes`
--
ALTER TABLE `huespedes`
  ADD CONSTRAINT `fk_huesped_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_huespedes_direcciones1` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `huespedes_cuentas`
--
ALTER TABLE `huespedes_cuentas`
  ADD CONSTRAINT `fk_huespedes_has_cuentas_huespedes1` FOREIGN KEY (`huespedes_id_huesped`) REFERENCES `huespedes` (`id_huesped`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_huespedes_has_cuentas_cuentas1` FOREIGN KEY (`cuentas_id_cuenta`) REFERENCES `cuentas` (`id_cuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD CONSTRAINT `fk_instalaciones_instalaciones_categoria1` FOREIGN KEY (`id_instalacion_categoria`) REFERENCES `instalaciones_categoria` (`id_instalacion_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD CONSTRAINT `fk_opiniones_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_opiniones_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `fk_provincias_paises1` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `fk_reservaciones_huespedes1` FOREIGN KEY (`id_huesped`) REFERENCES `huespedes` (`id_huesped`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservaciones_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservaciones_cuentas1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentas` (`id_cuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_usuarios_grupos1` FOREIGN KEY (`id_usuario_grupo`) REFERENCES `usuarios_grupos` (`id_usuario_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
