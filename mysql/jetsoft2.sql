CREATE DATABASE  IF NOT EXISTS `jetsoft` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `jetsoft`;
-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: jetsoft
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
  `associaçao` varchar(20) NOT NULL,
  `tipo_de_cobertura` varchar(10) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alo_colab` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alo_colab` (`alo_colab`),
  CONSTRAINT `aloca_colab` FOREIGN KEY (`alo_colab`) REFERENCES `colaboradores` (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alocacoes`
--

LOCK TABLES `alocacoes` WRITE;
/*!40000 ALTER TABLE `alocacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `alocacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `razao_social` varchar(50) NOT NULL,
  `nome_fantasia` varchar(40) NOT NULL,
  `cnpj` int(14) NOT NULL,
  `endereço` varchar(100) NOT NULL,
  `contato` varchar(100) NOT NULL,
  `clien_cont` int(11) NOT NULL,
  PRIMARY KEY (`cnpj`),
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
  `funcao` varchar(20) NOT NULL,
  `tipo_cobertura` enum('Fixo','Flutuante') NOT NULL,
  `usuario_conect` int(10) DEFAULT NULL,
  PRIMARY KEY (`matricula`),
  UNIQUE KEY `usuario_conect` (`usuario_conect`),
  CONSTRAINT `conecao_login` FOREIGN KEY (`usuario_conect`) REFERENCES `usuarios` (`ulogin`)
) ENGINE=InnoDB AUTO_INCREMENT=1243124125 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colaboradores`
--

LOCK TABLES `colaboradores` WRITE;
/*!40000 ALTER TABLE `colaboradores` DISABLE KEYS */;
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
  `Valor` decimal(10,2) NOT NULL,
  `posto_trabalho` varchar(40) NOT NULL,
  `cint_colab` int(10) NOT NULL,
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
-- Table structure for table `postos_de_trabalho`
--

DROP TABLE IF EXISTS `postos_de_trabalho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postos_de_trabalho` (
  `descriçao` text NOT NULL,
  `escala` varchar(6) NOT NULL,
  `numero_colab` int(4) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_colab` int(10) NOT NULL,
  `post_aloc` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pt_colab` (`pt_colab`),
  UNIQUE KEY `post_aloc` (`post_aloc`),
  CONSTRAINT `po_tra` FOREIGN KEY (`pt_colab`) REFERENCES `colaboradores` (`matricula`),
  CONSTRAINT `posto_alocacao` FOREIGN KEY (`post_aloc`) REFERENCES `alocacoes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postos_de_trabalho`
--

LOCK TABLES `postos_de_trabalho` WRITE;
/*!40000 ALTER TABLE `postos_de_trabalho` DISABLE KEYS */;
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
  `presenca` enum('P','F','E') DEFAULT NULL,
  `matricula` int(11) DEFAULT NULL,
  `colab_tab` int(11) DEFAULT NULL,
  `cont_qua` int(11) DEFAULT NULL,
  `pt_qua` int(11) DEFAULT NULL,
  `relatorio` text,
  `data_tempo` datetime DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `colab_tab` (`colab_tab`),
  UNIQUE KEY `cont_qua` (`cont_qua`),
  UNIQUE KEY `pt_qua` (`pt_qua`),
  KEY `login` (`matricula`),
  CONSTRAINT `connect_colab` FOREIGN KEY (`colab_tab`) REFERENCES `colaboradores` (`matricula`),
  CONSTRAINT `contrato_quadro` FOREIGN KEY (`cont_qua`) REFERENCES `contratos` (`numero`),
  CONSTRAINT `login` FOREIGN KEY (`matricula`) REFERENCES `usuarios` (`ulogin`),
  CONSTRAINT `posto_quadro` FOREIGN KEY (`pt_qua`) REFERENCES `postos_de_trabalho` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presenca`
--

LOCK TABLES `presenca` WRITE;
/*!40000 ALTER TABLE `presenca` DISABLE KEYS */;
/*!40000 ALTER TABLE `presenca` ENABLE KEYS */;
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
  `senha` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`ulogin`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=1123456790 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('Gustavo Ando',1234,'gustavo1234','gustavo@gmail.com'),('gawsgasgasg',2312412,'gwqgwaqgawgaw','fwqgwqagqwg@wqgwg');
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

-- Dump completed on 2021-09-16 14:18:41