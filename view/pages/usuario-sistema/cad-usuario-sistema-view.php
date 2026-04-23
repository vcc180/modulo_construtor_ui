<form method="post">


    <div class="box">
        <h1 class="title-box">CADASTRO DE USUÁRIOS</h1>
        <?php
        $DB = new Database();
        $modelo->getDataForm();
        $modelo->Gravar();


        $USER = $DB->select('tbuser', '*', 'WHERE user_id="' . $_GET['user_id'] . '"');
        $USER = $USER[0];
        ?>

        <div class="formulario">
            <div class="field">
                <legend>Permissão:</legend>
                <?PHP
                $campo = 'permissaso_user';
                $SELECT = (isset($this->parametros[0])) ? $this->parametros[0] : '';
                $WHERE = ($_SESSION['USER_DATA']['fk_user_type_id'] == 1) ? '' : 'WHERE user_type_id!=1';
                TForm::setInputSelect($campo, 'tbuser_type', 'user_type_id', 'user_type_descricao', $modelo, $WHERE, $SELECT);
                ?>
            </div>

            <?php
            if (isset($this->parametros[0]) && $this->parametros[0] == 4) {
                echo '<div class="field"> <legend>Professor:</legend>';
                $campo = 'professor';
                TForm::setInputSelect($campo, 'tbprofessor', 'prof_id', 'prof_nome', $modelo);
                echo '</div>';
            }
            ?>

            <div class="field">
                <legend>Nome de Usuário:</legend>
                <?php
                $campo = 'nome_user';
                TForm::InputText(TForm::TYPE_INPUT_TEXT, $campo, isset($modelo->form_data[$campo]) ? $modelo->form_data[$campo] : '', '500');
                ?>
            </div>
            <div class="field">
                <legend>E-mail:</legend>
                <?php
                $campo = 'email_user';
                TForm::InputText(TForm::TYPE_INPUT_TEXT, $campo, isset($modelo->form_data[$campo]) ? $modelo->form_data[$campo] : '', '500px');
                ?>
            </div>
        </div><!--formulario-->
    </div><!--box-->

    <div class="box">
        <h1 class="title-box">INFORMAÇÕES DE ACESSO</h1>
        <div class="formulario">
            <div class="field">
                <legend>Senha:</legend>
                <?php
                $campo = 'password';
                TForm::InputText(TForm::TYPE_INPUT_PASSWORD, $campo, isset($modelo->form_data[$campo]) ? $modelo->form_data[$campo] : '', '500');
                ?>
            </div>
            <div class="field">
                <legend>Confirmar Senha:</legend>
                <?php
                $campo = 're_password';
                TForm::InputText(TForm::TYPE_INPUT_PASSWORD, $campo, isset($modelo->form_data[$campo]) ? $modelo->form_data[$campo] : '', '500');
                ?>
            </div>
        </div><!--formulario-->
    </div> <!--box-->
    <div class="box">
        <?php
        TForm::InputButton('Voltar', 'Voltar', "Location('usuario-sistema')", 'button button-blue');
        TForm::InputButton('Novo', 'Novo', "Location('usuario-sistema/cadastro/')", 'button button-blue');
        TForm::InputButton('Cadastrar', "Cadastrar", 'submit()', 'button button-green');
        ?>
    </div>
</form>


<script type="text/javascript">

    function setVisible(input, id) {

        if (input.checked === true) {
            document.getElementById(id).style = 'visibility: visible;';
        }
        if (input.checked === false) {
            document.getElementById(id).style = 'visibility: hidden;';
        }
    }

    document.getElementById('permissaso_user').onchange = function () {
        var url = '<?php echo HOME_URI . 'usuario-sistema/cadastro/' ?>' + this.value + '/';
        window.location.href = url;
    };




    function Novo() {
        window.location.href = '<?php echo HOME_URI . 'usuario-sistema/cadastro' ?>';
    }
    $('#search').on('keydown', function (e) {
        if (e.which == 13) {
            event.preventDefault();
            return;
        }
    });
    function Pesquisar() {
        var search = document.getElementById('search').value;
        while (search.indexOf(" ") != -1) {
            search = search.replace(" ", '-');
        }
        var url = '<?php echo HOME_URI . 'usuario-sistema/index/search/' ?>' + search + '/';
        window.location.href = url;
    }
</script>