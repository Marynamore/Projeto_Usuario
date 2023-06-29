-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jun-2023 às 19:12
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto_usu`
--
DROP DATABASE IF EXISTS projeto_usu;
CREATE DATABASE IF NOT EXISTS projeto_usu;
USE projeto_usu;
-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `idPerfil` int(11) NOT NULL,
  `nomePerfil` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `nomePerfil`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Funcionário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `sexo` varchar(12) DEFAULT NULL,
  `dtNascimento` date DEFAULT NULL,
  `endereco` varchar(70) DEFAULT NULL,
  `numero` char(7) DEFAULT NULL,
  `complemento` varchar(15) DEFAULT NULL,
  `bairro` varchar(70) DEFAULT NULL,
  `cidade` varchar(70) DEFAULT NULL,
  `cep` char(9) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `situacaoUsuario` varchar(10) DEFAULT 'Ativo' COMMENT 'Ativo\\nCancelado\\nBloqueado',
  `perfil_idPerfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `email`, `senha`, `telefone`, `cpf`, `sexo`, `dtNascimento`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `cep`, `uf`, `foto`, `situacaoUsuario`, `perfil_idPerfil`) VALUES
(1, 'Administrador', 'adm@email.com', '202cb962ac59075b964b07152d234b70', '(61)77777-6565', '000.000.888-99', 'Masculino', '1989-03-10', 'QNM 11', '11', 'Casa', 'CEILANDIA NORTE', 'BrasÃ­lia', '72211-111', 'DF', NULL, 'Ativo', 1),
(2, 'JosÃ© do Teste', 'jose@email.com', '202cb962ac59075b964b07152d234b70', '6198887-0909', '333.444.777-77', 'Feminino', '2000-02-01', 'QSC 01 AREA ESP ', '444', 'Ap', 'CEILANDIA NORTE', 'BRASILIA', '72-999-02', 'MG', NULL, 'Ativo', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_usuario_perfil_idx` (`perfil_idPerfil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_perfil` FOREIGN KEY (`perfil_idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
