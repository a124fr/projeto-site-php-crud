-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3304
-- Tempo de geração: 18-Maio-2020 às 00:46
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `serie-criando-site`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `mensagem` text NOT NULL,
  `id_postagem` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id`, `nome`, `mensagem`, `id_postagem`) VALUES
(1, 'Lucas', 'asdfaççald asdfasd', 3),
(2, 'Bruno', 'asdfas', 3),
(3, 'Jose', 'asdfasdfas', 7),
(4, 'Lucas', 'Comentario do Lucas', 7),
(6, 'teste', 'teatea', 7),
(7, 'Francisco', 'Olá, Seu teste foi tudo bem?', 9),
(8, 'Lucas', 'Segundo Teste, OK!', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

DROP TABLE IF EXISTS `postagem`;
CREATE TABLE IF NOT EXISTS `postagem` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `conteudo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id`, `titulo`, `conteudo`) VALUES
(1, 'Primeira Postagem', 'açsdkfaçsldfçaskdfçlasdf asdfasdf adsf a f s dfa sdfadfasd asddfadsf adfa asdfafa fadfaasdf'),
(2, 'Segunda Postagem', 'açsdk façsldfçask dfçlasdf asdfasdf adsf a f s dfa sdfadfasd asddfadsf adfa adfaas'),
(3, 'Terceira Postagem', 'çaksdçfjaç açlskdfçlas açsdlfk çaldjfs açlskfçlaks adsfadsfasdfasdfasdfasdfadsfadsfasdfadsfaasdçlfkajçlsdafsdfasdfasdfasdfasdfasdfasdfasdfasdfads'),
(4, 'asdfasdf', 'asdfasf'),
(5, 'fadfa2222222222', 'asdfasddddddadf asdfasdf asdfasf a asd fasf as asfas fasdfasdfa 222222222222'),
(6, 'asdfasfasdfas', 'asdfasdfasdfasdfas'),
(9, 'Gabriel', 'Teste de comentarios');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
