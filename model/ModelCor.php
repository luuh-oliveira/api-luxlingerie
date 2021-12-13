<?php

class ModelCor{

    private $_conexao;
    private $_idCor;
    private $_cor;

    public function __construct($conexao)
    {
        $json = file_get_contents("php://input");
        $dadosCor = json_decode($json);

        $this->_idCor = $dadosCor->idCor ?? null;
        $this->_cor = $dadosCor->cor ?? null;

        $this->_conexao = $conexao;

    }

    public function findAll()
    {
        $sql = "SELECT * FROM tblCor";

        $stm = $this->_conexao->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

}

?>