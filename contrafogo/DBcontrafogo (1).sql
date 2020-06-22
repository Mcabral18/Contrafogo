-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 02-Jun-2019 às 01:49
-- Versão do servidor: 5.1.73
-- versão do PHP: 5.3.3-7+squeeze19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `DBcontrafogo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id_coment` int(11) NOT NULL AUTO_INCREMENT,
  `id_util` int(11) NOT NULL,
  `id_publicacao` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `data_coment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_coment`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id_coment`, `id_util`, `id_publicacao`, `descricao`, `data_coment`) VALUES
(44, 13, 33, 'ganda piada', '2017-05-19 00:00:00'),
(79, 25, 49, 'aaa', '2019-06-01 00:00:00'),
(77, 25, 49, 'aaaaaaaaa', '2019-06-01 00:00:00'),
(70, 25, 40, 'vamos pois daw fica para o ano ', '2019-05-30 00:00:00'),
(71, 25, 36, 'a pois vamos', '2019-05-30 00:00:00'),
(64, 22, 39, 'aaaaaa', '2019-05-24 00:00:00'),
(65, 22, 45, 'deviam mas n fazem', '2019-05-24 00:00:00'),
(66, 22, 36, 'vamos chumbar a daw', '2019-05-24 00:00:00'),
(67, 22, 39, 'vamos chumbar a daw', '2019-05-24 00:00:00'),
(68, 22, 40, 'vamos chumbar a daw', '2019-05-24 00:00:00'),
(69, 22, 45, 'vamos chumbar da daw', '2019-05-24 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `markers`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacao`
--

CREATE TABLE IF NOT EXISTS `publicacao` (
  `id_publicacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_util` int(11) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id_publicacao`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Extraindo dados da tabela `publicacao`
--

INSERT INTO `publicacao` (`id_publicacao`, `id_util`, `pais`, `descricao`, `imagem`) VALUES
(49, 25, 'Portugal', 'daw2 fica para o ano', '__missing_the_moon_ii___by_moroka323.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE IF NOT EXISTS `utilizador` (
  `id_utilizador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `apelido` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`id_utilizador`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id_utilizador`, `nome`, `apelido`, `password`, `email`, `nivel`) VALUES
(1, 'admin', 'admineaerrr', 'aaa123', 'admin3aaaaaa@gmail.com', 0),
(25, 'bbbb', 'bbb', 'aaa123', 'khdklaaad@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `votacao`
--

CREATE TABLE IF NOT EXISTS `votacao` (
  `id_votacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_util` int(11) NOT NULL,
  `id_publicacao` int(11) NOT NULL,
  `votacao` int(11) NOT NULL,
  PRIMARY KEY (`id_votacao`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Extraindo dados da tabela `votacao`
--

INSERT INTO `votacao` (`id_votacao`, `id_util`, `id_publicacao`, `votacao`) VALUES
(15, 1, 21, 5),
(16, 1, 20, 5),
(14, 12, 21, 7),
(22, 13, 33, 9),
(45, 25, 49, 4),
(37, 25, 40, 5),
(36, 25, 36, 3);
