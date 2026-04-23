
        <?php
            $filtros = [];
            $WHERE = '';
            
                    if (isset($this->parametros[2]) && $this->parametros[2] != "NULL") {
                        $filtros[] = "modulos_projeto_id = '{$this->parametros[2]}'";
                    }
                
                    if (isset($this->parametros[1]) && $this->parametros[1] != "NULL") {
                        $filtros[] = "modulos_title LIKE '%{$this->parametros[1]}%'";
                    } 
                
            if (!empty($filtros)) {
                $WHERE = 'WHERE ' . implode(' AND ', $filtros);
            }
        ?>
    <div class='box'><h1 class='title-box'><i class='fa fa-search'></i> Filtros:</h1><div class='filtros'>
        <div class="field">
            <legend>Pesquisar</legend>
            <input id="search" class="txt_input" type="text" name="search" placeholder="Digite Título" value="<?php echo isset($this->parametros[1]) && $this->parametros[1] != "NULL" ? $this->parametros[1] : '' ?>"/>
        </div>
    
                    <div class="field">
                        <legend>Projeto</legend>
                        <?php
                        $SELECT = "";
                        if (isset($this->parametros[2]) && $this->parametros[2] != "NULL")
                        {
                            $SELECT = $this->parametros[2];
                        }
                        TForm::setInputSelect('modulos_projeto_id', 'tbprojeto', 'projeto_id', 'projeto_title', $modelo, 'ORDER BY projeto_title DESC', $SELECT); 
                        ?>
                    </div>
                <div class="field"><legend>&nbsp;</legend><button onclick="Location('modulos/cadastro')" class="button button-blue"><i class="fa fa-plus-circle"></i> CADASTRAR</button></div></div></div>
<div class="box">
    <h1 class="title-box">MÓDULOS</h1>
    <?php
    $modelo->setEnable();
    $modelo->delete();
    

    $WHERE .= " ORDER BY modulos_id DESC";

    $tab = new TTable(
        new Database(),
        'view_modulos',
        "modulos_id,projeto_title, modulos_title, modulos_modulo, modulos_controller, modulos_model, modulos_table, modulos_db_prefixo, modulos_primary_key, modulos_field_default, IF(modulos_field_status=1,'Ativo','Desativado')",
        $WHERE
    );

    $tab->setNumbResgistros(25);

    $LINK_VIEW = HOME_URI . 'modulos/detalhe/?';
    $LINK_EDITAR = HOME_URI . 'modulos/editar/?';
    $LINK_DELETE = HOME_URI . 'modulos/index/?action=delete&confirm=false&';
    $LINK_ENABLE_DISABLE = HOME_URI . 'modulos/index/?action=enable&';

    $tab->setTitle('#', TTable::ALIGN_CENTER);

    $tab->setTitle('Projeto', TTable::ALIGN_CENTER);
$tab->setTitle('Título', TTable::ALIGN_CENTER);
$tab->setTitle('Módulo', TTable::ALIGN_CENTER);
$tab->setTitle('Controller', TTable::ALIGN_CENTER);
$tab->setTitle('Model', TTable::ALIGN_CENTER);
$tab->setTitle('Tabela', TTable::ALIGN_CENTER);
$tab->setTitle('Prefixo', TTable::ALIGN_CENTER);
$tab->setTitle('Primary key', TTable::ALIGN_CENTER);
$tab->setTitle('Campo padrão', TTable::ALIGN_CENTER);
$tab->setTitle('Campo status', TTable::ALIGN_CENTER);


    $tab->setTitle('Ação', TTable::ALIGN_CENTER, '15%');
    $tab->setAction('<i class="fa fa-search"></i>', $LINK_VIEW, array('modulos_id'));
    $tab->setAction('<i class="fa fa-pencil-alt"></i>', $LINK_EDITAR, array('modulos_id'));
    $tab->setAction('<i class="fa fa-trash"></i>', $LINK_DELETE, array('modulos_id','modulos_title'));
    $tab->setAction("<i class='fa fa-eye'></i>",$LINK_ENABLE_DISABLE , array('modulos_id', 'modulos_title'));

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
                Tem certeza que deseja excluir o item nº #<?php echo $_REQUEST['modulos_id'] . " - " . $_REQUEST['modulos_title']?>
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
        window.location.href = "<?php echo HOME_URI . 'modulos/'; ?>";
    }
    function Confirmar() {
        window.location.href = "<?php echo isset($_REQUEST['modulos_id']) ? HOME_URI . "modulos/index/?action=delete&confirm=true&modulos_id={$_REQUEST['modulos_id']}&" : ''; ?>";
    }

    
		function search() {
			var search = document.getElementById('search').value;

			if (search === '' || search === "NULL") {
				search = "NULL";
			}
	
				var modulos_projeto_id = document.getElementById('modulos_projeto_id').value;

				if (modulos_projeto_id === '' || modulos_projeto_id === "NULL") {
					modulos_projeto_id = "NULL";
				}
			
			var url = "<?php echo HOME_URI ?>modulos/index/search/" + search  + '/' + modulos_projeto_id;
			window.location.href = url;
		}
	
				document.getElementById('modulos_projeto_id').addEventListener('change', search);
			
		document.getElementById('search').addEventListener('keyup', function(e) {
			if (e.key === 'Enter') {
				search();
			}
		});
	
</script>
