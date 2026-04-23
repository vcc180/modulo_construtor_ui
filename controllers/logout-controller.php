
<?php

/**
 * home - Controller de exemplo
 *
 * @package TutsupMVC
 * @since 0.1
 */
class LogoutController extends MainController {

    /**
     * $login_required
     * Se a pÃ¡gina precisa de login
     * @access public
     */
    public $login_required = true;

    /**
     * $permission_required
     * PermissÃ£o necessÃ¡ria
     * @access public
     */
    public $permission_required = 'any';

    public function index() {
        //título da página
        $this->title = 'Logout';
        $this->logout(true);
    }
}
