<div class="box">
    <h1 class="title-box">TIPO USUÁRIO</h1>
    <button onclick="Location('tipo-usuario/cadastro')" class="button button-blue">
        <i class="fa fa-plus-circle"></i> CADASTRAR
    </button>
</div>

<div class="box">
    <?php
    $modelo->setEnable();
    $modelo->delete();

    $WHERE = "WHERE 1=1 ORDER BY user_type_id DESC";

    $tab = new TTable(
        new Database(),
        'tbuser_type',
        "user_type_id,user_type_descricao",
        $WHERE
    );

    $tab->setNumbResgistros(25);

    $LINK_VIEW = HOME_URI . 'tipo-usuario/detalhe/?';
    $LINK_EDITAR = HOME_URI . 'tipo-usuario/editar/?';
    $LINK_DELETE = HOME_URI . 'tipo-usuario/index/?action=delete&confirm=false&';


    $tab->setTitle('#', TTable::ALIGN_CENTER);

    $tab->setTitle('Descrição', TTable::ALIGN_CENTER);

    $tab->setTitle('Ação', TTable::ALIGN_CENTER, '15%');
    $tab->setAction('<i class="fa fa-search"></i>', $LINK_VIEW, array('user_type_id'));
    $tab->setAction('<i class="fa fa-pencil-alt"></i>', $LINK_EDITAR, array('user_type_id'));
    $tab->setAction('<i class="fa fa-trash"></i>', $LINK_DELETE, array('user_type_id', 'user_type_descricao'));


    $tab->show();
    ?>
</div>


<?php
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete' && $_REQUEST['confirm'] == 'false') {
    ?>
    <div id="messager-box-background">
        <div id="messager-box">
            <div id="messager-box-header">Excluir Item<a class="close" href="#" onclick="Fechar()">X</a></div>
            <div id="messager-box-content">
                Tem certeza que deseja excluir o item nº
                #<?php echo $_REQUEST['user_type_id'] . " - " . $_REQUEST['user_type_descricao'] ?>
            </div>
            <div id="messager-box-footer">
                <a class="button button-blue" href="#" onclick="Fechar()">Cancelar</a>
                <a class="button button-green" href="#" onclick="Confirmar()">Confirmar</a>
            </div>
        </div>
    </div>
    <?php
}
?>
<script>
    function Fechar() {
        window.location.href = "<?php echo HOME_URI . 'tipo-usuario/'; ?>";
    }
    function Confirmar() {
        window.location.href = "<?php echo isset($_REQUEST['user_type_id']) ? HOME_URI . "tipo-usuario/index/?action=delete&confirm=true&user_type_id={$_REQUEST['user_type_id']}&" : ''; ?>";
    }
</script>