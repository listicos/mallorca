SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `clickandbooking` DEFAULT CHARACTER SET latin1 ;
USE `clickandbooking` ;

-- -----------------------------------------------------
-- Table `clickandbooking`.`paises`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`paises` (
  `id_pais` INT NOT NULL AUTO_INCREMENT ,
  `codigo` INT NULL ,
  `nombre_completo` VARCHAR(255) NULL ,
  `iso3` VARCHAR(3) NULL ,
  `nombre` VARCHAR(45) NULL ,
  `numero` SMALLINT NULL ,
  PRIMARY KEY (`id_pais`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`provincias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`provincias` (
  `id_provincia` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(105) NULL ,
  `codigo` VARCHAR(45) NULL ,
  `id_pais` INT NOT NULL ,
  PRIMARY KEY (`id_provincia`) ,
  INDEX `fk_provincias_paises1_idx` (`id_pais` ASC) ,
  CONSTRAINT `fk_provincias_paises1`
    FOREIGN KEY (`id_pais` )
    REFERENCES `clickandbooking`.`paises` (`id_pais` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`direcciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`direcciones` (
  `id_direccion` INT NOT NULL AUTO_INCREMENT ,
  `calle` VARCHAR(65) NULL ,
  `numero` VARCHAR(45) NULL ,
  `provincia` VARCHAR(45) NULL ,
  `codigo_postal` VARCHAR(45) NULL ,
  `id_pais` INT NOT NULL ,
  `lat` DOUBLE NULL ,
  `lon` DOUBLE NULL ,
  `id_provincia` INT NULL ,
  `referencia` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_direccion`) ,
  INDEX `fk_direcciones_paises_idx` (`id_pais` ASC) ,
  INDEX `fk_direcciones_provincias1_idx` (`id_provincia` ASC) ,
  CONSTRAINT `fk_direcciones_paises`
    FOREIGN KEY (`id_pais` )
    REFERENCES `clickandbooking`.`paises` (`id_pais` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_direcciones_provincias1`
    FOREIGN KEY (`id_provincia` )
    REFERENCES `clickandbooking`.`provincias` (`id_provincia` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`empresas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`empresas` (
  `id_empresa` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `apellido_paterno` VARCHAR(45) NULL ,
  `apellido_materno` VARCHAR(45) NULL ,
  `nombre_fiscal` VARCHAR(65) NULL ,
  `cif` TEXT NULL ,
  `id_direccion` INT NOT NULL ,
  `tiempo_creacion` TIMESTAMP NULL ,
  `ultima_modificacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `email` VARCHAR(150) NULL ,
  `email_facturacion` VARCHAR(150) NULL ,
  `telefono` VARCHAR(100) NULL ,
  `telefono_alterno` VARCHAR(100) NULL ,
  `id_direccion_facturacion` INT NULL ,
  PRIMARY KEY (`id_empresa`) ,
  INDEX `fk_empresa_direcciones1_idx` (`id_direccion` ASC) ,
  INDEX `fk_empresas_direcciones1_idx` (`id_direccion_facturacion` ASC) ,
  CONSTRAINT `fk_empresa_direcciones1`
    FOREIGN KEY (`id_direccion` )
    REFERENCES `clickandbooking`.`direcciones` (`id_direccion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresas_direcciones1`
    FOREIGN KEY (`id_direccion_facturacion` )
    REFERENCES `clickandbooking`.`direcciones` (`id_direccion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`monedas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`monedas` (
  `id_moneda` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `simbolo` VARCHAR(45) NULL ,
  `codigo` VARCHAR(45) NULL ,
  `tasa_cambio` DOUBLE NULL ,
  PRIMARY KEY (`id_moneda`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`cuentas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`cuentas` (
  `id_cuenta` INT NOT NULL AUTO_INCREMENT ,
  `iban` VARCHAR(50) NULL ,
  `swif` VARCHAR(50) NULL ,
  `id_moneda` INT NOT NULL ,
  `titular` VARCHAR(60) NULL ,
  `cvv` VARCHAR(4) NULL ,
  `c_d` INT NULL ,
  `c_a` INT NULL ,
  `numero` TEXT NULL ,
  `tipo_tarjeta` VARCHAR(45) NULL ,
  `caducidad_mes` INT NULL ,
  `caducidad_anio` INT NULL ,
  `paypal` TEXT NULL ,
  `tipo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_cuenta`) ,
  INDEX `fk_cuentas_monedas1_idx` (`id_moneda` ASC) ,
  CONSTRAINT `fk_cuentas_monedas1`
    FOREIGN KEY (`id_moneda` )
    REFERENCES `clickandbooking`.`monedas` (`id_moneda` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`apartamentos_tipos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`apartamentos_tipos` (
  `id_apartamentos_tipo` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_apartamentos_tipo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`idiomas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`idiomas` (
  `id_idioma` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_idioma`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`usuarios_grupos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`usuarios_grupos` (
  `id_usuario_grupo` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_usuario_grupo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`usuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `email` VARCHAR(50) NULL ,
  `password` VARCHAR(45) NULL ,
  `tiempo_creacion` TIMESTAMP NULL ,
  `ultima_modificacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `id_usuario_grupo` INT NOT NULL ,
  `estatus` VARCHAR(45) NULL ,
  `telefono` VARCHAR(45) NULL ,
  `apellido_materno` VARCHAR(45) NULL ,
  `apellido_paterno` VARCHAR(45) NULL ,
  `facebook_id` TEXT NULL ,
  `facebook_username` TEXT NULL ,
  `telefono_alterno` VARCHAR(45) NULL ,
  `id_cuenta` INT NULL ,
  `documento` TEXT NULL ,
  `id_direccion` INT NULL ,
  PRIMARY KEY (`id_usuario`) ,
  INDEX `fk_usuarios_usuarios_grupos1_idx` (`id_usuario_grupo` ASC) ,
  INDEX `fk_usuarios_cuentas1_idx` (`id_cuenta` ASC) ,
  INDEX `fk_usuarios_direcciones1_idx` (`id_direccion` ASC) ,
  CONSTRAINT `fk_usuarios_usuarios_grupos1`
    FOREIGN KEY (`id_usuario_grupo` )
    REFERENCES `clickandbooking`.`usuarios_grupos` (`id_usuario_grupo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_cuentas1`
    FOREIGN KEY (`id_cuenta` )
    REFERENCES `clickandbooking`.`cuentas` (`id_cuenta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_direcciones1`
    FOREIGN KEY (`id_direccion` )
    REFERENCES `clickandbooking`.`direcciones` (`id_direccion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`contratos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`contratos` (
  `id_contrato` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NULL ,
  `tiempo_creacion` TIMESTAMP NULL ,
  `ultima_modificacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `precio` DOUBLE NULL ,
  `porcentaje` DOUBLE NULL ,
  `descripcion` TEXT NULL ,
  `semana_gratis` TINYINT(1) NULL ,
  `especiales` TINYINT(1) NULL ,
  `reservas_ultimo_minuto` TINYINT(1) NULL ,
  `reservas_anticipadas` TINYINT(1) NULL ,
  `alquileres_larga_estancia` TINYINT(1) NULL ,
  `firmado` TINYINT(1) NULL ,
  PRIMARY KEY (`id_contrato`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`empresas_contratos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`empresas_contratos` (
  `id_empresa` INT NOT NULL ,
  `id_contrato` INT NOT NULL ,
  `id_empresa_contrato` INT NOT NULL AUTO_INCREMENT ,
  `fecha_inicio` DATETIME NULL ,
  `fecha_fin` DATETIME NULL ,
  `tiempo_creacion` TIMESTAMP NULL ,
  `ultima_modificacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  INDEX `fk_empresas_has_contratos_contratos1_idx` (`id_contrato` ASC) ,
  INDEX `fk_empresas_has_contratos_empresas1_idx` (`id_empresa` ASC) ,
  PRIMARY KEY (`id_empresa_contrato`) ,
  CONSTRAINT `fk_empresas_has_contratos_empresas1`
    FOREIGN KEY (`id_empresa` )
    REFERENCES `clickandbooking`.`empresas` (`id_empresa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresas_has_contratos_contratos1`
    FOREIGN KEY (`id_contrato` )
    REFERENCES `clickandbooking`.`contratos` (`id_contrato` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`politicas_cancelacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`politicas_cancelacion` (
  `id_politica_cancelacion` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `reembolso_dia` INT NULL ,
  `comision` DOUBLE NULL ,
  `reembolso_porcentaje` DOUBLE NULL ,
  PRIMARY KEY (`id_politica_cancelacion`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`apartamentos_descripcion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`apartamentos_descripcion` (
  `id_apartamento_descripcion` INT NOT NULL AUTO_INCREMENT ,
  `nombre` TEXT NULL ,
  `descripcion_corta` TEXT NULL ,
  `descripcion_larga` TEXT NULL ,
  `descripcion_servicios` TEXT NULL ,
  `descripcion_condiciones` TEXT NULL ,
  `normas` TEXT NULL ,
  `manual` TEXT NULL ,
  `id_idioma` INT NOT NULL ,
  PRIMARY KEY (`id_apartamento_descripcion`) ,
  INDEX `fk_apartamentos_descripcion_idiomas1_idx` (`id_idioma` ASC) ,
  CONSTRAINT `fk_apartamentos_descripcion_idiomas1`
    FOREIGN KEY (`id_idioma` )
    REFERENCES `clickandbooking`.`idiomas` (`id_idioma` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`apartamentos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`apartamentos` (
  `id_apartamento` INT NOT NULL AUTO_INCREMENT ,
  `id_empresa_contrato` INT NULL ,
  `nombre` VARCHAR(300) NULL ,
  `id_apartamentos_tipo` INT NOT NULL ,
  `id_direccion` INT NOT NULL ,
  `id_moneda` INT NOT NULL ,
  `horario_entrada` TIME NULL ,
  `horario_salida` TIME NULL ,
  `descripcion_corta` TEXT NULL ,
  `descripcion_larga` TEXT NULL ,
  `id_idioma` INT NOT NULL ,
  `descripcion_servicios` TEXT NULL ,
  `descripcion_condiciones` TEXT NULL ,
  `tiempo_creacion` TIMESTAMP NULL ,
  `ultima_modificacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `estatus` VARCHAR(45) NULL ,
  `id_usuario` INT NOT NULL ,
  `tarifa_base` DOUBLE NULL ,
  `tarifa_semana` DOUBLE NULL ,
  `tarifa_mes` DOUBLE NULL ,
  `estadia_maxima` INT NULL ,
  `estadia_minima` INT NULL ,
  `huesped_adicional_apartir` INT NULL ,
  `huesped_adicional_costo` DOUBLE NULL ,
  `costo_limpieza` DOUBLE NULL ,
  `deposito_seguridad` DOUBLE NULL ,
  `precio_fin_semana` DOUBLE NULL ,
  `normas` TEXT NULL ,
  `tamanio` DOUBLE NULL ,
  `capacidad_personas` INT NULL ,
  `habitaciones` INT NULL ,
  `camas` INT NULL ,
  `tipo_cama` VARCHAR(45) NULL ,
  `banio` DOUBLE NULL ,
  `mascotas` TINYINT(1) NULL ,
  `manual` TEXT NULL ,
  `cantidad` INT NULL ,
  `codigo` VARCHAR(45) NULL ,
  `id_politica_cancelacion` INT NULL ,
  `id_apartamento_descripcion` INT NULL ,
  `clave_wifi` TEXT NULL ,
  PRIMARY KEY (`id_apartamento`) ,
  INDEX `fk_apartamentos_apartamentos_tipos1_idx` (`id_apartamentos_tipo` ASC) ,
  INDEX `fk_apartamentos_direcciones1_idx` (`id_direccion` ASC) ,
  INDEX `fk_apartamentos_monedas1_idx` (`id_moneda` ASC) ,
  INDEX `fk_apartamentos_idiomas1_idx` (`id_idioma` ASC) ,
  INDEX `fk_apartamentos_usuarios1_idx` (`id_usuario` ASC) ,
  INDEX `fk_apartamentos_empresas_contratos1_idx` (`id_empresa_contrato` ASC) ,
  INDEX `fk_apartamentos_politicas_cancelacion1_idx` (`id_politica_cancelacion` ASC) ,
  INDEX `fk_apartamentos_apartamentos_descripcion1_idx` (`id_apartamento_descripcion` ASC) ,
  CONSTRAINT `fk_apartamentos_apartamentos_tipos1`
    FOREIGN KEY (`id_apartamentos_tipo` )
    REFERENCES `clickandbooking`.`apartamentos_tipos` (`id_apartamentos_tipo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apartamentos_direcciones1`
    FOREIGN KEY (`id_direccion` )
    REFERENCES `clickandbooking`.`direcciones` (`id_direccion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apartamentos_monedas1`
    FOREIGN KEY (`id_moneda` )
    REFERENCES `clickandbooking`.`monedas` (`id_moneda` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apartamentos_idiomas1`
    FOREIGN KEY (`id_idioma` )
    REFERENCES `clickandbooking`.`idiomas` (`id_idioma` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apartamentos_usuarios1`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `clickandbooking`.`usuarios` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apartamentos_empresas_contratos1`
    FOREIGN KEY (`id_empresa_contrato` )
    REFERENCES `clickandbooking`.`empresas_contratos` (`id_empresa_contrato` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apartamentos_politicas_cancelacion1`
    FOREIGN KEY (`id_politica_cancelacion` )
    REFERENCES `clickandbooking`.`politicas_cancelacion` (`id_politica_cancelacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apartamentos_apartamentos_descripcion1`
    FOREIGN KEY (`id_apartamento_descripcion` )
    REFERENCES `clickandbooking`.`apartamentos_descripcion` (`id_apartamento_descripcion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`pagos_tipos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`pagos_tipos` (
  `id_pago_tipo` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_pago_tipo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`apartamentos_pagos_tipos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`apartamentos_pagos_tipos` (
  `id_apartamento` INT NOT NULL ,
  `id_pago_tipo` INT NOT NULL ,
  `id_apartamento_pago_tipo` INT NOT NULL AUTO_INCREMENT ,
  INDEX `fk_apartamentos_has_pagos_tipos_pagos_tipos1_idx` (`id_pago_tipo` ASC) ,
  INDEX `fk_apartamentos_has_pagos_tipos_apartamentos1_idx` (`id_apartamento` ASC) ,
  PRIMARY KEY (`id_apartamento_pago_tipo`) ,
  CONSTRAINT `fk_apartamentos_has_pagos_tipos_apartamentos1`
    FOREIGN KEY (`id_apartamento` )
    REFERENCES `clickandbooking`.`apartamentos` (`id_apartamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apartamentos_has_pagos_tipos_pagos_tipos1`
    FOREIGN KEY (`id_pago_tipo` )
    REFERENCES `clickandbooking`.`pagos_tipos` (`id_pago_tipo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`lugares_cercanos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`lugares_cercanos` (
  `id_lugar_cercano` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `medida` VARCHAR(45) NULL ,
  `tipo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_lugar_cercano`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`apartamentos_lugares_cercanos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`apartamentos_lugares_cercanos` (
  `id_apartamento` INT NOT NULL ,
  `id_lugar_cercano` INT NOT NULL ,
  `id_apartamento_lugar_cercano` INT NOT NULL AUTO_INCREMENT ,
  `valor` VARCHAR(45) NULL ,
  INDEX `fk_apartamentos_has_lugares_cercanos_lugares_cercanos1_idx` (`id_lugar_cercano` ASC) ,
  INDEX `fk_apartamentos_has_lugares_cercanos_apartamentos1_idx` (`id_apartamento` ASC) ,
  PRIMARY KEY (`id_apartamento_lugar_cercano`) ,
  CONSTRAINT `fk_apartamentos_has_lugares_cercanos_apartamentos1`
    FOREIGN KEY (`id_apartamento` )
    REFERENCES `clickandbooking`.`apartamentos` (`id_apartamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apartamentos_has_lugares_cercanos_lugares_cercanos1`
    FOREIGN KEY (`id_lugar_cercano` )
    REFERENCES `clickandbooking`.`lugares_cercanos` (`id_lugar_cercano` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`condiciones_compra`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`condiciones_compra` (
  `id_condicion_compra` INT NOT NULL AUTO_INCREMENT ,
  `id_apartamento` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_condicion_compra`) ,
  INDEX `fk_condiciones_compra_apartamentos1_idx` (`id_apartamento` ASC) ,
  CONSTRAINT `fk_condiciones_compra_apartamentos1`
    FOREIGN KEY (`id_apartamento` )
    REFERENCES `clickandbooking`.`apartamentos` (`id_apartamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`adjuntos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`adjuntos` (
  `id_adjunto` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(95) NULL ,
  `ruta` TEXT NULL ,
  `tipo` VARCHAR(45) NULL ,
  `ext` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_adjunto`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`apartamentos_adjuntos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`apartamentos_adjuntos` (
  `id_apartamento` INT NOT NULL ,
  `id_adjunto` INT NOT NULL ,
  `id_apartamento_adjunto` INT NOT NULL AUTO_INCREMENT ,
  INDEX `fk_apartamentos_has_adjuntos_adjuntos1_idx` (`id_adjunto` ASC) ,
  INDEX `fk_apartamentos_has_adjuntos_apartamentos1_idx` (`id_apartamento` ASC) ,
  PRIMARY KEY (`id_apartamento_adjunto`) ,
  CONSTRAINT `fk_apartamentos_has_adjuntos_apartamentos1`
    FOREIGN KEY (`id_apartamento` )
    REFERENCES `clickandbooking`.`apartamentos` (`id_apartamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apartamentos_has_adjuntos_adjuntos1`
    FOREIGN KEY (`id_adjunto` )
    REFERENCES `clickandbooking`.`adjuntos` (`id_adjunto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`instalaciones_categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`instalaciones_categoria` (
  `id_instalacion_categoria` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(50) NULL ,
  PRIMARY KEY (`id_instalacion_categoria`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`instalaciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`instalaciones` (
  `id_instalacion` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `id_instalacion_categoria` INT NOT NULL ,
  PRIMARY KEY (`id_instalacion`) ,
  INDEX `fk_instalaciones_instalaciones_categoria1_idx` (`id_instalacion_categoria` ASC) ,
  CONSTRAINT `fk_instalaciones_instalaciones_categoria1`
    FOREIGN KEY (`id_instalacion_categoria` )
    REFERENCES `clickandbooking`.`instalaciones_categoria` (`id_instalacion_categoria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`apartamentos_instalaciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`apartamentos_instalaciones` (
  `id_apartamento` INT NOT NULL ,
  `id_instalacion` INT NOT NULL ,
  `id_apartamento_instalacion` INT NOT NULL AUTO_INCREMENT ,
  INDEX `fk_apartamentos_has_instalaciones_instalaciones1_idx` (`id_instalacion` ASC) ,
  INDEX `fk_apartamentos_has_instalaciones_apartamentos1_idx` (`id_apartamento` ASC) ,
  PRIMARY KEY (`id_apartamento_instalacion`) ,
  CONSTRAINT `fk_apartamentos_has_instalaciones_apartamentos1`
    FOREIGN KEY (`id_apartamento` )
    REFERENCES `clickandbooking`.`apartamentos` (`id_apartamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apartamentos_has_instalaciones_instalaciones1`
    FOREIGN KEY (`id_instalacion` )
    REFERENCES `clickandbooking`.`instalaciones` (`id_instalacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`alojamientos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`alojamientos` (
  `id_alojamiento` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `codigo` VARCHAR(45) NULL ,
  `pax_minimo` INT NULL ,
  `pax_maximo` INT NULL ,
  `pax_bebe_maximo` VARCHAR(45) NULL ,
  `pax_ninios_minimo` VARCHAR(45) NULL ,
  `pax_ninios_maximo` VARCHAR(45) NULL ,
  `pax_adultos_maximo` VARCHAR(45) NULL ,
  `pax_adultos_minimo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_alojamiento`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`apartamentos_alojamientos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`apartamentos_alojamientos` (
  `id_apartamento` INT NOT NULL ,
  `id_alojamiento` INT NOT NULL ,
  `id_apartamento_alojamiento` INT NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`id_apartamento_alojamiento`) ,
  INDEX `fk_apartamentos_has_alojamientos_alojamientos1_idx` (`id_alojamiento` ASC) ,
  INDEX `fk_apartamentos_has_alojamientos_apartamentos1_idx` (`id_apartamento` ASC) ,
  CONSTRAINT `fk_apartamentos_has_alojamientos_apartamentos1`
    FOREIGN KEY (`id_apartamento` )
    REFERENCES `clickandbooking`.`apartamentos` (`id_apartamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apartamentos_has_alojamientos_alojamientos1`
    FOREIGN KEY (`id_alojamiento` )
    REFERENCES `clickandbooking`.`alojamientos` (`id_alojamiento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`canales`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`canales` (
  `id_canal` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `comision` DOUBLE NULL ,
  `senia` DOUBLE NULL ,
  PRIMARY KEY (`id_canal`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`reservaciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`reservaciones` (
  `id_reservacion` INT NOT NULL AUTO_INCREMENT ,
  `tiempo_creacion` TIMESTAMP NULL ,
  `ultima_modificacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `id_apartamento` INT NOT NULL ,
  `fecha_entrada` DATETIME NULL ,
  `fecha_salida` DATETIME NULL ,
  `adultos` INT NULL ,
  `estatus` VARCHAR(45) NULL ,
  `ninios` INT NULL ,
  `bebes` INT NULL ,
  `apartamento` TEXT NULL ,
  `contrato` TEXT NULL ,
  `autorizacion` TEXT NULL ,
  `request` TEXT NULL ,
  `total` DOUBLE NULL ,
  `observaciones` TEXT NULL ,
  `motivo_cancelacion` TEXT NULL ,
  `notificacion` VARCHAR(45) NULL ,
  `id_usuario` INT NOT NULL ,
  `hora_entrada` TIME NULL ,
  `hora_salida` TIME NULL ,
  `id_canal` INT NOT NULL ,
  `id_responsable_entrada` INT NULL ,
  `lugar_entrada` VARCHAR(45) NULL ,
  `llaves_entregadas` INT NULL ,
  `llaves_devueltas` INT NULL ,
  `id_responsable_salida` INT NULL ,
  `fianza_estado` VARCHAR(45) NULL ,
  `revision_salida_comentarios` TEXT NULL ,
  `parking_numero` TEXT NULL ,
  `parking_llaves_entregadas` INT NULL ,
  `parking_mandos_entregados` INT NULL ,
  `parking_llaves_devueltas` INT NULL ,
  `parking_mandos_devueltos` INT NULL ,
  PRIMARY KEY (`id_reservacion`) ,
  INDEX `fk_reservaciones_apartamentos1_idx` (`id_apartamento` ASC) ,
  INDEX `fk_reservaciones_usuarios1_idx` (`id_usuario` ASC) ,
  INDEX `fk_reservaciones_canales1_idx` (`id_canal` ASC) ,
  INDEX `fk_reservaciones_usuarios2_idx` (`id_responsable_entrada` ASC) ,
  INDEX `fk_reservaciones_usuarios3_idx` (`id_responsable_salida` ASC) ,
  CONSTRAINT `fk_reservaciones_apartamentos1`
    FOREIGN KEY (`id_apartamento` )
    REFERENCES `clickandbooking`.`apartamentos` (`id_apartamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservaciones_usuarios1`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `clickandbooking`.`usuarios` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservaciones_canales1`
    FOREIGN KEY (`id_canal` )
    REFERENCES `clickandbooking`.`canales` (`id_canal` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservaciones_usuarios2`
    FOREIGN KEY (`id_responsable_entrada` )
    REFERENCES `clickandbooking`.`usuarios` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservaciones_usuarios3`
    FOREIGN KEY (`id_responsable_salida` )
    REFERENCES `clickandbooking`.`usuarios` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`opiniones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`opiniones` (
  `id_opinion` INT NOT NULL AUTO_INCREMENT ,
  `opinion` TEXT NULL ,
  `puntuacion` DOUBLE NULL ,
  `fecha_creacion` TIMESTAMP NULL ,
  `ultima_actualizacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `id_apartamento` INT NOT NULL ,
  `id_usuario` INT NOT NULL ,
  `id_reservacion` INT NULL ,
  PRIMARY KEY (`id_opinion`) ,
  INDEX `fk_opiniones_apartamentos1_idx` (`id_apartamento` ASC) ,
  INDEX `fk_opiniones_usuarios1_idx` (`id_usuario` ASC) ,
  INDEX `fk_opiniones_reservaciones1_idx` (`id_reservacion` ASC) ,
  CONSTRAINT `fk_opiniones_apartamentos1`
    FOREIGN KEY (`id_apartamento` )
    REFERENCES `clickandbooking`.`apartamentos` (`id_apartamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_opiniones_usuarios1`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `clickandbooking`.`usuarios` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_opiniones_reservaciones1`
    FOREIGN KEY (`id_reservacion` )
    REFERENCES `clickandbooking`.`reservaciones` (`id_reservacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`huespedes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`huespedes` (
  `id_huesped` INT NOT NULL AUTO_INCREMENT ,
  `id_usuario` INT NOT NULL ,
  `id_direccion` INT NULL ,
  PRIMARY KEY (`id_huesped`) ,
  INDEX `fk_huesped_usuarios1_idx` (`id_usuario` ASC) ,
  INDEX `fk_huespedes_direcciones1_idx` (`id_direccion` ASC) ,
  CONSTRAINT `fk_huesped_usuarios1`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `clickandbooking`.`usuarios` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_huespedes_direcciones1`
    FOREIGN KEY (`id_direccion` )
    REFERENCES `clickandbooking`.`direcciones` (`id_direccion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`disponibilidades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`disponibilidades` (
  `id_disponibilidad` INT NOT NULL AUTO_INCREMENT ,
  `fecha_inicio` DATETIME NULL ,
  `fecha_final` DATETIME NULL ,
  `precio` DOUBLE NULL ,
  `precio_fin_semana` DOUBLE NULL ,
  `estatus` VARCHAR(45) NULL ,
  `id_apartamento` INT NOT NULL ,
  `anotacion` TEXT NULL ,
  PRIMARY KEY (`id_disponibilidad`) ,
  INDEX `fk_disponbilidades_apartamentos1_idx` (`id_apartamento` ASC) ,
  CONSTRAINT `fk_disponbilidades_apartamentos1`
    FOREIGN KEY (`id_apartamento` )
    REFERENCES `clickandbooking`.`apartamentos` (`id_apartamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`subscripciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`subscripciones` (
  `id_subscripcion` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(45) NULL ,
  `estatus` VARCHAR(45) NULL ,
  `tiempo_creacion` TIMESTAMP NULL ,
  `ultima_modificacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id_subscripcion`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`huespedes_cuentas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`huespedes_cuentas` (
  `id_huesped` INT NOT NULL ,
  `id_cuenta` INT NOT NULL ,
  `id_huesped_cuenta` INT NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`id_huesped_cuenta`) ,
  INDEX `fk_huespedes_has_cuentas_cuentas1_idx` (`id_cuenta` ASC) ,
  INDEX `fk_huespedes_has_cuentas_huespedes1_idx` (`id_huesped` ASC) ,
  CONSTRAINT `fk_huespedes_has_cuentas_huespedes1`
    FOREIGN KEY (`id_huesped` )
    REFERENCES `clickandbooking`.`huespedes` (`id_huesped` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_huespedes_has_cuentas_cuentas1`
    FOREIGN KEY (`id_cuenta` )
    REFERENCES `clickandbooking`.`cuentas` (`id_cuenta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`ciudades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`ciudades` (
  `id_ciudad` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `id_provincia` INT NOT NULL ,
  `codigo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_ciudad`) ,
  INDEX `fk_ciudades_provincias1_idx` (`id_provincia` ASC) ,
  CONSTRAINT `fk_ciudades_provincias1`
    FOREIGN KEY (`id_provincia` )
    REFERENCES `clickandbooking`.`provincias` (`id_provincia` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`articulos_tipos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`articulos_tipos` (
  `id_articulo_tipo` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_articulo_tipo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`articulos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`articulos` (
  `id_articulo` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(80) NULL ,
  `codigo` VARCHAR(45) NULL ,
  `id_articulo_tipo` INT NOT NULL ,
  `precio_base` DOUBLE NULL ,
  `por_persona` TINYINT(1) NULL ,
  `configurar_por` VARCHAR(45) NULL ,
  `pax_minimo` VARCHAR(45) NULL ,
  `pax_maximo` VARCHAR(45) NULL ,
  `regular_stock` VARCHAR(45) NULL ,
  `solo_adultos` TINYINT(1) NULL ,
  `solo_ninios` TINYINT(1) NULL ,
  `consumo_obligatorio` TINYINT(1) NULL ,
  `establecer_horarios` TEXT NULL ,
  `descripcion` TEXT NULL ,
  `id_idioma` INT NOT NULL ,
  PRIMARY KEY (`id_articulo`) ,
  INDEX `fk_articulos_articulos_tipos1_idx` (`id_articulo_tipo` ASC) ,
  INDEX `fk_articulos_idiomas1_idx` (`id_idioma` ASC) ,
  CONSTRAINT `fk_articulos_articulos_tipos1`
    FOREIGN KEY (`id_articulo_tipo` )
    REFERENCES `clickandbooking`.`articulos_tipos` (`id_articulo_tipo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articulos_idiomas1`
    FOREIGN KEY (`id_idioma` )
    REFERENCES `clickandbooking`.`idiomas` (`id_idioma` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`articulos_adjuntos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`articulos_adjuntos` (
  `id_articulo` INT NOT NULL ,
  `id_adjunto` INT NOT NULL ,
  `id_articulo_adjunto` INT NOT NULL AUTO_INCREMENT ,
  INDEX `fk_articulos_has_adjuntos_adjuntos1_idx` (`id_adjunto` ASC) ,
  INDEX `fk_articulos_has_adjuntos_articulos1_idx` (`id_articulo` ASC) ,
  PRIMARY KEY (`id_articulo_adjunto`) ,
  CONSTRAINT `fk_articulos_has_adjuntos_articulos1`
    FOREIGN KEY (`id_articulo` )
    REFERENCES `clickandbooking`.`articulos` (`id_articulo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articulos_has_adjuntos_adjuntos1`
    FOREIGN KEY (`id_adjunto` )
    REFERENCES `clickandbooking`.`adjuntos` (`id_adjunto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`apartamentos_articulos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`apartamentos_articulos` (
  `id_apartamento` INT NOT NULL ,
  `id_articulo` INT NOT NULL ,
  `id_apartamento_articulo` INT NOT NULL AUTO_INCREMENT ,
  INDEX `fk_apartamentos_has_articulos_articulos1_idx` (`id_articulo` ASC) ,
  INDEX `fk_apartamentos_has_articulos_apartamentos1_idx` (`id_apartamento` ASC) ,
  PRIMARY KEY (`id_apartamento_articulo`) ,
  CONSTRAINT `fk_apartamentos_has_articulos_apartamentos1`
    FOREIGN KEY (`id_apartamento` )
    REFERENCES `clickandbooking`.`apartamentos` (`id_apartamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apartamentos_has_articulos_articulos1`
    FOREIGN KEY (`id_articulo` )
    REFERENCES `clickandbooking`.`articulos` (`id_articulo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`reservaciones_pagos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`reservaciones_pagos` (
  `id_reservacion_pago` INT NOT NULL AUTO_INCREMENT ,
  `id_reservacion` INT NOT NULL ,
  `forma_pago` VARCHAR(45) NULL ,
  `autorizacion` TEXT NULL ,
  `request` TEXT NULL ,
  `importe` DOUBLE NULL ,
  `concepto` TEXT NULL ,
  `estado` VARCHAR(45) NULL ,
  `tiempo_creacion` TIMESTAMP NULL ,
  `ultima_modificacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `origen` VARCHAR(45) NULL ,
  `validada` TINYINT(1) NULL ,
  `comentario` TEXT NULL ,
  `tipo` VARCHAR(45) NULL ,
  `id_cuenta` INT NULL ,
  PRIMARY KEY (`id_reservacion_pago`) ,
  INDEX `fk_reservaciones_pagos_reservaciones1_idx` (`id_reservacion` ASC) ,
  INDEX `fk_reservaciones_pagos_cuentas1_idx` (`id_cuenta` ASC) ,
  CONSTRAINT `fk_reservaciones_pagos_reservaciones1`
    FOREIGN KEY (`id_reservacion` )
    REFERENCES `clickandbooking`.`reservaciones` (`id_reservacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservaciones_pagos_cuentas1`
    FOREIGN KEY (`id_cuenta` )
    REFERENCES `clickandbooking`.`cuentas` (`id_cuenta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`empresas_cuentas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`empresas_cuentas` (
  `id_empresa` INT NOT NULL ,
  `id_cuenta` INT NOT NULL ,
  `id_empresa_cuenta` INT NOT NULL AUTO_INCREMENT ,
  INDEX `fk_empresas_has_cuentas_cuentas1_idx` (`id_cuenta` ASC) ,
  INDEX `fk_empresas_has_cuentas_empresas1_idx` (`id_empresa` ASC) ,
  PRIMARY KEY (`id_empresa_cuenta`) ,
  CONSTRAINT `fk_empresas_has_cuentas_empresas1`
    FOREIGN KEY (`id_empresa` )
    REFERENCES `clickandbooking`.`empresas` (`id_empresa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresas_has_cuentas_cuentas1`
    FOREIGN KEY (`id_cuenta` )
    REFERENCES `clickandbooking`.`cuentas` (`id_cuenta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`usuarios_registros`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`usuarios_registros` (
  `id_usuario_registro` INT NOT NULL AUTO_INCREMENT ,
  `id_usuario` INT NULL ,
  `tiempo_creacion` TIMESTAMP NULL ,
  `tipo` VARCHAR(45) NULL ,
  `movimiento` TEXT NULL ,
  PRIMARY KEY (`id_usuario_registro`) ,
  INDEX `fk_usuarios_registros_usuarios1_idx` (`id_usuario` ASC) ,
  CONSTRAINT `fk_usuarios_registros_usuarios1`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `clickandbooking`.`usuarios` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`apartamentos_documentos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`apartamentos_documentos` (
  `id_apartamento_documento` INT NOT NULL AUTO_INCREMENT ,
  `id_apartamento` INT NOT NULL ,
  `id_adjunto` INT NOT NULL ,
  `tipo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_apartamento_documento`) ,
  INDEX `fk_apartamentos_documentos_apartamentos1_idx` (`id_apartamento` ASC) ,
  INDEX `fk_apartamentos_documentos_adjuntos1_idx` (`id_adjunto` ASC) ,
  CONSTRAINT `fk_apartamentos_documentos_apartamentos1`
    FOREIGN KEY (`id_apartamento` )
    REFERENCES `clickandbooking`.`apartamentos` (`id_apartamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apartamentos_documentos_adjuntos1`
    FOREIGN KEY (`id_adjunto` )
    REFERENCES `clickandbooking`.`adjuntos` (`id_adjunto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`complejos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`complejos` (
  `id_complejo` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_complejo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`complejos_apartamentos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`complejos_apartamentos` (
  `id_complejo` INT NOT NULL ,
  `id_apartamento` INT NOT NULL ,
  `id_complejo_apartamento` INT NOT NULL AUTO_INCREMENT ,
  INDEX `fk_complejos_has_apartamentos_apartamentos1_idx` (`id_apartamento` ASC) ,
  INDEX `fk_complejos_has_apartamentos_complejos1_idx` (`id_complejo` ASC) ,
  PRIMARY KEY (`id_complejo_apartamento`) ,
  CONSTRAINT `fk_complejos_has_apartamentos_complejos1`
    FOREIGN KEY (`id_complejo` )
    REFERENCES `clickandbooking`.`complejos` (`id_complejo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_complejos_has_apartamentos_apartamentos1`
    FOREIGN KEY (`id_apartamento` )
    REFERENCES `clickandbooking`.`apartamentos` (`id_apartamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`mantenimientos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`mantenimientos` (
  `id_mantenimiento` INT NOT NULL AUTO_INCREMENT ,
  `id_apartamento` INT NOT NULL ,
  `tiempo_creacion` TIMESTAMP NULL ,
  `ultima_modificacion` TIMESTAMP NULL ,
  `ubicacion` TEXT NULL ,
  `solicitante` TEXT NULL ,
  `trabajos_solicitados` TEXT NULL ,
  `informe_tecnico` TEXT NULL ,
  `observaciones` TEXT NULL ,
  `estatus` TEXT NULL ,
  `fecha_cierre` DATE NULL ,
  `id_reservacion` INT NULL ,
  PRIMARY KEY (`id_mantenimiento`) ,
  INDEX `fk_mantenimientos_apartamentos1_idx` (`id_apartamento` ASC) ,
  INDEX `fk_mantenimientos_reservaciones1_idx` (`id_reservacion` ASC) ,
  CONSTRAINT `fk_mantenimientos_apartamentos1`
    FOREIGN KEY (`id_apartamento` )
    REFERENCES `clickandbooking`.`apartamentos` (`id_apartamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mantenimientos_reservaciones1`
    FOREIGN KEY (`id_reservacion` )
    REFERENCES `clickandbooking`.`reservaciones` (`id_reservacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`mantenimientos_materiales`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`mantenimientos_materiales` (
  `id_mantenimiento_marterial` INT NOT NULL AUTO_INCREMENT ,
  `cantidad` DOUBLE NULL ,
  `descripcion` TEXT NULL ,
  `id_mantenimiento` INT NOT NULL ,
  PRIMARY KEY (`id_mantenimiento_marterial`) ,
  INDEX `fk_mantenimientos_materiales_mantenimientos1_idx` (`id_mantenimiento` ASC) ,
  CONSTRAINT `fk_mantenimientos_materiales_mantenimientos1`
    FOREIGN KEY (`id_mantenimiento` )
    REFERENCES `clickandbooking`.`mantenimientos` (`id_mantenimiento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`mantenimientos_personal`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`mantenimientos_personal` (
  `id_mantenimiento_personal` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NULL ,
  `fecha` DATE NULL ,
  `inicio` TIME NULL ,
  `final` TIME NULL ,
  `horas` DOUBLE NULL ,
  `estatus` VARCHAR(45) NULL ,
  `id_mantenimiento` INT NOT NULL ,
  PRIMARY KEY (`id_mantenimiento_personal`) ,
  INDEX `fk_mantenimientos_personal_mantenimientos1_idx` (`id_mantenimiento` ASC) ,
  CONSTRAINT `fk_mantenimientos_personal_mantenimientos1`
    FOREIGN KEY (`id_mantenimiento` )
    REFERENCES `clickandbooking`.`mantenimientos` (`id_mantenimiento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`contratos_fechas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`contratos_fechas` (
  `id_disponibilidad` INT NOT NULL AUTO_INCREMENT ,
  `fecha_inicio` DATETIME NULL ,
  `fecha_final` DATETIME NULL ,
  `precio` DOUBLE NULL ,
  `anotacion` TEXT NULL ,
  `id_contrato` INT NOT NULL ,
  PRIMARY KEY (`id_disponibilidad`) ,
  INDEX `fk_contratos_fechas_contratos1_idx` (`id_contrato` ASC) ,
  CONSTRAINT `fk_contratos_fechas_contratos1`
    FOREIGN KEY (`id_contrato` )
    REFERENCES `clickandbooking`.`contratos` (`id_contrato` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`reservaciones_articulos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`reservaciones_articulos` (
  `id_reservacion` INT NOT NULL ,
  `id_articulo` INT NOT NULL ,
  `id_reservacion_articulo` INT NOT NULL AUTO_INCREMENT ,
  `cantidad` INT NULL ,
  `precio` DOUBLE NULL ,
  INDEX `fk_reservaciones_has_articulos_articulos1_idx` (`id_articulo` ASC) ,
  INDEX `fk_reservaciones_has_articulos_reservaciones1_idx` (`id_reservacion` ASC) ,
  PRIMARY KEY (`id_reservacion_articulo`) ,
  CONSTRAINT `fk_reservaciones_has_articulos_reservaciones1`
    FOREIGN KEY (`id_reservacion` )
    REFERENCES `clickandbooking`.`reservaciones` (`id_reservacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservaciones_has_articulos_articulos1`
    FOREIGN KEY (`id_articulo` )
    REFERENCES `clickandbooking`.`articulos` (`id_articulo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

ALTER TABLE  `disponibilidades` ADD  `precio_contrato` DOUBLE NULL

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
