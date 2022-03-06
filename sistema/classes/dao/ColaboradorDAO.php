<?php


class ColaboradorDAO {

	public function listarItemTabelaBasica($codigo){

        require_once "../database/connectDatabase.php";
	
        $colectionCargo = array();

		$sql = " SELECT ";
		$sql .= " 	tab_codigo, ";
		$sql .= " 	tab_descricao, ";
		$sql .= " 	tab_tipo ";
		$sql .= " FROM mm_tech.tb_tabela_basica ";
		$sql .= " WHERE tab_tipo = :codigoTipo ";
		$sql .= " ORDER BY tab_ordem ";

        $query = $pdo->prepare($sql);

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
		unset($query);
		return $colectionCargo;
    }

	public function listarColaborador(){

		require_once "../database/connectDatabase.php";
        
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

        $query = $pdo->prepare($sql);

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
		unset($query);
		return $colectionColaborador;
    }

	public function obterDadosColaborador($get){

		require_once "../database/connectDatabase.php";
        
        $colectionColaborador = array();

		$sql = " SELECT ";
		$sql .= " 	fun.fun_codigo, ";
		$sql .= " 	fun.fun_nome, ";
		$sql .= " 	fun.fun_cpf, ";
		$sql .= " 	fun.fun_rg, ";
		$sql .= " 	fun.fun_data_nascimento, ";
		$sql .= " 	fun.fun_ddd_telefone, ";
		$sql .= " 	fun.fun_telefone, ";
		$sql .= " 	fun.fun_ddd_celular, ";
		$sql .= " 	fun.fun_celular, ";
		$sql .= " 	fun.fun_email, ";
		$sql .= " 	fun.fun_salario, ";
		$sql .= " 	fun.fun_cep, ";
		$sql .= " 	fun.fun_rua, ";
		$sql .= " 	fun.fun_numero, ";
		$sql .= " 	fun.fun_bairro, ";
		$sql .= " 	fun.fun_complemento, ";
		$sql .= " 	fun.fun_uf, ";
		$sql .= " 	fun.fun_municipio ";
		$sql .= " 	tab.tab_descricao ";
		$sql .= " FROM mm_tech.tb_funcionario as fun ";
		$sql .= " INNER JOIN mm_tech.tb_tabela_basica as tab ";
		$sql .= " 	ON fun.tb_tipo_funcionario = tab.tab_codigo ";
		$sql .= " ORDER BY fun_codigo ";

        $query = $pdo->prepare($sql);

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
		unset($query);
		return $colectionColaborador;
    }

	public function incluirColaborador($objColaborador){

		require_once "../database/connectDatabase.php";

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

		$query = $pdo->prepare($sql);

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
			unset($query);
		} else {
			$collectionErro = $query->errorInfo();
			throw new Exception("ColaboradorDAO->incluirColaborador " . $collectionErro[2]);
		}
	}

	public function incluirItemCurso($objItemCurso, $codigoColaborador){

		require_once "../database/connectDatabase.php";

		$sql = " INSERT INTO mm_tech.tb_item_colaborador_curso ";
		$sql .= " (  ";
		$sql .= " 	icc_data_conclusao, ";
		$sql .= " 	icc_remuneracao, ";
		$sql .= " 	icc_observacao, ";
		$sql .= " 	cur_codigo, ";
		$sql .= " 	fur_codigo ";
		$sql .= " ) VALUES (  ";
		$sql .= " 	:dataConclusao, ";
		$sql .= " 	:remuneracao, ";
		$sql .= " 	:observacao, ";
		$sql .= " 	:codigoCurso, ";
		$sql .= " 	:codigoFuncionario ";
		$sql .= " ) ";

		$query = $pdo->prepare($sql);

		$query->bindParam(':dataConclusao', 		$objItemCurso->getDataConclusao(), 			PDO::PARAM_STR);
		$query->bindParam(':remuneracao', 			$objItemCurso->getValorRemuneracao(),  		PDO::PARAM_STR);
		$query->bindParam(':observacao', 			$objItemCurso->getObservacao(), 			PDO::PARAM_STR);
		$query->bindParam(':codigoCurso', 			$objItemCurso->getObjCurso()->getCodigo(), 	PDO::PARAM_INT);
		$query->bindParam(':codigoFuncionario', 	$codigoColaborador, 						PDO::PARAM_INT);

		if ($query->execute()) {
			$query->fetch(PDO::FETCH_ASSOC);
			unset($query);
		} else {
			$collectionErro = $query->errorInfo();
			throw new Exception("ColaboradorDAO->incluirColaborador " . $collectionErro[2]);
		}
		
	}
}

    

