<?php

	header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'conexao/conexao.php';
include_once 'model/movimentacao.php';
$db = new Conexao();
$model = new Movimentacao($db);
// verifica valor
if (!empty($_POST['TBL04_TIPO']) && !empty($_POST['TBL04_CUSTO_TOTAL'])) {
    $_POST['TBL04_CUSTO_TOTAL'] *= ($_POST['TBL04_TIPO'] == 1) ? -1 : 1;
    $_POST['TBL04_QTD'] *= ($_POST['TBL04_TIPO'] == 1) ? 1 : -1;
}
$model->setAttributes($_POST);
$model->save();
echo json_encode($model->resultSave['return']);
exit();
?>