<form method="POST">
    <div class="box">
        <h1 class="title-box">Editar Tipo Usuário</h1>
        <?php
        //recebe os dados do formulário
        $modelo->getDataForm();
        //grava no banco a aula
        $modelo->update();

        if (!isset($_POST['data'])) {
            $modelo->db = new Database();
            $modelo->form_data = $modelo->db->select('tbuser_type', '*', 'where user_type_id=' . $_REQUEST['user_type_id']);
            $modelo->form_data = $modelo->form_data[0];
        }
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

<script>
    const voltar = () => {
        window.location.href = "<?php echo HOME_URI . 'tipo-usuario/'; ?>";
    }
    const novo = () => {
        window.location.href = "<?php echo HOME_URI . 'tipo-usuario/cadastro/'; ?>";
    }
</script>