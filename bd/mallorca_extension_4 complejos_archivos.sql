SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
---------------------------------------------------------------------------

DROP TABLE IF EXISTS complejos_adjuntos;

CREATE TABLE IF NOT EXISTS `complejos_adjuntos` (
  `id_complejo_adjunto` INT NOT NULL AUTO_INCREMENT,
  `id_complejo` INT NULL,
  `id_adjunto` INT NULL,
  PRIMARY KEY (`id_complejo_adjunto`),
  INDEX `fk_complejo_adjunto1_idx` (`id_adjunto` ASC),
  CONSTRAINT `fk_complejo_adjunto1`
    FOREIGN KEY (`id_adjunto`)
    REFERENCES `adjuntos` (`id_adjunto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  INDEX `fk_complejo_adjuntoc1_idx` (`id_complejo` ASC),
  CONSTRAINT `fk_complejo_adjuntoc1`
    FOREIGN KEY (`id_complejo`)
    REFERENCES `complejos` (`id_complejo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

ALTER TABLE complejos ADD descripcion TEXT NULL;

---------------------------------------------------------------------------
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;