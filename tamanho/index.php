<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Content-Type: aplication/json");

include("../Connection.php");
include("../model/ModelTamanho.php");
include("../controller/ControllerTamanho.php");

$conexao = new Connection();

$model = new ModelTamanho($conexao->returnConnection());

$controller = new ControllerTamanho($model);

$dados = $controller->router();

echo json_encode(array("status"=>"Success","data"=>$dados))

?>