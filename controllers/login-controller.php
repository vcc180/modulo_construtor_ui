<?php

/**
 * home - Controller de exemplo
 *
 * @package TutsupMVC
 * @since 0.1
 */
class LoginController extends MainController {

    /**
     * $login_required
     * Se a pÃ¡gina precisa de login
     * @access public
     */
    public $login_required = false;

    /**
     * $permission_required
     * PermissÃ£o necessÃ¡ria
     * @access public
     */
    public $permission_required = 'any';

    public function index() {
        
        //título da página
        $this->title = 'Login';
        // Verifica se o usuÃ¡rio estÃ¡ logado
        //$this->permission_requery();
        //parametros da função
        $parametros = (func_get_args() > 1) ? func_get_args() : array();


        //carrega os arquivos do view
        ///view/_include/header.php
        
        require_once PATH . '/view/includes/header_login.php';

        ///view/_include/home-view.php
        require_once PATH . '/view/pages/login/login-view.php';

        ///view/_include/footer.php
        require_once PATH . '/view/includes/footer_login.php';
    }

}
