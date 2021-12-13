<?php

class ControllerTamanho{

    private $_modelTamanho;
    private $_method;

    public function __construct($model)
    {
        $this->_modelTamanho = $model;
        $this->_method = $_SERVER['REQUEST_METHOD'];
    }

    function router()
    {
        switch ($this->_method) {
            case 'GET':
                return $this->_modelTamanho->findAll();
                break;

            default:

                break;
        }

    }

}

?>