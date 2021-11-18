-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Nov-2021 às 18:16
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `inodevsbd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alocacoes`
--

DROP TABLE IF EXISTS `alocacoes`;
CREATE TABLE IF NOT EXISTS `alocacoes` (
  `nome` varchar(50) NOT NULL,
  `associacao` varchar(20) NOT NULL,
  `tipo_de_cobertura` enum('Fixo','Flutuante') DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alo_colab` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alo_colab` (`alo_colab`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alocacoes`
--

INSERT INTO `alocacoes` (`nome`, `associacao`, `tipo_de_cobertura`, `id`, `alo_colab`) VALUES
('KauÃ£ Gustavo Rodrigues RenÃ³', 'Master', 'Fixo', 3, NULL),
('Gustavo Kenji Ando', 'Gerente', 'Flutuante', 4, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `razao_social` varchar(50) DEFAULT NULL,
  `nome_fantasia` varchar(40) DEFAULT NULL,
  `cnpj` varchar(19) NOT NULL DEFAULT '000.000.000/0000-00',
  `endereco` varchar(100) DEFAULT NULL,
  `contato` varchar(100) DEFAULT NULL,
  `clien_cont` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clien_cont` (`clien_cont`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`razao_social`, `nome_fantasia`, `cnpj`, `endereco`, `contato`, `clien_cont`, `id`) VALUES
('Supervisor de setor de TI', 'Google', '000.987.654/2003-12', 'Rua Clonas, 888', '(12)99456-7892', NULL, 1),
('Supervisor Geral', ' Coder', '000.987.654/2003-11', 'Rua Clonasa', ' (12)98797-9888', NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores`
--

DROP TABLE IF EXISTS `colaboradores`;
CREATE TABLE IF NOT EXISTS `colaboradores` (
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
  UNIQUE KEY `usuario_conect` (`usuario_conect`)
) ENGINE=InnoDB AUTO_INCREMENT=20210012 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `colaboradores`
--

INSERT INTO `colaboradores` (`cpf`, `matricula`, `nome_completo`, `data_admissao`, `data_demissao`, `situacao_cadastro`, `funcao`, `tipo_cobertura`, `posto_trabalho`, `usuario_conect`, `flutuante`) VALUES
('111.111.111-11', 20210001, 'Gustavo Kenji Ando', '2021-10-07', '2022-10-07', 'Empregado', 'Auxiliar Administrativo ', 'Flutuante', 'Flutuante', NULL, 'Gustavo Kenji Ando'),
('222.222.222-22', 20210002, 'KauÃ£ Gustavo Rodrigues RenÃ³', '2021-10-06', '2022-10-07', 'Empregado', 'Auxiliar de TI', 'Fixo', 'Setor C', NULL, 'Gustavo Kenji Ando'),
('333.333.333-33', 20210003, 'JÃºlia Rafaela Teixeira Andrade Silva', '2021-10-07', '2022-10-07', 'Em admissao', 'Contadora', 'Fixo', 'Setor B', NULL, NULL),
('444.444.444-44', 20210004, 'Maria Eduarda Macedo Braga', '2021-10-08', '2022-10-08', 'Empregado', 'Recursos Humanos', 'Fixo', 'Setor A', NULL, NULL),
('555.555.555-55', 20210005, 'JÃºlia Maria Santos Barroso', '2021-10-09', '2023-01-07', 'Em admissao', 'Administradora', 'Fixo', 'Setor B', NULL, NULL),
('666.666.666-66', 20210006, 'LuÃ­s Henrique Ferreira Souza', '2021-10-01', '2022-10-01', 'Empregado', 'EstagiÃ¡rio de TI', 'Fixo', 'Setor C', NULL, NULL),
('777.777.777-77', 20210007, 'Luiz Fernando Silva Habaeb', '2021-10-10', '2022-10-10', 'Em admissao', 'Recursos Humanos', 'Fixo', 'Setor A', NULL, NULL),
('999.999.999-99', 20210009, 'JoÃ£o Vitor da Silva', '2020-12-01', '2021-12-01', 'Empregado', 'EstagiÃ¡rio', 'Fixo', 'Setor A', NULL, NULL),
('111.111.111-13', 20210011, 'Pedro Alvarez Cabral', '2021-11-15', '2021-11-20', 'Empregado', 'Estagiario', 'Fixo', 'Setor C', NULL, 'Gustavo Kenji Ando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratos`
--

DROP TABLE IF EXISTS `contratos`;
CREATE TABLE IF NOT EXISTS `contratos` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `nome_fantasi` varchar(30) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `posto_trabalho` varchar(40) NOT NULL,
  `cint_colab` int(10) DEFAULT NULL,
  `escala` varchar(6) NOT NULL,
  PRIMARY KEY (`numero`),
  UNIQUE KEY `cint_colab` (`cint_colab`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contratos`
--

INSERT INTO `contratos` (`numero`, `nome_fantasi`, `valor`, `posto_trabalho`, `cint_colab`, `escala`) VALUES
(3, 'Coder', '2500.00', 'Setor C - fixo - 3', NULL, '12x24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `flutuante`
--

DROP TABLE IF EXISTS `flutuante`;
CREATE TABLE IF NOT EXISTS `flutuante` (
  `matricula` int(10) NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(50) NOT NULL,
  `funcao` varchar(50) NOT NULL,
  `subs` text,
  PRIMARY KEY (`matricula`)
) ENGINE=MyISAM AUTO_INCREMENT=20210014 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `flutuante`
--

INSERT INTO `flutuante` (`matricula`, `nome_completo`, `funcao`, `subs`) VALUES
(20210001, 'Gustavo Kenji Ando', 'Auxiliar Administrativo', ' \nPedro Alvarez Cabral');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postos_de_trabalho`
--

DROP TABLE IF EXISTS `postos_de_trabalho`;
CREATE TABLE IF NOT EXISTS `postos_de_trabalho` (
  `nome_posto` varchar(20) NOT NULL,
  `descricao` text NOT NULL,
  `escala` varchar(6) NOT NULL,
  `numero_colab` int(4) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_colab` int(10) DEFAULT NULL,
  `post_aloc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pt_colab` (`pt_colab`),
  UNIQUE KEY `post_aloc` (`post_aloc`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `postos_de_trabalho`
--

INSERT INTO `postos_de_trabalho` (`nome_posto`, `descricao`, `escala`, `numero_colab`, `id`, `pt_colab`, `post_aloc`) VALUES
('Flutuante', 'Em caso de falta de colaborador, o flutuante irÃ¡ substituÃ­-lo.', '0x0', 100, 6, NULL, NULL),
('Setor A', '  Recursos Humanos.', '8x16', 3, 7, NULL, NULL),
('Setor B', 'LogÃ­stica.', '9x15', 3, 8, NULL, NULL),
('Setor C', 'Service Desk.', '8x16', 2, 9, NULL, NULL),
('Setor D', 'TI', '12x24', 2, 10, NULL, NULL),
('Setor E', 'Suporte TÃ©cnico', '9x13', 4, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `presenca`
--

DROP TABLE IF EXISTS `presenca`;
CREATE TABLE IF NOT EXISTS `presenca` (
  `colaborador` varchar(50) DEFAULT NULL,
  `posto_de_trabalho` varchar(10) DEFAULT NULL,
  `matricula` int(11) DEFAULT NULL,
  `colab_tab` int(11) DEFAULT NULL,
  `cont_qua` int(11) DEFAULT NULL,
  `pt_qua` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `d1` enum('F','E','P','') DEFAULT NULL,
  `d2` enum('F','E','P','') DEFAULT NULL,
  `d3` enum('F','E','P','') DEFAULT NULL,
  `d4` enum('F','E','P','') DEFAULT NULL,
  `d5` enum('F','E','P','') DEFAULT NULL,
  `d6` enum('F','E','P','') DEFAULT NULL,
  `d7` enum('F','E','P','') DEFAULT NULL,
  `d8` enum('F','E','P','') DEFAULT NULL,
  `d9` enum('F','E','P','') DEFAULT NULL,
  `d10` enum('F','E','P','') DEFAULT NULL,
  `d11` enum('F','E','P','') DEFAULT NULL,
  `d12` enum('F','E','P','') DEFAULT NULL,
  `d13` enum('F','E','P','') DEFAULT NULL,
  `d14` enum('F','E','P','') DEFAULT NULL,
  `d15` enum('F','E','P','') DEFAULT NULL,
  `d16` enum('F','E','P','') DEFAULT NULL,
  `d17` enum('F','E','P','') DEFAULT NULL,
  `d18` enum('F','E','P','') DEFAULT NULL,
  `d19` enum('F','E','P','') DEFAULT NULL,
  `d20` enum('F','E','P','') DEFAULT NULL,
  `d21` enum('F','E','P','') DEFAULT NULL,
  `d22` enum('F','E','P','') DEFAULT NULL,
  `d23` enum('F','E','P','') DEFAULT NULL,
  `d24` enum('F','E','P','') DEFAULT NULL,
  `d25` enum('F','E','P','') DEFAULT NULL,
  `d26` enum('F','E','P','') DEFAULT NULL,
  `d27` enum('F','E','P','') DEFAULT NULL,
  `d28` enum('F','E','P','') DEFAULT NULL,
  `d29` enum('F','E','P','') DEFAULT NULL,
  `d30` enum('F','E','P','') DEFAULT NULL,
  `d31` enum('F','E','P','') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `colab_tab` (`colab_tab`),
  UNIQUE KEY `cont_qua` (`cont_qua`),
  UNIQUE KEY `pt_qua` (`pt_qua`),
  KEY `login` (`matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `presenca`
--

INSERT INTO `presenca` (`colaborador`, `posto_de_trabalho`, `matricula`, `colab_tab`, `cont_qua`, `pt_qua`, `id`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`) VALUES
('KauÃ£ Gustavo Rodrigues RenÃ³', 'Setor C', NULL, NULL, NULL, NULL, 20, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('JÃºlia Rafaela Teixeira Andrade Silva', 'Setor B', NULL, NULL, NULL, NULL, 21, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('Maria Eduarda Macedo Braga', 'Setor A', NULL, NULL, NULL, NULL, 22, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('JÃºlia Maria Santos Barroso', 'Setor B', NULL, NULL, NULL, NULL, 23, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('LuÃ­s Henrique Ferreira Souza', 'Setor C', NULL, NULL, NULL, NULL, 24, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('Luiz Fernando Silva Habaeb', 'Setor A', NULL, NULL, NULL, NULL, 25, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('JoÃ£o Vitor da Silva', 'Setor A', NULL, NULL, NULL, NULL, 27, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('Gustavo Kenji Ando', 'Flutuante', NULL, NULL, NULL, NULL, 31, 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('Pedro Alvarez Cabral', 'Setor C', NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `presenca_posto`
--

DROP TABLE IF EXISTS `presenca_posto`;
CREATE TABLE IF NOT EXISTS `presenca_posto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posto_de_trabalho` varchar(20) DEFAULT NULL,
  `descricao` text,
  `numero_colab` int(11) NOT NULL,
  `d1` enum('F','E','P','') DEFAULT NULL,
  `d2` enum('F','E','P','') DEFAULT NULL,
  `d3` enum('F','E','P','') DEFAULT NULL,
  `d4` enum('F','E','P','') DEFAULT NULL,
  `d5` enum('F','E','P','') DEFAULT NULL,
  `d6` enum('F','E','P','') DEFAULT NULL,
  `d7` enum('F','E','P','') DEFAULT NULL,
  `d8` enum('F','E','P','') DEFAULT NULL,
  `d9` enum('F','E','P','') DEFAULT NULL,
  `d10` enum('F','E','P','') DEFAULT NULL,
  `d11` enum('F','E','P','') DEFAULT NULL,
  `d12` enum('F','E','P','') DEFAULT NULL,
  `d13` enum('F','E','P','') DEFAULT NULL,
  `d14` enum('F','E','P','') DEFAULT NULL,
  `d15` enum('F','E','P','') DEFAULT NULL,
  `d16` enum('F','E','P','') DEFAULT NULL,
  `d17` enum('F','E','P','') DEFAULT NULL,
  `d18` enum('F','E','P','') DEFAULT NULL,
  `d19` enum('F','E','P','') DEFAULT NULL,
  `d20` enum('F','E','P','') DEFAULT NULL,
  `d21` enum('F','E','P','') DEFAULT NULL,
  `d22` enum('F','E','P','') DEFAULT NULL,
  `d23` enum('F','E','P','') DEFAULT NULL,
  `d24` enum('F','E','P','') DEFAULT NULL,
  `d25` enum('F','E','P','') DEFAULT NULL,
  `d26` enum('F','E','P','') DEFAULT NULL,
  `d27` enum('F','E','P','') DEFAULT NULL,
  `d28` enum('F','E','P','') DEFAULT NULL,
  `d29` enum('F','E','P','') DEFAULT NULL,
  `d30` enum('F','E','P','') DEFAULT NULL,
  `d31` enum('F','E','P','') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `presenca_posto`
--

INSERT INTO `presenca_posto` (`id`, `posto_de_trabalho`, `descricao`, `numero_colab`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`) VALUES
(6, 'Flutuante', 'Em caso de falta de colaborador, o flutuante irÃ¡ substituÃ­-lo.', 100, 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F'),
(7, 'Setor A', 'Recursos Humanos.', 3, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F'),
(8, 'Setor B', 'LogÃ­stica.', 2, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F'),
(9, 'Setor C', 'Service Desk.', 2, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'F', 'P', 'P', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F'),
(10, 'Setor D', 'TI', 2, 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F'),
(11, 'Setor E', 'Suporte TÃ©cnico', 4, 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorios`
--

DROP TABLE IF EXISTS `relatorios`;
CREATE TABLE IF NOT EXISTS `relatorios` (
  `titulo` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `conteudo` longtext CHARACTER SET utf8,
  `tipo_relatorio` enum('Quadro de Presenca','Gerencial') CHARACTER SET utf8 DEFAULT NULL,
  `data_relatorio` datetime DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `relatorios`
--

INSERT INTO `relatorios` (`titulo`, `conteudo`, `tipo_relatorio`, `data_relatorio`, `id`) VALUES
('RelatÃ³rio Quadro de PresenÃ§a de Outubro de 2021', '<!DOCTYPE html>\n<html lang=\"pt-br\">\n<head>\n    <meta charset=\"UTF-8\">\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    <title>RelatÃ³rio de Outubro de 2021</title>\n    <link rel=\"stylesheet\" href=\"../../css/relatorioquadro.css\">\n    <script type=\"text/javascript\" src=\"https://www.google.com/jsapi\"></script>\n    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>\n    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js\"></script>\n</head>\n<body>\n<div id=\"htmlpdf\">\n    <h1>RelatÃ³rio de Quadro de PresenÃ§a de Outubro de 2021 </h1>\n    <table id=\"tabela\">\n    <tr>\n        <td id=\"titulo\" rowspan=\"2\"colspan=\"1\">Posto de Trabalho</td>\n        <td id=\"titulo\" colspan=\"31\">Outubro</td>\n    </tr>\n    <tr>\n        <td id=\"titulo\"> 1 </td><td id=\"titulo\"> 2 </td><td id=\"titulo\"> 3 </td><td id=\"titulo\"> 4 </td><td id=\"titulo\"> 5 </td><td id=\"titulo\"> 6 </td><td id=\"titulo\"> 7 </td><td id=\"titulo\"> 8 </td><td id=\"titulo\"> 9 </td><td id=\"titulo\">10</td><td id=\"titulo\">11</td><td id=\"titulo\">12</td><td id=\"titulo\">13</td><td id=\"titulo\">14</td><td id=\"titulo\">15</td><td id=\"titulo\">16</td><td id=\"titulo\">17</td><td id=\"titulo\">18</td><td id=\"titulo\">19</td><td id=\"titulo\">20</td><td id=\"titulo\">21</td><td id=\"titulo\">22</td><td id=\"titulo\">23</td><td id=\"titulo\">24</td><td id=\"titulo\">25</td><td id=\"titulo\">26</td><td id=\"titulo\">27</td><td id=\"titulo\">28</td><td id=\"titulo\">29</td><td id=\"titulo\">30</td><td id=\"titulo\">31</td>\n    </tr>\n        <tr class=\"item\"><td><div class=\"posto\">Flutuante</div></td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td></tr><tr class=\"item\"><td><div class=\"posto\">Setor A</div></td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td></tr><tr><td>Maria Eduarda Macedo Braga</td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><tr><td>Luiz Fernando Silva Habaeb</td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><tr><td>JoÃ£o Vitor da Silva</td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><tr class=\"item\"><td><div class=\"posto\">Setor B</div></td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td></tr><tr><td>JÃºlia Rafaela Teixeira Andrade Silva</td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><tr><td>JÃºlia Maria Santos Barroso</td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><tr class=\"item\"><td><div class=\"posto\">Setor C</div></td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"green\">P</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td></tr><tr><td>KauÃ£ Gustavo Rodrigues RenÃ³</td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><tr><td>LuÃ­s Henrique Ferreira Souza</td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"green\">P </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><tr><td>Gustavo Kenji Ando</td><td class=\"blue\">E</td><td class=\"blue\">E</td><td class=\"blue\">E</td><td class=\"blue\">E</td><td class=\"blue\">E</td><td class=\"blue\">E</td><td class=\"blue\">E</td><td class=\"blue\">E</td><td class=\"blue\">E</td><td class=\"blue\">E</td><td class=\"blue\">E</td><td class=\"blue\">E</td><td class=\"blue\">E</td><td class=\"blue\">E</td><td class=\"blue\">E</td><td class=\"blue\">E</td><td class=\"blue\">E</td><td class=\"blue\">E</td><td class=\"green\">P </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><tr class=\"item\"><td><div class=\"posto\">Setor D</div></td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td><td class=\"red\">F</td></tr><tr><td>Pedro Henrique Alves</td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td><td class=\"red\">F </td>\n    </tr>\n    </table>\n    <h2>Flutuante</h2><p><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><br>Total de PresenÃ§as: 0<br>Total de Faltas: 31</p><ul></ul><h2>Setor A</h2><p><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><br>Total de PresenÃ§as: 18<br>Total de Faltas: 13</p><ul><li><h3>Maria Eduarda Macedo Braga</h3><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><br>Total de PresenÃ§as: 18<br>Total de Eventos: 0<br>Total de Faltas: 13</li><br><li><h3>Luiz Fernando Silva Habaeb</h3><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><br>Total de PresenÃ§as: 18<br>Total de Eventos: 0<br>Total de Faltas: 13</li><br><li><h3>JoÃ£o Vitor da Silva</h3><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><br>Total de PresenÃ§as: 18<br>Total de Eventos: 0<br>Total de Faltas: 13</li><br></ul><h2>Setor B</h2><p><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><br>Total de PresenÃ§as: 0<br>Total de Faltas: 31</p><ul><li><h3>JÃºlia Rafaela Teixeira Andrade Silva</h3><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><br>Total de PresenÃ§as: 18<br>Total de Eventos: 0<br>Total de Faltas: 13</li><br><li><h3>JÃºlia Maria Santos Barroso</h3><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><br>Total de PresenÃ§as: 18<br>Total de Eventos: 0<br>Total de Faltas: 13</li><br></ul><h2>Setor C</h2><p><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><br>Total de PresenÃ§as: 19<br>Total de Faltas: 12</p><ul><li><h3>KauÃ£ Gustavo Rodrigues RenÃ³</h3><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><br>Total de PresenÃ§as: 19<br>Total de Eventos: 0<br>Total de Faltas: 12</li><br><li><h3>LuÃ­s Henrique Ferreira Souza</h3><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"green2\">P </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><br>Total de PresenÃ§as: 18<br>Total de Eventos: 0<br>Total de Faltas: 13</li><br><li><h3>Gustavo Kenji Ando</h3><div class=\"blue2\">E </div><div class=\"blue2\">E </div><div class=\"blue2\">E </div><div class=\"blue2\">E </div><div class=\"blue2\">E </div><div class=\"blue2\">E </div><div class=\"blue2\">E </div><div class=\"blue2\">E </div><div class=\"blue2\">E </div><div class=\"blue2\">E </div><div class=\"blue2\">E </div><div class=\"blue2\">E </div><div class=\"blue2\">E </div><div class=\"blue2\">E </div><div class=\"blue2\">E </div><div class=\"blue2\">E </div><div class=\"blue2\">E </div><div class=\"blue2\">E </div><div class=\"green2\">P </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><br>Total de PresenÃ§as: 1<br>Total de Eventos: 18<br>Total de Faltas: 12</li><br></ul><h2>Setor D</h2><p><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><br>Total de PresenÃ§as: 0<br>Total de Faltas: 31</p><ul><li><h3>Pedro Henrique Alves</h3><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><div class=\"red2\">F </div><br>Total de PresenÃ§as: 0<br>Total de Eventos: 0<br>Total de Faltas: 31</li><br></ul>\n</div>\n<form method=\"post\" id=\"make_pdf\" action=\"pdfquadro.php\" target=\"_blank\">\n    <input type=\"hidden\" name=\"hidden_html\" id=\"hidden_html\">\n    <button type=\"button\" name=\"create_pdf\" id=\"create_pdf\">Gerar PDF</button>\n</form>\n<a href=\"bdrelatorioquadro.php\" type=\"button\" id=\"salvar\">Salvar no HistÃ³rico</a>    <script>\n    $(document).ready(function(){\n        $(\"#create_pdf\").click(function(){\n            $(\"#hidden_html\").val($(\"#htmlpdf\").html());\n            $(\"#make_pdf\").submit();\n        });\n    });\n    </script>\n</body>\n</html>', 'Quadro de Presenca', '2021-11-12 14:46:43', 1),
('RelatÃ³rio Gerencial de Outubro de 2021', '<!DOCTYPE html>\n<html lang=\"pt-br\">\n<head>\n    <meta charset=\"UTF-8\">\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    <title>RelatÃ³rio de Outubro de 2021</title>\n    <link rel=\"stylesheet\" href=\"../../css/relatorio.css\">\n    <script type=\"text/javascript\" src=\"https://www.google.com/jsapi\"></script>\n    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>\n    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js\"></script>\n</head>\n<body>\n<div id=\"htmlpdf\">\n        <h1>RelatÃ³rio Gerencial de Outubro de 2021</h1>\n        <h2>Gerais</h2> \n        <h3>GrÃ¡ficos</h3>\n        <div id=\"graficos\">\n            <div id=\"local3\">\n                <div id=\"chart_div\"></div>\n            </div>\n            <div id=\"local4\">\n                <div id=\"blococ\">\n                    <div id=\"chart_div2\"></div>\n                </div>\n                <div id=\"blocod\">\n                    <div id=\"chart_div3\"></div>\n                </div>\n            </div>\n        </div>\n    <div id=\"local1\">\n        <h5>Geral</h5>\n        <p>Porcentagem de presenÃ§a: 38.02%</p>\n        <p>Porcentagem de faltas: 57.83%</p>\n        <p>Porcentagem de evento: 4.15%</p>\n    </div>\n    <div id=\"local2\">\n        <div id=\"blocoa\">\n            <h6>Postos de Trabalho</h6>\n            <p>Porcentagem de presenÃ§a: 23.87%</p>\n            <p>Porcentagem de faltas: 76.13%</p>\n        </div>\n        <div id=\"blocob\">\n        <h5>Colaboradores</h5>\n            <p>Porcentagem de presenÃ§a: 45.88%</p>\n            <p>Porcentagem de falta: 47.67%</p>\n            <p>Porcentagem de evento: 6.45%</p>\n        </div>\n    </div>\n        <div id=\"left\">\n        <h6>Postos de Trabalho</h6>\n            <h5>Flutuante</h5><p>Porcentagem de presenÃ§a: 0.00%</p><p>Porcentagem de falta: 100.00%</p><h5>Setor A</h5><p>Porcentagem de presenÃ§a: 58.06%</p><p>Porcentagem de falta: 41.94%</p><h5>Setor B</h5><p>Porcentagem de presenÃ§a: 0.00%</p><p>Porcentagem de falta: 100.00%</p><h5>Setor C</h5><p>Porcentagem de presenÃ§a: 61.29%</p><p>Porcentagem de falta: 38.71%</p><h5>Setor D</h5><p>Porcentagem de presenÃ§a: 0.00%</p><p>Porcentagem de falta: 100.00%</p>\n        </div>\n        <div id=\"right\">\n        <h6>Colaboradores</h6>\n            <h5>Maria Eduarda Macedo Braga</h5><p>Posto de trabalho: Setor A<p>Porcentagem de presenÃ§a: 58.06%</p><p>Porcentagem de falta: 41.94%</p><p>Porcentagem de evento: 0.00%</p><h5>Luiz Fernando Silva Habaeb</h5><p>Posto de trabalho: Setor A<p>Porcentagem de presenÃ§a: 58.06%</p><p>Porcentagem de falta: 41.94%</p><p>Porcentagem de evento: 0.00%</p><h5>JoÃ£o Vitor da Silva</h5><p>Posto de trabalho: Setor A<p>Porcentagem de presenÃ§a: 58.06%</p><p>Porcentagem de falta: 41.94%</p><p>Porcentagem de evento: 0.00%</p><h5>JÃºlia Rafaela Teixeira Andrade Silva</h5><p>Posto de trabalho: Setor B<p>Porcentagem de presenÃ§a: 58.06%</p><p>Porcentagem de falta: 41.94%</p><p>Porcentagem de evento: 0.00%</p><h5>JÃºlia Maria Santos Barroso</h5><p>Posto de trabalho: Setor B<p>Porcentagem de presenÃ§a: 58.06%</p><p>Porcentagem de falta: 41.94%</p><p>Porcentagem de evento: 0.00%</p><h5>KauÃ£ Gustavo Rodrigues RenÃ³</h5><p>Posto de trabalho: Setor C<p>Porcentagem de presenÃ§a: 61.29%</p><p>Porcentagem de falta: 38.71%</p><p>Porcentagem de evento: 0.00%</p><h5>LuÃ­s Henrique Ferreira Souza</h5><p>Posto de trabalho: Setor C<p>Porcentagem de presenÃ§a: 58.06%</p><p>Porcentagem de falta: 41.94%</p><p>Porcentagem de evento: 0.00%</p><h5>Gustavo Kenji Ando</h5><p>Posto de trabalho: Setor C<p>Porcentagem de presenÃ§a: 3.23%</p><p>Porcentagem de falta: 38.71%</p><p>Porcentagem de evento: 58.06%</p><h5>Pedro Henrique Alves</h5><p>Posto de trabalho: Setor D<p>Porcentagem de presenÃ§a: 0.00%</p><p>Porcentagem de falta: 100.00%</p><p>Porcentagem de evento: 0.00%</p>\n        </div>\n</div>\n<form method=\"post\" id=\"make_pdf\" action=\"pdfgerencial.php\" target=\"_blank\">\n    <input type=\"hidden\" name=\"hidden_html\" id=\"hidden_html\">\n    <button type=\"button\" name=\"create_pdf\" id=\"create_pdf\">Gerar PDF</button>\n</form>\n<a href=\"bdrelatoriogerencial.php\" id=\"salvar\">Salvar no HistÃ³rico</a>    <script>\n    google.charts.load(\"current\", {\n    packages: [\"controls\", \"corechart\", \"table\"]\n    }).then(function () {\n    var data = new google.visualization.DataTable();\n    data.addColumn(\"string\", \"PresenÃ§as\");    \n    data.addColumn(\"number\", \"Quantidade\");\n    data.addRows([\n        [\"PresenÃ§as\", 165],\n        [\"Eventos\", 18],\n        [\"Faltas\", 251],\n    ]);\n    var container = document.getElementById(\"chart_div\");\n    var chart = new google.visualization.PieChart(container);\n    google.visualization.events.addListener(chart, \"ready\", function(){\n        container.innerHTML = `<img src=\"` + chart.getImageURI() + `\">`;\n    });\n    var data2 = new google.visualization.DataTable();\n    data2.addColumn(\"string\", \"PresenÃ§as\");    \n    data2.addColumn(\"number\", \"Quantidade\");\n    data2.addRows([\n        [\"PresenÃ§as\", 37],\n        [\"Eventos\", 118],\n    ]);\n    var container2 = document.getElementById(\"chart_div2\");\n    var chart2 = new google.visualization.PieChart(container2);\n    google.visualization.events.addListener(chart2, \"ready\", function(){\n        container2.innerHTML = `<img src=\"` + chart2.getImageURI() + `\">`;\n    });\n    var data3 = new google.visualization.DataTable();\n    data3.addColumn(\"string\", \"PresenÃ§as\");    \n    data3.addColumn(\"number\", \"Quantidade\");\n    data3.addRows([\n        [\"PresenÃ§as\", 128],\n        [\"Eventos\", 18],\n        [\"Faltas\", 133],\n    ]);\n    var container3 = document.getElementById(\"chart_div3\");\n    var chart3 = new google.visualization.PieChart(container3);\n    google.visualization.events.addListener(chart3, \"ready\", function(){\n        container3.innerHTML = `<img src=\"` + chart3.getImageURI() + `\">`;\n    });\n    chart.draw(data, {\n        height: 300,\n        title: \"GrÃ¡fico Geral de PresenÃ§as\",\n        width: 400,\n        colors: [\"green\", \"blue\", \"red\"]\n    });\n    chart2.draw(data2, {\n        height: 300,\n        title: \"GrÃ¡fico Geral de PresenÃ§as de Postos de Trabalho\",\n        width: 400,\n        colors: [\"green\", \"red\"]\n    });\n    chart3.draw(data3, {\n        height: 300,\n        title: \"GrÃ¡fico Geral de PresenÃ§as de Colaboradores\",\n        width: 400,\n        colors: [\"green\", \"blue\", \"red\"]\n    });\n    });\n    $(document).ready(function(){\n        $(\"#create_pdf\").click(function(){\n            $(\"#hidden_html\").val($(\"#htmlpdf\").html());\n            $(\"#make_pdf\").submit();\n        });\n    });\n    </script>\n</body>\n</html>', 'Gerencial', '2021-11-12 14:52:31', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `nome` varchar(50) NOT NULL,
  `ulogin` int(10) NOT NULL AUTO_INCREMENT,
  `senha` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nivel_acesso` int(11) DEFAULT NULL,
  PRIMARY KEY (`ulogin`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=20210012 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`nome`, `ulogin`, `senha`, `email`, `nivel_acesso`) VALUES
('Gustavo Kenji Ando', 20210001, '$2y$10$3rWb0G5ix.yCFrH.vr236ONAh.sP6NY6sJ1E1cackxk74HpURspJ2', 'gustavokenji@gmail.com', 2),
('KauÃ£ Gustavo Rodrigues RenÃ³', 20210002, '$2y$10$Mv1dvyTdFgNjuoi2awdVG.4dma9Hok9zvGVjUcUxkbMRay9xVmQjS', 'kaua@gmail.com', 2),
('JÃºlia Rafaela Teixeira Andrade Silva', 20210003, '$2y$10$XShpiaEo9/n0t.2bBCv6I.uO9l/YCK/pg.5EIswGIcjuJJL8GLA3W', 'julia@gmail.com', 1),
('Maria Eduarda Macedo Braga', 20210004, '$2y$10$Kfiec0b1R52qTlBJK1N9reJTuf0dQBYQri6i/1FFCNU9dzDJrL24G', 'maria@gmail.com', 1),
('JÃºlia Maria Santos Barroso', 20210005, '$2y$10$ar5upippANQVeALmUDBA2OoQeIKruZ6a7rS.ZnVJH4vsDEYaqw/5K', 'juliam@gmail.com', 2),
('LuÃ­s Henrique Ferreira Souza', 20210006, '$2y$10$EUibU8bUZpA0dMM/cBnXyOhIUTX5FB5riU7151Z1IwJ/67hfYa/VS', 'luis@gmail.com', 1),
('Luiz Fernando Silva Habaeb', 20210007, '$2y$10$MuGdRWza2FsjtcU36lmdgOdhnLDrRNGYbuffLLuzRNVHYT9Js/I5.', 'luiz@gmail.com', 1),
('JoÃ£o Vitor da Silva', 20210009, '$2y$10$.OHpUdT4aURVaOaUetaOUuxwciYbZ9AfLBgl/KGbKBGY98scBjesG', 'joao@gmail.com', 1),
('Pedro Alvarez Cabral', 20210011, '$2y$10$G6W84qmtXNzfCwYvp87XKe3aPnuOiC5O6z3oO1N0TfBF49fZZ9gH6', 'pedro@gmail.com', 1);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alocacoes`
--
ALTER TABLE `alocacoes`
  ADD CONSTRAINT `aloca_colab` FOREIGN KEY (`alo_colab`) REFERENCES `colaboradores` (`matricula`);

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `cliente_contrato` FOREIGN KEY (`clien_cont`) REFERENCES `contratos` (`numero`);

--
-- Limitadores para a tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD CONSTRAINT `conecao_login` FOREIGN KEY (`usuario_conect`) REFERENCES `usuarios` (`ulogin`);

--
-- Limitadores para a tabela `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contra_colabo` FOREIGN KEY (`cint_colab`) REFERENCES `colaboradores` (`matricula`);

--
-- Limitadores para a tabela `postos_de_trabalho`
--
ALTER TABLE `postos_de_trabalho`
  ADD CONSTRAINT `po_tra` FOREIGN KEY (`pt_colab`) REFERENCES `colaboradores` (`matricula`),
  ADD CONSTRAINT `posto_alocacao` FOREIGN KEY (`post_aloc`) REFERENCES `alocacoes` (`id`);

--
-- Limitadores para a tabela `presenca`
--
ALTER TABLE `presenca`
  ADD CONSTRAINT `connect_colab` FOREIGN KEY (`colab_tab`) REFERENCES `colaboradores` (`matricula`),
  ADD CONSTRAINT `contrato_quadro` FOREIGN KEY (`cont_qua`) REFERENCES `contratos` (`numero`),
  ADD CONSTRAINT `login` FOREIGN KEY (`matricula`) REFERENCES `usuarios` (`ulogin`),
  ADD CONSTRAINT `posto_quadro` FOREIGN KEY (`pt_qua`) REFERENCES `postos_de_trabalho` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
