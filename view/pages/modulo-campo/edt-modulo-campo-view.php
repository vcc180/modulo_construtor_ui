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
            <div class="field">
                <legend>Título:</legend>
                <input id="modulo_campo_title" class="txt_input" type="text" name="data[modulo_campo_title]" value="<?php echo isset($modelo->form_data['modulo_campo_title']) ? $modelo->form_data['modulo_campo_title'] : '' ?>" />
            </div>
            <div class="field">
                <legend>Nome:</legend>
                <input id="modulo_campo_nome" class="txt_input" type="text" name="data[modulo_campo_nome]" value="<?php echo isset($modelo->form_data['modulo_campo_nome']) ? $modelo->form_data['modulo_campo_nome'] : '' ?>" />
            </div>
            <div class="field">
                <legend>Tipo:</legend>
                <?php TForm::setInputSelect('modulo_campo_tipo', 'tbtipo_campo', 'tipo_campo_id', 'tipo_campo_nome', $modelo, 'ORDER BY tipo_campo_nome DESC'); ?>
            </div>
            <div class="field">
                <legend>É uma chave estrangeira:</legend>
                <input id="modulo_campo_fk" class="txt_input" type="checkbox" name="data[modulo_campo_fk]" value="true" <?php echo  isset($modelo->form_data['modulo_campo_fk']) && $modelo->form_data['modulo_campo_fk'] == true ? 'checked' : '' ?> />
            </div>
            <div id="table_ref" style="display: none;">
                <div class="field">
                    <legend>Tabela que referencia:</legend>
                    <?php TForm::setInputSelect('modulo_campo_reference_table', 'tbmodulos', 'modulos_table', 'modulos_table', $modelo, 'ORDER BY modulos_table ASC'); ?>
                </div>
                <div class="field">
                    <legend>Chave que faz referencia:</legend>
                    <select id="reference_key" class="txt_input" name="data[modulo_campo_reference_key]">
                        <option value="">Selecione um campo</option>
                    </select>
                </div>
                <div class="field">
                    <legend>Campo que será exibido:</legend>
                    <select id="reference_option" class="txt_input" name="data[modulo_campo_reference_option]">
                        <option value="">Selecione um campo</option>
                    </select>
                </div>
            </div>
            <div class="field">
                <legend>Requirido:</legend>
                <input class="txt_input" type="checkbox" name="data[modulo_campo_required]" value="true" <?php echo  isset($modelo->form_data['modulo_campo_required']) && $modelo->form_data['modulo_campo_required'] == true ? 'checked' : '' ?> />
            </div>
            <div class="field">
                <legend>É um filtro:</legend>
                <input class="txt_input" type="checkbox" name="data[modulo_campo_is_search]" value="true" <?php echo  isset($modelo->form_data['modulo_campo_is_search']) && $modelo->form_data['modulo_campo_is_search'] == true ? 'checked' : '' ?> />
            </div>
            <div class="field">
                <legend>Status:</legend>
                <input class="txt_input" type="checkbox" name="data[modulo_campo_status]" value="true" <?php echo  isset($modelo->form_data['modulo_campo_status']) && $modelo->form_data['modulo_campo_status'] == true ? 'checked' : '' ?> />
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
    const inputOriginal = document.getElementById('modulo_campo_title');
    const modulo_campo_nome = document.getElementById('modulo_campo_nome');
    const modulo_campo_fk = document.getElementById("modulo_campo_fk");

    document.getElementById("modulo_campo_reference_table").addEventListener("change", function() {
        let tabela = this.value;

        fetch("<?php echo HOME_URI ?>api/busca_campos.php?tabela=" + tabela)
            .then(response => response.json())
            .then(data => {
                let campoSelected = document.getElementById("reference_key");
                let campoSelected2 = document.getElementById("reference_option");

                campoSelected.innerHTML = '<option value="">Selecione um campo</option>';
                campoSelected2.innerHTML = '<option value="">Selecione um campo</option>';

                if (Array.isArray(data)) {
                    data.forEach(campo => {
                        let option = document.createElement("option");
                        option.value = campo;
                        option.textContent = campo;

                        campoSelected.appendChild(option);

                        // clona para o segundo select
                        campoSelected2.appendChild(option.cloneNode(true));
                    });
                } else {
                    console.error("Não é um array:", data);
                }
            })
            .catch(error => console.error("Erro no fetch:", error));
    });

    modulo_campo_fk.addEventListener("click", function(x) {
        if (this.checked) {
            document.getElementById("table_ref").style.display = "block";
        } else {
            document.getElementById("table_ref").style.display = "none";
            document.getElementById("modulo_campo_reference_table").selectedIndex = -1;
            document.getElementById("reference_key").selectedIndex = -1;
            document.getElementById("reference_option").selectedIndex = -1;
        }
    });

    inputOriginal.addEventListener('input', function() {
        let texto = inputOriginal.value;

        let convertido = texto
            .toLowerCase() // tudo minúsculo
            .normalize('NFD') // separa acentos
            .replace(/[\u0300-\u036f]/g, '') // remove acentos
            .replace(/\s+/g, '-') // espaços vira "-"
            .replace(/[^\w-]+/g, '') // remove caracteres especiais
            .replace(/--+/g, '-') // evita "--"
            .replace(/^-+|-+$/g, ''); // remove "-" do início/fim

        modulo_campo_nome.value = convertido.replace("-", "_");
    });
</script>