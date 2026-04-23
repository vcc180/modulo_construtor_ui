-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Abr-2026 às 19:19
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `systemgenerator`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbicons`
--

CREATE TABLE `tbicons` (
  `icons_id` int(11) NOT NULL,
  `icons_nome` text DEFAULT NULL,
  `icons_icon` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmenu`
--

CREATE TABLE `tbmenu` (
  `menu_id` int(11) NOT NULL,
  `menu_projeto_id` int(11) DEFAULT NULL,
  `menu_title` text DEFAULT NULL,
  `menu_nome` text DEFAULT NULL,
  `menu_submenu` tinyint(1) DEFAULT NULL,
  `menu_icon` text DEFAULT NULL,
  `menu_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbmenu`
--

INSERT INTO `tbmenu` (`menu_id`, `menu_projeto_id`, `menu_title`, `menu_nome`, `menu_submenu`, `menu_icon`, `menu_status`) VALUES
(1, 2, 'Perfil de Usuários', 'PERFIL_DE_USUARIOS', 1, '0', 1),
(2, 2, 'Loja', 'LOJA', 1, '0', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmodulos`
--

CREATE TABLE `tbmodulos` (
  `modulos_id` int(11) NOT NULL,
  `modulos_projeto_id` int(11) DEFAULT NULL,
  `modulos_title` text DEFAULT NULL,
  `modulos_modulo` text DEFAULT NULL,
  `modulos_controller` text DEFAULT NULL,
  `modulos_model` text DEFAULT NULL,
  `modulos_table` text DEFAULT NULL,
  `modulos_db_prefixo` text DEFAULT NULL,
  `modulos_primary_key` text DEFAULT NULL,
  `modulos_field_default` text DEFAULT NULL,
  `modulos_field_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbmodulos`
--

INSERT INTO `tbmodulos` (`modulos_id`, `modulos_projeto_id`, `modulos_title`, `modulos_modulo`, `modulos_controller`, `modulos_model`, `modulos_table`, `modulos_db_prefixo`, `modulos_primary_key`, `modulos_field_default`, `modulos_field_status`) VALUES
(3, 2, 'Categoria Jogos', 'categoria_jogos', 'categoria_jogos-controller', 'categoria_jogos-model', 'tbcategoria_jogos', 'categoria_jogos_', 'id', 'nome', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmodulo_campo`
--

CREATE TABLE `tbmodulo_campo` (
  `modulo_campo_id` int(11) NOT NULL,
  `modulo_campo_modulo_id` int(11) DEFAULT NULL,
  `modulo_campo_nome` text DEFAULT NULL,
  `modulo_campo_title` text DEFAULT NULL,
  `modulo_campo_tipo` int(11) DEFAULT NULL,
  `modulo_campo_fk` tinyint(1) DEFAULT NULL,
  `modulo_campo_reference_table` text DEFAULT NULL,
  `modulo_campo_reference_key` text DEFAULT NULL,
  `modulo_campo_reference_option` text DEFAULT NULL,
  `modulo_campo_required` tinyint(1) DEFAULT NULL,
  `modulo_campo_is_search` tinyint(1) DEFAULT NULL,
  `modulo_campo_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbmodulo_campo`
--

INSERT INTO `tbmodulo_campo` (`modulo_campo_id`, `modulo_campo_modulo_id`, `modulo_campo_nome`, `modulo_campo_title`, `modulo_campo_tipo`, `modulo_campo_fk`, `modulo_campo_reference_table`, `modulo_campo_reference_key`, `modulo_campo_reference_option`, `modulo_campo_required`, `modulo_campo_is_search`, `modulo_campo_status`) VALUES
(2, 3, 'nome', 'Nome', 4, 0, '', '', '', 1, 1, 1),
(3, 3, 'categoria', 'Categoria', 4, 0, '', '', '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbprojeto`
--

CREATE TABLE `tbprojeto` (
  `projeto_id` int(11) NOT NULL,
  `projeto_title` text DEFAULT NULL,
  `projeto_name` text DEFAULT NULL,
  `projeto_path` text DEFAULT NULL,
  `projeto_url` text DEFAULT NULL,
  `projeto_db_hostname` text DEFAULT NULL,
  `projeto_db_database` text DEFAULT NULL,
  `projeto_user` text DEFAULT NULL,
  `projeto_password` text DEFAULT NULL,
  `projeto_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbprojeto`
--

INSERT INTO `tbprojeto` (`projeto_id`, `projeto_title`, `projeto_name`, `projeto_path`, `projeto_url`, `projeto_db_hostname`, `projeto_db_database`, `projeto_user`, `projeto_password`, `projeto_status`) VALUES
(2, 'Axis Store', 'axis-store', 'C:\\xampp\\htdocs\\axis-store', 'http://localhost/axis_store', 'localhost', 'axis_store', 'root', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsubmenu`
--

CREATE TABLE `tbsubmenu` (
  `submenu_id` int(11) NOT NULL,
  `submenu_menu_id` int(11) DEFAULT NULL,
  `submenu_nome` text DEFAULT NULL,
  `submenu_title` text DEFAULT NULL,
  `submenu_link` text DEFAULT NULL,
  `submenu_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbsubmenu`
--

INSERT INTO `tbsubmenu` (`submenu_id`, `submenu_menu_id`, `submenu_nome`, `submenu_title`, `submenu_link`, `submenu_status`) VALUES
(1, 2, 'CATEGORIA_JOGOS', 'Categoria_Jogos', 'categoria-jogos', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipo_campo`
--

CREATE TABLE `tbtipo_campo` (
  `tipo_campo_id` int(11) NOT NULL,
  `tipo_campo_nome` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbtipo_campo`
--

INSERT INTO `tbtipo_campo` (`tipo_campo_id`, `tipo_campo_nome`) VALUES
(1, 'int'),
(2, 'date'),
(3, 'boolean'),
(4, 'text'),
(5, 'float'),
(6, 'time'),
(7, 'decimal'),
(8, 'longtext');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbuser`
--

CREATE TABLE `tbuser` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` longtext NOT NULL,
  `user_password` longtext NOT NULL,
  `user_email` longtext NOT NULL,
  `user_img` longtext NOT NULL,
  `user_permissions` longtext NOT NULL,
  `fk_user_type_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `user_ativo` tinyint(1) NOT NULL,
  `user_session_id` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbuser`
--

INSERT INTO `tbuser` (`user_id`, `user_name`, `user_password`, `user_email`, `user_img`, `user_permissions`, `fk_user_type_id`, `fk_user_id`, `user_ativo`, `user_session_id`) VALUES
(1, 'Administrador', '0a71a5917c8361f079d77a26b0619fe4', 'vcc180@gmail.com', 'users/default-user.png', 'a:3:{i:0;s:3:\"any\";s:4:\"MENU\";a:7:{s:4:\"HOME\";s:4:\"HOME\";s:8:\"PROJETOS\";a:1:{s:8:\"PROJETOS\";s:8:\"PROJETOS\";}s:7:\"MODULOS\";a:3:{s:7:\"MODULOS\";s:7:\"MODULOS\";s:12:\"MODULO_CAMPO\";s:12:\"MODULO_CAMPO\";s:10:\"TIPO_CAMPO\";s:10:\"TIPO_CAMPO\";}s:4:\"MENU\";a:2:{s:4:\"MENU\";s:4:\"MENU\";s:7:\"SUBMENU\";s:7:\"SUBMENU\";}s:5:\"ICONS\";a:1:{s:5:\"ICONS\";s:5:\"ICONS\";}s:13:\"CONFIGURACOES\";a:2:{s:14:\"USUARIO_SISTEM\";s:14:\"USUARIO_SISTEM\";s:12:\"TIPO_USUARIO\";s:12:\"TIPO_USUARIO\";}s:6:\"LOGOUT\";s:6:\"LOGOUT\";}s:10:\"PERMISSOES\";a:10:{i:0;s:3:\"any\";i:1;s:8:\"PROJETOS\";i:2;s:7:\"MODULOS\";i:3;s:12:\"MODULO_CAMPO\";i:4;s:10:\"TIPO_CAMPO\";i:5;s:4:\"MENU\";i:6;s:7:\"SUBMENU\";i:7;s:5:\"ICONS\";i:8;s:14:\"USUARIO_SISTEM\";i:9;s:12:\"TIPO_USUARIO\";}}', 1, 1, 1, 'c5fv970k5sogbh6f7qt1putcij');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbuser_type`
--

CREATE TABLE `tbuser_type` (
  `user_type_id` bigint(20) UNSIGNED NOT NULL,
  `user_type_descricao` mediumtext NOT NULL,
  `user_type_permicoes` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbuser_type`
--

INSERT INTO `tbuser_type` (`user_type_id`, `user_type_descricao`, `user_type_permicoes`) VALUES
(1, 'Super Usuário', 'a:9:{s:4:\"SITE\";a:6:{i:0;s:7:\"PUBLISH\";i:1;s:19:\"GERENCIADOR_ARQUIVO\";i:2;s:11:\"COMUNICADOS\";i:3;s:13:\"GALERIA_FOTOS\";i:4;s:10:\"QUEM_SOMOS\";i:5;s:6:\"BANNER\";}s:9:\"ACADEMICO\";a:7:{i:0;s:6:\"ALUNOS\";i:1;s:11:\"RESPONSAVEL\";i:2;s:11:\"PROFESSORES\";i:3;s:20:\"PROFESSOR_DISCIPLINA\";i:4;s:15:\"DOCUMENTO_ALUNO\";i:5;s:18:\"CALENDARIO_ESCOLAR\";i:6;s:7:\"HORARIO\";}s:10:\"SECRETARIA\";a:1:{i:0;s:13:\"ARQUIVO_MORTO\";}s:9:\"ESTRUTURA\";a:10:{i:0;s:10:\"ANO_LETIVO\";i:1;s:8:\"SEMESTRE\";i:2;s:14:\"UNIDADE_LETIVA\";i:3;s:9:\"AVALIACAO\";i:4;s:10:\"DISCIPLINA\";i:5;s:6:\"MODULO\";i:6;s:14:\"PERIODO_ENSINO\";i:7;s:5:\"SERIE\";i:8;s:11:\"TIPO_ENSINO\";i:9;s:5:\"TURMA\";}s:9:\"MATRICULA\";a:4:{i:0;s:19:\"MATRICULA_ACADEMICO\";i:1;s:16:\"MATRICULA_ONLINE\";i:2;s:15:\"VALOR_MATRICULA\";i:3;s:17:\"VALOR_MENSALIDADE\";}s:6:\"DIARIO\";a:8:{i:0;s:10:\"ATIVIDADES\";i:1;s:16:\"NOTAS_ACADEMICAS\";i:2;s:15:\"REGISTRO_FALTAS\";i:3;s:12:\"PLANEJAMENTO\";i:4;s:9:\"PARECERES\";i:5;s:15:\"CONTEUDO_PROVAS\";i:6;s:19:\"CONTEUDO_VEVENCIADO\";i:7;s:11:\"OCORRENCIAS\";}s:10:\"FINANCEIRO\";a:7:{i:0;s:6:\"VENDAS\";i:1;s:11:\"RECEBIMENTO\";i:2;s:7:\"BOLETOS\";i:3;s:11:\"NEGOCIACOES\";i:4;s:22:\"NOTA_FISCAL_ELETRONICA\";i:5;s:15:\"FOLHA_PAGAMENTO\";i:6;s:6:\"CONTAS\";}s:13:\"CONFIGURACOES\";a:4:{i:0;s:14:\"USUARIO_SISTEM\";i:1;s:12:\"CONTAS_EMAIL\";i:2;s:12:\"ENVIAR_EMAIL\";i:3;s:6:\"CONFIG\";}s:9:\"RELATORIO\";s:9:\"RELATORIO\";}'),
(2, 'Administrador(a)', 'a:10:{i:0;s:3:\"any\";s:4:\"SITE\";a:6:{i:0;s:7:\"PUBLISH\";i:1;s:19:\"GERENCIADOR_ARQUIVO\";i:2;s:11:\"COMUNICADOS\";i:3;s:13:\"GALERIA_FOTOS\";i:4;s:10:\"QUEM_SOMOS\";i:5;s:6:\"BANNER\";}s:9:\"ACADEMICO\";a:7:{i:0;s:6:\"ALUNOS\";i:1;s:11:\"RESPONSAVEL\";i:2;s:11:\"PROFESSORES\";i:3;s:20:\"PROFESSOR_DISCIPLINA\";i:4;s:15:\"DOCUMENTO_ALUNO\";i:5;s:18:\"CALENDARIO_ESCOLAR\";i:6;s:7:\"HORARIO\";}s:10:\"SECRETARIA\";a:1:{i:0;s:13:\"ARQUIVO_MORTO\";}s:9:\"ESTRUTURA\";a:10:{i:0;s:10:\"ANO_LETIVO\";i:1;s:8:\"SEMESTRE\";i:2;s:14:\"UNIDADE_LETIVA\";i:3;s:9:\"AVALIACAO\";i:4;s:10:\"DISCIPLINA\";i:5;s:6:\"MODULO\";i:6;s:14:\"PERIODO_ENSINO\";i:7;s:5:\"SERIE\";i:8;s:11:\"TIPO_ENSINO\";i:9;s:5:\"TURMA\";}s:9:\"MATRICULA\";a:4:{i:0;s:19:\"MATRICULA_ACADEMICO\";i:1;s:16:\"MATRICULA_ONLINE\";i:2;s:15:\"VALOR_MATRICULA\";i:3;s:17:\"VALOR_MENSALIDADE\";}s:6:\"DIARIO\";a:8:{i:0;s:10:\"ATIVIDADES\";i:1;s:16:\"NOTAS_ACADEMICAS\";i:2;s:15:\"REGISTRO_FALTAS\";i:3;s:12:\"PLANEJAMENTO\";i:4;s:9:\"PARECERES\";i:5;s:15:\"CONTEUDO_PROVAS\";i:6;s:19:\"CONTEUDO_VEVENCIADO\";i:7;s:11:\"OCORRENCIAS\";}s:10:\"FINANCEIRO\";a:7:{i:0;s:6:\"VENDAS\";i:1;s:11:\"RECEBIMENTO\";i:2;s:7:\"BOLETOS\";i:3;s:11:\"NEGOCIACOES\";i:4;s:22:\"NOTA_FISCAL_ELETRONICA\";i:5;s:15:\"FOLHA_PAGAMENTO\";i:6;s:6:\"CONTAS\";}s:13:\"CONFIGURACOES\";a:4:{i:0;s:14:\"USUARIO_SISTEM\";i:1;s:12:\"CONTAS_EMAIL\";i:2;s:12:\"ENVIAR_EMAIL\";i:3;s:6:\"CONFIG\";}s:9:\"RELATORIO\";s:9:\"RELATORIO\";}'),
(3, 'Funcionário(a)', 'a:3:{i:0;s:3:\"any\";s:4:\"MENU\";a:2:{s:4:\"HOME\";s:4:\"HOME\";s:6:\"LOGOUT\";s:6:\"LOGOUT\";}s:10:\"PERMISSOES\";a:1:{i:0;s:3:\"any\";}}'),
(4, 'Professor(a)', 'a:3:{i:0;s:3:\"any\";s:4:\"MENU\";a:3:{s:4:\"HOME\";s:4:\"HOME\";s:6:\"DIARIO\";a:6:{s:6:\"AGENDA\";s:6:\"AGENDA\";s:16:\"NOTAS_ACADEMICAS\";s:16:\"NOTAS_ACADEMICAS\";s:14:\"REGISTRO_AULAS\";s:14:\"REGISTRO_AULAS\";s:15:\"REGISTRO_FALTAS\";s:15:\"REGISTRO_FALTAS\";s:12:\"PLANEJAMENTO\";s:12:\"PLANEJAMENTO\";s:15:\"CONTEUDO_PROVAS\";s:15:\"CONTEUDO_PROVAS\";}s:6:\"LOGOUT\";s:6:\"LOGOUT\";}s:10:\"PERMISSOES\";a:7:{i:0;s:3:\"any\";i:1;s:6:\"AGENDA\";i:2;s:16:\"NOTAS_ACADEMICAS\";i:3;s:14:\"REGISTRO_AULAS\";i:4;s:15:\"REGISTRO_FALTAS\";i:5;s:12:\"PLANEJAMENTO\";i:6;s:15:\"CONTEUDO_PROVAS\";}}'),
(5, 'Aluno(a)', 'a:3:{i:0;s:3:\"any\";s:4:\"MENU\";a:4:{s:4:\"HOME\";s:4:\"HOME\";s:9:\"ACADEMICO\";a:4:{s:6:\"AGENDA\";s:6:\"AGENDA\";s:10:\"DOCUMENTOS\";s:10:\"DOCUMENTOS\";s:7:\"BOLETIM\";s:7:\"BOLETIM\";s:18:\"CALENDARIO_ESCOLAR\";s:18:\"CALENDARIO_ESCOLAR\";}s:10:\"FINANCEIRO\";a:2:{s:12:\"MENSALIDADES\";s:12:\"MENSALIDADES\";s:13:\"INADIMPLENCIA\";s:13:\"INADIMPLENCIA\";}s:6:\"LOGOUT\";s:6:\"LOGOUT\";}s:10:\"PERMISSOES\";a:8:{i:0;s:3:\"any\";i:1;s:12:\"MENSALIDADES\";i:2;s:6:\"AGENDA\";i:3;s:7:\"BOLETIM\";i:4;s:18:\"CALENDARIO_ESCOLAR\";i:5;s:10:\"DOCUMENTOS\";i:6;s:13:\"INADIMPLENCIA\";i:7;s:10:\"NEGOCIACAO\";}}'),
(6, 'Responsável', 'a:3:{i:0;s:3:\"any\";s:4:\"MENU\";a:4:{s:4:\"HOME\";s:4:\"HOME\";s:9:\"ACADEMICO\";a:4:{s:6:\"AGENDA\";s:6:\"AGENDA\";s:10:\"DOCUMENTOS\";s:10:\"DOCUMENTOS\";s:7:\"BOLETIM\";s:7:\"BOLETIM\";s:18:\"CALENDARIO_ESCOLAR\";s:18:\"CALENDARIO_ESCOLAR\";}s:10:\"FINANCEIRO\";a:2:{s:12:\"MENSALIDADES\";s:12:\"MENSALIDADES\";s:13:\"INADIMPLENCIA\";s:13:\"INADIMPLENCIA\";}s:6:\"LOGOUT\";s:6:\"LOGOUT\";}s:10:\"PERMISSOES\";a:8:{i:0;s:3:\"any\";i:1;s:12:\"MENSALIDADES\";i:2;s:6:\"AGENDA\";i:3;s:7:\"BOLETIM\";i:4;s:18:\"CALENDARIO_ESCOLAR\";i:5;s:10:\"DOCUMENTOS\";i:6;s:13:\"INADIMPLENCIA\";i:7;s:10:\"NEGOCIACAO\";}}');

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `view_menu`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `view_menu` (
`menu_id` int(11)
,`menu_projeto_id` int(11)
,`projeto_title` text
,`menu_title` text
,`menu_nome` text
,`menu_submenu` tinyint(1)
,`menu_icon` text
,`icons_icon` text
,`menu_status` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `view_modulos`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `view_modulos` (
`modulos_id` int(11)
,`modulos_projeto_id` int(11)
,`projeto_title` text
,`modulos_title` text
,`modulos_modulo` text
,`modulos_controller` text
,`modulos_model` text
,`modulos_table` text
,`modulos_db_prefixo` text
,`modulos_primary_key` text
,`modulos_field_default` text
,`modulos_field_status` text
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `view_modulo_campo`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `view_modulo_campo` (
`modulo_campo_id` int(11)
,`projeto_id` int(11)
,`projeto_title` text
,`modulo_campo_modulo_id` int(11)
,`modulos_title` text
,`modulos_modulo` text
,`modulo_campo_nome` text
,`modulo_campo_title` text
,`modulo_campo_tipo` int(11)
,`tipo_campo_nome` text
,`modulo_campo_fk` tinyint(1)
,`modulo_campo_reference_table` text
,`modulo_campo_reference_key` text
,`modulo_campo_reference_option` text
,`modulo_campo_required` tinyint(1)
,`modulo_campo_is_search` tinyint(1)
,`modulo_campo_status` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `view_submenu`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `view_submenu` (
`submenu_id` int(11)
,`menu_projeto_id` int(11)
,`menu_title` text
,`menu_nome` text
,`submenu_menu_id` int(11)
,`submenu_nome` text
,`submenu_title` text
,`submenu_link` text
,`submenu_status` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `view_users`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `view_users` (
`user_id` bigint(20) unsigned
,`user_name` longtext
,`user_password` longtext
,`user_email` longtext
,`user_img` longtext
,`user_permissions` longtext
,`fk_user_type_id` int(11)
,`user_ativo` tinyint(1)
,`user_session_id` longtext
,`user_type_descricao` mediumtext
);

-- --------------------------------------------------------

--
-- Estrutura para vista `view_menu`
--
DROP TABLE IF EXISTS `view_menu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_menu`  AS SELECT `tbmenu`.`menu_id` AS `menu_id`, `tbmenu`.`menu_projeto_id` AS `menu_projeto_id`, `tbprojeto`.`projeto_title` AS `projeto_title`, `tbmenu`.`menu_title` AS `menu_title`, `tbmenu`.`menu_nome` AS `menu_nome`, `tbmenu`.`menu_submenu` AS `menu_submenu`, `tbmenu`.`menu_icon` AS `menu_icon`, `tbicons`.`icons_icon` AS `icons_icon`, `tbmenu`.`menu_status` AS `menu_status` FROM ((`tbmenu` left join `tbprojeto` on(`tbprojeto`.`projeto_id` = `tbmenu`.`menu_projeto_id`)) left join `tbicons` on(`tbicons`.`icons_id` = `tbmenu`.`menu_icon`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `view_modulos`
--
DROP TABLE IF EXISTS `view_modulos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_modulos`  AS SELECT `tbmodulos`.`modulos_id` AS `modulos_id`, `tbmodulos`.`modulos_projeto_id` AS `modulos_projeto_id`, `tbprojeto`.`projeto_title` AS `projeto_title`, `tbmodulos`.`modulos_title` AS `modulos_title`, `tbmodulos`.`modulos_modulo` AS `modulos_modulo`, `tbmodulos`.`modulos_controller` AS `modulos_controller`, `tbmodulos`.`modulos_model` AS `modulos_model`, `tbmodulos`.`modulos_table` AS `modulos_table`, `tbmodulos`.`modulos_db_prefixo` AS `modulos_db_prefixo`, `tbmodulos`.`modulos_primary_key` AS `modulos_primary_key`, `tbmodulos`.`modulos_field_default` AS `modulos_field_default`, `tbmodulos`.`modulos_field_status` AS `modulos_field_status` FROM (`tbmodulos` left join `tbprojeto` on(`tbprojeto`.`projeto_id` = `tbmodulos`.`modulos_projeto_id`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `view_modulo_campo`
--
DROP TABLE IF EXISTS `view_modulo_campo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_modulo_campo`  AS SELECT `tbmodulo_campo`.`modulo_campo_id` AS `modulo_campo_id`, `tbprojeto`.`projeto_id` AS `projeto_id`, `tbprojeto`.`projeto_title` AS `projeto_title`, `tbmodulo_campo`.`modulo_campo_modulo_id` AS `modulo_campo_modulo_id`, `tbmodulos`.`modulos_title` AS `modulos_title`, `tbmodulos`.`modulos_modulo` AS `modulos_modulo`, `tbmodulo_campo`.`modulo_campo_nome` AS `modulo_campo_nome`, `tbmodulo_campo`.`modulo_campo_title` AS `modulo_campo_title`, `tbmodulo_campo`.`modulo_campo_tipo` AS `modulo_campo_tipo`, `tbtipo_campo`.`tipo_campo_nome` AS `tipo_campo_nome`, `tbmodulo_campo`.`modulo_campo_fk` AS `modulo_campo_fk`, `tbmodulo_campo`.`modulo_campo_reference_table` AS `modulo_campo_reference_table`, `tbmodulo_campo`.`modulo_campo_reference_key` AS `modulo_campo_reference_key`, `tbmodulo_campo`.`modulo_campo_reference_option` AS `modulo_campo_reference_option`, `tbmodulo_campo`.`modulo_campo_required` AS `modulo_campo_required`, `tbmodulo_campo`.`modulo_campo_is_search` AS `modulo_campo_is_search`, `tbmodulo_campo`.`modulo_campo_status` AS `modulo_campo_status` FROM (((`tbmodulo_campo` left join `tbmodulos` on(`tbmodulos`.`modulos_id` = `tbmodulo_campo`.`modulo_campo_modulo_id`)) left join `tbtipo_campo` on(`tbtipo_campo`.`tipo_campo_id` = `tbmodulo_campo`.`modulo_campo_tipo`)) left join `tbprojeto` on(`tbprojeto`.`projeto_id` = `tbmodulos`.`modulos_projeto_id`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `view_submenu`
--
DROP TABLE IF EXISTS `view_submenu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_submenu`  AS SELECT `tbsubmenu`.`submenu_id` AS `submenu_id`, `tbmenu`.`menu_projeto_id` AS `menu_projeto_id`, `tbmenu`.`menu_title` AS `menu_title`, `tbmenu`.`menu_nome` AS `menu_nome`, `tbsubmenu`.`submenu_menu_id` AS `submenu_menu_id`, `tbsubmenu`.`submenu_nome` AS `submenu_nome`, `tbsubmenu`.`submenu_title` AS `submenu_title`, `tbsubmenu`.`submenu_link` AS `submenu_link`, `tbsubmenu`.`submenu_status` AS `submenu_status` FROM (`tbsubmenu` left join `tbmenu` on(`tbmenu`.`menu_id` = `tbsubmenu`.`submenu_menu_id`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `view_users`
--
DROP TABLE IF EXISTS `view_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_users`  AS SELECT `tbuser`.`user_id` AS `user_id`, `tbuser`.`user_name` AS `user_name`, `tbuser`.`user_password` AS `user_password`, `tbuser`.`user_email` AS `user_email`, `tbuser`.`user_img` AS `user_img`, `tbuser`.`user_permissions` AS `user_permissions`, `tbuser`.`fk_user_type_id` AS `fk_user_type_id`, `tbuser`.`user_ativo` AS `user_ativo`, `tbuser`.`user_session_id` AS `user_session_id`, `tbuser_type`.`user_type_descricao` AS `user_type_descricao` FROM (`tbuser` left join `tbuser_type` on(`tbuser_type`.`user_type_id` = `tbuser`.`fk_user_type_id`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbicons`
--
ALTER TABLE `tbicons`
  ADD PRIMARY KEY (`icons_id`);

--
-- Índices para tabela `tbmenu`
--
ALTER TABLE `tbmenu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Índices para tabela `tbmodulos`
--
ALTER TABLE `tbmodulos`
  ADD PRIMARY KEY (`modulos_id`);

--
-- Índices para tabela `tbmodulo_campo`
--
ALTER TABLE `tbmodulo_campo`
  ADD PRIMARY KEY (`modulo_campo_id`);

--
-- Índices para tabela `tbprojeto`
--
ALTER TABLE `tbprojeto`
  ADD PRIMARY KEY (`projeto_id`);

--
-- Índices para tabela `tbsubmenu`
--
ALTER TABLE `tbsubmenu`
  ADD PRIMARY KEY (`submenu_id`);

--
-- Índices para tabela `tbtipo_campo`
--
ALTER TABLE `tbtipo_campo`
  ADD PRIMARY KEY (`tipo_campo_id`);

--
-- Índices para tabela `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`user_id`);

--
-- Índices para tabela `tbuser_type`
--
ALTER TABLE `tbuser_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbicons`
--
ALTER TABLE `tbicons`
  MODIFY `icons_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbmenu`
--
ALTER TABLE `tbmenu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbmodulos`
--
ALTER TABLE `tbmodulos`
  MODIFY `modulos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbmodulo_campo`
--
ALTER TABLE `tbmodulo_campo`
  MODIFY `modulo_campo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbprojeto`
--
ALTER TABLE `tbprojeto`
  MODIFY `projeto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbsubmenu`
--
ALTER TABLE `tbsubmenu`
  MODIFY `submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbtipo_campo`
--
ALTER TABLE `tbtipo_campo`
  MODIFY `tipo_campo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
