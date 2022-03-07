<?php
include_once '../classes/factory/DAOFactory.php';
include_once '../classes/facade/ColaboradorFacade.php';
include_once '../classes/form/ColaboradorForm.php';
include_once '../classes/model/Colaborador.php';

class ColaboradorDAO extends DAOFactory{

	public function listarItemTabelaBasica($codigo){

        $colectionCargo = array();

		$sql = " SELECT ";
		$sql .= " 	tab_codigo, ";
		$sql .= " 	tab_descricao, ";
		$sql .= " 	tab_tipo ";
		$sql .= " FROM mm_tech.tb_tabela_basica ";
		$sql .= " WHERE tab_tipo = :codigoTipo ";
		$sql .= " ORDER BY tab_ordem ";

        $query = parent::$connection->pdo->prepare($sql);

		$query->bindParam(':codigoTipo', $codigo, PDO::PARAM_INT);

		if ($query->execute()) {
			while ($rs = $query->fetch(PDO::FETCH_ASSOC)) {

				$objTabelaBasica = new TabelaBasica();

				$objTabelaBasica->setCodigo($rs['tab_codigo']);
				$objTabelaBasica->setDescricao($rs['tab_descricao']);
				$objTabelaBasica->setTipo($rs['tab_tipo']);

				array_push($colectionCargo, $objTabelaBasica);
			}
		} else {
			$collectionErro = $query->errorInfo();
			throw new Exception("TabelaBasicaDAO->listaTabelaBasica " . $collectionErro[2]);
		}
		return $colectionCargo;
    }

	public function listarColaborador(){
        
        $colectionColaborador = array();

		$sql = " SELECT ";
		$sql .= " 	fun.fun_codigo, ";
		$sql .= " 	fun.fun_nome, ";
		$sql .= " 	fun.fun_ddd_celular, ";
		$sql .= " 	fun.fun_celular, ";
		$sql .= " 	fun.tb_tipo_funcionario,";
		$sql .= " 	tab.tab_descricao ";
		$sql .= " FROM mm_tech.tb_funcionario as fun ";
		$sql .= " INNER JOIN mm_tech.tb_tabela_basica as tab ";
		$sql .= " 	ON fun.tb_tipo_funcionario = tab.tab_codigo ";
		$sql .= " ORDER BY fun_codigo ";

        $query = parent::$connection->pdo->prepare($sql);

		if ($query->execute()) {
			while ($rs = $query->fetch(PDO::FETCH_ASSOC)) {

				$objColaborador = new Colaborador();

				$objColaborador->setCodigo($rs['fun_codigo']);
				$objColaborador->setNome($rs['fun_nome']);
				$objColaborador->setDddCelular($rs['fun_ddd_celular']);
				$objColaborador->setCelular($rs['fun_celular']);
				$objColaborador->setObjCargo($rs['tab_descricao']);

				array_push($colectionColaborador, $objColaborador);
			}
		} else {
			$collectionErro = $query->errorInfo();
			throw new Exception("ColaboradorDAO->listaColaborador " . $collectionErro[2]);
		}
		return $colectionColaborador;
    }

	public function obterDadosColaborador($get){

		$acao = $get['acao'];
        $codigo = $get['codigo'];
        
        $colectionColaborador = array();

		$sql = " SELECT ";
		$sql .= " 	fun_codigo, ";
		$sql .= " 	fun_nome, ";
		$sql .= " 	fun_cpf, ";
		$sql .= " 	fun_rg, ";
		$sql .= " 	fun_data_nascimento, ";
		$sql .= " 	fun_ddd_telefone, ";
		$sql .= " 	fun_telefone, ";
		$sql .= " 	fun_ddd_celular, ";
		$sql .= " 	fun_celular, ";
		$sql .= " 	fun_email, ";
		$sql .= " 	fun_salario, ";
		$sql .= " 	fun_cep, ";
		$sql .= " 	fun_rua, ";
		$sql .= " 	fun_numero, ";
		$sql .= " 	fun_bairro, ";
		$sql .= " 	fun_complemento, ";
		$sql .= " 	fun_uf, ";
		$sql .= " 	fun_municipio, ";
		$sql .= " 	tb_tipo_funcionario ";
		$sql .= " FROM mm_tech.tb_funcionario ";
		$sql .= " WHERE fun_codigo = :codigo ";
		$sql .= " ORDER BY fun_codigo ";

        $query = parent::$connection->pdo->prepare($sql);

		$query->bindParam(':codigo', $codigo, PDO::PARAM_INT);

		if ($query->execute()) {
			while ($rs = $query->fetch(PDO::FETCH_ASSOC)) {

				$objColaborador = new Colaborador();

				$objColaborador->setAcao($acao);
				$objColaborador->setCodigo($rs['fun_codigo']);
				$objColaborador->setNome($rs['fun_nome']);
				$objColaborador->setCpf($rs['fun_cpf']);
				$objColaborador->setRg($rs['fun_rg']);
				$objColaborador->setDataNascimento($rs['fun_data_nascimento']);
				$objColaborador->setDddTelefone($rs['fun_ddd_telefone']);
				$objColaborador->setTelefone($rs['fun_telefone']);
				$objColaborador->setDddCelular($rs['fun_ddd_celular']);
				$objColaborador->setCelular($rs['fun_celular']);

				$objColaborador->setObjCargo(new TabelaBasica());
				$objColaborador->getObjCargo()->setCodigo($rs['tb_tipo_funcionario']);

				$objColaborador->setEmail($rs['fun_email']);
				$objColaborador->setSalario($rs['fun_salario']);
				
				$objColaborador->setObjEndereco(new Endereco());
				$objColaborador->getObjEndereco()->setCep($rs['fun_cep']);
				$objColaborador->getObjEndereco()->setRua($rs['fun_rua']);
				$objColaborador->getObjEndereco()->setNumero($rs['fun_numero']);
				$objColaborador->getObjEndereco()->setBairro($rs['fun_bairro']);
				$objColaborador->getObjEndereco()->setComplemento($rs['fun_complemento']);
				$objColaborador->getObjEndereco()->setUf($rs['fun_uf']);
				$objColaborador->getObjEndereco()->setMunicipio($rs['fun_municipio']);

			}
		} else {
			$collectionErro = $query->errorInfo();
			throw new Exception("ColaboradorDAO->obterDadosColaborador " . $collectionErro[2]);
		}

		return $objColaborador;
    }

