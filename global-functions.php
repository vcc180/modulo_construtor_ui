<?php

/**
 * Verifica chaves de arrays
 *
 * Verifica se a chave existe no array e se ela tem algum valor.
 * Obs.: Essa função está no escopo global, pois, vamos precisar muito da mesma.
 *
 * @param array  $array O array
 * @param string $key   A chave do array
 * @return string|null  O valor da chave do array ou nulo
 */

spl_autoload_register('autoload');

function chk_array($array, $key)
{
    // Verifica se a chave existe no array
    if (isset($array[$key]) && !empty($array[$key])) {
        // Retorna o valor da chave
        return $array[$key];
    }
    // Retorna nulo por padrão
    return null;
}

function limit_text($text, $num = 255)
{
    if (strlen($text) >= $num) {
        return substr($text, 0, $num) . ' [...]';
    } else {
        return substr($text, 0, $num);
    }
}

function convertDataSQL($data)
{
    $res = explode('/', $data);
    return $res[2] . '-' . $res[1] . '-' . $res[0];
}

function convertDateSqlToData($data, $separador = "-")
{
    $res = explode('-', $data);
    return $res[2] . $separador . $res[1] . $separador . $res[0];
}

function getIcon($name)
{
    $icon = new TElement('image');
    $icon->class = $name;
    return $icon->Get();
}

function setURL($url)
{
    return HOME_URI . $url;
}

function setRedirect($url)
{
    echo '<script>window.location.href = "' . HOME_URI . $url . '";</script>';
}

function formatCurrencySQL($valor)
{
    $tmp = str_replace('.', '', $valor);
    $tmp = str_replace(',', '.', $tmp);
    return $tmp;
}

// chk_array
/**
 * Função para carregar automaticamente todas as classes padrão
 * Ver: http://php.net/manual/pt_BR/function.autoload.php.
 * Nossas classes estão na pasta classes/.
 * O nome do arquivo deverá ser class-NomeDaClasse.php.
 * Por exemplo: para a classe TutsupMVC, o arquivo vai chamar class-TutsupMVC.php
 */
function autoload($class_name)
{
    $file = PATH . '/libs/' . $class_name . '.class.php';
    //echo PATH . '/libs/' . $class_name . '.class.php' . '</br>';
    if (!file_exists($file)) {
        //require_once PATH . '/view/404.php';
        return;
    }
    // Inclui o arquivo da classe
    require_once $file;
}



function validaData($data)
{

    $DATA_ARRAY = explode('-', $data);
    $Y = (int) $DATA_ARRAY[0]; //PEGA O ANO
    $M = (int) $DATA_ARRAY[1]; //PEGA O MES
    $D = (int) $DATA_ARRAY[2]; //PEGA O DIA

    $NUM_DAYS = cal_days_in_month(CAL_GREGORIAN, $M, $Y);

    if ($M <= 0 || $M > 12) {
        return;
    }

    if ($NUM_DAYS < $D) {
        return FALSE;
    } else {
        return TRUE;
    }
    return FALSE;
}


function bissexto($ano)
{
    $bissexto = false;
    // Divisível por 4 e não divisível por 100 ou divisível por 400

    if ((($ano % 4) == 0 && ($ano % 100) != 0) || ($ano % 400) == 0) {
        $bissexto = true;
    }
    return $bissexto;
}

function GetContatoNotRead()
{
    $db = new Database();
    $array = $db->select('tbcontato', 'COUNT(*) AS COUNT', 'WHERE cont_status=true');
    return $array[0]['COUNT'];
}

function GeneratorIdUploadImg()
{
    return md5(date("d/m/y H:i:s"));
}

function getListData($data, $interacao)
{
    $ARRAY = array(); //VARIAVEL PARA ARMAZENAR TODAS AS NOVAS DATAS
    $DATA_ARRAY = explode('-', $data); //TRANSFORMA A DATA EM ARRAY

    $Y = (int) $DATA_ARRAY[0]; //PEGA O ANO
    $M = (int) $DATA_ARRAY[1]; //PEGA O MES
    $D = (int) $DATA_ARRAY[2]; //PEGA O DIA
    //VERIFICA SE É O MES DE FEVEREIRO

    if ($M == 2) {
        $ANO_BISSESTO = date('', strtotime('01-02' . $Y));
        $DATA = new DateTime($data);
        $DATA->setDate($Y, $M, 28);
    } else {
        $DATA = new DateTime($data);
    }

    for ($i = 1; $i <= $interacao; $i++) {
        $NEW_DATE = '01-' . $M . '-' . $Y;
        $N_D = date('t', strtotime($NEW_DATE));

        if ($D > $N_D) {
            $ND = $D - ($D - $N_D);
            $DATA->setDate($Y, $M, $ND);
            $ARRAY[] = $DATA->format("Y-m-d");
        } else {
            $DATA->setDate($Y, $M, $D);
            $ARRAY[] = $DATA->format("Y-m-d");
        }

        $DATA = new DateTime($data);
        $M++;
    }
    return $ARRAY;
}

function getNumberDays($dataA, $dataB)
{
    $database = date_create($dataA);
    $datadehoje = date_create($dataB);
    $resultado = date_diff($database, $datadehoje);
    $dias = date_interval_format($resultado, '%r%a');

    return $dias >= 0 ? $dias : 0;
}

