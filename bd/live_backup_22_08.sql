-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-08-2013 a las 16:16:51
-- Versión del servidor: 5.5.32-0ubuntu0.13.04.1
-- Versión de PHP: 5.4.9-4ubuntu2.2

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `adjuntos`
--

INSERT INTO `adjuntos` (`id_adjunto`, `nombre`, `ruta`, `tipo`, `ext`) VALUES
(1, 'Primera foto', '/recursos/apartamentos/1.jpg', 'apartamento', 'jpg'),
(2, 'Alguna cosa', '/recursos/apartamentos/2.jpg', 'apartamento', 'jpg'),
(12, 'licenciaTuristica.pdf', '/recursos/apartamentos/1/licenciaTuristica.pdf', 'licenciaTuristica', 'application/pdf'),
(13, 'notaRegistral.sql', '/recursos/apartamentos/1/notaRegistral.sql', 'notaRegistral', 'application/octet-stream'),
(14, 'reciboIBI.sql', '/recursos/apartamentos/1/reciboIBI.sql', 'reciboIBI', 'application/octet-stream'),
(15, 'cedulaHabitabilidad.sql', '/recursos/apartamentos/1/cedulaHabitabilidad.sql', 'cedulaHabitabilidad', 'application/octet-stream'),
(16, 'dniPropietario.sql', '/recursos/apartamentos/1/dniPropietario.sql', 'dniPropietario', 'application/octet-stream'),
(17, 'certificadoComunidad.sql', '/recursos/apartamentos/1/certificadoComunidad.sql', 'certificadoComunidad', 'application/octet-stream'),
(18, '1.jpg', '/recursos/apartamentos/8b1f199503edbe38f251b4ac6fe62a0e.jpg', 'apartamento', 'jpg'),
(19, '2.jpg', '/recursos/apartamentos/a52755b759920f9e4e80f592a0d9ca23.jpg', 'apartamento', 'jpg'),
(20, '3.jpg', '/recursos/apartamentos/6e49cdbf739c35175b74157fb956d398.jpg', 'apartamento', 'jpg'),
(21, 'licenciaTuristica.pdf', '/recursos/apartamentos/1/licenciaTuristica.pdf', 'licenciaTuristica', 'application/pdf');

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
  `id_empresa_contrato` int(11) DEFAULT NULL,
  `nombre` varchar(300) DEFAULT NULL,
  `id_apartamentos_tipo` int(11) NOT NULL,
  `id_direccion` int(11) NOT NULL,
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
  `tarifa_base` double DEFAULT NULL,
  `tarifa_semana` double DEFAULT NULL,
  `tarifa_mes` double DEFAULT NULL,
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
  `cantidad` int(11) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `id_politica_cancelacion` int(11) DEFAULT NULL,
  `id_apartamento_descripcion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_apartamento`),
  KEY `fk_apartamentos_apartamentos_tipos1_idx` (`id_apartamentos_tipo`),
  KEY `fk_apartamentos_direcciones1_idx` (`id_direccion`),
  KEY `fk_apartamentos_monedas1_idx` (`id_moneda`),
  KEY `fk_apartamentos_idiomas1_idx` (`id_idioma`),
  KEY `fk_apartamentos_usuarios1_idx` (`id_usuario`),
  KEY `fk_apartamentos_empresas_contratos1_idx` (`id_empresa_contrato`),
  KEY `fk_apartamentos_politicas_cancelacion1_idx` (`id_politica_cancelacion`),
  KEY `fk_apartamentos_apartamentos_descripcion1_idx` (`id_apartamento_descripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `apartamentos`
--

INSERT INTO `apartamentos` (`id_apartamento`, `id_empresa_contrato`, `nombre`, `id_apartamentos_tipo`, `id_direccion`, `id_moneda`, `horario_entrada`, `horario_salida`, `descripcion_corta`, `descripcion_larga`, `id_idioma`, `descripcion_servicios`, `descripcion_condiciones`, `tiempo_creacion`, `ultima_modificacion`, `estatus`, `id_usuario`, `tarifa_base`, `tarifa_semana`, `tarifa_mes`, `estadia_maxima`, `estadia_minima`, `huesped_adicional_apartir`, `huesped_adicional_costo`, `costo_limpieza`, `deposito_seguridad`, `precio_fin_semana`, `normas`, `tamanio`, `capacidad_personas`, `habitaciones`, `camas`, `tipo_cama`, `banio`, `mascotas`, `manual`, `cantidad`, `codigo`, `id_politica_cancelacion`, `id_apartamento_descripcion`) VALUES
(1, 5, 'LES ONES CB063', 2, 1, 2, '00:00:00', '00:00:00', 'Esta es una descripción corta', '        Apartamento de 2 habitaciones con capacidad para 4/6 personas y vistas frontales al mar desde la terraza. Se compone de salón comedor con sofá cama y salida a la terraza equipada con mobiliario de jardín , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 2 cuartos de baño uno de ellos con bañera de hidromasaje y cocina independiente totalmente equipada.El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias de la vivienda. Plaza de aparcamiento para coche grande.\r\nNO SE ADMITEN GRUPOS DE JOVENES. Es exclusivo para familias debido a la tranquilidad del complejo y de los vecinos.\r\n\r\nLos Apartamentos Les Ones están en Salou, a solo 150 metros de la playa Capellans. Cuentan con vistas al mar e incluyen aire acondicionado, balcón privado y un jardín con una piscina compartida al aire libre rodeada de tumbonas.\r\nLos apartamentos Les Ones disponen de un salón con sofá cama y TV de pantalla plana, un baño con bañera de hidromasaje y una zona de cocina con fogones, microondas, horno, lavavajillas y lavadora.\r\nLos Apartamentos Les Ones disponen de aparcamiento privado gratuito y una recepción con servicio de información turística.\r\nSe encuentran a solo 8 minutos en coche de PortAventura, a 15 minutos en coche de Tarragona y a 2 km de la estación de tren de Salou, que comunica con el centro de Barcelona en aproximadamente 75 minutos.   ', 1, 'Descripción de servicios', 'Descripción de condiciones', '2013-06-12 23:38:26', '2013-08-08 15:38:48', 'activo', 1, 30, 1300, 5000, 30, 2, 4, 20, 10, 10, 25, ' LES ONES CB063 ', 125, 5, 2, 3, 'Cama', 2, 0, '  Las llaves están abajo de la maceta ', NULL, '', 1, NULL),
(2, 4, 'ACANTILADOS CB013', 1, 4, 1, '15:00:00', '12:00:00', '', '     Exclusivo ático en primera línea de playa en Salou con capacidad para 6 personas distribuidas en 4 habitaciones.Amplio salón comedor con espectaculares vistas al mar y decoración de diseño, cocina independiente con barra americana totalmente equipada con todas las facilidades y sistema de OSMOSYS decalificador de agua. 2 habitaciones con camas de matrimonio y colchones de latex , 2 habitaciones con cama individual , baño con ducha de hidromasaje y aseo.POSIBILIDAD DE PLAZA DE PARKING LOS MESES DE JULIO Y AGOSTO. \r\nEl edificio, de 8 Plantas, a pie de la playa larga de Salou, cerca de restaurantes, comercios y la famosa fuente luminosa. Se encuentra a tan solo 1,7Km del parque Port Aventura y costa caribe, a 10 min a pie del centro de Salou y 5 min de la zona de animación 20 Km aeropuerto     ', 1, '', '', '2013-06-13 11:23:11', '2013-07-28 14:02:41', '', 1, 40, 400, 2000, 7, 1, 0, 0, 0, 0, 0, ' ACANTILADOS CB013 ', 0, 2, 2, 2, 'Cama', 1, 0, '    Las llaves están abajo de la maceta  ', NULL, NULL, 1, NULL),
(3, 4, ' BARCINO CB021', 1, 5, 1, '15:00:00', '12:00:00', '', '    Apartamento de 3 habitaciones con capacidad para 6 personas en 1ª linea de playa.Salón comedor con pantalla plana , sofá cama y salida a la terraza cerrada con puertas correderas , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 1 habitación con 1 cama individual , cocina independiente equipada y baño completo. El apartamento dispone de aire acondicionado y calefacción por conductos excepto en la habitación individual.\r\nEstos apartamentos cómodos y elegantes se encuentran a sólo 10 metros de la playa de Llevant y están orientados al mar. Disponen de aire acondicionado y de una terraza amueblada con vistas al mar.\r\nLos Apartamentos Barcino, de 3 dormitorios, presentan una decoración funcional y suelo de madera. En el salón comedor hay un sofá, un sofá cama y una TV de plasma. La cocina está equipada con lavadora, microondas, horno y fogones.\r\nA menos de 300 metros encontrará numerosos bares, restaurantes y tiendas. El centro está a 5 minutos a pie.\r\nLos Apartamentos Barcino están a menos de 10 minutos en coche del parque temático PortAventura, que incluye un parque acuático y un campo de golf. La ciudad histórica de Tarragona está a 10 km y el aeropuerto de Reus, a 20 minutos en coche.    ', 1, '', '', '2013-06-13 13:44:59', '2013-07-11 11:25:42', '', 1, 30, 0, 0, 7, 1, 0, 0, 0, 0, 0, '  BARCINO CB021 ', 100, 4, 2, 4, 'Cama', 1.5, 0, '   Las llaves están abajo de la maceta ', NULL, NULL, 1, NULL),
(5, 4, 'ALTAIR CB022 ', 1, 7, 1, '15:00:00', '12:00:00', '', '     Apartamento 1ª línea de playa con capacidad para 4/6 personas. Se compone de un amplio salón comedor con aire acondicionado y bomba de calor con acceso a la zona de terraza cerrada y con vistas frontales al mar 1 habitación con cama de matrimonio ,1 habitación con litera 1x2 , cocina equipada y baño completo.\r\nLos Apartamentos Altair se encuentran a tan solo 10 metros de la playa de Levante. Ofrecen un alojamiento amplio y luminoso con una terraza cerrada y vistas panorámicas al mar.\r\nLos apartamentos presentan una decoración luminosa y funcional. El salón, de planta abierta, cuenta con un sofá y TV , la cocina dispone de cafetera, lavadora, microondas, horno y fogones.\r\nA menos de 300 metros encontrará muchos bares, restaurantes y tiendas. El centro está a 5 minutos a pie.\r\nLos apartamentos del Altair están a menos de 10 minutos en coche del parque temático, el parque acuático y el complejo de golf de PortAventura. La histórica ciudad de Tarragona está a 10 km y el aeropuerto de Reus, a 20 minutos en coche. ', 1, '', '', '2013-06-14 05:05:59', '2013-07-11 11:27:11', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' ALTAIR CB022  ', 100, 4, 2, 4, 'Cama', 1.5, 0, '   Las llaves están abajo de la maceta', NULL, NULL, 1, NULL),
(6, 4, 'ARQUBACH CB027', 1, 11, 1, '15:00:00', '12:00:00', '', '   Impresionante piso de diseño con 4 habitaciones y 4 baños con capacidad para 8 personas en Salou. Amplio salón comedor equipado con televisor de gran tamaño de pantalla plana , DIGITAL + y con salida a terraza.Cocina tipo isla moderna y equipada con televisor de pantalla plana y todos los electrodomésticos necesarios. Cuenta con un total de 4 habitaciones dobles y 4 baños, 3 habitaciones tipo suite, 2 con cama de matrimonio , 2 con 2 camas de 90 cm. La habitación principal cuenta con televisor de pantalla plana y vestidor. \r\nEl residencial cuenta con piscina comunitaria rodeada de césped. A 700 m del centro de Salou, cerca de comercios, restaurantes y servicios. A 10 min a pie de la playa y a 3.5 Km de Port Aventura.\r\nLos Apartamentos ArqUbach están situados en Salou, a solo 3.5 km del parque temático PortAventura. El establecimiento cuenta con piscina de temporada al aire libre y apartamentos con terraza privada.\r\nLos apartamentos ArqUbach presentan una decoración moderna con suelos de parqué. Todos están equipados con lavavajillas, lavadora cocina con vitroceramica, horno, microondas , cafetera y tostadora.\r\nLos Apartamentos Arqubach se encuentran a solo 5 minutos en coche del centro de Salou, a 15 minutos en coche del aeropuerto de Reus y a 20 minutos del centro de Tarragona. Además, están bien comunicados con las autopistas A-7 y AP-7.\r\nEl residencial cuenta con piscina comunitaria rodeada de césped. A 700 m del centro de Salou, cerca de comercios, restaurantes y servicios. A 10 min a pie de la playa y a 5 Km de Port Aventura. ', 1, '', '', '2013-06-19 14:56:58', '2013-07-11 11:28:14', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' ARQUBACH CB027 ', 100, 4, 2, 4, '', 1.5, 0, '  Las llaves están abajo de la maceta', NULL, NULL, 1, NULL),
(7, 4, 'COSTA D’OR II CB036', 1, 12, 1, '15:00:00', '12:00:00', '', '  Apartamento de 1 habitación con capacidad para 2/4 personas en primera linea de playa. Se compone de salón comedor con sofá cama , split de aire frío/caliente y salida a la terraza equipada con mobiliario de jardín. 1 habitación con 2 camas individuales , cocina americana totalmente equipada y baño completo.\r\nEstos apartamentos sencillos y agradables están entre Salou y Cambrils, en una zona residencial tranquila situada a 25 metros de la playa. Disponen de un balcón amueblado con toldo y ofrecen vistas al mar.\r\nLos Apartamentos Costa D’Or, II tienen una decoración práctica de estilo playero y cuentan con aire acondicionado. Incluyen un salón comedor luminoso con TV y sofá cama, y una zona de cocina con lavadora, horno, fogones y cafetera.\r\nLos apartamentos se encuentran a 15 minutos a pie del puerto de Salou y a 3 km del centro de Salou y de Cambrils. A 5 minutos a pie hay varios restaurantes y bares.\r\nLos apartamentos del Costa D’Or, II están a solo 6 km del parque temático PortAventura, a 3,5 km del campo de golf Cambrils Par 3 y a 13 km de la ciudad histórica de Tarragona. El aeropuerto de Reus está a 25 minutos en coche.\r\nLOS MESES DE JULIO Y AGOSTO LA ESTANCIA MÍNIMA ES DE 7 NOCHES DE SÁBADO A SÁBADO.  ', 1, '', '', '2013-07-03 02:54:31', '2013-07-11 11:29:04', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' COSTA D’OR II CB036 ', 100, 4, 2, 4, '', 1.5, 1, ' Este es el manul ', NULL, NULL, 1, NULL),
(8, 4, 'LAS DUNAS', 1, 13, 1, '15:00:00', '12:00:00', '', '  Apartamento de 3 habitaciones con capacidad para 6/8 personas en zona residencial de Cambrils. Se compone de salón comedor con sofá cama , TV pantalla plana vía satélite y salida a la terraza equipada con mobiliario de jardín. 1 habitación con cama de matrimonio , 2 habitación con 2 camas individuales cocina totalmente equipada y 2 cuartos de baño. El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias.\r\nEstos apartamentos están situados en la Costa Dorada, a 200 metros de la playa y a 10 minutos a pie del puerto deportivo. Presentan una decoración moderna y ofrecen acceso a una piscina compartida al aire libre y a una amplia zona ajardinada. \r\nLos Apartamentos Las Dunas cuentan con 2 o 3 dormitorios, conexión Wi-Fi gratuita y terraza privada. Además, incluyen una cocina totalmente equipada y una zona de estar con un cómodo sofá cama y TV de pantalla plana. \r\nEl centro de Cambrils se halla a 5 minutos en coche, mientras que Salou y Port Aventura están a 15 minutos, también en coche. La ciudad histórica de Tarragona queda a 25 km. \r\nSe proporciona aparcamiento privado gratuito.  ', 1, '', '', '2013-07-03 03:16:21', '2013-07-11 11:30:03', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' LAS DUNAS ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta ', NULL, NULL, 1, NULL),
(9, 4, 'LAS DUNAS', 1, 14, 1, '15:00:00', '12:00:00', '', '  Apartamento de 2 habitaciones con capacidad para 4/6 personas en zona residencial de Cambrils. Se compone de salón comedor con sofá cama , TV pantalla plana vía satélite y salida a la terraza equipada con mobiliario de jardín. 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales cocina totalmente equipada y 2 cuartos de baño. El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias.\r\nEstos apartamentos están situados en la Costa Dorada, a 200 metros de la playa y a 10 minutos a pie del puerto deportivo. Presentan una decoración moderna y ofrecen acceso a una piscina compartida al aire libre y a una amplia zona ajardinada. \r\nLos Apartamentos Las Dunas cuentan con 2 o 3 dormitorios, conexión Wi-Fi gratuita y terraza privada. Además, incluyen una cocina totalmente equipada y una zona de estar con un cómodo sofá cama y TV de pantalla plana. \r\nEl centro de Cambrils se halla a 5 minutos en coche, mientras que Salou y Port Aventura están a 15 minutos, también en coche. La ciudad histórica de Tarragona queda a 25 km. \r\nSe proporciona aparcamiento privado gratuito.  ', 1, '', '', '2013-07-03 03:19:31', '2013-07-11 11:31:06', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' LAS DUNAS ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta ', NULL, NULL, 1, NULL),
(10, 4, 'ARQUUS CB030', 1, 15, 1, '15:00:00', '12:00:00', '', '  Apartamento con capacidad para 2/4 personas en la 7ª planta del edificio ARQUUS I en pleno centro de Salou. Salón comedor con sofá cama y salida a la terraza , 1 habitación con cama de matrimonio , cocina americana y baño completo. A 400m de la playa , 50 m de la zona de ocio , 2,4 de Port Aventura y 11km de Tarragona.\r\nLos apartamentos ARQUUS están a 400 metros de la playa de Llevant y del paseo marítimo. Ofrecen piscina al aire libre de temporada, jardines , sala con sillones para la lectura y balcón privado amueblado con vistas a la ciudad y a la montaña. ( la temporada de la piscina es desde el 15.06 hasta el 15.09 )\r\nLos Apartamentos presentan una bonita decoración con muebles tradicionales. El salón/comedor de planta abierta cuenta con sofá cama nido y TV. La zona de cocina incluye lavadora, fogones, microondas , cafetera y tostadora.\r\nLos apartamentos están distribuidos en 2 edificios en la principal calle comercial y de ocio nocturno de la localidad , donde encontrará varios bares, restaurantes y tiendas. El puerto deportivo de Salou está a 15 minutos a pie.\r\nLa estación de tren de Salou se encuentra a 2 km y el aeropuerto de Reus, a 15 km. Tarragona está a 15 minutos en coche  ', 1, '', '', '2013-07-03 03:22:06', '2013-07-11 11:32:01', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' ARQUUS CB030 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta ', NULL, NULL, 1, NULL),
(11, 4, 'ARQUUS CB058', 1, 16, 1, '15:00:00', '12:00:00', '', '  Apartamento esquinero de 2 habitaciones con capacidad para 4/6 personas.Se compone de salón comedor con televisor de pantalla plana y salida a la terraza equipada con mesa y sillas , 1 habitación con cama de matrimonio , 1 habitación con litera , baño completo y cocina totalmente equipada.\r\nEstos luminosos apartamentos están a 400 metros de la playa de Llevant y del paseo marítimo. Ofrecen piscina al aire libre compartida, jardines y balcón privado amueblado con vistas a la ciudad y a la montaña.\r\n\r\nLos Apartamentos ARQUUS cuentan con decoración en tonos pastel y muebles tradicionales. El salón-comedor, de planta abierta, dispone de sofá cama y TV y la zona de cocina incluye lavadora, microondas, fogones y tostadora.\r\n\r\nLos apartamentos se encuentran en 4 edificios de la famosa calle Carles Buiges, donde encontrará varios bares, restaurantes y tiendas. El puerto deportivo de Salou está a 15 minutos a pie.\r\n\r\nLos Apartamentos ARQQUS tienen zona de lectura y están a 2 km de Cap de Salou y sus preciosas calas y a 10 minutos en coche del parque temático PortAventura  ', 1, '', '', '2013-07-03 03:25:17', '2013-07-11 11:33:00', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' ARQUUS CB058 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta ', NULL, NULL, 1, NULL),
(12, 4, 'ARQUUS CB081', 1, 17, 1, '15:00:00', '12:00:00', '', '  Amplio apartamento de 1 habitación mas 1 camarote con capacidad para 4/6 personas en pleno centro turístico de Salou. Se compone de salón comedor con salida a la terraza con vistas a la ciudad , 1 habitación con 2 camas individuales , 1 camarote con litera 1x2 abatible , cocina americana equipada y baño completo.\r\n\r\nEstos apartamentos luminosos se encuentran a 400 metros de la playa de Llevant y del paseo marítimo. Cuentan con jardines con piscina al aire libre compartida y balcón privado amueblado con vistas a las montañas y a la ciudad.\r\nLos Apartamentos Arquus Center presentan una bonita decoración y disponen de muebles tradicionales, salón comedor de planta abierta con sofá cama y TV y zona de cocina con lavadora, microondas, fogones y tostadora.\r\nLos apartamentos están distribuidos en 4 edificios en la famosa calle Carles Buiges, donde los huéspedes encontrarán bares, restaurantes y tiendas. El puerto deportivo de Salou está a 15 minutos a pie.\r\nLos apartamentos Arquus cuentan con zona de lectura y se encuentran a 2 km del cabo de Salou y de sus preciosas calas. El parque temático PortAventura está a 10 minutos en coche.\r\nLa estación de trenes de Salou se encuentra a 2 km, mientras que el aeropuerto de Reus está a 15 km. Tarragona se encuentra a 15 minutos en coche.\r\nEl complejo dispone de piscina comunitaria de temporada abierta desde el 15.06 al 15.09  ', 1, '', '', '2013-07-03 03:27:34', '2013-07-11 11:34:05', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' ARQUUS CB081 ', 100, 4, 2, 4, '', 1.5, 1, ' Las llaves están abajo de la maceta ', NULL, NULL, 1, NULL),
(13, 4, 'ATALAYA MAR CB068', 1, 18, 1, '15:00:00', '12:00:00', '', '  Estudio en planta baja con capacidad para 2/4 personas situado en el centro turístico de Salou. Se compone de salón comedor con salida a la terraza equipada con mobiliario de jardín y toldo. 1 habitación tipo camarote con cama de matrimonio , baño completo con plato de ducha y cocina americana.\r\nEl complejo ATALAYA MAR situado a escasos metros de 2 bonitas playas y muy cerca de la principal zona de tiendas , souvenirs y locales de ocio nocturno. El complejo dispone de piscina al aire libre rodeada de una zona para extender las toallas , zona de juegos infantiles y acceso directo a la playa a escasos metros desde el complejo.  ', 1, '', '', '2013-07-03 03:30:42', '2013-07-11 11:34:52', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' ATALAYA MAR CB068 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta ', NULL, NULL, 1, NULL),
(14, 4, 'ATENEA III CB059', 1, 19, 1, '15:00:00', '12:00:00', '', '  Apartamento de 2 habitaciones con capacidad para 4/6 personas en zona residencial y familiar de Salou. Se compone de salón comedor con sofá cama , split de aire acondicionado y salida a la amplia terraza con vistas a la ciudad. 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , cocina americana cerrada con puertas correderas y baño completo.\r\nEl complejo dispone de piscina al aire libre rodeada de un gran jardín con zonas de sol y sobra y alumbrado nocturno.  ', 1, '', '', '2013-07-03 03:46:01', '2013-07-11 11:49:02', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' ATENEA III CB059 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta ', NULL, NULL, 1, NULL),
(15, 4, 'BARCINO CB021', 1, 20, 1, '15:00:00', '12:00:00', '', '  Apartamento de 3 habitaciones con capacidad para 6 personas en 1ª linea de playa.Salón comedor con pantalla plana , sofá cama y salida a la terraza cerrada con puertas correderas , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 1 habitación con 1 cama individual , cocina independiente equipada y baño completo. El apartamento dispone de aire acondicionado y calefacción por conductos excepto en la habitación individual.\r\nEstos apartamentos cómodos y elegantes se encuentran a sólo 10 metros de la playa de Llevant y están orientados al mar. Disponen de aire acondicionado y de una terraza amueblada con vistas al mar.\r\nLos Apartamentos Barcino, de 3 dormitorios, presentan una decoración funcional y suelo de madera. En el salón comedor hay un sofá, un sofá cama y una TV de plasma. La cocina está equipada con lavadora, microondas, horno y fogones.\r\nA menos de 300 metros encontrará numerosos bares, restaurantes y tiendas. El centro está a 5 minutos a pie.\r\nLos Apartamentos Barcino están a menos de 10 minutos en coche del parque temático PortAventura, que incluye un parque acuático y un campo de golf. La ciudad histórica de Tarragona está a 10 km y el aeropuerto de Reus, a 20 minutos en coche.  ', 1, '', '', '2013-07-03 03:49:46', '2013-07-11 11:51:44', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' BARCINO CB021 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta ', NULL, NULL, 1, NULL),
(16, 4, 'BELLO HORIZONTE CB054', 1, 21, 1, '15:00:00', '12:00:00', '', '  Apartamento de 3 habitaciones con capacidad para 6 personas en 1ª linea de playa. Se compone de Salón comedor con split de aire acondicionado/bomba de calor , sofá , Tv de pantalla plana y salida a la terraza con vistas frontales al mar. 1 habitación con cama de matrimonio , 2 habitaciones con 2 camas individuales , cocina independiente equipada , baño completo y aseo.\r\n\r\nEstos bonitos apartamentos están situados frente a la playa, a 5 minutos a pie del centro de Salou. Disponen de acceso directo a la playa de Llevant, aire acondicionado y una terraza amueblada con vistas al mar.\r\nLos Apartamentos Bello Horizonte presentan una decoración agradable y cuentan con 3 dormitorios y una sala de estar con una TV de plasma y un sofá. También incluyen una cocina sencilla equipada con horno, lavadora, lavavajillas y microondas.\r\nLos apartamentos se encuentran en una zona tranquila, pero están muy cerca a pie de varios bares, restaurantes y tiendas. Además, están a 15 minutos a pie del puerto de Salou.\r\nEl establecimiento Bello Horizonte ofrece toallas, ropa de cama, conexión a internet y aparcamiento por un suplemento. Además, está situado a 4 km de PortAventura y a 25 minutos en coche del aeropuerto de Reus.  ', 1, '', '', '2013-07-03 03:53:58', '2013-07-11 11:52:56', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' BELLO HORIZONTE CB054 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta ', NULL, NULL, 1, NULL),
(17, 4, 'BLUE MOON CB026 ', 1, 22, 1, '15:00:00', '12:00:00', '', '  Apartamento duplex de 4 habitaciones dobles y 105 m2 distribuidos en 2 plantas, en la planta baja, con mobiliario moderno y de buen gusto salón-comedor con sofá cheslongue de piel , mesa de comedor , TV de pantalla plana, conexión a internet por wifi y salida a la amplia terraza equipada con mobiliario y toldos. Aire acondicionado y bomba de calor por conductos en todas las estancias del apartamento. 1 habitación con 2 camas (90 cm), . Cocina (horno, vitrocerámica, microondas, congelador,lavadora). Ducha/WC. Planta superior: 2 dorm., cada habitación con 1 cama de matrimonio. 1 dorm. con 2 x 1 literas. Baño/WC, doble lavabo.\r\nLos Apartamentos Blue Moon están situados a solo 500 metros de la playa de Salou y ofrecen una piscina al aire libre, un parque infantil y aparcamiento privado gratuito. Todos los apartamentos son dúplex, tienen 4 dormitorios y cuentan con terraza amueblada y conexión Wi-Fi gratuita.\r\nTodos los apartamentos del Blue Moon son elegantes y funcionales y disponen de 2 baños, salón-comedor con TV de pantalla plana, aire acondicionado y una moderna zona de cocina con vitrocerámica, lavavajillas y lavadora.\r\nLos Apartamentos Blue Moon están situados en una zona residencial de Salou, a solo 5 minutos a pie de las tiendas, restaurantes y discotecas del centro.\r\nLa estación de tren de Salou se encuentra a 500 metros de los apartamentos, mientras que el parque temático PortAventura está a 10 minutos en coche y el aeropuerto de Reus, a 15 minutos de distancia.  ', 1, '', '', '2013-07-03 03:57:29', '2013-07-11 11:54:05', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' BLUE MOON CB026  ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta ', NULL, NULL, 1, NULL),
(18, 4, 'CAP SALOU CB003', 1, 23, 1, '15:00:00', '12:00:00', '', '  Apartamento de 2 habitaciones con capacidad para 4/6 personas en la tranquila y familiar zona del Cabo Salou con unas impresionantes vistas al mar. Se compone de salón comedor con sofá cama , tv de pantalla plana y salida a la terraza. 1 habitación con cama de matrimonio , 1 habitación con litera , cocina americana totalmente equipada y baño completo. ESTE APARTAMENTO ESTÁ DESTINADO UNICAMENTE A FAMILIAS CON NIÑOS.\r\n\r\nEl establecimiento Apartamentos Cap Salou se encuentra a sólo 100 metros de la playa de Cala Font y a 6 km del centro de Salou. Dispone de apartamentos familiares con aire acondicionado y terraza privada con vistas al mar.\r\nLos apartamentos Cap Salou cuentan con 1 dormitorio doble, 1 dormitorio con literas, salón comedor con sofá cama y TV de pantalla plana y zona de cocina con fogones, horno, microondas, lavadora y lavavajillas.\r\nLos apartamentos están a sólo 15 minutos en coche del parque temático PortAventura y a 20 minutos también en coche de la preciosa ciudad de Tarragona y de sus ruinas romanas. El centro de Barcelona se encuentra a 1 hora y 15 minutos en coche.  ', 1, '', '', '2013-07-03 04:05:46', '2013-07-11 11:55:36', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' CAP SALOU CB003 ', 100, 4, 2, 4, '', 1.5, 1, ' Las llaves están abajo de la maceta ', NULL, NULL, 1, NULL),
(19, 4, 'CALA DORADA CB074', 1, 24, 1, '15:00:00', '12:00:00', '', '  Apartamento exterior de 3 habitaciones con capacidad para 6 personas y con vistas al mar desde todas las estancias. Se compone de salón comedor con TV de pantalla plana , split de aire acondicionado/ bomba de calor y salida a la terraza equipada con mesa , sillas y 2 tumbonas. 3 habitaciones con cama de matrimonio , 2 baños completos y cocina independiente equipada. Todo el apartamento tiene suelos de parquet y presenta una decoración funcional.\r\nEl establecimiento Apartamentos Cala Dorada ofrece un ambiente familiar y se encuentra en Salou, a 100 metros de la playa Larga. Ofrece una piscina al aire libre de temporada, un parque infantil y apartamentos con aire acondicionado y terraza privada amueblada con vistas al mar.\r\nEstos apartamentos tienen suelo de parqué, 2 baños, lavadora y una sala de estar con sofá, TV de pantalla plana y reproductor de CD. La cocina cuenta con nevera, microondas y cafetera.\r\nPor un suplemento diario, se ofrece conexión a internet mediante USB. Los apartamentos se encuentran a 3 km de PortAventura y a 300 metros de algunas tiendas, bares, restaurantes y discotecas.\r\nESTE APARTAMENTO ES EXCLUSIVO PARA FAMILIAS.\r\nPISCINA DE TEMPORADA 15.06 AL 15.09\r\nEN JULIO Y AGOSTO LA ESTANCIA MÍNIMA ES DE 7 NOCHES DE SÁBADO A SÁBADO.  ', 1, '', '', '2013-07-03 04:15:51', '2013-07-11 11:57:00', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' CALA DORADA CB074 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta ', NULL, NULL, 1, NULL),
(20, 4, 'TARRACO MAR CB049', 1, 25, 1, '15:00:00', '12:00:00', '', ' Casa unifamiliar de 3 plantas y piscina privada situada en la zona residencial de La Punta de La Mora ( Tarragona ) de 4 habitaciones dobles y 3 baños con capacidad para 8/10 personas. En la planta -1 nos encontramos con la plaza de garaje cerrado con capacidad para 3 coches , en la planta 0 nos encontramos con el amplio salón comedor de 47m2 con acceso a la terraza ,cocina equipada , 1 habitación con cama de matrimonio y 1 baño completo con plato de ducha , en la planta +1 nos encontramos con 2 habitaciones con 2 camas individuales cada una , 1 baño completo con plato de ducha y la habitación principal tipo suite con baño completo y bañera , terraza de 20m2. En la zona de piscina hay hamacas y mesa con sillas y sombrilla. A 600m de una fantastica playa de arena fina y multitud de actividades. A 5 Km del centro de la ciudad de Tarragona , declarada Patrimonio Mundial por la UNESCO , donde hay infinidad de lugares de interés como anfiteatro romano , tren turistico , centros comerciales etc etc.   ', 1, '', '', '2013-07-03 05:10:44', '2013-07-11 11:58:38', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' TARRACO MAR CB049 ', 100, 4, 2, 4, '', 1.5, 0, 'Las llaves están abajo de la maceta', NULL, NULL, 1, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `apartamentos_adjuntos`
--

INSERT INTO `apartamentos_adjuntos` (`id_apartamento`, `id_adjunto`, `id_apartamento_adjunto`) VALUES
(1, 1, 1),
(1, 2, 2),
(2, 18, 18),
(2, 19, 19),
(2, 20, 20);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Volcado de datos para la tabla `apartamentos_alojamientos`
--

INSERT INTO `apartamentos_alojamientos` (`id_apartamento`, `id_alojamiento`, `id_apartamento_alojamiento`) VALUES
(3, 1, 73),
(5, 1, 75),
(6, 1, 76),
(7, 1, 77),
(8, 1, 78),
(9, 1, 79),
(10, 1, 80),
(11, 1, 81),
(12, 1, 82),
(13, 1, 83),
(14, 1, 84),
(15, 1, 85),
(16, 1, 86),
(17, 1, 87),
(18, 1, 88),
(19, 1, 89),
(20, 1, 90),
(2, 1, 101),
(1, 1, 104);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos_articulos`
--

CREATE TABLE IF NOT EXISTS `apartamentos_articulos` (
  `id_apartamento` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `id_apartamento_articulo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_apartamento_articulo`),
  KEY `fk_apartamentos_has_articulos_articulos1_idx` (`id_articulo`),
  KEY `fk_apartamentos_has_articulos_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `apartamentos_articulos`
--

INSERT INTO `apartamentos_articulos` (`id_apartamento`, `id_articulo`, `id_apartamento_articulo`) VALUES
(1, 1, 10),
(1, 2, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos_descripcion`
--

CREATE TABLE IF NOT EXISTS `apartamentos_descripcion` (
  `id_apartamento_descripcion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text,
  `descripcion_corta` text,
  `descripcion_larga` text,
  `descripcion_servicios` text,
  `descripcion_condiciones` text,
  `normas` text,
  `manual` text,
  `id_idioma` int(11) NOT NULL,
  PRIMARY KEY (`id_apartamento_descripcion`),
  KEY `fk_apartamentos_descripcion_idiomas1_idx` (`id_idioma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos_documentos`
--

CREATE TABLE IF NOT EXISTS `apartamentos_documentos` (
  `id_apartamento_documento` int(11) NOT NULL AUTO_INCREMENT,
  `id_apartamento` int(11) NOT NULL,
  `id_adjunto` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_apartamento_documento`),
  KEY `fk_apartamentos_documentos_apartamentos1_idx` (`id_apartamento`),
  KEY `fk_apartamentos_documentos_adjuntos1_idx` (`id_adjunto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `apartamentos_documentos`
--

INSERT INTO `apartamentos_documentos` (`id_apartamento_documento`, `id_apartamento`, `id_adjunto`, `tipo`) VALUES
(1, 1, 21, 'licenciaTuristica');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Volcado de datos para la tabla `apartamentos_instalaciones`
--

INSERT INTO `apartamentos_instalaciones` (`id_apartamento`, `id_instalacion`, `id_apartamento_instalacion`) VALUES
(1, 174, 57),
(1, 183, 58),
(1, 192, 59),
(1, 200, 60),
(1, 218, 61),
(1, 221, 62),
(1, 224, 63);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Volcado de datos para la tabla `apartamentos_pagos_tipos`
--

INSERT INTO `apartamentos_pagos_tipos` (`id_apartamento`, `id_pago_tipo`, `id_apartamento_pago_tipo`) VALUES
(3, 1, 66),
(5, 1, 69),
(6, 1, 70),
(7, 1, 71),
(8, 1, 72),
(9, 1, 73),
(10, 1, 74),
(11, 1, 75),
(12, 1, 76),
(13, 1, 77),
(14, 1, 78),
(15, 1, 79),
(16, 1, 80),
(17, 1, 81),
(18, 1, 82),
(19, 1, 83),
(20, 1, 84),
(2, 1, 103),
(1, 1, 108),
(1, 2, 109);

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
(1, 'Estudio'),
(2, 'Adosado'),
(3, 'Chalet individual'),
(4, 'Apartamento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `id_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `id_articulo_tipo` int(11) NOT NULL,
  `precio_base` double DEFAULT NULL,
  `por_persona` tinyint(1) DEFAULT NULL,
  `configurar_por` varchar(45) DEFAULT NULL,
  `pax_minimo` varchar(45) DEFAULT NULL,
  `pax_maximo` varchar(45) DEFAULT NULL,
  `regular_stock` varchar(45) DEFAULT NULL,
  `solo_adultos` tinyint(1) DEFAULT NULL,
  `solo_ninios` tinyint(1) DEFAULT NULL,
  `consumo_obligatorio` tinyint(1) DEFAULT NULL,
  `establecer_horarios` text,
  `descripcion` text,
  `id_idioma` int(11) NOT NULL,
  PRIMARY KEY (`id_articulo`),
  KEY `fk_articulos_articulos_tipos1_idx` (`id_articulo_tipo`),
  KEY `fk_articulos_idiomas1_idx` (`id_idioma`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `nombre`, `codigo`, `id_articulo_tipo`, `precio_base`, `por_persona`, `configurar_por`, `pax_minimo`, `pax_maximo`, `regular_stock`, `solo_adultos`, `solo_ninios`, `consumo_obligatorio`, `establecer_horarios`, `descripcion`, `id_idioma`) VALUES
(1, 'Silla para bebé', '123', 1, 300, NULL, '', '', '', '', NULL, NULL, NULL, '', '123123', 1),
(2, 'Toalla', 'toalla', 1, 40, NULL, '', '', '', '', NULL, NULL, NULL, '', 'Servicio de toallas para baño.', 1),
(3, '1232', '123123', 1, 123123, NULL, '', '', '', '', NULL, NULL, NULL, '', '2eqwdas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_adjuntos`
--

CREATE TABLE IF NOT EXISTS `articulos_adjuntos` (
  `id_articulo` int(11) NOT NULL,
  `id_adjunto` int(11) NOT NULL,
  `id_articulo_adjunto` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_articulo_adjunto`),
  KEY `fk_articulos_has_adjuntos_adjuntos1_idx` (`id_adjunto`),
  KEY `fk_articulos_has_adjuntos_articulos1_idx` (`id_articulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_tipos`
--

CREATE TABLE IF NOT EXISTS `articulos_tipos` (
  `id_articulo_tipo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_articulo_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos_tipos`
--

INSERT INTO `articulos_tipos` (`id_articulo_tipo`, `nombre`) VALUES
(1, 'Objetos'),
(2, 'Servicios');

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
-- Estructura de tabla para la tabla `complejos`
--

CREATE TABLE IF NOT EXISTS `complejos` (
  `id_complejo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_complejo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complejos_apartamentos`
--

CREATE TABLE IF NOT EXISTS `complejos_apartamentos` (
  `id_complejo` int(11) NOT NULL,
  `id_apartamento` int(11) NOT NULL,
  `id_complejo_apartamento` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_complejo_apartamento`),
  KEY `fk_complejos_has_apartamentos_apartamentos1_idx` (`id_apartamento`),
  KEY `fk_complejos_has_apartamentos_complejos1_idx` (`id_complejo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `precio` double DEFAULT NULL,
  `porcentaje` double DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id_contrato`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`id_contrato`, `nombre`, `tiempo_creacion`, `ultima_modificacion`, `precio`, `porcentaje`, `descripcion`) VALUES
(1, 'Comisionable', '2013-07-03 22:00:00', '2013-07-29 19:13:48', 20, 30, 'Este es un contrato comisionable'),
(2, 'Garantizado', '2013-07-04 23:54:27', '2013-07-04 23:54:41', 400, 0, 'Este es un contrato garantizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE IF NOT EXISTS `cuentas` (
  `id_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `iban` varchar(50) DEFAULT NULL,
  `swif` varchar(50) DEFAULT NULL,
  `id_moneda` int(11) NOT NULL,
  `titular` varchar(60) DEFAULT NULL,
  `cvv` varchar(4) DEFAULT NULL,
  `c_d` int(11) DEFAULT NULL,
  `c_a` int(11) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_cuenta`),
  KEY `fk_cuentas_monedas1_idx` (`id_moneda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id_cuenta`, `iban`, `swif`, `id_moneda`, `titular`, `cvv`, `c_d`, `c_a`, `numero`) VALUES
(1, '123123', '23423423443', 1, '0', '0', 0, 0, '0'),
(2, '123123', '123123', 1, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id_direccion`, `calle`, `numero`, `provincia`, `codigo_postal`, `id_pais`, `lat`, `lon`, `id_provincia`, `referencia`) VALUES
(1, 'Esta es una calle', '23D', 'Camino Treinta y Uno, 17, 16400 Tarancón, Cue', '77500', 1, 40, -3, 1, '  Cerca de la plaza '),
(2, '123123', '123', '12321', '12', 1, 40, -3, 1, ''),
(4, '', '123', 'A-6, 100, 28023 Madrid, España', '77500', 1, 40.4634246290715, -3.78390969524537, 1, '    Cerca de la plaza  '),
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
(25, '', '', 'Madrid, España', '77521', 1, 40.4113554, -3.7028359, 1, 'Cerca de la plaza'),
(26, '', '51', 'Calle conca de barbera', '43008', 1, 40.4113554, -3.7028359, 1, 'hola esto es una prueba'),
(27, '', '51', 'Calle conca de barbera', '43008', 1, 40.4113554, -3.7028359, 1, 'hola esto es una prueba'),
(28, '', '51', 'Calle conca de barbera', '43008', 1, 40.4113554, -3.7028359, 1, 'hola esto es una prueba'),
(29, '', '51', 'Calle conca de barbera', '43008', 1, 40.4113554, -3.7028359, 1, 'hola esto es una prueba'),
(30, '', '51', 'Calle conca de barbera', '43008', 1, 40.4113554, -3.7028359, 1, 'hola esto es una prueba'),
(31, '', '51', 'Calle conca de barbera', '43008', 1, 40.4113554, -3.7028359, 1, 'hola esto es una prueba'),
(32, '', '51', 'Calle conca de barbera', '43008', 1, 40.4113554, -3.7028359, 1, 'hola esto es una prueba'),
(33, '', '51', 'Calle conca de barbera', '43008', 1, 40.4113554, -3.7028359, 1, 'hola esto es una prueba'),
(34, '', '51', 'Calle conca de barbera', '43008', 1, 40.4113554, -3.7028359, 1, 'hola esto es una prueba'),
(35, '', '51', 'Calle conca de barbera', '43008', 1, 40.4113554, -3.7028359, 1, 'hola esto es una prueba'),
(36, '', '51', 'Calle conca de barbera', '43008', 1, 40.4113554, -3.7028359, 1, 'hola esto es una prueba'),
(37, '', '51', 'Calle conca de barbera', '43008', 1, 40.4113554, -3.7028359, 1, 'hola esto es una prueba'),
(38, '', '51', 'Calle conca de barbera', '43008', 1, 40.4113554, -3.7028359, 1, 'hola esto es una prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidades`
--

CREATE TABLE IF NOT EXISTS `disponibilidades` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1936 ;

--
-- Volcado de datos para la tabla `disponibilidades`
--

INSERT INTO `disponibilidades` (`id_disponibilidad`, `fecha_inicio`, `fecha_final`, `precio`, `precio_fin_semana`, `estatus`, `id_apartamento`, `anotacion`) VALUES
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
(30, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(31, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(32, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(33, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(34, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(35, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(36, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(37, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(38, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(39, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(40, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(41, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(42, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(43, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(44, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(45, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(46, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(47, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(48, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(49, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(50, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(51, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(52, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(53, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(54, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(55, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 0, 0, 'no disponible', 1, 'Tarifa'),
(56, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(57, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
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
(85, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 30, 0, 'disponible', 1, 'Tarifa'),
(86, '2013-07-14 00:00:00', '2013-07-14 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(87, '2013-07-15 00:00:00', '2013-07-15 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(88, '2013-07-16 00:00:00', '2013-07-16 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(89, '2013-07-17 00:00:00', '2013-07-17 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(90, '2013-07-18 00:00:00', '2013-07-18 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(91, '2013-07-19 00:00:00', '2013-07-19 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(92, '2013-07-20 00:00:00', '2013-07-20 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(93, '2013-07-21 00:00:00', '2013-07-21 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(94, '2013-07-22 00:00:00', '2013-07-22 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(95, '2013-07-23 00:00:00', '2013-07-23 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(96, '2013-07-24 00:00:00', '2013-07-24 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(97, '2013-07-25 00:00:00', '2013-07-25 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(98, '2013-07-26 00:00:00', '2013-07-26 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(99, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(100, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(101, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(102, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(103, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(104, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(105, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(106, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(107, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(108, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(112, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(113, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(114, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(115, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(116, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(117, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(118, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(119, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(120, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(121, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(122, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(123, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(124, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(125, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(126, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(127, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(128, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(129, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(130, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(131, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(132, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(133, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(134, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(135, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(136, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(137, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(138, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(139, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(140, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(141, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(142, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(143, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(144, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(145, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(146, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(147, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(148, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(149, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(150, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(151, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(152, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(153, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(154, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(155, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(156, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 123, 0, 'disponible', 3, 'Tarifa'),
(157, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 123, 0, 'disponible', 3, 'Tarifa'),
(183, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(184, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(185, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(186, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(187, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(188, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(189, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(190, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(191, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(192, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(193, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(194, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(195, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(196, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(197, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(198, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(199, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(200, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(201, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(202, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(203, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(204, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(205, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(206, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(207, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(208, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(209, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(210, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(211, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(212, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(213, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(214, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(215, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(216, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(217, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(218, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(219, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(220, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(221, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(222, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(223, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(224, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(225, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(226, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(227, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(228, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(229, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(230, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(231, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(232, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(233, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(234, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(235, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(236, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(237, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(238, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(239, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(240, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(241, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(242, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(243, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(244, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(245, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(246, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(247, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(248, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(249, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(250, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(251, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(252, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(253, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(254, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(255, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(256, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(257, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(258, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(259, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(260, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(261, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(262, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(263, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(264, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(265, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(266, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(267, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(268, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(269, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(270, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(271, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(272, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(273, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(274, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(275, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(276, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(277, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(278, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(279, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(280, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(281, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(282, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(283, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(284, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(285, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(286, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(287, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(288, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(289, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(290, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(291, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(292, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(293, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(294, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(295, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(296, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(297, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(298, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(299, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(300, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(301, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(302, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(303, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(304, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(305, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(306, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(307, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(308, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(309, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(310, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(311, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(312, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(313, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(314, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(315, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(316, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(317, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(318, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(319, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(320, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(321, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(322, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(323, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(324, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(325, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(326, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(327, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(328, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(329, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(330, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(331, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(332, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(333, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(334, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(335, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(336, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(337, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(338, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(339, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(340, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(341, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(342, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(343, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(344, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(345, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(346, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(347, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(348, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(349, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(350, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(351, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(352, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(353, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(354, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(355, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(356, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(357, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(358, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(359, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(360, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(361, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(362, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(363, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(364, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(365, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(366, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(367, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(368, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(369, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(370, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(371, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(372, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(373, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(374, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(375, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(376, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(377, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(378, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(379, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(380, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(381, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(382, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(383, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(384, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(385, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(386, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(387, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(388, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(389, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(390, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(391, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(392, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(393, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(394, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(395, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(396, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(397, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(398, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(399, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(400, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(401, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(402, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(403, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(404, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(405, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(406, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(407, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(408, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(409, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(410, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(411, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(412, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(413, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(414, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(415, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(416, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(417, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(418, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(419, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(420, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(421, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(422, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(423, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(424, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(425, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(426, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(427, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(428, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(429, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(430, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(431, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(432, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(433, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(434, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(435, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(436, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(437, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(438, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(439, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(440, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(441, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(442, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(443, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(444, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(445, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(446, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(447, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(448, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(449, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(450, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(451, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(452, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(453, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(454, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(455, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(456, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(457, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(458, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(459, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(460, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(461, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(462, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(463, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(464, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(465, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(466, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(467, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(468, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(469, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(470, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(471, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(472, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(473, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(474, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(475, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(476, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(477, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(478, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(479, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(480, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(481, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(482, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(483, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(484, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(485, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(486, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(487, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(488, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(489, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(490, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(491, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(492, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(493, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(494, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(495, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(496, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(497, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(498, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(499, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(500, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(501, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(502, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(503, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(504, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(505, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(506, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(507, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(508, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(509, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(510, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(511, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(512, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(513, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(514, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(515, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(516, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(517, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(518, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(519, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(520, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(521, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(522, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(523, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(524, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(525, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(526, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(527, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(528, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(529, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(530, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(531, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(532, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(533, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(534, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(535, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(536, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(537, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(538, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(539, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(540, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(541, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(542, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(543, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(544, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(545, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(546, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(547, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(548, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(549, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(550, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(551, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(552, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(553, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(554, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(555, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(556, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(557, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(558, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(559, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(560, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(561, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(562, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(563, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(564, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(565, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(566, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(567, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(568, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(569, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(570, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(571, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(572, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(573, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(574, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(575, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(576, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(577, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(578, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(579, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(580, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(581, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(582, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(583, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(584, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(585, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(586, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(587, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(588, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(589, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(590, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(591, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(592, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(593, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(594, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(595, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(596, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(597, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(598, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(599, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(600, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(601, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(602, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(603, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(604, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(605, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(606, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(607, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(608, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(609, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(610, '2013-08-03 00:00:00', '2013-08-03 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(611, '2013-08-04 00:00:00', '2013-08-04 00:00:00', 200, 0, 'disponible', 20, 'Tarifa');
INSERT INTO `disponibilidades` (`id_disponibilidad`, `fecha_inicio`, `fecha_final`, `precio`, `precio_fin_semana`, `estatus`, `id_apartamento`, `anotacion`) VALUES
(612, '2013-08-05 00:00:00', '2013-08-05 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(613, '2013-08-06 00:00:00', '2013-08-06 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(614, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(615, '2013-08-08 00:00:00', '2013-08-08 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(616, '2013-08-09 00:00:00', '2013-08-09 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(617, '2013-08-10 00:00:00', '2013-08-10 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(618, '2013-08-11 00:00:00', '2013-08-11 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(619, '2013-08-12 00:00:00', '2013-08-12 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(620, '2013-08-13 00:00:00', '2013-08-13 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(621, '2013-08-14 00:00:00', '2013-08-14 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(622, '2013-08-15 00:00:00', '2013-08-15 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(623, '2013-08-16 00:00:00', '2013-08-16 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(624, '2013-08-17 00:00:00', '2013-08-17 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(625, '2013-08-18 00:00:00', '2013-08-18 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(626, '2013-08-19 00:00:00', '2013-08-19 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(627, '2013-08-20 00:00:00', '2013-08-20 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(628, '2013-08-21 00:00:00', '2013-08-21 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(629, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(630, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(631, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 123, 0, 'disponible', 3, 'Tarifa'),
(632, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(633, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(634, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(635, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(636, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(637, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(638, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(639, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(640, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(641, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(642, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(643, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(644, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(645, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(646, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(647, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(648, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(649, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(650, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(651, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(652, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(653, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(654, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(655, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(656, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(657, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(658, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(659, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(660, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(661, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(662, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(663, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(664, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(665, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(666, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(667, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(668, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(669, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(670, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(671, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(672, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(673, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(674, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(675, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(676, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(677, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(678, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(679, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(680, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(681, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(682, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(683, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(684, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(685, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(686, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(687, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(688, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(689, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(690, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(691, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(692, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(693, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(694, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(695, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(696, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(697, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(698, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(699, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 200, 0, 'disponible', 3, 'Tarifa'),
(769, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(770, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(771, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(772, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(773, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(774, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(775, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(776, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(777, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(778, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(779, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(780, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(781, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(782, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(783, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(784, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(785, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(786, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(787, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(788, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(789, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(790, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(791, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(792, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(793, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(794, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(795, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(796, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(797, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(798, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(799, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(800, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(801, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(802, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(803, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(804, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(805, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(806, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(807, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(808, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(809, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(810, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(811, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(812, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(813, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(814, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(815, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(816, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(817, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(818, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(819, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(820, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(821, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(822, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(823, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(824, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(825, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(826, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(827, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(828, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(829, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(830, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(831, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(832, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(833, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(834, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(835, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(836, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(837, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 200, 0, 'disponible', 5, 'Tarifa'),
(838, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(839, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(840, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(841, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(842, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(843, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(844, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(845, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(846, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(847, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(848, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(849, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(850, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(851, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(852, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(853, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(854, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(855, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(856, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(857, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(858, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(859, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(860, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(861, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(862, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(863, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(864, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(865, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(866, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(867, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(868, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(869, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(870, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(871, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(872, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(873, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(874, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(875, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(876, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(877, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(878, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(879, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(880, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(881, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(882, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(883, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(884, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(885, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(886, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(887, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(888, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(889, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(890, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(891, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(892, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(893, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(894, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(895, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(896, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(897, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(898, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(899, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(900, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(901, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(902, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(903, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(904, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(905, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(906, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 200, 0, 'disponible', 6, 'Tarifa'),
(907, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(908, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(909, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(910, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(911, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(912, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(913, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(914, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(915, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(916, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(917, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(918, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(919, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(920, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(921, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(922, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(923, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(924, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(925, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(926, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(927, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(928, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(929, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(930, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(931, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(932, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(933, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(934, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(935, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(936, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(937, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(938, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(939, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(940, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(941, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(942, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(943, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(944, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(945, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(946, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(947, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(948, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(949, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(950, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(951, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(952, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(953, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(954, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(955, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(956, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(957, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(958, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(959, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(960, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(961, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(962, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(963, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(964, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(965, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(966, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(967, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(968, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(969, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(970, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(971, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(972, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(973, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(974, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(975, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 200, 0, 'disponible', 7, 'Tarifa'),
(976, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(977, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(978, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(979, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(980, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(981, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(982, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(983, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(984, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(985, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(986, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(987, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(988, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(989, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(990, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(991, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(992, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(993, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(994, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(995, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(996, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(997, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(998, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(999, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1000, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1001, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1002, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1003, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1004, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1005, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1006, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1007, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1008, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1009, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1010, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1011, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1012, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1013, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1014, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1015, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1016, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1017, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1018, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1019, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1020, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1021, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1022, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1023, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1024, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1025, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1026, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1027, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1028, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1029, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1030, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1031, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1032, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1033, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1034, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1035, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1036, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1037, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1038, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1039, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1040, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1041, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1042, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1043, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1044, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 200, 0, 'disponible', 8, 'Tarifa'),
(1045, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1046, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1047, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1048, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1049, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1050, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1051, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1052, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1053, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1054, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1055, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1056, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1057, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1058, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1059, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1060, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1061, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1062, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1063, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1064, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1065, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1066, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1067, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1068, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1069, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1070, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1071, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1072, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1073, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1074, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1075, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1076, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1077, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1078, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1079, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1080, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1081, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1082, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1083, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1084, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1085, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1086, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1087, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1088, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1089, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1090, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1091, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1092, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1093, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1094, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1095, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1096, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1097, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1098, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1099, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1100, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1101, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1102, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1103, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1104, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1105, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1106, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1107, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1108, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1109, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1110, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1111, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1112, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1113, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 200, 0, 'disponible', 9, 'Tarifa'),
(1114, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1115, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1116, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1117, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1118, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1119, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1120, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1121, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1122, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1123, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1124, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1125, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1126, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1127, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1128, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1129, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1130, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1131, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1132, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1133, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1134, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1135, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1136, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1137, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1138, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1139, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1140, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1141, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1142, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1143, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1144, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1145, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1146, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1147, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1148, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1149, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1150, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1151, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1152, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1153, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1154, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1155, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1156, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1157, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1158, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1159, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1160, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1161, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1162, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1163, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1164, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1165, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1166, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1167, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1168, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1169, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1170, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1171, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1172, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1173, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1174, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1175, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1176, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1177, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1178, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1179, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1180, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1181, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1182, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 200, 0, 'disponible', 10, 'Tarifa'),
(1183, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1184, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1185, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1186, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1187, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1188, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1189, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1190, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1191, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1192, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1193, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1194, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1195, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1196, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1197, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1198, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1199, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1200, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1201, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1202, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1203, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1204, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1205, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1206, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1207, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1208, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1209, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1210, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1211, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1212, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1213, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1214, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1215, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1216, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1217, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1218, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1219, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1220, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1221, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1222, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1223, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1224, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1225, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1226, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1227, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1228, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1229, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1230, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1231, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1232, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1233, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1234, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1235, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1236, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1237, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1238, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1239, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1240, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1241, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1242, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1243, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1244, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1245, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1246, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1247, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1248, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1249, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1250, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1251, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 200, 0, 'disponible', 11, 'Tarifa'),
(1252, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1253, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1254, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 200, 0, 'disponible', 12, 'Tarifa');
INSERT INTO `disponibilidades` (`id_disponibilidad`, `fecha_inicio`, `fecha_final`, `precio`, `precio_fin_semana`, `estatus`, `id_apartamento`, `anotacion`) VALUES
(1255, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1256, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1257, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1258, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1259, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1260, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1261, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1262, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1263, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1264, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1265, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1266, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1267, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1268, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1269, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1270, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1271, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1272, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1273, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1274, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1275, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1276, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1277, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1278, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1279, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1280, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1281, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1282, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1283, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1284, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1285, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1286, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1287, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1288, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1289, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1290, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1291, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1292, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1293, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1294, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1295, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1296, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1297, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1298, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1299, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1300, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1301, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1302, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1303, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1304, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1305, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1306, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1307, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1308, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1309, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1310, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1311, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1312, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1313, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1314, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1315, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1316, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1317, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1318, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1319, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1320, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 200, 0, 'disponible', 12, 'Tarifa'),
(1321, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1322, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1323, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1324, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1325, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1326, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1327, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1328, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1329, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1330, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1331, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1332, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1333, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1334, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1335, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1336, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1337, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1338, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1339, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1340, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1341, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1342, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1343, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1344, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1345, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1346, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1347, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1348, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1349, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1350, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1351, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1352, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1353, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1354, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1355, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1356, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1357, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1358, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1359, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1360, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1361, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1362, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1363, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1364, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1365, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1366, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1367, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1368, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1369, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1370, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1371, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1372, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1373, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1374, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1375, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1376, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1377, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1378, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1379, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1380, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1381, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1382, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1383, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1384, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1385, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1386, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1387, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1388, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1389, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 200, 0, 'disponible', 13, 'Tarifa'),
(1390, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1391, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1392, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1393, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1394, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1395, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1396, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1397, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1398, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1399, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1400, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1401, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1402, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1403, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1404, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1405, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1406, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1407, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1408, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1409, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1410, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1411, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1412, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1413, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1414, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1415, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1416, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1417, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1418, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1419, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1420, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1421, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1422, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1423, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1424, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1425, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1426, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1427, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1428, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1429, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1430, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1431, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1432, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1433, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1434, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1435, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1436, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1437, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1438, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1439, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1440, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1441, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1442, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1443, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1444, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1445, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1446, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1447, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1448, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1449, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1450, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1451, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1452, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1453, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1454, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1455, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1456, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1457, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1458, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 200, 0, 'disponible', 14, 'Tarifa'),
(1459, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1460, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1461, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1462, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1463, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1464, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1465, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1466, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1467, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1468, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1469, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1470, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1471, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1472, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1473, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1474, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1475, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1476, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1477, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1478, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1479, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1480, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1481, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1482, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1483, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1484, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1485, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1486, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1487, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1488, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1489, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1490, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1491, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1492, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1493, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1494, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1495, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1496, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1497, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1498, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1499, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1500, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1501, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1502, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1503, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1504, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1505, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1506, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1507, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1508, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1509, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1510, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1511, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1512, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1513, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1514, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1515, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1516, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1517, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1518, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1519, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1520, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1521, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1522, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1523, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1524, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1525, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1526, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1527, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 200, 0, 'disponible', 15, 'Tarifa'),
(1528, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1529, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1530, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1531, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1532, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1533, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1534, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1535, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1536, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1537, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1538, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1539, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1540, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1541, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1542, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1543, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1544, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1545, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1546, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1547, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1548, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1549, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1550, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1551, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1552, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1553, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1554, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1555, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1556, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1557, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1558, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1559, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1560, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1561, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1562, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1563, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1564, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1565, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1566, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1567, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1568, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1569, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1570, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1571, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1572, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1573, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1574, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1575, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1576, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1577, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1578, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1579, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1580, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1581, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1582, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1583, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1584, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1585, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1586, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1587, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1588, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1589, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1590, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1591, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1592, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1593, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1594, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1595, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1596, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 200, 0, 'disponible', 16, 'Tarifa'),
(1597, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1598, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1599, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1600, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1601, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1602, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1603, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1604, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1605, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1606, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1607, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1608, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1609, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1610, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1611, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1612, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1613, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1614, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1615, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1616, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1617, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1618, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1619, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1620, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1621, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1622, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1623, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1624, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1625, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1626, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1627, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1628, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1629, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1630, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1631, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1632, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1633, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1634, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1635, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1636, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1637, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1638, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1639, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1640, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1641, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1642, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1643, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1644, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1645, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1646, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1647, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1648, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1649, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1650, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1651, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1652, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1653, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1654, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1655, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1656, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1657, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1658, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1659, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1660, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1661, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1662, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1663, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1664, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1665, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 200, 0, 'disponible', 17, 'Tarifa'),
(1666, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1667, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1668, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1669, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1670, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1671, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1672, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1673, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1674, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1675, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1676, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1677, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1678, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1679, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1680, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1681, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1682, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1683, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1684, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1685, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1686, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1687, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1688, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1689, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1690, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1691, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1692, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1693, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1694, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1695, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1696, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1697, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1698, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1699, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1700, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1701, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1702, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1703, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1704, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1705, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1706, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1707, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1708, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1709, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1710, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1711, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1712, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1713, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1714, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1715, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1716, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1717, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1718, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1719, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1720, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1721, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1722, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1723, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1724, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1725, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1726, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1727, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1728, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1729, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1730, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1731, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1732, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1733, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1734, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 200, 0, 'disponible', 18, 'Tarifa'),
(1735, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1736, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1737, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1738, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1739, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1740, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1741, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1742, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1743, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1744, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1745, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1746, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1747, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1748, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1749, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1750, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1751, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1752, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1753, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1754, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1755, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1756, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1757, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1758, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1759, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1760, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1761, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1762, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1763, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1764, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1765, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1766, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1767, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1768, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1769, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1770, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1771, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1772, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1773, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1774, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1775, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1776, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1777, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1778, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1779, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1780, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1781, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1782, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1783, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1784, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1785, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1786, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1787, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1788, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1789, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1790, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1791, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1792, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1793, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1794, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1795, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1796, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1797, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1798, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1799, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1800, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1801, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1802, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1803, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 200, 0, 'disponible', 19, 'Tarifa'),
(1804, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1805, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1806, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1807, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1808, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1809, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1810, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1811, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1812, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1813, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1814, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1815, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1816, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1817, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1818, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1819, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1820, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 200, 0, 'disponible', 20, 'Tarifa');
INSERT INTO `disponibilidades` (`id_disponibilidad`, `fecha_inicio`, `fecha_final`, `precio`, `precio_fin_semana`, `estatus`, `id_apartamento`, `anotacion`) VALUES
(1821, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1822, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1823, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1824, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1825, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1826, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1827, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1828, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1829, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1830, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1831, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1832, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1833, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1834, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1835, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1836, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1837, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1838, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1839, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1840, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1841, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1842, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1843, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1844, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1845, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1846, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1847, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1848, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1849, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1850, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1851, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1852, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1853, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1854, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1855, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1856, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1857, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1858, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1859, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1860, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1861, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1862, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1863, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1864, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1865, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1866, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1867, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1868, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1869, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1870, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1871, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1872, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 200, 0, 'disponible', 20, 'Tarifa'),
(1873, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1874, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1875, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1876, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1877, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1878, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1879, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1880, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1881, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1882, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1883, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1884, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1885, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1886, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1887, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1888, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1889, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1890, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1891, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1892, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1893, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1894, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1895, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1896, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1897, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1898, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1899, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1900, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1901, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1902, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1903, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1904, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1905, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1906, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1907, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1908, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 123, 0, 'disponible', 1, 'Tarifa'),
(1909, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1910, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1911, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1912, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1913, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1914, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1915, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1916, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1917, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1918, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1919, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1920, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1921, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1922, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1923, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1924, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1925, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1926, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1927, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1928, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1929, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1930, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1931, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1932, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1933, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1934, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(1935, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 123, 0, 'disponible', 2, 'Tarifa');

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
  `email` varchar(150) DEFAULT NULL,
  `email_facturacion` varchar(150) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `telefono_alterno` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`),
  KEY `fk_empresa_direcciones1_idx` (`id_direccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nombre`, `apellido_paterno`, `apellido_materno`, `nombre_fiscal`, `cif`, `id_direccion`, `tiempo_creacion`, `ultima_modificacion`, `email`, `email_facturacion`, `telefono`, `telefono_alterno`) VALUES
(1, 'Mauro', 'Barbarroja', 'X', 'Click & Booking', '2176381726387126387', 1, '2013-05-30 04:35:19', '2013-05-30 04:35:19', 'listico__@hotmail.com', '', '', ''),
(2, 'Ruben', 'Velazquez', 'Calva', 'Una nueva inmobiliaria', '123123', 2, '2013-05-30 04:35:19', '2013-05-30 04:35:19', 'ruben.listico.ds@gmail.com', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas_contratos`
--

CREATE TABLE IF NOT EXISTS `empresas_contratos` (
  `id_empresa` int(11) NOT NULL,
  `id_contrato` int(11) NOT NULL,
  `id_empresa_contrato` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_empresa_contrato`),
  KEY `fk_empresas_has_contratos_contratos1_idx` (`id_contrato`),
  KEY `fk_empresas_has_contratos_empresas1_idx` (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `empresas_contratos`
--

INSERT INTO `empresas_contratos` (`id_empresa`, `id_contrato`, `id_empresa_contrato`, `fecha_inicio`, `fecha_fin`, `tiempo_creacion`, `ultima_modificacion`) VALUES
(1, 1, 1, '2013-07-11 00:00:00', '2013-07-17 00:00:00', '2013-07-03 22:00:00', '2013-08-08 12:51:29'),
(1, 2, 2, '2013-07-10 00:00:00', '2013-07-13 00:00:00', '2013-07-08 10:34:02', '2013-08-08 12:51:29'),
(2, 2, 4, '2013-07-10 00:00:00', '2013-07-13 00:00:00', '2013-07-09 07:00:47', '2013-08-08 02:12:47'),
(2, 2, 5, '2013-07-10 00:00:00', '2013-07-13 00:00:00', '2013-07-09 07:01:11', '2013-08-08 02:12:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas_cuentas`
--

CREATE TABLE IF NOT EXISTS `empresas_cuentas` (
  `id_empresa` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `id_empresa_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_empresa_cuenta`),
  KEY `fk_empresas_has_cuentas_cuentas1_idx` (`id_cuenta`),
  KEY `fk_empresas_has_cuentas_empresas1_idx` (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `empresas_cuentas`
--

INSERT INTO `empresas_cuentas` (`id_empresa`, `id_cuenta`, `id_empresa_cuenta`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huespedes`
--

CREATE TABLE IF NOT EXISTS `huespedes` (
  `id_huesped` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_direccion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_huesped`),
  KEY `fk_huesped_usuarios1_idx` (`id_usuario`),
  KEY `fk_huespedes_direcciones1_idx` (`id_direccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `huespedes`
--

INSERT INTO `huespedes` (`id_huesped`, `id_usuario`, `id_direccion`) VALUES
(1, 1, NULL),
(2, 1, NULL),
(3, 8, NULL),
(4, 9, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huespedes_cuentas`
--

CREATE TABLE IF NOT EXISTS `huespedes_cuentas` (
  `id_huesped` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `id_huesped_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_huesped_cuenta`),
  KEY `fk_huespedes_has_cuentas_cuentas1_idx` (`id_cuenta`),
  KEY `fk_huespedes_has_cuentas_huespedes1_idx` (`id_huesped`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=236 ;

--
-- Volcado de datos para la tabla `instalaciones`
--

INSERT INTO `instalaciones` (`id_instalacion`, `nombre`, `id_instalacion_categoria`) VALUES
(105, 'Aire acondicionado', 1),
(106, 'Suelo de moqueta', 1),
(107, 'Chimenea', 1),
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
(134, 'Sofá', 1),
(135, 'Suelo de baldosa', 1),
(136, 'Escritorio', 1),
(137, 'Armario', 1),
(138, 'Ventilador', 1),
(140, 'Mosquitera', 1),
(141, 'Sofá cama', 1),
(143, 'Bañera', 2),
(145, 'Bañera de hidromasaje', 2),
(146, 'Ducha', 2),
(147, 'Bidé', 2),
(151, 'Bañera o ducha', 2),
(154, 'Aseo', 2),
(156, 'Secador de pelo', 2),
(157, 'Sauna', 2),
(160, 'TV por cable', 3),
(174, 'Teléfono', 3),
(177, 'Fax', 3),
(179, 'TV', 3),
(183, 'Soporte para iPod', 3),
(189, 'Caja fuerte', 3),
(190, 'TV vía satélite', 3),
(192, 'Videoconsola', 3),
(194, 'Equipo de música ', 3),
(195, 'TV de pantalla plana/de plasma/LCD', 3),
(200, 'TV de pago', 3),
(202, 'Zona de comedor', 4),
(203, 'Parrilla ', 4),
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
(217, 'Wi-Fi', 5),
(218, 'Balcón', 6),
(219, 'Vistas al lago', 6),
(220, 'Patio', 6),
(221, 'Vistas al jardín', 6),
(222, 'Vistas a la piscina', 6),
(223, 'Vistas al mar', 6),
(224, 'Vistas a la montaña', 6),
(225, 'Vistas a un lugar de interés', 6),
(226, 'Primer línea de playa', 6),
(228, 'Cuna para bebé', 5),
(229, 'Conexión usb pincho', 5),
(230, 'Silla para bebé', 5),
(231, 'Cama suplatoria', 5),
(233, 'Pack de bienvenida', 5),
(234, 'Toalla ', 5),
(235, 'Ropa de cama ', 5);

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
(4, 'Cocina'),
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
-- Estructura de tabla para la tabla `mantenimientos`
--

CREATE TABLE IF NOT EXISTS `mantenimientos` (
  `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT,
  `id_apartamento` int(11) NOT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT NULL,
  `ubicacion` text,
  `solicitante` text,
  `trabajos_solicitados` text,
  `informe_tecnico` text,
  `observaciones` text,
  `estatus` text,
  `fecha_cierre` date DEFAULT NULL,
  PRIMARY KEY (`id_mantenimiento`),
  KEY `fk_mantenimientos_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `mantenimientos`
--

INSERT INTO `mantenimientos` (`id_mantenimiento`, `id_apartamento`, `tiempo_creacion`, `ultima_modificacion`, `ubicacion`, `solicitante`, `trabajos_solicitados`, `informe_tecnico`, `observaciones`, `estatus`, `fecha_cierre`) VALUES
(1, 1, '2013-08-07 00:00:00', '2013-08-07 00:00:00', 'Alguna ubicación', 'Algún solicitante', 'Trabajo solicitado...', 'Informe técnico...', 'Estas son las observaciones', 'pendiente', '2013-08-16'),
(2, 1, '2013-08-22 16:02:00', '0000-00-00 00:00:00', 'dfdf', 'Mauro', 'trabajos solicitados', 'Informe!', '12weqsd', '', '2013-08-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientos_materiales`
--

CREATE TABLE IF NOT EXISTS `mantenimientos_materiales` (
  `id_mantenimiento_marterial` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` double DEFAULT NULL,
  `descripcion` text,
  `id_mantenimiento` int(11) NOT NULL,
  PRIMARY KEY (`id_mantenimiento_marterial`),
  KEY `fk_mantenimientos_materiales_mantenimientos1_idx` (`id_mantenimiento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `mantenimientos_materiales`
--

INSERT INTO `mantenimientos_materiales` (`id_mantenimiento_marterial`, `cantidad`, `descripcion`, `id_mantenimiento`) VALUES
(1, 3, 'Esta es la descripción del material', 1),
(2, 123, '12ewds', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientos_personal`
--

CREATE TABLE IF NOT EXISTS `mantenimientos_personal` (
  `id_mantenimiento_personal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `inicio` time DEFAULT NULL,
  `final` time DEFAULT NULL,
  `horas` double DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `id_mantenimiento` int(11) NOT NULL,
  PRIMARY KEY (`id_mantenimiento_personal`),
  KEY `fk_mantenimientos_personal_mantenimientos1_idx` (`id_mantenimiento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `mantenimientos_personal`
--

INSERT INTO `mantenimientos_personal` (`id_mantenimiento_personal`, `nombre`, `fecha`, `inicio`, `final`, `horas`, `estatus`, `id_mantenimiento`) VALUES
(1, 'Persona...', '2013-08-07', '02:11:11', '02:11:11', NULL, 'activo', 1),
(2, '123', '2013-08-22', '04:00:00', '04:00:00', 123, '', 2);

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
  `id_reservacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_opinion`),
  KEY `fk_opiniones_apartamentos1_idx` (`id_apartamento`),
  KEY `fk_opiniones_usuarios1_idx` (`id_usuario`),
  KEY `fk_opiniones_reservaciones1_idx` (`id_reservacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `opiniones`
--

INSERT INTO `opiniones` (`id_opinion`, `opinion`, `puntuacion`, `fecha_creacion`, `ultima_actualizacion`, `id_apartamento`, `id_usuario`, `id_reservacion`) VALUES
(2, 'Muy mal lugar', 4, '2013-06-05 06:00:00', '2013-06-06 14:17:49', 1, 1, NULL),
(4, 'Nice!', 10, '2013-06-18 01:22:23', '2013-06-18 01:22:23', 2, 1, NULL),
(5, 'Cool!', 10, '2013-06-18 01:23:04', '2013-06-18 01:23:04', 2, 1, NULL),
(6, 'Excelente apartamento!', 10, '2013-07-09 07:04:27', '2013-07-09 07:04:27', 6, 1, NULL),
(7, 'Excelente', 9, '2013-07-14 18:09:02', '2013-07-14 18:09:02', 8, 1, NULL),
(8, 'Muy bien', 8, '2013-07-14 18:10:21', '2013-07-14 18:10:21', 3, 1, NULL),
(9, 'Bien', 8, '2013-07-14 18:11:15', '2013-07-14 18:11:15', 1, 1, NULL),
(10, 'Excelente', 9, '2013-07-14 18:11:52', '2013-07-14 18:11:52', 1, 1, NULL),
(11, 'Excelente', 10, '2013-07-14 18:12:26', '2013-07-14 18:12:26', 1, 1, NULL),
(12, 'Excelente', 9, '2013-07-14 18:13:11', '2013-07-14 18:13:11', 7, 1, NULL),
(13, 'Regular', 6, '2013-07-14 18:13:58', '2013-07-14 18:13:58', 1, 1, NULL),
(14, 'Malo', 5, '2013-07-14 18:14:38', '2013-07-14 18:14:38', 13, 1, NULL),
(15, 'Regular', 6, '2013-07-14 18:15:28', '2013-07-14 18:15:28', 12, 1, NULL),
(16, 'Muy feo', 2.5, '2013-07-14 18:16:24', '2013-07-14 18:16:24', 14, 1, NULL),
(17, 'Regular', 6, '2013-07-14 18:17:04', '2013-07-14 18:17:04', 15, 1, NULL),
(18, 'Excelente ! Me gusto mucho', 10, '2013-07-14 18:17:43', '2013-07-14 18:17:43', 16, 1, NULL),
(19, 'Excelente', 9, '2013-07-14 18:18:25', '2013-07-14 18:18:25', 18, 1, NULL),
(20, 'Regular! Podría mejorar', 7, '2013-07-14 18:20:50', '2013-07-14 18:20:50', 1, 1, NULL),
(21, 'Bueno! ', 8, '2013-07-14 18:22:07', '2013-07-14 18:22:07', 5, 1, NULL),
(23, 'Malo! Debería mejorar', 3, '2013-07-14 18:23:52', '2013-07-14 18:23:52', 1, 1, NULL),
(24, 'Regular ! Puede ser mejor', 5, '2013-07-14 18:24:57', '2013-07-14 18:24:57', 2, 1, NULL),
(25, 'Excelente', 10, '2013-07-14 18:26:01', '2013-07-14 18:26:01', 6, 1, NULL),
(26, 'Muy bueno', 8, '2013-07-14 18:27:36', '2013-07-14 18:27:36', 5, 1, NULL),
(27, 'Excelente lugar . Lo recomiendo', 10, '2013-07-14 18:29:49', '2013-07-14 18:29:49', 7, 1, NULL),
(28, 'Muy buen lugar', 8, '2013-07-14 18:30:26', '2013-07-14 18:30:26', 1, 1, NULL),
(29, 'Muy buen lugar ', 9, '2013-07-14 18:31:30', '2013-07-14 18:31:30', 1, 1, NULL),
(30, 'Muy feo lugar', 3, '2013-07-14 18:32:05', '2013-07-14 18:32:05', 10, 1, NULL),
(31, 'Muy buen lugar ', 9, '2013-07-14 18:32:38', '2013-07-14 18:32:38', 13, 1, NULL),
(32, 'Muy buen lugar', 9, '2013-07-14 18:33:54', '2013-07-14 18:33:54', 1, 1, NULL),
(33, 'Excelente lugar!!! ', 10, '2013-07-14 18:35:07', '2013-07-14 18:35:07', 1, 1, NULL),
(34, 'Excelente lugar !!  Lo recomiendo al 100% ', 10, '2013-07-14 18:35:55', '2013-07-14 18:35:55', 14, 1, NULL),
(35, 'Muy buen lugar', 9, '2013-07-14 18:36:35', '2013-07-14 18:36:35', 1, 1, NULL),
(36, 'Excelente lugar !! Lo recomiendo al 100 %', 10, '2013-07-14 18:37:20', '2013-07-14 18:37:20', 17, 1, NULL);

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
-- Estructura de tabla para la tabla `politicas_cancelacion`
--

CREATE TABLE IF NOT EXISTS `politicas_cancelacion` (
  `id_politica_cancelacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `reembolso_dia` int(11) DEFAULT NULL,
  `comision` double DEFAULT NULL,
  `reembolso_porcentaje` double DEFAULT NULL,
  PRIMARY KEY (`id_politica_cancelacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `politicas_cancelacion`
--

INSERT INTO `politicas_cancelacion` (`id_politica_cancelacion`, `nombre`, `reembolso_dia`, `comision`, `reembolso_porcentaje`) VALUES
(1, 'Flexible', 12, 0, 30);

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
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_apartamento` int(11) NOT NULL,
  `fecha_entrada` datetime DEFAULT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `adultos` int(11) DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `ninios` int(11) DEFAULT NULL,
  `bebes` int(11) DEFAULT NULL,
  `apartamento` text,
  `contrato` text,
  `autorizacion` text,
  `request` text,
  `total` double DEFAULT NULL,
  `observaciones` text,
  `motivo_cancelacion` text,
  `notificacion` varchar(45) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_reservacion`),
  KEY `fk_reservaciones_apartamentos1_idx` (`id_apartamento`),
  KEY `fk_reservaciones_usuarios1_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`id_reservacion`, `tiempo_creacion`, `ultima_modificacion`, `id_apartamento`, `fecha_entrada`, `fecha_salida`, `adultos`, `estatus`, `ninios`, `bebes`, `apartamento`, `contrato`, `autorizacion`, `request`, `total`, `observaciones`, `motivo_cancelacion`, `notificacion`, `id_usuario`) VALUES
(1, '2013-07-19 01:09:32', '2013-07-19 01:09:32', 1, '2013-07-17 00:00:00', '2013-07-18 00:00:00', NULL, 'Aprobado', NULL, NULL, 'O:11:"Apartamento":36:{s:13:"idApartamento";s:1:"1";s:17:"idEmpresaContrato";s:1:"2";s:6:"nombre";s:14:"LES ONES CB063";s:18:"idApartamentosTipo";s:1:"1";s:11:"idDireccion";s:1:"1";s:8:"idMoneda";s:1:"2";s:14:"horarioEntrada";s:8:"00:00:00";s:13:"horarioSalida";s:8:"00:00:00";s:16:"descripcionCorta";s:30:"Esta es una descripción corta";s:16:"descripcionLarga";s:1443:"        Apartamento de 2 habitaciones con capacidad para 4/6 personas y vistas frontales al mar desde la terraza. Se compone de salón comedor con sofá cama y salida a la terraza equipada con mobiliario de jardín , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 2 cuartos de baño uno de ellos con bañera de hidromasaje y cocina independiente totalmente equipada.El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias de la vivienda. Plaza de aparcamiento para coche grande.\r\nNO SE ADMITEN GRUPOS DE JOVENES. Es exclusivo para familias debido a la tranquilidad del complejo y de los vecinos.\r\n\r\nLos Apartamentos Les Ones están en Salou, a solo 150 metros de la playa Capellans. Cuentan con vistas al mar e incluyen aire acondicionado, balcón privado y un jardín con una piscina compartida al aire libre rodeada de tumbonas.\r\nLos apartamentos Les Ones disponen de un salón con sofá cama y TV de pantalla plana, un baño con bañera de hidromasaje y una zona de cocina con fogones, microondas, horno, lavavajillas y lavadora.\r\nLos Apartamentos Les Ones disponen de aparcamiento privado gratuito y una recepción con servicio de información turística.\r\nSe encuentran a solo 8 minutos en coche de PortAventura, a 15 minutos en coche de Tarragona y a 2 km de la estación de tren de Salou, que comunica con el centro de Barcelona en aproximadamente 75 minutos.   ";s:8:"idIdioma";s:1:"1";s:20:"descripcionServicios";s:25:"Descripción de servicios";s:22:"descripcionCondiciones";s:27:"Descripción de condiciones";s:14:"tiempoCreacion";s:19:"2013-06-13 00:38:26";s:18:"ultimaModificacion";s:19:"2013-07-16 23:33:52";s:7:"estatus";s:6:"activo";s:9:"idUsuario";s:1:"1";s:10:"tarifaBase";s:2:"30";s:12:"tarifaSemana";s:4:"1300";s:9:"tarifaMes";s:4:"5000";s:13:"estadiaMaxima";s:2:"30";s:13:"estadiaMinima";s:1:"2";s:23:"huespedAdicionalApartir";s:1:"4";s:21:"huespedAdicionalCosto";s:2:"20";s:13:"costoLimpieza";s:2:"10";s:17:"depositoSeguridad";s:2:"10";s:15:"precioFinSemana";s:2:"25";s:6:"normas";s:16:" LES ONES CB063 ";s:7:"tamanio";s:3:"125";s:17:"capacidadPersonas";s:1:"5";s:12:"habitaciones";s:1:"2";s:5:"camas";s:1:"3";s:8:"tipoCama";s:4:"Cama";s:5:"banio";s:1:"2";s:8:"mascotas";s:1:"0";s:6:"manual";s:39:"  Las llaves están abajo de la maceta ";}', '', '', 'a:34:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:14:"192.158.30.171";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:14:"CONTENT_LENGTH";s:3:"281";s:11:"HTTP_ACCEPT";s:46:"application/json, text/javascript, */*; q=0.01";s:11:"HTTP_ORIGIN";s:21:"http://192.158.30.171";s:21:"HTTP_X_REQUESTED_WITH";s:14:"XMLHttpRequest";s:15:"HTTP_USER_AGENT";s:119:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36";s:12:"CONTENT_TYPE";s:48:"application/x-www-form-urlencoded; charset=UTF-8";s:12:"HTTP_REFERER";s:36:"http://192.158.30.171//reservas/id:1";s:20:"HTTP_ACCEPT_ENCODING";s:17:"gzip,deflate,sdch";s:20:"HTTP_ACCEPT_LANGUAGE";s:14:"es-ES,es;q=0.8";s:11:"HTTP_COOKIE";s:96:"PHPSESSID=vu8fk1q1t4b56j2j0fvkhjsm23; _atshc={}; __atuvc=3%7C26%2C258%7C27%2C199%7C28%2C129%7C29";s:4:"PATH";s:29:"/sbin:/usr/sbin:/bin:/usr/bin";s:16:"SERVER_SIGNATURE";s:75:"<address>Apache/2.2.15 (CentOS) Server at 192.158.30.171 Port 80</address>\n";s:15:"SERVER_SOFTWARE";s:22:"Apache/2.2.15 (CentOS)";s:11:"SERVER_NAME";s:14:"192.158.30.171";s:11:"SERVER_ADDR";s:13:"10.240.122.67";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:14:"187.153.136.71";s:13:"DOCUMENT_ROOT";s:13:"/var/www/html";s:12:"SERVER_ADMIN";s:14:"root@localhost";s:15:"SCRIPT_FILENAME";s:23:"/var/www/html/index.php";s:11:"REMOTE_PORT";s:5:"57618";s:21:"REDIRECT_QUERY_STRING";s:17:"args=ajax-reserva";s:12:"REDIRECT_URL";s:13:"/ajax-reserva";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:4:"POST";s:12:"QUERY_STRING";s:17:"args=ajax-reserva";s:11:"REQUEST_URI";s:14:"//ajax-reserva";s:11:"SCRIPT_NAME";s:10:"/index.php";s:8:"PHP_SELF";s:10:"/index.php";s:12:"REQUEST_TIME";i:1374214171;}', 30, '', '', '', 1),
(2, '2013-07-22 00:40:53', '2013-07-22 00:40:53', 1, '2013-07-23 00:00:00', '2013-07-28 00:00:00', 3, 'Aprobado', NULL, NULL, 'O:11:"Apartamento":36:{s:13:"idApartamento";s:1:"1";s:17:"idEmpresaContrato";s:1:"2";s:6:"nombre";s:14:"LES ONES CB063";s:18:"idApartamentosTipo";s:1:"1";s:11:"idDireccion";s:1:"1";s:8:"idMoneda";s:1:"2";s:14:"horarioEntrada";s:8:"00:00:00";s:13:"horarioSalida";s:8:"00:00:00";s:16:"descripcionCorta";s:30:"Esta es una descripción corta";s:16:"descripcionLarga";s:1443:"        Apartamento de 2 habitaciones con capacidad para 4/6 personas y vistas frontales al mar desde la terraza. Se compone de salón comedor con sofá cama y salida a la terraza equipada con mobiliario de jardín , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 2 cuartos de baño uno de ellos con bañera de hidromasaje y cocina independiente totalmente equipada.El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias de la vivienda. Plaza de aparcamiento para coche grande.\r\nNO SE ADMITEN GRUPOS DE JOVENES. Es exclusivo para familias debido a la tranquilidad del complejo y de los vecinos.\r\n\r\nLos Apartamentos Les Ones están en Salou, a solo 150 metros de la playa Capellans. Cuentan con vistas al mar e incluyen aire acondicionado, balcón privado y un jardín con una piscina compartida al aire libre rodeada de tumbonas.\r\nLos apartamentos Les Ones disponen de un salón con sofá cama y TV de pantalla plana, un baño con bañera de hidromasaje y una zona de cocina con fogones, microondas, horno, lavavajillas y lavadora.\r\nLos Apartamentos Les Ones disponen de aparcamiento privado gratuito y una recepción con servicio de información turística.\r\nSe encuentran a solo 8 minutos en coche de PortAventura, a 15 minutos en coche de Tarragona y a 2 km de la estación de tren de Salou, que comunica con el centro de Barcelona en aproximadamente 75 minutos.   ";s:8:"idIdioma";s:1:"1";s:20:"descripcionServicios";s:25:"Descripción de servicios";s:22:"descripcionCondiciones";s:27:"Descripción de condiciones";s:14:"tiempoCreacion";s:19:"2013-06-13 00:38:26";s:18:"ultimaModificacion";s:19:"2013-07-22 01:24:39";s:7:"estatus";s:6:"activo";s:9:"idUsuario";s:1:"1";s:10:"tarifaBase";s:2:"30";s:12:"tarifaSemana";s:4:"1300";s:9:"tarifaMes";s:4:"5000";s:13:"estadiaMaxima";s:2:"30";s:13:"estadiaMinima";s:1:"2";s:23:"huespedAdicionalApartir";s:1:"4";s:21:"huespedAdicionalCosto";s:2:"20";s:13:"costoLimpieza";s:2:"10";s:17:"depositoSeguridad";s:2:"10";s:15:"precioFinSemana";s:2:"25";s:6:"normas";s:16:" LES ONES CB063 ";s:7:"tamanio";s:3:"125";s:17:"capacidadPersonas";s:1:"5";s:12:"habitaciones";s:1:"2";s:5:"camas";s:1:"3";s:8:"tipoCama";s:4:"Cama";s:5:"banio";s:1:"2";s:8:"mascotas";s:1:"0";s:6:"manual";s:39:"  Las llaves están abajo de la maceta ";}', '', '', 'a:34:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:14:"192.158.30.171";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:14:"CONTENT_LENGTH";s:3:"292";s:11:"HTTP_ACCEPT";s:46:"application/json, text/javascript, */*; q=0.01";s:11:"HTTP_ORIGIN";s:21:"http://192.158.30.171";s:21:"HTTP_X_REQUESTED_WITH";s:14:"XMLHttpRequest";s:15:"HTTP_USER_AGENT";s:119:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36";s:12:"CONTENT_TYPE";s:48:"application/x-www-form-urlencoded; charset=UTF-8";s:12:"HTTP_REFERER";s:36:"http://192.158.30.171//reservas/id:1";s:20:"HTTP_ACCEPT_ENCODING";s:17:"gzip,deflate,sdch";s:20:"HTTP_ACCEPT_LANGUAGE";s:14:"es-ES,es;q=0.8";s:11:"HTTP_COOKIE";s:749:"PHPSESSID=vu8fk1q1t4b56j2j0fvkhjsm23; _atshc={}; fbsr_335469189915773=tpEJnuClJEISc2Dw6Hm2Mv0nwqwaIewKCCZSyEzs_FE.eyJhbGdvcml0aG0iOiJITUFDLVNIQTI1NiIsImNvZGUiOiJBUURzdkloTWF3MTltNFhMc1ZtY0t6TjctUHRfS2Z4bzhNVXA4T1dFQWVqbnF0SURhQ0c0Mm91cnB6TWZmTVlsd3ZJY19MM1BsQlZ0dmNhR04xZ2poYU9vdlU0aEpDTGljcHRrRl9raW9ma3hLM0x4NmdEUTJqem5wZmZSZnRlOFk1bmZ0SDRMMXNsd3ZrSE9Yam9TS2dQVTQ0WjVuY1BZLXd5Wnp0ZGFrbG5zd1JrNzlKUVA2aUk5cndKUDlWVGw0d2pxOU5IelVhT2JBNDVGZU5VejgzOG43MTNiVTN2TDRIam5kMl9QS1ZkVlR0ZzVWR0hVQjNBVlc1WmNqT2ZMOGlfM05SenVYcXBZbC0wcU9EbHE5c3R6N1JISjd0aWhKejVGMkZYcFYwNjJzSXRaUWVGMHZFR3BFU01QTlJrUnJmR1NNQU4yTTE1UVcxdEJvckRKSVRtRiIsImlzc3VlZF9hdCI6MTM3NDQ3MTYxNCwidXNlcl9pZCI6IjEwMDAwNDU2MDY2NDk3OCJ9; __atuvc=3%7C26%2C258%7C27%2C199%7C28%2C149%7C29%2C16%7C30";s:4:"PATH";s:29:"/sbin:/usr/sbin:/bin:/usr/bin";s:16:"SERVER_SIGNATURE";s:75:"<address>Apache/2.2.15 (CentOS) Server at 192.158.30.171 Port 80</address>\n";s:15:"SERVER_SOFTWARE";s:22:"Apache/2.2.15 (CentOS)";s:11:"SERVER_NAME";s:14:"192.158.30.171";s:11:"SERVER_ADDR";s:13:"10.240.122.67";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:13:"187.153.98.74";s:13:"DOCUMENT_ROOT";s:13:"/var/www/html";s:12:"SERVER_ADMIN";s:14:"root@localhost";s:15:"SCRIPT_FILENAME";s:23:"/var/www/html/index.php";s:11:"REMOTE_PORT";s:5:"58726";s:21:"REDIRECT_QUERY_STRING";s:17:"args=ajax-reserva";s:12:"REDIRECT_URL";s:13:"/ajax-reserva";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:4:"POST";s:12:"QUERY_STRING";s:17:"args=ajax-reserva";s:11:"REQUEST_URI";s:14:"//ajax-reserva";s:11:"SCRIPT_NAME";s:10:"/index.php";s:8:"PHP_SELF";s:10:"/index.php";s:12:"REQUEST_TIME";i:1374471653;}', 150, '', '', '', 2),
(3, '2013-08-07 06:11:59', '2013-08-07 06:11:59', 1, '2013-08-08 00:00:00', '2013-08-15 00:00:00', 1, 'Aprobado', NULL, NULL, 'O:11:"Apartamento":40:{s:13:"idApartamento";s:1:"1";s:17:"idEmpresaContrato";s:1:"1";s:6:"nombre";s:14:"LES ONES CB063";s:18:"idApartamentosTipo";s:1:"1";s:11:"idDireccion";s:1:"1";s:8:"idMoneda";s:1:"2";s:14:"horarioEntrada";s:8:"00:00:00";s:13:"horarioSalida";s:8:"00:00:00";s:16:"descripcionCorta";s:30:"Esta es una descripción corta";s:16:"descripcionLarga";s:1443:"        Apartamento de 2 habitaciones con capacidad para 4/6 personas y vistas frontales al mar desde la terraza. Se compone de salón comedor con sofá cama y salida a la terraza equipada con mobiliario de jardín , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 2 cuartos de baño uno de ellos con bañera de hidromasaje y cocina independiente totalmente equipada.El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias de la vivienda. Plaza de aparcamiento para coche grande.\r\nNO SE ADMITEN GRUPOS DE JOVENES. Es exclusivo para familias debido a la tranquilidad del complejo y de los vecinos.\r\n\r\nLos Apartamentos Les Ones están en Salou, a solo 150 metros de la playa Capellans. Cuentan con vistas al mar e incluyen aire acondicionado, balcón privado y un jardín con una piscina compartida al aire libre rodeada de tumbonas.\r\nLos apartamentos Les Ones disponen de un salón con sofá cama y TV de pantalla plana, un baño con bañera de hidromasaje y una zona de cocina con fogones, microondas, horno, lavavajillas y lavadora.\r\nLos Apartamentos Les Ones disponen de aparcamiento privado gratuito y una recepción con servicio de información turística.\r\nSe encuentran a solo 8 minutos en coche de PortAventura, a 15 minutos en coche de Tarragona y a 2 km de la estación de tren de Salou, que comunica con el centro de Barcelona en aproximadamente 75 minutos.   ";s:8:"idIdioma";s:1:"1";s:20:"descripcionServicios";s:25:"Descripción de servicios";s:22:"descripcionCondiciones";s:27:"Descripción de condiciones";s:14:"tiempoCreacion";s:19:"2013-06-12 23:38:26";s:18:"ultimaModificacion";s:19:"2013-07-29 00:51:13";s:7:"estatus";s:6:"activo";s:9:"idUsuario";s:1:"1";s:10:"tarifaBase";s:2:"30";s:12:"tarifaSemana";s:4:"1300";s:9:"tarifaMes";s:4:"5000";s:13:"estadiaMaxima";s:2:"30";s:13:"estadiaMinima";s:1:"2";s:23:"huespedAdicionalApartir";s:1:"4";s:21:"huespedAdicionalCosto";s:2:"20";s:13:"costoLimpieza";s:2:"10";s:17:"depositoSeguridad";s:2:"10";s:15:"precioFinSemana";s:2:"25";s:6:"normas";s:16:" LES ONES CB063 ";s:7:"tamanio";s:3:"125";s:17:"capacidadPersonas";s:1:"5";s:12:"habitaciones";s:1:"2";s:5:"camas";s:1:"3";s:8:"tipoCama";s:4:"Cama";s:5:"banio";s:1:"2";s:8:"mascotas";s:1:"0";s:6:"manual";s:39:"  Las llaves están abajo de la maceta ";s:8:"cantidad";N;s:6:"codigo";N;s:21:"idPoliticaCancelacion";N;s:24:"idApartamentoDescripcion";N;}', '', '', 'a:35:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:14:"54.229.126.252";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:14:"CONTENT_LENGTH";s:3:"298";s:11:"HTTP_ACCEPT";s:46:"application/json, text/javascript, */*; q=0.01";s:11:"HTTP_ORIGIN";s:21:"http://54.229.126.252";s:21:"HTTP_X_REQUESTED_WITH";s:14:"XMLHttpRequest";s:15:"HTTP_USER_AGENT";s:119:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36";s:12:"CONTENT_TYPE";s:48:"application/x-www-form-urlencoded; charset=UTF-8";s:12:"HTTP_REFERER";s:51:"http://54.229.126.252/clickandbooking/reservas/id:1";s:20:"HTTP_ACCEPT_ENCODING";s:17:"gzip,deflate,sdch";s:20:"HTTP_ACCEPT_LANGUAGE";s:14:"es-ES,es;q=0.8";s:11:"HTTP_COOKIE";s:62:"PHPSESSID=kru9rfl3u5u152kfg6h1ejla85; __atuvc=7%7C32; __atrfs=";s:4:"PATH";s:28:"/usr/local/bin:/usr/bin:/bin";s:16:"SERVER_SIGNATURE";s:75:"<address>Apache/2.2.22 (Ubuntu) Server at 54.229.126.252 Port 80</address>\n";s:15:"SERVER_SOFTWARE";s:22:"Apache/2.2.22 (Ubuntu)";s:11:"SERVER_NAME";s:14:"54.229.126.252";s:11:"SERVER_ADDR";s:13:"172.31.24.142";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:15:"187.153.108.234";s:13:"DOCUMENT_ROOT";s:8:"/var/www";s:12:"SERVER_ADMIN";s:19:"webmaster@localhost";s:15:"SCRIPT_FILENAME";s:34:"/var/www/clickandbooking/index.php";s:11:"REMOTE_PORT";s:5:"64576";s:21:"REDIRECT_QUERY_STRING";s:17:"args=ajax-reserva";s:12:"REDIRECT_URL";s:29:"/clickandbooking/ajax-reserva";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:4:"POST";s:12:"QUERY_STRING";s:17:"args=ajax-reserva";s:11:"REQUEST_URI";s:29:"/clickandbooking/ajax-reserva";s:11:"SCRIPT_NAME";s:26:"/clickandbooking/index.php";s:8:"PHP_SELF";s:26:"/clickandbooking/index.php";s:18:"REQUEST_TIME_FLOAT";d:1375855919.0420001;s:12:"REQUEST_TIME";i:1375855919;}', 861, '', '', '', 5),
(4, '2013-08-07 06:12:26', '2013-08-07 06:12:26', 1, '2013-08-08 00:00:00', '2013-08-15 00:00:00', 1, 'Rechazado', NULL, NULL, 'O:11:"Apartamento":40:{s:13:"idApartamento";s:1:"1";s:17:"idEmpresaContrato";s:1:"1";s:6:"nombre";s:14:"LES ONES CB063";s:18:"idApartamentosTipo";s:1:"1";s:11:"idDireccion";s:1:"1";s:8:"idMoneda";s:1:"2";s:14:"horarioEntrada";s:8:"00:00:00";s:13:"horarioSalida";s:8:"00:00:00";s:16:"descripcionCorta";s:30:"Esta es una descripción corta";s:16:"descripcionLarga";s:1443:"        Apartamento de 2 habitaciones con capacidad para 4/6 personas y vistas frontales al mar desde la terraza. Se compone de salón comedor con sofá cama y salida a la terraza equipada con mobiliario de jardín , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 2 cuartos de baño uno de ellos con bañera de hidromasaje y cocina independiente totalmente equipada.El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias de la vivienda. Plaza de aparcamiento para coche grande.\r\nNO SE ADMITEN GRUPOS DE JOVENES. Es exclusivo para familias debido a la tranquilidad del complejo y de los vecinos.\r\n\r\nLos Apartamentos Les Ones están en Salou, a solo 150 metros de la playa Capellans. Cuentan con vistas al mar e incluyen aire acondicionado, balcón privado y un jardín con una piscina compartida al aire libre rodeada de tumbonas.\r\nLos apartamentos Les Ones disponen de un salón con sofá cama y TV de pantalla plana, un baño con bañera de hidromasaje y una zona de cocina con fogones, microondas, horno, lavavajillas y lavadora.\r\nLos Apartamentos Les Ones disponen de aparcamiento privado gratuito y una recepción con servicio de información turística.\r\nSe encuentran a solo 8 minutos en coche de PortAventura, a 15 minutos en coche de Tarragona y a 2 km de la estación de tren de Salou, que comunica con el centro de Barcelona en aproximadamente 75 minutos.   ";s:8:"idIdioma";s:1:"1";s:20:"descripcionServicios";s:25:"Descripción de servicios";s:22:"descripcionCondiciones";s:27:"Descripción de condiciones";s:14:"tiempoCreacion";s:19:"2013-06-12 23:38:26";s:18:"ultimaModificacion";s:19:"2013-07-29 00:51:13";s:7:"estatus";s:6:"activo";s:9:"idUsuario";s:1:"1";s:10:"tarifaBase";s:2:"30";s:12:"tarifaSemana";s:4:"1300";s:9:"tarifaMes";s:4:"5000";s:13:"estadiaMaxima";s:2:"30";s:13:"estadiaMinima";s:1:"2";s:23:"huespedAdicionalApartir";s:1:"4";s:21:"huespedAdicionalCosto";s:2:"20";s:13:"costoLimpieza";s:2:"10";s:17:"depositoSeguridad";s:2:"10";s:15:"precioFinSemana";s:2:"25";s:6:"normas";s:16:" LES ONES CB063 ";s:7:"tamanio";s:3:"125";s:17:"capacidadPersonas";s:1:"5";s:12:"habitaciones";s:1:"2";s:5:"camas";s:1:"3";s:8:"tipoCama";s:4:"Cama";s:5:"banio";s:1:"2";s:8:"mascotas";s:1:"0";s:6:"manual";s:39:"  Las llaves están abajo de la maceta ";s:8:"cantidad";N;s:6:"codigo";N;s:21:"idPoliticaCancelacion";N;s:24:"idApartamentoDescripcion";N;}', '', '', 'a:35:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:14:"54.229.126.252";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:14:"CONTENT_LENGTH";s:3:"281";s:11:"HTTP_ACCEPT";s:46:"application/json, text/javascript, */*; q=0.01";s:11:"HTTP_ORIGIN";s:21:"http://54.229.126.252";s:21:"HTTP_X_REQUESTED_WITH";s:14:"XMLHttpRequest";s:15:"HTTP_USER_AGENT";s:119:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36";s:12:"CONTENT_TYPE";s:48:"application/x-www-form-urlencoded; charset=UTF-8";s:12:"HTTP_REFERER";s:51:"http://54.229.126.252/clickandbooking/reservas/id:1";s:20:"HTTP_ACCEPT_ENCODING";s:17:"gzip,deflate,sdch";s:20:"HTTP_ACCEPT_LANGUAGE";s:14:"es-ES,es;q=0.8";s:11:"HTTP_COOKIE";s:62:"PHPSESSID=kru9rfl3u5u152kfg6h1ejla85; __atuvc=8%7C32; __atrfs=";s:4:"PATH";s:28:"/usr/local/bin:/usr/bin:/bin";s:16:"SERVER_SIGNATURE";s:75:"<address>Apache/2.2.22 (Ubuntu) Server at 54.229.126.252 Port 80</address>\n";s:15:"SERVER_SOFTWARE";s:22:"Apache/2.2.22 (Ubuntu)";s:11:"SERVER_NAME";s:14:"54.229.126.252";s:11:"SERVER_ADDR";s:13:"172.31.24.142";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:15:"187.153.108.234";s:13:"DOCUMENT_ROOT";s:8:"/var/www";s:12:"SERVER_ADMIN";s:19:"webmaster@localhost";s:15:"SCRIPT_FILENAME";s:34:"/var/www/clickandbooking/index.php";s:11:"REMOTE_PORT";s:5:"64606";s:21:"REDIRECT_QUERY_STRING";s:17:"args=ajax-reserva";s:12:"REDIRECT_URL";s:29:"/clickandbooking/ajax-reserva";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:4:"POST";s:12:"QUERY_STRING";s:17:"args=ajax-reserva";s:11:"REQUEST_URI";s:29:"/clickandbooking/ajax-reserva";s:11:"SCRIPT_NAME";s:26:"/clickandbooking/index.php";s:8:"PHP_SELF";s:26:"/clickandbooking/index.php";s:18:"REQUEST_TIME_FLOAT";d:1375855946.516;s:12:"REQUEST_TIME";i:1375855946;}', 861, '', '', '', 6),
(5, '2013-08-07 06:20:08', '2013-08-07 06:20:08', 1, '2013-08-08 00:00:00', '2013-08-15 00:00:00', 1, 'Aprobado', NULL, NULL, 'O:11:"Apartamento":40:{s:13:"idApartamento";s:1:"1";s:17:"idEmpresaContrato";s:1:"1";s:6:"nombre";s:14:"LES ONES CB063";s:18:"idApartamentosTipo";s:1:"1";s:11:"idDireccion";s:1:"1";s:8:"idMoneda";s:1:"2";s:14:"horarioEntrada";s:8:"00:00:00";s:13:"horarioSalida";s:8:"00:00:00";s:16:"descripcionCorta";s:30:"Esta es una descripción corta";s:16:"descripcionLarga";s:1443:"        Apartamento de 2 habitaciones con capacidad para 4/6 personas y vistas frontales al mar desde la terraza. Se compone de salón comedor con sofá cama y salida a la terraza equipada con mobiliario de jardín , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 2 cuartos de baño uno de ellos con bañera de hidromasaje y cocina independiente totalmente equipada.El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias de la vivienda. Plaza de aparcamiento para coche grande.\r\nNO SE ADMITEN GRUPOS DE JOVENES. Es exclusivo para familias debido a la tranquilidad del complejo y de los vecinos.\r\n\r\nLos Apartamentos Les Ones están en Salou, a solo 150 metros de la playa Capellans. Cuentan con vistas al mar e incluyen aire acondicionado, balcón privado y un jardín con una piscina compartida al aire libre rodeada de tumbonas.\r\nLos apartamentos Les Ones disponen de un salón con sofá cama y TV de pantalla plana, un baño con bañera de hidromasaje y una zona de cocina con fogones, microondas, horno, lavavajillas y lavadora.\r\nLos Apartamentos Les Ones disponen de aparcamiento privado gratuito y una recepción con servicio de información turística.\r\nSe encuentran a solo 8 minutos en coche de PortAventura, a 15 minutos en coche de Tarragona y a 2 km de la estación de tren de Salou, que comunica con el centro de Barcelona en aproximadamente 75 minutos.   ";s:8:"idIdioma";s:1:"1";s:20:"descripcionServicios";s:25:"Descripción de servicios";s:22:"descripcionCondiciones";s:27:"Descripción de condiciones";s:14:"tiempoCreacion";s:19:"2013-06-12 23:38:26";s:18:"ultimaModificacion";s:19:"2013-07-29 00:51:13";s:7:"estatus";s:6:"activo";s:9:"idUsuario";s:1:"1";s:10:"tarifaBase";s:2:"30";s:12:"tarifaSemana";s:4:"1300";s:9:"tarifaMes";s:4:"5000";s:13:"estadiaMaxima";s:2:"30";s:13:"estadiaMinima";s:1:"2";s:23:"huespedAdicionalApartir";s:1:"4";s:21:"huespedAdicionalCosto";s:2:"20";s:13:"costoLimpieza";s:2:"10";s:17:"depositoSeguridad";s:2:"10";s:15:"precioFinSemana";s:2:"25";s:6:"normas";s:16:" LES ONES CB063 ";s:7:"tamanio";s:3:"125";s:17:"capacidadPersonas";s:1:"5";s:12:"habitaciones";s:1:"2";s:5:"camas";s:1:"3";s:8:"tipoCama";s:4:"Cama";s:5:"banio";s:1:"2";s:8:"mascotas";s:1:"0";s:6:"manual";s:39:"  Las llaves están abajo de la maceta ";s:8:"cantidad";N;s:6:"codigo";N;s:21:"idPoliticaCancelacion";N;s:24:"idApartamentoDescripcion";N;}', '', '', 'a:35:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:14:"54.229.126.252";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:14:"CONTENT_LENGTH";s:3:"311";s:11:"HTTP_ACCEPT";s:46:"application/json, text/javascript, */*; q=0.01";s:11:"HTTP_ORIGIN";s:21:"http://54.229.126.252";s:21:"HTTP_X_REQUESTED_WITH";s:14:"XMLHttpRequest";s:15:"HTTP_USER_AGENT";s:119:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36";s:12:"CONTENT_TYPE";s:48:"application/x-www-form-urlencoded; charset=UTF-8";s:12:"HTTP_REFERER";s:51:"http://54.229.126.252/clickandbooking/reservas/id:1";s:20:"HTTP_ACCEPT_ENCODING";s:17:"gzip,deflate,sdch";s:20:"HTTP_ACCEPT_LANGUAGE";s:14:"es-ES,es;q=0.8";s:11:"HTTP_COOKIE";s:62:"PHPSESSID=kru9rfl3u5u152kfg6h1ejla85; __atuvc=9%7C32; __atrfs=";s:4:"PATH";s:28:"/usr/local/bin:/usr/bin:/bin";s:16:"SERVER_SIGNATURE";s:75:"<address>Apache/2.2.22 (Ubuntu) Server at 54.229.126.252 Port 80</address>\n";s:15:"SERVER_SOFTWARE";s:22:"Apache/2.2.22 (Ubuntu)";s:11:"SERVER_NAME";s:14:"54.229.126.252";s:11:"SERVER_ADDR";s:13:"172.31.24.142";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:15:"187.153.108.234";s:13:"DOCUMENT_ROOT";s:8:"/var/www";s:12:"SERVER_ADMIN";s:19:"webmaster@localhost";s:15:"SCRIPT_FILENAME";s:34:"/var/www/clickandbooking/index.php";s:11:"REMOTE_PORT";s:5:"64716";s:21:"REDIRECT_QUERY_STRING";s:17:"args=ajax-reserva";s:12:"REDIRECT_URL";s:29:"/clickandbooking/ajax-reserva";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:4:"POST";s:12:"QUERY_STRING";s:17:"args=ajax-reserva";s:11:"REQUEST_URI";s:29:"/clickandbooking/ajax-reserva";s:11:"SCRIPT_NAME";s:26:"/clickandbooking/index.php";s:8:"PHP_SELF";s:26:"/clickandbooking/index.php";s:18:"REQUEST_TIME_FLOAT";d:1375856408.651;s:12:"REQUEST_TIME";i:1375856408;}', 861, '', '', '', 7),
(6, '2013-08-07 06:22:49', '2013-08-07 06:22:49', 1, '2013-08-08 00:00:00', '2013-08-15 00:00:00', 1, 'Aprobado', NULL, NULL, 'O:11:"Apartamento":40:{s:13:"idApartamento";s:1:"1";s:17:"idEmpresaContrato";s:1:"1";s:6:"nombre";s:14:"LES ONES CB063";s:18:"idApartamentosTipo";s:1:"1";s:11:"idDireccion";s:1:"1";s:8:"idMoneda";s:1:"2";s:14:"horarioEntrada";s:8:"00:00:00";s:13:"horarioSalida";s:8:"00:00:00";s:16:"descripcionCorta";s:30:"Esta es una descripción corta";s:16:"descripcionLarga";s:1443:"        Apartamento de 2 habitaciones con capacidad para 4/6 personas y vistas frontales al mar desde la terraza. Se compone de salón comedor con sofá cama y salida a la terraza equipada con mobiliario de jardín , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 2 cuartos de baño uno de ellos con bañera de hidromasaje y cocina independiente totalmente equipada.El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias de la vivienda. Plaza de aparcamiento para coche grande.\r\nNO SE ADMITEN GRUPOS DE JOVENES. Es exclusivo para familias debido a la tranquilidad del complejo y de los vecinos.\r\n\r\nLos Apartamentos Les Ones están en Salou, a solo 150 metros de la playa Capellans. Cuentan con vistas al mar e incluyen aire acondicionado, balcón privado y un jardín con una piscina compartida al aire libre rodeada de tumbonas.\r\nLos apartamentos Les Ones disponen de un salón con sofá cama y TV de pantalla plana, un baño con bañera de hidromasaje y una zona de cocina con fogones, microondas, horno, lavavajillas y lavadora.\r\nLos Apartamentos Les Ones disponen de aparcamiento privado gratuito y una recepción con servicio de información turística.\r\nSe encuentran a solo 8 minutos en coche de PortAventura, a 15 minutos en coche de Tarragona y a 2 km de la estación de tren de Salou, que comunica con el centro de Barcelona en aproximadamente 75 minutos.   ";s:8:"idIdioma";s:1:"1";s:20:"descripcionServicios";s:25:"Descripción de servicios";s:22:"descripcionCondiciones";s:27:"Descripción de condiciones";s:14:"tiempoCreacion";s:19:"2013-06-12 23:38:26";s:18:"ultimaModificacion";s:19:"2013-07-29 00:51:13";s:7:"estatus";s:6:"activo";s:9:"idUsuario";s:1:"1";s:10:"tarifaBase";s:2:"30";s:12:"tarifaSemana";s:4:"1300";s:9:"tarifaMes";s:4:"5000";s:13:"estadiaMaxima";s:2:"30";s:13:"estadiaMinima";s:1:"2";s:23:"huespedAdicionalApartir";s:1:"4";s:21:"huespedAdicionalCosto";s:2:"20";s:13:"costoLimpieza";s:2:"10";s:17:"depositoSeguridad";s:2:"10";s:15:"precioFinSemana";s:2:"25";s:6:"normas";s:16:" LES ONES CB063 ";s:7:"tamanio";s:3:"125";s:17:"capacidadPersonas";s:1:"5";s:12:"habitaciones";s:1:"2";s:5:"camas";s:1:"3";s:8:"tipoCama";s:4:"Cama";s:5:"banio";s:1:"2";s:8:"mascotas";s:1:"0";s:6:"manual";s:39:"  Las llaves están abajo de la maceta ";s:8:"cantidad";N;s:6:"codigo";N;s:21:"idPoliticaCancelacion";N;s:24:"idApartamentoDescripcion";N;}', '', '', 'a:35:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:14:"54.229.126.252";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:14:"CONTENT_LENGTH";s:3:"301";s:11:"HTTP_ACCEPT";s:46:"application/json, text/javascript, */*; q=0.01";s:11:"HTTP_ORIGIN";s:21:"http://54.229.126.252";s:21:"HTTP_X_REQUESTED_WITH";s:14:"XMLHttpRequest";s:15:"HTTP_USER_AGENT";s:119:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36";s:12:"CONTENT_TYPE";s:48:"application/x-www-form-urlencoded; charset=UTF-8";s:12:"HTTP_REFERER";s:51:"http://54.229.126.252/clickandbooking/reservas/id:1";s:20:"HTTP_ACCEPT_ENCODING";s:17:"gzip,deflate,sdch";s:20:"HTTP_ACCEPT_LANGUAGE";s:14:"es-ES,es;q=0.8";s:11:"HTTP_COOKIE";s:63:"PHPSESSID=kru9rfl3u5u152kfg6h1ejla85; __atrfs=; __atuvc=11%7C32";s:4:"PATH";s:28:"/usr/local/bin:/usr/bin:/bin";s:16:"SERVER_SIGNATURE";s:75:"<address>Apache/2.2.22 (Ubuntu) Server at 54.229.126.252 Port 80</address>\n";s:15:"SERVER_SOFTWARE";s:22:"Apache/2.2.22 (Ubuntu)";s:11:"SERVER_NAME";s:14:"54.229.126.252";s:11:"SERVER_ADDR";s:13:"172.31.24.142";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:15:"187.153.108.234";s:13:"DOCUMENT_ROOT";s:8:"/var/www";s:12:"SERVER_ADMIN";s:19:"webmaster@localhost";s:15:"SCRIPT_FILENAME";s:34:"/var/www/clickandbooking/index.php";s:11:"REMOTE_PORT";s:5:"64781";s:21:"REDIRECT_QUERY_STRING";s:17:"args=ajax-reserva";s:12:"REDIRECT_URL";s:29:"/clickandbooking/ajax-reserva";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:4:"POST";s:12:"QUERY_STRING";s:17:"args=ajax-reserva";s:11:"REQUEST_URI";s:29:"/clickandbooking/ajax-reserva";s:11:"SCRIPT_NAME";s:26:"/clickandbooking/index.php";s:8:"PHP_SELF";s:26:"/clickandbooking/index.php";s:18:"REQUEST_TIME_FLOAT";d:1375856568.881;s:12:"REQUEST_TIME";i:1375856568;}', 861, '', '', '', 8),
(7, '2013-08-08 02:07:27', '2013-08-08 02:07:27', 1, '2013-08-08 00:00:00', '2013-08-14 00:00:00', 1, 'Aprobado', NULL, NULL, 'O:11:"Apartamento":40:{s:13:"idApartamento";s:1:"1";s:17:"idEmpresaContrato";s:1:"5";s:6:"nombre";s:14:"LES ONES CB063";s:18:"idApartamentosTipo";s:1:"1";s:11:"idDireccion";s:1:"1";s:8:"idMoneda";s:1:"2";s:14:"horarioEntrada";s:8:"00:00:00";s:13:"horarioSalida";s:8:"00:00:00";s:16:"descripcionCorta";s:30:"Esta es una descripción corta";s:16:"descripcionLarga";s:1443:"        Apartamento de 2 habitaciones con capacidad para 4/6 personas y vistas frontales al mar desde la terraza. Se compone de salón comedor con sofá cama y salida a la terraza equipada con mobiliario de jardín , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 2 cuartos de baño uno de ellos con bañera de hidromasaje y cocina independiente totalmente equipada.El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias de la vivienda. Plaza de aparcamiento para coche grande.\r\nNO SE ADMITEN GRUPOS DE JOVENES. Es exclusivo para familias debido a la tranquilidad del complejo y de los vecinos.\r\n\r\nLos Apartamentos Les Ones están en Salou, a solo 150 metros de la playa Capellans. Cuentan con vistas al mar e incluyen aire acondicionado, balcón privado y un jardín con una piscina compartida al aire libre rodeada de tumbonas.\r\nLos apartamentos Les Ones disponen de un salón con sofá cama y TV de pantalla plana, un baño con bañera de hidromasaje y una zona de cocina con fogones, microondas, horno, lavavajillas y lavadora.\r\nLos Apartamentos Les Ones disponen de aparcamiento privado gratuito y una recepción con servicio de información turística.\r\nSe encuentran a solo 8 minutos en coche de PortAventura, a 15 minutos en coche de Tarragona y a 2 km de la estación de tren de Salou, que comunica con el centro de Barcelona en aproximadamente 75 minutos.   ";s:8:"idIdioma";s:1:"1";s:20:"descripcionServicios";s:25:"Descripción de servicios";s:22:"descripcionCondiciones";s:27:"Descripción de condiciones";s:14:"tiempoCreacion";s:19:"2013-06-12 23:38:26";s:18:"ultimaModificacion";s:19:"2013-08-07 15:36:55";s:7:"estatus";s:6:"activo";s:9:"idUsuario";s:1:"1";s:10:"tarifaBase";s:2:"30";s:12:"tarifaSemana";s:4:"1300";s:9:"tarifaMes";s:4:"5000";s:13:"estadiaMaxima";s:2:"30";s:13:"estadiaMinima";s:1:"2";s:23:"huespedAdicionalApartir";s:1:"4";s:21:"huespedAdicionalCosto";s:2:"20";s:13:"costoLimpieza";s:2:"10";s:17:"depositoSeguridad";s:2:"10";s:15:"precioFinSemana";s:2:"25";s:6:"normas";s:16:" LES ONES CB063 ";s:7:"tamanio";s:3:"125";s:17:"capacidadPersonas";s:1:"5";s:12:"habitaciones";s:1:"2";s:5:"camas";s:1:"3";s:8:"tipoCama";s:4:"Cama";s:5:"banio";s:1:"2";s:8:"mascotas";s:1:"0";s:6:"manual";s:39:"  Las llaves están abajo de la maceta ";s:8:"cantidad";N;s:6:"codigo";s:0:"";s:21:"idPoliticaCancelacion";N;s:24:"idApartamentoDescripcion";N;}', '', '', 'a:35:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:14:"54.229.126.252";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:14:"CONTENT_LENGTH";s:3:"299";s:11:"HTTP_ACCEPT";s:46:"application/json, text/javascript, */*; q=0.01";s:11:"HTTP_ORIGIN";s:21:"http://54.229.126.252";s:21:"HTTP_X_REQUESTED_WITH";s:14:"XMLHttpRequest";s:15:"HTTP_USER_AGENT";s:119:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36";s:12:"CONTENT_TYPE";s:48:"application/x-www-form-urlencoded; charset=UTF-8";s:12:"HTTP_REFERER";s:51:"http://54.229.126.252/clickandbooking/reservas/id:1";s:20:"HTTP_ACCEPT_ENCODING";s:17:"gzip,deflate,sdch";s:20:"HTTP_ACCEPT_LANGUAGE";s:14:"es-ES,es;q=0.8";s:11:"HTTP_COOKIE";s:63:"PHPSESSID=kru9rfl3u5u152kfg6h1ejla85; __atuvc=22%7C32; __atrfs=";s:4:"PATH";s:28:"/usr/local/bin:/usr/bin:/bin";s:16:"SERVER_SIGNATURE";s:75:"<address>Apache/2.2.22 (Ubuntu) Server at 54.229.126.252 Port 80</address>\n";s:15:"SERVER_SOFTWARE";s:22:"Apache/2.2.22 (Ubuntu)";s:11:"SERVER_NAME";s:14:"54.229.126.252";s:11:"SERVER_ADDR";s:13:"172.31.24.142";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:15:"187.153.108.234";s:13:"DOCUMENT_ROOT";s:8:"/var/www";s:12:"SERVER_ADMIN";s:19:"webmaster@localhost";s:15:"SCRIPT_FILENAME";s:34:"/var/www/clickandbooking/index.php";s:11:"REMOTE_PORT";s:5:"64227";s:21:"REDIRECT_QUERY_STRING";s:17:"args=ajax-reserva";s:12:"REDIRECT_URL";s:29:"/clickandbooking/ajax-reserva";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:4:"POST";s:12:"QUERY_STRING";s:17:"args=ajax-reserva";s:11:"REQUEST_URI";s:29:"/clickandbooking/ajax-reserva";s:11:"SCRIPT_NAME";s:26:"/clickandbooking/index.php";s:8:"PHP_SELF";s:26:"/clickandbooking/index.php";s:18:"REQUEST_TIME_FLOAT";d:1375927647.7260001;s:12:"REQUEST_TIME";i:1375927647;}', 738, '', '', '', 9),
(8, '2013-08-08 13:35:30', '2013-08-08 13:35:30', 1, '2013-08-08 00:00:00', '2013-08-15 00:00:00', 1, 'Aprobado', NULL, NULL, 'O:11:"Apartamento":40:{s:13:"idApartamento";s:1:"1";s:17:"idEmpresaContrato";s:1:"5";s:6:"nombre";s:14:"LES ONES CB063";s:18:"idApartamentosTipo";s:1:"2";s:11:"idDireccion";s:1:"1";s:8:"idMoneda";s:1:"2";s:14:"horarioEntrada";s:8:"00:00:00";s:13:"horarioSalida";s:8:"00:00:00";s:16:"descripcionCorta";s:30:"Esta es una descripción corta";s:16:"descripcionLarga";s:1443:"        Apartamento de 2 habitaciones con capacidad para 4/6 personas y vistas frontales al mar desde la terraza. Se compone de salón comedor con sofá cama y salida a la terraza equipada con mobiliario de jardín , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 2 cuartos de baño uno de ellos con bañera de hidromasaje y cocina independiente totalmente equipada.El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias de la vivienda. Plaza de aparcamiento para coche grande.\r\nNO SE ADMITEN GRUPOS DE JOVENES. Es exclusivo para familias debido a la tranquilidad del complejo y de los vecinos.\r\n\r\nLos Apartamentos Les Ones están en Salou, a solo 150 metros de la playa Capellans. Cuentan con vistas al mar e incluyen aire acondicionado, balcón privado y un jardín con una piscina compartida al aire libre rodeada de tumbonas.\r\nLos apartamentos Les Ones disponen de un salón con sofá cama y TV de pantalla plana, un baño con bañera de hidromasaje y una zona de cocina con fogones, microondas, horno, lavavajillas y lavadora.\r\nLos Apartamentos Les Ones disponen de aparcamiento privado gratuito y una recepción con servicio de información turística.\r\nSe encuentran a solo 8 minutos en coche de PortAventura, a 15 minutos en coche de Tarragona y a 2 km de la estación de tren de Salou, que comunica con el centro de Barcelona en aproximadamente 75 minutos.   ";s:8:"idIdioma";s:1:"1";s:20:"descripcionServicios";s:25:"Descripción de servicios";s:22:"descripcionCondiciones";s:27:"Descripción de condiciones";s:14:"tiempoCreacion";s:19:"2013-06-12 23:38:26";s:18:"ultimaModificacion";s:19:"2013-08-08 12:52:23";s:7:"estatus";s:6:"activo";s:9:"idUsuario";s:1:"1";s:10:"tarifaBase";s:2:"30";s:12:"tarifaSemana";s:4:"1300";s:9:"tarifaMes";s:4:"5000";s:13:"estadiaMaxima";s:2:"30";s:13:"estadiaMinima";s:1:"2";s:23:"huespedAdicionalApartir";s:1:"4";s:21:"huespedAdicionalCosto";s:2:"20";s:13:"costoLimpieza";s:2:"10";s:17:"depositoSeguridad";s:2:"10";s:15:"precioFinSemana";s:2:"25";s:6:"normas";s:16:" LES ONES CB063 ";s:7:"tamanio";s:3:"125";s:17:"capacidadPersonas";s:1:"5";s:12:"habitaciones";s:1:"2";s:5:"camas";s:1:"3";s:8:"tipoCama";s:4:"Cama";s:5:"banio";s:1:"2";s:8:"mascotas";s:1:"0";s:6:"manual";s:39:"  Las llaves están abajo de la maceta ";s:8:"cantidad";N;s:6:"codigo";s:0:"";s:21:"idPoliticaCancelacion";s:1:"1";s:24:"idApartamentoDescripcion";N;}', '', '', 'a:35:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:14:"54.229.126.252";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:14:"CONTENT_LENGTH";s:3:"316";s:11:"HTTP_ACCEPT";s:46:"application/json, text/javascript, */*; q=0.01";s:11:"HTTP_ORIGIN";s:21:"http://54.229.126.252";s:21:"HTTP_X_REQUESTED_WITH";s:14:"XMLHttpRequest";s:15:"HTTP_USER_AGENT";s:119:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36";s:12:"CONTENT_TYPE";s:48:"application/x-www-form-urlencoded; charset=UTF-8";s:12:"HTTP_REFERER";s:51:"http://54.229.126.252/clickandbooking/reservas/id:1";s:20:"HTTP_ACCEPT_ENCODING";s:17:"gzip,deflate,sdch";s:20:"HTTP_ACCEPT_LANGUAGE";s:14:"es-ES,es;q=0.8";s:11:"HTTP_COOKIE";s:706:"PHPSESSID=kru9rfl3u5u152kfg6h1ejla85; fbsr_335469189915773=hPHq4ES5eJsRZ8aDePs4hw2ZAyhoZdNBbxzK9uzs8Zc.eyJhbGdvcml0aG0iOiJITUFDLVNIQTI1NiIsImNvZGUiOiJBUUJYRjRKcUJTb3YyX2xPM0d5Ul93OENzWGROVDdBM2JFZWJZSEN2c3RFSTBqUHA1X2hCUkFZMWxwMGtWVHk1eXdIa2VzR2JuTVYzT0xwYUhLektucXdFdGRTQnNuRGpiWnRLdi0tb0lrUHZYRmtncnJ1T3JsZ1dsSFA2UlB5X00yMUxuNWRMRmNiYmtuVkhnZVJzaGkxa2hOSWd0RjFpaXpSeEFZTmFwaE5hZmlzUlBRNmwydTluQ3FTZC1keHlpNG1KV1JEYWpRR0piU3VMWkNqXzcydy1fY29zYlFPcjZVUjhlT0kzLUQtT29QUUtTWlhBQnB0by1qWG1WclluUC01TWdfT1Zrbk5lVHZrVHU1aUlXbjlabzdrZlUxN1UtdzctWndXdWtVYVpVNzFUTW9TLUZoSEpRWm9TbXV0R2JvR3JKc2d1TkRyd1B1WFBlelZIWEhzdSIsImlzc3VlZF9hdCI6MTM3NTk2ODg5MywidXNlcl9pZCI6IjEwMDAwNDU2MDY2NDk3OCJ9; __atuvc=33%7C32; __atrfs=";s:4:"PATH";s:28:"/usr/local/bin:/usr/bin:/bin";s:16:"SERVER_SIGNATURE";s:75:"<address>Apache/2.2.22 (Ubuntu) Server at 54.229.126.252 Port 80</address>\n";s:15:"SERVER_SOFTWARE";s:22:"Apache/2.2.22 (Ubuntu)";s:11:"SERVER_NAME";s:14:"54.229.126.252";s:11:"SERVER_ADDR";s:13:"172.31.24.142";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:15:"187.153.108.234";s:13:"DOCUMENT_ROOT";s:8:"/var/www";s:12:"SERVER_ADMIN";s:19:"webmaster@localhost";s:15:"SCRIPT_FILENAME";s:34:"/var/www/clickandbooking/index.php";s:11:"REMOTE_PORT";s:5:"62980";s:21:"REDIRECT_QUERY_STRING";s:17:"args=ajax-reserva";s:12:"REDIRECT_URL";s:29:"/clickandbooking/ajax-reserva";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:4:"POST";s:12:"QUERY_STRING";s:17:"args=ajax-reserva";s:11:"REQUEST_URI";s:29:"/clickandbooking/ajax-reserva";s:11:"SCRIPT_NAME";s:26:"/clickandbooking/index.php";s:8:"PHP_SELF";s:26:"/clickandbooking/index.php";s:18:"REQUEST_TIME_FLOAT";d:1375968930.2379999;s:12:"REQUEST_TIME";i:1375968930;}', 861, '', '', '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones_pagos`
--

CREATE TABLE IF NOT EXISTS `reservaciones_pagos` (
  `id_reservacion_pago` int(11) NOT NULL AUTO_INCREMENT,
  `id_reservacion` int(11) NOT NULL,
  `forma_pago` varchar(45) DEFAULT NULL,
  `autorizacion` text,
  `request` text,
  `importe` varchar(45) DEFAULT NULL,
  `concepto` text,
  `estado` varchar(45) DEFAULT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `origen` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_reservacion_pago`),
  KEY `fk_reservaciones_pagos_reservaciones1_idx` (`id_reservacion`)
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
  `facebook_id` text,
  `facebook_username` text,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuarios_usuarios_grupos1_idx` (`id_usuario_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`, `tiempo_creacion`, `ultima_modificacion`, `id_usuario_grupo`, `estatus`, `telefono`, `apellido_materno`, `apellido_paterno`, `facebook_id`, `facebook_username`) VALUES
(1, 'Rubén', 'admin@mallorca.com', 'admin', '2013-05-30 04:27:11', '2013-08-08 12:59:07', 1, '', '', 'Calva', 'Velazquez', '', ''),
(2, 'Ruben', 'admin@fodessa.com', '222627', '2013-07-16 22:37:39', '2013-07-16 22:37:39', 2, 'activo', '', 'Calva', 'Velazquez', NULL, NULL),
(3, 'Ruben', 'ruben.listico.ds@gmail.com', 'fd584c4346eb7ae5e671bc062d121608', '2013-07-17 00:34:19', '2013-08-08 13:35:30', 2, 'activo', '', 'Calva', 'Velazquez', '', ''),
(4, 'Mauro', 'maurotem@hotmail.com', 'e15133234ff6d3e691d41135151f6caa', '2013-07-17 09:29:38', '2013-07-17 09:29:38', 2, 'activo', '', '', 'Barbarroja', NULL, NULL),
(5, '123', 'ruben.listico@gmail.com', '', '2013-08-07 06:11:59', '2013-08-07 06:11:59', 2, 'activo', '', '123', '123', '', ''),
(6, '123', '123@dsf.com', '', '2013-08-07 06:12:26', '2013-08-07 06:12:26', 2, 'activo', '', '123', '123', '', ''),
(7, 'Ruben', 'ruben.listico.ds@gmil.com', '', '2013-08-07 06:20:08', '2013-08-07 06:20:08', 2, 'activo', '', 'Calva', 'Velazquez', '', ''),
(8, 'Ruben', 'listico__@hotmail.com', '', '2013-08-07 06:22:48', '2013-08-07 06:22:48', 2, 'activo', '', 'Calva', 'Velazquez', '', ''),
(9, 'Ruben', 'r@gmail.com', '', '2013-08-08 02:07:27', '2013-08-08 02:07:27', 2, 'activo', '', 'Calva', 'Velazquez', '', '');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_registros`
--

CREATE TABLE IF NOT EXISTS `usuarios_registros` (
  `id_usuario_registro` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `movimiento` text,
  PRIMARY KEY (`id_usuario_registro`),
  KEY `fk_usuarios_registros_usuarios1_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Volcado de datos para la tabla `usuarios_registros`
--

INSERT INTO `usuarios_registros` (`id_usuario_registro`, `id_usuario`, `tiempo_creacion`, `tipo`, `movimiento`) VALUES
(1, NULL, '2013-08-07 06:20:08', 'usuarios where id=7', 'insert'),
(2, NULL, '2013-08-07 06:20:08', 'reservaciones where id=5', 'insert'),
(3, NULL, '2013-08-07 06:22:48', 'usuarios where id=8', 'insert'),
(4, NULL, '2013-08-07 06:22:48', 'huespedes where id=3', 'insert'),
(5, NULL, '2013-08-07 06:22:49', 'reservaciones where id=6', 'insert'),
(6, 1, '2013-08-07 15:36:55', 'apartamentos where id=1', 'update'),
(7, 1, '2013-08-07 15:37:19', 'empresas where id=1', 'update'),
(8, 1, '2013-08-07 15:37:19', 'empresas_contratos where id=1', 'update'),
(9, 1, '2013-08-07 15:37:19', 'empresas_contratos where id=2', 'update'),
(10, NULL, '2013-08-08 02:07:27', 'usuarios where id=9', 'insert'),
(11, NULL, '2013-08-08 02:07:27', 'huespedes where id=4', 'insert'),
(12, NULL, '2013-08-08 02:07:27', 'reservaciones where id=7', 'insert'),
(13, 9, '2013-08-08 02:12:34', 'empresas where id=3', 'delete'),
(14, 9, '2013-08-08 02:12:47', 'empresas where id=2', 'update'),
(15, 9, '2013-08-08 02:12:47', 'empresas_contratos where id=4', 'update'),
(16, 9, '2013-08-08 02:12:47', 'empresas_contratos where id=5', 'update'),
(17, 9, '2013-08-08 02:18:31', 'apartamentos where id=1', 'update'),
(18, 9, '2013-08-08 02:18:31', 'apartamentos_instalaciones where id=43', 'insert'),
(19, 9, '2013-08-08 02:18:32', 'apartamentos_instalaciones where id=44', 'insert'),
(20, 9, '2013-08-08 02:18:32', 'apartamentos_instalaciones where id=45', 'insert'),
(21, 9, '2013-08-08 02:18:32', 'apartamentos_instalaciones where id=46', 'insert'),
(22, 9, '2013-08-08 02:18:32', 'apartamentos_instalaciones where id=47', 'insert'),
(23, 9, '2013-08-08 02:18:32', 'apartamentos_instalaciones where id=48', 'insert'),
(24, 9, '2013-08-08 02:18:33', 'apartamentos_instalaciones where id=49', 'insert'),
(25, 9, '2013-08-08 02:18:33', 'apartamentos_articulos where idApartamento=1', 'delete'),
(26, 9, '2013-08-08 02:18:33', 'apartamentos_articulos where id=8', 'insert'),
(27, 9, '2013-08-08 02:18:33', 'apartamentos_alojamientos where id_apartament', 'delete'),
(28, 9, '2013-08-08 02:18:34', 'apartamentos_alojamientos where id=102', 'insert'),
(29, 9, '2013-08-08 02:18:37', 'apartamentos where id=1', 'update'),
(30, 9, '2013-08-08 02:18:37', 'apartamentos_instalaciones where id=50', 'insert'),
(31, 9, '2013-08-08 02:18:37', 'apartamentos_instalaciones where id=51', 'insert'),
(32, 9, '2013-08-08 02:18:37', 'apartamentos_instalaciones where id=52', 'insert'),
(33, 9, '2013-08-08 02:18:38', 'apartamentos_instalaciones where id=53', 'insert'),
(34, 9, '2013-08-08 02:18:38', 'apartamentos_instalaciones where id=54', 'insert'),
(35, 9, '2013-08-08 02:18:38', 'apartamentos_instalaciones where id=55', 'insert'),
(36, 9, '2013-08-08 02:18:38', 'apartamentos_instalaciones where id=56', 'insert'),
(37, 9, '2013-08-08 02:18:39', 'apartamentos_articulos where idApartamento=1', 'delete'),
(38, 9, '2013-08-08 02:18:39', 'apartamentos_articulos where id=9', 'insert'),
(39, 9, '2013-08-08 02:18:39', 'apartamentos_alojamientos where id_apartament', 'delete'),
(40, 9, '2013-08-08 02:18:39', 'apartamentos_alojamientos where id=103', 'insert'),
(41, 9, '2013-08-08 02:19:30', 'apartamentos_adjuntos where id_apartamento=1', 'update'),
(42, 1, '2013-08-08 12:51:29', 'empresas where id=1', 'update'),
(43, 1, '2013-08-08 12:51:29', 'empresas_contratos where id=1', 'update'),
(44, 1, '2013-08-08 12:51:29', 'empresas_contratos where id=2', 'update'),
(45, 1, '2013-08-08 12:52:08', 'politicas_cancelacion where id=1', 'insert'),
(46, 1, '2013-08-08 12:52:23', 'apartamentos where id=1', 'update'),
(47, 1, '2013-08-08 12:55:12', 'reservaciones where id=1', 'update'),
(48, 1, '2013-08-08 12:55:15', 'reservaciones where id=2', 'update'),
(49, 1, '2013-08-08 12:55:16', 'reservaciones where id=3', 'update'),
(50, 1, '2013-08-08 12:55:17', 'reservaciones where id=4', 'update'),
(51, 1, '2013-08-08 12:55:18', 'reservaciones where id=5', 'update'),
(52, 1, '2013-08-08 12:55:19', 'reservaciones where id=6', 'update'),
(53, 1, '2013-08-08 12:55:20', 'reservaciones where id=7', 'update'),
(54, 1, '2013-08-08 12:55:22', 'reservaciones where id=1', 'update'),
(55, 1, '2013-08-08 12:55:23', 'reservaciones where id=2', 'update'),
(56, 1, '2013-08-08 12:55:24', 'reservaciones where id=3', 'update'),
(57, 1, '2013-08-08 12:55:26', 'reservaciones where id=5', 'update'),
(58, 1, '2013-08-08 12:55:27', 'reservaciones where id=6', 'update'),
(59, 1, '2013-08-08 12:55:29', 'reservaciones where id=7', 'update'),
(60, 1, '2013-08-08 12:58:05', 'articulos where id=2', 'update'),
(61, 1, '2013-08-08 12:58:52', 'usuarios where id=1', 'update'),
(62, 1, '2013-08-08 12:59:07', 'usuarios where id=1', 'update'),
(63, 3, '2013-08-08 13:35:30', 'usuarios where id=3', 'update'),
(64, 3, '2013-08-08 13:35:30', 'reservaciones where id=8', 'insert'),
(65, NULL, '2013-08-08 15:38:48', 'apartamentos where id=1', 'update'),
(66, NULL, '2013-08-08 15:38:48', 'apartamentos_instalaciones where id=57', 'insert'),
(67, NULL, '2013-08-08 15:38:48', 'apartamentos_instalaciones where id=58', 'insert'),
(68, NULL, '2013-08-08 15:38:48', 'apartamentos_instalaciones where id=59', 'insert'),
(69, NULL, '2013-08-08 15:38:48', 'apartamentos_instalaciones where id=60', 'insert'),
(70, NULL, '2013-08-08 15:38:48', 'apartamentos_instalaciones where id=61', 'insert'),
(71, NULL, '2013-08-08 15:38:48', 'apartamentos_instalaciones where id=62', 'insert'),
(72, NULL, '2013-08-08 15:38:48', 'apartamentos_instalaciones where id=63', 'insert'),
(73, NULL, '2013-08-08 15:38:48', 'apartamentos_articulos where idApartamento=1', 'delete'),
(74, NULL, '2013-08-08 15:38:48', 'apartamentos_articulos where id=10', 'insert'),
(75, NULL, '2013-08-08 15:38:48', 'apartamentos_articulos where id=11', 'insert'),
(76, NULL, '2013-08-08 15:38:48', 'apartamentos_alojamientos where id_apartament', 'delete'),
(77, NULL, '2013-08-08 15:38:48', 'apartamentos_alojamientos where id=104', 'insert'),
(78, NULL, '2013-08-08 16:02:14', 'reservaciones where id=8', 'update'),
(79, NULL, '2013-08-08 16:02:15', 'reservaciones where id=8', 'update'),
(80, 1, '2013-08-22 15:32:33', 'articulos where id=3', 'insert'),
(81, 1, '2013-08-22 16:02:00', 'mantenimientos where id=2', 'insert'),
(82, 1, '2013-08-22 16:11:06', 'reservaciones where id=1', 'update'),
(83, 1, '2013-08-22 16:11:09', 'reservaciones where id=1', 'update');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apartamentos`
--
ALTER TABLE `apartamentos`
  ADD CONSTRAINT `fk_apartamentos_apartamentos_descripcion1` FOREIGN KEY (`id_apartamento_descripcion`) REFERENCES `apartamentos_descripcion` (`id_apartamento_descripcion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_apartamentos_tipos1` FOREIGN KEY (`id_apartamentos_tipo`) REFERENCES `apartamentos_tipos` (`id_apartamentos_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_direcciones1` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_empresas_contratos1` FOREIGN KEY (`id_empresa_contrato`) REFERENCES `empresas_contratos` (`id_empresa_contrato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_idiomas1` FOREIGN KEY (`id_idioma`) REFERENCES `idiomas` (`id_idioma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_monedas1` FOREIGN KEY (`id_moneda`) REFERENCES `monedas` (`id_moneda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_politicas_cancelacion1` FOREIGN KEY (`id_politica_cancelacion`) REFERENCES `politicas_cancelacion` (`id_politica_cancelacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `apartamentos_adjuntos`
--
ALTER TABLE `apartamentos_adjuntos`
  ADD CONSTRAINT `fk_apartamentos_has_adjuntos_adjuntos1` FOREIGN KEY (`id_adjunto`) REFERENCES `adjuntos` (`id_adjunto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_has_adjuntos_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `apartamentos_alojamientos`
--
ALTER TABLE `apartamentos_alojamientos`
  ADD CONSTRAINT `fk_apartamentos_has_alojamientos_alojamientos1` FOREIGN KEY (`id_alojamiento`) REFERENCES `alojamientos` (`id_alojamiento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_has_alojamientos_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `apartamentos_articulos`
--
ALTER TABLE `apartamentos_articulos`
  ADD CONSTRAINT `fk_apartamentos_has_articulos_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_has_articulos_articulos1` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id_articulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `apartamentos_descripcion`
--
ALTER TABLE `apartamentos_descripcion`
  ADD CONSTRAINT `fk_apartamentos_descripcion_idiomas1` FOREIGN KEY (`id_idioma`) REFERENCES `idiomas` (`id_idioma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `apartamentos_documentos`
--
ALTER TABLE `apartamentos_documentos`
  ADD CONSTRAINT `fk_apartamentos_documentos_adjuntos1` FOREIGN KEY (`id_adjunto`) REFERENCES `adjuntos` (`id_adjunto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_documentos_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `fk_articulos_articulos_tipos1` FOREIGN KEY (`id_articulo_tipo`) REFERENCES `articulos_tipos` (`id_articulo_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articulos_idiomas1` FOREIGN KEY (`id_idioma`) REFERENCES `idiomas` (`id_idioma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `articulos_adjuntos`
--
ALTER TABLE `articulos_adjuntos`
  ADD CONSTRAINT `fk_articulos_has_adjuntos_adjuntos1` FOREIGN KEY (`id_adjunto`) REFERENCES `adjuntos` (`id_adjunto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articulos_has_adjuntos_articulos1` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id_articulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `fk_ciudades_provincias1` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `complejos_apartamentos`
--
ALTER TABLE `complejos_apartamentos`
  ADD CONSTRAINT `fk_complejos_has_apartamentos_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_complejos_has_apartamentos_complejos1` FOREIGN KEY (`id_complejo`) REFERENCES `complejos` (`id_complejo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `condiciones_compra`
--
ALTER TABLE `condiciones_compra`
  ADD CONSTRAINT `fk_condiciones_compra_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `fk_cuentas_monedas1` FOREIGN KEY (`id_moneda`) REFERENCES `monedas` (`id_moneda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `fk_direcciones_paises` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_direcciones_provincias1` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `disponibilidades`
--
ALTER TABLE `disponibilidades`
  ADD CONSTRAINT `fk_disponbilidades_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `fk_empresa_direcciones1` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresas_contratos`
--
ALTER TABLE `empresas_contratos`
  ADD CONSTRAINT `fk_empresas_has_contratos_contratos1` FOREIGN KEY (`id_contrato`) REFERENCES `contratos` (`id_contrato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empresas_has_contratos_empresas1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresas_cuentas`
--
ALTER TABLE `empresas_cuentas`
  ADD CONSTRAINT `fk_empresas_has_cuentas_cuentas1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentas` (`id_cuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empresas_has_cuentas_empresas1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `huespedes`
--
ALTER TABLE `huespedes`
  ADD CONSTRAINT `fk_huespedes_direcciones1` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_huesped_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `huespedes_cuentas`
--
ALTER TABLE `huespedes_cuentas`
  ADD CONSTRAINT `fk_huespedes_has_cuentas_cuentas1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentas` (`id_cuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_huespedes_has_cuentas_huespedes1` FOREIGN KEY (`id_huesped`) REFERENCES `huespedes` (`id_huesped`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD CONSTRAINT `fk_instalaciones_instalaciones_categoria1` FOREIGN KEY (`id_instalacion_categoria`) REFERENCES `instalaciones_categoria` (`id_instalacion_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  ADD CONSTRAINT `fk_mantenimientos_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mantenimientos_materiales`
--
ALTER TABLE `mantenimientos_materiales`
  ADD CONSTRAINT `fk_mantenimientos_materiales_mantenimientos1` FOREIGN KEY (`id_mantenimiento`) REFERENCES `mantenimientos` (`id_mantenimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mantenimientos_personal`
--
ALTER TABLE `mantenimientos_personal`
  ADD CONSTRAINT `fk_mantenimientos_personal_mantenimientos1` FOREIGN KEY (`id_mantenimiento`) REFERENCES `mantenimientos` (`id_mantenimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD CONSTRAINT `fk_opiniones_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_opiniones_reservaciones1` FOREIGN KEY (`id_reservacion`) REFERENCES `reservaciones` (`id_reservacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  ADD CONSTRAINT `fk_reservaciones_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservaciones_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reservaciones_pagos`
--
ALTER TABLE `reservaciones_pagos`
  ADD CONSTRAINT `fk_reservaciones_pagos_reservaciones1` FOREIGN KEY (`id_reservacion`) REFERENCES `reservaciones` (`id_reservacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_usuarios_grupos1` FOREIGN KEY (`id_usuario_grupo`) REFERENCES `usuarios_grupos` (`id_usuario_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios_registros`
--
ALTER TABLE `usuarios_registros`
  ADD CONSTRAINT `fk_usuarios_registros_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
