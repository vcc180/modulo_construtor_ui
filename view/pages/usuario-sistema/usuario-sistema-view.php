<?php
$this->parametros[1] = str_replace("-", ' ', isset($this->parametros[1]) ? (string) $this->parametros[1] : '');
$DB = new Database();
?>
<div class="box">
    <table style="width: 100%;">
        <tr>
            <td style="font-weight: bold;">Usuário:</td>
            <td style="font-weight: bold;">Tipos de Usuário:</td>
            <td></td>
        </tr>
        <tr>
            <td>
                <input id="search" type="text" name="search" placeholder="Digite o nome do Usuário ou E-mail"
                    class="txt_input icon-search"
                    value="<?php echo (isset($this->parametros[0]) && $this->parametros[0] == 'search' && $this->parametros[1] != 'NULL') ? $this->parametros[1] : '' ?>" />
            </td>
            <td>
                <select class="txt_input" id="tipo_usuario" name="data[tipo_usuario]">
                    <option value="NULL">Selecione o tipo usuário</option>
                    <?php
                    //DADOS DO SELECT DO CAMPO ANO LETIVO
                    $TIPOS_USUARIOS = $DB->select('tbuser_type', 'user_type_id, user_type_descricao', 'WHERE user_type_id!=1');

                    //ARMAZENA O INDEX DO SELECT DO SELECT
                    $SELECT = isset($this->parametros[2]) ? $this->parametros[2] : '';
                    if (count($TIPOS_USUARIOS) > 0) {

                        foreach ($TIPOS_USUARIOS as $KEY => $VALUE) {
                            if ($VALUE['user_type_id'] == $SELECT) {
                                echo '<option selected value="' . $VALUE['user_type_id'] . '">' . $VALUE['user_type_descricao'] . "</option>";
                            } else {
                                echo '<option value="' . $VALUE['user_type_id'] . '">' . $VALUE['user_type_descricao'] . "</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </td>
            <td>
                <input class="button button-green" type="submit" name="novo"
                    onclick="Location('usuario-sistema/cadastro')" value="Cadastrar" />
            </td>
        </tr>
    </table>
</div>


<div class="box">
    <h1 class="title-box">USUÁRIOS DO SISTEMA</h1>
    <?php
    $modelo->ativar_desativar();

    $where = 'WHERE ';
    $where .= isset($this->parametros[1]) && $this->parametros[1] != 'NULL' ? 'user_name LIKE "' . strtoupper($this->parametros[1]) . '%" ' : '';
    $where .= isset($this->parametros[2]) && $this->parametros[2] != 'NULL' ? 'AND fk_user_type_id="' . $this->parametros[2] . '" ' : '';
    $where .= $_SESSION['USER_DATA']['fk_user_type_id'] == 1 ? '' : ' AND fk_user_type_id!=1 ';
    $where .= 'ORDER BY user_id DESC';

    $table = new TTable(new Database(), 'view_users', 'user_id, user_name,user_email,user_type_descricao,IF(user_ativo=true,"Sim","Não")', $where);
    $table->setNumbResgistros(20);
    $table->setTitle('#', TTable::ALIGN_CENTER, '5%');
    $table->setTitle('NOME', TTable::ALIGN_CENTER, '10%');
    $table->setTitle('E-MAIL', TTable::ALIGN_CENTER, '10%');
    $table->setTitle('TIPO USUÁRIO', TTable::ALIGN_CENTER, '10%');
    $table->setTitle('ATIVO', TTable::ALIGN_CENTER, '10%');
    $table->setTitle('AÇÃO', TTable::ALIGN_CENTER, '10%');


    $LINK = HOME_URI . 'usuario-sistema/editar/?';
    $table->setAction('<i title="Editar" class="fa fa-pencil-alt"></i>', $LINK, array('user_id'));

    $LINK = setURL('usuario-sistema/recuperar_senha?');
    $table->setAction('<i title="Mudar Senha" class="fa fa-lock"></i>', $LINK, array('user_id'));

    $LINK = setURL('usuario-sistema/?active=false&');
    $table->setAction('<i title="Ativar/Desativar" class="fa fa-eye"></i>', $LINK, array('user_id'));

    $table->show();
    ?>

</div>

<script type="text/javascript">
    function Novo() {
        window.location.href = '<?php echo HOME_URI . 'usuario-sistema/cadastro' ?>';
    }
    $('#search').on('keydown', function (e) {
        if (e.which == 13) {
            Pesquisar();
            event.preventDefault();
            return;
        }
    });
    document.getElementById('tipo_usuario').onchange = function () {
        Pesquisar();
    }
    function Pesquisar() {
        var search = document.getElementById('search').value;
        var tipo_user = document.getElementById('tipo_usuario').value;

        if (search == '') {
            search = "NULL";
        }

        while (search.indexOf(" ") != -1) {
            search = search.replace(" ", '-');
        }
        var url = '<?php echo HOME_URI . 'usuario-sistema/index/search/' ?>' + search + '/' + tipo_user;
        window.location.href = url;
    }
</script>