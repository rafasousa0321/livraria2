-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Jan-2021 às 16:24
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livraria2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nacionalidade` varchar(20) DEFAULT NULL,
  `data_nascimento` datetime DEFAULT NULL,
  `fotografia` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `autores`
--

INSERT INTO `autores` (`id_autor`, `nome`, `nacionalidade`, `data_nascimento`, `fotografia`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Luis Borges Gouveia', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(2, 'João Ranito', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(3, 'Nuno Magalhães Ribeiro', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(4, 'Paulo Rurato', 'Português', NULL, NULL, NULL, NULL, NULL),
(5, 'Sofia Gaio', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(6, 'Rui Moreira', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(7, 'Margarida Bairrão', 'Português', NULL, NULL, NULL, NULL, NULL),
(8, 'Judite Gonçalves de Freitas', 'Português', NULL, NULL, NULL, NULL, NULL),
(9, 'António Borges Regedor', 'Português', NULL, NULL, NULL, NULL, NULL),
(10, 'José Dias Coelho', 'Português', NULL, NULL, NULL, NULL, NULL),
(11, 'Paula Moura', 'Português', NULL, NULL, NULL, NULL, NULL),
(12, 'Luis Cunha', 'Português', NULL, NULL, NULL, NULL, NULL),
(13, 'Pereira Alfredo', 'Angolano', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `autores_livros`
--

CREATE TABLE `autores_livros` (
  `id_al` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `autores_livros`
--

INSERT INTO `autores_livros` (`id_al`, `id_autor`, `id_livro`, `updated_at`, `created_at`) VALUES
(3, 2, 18, '2021-01-07 10:11:52', '2021-01-07 10:11:52'),
(4, 3, 18, '2021-01-07 10:11:52', '2021-01-07 10:11:52'),
(5, 7, 19, '2021-01-07 14:14:42', '2021-01-07 14:14:42'),
(6, 8, 19, '2021-01-07 14:14:42', '2021-01-07 14:14:42'),
(7, 9, 19, '2021-01-07 14:14:42', '2021-01-07 14:14:42'),
(8, 2, 20, '2021-01-07 14:16:48', '2021-01-07 14:16:48'),
(9, 3, 20, '2021-01-07 14:16:48', '2021-01-07 14:16:48'),
(10, 4, 20, '2021-01-07 14:16:48', '2021-01-07 14:16:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comentario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `edicoes`
--

CREATE TABLE `edicoes` (
  `id_livro` int(11) NOT NULL,
  `id_editora` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `editoras`
--

CREATE TABLE `editoras` (
  `id_editora` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `morada` varchar(255) DEFAULT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `editoras`
--

INSERT INTO `editoras` (`id_editora`, `nome`, `morada`, `observacoes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SPI-Principia', '', NULL, NULL, NULL, NULL),
(2, 'Edições Universidade Fernando Pessoa', '', NULL, NULL, NULL, NULL),
(3, 'Edições GestKnowing', '', NULL, NULL, NULL, NULL),
(4, 'VDM - Verlag Dr. Muller', '', NULL, NULL, NULL, NULL),
(5, 'Sílabo', '', NULL, NULL, NULL, NULL),
(6, 'Green Lines Instituto', '', NULL, NULL, NULL, NULL),
(7, 'Lambert Academic Publishing', '', NULL, NULL, NULL, NULL),
(8, 'Kwigia editora', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `editoras_livros`
--

CREATE TABLE `editoras_livros` (
  `id_editora` int(11) NOT NULL,
  `id_livro` int(100) NOT NULL,
  `titulo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `editoras_livros`
--

INSERT INTO `editoras_livros` (`id_editora`, `id_livro`, `titulo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 17, NULL, '2021-01-07 10:10:18', '2021-01-07 10:10:18', NULL),
(2, 19, NULL, '2021-01-07 14:14:42', '2021-01-07 14:14:42', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `designacao` varchar(30) NOT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`id_genero`, `designacao`, `observacoes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Memórias e Testemunhos', NULL, NULL, NULL, NULL),
(2, 'Direito Civil ', NULL, NULL, NULL, NULL),
(3, 'Culinária', NULL, NULL, NULL, NULL),
(4, 'Romance', NULL, NULL, NULL, NULL),
(5, 'Policial e Thriller', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id_livro` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `idioma` varchar(10) NOT NULL,
  `total_paginas` int(11) DEFAULT NULL,
  `data_edicao` datetime DEFAULT NULL,
  `isbn` varchar(13) DEFAULT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `imagem_capa` varchar(255) DEFAULT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL,
  `sinopse` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `excerto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id_livro`, `titulo`, `idioma`, `total_paginas`, `data_edicao`, `isbn`, `observacoes`, `imagem_capa`, `id_genero`, `id_autor`, `sinopse`, `created_at`, `updated_at`, `deleted_at`, `id_user`, `excerto`) VALUES
(1, 'sistema de informação de apoio a gestão', 'Portugês', NULL, NULL, '9728589433', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, 0, ''),
(2, 'cidades e regiões digitais:impacte na cidade e nas pessoas', 'Portugês', NULL, NULL, '9728830033', NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, 0, ''),
(3, 'Informatica e Competencias Tecnologicas para a Sociedade da Informação', 'Portugês', NULL, NULL, '9789728830304', NULL, NULL, 1, 3, NULL, NULL, NULL, NULL, 0, ''),
(4, 'Readings in Information Society', 'Inglês', NULL, NULL, '9789727228997', NULL, NULL, 3, 5, NULL, NULL, NULL, NULL, 0, ''),
(5, 'Sociedade da Informação: balanço e implicações ', 'Português', NULL, NULL, '9789728830182', NULL, NULL, 3, 7, NULL, NULL, NULL, NULL, 0, ''),
(6, 'O Tribunal de Contas e as Autarquias Locais', 'Portugês', NULL, NULL, '9789899936614', NULL, NULL, 2, 7, NULL, NULL, NULL, NULL, 0, ''),
(7, 'Informática e Competências Tecnológicas para a Sociedade da Informação 2ed', 'Português', NULL, NULL, '9789728830304', NULL, NULL, 2, 8, NULL, NULL, NULL, NULL, 0, ''),
(8, 'Negócio Eletrónico - conceitos e perspetivas de desenvolvimento', 'Português', NULL, NULL, '9789899552258', NULL, NULL, 1, 8, NULL, NULL, NULL, NULL, 0, ''),
(9, 'Gestão da Informação na Biblioteca Escolar', 'Português', NULL, NULL, '9789722314916', NULL, NULL, 1, 9, NULL, NULL, NULL, NULL, 0, ''),
(10, 'A virtual environment to share knowledge', 'Inglês', NULL, NULL, '9781351729901', NULL, NULL, 2, 4, NULL, NULL, NULL, NULL, 0, ''),
(11, 'Ciência da Informação: contributos para o seu estudo', 'Português', NULL, NULL, '9789896430900', NULL, NULL, 1, 4, NULL, NULL, NULL, NULL, 0, ''),
(12, 'Repensar a Sociedade da Informação e do Conhecimento no Início do Século XXI', 'Português', NULL, NULL, '9789726186953', NULL, NULL, 3, 4, NULL, NULL, NULL, NULL, 0, ''),
(13, 'Gestão da Informação em Museus: uma contribuição para o seu estudo', 'Português', NULL, NULL, '9789899901394', NULL, NULL, 2, 4, NULL, NULL, NULL, NULL, 0, ''),
(14, 'Web 2.0 and Higher Education. A psychological perspective', 'Inglês', NULL, NULL, '9783659683466', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, 0, ''),
(15, 'Contribuições para a discussão de um modelo de Governo Eletrónico Local para Angola', 'Português', NULL, NULL, '9789899933200', NULL, NULL, 1, 13, NULL, NULL, NULL, NULL, 0, ''),
(16, 'alforreca', 'portugues', NULL, NULL, '1234567894563', NULL, '1610028739_Jellyfish.jpg', 1, NULL, NULL, '2021-01-07 10:04:04', '2021-01-07 14:13:16', NULL, 1, ''),
(18, 'pingu', 'portugues', NULL, NULL, '1234567893323', NULL, '1610028816_Penguins.jpg', 1, NULL, NULL, '2021-01-07 10:11:52', '2021-01-07 14:13:36', NULL, 1, ''),
(19, 'tulipas', 'portugues', NULL, NULL, '4567891235263', NULL, '1610028882_Tulips.jpg', 1, NULL, NULL, '2021-01-07 14:14:42', '2021-01-07 14:14:42', NULL, 1, ''),
(20, 'Marcelo Motoqueiro', 'portugues', NULL, NULL, '1547862302563', NULL, '1610029008_images.jpg', 1, NULL, NULL, '2021-01-07 14:16:48', '2021-01-07 15:05:28', NULL, 1, '1610031928_pdf1.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emai_vrified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal' COMMENT 'admin ou normal',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `emai_vrified_at`, `password`, `tipo_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rafael Sousa', 'rafannsousa@gmail.com', NULL, '$2y$10$mg.tDWivpjyUK.fHhUhHEeMQj2Ik..pHC6Njn6TkzkGfDjQ8mvDhG', 'admin', NULL, '2020-12-10 13:57:22', '2020-12-10 13:57:22'),
(2, 'Utilizador2', 'user2@gmail.com', NULL, '$2y$10$ZkSTJlXybFNZswlvk/NDyOwj/Oc8rCRxQjCrZF2JorQzr3kkHuM0C', 'normal', NULL, '2021-01-04 17:00:49', '2021-01-04 17:00:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indexes for table `autores_livros`
--
ALTER TABLE `autores_livros`
  ADD PRIMARY KEY (`id_al`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indexes for table `edicoes`
--
ALTER TABLE `edicoes`
  ADD PRIMARY KEY (`id_livro`,`id_editora`);

--
-- Indexes for table `editoras`
--
ALTER TABLE `editoras`
  ADD PRIMARY KEY (`id_editora`);

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_livro`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `autores_livros`
--
ALTER TABLE `autores_livros`
  MODIFY `id_al` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `editoras`
--
ALTER TABLE `editoras`
  MODIFY `id_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
