<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TTable
 *
 * @author EGSM
 */
class TTable {

    const ALIGN_LEFT = 'tb-cell-left';
    const ALIGN_RIGHT = 'tb-cell-right';
    const ALIGN_CENTER = 'tb-cell-center';
    const ALIGN_JUSTIFY = 'tb-cell-justify';

    //put your code here
    private $PARAM;                //PARAMETROS DA TABELA
    private $CONTAINER = array();  //ARMAZENA OS REGISTROS
    private $TITLE = array();      //ARMAZENA OS TITULOS
    private $ALIGN = array();      //ARMAZENA OS TITULOS
    private $NUM_REGISTROS = 10;    //NÚMERO DE REGISTROS A SEREM EXIBIDOS
    private $TOTAL_REGISTROS;      //NÚMERO DE REGISTROS A SEREM EXIBIDOS
    private $INICIO = 0;           //ARMAZENA O VALOR MIN PARA SER ULTILIZADA NA CONSULTA SQL
    private $FIM;                  //ARMAZENA O VALOR MAX PARA SER ULTILIZADA NA CONSULTA SQL
    private $PAGE;                 //ARMAZENA O NÚMERO DE PÁGINA
    private $PREVIEW_PAGE;         //PRIMEIRA PÁGINA
    private $LAST_PAGE;            //ÚLTIMA PÁGINA
    private $DATABASE;             //CONEXAO COM O BANCO DE DADOS
    private $TABLE;                //TABELA PESQUISA
    private $CAMPOS;               //CAMPOS
    private $WHERE;                //CONDIÇÃO SQL
    private $QUERY_SQL;            //CONDIÇÃO SQL
    private $ACTIONS = array();        //ARMAZENA OS ACTIONS
    private $IS_ACTIONS = FALSE;   //ARMAZENA OS ACTIONS
    private $LEGEND = "";   //ARMAZENA OS ACTIONS

    public function __construct($db, $tabela, $campos = '*', $where = '') {
        $this->DATABASE = $db;
        $this->TABLE = $tabela;
        $this->CAMPOS = $campos;
        $this->WHERE = $where;
    }

    public function show() {

//        echo '<table class="tb">';
        echo '<table class="tb" cellspacing="0">';
        if(!empty($this->LEGEND)){
            echo  '<tr><td class="tb-legend" colspan="' . count($this->TITLE) .  '">'. $this->LEGEND . '</td></tr>';
        }
        $this->getPage();
        $this->getTotalRegistro();
        $this->getTitle();
        $this->getContainer();
        $this->getPaginacao();
        echo '</table>';

        //echo $this->PAGE;
    }

    public function setLegend($legend) {
        $this->LEGEND = $legend;
    }
    public function __set($param, $value) {
        $this->PARAM[$param] = $value;
    }

    public function setAction($text, $link, $param, $target=false) {
        $this->ACTIONS[] = array('TEXT' => $text, 'LINK' => $link, 'FIELD' => $param,'TARGET'=>$target);
    }

    /*
     * @FUNCTION: getPaginacao
     * @PARAM: VALUE (STRING)
     * @DESCRIPTION: ADD LEGENDA TABELA.
     */

    private function getTotalRegistro() {
        $rest = $this->DATABASE->select($this->TABLE, 'count(*) as TOTAL', $this->WHERE);
        $this->TOTAL_REGISTROS = $rest[0]['TOTAL'];
    }

    /*
     * @FUNCTION: getPaginacao
     * @PARAM: VALUE (STRING)
     * @DESCRIPTION: ADD LEGENDA TABELA.
     */

