<?php

require("./Connection.php");

$conexao = new Connection();

$modelProduto = new ModelProduto($conexao->returnConnection());

?>