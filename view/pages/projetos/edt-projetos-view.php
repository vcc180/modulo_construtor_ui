<form method="POST">
    <div class="box">
        <h1 class="title-box">Editar Projetos</h1>
        <?php
        //recebe os dados do formulário
        $modelo->getDataForm();
        //grava no banco a aula
        $modelo->update();

        if (!isset($_POST['data'])) {
            $modelo->db = new Database();
            $modelo->form_data = $modelo->db->select('tbprojeto', '*', 'where projeto_id=' . $_REQUEST['projeto_id']);
            $modelo->form_data = $modelo->form_data[0];
        }
        ?>
        <div class="formulario">

            <div class="field">
                <legend>Título:</legend>
                <input id="projeto_title" class="txt_input" type="text" name="data[projeto_title]"
                    value="<?php echo isset($modelo->form_data['projeto_title']) ? $modelo->form_data['projeto_title'] : '' ?>" />
            </div>


            <div class="field">
                <legend>Nome:</legend>
                <input id="modulo" class="txt_input" type="text" name="data[projeto_name]"
                    value="<?php echo isset($modelo->form_data['projeto_name']) ? $modelo->form_data['projeto_name'] : '' ?>" />
            </div>


            <div class="field">
                <legend>Diretório raiz:</legend>
                <input id="path" class="txt_input" type="text" name="data[projeto_path]"
                    value="<?php echo isset($modelo->form_data['projeto_path']) ? $modelo->form_data['projeto_path'] : '' ?>" />
            </div>


            <div class="field">
                <legend>URL:</legend>
                <input id="url" class="txt_input" type="text" name="data[projeto_url]"
                    value="<?php echo isset($modelo->form_data['projeto_url']) ? $modelo->form_data['projeto_url'] : '' ?>" />
            </div>


            <div class="field">
                <legend>Hostname:</legend>
                <input class="txt_input" type="text" name="data[projeto_db_hostname]"
                    value="<?php echo isset($modelo->form_data['projeto_db_hostname']) ? $modelo->form_data['projeto_db_hostname'] : '' ?>" />
            </div>


            <div class="field">
                <legend>Database:</legend>
                <input id="basedados" class="txt_input" type="text" name="data[projeto_db_database]"
                    value="<?php echo isset($modelo->form_data['projeto_db_database']) ? $modelo->form_data['projeto_db_database'] : '' ?>" />
            </div>


            <div class="field">
                <legend>Username:</legend>
                <input class="txt_input" type="text" name="data[projeto_user]"
                    value="<?php echo isset($modelo->form_data['projeto_user']) ? $modelo->form_data['projeto_user'] : '' ?>" />
            </div>


            <div class="field">
                <legend>Password:</legend>
                <input class="txt_input" type="text" name="data[projeto_password]"
                    value="<?php echo isset($modelo->form_data['projeto_password']) ? $modelo->form_data['projeto_password'] : '' ?>" />
            </div>


            <div class="field">
                <legend>Status:</legend>
                <input class="txt_input" type="checkbox" name="data[projeto_status]" value="true" <?php echo isset($modelo->form_data['projeto_status']) && $modelo->form_data['projeto_status'] == true ? 'checked' : '' ?> />
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
        window.location.href = "<?php echo HOME_URI . 'projetos/'; ?>";
    }
    const novo = () => {
        window.location.href = "<?php echo HOME_URI . 'projetos/cadastro/'; ?>";
    }

    const projeto_title = document.getElementById('projeto_title');
    const modulo = document.getElementById('modulo');
    const path = document.getElementById('path');
    const database = document.getElementById('basedados');
    const url = document.getElementById('url');

    projeto_title.addEventListener('input', function () {
        let texto = projeto_title.value;

        let convertido = texto
            .toLowerCase()                 // tudo minúsculo
            .normalize('NFD')             // separa acentos
            .replace(/[\u0300-\u036f]/g, '') // remove acentos
            .replace(/\s+/g, '-')         // espaços vira "-"
            .replace(/[^\w-]+/g, '')      // remove caracteres especiais
            .replace(/--+/g, '-')         // evita "--"
            .replace(/^-+|-+$/g, '');     // remove "-" do início/fim
        
        modulo.value = convertido;
        path.value = "C:\\xampp\\htdocs\\" + modulo.value;
        database.value = modulo.value.replace("-", "_");
        url.value = "http://localhost/" + modulo.value.replace("-", "_");
    });
</script>