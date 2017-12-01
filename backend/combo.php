<?php
	

    $empresa = !empty($_POST['e']) ? $_POST['e'] : false;
    $tabela = !empty($_POST['t']) ? strtoupper($_POST['t']) : false;

    if($empresa && $tabela){

        include_once 'conexao/conexao.php';
        include_once 'model/empresa.php';

        $db = new Conexao();
        $model = new Empresa($db);

        switch ($tabela) {
        	case 'TBL02_PRODUTO':
	        	$id = 'TBL02_ID';
	        	$label = 'TBL02_NOME';
	        	$where = 'TBL02_ID_EMPRESA = ' . (int) $empresa . ' AND TBL02_ATIVO = 1';
        		break;
        	
        	default:
        		$tabela = false;
        		break;
        }

        if($tabela) {
		    echo $model->getCombo($tabela, $id, $label, $where);
        }
    }
	
?>