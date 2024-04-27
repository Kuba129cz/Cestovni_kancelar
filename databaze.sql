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

INSERT INTO `Adresa` (`id_Adresa`, `stat`, `mesto`, `ulice`, `cislo_popisne`, `psc`, `kategorie`, `hodnoceni`, `image_path`) VALUES
(1,	'Česká republika',	'Teplice nad Metují',	'Střmenské Podhradí 132',	132,	54954,	'Hory',	3.7,	'app/resources/images/tours/001_Teplice_nad_metuji'),
(2,	'Česká republika',	' Kokořín',	'Podhradí',	13,	54954,	'Památky',	2.7,	'app/resources/images/tours/2_Kokorin'),
(3,	'Česká republika',	'Sobotka',	'Hrubá skála',	5,	51101,	'Hory',	4.2,	'app/resources/images/tours/3_Sobotka'),
(4,	'Česká republika',	'Teplice nad Metují',	'Garni ',	1,	54954,	'Hory',	3.7,	'app/resources/images/tours/4_TeplicenadMetuji'),
(5,	'Česká republika',	'Hrubá Skála',	'Pražská',	27,	51101,	'Památky',	2.6,	'app/resources/images/tours/5_HrubaSkala'),
(6,	'Slovensko',	'Tatranská Polianka',	'Tatranská Polianka',	32,	5982,	'Hory',	4.8,	'app/resources/images/tours/6_TatranskaPolianka'),
(7,	'Slovensko',	'Terchová',	'Biely Potok',	664,	1306,	'Památky',	5.0,	'app/resources/images/tours/7_Terchova'),
(8,	'Slovensko',	'Turany',	'VaňovskáVaňovská',	26,	3853,	'Památky',	1.5,	'app/resources/images/tours/8_Turany'),
(9,	'Itálie',	'Pervagno',	'Via Roma',	1,	12010,	'Lyžování',	3.7,	'app/resources/images/tours/9_Pervagno'),
(10,	'Francie',	'Théoule sur Mer',	'avenue de Miramar',	47,	6590,	'Moře',	1.8,	'app/resources/images/tours/10_Theoule'),
(11,	'Francie',	'Nice',	'Promenade des Anglais',	31,	6000,	'Moře',	2.2,	'app/resources/images/tours/11_Nice'),
(12,	'Francie',	'La Garde-Freinet',	' Route de la Garde Freinet',	1609,	83680,	'Moře',	4.3,	'app/resources/images/tours/12_LaGard'),
(13,	'Francie',	'Provence',	'Avenue de Pérouse, Aix-en-Provence',	256,	13100,	'Památky',	4.6,	'app/resources/images/tours/13_Provence'),
(14,	'Česká republika',	'Adršpach',	'Dolní Adršpach',	10,	54947,	'Lyžování',	3.9,	'app/resources/images/tours/14_Adrspach'),
(15,	' Česká republika',	'Špindlerův Mlýn',	'Bedřichovská',	130,	54351,	'Lyžování',	2.6,	'app/resources/images/tours/15_SpindleruvMlyn'),
(16,	'Německo',	'Kötzting',	'Jahnstr',	42,	93444,	'Camping',	4.2,	'app/resources/images/tours/16_Kotzting'),
(17,	'Polsko',	'Kutno',	' Bitwy pod Kutnem',	22,	99300,	'Hory',	4.4,	'app/resources/images/tours/17_Kutno');

INSERT INTO `Strava` (`id_strava`, `typ_stravy`) VALUES
(1,	'Žádná penze'),
(2,	'Snídaně'),
(3,	'Polopenze'),
(4,	'Plná penze'),
(5,	'All-inclusive');

INSERT INTO `User` (`id_user`, `nick`, `password`, `telefon`, `email`, `role`) VALUES
(1,	'admin',	'$2y$10$ee41Zbj2nm.L4iKXtn0ykeH9lWd3uZuYmd04gNk9niQ1g53IYkCdO',	'',	'',	2);