function getJurosDias($VALOR, $JUROS, $DIAS)
{
    return number_format($VALOR * (($DIAS * $JUROS) / 100), 2, '.', '');
}

function getPaginacao($TOTAL_REGISTROS, $NUM_REGISTROS, $NUM_COLUMN, $PREVIEW_PAGE, $LAST_PAGE, $PAGE)
{
    $num = ceil($TOTAL_REGISTROS / $NUM_REGISTROS);
    echo '<tr><td colspan="' . $NUM_COLUMN . '" class="tb-cell-left link">';
    echo '<a href="?page=' . $PREVIEW_PAGE . '"><<</a>';
    if ($PAGE > 4) {
        for ($i = 2; $i >= 0; $i--) {
            $pag = $PAGE - $i;
            if ($pag <= $num) {
                $selected = ($PAGE == $pag) ? 'id="selected"' : '';
                echo '<a ' . $selected . ' href="?page=' . $pag . '">' . $pag . '</a>';
            } else {
                break;
            }
        }

        $pag = $PAGE + 1;
        for ($i = 0; $i < 2; $i++) {
            if ($pag <= $num) {
                $selected = ($PAGE == $pag) ? 'id="selected"' : '';
                echo '<a ' . $selected . ' href="?page=' . $pag . '">' . $pag . '</a>';
                $pag++;
            } else {
                break;
            }
        }
    } else {
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $num) {
                $selected = ($PAGE == $i) ? 'id="selected"' : '';
                echo '<a ' . $selected . ' href="?page=' . $i . '">' . $i . '</a>';
            }
        }
    }

    echo '<a  href="?page=' . $LAST_PAGE . '">>></a>';
    echo '</td></tr>';
}

function getPage()
{

    $PAGE = 1;
    //VERIFICA SE A VARIAVEL PAGE FOI CRIADA
    if (isset($_GET['page'])) {
        $page = $_GET['page']; //PEGA O VALOR DA PÁGINA
        //SE FOR VÁZIA
        if (!$page) {
            $PAGE = 1; //ADD 1 COMO VALOR PADRÃO
            //SE NÃO FOR VAZIA
        } else {
            $PAGE = $page; //ADD VALOR DA PÁGINA ATUAL
        }//END IF
        //SE NÃO FOI CRIADA A VARIAVEL PAGE
    } else {
        $PAGE = 1;
    }//END IF

    return $PAGE;
}

function FormatData($data, $format = "d/m/Y")
{
    $DATA_FORMAT = new DateTime($data);
    return $DATA_FORMAT->format($format);
}

function valorExtenso($valor = 0, $tipo = 1)
{
    $rt = '';
    $valor = strval($valor);
    $valor = str_replace(",", ".", $valor);

    if ($tipo == 1) {
        $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
        $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões", "quatrilhões");
    } else {
        $pos = strpos($valor, ".");
        $valor = substr($valor, 0, $pos);
        $singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
        $plural = array(
            "",
            "",
            "mil",
            "milhões",
            "bilhões",
            "trilhões",
            "quatrilhões"
        );
    }

    $c = array("", "cem", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
    $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa");
    $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezesete", "dezoito", "dezenove");
    $u = array("", "um", "dois", "três", "quatro", "cinco", "seis", "sete", "oito", "nove");
    $z = 0;

    $valor = number_format($valor, 2, ".", ".");

    $inteiro = explode(".", $valor);

    for ($i = 0; $i < count($inteiro); $i++)
        for ($ii = strlen($inteiro[$i]); $ii < 3; $ii++)
            $inteiro[$i] = "0" . $inteiro[$i];



    $fim = count($inteiro) - ($inteiro[count($inteiro) - 1] > 0 ? 1 : 2);

    for ($i = 0; $i < count($inteiro); $i++) {
        $valor = $inteiro[$i];
        $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
        $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
        $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

        $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
        $t = count($inteiro) - 1 - $i;
        $r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";

        if ($valor == "000")
            $z++;
        elseif ($z > 0)
            $z--;
        if (($t == 1) && ($z > 0) && ($inteiro[0] > 0))
            $r .= (($z > 1) ? " de " : "") . $plural[$t];
        if ($r)
            $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? (($i < $fim) ? " e " : " e ") : " ") . $r;
    }
    return $rt;
}

function getNameMounth($mes)
{
    $return = '';
    switch ($mes) {
        case "01":
            $return = 'Janeiro';
            break;
        case "02":
            $return = 'Fevereiro';
            break;
        case "03":
            $return = 'Março';
            break;
        case "04":
            $return = 'Abril';
            break;
        case "05":
            $return = 'Maio';
            break;
        case "06":
            $return = 'Junho';
            break;
        case "07":
            $return = 'Julho';
            break;
        case "08":
            $return = 'Agosto';
            break;
        case "09":
            $return = 'Setembro';
            break;
        case "10":
            $return = 'Outubro';
            break;
        case "11":
            $return = 'Novembro';
            break;
        case "12":
            $return = 'Dezembro';
            break;

        default:
            break;
    }
    return $return;
}
