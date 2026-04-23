
DROP TABLE IF EXISTS `tbuser`;
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


INSERT INTO `tbuser` (`user_id`, `user_name`, `user_password`, `user_email`, `user_img`, `user_permissions`, `fk_user_type_id`, `fk_user_id`, `user_ativo`, `user_session_id`) VALUES
(1, 'Administrador', '0a71a5917c8361f079d77a26b0619fe4', 'vcc180@gmail.com', 'users/default-user.png', 'a:3:{i:0;s:3:\"any\";s:4:\"MENU\";a:7:{s:4:\"HOME\";s:4:\"HOME\";s:3:\"CRM\";a:4:{s:3:\"CRM\";s:3:\"CRM\";s:5:\"SETOR\";s:5:\"SETOR\";s:10:\"CRM-STATUS\";s:10:\"CRM-STATUS\";s:10:\"PRIORIDADE\";s:10:\"PRIORIDADE\";}s:13:\"COLABORADORES\";a:1:{s:13:\"COLABORADORES\";s:13:\"COLABORADORES\";}s:7:\"CONTATO\";a:1:{s:12:\"FALE_CONOSCO\";s:12:\"FALE_CONOSCO\";}s:7:\"CHAMADO\";a:2:{s:11:\"ADD_CHAMADO\";s:11:\"ADD_CHAMADO\";s:12:\"VIEW_CHAMADO\";s:12:\"VIEW_CHAMADO\";}s:13:\"CONFIGURACOES\";a:8:{s:14:\"USUARIO_SISTEM\";s:14:\"USUARIO_SISTEM\";s:16:\"TIPO_ATENDIMENTO\";s:16:\"TIPO_ATENDIMENTO\";s:19:\"ASSUNTO_ATENDIMENTO\";s:19:\"ASSUNTO_ATENDIMENTO\";s:18:\"MOTIVO_ATENDIMENTO\";s:18:\"MOTIVO_ATENDIMENTO\";s:9:\"POLITICAS\";s:9:\"POLITICAS\";s:7:\"CIDADES\";s:7:\"CIDADES\";s:2:\"UF\";s:2:\"UF\";s:13:\"CONFIG_OPCOES\";s:13:\"CONFIG_OPCOES\";}s:6:\"LOGOUT\";s:6:\"LOGOUT\";}s:10:\"PERMISSOES\";a:17:{i:0;s:3:\"any\";i:1;s:3:\"CRM\";i:2;s:5:\"SETOR\";i:3;s:10:\"CRM-STATUS\";i:4;s:10:\"PRIORIDADE\";i:5;s:13:\"COLABORADORES\";i:6;s:12:\"FALE_CONOSCO\";i:7;s:11:\"ADD_CHAMADO\";i:8;s:12:\"VIEW_CHAMADO\";i:9;s:14:\"USUARIO_SISTEM\";i:10;s:16:\"TIPO_ATENDIMENTO\";i:11;s:19:\"ASSUNTO_ATENDIMENTO\";i:12;s:18:\"MOTIVO_ATENDIMENTO\";i:13;s:9:\"POLITICAS\";i:14;s:7:\"CIDADES\";i:15;s:2:\"UF\";i:16;s:13:\"CONFIG_OPCOES\";}}', 1, 1, 1, 'r0hhqu9h9jlt18ij1jb9chfrmj');

