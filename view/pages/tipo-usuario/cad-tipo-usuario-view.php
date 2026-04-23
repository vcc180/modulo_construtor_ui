<form method="POST">
    <div class="box">
        <h1 class="title-box">Cadastro de Tipo Usuário</h1>
        <?php
        $dados = [];//armazena daos
        //recebe os dados do formulário
        $modelo->getDataForm();
        //grava no banco a aula
        $modelo->save();
        ?>
        <div class="formulario">
            <div class="field">
                <legend>Descrição:</legend>
                <input class="txt_input" type="text" name="data[user_type_descricao]"
                    value="<?php echo isset($modelo->form_data['user_type_descricao']) ? $modelo->form_data['user_type_descricao'] : '' ?>" />
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
            echo '<div class="box"><H1 class="title-box">' . $value->TITLE . "</H1><BR>";
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
        <input class="button button-green" type="submit" name="Salvar" value="Salvar" />
    </div>
</form>

<script>
    const voltar = () => {
        window.location.href = "<?php echo HOME_URI . 'tipo-usuario/'; ?>";
    }
    const novo = () => {
        window.location.href = "<?php echo HOME_URI . 'tipo-usuario/cadastro/'; ?>";
    }

    function setVisible(input, id) {

        if (input.checked === true) {
            document.getElementById(id).style = 'visibility: visible;';
        }
        if (input.checked === false) {
            document.getElementById(id).style = 'visibility: hidden;';
        }
    }
</script>