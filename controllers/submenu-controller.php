<?php

class SubmenuController extends MainController {

    public $login_required = true;
    public $permission_required = 'SUBMENU';

    public function index() {
        $this->title = 'Lista de Submenu';

        $this->permission_requery();

        $modelo = $this->load_model('submenu-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/submenu/submenu-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function cadastro() {
        $this->title = 'Cadastro de Submenu';

        $this->permission_requery();

        $modelo = $this->load_model('submenu-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/submenu/cad-submenu-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function editar() {
        $this->title = 'Editar Submenu';

        $this->permission_requery();

        $modelo = $this->load_model('submenu-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/submenu/edt-submenu-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function detalhe() {
        $this->title = 'Detalhe Submenu';

        $this->permission_requery();

        $modelo = $this->load_model('submenu-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/submenu/det-submenu-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

}