	public function incluirColaborador($objColaborador){

		$sql = " INSERT INTO mm_tech.tb_funcionario ";
		$sql .= " ( ";
		$sql .= " 	fun_nome, ";
		$sql .= " 	fun_cpf, ";
		$sql .= " 	fun_rg, ";
		$sql .= " 	fun_data_nascimento, ";
		$sql .= " 	fun_ddd_telefone, ";
		$sql .= " 	fun_telefone, ";
		$sql .= " 	fun_ddd_celular, ";
		$sql .= " 	fun_celular, ";
		$sql .= " 	fun_email, ";
		$sql .= " 	fun_salario, ";
		$sql .= " 	fun_cep, ";
		$sql .= " 	fun_rua, ";
		$sql .= " 	fun_numero, ";
		$sql .= " 	fun_bairro, ";
		$sql .= " 	fun_complemento, ";
		$sql .= " 	fun_uf, ";
		$sql .= " 	fun_municipio, ";
		$sql .= " 	tb_tipo_funcionario ";
		$sql .= " ) VALUES ( ";
		$sql .= " 	:nome, ";
		$sql .= " 	:cpf, ";
		$sql .= " 	:rg, ";
		$sql .= " 	:dataNascimento, ";
		$sql .= " 	:dddTelefone, ";
		$sql .= " 	:telefone, ";
		$sql .= " 	:dddCelular, ";
		$sql .= " 	:celular, ";
		$sql .= " 	:email, ";
		$sql .= " 	:salario, ";
		$sql .= " 	:cep, ";
		$sql .= " 	:rua, ";
		$sql .= " 	:numero, ";
		$sql .= " 	:bairro, ";
		$sql .= " 	:complemento, ";
		$sql .= " 	:uf, ";
		$sql .= " 	:municipio, ";
		$sql .= " 	:cargo";
		$sql .= " )";
		$sql .= " RETURNING ";
		$sql .= "	fun_codigo ";

		$query = parent::$connection->pdo->prepare($sql);

		$query->bindParam(':nome', 				$objColaborador->getNome(), 		    PDO::PARAM_STR);
		$query->bindParam(':cpf', 			 	$objColaborador->getCpf(), 				PDO::PARAM_STR);
		$query->bindParam(':rg', 				$objColaborador->getRg(), 	    		PDO::PARAM_STR);
		$query->bindParam(':dataNascimento', 	$objColaborador->getDataNascimento(), 	PDO::PARAM_STR);
		$query->bindParam(':dddTelefone', 		$objColaborador->getDddTelefone(), 	    PDO::PARAM_STR);
		$query->bindParam(':telefone', 			$objColaborador->getTelefone(), 	    PDO::PARAM_STR);
		$query->bindParam(':dddCelular', 		$objColaborador->getDddCelular(), 	    PDO::PARAM_STR);
		$query->bindParam(':celular', 			$objColaborador->getCelular(), 	    	PDO::PARAM_STR);
		$query->bindParam(':email', 		 	$objColaborador->getEmail(), 	    	PDO::PARAM_STR);
		$query->bindParam(':salario', 			$objColaborador->getSalario(), 	    	PDO::PARAM_INT);
		$query->bindParam(':cep', 		 		$objColaborador->getObjEndereco()->getCep(), 	    	PDO::PARAM_STR);
		$query->bindParam(':rua', 				$objColaborador->getObjEndereco()->getRua(), 	    	PDO::PARAM_STR);
		$query->bindParam(':numero', 			$objColaborador->getObjEndereco()->getNumero(), 		PDO::PARAM_STR);
		$query->bindParam(':bairro', 			$objColaborador->getObjEndereco()->getBairro(), 		PDO::PARAM_STR);
		$query->bindParam(':complemento', 		$objColaborador->getObjEndereco()->getComplemento(),	PDO::PARAM_STR);
		$query->bindParam(':uf', 				$objColaborador->getObjEndereco()->getUf(), 	    	PDO::PARAM_STR);
		$query->bindParam(':municipio', 		$objColaborador->getObjEndereco()->getMunicipio(), 		PDO::PARAM_STR);
		$query->bindParam(':cargo', 			$objColaborador->getObjCargo()->getCodigo(), 	    	PDO::PARAM_INT);

		if ($query->execute()) {
			$rs = $query->fetch(PDO::FETCH_ASSOC);
			return $rs['fun_codigo'];
		} else {
			$collectionErro = $query->errorInfo();
			throw new Exception("ColaboradorDAO->incluirColaborador " . $collectionErro[2]);
		}
	}

