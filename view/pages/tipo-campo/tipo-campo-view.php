
        <?php
            $filtros = [];
            $WHERE = '';
            
                    if (isset($this->parametros[1]) && $this->parametros[1] != "NULL") {
                        $filtros[] = "tipo_campo_nome LIKE '%{$this->parametros[1]}%'";
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
    <div class="field"><legend>&nbsp;</legend><button onclick="Location('tipo-campo/cadastro')" class="button button-blue"><i class="fa fa-plus-circle"></i> CADASTRAR</button></div></div></div>
<div class="box">
    <h1 class="title-box">TIPO CAMPO</h1>
    <?php
    $modelo->setEnable();
    $modelo->delete();
    

    $WHERE .= " ORDER BY tipo_campo_id DESC";

    $tab = new TTable(
        new Database(),
        'tbtipo_campo',
        "tipo_campo_id,tipo_campo_nome",
        $WHERE
    );

    $tab->setNumbResgistros(25);

    $LINK_VIEW = HOME_URI . 'tipo-campo/detalhe/?';
    $LINK_EDITAR = HOME_URI . 'tipo-campo/editar/?';
    $LINK_DELETE = HOME_URI . 'tipo-campo/index/?action=delete&confirm=false&';
    

    $tab->setTitle('#', TTable::ALIGN_CENTER);

    $tab->setTitle('Nome', TTable::ALIGN_CENTER);


    $tab->setTitle('Ação', TTable::ALIGN_CENTER, '15%');
    $tab->setAction('<i class="fa fa-search"></i>', $LINK_VIEW, array('tipo_campo_id'));
    $tab->setAction('<i class="fa fa-pencil-alt"></i>', $LINK_EDITAR, array('tipo_campo_id'));
    $tab->setAction('<i class="fa fa-trash"></i>', $LINK_DELETE, array('tipo_campo_id','tipo_campo_nome'));
    

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
                Tem certeza que deseja excluir o item nº #<?php echo $_REQUEST['tipo_campo_id'] . " - " . $_REQUEST['tipo_campo_nome']?>
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
        window.location.href = "<?php echo HOME_URI . 'tipo-campo/'; ?>";
    }
    function Confirmar() {
        window.location.href = "<?php echo isset($_REQUEST['tipo_campo_id']) ? HOME_URI . "tipo-campo/index/?action=delete&confirm=true&tipo_campo_id={$_REQUEST['tipo_campo_id']}&" : ''; ?>";
    }

    
		function search() {
			var search = document.getElementById('search').value;

			if (search === '' || search === "NULL") {
				search = "NULL";
			}
	
			var url = "<?php echo HOME_URI ?>tipo-campo/index/search/" + search ;
			window.location.href = url;
		}
	
		document.getElementById('search').addEventListener('keyup', function(e) {
			if (e.key === 'Enter') {
				search();
			}
		});
	
</script>
