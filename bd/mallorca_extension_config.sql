CREATE TABLE IF NOT EXISTS `configuracion` (
  `id_configuracion` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(300) DEFAULT NULL,
  `username` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `servidor` varchar(300) DEFAULT NULL,
  `puerto` INTEGER DEFAULT NULL,
  `id_direccion` int(11) NOT NULL,
  PRIMARY KEY (`id_configuracion`),  
  KEY `fk_config_direcciones1_idx` (`id_direccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;