-- MySQL dump 10.13  Distrib 5.7.39, for Linux (x86_64)
--
-- Host: localhost    Database: catalog
-- ------------------------------------------------------
-- Server version	5.7.39-0ubuntu0.18.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `AUTOR_RECURSO`
--

DROP TABLE IF EXISTS `AUTOR_RECURSO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AUTOR_RECURSO` (
  `ID_RECURSO` int(11) NOT NULL,
  `NOME` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_RECURSO`,`NOME`),
  KEY `fk_AUTOR_RECURSO_RECURSO_idx` (`ID_RECURSO`),
  KEY `FK_AUTOR_RECURSO_AUTOR_idx` (`NOME`),
  CONSTRAINT `FK_AUTOR_RECURSO_AUTOR` FOREIGN KEY (`NOME`) REFERENCES `USUARIO` (`EMAIL`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_AUTOR_RECURSO_RECURSO` FOREIGN KEY (`ID_RECURSO`) REFERENCES `RECURSO` (`ID_RECURSO`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AUTOR_RECURSO`
--

LOCK TABLES `AUTOR_RECURSO` WRITE;
/*!40000 ALTER TABLE `AUTOR_RECURSO` DISABLE KEYS */;
INSERT INTO `AUTOR_RECURSO` VALUES (82,'leonatanpaschoal@gmail.com'),(83,'leonatanpaschoal@gmail.com'),(84,'leonatanpaschoal@gmail.com'),(85,'leonatanpaschoal@gmail.com'),(85,'lucas_machado@usp.br'),(86,'leonatanpaschoal@gmail.com'),(86,'lucas_machado@usp.br'),(87,'flaviasantos@usp.br'),(88,'gcguerino@uem.br'),(89,'paschoalln@usp.br'),(90,'fulano@ciclano.com');
/*!40000 ALTER TABLE `AUTOR_RECURSO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CRITERIO`
--

DROP TABLE IF EXISTS `CRITERIO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CRITERIO` (
  `NOME` varchar(80) NOT NULL,
  `ID_RECURSO` int(11) NOT NULL,
  PRIMARY KEY (`NOME`,`ID_RECURSO`),
  KEY `FK_CRITERIOS_RECURSO_idx` (`ID_RECURSO`),
  CONSTRAINT `FK_CRITERIOS_RECURSO` FOREIGN KEY (`ID_RECURSO`) REFERENCES `RECURSO` (`ID_RECURSO`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CRITERIO`
--

LOCK TABLES `CRITERIO` WRITE;
/*!40000 ALTER TABLE `CRITERIO` DISABLE KEYS */;
INSERT INTO `CRITERIO` VALUES (' Analise de valor limite',82),('Particionamento em classes de equivalência',82),('Teste de mutação',83),('Não se aplica',84),('teste',85),('  Não se aplica',86),('Teste',87),('Critério C',88),(' ',89),('Teste',90);
/*!40000 ALTER TABLE `CRITERIO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ENTIDADE_CONTRIBUINTE`
--

DROP TABLE IF EXISTS `ENTIDADE_CONTRIBUINTE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ENTIDADE_CONTRIBUINTE` (
  `NOME` varchar(50) NOT NULL,
  `ID_RECURSO` int(11) NOT NULL,
  PRIMARY KEY (`NOME`,`ID_RECURSO`),
  KEY `FK_ENTIDADES_RECURSO_idx` (`ID_RECURSO`),
  CONSTRAINT `FK_ENTIDADE_RECURSO` FOREIGN KEY (`ID_RECURSO`) REFERENCES `RECURSO` (`ID_RECURSO`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ENTIDADE_CONTRIBUINTE`
--

LOCK TABLES `ENTIDADE_CONTRIBUINTE` WRITE;
/*!40000 ALTER TABLE `ENTIDADE_CONTRIBUINTE` DISABLE KEYS */;
INSERT INTO `ENTIDADE_CONTRIBUINTE` VALUES (' CAPES',82),(' FAPESP',82),(' ICMC',82),('USP',82),(' EESC',83),(' ICMC',83),('USP',83),('USP',84),('USP',85),('usp',86),(' ICMC',87),('USP',87),(' YES',88),(' ',89),(' CNPq',89),(' utfpr',89),('CAPES',89),(' CAPES',90);
/*!40000 ALTER TABLE `ENTIDADE_CONTRIBUINTE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `NIVEIS`
--

DROP TABLE IF EXISTS `NIVEIS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `NIVEIS` (
  `NOME` varchar(60) NOT NULL,
  `ID_RECURSO` int(11) NOT NULL,
  PRIMARY KEY (`NOME`,`ID_RECURSO`),
  KEY `FK_NIVEIS_RECURSO_idx` (`ID_RECURSO`),
  CONSTRAINT `FK_NIVEIS_RECURSO` FOREIGN KEY (`ID_RECURSO`) REFERENCES `RECURSO` (`ID_RECURSO`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `NIVEIS`
--

LOCK TABLES `NIVEIS` WRITE;
/*!40000 ALTER TABLE `NIVEIS` DISABLE KEYS */;
INSERT INTO `NIVEIS` VALUES (' Teste de unidade',82),('Teste de unidade',83),('Não se aplica',84),('teste',85),(' Teste de sistema',86),('Teste',87),('Nivel 1',88),(' ',89),(' Teste 2',89),('Teste 1',89),('Teste',90);
/*!40000 ALTER TABLE `NIVEIS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PALAVRASCHAVE`
--

DROP TABLE IF EXISTS `PALAVRASCHAVE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PALAVRASCHAVE` (
  `NOME` varchar(80) NOT NULL,
  `ID_RECURSO` int(11) NOT NULL,
  PRIMARY KEY (`NOME`,`ID_RECURSO`),
  KEY `FK_PALAVRASCHAVE_RECURSO_idx` (`ID_RECURSO`),
  CONSTRAINT `FK_PALAVRASCHAVE_RECURSO` FOREIGN KEY (`ID_RECURSO`) REFERENCES `RECURSO` (`ID_RECURSO`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PALAVRASCHAVE`
--

LOCK TABLES `PALAVRASCHAVE` WRITE;
/*!40000 ALTER TABLE `PALAVRASCHAVE` DISABLE KEYS */;
INSERT INTO `PALAVRASCHAVE` VALUES (' agente conversacional',82),(' chatbot',82),('chatterbot',82),(' Defeitos em python',83),(' Teste de mutação',83),('REA',83),(' digital',84),(' objeto de aprendizagem',84),(' rea',84),('recurso',84),(' objeto virtual de aprendizagem',85),(' OVA',85),('objeto de aprendizagem',85),(' Jogo digital',86),('jogo educacional',86),(' idosos',87),(' usabilidade',87),('avaliação',87),('Teste de Software',88),(' ',89),(' avaliação',89),(' didático',89),(' novo',89),(' teste',89),(' Ble',90),('Bla',90);
/*!40000 ALTER TABLE `PALAVRASCHAVE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RECURSO`
--

DROP TABLE IF EXISTS `RECURSO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `RECURSO` (
  `ID_RECURSO` int(11) NOT NULL AUTO_INCREMENT,
  `DATA_AD` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `APROVADO` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`ID_RECURSO`),
  UNIQUE KEY `TITULO` (`TITULO`),
  KEY `IND_TITULO` (`TITULO`),
  KEY `IND_IDIOMA` (`IDIOMA`),
  KEY `FK_RECURSO_AUTOR` (`CADASTRADOR`),
  CONSTRAINT `FK_RECURSO_AUTOR` FOREIGN KEY (`CADASTRADOR`) REFERENCES `USUARIO` (`EMAIL`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RECURSO`
--

LOCK TABLES `RECURSO` WRITE;
/*!40000 ALTER TABLE `RECURSO` DISABLE KEYS */;
INSERT INTO `RECURSO` VALUES (82,'2022-06-09 13:25:19','leonatanpaschoal@gmail.com','TOB-STT','BR','Um chatbot para resolver as dúvidas dos alunos de teste de software. Esse chatbot é capaz de solucionar dúvidas sobre técnicas e critérios de teste ','Website','1.0','Disponivel','www.labes.icmc.usp.br/~tob-stt/gui/jquery/?','Não há requisitos tecnológicos','Não há instruções para instalação','Não há creative commons',0),(83,'2022-06-09 13:42:59','leonatanpaschoal@gmail.com','MUT-STT','BR','Um recurso educacional aberto para apoiar o aprendizado de teste de mutação em python. O recurso possui demonstrações sobre como aplicar a atividade de teste, considerando defeitos típicos cometidos por programadores que escrevem códigos em python','Website','1.0','Disponivel','github.com/Jmambrini/mut-stt','Não há requisitos tecnológicos','Não há instruções para instalação','Não há creative commons',0),(84,'2022-06-09 13:49:08','leonatanpaschoal@gmail.com','Recurso digital 1','EN','Esse recurso digital é ficticio. Ele foi criado exclusivamente para conduzir a avaliação heurística (i.e., efeitos de teste).  ','Youtube','0.0','Indisponivel','www.icmc.usp.br/','Não há requisitos tecnológicos','Não há instruções para instalação','Não há creative commons',0),(85,'2022-06-09 13:52:30','leonatanpaschoal@gmail.com','Objeto de aprendizagem ficticio ','ES',' Esse recurso digital é ficticio. Ele foi criado exclusivamente para conduzir a avaliação heurística (i.e., efeitos de teste).','Site local','1.0','Desconhecido','www.icmc.usp.br/','Não há requisitos tecnológicos','Não há instruções para instalação','Não há creative commons',0),(86,'2022-06-09 14:05:16','leonatanpaschoal@gmail.com','Jogo exemplo','EN','Esse recurso digital é fictício. Ele foi criado exclusivamente para conduzir a avaliação heurística (i.e., efeitos de teste).','Site próprio','5.0','Desconhecido','www.icmc.usp.br/','Não há requisitos tecnológicos','Não há instruções para instalação','Não há creative commons',0),(87,'2022-06-09 14:06:47','flaviasantos@usp.br','Percurso Cognitivo para idosos','EL','Framework para aplicar percurso cognitivo com idosos','YouTube','1.0001','Disponivel','www.local.usp.br','Não há requisitos tecnológicos','Não há instruções para instalação','Não há creative commons',0),(88,'2022-06-28 18:39:18','gcguerino@uem.br','Recurso teste','PT','Esta é uma descrição.','Rep Teste','1.0','Disponivel','google.com','Não há requisitos tecnológicos','Não há instruções para instalação','Não há creative commons',0),(89,'2022-06-28 20:27:06','fulano@ciclano.com','Novo recurso do Walter','JA','Recurso didático em japonês criado para a avaliação.','Em algum lugar','2.1a','Disponivel','teste@teste.com.br','Teste 1, teste2, teste3, teste 4','É só executar e ser feliz :)','AAAAAA',0),(90,'2022-06-28 20:29:53','fulano@ciclano.com','Outro teste do Walter','AF','Mais um recurso educacional cadastrado','Site','1.0','Disponivel','www.google.com','Não há requisitos tecnológicos','Não há instruções para instalação','Teste',0);
/*!40000 ALTER TABLE `RECURSO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TECNICA`
--

DROP TABLE IF EXISTS `TECNICA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TECNICA` (
  `NOME` varchar(80) NOT NULL,
  `ID_RECURSO` int(11) NOT NULL,
  PRIMARY KEY (`NOME`,`ID_RECURSO`),
  KEY `FK_TECNICA_RECURSO_idx` (`ID_RECURSO`),
  CONSTRAINT `FK_TECNICA_RECURSO` FOREIGN KEY (`ID_RECURSO`) REFERENCES `RECURSO` (`ID_RECURSO`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TECNICA`
--

LOCK TABLES `TECNICA` WRITE;
/*!40000 ALTER TABLE `TECNICA` DISABLE KEYS */;
INSERT INTO `TECNICA` VALUES ('Teste funcional',82),('Teste baseado em defeitos',83),('Não se aplica',84),('teste',85),(' Não se aplica',86),('Teste',87),('Técnica X',88),(' ',89),(' Teste caixa preta',89),('Teste caixa branca',89),('Teste',90);
/*!40000 ALTER TABLE `TECNICA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USUARIO`
--

DROP TABLE IF EXISTS `USUARIO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USUARIO` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT COMMENT '    ',
  `EMAIL` varchar(45) NOT NULL,
  `NOME` varchar(45) NOT NULL,
  `SENHA` varchar(255) NOT NULL,
  `DATA_REG` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CEP` varchar(9) DEFAULT NULL,
  `NOME_RUA` varchar(120) DEFAULT NULL,
  `BAIRRO` varchar(100) DEFAULT NULL,
  `NUMERO` int(11) DEFAULT NULL,
  `CIDADE` varchar(45) DEFAULT NULL,
  `ESTADO` varchar(45) DEFAULT NULL,
  `PAIS` varchar(45) DEFAULT NULL,
  `COMPLEMENTO` varchar(100) DEFAULT NULL,
  `ADMIN` tinyint(1) NOT NULL DEFAULT '0',
  `DATA_NASC` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_USER`),
  UNIQUE KEY `EMAIL_UNIQUE` (`EMAIL`),
  UNIQUE KEY `ID_USER_UNIQUE` (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USUARIO`
--

LOCK TABLES `USUARIO` WRITE;
/*!40000 ALTER TABLE `USUARIO` DISABLE KEYS */;
INSERT INTO `USUARIO` VALUES (1,'paschoalln@usp.br','Leo Natan Paschoal','$2y$10$TR937qgts6b6PbsstPGA3.LbPgYXzbmSHMqDYISISMJi4K5XRyTGm','2022-03-23 00:13:54',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(7,'lucas_machado@usp.br','Lucas Machado Marinho','$2y$10$KVwXoz8w7s2mVKfvbElMaePJ1DYIcpNjAl7EuuqMcDCJj/yRj/.RC','2022-05-31 11:46:22','13185551','Rua Dante Gazzetta','Jardim Terras de Santo Antônio',99,'Hortolândia','SP',NULL,'Casa',1,'2001-03-01 00:00:00'),(8,'leonatanpaschoal@gmail.com','LEO NATAN PASCHOAL','$2y$10$AcI9Hnq.MVQYDqyWOW6SG.ZQTmgq1V7.MkBU7SgjzEv9alfBqQJ22','2022-06-02 13:37:01','13560049','Rua Episcopal','Centro',2502,'São Carlos','SP',NULL,'Casa',1,'1995-08-01 00:00:00'),(29,'flaviasantos@usp.br','Flávia Santos','$2y$10$zKURJ05A6up09x.XJ0.SM.Rl/5XOzVATzThIuWdYVFDrvCGMtEVwG','2022-06-09 14:01:11','37430000','','',0,'Conceição do Rio Verde','MG',NULL,'',0,'1920-06-09 00:00:00'),(30,'gcguerino@uem.br','Guilherme Corredato Guerino','$2y$10$wrCqb94cuBl5JA4Iovet4eWozfkH9zs8h64bYvGispTM8bxfUh1oO','2022-06-28 18:23:41','87023130','Rua João Luiz Dias','Parque Residencial Cidade Nova',459,'Maringá','PR',NULL,'',0,'1996-04-11 00:00:00'),(31,'fulano@ciclano.com','Walter','$2y$10$Ylpl7YltTqGeu8naod9GX.H1SylUrfsI026CtXYN9W5jsEojBTVhq','2022-06-28 19:55:36','68702932','ADASDSAd','DASDASDSD',232133,'AAAAA','ROA',NULL,'AADASDASDD',0,'1988-08-04 00:00:00'),(32,'lcm@icomp.ufam.edu.br','Leonardo Marques','$2y$10$OMq4UUXlWCckZeWInk.xGe1/LE4Bag3q2N2k3i3bK1OeKRnucfPsm','2022-06-29 15:15:42','69090762','','',0,'Manaus','AM',NULL,'',0,'1994-06-05 00:00:00'),(33,'machado.lucasm01@gmail.com','Machado Marinho Lucas','$2y$10$CeB.MRUjCE2s11fhtsFUFu9fnSJTxadSyzxny72lwNKdvUrVf.bkC','2022-07-27 00:14:23','13185551','Rua Dante Gazzetta','Jardim Terras de Santo Antônio',0,'Hortolândia','SP',NULL,'',0,'2022-07-01 00:00:00');
/*!40000 ALTER TABLE `USUARIO` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-07 22:25:21
