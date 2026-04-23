<form method="POST">
    <div class="box">
        <h1 class="title-box">Cadastro de Menu</h1>
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
                    <?php TForm::setInputSelect('menu_projeto_id', 'tbprojeto', 'projeto_id', 'projeto_title', $modelo, 'ORDER BY projeto_title DESC'); ?>
                </div>
            <div class="field">
                <legend>Título:</legend>
                <input id="menu_title" class="txt_input" type="text" name="data[menu_title]"
                    value="<?php echo isset($modelo->form_data['menu_title']) ? $modelo->form_data['menu_title'] : '' ?>" />
            </div>

            <div class="field">
                <legend>Nome:</legend>
                <input id="menu_nome" class="txt_input" type="text" name="data[menu_nome]"
                    value="<?php echo isset($modelo->form_data['menu_nome']) ? $modelo->form_data['menu_nome'] : '' ?>" />
            </div>

            <div class="field">
                <legend>Submentu:</legend>
                <input class="txt_input" type="checkbox" name="data[menu_submenu]" value="true" <?php echo isset($modelo->form_data['menu_submenu']) && $modelo->form_data['menu_submenu'] == true ? 'checked' : '' ?> />
            </div>

            <div class="field">
                <legend>Icone:</legend>
                <input id="menu_icon" class="txt_input" type="text" name="data[menu_icon]"
                    value="<?php echo isset($modelo->form_data['menu_icon']) ? $modelo->form_data['menu_icon'] : '' ?>" />
                <div id="iconList">
                    <?php
                    $db = new Database();
                    $icons = $db->select('tbicons', "*");
                    if (count($icons) > 0) {
                        foreach ($icons as $key => $value) {
                            echo "<i data-icon=\"{$value['icons_icon']}\" class=\"{$value['icons_icon']}\"></i>";
                        }
                    }
                    ?>
                </div>
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
        window.location.href = "<?php echo HOME_URI . 'menu/'; ?>";
    }
    const novo = () => {
        window.location.href = "<?php echo HOME_URI . 'menu/cadastro/'; ?>";
    }
    const lista = document.getElementById('iconList');
    const input = document.getElementById('menu_icon');
    const icons = document.getElementById("menu_icon");
    const menu_title = document.getElementById("menu_title");
    const menu_nome = document.getElementById("menu_nome");

    lista.addEventListener('click', function (e) {
        if (e.target.tagName === 'I') {
            const icon = e.target.getAttribute('data-icon');
            input.value = icon;
        }
    });

    menu_title.addEventListener('input', function () {
        let texto = menu_title.value;

        let convertido = texto
            .toUpperCase()                 // tudo minúsculo
            .normalize('NFD')             // separa acentos
            .replace(/[\u0300-\u036f]/g, '') // remove acentos
            .replace(/\s+/g, '_')         // espaços vira "-"
            .replace(/[^\w-]+/g, '')      // remove caracteres especiais
            .replace(/--+/g, '-')         // evita "--"
            .replace(/^-+|-+$/g, '');     // remove "-" do início/fim

        menu_nome.value = convertido;

    });
</script>