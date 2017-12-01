<?php
	
	include_once dirname(__FILE__) . '/model.php';
	class Movimentacao extends Model {
		
		/**
		* tableSchema
		*
		* @author Eduardo Matias 
		* @return string
		*/
		public static function tableSchema() {
			return 'MEUESTOQUE';
		}
		
		/**
		* tableName
		*
		* @author Eduardo Matias 
		* @return string
		*/
		public static function tableName() {
			return 'TBL04_MOVIMENTACAO';
		}
		
		/**
		* primaryKey
		*
		* @author Eduardo Matias 
		* @return string
		*/
		public static function primaryKey() {
			return 'TBL04_ID';
		}
		
		/**
		* attributeLabel
		*
		* @author Eduardo Matias 
		* @return array
		*/
		public static function attributeLabel() {
			return array(
				'TBL04_ID' => 'ID',
				'TBL04_TIPO' => 'TIPO',
				'TBL04_ID_PRODUTO' => 'PRODUTO',
				'TBL04_ID_FORNECEDOR' => 'FORNECEDOR',
				'TBL04_ID_EMPRESA' => 'EMPRESA',
				'TBL04_QTD' => 'QTD',
				'TBL04_CUSTO_TOTAL' => 'VALOR',
				'TBL04_DATA' => 'DATA'
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
						'TBL04_TIPO',
						'TBL04_ID_PRODUTO',
						'TBL04_ID_FORNECEDOR',
						'TBL04_ID_EMPRESA',
						'TBL04_QTD',
						'TBL04_CUSTO_TOTAL',
						'TBL04_DATA'
					)
				),
				array(
					'dateBR', 
					array(
						'TBL04_DATA'
					)
				),
				array(
					'integer', 
					array(
						'TBL04_QTD'
					)
				)
			);
		}
		
		/**
		* getMovimentacao
		* retorna as movimentacoes da empresa
		*
		* @author Eduardo Matias 
		* @return array
		*/
		public function getMovimentacao($empresa) {
			$tableSchema = $this::tableSchema();
			$tableName = $this::tableName();
			$sql = "
				SELECT TBL02_NOME AS PRODUTO, TBL03_NOME AS FORNECEDOR, " . $tableName . ".*
				FROM " . $tableSchema . "." . $tableName . "
				INNER JOIN $tableSchema.TBL02_PRODUTO ON (TBL02_ID = TBL04_ID_PRODUTO)
				INNER JOIN $tableSchema.TBL03_FORNECEDOR ON (TBL03_ID = TBL04_ID_FORNECEDOR)
				WHERE TBL04_ID_EMPRESA = ?
				ORDER BY TBL04_DATA DESC";
			return $this->db->queryAssoc($sql, array($empresa));
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








