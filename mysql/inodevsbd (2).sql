CREATE DATABASE  IF NOT EXISTS `inodevsbd` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `inodevsbd`;
-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: inodevsbd
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `alocacoes`
--

DROP TABLE IF EXISTS `alocacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alocacoes` (
  `nome` varchar(50) NOT NULL,
  `associacao` varchar(20) NOT NULL,
  `tipo_de_cobertura` enum('Fixo','Flutuante') DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alo_colab` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alo_colab` (`alo_colab`),
  CONSTRAINT `aloca_colab` FOREIGN KEY (`alo_colab`) REFERENCES `colaboradores` (`matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alocacoes`
--

LOCK TABLES `alocacoes` WRITE;
/*!40000 ALTER TABLE `alocacoes` DISABLE KEYS */;
INSERT INTO `alocacoes` VALUES ('Gustavo Kenji Ando','Estagiario','Flutuante',2,NULL),('KauÃ£ Gustavo Rodrigues RenÃ³','Master','Fixo',3,NULL);
/*!40000 ALTER TABLE `alocacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `razao_social` varchar(50) DEFAULT NULL,
  `nome_fantasia` varchar(40) DEFAULT NULL,
  `cnpj` varchar(19) NOT NULL DEFAULT '000.000.000/0000-00',
  `endereco` varchar(100) DEFAULT NULL,
  `contato` varchar(100) DEFAULT NULL,
  `clien_cont` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clien_cont` (`clien_cont`),
  CONSTRAINT `cliente_contrato` FOREIGN KEY (`clien_cont`) REFERENCES `contratos` (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colaboradores`
--

DROP TABLE IF EXISTS `colaboradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colaboradores` (
  `cpf` varchar(14) NOT NULL,
  `matricula` int(10) NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(50) NOT NULL,
  `data_admissao` date NOT NULL,
  `data_demissao` date DEFAULT NULL,
  `situacao_cadastro` enum('Em admissao','Empregado','Em demissao') NOT NULL,
  `funcao` varchar(50) NOT NULL,
  `tipo_cobertura` enum('Fixo','Flutuante') NOT NULL,
  `posto_trabalho` varchar(50) NOT NULL,
  `usuario_conect` int(10) DEFAULT NULL,
  `flutuante` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`matricula`),
  UNIQUE KEY `usuario_conect` (`usuario_conect`),
  CONSTRAINT `conecao_login` FOREIGN KEY (`usuario_conect`) REFERENCES `usuarios` (`ulogin`)
) ENGINE=InnoDB AUTO_INCREMENT=312412413 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colaboradores`
--

LOCK TABLES `colaboradores` WRITE;
/*!40000 ALTER TABLE `colaboradores` DISABLE KEYS */;
INSERT INTO `colaboradores` VALUES ('111.111.111-11',20210001,'Gustavo Kenji Ando','2021-10-07','2022-10-07','Empregado','Auxiliar Administrativo ','Flutuante','Flutuante',NULL,NULL),('222.222.222-22',20210002,'KauÃ£ Gustavo Rodrigues RenÃ³','2021-10-06','2022-10-07','Empregado','Auxiliar de TI','Fixo','Setor C',NULL,'Gustavo Kenji Ando'),('333.333.333-33',20210003,'JÃºlia Rafaela Teixeira Andrade Silva','2021-10-07','2022-10-07','Em admissao','Contadora','Fixo','Setor B',NULL,NULL),('444.444.444-44',20210004,'Maria Eduarda Macedo Braga','2021-10-08','2022-10-08','Empregado','Recursos Humanos','Fixo','Setor A',NULL,NULL),('555.555.555-55',20210005,'JÃºlia Maria Santos Barroso','2021-10-09','2023-01-07','Em admissao','Administradora','Fixo','Setor B',NULL,NULL),('666.666.666-66',20210006,'LuÃ­s Henrique Ferreira Souza','2021-10-01','2022-10-01','Empregado','EstagiÃ¡rio de TI','Fixo','Setor C',NULL,NULL),('777.777.777-77',20210007,'Luiz Fernando Silva Habaeb','2021-10-10','2022-10-10','Em admissao','Recursos Humanos','Fixo','Setor A',NULL,NULL),('999.999.999-99',20210009,'JoÃ£o Vitor da Silva','2020-12-01','2021-12-01','Empregado','EstagiÃ¡rio','Fixo','Setor A',NULL,NULL),('101.010.101-01',20210010,'Pedro Henrique Alves','2021-10-18','2021-10-28','Empregado','Estagiario','Fixo','Setor D',NULL,NULL);
/*!40000 ALTER TABLE `colaboradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contratos`
--

DROP TABLE IF EXISTS `contratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contratos` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(30) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `posto_trabalho` varchar(40) NOT NULL,
  `cint_colab` int(10) DEFAULT NULL,
  `escala` varchar(6) NOT NULL,
  PRIMARY KEY (`numero`),
  UNIQUE KEY `cint_colab` (`cint_colab`),
  CONSTRAINT `contra_colabo` FOREIGN KEY (`cint_colab`) REFERENCES `colaboradores` (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratos`
--

LOCK TABLES `contratos` WRITE;
/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flutuante`
--

DROP TABLE IF EXISTS `flutuante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flutuante` (
  `matricula` int(10) NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(50) NOT NULL,
  `funcao` varchar(50) NOT NULL,
  `subs` text,
  PRIMARY KEY (`matricula`)
) ENGINE=MyISAM AUTO_INCREMENT=20210014 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flutuante`
--

LOCK TABLES `flutuante` WRITE;
/*!40000 ALTER TABLE `flutuante` DISABLE KEYS */;
INSERT INTO `flutuante` VALUES (20210001,'Gustavo Kenji Ando','Auxiliar Administrativo','');
/*!40000 ALTER TABLE `flutuante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postos_de_trabalho`
--

DROP TABLE IF EXISTS `postos_de_trabalho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postos_de_trabalho` (
  `nome_posto` varchar(20) NOT NULL,
  `descricao` text NOT NULL,
  `escala` varchar(6) NOT NULL,
  `numero_colab` int(4) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_colab` int(10) DEFAULT NULL,
  `post_aloc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pt_colab` (`pt_colab`),
  UNIQUE KEY `post_aloc` (`post_aloc`),
  CONSTRAINT `po_tra` FOREIGN KEY (`pt_colab`) REFERENCES `colaboradores` (`matricula`),
  CONSTRAINT `posto_alocacao` FOREIGN KEY (`post_aloc`) REFERENCES `alocacoes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postos_de_trabalho`
--

LOCK TABLES `postos_de_trabalho` WRITE;
/*!40000 ALTER TABLE `postos_de_trabalho` DISABLE KEYS */;
INSERT INTO `postos_de_trabalho` VALUES ('Flutuante','Em caso de falta de colaborador, o flutuante irÃ¡ substituÃ­-lo.','0x0',100,6,NULL,NULL),('Setor A','Recursos Humanos.','8x16',3,7,NULL,NULL),('Setor B','LogÃ­stica.','9x15',3,8,NULL,NULL),('Setor C','Service Desk.','8x16',2,9,NULL,NULL),('Setor D','TI','12x24',2,10,NULL,NULL);
/*!40000 ALTER TABLE `postos_de_trabalho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presenca`
--

DROP TABLE IF EXISTS `presenca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presenca` (
  `colaborador` varchar(50) DEFAULT NULL,
  `posto_de_trabalho` varchar(10) DEFAULT NULL,
  `matricula` int(11) DEFAULT NULL,
  `colab_tab` int(11) DEFAULT NULL,
  `cont_qua` int(11) DEFAULT NULL,
  `pt_qua` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `d1` enum('P','E','F','') DEFAULT NULL,
  `d2` enum('P','E','F','') DEFAULT NULL,
  `d3` enum('P','E','F','') DEFAULT NULL,
  `d4` enum('P','E','F','') DEFAULT NULL,
  `d5` enum('P','E','F','') DEFAULT NULL,
  `d6` enum('P','E','F','') DEFAULT NULL,
  `d7` enum('P','E','F','') DEFAULT NULL,
  `d8` enum('P','E','F','') DEFAULT NULL,
  `d9` enum('P','E','F','') DEFAULT NULL,
  `d10` enum('P','E','F','') DEFAULT NULL,
  `d11` enum('P','E','F','') DEFAULT NULL,
  `d12` enum('P','E','F','') DEFAULT NULL,
  `d13` enum('P','E','F','') DEFAULT NULL,
  `d14` enum('P','E','F','') DEFAULT NULL,
  `d15` enum('P','E','F','') DEFAULT NULL,
  `d16` enum('P','E','F','') DEFAULT NULL,
  `d17` enum('P','E','F','') DEFAULT NULL,
  `d18` enum('P','E','F','') DEFAULT NULL,
  `d19` enum('P','E','F','') DEFAULT NULL,
  `d20` enum('P','E','F','') DEFAULT NULL,
  `d21` enum('P','E','F','') DEFAULT NULL,
  `d22` enum('P','E','F','') DEFAULT NULL,
  `d23` enum('P','E','F','') DEFAULT NULL,
  `d24` enum('P','E','F','') DEFAULT NULL,
  `d25` enum('P','E','F','') DEFAULT NULL,
  `d26` enum('P','E','F','') DEFAULT NULL,
  `d27` enum('P','E','F','') DEFAULT NULL,
  `d28` enum('P','E','F','') DEFAULT NULL,
  `d29` enum('P','E','F','') DEFAULT NULL,
  `d30` enum('P','E','F','') DEFAULT NULL,
  `d31` enum('P','E','F','') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `colab_tab` (`colab_tab`),
  UNIQUE KEY `cont_qua` (`cont_qua`),
  UNIQUE KEY `pt_qua` (`pt_qua`),
  KEY `login` (`matricula`),
  CONSTRAINT `connect_colab` FOREIGN KEY (`colab_tab`) REFERENCES `colaboradores` (`matricula`),
  CONSTRAINT `contrato_quadro` FOREIGN KEY (`cont_qua`) REFERENCES `contratos` (`numero`),
  CONSTRAINT `login` FOREIGN KEY (`matricula`) REFERENCES `usuarios` (`ulogin`),
  CONSTRAINT `posto_quadro` FOREIGN KEY (`pt_qua`) REFERENCES `postos_de_trabalho` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presenca`
--

LOCK TABLES `presenca` WRITE;
/*!40000 ALTER TABLE `presenca` DISABLE KEYS */;
INSERT INTO `presenca` VALUES ('KauÃ£ Gustavo Rodrigues RenÃ³','Setor C',NULL,NULL,NULL,NULL,20,'P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','','','','','','','','','','','',''),('JÃºlia Rafaela Teixeira Andrade Silva','Setor B',NULL,NULL,NULL,NULL,21,'P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','','','','','','','','','','','','',''),('Maria Eduarda Macedo Braga','Setor A',NULL,NULL,NULL,NULL,22,'P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','','','','','','','','','','','','',''),('JÃºlia Maria Santos Barroso','Setor B',NULL,NULL,NULL,NULL,23,'P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','','','','','','','','','','','','',''),('LuÃ­s Henrique Ferreira Souza','Setor C',NULL,NULL,NULL,NULL,24,'P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','','','','','','','','','','','','',''),('Luiz Fernando Silva Habaeb','Setor A',NULL,NULL,NULL,NULL,25,'P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','','','','','','','','','','','','',''),('JoÃ£o Vitor da Silva','Setor A',NULL,NULL,NULL,NULL,27,'P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','','','','','','','','','','','','',''),('Gustavo Kenji Ando','Setor C',NULL,NULL,NULL,NULL,31,'E','E','E','E','E','E','E','E','E','E','E','E','E','E','E','E','E','E','P','','','','','','','','','','','',''),('Pedro Henrique Alves','Setor D',NULL,NULL,NULL,NULL,32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `presenca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presenca_posto`
--

DROP TABLE IF EXISTS `presenca_posto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presenca_posto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posto_de_trabalho` varchar(20) DEFAULT NULL,
  `descricao` text,
  `numero_colab` int(11) NOT NULL,
  `d1` enum('P','E','F','') DEFAULT NULL,
  `d2` enum('P','E','F','') DEFAULT NULL,
  `d3` enum('P','E','F','') DEFAULT NULL,
  `d4` enum('P','E','F','') DEFAULT NULL,
  `d5` enum('P','E','F','') DEFAULT NULL,
  `d6` enum('P','E','F','') DEFAULT NULL,
  `d7` enum('P','E','F','') DEFAULT NULL,
  `d8` enum('P','E','F','') DEFAULT NULL,
  `d9` enum('P','E','F','') DEFAULT NULL,
  `d10` enum('P','E','F','') DEFAULT NULL,
  `d11` enum('P','E','F','') DEFAULT NULL,
  `d12` enum('P','E','F','') DEFAULT NULL,
  `d13` enum('P','E','F','') DEFAULT NULL,
  `d14` enum('P','E','F','') DEFAULT NULL,
  `d15` enum('P','E','F','') DEFAULT NULL,
  `d16` enum('P','E','F','') DEFAULT NULL,
  `d17` enum('P','E','F','') DEFAULT NULL,
  `d18` enum('P','E','F','') DEFAULT NULL,
  `d19` enum('P','E','F','') DEFAULT NULL,
  `d20` enum('P','E','F','') DEFAULT NULL,
  `d21` enum('P','E','F','') DEFAULT NULL,
  `d22` enum('P','E','F','') DEFAULT NULL,
  `d23` enum('P','E','F','') DEFAULT NULL,
  `d24` enum('P','E','F','') DEFAULT NULL,
  `d25` enum('P','E','F','') DEFAULT NULL,
  `d26` enum('P','E','F','') DEFAULT NULL,
  `d27` enum('P','E','F','') DEFAULT NULL,
  `d28` enum('P','E','F','') DEFAULT NULL,
  `d29` enum('P','E','F','') DEFAULT NULL,
  `d30` enum('P','E','F','') DEFAULT NULL,
  `d31` enum('P','E','F','') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presenca_posto`
--

LOCK TABLES `presenca_posto` WRITE;
/*!40000 ALTER TABLE `presenca_posto` DISABLE KEYS */;
INSERT INTO `presenca_posto` VALUES (6,'Flutuante','Em caso de falta de colaborador, o flutuante irÃ¡ substituÃ­-lo.',100,'F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F'),(7,'Setor A','Recursos Humanos.',3,'P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','F','F','F','F','F','F','F','F','F','F','F','F','F'),(8,'Setor B','LogÃ­stica.',3,'F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F'),(9,'Setor C','Service Desk.',2,'P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','P','F','F','F','F','F','F','F','F','F','F','F','F'),(10,'Setor D','TI',2,'F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F','F');
/*!40000 ALTER TABLE `presenca_posto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `nome` varchar(50) NOT NULL,
  `ulogin` int(10) NOT NULL AUTO_INCREMENT,
  `senha` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nivel_acesso` int(11) DEFAULT NULL,
  PRIMARY KEY (`ulogin`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=20210011 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('Gustavo Kenji Ando',20210001,'$2y$10$3rWb0G5ix.yCFrH.vr236ONAh.sP6NY6sJ1E1cackxk74HpURspJ2','gustavo@gmail.com',2),('KauÃ£ Gustavo Rodrigues RenÃ³',20210002,'$2y$10$Mv1dvyTdFgNjuoi2awdVG.4dma9Hok9zvGVjUcUxkbMRay9xVmQjS','kaua@gmail.com',2),('JÃºlia Rafaela Teixeira Andrade Silva',20210003,'$2y$10$XShpiaEo9/n0t.2bBCv6I.uO9l/YCK/pg.5EIswGIcjuJJL8GLA3W','julia@gmail.com',1),('Maria Eduarda Macedo Braga',20210004,'$2y$10$Kfiec0b1R52qTlBJK1N9reJTuf0dQBYQri6i/1FFCNU9dzDJrL24G','maria@gmail.com',1),('JÃºlia Maria Santos Barroso',20210005,'$2y$10$ar5upippANQVeALmUDBA2OoQeIKruZ6a7rS.ZnVJH4vsDEYaqw/5K','juliam@gmail.com',2),('LuÃ­s Henrique Ferreira Souza',20210006,'$2y$10$EUibU8bUZpA0dMM/cBnXyOhIUTX5FB5riU7151Z1IwJ/67hfYa/VS','luis@gmail.com',1),('Luiz Fernando Silva Habaeb',20210007,'$2y$10$MuGdRWza2FsjtcU36lmdgOdhnLDrRNGYbuffLLuzRNVHYT9Js/I5.','luiz@gmail.com',1),('JoÃ£o Vitor da Silva',20210009,'$2y$10$.OHpUdT4aURVaOaUetaOUuxwciYbZ9AfLBgl/KGbKBGY98scBjesG','joao@gmail.com',1),('Pedro Henrique Alves',20210010,'$2y$10$PzacmqHYYJrUTncH.t/saef.m8L19U/BMVT/MMg6PvDsYi5iXWFxW','pedro@gmail.com',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-04  9:16:12
