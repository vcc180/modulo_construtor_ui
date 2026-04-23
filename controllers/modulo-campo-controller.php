<?php

class ModuloCampoController extends MainController {

    public $login_required = true;
    public $permission_required = 'MODULO_CAMPO';

    public function index() {
        $this->title = 'Lista de Módulo Campo';

        $this->permission_requery();

        $modelo = $this->load_model('modulo-campo-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/modulo-campo/modulo-campo-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function cadastro() {
        $this->title = 'Cadastro de Módulo Campo';

        $this->permission_requery();

        $modelo = $this->load_model('modulo-campo-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/modulo-campo/cad-modulo-campo-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function editar() {
        $this->title = 'Editar Módulo Campo';

        $this->permission_requery();

        $modelo = $this->load_model('modulo-campo-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/modulo-campo/edt-modulo-campo-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function detalhe() {
        $this->title = 'Detalhe Módulo Campo';

        $this->permission_requery();

        $modelo = $this->load_model('modulo-campo-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/modulo-campo/det-modulo-campo-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

}