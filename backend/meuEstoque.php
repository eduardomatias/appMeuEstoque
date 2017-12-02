<?php
	
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

$empresa = !empty($_POST['TBL01_ID']) ? $_POST['TBL01_ID'] : false;
if (!$empresa) {
    $return = false;
} else {
    include_once 'conexao/conexao.php';
    include_once 'model/movimentacao.php';
    $db = new Conexao();
    $model = new Movimentacao($db);
    $return = $model->getEstoqueAtual($empresa);
    if (!$return) {
        $return = array('error' => 'Estoque vazio.');
    }
}
echo json_encode($return);
exit();
?>