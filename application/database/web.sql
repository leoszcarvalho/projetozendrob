-- phpMyAdmin SQL Dump
-- version 4.3.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 05-Fev-2015 às 22:57
-- Versão do servidor: 5.6.22
-- PHP Version: 5.6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webdb`
--
CREATE DATABASE IF NOT EXISTS `webdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `webdb`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `arq_imagem` varchar(100) NOT NULL,
  `arq_texto` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `albums`
--

INSERT INTO `albums` (`id`, `artist`, `title`, `arq_imagem`, `arq_texto`) VALUES
(182, 'alalalalala', 'oakakaoakaok', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(183, 'asdasdasdasda', 'sadasdasdasd', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(184, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(185, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(186, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(187, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(188, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(189, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(190, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(191, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(192, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(193, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(194, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(195, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(196, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(197, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(198, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(199, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(200, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(201, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(202, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(203, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(204, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(205, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(206, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(207, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(208, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(209, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(210, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(211, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(212, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(213, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(214, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(215, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(216, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(217, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(218, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(219, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(220, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(221, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(222, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(223, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(224, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(225, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(226, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(227, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(228, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(229, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(230, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(231, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(233, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(234, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(235, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(236, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(237, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(238, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(239, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(240, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1'),
(241, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nivel` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `nivel`) VALUES
(1, 'leo8789', 'c51e21fe3ff6de1e1a8aad4f1de35b31fa31c736', 'admin'),
(2, 'rau123', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=242;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
