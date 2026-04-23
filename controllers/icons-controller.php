<?php

class IconsController extends MainController {

    public $login_required = true;
    public $permission_required = 'ICONS';

    public function index() {
        $this->title = 'Lista de Icons';

        $this->permission_requery();

        $modelo = $this->load_model('icons-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/icons/icons-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function cadastro() {
        $this->title = 'Cadastro de Icons';

        $this->permission_requery();

        $modelo = $this->load_model('icons-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/icons/cad-icons-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function editar() {
        $this->title = 'Editar Icons';

        $this->permission_requery();

        $modelo = $this->load_model('icons-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/icons/edt-icons-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function detalhe() {
        $this->title = 'Detalhe Icons';

        $this->permission_requery();

        $modelo = $this->load_model('icons-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/icons/det-icons-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

}