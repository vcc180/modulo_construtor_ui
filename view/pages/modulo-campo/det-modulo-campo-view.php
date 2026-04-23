<?php
$modelo->db = new Database();
$dados = $modelo->db->select('view_modulo_campo', '*', 'where modulo_campo_id=' . $_REQUEST['modulo_campo_id']);
$dados = $dados[0];
?>

<div class="box">
    <h1 class="title-box">Detalhe Módulo Campo</h1>
    <div class="formulario">
        
            <div class="field">
                <legend>Módulo:</legend>
                <input class="txt_input" disabled name="'modulos_title'" value="<?php echo $dados['modulos_title']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Nome:</legend>
                <input class="txt_input" disabled name="'modulo_campo_nome'" value="<?php echo $dados['modulo_campo_nome']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Título:</legend>
                <input class="txt_input" disabled name="'modulo_campo_title'" value="<?php echo $dados['modulo_campo_title']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Tipo:</legend>
                <input class="txt_input" disabled name="'tipo_campo_nome'" value="<?php echo $dados['tipo_campo_nome']; ?>"/>
            </div>
            
            <div class="field">
                <legend>É uma chave estrangeira:</legend>
                <input class="txt_input" disabled name="'modulo_campo_fk'" value="<?php echo $dados['modulo_campo_fk']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Tabela que referencia:</legend>
                <input class="txt_input" disabled name="'modulo_campo_reference_table'" value="<?php echo $dados['modulo_campo_reference_table']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Chave que faz referencia:</legend>
                <input class="txt_input" disabled name="'modulo_campo_reference_key'" value="<?php echo $dados['modulo_campo_reference_key']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Campo que será exibido:</legend>
                <input class="txt_input" disabled name="'modulo_campo_reference_option'" value="<?php echo $dados['modulo_campo_reference_option']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Requirido:</legend>
                <input class="txt_input" disabled name="'modulo_campo_required'" value="<?php echo $dados['modulo_campo_required']; ?>"/>
            </div>
            
            <div class="field">
                <legend>É um filtro:</legend>
                <input class="txt_input" disabled name="'modulo_campo_is_search'" value="<?php echo $dados['modulo_campo_is_search']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Status:</legend>
                <input class="txt_input" disabled name="'modulo_campo_status'" value="<?php echo $dados['modulo_campo_status']; ?>"/>
            </div>
            
    </div>
</div>
<div class="box">
    <button type="button" onclick="voltar()" class="button button-blue"><i class="fa fa-undo"></i> Voltar</button>
</div>

<script>
    const voltar = () => {
        window.location.href = "<?php echo HOME_URI . 'modulo-campo/'; ?>";
    }
</script>