	public function incluirItemCurso($objItemCurso, $codigoColaborador){

		$sql = " INSERT INTO mm_tech.tb_item_colaborador_curso ";
		$sql .= " (  ";
		$sql .= " 	icc_data_conclusao, ";
		$sql .= " 	icc_remuneracao, ";
		$sql .= " 	icc_observacao, ";
		$sql .= " 	cur_codigo, ";
		$sql .= " 	fun_codigo ";
		$sql .= " ) VALUES (  ";
		$sql .= " 	:dataConclusao, ";
		$sql .= " 	:remuneracao, ";
		$sql .= " 	:observacao, ";
		$sql .= " 	:codigoCurso, ";
		$sql .= " 	:codigoFuncionario ";
		$sql .= " ) ";

		$query = parent::$connection->pdo->prepare($sql);

		$query->bindParam(':dataConclusao', 		$objItemCurso->getDataConclusao(), 			PDO::PARAM_STR);
		$query->bindParam(':remuneracao', 			$objItemCurso->getValorRemuneracao(),  		PDO::PARAM_STR);
		$query->bindParam(':observacao', 			$objItemCurso->getObservacao(), 			PDO::PARAM_STR);
		$query->bindParam(':codigoCurso', 			$objItemCurso->getObjCurso()->getCodigo(), 	PDO::PARAM_INT);
		$query->bindParam(':codigoFuncionario', 	$codigoColaborador, 						PDO::PARAM_INT);

		if ($query->execute()) {
			$query->fetch(PDO::FETCH_ASSOC);
		} else {
			$collectionErro = $query->errorInfo();
			throw new Exception("ColaboradorDAO->incluirColaborador " . $collectionErro[2]);
		}
		
	}

	public function listarItemColaborador($codigoColaborador){

		$sql = " SELECT ";
		$sql .= " 	icc_codigo, ";
		$sql .= " 	icc_data_conclusao, ";
		$sql .= " 	icc_remuneracao, ";
		$sql .= " 	icc_observacao, ";
		$sql .= " 	cur_codigo, ";
		$sql .= " 	fun_codigo ";
		$sql .= " FROM mm_tech.tb_item_colaborador_curso ";
		$sql .= " WHERE fun_codigo = :codigoColaborador ";
		$sql .= " ORDER BY icc_codigo ";

		$query = parent::$connection->pdo->prepare($sql);

		$query->bindParam(":codigoColaborador", $codigoColaborador, PDO::PARAM_INT);

		$collectionItemColaborador = array();
		if ($query->execute()) {
			while ($rs = $query->fetch(PDO::FETCH_ASSOC)) {
				$objItemColaboradorCurso = new ItemColaboradorCurso();

				$objItemColaboradorCurso->setCodigo($rs['icc_codigo']);
				$objItemColaboradorCurso->setDataConclusao($rs['icc_data_conclusao']);
				$objItemColaboradorCurso->setValorRemuneracao($rs['icc_remuneracao']);
				$objItemColaboradorCurso->setObservacao($rs['icc_observacao']);

				$objItemColaboradorCurso->setObjCurso(new Curso());
				$objItemColaboradorCurso->getObjCurso()->setCodigo($rs['cur_codigo']);

				array_push($collectionItemColaborador, $objItemColaboradorCurso);
			}
		} else {
			$collectionErro = $query->errorInfo();
			throw new Exception("ColaboradorDAO->listarItemColaborador" . $collectionErro[2]);
		}
		return $collectionItemColaborador;
		
	}
}

    

