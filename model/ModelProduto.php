<?php

class ModelProduto{

    private $_conexao;

    private $_idProduto;
    private $_nome;
    private $_preco;
    private $_quantidade;
    private $_foto;
    private $_descricao;
    
    public function __construct($conexao){

        $json = file_get_contents("php://input");
        $dadosProduto = json_decode($json);

        $this->_idProduto = $dadosProduto->idProduto ?? null;
        $this->_nome = $dadosProduto->nome ?? null;
        $this->_preco = $dadosProduto->preco ?? null;
        $this->_quantidade = $dadosProduto->preco ?? null;
        $this->_foto = $dadosProduto->foto ?? null;
        $this->_descricao = $dadosProduto->descricao ?? null;

        $this->_conexao = $conexao;

        

        //POST
        
    }

    public function findAll(){
        $sql = "SELECT * FROM tblProduto";

        $stm = $this->_conexao->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }



    
}

?>