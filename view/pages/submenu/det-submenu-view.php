<?php
$modelo->db = new Database();
$dados = $modelo->db->select('view_submenu', '*', 'where submenu_id=' . $_REQUEST['submenu_id']);
$dados = $dados[0];
?>

<div class="box">
    <h1 class="title-box">Detalhe Submenu</h1>
    <div class="formulario">
        
            <div class="field">
                <legend>Menu:</legend>
                <input class="txt_input" disabled name="'menu_title'" value="<?php echo $dados['menu_title']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Nome:</legend>
                <input class="txt_input" disabled name="'submenu_nome'" value="<?php echo $dados['submenu_nome']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Título:</legend>
                <input class="txt_input" disabled name="'submenu_title'" value="<?php echo $dados['submenu_title']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Link:</legend>
                <input class="txt_input" disabled name="'submenu_link'" value="<?php echo $dados['submenu_link']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Status:</legend>
                <input class="txt_input" disabled name="'submenu_status'" value="<?php echo $dados['submenu_status']; ?>"/>
            </div>
            
    </div>
</div>
<div class="box">
    <button type="button" onclick="voltar()" class="button button-blue"><i class="fa fa-undo"></i> Voltar</button>
</div>

<script>
    const voltar = () => {
        window.location.href = "<?php echo HOME_URI . 'submenu/'; ?>";
    }
</script>