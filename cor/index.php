<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Content-Type: aplication/json");

include("../Connection.php");
include("../model/ModelCor.php");
include("../controller/ControllerCor.php");

$conexao = new Connection();

$model = new ModelCor($conexao->returnConnection());

$controller = new ControllerCor($model);

$dados = $controller->router();

echo json_encode(array("status"=>"Success","data"=>$dados))

?>