
        <?php
            $filtros = [];
            $WHERE = '';
            
                    if (isset($this->parametros[1]) && $this->parametros[1] != "NULL") {
                        $filtros[] = "icons_nome LIKE '%{$this->parametros[1]}%'";
                    } 
                
            if (!empty($filtros)) {
                $WHERE = 'WHERE ' . implode(' AND ', $filtros);
            }
        ?>
    <div class='box'><h1 class='title-box'><i class='fa fa-search'></i> Filtros:</h1><div class='filtros'>
        <div class="field">
            <legend>Pesquisar</legend>
            <input id="search" class="txt_input" type="text" name="search" placeholder="Digite Nome" value="<?php echo isset($this->parametros[1]) && $this->parametros[1] != "NULL" ? $this->parametros[1] : '' ?>"/>
        </div>
    <div class="field"><legend>&nbsp;</legend><button onclick="Location('icons/cadastro')" class="button button-blue"><i class="fa fa-plus-circle"></i> CADASTRAR</button></div></div></div>
<div class="box">
    <h1 class="title-box">ICONS</h1>
    <?php
    $modelo->setEnable();
    $modelo->delete();
    

    $WHERE .= " ORDER BY icons_id DESC";

    $tab = new TTable(
        new Database(),
        'tbicons',
        "icons_id,icons_nome, icons_icon",
        $WHERE
    );

    $tab->setNumbResgistros(25);

    $LINK_VIEW = HOME_URI . 'icons/detalhe/?';
    $LINK_EDITAR = HOME_URI . 'icons/editar/?';
    $LINK_DELETE = HOME_URI . 'icons/index/?action=delete&confirm=false&';
    

    $tab->setTitle('#', TTable::ALIGN_CENTER);

    $tab->setTitle('Nome', TTable::ALIGN_CENTER);
$tab->setTitle('Icon', TTable::ALIGN_CENTER);


    $tab->setTitle('Ação', TTable::ALIGN_CENTER, '15%');
    $tab->setAction('<i class="fa fa-search"></i>', $LINK_VIEW, array('icons_id'));
    $tab->setAction('<i class="fa fa-pencil-alt"></i>', $LINK_EDITAR, array('icons_id'));
    $tab->setAction('<i class="fa fa-trash"></i>', $LINK_DELETE, array('icons_id','icons_nome'));
    

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
                Tem certeza que deseja excluir o item nº #<?php echo $_REQUEST['icons_id'] . " - " . $_REQUEST['icons_nome']?>
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
        window.location.href = "<?php echo HOME_URI . 'icons/'; ?>";
    }
    function Confirmar() {
        window.location.href = "<?php echo isset($_REQUEST['icons_id']) ? HOME_URI . "icons/index/?action=delete&confirm=true&icons_id={$_REQUEST['icons_id']}&" : ''; ?>";
    }

    
		function search() {
			var search = document.getElementById('search').value;

			if (search === '' || search === "NULL") {
				search = "NULL";
			}
	
			var url = "<?php echo HOME_URI ?>icons/index/search/" + search ;
			window.location.href = url;
		}
	
		document.getElementById('search').addEventListener('keyup', function(e) {
			if (e.key === 'Enter') {
				search();
			}
		});
	
</script>
