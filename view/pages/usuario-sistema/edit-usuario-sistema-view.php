<form method="post">
    <div class="box">
        <h1 class="title-box">PERMISSÕES DE USUÁRIOS</h1><br>
        <?php
        $DB = new Database();

        $modelo->getDataForm();
        $modelo->update();


        $USER = $DB->select('tbuser', '*', 'WHERE user_id="' . $_REQUEST['user_id'] . '"');
        $USER = $USER[0];
        $USER['user_permissions'] = unserialize($USER['user_permissions']);
        ?>
        <div class="formulario">
            <div class="field">
                <legend>Permissão:</legend>
                <?PHP
                $campo = 'permissaso_user';
                $SELECT = (isset($modelo->form_data[$campo])) ? $modelo->form_data[$campo] : $USER['fk_user_type_id'];
                $WHERE = ($_SESSION['USER_DATA']['fk_user_type_id'] == 1) ? '' : 'WHERE user_type_id!=1';
                TForm::setInputSelect($campo, 'tbuser_type', 'user_type_id', 'user_type_descricao', $modelo, $WHERE, $SELECT);
                ?>
            </div>
            <div class="field">
                <legend>Nome:</legend>
                <?php
                $campo = 'nome_user';
                TForm::InputText(TForm::TYPE_INPUT_TEXT, $campo, $USER['user_name'], '500');
                ?>
            </div>
            <div class="field">
                <legend>E-mail:</legend>
                <?php
                $campo = 'email_user';
                TForm::InputText(TForm::TYPE_INPUT_TEXT, $campo, $USER['user_email'], '500px');
                ?>
            </div>
        </div>
    </div>


    <?php
    //EXIBE TODAS AS PERMISSÕES
    
    $PERMISSIOES = \Plugin\PHPSidebar\PHPSidebar::getPermissoes();
    $PERMISSIOES = $PERMISSIOES->MENUS;
    $i = 1;

    foreach ($PERMISSIOES as $key => $value) {
        if ($value->TITLE != 'HOME' && $value->TITLE != "SAIR") {
            echo '<div class="box"><h1 class="title-box">' . $value->TITLE . "</h1>";
            if (property_exists($value, 'MENUS')) {
                $MENU = $key;
                foreach ($value->MENUS as $k => $v) {
                    $TITLE = $k;
                    $CHECKED = ($USER['user_permissions']['MENU'][$MENU][$TITLE] == $TITLE) ? 'checked' : '';
                    echo '<input ' . $CHECKED . ' class="input_txt" type="checkbox" name="data[MENU][' . $MENU . '][' . $TITLE . ']" id="id' . $i . '" value="' . $TITLE . '"/><label for="id' . $i . '"> ' . $v->TITLE . '</label><BR>';
                    $i++;
                }
            }
            echo '</div>';
        }
    }
    ?>

    <div class="box">
        <button type="button" onclick="voltar()" class="button button-blue"><i class="fa fa-undo"></i> Voltar</button>
        <button type="button" onclick="novo()" class="button button-blue"><i class="fa fa-plus"></i> Novo</button>
        <input class="button button-green" type="submit" name="Salvar" value="Atualizar" />
    </div>
</form>
<script type="text/javascript">

    function setVisible(input, id) {

        if (input.checked === true) {
            document.getElementById(id).style = 'visibility: visible;';
        }
        if (input.checked === false) {
            document.getElementById(id).style = 'visibility: hidden;';
        }
    }
    const voltar = () => {
        window.location.href = "<?php echo HOME_URI . 'usuario-sistema/'; ?>";
    }

    const novo = () => {
        window.location.href = '<?php echo HOME_URI . 'usuario-sistema/cadastro' ?>';
    }
    $('#search').on('keydown', function (e) {
        if (e.which == 13) {
            event.preventDefault();
            return;
        }
    });
    function Pesquisar() {
        var search = document.getElementById('search').value;
        while (search.indexOf(" ") != -1) {
            search = search.replace(" ", '-');
        }
        var url = '<?php echo HOME_URI . 'usuario-sistema/index/search/' ?>' + search + '/';
        window.location.href = url;
    }
</script>