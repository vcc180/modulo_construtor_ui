<?php
//require_once PATH. '/global-functions.php';
class TUrl {
    //put your code here
    private $controller;
    private $action;
    private $param;
    
    
    public function getController() {
        return $this->controller;
    }
    public function getAction() {
        return $this->action;
    }
    public function getParam() {
        return $this->param;
    }
    
    public function verifyGetUrl(){
        if(isset($_GET['url'])){
            return true;
        }else {
            return false;
        }
    }
    
    public function getURL(){
        if(isset($_GET['url'])){
            return explode("/", $_GET['url']);
        }
    }

    public function __construct() {
        if(isset($_GET['url'])){
            // Captura o valor de url
            $url = $_GET['url'];
            
            //limpa os dados
             $url = rtrim($url,'/');
             //$url = filter_var($url, FILTER_SANITIZE_URL);
             $url = explode('/', $url);
            
            $this->controller  = chk_array($url, 0);
            $this->controller = $this->controller . '-controller';
            $this->action      = chk_array($url, 1);
            
            if(chk_array($url,2)){
                unset($url[0]);
                unset($url[1]);
                $this->param = array_values($url);
            }
        }
    }
}
