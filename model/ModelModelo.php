<?php

class ModelModelo{

    private $_conexao;
    private $_idModelo;
    private $_nome;

    public function __construct($conexao)
    {
        //
        $json = file_get_contents("php://input");
        $dadosModelo = json_decode($json);

        $this->_idModelo = $dadosModelo->idModelo ?? null;
        $this->_nome = $dadosModelo->nome ?? null;
        //

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