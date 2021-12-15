<?php

class ControllerModelo
{

    private $_modelModelo;

    public function __construct($model)
    {
        $this->_modelModelo = $model;
    }

    function router()
    {
        return $this->_modelModelo->findAll();
        exit;
    }
}
