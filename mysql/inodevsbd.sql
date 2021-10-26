-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 26-Out-2021 às 18:17
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alocacoes`
--

INSERT INTO `alocacoes` (`nome`, `associacao`, `tipo_de_cobertura`, `id`, `alo_colab`) VALUES
('Gustavo Kenji Ando', 'Estagiario', 'Flutuante', 2, NULL),
('KauÃ£ Gustavo Rodrigues RenÃ³', 'Master', 'Fixo', 3, NULL);

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
  PRIMARY KEY (`matricula`),
  UNIQUE KEY `usuario_conect` (`usuario_conect`)
) ENGINE=InnoDB AUTO_INCREMENT=20210011 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `colaboradores`
--

INSERT INTO `colaboradores` (`cpf`, `matricula`, `nome_completo`, `data_admissao`, `data_demissao`, `situacao_cadastro`, `funcao`, `tipo_cobertura`, `posto_trabalho`, `usuario_conect`) VALUES
('111.111.111-11', 20210001, 'Gustavo Kenji Ando', '2021-10-07', '2022-10-07', 'Empregado', 'Auxiliar Administrativo ', 'Flutuante', 'Flutuante', NULL),
('222.222.222-22', 20210002, 'KauÃ£ Gustavo Rodrigues RenÃ³', '2021-10-06', '2022-10-07', 'Empregado', 'Auxiliar de TI', 'Fixo', 'Setor C', NULL),
('333.333.333-33', 20210003, 'JÃºlia Rafaela Teixeira Andrade Silva', '2021-10-07', '2022-10-07', 'Em admissao', 'Contadora', 'Fixo', 'Setor B', NULL),
('444.444.444-44', 20210004, 'Maria Eduarda Macedo Braga', '2021-10-08', '2022-10-08', 'Empregado', 'Recursos Humanos', 'Fixo', 'Setor A', NULL),
('555.555.555-55', 20210005, 'JÃºlia Maria Santos Barroso', '2021-10-09', '2023-01-07', 'Em admissao', 'Administradora', 'Fixo', 'Setor B', NULL),
('666.666.666-66', 20210006, 'LuÃ­s Henrique Ferreira Souza', '2021-10-01', '2022-10-01', 'Empregado', 'EstagiÃ¡rio de TI', 'Fixo', 'Setor C', NULL),
('777.777.777-77', 20210007, 'Luiz Fernando Silva Habaeb', '2021-10-10', '2022-10-10', 'Em admissao', 'Recursos Humanos', 'Fixo', 'Setor A', NULL),
('888.888.888-88', 20210008, 'Dante Demetrius Pereira Silva', '2021-10-05', '2022-10-05', 'Empregado', 'Administrador', 'Fixo', 'Setor B', NULL),
('999.999.999-99', 20210009, 'JoÃ£o Vitor da Silva', '2020-12-01', '2021-12-01', 'Empregado', 'EstagiÃ¡rio', 'Fixo', 'Setor A', NULL),
('101.010.101-01', 20210010, 'Pedro Henrique Alves', '2021-10-18', '2021-10-28', 'Empregado', 'Estagiario', 'Fixo', 'Setor D', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratos`
--

