<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TTag
 *
 * @author VANESSA
 */
class TElement {

    //put your code here
    private $name;
    private $properties;
    protected $children;

    /*
     * método construtor
     * instancia uma tag html
     * @param $name = nome da tag
     */

    public function __construct($name) {
        $this->name = $name;
    }

    /*
     * método __set()
     * intercepta as atribuições à propriedades do objeto
     * @param $name  = nome da propriedade
     * @param $value = valors
     */

    public function __set($name, $value) {
        //armazena os valores atribuídps
        //ao array properties
        $this->properties[$name] = $value;
    }

    /*
     * método add()
     * adiciona um elemento filho
     * @param $child = objeto filho
     */

    public function add($child) {
        $this->children[] = $child;
    }

    /*
     * método open()
     * exibe a tag de abertura na tela
     */

    private function open() {
        //exibe a tag de abertura
        echo "<{$this->name}";
        if ($this->properties) {
            //percorre as propriedades
            foreach ($this->properties as $name => $value) {
                echo " {$name}=\"{$value}\"";
            }
        }
        echo ">";
    }

    /*
     * método show()
     * exibe a tag na tela, juntamento com seu conteúdo
     */

    public function show() {
        //abre tag
        $this->open();
//        echo "\n";
        //se possui conteúdo
        if ($this->children) {
            foreach ($this->children as $child) {
                //se for obejto
                if (is_object($child)) {
                    $child->show();
                } else if ((is_string($child))or ( is_numeric($child))) {
                    //se for texto
                    echo $child;
                }
            }
        }
        //fecha tag
        $this->close();
    }

    public function Get() {
        //abre tag
        $x = "<{$this->name} ";
        if ($this->properties) {
            //percorre as propriedades
            foreach ($this->properties as $name => $value) {
                $x .= "{$name}=\"{$value}\"";
            }
        }
        $x .= ">";
//        echo "\n";
        //se possui conteúdo
        if ($this->children) {
            foreach ($this->children as $child) {
                //se for obejto
                if (is_object($child)) {
                    $child->show();
                } else if ((is_string($child))or ( is_numeric($child))) {
                    //se for texto
                    $x .= $child;
                }
            }
        }
        //fecha tag
        $x .= "</{$this->name}>";

        return $x;
    }

    /*
     * método close()
     * Fecha uma tag HTML
     */

    private function close() {
        echo "</{$this->name}>";
    }

}

//end class
