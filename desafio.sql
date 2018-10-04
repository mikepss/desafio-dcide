-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Out-2018 às 21:58
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desafio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `id` int(11) NOT NULL,
  `veiculo` varchar(255) DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `descricao` text,
  `vendido` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `veiculo`, `marca`, `ano`, `descricao`, `vendido`, `created`, `updated`) VALUES
(2, 'Onix', 'Chevrolet', 2016, 'Air-bag duplo, Direção Hidráulica e Trio elétrico', 0, '2018-10-02 00:00:00', '2018-10-04 16:53:17'),
(3, 'Captiva', 'Chevrolet', 2014, 'ar-condicionado, volante com regulagem de altura, direção hidráulica, travas elétricas, retrovisores elétricos, câmbio automático, airbag motorista, freios ABS, airbag passageiro, vidros elétricos dianteiros, limp. traseiro, desemb. traseiro', 0, '2018-10-02 00:00:00', '2018-10-04 16:01:04'),
(4, 'Uno Mille', 'Ford', 2016, 'ssdsd', 0, '2018-10-04 16:17:49', '2018-10-04 16:17:49'),
(5, 'Uno Mille', 'Ford', 2016, 'hhjhjhj', 0, '2018-10-04 16:18:44', '2018-10-04 16:18:44'),
(6, 'Uno Mille', 'Ford', 2015, 'sadsd', 0, '2018-10-04 16:19:36', '2018-10-04 16:19:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
