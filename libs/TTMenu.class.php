<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APPMenu
 *
 * @author vinic
 */
class TTMenu {

    const TYPE_HOME = 'HOME';
    const TYPE_PUBLISH = 'PUBLISH';
    const TYPE_GERENCIADOR_ARQUIVO = 'GERENCIADOR_ARQUIVO';
    const TYPE_COMUNICADOS = 'COMUNICADOS';
    const TYPE_GALERIA_FOTOS = 'GALERIA_FOTOS';
    const TYPE_QUEM_SOMOS = 'QUEM_SOMOS';
    const TYPE_BANNER = 'BANNER';

    //put your code here
    private $MENU = array();
    private $MENU_ITENS = array();

    public function __construct() {
        $this->MENU['HOME']['TEXT'] = 'HOME';
        $this->MENU['HOME'] = array('LINK' => setURL('home'), 'TEXT' => 'HOME', 'ICON' => 'mn-icon');


        $this->MENU['SITE']['TEXT'] = 'SITE';
        $this->MENU['SITE']['PUBLISH'] = array('LINK' => setURL('#'), 'TEXT' => 'Publicações', 'ICON' => 'mn-icon icon-mn-publish');
        $this->MENU['SITE']['GERENCIADOR_ARQUIVO'] = array('LINK' => setURL('#'), 'TEXT' => 'Gerenciador de Arquivos', 'ICON' => 'mn-icon icon-mn-file-manager');
        $this->MENU['SITE']['COMUNICADOS'] = array('LINK' => setURL('#'), 'TEXT' => 'Comunicados', 'ICON' => 'mn-icon icon-mn-comunicado');
        $this->MENU['SITE']['GALERIA_FOTOS'] = array('LINK' => setURL('#'), 'TEXT' => 'Galeria de Fotos', 'ICON' => 'mn-icon icon-mn-gallery');
        $this->MENU['SITE']['QUEM_SOMOS'] = array('LINK' => setURL('#'), 'TEXT' => 'Quem Somos', 'ICON' => 'mn-icon icon-mn-quem-somos');
        $this->MENU['SITE']['BANNER'] = array('LINK' => setURL('#'), 'TEXT' => 'Banner', 'ICON' => 'mn-icon icon-mn-banner');


        $this->MENU['ACADEMICO']['TEXT'] = 'ACADÊMICO';
        $this->MENU['ACADEMICO']['ALUNOS'] = array('LINK' => setURL('alunos'), 'TEXT' => 'Alunos', 'ICON' => 'mn-icon icon-mn-alunos');
        $this->MENU['ACADEMICO']['RESPONSAVEL'] = array('LINK' => setURL('responsavel'), 'TEXT' => 'Pais e Responsáveis', 'ICON' => 'mn-icon icon-mn-pais-resp');
        $this->MENU['ACADEMICO']['PROFESSORES'] = array('LINK' => setURL('professores'), 'TEXT' => 'Professores', 'ICON' => 'mn-icon icon-mn-professor');
        $this->MENU['ACADEMICO']['PROFESSOR_DISCIPLINA'] = array('LINK' => setURL('professor-disciplina'), 'TEXT' => 'Prof. / Disciplina', 'ICON' => 'mn-icon icon-mn-prof-disc');
        $this->MENU['ACADEMICO']['DOCUMENTO_ALUNO'] = array('LINK' => setURL('documento'), 'TEXT' => 'Modelo Documento', 'ICON' => 'mn-icon icon-mn-doc-aluno');
        $this->MENU['ACADEMICO']['CALENDARIO_ESCOLAR'] = array('LINK' => setURL('calendario-escolar'), 'TEXT' => 'Calendário Escolar', 'ICON' => 'mn-icon icon-mn-calendar');
        $this->MENU['ACADEMICO']['HORARIO'] = array('LINK' => setURL('horario'), 'TEXT' => 'Horários', 'ICON' => 'mn-icon icon-mn-time');


        $this->MENU['SECRETARIA']['TEXT'] = 'SECRETÁRIA';
        $this->MENU['SECRETARIA']['ARQUIVO_MORTO'] = array('LINK' => setURL('arquivo-morto'), 'TEXT' => 'Arquivo Morto', 'ICON' => 'mn-icon icon-mn-file-manager');


        $this->MENU['ESTRUTURA']['TEXT'] = 'ESTRUTURA';
        $this->MENU['ESTRUTURA']['ANO_LETIVO'] = array('LINK' => setURL('ano-letivo'), 'TEXT' => 'Ano Letivo', 'ICON' => 'mn-icon icon-mn-ano-letivo');
        $this->MENU['ESTRUTURA']['SEMESTRE'] = array('LINK' => setURL('semestre'), 'TEXT' => 'Semestre', 'ICON' => 'mn-icon icon-mn-semestre');
        $this->MENU['ESTRUTURA']['UNIDADE_LETIVA'] = array('LINK' => setURL('unidade'), 'TEXT' => 'Unidade Letiva', 'ICON' => 'mn-icon icon-mn-unidade');
        $this->MENU['ESTRUTURA']['AVALIACAO'] = array('LINK' => setURL('avaliacao'), 'TEXT' => 'Avaliações', 'ICON' => 'mn-icon icon-mn-avaliacao');
        $this->MENU['ESTRUTURA']['DISCIPLINA'] = array('LINK' => setURL('disciplina'), 'TEXT' => 'Disciplinas', 'ICON' => 'mn-icon icon-mn-disciplina');
        $this->MENU['ESTRUTURA']['MODULO'] = array('LINK' => setURL('modulo'), 'TEXT' => 'Módulo', 'ICON' => 'mn-icon icon-mn-modulo');
        $this->MENU['ESTRUTURA']['PERIODO_ENSINO'] = array('LINK' => setURL('periodo-ensino'), 'TEXT' => 'Período Ensino', 'ICON' => 'mn-icon icon-mn-time-02');
        $this->MENU['ESTRUTURA']['SERIE'] = array('LINK' => setURL('serie'), 'TEXT' => 'Série', 'ICON' => 'mn-icon icon-mn-series');
        $this->MENU['ESTRUTURA']['TIPO_ENSINO'] = array('LINK' => setURL('tipo-ensino'), 'TEXT' => 'Tipo de Ensino', 'ICON' => 'mn-icon icon-mn-tipo-ensino');
        $this->MENU['ESTRUTURA']['TURMA'] = array('LINK' => setURL('turma'), 'TEXT' => 'Turmas', 'ICON' => 'mn-icon icon-mn-turmas');


        $this->MENU['SECRETARIA']['TEXT'] = 'SECRETÁRIA';
        $this->MENU['SECRETARIA']['ARQUIVO_MORTO'] = array('LINK' => setURL('arquivo-morto'), 'TEXT' => 'Arquivo Morto', 'ICON' => 'mn-icon icon-mn-file-manager');


        $this->MENU['MATRICULA']['TEXT'] = 'MATRÍCULA';
        $this->MENU['MATRICULA']['MATRICULA_ACADEMICO'] = array('LINK' => setURL('matriculas'), 'TEXT' => 'Matrícula Acadêmica', 'ICON' => 'mn-icon icon-mn-matriculas');
        $this->MENU['MATRICULA']['MATRICULA_ONLINE'] = array('LINK' => setURL('#'), 'TEXT' => 'Matrículas On-line', 'ICON' => 'mn-icon icon-mn-matriculas-online');
        $this->MENU['MATRICULA']['VALOR_MATRICULA'] = array('LINK' => setURL('valor-matriculas'), 'TEXT' => 'Valor Matrículas', 'ICON' => 'mn-icon icon-mn-currency');
        $this->MENU['MATRICULA']['VALOR_MENSALIDADE'] = array('LINK' => setURL('valor-mensalidade'), 'TEXT' => 'Valor Mensalidade', 'ICON' => 'mn-icon icon-mn-currency');


        $this->MENU['DIARIO']['TEXT'] = 'DIÁRIO';
        $this->MENU['DIARIO']['ATIVIDADES'] = array('LINK' => setURL('#'), 'TEXT' => 'Atividades', 'ICON' => 'mn-icon ');
        $this->MENU['DIARIO']['NOTAS_ACADEMICAS'] = array('LINK' => setURL('#'), 'TEXT' => 'Notas Acadêmica', 'ICON' => 'mn-icon ');
        $this->MENU['DIARIO']['REGISTRO_FALTAS'] = array('LINK' => setURL('registro-faltas'), 'TEXT' => 'Registros de Faltas', 'ICON' => 'mn-icon icon-mn-registro-faltas');
        $this->MENU['DIARIO']['PLANEJAMENTO'] = array('LINK' => setURL('planejamento'), 'TEXT' => 'Planejamento', 'ICON' => 'mn-icon ');
        $this->MENU['DIARIO']['PARECERES'] = array('LINK' => setURL('#'), 'TEXT' => 'Pareceres', 'ICON' => 'mn-icon ');
        $this->MENU['DIARIO']['CONTEUDO_PROVAS'] = array('LINK' => setURL('#'), 'TEXT' => 'Conteúdos de Provas', 'ICON' => 'mn-icon ');
        $this->MENU['DIARIO']['CONTEUDO_VEVENCIADO'] = array('LINK' => setURL('#'), 'TEXT' => 'Conteúdos Vivenciados', 'ICON' => 'mn-icon ');
        $this->MENU['DIARIO']['OCORRENCIAS'] = array('LINK' => setURL('#'), 'TEXT' => 'Ocorrências', 'ICON' => 'mn-icon ');


        $this->MENU['FINANCEIRO']['TEXT'] = 'FINANCEIRO';
        $this->MENU['FINANCEIRO']['VENDAS'] = array('LINK' => setURL('#'), 'TEXT' => 'Vendas', 'ICON' => 'mn-icon icon-mn-vendas');
        $this->MENU['FINANCEIRO']['RECEBIMENTO'] = array('LINK' => setURL('recebimento'), 'TEXT' => 'Recebimento', 'ICON' => 'mn-icon icon-mn-recebimento');
        $this->MENU['FINANCEIRO']['BOLETOS'] = array('LINK' => setURL('#'), 'TEXT' => 'Boletos', 'ICON' => 'mn-icon icon-mn-barcode');
        $this->MENU['FINANCEIRO']['NEGOCIACOES'] = array('LINK' => setURL('negociacao'), 'TEXT' => 'Negociações', 'ICON' => 'mn-icon icon-mn-negociacao');
        $this->MENU['FINANCEIRO']['INADIMPLENTE'] = array('LINK' => setURL('inadimplentes'), 'TEXT' => 'Inadimplente', 'ICON' => 'mn-icon icon-mn-negociacao');
        $this->MENU['FINANCEIRO']['NOTA_FISCAL_ELETRONICA'] = array('LINK' => setURL('#'), 'TEXT' => 'Nota Fiscal Eletrônica', 'ICON' => 'mn-icon icon-mn-nfse');
        $this->MENU['FINANCEIRO']['FOLHA_PAGAMENTO'] = array('LINK' => setURL('#'), 'TEXT' => 'Folha de Pagamento', 'ICON' => 'mn-icon icon-mn-folha-pagamento');
        $this->MENU['FINANCEIRO']['CONTAS'] = array('LINK' => setURL('#'), 'TEXT' => 'Contas', 'ICON' => 'mn-icon icon-mn-contas');
        $this->MENU['FINANCEIRO']['TAXAS_JUROS'] = array('LINK' => setURL('taxa-juros'), 'TEXT' => 'TAXAS E JUROS', 'ICON' => 'mn-icon icon-mn-contas');

        $this->MENU['CONFIGURACOES']['TEXT'] = 'CONFIGURAÇÕES';
        $this->MENU['CONFIGURACOES']['USUARIO_SISTEM'] = array('LINK' => setURL('usuario-sistema'), 'TEXT' => 'Usuários do Sistema', 'ICON' => 'mn-icon icon-mn-users');
        $this->MENU['CONFIGURACOES']['CONTAS_EMAIL'] = array('LINK' => setURL('#'), 'TEXT' => 'Contas de E-mail', 'ICON' => 'mn-icon icon-mn-contas-email');
        $this->MENU['CONFIGURACOES']['ENVIAR_EMAIL'] = array('LINK' => setURL('#'), 'TEXT' => 'Envio de E-mails', 'ICON' => 'mn-icon icon-mn-send');
        $this->MENU['CONFIGURACOES']['CONFIG'] = array('LINK' => setURL('#'), 'TEXT' => 'Opções', 'ICON' => 'mn-icon icon-mn-config');


        $this->MENU['RELATORIO']['TEXT'] = 'RELATÓRIOS';
        $this->MENU['RELATORIO'] = array('LINK' => setURL('#'), 'TEXT' => 'RELATÓRIOS', 'ICON' => 'mn-icon');

        $this->MENU['LOGOUT']['TEXT'] = 'SAIR';
        $this->MENU['LOGOUT'] = array('LINK' => setURL('logout'), 'TEXT' => 'SAIR', 'ICON' => 'mn-icon');
        
        
    }

