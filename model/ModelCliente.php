<?php

class modelCliente
{

    private $_conexao;

    private $_idCliente;
    private $_nome;
    private $_email;
    private $_celular;
    private $_senha;


    public function __construct($conexao)
    {
        $json = file_get_contents("php://input");
        $dadosCliente = json_decode($json);

        $this->_idCliente = $dadosCliente->idCliente ?? null;

        $this->_nome = $dadosCliente->nome ?? null;
        $this->_email = $dadosCliente->email ?? null;
        $this->_celular = $dadosCliente->celular ?? null;
        $this->_senha = $dadosCliente->senha ?? null;


        // $this->_nome = $_POST["nome"] ?? null;
        // $this->_email = $_POST["email"] ?? null;
        // $this->_celular = $_POST["celular"] ?? null;
        // $this->_senha = $_POST["senha"] ?? null;


        $this->_conexao = $conexao;
    }


    public function findById()
    {
        $sql = "SELECT * FROM tblCliente WHERE idCliente = ?";
        $stm = $this->_conexao->prepare($sql);
        $stm->bindValue(1, $this->_idCliente);

        $stm->execute();

        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function create()
    {
        $sql = "INSERT INTO tblCliente (nome, email, celular, senha)
                    VALUES (?,?,?,?)";


        $stm = $this->_conexao->prepare($sql);

        $stm->bindValue(1, $this->_nome);
        $stm->bindValue(2, $this->_email);
        $stm->bindValue(3, $this->_celular);
        $stm->bindValue(4, $this->_senha);

        if ($stm->execute()) {
            return "Success";
        } else {
            return "Error";
        }
    }

    public function update()
    {

        $sql = "UPDATE tblCliente SET
            nome = ?,
            email = ?,
            celular = ?,
            senha = ?
            WHERE idCliente = ?";

        $stm = $this->_conexao->prepare($sql);

        $stm->bindValue(1, $this->_nome);
        $stm->bindValue(2, $this->_email);
        $stm->bindValue(3, $this->_celular);
        $stm->bindValue(4, $this->_senha);
        $stm->bindValue(5, $this->_idCliente);

        if ($stm->execute()) {
            return "Dados alterados com sucesso!";
        }
    }
}
