<form method="POST">
    <div class="box">
        <h1 class="title-box">Cadastro de Submenu</h1>
        <?php
        $dados = [];//armazena daos
        //recebe os dados do formulário
        $modelo->getDataForm();
        //grava no banco a aula
        $modelo->save();
        ?>
        <div class="formulario">


            <div class="field">
                <legend>Menu:</legend>
                <?php TForm::setInputSelect('submenu_menu_id', 'tbmenu', 'menu_id', 'menu_title', $modelo, 'ORDER BY menu_title DESC'); ?>
            </div>


            <div class="field">
                <legend>Nome:</legend>
                <input class="txt_input" type="text" name="data[submenu_nome]"
                    value="<?php echo isset($modelo->form_data['submenu_nome']) ? $modelo->form_data['submenu_nome'] : '' ?>" />
            </div>


            <div class="field">
                <legend>Título:</legend>
                <input class="txt_input" type="text" name="data[submenu_title]"
                    value="<?php echo isset($modelo->form_data['submenu_title']) ? $modelo->form_data['submenu_title'] : '' ?>" />
            </div>


            <div class="field">
                <legend>Link:</legend>
                <input class="txt_input" type="text" name="data[submenu_link]"
                    value="<?php echo isset($modelo->form_data['submenu_link']) ? $modelo->form_data['submenu_link'] : '' ?>" />
            </div>



        </div>
    </div>

    <div class="box">
        <button type="button" onclick="voltar()" class="button button-blue"><i class="fa fa-undo"></i> Voltar</button>
        <button type="button" onclick="novo()" class="button button-blue"><i class="fa fa-plus"></i> Novo</button>
        <input class="button button-green" type="submit" name="Salvar" value="Salvar" />
    </div>
</form>

<script>
    const voltar = () => {
        window.location.href = "<?php echo HOME_URI . 'submenu/'; ?>";
    }
    const novo = () => {
        window.location.href = "<?php echo HOME_URI . 'submenu/cadastro/'; ?>";
    }
</script>