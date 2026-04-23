<form method="POST">
    <div class="box">
        <h1 class="title-box">Editar Módulos</h1>
        <?php
        //recebe os dados do formulário
        $modelo->getDataForm();
        //grava no banco a aula
        $modelo->update();

        if (!isset($_POST['data'])) {
            $modelo->db = new Database();
            $modelo->form_data = $modelo->db->select('tbmodulos', '*', 'where modulos_id=' . $_REQUEST['modulos_id']);
            $modelo->form_data = $modelo->form_data[0];
        }
        ?>
        <div class="formulario">
            

                <div class="field">
                    <legend>Projeto:</legend>
                    <?php TForm::setInputSelect('modulos_projeto_id', 'tbprojeto', 'projeto_id', 'projeto_title', $modelo, 'ORDER BY projeto_title DESC'); ?>
                </div>
                

            <div class="field"> <legend>Título:</legend>
                <input class="txt_input" type="text" name="data[modulos_title]" value="<?php echo isset($modelo->form_data['modulos_title']) ? $modelo->form_data['modulos_title'] : '' ?>"/>
            </div>
            

            <div class="field"> <legend>Módulo:</legend>
                <input class="txt_input" type="text" name="data[modulos_modulo]" value="<?php echo isset($modelo->form_data['modulos_modulo']) ? $modelo->form_data['modulos_modulo'] : '' ?>"/>
            </div>
            

            <div class="field"> <legend>Controller:</legend>
                <input class="txt_input" type="text" name="data[modulos_controller]" value="<?php echo isset($modelo->form_data['modulos_controller']) ? $modelo->form_data['modulos_controller'] : '' ?>"/>
            </div>
            

            <div class="field"> <legend>Model:</legend>
                <input class="txt_input" type="text" name="data[modulos_model]" value="<?php echo isset($modelo->form_data['modulos_model']) ? $modelo->form_data['modulos_model'] : '' ?>"/>
            </div>
            

            <div class="field"> <legend>Tabela:</legend>
                <input class="txt_input" type="text" name="data[modulos_table]" value="<?php echo isset($modelo->form_data['modulos_table']) ? $modelo->form_data['modulos_table'] : '' ?>"/>
            </div>
            

            <div class="field"> <legend>Prefixo:</legend>
                <input class="txt_input" type="text" name="data[modulos_db_prefixo]" value="<?php echo isset($modelo->form_data['modulos_db_prefixo']) ? $modelo->form_data['modulos_db_prefixo'] : '' ?>"/>
            </div>
            

            <div class="field"> <legend>Primary Key:</legend>
                <input class="txt_input" type="text" name="data[modulos_primary_key]" value="<?php echo isset($modelo->form_data['modulos_primary_key']) ? $modelo->form_data['modulos_primary_key'] : '' ?>"/>
            </div>
            

            <div class="field"> <legend>Campo padrão:</legend>
                <input class="txt_input" type="text" name="data[modulos_field_default]" value="<?php echo isset($modelo->form_data['modulos_field_default']) ? $modelo->form_data['modulos_field_default'] : '' ?>"/>
            </div>
            

            <div class="field"> <legend>Campo Status:</legend>
                <input class="txt_input" type="checkbox" name="data[modulos_field_status]" value="true"  <?php echo  isset($modelo->form_data['modulos_field_status']) && $modelo->form_data['modulos_field_status'] ==true ? 'checked' : '' ?>/>
            </div>
            

        </div>
    </div>
    <div class="box">
        <button type="button" onclick="voltar()" class="button button-blue"><i class="fa fa-undo"></i> Voltar</button>
        <button type="button" onclick="novo()" class="button button-blue"><i class="fa fa-plus"></i> Novo</button>
        <input class="button button-green" type="submit" name="Salvar" value="Atualizar" />
    </div>
</form>

<script>
    const voltar = () => {
        window.location.href = "<?php echo HOME_URI . 'modulos/'; ?>";
    }
    const novo = () => {
        window.location.href = "<?php echo HOME_URI . 'modulos/cadastro/'; ?>";
    }
</script>