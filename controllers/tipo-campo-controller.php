<?php

class TipoCampoController extends MainController {

    public $login_required = true;
    public $permission_required = 'TIPO_CAMPO';

    public function index() {
        $this->title = 'Lista de Tipo Campo';

        $this->permission_requery();

        $modelo = $this->load_model('tipo-campo-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/tipo-campo/tipo-campo-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function cadastro() {
        $this->title = 'Cadastro de Tipo Campo';

        $this->permission_requery();

        $modelo = $this->load_model('tipo-campo-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/tipo-campo/cad-tipo-campo-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function editar() {
        $this->title = 'Editar Tipo Campo';

        $this->permission_requery();

        $modelo = $this->load_model('tipo-campo-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/tipo-campo/edt-tipo-campo-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function detalhe() {
        $this->title = 'Detalhe Tipo Campo';

        $this->permission_requery();

        $modelo = $this->load_model('tipo-campo-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/tipo-campo/det-tipo-campo-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

}