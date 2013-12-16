SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
---------------------------------------------------------------------------

ALTER TABLE idiomas ADD codigo VARCHAR(10) NULL;

DELETE FROM idiomas;
ALTER TABLE `mallorcavikat`.`idiomas` 
CHANGE COLUMN `id_idioma` `id_idioma` INT(11) NOT NULL ,
CHANGE COLUMN `nombre` `nombre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL ;

INSERT INTO `idiomas` (`id_idioma`, `nombre`, `codigo`) VALUES 
  (1, 'Español', 'es'),
  (2, 'English', 'en'),
  (3, 'Deutsch', 'de'),
  (4, 'Français', 'fr'),
  (5, 'Italiano', 'it'),
  (6, '简体中文', 'zh'),
  (7, 'Русский', 'ru'),
  (8, 'Čeština', 'cs'),
  (9, '日本語', 'ja'),
  (10, 'Português', 'pt');


---------------------------------------------------------------------------
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
