<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    $empresa = !empty($_POST['TBL01_ID']) ? $_POST['TBL01_ID'] : false;
    if(!$empresa){
        $return = false;
        
    } else {
        include_once 'conexao/conexao.php';
        include_once 'model/movimentacao.php';
        $db = new Conexao();
        $model = new Movimentacao($db);
		$return = $model->getMovimentacao($empresa);
        if (!$return) {
            $return = array('error' => 'Nenhuma movimentação cadastrada.');
        }
    }
    
    echo json_encode($return);
    exit();

?>