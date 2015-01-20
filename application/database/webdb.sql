-- phpMyAdmin SQL Dump
-- version 4.3.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 20-Jan-2015 às 04:20
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `albums`
--

INSERT INTO `albums` (`id`, `artist`, `title`) VALUES
(3, 'Massive Attack', 'Heligolandaa'),
(4, 'Andre Rieu', 'Forever Vienna'),
(5, 'Sade', 'Soldier of Love'),
(6, 'Leon', 'Nirvana'),
(7, 'asdsadas', 'a'),
(8, 'asdsa', 'a'),
(9, 'asdsad', 'leoak'),
(10, 'asdsada', 'elelea'),
(11, 'sadasdas', 'leonardo'),
(16, 'Teste para imagem', 'Titulo teste de imagem'),
(17, 'Teste para imagem', 'Titulo teste de imagem'),
(18, 'Teste para imagem', 'Titulo teste de imagem'),
(19, 'Teste para imagem', 'Titulo teste de imagem'),
(20, 'Teste para imagem', 'Titulo teste de imagem'),
(21, 'Teste para imagem', 'Titulo teste de imagem'),
(22, 'Teste para imagem', 'Titulo teste de imagem'),
(23, 'Teste para imagem', 'Titulo teste de imagem'),
(24, 'Teste para imagem', 'Titulo teste de imagem'),
(25, 'Teste para imagem', 'Titulo teste de imagem'),
(26, 'Teste para imagem', 'Titulo teste de imagem'),
(27, 'Teste para imagem', 'Titulo teste de imagem'),
(28, 'Teste para imagem', 'Titulo teste de imagem'),
(29, 'Teste para imagem', 'Titulo teste de imagem'),
(30, 'Teste para imagem', 'Titulo teste de imagem'),
(31, 'Teste para imagem', 'Titulo teste de imagem'),
(32, 'Teste para imagem', 'Titulo teste de imagem'),
(33, 'Teste para imagem', 'Titulo teste de imagem'),
(34, 'asdasdasdas', 'asdasdasdas'),
(35, 'asdasdasdas', 'asdasdasdas'),
(36, 'asdasdasdas', 'asdasdasdas'),
(37, 'asdasdasdas', 'asdasdasdas'),
(38, 'asdasdasdas', 'asdasdasdas'),
(39, 'asdasdasdas', 'asdasdasdas'),
(40, 'asdasdasdas', 'asdasdasdas'),
(41, 'asdasdasdas', 'asdasdasdas'),
(42, 'asdasdasdas', 'asdasdasdas'),
(43, 'asdasdasdas', 'asdasdasdas'),
(44, 'asdasdasdas', 'asdasdasdas'),
(45, 'asdasdasdas', 'asdasdasdas'),
(46, 'asdasdasdas', 'asdasdasdas'),
(47, 'asdasdasdas', 'asdasdasdas'),
(48, 'asdasdasdas', 'asdasdasdas'),
(49, 'asdasdasdas', 'asdasdasdas'),
(50, 'asdasdasdas', 'asdasdasdas'),
(51, 'asdasdasdas', 'asdasdasdas'),
(52, 'asdasdasdas', 'asdasdasdas'),
(53, 'asdasdasdas', 'asdasdasdas'),
(54, 'asdasdasdas', 'asdasdasdas'),
(55, 'asdasdasdas', 'asdasdasdas'),
(56, 'asdasdasdas', 'asdasdasdas'),
(57, 'asdasdasdas', 'asdasdasdas'),
(58, 'asdasdasdas', 'asdasdasdas'),
(59, 'asdasdasdas', 'asdasdasdas'),
(60, 'asdasdasdas', 'asdasdasdas'),
(61, 'asdasdasdas', 'asdasdasdas'),
(62, 'asdasdasdas', 'asdasdasdas'),
(63, 'asdasdasdas', 'asdasdasdas'),
(64, 'asdasdasdas', 'asdasdasdas'),
(65, 'asdasdasdas', 'asdasdasdas'),
(66, 'asdasdasdas', 'asdasdasdas'),
(67, 'asdasdasdas', 'asdasdasdas'),
(68, 'pojkgmpwjhr', 'pokfqmohefhq'),
(69, 'pojkgmpwjhr', 'pokfqmohefhq'),
(70, 'pojkgmpwjhr', 'pokfqmohefhq'),
(71, 'pojkgmpwjhr', 'pokfqmohefhq'),
(72, 'sadasdasdas', 'dafadfadfad'),
(73, 'sadasdasdas', 'dafadfadfad'),
(74, 'sadasdasdas', 'dafadfadfad'),
(75, 'sadasdasdas', 'dafadfadfad'),
(76, 'dsadasdasd', 'asdasdasdas'),
(77, 'dsadasdasd', 'asdasdasdas'),
(78, 'dsadasdasd', 'asdasdasdas'),
(79, 'dsadasdasd', 'asdasdasdas'),
(80, 'dsadasdasd', 'asdasdasdas'),
(81, 'dsadasdasd', 'asdasdasdas'),
(82, 'dsadasdasd', 'asdasdasdas'),
(83, 'dsadasdasd', 'asdasdasdas'),
(84, 'dsadasdasd', 'asdasdasdas'),
(85, 'dsadasdasd', 'asdasdasdas'),
(86, 'dsadasdasd', 'asdasdasdas'),
(87, 'dsadasdasd', 'asdasdasdas'),
(88, 'dsadasdasd', 'asdasdasdas'),
(89, 'dsadasdasd', 'asdasdasdas'),
(90, 'dsadasdasd', 'asdasdasdas'),
(91, 'dsadasdasd', 'asdasdasdas'),
(92, 'dsadasdasd', 'asdasdasdas'),
(93, 'dsadasdasd', 'asdasdasdas'),
(94, 'dsadasdasd', 'asdasdasdas'),
(95, 'dsadasdasd', 'asdasdasdas'),
(96, 'dsadasdasd', 'asdasdasdas'),
(97, 'sadasdas', 'faddfadfdasf'),
(98, 'sadasdas', 'faddfadfdasf'),
(99, 'sadasdas', 'faddfadfdasf'),
(100, 'sadasdas', 'faddfadfdasf'),
(101, 'sadasdas', 'faddfadfdasf'),
(102, 'sadasdas', 'faddfadfdasf'),
(103, 'sadasdas', 'faddfadfdasf'),
(104, 'sadasdas', 'faddfadfdasf'),
(105, 'sadasdas', 'faddfadfdasf'),
(106, 'sadasdas', 'faddfadfdasf'),
(107, 'sadsadsad', 'sadadsad'),
(108, 'sadasdsad', 'sadasdasd'),
(109, 'sadasdsad', 'sadasdasd'),
(110, 'sadasdsad', 'sadasdasd'),
(111, 'asdsada', 'sadsadsa dsadas'),
(112, 'asdsada', 'sadsadsa dsadas'),
(113, 'asdsada', 'sadsadsa dsadas'),
(114, 'blablabla', 'lalalalalalal'),
(115, 'blablabla', 'lalalalalalal'),
(116, 'blablabla', 'lalalalalalal'),
(117, 'blablabla', 'lalalalalalal'),
(118, 'blablabla', 'lalalalalalal'),
(119, 'blablabla', 'lalalalalalal'),
(120, 'blablabla', 'lalalalalalal'),
(121, 'blablabla', 'asdasdasdsad'),
(122, 'blablabla', 'asdasdasdsad'),
(123, 'asiodjasd asoijsad', 'siadjsaid asidjas od'),
(124, 'asdasdsa', 'adsdasdasda'),
(125, 'asdasdsa', 'adsdasdasda'),
(126, 'Leonardo', 'lalalalalalalalalalalalala'),
(127, 'podaiofpaojfajsdp', 'lkdfjladnfnqoinfqo'),
(128, 'blablabla', 'lalalalalalal'),
(129, 'sadasdsadas', 'asdasdasdasdas'),
(130, 'sadasdsadas', 'asdasdasdasdas'),
(131, 'sadasdsadas', 'asdasdasdasdas'),
(132, 'sadasdsadas', 'asdasdasdasdas'),
(133, 'dfsdfdsfsd', 'dsfsdfsdfs'),
(134, 'dfsdfdsfsd', 'dsfsdfsdfs'),
(135, 'dfsdfdsfsd', 'dsfsdfsdfs'),
(136, 'elelelelelelele', 'eleeeeeeeeeeeeeeeleeeeee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=137;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
