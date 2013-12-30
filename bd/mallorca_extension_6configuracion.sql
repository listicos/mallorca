ALTER TABLE  `configuracion` ADD  `nombre_empresa` TEXT NULL ;
ALTER TABLE  `configuracion` ADD  `empresa_cif` VARCHAR( 20 ) NULL ;
ALTER TABLE  `configuracion` ADD  `telefonos_contacto` TEXT NULL ;
ALTER TABLE  `configuracion` ADD  `email_contacto` TEXT NULL ;
ALTER TABLE  `configuracion` ADD  `facebook` VARCHAR( 100 ) NULL ;
ALTER TABLE  `configuracion` ADD  `twitter` VARCHAR( 200 ) NULL ,
ADD  `vimeo` VARCHAR( 200 ) NULL ,
ADD  `rss` VARCHAR( 200 ) NULL ;
ALTER TABLE  `direcciones` CHANGE  `provincia`  `provincia` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL