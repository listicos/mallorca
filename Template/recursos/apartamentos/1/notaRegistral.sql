-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-07-2013 a las 22:33:15
-- Versión del servidor: 5.1.69
-- Versión de PHP: 5.3.3

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `clickandbooking`
--

--
-- Volcado de datos para la tabla `adjuntos`
--

INSERT INTO `adjuntos` (`id_adjunto`, `nombre`, `ruta`, `tipo`, `ext`) VALUES
(1, 'Primera foto', '/recursos/apartamentos/1.jpg', 'apartamento', 'jpg'),
(2, 'Alguna cosa', '/recursos/apartamentos/2.jpg', 'apartamento', 'jpg'),
(11, '3.jpg', '/recursos/apartamentos/d588de29025227578b5c0988360d187b.jpg', 'apartamento', 'jpg');

--
-- Volcado de datos para la tabla `alojamientos`
--

INSERT INTO `alojamientos` (`id_alojamiento`, `nombre`, `codigo`, `pax_minimo`, `pax_maximo`, `pax_bebe_maximo`, `pax_ninios_minimo`, `pax_ninios_maximo`, `pax_adultos_maximo`, `pax_adultos_minimo`) VALUES
(1, 'Habitación privada', 'est', 2, 10, '1', '0', '2', '10', '1'),
(2, 'Habitación compartida', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Casa/apto. entero', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Volcado de datos para la tabla `apartamentos`
--

INSERT INTO `apartamentos` (`id_apartamento`, `id_empresa_contrato`, `nombre`, `id_apartamentos_tipo`, `id_direccion`, `id_moneda`, `horario_entrada`, `horario_salida`, `descripcion_corta`, `descripcion_larga`, `id_idioma`, `descripcion_servicios`, `descripcion_condiciones`, `tiempo_creacion`, `ultima_modificacion`, `estatus`, `id_usuario`, `tarifa_base`, `tarifa_semana`, `tarifa_mes`, `estadia_maxima`, `estadia_minima`, `huesped_adicional_apartir`, `huesped_adicional_costo`, `costo_limpieza`, `deposito_seguridad`, `precio_fin_semana`, `normas`, `tamanio`, `capacidad_personas`, `habitaciones`, `camas`, `tipo_cama`, `banio`, `mascotas`, `manual`) VALUES
(1, 4, 'LES ONES CB063', 1, 1, 2, '00:00:00', '00:00:00', 'Esta es una descripción corta', '        Apartamento de 2 habitaciones con capacidad para 4/6 personas y vistas frontales al mar desde la terraza. Se compone de salón comedor con sofá cama y salida a la terraza equipada con mobiliario de jardín , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 2 cuartos de baño uno de ellos con bañera de hidromasaje y cocina independiente totalmente equipada.El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias de la vivienda. Plaza de aparcamiento para coche grande.\r\nNO SE ADMITEN GRUPOS DE JOVENES. Es exclusivo para familias debido a la tranquilidad del complejo y de los vecinos.\r\n\r\nLos Apartamentos Les Ones están en Salou, a solo 150 metros de la playa Capellans. Cuentan con vistas al mar e incluyen aire acondicionado, balcón privado y un jardín con una piscina compartida al aire libre rodeada de tumbonas.\r\nLos apartamentos Les Ones disponen de un salón con sofá cama y TV de pantalla plana, un baño con bañera de hidromasaje y una zona de cocina con fogones, microondas, horno, lavavajillas y lavadora.\r\nLos Apartamentos Les Ones disponen de aparcamiento privado gratuito y una recepción con servicio de información turística.\r\nSe encuentran a solo 8 minutos en coche de PortAventura, a 15 minutos en coche de Tarragona y a 2 km de la estación de tren de Salou, que comunica con el centro de Barcelona en aproximadamente 75 minutos.   ', 1, 'Descripción de servicios', 'Descripción de condiciones', '2013-06-13 04:38:26', '2013-07-23 15:33:44', 'activo', 1, 30, 1300, 5000, 30, 2, 4, 20, 10, 10, 25, ' LES ONES CB063 ', 125, 5, 2, 3, 'Cama', 2, 0, '  Las llaves están abajo de la maceta '),
(2, 4, 'ACANTILADOS CB013', 1, 4, 1, '15:00:00', '12:00:00', '', '     Exclusivo ático en primera línea de playa en Salou con capacidad para 6 personas distribuidas en 4 habitaciones.Amplio salón comedor con espectaculares vistas al mar y decoración de diseño, cocina independiente con barra americana totalmente equipada con todas las facilidades y sistema de OSMOSYS decalificador de agua. 2 habitaciones con camas de matrimonio y colchones de latex , 2 habitaciones con cama individual , baño con ducha de hidromasaje y aseo.POSIBILIDAD DE PLAZA DE PARKING LOS MESES DE JULIO Y AGOSTO. \r\nEl edificio, de 8 Plantas, a pie de la playa larga de Salou, cerca de restaurantes, comercios y la famosa fuente luminosa. Se encuentra a tan solo 1,7Km del parque Port Aventura y costa caribe, a 10 min a pie del centro de Salou y 5 min de la zona de animación 20 Km aeropuerto     ', 1, '', '', '2013-06-13 16:23:11', '2013-07-23 15:33:58', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' ACANTILADOS CB013 ', 0, 2, 2, 2, 'Cama', 1, 0, '    Las llaves están abajo de la maceta  '),
(3, 4, ' BARCINO CB021', 1, 5, 1, '15:00:00', '12:00:00', '', '    Apartamento de 3 habitaciones con capacidad para 6 personas en 1ª linea de playa.Salón comedor con pantalla plana , sofá cama y salida a la terraza cerrada con puertas correderas , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 1 habitación con 1 cama individual , cocina independiente equipada y baño completo. El apartamento dispone de aire acondicionado y calefacción por conductos excepto en la habitación individual.\r\nEstos apartamentos cómodos y elegantes se encuentran a sólo 10 metros de la playa de Llevant y están orientados al mar. Disponen de aire acondicionado y de una terraza amueblada con vistas al mar.\r\nLos Apartamentos Barcino, de 3 dormitorios, presentan una decoración funcional y suelo de madera. En el salón comedor hay un sofá, un sofá cama y una TV de plasma. La cocina está equipada con lavadora, microondas, horno y fogones.\r\nA menos de 300 metros encontrará numerosos bares, restaurantes y tiendas. El centro está a 5 minutos a pie.\r\nLos Apartamentos Barcino están a menos de 10 minutos en coche del parque temático PortAventura, que incluye un parque acuático y un campo de golf. La ciudad histórica de Tarragona está a 10 km y el aeropuerto de Reus, a 20 minutos en coche.    ', 1, '', '', '2013-06-13 18:44:59', '2013-07-11 16:25:42', '', 1, 30, 0, 0, 7, 1, 0, 0, 0, 0, 0, '  BARCINO CB021 ', 100, 4, 2, 4, 'Cama', 1.5, 0, '   Las llaves están abajo de la maceta '),
(4, 4, ' ALEXANDRIA CB085', 1, 6, 1, '15:00:00', '12:00:00', '', '             Apartamento de 3 habitaciones con capacidad para 6 personas en pleno centro de Salou. El apartamento se compone de salón comedor con Tv de pantalla plana , sofá tipo cheslongue y salida a la terraza equipada con mesa y sillas de jardín. 1 habitación con cama de matrimonio , 2 habitaciones con 2 camas individuales. Cocina abierta equipada y baño con ducha. ', 1, '', '', '2013-06-13 19:01:30', '2013-07-11 16:26:27', '', 1, 40, 1000, 3500, 7, 1, 0, 0, 0, 0, 0, '  ALEXANDRIA CB085 ', 132, 4, 2, 4, 'Cama', 8, 1, '       Las llaves están abajo de la maceta'),
(5, 4, 'ALTAIR CB022 ', 1, 7, 1, '15:00:00', '12:00:00', '', '     Apartamento 1ª línea de playa con capacidad para 4/6 personas. Se compone de un amplio salón comedor con aire acondicionado y bomba de calor con acceso a la zona de terraza cerrada y con vistas frontales al mar 1 habitación con cama de matrimonio ,1 habitación con litera 1x2 , cocina equipada y baño completo.\r\nLos Apartamentos Altair se encuentran a tan solo 10 metros de la playa de Levante. Ofrecen un alojamiento amplio y luminoso con una terraza cerrada y vistas panorámicas al mar.\r\nLos apartamentos presentan una decoración luminosa y funcional. El salón, de planta abierta, cuenta con un sofá y TV , la cocina dispone de cafetera, lavadora, microondas, horno y fogones.\r\nA menos de 300 metros encontrará muchos bares, restaurantes y tiendas. El centro está a 5 minutos a pie.\r\nLos apartamentos del Altair están a menos de 10 minutos en coche del parque temático, el parque acuático y el complejo de golf de PortAventura. La histórica ciudad de Tarragona está a 10 km y el aeropuerto de Reus, a 20 minutos en coche. ', 1, '', '', '2013-06-14 10:05:59', '2013-07-11 16:27:11', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' ALTAIR CB022  ', 100, 4, 2, 4, 'Cama', 1.5, 0, '   Las llaves están abajo de la maceta'),
(6, 4, 'ARQUBACH CB027', 1, 11, 1, '15:00:00', '12:00:00', '', '   Impresionante piso de diseño con 4 habitaciones y 4 baños con capacidad para 8 personas en Salou. Amplio salón comedor equipado con televisor de gran tamaño de pantalla plana , DIGITAL + y con salida a terraza.Cocina tipo isla moderna y equipada con televisor de pantalla plana y todos los electrodomésticos necesarios. Cuenta con un total de 4 habitaciones dobles y 4 baños, 3 habitaciones tipo suite, 2 con cama de matrimonio , 2 con 2 camas de 90 cm. La habitación principal cuenta con televisor de pantalla plana y vestidor. \r\nEl residencial cuenta con piscina comunitaria rodeada de césped. A 700 m del centro de Salou, cerca de comercios, restaurantes y servicios. A 10 min a pie de la playa y a 3.5 Km de Port Aventura.\r\nLos Apartamentos ArqUbach están situados en Salou, a solo 3.5 km del parque temático PortAventura. El establecimiento cuenta con piscina de temporada al aire libre y apartamentos con terraza privada.\r\nLos apartamentos ArqUbach presentan una decoración moderna con suelos de parqué. Todos están equipados con lavavajillas, lavadora cocina con vitroceramica, horno, microondas , cafetera y tostadora.\r\nLos Apartamentos Arqubach se encuentran a solo 5 minutos en coche del centro de Salou, a 15 minutos en coche del aeropuerto de Reus y a 20 minutos del centro de Tarragona. Además, están bien comunicados con las autopistas A-7 y AP-7.\r\nEl residencial cuenta con piscina comunitaria rodeada de césped. A 700 m del centro de Salou, cerca de comercios, restaurantes y servicios. A 10 min a pie de la playa y a 5 Km de Port Aventura. ', 1, '', '', '2013-06-19 19:56:58', '2013-07-11 16:28:14', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' ARQUBACH CB027 ', 100, 4, 2, 4, '', 1.5, 0, '  Las llaves están abajo de la maceta'),
(7, 4, 'COSTA D’OR II CB036', 1, 12, 1, '15:00:00', '12:00:00', '', '  Apartamento de 1 habitación con capacidad para 2/4 personas en primera linea de playa. Se compone de salón comedor con sofá cama , split de aire frío/caliente y salida a la terraza equipada con mobiliario de jardín. 1 habitación con 2 camas individuales , cocina americana totalmente equipada y baño completo.\r\nEstos apartamentos sencillos y agradables están entre Salou y Cambrils, en una zona residencial tranquila situada a 25 metros de la playa. Disponen de un balcón amueblado con toldo y ofrecen vistas al mar.\r\nLos Apartamentos Costa D’Or, II tienen una decoración práctica de estilo playero y cuentan con aire acondicionado. Incluyen un salón comedor luminoso con TV y sofá cama, y una zona de cocina con lavadora, horno, fogones y cafetera.\r\nLos apartamentos se encuentran a 15 minutos a pie del puerto de Salou y a 3 km del centro de Salou y de Cambrils. A 5 minutos a pie hay varios restaurantes y bares.\r\nLos apartamentos del Costa D’Or, II están a solo 6 km del parque temático PortAventura, a 3,5 km del campo de golf Cambrils Par 3 y a 13 km de la ciudad histórica de Tarragona. El aeropuerto de Reus está a 25 minutos en coche.\r\nLOS MESES DE JULIO Y AGOSTO LA ESTANCIA MÍNIMA ES DE 7 NOCHES DE SÁBADO A SÁBADO.  ', 1, '', '', '2013-07-03 07:54:31', '2013-07-11 16:29:04', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' COSTA D’OR II CB036 ', 100, 4, 2, 4, '', 1.5, 1, ' Este es el manul '),
(8, 4, 'LAS DUNAS', 1, 13, 1, '15:00:00', '12:00:00', '', '  Apartamento de 3 habitaciones con capacidad para 6/8 personas en zona residencial de Cambrils. Se compone de salón comedor con sofá cama , TV pantalla plana vía satélite y salida a la terraza equipada con mobiliario de jardín. 1 habitación con cama de matrimonio , 2 habitación con 2 camas individuales cocina totalmente equipada y 2 cuartos de baño. El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias.\r\nEstos apartamentos están situados en la Costa Dorada, a 200 metros de la playa y a 10 minutos a pie del puerto deportivo. Presentan una decoración moderna y ofrecen acceso a una piscina compartida al aire libre y a una amplia zona ajardinada. \r\nLos Apartamentos Las Dunas cuentan con 2 o 3 dormitorios, conexión Wi-Fi gratuita y terraza privada. Además, incluyen una cocina totalmente equipada y una zona de estar con un cómodo sofá cama y TV de pantalla plana. \r\nEl centro de Cambrils se halla a 5 minutos en coche, mientras que Salou y Port Aventura están a 15 minutos, también en coche. La ciudad histórica de Tarragona queda a 25 km. \r\nSe proporciona aparcamiento privado gratuito.  ', 1, '', '', '2013-07-03 08:16:21', '2013-07-11 16:30:03', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' LAS DUNAS ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(9, 4, 'LAS DUNAS', 1, 14, 1, '15:00:00', '12:00:00', '', '  Apartamento de 2 habitaciones con capacidad para 4/6 personas en zona residencial de Cambrils. Se compone de salón comedor con sofá cama , TV pantalla plana vía satélite y salida a la terraza equipada con mobiliario de jardín. 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales cocina totalmente equipada y 2 cuartos de baño. El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias.\r\nEstos apartamentos están situados en la Costa Dorada, a 200 metros de la playa y a 10 minutos a pie del puerto deportivo. Presentan una decoración moderna y ofrecen acceso a una piscina compartida al aire libre y a una amplia zona ajardinada. \r\nLos Apartamentos Las Dunas cuentan con 2 o 3 dormitorios, conexión Wi-Fi gratuita y terraza privada. Además, incluyen una cocina totalmente equipada y una zona de estar con un cómodo sofá cama y TV de pantalla plana. \r\nEl centro de Cambrils se halla a 5 minutos en coche, mientras que Salou y Port Aventura están a 15 minutos, también en coche. La ciudad histórica de Tarragona queda a 25 km. \r\nSe proporciona aparcamiento privado gratuito.  ', 1, '', '', '2013-07-03 08:19:31', '2013-07-11 16:31:06', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' LAS DUNAS ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(10, 4, 'ARQUUS CB030', 1, 15, 1, '15:00:00', '12:00:00', '', '  Apartamento con capacidad para 2/4 personas en la 7ª planta del edificio ARQUUS I en pleno centro de Salou. Salón comedor con sofá cama y salida a la terraza , 1 habitación con cama de matrimonio , cocina americana y baño completo. A 400m de la playa , 50 m de la zona de ocio , 2,4 de Port Aventura y 11km de Tarragona.\r\nLos apartamentos ARQUUS están a 400 metros de la playa de Llevant y del paseo marítimo. Ofrecen piscina al aire libre de temporada, jardines , sala con sillones para la lectura y balcón privado amueblado con vistas a la ciudad y a la montaña. ( la temporada de la piscina es desde el 15.06 hasta el 15.09 )\r\nLos Apartamentos presentan una bonita decoración con muebles tradicionales. El salón/comedor de planta abierta cuenta con sofá cama nido y TV. La zona de cocina incluye lavadora, fogones, microondas , cafetera y tostadora.\r\nLos apartamentos están distribuidos en 2 edificios en la principal calle comercial y de ocio nocturno de la localidad , donde encontrará varios bares, restaurantes y tiendas. El puerto deportivo de Salou está a 15 minutos a pie.\r\nLa estación de tren de Salou se encuentra a 2 km y el aeropuerto de Reus, a 15 km. Tarragona está a 15 minutos en coche  ', 1, '', '', '2013-07-03 08:22:06', '2013-07-11 16:32:01', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' ARQUUS CB030 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(11, 4, 'ARQUUS CB058', 1, 16, 1, '15:00:00', '12:00:00', '', '  Apartamento esquinero de 2 habitaciones con capacidad para 4/6 personas.Se compone de salón comedor con televisor de pantalla plana y salida a la terraza equipada con mesa y sillas , 1 habitación con cama de matrimonio , 1 habitación con litera , baño completo y cocina totalmente equipada.\r\nEstos luminosos apartamentos están a 400 metros de la playa de Llevant y del paseo marítimo. Ofrecen piscina al aire libre compartida, jardines y balcón privado amueblado con vistas a la ciudad y a la montaña.\r\n\r\nLos Apartamentos ARQUUS cuentan con decoración en tonos pastel y muebles tradicionales. El salón-comedor, de planta abierta, dispone de sofá cama y TV y la zona de cocina incluye lavadora, microondas, fogones y tostadora.\r\n\r\nLos apartamentos se encuentran en 4 edificios de la famosa calle Carles Buiges, donde encontrará varios bares, restaurantes y tiendas. El puerto deportivo de Salou está a 15 minutos a pie.\r\n\r\nLos Apartamentos ARQQUS tienen zona de lectura y están a 2 km de Cap de Salou y sus preciosas calas y a 10 minutos en coche del parque temático PortAventura  ', 1, '', '', '2013-07-03 08:25:17', '2013-07-11 16:33:00', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' ARQUUS CB058 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(12, 4, 'ARQUUS CB081', 1, 17, 1, '15:00:00', '12:00:00', '', '  Amplio apartamento de 1 habitación mas 1 camarote con capacidad para 4/6 personas en pleno centro turístico de Salou. Se compone de salón comedor con salida a la terraza con vistas a la ciudad , 1 habitación con 2 camas individuales , 1 camarote con litera 1x2 abatible , cocina americana equipada y baño completo.\r\n\r\nEstos apartamentos luminosos se encuentran a 400 metros de la playa de Llevant y del paseo marítimo. Cuentan con jardines con piscina al aire libre compartida y balcón privado amueblado con vistas a las montañas y a la ciudad.\r\nLos Apartamentos Arquus Center presentan una bonita decoración y disponen de muebles tradicionales, salón comedor de planta abierta con sofá cama y TV y zona de cocina con lavadora, microondas, fogones y tostadora.\r\nLos apartamentos están distribuidos en 4 edificios en la famosa calle Carles Buiges, donde los huéspedes encontrarán bares, restaurantes y tiendas. El puerto deportivo de Salou está a 15 minutos a pie.\r\nLos apartamentos Arquus cuentan con zona de lectura y se encuentran a 2 km del cabo de Salou y de sus preciosas calas. El parque temático PortAventura está a 10 minutos en coche.\r\nLa estación de trenes de Salou se encuentra a 2 km, mientras que el aeropuerto de Reus está a 15 km. Tarragona se encuentra a 15 minutos en coche.\r\nEl complejo dispone de piscina comunitaria de temporada abierta desde el 15.06 al 15.09  ', 1, '', '', '2013-07-03 08:27:34', '2013-07-11 16:34:05', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' ARQUUS CB081 ', 100, 4, 2, 4, '', 1.5, 1, ' Las llaves están abajo de la maceta '),
(13, 4, 'ATALAYA MAR CB068', 1, 18, 1, '15:00:00', '12:00:00', '', '  Estudio en planta baja con capacidad para 2/4 personas situado en el centro turístico de Salou. Se compone de salón comedor con salida a la terraza equipada con mobiliario de jardín y toldo. 1 habitación tipo camarote con cama de matrimonio , baño completo con plato de ducha y cocina americana.\r\nEl complejo ATALAYA MAR situado a escasos metros de 2 bonitas playas y muy cerca de la principal zona de tiendas , souvenirs y locales de ocio nocturno. El complejo dispone de piscina al aire libre rodeada de una zona para extender las toallas , zona de juegos infantiles y acceso directo a la playa a escasos metros desde el complejo.  ', 1, '', '', '2013-07-03 08:30:42', '2013-07-11 16:34:52', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' ATALAYA MAR CB068 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(14, 4, 'ATENEA III CB059', 1, 19, 1, '15:00:00', '12:00:00', '', '  Apartamento de 2 habitaciones con capacidad para 4/6 personas en zona residencial y familiar de Salou. Se compone de salón comedor con sofá cama , split de aire acondicionado y salida a la amplia terraza con vistas a la ciudad. 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , cocina americana cerrada con puertas correderas y baño completo.\r\nEl complejo dispone de piscina al aire libre rodeada de un gran jardín con zonas de sol y sobra y alumbrado nocturno.  ', 1, '', '', '2013-07-03 08:46:01', '2013-07-11 16:49:02', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' ATENEA III CB059 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(15, 4, 'BARCINO CB021', 1, 20, 1, '15:00:00', '12:00:00', '', '  Apartamento de 3 habitaciones con capacidad para 6 personas en 1ª linea de playa.Salón comedor con pantalla plana , sofá cama y salida a la terraza cerrada con puertas correderas , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 1 habitación con 1 cama individual , cocina independiente equipada y baño completo. El apartamento dispone de aire acondicionado y calefacción por conductos excepto en la habitación individual.\r\nEstos apartamentos cómodos y elegantes se encuentran a sólo 10 metros de la playa de Llevant y están orientados al mar. Disponen de aire acondicionado y de una terraza amueblada con vistas al mar.\r\nLos Apartamentos Barcino, de 3 dormitorios, presentan una decoración funcional y suelo de madera. En el salón comedor hay un sofá, un sofá cama y una TV de plasma. La cocina está equipada con lavadora, microondas, horno y fogones.\r\nA menos de 300 metros encontrará numerosos bares, restaurantes y tiendas. El centro está a 5 minutos a pie.\r\nLos Apartamentos Barcino están a menos de 10 minutos en coche del parque temático PortAventura, que incluye un parque acuático y un campo de golf. La ciudad histórica de Tarragona está a 10 km y el aeropuerto de Reus, a 20 minutos en coche.  ', 1, '', '', '2013-07-03 08:49:46', '2013-07-11 16:51:44', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' BARCINO CB021 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(16, 4, 'BELLO HORIZONTE CB054', 1, 21, 1, '15:00:00', '12:00:00', '', '  Apartamento de 3 habitaciones con capacidad para 6 personas en 1ª linea de playa. Se compone de Salón comedor con split de aire acondicionado/bomba de calor , sofá , Tv de pantalla plana y salida a la terraza con vistas frontales al mar. 1 habitación con cama de matrimonio , 2 habitaciones con 2 camas individuales , cocina independiente equipada , baño completo y aseo.\r\n\r\nEstos bonitos apartamentos están situados frente a la playa, a 5 minutos a pie del centro de Salou. Disponen de acceso directo a la playa de Llevant, aire acondicionado y una terraza amueblada con vistas al mar.\r\nLos Apartamentos Bello Horizonte presentan una decoración agradable y cuentan con 3 dormitorios y una sala de estar con una TV de plasma y un sofá. También incluyen una cocina sencilla equipada con horno, lavadora, lavavajillas y microondas.\r\nLos apartamentos se encuentran en una zona tranquila, pero están muy cerca a pie de varios bares, restaurantes y tiendas. Además, están a 15 minutos a pie del puerto de Salou.\r\nEl establecimiento Bello Horizonte ofrece toallas, ropa de cama, conexión a internet y aparcamiento por un suplemento. Además, está situado a 4 km de PortAventura y a 25 minutos en coche del aeropuerto de Reus.  ', 1, '', '', '2013-07-03 08:53:58', '2013-07-11 16:52:56', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' BELLO HORIZONTE CB054 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(17, 4, 'BLUE MOON CB026 ', 1, 22, 1, '15:00:00', '12:00:00', '', '  Apartamento duplex de 4 habitaciones dobles y 105 m2 distribuidos en 2 plantas, en la planta baja, con mobiliario moderno y de buen gusto salón-comedor con sofá cheslongue de piel , mesa de comedor , TV de pantalla plana, conexión a internet por wifi y salida a la amplia terraza equipada con mobiliario y toldos. Aire acondicionado y bomba de calor por conductos en todas las estancias del apartamento. 1 habitación con 2 camas (90 cm), . Cocina (horno, vitrocerámica, microondas, congelador,lavadora). Ducha/WC. Planta superior: 2 dorm., cada habitación con 1 cama de matrimonio. 1 dorm. con 2 x 1 literas. Baño/WC, doble lavabo.\r\nLos Apartamentos Blue Moon están situados a solo 500 metros de la playa de Salou y ofrecen una piscina al aire libre, un parque infantil y aparcamiento privado gratuito. Todos los apartamentos son dúplex, tienen 4 dormitorios y cuentan con terraza amueblada y conexión Wi-Fi gratuita.\r\nTodos los apartamentos del Blue Moon son elegantes y funcionales y disponen de 2 baños, salón-comedor con TV de pantalla plana, aire acondicionado y una moderna zona de cocina con vitrocerámica, lavavajillas y lavadora.\r\nLos Apartamentos Blue Moon están situados en una zona residencial de Salou, a solo 5 minutos a pie de las tiendas, restaurantes y discotecas del centro.\r\nLa estación de tren de Salou se encuentra a 500 metros de los apartamentos, mientras que el parque temático PortAventura está a 10 minutos en coche y el aeropuerto de Reus, a 15 minutos de distancia.  ', 1, '', '', '2013-07-03 08:57:29', '2013-07-11 16:54:05', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' BLUE MOON CB026  ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(18, 4, 'CAP SALOU CB003', 1, 23, 1, '15:00:00', '12:00:00', '', '  Apartamento de 2 habitaciones con capacidad para 4/6 personas en la tranquila y familiar zona del Cabo Salou con unas impresionantes vistas al mar. Se compone de salón comedor con sofá cama , tv de pantalla plana y salida a la terraza. 1 habitación con cama de matrimonio , 1 habitación con litera , cocina americana totalmente equipada y baño completo. ESTE APARTAMENTO ESTÁ DESTINADO UNICAMENTE A FAMILIAS CON NIÑOS.\r\n\r\nEl establecimiento Apartamentos Cap Salou se encuentra a sólo 100 metros de la playa de Cala Font y a 6 km del centro de Salou. Dispone de apartamentos familiares con aire acondicionado y terraza privada con vistas al mar.\r\nLos apartamentos Cap Salou cuentan con 1 dormitorio doble, 1 dormitorio con literas, salón comedor con sofá cama y TV de pantalla plana y zona de cocina con fogones, horno, microondas, lavadora y lavavajillas.\r\nLos apartamentos están a sólo 15 minutos en coche del parque temático PortAventura y a 20 minutos también en coche de la preciosa ciudad de Tarragona y de sus ruinas romanas. El centro de Barcelona se encuentra a 1 hora y 15 minutos en coche.  ', 1, '', '', '2013-07-03 09:05:46', '2013-07-11 16:55:36', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' CAP SALOU CB003 ', 100, 4, 2, 4, '', 1.5, 1, ' Las llaves están abajo de la maceta '),
(19, 4, 'CALA DORADA CB074', 1, 24, 1, '15:00:00', '12:00:00', '', '  Apartamento exterior de 3 habitaciones con capacidad para 6 personas y con vistas al mar desde todas las estancias. Se compone de salón comedor con TV de pantalla plana , split de aire acondicionado/ bomba de calor y salida a la terraza equipada con mesa , sillas y 2 tumbonas. 3 habitaciones con cama de matrimonio , 2 baños completos y cocina independiente equipada. Todo el apartamento tiene suelos de parquet y presenta una decoración funcional.\r\nEl establecimiento Apartamentos Cala Dorada ofrece un ambiente familiar y se encuentra en Salou, a 100 metros de la playa Larga. Ofrece una piscina al aire libre de temporada, un parque infantil y apartamentos con aire acondicionado y terraza privada amueblada con vistas al mar.\r\nEstos apartamentos tienen suelo de parqué, 2 baños, lavadora y una sala de estar con sofá, TV de pantalla plana y reproductor de CD. La cocina cuenta con nevera, microondas y cafetera.\r\nPor un suplemento diario, se ofrece conexión a internet mediante USB. Los apartamentos se encuentran a 3 km de PortAventura y a 300 metros de algunas tiendas, bares, restaurantes y discotecas.\r\nESTE APARTAMENTO ES EXCLUSIVO PARA FAMILIAS.\r\nPISCINA DE TEMPORADA 15.06 AL 15.09\r\nEN JULIO Y AGOSTO LA ESTANCIA MÍNIMA ES DE 7 NOCHES DE SÁBADO A SÁBADO.  ', 1, '', '', '2013-07-03 09:15:51', '2013-07-11 16:57:00', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' CALA DORADA CB074 ', 100, 4, 2, 4, '', 1.5, 0, ' Las llaves están abajo de la maceta '),
(20, 4, 'TARRACO MAR CB049', 1, 25, 1, '15:00:00', '12:00:00', '', ' Casa unifamiliar de 3 plantas y piscina privada situada en la zona residencial de La Punta de La Mora ( Tarragona ) de 4 habitaciones dobles y 3 baños con capacidad para 8/10 personas. En la planta -1 nos encontramos con la plaza de garaje cerrado con capacidad para 3 coches , en la planta 0 nos encontramos con el amplio salón comedor de 47m2 con acceso a la terraza ,cocina equipada , 1 habitación con cama de matrimonio y 1 baño completo con plato de ducha , en la planta +1 nos encontramos con 2 habitaciones con 2 camas individuales cada una , 1 baño completo con plato de ducha y la habitación principal tipo suite con baño completo y bañera , terraza de 20m2. En la zona de piscina hay hamacas y mesa con sillas y sombrilla. A 600m de una fantastica playa de arena fina y multitud de actividades. A 5 Km del centro de la ciudad de Tarragona , declarada Patrimonio Mundial por la UNESCO , donde hay infinidad de lugares de interés como anfiteatro romano , tren turistico , centros comerciales etc etc.   ', 1, '', '', '2013-07-03 10:10:44', '2013-07-11 16:58:38', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, ' TARRACO MAR CB049 ', 100, 4, 2, 4, '', 1.5, 0, 'Las llaves están abajo de la maceta');

--
-- Volcado de datos para la tabla `apartamentos_adjuntos`
--

INSERT INTO `apartamentos_adjuntos` (`id_apartamento`, `id_adjunto`, `id_apartamento_adjunto`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 11, 11);

--
-- Volcado de datos para la tabla `apartamentos_alojamientos`
--

INSERT INTO `apartamentos_alojamientos` (`id_apartamento`, `id_alojamiento`, `id_apartamento_alojamiento`) VALUES
(2, 1, 72),
(3, 1, 73),
(4, 1, 74),
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
(1, 1, 95);

--
-- Volcado de datos para la tabla `apartamentos_articulos`
--

INSERT INTO `apartamentos_articulos` (`id_apartamento`, `id_articulo`, `id_apartamento_articulo`) VALUES
(1, 1, 2);

--
-- Volcado de datos para la tabla `apartamentos_instalaciones`
--

INSERT INTO `apartamentos_instalaciones` (`id_apartamento`, `id_instalacion`, `id_apartamento_instalacion`) VALUES
(1, 174, 1),
(1, 183, 2),
(1, 192, 3),
(1, 200, 4),
(1, 218, 5),
(1, 221, 6),
(1, 224, 7);

--
-- Volcado de datos para la tabla `apartamentos_lugares_cercanos`
--

INSERT INTO `apartamentos_lugares_cercanos` (`id_apartamento`, `id_lugar_cercano`, `id_apartamento_lugar_cercano`, `valor`) VALUES
(1, 1, 1, '12');

--
-- Volcado de datos para la tabla `apartamentos_pagos_tipos`
--

INSERT INTO `apartamentos_pagos_tipos` (`id_apartamento`, `id_pago_tipo`, `id_apartamento_pago_tipo`) VALUES
(2, 1, 65),
(3, 1, 66),
(4, 1, 67),
(4, 5, 68),
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
(1, 1, 91),
(1, 2, 92);

--
-- Volcado de datos para la tabla `apartamentos_tipos`
--

INSERT INTO `apartamentos_tipos` (`id_apartamentos_tipo`, `nombre`) VALUES
(1, 'Estudio'),
(2, 'Adosado'),
(3, 'Chalet individual'),
(4, 'Apartamento');

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `nombre`, `codigo`, `id_articulo_tipo`, `precio_base`, `por_persona`, `configurar_por`, `pax_minimo`, `pax_maximo`, `regular_stock`, `solo_adultos`, `solo_ninios`, `consumo_obligatorio`, `establecer_horarios`, `descripcion`, `id_idioma`) VALUES
(1, 'Silla para bebé', NULL, 1, 300, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

--
-- Volcado de datos para la tabla `articulos_tipos`
--

INSERT INTO `articulos_tipos` (`id_articulo_tipo`, `nombre`) VALUES
(1, 'Objetos');

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id_ciudad`, `nombre`, `id_provincia`, `codigo`) VALUES
(1, 'Cambrils', 1, 'cmb'),
(2, 'La pineda', 1, 'lap'),
(3, 'Salou', 1, NULL),
(4, 'Tarragona', 1, NULL);

--
-- Volcado de datos para la tabla `condiciones_compra`
--

INSERT INTO `condiciones_compra` (`id_condicion_compra`, `id_apartamento`, `nombre`, `descripcion`) VALUES
(1, 1, 'Esta es una condición de compra', 'Esta es la descripción de una condición de co');

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`id_contrato`, `nombre`, `tiempo_creacion`, `ultima_modificacion`, `precio`, `porcentaje`, `descripcion`) VALUES
(1, 'Comisionable', '2013-07-04 03:00:00', '2013-07-09 12:00:09', 20, 30, 'Este es un contrato comisionable'),
(2, 'Garantizado', '2013-07-05 04:54:27', '2013-07-05 04:54:41', 400, 0, 'Este es un contrato garantizado');

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id_cuenta`, `iban`, `swif`, `id_moneda`, `titular`, `cvv`, `c_d`, `c_a`, `numero`) VALUES
(1, 'uhsdi fh', 'uihiusdhfusidfhiu', 1, '0', '0', 0, 0, '0');

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id_direccion`, `calle`, `numero`, `provincia`, `codigo_postal`, `id_pais`, `lat`, `lon`, `id_provincia`, `referencia`) VALUES
(1, 'Esta es una calle', '23D', '38683 Acantilados de los Gigantes, Santa Cruz', '77500', 1, 40, -3, 1, '  Cerca de la plaza '),
(2, '123123', '123', '12321', '12', 1, 40, -3, 1, ''),
(3, 'Calle2 ', '411', 'Cantabria', '#777777777', 1, 40, -3, 1, ''),
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
(25, '', '', 'Madrid, España', '77521', 1, 40.4113554, -3.7028359, 1, 'Cerca de la plaza'),
(26, '876876', '876876', '', 'iuhdfiusdhf uisdh', 1, 40, -3, 1, '');

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
(99, '2013-07-27 00:00:00', '2013-07-27 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(100, '2013-07-28 00:00:00', '2013-07-28 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(101, '2013-07-29 00:00:00', '2013-07-29 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(102, '2013-07-30 00:00:00', '2013-07-30 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(103, '2013-07-31 00:00:00', '2013-07-31 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(104, '2013-08-01 00:00:00', '2013-08-01 00:00:00', 200, 0, 'disponible', 2, 'Tarifa'),
(105, '2013-08-02 00:00:00', '2013-08-02 00:00:00', 200, 0, 'disponible', 2, 'Tarifa');

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nombre`, `apellido_paterno`, `apellido_materno`, `nombre_fiscal`, `cif`, `id_direccion`, `tiempo_creacion`, `ultima_modificacion`, `email`, `email_facturacion`) VALUES
(1, 'Mauro', 'Barbarroja', 'X', 'Click & Booking', '2176381726387126387', 1, '2013-05-30 09:35:19', '2013-05-30 09:35:19', 'listico__@hotmail.com', ''),
(2, 'Ruben', 'Velazquez', 'Calva', 'Una nueva inmobiliaria', '123123', 2, '2013-05-30 09:35:19', '2013-05-30 09:35:19', 'ruben.listico.ds@gmail.com', NULL),
(3, 'Ruben', 'uhiu', 'iuh', 'Esta es otra empresa', '11111111111111', 3, '2013-05-30 09:35:19', '2013-05-30 09:35:19', 'ruben.ds@gmail.com', NULL),
(4, '765765', '75765', '765', '765', '8787687', 26, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '765@dsdsd.com', '');

--
-- Volcado de datos para la tabla `empresas_contratos`
--

INSERT INTO `empresas_contratos` (`id_empresa`, `id_contrato`, `id_empresa_contrato`, `fecha_inicio`, `fecha_fin`, `tiempo_creacion`, `ultima_modificacion`) VALUES
(1, 1, 1, '2013-07-11 00:00:00', '2013-07-17 00:00:00', '2013-07-04 03:00:00', '2013-07-23 15:38:17'),
(1, 2, 2, '2013-07-10 00:00:00', '2013-07-13 00:00:00', '2013-07-08 15:34:02', '2013-07-23 15:38:17'),
(2, 2, 4, '2013-07-10 00:00:00', '2013-07-13 00:00:00', '2013-07-09 12:00:47', '2013-07-09 12:00:47'),
(2, 2, 5, '2013-07-10 00:00:00', '2013-07-13 00:00:00', '2013-07-09 12:01:11', '2013-07-09 12:01:11');

--
-- Volcado de datos para la tabla `empresas_cuentas`
--

INSERT INTO `empresas_cuentas` (`id_empresa`, `id_cuenta`, `id_empresa_cuenta`) VALUES
(4, 1, 1);

--
-- Volcado de datos para la tabla `huespedes`
--

INSERT INTO `huespedes` (`id_huesped`, `id_usuario`, `id_direccion`) VALUES
(1, 1, NULL),
(2, 1, NULL);

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id_idioma`, `nombre`) VALUES
(1, 'Español');

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

--
-- Volcado de datos para la tabla `lugares_cercanos`
--

INSERT INTO `lugares_cercanos` (`id_lugar_cercano`, `nombre`, `medida`, `tipo`) VALUES
(1, 'Playa', 'KM', 'global'),
(2, 'Centro', 'KM', 'global'),
(3, 'Aeropuerto', 'KM', 'global'),
(4, 'Transportes públicos', 'KM', 'global');

--
-- Volcado de datos para la tabla `monedas`
--

INSERT INTO `monedas` (`id_moneda`, `nombre`, `simbolo`, `codigo`, `tasa_cambio`) VALUES
(1, 'Euro', '€', 'EUR', 1),
(2, 'Dolar', '$', 'USD', 0.772439364);

--
-- Volcado de datos para la tabla `opiniones`
--

INSERT INTO `opiniones` (`id_opinion`, `opinion`, `puntuacion`, `fecha_creacion`, `ultima_actualizacion`, `id_apartamento`, `id_usuario`) VALUES
(1, 'Este es un excelente lugar! Lo recomiendo 100%.', 10, '2013-06-07 11:00:00', '2013-06-06 19:17:49', 1, 1),
(2, 'Muy mal lugar', 4, '2013-06-05 11:00:00', '2013-06-06 19:17:49', 1, 1),
(3, 'No me gusta para nada!', 3.5, '2013-06-18 13:59:38', '2013-06-18 13:59:38', 4, 1),
(4, 'Nice!', 10, '2013-06-18 06:22:23', '2013-06-18 06:22:23', 2, 1),
(5, 'Cool!', 10, '2013-06-18 06:23:04', '2013-06-18 06:23:04', 2, 1),
(6, 'Excelente apartamento!', 10, '2013-07-09 12:04:27', '2013-07-09 12:04:27', 6, 1),
(7, 'Excelente', 9, '2013-07-14 23:09:02', '2013-07-14 23:09:02', 8, 1),
(8, 'Muy bien', 8, '2013-07-14 23:10:21', '2013-07-14 23:10:21', 3, 1),
(9, 'Bien', 8, '2013-07-14 23:11:15', '2013-07-14 23:11:15', 1, 1),
(10, 'Excelente', 9, '2013-07-14 23:11:52', '2013-07-14 23:11:52', 1, 1),
(11, 'Excelente', 10, '2013-07-14 23:12:26', '2013-07-14 23:12:26', 1, 1),
(12, 'Excelente', 9, '2013-07-14 23:13:11', '2013-07-14 23:13:11', 7, 1),
(13, 'Regular', 6, '2013-07-14 23:13:58', '2013-07-14 23:13:58', 1, 1),
(14, 'Malo', 5, '2013-07-14 23:14:38', '2013-07-14 23:14:38', 13, 1),
(15, 'Regular', 6, '2013-07-14 23:15:28', '2013-07-14 23:15:28', 12, 1),
(16, 'Muy feo', 2.5, '2013-07-14 23:16:24', '2013-07-14 23:16:24', 14, 1),
(17, 'Regular', 6, '2013-07-14 23:17:04', '2013-07-14 23:17:04', 15, 1),
(18, 'Excelente ! Me gusto mucho', 10, '2013-07-14 23:17:43', '2013-07-14 23:17:43', 16, 1),
(19, 'Excelente', 9, '2013-07-14 23:18:25', '2013-07-14 23:18:25', 18, 1),
(20, 'Regular! Podría mejorar', 7, '2013-07-14 23:20:50', '2013-07-14 23:20:50', 1, 1),
(21, 'Bueno! ', 8, '2013-07-14 23:22:07', '2013-07-14 23:22:07', 5, 1),
(22, 'Malo! Debería mejorar', 3, '2013-07-14 23:22:48', '2013-07-14 23:22:48', 4, 1),
(23, 'Malo! Debería mejorar', 3, '2013-07-14 23:23:52', '2013-07-14 23:23:52', 1, 1),
(24, 'Regular ! Puede ser mejor', 5, '2013-07-14 23:24:57', '2013-07-14 23:24:57', 2, 1),
(25, 'Excelente', 10, '2013-07-14 23:26:01', '2013-07-14 23:26:01', 6, 1),
(26, 'Muy bueno', 8, '2013-07-14 23:27:36', '2013-07-14 23:27:36', 5, 1),
(27, 'Excelente lugar . Lo recomiendo', 10, '2013-07-14 23:29:49', '2013-07-14 23:29:49', 7, 1),
(28, 'Muy buen lugar', 8, '2013-07-14 23:30:26', '2013-07-14 23:30:26', 1, 1),
(29, 'Muy buen lugar ', 9, '2013-07-14 23:31:30', '2013-07-14 23:31:30', 1, 1),
(30, 'Muy feo lugar', 3, '2013-07-14 23:32:05', '2013-07-14 23:32:05', 10, 1),
(31, 'Muy buen lugar ', 9, '2013-07-14 23:32:38', '2013-07-14 23:32:38', 13, 1),
(32, 'Muy buen lugar', 9, '2013-07-14 23:33:54', '2013-07-14 23:33:54', 1, 1),
(33, 'Excelente lugar!!! ', 10, '2013-07-14 23:35:07', '2013-07-14 23:35:07', 1, 1),
(34, 'Excelente lugar !!  Lo recomiendo al 100% ', 10, '2013-07-14 23:35:55', '2013-07-14 23:35:55', 14, 1),
(35, 'Muy buen lugar', 9, '2013-07-14 23:36:35', '2013-07-14 23:36:35', 1, 1),
(36, 'Excelente lugar !! Lo recomiendo al 100 %', 10, '2013-07-14 23:37:20', '2013-07-14 23:37:20', 17, 1);

--
-- Volcado de datos para la tabla `pagos_tipos`
--

INSERT INTO `pagos_tipos` (`id_pago_tipo`, `nombre`) VALUES
(1, 'Master Card'),
(2, 'American Express'),
(3, 'Dinner'),
(4, 'Visa'),
(5, 'Paypal');

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pais`, `codigo`, `nombre_completo`, `iso3`, `nombre`, `numero`) VALUES
(1, 724, 'España', 'ESP', 'ES', 724),
(2, 36, 'Australia', 'AUS', 'AU', 36),
(3, 484, 'México', 'MEX', 'MX', 484),
(4, 276, 'Alemania', 'DEU', 'DE', 276),
(5, 643, 'Russia', 'RUS', 'RU', 643);

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `nombre`, `codigo`, `id_pais`) VALUES
(1, 'Tarragona', 'tr', 1);

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`id_reservacion`, `id_huesped`, `tiempo_creacion`, `ultima_modificacion`, `id_apartamento`, `fecha_entrada`, `fecha_salida`, `adultos`, `estatus`, `ninios`, `bebes`, `apartamento`, `contrato`, `autorizacion`, `request`, `total`, `observaciones`, `motivo_cancelacion`) VALUES
(1, 1, '2013-07-19 06:09:32', '2013-07-19 06:09:32', 1, '2013-07-17 00:00:00', '2013-07-18 00:00:00', NULL, '', NULL, NULL, 'O:11:"Apartamento":36:{s:13:"idApartamento";s:1:"1";s:17:"idEmpresaContrato";s:1:"2";s:6:"nombre";s:14:"LES ONES CB063";s:18:"idApartamentosTipo";s:1:"1";s:11:"idDireccion";s:1:"1";s:8:"idMoneda";s:1:"2";s:14:"horarioEntrada";s:8:"00:00:00";s:13:"horarioSalida";s:8:"00:00:00";s:16:"descripcionCorta";s:30:"Esta es una descripción corta";s:16:"descripcionLarga";s:1443:"        Apartamento de 2 habitaciones con capacidad para 4/6 personas y vistas frontales al mar desde la terraza. Se compone de salón comedor con sofá cama y salida a la terraza equipada con mobiliario de jardín , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 2 cuartos de baño uno de ellos con bañera de hidromasaje y cocina independiente totalmente equipada.El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias de la vivienda. Plaza de aparcamiento para coche grande.\r\nNO SE ADMITEN GRUPOS DE JOVENES. Es exclusivo para familias debido a la tranquilidad del complejo y de los vecinos.\r\n\r\nLos Apartamentos Les Ones están en Salou, a solo 150 metros de la playa Capellans. Cuentan con vistas al mar e incluyen aire acondicionado, balcón privado y un jardín con una piscina compartida al aire libre rodeada de tumbonas.\r\nLos apartamentos Les Ones disponen de un salón con sofá cama y TV de pantalla plana, un baño con bañera de hidromasaje y una zona de cocina con fogones, microondas, horno, lavavajillas y lavadora.\r\nLos Apartamentos Les Ones disponen de aparcamiento privado gratuito y una recepción con servicio de información turística.\r\nSe encuentran a solo 8 minutos en coche de PortAventura, a 15 minutos en coche de Tarragona y a 2 km de la estación de tren de Salou, que comunica con el centro de Barcelona en aproximadamente 75 minutos.   ";s:8:"idIdioma";s:1:"1";s:20:"descripcionServicios";s:25:"Descripción de servicios";s:22:"descripcionCondiciones";s:27:"Descripción de condiciones";s:14:"tiempoCreacion";s:19:"2013-06-13 00:38:26";s:18:"ultimaModificacion";s:19:"2013-07-16 23:33:52";s:7:"estatus";s:6:"activo";s:9:"idUsuario";s:1:"1";s:10:"tarifaBase";s:2:"30";s:12:"tarifaSemana";s:4:"1300";s:9:"tarifaMes";s:4:"5000";s:13:"estadiaMaxima";s:2:"30";s:13:"estadiaMinima";s:1:"2";s:23:"huespedAdicionalApartir";s:1:"4";s:21:"huespedAdicionalCosto";s:2:"20";s:13:"costoLimpieza";s:2:"10";s:17:"depositoSeguridad";s:2:"10";s:15:"precioFinSemana";s:2:"25";s:6:"normas";s:16:" LES ONES CB063 ";s:7:"tamanio";s:3:"125";s:17:"capacidadPersonas";s:1:"5";s:12:"habitaciones";s:1:"2";s:5:"camas";s:1:"3";s:8:"tipoCama";s:4:"Cama";s:5:"banio";s:1:"2";s:8:"mascotas";s:1:"0";s:6:"manual";s:39:"  Las llaves están abajo de la maceta ";}', '', '', 'a:34:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:14:"192.158.30.171";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:14:"CONTENT_LENGTH";s:3:"281";s:11:"HTTP_ACCEPT";s:46:"application/json, text/javascript, */*; q=0.01";s:11:"HTTP_ORIGIN";s:21:"http://192.158.30.171";s:21:"HTTP_X_REQUESTED_WITH";s:14:"XMLHttpRequest";s:15:"HTTP_USER_AGENT";s:119:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36";s:12:"CONTENT_TYPE";s:48:"application/x-www-form-urlencoded; charset=UTF-8";s:12:"HTTP_REFERER";s:36:"http://192.158.30.171//reservas/id:1";s:20:"HTTP_ACCEPT_ENCODING";s:17:"gzip,deflate,sdch";s:20:"HTTP_ACCEPT_LANGUAGE";s:14:"es-ES,es;q=0.8";s:11:"HTTP_COOKIE";s:96:"PHPSESSID=vu8fk1q1t4b56j2j0fvkhjsm23; _atshc={}; __atuvc=3%7C26%2C258%7C27%2C199%7C28%2C129%7C29";s:4:"PATH";s:29:"/sbin:/usr/sbin:/bin:/usr/bin";s:16:"SERVER_SIGNATURE";s:75:"<address>Apache/2.2.15 (CentOS) Server at 192.158.30.171 Port 80</address>\n";s:15:"SERVER_SOFTWARE";s:22:"Apache/2.2.15 (CentOS)";s:11:"SERVER_NAME";s:14:"192.158.30.171";s:11:"SERVER_ADDR";s:13:"10.240.122.67";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:14:"187.153.136.71";s:13:"DOCUMENT_ROOT";s:13:"/var/www/html";s:12:"SERVER_ADMIN";s:14:"root@localhost";s:15:"SCRIPT_FILENAME";s:23:"/var/www/html/index.php";s:11:"REMOTE_PORT";s:5:"57618";s:21:"REDIRECT_QUERY_STRING";s:17:"args=ajax-reserva";s:12:"REDIRECT_URL";s:13:"/ajax-reserva";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:4:"POST";s:12:"QUERY_STRING";s:17:"args=ajax-reserva";s:11:"REQUEST_URI";s:14:"//ajax-reserva";s:11:"SCRIPT_NAME";s:10:"/index.php";s:8:"PHP_SELF";s:10:"/index.php";s:12:"REQUEST_TIME";i:1374214171;}', 30, '', ''),
(2, 2, '2013-07-22 05:40:53', '2013-07-22 05:40:53', 1, '2013-07-23 00:00:00', '2013-07-28 00:00:00', 3, '', NULL, NULL, 'O:11:"Apartamento":36:{s:13:"idApartamento";s:1:"1";s:17:"idEmpresaContrato";s:1:"2";s:6:"nombre";s:14:"LES ONES CB063";s:18:"idApartamentosTipo";s:1:"1";s:11:"idDireccion";s:1:"1";s:8:"idMoneda";s:1:"2";s:14:"horarioEntrada";s:8:"00:00:00";s:13:"horarioSalida";s:8:"00:00:00";s:16:"descripcionCorta";s:30:"Esta es una descripción corta";s:16:"descripcionLarga";s:1443:"        Apartamento de 2 habitaciones con capacidad para 4/6 personas y vistas frontales al mar desde la terraza. Se compone de salón comedor con sofá cama y salida a la terraza equipada con mobiliario de jardín , 1 habitación con cama de matrimonio , 1 habitación con 2 camas individuales , 2 cuartos de baño uno de ellos con bañera de hidromasaje y cocina independiente totalmente equipada.El apartamento dispone de aire acondicionado y calefacción por conductos en todas las estancias de la vivienda. Plaza de aparcamiento para coche grande.\r\nNO SE ADMITEN GRUPOS DE JOVENES. Es exclusivo para familias debido a la tranquilidad del complejo y de los vecinos.\r\n\r\nLos Apartamentos Les Ones están en Salou, a solo 150 metros de la playa Capellans. Cuentan con vistas al mar e incluyen aire acondicionado, balcón privado y un jardín con una piscina compartida al aire libre rodeada de tumbonas.\r\nLos apartamentos Les Ones disponen de un salón con sofá cama y TV de pantalla plana, un baño con bañera de hidromasaje y una zona de cocina con fogones, microondas, horno, lavavajillas y lavadora.\r\nLos Apartamentos Les Ones disponen de aparcamiento privado gratuito y una recepción con servicio de información turística.\r\nSe encuentran a solo 8 minutos en coche de PortAventura, a 15 minutos en coche de Tarragona y a 2 km de la estación de tren de Salou, que comunica con el centro de Barcelona en aproximadamente 75 minutos.   ";s:8:"idIdioma";s:1:"1";s:20:"descripcionServicios";s:25:"Descripción de servicios";s:22:"descripcionCondiciones";s:27:"Descripción de condiciones";s:14:"tiempoCreacion";s:19:"2013-06-13 00:38:26";s:18:"ultimaModificacion";s:19:"2013-07-22 01:24:39";s:7:"estatus";s:6:"activo";s:9:"idUsuario";s:1:"1";s:10:"tarifaBase";s:2:"30";s:12:"tarifaSemana";s:4:"1300";s:9:"tarifaMes";s:4:"5000";s:13:"estadiaMaxima";s:2:"30";s:13:"estadiaMinima";s:1:"2";s:23:"huespedAdicionalApartir";s:1:"4";s:21:"huespedAdicionalCosto";s:2:"20";s:13:"costoLimpieza";s:2:"10";s:17:"depositoSeguridad";s:2:"10";s:15:"precioFinSemana";s:2:"25";s:6:"normas";s:16:" LES ONES CB063 ";s:7:"tamanio";s:3:"125";s:17:"capacidadPersonas";s:1:"5";s:12:"habitaciones";s:1:"2";s:5:"camas";s:1:"3";s:8:"tipoCama";s:4:"Cama";s:5:"banio";s:1:"2";s:8:"mascotas";s:1:"0";s:6:"manual";s:39:"  Las llaves están abajo de la maceta ";}', '', '', 'a:34:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:14:"192.158.30.171";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:14:"CONTENT_LENGTH";s:3:"292";s:11:"HTTP_ACCEPT";s:46:"application/json, text/javascript, */*; q=0.01";s:11:"HTTP_ORIGIN";s:21:"http://192.158.30.171";s:21:"HTTP_X_REQUESTED_WITH";s:14:"XMLHttpRequest";s:15:"HTTP_USER_AGENT";s:119:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36";s:12:"CONTENT_TYPE";s:48:"application/x-www-form-urlencoded; charset=UTF-8";s:12:"HTTP_REFERER";s:36:"http://192.158.30.171//reservas/id:1";s:20:"HTTP_ACCEPT_ENCODING";s:17:"gzip,deflate,sdch";s:20:"HTTP_ACCEPT_LANGUAGE";s:14:"es-ES,es;q=0.8";s:11:"HTTP_COOKIE";s:749:"PHPSESSID=vu8fk1q1t4b56j2j0fvkhjsm23; _atshc={}; fbsr_335469189915773=tpEJnuClJEISc2Dw6Hm2Mv0nwqwaIewKCCZSyEzs_FE.eyJhbGdvcml0aG0iOiJITUFDLVNIQTI1NiIsImNvZGUiOiJBUURzdkloTWF3MTltNFhMc1ZtY0t6TjctUHRfS2Z4bzhNVXA4T1dFQWVqbnF0SURhQ0c0Mm91cnB6TWZmTVlsd3ZJY19MM1BsQlZ0dmNhR04xZ2poYU9vdlU0aEpDTGljcHRrRl9raW9ma3hLM0x4NmdEUTJqem5wZmZSZnRlOFk1bmZ0SDRMMXNsd3ZrSE9Yam9TS2dQVTQ0WjVuY1BZLXd5Wnp0ZGFrbG5zd1JrNzlKUVA2aUk5cndKUDlWVGw0d2pxOU5IelVhT2JBNDVGZU5VejgzOG43MTNiVTN2TDRIam5kMl9QS1ZkVlR0ZzVWR0hVQjNBVlc1WmNqT2ZMOGlfM05SenVYcXBZbC0wcU9EbHE5c3R6N1JISjd0aWhKejVGMkZYcFYwNjJzSXRaUWVGMHZFR3BFU01QTlJrUnJmR1NNQU4yTTE1UVcxdEJvckRKSVRtRiIsImlzc3VlZF9hdCI6MTM3NDQ3MTYxNCwidXNlcl9pZCI6IjEwMDAwNDU2MDY2NDk3OCJ9; __atuvc=3%7C26%2C258%7C27%2C199%7C28%2C149%7C29%2C16%7C30";s:4:"PATH";s:29:"/sbin:/usr/sbin:/bin:/usr/bin";s:16:"SERVER_SIGNATURE";s:75:"<address>Apache/2.2.15 (CentOS) Server at 192.158.30.171 Port 80</address>\n";s:15:"SERVER_SOFTWARE";s:22:"Apache/2.2.15 (CentOS)";s:11:"SERVER_NAME";s:14:"192.158.30.171";s:11:"SERVER_ADDR";s:13:"10.240.122.67";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:13:"187.153.98.74";s:13:"DOCUMENT_ROOT";s:13:"/var/www/html";s:12:"SERVER_ADMIN";s:14:"root@localhost";s:15:"SCRIPT_FILENAME";s:23:"/var/www/html/index.php";s:11:"REMOTE_PORT";s:5:"58726";s:21:"REDIRECT_QUERY_STRING";s:17:"args=ajax-reserva";s:12:"REDIRECT_URL";s:13:"/ajax-reserva";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:4:"POST";s:12:"QUERY_STRING";s:17:"args=ajax-reserva";s:11:"REQUEST_URI";s:14:"//ajax-reserva";s:11:"SCRIPT_NAME";s:10:"/index.php";s:8:"PHP_SELF";s:10:"/index.php";s:12:"REQUEST_TIME";i:1374471653;}', 150, '', '');

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`, `tiempo_creacion`, `ultima_modificacion`, `id_usuario_grupo`, `estatus`, `telefono`, `apellido_materno`, `apellido_paterno`) VALUES
(1, 'Rubén', 'ruben.listico.ds@gmail.com', 'admin', '2013-05-30 09:27:11', '2013-07-22 05:40:53', 1, '', '', 'Calva', 'Velazquez'),
(2, 'Ruben', 'admin@fodessa.com', '222627', '2013-07-17 03:37:39', '2013-07-17 03:37:39', 2, 'activo', '', 'Calva', 'Velazquez'),
(3, 'Ruben', 'ruben.listico.ds@gmail.com', 'fd584c4346eb7ae5e671bc062d121608', '2013-07-17 05:34:19', '2013-07-17 05:34:19', 2, 'activo', '', '', ''),
(4, 'Mauro', 'maurotem@hotmail.com', 'e15133234ff6d3e691d41135151f6caa', '2013-07-17 14:29:38', '2013-07-17 14:29:38', 2, 'activo', '', '', 'Barbarroja');

--
-- Volcado de datos para la tabla `usuarios_grupos`
--

INSERT INTO `usuarios_grupos` (`id_usuario_grupo`, `nombre`) VALUES
(1, 'admin'),
(2, 'user');
SET FOREIGN_KEY_CHECKS=1;
