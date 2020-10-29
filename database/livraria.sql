-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Out-2020 às 09:55
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `livraria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autores`
--

CREATE TABLE `autores` (
  `ida` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacionalidade` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `autores`
--

INSERT INTO `autores` (`ida`, `nome`, `nacionalidade`, `data`) VALUES
(1, 'Luis Borges Gouveia', 'Portugês', NULL),
(2, 'João Ranito', 'Portugês', NULL),
(3, 'Nuno Magalhães Ribeiro', 'Portugês', NULL),
(4, 'Paulo Rurato', 'Português', NULL),
(5, 'Sofia Gaio', 'Portugês', NULL),
(6, 'Rui Moreira', 'Portugês', NULL),
(7, 'Margarida Bairrão', 'Português', NULL),
(8, 'Judite Gonçalves de Freitas', 'Português', NULL),
(9, 'António Borges Regedor', 'Português', NULL),
(10, 'José Dias Coelho', 'Português', NULL),
(11, 'Paula Moura', 'Português', NULL),
(12, 'Luis Cunha', 'Português', NULL),
(13, 'Pereira Alfredo', 'Angolano', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `editoras`
--

CREATE TABLE `editoras` (
  `ide` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `morada` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `editoras`
--

INSERT INTO `editoras` (`ide`, `nome`, `morada`) VALUES
(1, 'SPI-Principia', ''),
(2, 'Edições Universidade Fernando Pessoa', ''),
(3, 'Edições GestKnowing', ''),
(4, 'VDM - Verlag Dr. Muller', ''),
(5, 'Sílabo', ''),
(6, 'Green Lines Instituto', ''),
(7, 'Lambert Academic Publishing', ''),
(8, 'Kwigia editora', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `idg` int(11) NOT NULL,
  `designacao` varchar(30) NOT NULL,
  `observacoes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`idg`, `designacao`, `observacoes`) VALUES
(1, 'Memórias e Testemunhos', NULL),
(2, 'Direito Civil ', NULL),
(3, 'Culinária', NULL),
(4, 'Romance', NULL),
(5, 'Policial e Thriller', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `idl` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idioma` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_paginas` int(11) DEFAULT NULL,
  `data_edicao` date DEFAULT NULL,
  `ide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`idl`, `titulo`, `idioma`, `isbn`, `total_paginas`, `data_edicao`, `ide`) VALUES
(1, 'sistema de informação de apoio a gestão', 'Portugês', '9728589433', NULL, NULL, 1),
(2, 'cidades e regiões digitais:impacte na cidade e nas pessoas', 'Portugês', '9728830033', NULL, NULL, 2),
(3, 'Informatica e Competencias Tecnologicas para a Sociedade da Informação', 'Portugês', '9789728830304', NULL, NULL, 1),
(4, 'Readings in Information Society', 'Inglês', '9789727228997', NULL, NULL, 3),
(5, 'Sociedade da Informação: balanço e implicações ', 'Português', '9789728830182', NULL, NULL, 3),
(6, 'O Tribunal de Contas e as Autarquias Locais', 'Portugês', '9789899936614', NULL, NULL, 2),
(7, 'Informática e Competências Tecnológicas para a Sociedade da Informação 2ed', 'Português', '9789728830304', NULL, NULL, 2),
(8, 'Negócio Eletrónico - conceitos e perspetivas de desenvolvimento', 'Português', '9789899552258', NULL, NULL, 1),
(9, 'Gestão da Informação na Biblioteca Escolar', 'Português', '9789722314916', NULL, NULL, 1),
(10, 'A virtual environment to share knowledge', 'Inglês', '9781351729901', NULL, NULL, 2),
(11, 'Ciência da Informação: contributos para o seu estudo', 'Português', '9789896430900', NULL, NULL, 1),
(12, 'Repensar a Sociedade da Informação e do Conhecimento no Início do Século XXI', 'Português', '9789726186953', NULL, NULL, 3),
(13, 'Gestão da Informação em Museus: uma contribuição para o seu estudo', 'Português', '9789899901394', NULL, NULL, 2),
(14, 'Web 2.0 and Higher Education. A psychological perspective', 'Inglês', '9783659683466', NULL, NULL, 1),
(15, 'Contribuições para a discussão de um modelo de Governo Eletrónico Local para Angola', 'Português', '9789899933200', NULL, NULL, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`ida`),
  ADD KEY `nome_autor` (`nome`(4));

--
-- Índices para tabela `editoras`
--
ALTER TABLE `editoras`
  ADD PRIMARY KEY (`ide`);

--
-- Índices para tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`idg`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`idl`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `generos`
--
ALTER TABLE `generos`
  MODIFY `idg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
