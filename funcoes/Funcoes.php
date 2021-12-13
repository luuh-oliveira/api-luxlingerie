<?php

class Funcoes
{
    private $_conexao;

    private function __construct($conexao)
    {
        $this->_conexao = $conexao;
    }

    
    function findAllTamanho()
    {
        $sql = "SELECT * FROM tblTamanho";

        $stm = $this->_conexao->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    function findAllModelo()
    {
        $sql = "SELECT * FROM tblModelo";

        $stm = $this->_conexao->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }


}
