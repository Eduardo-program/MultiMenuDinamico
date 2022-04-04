-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Abr-2022 às 22:12
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `menu_`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fontes`
--

CREATE TABLE `fontes` (
  `ID_FONTE` int(11) NOT NULL,
  `ID_MENU` int(11) NOT NULL,
  `TITULO` varchar(35) NOT NULL,
  `FONTE` varchar(35) NOT NULL,
  `ATIVO` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fontes`
--

INSERT INTO `fontes` (`ID_FONTE`, `ID_MENU`, `TITULO`, `FONTE`, `ATIVO`) VALUES
(1, 1, 'Fonte 1', '#', 'S'),
(2, 3, 'Fonte 2', '#', 'S'),
(3, 4, 'Fonte 3', '#', 'S'),
(4, 5, 'Fonte 4', '#', 'S'),
(5, 2, 'Fonte 5', '#', 'S'),
(11, 1, 'Teste Nº 13', '#', 'S'),
(12, 9, 'Parâmetros de Emissão', '#', 'S'),
(13, 4, 'Excluir Produto', '#', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fonte_usuario`
--

CREATE TABLE `fonte_usuario` (
  `ID_` int(11) NOT NULL,
  `ID_FONTE` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `PERMISSAO` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fonte_usuario`
--

INSERT INTO `fonte_usuario` (`ID_`, `ID_FONTE`, `ID_USUARIO`, `PERMISSAO`) VALUES
(1, 1, 1, 'S'),
(2, 1, 3, 'S'),
(3, 2, 1, 'N'),
(4, 2, 3, 'N'),
(5, 3, 1, 'S'),
(6, 3, 3, 'S'),
(7, 4, 1, 'S'),
(8, 4, 3, 'N'),
(9, 5, 1, 'S'),
(10, 5, 3, 'S'),
(11, 1, 2, 'S'),
(12, 2, 2, 'S'),
(13, 3, 2, 'S'),
(14, 4, 2, 'S'),
(15, 5, 2, 'S'),
(16, 11, 1, 'N'),
(17, 12, 2, 'N'),
(18, 13, 3, 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE `grupos` (
  `ID_GRUPO` int(11) NOT NULL,
  `DESC` varchar(50) NOT NULL,
  `ATIVO` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`ID_GRUPO`, `DESC`, `ATIVO`) VALUES
(1, 'Analista', 'S'),
(2, 'Técnico', 'S'),
(3, 'Usuário', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menus`
--

CREATE TABLE `menus` (
  `ID_MENU` int(11) NOT NULL,
  `ID_MENU_PAI` int(11) NOT NULL,
  `ORDEM` int(11) NOT NULL,
  `DESC` varchar(50) NOT NULL,
  `ICONE` varchar(50) NOT NULL,
  `ATIVO` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `menus`
--

INSERT INTO `menus` (`ID_MENU`, `ID_MENU_PAI`, `ORDEM`, `DESC`, `ICONE`, `ATIVO`) VALUES
(1, 0, 4, 'Relatórios', ' ', 'S'),
(2, 0, 4, 'Cadastros', ' ', 'S'),
(3, 2, 4, 'Novo Código', ' ', 'S'),
(4, 2, 4, 'Novo Produto', ' ', 'S'),
(5, 3, 4, 'Etiqueta', ' ', 'S'),
(8, 1, 4, 'Venda por Mês', '', 'S'),
(9, 1, 4, 'Venda por Dia', '', 'S'),
(10, 5, 4, 'Treta', '', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_grupo`
--

CREATE TABLE `menu_grupo` (
  `ID_` int(11) NOT NULL,
  `ID_MENU` int(11) NOT NULL,
  `ID_GRUPO` int(11) NOT NULL,
  `ATIVO` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `menu_grupo`
--

INSERT INTO `menu_grupo` (`ID_`, `ID_MENU`, `ID_GRUPO`, `ATIVO`) VALUES
(1, 1, 1, 'S'),
(2, 1, 3, 'S'),
(3, 2, 1, 'S'),
(4, 2, 3, 'S'),
(5, 3, 1, 'S'),
(6, 3, 3, 'S'),
(7, 4, 1, 'S'),
(8, 4, 3, 'S'),
(9, 5, 1, 'S'),
(10, 5, 3, 'S'),
(11, 1, 2, 'S'),
(12, 2, 2, 'S'),
(13, 3, 2, 'S'),
(14, 4, 2, 'S'),
(15, 5, 2, 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_usuario`
--

CREATE TABLE `menu_usuario` (
  `ID_` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_MENU` int(11) NOT NULL,
  `ATIVO` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `menu_usuario`
--

INSERT INTO `menu_usuario` (`ID_`, `ID_USUARIO`, `ID_MENU`, `ATIVO`) VALUES
(1, 1, 1, 'S'),
(2, 3, 1, 'S'),
(3, 1, 2, 'S'),
(4, 3, 2, 'S'),
(5, 1, 3, 'S'),
(6, 3, 3, 'S'),
(7, 1, 4, 'S'),
(8, 3, 4, 'S'),
(9, 1, 5, 'S'),
(10, 3, 5, 'S'),
(11, 2, 1, 'S'),
(12, 2, 2, 'S'),
(13, 2, 3, 'S'),
(14, 2, 4, 'S'),
(15, 2, 5, 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(11) NOT NULL,
  `USUARIO` varchar(35) NOT NULL,
  `SENHA` varchar(35) NOT NULL,
  `ID_GRUPO` int(11) NOT NULL,
  `ATIVO` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `USUARIO`, `SENHA`, `ID_GRUPO`, `ATIVO`) VALUES
(1, 'eduardo.garcia', 'eduardo', 1, 'S'),
(2, 'henrique.follmann', 'henrique', 2, 'S'),
(3, 'matheus.mallmann', 'matheus', 3, 'S');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `fontes`
--
ALTER TABLE `fontes`
  ADD PRIMARY KEY (`ID_FONTE`);

--
-- Índices para tabela `fonte_usuario`
--
ALTER TABLE `fonte_usuario`
  ADD PRIMARY KEY (`ID_`);

--
-- Índices para tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`ID_GRUPO`);

--
-- Índices para tabela `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`ID_MENU`);

--
-- Índices para tabela `menu_grupo`
--
ALTER TABLE `menu_grupo`
  ADD PRIMARY KEY (`ID_`);

--
-- Índices para tabela `menu_usuario`
--
ALTER TABLE `menu_usuario`
  ADD PRIMARY KEY (`ID_`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fontes`
--
ALTER TABLE `fontes`
  MODIFY `ID_FONTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `fonte_usuario`
--
ALTER TABLE `fonte_usuario`
  MODIFY `ID_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `ID_GRUPO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `menus`
--
ALTER TABLE `menus`
  MODIFY `ID_MENU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `menu_grupo`
--
ALTER TABLE `menu_grupo`
  MODIFY `ID_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `menu_usuario`
--
ALTER TABLE `menu_usuario`
  MODIFY `ID_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
