<?php
$empresa = !empty($_POST['TBL01_ID']) ? $_POST['TBL01_ID'] : false;
if (!$empresa) {
    $return = false;
} else {
    include_once 'conexao/conexao.php';
    include_once 'model/produto.php';
    $db = new Conexao();
    $model = new Produto($db);
    $return = $model->find('TBL02_ID_EMPRESA = ' . $empresa, 'TBL02_ATIVO DESC,TBL02_NOME');
    if (!$return) {
        $return = array('error' => 'Nenhum produto cadastrado.');
    }
}

echo json_encode($return);
exit();
?>