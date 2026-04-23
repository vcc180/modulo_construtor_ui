<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application {
    /*
     * $controller
     * Recebe o valor do controlador vindo da url
     * site.com.br/controlador/
     * @access private
     */

    private $controller;

    /*
     * $action
     * Recebe o valor da ação vindo da url
     * site.com.br/controlador/ação
     * @access private
     */
    private $action;

    /*
     * $param
     * Recebe os parametros vindo da url
     * site.com.br/controlador/ação/param1/param2/../
     * @access private
     */
    private $param;

    /*
     * $not_found
     * Em caso de página inexistente exibe o erro 404 (Página não encontrada)
     * @access private
     */
    private $not_found = "/view/404.php";
/*
     * $manutencao
     * Em caso esteja em manutencao exibe a página
     * @access private
     */
    private $manutencao = "/view/manutencao.php";
    private $url;

    /*
     * Método __construct()
     * Método construtor responsável por obeter o controlador, as ações e os parametros.
     * Configura o controlador e a ação
     * @access public
     */

    public function __construct() {

        //se estiver em manutenção
        if(MANUTENCAO === TRUE){
            require_once PATH . $this->manutencao;
            return;
        }



        // Obtém os valores do controlador, ação e parâmetros da URL.
        // E configura as propriedades da classe.
        $this->url = new TUrl();

        $this->controller = $this->url->getController();
        $action = $this->url->getAction();
        $this->action = $action == null ? 'index' : $action;
        $this->param = $this->url->getParam();

        /*
         * verifica se o controlador existe. Caso contrário, adiciona o controlador padrão
         * (controllers/home-controller.php e chama o método index().
         */
        if (!$this->controller) {
            //add controlador padrão
            require_once PATH . '/controllers/home-controller.php';
            //instancia o objeto do controlador home-controller
            $this->controller = new HomeController();

            //executa o método index()
            $this->controller->index();
            return;
        }//end if
        //se o arquivo do controlador não existe, exibe a página de erro 404
        if (!file_exists(PATH . '/controllers/' . $this->controller . '.php')) {
            require_once PATH . $this->not_found;
            return;
        }

        //se não houver nenhum problema até aqui então
        //inclui o arquivo do controlador
        require_once PATH . '/controllers/' . $this->controller . '.php';

        //Remove caracteres inválidos do nome do controlador para gerar o nome
        //da classe. Exemplo: home-controller ficará HomeController
        $this->controller = preg_replace('/[^a-zA-Z]/i', '', $this->controller);

        // Se a classe do controlador indicado não existir então exibe página de erro 404
        if (!class_exists($this->controller)) {

            require_once PATH . $this->not_found;
            return;
        }

        // Cria o objeto da classe do controlador e envia os parâmetros
        $this->controller = new $this->controller($this->param);

        // Se o método indicado existir, executa o método e envia os parâmetros
        if (method_exists($this->controller, $this->action)) {
            $this->controller->{$this->action}($this->param);
            return;
        }

        //se não hover ação, chamos o método index
        if (!$this->action && method_exists($this->controller, 'index')) {
            $this->controller->index($this->param);
            return;
        }

        //se não atender nenhum dos requisitos acima então exibe a página de erro 404
        require_once PATH . $this->not_found;
        return;
    }

    static public function run() {

        $TUrl = new TUrl;
        if ($TUrl->verifyGetUrl()) {
            $url = $TUrl->getURL();
            $controller = $url[0];

            if (class_exists($controller)) {
                $pagina = new $controller;
                $pagina->index();
            }
        }
    }

}
