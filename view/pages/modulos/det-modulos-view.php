<?php
$modelo->db = new Database();
$dados = $modelo->db->select('view_modulos', '*', 'where modulos_id=' . $_REQUEST['modulos_id']);
$dados = $dados[0];
?>

<div class="box">
    <h1 class="title-box">Detalhe Módulos</h1>
    <div class="formulario">
        
            <div class="field">
                <legend>Projeto:</legend>
                <input class="txt_input" disabled name="'projeto_title'" value="<?php echo $dados['projeto_title']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Título:</legend>
                <input class="txt_input" disabled name="'modulos_title'" value="<?php echo $dados['modulos_title']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Módulo:</legend>
                <input class="txt_input" disabled name="'modulos_modulo'" value="<?php echo $dados['modulos_modulo']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Controller:</legend>
                <input class="txt_input" disabled name="'modulos_controller'" value="<?php echo $dados['modulos_controller']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Model:</legend>
                <input class="txt_input" disabled name="'modulos_model'" value="<?php echo $dados['modulos_model']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Tabela:</legend>
                <input class="txt_input" disabled name="'modulos_table'" value="<?php echo $dados['modulos_table']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Prefixo:</legend>
                <input class="txt_input" disabled name="'modulos_db_prefixo'" value="<?php echo $dados['modulos_db_prefixo']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Primary Key:</legend>
                <input class="txt_input" disabled name="'modulos_primary_key'" value="<?php echo $dados['modulos_primary_key']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Campo padrão:</legend>
                <input class="txt_input" disabled name="'modulos_field_default'" value="<?php echo $dados['modulos_field_default']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Campo Status:</legend>
                <input class="txt_input" disabled name="'modulos_field_status'" value="<?php echo $dados['modulos_field_status']; ?>"/>
            </div>
            
    </div>
</div>
<div class="box">
    <button type="button" onclick="voltar()" class="button button-blue"><i class="fa fa-undo"></i> Voltar</button>
</div>

<script>
    const voltar = () => {
        window.location.href = "<?php echo HOME_URI . 'modulos/'; ?>";
    }
</script>