    public function show() {

//        TMessenger::debbug($this->MENU);

        echo '<div id="menu">';
        echo '<input type="checkbox" id="bt_menu"/>';
        echo '<label for="bt_menu"> </label>';
        echo '<nav class="menu-vertical">';
        echo '<ul>';

        echo '<li><a class="' . $this->MENU['HOME']['ICON'] . '" href="' . $this->MENU['HOME']['LINK'] . '">' . $this->MENU['HOME']['TEXT'] . '</a></li>';
//        TMessenger::debbug($this->MENU_ITENS);
        foreach ($this->MENU_ITENS AS $KEY => $VALEU) {

            if (!is_array($VALEU)) {
                echo '<li><a class="' . $this->MENU[$VALEU]['ICON'] . '" href="' . $this->MENU[$VALEU]['LINK'] . '">' . $this->MENU[$VALEU]['TEXT'] . '</a></li>';
            } else {
                echo '<li><a class="mn-icon" href="#">' . $this->MENU[$KEY]['TEXT'] . '</a><ul>';
                foreach ($VALEU as $keys) {
                    echo '<li><a class="' . $this->MENU[$KEY][$keys]['ICON'] . '" href="' . $this->MENU[$KEY][$keys]['LINK'] . '">' . $this->MENU[$KEY][$keys]['TEXT'] . '</a></li>';
                }
                echo '</ul></li>';
            }
        }
        echo '<li><a class="' . $this->MENU['LOGOUT']['ICON'] . '" href="' . $this->MENU['LOGOUT']['LINK'] . '">' . $this->MENU['LOGOUT']['TEXT'] . '</a></li>';


        echo'</ul>';
        echo '</nav>';
        echo '</div>';
    }

    public function set($key, $value = '') {
        if (empty($value)) {
            $this->MENU_ITENS[$key] = $key;
        } else {
            $this->MENU_ITENS[$key][] = $value;
        }
    }

    public function setArray($array = array()) {
        $this->MENU_ITENS = $array;
    }

}
