<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors',1);
	oci_internal_debug(1);

	include_once 'conexao/conexao.php';
	include_once 'model/produto.php';
	
	$db = new Conexao();
	$model = new Produto($db);
	$model->setAttributes($_POST);
	$model->save();
	echo json_encode($model->resultSave['return']);
	exit();
	
?>