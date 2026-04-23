<script src="https://code.jquery.com/jquery-1.10.0.min.js"></script>
<script src="<?php echo HOME_URI; ?>view/js/jquery.inputmask.bundle.js"></script>
<script src="<?php echo HOME_URI . 'view/js/mask.js' ?>"></script>
<script src="<?php echo HOME_URI; ?>plugins/tinymce/tinymce.min.js"></script>

<script>

    function submitSearch(url) {
        var inputSearch = document.getElementById('search').value;
        window.location.href = url + inputSearch + '/';
    }


    function Location(url) {
        window.location.href = "<?php echo HOME_URI; ?>" + url;
    }

    function OnSelectChanger(NameInputX, NameInputY, OptionID, OptionValue, url) {
        $('#' + NameInputY).empty();

        var inputX = document.getElementById(NameInputX).value;
        var inputY = document.getElementById(NameInputY);

        // ✅ Correto: verifica se NÃO é nulo
        if (inputY != null) {

            inputY.append(new Option('Selecione...', ''));

            $.ajax({
                type: "GET",
                dataType: 'json',
                url: url,
                data: "inputX=" + inputX,
                success: function (json) {
                    console.log(json);

                    if (json.ARRAY != null) {
                        for (var i = 0; i < json.ARRAY.length; i++) {
                            var opt = document.createElement("option");
                            opt.value = json.ARRAY[i][OptionID];
                            opt.text = json.ARRAY[i][OptionValue];
                            inputY.add(opt);
                        }
                    }
                }
            });
        }
    }
</script>