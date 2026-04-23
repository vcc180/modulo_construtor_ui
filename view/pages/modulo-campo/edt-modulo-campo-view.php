<form method="POST">
    <div class="box">
        <h1 class="title-box">Editar Módulo Campo</h1>
        <?php
        //recebe os dados do formulário
        $modelo->getDataForm();
        //grava no banco a aula
        $modelo->update();

        if (!isset($_POST['data'])) {
            $modelo->db = new Database();
            $modelo->form_data = $modelo->db->select('tbmodulo_campo', '*', 'where modulo_campo_id=' . $_REQUEST['modulo_campo_id']);
            $modelo->form_data = $modelo->form_data[0];
        }
        ?>
        <div class="formulario">
            

                <div class="field">
                    <legend>Módulo:</legend>
                    <?php TForm::setInputSelect('modulo_campo_modulo_id', 'tbmodulos', 'modulos_id', 'modulos_title', $modelo, 'ORDER BY modulos_title DESC'); ?>
                </div>
                

            <div class="field"> <legend>Nome:</legend>
                <input class="txt_input" type="text" name="data[modulo_campo_nome]" value="<?php echo isset($modelo->form_data['modulo_campo_nome']) ? $modelo->form_data['modulo_campo_nome'] : '' ?>"/>
            </div>
            

            <div class="field"> <legend>Título:</legend>
                <input class="txt_input" type="text" name="data[modulo_campo_title]" value="<?php echo isset($modelo->form_data['modulo_campo_title']) ? $modelo->form_data['modulo_campo_title'] : '' ?>"/>
            </div>
            


                <div class="field">
                    <legend>Tipo:</legend>
                    <?php TForm::setInputSelect('modulo_campo_tipo', 'tbtipo_campo', 'tipo_campo_id', 'tipo_campo_nome', $modelo, 'ORDER BY tipo_campo_nome DESC'); ?>
                </div>
                

            <div class="field"> <legend>É uma chave estrangeira:</legend>
                <input class="txt_input" type="checkbox" name="data[modulo_campo_fk]" value="true"  <?php echo  isset($modelo->form_data['modulo_campo_fk']) && $modelo->form_data['modulo_campo_fk'] ==true ? 'checked' : '' ?>/>
            </div>
            

            <div class="field"> <legend>Tabela que referencia:</legend>
                <input class="txt_input" type="text" name="data[modulo_campo_reference_table]" value="<?php echo isset($modelo->form_data['modulo_campo_reference_table']) ? $modelo->form_data['modulo_campo_reference_table'] : '' ?>"/>
            </div>
            

            <div class="field"> <legend>Chave que faz referencia:</legend>
                <input class="txt_input" type="text" name="data[modulo_campo_reference_key]" value="<?php echo isset($modelo->form_data['modulo_campo_reference_key']) ? $modelo->form_data['modulo_campo_reference_key'] : '' ?>"/>
            </div>
            

            <div class="field"> <legend>Campo que será exibido:</legend>
                <input class="txt_input" type="text" name="data[modulo_campo_reference_option]" value="<?php echo isset($modelo->form_data['modulo_campo_reference_option']) ? $modelo->form_data['modulo_campo_reference_option'] : '' ?>"/>
            </div>
            

            <div class="field"> <legend>Requirido:</legend>
                <input class="txt_input" type="checkbox" name="data[modulo_campo_required]" value="true"  <?php echo  isset($modelo->form_data['modulo_campo_required']) && $modelo->form_data['modulo_campo_required'] ==true ? 'checked' : '' ?>/>
            </div>
            

            <div class="field"> <legend>É um filtro:</legend>
                <input class="txt_input" type="checkbox" name="data[modulo_campo_is_search]" value="true"  <?php echo  isset($modelo->form_data['modulo_campo_is_search']) && $modelo->form_data['modulo_campo_is_search'] ==true ? 'checked' : '' ?>/>
            </div>
            

            <div class="field"> <legend>Status:</legend>
                <input class="txt_input" type="checkbox" name="data[modulo_campo_status]" value="true"  <?php echo  isset($modelo->form_data['modulo_campo_status']) && $modelo->form_data['modulo_campo_status'] ==true ? 'checked' : '' ?>/>
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
        window.location.href = "<?php echo HOME_URI . 'modulo-campo/'; ?>";
    }
    const novo = () => {
        window.location.href = "<?php echo HOME_URI . 'modulo-campo/cadastro/'; ?>";
    }
</script>