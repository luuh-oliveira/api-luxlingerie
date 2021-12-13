<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Content-Type: aplication/json");

include("../Connection.php");
include("../model/ModelModelo.php");
include("../controller/ControllerModelo.php");

$conexao = new Connection();

$model = new ModelModelo($conexao->returnConnection());

$controller = new ControllerModelo($model);

$dados = $controller->router();

echo json_encode(array("status"=>"Success","data"=>$dados))

?>