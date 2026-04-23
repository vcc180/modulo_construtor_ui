<?php
$modelo->db = new Database();
$dados = $modelo->db->select('tbuser_type', '*', 'where user_type_id=' . $_REQUEST['user_type_id']);
$dados = $dados[0];
?>

<div class="box">
    <h1 class="title-box">Detalhe Tipo Usuário</h1>
    <div class="formulario">
        <div class="field">
            <legend>Descrição:</legend>
            <input class="txt_input" disabled name="'user_type_descricao'"
                value="<?php echo $dados['user_type_descricao']; ?>" />
        </div>
    </div>
</div>
<?php
//EXIBE TODAS AS PERMISSÕES
$PERMISSIOES = unserialize($dados['user_type_permicoes']);
$i = 1;

if(count($PERMISSIOES) <= 0){
    echo '<div class="box"><H1 class="title-box">Nenhuma Permissão</H1><BR>';

}else{
    foreach($PERMISSIOES["MENU"] as $key => $value){
        if($key != 'any' && $key != 'PERMISSOES' && $key != 'MENU'){
            echo '<div class="box"><H1 class="title-box">'.$key."</H1><BR>";
            if(is_array($value)){
                foreach($value as $k => $v){
                    echo '<input checked class="input_txt" type="checkbox" name="data[MENU]['.$key.']['.$k.']" id="id'.$i.'" value="'.$k.'"/><label for="id'.$i.'"> '.$k.'</label><BR>';
                    $i++;
                }

            }else{
                echo '<input checked class="input_txt" type="checkbox" name="data[MENU]['.$key.']['.$value.']" id="id'.$i.'" value="'.$value.'"/><label for="id'.$i.'"> '.$value.'</label><BR>';
                $i++;
            }

            echo '</div>';
        }
    }
}


?>
<div class="box">
    <button type="button" onclick="voltar()" class="button button-blue"><i class="fa fa-undo"></i> Voltar</button>
</div>

<script>
    const voltar = () => {
        window.location.href = "<?php echo HOME_URI . 'tipo-usuario/'; ?>";
    }
</script>