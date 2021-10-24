-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 27-Ago-2021 às 10:51
-- Versão do servidor: 8.0.26-0ubuntu0.20.04.2
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `phpoo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id_usuario` int NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `telefone` int NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_usuario`, `nome`, `email`, `telefone`, `senha`) VALUES
(1, 'flavio francisco', 'favio@email.com', 931079294, '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'faustino', 'faustino@email.com', 9245567, '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'test', 'test@email.com', 123445678, '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'flavio', 'flavio2@email.com', 930000000, '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_file`
--

CREATE TABLE `tbl_file` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `tbl_file`
--

INSERT INTO `tbl_file` (`id`, `name`, `image`) VALUES
(1, 'john Mingaço*', 'Low-Temp-Fade-with-Afro.jpeg'),
(3, 'Mingo', '1126325.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`) VALUES
(1, 'Flavio-Felix', 'fpro/dev@tech.com'),
(2, 'Fpro Dev', 'dev@tech.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Flavio', 'flavio@email.com', '$2y$10$yCa7im8GUjtPh/GHAMIxY.9d2kcyKG7UZ2cp98Iet0FTBmG8mf66O'),
(3, 'Flávio Faustino Francisco Félix', 'faustino@email.com', '$2y$10$6dpZDpZ8MmYhWpRH19YUNu1Zpc9pMMgOsKA2zY/A69VvzRqLxLXgS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `id` int NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `ativo` enum('s','n') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `data` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`id`, `titulo`, `descricao`, `ativo`, `data`) VALUES
(9, 'Programador', 'eXPERT EM php', 's', '2021-04-08 07:31:53'),
(10, 'Curso de Xadrez', 'Vais aprender a Jogar xadrez em uma semana', 'n', '2021-04-08 10:12:44'),
(11, 'Editor de Video', 'Curso WDEV', 's', '2021-04-09 21:23:43'),
(12, 'Programador Back-End', 'PHP', 'n', '2021-04-09 21:24:14'),
(13, 'Front-End', 'React Js', 's', '2021-04-09 21:24:35'),
(14, 'Programador Front-End', 'BootStrap JS', 'n', '2021-04-09 21:26:15'),
(15, 'Programador C#', 'Unity', 's', '2021-04-09 22:27:39'),
(16, 'Analista de Sistema', 'Saber desenolver a partir do docker', 's', '2021-04-09 22:28:17'),
(17, 'Editor de Video Junior', 'vimeo', 's', '2021-04-09 22:28:41'),
(18, 'Data Science', 'Data center', 's', '2021-04-09 22:29:24'),
(19, 'Analista de Banco de Dados', 'Dominar Datawarehouse', 'n', '2021-04-09 22:30:19');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices para tabela `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
