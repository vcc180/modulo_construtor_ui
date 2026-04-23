<?php
$modelo->db = new Database();
$dados = $modelo->db->select('tbprojeto', '*', 'where projeto_id=' . $_REQUEST['projeto_id']);
$dados = $dados[0];
?>

<div class="box">
    <h1 class="title-box">Detalhe Projetos</h1>
    <div class="formulario">
        
            <div class="field">
                <legend>Título:</legend>
                <input class="txt_input" disabled name="'projeto_title'" value="<?php echo $dados['projeto_title']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Nome:</legend>
                <input class="txt_input" disabled name="'projeto_name'" value="<?php echo $dados['projeto_name']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Diretório raiz:</legend>
                <input class="txt_input" disabled name="'projeto_path'" value="<?php echo $dados['projeto_path']; ?>"/>
            </div>
            
            <div class="field">
                <legend>URL:</legend>
                <input class="txt_input" disabled name="'projeto_url'" value="<?php echo $dados['projeto_url']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Hostname:</legend>
                <input class="txt_input" disabled name="'projeto_db_hostname'" value="<?php echo $dados['projeto_db_hostname']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Database:</legend>
                <input class="txt_input" disabled name="'projeto_db_database'" value="<?php echo $dados['projeto_db_database']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Usuário:</legend>
                <input class="txt_input" disabled name="'projeto_user'" value="<?php echo $dados['projeto_user']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Password:</legend>
                <input class="txt_input" disabled name="'projeto_password'" value="<?php echo $dados['projeto_password']; ?>"/>
            </div>
            
            <div class="field">
                <legend>Status:</legend>
                <input class="txt_input" disabled name="'projeto_status'" value="<?php echo $dados['projeto_status']; ?>"/>
            </div>
            
    </div>
</div>
<div class="box">
    <button type="button" onclick="voltar()" class="button button-blue"><i class="fa fa-undo"></i> Voltar</button>
</div>

<script>
    const voltar = () => {
        window.location.href = "<?php echo HOME_URI . 'projetos/'; ?>";
    }
</script>