DROP TABLE IF EXISTS `contratos`;
CREATE TABLE IF NOT EXISTS `contratos` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(30) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `posto_trabalho` varchar(40) NOT NULL,
  `cint_colab` int(10) DEFAULT NULL,
  `escala` varchar(6) NOT NULL,
  PRIMARY KEY (`numero`),
  UNIQUE KEY `cint_colab` (`cint_colab`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `postos_de_trabalho`
--

INSERT INTO `postos_de_trabalho` (`nome_posto`, `descricao`, `escala`, `numero_colab`, `id`, `pt_colab`, `post_aloc`) VALUES
('Flutuante', 'Em caso de falta de colaborador, o flutuante irÃ¡ substituÃ­-lo.', '0x0', 100, 6, NULL, NULL),
('Setor A', 'Recursos Humanos.', '8x16', 3, 7, NULL, NULL),
('Setor B', 'LogÃ­stica.', '9x15', 3, 8, NULL, NULL),
('Setor C', 'Service Desk.', '8x16', 2, 9, NULL, NULL),
('Setor D', 'TI', '12x24', 2, 10, NULL, NULL);

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
  KEY `login` (`matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `presenca`
--

INSERT INTO `presenca` (`colaborador`, `posto_de_trabalho`, `matricula`, `colab_tab`, `cont_qua`, `pt_qua`, `id`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`) VALUES
('KauÃ£ Gustavo Rodrigues RenÃ³', 'Setor C', NULL, NULL, NULL, NULL, 20, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', ''),
('JÃºlia Rafaela Teixeira Andrade Silva', 'Setor B', NULL, NULL, NULL, NULL, 21, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('Maria Eduarda Macedo Braga', 'Setor A', NULL, NULL, NULL, NULL, 22, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('JÃºlia Maria Santos Barroso', 'Setor B', NULL, NULL, NULL, NULL, 23, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('LuÃ­s Henrique Ferreira Souza', 'Setor C', NULL, NULL, NULL, NULL, 24, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('Luiz Fernando Silva Habaeb', 'Setor A', NULL, NULL, NULL, NULL, 25, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('Dante Demetrius Pereira Silva', 'Setor B', NULL, NULL, NULL, NULL, 26, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('JoÃ£o Vitor da Silva', 'Setor A', NULL, NULL, NULL, NULL, 27, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('Gustavo Kenji Ando', 'Setor C', NULL, NULL, NULL, NULL, 31, 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'P', '', '', '', '', '', '', '', '', '', '', '', ''),
('Pedro Henrique Alves', 'Setor D', NULL, NULL, NULL, NULL, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Extraindo dados da tabela `presenca_posto`
--

INSERT INTO `presenca_posto` (`id`, `posto_de_trabalho`, `descricao`, `numero_colab`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`) VALUES
(6, 'Flutuante', 'Em caso de falta de colaborador, o flutuante irÃ¡ substituÃ­-lo.', 100, 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'Setor A', 'Recursos Humanos.', 3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'Setor B', 'LogÃ­stica.', 3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'Setor C', 'Service Desk.', 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'Setor D', 'TI', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=20210011 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`nome`, `ulogin`, `senha`, `email`, `nivel_acesso`) VALUES
('Gustavo Kenji Ando', 20210001, '$2y$10$3rWb0G5ix.yCFrH.vr236ONAh.sP6NY6sJ1E1cackxk74HpURspJ2', 'gustavo@gmail.com', 2),
('KauÃ£ Gustavo Rodrigues RenÃ³', 20210002, '$2y$10$Mv1dvyTdFgNjuoi2awdVG.4dma9Hok9zvGVjUcUxkbMRay9xVmQjS', 'kaua@gmail.com', 2),
('JÃºlia Rafaela Teixeira Andrade Silva', 20210003, '$2y$10$XShpiaEo9/n0t.2bBCv6I.uO9l/YCK/pg.5EIswGIcjuJJL8GLA3W', 'julia@gmail.com', 1),
('Maria Eduarda Macedo Braga', 20210004, '$2y$10$Kfiec0b1R52qTlBJK1N9reJTuf0dQBYQri6i/1FFCNU9dzDJrL24G', 'maria@gmail.com', 1),
('JÃºlia Maria Santos Barroso', 20210005, '$2y$10$ar5upippANQVeALmUDBA2OoQeIKruZ6a7rS.ZnVJH4vsDEYaqw/5K', 'juliam@gmail.com', 2),
('LuÃ­s Henrique Ferreira Souza', 20210006, '$2y$10$EUibU8bUZpA0dMM/cBnXyOhIUTX5FB5riU7151Z1IwJ/67hfYa/VS', 'luis@gmail.com', 1),
('Luiz Fernando Silva Habaeb', 20210007, '$2y$10$MuGdRWza2FsjtcU36lmdgOdhnLDrRNGYbuffLLuzRNVHYT9Js/I5.', 'luiz@gmail.com', 1),
('Dante Demetrius Pereira Silva', 20210008, '$2y$10$27pJ3hK2OCTr8xpg6XNpmuaLx4Ms/xQR9tdrZbPPOeXP//p7FO2Yq', 'dante@gmail.com', 1),
('JoÃ£o Vitor da Silva', 20210009, '$2y$10$.OHpUdT4aURVaOaUetaOUuxwciYbZ9AfLBgl/KGbKBGY98scBjesG', 'joao@gmail.com', 1),
('Pedro Henrique Alves', 20210010, '$2y$10$PzacmqHYYJrUTncH.t/saef.m8L19U/BMVT/MMg6PvDsYi5iXWFxW', 'pedro@gmail.com', 1);

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
