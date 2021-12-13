<?php

class ModelTamanho{

    private $_conexao;
    private $_idTamanho;
    private $_tamanho;

    public function __construct($conexao)
    {
        // 
        $json = file_get_contents("php://input");
        $dadosTamanho = json_decode($json);

        $this->_idTamanho = $dadosTamanho->idTamanho ?? null;
        $this->_tamanho = $dadosTamanho->tamanho ?? null;
        //

        $this->_conexao = $conexao;
    }

    public function findAll()
    {
        $sql = "SELECT * FROM tblTamanho";

        $stm = $this->_conexao->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

}

?>