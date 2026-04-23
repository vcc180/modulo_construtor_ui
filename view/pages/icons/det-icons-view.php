<?php
$modelo->db = new Database();
$dados = $modelo->db->select('tbicons', '*', 'where icons_id=' . $_REQUEST['icons_id']);
$dados = $dados[0];
?>

<div class="box">
    <h1 class="title-box">Detalhe Icons</h1>
    <div class="formulario">
        
            <div class="field">
                <legend>Nome:</legend>
                <input class="txt_input" disabled name="'icons_nome'" value="<?php echo $dados['icons_nome']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Icon:</legend>
                <input class="txt_input" disabled name="'icons_icon'" value="<?php echo $dados['icons_icon']; ?>"/>
            </div>
            
    </div>
</div>
<div class="box">
    <button type="button" onclick="voltar()" class="button button-blue"><i class="fa fa-undo"></i> Voltar</button>
</div>

<script>
    const voltar = () => {
        window.location.href = "<?php echo HOME_URI . 'icons/'; ?>";
    }
</script>