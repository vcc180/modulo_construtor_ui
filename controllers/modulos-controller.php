<?php

class ModulosController extends MainController {

    public $login_required = true;
    public $permission_required = 'MODULOS';

    public function index() {
        $this->title = 'Lista de Módulos';

        $this->permission_requery();

        $modelo = $this->load_model('modulos-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/modulos/modulos-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function cadastro() {
        $this->title = 'Cadastro de Módulos';

        $this->permission_requery();

        $modelo = $this->load_model('modulos-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/modulos/cad-modulos-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function editar() {
        $this->title = 'Editar Módulos';

        $this->permission_requery();

        $modelo = $this->load_model('modulos-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/modulos/edt-modulos-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

    public function detalhe() {
        $this->title = 'Detalhe Módulos';

        $this->permission_requery();

        $modelo = $this->load_model('modulos-model');

        require_once PATH . '/view/includes/header.php';
        require_once PATH . '/view/pages/modulos/det-modulos-view.php';
        require_once PATH . '/view/includes/footer.php';
    }

}