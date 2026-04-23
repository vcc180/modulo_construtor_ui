
<div class="box">
    <h1 class="title-box">RECUPERAÇÃO DE SENHA DO USUÁRIOS</h1><br>
    <?php
    $DB = new Database();
    $modelo->getDataForm();


    $USER = $DB->select('tbuser', '*', 'WHERE user_id="' . $_GET['user_id'] . '"');
    $USER = $USER[0];
    $modelo->update_password();
    ?>
    <form id="formulario" method="POST">
        <table  class="detalhe-view" style="width: auto;">
            <tr>
                <td style="font-weight: bold;text-align: right;">Nome:</td>
                <td colspan="4">
                    <?php
                    $campo = 'nome_user';
                    TForm::InputText(TForm::TYPE_INPUT_TEXT, $campo, $USER['user_name'], '500', '', '', true);
                    ?>
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;text-align: right;">E-mail:</td>
                <td colspan="4">
                    <?php
                    $campo = 'email_user';
                    TForm::InputText(TForm::TYPE_INPUT_TEXT, $campo, $USER['user_email'], '500px', '', '', true);
                    ?>
                </td>
            </tr>

        <tr>
            <td style="font-weight: bold;text-align: right;">Nova Senha:</td>
            <td colspan="4">
                <?php
                $campo = 'password';
                TForm::InputText(TForm::TYPE_INPUT_PASSWORD, $campo, isset($modelo->form_data[$campo]) ? $modelo->form_data[$campo] : '', '500', true, $campo);
                ?>
            </td>
        </tr>
        <tr>
            <td style="font-weight: bold;text-align: right;">Re-Senha:</td>
            <td colspan="4">
                <?php
                $campo = 'recuver_password';
                TForm::InputText(TForm::TYPE_INPUT_PASSWORD, $campo, isset($modelo->form_data[$campo]) ? $modelo->form_data[$campo] : '', '500px', true, $campo);
                ?>
            </td>
        </tr>
    </table>
</div>

<div class="box">
    <?php
    TForm::InputButton('Voltar', 'Voltar', "Location('usuario-sistema')", 'button button-blue');
    TForm::InputButton('Atualizar', 'Atualizar', 'submit()', 'button button-green');
    ?>
</div>
</form>

