<form method="POST">
    <div class="box">
        <h1 class="title-box">Cadastro de Módulos</h1>
        <?php
        $dados = [];//armazena daos
        //recebe os dados do formulário
        $modelo->getDataForm();
        //grava no banco a aula
        $modelo->save();
        ?>
        <div class="formulario">


            <div class="field">
                <legend>Projeto:</legend>
                <?php TForm::setInputSelect('modulos_projeto_id', 'tbprojeto', 'projeto_id', 'projeto_title', $modelo, 'ORDER BY projeto_title DESC'); ?>
            </div>


            <div class="field">
                <legend>Título:</legend>
                <input id="modulos_title" class="txt_input" type="text" name="data[modulos_title]"
                    value="<?php echo isset($modelo->form_data['modulos_title']) ? $modelo->form_data['modulos_title'] : '' ?>" />
            </div>


            <div class="field">
                <legend>Módulo:</legend>
                <input id="modulo" class="txt_input" type="text" name="data[modulos_modulo]"
                    value="<?php echo isset($modelo->form_data['modulos_modulo']) ? $modelo->form_data['modulos_modulo'] : '' ?>" />
            </div>


            <div class="field">
                <legend>Controller:</legend>
                <input id="controller" class="txt_input" type="text" name="data[modulos_controller]"
                    value="<?php echo isset($modelo->form_data['modulos_controller']) ? $modelo->form_data['modulos_controller'] : '' ?>" />
            </div>


            <div class="field">
                <legend>Model:</legend>
                <input id="model" class="txt_input" type="text" name="data[modulos_model]"
                    value="<?php echo isset($modelo->form_data['modulos_model']) ? $modelo->form_data['modulos_model'] : '' ?>" />
            </div>


            <div class="field">
                <legend>Tabela:</legend>
                <input id="table" class="txt_input" type="text" name="data[modulos_table]"
                    value="<?php echo isset($modelo->form_data['modulos_table']) ? $modelo->form_data['modulos_table'] : '' ?>" />
            </div>


            <div class="field">
                <legend>Prefixo:</legend>
                <input id="prefixo" class="txt_input" type="text" name="data[modulos_db_prefixo]"
                    value="<?php echo isset($modelo->form_data['modulos_db_prefixo']) ? $modelo->form_data['modulos_db_prefixo'] : '' ?>" />
            </div>

            <div class="field">
                <legend>Primary Key:</legend>
                <input class="txt_input" type="text" name="data[modulos_primary_key]"
                    value="<?php echo isset($modelo->form_data['modulos_primary_key']) ? $modelo->form_data['modulos_primary_key'] : '' ?>" />
            </div>

            <div class="field">
                <legend>Campo padrão:</legend>
                <input class="txt_input" type="text" name="data[modulos_field_default]"
                    value="<?php echo isset($modelo->form_data['modulos_field_default']) ? $modelo->form_data['modulos_field_default'] : '' ?>" />
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
        window.location.href = "<?php echo HOME_URI . 'modulos/'; ?>";
    }
    const novo = () => {
        window.location.href = "<?php echo HOME_URI . 'modulos/cadastro/'; ?>";
    }

    const inputOriginal = document.getElementById('modulos_title');
    const modulo = document.getElementById('modulo');
    const controller = document.getElementById('controller');
    const model = document.getElementById('model');
    const table = document.getElementById('table');
    const prefixo = document.getElementById('prefixo');


    inputOriginal.addEventListener('input', function () {
        let texto = inputOriginal.value;

        let convertido = texto
            .toLowerCase()                 // tudo minúsculo
            .normalize('NFD')             // separa acentos
            .replace(/[\u0300-\u036f]/g, '') // remove acentos
            .replace(/\s+/g, '-')         // espaços vira "-"
            .replace(/[^\w-]+/g, '')      // remove caracteres especiais
            .replace(/--+/g, '-')         // evita "--"
            .replace(/^-+|-+$/g, '');     // remove "-" do início/fim

        modulo.value = convertido.replace("-", "_");
        controller.value = modulo.value + "-controller";
        model.value = modulo.value + "-model";
        table.value = "tb" + modulo.value;
        prefixo.value = modulo.value + "_";
    });
</script>