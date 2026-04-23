<?php

class ProjetosController extends MainController {

    public $login_required = true;
    public $permission_required = 'PROJETOS';

    public function index() {
        $this->title = 'Lista de Projetos';

        $this->permission_requery();

        $modelo = $this->load_model('projetos-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/projetos/projetos-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function cadastro() {
        $this->title = 'Cadastro de Projetos';

        $this->permission_requery();

        $modelo = $this->load_model('projetos-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/projetos/cad-projetos-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function editar() {
        $this->title = 'Editar Projetos';

        $this->permission_requery();

        $modelo = $this->load_model('projetos-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/projetos/edt-projetos-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function detalhe() {
        $this->title = 'Detalhe Projetos';

        $this->permission_requery();

        $modelo = $this->load_model('projetos-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/projetos/det-projetos-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

}