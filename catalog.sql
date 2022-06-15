-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 10:50 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `AUTOR_RECURSO`
--

CREATE TABLE `AUTOR_RECURSO` (
  `ID_RECURSO` int(11) NOT NULL,
  `NOME` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `AUTOR_RECURSO`
--

INSERT INTO `AUTOR_RECURSO` (`ID_RECURSO`, `NOME`) VALUES
(1, 'joao@gmail.com'),
(1, 'maria@gmail.com'),
(2, 'jose@gmail.com'),
(2, 'maria@gmail.com'),
(45, 'paschoalln@usp.br'),
(46, 'machado.lucasm01@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `CRITERIO`
--

CREATE TABLE `CRITERIO` (
  `NOME` varchar(80) NOT NULL,
  `ID_RECURSO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CRITERIO`
--

INSERT INTO `CRITERIO` (`NOME`, `ID_RECURSO`) VALUES
(' mmmkmlkm', 45),
('fwefwfwfw', 46),
('Mutação', 2),
('Particionamento em classes de equivalência', 1),
('Particionamento em classes de equivalência', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ENTIDADE_CONTRIBUINTE`
--

CREATE TABLE `ENTIDADE_CONTRIBUINTE` (
  `NOME` varchar(50) NOT NULL,
  `ID_RECURSO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ENTIDADE_CONTRIBUINTE`
--

INSERT INTO `ENTIDADE_CONTRIBUINTE` (`NOME`, `ID_RECURSO`) VALUES
(' qwdqwdqd', 46),
('fapesop', 45),
('paschoalln@usp.br', 45);

-- --------------------------------------------------------

--
-- Table structure for table `NIVEIS`
--

CREATE TABLE `NIVEIS` (
  `NOME` varchar(10) NOT NULL,
  `ID_RECURSO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `NIVEIS`
--

INSERT INTO `NIVEIS` (`NOME`, `ID_RECURSO`) VALUES
('Aceitação', 1),
('Aceitação', 2),
('fqdwqdq', 46),
('Integração', 2),
('qwdmwqlkm', 45),
('Sistema', 2),
('Unidade', 1),
('wefewswf', 45);

-- --------------------------------------------------------

--
-- Table structure for table `PALAVRASCHAVE`
--

CREATE TABLE `PALAVRASCHAVE` (
  `NOME` varchar(80) NOT NULL,
  `ID_RECURSO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PALAVRASCHAVE`
--

INSERT INTO `PALAVRASCHAVE` (`NOME`, `ID_RECURSO`) VALUES
('Aceitação', 1),
('Artigo', 1),
('dqwdqdq', 46),
('Estrutural', 2),
('fekwflwekmfwl', 45),
('Unidade', 1),
('Video', 2);

-- --------------------------------------------------------

--
-- Table structure for table `RECURSO`
--

CREATE TABLE `RECURSO` (
  `ID_RECURSO` int(11) NOT NULL,
  `DATA_AD` timestamp NOT NULL DEFAULT current_timestamp(),
  `CADASTRADOR` varchar(45) NOT NULL,
  `TITULO` varchar(100) NOT NULL,
  `IDIOMA` varchar(45) NOT NULL,
  `DESCRICAO` longtext NOT NULL,
  `REPOSITORIO` varchar(45) NOT NULL,
  `VERSAO` varchar(45) NOT NULL,
  `STATUS` varchar(45) NOT NULL,
  `LOCALIZACAO` varchar(200) NOT NULL,
  `REQUISITOS_TECNOLOGICOS` longtext NOT NULL,
  `INSTRUCOES_INSTALACAO` longtext NOT NULL,
  `CREATIVE_COMMONS` varchar(45) NOT NULL,
  `APROVADO` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `RECURSO`
--

INSERT INTO `RECURSO` (`ID_RECURSO`, `DATA_AD`, `CADASTRADOR`, `TITULO`, `IDIOMA`, `DESCRICAO`, `REPOSITORIO`, `VERSAO`, `STATUS`, `LOCALIZACAO`, `REQUISITOS_TECNOLOGICOS`, `INSTRUCOES_INSTALACAO`, `CREATIVE_COMMONS`, `APROVADO`) VALUES
(1, '2022-03-23 00:13:54', 'joao@gmail.com', 'Titulo', 'Português (Brasil)', 'Um artigo sobre teste de software', 'WordPress', '1.0', 'Disponível', 'umlink.com.br', 'Navegador Web', 'Nao há instalação', 'BY-NC', 1),
(2, '2022-03-23 00:13:55', 'maria@gmail.com', 'Outro Titulo', 'Português (Brasil)', 'Um video sobre teste estrutural', 'Youtube', '2.0', 'Disponível', 'youtube.com.br', 'Navegador Web', 'Nao há instalação', 'BY-NC', 1),
(45, '2022-05-26 17:36:18', 'machado.lucasm01@gmail.com', 'fefçmefkmse', 'AF', 'GRGAEH', 'fwefwf', 'paschoalln@usp.br', 'Disponivel', 'pt.stackoverflow.com/questions/37758/colocar-valor-numa-caixa-de-texto-input', 'Não há requisitos tecnológicos', 'Não há instruções para instalação', 'Não é há creative commons', 0),
(46, '2022-05-29 20:16:17', 'machado.lucasm01@gmail.com', 'qwdqwdqd', 'AF', 'wfdqw', 'qwdqw', 'fefwwf', 'Disponivel', 'www.youtube.com/watch?v=lD28jvuudx8', 'Não há requisitos tecnológicos', 'Não há instruções para instalação', 'Não é há creative commons', 0);

-- --------------------------------------------------------

--
-- Table structure for table `TECNICA`
--

CREATE TABLE `TECNICA` (
  `NOME` varchar(80) NOT NULL,
  `ID_RECURSO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `TECNICA`
--

INSERT INTO `TECNICA` (`NOME`, `ID_RECURSO`) VALUES
('faesdwadda', 46),
('fpkwemf', 45),
('Teste Estrutural', 2),
('Teste Funcional', 1);

-- --------------------------------------------------------

--
-- Table structure for table `USUARIO`
--

CREATE TABLE `USUARIO` (
  `ID_USER` int(11) NOT NULL COMMENT '    ',
  `EMAIL` varchar(45) NOT NULL,
  `NOME` varchar(45) NOT NULL,
  `SENHA` varchar(255) NOT NULL,
  `DATA_REG` timestamp NOT NULL DEFAULT current_timestamp(),
  `CEP` varchar(9) DEFAULT NULL,
  `NOME_RUA` varchar(120) DEFAULT NULL,
  `BAIRRO` varchar(100) DEFAULT NULL,
  `NUMERO` int(11) DEFAULT NULL,
  `CIDADE` varchar(45) DEFAULT NULL,
  `ESTADO` varchar(45) DEFAULT NULL,
  `PAIS` varchar(45) DEFAULT NULL,
  `COMPLEMENTO` varchar(100) DEFAULT NULL,
  `ADMIN` tinyint(1) NOT NULL DEFAULT 0,
  `DATA_NASC` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `USUARIO`
--

INSERT INTO `USUARIO` (`ID_USER`, `EMAIL`, `NOME`, `SENHA`, `DATA_REG`, `CEP`, `NOME_RUA`, `BAIRRO`, `NUMERO`, `CIDADE`, `ESTADO`, `PAIS`, `COMPLEMENTO`, `ADMIN`, `DATA_NASC`) VALUES
(1, 'paschoalln@usp.br', 'Leo Natan Paschoal', '$2y$10$TR937qgts6b6PbsstPGA3.LbPgYXzbmSHMqDYISISMJi4K5XRyTGm', '2022-03-23 00:13:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(2, 'joao@gmail.com', 'Joao', '$2y$10$xFjkDFz6UaML7P02NG0I.uhuBRttvMSQVVETGFVvmciP0k8UV/.ie', '2022-03-23 00:13:54', '13566590', 'Avenida Trabalhador Sancarlense', 'Parque Arnold Schimidt', 400, 'São Carlos', 'SP', NULL, 'Endereco da USP', 0, '1990-01-01 00:00:00'),
(3, 'maria@gmail.com', 'Maria', '$2y$10$tPOc9NwTJiLbqvNx3tmQn.FStRWz2E9MBuPIokzWJI1XlZj882VSu', '2022-03-23 00:13:54', '13566590', 'Avenida Trabalhador Sancarlense', 'Parque Arnold Schimidt', 400, 'São Carlos', 'SP', NULL, 'Endereco da USP', 0, '1990-01-05 00:00:00'),
(4, 'jose@gmail.com', 'Jose', '$2y$10$i5RC4jZ3p87Mmayv.QFLQOfGu9OdLAA17uhfkPKOMD8E1hKm1JxtC', '2022-03-23 00:13:54', '13566590', 'Avenida Trabalhador Sancarlense', 'Parque Arnold Schimidt', 400, 'São Carlos', 'SP', NULL, 'Endereco da USP', 0, '1990-01-05 00:00:00'),
(5, 'machado.lucasm01@gmail.com', 'Lucas', '$2y$10$OXCvuGHrfzS6Eh0g0yJb.elm8yku6DW0WmLbyELm8kLrxNjoaqiEO', '2022-03-23 00:15:51', '13185551', 'Rua Dante Gazzetta', 'Jardim Terras de Santo Antônio', 0, 'Hortolândia', 'SP', NULL, '', 1, '2001-03-01 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AUTOR_RECURSO`
--
ALTER TABLE `AUTOR_RECURSO`
  ADD PRIMARY KEY (`ID_RECURSO`,`NOME`),
  ADD KEY `fk_AUTOR_RECURSO_RECURSO_idx` (`ID_RECURSO`),
  ADD KEY `FK_AUTOR_RECURSO_AUTOR_idx` (`NOME`);

--
-- Indexes for table `CRITERIO`
--
ALTER TABLE `CRITERIO`
  ADD PRIMARY KEY (`NOME`,`ID_RECURSO`),
  ADD KEY `FK_CRITERIOS_RECURSO_idx` (`ID_RECURSO`);

--
-- Indexes for table `ENTIDADE_CONTRIBUINTE`
--
ALTER TABLE `ENTIDADE_CONTRIBUINTE`
  ADD PRIMARY KEY (`NOME`,`ID_RECURSO`),
  ADD KEY `FK_ENTIDADES_RECURSO_idx` (`ID_RECURSO`);

--
-- Indexes for table `NIVEIS`
--
ALTER TABLE `NIVEIS`
  ADD PRIMARY KEY (`NOME`,`ID_RECURSO`),
  ADD KEY `FK_NIVEIS_RECURSO_idx` (`ID_RECURSO`);

--
-- Indexes for table `PALAVRASCHAVE`
--
ALTER TABLE `PALAVRASCHAVE`
  ADD PRIMARY KEY (`NOME`,`ID_RECURSO`),
  ADD KEY `FK_PALAVRASCHAVE_RECURSO_idx` (`ID_RECURSO`);

--
-- Indexes for table `RECURSO`
--
ALTER TABLE `RECURSO`
  ADD PRIMARY KEY (`ID_RECURSO`),
  ADD UNIQUE KEY `TITULO` (`TITULO`),
  ADD KEY `IND_TITULO` (`TITULO`),
  ADD KEY `IND_IDIOMA` (`IDIOMA`),
  ADD KEY `FK_RECURSO_AUTOR` (`CADASTRADOR`);

--
-- Indexes for table `TECNICA`
--
ALTER TABLE `TECNICA`
  ADD PRIMARY KEY (`NOME`,`ID_RECURSO`),
  ADD KEY `FK_TECNICA_RECURSO_idx` (`ID_RECURSO`);

--
-- Indexes for table `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`ID_USER`),
  ADD UNIQUE KEY `EMAIL_UNIQUE` (`EMAIL`),
  ADD UNIQUE KEY `ID_USER_UNIQUE` (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `RECURSO`
--
ALTER TABLE `RECURSO`
  MODIFY `ID_RECURSO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `USUARIO`
--
ALTER TABLE `USUARIO`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT COMMENT '    ', AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AUTOR_RECURSO`
--
ALTER TABLE `AUTOR_RECURSO`
  ADD CONSTRAINT `FK_AUTOR_RECURSO_AUTOR` FOREIGN KEY (`NOME`) REFERENCES `USUARIO` (`EMAIL`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_AUTOR_RECURSO_RECURSO` FOREIGN KEY (`ID_RECURSO`) REFERENCES `RECURSO` (`ID_RECURSO`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `CRITERIO`
--
ALTER TABLE `CRITERIO`
  ADD CONSTRAINT `FK_CRITERIOS_RECURSO` FOREIGN KEY (`ID_RECURSO`) REFERENCES `RECURSO` (`ID_RECURSO`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ENTIDADE_CONTRIBUINTE`
--
ALTER TABLE `ENTIDADE_CONTRIBUINTE`
  ADD CONSTRAINT `FK_ENTIDADE_RECURSO` FOREIGN KEY (`ID_RECURSO`) REFERENCES `RECURSO` (`ID_RECURSO`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `NIVEIS`
--
ALTER TABLE `NIVEIS`
  ADD CONSTRAINT `FK_NIVEIS_RECURSO` FOREIGN KEY (`ID_RECURSO`) REFERENCES `RECURSO` (`ID_RECURSO`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `PALAVRASCHAVE`
--
ALTER TABLE `PALAVRASCHAVE`
  ADD CONSTRAINT `FK_PALAVRASCHAVE_RECURSO` FOREIGN KEY (`ID_RECURSO`) REFERENCES `RECURSO` (`ID_RECURSO`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `RECURSO`
--
ALTER TABLE `RECURSO`
  ADD CONSTRAINT `FK_RECURSO_AUTOR` FOREIGN KEY (`CADASTRADOR`) REFERENCES `USUARIO` (`EMAIL`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `TECNICA`
--
ALTER TABLE `TECNICA`
  ADD CONSTRAINT `FK_TECNICA_RECURSO` FOREIGN KEY (`ID_RECURSO`) REFERENCES `RECURSO` (`ID_RECURSO`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;