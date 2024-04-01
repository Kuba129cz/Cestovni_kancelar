-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema cestovka
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cestovka
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cestovka` DEFAULT CHARACTER SET utf8 ;
USE `cestovka` ;

-- -----------------------------------------------------
-- Table `cestovka`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cestovka`.`User` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `nick` VARCHAR(45) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  `telefon` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `role` TINYINT NULL DEFAULT 0,
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cestovka`.`Strava`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cestovka`.`Strava` (
  `id_strava` TINYINT NOT NULL AUTO_INCREMENT,
  `typ_stravy` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_strava`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cestovka`.`Adresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cestovka`.`Adresa` (
  `id_Adresa` INT NOT NULL AUTO_INCREMENT,
  `stat` VARCHAR(45) NOT NULL,
  `mesto` VARCHAR(45) NOT NULL,
  `ulice` VARCHAR(45) NOT NULL,
  `cislo_popisne` INT NOT NULL,
  `psc` INT NOT NULL,
  `kategorie` VARCHAR(45) NOT NULL,
  `hodnoceni` DECIMAL(2,1) NULL,
  `image_path` VARCHAR(110) NULL,
  PRIMARY KEY (`id_Adresa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cestovka`.`Zajezd`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cestovka`.`Zajezd` (
  `id_zajezd` INT NOT NULL AUTO_INCREMENT,
  `datum_prijezdu` DATE NOT NULL,
  `datum_odjezdu` DATE NOT NULL,
  `cena_osoba` DECIMAL(7,2) NOT NULL,
  `popis` VARCHAR(10000) NULL,
  `fk_strava` TINYINT NOT NULL,
  `fk_Adresa` INT NOT NULL,
  PRIMARY KEY (`id_zajezd`),
  INDEX `fk_zajezd_Strava1_idx` (`fk_strava` ASC) VISIBLE,
  INDEX `fk_zajezd_Adresa1_idx` (`fk_Adresa` ASC) VISIBLE,
  CONSTRAINT `fk_zajezd_Strava1`
    FOREIGN KEY (`fk_strava`)
    REFERENCES `cestovka`.`Strava` (`id_strava`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_zajezd_Adresa1`
    FOREIGN KEY (`fk_Adresa`)
    REFERENCES `cestovka`.`Adresa` (`id_Adresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cestovka`.`Zakaznik`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cestovka`.`Zakaznik` (
  `id_zakaznik` INT NOT NULL AUTO_INCREMENT,
  `jmeno` VARCHAR(45) NOT NULL,
  `prijmeni` VARCHAR(45) NOT NULL,
  `datum_narozeni` DATE NOT NULL,
  `fk_Adresa` INT NOT NULL,
  `fk_user` INT NOT NULL,
  PRIMARY KEY (`id_zakaznik`),
  INDEX `fk_Zakaznik_Adresa1_idx` (`fk_Adresa` ASC) VISIBLE,
  INDEX `fk_Zakaznik_User1_idx` (`fk_user` ASC) VISIBLE,
  CONSTRAINT `fk_Zakaznik_Adresa1`
    FOREIGN KEY (`fk_Adresa`)
    REFERENCES `cestovka`.`Adresa` (`id_Adresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Zakaznik_User1`
    FOREIGN KEY (`fk_user`)
    REFERENCES `cestovka`.`User` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cestovka`.`Objednavka`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cestovka`.`Objednavka` (
  `id_objednavka` INT NOT NULL AUTO_INCREMENT,
  `pocet_osob` INT NOT NULL,
  `datum_vytvoreni` DATETIME NOT NULL,
  `fk_zajezd` INT NOT NULL,
  `fk_zakaznik` INT NOT NULL,
  PRIMARY KEY (`id_objednavka`),
  INDEX `fk_Objednavka_zajezd1_idx` (`fk_zajezd` ASC) VISIBLE,
  INDEX `fk_Objednavka_Zakaznik1_idx` (`fk_zakaznik` ASC) VISIBLE,
  CONSTRAINT `fk_Objednavka_zajezd1`
    FOREIGN KEY (`fk_zajezd`)
    REFERENCES `cestovka`.`Zajezd` (`id_zajezd`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Objednavka_Zakaznik1`
    FOREIGN KEY (`fk_zakaznik`)
    REFERENCES `cestovka`.`Zakaznik` (`id_zakaznik`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
