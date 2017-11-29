<?php

	error_reporting(E_ALL);
	ini_set('display_errors',1);
	oci_internal_debug(1);

	
	include_once dirname(__FILE__) . '/model.php';
	class Produto extends Model {
		
		/**
		* tableSchema
		*
		* @author Eduardo Matias 
		* @return string
		*/
		public static function tableSchema() {
			return 'meuestoque';
		}
		
		/**
		* tableName
		*
		* @author Eduardo Matias 
		* @return string
		*/
		public static function tableName() {
			return 'tbl02_produto';
		}
		
		/**
		* primaryKey
		*
		* @author Eduardo Matias 
		* @return string
		*/
		public static function primaryKey() {
			return 'TBL02_ID';
		}
		
		/**
		* attributeLabel
		*
		* @author Eduardo Matias 
		* @return array
		*/
		public static function attributeLabel() {
			return array(
				'TBL02_ID' => 'ID',
				'TBL02_NOME' => 'NOME',
				'TBL02_ID_EMPRESA' => 'EMPRESA',
				'TBL02_ATIVO' => 'ATIVO'
			);
		}
		
		/**
		* rules
		* [validateName, [colunas]]
		*
		* @author Eduardo Matias 
		* @return array
		*/
		public function rules() {
			return array(
				array(
					'required', 
					array(
						'TBL02_NOME',
						'TBL02_ID_EMPRESA'
					)
				)
			);
		}
	}
	/*
	
	$db = new Conexao();
	$model = new Empresa($db);
	
	
	
	// select no modelo
	$rModel = $model->find();
	foreach ($rModel as $v) {
		var_dump($v);
	}
	echo '<hr />';
	
	
	
	// select
	$r = $db->queryAssoc('SELECT * FROM meuestoque.tbl01_empresa WHERE TBL01_ATIVO=?', array(1));
	foreach ($r as $v) {
		var_dump($v);
	}
	echo '<hr />';
	
	
	
	// combo
	$combo = $model->getCombo('tbl01_empresa', 'TBL01_ID', 'TBL01_NOME');
	var_dump($combo);
	echo '<hr />';
	
	
	
	echo 'INSERT <br />';
	$arrayAttr = array(
		// 'TBL01_ID' => '1',
		'TBL01_NOME' => 'New Empresa',
		'TBL01_CNPJ' => '00332599256',
		// 'TBL01_SENHA' => 'SENHA',
		'TBL01_ATIVO' => '1'
	);
	$model->setAttributes($arrayAttr);
	$model->save();
	var_dump($model);
	echo '<hr />';

	

	// findOne
	echo 'FINDONE - INSTANCE <br />';
	if(($empresa_1 = $model->findOne(1))) {	
		var_dump($empresa_1);
		
		echo 'VALORES <br />';
		var_dump($empresa_1->getAttributes());
		
		echo 'VALORES SETADOS <br />';
		var_dump($empresa_1->getAttributesSet());
		
		echo 'SETATTRIBUTES <br />';
		$empresa_1->setAttributes($arrayAttr);
		$empresa_1->save();
		
		var_dump($empresa_1);
		
	}
	
	*/
	
?>