    private function getPaginacao() {
        $num = ceil($this->TOTAL_REGISTROS / $this->NUM_REGISTROS);
        echo '<tr><td colspan="' . count($this->TITLE) . '" class="tb-cell-left link">';
        echo '<a href="?page=' . $this->PREVIEW_PAGE . '"><<</a>';

        if ($this->PAGE > 4) {
            for ($i = 2; $i >= 0; $i--) {
                $pag = $this->PAGE - $i;
                if ($pag <= $num) {
                    $selected =  ($this->PAGE == $pag) ? 'id="selected"' : '' ;
                    echo '<a '. $selected .' href="?page=' . $pag . '">' . $pag . '</a>';
                } else {
                    break;
                }
            }

            $pag = $this->PAGE + 1;
            for ($i = 0; $i < 2; $i++) {
                if ($pag <= $num) {
                    $selected =  ($this->PAGE == $pag) ? 'id="selected"' : '' ;
                    echo '<a '. $selected .' href="?page=' . $pag . '">' . $pag . '</a>';
                    $pag++;
                } else {
                    break;
                }
            }
        } else {
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $num) {
                    $selected =  ($this->PAGE == $i) ? 'id="selected"' : '' ;
                    echo '<a '. $selected .' href="?page=' . $i . '">' . $i . '</a>';
                }
            }
        }
        echo '<a  href="?page=' . $this->LAST_PAGE . '">>></a>';
        echo '</td></tr>';
    }

    /*
     * @FUNCTION: getContainer
     * @PARAM: VALUE (STRING)
     * @DESCRIPTION: ADD LEGENDA TABELA.
     */

    private function getContainer() {
        $this->INICIO = $this->PAGE - 1;
        $this->INICIO = $this->INICIO * $this->NUM_REGISTROS;

        $this->PREVIEW_PAGE = 0;
        $this->LAST_PAGE = ceil($this->TOTAL_REGISTROS / $this->NUM_REGISTROS);

        $this->CONTAINER = $this->DATABASE->select($this->TABLE, $this->CAMPOS, $this->WHERE . ' LIMIT ' . $this->INICIO . ',' . $this->NUM_REGISTROS);
        
        if (is_array($this->CONTAINER)) {
            foreach ($this->CONTAINER as $key => $value) {
                echo '<tr>';
                $i = 0;
                foreach ($value as $val) {
                    echo '<td class="' . $this->ALIGN[$i] . '">' . $val . '</td>';
                    $i++;
                }
                if (count($this->ACTIONS) > 0) {
                    ECHO '<td class="' . $this->ALIGN[$i] . '">';
                    $i = 1;
                    $NUMBS_ACTIONS = count($this->ACTIONS);
                    foreach ($this->ACTIONS as $item) {
                        $target = $item['TARGET'] === true ? 'target="_blank"' : '';
                        echo '<a class="link" href="' . $item['LINK'];

                        foreach ($item['FIELD'] as $field) {
                            if (!is_array($field)) {
                                echo $field . '=' . $value[$field] . '&';
                            }else{
                                echo $field[0] .'='. $field[1] . '&';
                            }
                        }
                        echo ($i < $NUMBS_ACTIONS) ?  '"' .  $target .'>' . $item['TEXT'] . '</a> | ' : '"' .  $target .'>' . $item['TEXT'] . '</a>';
                        $i++;
                    }
                    ECHO '</td>';
                }
                echo '</tr>';
            }
            
        }
    }

    /*
     * @FUNCTION: setTitle
     * @PARAM: VALUE (STRING)
     * @DESCRIPTION: ADD LEGENDA TABELA.
     */

    private function getTitle() {
        if (is_array($this->TITLE)) {
            echo '<tr>';
            foreach ($this->TITLE as $value) {
                echo $value;
            }
            echo '</tr>';
        }
    }

    /*
     * @FUNCTION: setTitle
     * @PARAM: VALUE (STRING)
     * @DESCRIPTION: ADD LEGENDA TABELA.
     */

    public function setTitle($value, $align, $w = '') {
        $this->ALIGN[] = $align;
        if (empty($w)) {
            $this->TITLE[] = '<td class="tb-title">' . $value . '</td>';
        } else {
            $this->TITLE[] = '<td class="tb-title" style="width:' . $w . ';">' . $value . '</td>';
        }
        //$this->TITLE[] = $value; //ADD NUMERO DE REGISTRO A SER EXIBIDO
    }

    /*
     * @FUNCTION: setNumbRegistros
     * @PARAM: VALUE (NUMERICO)
     * @DESCRIPTION: ALTERAR O VALOR PADRÃO DO NÚMERO
     * DE REGISTROS A SER EXIBIDO.
     */

    public function setNumbResgistros($value) {
        $this->NUM_REGISTROS = $value; //ADD NUMERO DE REGISTRO A SER EXIBIDO
    }

    /*
     * @FUNCTION: getPage
     * @DESCRIPTION: PEGA O VALOR DA PÁGINA ATUAL.
     */

    private function getPage() {
        //VERIFICA SE A VARIAVEL PAGE FOI CRIADA
        if (isset($_GET['page'])) {
            $page = $_GET['page']; //PEGA O VALOR DA PÁGINA
            //SE FOR VÁZIA
            if (!$page) {
                $this->PAGE = 1; //ADD 1 COMO VALOR PADRÃO
                //SE NÃO FOR VAZIA
            } else {
                $this->PAGE = $page; //ADD VALOR DA PÁGINA ATUAL
            }//END IF
            //SE NÃO FOI CRIADA A VARIAVEL PAGE
        } else {
            $this->PAGE = 1;
        }//END IF
    }

}
