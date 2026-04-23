<?php

class MenuController extends MainController {

    public $login_required = true;
    public $permission_required = 'MENU';

    public function index() {
        $this->title = 'Lista de Menu';

        $this->permission_requery();

        $modelo = $this->load_model('menu-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/menu/menu-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function cadastro() {
        $this->title = 'Cadastro de Menu';

        $this->permission_requery();

        $modelo = $this->load_model('menu-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/menu/cad-menu-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function editar() {
        $this->title = 'Editar Menu';

        $this->permission_requery();

        $modelo = $this->load_model('menu-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/menu/edt-menu-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function detalhe() {
        $this->title = 'Detalhe Menu';

        $this->permission_requery();

        $modelo = $this->load_model('menu-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/menu/det-menu-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

}