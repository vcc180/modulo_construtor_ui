
        <?php
            $filtros = [];
            $WHERE = '';
            
                    if (isset($this->parametros[2]) && $this->parametros[2] != "NULL") {
                        $filtros[] = "modulo_campo_modulo_id = '{$this->parametros[2]}'";
                    }
                
                    if (isset($this->parametros[1]) && $this->parametros[1] != "NULL") {
                        $filtros[] = "modulo_campo_nome LIKE '%{$this->parametros[1]}%'";
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
    
                    <div class="field">
                        <legend>Módulo</legend>
                        <?php
                        $SELECT = "";
                        if (isset($this->parametros[2]) && $this->parametros[2] != "NULL")
                        {
                            $SELECT = $this->parametros[2];
                        }
                        TForm::setInputSelect('modulo_campo_modulo_id', 'tbmodulos', 'modulos_id', 'modulos_title', $modelo, 'ORDER BY modulos_title DESC', $SELECT); 
                        ?>
                    </div>
                <div class="field"><legend>&nbsp;</legend><button onclick="Location('modulo-campo/cadastro')" class="button button-blue"><i class="fa fa-plus-circle"></i> CADASTRAR</button></div></div></div>
<div class="box">
    <h1 class="title-box">MÓDULO CAMPO</h1>
    <?php
    $modelo->setEnable();
    $modelo->delete();
    

    $WHERE .= " ORDER BY modulo_campo_id DESC";

    $tab = new TTable(
        new Database(),
        'view_modulo_campo',
        "modulo_campo_id,modulos_title, modulo_campo_nome, modulo_campo_title, tipo_campo_nome, IF(modulo_campo_fk=1,'Ativo','Desativado'), modulo_campo_reference_table, modulo_campo_reference_key, modulo_campo_reference_option, IF(modulo_campo_required=1,'Ativo','Desativado'), IF(modulo_campo_is_search=1,'Ativo','Desativado'), IF(modulo_campo_status=1,'Ativo','Desativado')",
        $WHERE
    );

    $tab->setNumbResgistros(25);

    $LINK_VIEW = HOME_URI . 'modulo-campo/detalhe/?';
    $LINK_EDITAR = HOME_URI . 'modulo-campo/editar/?';
    $LINK_DELETE = HOME_URI . 'modulo-campo/index/?action=delete&confirm=false&';
    $LINK_ENABLE_DISABLE = HOME_URI . 'modulo-campo/index/?action=enable&';

    $tab->setTitle('#', TTable::ALIGN_CENTER);

    $tab->setTitle('Módulo', TTable::ALIGN_CENTER);
$tab->setTitle('Nome', TTable::ALIGN_CENTER);
$tab->setTitle('Título', TTable::ALIGN_CENTER);
$tab->setTitle('Tipo', TTable::ALIGN_CENTER);
$tab->setTitle('É uma chave estrangeira', TTable::ALIGN_CENTER);
$tab->setTitle('Tabela que referencia', TTable::ALIGN_CENTER);
$tab->setTitle('Chave que faz referencia', TTable::ALIGN_CENTER);
$tab->setTitle('Campo que será exibido', TTable::ALIGN_CENTER);
$tab->setTitle('Requirido', TTable::ALIGN_CENTER);
$tab->setTitle('É um filtro', TTable::ALIGN_CENTER);
$tab->setTitle('Status', TTable::ALIGN_CENTER);


    $tab->setTitle('Ação', TTable::ALIGN_CENTER, '15%');
    $tab->setAction('<i class="fa fa-search"></i>', $LINK_VIEW, array('modulo_campo_id'));
    $tab->setAction('<i class="fa fa-pencil-alt"></i>', $LINK_EDITAR, array('modulo_campo_id'));
    $tab->setAction('<i class="fa fa-trash"></i>', $LINK_DELETE, array('modulo_campo_id','modulo_campo_title'));
    $tab->setAction("<i class='fa fa-eye'></i>",$LINK_ENABLE_DISABLE , array('modulo_campo_id', 'modulo_campo_title'));

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
                Tem certeza que deseja excluir o item nº #<?php echo $_REQUEST['modulo_campo_id'] . " - " . $_REQUEST['modulo_campo_title']?>
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
        window.location.href = "<?php echo HOME_URI . 'modulo-campo/'; ?>";
    }
    function Confirmar() {
        window.location.href = "<?php echo isset($_REQUEST['modulo_campo_id']) ? HOME_URI . "modulo-campo/index/?action=delete&confirm=true&modulo_campo_id={$_REQUEST['modulo_campo_id']}&" : ''; ?>";
    }

    
		function search() {
			var search = document.getElementById('search').value;

			if (search === '' || search === "NULL") {
				search = "NULL";
			}
	
				var modulo_campo_modulo_id = document.getElementById('modulo_campo_modulo_id').value;

				if (modulo_campo_modulo_id === '' || modulo_campo_modulo_id === "NULL") {
					modulo_campo_modulo_id = "NULL";
				}
			
			var url = "<?php echo HOME_URI ?>modulo-campo/index/search/" + search  + '/' + modulo_campo_modulo_id;
			window.location.href = url;
		}
	
				document.getElementById('modulo_campo_modulo_id').addEventListener('change', search);
			
		document.getElementById('search').addEventListener('keyup', function(e) {
			if (e.key === 'Enter') {
				search();
			}
		});
	
</script>
