<?php
/**
 * home - Controller de exemplo
 *
 * @package TutsupMVC
 * @since 0.1
 */
class UsuarioSistemaController extends MainController {
    
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
    public $permission_required = 'USUARIO_SISTEM';

    //carrega a página '/view/home/home-view.php'
    public function index() {
        //título da página
        $this->title = 'Alunos';
        // Verifica se o usuÃ¡rio estÃ¡ logado
        $this->permission_requery();
        
        //parametros da função
        $parametros = (func_get_args()>1)?func_get_args():array();
        
        //esta página não precisa de model
        $modelo = $this->load_model('usuario-model');

        //carrega os arquivos do view
        ///view/_include/header.php
        require_once PATH . '/view/includes/header.php';

        ///view/_include/home-view.php
        require_once PATH . '/view/pages/usuario-sistema/usuario-sistema-view.php';
        
        ///view/_include/footer.php
        require_once PATH . '/view/includes/footer.php';
        
    }//end function index()
    
    public function cadastro() {
        $this->title = 'Cadastro Aluno';
        // Verifica se o usuÃ¡rio estÃ¡ logado
        $this->permission_requery();
        
        //parametros da função
        $parametros = (func_get_args()>1)?func_get_args():array();
        
        //esta página não precisa de model
        $modelo = $this->load_model('usuario-model');

        //carrega os arquivos do view
        ///view/_include/header.php
        require_once PATH . '/view/includes/header.php';

        ///view/_include/home-view.php
        require_once PATH . '/view/pages/usuario-sistema/cad-usuario-sistema-view.php';
        
        ///view/_include/footer.php
        require_once PATH . '/view/includes/footer.php';
    }
    
    public function editar() {
        $this->title = 'Editar Aluno';
        // Verifica se o usuÃ¡rio estÃ¡ logado
        $this->permission_requery();
        
        //parametros da função
        $parametros = (func_get_args()>1)?func_get_args():array();
        
        //esta página não precisa de model
        $modelo = $this->load_model('usuario-model');

        //carrega os arquivos do view
        ///view/_include/header.php
        require_once PATH . '/view/includes/header.php';

        ///view/_include/home-view.php
        require_once PATH . '/view/pages/usuario-sistema/edit-usuario-sistema-view.php';
        
        ///view/_include/footer.php
        require_once PATH . '/view/includes/footer.php';
    }
    
    public function detalhe() {
        $this->title = 'Editar Aluno';
        // Verifica se o usuÃ¡rio estÃ¡ logado
        $this->permission_requery();
        
        //parametros da função
        $parametros = (func_get_args()>1)?func_get_args():array();
        
        //esta página não precisa de model
        $modelo = $this->load_model('cadastro-model');

        //carrega os arquivos do view
        ///view/_include/header.php
        require_once PATH . '/view/includes/header.php';

        ///view/_include/home-view.php
        require_once PATH . '/view/pages/alunos/det-aluno-view.php';
        
        ///view/_include/footer.php
        require_once PATH . '/view/includes/footer.php';
    }
    public function permisssao() {
        $this->title = 'Editar Aluno';
        // Verifica se o usuÃ¡rio estÃ¡ logado
        $this->permission_requery();
        
        //parametros da função
        $parametros = (func_get_args()>1)?func_get_args():array();
        
        //esta página não precisa de model
        $modelo = $this->load_model('usuario-model');

        //carrega os arquivos do view
        ///view/_include/header.php
        require_once PATH . '/view/includes/header.php';

        ///view/_include/home-view.php
        require_once PATH . '/view/pages/usuario-sistema/permissaso-sistema-view.php';
        
        ///view/_include/footer.php
        require_once PATH . '/view/includes/footer.php';
    }
    
    public function recuperar_senha() {
        $this->title = 'Editar Aluno';
        // Verifica se o usuÃ¡rio estÃ¡ logado
        $this->permission_requery();
        
        //parametros da função
        $parametros = (func_get_args()>1)?func_get_args():array();
        
        //esta página não precisa de model
        $modelo = $this->load_model('usuario-model');

        //carrega os arquivos do view
        ///view/_include/header.php
        require_once PATH . '/view/includes/header.php';

        ///view/_include/home-view.php
        require_once PATH . '/view/pages/usuario-sistema/recuperar-senha-usuario-sistema-view.php';
        
        ///view/_include/footer.php
        require_once PATH . '/view/includes/footer.php';
    }
}
