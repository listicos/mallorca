SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `clickandbooking` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
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
  PRIMARY KEY (`id_direccion`) ,
  INDEX `fk_direcciones_paises_idx` (`id_pais` ASC) ,
  CONSTRAINT `fk_direcciones_paises`
    FOREIGN KEY (`id_pais` )
    REFERENCES `clickandbooking`.`paises` (`id_pais` )
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
  PRIMARY KEY (`id_empresa`) ,
  INDEX `fk_empresa_direcciones1_idx` (`id_direccion` ASC) ,
  CONSTRAINT `fk_empresa_direcciones1`
    FOREIGN KEY (`id_direccion` )
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
  `id_empresa` INT NOT NULL ,
  PRIMARY KEY (`id_cuenta`) ,
  INDEX `fk_cuentas_monedas1_idx` (`id_moneda` ASC) ,
  INDEX `fk_cuentas_empresas1_idx` (`id_empresa` ASC) ,
  CONSTRAINT `fk_cuentas_monedas1`
    FOREIGN KEY (`id_moneda` )
    REFERENCES `clickandbooking`.`monedas` (`id_moneda` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuentas_empresas1`
    FOREIGN KEY (`id_empresa` )
    REFERENCES `clickandbooking`.`empresas` (`id_empresa` )
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
  PRIMARY KEY (`id_usuario`) ,
  INDEX `fk_usuarios_usuarios_grupos1_idx` (`id_usuario_grupo` ASC) ,
  CONSTRAINT `fk_usuarios_usuarios_grupos1`
    FOREIGN KEY (`id_usuario_grupo` )
    REFERENCES `clickandbooking`.`usuarios_grupos` (`id_usuario_grupo` )
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
  `fecha_inicio` DATETIME NULL ,
  `fecha_fin` DATETIME NULL ,
  `precio` DOUBLE NULL ,
  `porcentaje` DOUBLE NULL ,
  PRIMARY KEY (`id_contrato`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clickandbooking`.`apartamentos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`apartamentos` (
  `id_apartamento` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(300) NULL ,
  `id_apartamentos_tipo` INT NOT NULL ,
  `id_direccion` INT NOT NULL ,
  `id_empresa` INT NOT NULL ,
  `id_moneda` INT NOT NULL ,
  `horario_entrada` TIME NULL ,
  `horario_salida` TIME NULL ,
  `descripcion_corta` VARCHAR(400) NULL ,
  `descripcion_larga` TEXT NULL ,
  `id_idioma` INT NOT NULL ,
  `descripcion_servicios` TEXT NULL ,
  `descripcion_condiciones` TEXT NULL ,
  `tiempo_creacion` TIMESTAMP NULL ,
  `ultima_modificacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `estatus` VARCHAR(45) NULL ,
  `id_usuario` INT NOT NULL ,
  `id_contrato` INT NOT NULL ,
  PRIMARY KEY (`id_apartamento`) ,
  INDEX `fk_apartamentos_apartamentos_tipos1_idx` (`id_apartamentos_tipo` ASC) ,
  INDEX `fk_apartamentos_direcciones1_idx` (`id_direccion` ASC) ,
  INDEX `fk_apartamentos_empresas1_idx` (`id_empresa` ASC) ,
  INDEX `fk_apartamentos_monedas1_idx` (`id_moneda` ASC) ,
  INDEX `fk_apartamentos_idiomas1_idx` (`id_idioma` ASC) ,
  INDEX `fk_apartamentos_usuarios1_idx` (`id_usuario` ASC) ,
  INDEX `fk_apartamentos_contratos1_idx` (`id_contrato` ASC) ,
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
  CONSTRAINT `fk_apartamentos_empresas1`
    FOREIGN KEY (`id_empresa` )
    REFERENCES `clickandbooking`.`empresas` (`id_empresa` )
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
  CONSTRAINT `fk_apartamentos_contratos1`
    FOREIGN KEY (`id_contrato` )
    REFERENCES `clickandbooking`.`contratos` (`id_contrato` )
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
  `ruta` VARCHAR(45) NULL ,
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
-- Table `clickandbooking`.`instalaciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clickandbooking`.`instalaciones` (
  `id_instalacion` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_instalacion`) )
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



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
