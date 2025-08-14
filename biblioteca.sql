-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/06/2025 às 15:39
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `exemplar`
--

CREATE TABLE `exemplar` (
  `id_exemplar` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `codigo_exemplar` varchar(50) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `localizacao` varchar(100) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `exemplar`
--

INSERT INTO `exemplar` (`id_exemplar`, `id_livro`, `codigo_exemplar`, `id_status`, `localizacao`, `criado_em`) VALUES
(26, 27, 'Y26', 1, 'não definido', '2025-06-25 12:46:34'),
(27, 28, 'Y27', 2, 'não definido', '2025-06-25 12:48:43'),
(28, 29, 'Y28', 2, 'não definido', '2025-06-25 12:48:59'),
(29, 30, 'Y29', 2, 'não definido', '2025-06-25 12:49:43'),
(30, 31, 'Y30', 2, 'não definido', '2025-06-25 12:50:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE `livro` (
  `id_livro` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `editora` varchar(255) DEFAULT NULL,
  `ano_publicacao` int(11) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livro`
--

INSERT INTO `livro` (`id_livro`, `id_status`, `titulo`, `autor`, `editora`, `ano_publicacao`, `criado_em`) VALUES
(2, 1, 'viado', 'wert', 'dsgdg', 1999, '2025-06-25 12:15:18'),
(3, 3, 'raimundo aventureiro', 'lukinhas', 'pedro', 1999, '2025-06-25 12:17:42'),
(4, 3, 'raimundo aventureiro', 'raimundao alves', 'raimundao', 2025, '2025-06-25 12:40:36'),
(5, 3, 'raimundo aventureiro', 'raimundao alves', 'raimundao', 2025, '2025-06-25 12:43:10'),
(6, 3, 'raimundo aventureiro', 'raimundao alves', 'raimundao', 2025, '2025-06-25 12:43:24'),
(7, 3, 'raimundo aventureiro', 'raimundao alves', 'raimundao', 2025, '2025-06-25 12:44:01'),
(8, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:45:47'),
(9, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:24'),
(10, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:29'),
(11, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:30'),
(12, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:30'),
(13, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:31'),
(14, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:31'),
(15, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:31'),
(16, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:31'),
(17, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:32'),
(18, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:32'),
(19, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:32'),
(20, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:32'),
(21, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:33'),
(22, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:33'),
(23, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:33'),
(24, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:33'),
(25, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:34'),
(26, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:34'),
(27, 1, 'senzala', 'ribeiro', 'pedro', 34634, '2025-06-25 12:46:34'),
(28, 2, 'raimundo aventureiro', 'raimundao alves', 'raimundao', 1999, '2025-06-25 12:48:43'),
(29, 2, 'raimundo aventureiro', 'raimundao alves', 'raimundao', 1999, '2025-06-25 12:48:59'),
(30, 2, 'raimundo aventureiro', 'raimundao alves', 'raimundao', 1999, '2025-06-25 12:49:43'),
(31, 2, 'raimundo aventureiro', 'raimundao alves', 'raimundao', 1999, '2025-06-25 12:50:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `nome_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `status`
--

INSERT INTO `status` (`id_status`, `nome_status`) VALUES
(1, 'disponível'),
(2, 'emprestado'),
(3, 'reservado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Leonidas', 'leonidasloko7@gmail.com', '$2y$10$KedG6kNyri/orRmEyRntQ.sD.EdzUPXX5UoggsL55S4izYk1ioIJe'),
(2, 'Tarcisio', 'tarciso@gmail.com', '$2y$10$HHCeYIzVros/H7MEn9aRNeEx7E7IIiP.D/vD8zSM1JCGAiAl783E2'),
(3, 'ana evelinne campos de morais', 'tp320578@gmail.com', '$2y$10$fzr0OicyXF5l844h5gVcm.uqepDSdFT0KbUTIjN4RNdI6NnVGX33i'),
(4, 'ana evelinne campos de morais', 'yasi.mn0890@gmail.com', '$2y$10$6FXsVEVCIU6.j8teuQfweeDeV40Y2I2lkaRdbCG2ZeaVVxf8Dm/9.');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `exemplar`
--
ALTER TABLE `exemplar`
  ADD PRIMARY KEY (`id_exemplar`),
  ADD KEY `id_livro` (`id_livro`),
  ADD KEY `id_status` (`id_status`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id_livro`),
  ADD KEY `id_status` (`id_status`);

--
-- Índices de tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`),
  ADD UNIQUE KEY `nome_status` (`nome_status`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `exemplar`
--
ALTER TABLE `exemplar`
  MODIFY `id_exemplar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `exemplar`
--
ALTER TABLE `exemplar`
  ADD CONSTRAINT `exemplar_ibfk_1` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`),
  ADD CONSTRAINT `exemplar_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Restrições para tabelas `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
