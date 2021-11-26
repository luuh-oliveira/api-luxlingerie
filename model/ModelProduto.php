<?php

class ModelProduto{

    private $_conn;

    private $_idProduto;
    private $_nome;
    private $_preco;
    private $_quantidade;
    private $_foto;
    private $_descricao;
    
    public function __construct($conn){

        $json = file_get_contents("php://input");
        $dadosProduto = json_decode($json);

        $this->_idProduto = $dadosProduto->idProduto ?? null;

        //GET
        // $this->_nome = $dadosProduto->nome ?? null;
        // $this->_preco = $dadosProduto->preco ?? null;
        // $this->_quantidade = $dadosProduto->preco ?? null;

        //POST


        
    }

}

?>