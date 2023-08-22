-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Ago-2023 às 10:19
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `desc_serv_fk` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_agenda` int NOT NULL AUTO_INCREMENT,
  `desc_agenda` date NOT NULL,
  `id_user` int NOT NULL,
  `id_servico` int NOT NULL,
  PRIMARY KEY (`id_agenda`),
  KEY `id_user` (`id_user`),
  KEY `id_servico` (`id_servico`),
  KEY `fk_desc_serv` (`desc_serv_fk`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`desc_serv_fk`, `id_agenda`, `desc_agenda`, `id_user`, `id_servico`) VALUES
('', 51, '2023-08-31', 40, 3),
('', 50, '2025-09-07', 40, 3),
('', 49, '2023-08-22', 40, 2),
('asjdhashdas', 48, '2024-02-20', 47, 1),
('', 47, '2012-12-16', 47, 2),
('', 52, '2028-02-20', 40, 1),
('TESTE', 53, '2027-02-22', 39, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `desc_serv` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `desc` (`desc_serv`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `desc_serv`) VALUES
(1, '1'),
(2, '2'),
(3, '3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `senha` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_cad` datetime DEFAULT NULL,
  `permissao` varchar(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `nome`, `senha`, `data_cad`, `permissao`) VALUES
(45, 'Cássio Ramos', '888a7c46f2eb1dab7c036e01f613cc19', '2023-08-21 20:37:22', ''),
(39, 'user', '81dc9bdb52d04dc20036dbd8313ed055', '2023-08-19 18:10:48', ''),
(40, 'adm', 'b09c600fddc573f117449b3723f23d64', '2023-08-20 14:00:15', '1'),
(46, 'Fagner Lemos', 'a8d44e60a006311b10cc114ebed1c095', '2023-08-21 20:37:33', ''),
(44, 'joaohenrique', '3dfcab79ed21fd89c9eb25e9864a6155', '2023-08-21 20:36:50', ''),
(47, 'Jônaldo 777', '54533eebc61004baa7a6f12b90785816', '2023-08-21 20:37:50', ''),
(48, 'teste', '81dc9bdb52d04dc20036dbd8313ed055', '2023-08-21 20:38:42', ''),
(49, 'GABRIEL', '8833f1325fb6341757b30f6de91487a5', NULL, ''),
(50, 'isa', '202cb962ac59075b964b07152d234b70', NULL, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
