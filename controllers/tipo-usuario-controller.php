<?php

class TipoUsuarioController extends MainController {

    public $login_required = true;
    public $permission_required = 'TIPO_USUARIO';

    public function index() {
        $this->title = 'Lista de Tipo Usuário';

        $this->permission_requery();

        $modelo = $this->load_model('tipo-usuario-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/tipo-usuario/tipo-usuario-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function cadastro() {
        $this->title = 'Cadastro de Tipo Usuário';

        $this->permission_requery();

        $modelo = $this->load_model('tipo-usuario-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/tipo-usuario/cad-tipo-usuario-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function editar() {
        $this->title = 'Editar Tipo Usuário';

        $this->permission_requery();

        $modelo = $this->load_model('tipo-usuario-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/tipo-usuario/edt-tipo-usuario-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function detalhe() {
        $this->title = 'Detalhe Tipo Usuário';

        $this->permission_requery();

        $modelo = $this->load_model('tipo-usuario-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/tipo-usuario/det-tipo-usuario-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

}