<?php

    $empresa = !empty($_POST['TBL01_ID']) ? $_POST['TBL01_ID'] : false;
    if(!$empresa){
        $return = false;
        
    } else {
        include_once 'conexao/conexao.php';
        include_once 'model/movimentacao.php';
        $db = new Conexao();
        $model = new Movimentacao($db);
        $return = $model->find('TBL04_ID_EMPRESA = ' . $empresa . ' AND TBL04_ATIVO = 1', 'TBL04_DATA DESC');
        if (!$return) {
            $return = array('error' => 'Nenhuma movimentação cadastrada.');
        }
    }
    
    echo json_encode($return);
    exit();

?>