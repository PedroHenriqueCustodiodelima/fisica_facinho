-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/11/2024 às 15:03
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fisicaonline`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alternativas`
--

CREATE TABLE `alternativas` (
  `id` int(11) NOT NULL,
  `questao_id` int(11) DEFAULT NULL,
  `texto` varchar(255) NOT NULL,
  `correta` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alternativas`
--

INSERT INTO `alternativas` (`id`, `questao_id`, `texto`, `correta`) VALUES
(80, 14, 'Um objeto em movimento sempre está se movendo em relação a todos os outros objetos.', 0),
(81, 14, 'Um objeto em movimento em relação a um ponto de referência pode parecer parado em relação a outro ponto de referência.', 1),
(82, 14, 'Um objeto em repouso sempre permanece parado, independentemente de outros pontos de referência.', 0),
(83, 14, 'Um objeto em movimento sempre muda de posição em relação ao seu próprio ponto de referência.', 0),
(84, 15, 'Um objeto em movimento sempre está se movendo em relação a todos os outros objetos.', 0),
(85, 15, 'Um objeto em movimento em relação a um ponto de referência pode parecer parado em relação a outro ponto de referência.', 1),
(86, 15, 'Um objeto em repouso sempre permanece parado, independentemente de outros pontos de referência.', 0),
(87, 15, 'Um objeto em movimento sempre muda de posição em relação ao seu próprio ponto de referência.', 0),
(88, 16, 'Um objeto em movimento sempre está se movendo em relação a todos os outros objetos.', 0),
(89, 16, 'Um objeto em movimento em relação a um ponto de referência pode parecer parado em relação a outro ponto de referência.', 1),
(90, 16, 'Um objeto em repouso sempre permanece parado, independentemente de outros pontos de referência.', 0),
(91, 16, 'Um objeto em movimento sempre muda de posição em relação ao seu próprio ponto de referência.', 0),
(92, 17, 'Um objeto em movimento sempre está se movendo em relação a todos os outros objetos.', 0),
(93, 17, 'Um objeto em movimento em relação a um ponto de referência pode parecer parado em relação a outro ponto de referência.', 1),
(94, 17, 'Um objeto em repouso sempre permanece parado, independentemente de outros pontos de referência.', 0),
(95, 17, 'Um objeto em movimento sempre muda de posição em relação ao seu próprio ponto de referência.', 0),
(96, 18, 'Tempo - metro (m)', 0),
(97, 18, 'Massa - quilograma (kg)', 1),
(98, 18, 'Temperatura - segundo (s)', 0),
(99, 18, 'Comprimento - grama (g)', 0),
(100, 19, 'Tempo - metro (m)', 0),
(101, 19, 'Massa - quilograma (kg)', 1),
(102, 19, 'Temperatura - segundo (s)', 0),
(103, 19, 'Comprimento - grama (g)', 0),
(104, 20, 'Tempo - metro (m)', 0),
(105, 20, 'Massa - quilograma (kg)', 1),
(106, 20, 'Temperatura - segundo (s)', 0),
(107, 20, 'Comprimento - grama (g)', 0),
(108, 21, 'Tempo - metro (m)', 0),
(109, 21, 'Massa - quilograma (kg)', 1),
(110, 21, 'Temperatura - segundo (s)', 0),
(111, 21, 'Comprimento - grama (g)', 0),
(112, 22, '700 metros', 0),
(113, 22, '500 metros', 1),
(114, 22, '400 metros', 0),
(115, 22, '300 metros', 0),
(116, 23, '700 metros', 0),
(117, 23, '500 metros', 1),
(118, 23, '400 metros', 0),
(119, 23, '300 metros', 0),
(120, 24, '700 metros', 0),
(121, 24, '500 metros', 1),
(122, 24, '400 metros', 0),
(123, 24, '300 metros', 0),
(124, 25, '700 metros', 0),
(125, 25, '500 metros', 1),
(126, 25, '400 metros', 0),
(127, 25, '300 metros', 0),
(128, 26, '3 m/s²', 1),
(129, 26, '2 m/s²', 0),
(130, 26, '5 m/s²', 0),
(131, 26, '7 m/s²', 0),
(132, 27, '3 m/s²', 1),
(133, 27, '2 m/s²', 0),
(134, 27, '5 m/s²', 0),
(135, 27, '7 m/s²', 0),
(136, 28, '3 m/s²', 1),
(137, 28, '2 m/s²', 0),
(138, 28, '5 m/s²', 0),
(139, 28, '7 m/s²', 0),
(140, 29, '3 m/s²', 1),
(141, 29, '2 m/s²', 0),
(142, 29, '5 m/s²', 0),
(143, 29, '7 m/s²', 0),
(144, 30, 'A velocidade do objeto aumenta constantemente ao longo do tempo.', 0),
(145, 30, 'A velocidade do objeto diminui ao longo do tempo.', 0),
(146, 30, 'A velocidade do objeto permanece constante durante todo o movimento.', 1),
(147, 30, 'O objeto alterna entre velocidades altas e baixas.', 0),
(148, 31, 'A velocidade do objeto aumenta constantemente ao longo do tempo.', 0),
(149, 31, 'A velocidade do objeto diminui ao longo do tempo.', 0),
(150, 31, 'A velocidade do objeto permanece constante durante todo o movimento.', 1),
(151, 31, 'O objeto alterna entre velocidades altas e baixas.', 0),
(152, 32, 'A velocidade do objeto aumenta constantemente ao longo do tempo.', 0),
(153, 32, 'A velocidade do objeto diminui ao longo do tempo.', 0),
(154, 32, 'A velocidade do objeto permanece constante durante todo o movimento.', 1),
(155, 32, 'O objeto alterna entre velocidades altas e baixas.', 0),
(156, 33, 'A velocidade do objeto aumenta constantemente ao longo do tempo.', 0),
(157, 33, 'A velocidade do objeto diminui ao longo do tempo.', 0),
(158, 33, 'A velocidade do objeto permanece constante durante todo o movimento.', 1),
(159, 33, 'O objeto alterna entre velocidades altas e baixas.', 0),
(172, 37, 'A aceleração é constante e não muda ao longo do tempo.', 1),
(173, 37, 'A aceleração diminui com o tempo.', 0),
(174, 37, 'A aceleração é variável e muda com o tempo.', 0),
(175, 37, 'A aceleração é zero, pois o objeto se move com velocidade constante.', 0),
(188, 41, '9,8 m/s²', 1),
(189, 41, '10 m/s²', 0),
(190, 41, '5 m/s²', 0),
(191, 41, '0 m/s²', 0),
(192, 42, 'A parede empurra você com uma força de 100 N na mesma direção.', 0),
(193, 42, 'A parede empurra você com uma força de 100 N na direção oposta.', 1),
(194, 42, 'Não há reação da parede.', 0),
(195, 42, 'A parede empurra você com uma força maior do que 100 N.', 0),
(196, 43, 'A parede empurra você com uma força de 100 N na mesma direção.', 0),
(197, 43, 'A parede empurra você com uma força de 100 N na direção oposta.', 1),
(198, 43, 'Não há reação da parede.', 0),
(199, 43, 'A parede empurra você com uma força maior do que 100 N.', 0),
(200, 44, 'A parede empurra você com uma força de 100 N na mesma direção.', 0),
(201, 44, 'A parede empurra você com uma força de 100 N na direção oposta.', 1),
(202, 44, 'Não há reação da parede.', 0),
(203, 44, 'A parede empurra você com uma força maior do que 100 N.', 0),
(204, 45, 'A parede empurra você com uma força de 100 N na mesma direção.', 0),
(205, 45, 'A parede empurra você com uma força de 100 N na direção oposta.', 1),
(206, 45, 'Não há reação da parede.', 0),
(207, 45, 'A parede empurra você com uma força maior do que 100 N.', 0),
(208, 46, 'A velocidade tangencial varia constantemente ao longo do tempo.', 0),
(209, 46, 'A velocidade tangencial é constante em magnitude, mas sua direção muda a cada ponto da trajetória.', 1),
(210, 46, 'A velocidade tangencial é zero.', 0),
(211, 46, 'A velocidade tangencial aumenta conforme o objeto se aproxima do centro da trajetória.', 0),
(212, 47, 'A velocidade tangencial varia constantemente ao longo do tempo.', 0),
(213, 47, 'A velocidade tangencial é constante em magnitude, mas sua direção muda a cada ponto da trajetória.', 1),
(214, 47, 'A velocidade tangencial é zero.', 0),
(215, 47, 'A velocidade tangencial aumenta conforme o objeto se aproxima do centro da trajetória.', 0),
(216, 48, 'A velocidade tangencial varia constantemente ao longo do tempo.', 0),
(217, 48, 'A velocidade tangencial é constante em magnitude, mas sua direção muda a cada ponto da trajetória.', 1),
(218, 48, 'A velocidade tangencial é zero.', 0),
(219, 48, 'A velocidade tangencial aumenta conforme o objeto se aproxima do centro da trajetória.', 0),
(220, 49, 'A velocidade tangencial varia constantemente ao longo do tempo.', 0),
(221, 49, 'A velocidade tangencial é constante em magnitude, mas sua direção muda a cada ponto da trajetória.', 1),
(222, 49, 'A velocidade tangencial é zero.', 0),
(223, 49, 'A velocidade tangencial aumenta conforme o objeto se aproxima do centro da trajetória.', 0),
(224, 50, 'Força centrífuga', 0),
(225, 50, 'Força normal', 0),
(226, 50, 'Força centrípeta', 1),
(227, 50, 'Força de atrito', 0),
(228, 51, 'Força centrífuga', 0),
(229, 51, 'Força normal', 0),
(230, 51, 'Força centrípeta', 1),
(231, 51, 'Força de atrito', 0),
(232, 52, 'Força centrífuga', 0),
(233, 52, 'Força normal', 0),
(234, 52, 'Força centrípeta', 1),
(235, 52, 'Força de atrito', 0),
(236, 53, 'Força centrífuga', 0),
(237, 53, 'Força normal', 0),
(238, 53, 'Força centrípeta', 1),
(239, 53, 'Força de atrito', 0),
(240, 54, 'Newton (N)', 0),
(241, 54, 'Joule (J)', 1),
(242, 54, 'Watt (W)', 0),
(243, 54, 'Metro (m)', 0),
(244, 55, 'Newton (N)', 0),
(245, 55, 'Joule (J)', 1),
(246, 55, 'Watt (W)', 0),
(247, 55, 'Metro (m)', 0),
(248, 56, 'Newton (N)', 0),
(249, 56, 'Joule (J)', 1),
(250, 56, 'Watt (W)', 0),
(251, 56, 'Metro (m)', 0),
(252, 57, 'Newton (N)', 0),
(253, 57, 'Joule (J)', 1),
(254, 57, 'Watt (W)', 0),
(255, 57, 'Metro (m)', 0),
(256, 58, 'Joule (J)', 0),
(257, 58, 'Newton (N)', 0),
(258, 58, 'Newton-segundo (N·s)', 1),
(259, 58, 'Metro por segundo (m/s)', 0),
(260, 59, 'Joule (J)', 0),
(261, 59, 'Newton (N)', 0),
(262, 59, 'Newton-segundo (N·s)', 1),
(263, 59, 'Metro por segundo (m/s)', 0),
(264, 60, 'Joule (J)', 0),
(265, 60, 'Newton (N)', 0),
(266, 60, 'Newton-segundo (N·s)', 1),
(267, 60, 'Metro por segundo (m/s)', 0),
(268, 61, 'Joule (J)', 0),
(269, 61, 'Newton (N)', 0),
(270, 61, 'Newton-segundo (N·s)', 1),
(271, 61, 'Metro por segundo (m/s)', 0),
(272, 62, 'A força será duplicada.', 0),
(273, 62, 'A força será reduzida pela metade.', 0),
(274, 62, 'A força será reduzida a um quarto do valor original.', 1),
(275, 62, 'A força será mantida constante.', 0),
(276, 63, 'A força será duplicada.', 0),
(277, 63, 'A força será reduzida pela metade.', 0),
(278, 63, 'A força será reduzida a um quarto do valor original.', 1),
(279, 63, 'A força será mantida constante.', 0),
(280, 64, 'A força será duplicada.', 0),
(281, 64, 'A força será reduzida pela metade.', 0),
(282, 64, 'A força será reduzida a um quarto do valor original.', 1),
(283, 64, 'A força será mantida constante.', 0),
(284, 65, 'A força será duplicada.', 0),
(285, 65, 'A força será reduzida pela metade.', 0),
(286, 65, 'A força será reduzida a um quarto do valor original.', 1),
(287, 65, 'A força será mantida constante.', 0),
(288, 66, 'A soma das forças resultantes é diferente de zero.', 0),
(289, 66, 'A soma das forças resultantes é igual a zero.', 1),
(290, 66, 'A soma dos momentos resultantes é diferente de zero.', 0),
(291, 66, 'A soma dos momentos resultantes é igual a zero.', 0),
(292, 67, 'A soma das forças resultantes é diferente de zero.', 0),
(293, 67, 'A soma das forças resultantes é igual a zero.', 1),
(294, 67, 'A soma dos momentos resultantes é diferente de zero.', 0),
(295, 67, 'A soma dos momentos resultantes é igual a zero.', 0),
(296, 68, 'A soma das forças resultantes é diferente de zero.', 0),
(297, 68, 'A soma das forças resultantes é igual a zero.', 1),
(298, 68, 'A soma dos momentos resultantes é diferente de zero.', 0),
(299, 68, 'A soma dos momentos resultantes é igual a zero.', 0),
(300, 69, 'A soma das forças resultantes é diferente de zero.', 0),
(301, 69, 'A soma das forças resultantes é igual a zero.', 1),
(302, 69, 'A soma dos momentos resultantes é diferente de zero.', 0),
(303, 69, 'A soma dos momentos resultantes é igual a zero.', 0),
(304, 70, 'A pressão é inversamente proporcional à profundidade.', 0),
(305, 70, 'A pressão é diretamente proporcional à profundidade.', 1),
(306, 70, 'A pressão não depende da profundidade.', 0),
(307, 70, 'A pressão é diretamente proporcional à temperatura.', 0),
(308, 71, 'A pressão é inversamente proporcional à profundidade.', 0),
(309, 71, 'A pressão é diretamente proporcional à profundidade.', 1),
(310, 71, 'A pressão não depende da profundidade.', 0),
(311, 71, 'A pressão é diretamente proporcional à temperatura.', 0),
(312, 72, 'A pressão é inversamente proporcional à profundidade.', 0),
(313, 72, 'A pressão é diretamente proporcional à profundidade.', 1),
(314, 72, 'A pressão não depende da profundidade.', 0),
(315, 72, 'A pressão é diretamente proporcional à temperatura.', 0),
(316, 73, 'A pressão é inversamente proporcional à profundidade.', 0),
(317, 73, 'A pressão é diretamente proporcional à profundidade.', 1),
(318, 73, 'A pressão não depende da profundidade.', 0),
(319, 73, 'A pressão é diretamente proporcional à temperatura.', 0),
(320, 74, 'Fluxo turbulento', 0),
(321, 74, 'Fluxo laminar', 1),
(322, 74, 'Fluxo compressível', 0),
(323, 74, 'Fluxo ideal', 0),
(324, 75, 'Fluxo turbulento', 0),
(325, 75, 'Fluxo laminar', 1),
(326, 75, 'Fluxo compressível', 0),
(327, 75, 'Fluxo ideal', 0),
(328, 76, 'Fluxo turbulento', 0),
(329, 76, 'Fluxo laminar', 1),
(330, 76, 'Fluxo compressível', 0),
(331, 76, 'Fluxo ideal', 0),
(332, 77, 'Fluxo turbulento', 0),
(333, 77, 'Fluxo laminar', 1),
(334, 77, 'Fluxo compressível', 0),
(335, 77, 'Fluxo ideal', 0),
(336, 78, 'Fluxo turbulento', 0),
(337, 78, ' Fluxo laminar', 1),
(338, 78, 'Fluxo compressível', 0),
(339, 78, 'Fluxo ideal', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `alternativas_2`
--

CREATE TABLE `alternativas_2` (
  `id` int(11) NOT NULL,
  `questao_id` int(11) DEFAULT NULL,
  `texto` varchar(255) NOT NULL,
  `correta` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alternativas_2`
--

INSERT INTO `alternativas_2` (`id`, `questao_id`, `texto`, `correta`) VALUES
(1, 3, '5 m/s', 0),
(2, 3, '10 m/s', 1),
(3, 3, '15 m/s', 0),
(4, 3, '20 m/s', 0),
(5, 4, 'ffgf', 1),
(6, 4, 'fgdfg', 0),
(7, 4, 'fdgsd', 0),
(8, 4, 'fdgdgfdg', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `alternativas_3`
--

CREATE TABLE `alternativas_3` (
  `id` int(11) NOT NULL,
  `questao_id` int(11) DEFAULT NULL,
  `texto` varchar(255) NOT NULL,
  `correta` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alternativas_3`
--

INSERT INTO `alternativas_3` (`id`, `questao_id`, `texto`, `correta`) VALUES
(1, 2, '45,9 m', 0),
(2, 2, '68,4 m', 0),
(3, 2, '76,5 m', 1),
(4, 2, '91,8 m', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `alternativas_concurso`
--

CREATE TABLE `alternativas_concurso` (
  `id` int(11) NOT NULL,
  `id_questao` int(11) NOT NULL,
  `texto` text NOT NULL,
  `correta` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alternativas_concurso`
--

INSERT INTO `alternativas_concurso` (`id`, `id_questao`, `texto`, `correta`) VALUES
(1, 1, 'São Paulo', 0),
(2, 1, 'Brasília', 1),
(3, 1, 'Rio de Janeiro', 0),
(4, 2, 'Estudo do ar em repouso', 0),
(5, 2, 'Estudo das forças que atuam sobre objetos em movimento', 1),
(6, 2, 'Estudo das massas de ar', 0),
(8, 3, '300 N', 0),
(9, 3, '120 N', 0),
(10, 3, '360 N', 0),
(11, 3, '450 N', 1),
(12, 3, '900 N', 0),
(13, 4, 'corrente elétrica e 0,14. ', 1),
(14, 4, 'corrente elétrica e 0,15. ', 0),
(15, 4, 'corrente elétrica e 0,29.', 0),
(16, 4, 'tensão elétrica e 0,14.', 0),
(17, 5, 'corrente elétrica e 0,14. ', 1),
(18, 5, 'corrente elétrica e 0,15. ', 0),
(19, 5, 'corrente elétrica e 0,29.', 0),
(20, 5, 'tensão elétrica e 0,14.', 0),
(21, 6, 'Miopia.', 0),
(22, 6, 'Cegueira.', 1),
(23, 6, '\r\nDaltonismo.', 0),
(24, 6, 'Astigmatismo.', 0),
(25, 7, 'Miopia.', 0),
(26, 7, 'Cegueira.', 1),
(27, 7, '\r\nDaltonismo.', 0),
(28, 7, 'Astigmatismo.', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `atividades`
--

CREATE TABLE `atividades` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `acao` varchar(255) DEFAULT NULL,
  `data_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `detalhes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `atividades_usuarios`
--

CREATE TABLE `atividades_usuarios` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `acao` varchar(255) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_usuario` varchar(50) DEFAULT NULL,
  `navegador` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `cpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professores`
--

INSERT INTO `professores` (`id`, `nome`, `email`, `senha`, `foto`, `data_criacao`, `cpf`) VALUES
(11, 'Sales', 'lima.custodio@escolar.ifrn.edu.br', 'Pedro@123', NULL, '2024-09-03 13:17:58', '916.617.530-51');

-- --------------------------------------------------------

--
-- Estrutura para tabela `questoes`
--

CREATE TABLE `questoes` (
  `id` int(11) NOT NULL,
  `enunciado` text NOT NULL,
  `ano` int(11) NOT NULL,
  `concurso` varchar(255) NOT NULL,
  `materia` varchar(255) NOT NULL,
  `resolucao` text NOT NULL,
  `foto_enunciado` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `questoes`
--

INSERT INTO `questoes` (`id`, `enunciado`, `ano`, `concurso`, `materia`, `resolucao`, `foto_enunciado`, `video`) VALUES
(1, 'Qual a capital do Brasil?', 2024, 'ENEM', '', '', NULL, NULL),
(2, 'O que é dinâmica?', 2024, 'ITA', '', '', NULL, NULL),
(3, 'Um pai faz um balanço utilizando dois segmentos paralelos e iguais da mesma corda para fixar uma tábua a uma barra horizontal. Por segurança, opta por um tipo de corda cuja tensão de ruptura seja 25% superior à tensão máxima calculada nas seguintes condições:  • O ângulo máximo atingido pelo balanço em relação à vertical é igual a 90º;  • Os filhos utilizarão o balanço até que tenham uma massa de 24 kg.  Além disso, ele aproxima o movimento do balanço para o movimento circular uniforme, considera que a aceleração da gravidade é igual a 10 m/s2 e despreza forças dissipativas.  Qual é a tensão de ruptura da corda escolhida?', 2022, 'ENEM', '', 'Resposta: d) 450 N  Como as forças se conservam sem dissipação, a energia mecânica no ponto mais alto (A) é igual a energia no ponto mais baixo (B).  Em com reto A subscrito igual a Em com reto B subscrito reto m. reto g. reto h espaço igual a espaço numerador reto m. reto v ao quadrado sobre denominador 2 fim da fração diagonal para cima risco reto m. reto g. reto h espaço igual a espaço numerador diagonal para cima risco reto m. reto v ao quadrado sobre denominador 2 fim da fração 2. reto g. reto h igual a reto v ao quadrado  Como o movimento é circular, o raio da trajetória é o próprio comprimento do balanço. Da posição de 90° em relação a vertical até 0° (ponto mais baixo), a altura h é o próprio. Substituindo na equação anterior:  2. reto g. reto R igual a reto v ao quadrado  No ponto mais baixo, temos que a resultante das forças é a resultante centrípeta, presente nos movimentos circulares e calculada por:  numerador reto m. reto v ao quadrado sobre denominador reto R fim da fração  Atuam a força peso com direção vertical e sentido para baixo e a força de tração ou, tensão, em ambas as cordas. Pela segunda lei de Newton:  2 reto T espaço menos espaço reto P espaço igual a espaço numerador reto m. reto v ao quadrado sobre denominador reto R fim da fração  Substituindo P por mg e v² por 2.g.R:  2 reto T espaço menos espaço reto m. reto g igual a espaço numerador reto m.2. reto g. diagonal para baixo risco reto R sobre denominador diagonal para baixo risco reto R fim da fração 2 reto T menos espaço reto m. reto g igual a 2. reto m. reto g 2 reto T espaço igual a espaço 2. reto m. reto g espaço mais espaço reto m. reto g 2 reto T espaço igual a espaço 3. reto m. reto g reto T igual a numerador espaço 3. reto m. reto g sobre denominador 2 fim da fração  Considerando a maior massa das crianças igual a 24 kg e g = 10 m/s².  reto T igual a numerador espaço 3. reto m. reto g sobre denominador 2 fim da fração reto T igual a numerador espaço 3.24.10 sobre denominador 2 fim da fração igual a 720 sobre 2 igual a 360 espaço reto N  No entanto, a tração deve ser 25% superior à tensão máxima calculada.  360 espaço sinal de multiplicação espaço 1 vírgula 25 espaço igual a espaço 450 espaço reto N', NULL, NULL),
(4, 'Um multímetro pode atuar como voltímetro (leitura em volt) ou como amperímetro (leitura em ampère), dependendo da função selecionada. A forma de conectar o multímetro ao circuito depende da grandeza física a ser medida. Uma lâmpada de lanterna, de resistência elétrica igual a 40 Ω, brilha quando conectada a quatro pilhas em série, cada uma com 1,5 V de tensão elétrica. O multímetro 2 indica o valor 5,62, conforme a figura, e o multímetro 1 está conectado, porém desligado.\r\nAo se ligar o multímetro 1, a grandeza física e o seu valor correspondente indicados na tela são, respectivamente,', 2023, 'ENEM', '', 'O múltimetro pode assumir a função de voltímetro (medir a voltagem) ou de amperímetro (medir a amperagem).O Amperímetro ideal é colocado em uma associação em série,porque ele possui uma resitência irrelevante.O múltimetro em questão está em série com a lâmpada e com a associação de pilhas,logo ele vai medir a amperágem (valor da corrente).Dessa forma,basta calcular a corrente que passa pelo sistema.Com uma associação em série,a corrente é a mesma que passa na lâmpada.\r\n\r\nLogo:\r\n\r\nU=R.i\r\n\r\n5,62/40 =0,14', 'uploads/questao.png', NULL),
(5, 'Um multímetro pode atuar como voltímetro (leitura em volt) ou como amperímetro (leitura em ampère), dependendo da função selecionada. A forma de conectar o multímetro ao circuito depende da grandeza física a ser medida. Uma lâmpada de lanterna, de resistência elétrica igual a 40 Ω, brilha quando conectada a quatro pilhas em série, cada uma com 1,5 V de tensão elétrica. O multímetro 2 indica o valor 5,62, conforme a figura, e o multímetro 1 está conectado, porém desligado.\r\nAo se ligar o multímetro 1, a grandeza física e o seu valor correspondente indicados na tela são, respectivamente,', 2023, 'ENEM', '', 'O múltimetro pode assumir a função de voltímetro (medir a voltagem) ou de amperímetro (medir a amperagem).O Amperímetro ideal é colocado em uma associação em série,porque ele possui uma resitência irrelevante.O múltimetro em questão está em série com a lâmpada e com a associação de pilhas,logo ele vai medir a amperágem (valor da corrente).Dessa forma,basta calcular a corrente que passa pelo sistema.Com uma associação em série,a corrente é a mesma que passa na lâmpada.\r\n\r\nLogo:\r\n\r\nU=R.i\r\n\r\n5,62/40 =0,14', 'img/questao.png', NULL),
(6, 'Escrito em 1897, pelo britânico H. G. Wells (1866- 1946), O homem invisível é um livro que narra a história de um cientista que teria desenvolvido uma forma de tornar todos os tecidos do seu corpo transparentes à luz, ao fazer o índice de refração absoluto do corpo humano corresponder ao do ar. Contudo, Wells não explorou no livro o fato de que esse efeito comprometeria a visão de seu protagonista.\r\n\r\nNesse caso, qual seria a deficiência visual provocada?', 2023, 'ENEM', '', 'Se o corpo humano se tornasse completamente transparente, como descrito em \"O Homem Invisível\" de H. G. Wells, o protagonista acabaria ficando cego. Isso ocorre porque a visão depende da refração da luz ao passar pelas lentes do olho, que direcionam os raios luminosos para formar uma imagem na retina. Se o olho, incluindo o cristalino e a córnea, se tornasse transparente e tivesse o mesmo índice de refração do ar, a luz passaria diretamente pelos olhos sem ser desviada para a retina. Sem a focalização correta da luz, o protagonista não seria capaz de formar imagens, resultando em cegueira.', '', 'https://www.youtube.com/watch?v=4_uaMSFu0vU'),
(7, 'Escrito em 1897, pelo britânico H. G. Wells (1866- 1946), O homem invisível é um livro que narra a história de um cientista que teria desenvolvido uma forma de tornar todos os tecidos do seu corpo transparentes à luz, ao fazer o índice de refração absoluto do corpo humano corresponder ao do ar. Contudo, Wells não explorou no livro o fato de que esse efeito comprometeria a visão de seu protagonista.\r\n\r\nNesse caso, qual seria a deficiência visual provocada?', 2023, 'ENEM', '', 'Se o corpo humano se tornasse completamente transparente, como descrito em \"O Homem Invisível\" de H. G. Wells, o protagonista acabaria ficando cego. Isso ocorre porque a visão depende da refração da luz ao passar pelas lentes do olho, que direcionam os raios luminosos para formar uma imagem na retina. Se o olho, incluindo o cristalino e a córnea, se tornasse transparente e tivesse o mesmo índice de refração do ar, a luz passaria diretamente pelos olhos sem ser desviada para a retina. Sem a focalização correta da luz, o protagonista não seria capaz de formar imagens, resultando em cegueira.', '', 'https://www.youtube.com/watch?v=4_uaMSFu0vU');

-- --------------------------------------------------------

--
-- Estrutura para tabela `questoes_nivel1`
--

CREATE TABLE `questoes_nivel1` (
  `id` int(11) NOT NULL,
  `enunciado` text NOT NULL,
  `explicacao` text DEFAULT NULL,
  `materia` enum('Introdução à Física','Grandezas e vetores','Cinemática – conceitos básicos','Cinemática – identificando os movimentos','Movimento retilíneo uniforme (MRU)','Movimento retilíneo uniformemente variado (MRUV)','Movimentos sob ação da gravidade','As Leis de Newton e suas aplicações','Movimento Circular Uniforme','Dinâmica do movimento circular','Trabalho energia potência','Impulso e Quantidade de Movimento','Gravitação Universal','Estática','Hidrostática','Hidrodinâmica') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `questoes_nivel1`
--

INSERT INTO `questoes_nivel1` (`id`, `enunciado`, `explicacao`, `materia`) VALUES
(17, 'O que é movimento? Considere que você está dentro de um carro em movimento, observando a paisagem ao redor. Qual das afirmações abaixo é verdadeira sobre o movimento?', 'O movimento é relativo, ou seja, depende do ponto de referência. Se você está dentro de um carro em movimento e observa outro passageiro sentado ao seu lado, ele parecerá parado em relação a você, mas em movimento em relação à estrada e à paisagem. Portanto, um objeto pode estar em movimento em relação a um ponto de referência e parado em relação a outro.', 'Introdução à Física'),
(18, 'Qual das alternativas abaixo representa corretamente uma grandeza física e sua unidade no Sistema Internacional de Unidades (SI)?', 'No Sistema Internacional de Unidades (SI), cada grandeza física tem uma unidade específica. O quilograma (kg) é a unidade de medida para a massa. As outras alternativas estão incorretas porque o tempo é medido em segundos (s), a temperatura em kelvin (K), e o comprimento em metros (m).', 'Grandezas e vetores'),
(25, ' Um estudante caminha 300 metros para o norte e, em seguida, 400 metros para o leste. Qual é o deslocamento total do estudante em relação ao ponto de partida?', 'O deslocamento é uma grandeza vetorial que considera a distância em linha reta entre o ponto inicial e o ponto final, com direção. Nesse caso, o deslocamento é calculado usando o teorema de Pitágoras, pois o estudante fez um percurso em forma de triângulo retângulo. Assim, o deslocamento é √(300² + 400²) = 500 metros.', 'Cinemática – conceitos básicos'),
(26, 'Um carro aumenta sua velocidade de 20 m/s para 50 m/s em 10 segundos. Qual é a aceleração média do carro durante esse intervalo?', 'A aceleração média é calculada pela fórmula:\r\n\r\n𝑎\r\n=\r\nΔ\r\n𝑣\r\nΔ\r\n𝑡\r\na= \r\nΔt\r\nΔv\r\n​\r\n \r\nonde \r\nΔ\r\n𝑣\r\nΔv é a variação de velocidade e \r\nΔ\r\n𝑡\r\nΔt é o intervalo de tempo. Neste caso, \r\nΔ\r\n𝑣\r\n=\r\n50\r\n \r\nm/s\r\n−\r\n20\r\n \r\nm/s\r\n=\r\n30\r\n \r\nm/s\r\nΔv=50m/s−20m/s=30m/s e \r\nΔ\r\n𝑡\r\n=\r\n10\r\n \r\ns\r\nΔt=10s.\r\nAssim, \r\n𝑎\r\n=\r\n30\r\n10\r\n=\r\n3\r\n \r\nm/s\r\n2\r\na= \r\n10\r\n30\r\n​\r\n =3m/s \r\n2\r\n .', 'Cinemática – identificando os movimentos'),
(33, 'Em um Movimento Retilíneo Uniforme (MRU), qual das alternativas a seguir é verdadeira sobre a velocidade do objeto?', 'No MRU, o objeto se desloca em linha reta com velocidade constante, ou seja, a velocidade não muda ao longo do tempo. Isso significa que o objeto percorre distâncias iguais em intervalos de tempo iguais.\r\n\r\n', 'Movimento retilíneo uniforme (MRU)'),
(37, 'Em um Movimento Retilíneo Uniformemente Variado (MRUV), qual das alternativas a seguir é verdadeira sobre a aceleração do objeto?', 'No MRUV, a aceleração é constante, o que significa que o objeto sofre uma variação de velocidade igual a cada intervalo de tempo. Esse é um dos principais aspectos do MRUV, ao contrário do Movimento Retilíneo Uniforme (MRU), onde a velocidade é constante.', 'Movimento retilíneo uniformemente variado (MRUV)'),
(41, 'Qual é a aceleração de um objeto em queda livre, desprezando a resistência do ar, durante o movimento vertical para baixo?', 'A aceleração de um objeto em queda livre, sob a ação da gravidade na superfície da Terra, é aproximadamente 9,8 m/s². Essa aceleração é constante e direcionada para o centro da Terra, independentemente da massa do objeto.', 'Movimentos sob ação da gravidade'),
(42, 'Quando você empurra uma parede com uma força de 100 N, qual é a reação de acordo com a terceira Lei de Newton?', 'A terceira Lei de Newton afirma que \"para toda ação, há uma reação de mesma intensidade, direção oposta e sentido contrário.\" Quando você empurra a parede com uma força de 100 N, a parede exerce uma força de 100 N sobre você na direção oposta. A intensidade da força é a mesma, mas a direção é contrária.', 'As Leis de Newton e suas aplicações'),
(43, 'Quando você empurra uma parede com uma força de 100 N, qual é a reação de acordo com a terceira Lei de Newton?', 'A terceira Lei de Newton afirma que \"para toda ação, há uma reação de mesma intensidade, direção oposta e sentido contrário.\" Quando você empurra a parede com uma força de 100 N, a parede exerce uma força de 100 N sobre você na direção oposta. A intensidade da força é a mesma, mas a direção é contrária.', 'As Leis de Newton e suas aplicações'),
(44, 'Quando você empurra uma parede com uma força de 100 N, qual é a reação de acordo com a terceira Lei de Newton?', 'A terceira Lei de Newton afirma que \"para toda ação, há uma reação de mesma intensidade, direção oposta e sentido contrário.\" Quando você empurra a parede com uma força de 100 N, a parede exerce uma força de 100 N sobre você na direção oposta. A intensidade da força é a mesma, mas a direção é contrária.', 'As Leis de Newton e suas aplicações'),
(45, 'Quando você empurra uma parede com uma força de 100 N, qual é a reação de acordo com a terceira Lei de Newton?', 'A terceira Lei de Newton afirma que \"para toda ação, há uma reação de mesma intensidade, direção oposta e sentido contrário.\" Quando você empurra a parede com uma força de 100 N, a parede exerce uma força de 100 N sobre você na direção oposta. A intensidade da força é a mesma, mas a direção é contrária.', 'As Leis de Newton e suas aplicações'),
(46, 'Em um Movimento Circular Uniforme (MCU), qual das alternativas a seguir é verdadeira sobre a velocidade tangencial do objeto?', 'No Movimento Circular Uniforme, a velocidade tangencial do objeto é constante em magnitude (valor), mas sua direção muda constantemente, pois a direção da velocidade tangencial é sempre perpendicular ao raio da trajetória circular. A aceleração centrípeta é responsável por essa mudança de direção, mas não afeta a magnitude da velocidade.', 'Movimento Circular Uniforme'),
(47, 'Em um Movimento Circular Uniforme (MCU), qual das alternativas a seguir é verdadeira sobre a velocidade tangencial do objeto?', 'No Movimento Circular Uniforme, a velocidade tangencial do objeto é constante em magnitude (valor), mas sua direção muda constantemente, pois a direção da velocidade tangencial é sempre perpendicular ao raio da trajetória circular. A aceleração centrípeta é responsável por essa mudança de direção, mas não afeta a magnitude da velocidade.', 'Movimento Circular Uniforme'),
(48, 'Em um Movimento Circular Uniforme (MCU), qual das alternativas a seguir é verdadeira sobre a velocidade tangencial do objeto?', 'No Movimento Circular Uniforme, a velocidade tangencial do objeto é constante em magnitude (valor), mas sua direção muda constantemente, pois a direção da velocidade tangencial é sempre perpendicular ao raio da trajetória circular. A aceleração centrípeta é responsável por essa mudança de direção, mas não afeta a magnitude da velocidade.', 'Movimento Circular Uniforme'),
(49, 'Em um Movimento Circular Uniforme (MCU), qual das alternativas a seguir é verdadeira sobre a velocidade tangencial do objeto?', 'No Movimento Circular Uniforme, a velocidade tangencial do objeto é constante em magnitude (valor), mas sua direção muda constantemente, pois a direção da velocidade tangencial é sempre perpendicular ao raio da trajetória circular. A aceleração centrípeta é responsável por essa mudança de direção, mas não afeta a magnitude da velocidade.', 'Movimento Circular Uniforme'),
(50, 'Em um movimento circular, qual é a principal força responsável por manter um objeto em sua trajetória circular?', 'A força centrípeta é a força que mantém o objeto em movimento ao longo de uma trajetória circular. Ela é direcionada para o centro da curva e evita que o objeto se mova em linha reta devido à inércia. A força centrífuga, por outro lado, é uma força fictícia que aparece em um referencial não inercial, sendo erroneamente atribuída ao movimento circular.', 'Dinâmica do movimento circular'),
(51, 'Em um movimento circular, qual é a principal força responsável por manter um objeto em sua trajetória circular?', 'A força centrípeta é a força que mantém o objeto em movimento ao longo de uma trajetória circular. Ela é direcionada para o centro da curva e evita que o objeto se mova em linha reta devido à inércia. A força centrífuga, por outro lado, é uma força fictícia que aparece em um referencial não inercial, sendo erroneamente atribuída ao movimento circular.', 'Dinâmica do movimento circular'),
(52, 'Em um movimento circular, qual é a principal força responsável por manter um objeto em sua trajetória circular?', 'A força centrípeta é a força que mantém o objeto em movimento ao longo de uma trajetória circular. Ela é direcionada para o centro da curva e evita que o objeto se mova em linha reta devido à inércia. A força centrífuga, por outro lado, é uma força fictícia que aparece em um referencial não inercial, sendo erroneamente atribuída ao movimento circular.', 'Dinâmica do movimento circular'),
(53, 'Em um movimento circular, qual é a principal força responsável por manter um objeto em sua trajetória circular?', 'A força centrípeta é a força que mantém o objeto em movimento ao longo de uma trajetória circular. Ela é direcionada para o centro da curva e evita que o objeto se mova em linha reta devido à inércia. A força centrífuga, por outro lado, é uma força fictícia que aparece em um referencial não inercial, sendo erroneamente atribuída ao movimento circular.', 'Dinâmica do movimento circular'),
(54, 'Qual é a unidade de medida do trabalho no Sistema Internacional (SI)?', 'No Sistema Internacional de Unidades (SI), a unidade de trabalho é o Joule (J). O trabalho é calculado como o produto da força (\r\n𝐹\r\nF) e a distância (\r\n𝑑\r\nd) percorrida na direção da força, ou seja, \r\n𝑊\r\n=\r\n𝐹\r\n⋅\r\n𝑑\r\nW=F⋅d, e o Joule é definido como \r\n1\r\n \r\nJ\r\n=\r\n1\r\n \r\nN\r\n⋅\r\nm\r\n1J=1N⋅m.', 'Trabalho energia potência'),
(55, 'Qual é a unidade de medida do trabalho no Sistema Internacional (SI)?', 'No Sistema Internacional de Unidades (SI), a unidade de trabalho é o Joule (J). O trabalho é calculado como o produto da força (\r\n𝐹\r\nF) e a distância (\r\n𝑑\r\nd) percorrida na direção da força, ou seja, \r\n𝑊\r\n=\r\n𝐹\r\n⋅\r\n𝑑\r\nW=F⋅d, e o Joule é definido como \r\n1\r\n \r\nJ\r\n=\r\n1\r\n \r\nN\r\n⋅\r\nm\r\n1J=1N⋅m.', 'Trabalho energia potência'),
(56, 'Qual é a unidade de medida do trabalho no Sistema Internacional (SI)?', 'No Sistema Internacional de Unidades (SI), a unidade de trabalho é o Joule (J). O trabalho é calculado como o produto da força (\r\n𝐹\r\nF) e a distância (\r\n𝑑\r\nd) percorrida na direção da força, ou seja, \r\n𝑊\r\n=\r\n𝐹\r\n⋅\r\n𝑑\r\nW=F⋅d, e o Joule é definido como \r\n1\r\n \r\nJ\r\n=\r\n1\r\n \r\nN\r\n⋅\r\nm\r\n1J=1N⋅m.', 'Trabalho energia potência'),
(57, 'Qual é a unidade de medida do trabalho no Sistema Internacional (SI)?', 'No Sistema Internacional de Unidades (SI), a unidade de trabalho é o Joule (J). O trabalho é calculado como o produto da força (\r\n𝐹\r\nF) e a distância (\r\n𝑑\r\nd) percorrida na direção da força, ou seja, \r\n𝑊\r\n=\r\n𝐹\r\n⋅\r\n𝑑\r\nW=F⋅d, e o Joule é definido como \r\n1\r\n \r\nJ\r\n=\r\n1\r\n \r\nN\r\n⋅\r\nm\r\n1J=1N⋅m.', 'Trabalho energia potência'),
(58, 'O impulso é definido como o produto da força aplicada sobre um objeto e o intervalo de tempo em que a força é exercida. Qual é a unidade de medida do impulso no Sistema Internacional (SI)?', 'O impulso é calculado como o produto da força \r\n𝐹\r\nF e o tempo \r\n𝑡\r\nt durante o qual a força é aplicada. Sua unidade no Sistema Internacional é o Newton-segundo (N·s), que é equivalente a \r\nkg\r\n⋅\r\nm/s\r\nkg⋅m/s, a unidade da quantidade de movimento (ou momento linear).', 'Impulso e Quantidade de Movimento'),
(59, 'O impulso é definido como o produto da força aplicada sobre um objeto e o intervalo de tempo em que a força é exercida. Qual é a unidade de medida do impulso no Sistema Internacional (SI)?', 'O impulso é calculado como o produto da força \r\n𝐹\r\nF e o tempo \r\n𝑡\r\nt durante o qual a força é aplicada. Sua unidade no Sistema Internacional é o Newton-segundo (N·s), que é equivalente a \r\nkg\r\n⋅\r\nm/s\r\nkg⋅m/s, a unidade da quantidade de movimento (ou momento linear).', 'Impulso e Quantidade de Movimento'),
(60, 'O impulso é definido como o produto da força aplicada sobre um objeto e o intervalo de tempo em que a força é exercida. Qual é a unidade de medida do impulso no Sistema Internacional (SI)?', 'O impulso é calculado como o produto da força \r\n𝐹\r\nF e o tempo \r\n𝑡\r\nt durante o qual a força é aplicada. Sua unidade no Sistema Internacional é o Newton-segundo (N·s), que é equivalente a \r\nkg\r\n⋅\r\nm/s\r\nkg⋅m/s, a unidade da quantidade de movimento (ou momento linear).', 'Impulso e Quantidade de Movimento'),
(61, 'O impulso é definido como o produto da força aplicada sobre um objeto e o intervalo de tempo em que a força é exercida. Qual é a unidade de medida do impulso no Sistema Internacional (SI)?', 'O impulso é calculado como o produto da força \r\n𝐹\r\nF e o tempo \r\n𝑡\r\nt durante o qual a força é aplicada. Sua unidade no Sistema Internacional é o Newton-segundo (N·s), que é equivalente a \r\nkg\r\n⋅\r\nm/s\r\nkg⋅m/s, a unidade da quantidade de movimento (ou momento linear).', 'Impulso e Quantidade de Movimento'),
(62, 'Se a massa de um dos corpos é dobrada e a distância entre os dois corpos também é dobrada, qual será o efeito sobre a força gravitacional entre eles?', 'A fórmula da gravitação universal é:\r\n\r\n𝐹\r\n=\r\n𝐺\r\n𝑚\r\n1\r\n𝑚\r\n2\r\n𝑟\r\n2\r\nF= \r\nr \r\n2\r\n \r\nGm \r\n1\r\n​\r\n m \r\n2\r\n​\r\n \r\n​\r\n \r\nSe a massa de um corpo é dobrada (\r\n𝑚\r\n1\r\n→\r\n2\r\n𝑚\r\n1\r\nm \r\n1\r\n​\r\n →2m \r\n1\r\n​\r\n ) e a distância também é dobrada (\r\n𝑟\r\n→\r\n2\r\n𝑟\r\nr→2r), a nova força gravitacional será:\r\n\r\n𝐹\r\n′\r\n=\r\n𝐺\r\n(\r\n2\r\n𝑚\r\n1\r\n)\r\n𝑚\r\n2\r\n(\r\n2\r\n𝑟\r\n)\r\n2\r\n=\r\n2\r\n𝐺\r\n𝑚\r\n1\r\n𝑚\r\n2\r\n4\r\n𝑟\r\n2\r\n=\r\n1\r\n2\r\n⋅\r\n𝐹\r\nF \r\n′\r\n = \r\n(2r) \r\n2\r\n \r\nG(2m \r\n1\r\n​\r\n )m \r\n2\r\n​\r\n \r\n​\r\n = \r\n4r \r\n2\r\n \r\n2Gm \r\n1\r\n​\r\n m \r\n2\r\n​\r\n \r\n​\r\n = \r\n2\r\n1\r\n​\r\n ⋅F\r\nOu seja, a força será reduzida a um quarto do valor original.', 'Gravitação Universal'),
(63, 'Se a massa de um dos corpos é dobrada e a distância entre os dois corpos também é dobrada, qual será o efeito sobre a força gravitacional entre eles?', 'A fórmula da gravitação universal é:\r\n\r\n𝐹\r\n=\r\n𝐺\r\n𝑚\r\n1\r\n𝑚\r\n2\r\n𝑟\r\n2\r\nF= \r\nr \r\n2\r\n \r\nGm \r\n1\r\n​\r\n m \r\n2\r\n​\r\n \r\n​\r\n \r\nSe a massa de um corpo é dobrada (\r\n𝑚\r\n1\r\n→\r\n2\r\n𝑚\r\n1\r\nm \r\n1\r\n​\r\n →2m \r\n1\r\n​\r\n ) e a distância também é dobrada (\r\n𝑟\r\n→\r\n2\r\n𝑟\r\nr→2r), a nova força gravitacional será:\r\n\r\n𝐹\r\n′\r\n=\r\n𝐺\r\n(\r\n2\r\n𝑚\r\n1\r\n)\r\n𝑚\r\n2\r\n(\r\n2\r\n𝑟\r\n)\r\n2\r\n=\r\n2\r\n𝐺\r\n𝑚\r\n1\r\n𝑚\r\n2\r\n4\r\n𝑟\r\n2\r\n=\r\n1\r\n2\r\n⋅\r\n𝐹\r\nF \r\n′\r\n = \r\n(2r) \r\n2\r\n \r\nG(2m \r\n1\r\n​\r\n )m \r\n2\r\n​\r\n \r\n​\r\n = \r\n4r \r\n2\r\n \r\n2Gm \r\n1\r\n​\r\n m \r\n2\r\n​\r\n \r\n​\r\n = \r\n2\r\n1\r\n​\r\n ⋅F\r\nOu seja, a força será reduzida a um quarto do valor original.', 'Gravitação Universal'),
(64, 'Se a massa de um dos corpos é dobrada e a distância entre os dois corpos também é dobrada, qual será o efeito sobre a força gravitacional entre eles?', 'A fórmula da gravitação universal é:\r\n\r\n𝐹\r\n=\r\n𝐺\r\n𝑚\r\n1\r\n𝑚\r\n2\r\n𝑟\r\n2\r\nF= \r\nr \r\n2\r\n \r\nGm \r\n1\r\n​\r\n m \r\n2\r\n​\r\n \r\n​\r\n \r\nSe a massa de um corpo é dobrada (\r\n𝑚\r\n1\r\n→\r\n2\r\n𝑚\r\n1\r\nm \r\n1\r\n​\r\n →2m \r\n1\r\n​\r\n ) e a distância também é dobrada (\r\n𝑟\r\n→\r\n2\r\n𝑟\r\nr→2r), a nova força gravitacional será:\r\n\r\n𝐹\r\n′\r\n=\r\n𝐺\r\n(\r\n2\r\n𝑚\r\n1\r\n)\r\n𝑚\r\n2\r\n(\r\n2\r\n𝑟\r\n)\r\n2\r\n=\r\n2\r\n𝐺\r\n𝑚\r\n1\r\n𝑚\r\n2\r\n4\r\n𝑟\r\n2\r\n=\r\n1\r\n2\r\n⋅\r\n𝐹\r\nF \r\n′\r\n = \r\n(2r) \r\n2\r\n \r\nG(2m \r\n1\r\n​\r\n )m \r\n2\r\n​\r\n \r\n​\r\n = \r\n4r \r\n2\r\n \r\n2Gm \r\n1\r\n​\r\n m \r\n2\r\n​\r\n \r\n​\r\n = \r\n2\r\n1\r\n​\r\n ⋅F\r\nOu seja, a força será reduzida a um quarto do valor original.', 'Gravitação Universal'),
(65, 'Se a massa de um dos corpos é dobrada e a distância entre os dois corpos também é dobrada, qual será o efeito sobre a força gravitacional entre eles?', 'A fórmula da gravitação universal é:\r\n\r\n𝐹\r\n=\r\n𝐺\r\n𝑚\r\n1\r\n𝑚\r\n2\r\n𝑟\r\n2\r\nF= \r\nr \r\n2\r\n \r\nGm \r\n1\r\n​\r\n m \r\n2\r\n​\r\n \r\n​\r\n \r\nSe a massa de um corpo é dobrada (\r\n𝑚\r\n1\r\n→\r\n2\r\n𝑚\r\n1\r\nm \r\n1\r\n​\r\n →2m \r\n1\r\n​\r\n ) e a distância também é dobrada (\r\n𝑟\r\n→\r\n2\r\n𝑟\r\nr→2r), a nova força gravitacional será:\r\n\r\n𝐹\r\n′\r\n=\r\n𝐺\r\n(\r\n2\r\n𝑚\r\n1\r\n)\r\n𝑚\r\n2\r\n(\r\n2\r\n𝑟\r\n)\r\n2\r\n=\r\n2\r\n𝐺\r\n𝑚\r\n1\r\n𝑚\r\n2\r\n4\r\n𝑟\r\n2\r\n=\r\n1\r\n2\r\n⋅\r\n𝐹\r\nF \r\n′\r\n = \r\n(2r) \r\n2\r\n \r\nG(2m \r\n1\r\n​\r\n )m \r\n2\r\n​\r\n \r\n​\r\n = \r\n4r \r\n2\r\n \r\n2Gm \r\n1\r\n​\r\n m \r\n2\r\n​\r\n \r\n​\r\n = \r\n2\r\n1\r\n​\r\n ⋅F\r\nOu seja, a força será reduzida a um quarto do valor original.', 'Gravitação Universal'),
(66, 'Qual é a condição de equilíbrio de um corpo em repouso sob a ação de forças?', 'Para que um corpo esteja em equilíbrio estático, a soma vetorial das forças que atuam sobre ele deve ser igual a zero. Isso é expresso pela condição:\r\n\r\n∑\r\n𝐹\r\n⃗\r\n=\r\n0\r\n∑ \r\nF\r\n =0\r\nAlém disso, o corpo também estará em equilíbrio se a soma dos momentos (ou torques) em torno de qualquer ponto for igual a zero. Portanto, o corpo deve satisfazer tanto a condição de equilíbrio de forças quanto a de momentos.', 'Estática'),
(67, 'Qual é a condição de equilíbrio de um corpo em repouso sob a ação de forças?', 'Para que um corpo esteja em equilíbrio estático, a soma vetorial das forças que atuam sobre ele deve ser igual a zero. Isso é expresso pela condição:\r\n\r\n∑\r\n𝐹\r\n⃗\r\n=\r\n0\r\n∑ \r\nF\r\n =0\r\nAlém disso, o corpo também estará em equilíbrio se a soma dos momentos (ou torques) em torno de qualquer ponto for igual a zero. Portanto, o corpo deve satisfazer tanto a condição de equilíbrio de forças quanto a de momentos.', 'Estática'),
(68, 'Qual é a condição de equilíbrio de um corpo em repouso sob a ação de forças?', 'Para que um corpo esteja em equilíbrio estático, a soma vetorial das forças que atuam sobre ele deve ser igual a zero. Isso é expresso pela condição:\r\n\r\n∑\r\n𝐹\r\n⃗\r\n=\r\n0\r\n∑ \r\nF\r\n =0\r\nAlém disso, o corpo também estará em equilíbrio se a soma dos momentos (ou torques) em torno de qualquer ponto for igual a zero. Portanto, o corpo deve satisfazer tanto a condição de equilíbrio de forças quanto a de momentos.', 'Estática'),
(69, 'Qual é a condição de equilíbrio de um corpo em repouso sob a ação de forças?', 'Para que um corpo esteja em equilíbrio estático, a soma vetorial das forças que atuam sobre ele deve ser igual a zero. Isso é expresso pela condição:\r\n\r\n∑\r\n𝐹\r\n⃗\r\n=\r\n0\r\n∑ \r\nF\r\n =0\r\nAlém disso, o corpo também estará em equilíbrio se a soma dos momentos (ou torques) em torno de qualquer ponto for igual a zero. Portanto, o corpo deve satisfazer tanto a condição de equilíbrio de forças quanto a de momentos.', 'Estática'),
(70, 'Qual é o princípio fundamental da hidrostática que relaciona a pressão em um fluido com sua profundidade?', 'A pressão em um fluido é diretamente proporcional à profundidade. Quanto maior a profundidade, maior será a pressão exercida pelo fluido. Isso pode ser descrito pela fórmula:\r\n\r\n𝑃\r\n=\r\n𝑃\r\n0\r\n+\r\n𝜌\r\n𝑔\r\nℎ\r\nP=P \r\n0\r\n​\r\n +ρgh\r\nonde \r\n𝑃\r\nP é a pressão em um ponto a uma profundidade \r\nℎ\r\nh, \r\n𝑃\r\n0\r\nP \r\n0\r\n​\r\n  é a pressão atmosférica na superfície, \r\n𝜌\r\nρ é a densidade do fluido, \r\n𝑔\r\ng é a aceleração da gravidade e \r\nℎ\r\nh é a profundidade do ponto.', 'Hidrostática'),
(71, 'Qual é o princípio fundamental da hidrostática que relaciona a pressão em um fluido com sua profundidade?', 'A pressão em um fluido é diretamente proporcional à profundidade. Quanto maior a profundidade, maior será a pressão exercida pelo fluido. Isso pode ser descrito pela fórmula:\r\n\r\n𝑃\r\n=\r\n𝑃\r\n0\r\n+\r\n𝜌\r\n𝑔\r\nℎ\r\nP=P \r\n0\r\n​\r\n +ρgh\r\nonde \r\n𝑃\r\nP é a pressão em um ponto a uma profundidade \r\nℎ\r\nh, \r\n𝑃\r\n0\r\nP \r\n0\r\n​\r\n  é a pressão atmosférica na superfície, \r\n𝜌\r\nρ é a densidade do fluido, \r\n𝑔\r\ng é a aceleração da gravidade e \r\nℎ\r\nh é a profundidade do ponto.', 'Hidrostática'),
(72, 'Qual é o princípio fundamental da hidrostática que relaciona a pressão em um fluido com sua profundidade?', 'A pressão em um fluido é diretamente proporcional à profundidade. Quanto maior a profundidade, maior será a pressão exercida pelo fluido. Isso pode ser descrito pela fórmula:\r\n\r\n𝑃\r\n=\r\n𝑃\r\n0\r\n+\r\n𝜌\r\n𝑔\r\nℎ\r\nP=P \r\n0\r\n​\r\n +ρgh\r\nonde \r\n𝑃\r\nP é a pressão em um ponto a uma profundidade \r\nℎ\r\nh, \r\n𝑃\r\n0\r\nP \r\n0\r\n​\r\n  é a pressão atmosférica na superfície, \r\n𝜌\r\nρ é a densidade do fluido, \r\n𝑔\r\ng é a aceleração da gravidade e \r\nℎ\r\nh é a profundidade do ponto.', 'Hidrostática'),
(73, 'Qual é o princípio fundamental da hidrostática que relaciona a pressão em um fluido com sua profundidade?', 'A pressão em um fluido é diretamente proporcional à profundidade. Quanto maior a profundidade, maior será a pressão exercida pelo fluido. Isso pode ser descrito pela fórmula:\r\n\r\n𝑃\r\n=\r\n𝑃\r\n0\r\n+\r\n𝜌\r\n𝑔\r\nℎ\r\nP=P \r\n0\r\n​\r\n +ρgh\r\nonde \r\n𝑃\r\nP é a pressão em um ponto a uma profundidade \r\nℎ\r\nh, \r\n𝑃\r\n0\r\nP \r\n0\r\n​\r\n  é a pressão atmosférica na superfície, \r\n𝜌\r\nρ é a densidade do fluido, \r\n𝑔\r\ng é a aceleração da gravidade e \r\nℎ\r\nh é a profundidade do ponto.', 'Hidrostática'),
(74, 'Quando um fluido está em movimento laminar, a velocidade de fluxo nas camadas mais próximas da parede do tubo é menor em comparação com a velocidade no centro do tubo. Qual é o nome dado a esse tipo de fluxo?', 'O fluxo laminar ocorre quando as camadas de fluido se movem de maneira suave e ordenada, com a velocidade sendo maior no centro do tubo e diminuindo conforme se aproxima das paredes. Esse tipo de fluxo é característico de fluidos que se movem a velocidades relativamente baixas e com viscosidade alta, como o óleo.', 'Hidrodinâmica'),
(75, 'Quando um fluido está em movimento laminar, a velocidade de fluxo nas camadas mais próximas da parede do tubo é menor em comparação com a velocidade no centro do tubo. Qual é o nome dado a esse tipo de fluxo?', 'O fluxo laminar ocorre quando as camadas de fluido se movem de maneira suave e ordenada, com a velocidade sendo maior no centro do tubo e diminuindo conforme se aproxima das paredes. Esse tipo de fluxo é característico de fluidos que se movem a velocidades relativamente baixas e com viscosidade alta, como o óleo.', 'Hidrodinâmica'),
(76, 'Quando um fluido está em movimento laminar, a velocidade de fluxo nas camadas mais próximas da parede do tubo é menor em comparação com a velocidade no centro do tubo. Qual é o nome dado a esse tipo de fluxo?', 'O fluxo laminar ocorre quando as camadas de fluido se movem de maneira suave e ordenada, com a velocidade sendo maior no centro do tubo e diminuindo conforme se aproxima das paredes. Esse tipo de fluxo é característico de fluidos que se movem a velocidades relativamente baixas e com viscosidade alta, como o óleo.', 'Hidrodinâmica'),
(77, 'Quando um fluido está em movimento laminar, a velocidade de fluxo nas camadas mais próximas da parede do tubo é menor em comparação com a velocidade no centro do tubo. Qual é o nome dado a esse tipo de fluxo?', 'O fluxo laminar ocorre quando as camadas de fluido se movem de maneira suave e ordenada, com a velocidade sendo maior no centro do tubo e diminuindo conforme se aproxima das paredes. Esse tipo de fluxo é característico de fluidos que se movem a velocidades relativamente baixas e com viscosidade alta, como o óleo.', 'Hidrodinâmica'),
(78, 'Quando um fluido está em movimento laminar, a velocidade de fluxo nas camadas mais próximas da parede do tubo é menor em comparação com a velocidade no centro do tubo. Qual é o nome dado a esse tipo de fluxo?', 'O fluxo laminar ocorre quando as camadas de fluido se movem de maneira suave e ordenada, com a velocidade sendo maior no centro do tubo e diminuindo conforme se aproxima das paredes. Esse tipo de fluxo é característico de fluidos que se movem a velocidades relativamente baixas e com viscosidade alta, como o óleo.', 'Estática');

-- --------------------------------------------------------

--
-- Estrutura para tabela `questoes_nivel2`
--

CREATE TABLE `questoes_nivel2` (
  `id` int(11) NOT NULL,
  `enunciado` text NOT NULL,
  `explicacao` text DEFAULT NULL,
  `materia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `questoes_nivel2`
--

INSERT INTO `questoes_nivel2` (`id`, `enunciado`, `explicacao`, `materia`) VALUES
(1, 'Qual é a fórmula para calcular a energia cinética de um objeto?', 'A fórmula para calcular a energia cinética (\r\n𝐸\r\n𝑘\r\nE \r\nk\r\n​\r\n ) é \r\n1\r\n2\r\n𝑚\r\n𝑣\r\n2\r\n2\r\n1\r\n​\r\n mv \r\n2\r\n , onde \r\n𝑚\r\nm é a massa do objeto e \r\n𝑣\r\nv é a sua velocidade.', NULL),
(2, 'Qual é a fórmula para calcular a energia cinética de um objeto?', 'A fórmula para calcular a energia cinética (\r\n𝐸\r\n𝑘\r\nE \r\nk\r\n​\r\n ) é \r\n1\r\n2\r\n𝑚\r\n𝑣\r\n2\r\n2\r\n1\r\n​\r\n mv \r\n2\r\n , onde \r\n𝑚\r\nm é a massa do objeto e \r\n𝑣\r\nv é a sua velocidade.', NULL),
(3, 'Um carro parte do repouso e acelera uniformemente a 2 m/s². Qual é a velocidade do carro após 5 segundos?', 'A fórmula da velocidade para um movimento uniformemente acelerado é \r\n𝑣\r\n=\r\n𝑣\r\n0\r\n+\r\n𝑎\r\n⋅\r\n𝑡\r\nv=v \r\n0\r\n​\r\n +a⋅t. Como o carro parte do repouso, a velocidade inicial (\r\n𝑣\r\n0\r\nv \r\n0\r\n​\r\n ) é 0. A aceleração (\r\n𝑎\r\na) é 2 m/s², e o tempo (\r\n𝑡\r\nt) é 5 segundos.\r\nCálculo:\r\n𝑣\r\n=\r\n0\r\n+\r\n2\r\n⋅\r\n5\r\n=\r\n10\r\n \r\nm/s\r\nv=0+2⋅5=10m/s.', NULL),
(4, 'fsdfsfsfs', 'cbrgregdfg', 'Introdução à Física');

-- --------------------------------------------------------

--
-- Estrutura para tabela `questoes_nivel3`
--

CREATE TABLE `questoes_nivel3` (
  `id` int(11) NOT NULL,
  `enunciado` text NOT NULL,
  `explicacao` text DEFAULT NULL,
  `materia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `questoes_nivel3`
--

INSERT INTO `questoes_nivel3` (`id`, `enunciado`, `explicacao`, `materia`) VALUES
(1, 'Qual é a relação entre a força centrípeta e a velocidade de um objeto em movimento circular?', 'A força centrípeta é dada por \r\n𝐹\r\n𝑐\r\n=\r\n𝑚\r\n𝑣\r\n2\r\n𝑟\r\nF \r\nc\r\n​\r\n = \r\nr\r\nmv \r\n2\r\n \r\n​\r\n , onde \r\n𝑚\r\nm é a massa do objeto, \r\n𝑣\r\nv é a velocidade e \r\n𝑟\r\nr é o raio do movimento circular. Isso mostra que a força centrípeta é diretamente proporcional ao quadrado da velocidade e inversamente proporcional ao raio.', NULL),
(2, 'Um projétil é disparado com velocidade de 30 m/s a um ângulo de 60° em relação ao solo. Desconsiderando a resistência do ar, qual é o alcance horizontal máximo do projétil? (Considere \r\n𝑔\r\n=\r\n9\r\n,\r\n8\r\n \r\nm/s²\r\ng=9,8m/s²).', 'O alcance máximo de um projétil é dado pela fórmula \r\n𝐴\r\n=\r\n𝑣\r\n0\r\n2\r\n⋅\r\nsin\r\n⁡\r\n(\r\n2\r\n𝜃\r\n)\r\n𝑔\r\nA= \r\ng\r\nv \r\n0\r\n2\r\n​\r\n ⋅sin(2θ)\r\n​\r\n , onde \r\n𝑣\r\n0\r\nv \r\n0\r\n​\r\n  é a velocidade inicial, \r\n𝜃\r\nθ é o ângulo de disparo, e \r\n𝑔\r\ng é a aceleração da gravidade.\r\nSubstituindo os valores:\r\n𝐴\r\n=\r\n3\r\n0\r\n2\r\n⋅\r\nsin\r\n⁡\r\n(\r\n120\r\n°\r\n)\r\n9\r\n,\r\n8\r\n=\r\n900\r\n⋅\r\n0\r\n,\r\n866\r\n9\r\n,\r\n8\r\n≈\r\n79\r\n,\r\n5\r\n \r\nm\r\nA= \r\n9,8\r\n30 \r\n2\r\n ⋅sin(120°)\r\n​\r\n = \r\n9,8\r\n900⋅0,866\r\n​\r\n ≈79,5m.', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessoes`
--

CREATE TABLE `sessoes` (
  `id` bigint(20) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `token_sessao` varchar(255) DEFAULT NULL,
  `data_inicio` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_fim` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sessoes`
--

INSERT INTO `sessoes` (`id`, `id_usuario`, `token_sessao`, `data_inicio`, `data_fim`, `ip_address`, `user_agent`) VALUES
(17, 8, 'bc20c8fa307255d980eefedda2257476', '2024-09-03 14:05:25', '2024-09-04 10:50:31', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36'),
(18, 8, '3f7d40784a92fad040088d546f8e77e8', '2024-09-04 10:51:16', '2024-09-04 14:32:47', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36'),
(19, 9, 'df7204f74277e6037f4aad50a3dfd280', '2024-09-05 11:02:25', '2024-09-05 11:02:35', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36'),
(20, 8, 'eec602eccc0bde47cfcadfc410162600', '2024-09-05 11:02:47', '2024-09-05 13:39:41', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36'),
(21, 8, '14796cae0733002c25e689bbbf1c22d2', '2024-09-10 11:00:07', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36'),
(22, 8, '8a2931019e34937a61a8c9054bce5435', '2024-09-16 10:53:51', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36'),
(23, 9, '2293097d7687b9ddbdb10721eae20f30', '2024-09-16 13:03:38', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36'),
(24, 8, '17ffe2090dcc9d33b387e64ed336cf78', '2024-09-17 10:48:41', '2024-09-17 12:18:47', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36'),
(25, 8, '3528fed90a140ab8014dbebfda5dfeaf', '2024-09-17 12:22:10', '2024-09-17 12:24:10', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36'),
(26, 8, 'ac068959010d59ce724019e994e8167e', '2024-09-17 12:33:09', '2024-09-17 13:37:36', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36'),
(27, 8, 'fae1ead1ec6064830f730e2893d219df', '2024-09-17 13:54:38', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36'),
(28, 8, 'f7567ca645b41faa769c4bdfe8794e98', '2024-09-18 11:00:28', '2024-09-18 11:23:08', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36'),
(29, 10, '374dcd2476238ce6581252cd19b0473e', '2024-09-18 11:23:24', '2024-09-18 13:00:14', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36'),
(30, 8, '86e9690ef568dd9b896a13f9cbfaffb5', '2024-09-18 13:00:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36'),
(31, 8, 'b0dba669edca5b17e7489205be237817', '2024-09-23 11:51:31', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(32, 8, 'ded916fa02761a037ce67d6a5a963687', '2024-09-23 15:09:44', '2024-09-24 11:43:12', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(33, 10, '9682d3356c5c4003abdb0191f08d9e82', '2024-09-24 11:43:28', '2024-09-24 11:43:52', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(34, 9, '62e6b908218c5f390e16abbf12a95d42', '2024-09-24 11:44:03', '2024-09-24 11:44:19', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(35, 8, 'b44d83ef32c08cfa6da46ef81be17584', '2024-09-24 11:46:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(36, 8, 'e620371754ec2565167df0795b9c34fe', '2024-10-30 10:56:32', '2024-10-30 11:11:49', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(37, 8, 'e406bf7e46717c8f6cfaeb6710384888', '2024-10-30 11:11:58', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(38, 8, 'd3095a6f17706f71d6a38730dabbb7b2', '2024-11-04 10:56:51', '2024-11-04 11:32:34', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(39, 8, '8319f9b30f778f6c7e8fb95191c992c1', '2024-11-04 11:32:57', '2024-11-04 14:22:27', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(40, 8, 'd64ae7b1a046acb7cfb4aa980c8f4fd8', '2024-11-04 14:23:03', '2024-11-04 14:24:06', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(41, 8, 'db89547ec9f1cd2becfbd220732dda06', '2024-11-04 14:25:09', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(42, 10, '3260c1e9f328d43faaa06ccf909fd9ee', '2024-11-05 10:52:16', '2024-11-05 10:59:13', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(43, 9, '64b4afc698fc31a75d58531b6f9e9497', '2024-11-05 11:00:50', '2024-11-05 11:11:26', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(44, 8, '535396a17c88a10f7be73b9959b43b27', '2024-11-05 11:11:50', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(45, 8, 'd36f337c9f6b1d28ba26d8f8a6ba0d5f', '2024-11-05 12:20:03', '2024-11-05 14:10:42', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(46, 9, '1b2cd1a29985fe3ffc014383fefc50fd', '2024-11-05 14:11:47', '2024-11-05 14:13:08', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(47, 8, '2ee17312c62e97e3534abfd1d2ea96b5', '2024-11-05 14:13:20', '2024-11-05 15:01:25', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(48, 8, '5f5d2b2ab4a9380e7ead86cb62f3cea9', '2024-11-05 15:02:02', '2024-11-06 10:57:13', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(49, 8, '1b4b1b3d89749da1c2aed819e6f1916f', '2024-11-06 10:58:02', '2024-11-07 12:49:15', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(50, 8, 'dff38c1372cca412c65083d62ee94466', '2024-11-07 12:49:56', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(51, 8, 'c5db21114142a4c6af7096636f522090', '2024-11-11 12:24:50', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(52, 8, '9fbf948f8d3dff75a7a8480bb84a504a', '2024-11-21 22:34:27', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36'),
(53, 9, 'a6287f190dd202cda3a8aec4556c581f', '2024-11-22 13:50:39', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36'),
(54, 8, '70df979125ab2486e1e8b3453ce587ce', '2024-11-23 22:32:55', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36'),
(55, 8, '3dafb35f1128aa4ac7c4d960fb870b7c', '2024-11-25 10:57:13', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(56, 8, 'bf06636832076f008ae73cd7068a539b', '2024-11-25 11:59:55', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.95.3 Chrome/128.0.6613.186 Electron/32.2.1 Safari/537.36'),
(57, 8, '3158e13dff7cf9d4b56bfdd74b4b2452', '2024-11-25 12:00:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.95.3 Chrome/128.0.6613.186 Electron/32.2.1 Safari/537.36');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tentativas_concursos`
--

CREATE TABLE `tentativas_concursos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_questao` int(11) NOT NULL,
  `resposta` int(11) NOT NULL,
  `data_tentativa` datetime DEFAULT current_timestamp(),
  `correta` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tentativas_concursos`
--

INSERT INTO `tentativas_concursos` (`id`, `id_usuario`, `id_questao`, `resposta`, `data_tentativa`, `correta`) VALUES
(1, 8, 1, 0, '2024-11-25 12:36:52', 1),
(2, 8, 1, 0, '2024-11-25 08:38:05', 1),
(3, 8, 1, 0, '2024-11-25 08:38:08', 1),
(4, 8, 2, 0, '2024-11-25 08:44:40', 1),
(5, 8, 2, 0, '2024-11-25 08:47:12', 1),
(6, 8, 3, 360, '2024-11-25 08:48:52', 1),
(7, 8, 3, 120, '2024-11-25 08:50:27', 1),
(8, 8, 3, 450, '2024-11-25 08:50:37', 1),
(9, 8, 3, 450, '2024-11-25 08:51:18', 1),
(10, 8, 3, 900, '2024-11-25 08:51:22', 1),
(11, 8, 3, 900, '2024-11-25 08:53:47', 0),
(12, 8, 3, 900, '2024-11-25 08:53:53', 0),
(13, 8, 3, 11, '2024-11-25 08:55:54', 1),
(14, 8, 3, 12, '2024-11-25 08:55:57', 0),
(15, 8, 3, 10, '2024-11-25 08:56:15', 0),
(16, 8, 3, 360, '2024-11-25 08:58:14', 0),
(17, 8, 3, 450, '2024-11-25 08:58:25', 1),
(18, 8, 1, 0, '2024-11-25 09:02:57', 0),
(19, 8, 1, 0, '2024-11-25 09:03:01', 1),
(20, 8, 3, 360, '2024-11-25 09:05:24', 0),
(21, 8, 3, 450, '2024-11-25 09:05:30', 1),
(22, 8, 3, 450, '2024-11-25 09:09:48', 1),
(23, 8, 3, 360, '2024-11-25 09:09:52', 0),
(24, 8, 3, 450, '2024-11-25 09:50:17', 1),
(25, 8, 3, 450, '2024-11-25 09:50:50', 1),
(26, 8, 3, 450, '2024-11-25 09:53:47', 1),
(27, 8, 3, 900, '2024-11-25 09:53:50', 0),
(28, 8, 3, 450, '2024-11-25 10:06:53', 1),
(29, 8, 7, 0, '2024-11-25 10:18:40', 1),
(30, 8, 7, 0, '2024-11-25 10:18:46', 0),
(31, 8, 7, 0, '2024-11-25 10:41:46', 0),
(32, 8, 7, 0, '2024-11-25 10:41:50', 1),
(33, 8, 1, 0, '2024-11-25 10:54:00', 1),
(34, 8, 3, 360, '2024-11-25 10:54:07', 0),
(35, 8, 3, 450, '2024-11-25 10:54:10', 1),
(36, 8, 3, 120, '2024-11-25 10:58:07', 0),
(37, 8, 3, 450, '2024-11-25 10:58:14', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tentativas_usuarios`
--

CREATE TABLE `tentativas_usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_questao` int(11) NOT NULL,
  `id_alternativa` int(11) NOT NULL,
  `correta` tinyint(1) NOT NULL,
  `nivel` int(11) NOT NULL,
  `data_tentativa` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tentativas_usuarios`
--

INSERT INTO `tentativas_usuarios` (`id`, `id_usuario`, `id_questao`, `id_alternativa`, `correta`, `nivel`, `data_tentativa`) VALUES
(1, 8, 2, 22, 1, 0, '2024-09-16 08:27:51'),
(2, 8, 2, 25, 0, 0, '2024-09-16 08:28:01'),
(3, 8, 2, 22, 1, 0, '2024-09-16 08:28:08'),
(4, 8, 2, 27, 0, 0, '2024-09-16 08:28:19'),
(5, 8, 2, 26, 0, 0, '2024-09-16 08:32:03'),
(6, 8, 2, 22, 1, 0, '2024-09-16 08:32:06'),
(7, 8, 2, 22, 1, 0, '2024-09-16 08:37:23'),
(8, 8, 2, 22, 1, 0, '2024-09-16 08:42:17'),
(9, 8, 2, 22, 1, 0, '2024-09-16 08:42:19'),
(10, 8, 2, 26, 0, 0, '2024-09-16 08:44:39'),
(11, 8, 3, 29, 0, 0, '2024-09-16 08:49:53'),
(12, 8, 3, 29, 0, 0, '2024-09-16 08:50:03'),
(13, 8, 3, 28, 0, 0, '2024-09-16 08:50:11'),
(14, 8, 3, 31, 0, 0, '2024-09-16 08:50:16'),
(15, 8, 3, 30, 1, 0, '2024-09-16 08:50:25'),
(16, 9, 2, 23, 0, 1, '2024-09-16 10:03:54'),
(17, 9, 2, 23, 0, 1, '2024-09-16 10:03:55'),
(18, 9, 2, 22, 1, 1, '2024-09-16 10:03:58'),
(19, 9, 3, 30, 1, 2, '2024-09-16 10:20:19'),
(20, 8, 2, 23, 0, 1, '2024-09-17 09:12:33'),
(21, 8, 2, 22, 1, 1, '2024-09-17 09:12:36'),
(22, 8, 2, 26, 0, 1, '2024-09-17 09:12:39'),
(23, 8, 3, 29, 0, 1, '2024-09-17 09:13:15'),
(24, 8, 4, 35, 0, 1, '2024-09-17 09:13:18'),
(25, 8, 2, 22, 1, 1, '2024-09-17 09:22:31'),
(26, 8, 5, 37, 1, 1, '2024-09-17 09:22:48'),
(27, 8, 5, 39, 0, 1, '2024-09-17 09:22:51'),
(28, 8, 13, 78, 0, 1, '2024-09-17 09:35:37'),
(29, 8, 13, 79, 1, 1, '2024-09-17 09:35:53'),
(30, 10, 2, 23, 0, 1, '2024-09-18 08:23:39'),
(31, 8, 3, 30, 1, 1, '2024-09-24 09:07:01'),
(32, 8, 2, 22, 1, 1, '2024-11-05 09:40:53'),
(33, 8, 2, 22, 1, 1, '2024-11-05 09:45:16'),
(34, 8, 2, 22, 1, 1, '2024-11-05 09:48:54'),
(35, 8, 2, 25, 0, 1, '2024-11-05 09:48:58'),
(36, 8, 2, 22, 1, 1, '2024-11-05 09:50:51'),
(37, 8, 12, 75, 0, 1, '2024-11-05 09:51:03'),
(38, 8, 2, 22, 1, 1, '2024-11-05 09:51:09'),
(39, 8, 2, 22, 1, 1, '2024-11-05 09:55:39'),
(40, 8, 2, 23, 0, 1, '2024-11-05 09:55:52'),
(41, 8, 2, 22, 1, 1, '2024-11-05 09:55:55'),
(42, 8, 2, 23, 0, 1, '2024-11-05 10:00:49'),
(43, 8, 2, 22, 1, 1, '2024-11-05 10:00:52'),
(44, 8, 3, 28, 0, 1, '2024-11-05 10:00:57'),
(45, 8, 3, 29, 0, 1, '2024-11-05 10:00:59'),
(46, 8, 3, 30, 1, 1, '2024-11-05 10:01:03'),
(47, 8, 2, 22, 1, 1, '2024-11-05 10:03:02'),
(48, 8, 2, 25, 0, 1, '2024-11-05 10:03:05'),
(49, 8, 2, 22, 1, 1, '2024-11-05 10:05:11'),
(50, 8, 2, 23, 0, 1, '2024-11-05 10:05:13'),
(51, 8, 2, 22, 1, 1, '2024-11-05 10:06:22'),
(52, 8, 2, 22, 1, 1, '2024-11-05 10:06:53'),
(53, 8, 2, 22, 1, 1, '2024-11-05 10:10:02'),
(54, 8, 2, 25, 0, 1, '2024-11-05 10:10:29'),
(55, 8, 2, 22, 1, 1, '2024-11-05 10:12:24'),
(56, 8, 2, 23, 0, 1, '2024-11-05 10:12:28'),
(57, 8, 2, 22, 1, 1, '2024-11-05 10:12:33'),
(58, 8, 2, 22, 1, 1, '2024-11-05 10:13:37'),
(59, 8, 2, 23, 0, 1, '2024-11-05 10:15:03'),
(60, 8, 2, 22, 1, 1, '2024-11-05 10:15:10'),
(61, 8, 2, 23, 0, 1, '2024-11-05 10:17:26'),
(62, 8, 2, 22, 1, 1, '2024-11-05 10:20:01'),
(63, 8, 2, 24, 0, 1, '2024-11-05 10:20:09'),
(64, 8, 2, 23, 0, 1, '2024-11-05 10:22:01'),
(65, 8, 2, 22, 1, 1, '2024-11-05 10:22:05'),
(66, 8, 2, 22, 1, 1, '2024-11-05 10:23:19'),
(67, 8, 2, 24, 0, 1, '2024-11-05 10:23:39'),
(68, 8, 2, 26, 0, 1, '2024-11-05 10:44:27'),
(69, 8, 2, 22, 1, 1, '2024-11-05 10:44:31'),
(70, 8, 2, 24, 0, 1, '2024-11-05 11:07:39'),
(71, 8, 2, 22, 1, 1, '2024-11-05 11:07:41'),
(72, 9, 2, 22, 1, 1, '2024-11-05 11:12:08'),
(73, 9, 2, 23, 0, 1, '2024-11-05 11:12:12'),
(74, 8, 18, 97, 1, 1, '2024-11-06 09:56:31'),
(75, 8, 17, 92, 0, 1, '2024-11-06 09:56:37'),
(76, 8, 17, 94, 0, 1, '2024-11-06 09:56:39'),
(77, 8, 17, 93, 1, 1, '2024-11-06 09:56:41'),
(78, 8, 33, 157, 0, 1, '2024-11-06 10:13:39'),
(79, 8, 25, 126, 0, 1, '2024-11-06 10:14:09'),
(80, 8, 18, 98, 0, 1, '2024-11-06 10:17:42'),
(81, 8, 18, 97, 1, 1, '2024-11-06 10:20:00'),
(82, 8, 17, 93, 1, 1, '2024-11-06 10:20:05'),
(83, 8, 18, 96, 0, 1, '2024-11-06 10:22:27'),
(84, 8, 18, 98, 0, 1, '2024-11-06 10:55:47'),
(85, 8, 18, 97, 1, 1, '2024-11-06 10:55:55'),
(86, 8, 25, 125, 1, 1, '2024-11-06 10:56:00'),
(87, 8, 17, 94, 0, 1, '2024-11-06 10:56:22'),
(88, 8, 25, 124, 0, 1, '2024-11-06 10:56:44'),
(89, 8, 18, 97, 1, 1, '2024-11-06 10:56:50'),
(90, 8, 18, 98, 0, 1, '2024-11-07 07:26:17'),
(91, 8, 18, 96, 0, 1, '2024-11-07 07:36:43'),
(92, 8, 18, 97, 1, 1, '2024-11-07 07:36:52'),
(93, 8, 18, 97, 1, 1, '2024-11-07 07:38:28'),
(94, 8, 18, 97, 1, 1, '2024-11-07 07:40:39'),
(95, 8, 18, 98, 0, 1, '2024-11-07 07:43:37'),
(96, 8, 18, 97, 1, 1, '2024-11-07 07:51:43'),
(97, 8, 18, 97, 1, 1, '2024-11-07 07:59:08'),
(98, 8, 18, 98, 0, 1, '2024-11-07 08:03:56'),
(99, 8, 18, 97, 1, 1, '2024-11-07 08:30:06'),
(100, 8, 18, 97, 1, 1, '2024-11-07 08:45:12'),
(101, 8, 18, 97, 1, 0, '2024-11-07 08:46:55'),
(102, 8, 18, 98, 0, 0, '2024-11-07 08:48:08'),
(103, 8, 18, 97, 1, 0, '2024-11-07 08:49:27'),
(104, 8, 18, 99, 0, 0, '2024-11-07 08:49:33'),
(105, 8, 18, 97, 1, 0, '2024-11-21 20:01:35'),
(106, 8, 18, 98, 0, 0, '2024-11-21 20:01:38'),
(107, 8, 18, 96, 0, 0, '2024-11-21 20:04:04'),
(108, 8, 18, 97, 1, 0, '2024-11-21 20:04:07'),
(109, 8, 17, 93, 1, 0, '2024-11-21 20:16:39'),
(110, 8, 17, 94, 0, 0, '2024-11-21 20:16:42'),
(111, 8, 25, 124, 0, 0, '2024-11-21 20:20:06'),
(112, 8, 25, 125, 1, 0, '2024-11-21 20:20:08'),
(113, 8, 25, 126, 0, 0, '2024-11-21 20:20:12'),
(114, 8, 25, 127, 0, 0, '2024-11-21 20:20:14'),
(115, 8, 26, 128, 1, 0, '2024-11-21 20:21:14'),
(116, 8, 26, 130, 0, 0, '2024-11-21 20:21:16'),
(117, 8, 50, 226, 1, 0, '2024-11-21 20:23:47'),
(118, 8, 68, 297, 1, 0, '2024-11-21 20:26:04'),
(119, 8, 68, 298, 0, 0, '2024-11-21 20:26:07'),
(120, 8, 62, 273, 0, 0, '2024-11-21 20:30:24'),
(121, 8, 62, 272, 0, 0, '2024-11-21 20:30:26'),
(122, 8, 62, 274, 1, 0, '2024-11-21 20:30:28'),
(123, 8, 74, 322, 0, 0, '2024-11-21 20:34:01'),
(124, 8, 74, 321, 1, 0, '2024-11-21 20:34:03'),
(125, 8, 70, 307, 0, 0, '2024-11-21 20:35:24'),
(126, 8, 70, 306, 0, 0, '2024-11-21 20:35:25'),
(127, 8, 70, 305, 1, 0, '2024-11-21 20:35:27'),
(128, 8, 58, 257, 0, 0, '2024-11-21 20:36:45'),
(129, 8, 58, 256, 0, 0, '2024-11-21 20:36:47'),
(130, 8, 58, 258, 1, 0, '2024-11-21 20:36:54'),
(131, 8, 60, 266, 1, 0, '2024-11-21 20:38:07'),
(132, 8, 42, 194, 0, 0, '2024-11-21 20:39:31'),
(133, 8, 42, 195, 0, 0, '2024-11-21 20:39:37'),
(134, 8, 42, 193, 1, 0, '2024-11-21 20:39:39'),
(135, 8, 48, 217, 1, 0, '2024-11-21 20:40:39'),
(136, 8, 33, 156, 0, 0, '2024-11-21 20:42:40'),
(137, 8, 33, 158, 1, 0, '2024-11-21 20:42:42'),
(138, 8, 56, 250, 0, 0, '2024-11-21 20:45:00'),
(139, 8, 56, 249, 1, 0, '2024-11-21 20:45:05'),
(140, 9, 17, 93, 1, 0, '2024-11-22 10:50:51'),
(141, 8, 17, 93, 1, 0, '2024-11-25 10:48:02'),
(142, 8, 17, 95, 0, 0, '2024-11-25 10:48:04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `foto` blob DEFAULT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `foto`, `data_criacao`) VALUES
(8, 'Pedro Henrique', 'ph4261009@gmail.com', 'Pedrofts@2005', 0x666f746f5f7573756172696f2f576861747341707020496d61676520323032342d30382d31382061742031392e32372e31312e6a706567, '2024-09-03 13:09:25'),
(9, 'Santinha', 'gabriel@gmail.com', 'Gabriel@2005', 0x666f746f5f7573756172696f2f6761627269656c2e6a706567, '2024-09-03 13:20:18'),
(10, 'Aristides', 'aristides@gmail.com', '@Aristides2005', 0x666f746f5f7573756172696f2f6172697374696465732e6a706567, '2024-09-17 12:21:13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `assunto` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alternativas`
--
ALTER TABLE `alternativas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questao` (`questao_id`);

--
-- Índices de tabela `alternativas_2`
--
ALTER TABLE `alternativas_2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questao` (`questao_id`);

--
-- Índices de tabela `alternativas_3`
--
ALTER TABLE `alternativas_3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questao` (`questao_id`);

--
-- Índices de tabela `alternativas_concurso`
--
ALTER TABLE `alternativas_concurso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_questao` (`id_questao`);

--
-- Índices de tabela `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atividades_ibfk_1` (`id_usuario`);

--
-- Índices de tabela `atividades_usuarios`
--
ALTER TABLE `atividades_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `questoes`
--
ALTER TABLE `questoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `questoes_nivel1`
--
ALTER TABLE `questoes_nivel1`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `questoes_nivel2`
--
ALTER TABLE `questoes_nivel2`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `questoes_nivel3`
--
ALTER TABLE `questoes_nivel3`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sessoes`
--
ALTER TABLE `sessoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `tentativas_concursos`
--
ALTER TABLE `tentativas_concursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_questao` (`id_questao`);

--
-- Índices de tabela `tentativas_usuarios`
--
ALTER TABLE `tentativas_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alternativas`
--
ALTER TABLE `alternativas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT de tabela `alternativas_2`
--
ALTER TABLE `alternativas_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `alternativas_3`
--
ALTER TABLE `alternativas_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `alternativas_concurso`
--
ALTER TABLE `alternativas_concurso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `atividades`
--
ALTER TABLE `atividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `atividades_usuarios`
--
ALTER TABLE `atividades_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `questoes`
--
ALTER TABLE `questoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `questoes_nivel1`
--
ALTER TABLE `questoes_nivel1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de tabela `questoes_nivel2`
--
ALTER TABLE `questoes_nivel2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `questoes_nivel3`
--
ALTER TABLE `questoes_nivel3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `sessoes`
--
ALTER TABLE `sessoes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de tabela `tentativas_concursos`
--
ALTER TABLE `tentativas_concursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `tentativas_usuarios`
--
ALTER TABLE `tentativas_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `alternativas_concurso`
--
ALTER TABLE `alternativas_concurso`
  ADD CONSTRAINT `alternativas_concurso_ibfk_1` FOREIGN KEY (`id_questao`) REFERENCES `questoes` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `atividades_usuarios`
--
ALTER TABLE `atividades_usuarios`
  ADD CONSTRAINT `atividades_usuarios_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `tentativas_concursos`
--
ALTER TABLE `tentativas_concursos`
  ADD CONSTRAINT `tentativas_concursos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tentativas_concursos_ibfk_2` FOREIGN KEY (`id_questao`) REFERENCES `questoes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
