
        <?php
            $filtros = [];
            $WHERE = '';
            
                    if (isset($this->parametros[2]) && $this->parametros[2] != "NULL") {
                        $filtros[] = "submenu_menu_id = '{$this->parametros[2]}'";
                    }
                
                    if (isset($this->parametros[1]) && $this->parametros[1] != "NULL") {
                        $filtros[] = "submenu_nome LIKE '%{$this->parametros[1]}%'";
                    } 
                
                    if (isset($this->parametros[1]) && $this->parametros[1] != "NULL") {
                        $filtros[] = "submenu_title LIKE '%{$this->parametros[1]}%'";
                    } 
                
            if (!empty($filtros)) {
                $WHERE = 'WHERE ' . implode(' AND ', $filtros);
            }
        ?>
    <div class='box'><h1 class='title-box'><i class='fa fa-search'></i> Filtros:</h1><div class='filtros'>
        <div class="field">
            <legend>Pesquisar</legend>
            <input id="search" class="txt_input" type="text" name="search" placeholder="Digite Nome, Título" value="<?php echo isset($this->parametros[1]) && $this->parametros[1] != "NULL" ? $this->parametros[1] : '' ?>"/>
        </div>
    
                    <div class="field">
                        <legend>Menu</legend>
                        <?php
                        $SELECT = "";
                        if (isset($this->parametros[2]) && $this->parametros[2] != "NULL")
                        {
                            $SELECT = $this->parametros[2];
                        }
                        TForm::setInputSelect('submenu_menu_id', 'tbmenu', 'menu_id', 'menu_title', $modelo, 'ORDER BY menu_title DESC', $SELECT); 
                        ?>
                    </div>
                <div class="field"><legend>&nbsp;</legend><button onclick="Location('submenu/cadastro')" class="button button-blue"><i class="fa fa-plus-circle"></i> CADASTRAR</button></div></div></div>
<div class="box">
    <h1 class="title-box">SUBMENU</h1>
    <?php
    $modelo->setEnable();
    $modelo->delete();
    

    $WHERE .= " ORDER BY submenu_id DESC";

    $tab = new TTable(
        new Database(),
        'view_submenu',
        "submenu_id,menu_title, submenu_nome, submenu_title, submenu_link, IF(submenu_status=1,'Ativo','Desativado')",
        $WHERE
    );

    $tab->setNumbResgistros(25);

    $LINK_VIEW = HOME_URI . 'submenu/detalhe/?';
    $LINK_EDITAR = HOME_URI . 'submenu/editar/?';
    $LINK_DELETE = HOME_URI . 'submenu/index/?action=delete&confirm=false&';
    $LINK_ENABLE_DISABLE = HOME_URI . 'submenu/index/?action=enable&';

    $tab->setTitle('#', TTable::ALIGN_CENTER);

    $tab->setTitle('Menu', TTable::ALIGN_CENTER);
$tab->setTitle('Nome', TTable::ALIGN_CENTER);
$tab->setTitle('Título', TTable::ALIGN_CENTER);
$tab->setTitle('Link', TTable::ALIGN_CENTER);
$tab->setTitle('Status', TTable::ALIGN_CENTER);


    $tab->setTitle('Ação', TTable::ALIGN_CENTER, '15%');
    $tab->setAction('<i class="fa fa-search"></i>', $LINK_VIEW, array('submenu_id'));
    $tab->setAction('<i class="fa fa-pencil-alt"></i>', $LINK_EDITAR, array('submenu_id'));
    $tab->setAction('<i class="fa fa-trash"></i>', $LINK_DELETE, array('submenu_id','submenu_title'));
    $tab->setAction("<i class='fa fa-eye'></i>",$LINK_ENABLE_DISABLE , array('submenu_id', 'submenu_title'));

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
                Tem certeza que deseja excluir o item nº #<?php echo $_REQUEST['submenu_id'] . " - " . $_REQUEST['submenu_title']?>
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
        window.location.href = "<?php echo HOME_URI . 'submenu/'; ?>";
    }
    function Confirmar() {
        window.location.href = "<?php echo isset($_REQUEST['submenu_id']) ? HOME_URI . "submenu/index/?action=delete&confirm=true&submenu_id={$_REQUEST['submenu_id']}&" : ''; ?>";
    }

    
		function search() {
			var search = document.getElementById('search').value;

			if (search === '' || search === "NULL") {
				search = "NULL";
			}
	
				var submenu_menu_id = document.getElementById('submenu_menu_id').value;

				if (submenu_menu_id === '' || submenu_menu_id === "NULL") {
					submenu_menu_id = "NULL";
				}
			
			var url = "<?php echo HOME_URI ?>submenu/index/search/" + search  + '/' + submenu_menu_id;
			window.location.href = url;
		}
	
				document.getElementById('submenu_menu_id').addEventListener('change', search);
			
		document.getElementById('search').addEventListener('keyup', function(e) {
			if (e.key === 'Enter') {
				search();
			}
		});
	
</script>
