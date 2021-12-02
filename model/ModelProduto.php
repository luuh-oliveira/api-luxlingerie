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
        $this->_nome = $dadosProduto->idNome ?? null;
        $this->_preco = $dadosProduto->idPreco ?? null;
        $this->_quantidade = $dadosProduto->idPreco ?? null;
        $this->_foto = $dadosProduto->idPreco ?? null;
        $this->_descricao = $dadosProduto->idPreco ?? null;

        $this->_conn = $conn;

        //GET
        // $this->_nome = $dadosProduto->nome ?? null;
        // $this->_preco = $dadosProduto->preco ?? null;
        // $this->_quantidade = $dadosProduto->preco ?? null;

        //POST
        
    }

    public function findAll(){
        $sql = "";

        

    }

    





}

?>