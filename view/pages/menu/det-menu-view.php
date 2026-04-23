<?php
$modelo->db = new Database();
$dados = $modelo->db->select('view_menu', '*', 'where menu_id=' . $_REQUEST['menu_id']);
$dados = $dados[0];
?>

<div class="box">
    <h1 class="title-box">Detalhe Menu</h1>
    <div class="formulario">
        <div class="field">
            <legend>Projeto:</legend>
            <input class="txt_input" disabled name="'projeto_title'" value="<?php echo $dados['projeto_title']; ?>" />
        </div>
        <div class="field">
            <legend>Título:</legend>
            <input class="txt_input" disabled name="'menu_title'" value="<?php echo $dados['menu_title']; ?>" />
        </div>

        <div class="field">
            <legend>Nome:</legend>
            <input class="txt_input" disabled name="'menu_nome'" value="<?php echo $dados['menu_nome']; ?>" />
        </div>

        <div class="field">
            <legend>Submentu:</legend>
            <input class="txt_input" disabled name="'menu_submenu'" value="<?php echo $dados['menu_submenu']; ?>" />
        </div>

        <div class="field">
            <legend>Icone:</legend>
            <input class="txt_input" disabled name="'icons_icon'" value="<?php echo $dados['icons_icon']; ?>" />
        </div>

        <div class="field">
            <legend>Status:</legend>
            <input class="txt_input" disabled name="'menu_status'" value="<?php echo $dados['menu_status']; ?>" />
        </div>

    </div>
</div>
<div class="box">
    <button type="button" onclick="voltar()" class="button button-blue"><i class="fa fa-undo"></i> Voltar</button>
</div>

<script>
    const voltar = () => {
        window.location.href = "<?php echo HOME_URI . 'menu/'; ?>";
    }
</script>