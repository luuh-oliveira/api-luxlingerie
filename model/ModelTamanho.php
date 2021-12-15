<?php

class ModelTamanho{

    private $_conexao;

    public function __construct($conexao)
    {
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