INSERT INTO `Zajezd` (`id_zajezd`, `datum_prijezdu`, `datum_odjezdu`, `cena_osoba`, `popis`, `fk_strava`, `fk_Adresa`) VALUES
(1,	'2024-04-01',	'2024-04-03',	2500.00,	'Společně s Adršpachem jsou Teplice nad Metují místem, kde začínají výlety do Adršpašsko-teplických skal, největšího pískovcového skalního města ve střední Evropě. Pozornost si zaslouží i Supí skály a zámeček Bischofstein, který si oblíbil spisovatel Alois Jirásek.',	2,	1),
(2,	'2024-04-10',	'2024-04-12',	3800.00,	'Kokořínský Důl, zasazený do okresu Mělník, nabízí malebné údolí zdobené pískovcovými soutěskami a různorodými skalními útvary. Prozkoumejte 14 kilometrů dlouhé údolí, začínající v Ráji a končící na nádraží Lhotka u Mělníka. Tato malebná oblast je součástí Českého ráje.',	4,	2),
(3,	'2024-04-20',	'2024-04-22',	2200.00,	'Český Ráj, známý také jako Ráj Čech, se pyšní koncentrací přírodních a historických pokladů. Prozkoumejte oblast ohraničenou Mladou Boleslaví, Mnichovým Hradištěm, Hodkovicemi nad Mohelkou a Jičínem. Objevte Skalní korunu, Řeznickou sekyru a další ikonické útvary.',	3,	3),
(4,	'2024-05-05',	'2024-05-07',	2900.00,	'Teplické skály, rozšíření Národní přírodní rezervace Adršpašsko-teplické skály, okouzlují divokými skalními labyrinty, vysokými útvary a kouzelnými krajinami. Sledujte modře značenou stezku na 6 kilometrové cestě. Nezapomeňte na Skalní korunu a Krakonošovu zahradu.',	2,	4),
(5,	'2024-05-15',	'2024-05-17',	4500.00,	'Hruboskalsko, největší pískovcové město v Českém ráji, láká dobrodruhy. Prozkoumejte jeho impozantní útvary, včetně Ledního medvěda, Golema, Řeznické sekyry a dalších. Nezapomeňte na Skalní korunu a Krakonošovu zahradu.',	4,	5),
(6,	'2024-05-25',	'2024-05-27',	3669.00,	'Adršpašsko-teplické skály, pojmenované podle blízkých obcí Adršpach a Teplice nad Metují, nabízejí divoký labyrint pískovcových útvarů. Prozkoumejte 6 kilometrovou modře značenou stezku a objevte bohatou přírodní krásu a historii.',	3,	14),
(7,	'2024-06-03',	'2024-06-05',	2700.00,	'Český Ráj, známý také jako Ráj Čech, se pyšní koncentrací přírodních a historických pokladů. Prozkoumejte oblast ohraničenou Mladou Boleslaví, Mnichovým Hradištěm, Hodkovicemi nad Mohelkou a Jičínem. Objevte Skalní korunu, Řeznickou sekyru a další ikonické útvary.',	2,	3),
(8,	'2024-04-12',	'2024-04-14',	5000.00,	'Vysoké Tatry na Slovensku se pyšní majestátními vrcholy, průzračnými jezery a alpskými loukami. Vydejte se na vzrušující túry, obdivujte dechberoucí výhledy a ponořte se do drsné krásy této horské říše.',	4,	6),
(9,	'2024-04-22',	'2024-04-24',	3500.00,	'Bavte se v Bavorském lese, kde se setkávají tajemné lesy, horské jezera a malebné vesničky. Prozkoumejte nekonečné stezky, sledujte stopy divokých zvířat a užijte si klidný únik do přírody.',	1,	16),
(10,	'2024-05-05',	'2024-05-07',	2900.00,	'Dunajský lom je skrytým pokladem. Modré vody bývalého vápencového lomu obklopené dramatickými útesy lákají k plavání, turistice a fotografování.',	1,	7),
(12,	'2024-05-25',	'2024-05-27',	3200.00,	'Malá Fatra je snem každého turisty. Prozkoumejte hluboká údolí, drsné hřebeny a bujný les. Nezapomeňte na ikonický vrchol Veľký Rozsutec s panoramatickými výhledy.',	3,	8),
(13,	'2024-06-03',	'2024-06-05',	2700.00,	'Krkonoše nabízejí krásné horské scenérie, zasněžené vrcholy a nezkažené stezky. Ať už lyžujete v zimě nebo pěšíte v létě, tyto hory slibují nezapomenutelná dobrodružství.',	2,	15),
(14,	'2024-06-12',	'2024-06-14',	4000.00,	'Bavte se v Bavorském lese, kde se setkávají tajemné lesy, horské jezera a malebné vesničky. Prozkoumejte nekonečné stezky, sledujte stopy divokých zvířat a užijte si klidný únik do přírody.',	1,	16),
(15,	'2024-06-22',	'2024-06-24',	2800.00,	'Vysoké Tatry na Slovensku se pyšní majestátními vrcholy, průzračnými jezery a alpskými loukami. Vydejte se na vzrušující túry, obdivujte dechberoucí výhledy a ponořte se do drsné krásy této horské říše.',	2,	6),
(16,	'2024-07-02',	'2024-07-04',	3300.00,	'Dunajský lom je skrytým pokladem. Modré vody bývalého vápencového lomu obklopené dramatickými útesy lákají k plavání, turistice a fotografování.',	3,	7),
(17,	'2024-06-12',	'2024-06-14',	2600.00,	'Krkonoše nabízejí krásné horské scenérie, zasněžené vrcholy a nezkažené stezky. Ať už lyžujete v zimě nebo pěšíte v létě, tyto hory slibují nezapomenutelná dobrodružství.',	2,	17),
(18,	'2024-07-22',	'2024-07-24',	4200.00,	'Malá Fatra je snem každého turisty. Prozkoumejte hluboká údolí, drsné hřebeny a bujný les. Nezapomeňte na ikonický vrchol Veľký Rozsutec s panoramatickými výhledy.',	4,	8),
(20,	'2024-08-10',	'2024-08-12',	2500.00,	'Vysoké Tatry na Slovensku se pyšní majestátními vrcholy, průzračnými jezery a alpskými loukami. Vydejte se na vzrušující túry, obdivujte dechberoucí výhledy a ponořte se do drsné krásy této horské říše.',	2,	6),
(21,	'2024-10-19',	'2024-10-29',	17900.00,	'Přímořské Alpy jsou nejjižnější částí západních Alp, které se rozkládají převážně ve Francii a částečně v Itálii. Tato oblast je jednou z nejkrásnějších a nejdivočejších horských oblastí Alp, s velkým množstvím horských jezer a odlehlými kouty. Hlavním výchozím bodem pro túry v tomto pohoří je malebná vesnice Valdieri.',	5,	9),
(22,	'2024-09-15',	'2024-09-22',	13490.00,	'Azurové pobřeží, známé také jako Francouzská Riviéra, je jednou z nejznámějších rekreačních oblastí na pobřeží Středozemního moře. Rozkládá se mezi městy Menton poblíž italských hranic a Cassis. Tato oblast je známá svými malebnými městečky a bohatými přírodními a historickými krásami.',	5,	10),
(23,	'2024-06-05',	'2024-06-12',	9890.00,	'Cote d’Azur, známá v angličtině jako French Riviera, je středomořské pobřeží jihovýchodního rohu Francie. Tato oblast je známá svými přímořskými letovisky jako jsou Cap-d’Ail, Beaulieu-sur-Mer, Saint-Jean-Cap-Ferrat, Villefranche-sur-Mer, Antibes, Juan-les-Pins, Cannes a Theoule-sur-Mer.',	5,	11),
(24,	'2024-07-01',	'2024-07-08',	14750.00,	'Francouzská Riviéra, známá také jako Azurové pobřeží, je jedna z nejznámějších rekreačních oblastí na pobřeží Středozemního moře. Tato oblast je ohraničena Jižními Alpami na severu a je ekonomicky třetím nejvýkonnějším regionem Francie. Hlavními turistickými destinacemi Azurového pobřeží jsou Menton, Monaco, Nice, Antibes-Juan-les-Pins, Cannes, Grasse, Fréjus, Saint-Raphaël, Sainte-Maxime, Saint-Tropez, Le Lavandou a Hyères.',	4,	12),
(26,	'2024-04-14',	'2024-04-14',	42069.00,	'Výlet do Bradavic. You are a wizzard Harry.',	2,	2);