<div id="page">
    <?php
    if ($this->logged_in) {
        echo '<script type="text/javascript">window.location.href="' . HOME_URI . '"</script>';
    } else {
        ?>


        <form autocomplete="false" method="post">
            <table style="width: 100%;display: table;">
                <tr>
                    <td style="text-align: center;"><img style="width: 100%;margin: 0 auto;" src="<?php echo PATH_IMG_ADM . "logomarca.png"; ?>"/></td>
                </tr>
                <tr><td>&nbsp</td></tr>
                <tr>
                    <td>
                        <?php
                        if (!empty($this->login_error)) {
                            TMessenger::Error($this->login_error);
                        }
                        ?>
                        <input class="txt_input" required type="email" name="USER_DATA[user_email]" value="<?php echo (isset($_POST['USER_DATA']['user_email'])) ? $_POST['USER_DATA']['user_email'] : ''; ?>" placeholder="Usuário"/></td>
                </tr>
                <tr>
                    <td><input class="txt_input" required type="password" name="USER_DATA[user_password]" value="<?php echo (isset($_POST['USER_DATA']['user_password'])) ? $_POST['USER_DATA']['user_password'] : ''; ?>"  placeholder="Senha"/></td>
                </tr>
                <tr>

                    <td><input class="bt_input" type="submit" name="Login" value="Login"/></td>
                </tr>

                <tr><td><br><a href="#">Lembrar senha</a></td></tr>
            </table>
        </form>
        <?php
    }
    ?>
</div><!--PAGE-->

