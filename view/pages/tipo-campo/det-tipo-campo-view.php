<?php
$modelo->db = new Database();
$dados = $modelo->db->select('tbtipo_campo', '*', 'where tipo_campo_id=' . $_REQUEST['tipo_campo_id']);
$dados = $dados[0];
?>

<div class="box">
    <h1 class="title-box">Detalhe Tipo Campo</h1>
    <div class="formulario">
        
            <div class="field">
                <legend>Nome:</legend>
                <input class="txt_input" disabled name="'tipo_campo_nome'" value="<?php echo $dados['tipo_campo_nome']; ?>"/>
            </div>
            
    </div>
</div>
<div class="box">
    <button type="button" onclick="voltar()" class="button button-blue"><i class="fa fa-undo"></i> Voltar</button>
</div>

<script>
    const voltar = () => {
        window.location.href = "<?php echo HOME_URI . 'tipo-campo/'; ?>";
    }
</script>