-- MySQL Script generated by MySQL Workbench
-- Sun Jun  4 23:59:04 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema projeto_usu
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `projeto_usu` ;

-- -----------------------------------------------------
-- Schema projeto_usu
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projeto_usu` DEFAULT CHARACTER SET utf8 ;
USE `projeto_usu` ;

-- -----------------------------------------------------
-- Table `projeto_usu`.`perfil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projeto_usu`.`perfil` ;

CREATE TABLE IF NOT EXISTS `projeto_usu`.`perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nome_perfil` varchar(45) NOT NULL COMMENT 'Administrador\\nCliente\\nModerador',
  PRIMARY KEY (`id_perfil`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nome_perfil`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Moderador');

-- -----------------------------------------------------
-- Table `projeto_usu`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projeto_usu`.`usuario` ;

CREATE TABLE `usuario` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_usu` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `telefone` VARCHAR(20) DEFAULT NULL,
  `cpf` VARCHAR(14) DEFAULT NULL,
  `sexo` ENUM('masculino', 'feminino', 'naoBinario', 'naoDeclarar') NOT NULL COMMENT 'Masculino\\nFeminino\\nNão Binário\\nNão Declarar',
  `dt_nascimento` DATE DEFAULT NULL,
  `endereco` VARCHAR(70) DEFAULT NULL,
  `numero` CHAR(7) DEFAULT NULL,
  `complemento` VARCHAR(15) DEFAULT NULL,
  `bairro` VARCHAR(70) DEFAULT NULL,
  `cidade` VARCHAR(70) DEFAULT NULL,
  `cep` CHAR(9) DEFAULT NULL,
  `uf` CHAR(2) DEFAULT NULL,
  `foto` VARCHAR(50) DEFAULT NULL,
  `obs` TEXT DEFAULT NULL,
  `situacao` VARCHAR(10) DEFAULT 'Ativo' COMMENT 'Ativo\\nCancelado\\nBloqueado',
  `fk_id_perfil` INT(11) NOT NULL,
  PRIMARY KEY (`id_usuario`, `fk_id_perfil`),
  INDEX `fk_usuario_perfil_usu1_idx` (`fk_id_perfil` ASC) ,
  CONSTRAINT `fk_usuario_perfil_usu1`
    FOREIGN KEY (`fk_id_perfil`)
    REFERENCES `projeto_usu`.`perfil` (`id_perfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION) 
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usu`, `email`, `senha`, `telefone`, `cpf`, `sexo`, `dt_nascimento`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `cep`, `uf`, `foto`, `situacao`, `fk_id_perfil`) VALUES
(1, 'Administrador', 'adm@gmail.com', MD5('123'), '(61)77777-6565', '000.000.888-99', 'Masculino', '1989-03-10', 'QNM 11', '11', 'Casa', 'CEILÂNDIA NORTE', 'BRASÍLIA', '72211-111', 'DF', NULL, 'Ativo', 1),
(2, 'João do Teste', 'jose@email.com', MD5('123456'), '6198887-0909', '333.444.777-77', 'Feminino', '2000-02-01', 'QSC 01 AREA ESP ', '444', 'Ap', 'CEILÂNDIA NORTE', 'BRASILIA', '72-999-02', 'DF', NULL, 'Ativo', 2),
(3, 'Maya', 'maya@email.com', MD5('123456789'),'6198887-0909', '079.321.888-30', 'naoBinario', '2000-12-08', 'QSC 01 AREA ESP ', '444', 'Ap', 'CEILANDIA NORTE', 'BRASILIA', '72-999-02', 'DF', NULL, 'Ativo', 3);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
