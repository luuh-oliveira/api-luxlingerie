<?php

class ModelProduto
{

    private $_conexao;

    private $_idProduto;
    private $_nome;
    private $_preco;
    private $_quantidade;
    private $_foto;
    private $_descricao;
    private $_desconto;
    private $_idCor;
    private $_idModelo;
    private $_idTamanho;
    private $_method;


    public function __construct($conexao)
    {

        $this->_method = $_SERVER['REQUEST_METHOD'];

        $json = file_get_contents("php://input");
        $dadosProduto = json_decode($json);

        switch ($this->_method) {
            case 'POST':
                $this->_idProduto = $_POST["idProduto"] ?? null;
                $this->_nome = $_POST["nome"] ?? null;
                $this->_preco = $_POST["preco"] ?? null;
                $this->_quantidade = $_POST["quantidade"] ?? null;
                $this->_foto = $_POST["foto"] ?? null;
                $this->_foto = $_FILES["foto"]["name"] ?? null;
                $this->_descricao = $_POST["descricao"] ?? null;
                $this->_idCor = $_POST["idCor"] ?? null;
                $this->_idModelo = $_POST["idModelo"] ?? null;
                $this->_idTamanho = $_POST["idTamanho"] ?? null;
                $this->_desconto = $_POST["desconto"] ?? null;
                // var_dump($_POST);
                // var_dump($_FILES);
                // exit;

                break;

            default:
                $this->_idProduto = $dadosProduto->idProduto ?? null;
                $this->_nome = $dadosProduto->nome ?? null;
                $this->_preco = $dadosProduto->preco ?? null;
                $this->_quantidade = $dadosProduto->preco ?? null;
                $this->_foto = $dadosProduto->foto ?? null;
                $this->_descricao = $dadosProduto->descricao ?? null;
                $this->_idCor = $dadosProduto->idCor ?? null;
                $this->_idModelo = $dadosProduto->idModelo ?? null;
                $this->_idTamanho = $dadosProduto->idTamanho ?? null;
                $this->_desconto = $dadosProduto->desconto ?? null;
                break;
        }

        $this->_conexao = $conexao;
    }

    public function findAll()
    {
        $sql = "SELECT * FROM tblProduto";

        $stm = $this->_conexao->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function create()
    {
        $sql = "INSERT INTO tblProduto (nome, preco, quantidade, foto, descricao, 
        idCor, idModelo, idTamanho, desconto)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $extensao = pathinfo($this->_foto, PATHINFO_EXTENSION);
        $novoNomeArquivo = md5(microtime()) . ".$extensao";

        move_uploaded_file($_FILES["foto"]["tmp_name"], "../upload/$novoNomeArquivo");


        $stm = $this->_conexao->prepare($sql);
        $stm->bindValue(1, $this->_nome);
        $stm->bindValue(2, $this->_preco);
        $stm->bindValue(3, $this->_quantidade);
        $stm->bindValue(4, $novoNomeArquivo);
        $stm->bindValue(5, $this->_descricao);
        $stm->bindValue(6, $this->_idCor);
        $stm->bindValue(7, $this->_idModelo);
        $stm->bindValue(8, $this->_idTamanho);
        $stm->bindValue(9, $this->_desconto);

        if ($stm->execute()) {
            return "Success";
        } else {
            return "Error";
        }
    }


    public function delete()
    {

        //deletar imagens
        $sqlImg = "SELECT foto FROM tblProduto WHERE idProduto = ?";

        $stm = $this->_conexao->prepare($sqlImg);
        $stm->bindValue(1, $this->_idProduto);
        $stm->execute();

        //!!PRODUTO RETORNANDO ARRAY NULO!!
        $produto = $stm->fetchAll(\PDO::FETCH_ASSOC);
        unlink("../upload/" . $produto[0]["foto"]);


        $sql = "DELETE FROM tblProduto WHERE idProduto = ?";

        $stm = $this->_conexao->prepare($sql);
        $stm->bindValue(1, $this->_idProduto);

        if ($stm->execute()) {
            return "Dados excluídos com sucesso!";
        }
    }

    public function update()
    {
        // echo 'teste';exit; 
        //atualizar imagem do produto
        if ($_FILES["foto"]["error"] != UPLOAD_ERR_NO_FILE) {
            //selecionar imagem do produto escolhido
            $sqlImg = "SELECT foto FROM tblProduto WHERE idProduto = ?";

            $stm = $this->_conexao->prepare($sqlImg);
            $stm->bindValue(1, $this->_idProduto);

            $stm->execute();


            $produto = $stm->fetchAll(\PDO::FETCH_ASSOC);
            // var_dump($produto[0]["foto"]);exit;

            //exclusão da foto antiga
            unlink("../upload/" . $produto[0]["foto"]);

            $nomeArquivo = $_FILES["foto"]["name"];
            $extensao = pathinfo($nomeArquivo, PATHINFO_EXTENSION);
            $novoNomeArquivo = md5(microtime()) . ".$extensao";
            // echo $novoNomeArquivo;exit;
            move_uploaded_file($_FILES["foto"]["tmp_name"], "../upload/$novoNomeArquivo");
        }

        $sql = "UPDATE tblProduto SET 
        nome = ?,
        preco = ?,
        quantidade = ?,
        foto = ?,
        descricao = ?,
        idCor = ?,
        idModelo = ?,
        idTamanho = ?,
        desconto = ? WHERE idProduto = ?";

        $stm = $this->_conexao->prepare($sql);

        $stm->bindValue(1, $this->_nome);
        $stm->bindValue(2, $this->_preco);
        $stm->bindValue(3, $this->_quantidade);
        $stm->bindValue(4, $this->_foto);
        $stm->bindValue(5, $this->_descricao);
        $stm->bindValue(6, $this->_idCor);
        $stm->bindValue(7, $this->_idModelo);
        $stm->bindValue(8, $this->_idTamanho);
        $stm->bindValue(9, $this->_desconto);
        $stm->bindValue(10, $this->_idProduto);

        if ($stm->execute()) {
            return "Dados alterados com sucesso!";
        }
    }
}
