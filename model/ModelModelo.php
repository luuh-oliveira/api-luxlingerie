<?php

class ModelModelo{

    private $_conexao;

    public function __construct($conexao)
    {
        $this->_conexao = $conexao;
    }

    function findAll()
    {
        $sql = "SELECT * FROM tblModelo";

        $stm = $this->_conexao->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

}

?>