<?php
	
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

$userName = !empty($_POST['username']) ? $_POST['username'] : false;
$userPass = !empty($_POST['password']) ? md5($_POST['password']) : false;

if(!$userName || !$userPass) {
	$return = array('error' => 'Preencha todos os campos.');
	
} else {
	include_once 'conexao/conexao.php';
	$db = new Conexao();
	$user = $db->queryAssoc('SELECT * FROM MEUESTOQUE.TBL01_EMPRESA WHERE TBL01_CNPJ=? AND TBL01_SENHA=?', array($userName, $userPass));
	if(!$user) {
		$return = array('error' => 'Dados incorretos, verifique e tente novamente.');
		
	} else {
		$return = $user[0];
		
	}
}

echo json_encode($return);
exit();
	
?>