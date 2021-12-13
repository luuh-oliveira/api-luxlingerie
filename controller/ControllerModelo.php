<?php

class ControllerModelo{

    private $_method;
    private $_modelModelo;

    public function __construct($model)
    {
        $this->_modelModelo = $model;
        $this->_method = $_SERVER['REQUEST_METHOD'];
    }

    function router(){
        switch ($this->_method) {
            case 'GET':
                return $this->_modelModelo->findAll();
                break;
            
            default:
            
                break;
        }
    }

}

?>