<?php

class ControllerProduto{
    
    private $_method;
    private $_modelProduto;
    private $_idProduto;

    public function __construct($model)
    {
        
        $this->_modelProduto = $model;
        $this->_method = $_SERVER['REQUEST_METHOD'];

        $json = file_get_contents("php://input");
        $dadosProduto = json_decode($json);

        $this->_idProduto = $dadosProduto->idProduto ?? null;

    }

    function router(){

        switch ($this->_method) {
            case 'GET':
                
                return $this->_modelProduto->findAll();

                break;
            
            default:
                # code...
                break;
        }


    }


}

?>