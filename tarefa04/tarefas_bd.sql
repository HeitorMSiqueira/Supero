-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Jan-2019 às 18:00
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tarefas_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas_tab`
--

CREATE TABLE `tarefas_tab` (
  `ID` int(11) NOT NULL,
  `TITULO` text COLLATE utf8_unicode_ci NOT NULL,
  `DESCRICAO` text COLLATE utf8_unicode_ci NOT NULL,
  `PRIORIDADE` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tarefas_tab`
--

INSERT INTO `tarefas_tab` (`ID`, `TITULO`, `DESCRICAO`, `PRIORIDADE`) VALUES
(1, 'tarefa 01', 'tarefa teste 01', 1),
(2, 'tarefa 02', 'tarefa teste 02', 2),
(3, 'tarefa 03', 'tarefa teste 03', 3),
(4, 'tarefa 04', 'tarefa teste 04', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tarefas_tab`
--
ALTER TABLE `tarefas_tab`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tarefas_tab`
--
ALTER TABLE `tarefas_tab`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
