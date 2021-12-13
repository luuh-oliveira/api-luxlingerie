<?php

class ControllerCor
{

    private $_modelCor;
    // !! testar sem o method e o switch !!
    private $_method;

    public function __construct($model)
    {
        $this->_modelCor = $model;
        $this->_method = $_SERVER['REQUEST_METHOD'];
    }

    function router()
    {
        switch ($this->_method) {
            case 'GET':
                return $this->_modelCor->findAll();
                break;

            default:

                break;
        }

        // return $this->_modelCor->findAll();
        // break;
    }
}
