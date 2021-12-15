<?php

class ControllerCor
{

    private $_modelCor;

    public function __construct($model)
    {
        $this->_modelCor = $model;
    }

    function router()
    {
        return $this->_modelCor->findAll();
        exit;
    }
}
