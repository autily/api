-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/10/2024 às 15:34
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_autily`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `crianca`
--

CREATE TABLE `crianca` (
  `id_crianca` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `nivel_de_suporte` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cri_resp`
--

CREATE TABLE `cri_resp` (
  `fk_responsavel_id_resp` int(11) NOT NULL,
  `fk_crianca_id_crianca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogam`
--

CREATE TABLE `jogam` (
  `fk_crianca_id_crianca` int(11) NOT NULL,
  `fk_jogos_id_jogo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogos`
--

CREATE TABLE `jogos` (
  `id_jogo` int(11) NOT NULL,
  `nome_jogo` varchar(100) DEFAULT NULL,
  `pontuacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `responsavel`
--

CREATE TABLE `responsavel` (
  `id_resp` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `fk_tipo_cod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `rotina`
--

CREATE TABLE `rotina` (
  `horario_inicio` time NOT NULL,
  `horario_final` time DEFAULT NULL,
  `tarefa` varchar(255) DEFAULT NULL,
  `fk_responsavel_id_resp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `rotinacrianca`
--

CREATE TABLE `rotinacrianca` (
  `fk_crianca_id_crianca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo`
--

CREATE TABLE `tipo` (
  `cod` int(11) NOT NULL,
  `descr` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Teste', 'teste@exemplo.com', '123'),
(3, 'ana', 'ana@j', '$2y$10$N8xVdE9kQzsTVJWMpYyX.eL.CfMgsE6w/J8gxWcV5g5Hyy1XoAjjK'),
(19, 'cintia', 'cintia@pinho', '$2y$10$vn9P/fIl.LU4KeSQ9e5A.uzbQoRy41srzsfEgr814E1/mJEpoqkIm');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `crianca`
--
ALTER TABLE `crianca`
  ADD PRIMARY KEY (`id_crianca`);

--
-- Índices de tabela `cri_resp`
--
ALTER TABLE `cri_resp`
  ADD PRIMARY KEY (`fk_responsavel_id_resp`,`fk_crianca_id_crianca`),
  ADD KEY `FK_cri_resp_2` (`fk_crianca_id_crianca`);

--
-- Índices de tabela `jogam`
--
ALTER TABLE `jogam`
  ADD PRIMARY KEY (`fk_crianca_id_crianca`,`fk_jogos_id_jogo`),
  ADD KEY `FK_jogam_2` (`fk_jogos_id_jogo`);

--
-- Índices de tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id_jogo`);

--
-- Índices de tabela `responsavel`
--
ALTER TABLE `responsavel`
  ADD PRIMARY KEY (`id_resp`),
  ADD KEY `FK_responsavel_2` (`fk_tipo_cod`);

--
-- Índices de tabela `rotina`
--
ALTER TABLE `rotina`
  ADD PRIMARY KEY (`horario_inicio`,`fk_responsavel_id_resp`),
  ADD KEY `FK_rotina_1` (`fk_responsavel_id_resp`);

--
-- Índices de tabela `rotinacrianca`
--
ALTER TABLE `rotinacrianca`
  ADD PRIMARY KEY (`fk_crianca_id_crianca`);

--
-- Índices de tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`cod`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cri_resp`
--
ALTER TABLE `cri_resp`
  ADD CONSTRAINT `FK_cri_resp_1` FOREIGN KEY (`fk_responsavel_id_resp`) REFERENCES `responsavel` (`id_resp`),
  ADD CONSTRAINT `FK_cri_resp_2` FOREIGN KEY (`fk_crianca_id_crianca`) REFERENCES `crianca` (`id_crianca`);

--
-- Restrições para tabelas `jogam`
--
ALTER TABLE `jogam`
  ADD CONSTRAINT `FK_jogam_1` FOREIGN KEY (`fk_crianca_id_crianca`) REFERENCES `crianca` (`id_crianca`),
  ADD CONSTRAINT `FK_jogam_2` FOREIGN KEY (`fk_jogos_id_jogo`) REFERENCES `jogos` (`id_jogo`);

--
-- Restrições para tabelas `responsavel`
--
ALTER TABLE `responsavel`
  ADD CONSTRAINT `FK_responsavel_2` FOREIGN KEY (`fk_tipo_cod`) REFERENCES `tipo` (`cod`);

--
-- Restrições para tabelas `rotina`
--
ALTER TABLE `rotina`
  ADD CONSTRAINT `FK_rotina_1` FOREIGN KEY (`fk_responsavel_id_resp`) REFERENCES `responsavel` (`id_resp`);

--
-- Restrições para tabelas `rotinacrianca`
--
ALTER TABLE `rotinacrianca`
  ADD CONSTRAINT `FK_rotinacrianca_1` FOREIGN KEY (`fk_crianca_id_crianca`) REFERENCES `crianca` (`id_crianca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
