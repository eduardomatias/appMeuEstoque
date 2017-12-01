<?php
	
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	
	include_once 'conexao/conexao.php';
	include_once 'model/movimentacao.php';
	$db = new Conexao();
	$model = new Movimentacao($db);
	$model->setAttributes($_POST);
	$model->save();
	echo json_encode($model->resultSave['return']);
	exit();
	
?>