DROP TABLE IF EXISTS `tbuser_type`;
CREATE TABLE `tbuser_type` (
  `user_type_id` bigint(20) UNSIGNED NOT NULL,
  `user_type_descricao` mediumtext NOT NULL,
  `user_type_permicoes` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tbuser_type` (`user_type_id`, `user_type_descricao`, `user_type_permicoes`) VALUES
(1, 'Super Usuário', 'a:9:{s:4:\"SITE\";a:6:{i:0;s:7:\"PUBLISH\";i:1;s:19:\"GERENCIADOR_ARQUIVO\";i:2;s:11:\"COMUNICADOS\";i:3;s:13:\"GALERIA_FOTOS\";i:4;s:10:\"QUEM_SOMOS\";i:5;s:6:\"BANNER\";}s:9:\"ACADEMICO\";a:7:{i:0;s:6:\"ALUNOS\";i:1;s:11:\"RESPONSAVEL\";i:2;s:11:\"PROFESSORES\";i:3;s:20:\"PROFESSOR_DISCIPLINA\";i:4;s:15:\"DOCUMENTO_ALUNO\";i:5;s:18:\"CALENDARIO_ESCOLAR\";i:6;s:7:\"HORARIO\";}s:10:\"SECRETARIA\";a:1:{i:0;s:13:\"ARQUIVO_MORTO\";}s:9:\"ESTRUTURA\";a:10:{i:0;s:10:\"ANO_LETIVO\";i:1;s:8:\"SEMESTRE\";i:2;s:14:\"UNIDADE_LETIVA\";i:3;s:9:\"AVALIACAO\";i:4;s:10:\"DISCIPLINA\";i:5;s:6:\"MODULO\";i:6;s:14:\"PERIODO_ENSINO\";i:7;s:5:\"SERIE\";i:8;s:11:\"TIPO_ENSINO\";i:9;s:5:\"TURMA\";}s:9:\"MATRICULA\";a:4:{i:0;s:19:\"MATRICULA_ACADEMICO\";i:1;s:16:\"MATRICULA_ONLINE\";i:2;s:15:\"VALOR_MATRICULA\";i:3;s:17:\"VALOR_MENSALIDADE\";}s:6:\"DIARIO\";a:8:{i:0;s:10:\"ATIVIDADES\";i:1;s:16:\"NOTAS_ACADEMICAS\";i:2;s:15:\"REGISTRO_FALTAS\";i:3;s:12:\"PLANEJAMENTO\";i:4;s:9:\"PARECERES\";i:5;s:15:\"CONTEUDO_PROVAS\";i:6;s:19:\"CONTEUDO_VEVENCIADO\";i:7;s:11:\"OCORRENCIAS\";}s:10:\"FINANCEIRO\";a:7:{i:0;s:6:\"VENDAS\";i:1;s:11:\"RECEBIMENTO\";i:2;s:7:\"BOLETOS\";i:3;s:11:\"NEGOCIACOES\";i:4;s:22:\"NOTA_FISCAL_ELETRONICA\";i:5;s:15:\"FOLHA_PAGAMENTO\";i:6;s:6:\"CONTAS\";}s:13:\"CONFIGURACOES\";a:4:{i:0;s:14:\"USUARIO_SISTEM\";i:1;s:12:\"CONTAS_EMAIL\";i:2;s:12:\"ENVIAR_EMAIL\";i:3;s:6:\"CONFIG\";}s:9:\"RELATORIO\";s:9:\"RELATORIO\";}'),
(2, 'Administrador(a)', 'a:10:{i:0;s:3:\"any\";s:4:\"SITE\";a:6:{i:0;s:7:\"PUBLISH\";i:1;s:19:\"GERENCIADOR_ARQUIVO\";i:2;s:11:\"COMUNICADOS\";i:3;s:13:\"GALERIA_FOTOS\";i:4;s:10:\"QUEM_SOMOS\";i:5;s:6:\"BANNER\";}s:9:\"ACADEMICO\";a:7:{i:0;s:6:\"ALUNOS\";i:1;s:11:\"RESPONSAVEL\";i:2;s:11:\"PROFESSORES\";i:3;s:20:\"PROFESSOR_DISCIPLINA\";i:4;s:15:\"DOCUMENTO_ALUNO\";i:5;s:18:\"CALENDARIO_ESCOLAR\";i:6;s:7:\"HORARIO\";}s:10:\"SECRETARIA\";a:1:{i:0;s:13:\"ARQUIVO_MORTO\";}s:9:\"ESTRUTURA\";a:10:{i:0;s:10:\"ANO_LETIVO\";i:1;s:8:\"SEMESTRE\";i:2;s:14:\"UNIDADE_LETIVA\";i:3;s:9:\"AVALIACAO\";i:4;s:10:\"DISCIPLINA\";i:5;s:6:\"MODULO\";i:6;s:14:\"PERIODO_ENSINO\";i:7;s:5:\"SERIE\";i:8;s:11:\"TIPO_ENSINO\";i:9;s:5:\"TURMA\";}s:9:\"MATRICULA\";a:4:{i:0;s:19:\"MATRICULA_ACADEMICO\";i:1;s:16:\"MATRICULA_ONLINE\";i:2;s:15:\"VALOR_MATRICULA\";i:3;s:17:\"VALOR_MENSALIDADE\";}s:6:\"DIARIO\";a:8:{i:0;s:10:\"ATIVIDADES\";i:1;s:16:\"NOTAS_ACADEMICAS\";i:2;s:15:\"REGISTRO_FALTAS\";i:3;s:12:\"PLANEJAMENTO\";i:4;s:9:\"PARECERES\";i:5;s:15:\"CONTEUDO_PROVAS\";i:6;s:19:\"CONTEUDO_VEVENCIADO\";i:7;s:11:\"OCORRENCIAS\";}s:10:\"FINANCEIRO\";a:7:{i:0;s:6:\"VENDAS\";i:1;s:11:\"RECEBIMENTO\";i:2;s:7:\"BOLETOS\";i:3;s:11:\"NEGOCIACOES\";i:4;s:22:\"NOTA_FISCAL_ELETRONICA\";i:5;s:15:\"FOLHA_PAGAMENTO\";i:6;s:6:\"CONTAS\";}s:13:\"CONFIGURACOES\";a:4:{i:0;s:14:\"USUARIO_SISTEM\";i:1;s:12:\"CONTAS_EMAIL\";i:2;s:12:\"ENVIAR_EMAIL\";i:3;s:6:\"CONFIG\";}s:9:\"RELATORIO\";s:9:\"RELATORIO\";}'),
(3, 'Funcionário(a)', 'a:3:{i:0;s:3:\"any\";s:4:\"MENU\";a:2:{s:4:\"HOME\";s:4:\"HOME\";s:6:\"LOGOUT\";s:6:\"LOGOUT\";}s:10:\"PERMISSOES\";a:1:{i:0;s:3:\"any\";}}'),
(4, 'Professor(a)', 'a:3:{i:0;s:3:\"any\";s:4:\"MENU\";a:3:{s:4:\"HOME\";s:4:\"HOME\";s:6:\"DIARIO\";a:6:{s:6:\"AGENDA\";s:6:\"AGENDA\";s:16:\"NOTAS_ACADEMICAS\";s:16:\"NOTAS_ACADEMICAS\";s:14:\"REGISTRO_AULAS\";s:14:\"REGISTRO_AULAS\";s:15:\"REGISTRO_FALTAS\";s:15:\"REGISTRO_FALTAS\";s:12:\"PLANEJAMENTO\";s:12:\"PLANEJAMENTO\";s:15:\"CONTEUDO_PROVAS\";s:15:\"CONTEUDO_PROVAS\";}s:6:\"LOGOUT\";s:6:\"LOGOUT\";}s:10:\"PERMISSOES\";a:7:{i:0;s:3:\"any\";i:1;s:6:\"AGENDA\";i:2;s:16:\"NOTAS_ACADEMICAS\";i:3;s:14:\"REGISTRO_AULAS\";i:4;s:15:\"REGISTRO_FALTAS\";i:5;s:12:\"PLANEJAMENTO\";i:6;s:15:\"CONTEUDO_PROVAS\";}}'),
(5, 'Aluno(a)', 'a:3:{i:0;s:3:\"any\";s:4:\"MENU\";a:4:{s:4:\"HOME\";s:4:\"HOME\";s:9:\"ACADEMICO\";a:4:{s:6:\"AGENDA\";s:6:\"AGENDA\";s:10:\"DOCUMENTOS\";s:10:\"DOCUMENTOS\";s:7:\"BOLETIM\";s:7:\"BOLETIM\";s:18:\"CALENDARIO_ESCOLAR\";s:18:\"CALENDARIO_ESCOLAR\";}s:10:\"FINANCEIRO\";a:2:{s:12:\"MENSALIDADES\";s:12:\"MENSALIDADES\";s:13:\"INADIMPLENCIA\";s:13:\"INADIMPLENCIA\";}s:6:\"LOGOUT\";s:6:\"LOGOUT\";}s:10:\"PERMISSOES\";a:8:{i:0;s:3:\"any\";i:1;s:12:\"MENSALIDADES\";i:2;s:6:\"AGENDA\";i:3;s:7:\"BOLETIM\";i:4;s:18:\"CALENDARIO_ESCOLAR\";i:5;s:10:\"DOCUMENTOS\";i:6;s:13:\"INADIMPLENCIA\";i:7;s:10:\"NEGOCIACAO\";}}'),
(6, 'Responsável', 'a:3:{i:0;s:3:\"any\";s:4:\"MENU\";a:4:{s:4:\"HOME\";s:4:\"HOME\";s:9:\"ACADEMICO\";a:4:{s:6:\"AGENDA\";s:6:\"AGENDA\";s:10:\"DOCUMENTOS\";s:10:\"DOCUMENTOS\";s:7:\"BOLETIM\";s:7:\"BOLETIM\";s:18:\"CALENDARIO_ESCOLAR\";s:18:\"CALENDARIO_ESCOLAR\";}s:10:\"FINANCEIRO\";a:2:{s:12:\"MENSALIDADES\";s:12:\"MENSALIDADES\";s:13:\"INADIMPLENCIA\";s:13:\"INADIMPLENCIA\";}s:6:\"LOGOUT\";s:6:\"LOGOUT\";}s:10:\"PERMISSOES\";a:8:{i:0;s:3:\"any\";i:1;s:12:\"MENSALIDADES\";i:2;s:6:\"AGENDA\";i:3;s:7:\"BOLETIM\";i:4;s:18:\"CALENDARIO_ESCOLAR\";i:5;s:10:\"DOCUMENTOS\";i:6;s:13:\"INADIMPLENCIA\";i:7;s:10:\"NEGOCIACAO\";}}');

DROP VIEW IF EXISTS `view_users`;

CREATE VIEW `view_users`  AS SELECT `tbuser`.`user_id` AS `user_id`, `tbuser`.`user_name` AS `user_name`, `tbuser`.`user_password` AS `user_password`, `tbuser`.`user_email` AS `user_email`, `tbuser`.`user_img` AS `user_img`, `tbuser`.`user_permissions` AS `user_permissions`, `tbuser`.`fk_user_type_id` AS `fk_user_type_id`, `tbuser`.`user_ativo` AS `user_ativo`, `tbuser`.`user_session_id` AS `user_session_id`, `tbuser_type`.`user_type_descricao` AS `user_type_descricao` FROM (`tbuser` left join `tbuser_type` on(`tbuser_type`.`user_type_id` = `tbuser`.`fk_user_type_id`)) ;


ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`user_id`);


ALTER TABLE `tbuser_type`
  ADD PRIMARY KEY (`user_type_id`);


ALTER TABLE `tbuser`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

