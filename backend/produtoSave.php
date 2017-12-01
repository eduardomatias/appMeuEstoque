<?php
	
	include_once 'conexao/conexao.php';
	include_once 'model/produto.php';
	
	$db = new Conexao();
	$model = new Produto($db);
	$model->setAttributes($_POST);
	$model->save();
	echo json_encode($model->resultSave['return']);
	exit();
	
?>