-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema autohub_rating_system
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema autohub_rating_system
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `autohub_rating_system` DEFAULT CHARACTER SET utf8mb3 ;
USE `autohub_rating_system` ;

-- -----------------------------------------------------
-- Table `autohub_rating_system`.`failed_jobs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `autohub_rating_system`.`failed_jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` VARCHAR(255) NOT NULL,
  `connection` TEXT NOT NULL,
  `queue` TEXT NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `exception` LONGTEXT NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `failed_jobs_uuid_unique` (`uuid` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `autohub_rating_system`.`migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `autohub_rating_system`.`migrations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `autohub_rating_system`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `autohub_rating_system`.`password_resets` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `autohub_rating_system`.`personal_access_tokens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `autohub_rating_system`.`personal_access_tokens` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` VARCHAR(255) NOT NULL,
  `tokenable_id` BIGINT UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `token` VARCHAR(64) NOT NULL,
  `abilities` TEXT NULL DEFAULT NULL,
  `last_used_at` TIMESTAMP NULL DEFAULT NULL,
  `expires_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `personal_access_tokens_token_unique` (`token` ASC) VISIBLE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type` ASC, `tokenable_id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `autohub_rating_system`.`systems`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `autohub_rating_system`.`systems` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `system_name` VARCHAR(45) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  `active` VARCHAR(45) NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 17
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `autohub_rating_system`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `autohub_rating_system`.`users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `email_verified_at` TIMESTAMP NULL DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`email` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `autohub_rating_system`.`questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `autohub_rating_system`.`questions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `status` VARCHAR(45) NULL,
  `active` VARCHAR(45) NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `autohub_rating_system`.`questionnaires`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `autohub_rating_system`.`questionnaires` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `systems_id` INT NOT NULL,
  `template_name` VARCHAR(45) NULL,
  `q1` INT NULL,
  `q2` INT NULL,
  `q3` INT NULL,
  `q4` INT NULL,
  `q5` INT NULL,
  `q6` INT NULL,
  `q7` INT NULL,
  `q8` INT NULL,
  `q9` INT NULL,
  `q10` INT NULL,
  `created_at` DATETIME NULL DEFAULT NOW(),
  `updated_at` DATETIME NULL,
  `status` VARCHAR(45) NULL,
  `active` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `system_id_idx` (`systems_id` ASC) VISIBLE,
  CONSTRAINT `systems_id`
    FOREIGN KEY (`systems_id`)
    REFERENCES `autohub_rating_system`.`systems` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
