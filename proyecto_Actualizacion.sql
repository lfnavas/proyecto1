-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema proyecto_Actualizacion
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `proyecto_Actualizacion` ;

-- -----------------------------------------------------
-- Schema proyecto_Actualizacion
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `proyecto_Actualizacion` DEFAULT CHARACTER SET utf8 ;
SHOW WARNINGS;
USE `proyecto_Actualizacion` ;

-- -----------------------------------------------------
-- Table `genero`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `genero` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `genero` (
  `id_genero` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_genero`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuario` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` INT NULL AUTO_INCREMENT,
  `documento` MEDIUMTEXT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `semestre` INT NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `contrasena` VARCHAR(45) NOT NULL,
  `id_genero` INT NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `estilo_ha`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `estilo_ha` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `estilo_ha` (
  `id_estilo` INT NOT NULL AUTO_INCREMENT,
  `nombre_estilo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_estilo`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `estrategia_ha`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `estrategia_ha` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `estrategia_ha` (
  `id_estrategia` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NOT NULL,
  `id_estilo` INT NOT NULL,
  PRIMARY KEY (`id_estrategia`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `situacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `situacion` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `situacion` (
  `id_situacion` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(200) NOT NULL,
  `id_estilo` INT NOT NULL,
  PRIMARY KEY (`id_situacion`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `usuario_selecciona_situacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuario_selecciona_situacion` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `usuario_selecciona_situacion` (
  `id_usuario` INT NOT NULL,
  `id_situacion` INT NOT NULL,
  PRIMARY KEY (`id_usuario`, `id_situacion`))
ENGINE = InnoDB
COMMENT = '	';

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `resultado_test_ha`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `resultado_test_ha` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `resultado_test_ha` (
  `id_resultado` INT NOT NULL AUTO_INCREMENT,
  `activo` INT NOT NULL,
  `reflexivo` INT NOT NULL,
  `teorico` INT NOT NULL,
  `pragmatico` INT NOT NULL,
  `idusuario` INT NOT NULL,
  PRIMARY KEY (`id_resultado`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `administrador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `administrador` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `administrador` (
  `id_administrador` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NOT NULL,
  `contrasena` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_administrador`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `programa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `programa` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `programa` (
  `id_programa` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `duracion` INT NOT NULL,
  `modalidad` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_programa`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `usuario_tiene_programa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuario_tiene_programa` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `usuario_tiene_programa` (
  `id_usuario` INT NOT NULL,
  `id_programa` INT NOT NULL,
  PRIMARY KEY (`id_usuario`, `id_programa`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Data for table `genero`
-- -----------------------------------------------------
START TRANSACTION;
USE `proyecto_Actualizacion`;
INSERT INTO `genero` (`id_genero`, `descripcion`) VALUES (1, 'Masculino');
INSERT INTO `genero` (`id_genero`, `descripcion`) VALUES (2, 'Femenino');

COMMIT;


-- -----------------------------------------------------
-- Data for table `estilo_ha`
-- -----------------------------------------------------
START TRANSACTION;
USE `proyecto_Actualizacion`;
INSERT INTO `estilo_ha` (`id_estilo`, `nombre_estilo`) VALUES (1, 'Activo');
INSERT INTO `estilo_ha` (`id_estilo`, `nombre_estilo`) VALUES (2, 'Reflexivo');
INSERT INTO `estilo_ha` (`id_estilo`, `nombre_estilo`) VALUES (3, 'Teorico');
INSERT INTO `estilo_ha` (`id_estilo`, `nombre_estilo`) VALUES (4, 'Practico');

COMMIT;


-- -----------------------------------------------------
-- Data for table `programa`
-- -----------------------------------------------------
START TRANSACTION;
USE `proyecto_Actualizacion`;
INSERT INTO `programa` (`id_programa`, `nombre`, `duracion`, `modalidad`) VALUES (1, 'Ingenieria Industrial', 10, 'Presencial');
INSERT INTO `programa` (`id_programa`, `nombre`, `duracion`, `modalidad`) VALUES (2, 'Arquitectura', 10, 'Presencial');
INSERT INTO `programa` (`id_programa`, `nombre`, `duracion`, `modalidad`) VALUES (3, 'Ingenieria de Sistemas', 10, 'Presencial');
INSERT INTO `programa` (`id_programa`, `nombre`, `duracion`, `modalidad`) VALUES (4, 'Ciencias del Deporte y la Actividad Fisica', 9, 'Presencial');
INSERT INTO `programa` (`id_programa`, `nombre`, `duracion`, `modalidad`) VALUES (5, 'Psicologia', 10, 'Presencial');
INSERT INTO `programa` (`id_programa`, `nombre`, `duracion`, `modalidad`) VALUES (6, 'Trabajo Social', 10, 'Presencial');
INSERT INTO `programa` (`id_programa`, `nombre`, `duracion`, `modalidad`) VALUES (7, 'Licenciatura en Pedagogia Infantil', 8, 'Presencial');
INSERT INTO `programa` (`id_programa`, `nombre`, `duracion`, `modalidad`) VALUES (8, 'Licenciatura en Lingüistica y Literatura', 8, 'Presencial');
INSERT INTO `programa` (`id_programa`, `nombre`, `duracion`, `modalidad`) VALUES (9, 'Derecho', 10, 'Presencial');
INSERT INTO `programa` (`id_programa`, `nombre`, `duracion`, `modalidad`) VALUES (10, 'Administración de Empresas', 10, 'Presencial');
INSERT INTO `programa` (`id_programa`, `nombre`, `duracion`, `modalidad`) VALUES (11, 'Contaduria Publica', 10, 'Presencial');
INSERT INTO `programa` (`id_programa`, `nombre`, `duracion`, `modalidad`) VALUES (12, 'Economia - Administracion de Empresas', 8, 'Presencial');
INSERT INTO `programa` (`id_programa`, `nombre`, `duracion`, `modalidad`) VALUES (13, 'Administracion de Empresas', 10, 'Distancia');
INSERT INTO `programa` (`id_programa`, `nombre`, `duracion`, `modalidad`) VALUES (14, 'Administracion Publica', 8, 'Distancia');
INSERT INTO `programa` (`id_programa`, `nombre`, `duracion`, `modalidad`) VALUES (15, 'Administracion Turistica', 8, 'Distancia');

COMMIT;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
