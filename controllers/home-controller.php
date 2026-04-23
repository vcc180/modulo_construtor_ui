<?php
/**
 * home - Controller de exemplo
 *
 * @package TutsupMVC
 * @since 0.1
 */
class HomeController extends MainController {
    
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

    //carrega a página '/view/home/home-view.php'
    public function index() {
        //título da página
        $this->title = 'Home';
        // Verifica se o usuÃ¡rio estÃ¡ logado
        $this->permission_requery();
        
        //parametros da função
        $parametros = (func_get_args()>1)?func_get_args():array();
        
        //esta página não precisa de model
        $modelo = $this->load_model('home-model');

        //carrega os arquivos do view
        ///view/_include/header.php
        require_once PATH . '/view/includes/header.php';

        ///view/_include/home-view.php
        require_once PATH . '/view/pages/home/home-view.php';
        
        ///view/_include/footer.php
        require_once PATH . '/view/includes/footer.php';
        
    }//end function index()
}
