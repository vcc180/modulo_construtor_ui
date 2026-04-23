<form method="POST">
    <div class="box">
        <h1 class="title-box">Editar Icons</h1>
        <?php
        //recebe os dados do formulário
        $modelo->getDataForm();
        //grava no banco a aula
        $modelo->update();

        if (!isset($_POST['data'])) {
            $modelo->db = new Database();
            $modelo->form_data = $modelo->db->select('tbicons', '*', 'where icons_id=' . $_REQUEST['icons_id']);
            $modelo->form_data = $modelo->form_data[0];
        }
        ?>
        <div class="formulario">
            
            <div class="field"> <legend>Nome:</legend>
                <input class="txt_input" type="text" name="data[icons_nome]" value="<?php echo isset($modelo->form_data['icons_nome']) ? $modelo->form_data['icons_nome'] : '' ?>"/>
            </div>
            

            <div class="field"> <legend>Icon:</legend>
                <input class="txt_input" type="text" name="data[icons_icon]" value="<?php echo isset($modelo->form_data['icons_icon']) ? $modelo->form_data['icons_icon'] : '' ?>"/>
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
        window.location.href = "<?php echo HOME_URI . 'icons/'; ?>";
    }
    const novo = () => {
        window.location.href = "<?php echo HOME_URI . 'icons/cadastro/'; ?>";
    }
</script>