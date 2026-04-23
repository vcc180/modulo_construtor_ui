<?php
$filtros = [];
$WHERE = '';

if (isset($this->parametros[1]) && $this->parametros[1] != "NULL") {
    $filtros[] = "menu_title LIKE '%{$this->parametros[1]}%'";
}

if (isset($this->parametros[1]) && $this->parametros[1] != "NULL") {
    $filtros[] = "menu_nome LIKE '%{$this->parametros[1]}%'";
}

if (!empty($filtros)) {
    $WHERE = 'WHERE ' . implode(' AND ', $filtros);
}
?>
<div class='box'>
    <h1 class='title-box'><i class='fa fa-search'></i> Filtros:</h1>
    <div class='filtros'>
        <div class="field">
            <legend>Pesquisar</legend>
            <input id="search" class="txt_input" type="text" name="search" placeholder="Digite Título, Nome"
                value="<?php echo isset($this->parametros[1]) && $this->parametros[1] != "NULL" ? $this->parametros[1] : '' ?>" />
        </div>
        <div class="field">
            <legend>&nbsp;</legend><button onclick="Location('menu/cadastro')" class="button button-blue"><i
                    class="fa fa-plus-circle"></i> CADASTRAR</button>
        </div>
    </div>
</div>
<div class="box">
    <h1 class="title-box">MENU</h1>
    <?php
    $modelo->setEnable();
    $modelo->delete();


    $WHERE .= " ORDER BY menu_id DESC";

    $tab = new TTable(
        new Database(),
        'view_menu',
        "menu_id,projeto_title,menu_title, menu_nome, IF(menu_submenu=1,'Ativo','Desativado'), icons_icon, IF(menu_status=1,'Ativo','Desativado')",
        $WHERE
    );

    $tab->setNumbResgistros(25);

    $LINK_VIEW = HOME_URI . 'menu/detalhe/?';
    $LINK_EDITAR = HOME_URI . 'menu/editar/?';
    $LINK_DELETE = HOME_URI . 'menu/index/?action=delete&confirm=false&';
    $LINK_ENABLE_DISABLE = HOME_URI . 'menu/index/?action=enable&';

    $tab->setTitle('#', TTable::ALIGN_CENTER);

    $tab->setTitle('Projeto', TTable::ALIGN_CENTER);
    $tab->setTitle('Título', TTable::ALIGN_CENTER);
    $tab->setTitle('Nome', TTable::ALIGN_CENTER);
    $tab->setTitle('Submentu', TTable::ALIGN_CENTER);
    $tab->setTitle('Icone', TTable::ALIGN_CENTER);
    $tab->setTitle('Status', TTable::ALIGN_CENTER);


    $tab->setTitle('Ação', TTable::ALIGN_CENTER, '15%');
    $tab->setAction('<i class="fa fa-search"></i>', $LINK_VIEW, array('menu_id'));
    $tab->setAction('<i class="fa fa-pencil-alt"></i>', $LINK_EDITAR, array('menu_id'));
    $tab->setAction('<i class="fa fa-trash"></i>', $LINK_DELETE, array('menu_id', 'menu_title'));
    $tab->setAction("<i class='fa fa-eye'></i>", $LINK_ENABLE_DISABLE, array('menu_id', 'menu_title'));

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
                #<?php echo $_REQUEST['menu_id'] . " - " . $_REQUEST['menu_title'] ?>
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
        window.location.href = "<?php echo HOME_URI . 'menu/'; ?>";
    }
    function Confirmar() {
        window.location.href = "<?php echo isset($_REQUEST['menu_id']) ? HOME_URI . "menu/index/?action=delete&confirm=true&menu_id={$_REQUEST['menu_id']}&" : ''; ?>";
    }


    function search() {
        var search = document.getElementById('search').value;

        if (search === '' || search === "NULL") {
            search = "NULL";
        }

        var url = "<?php echo HOME_URI ?>menu/index/search/" + search;
        window.location.href = url;
    }

    document.getElementById('search').addEventListener('keyup', function (e) {
        if (e.key === 'Enter') {
            search();
        }
    });

</script>