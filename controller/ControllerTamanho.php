<?php

class ControllerTamanho
{

    private $_modelTamanho;

    public function __construct($model)
    {
        $this->_modelTamanho = $model;
    }

    function router()
    {
        return $this->_modelTamanho->findAll();
        exit;
    }
}
