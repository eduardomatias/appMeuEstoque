<?php


    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');

    include_once 'conexao/conexao.php';
    include_once 'model/produto.php';

    $db = new Conexao();
    $model = new Produto($db);
    $model->setAttributes($_POST);
    $model->save();
    echo json_encode($model->resultSave['return']);
    exit();
	
?>