<?php
include_once '../classes/factory/DAOFactory.php';
include_once '../classes/facade/CursoFacade.php';
include_once '../classes/form/CursoForm.php';
include_once '../classes/model/Curso.php';

class CursoDAO extends DAOFactory{
    
    public function incluirCurso($objCurso){
        
        $sql = " INSERT INTO mm_tech.tb_curso ";
        $sql .= " ( ";
        $sql .= "   cur_nome, ";
        $sql .= "   cur_carga_horaria, ";
        $sql .= "   cur_emissor ";
        $sql .= " ) VALUES (  ";
        $sql .= "   :nome,  ";
        $sql .= "   :cargaHoraria,  ";
        $sql .= "   :emissor   ";
        $sql .= " ) ";

        $query = parent::$connection->pdo->prepare($sql);

        $query->bindParam(':nome', 			$objCurso->getNome(), 		    PDO::PARAM_STR);
		$query->bindParam(':cargaHoraria', 	$objCurso->getCargaHoraria(), 	PDO::PARAM_STR);
		$query->bindParam(':emissor', 		$objCurso->getEmissor(), 	    PDO::PARAM_STR);

        if (!$query->execute()) {
			$collectionErro = $query->errorInfo();
			throw new Exception("CursoDAO->incluirCurso " . $collectionErro[2]);
		}
        return true;
    }

    public function listarCurso(){

        $colectionCurso = array();

        $sql = "SELECT ";
		$sql .= "   cur_codigo,  ";
		$sql .= "   cur_nome,  ";
		$sql .= "   cur_carga_horaria, ";
		$sql .= "   cur_emissor ";
		$sql .= "FROM mm_tech.tb_curso ";
		$sql .= "ORDER BY cur_codigo ";

        $query = parent::$connection->pdo->prepare($sql);

		if ($query->execute()) {
			while ($rs = $query->fetch(PDO::FETCH_ASSOC)) {

				$objCurso = new Curso();

				$objCurso->setCodigo($rs['cur_codigo']);
				$objCurso->setNome($rs['cur_nome']);
				$objCurso->setCargaHoraria($rs['cur_carga_horaria']);
				$objCurso->setEmissor($rs['cur_emissor']);

				array_push($colectionCurso, $objCurso);
			}
		} else {
			$collectionErro = $query->errorInfo();
			throw new Exception("CursoDAO->listaCurso " . $collectionErro[2]);
		}
		return $colectionCurso;
    }

    public function obterDadosCurso($get){

        $acao = $get['acao'];
        $codigo = $get['codigo'];

		$sql = " SELECT ";
		$sql .= "	cur_codigo, ";
		$sql .= "	cur_nome, ";
		$sql .= "	cur_carga_horaria, ";
		$sql .= "	cur_emissor ";
		$sql .= "FROM mm_tech.tb_curso ";
		$sql .= "where cur_codigo = :codigoCurso ";

		$query = parent::$connection->pdo->prepare($sql);

		$query->bindParam(':codigoCurso', $codigo, PDO::PARAM_INT);

		if ($query->execute()) {
			$rs = $query->fetch(PDO::FETCH_ASSOC);

            $objCurso = new Curso();

            $objCurso->setAcao($acao);
            $objCurso->setCodigo($rs['cur_codigo']);
            $objCurso->setNome($rs['cur_nome']);
            $objCurso->setCargaHoraria($rs['cur_carga_horaria']);
            $objCurso->setEmissor($rs['cur_emissor']);

		} else {
			$collectionErro = $query->errorInfo();
			throw new Exception("CursoDAO->obterCurso " . $collectionErro[2]);
		}
		return $objCurso;
	}

    public function alterarCurso($objCurso)
	{
		$sql = " UPDATE mm_tech.tb_curso SET  ";
		$sql .= " cur_nome =            :nome, ";
		$sql .= " cur_carga_horaria =   :cargaHoraria,";
		$sql .= " cur_emissor =         :emissor";
		$sql .= " WHERE cur_codigo =  	:codigoCurso ";

		$query = parent::$connection->pdo->prepare($sql);

		$query->bindParam(':codigoCurso', 	$objCurso->getCodigo(), 		PDO::PARAM_STR);
		$query->bindParam(':nome', 			$objCurso->getNome(), 		    PDO::PARAM_STR);
		$query->bindParam(':cargaHoraria', 	$objCurso->getCargaHoraria(), 	PDO::PARAM_STR);
		$query->bindParam(':emissor', 		$objCurso->getEmissor(), 	    PDO::PARAM_STR);

		if (!$query->execute()) {
			$collectionErro = $query->errorInfo();
			throw new Exception("CursoDAO->alterarCurso " . $collectionErro[2]);
		}
		return true;
	}

    public function excluirCurso($objCurso)
	{
		$sql  = "DELETE FROM mm_tech.tb_curso ";
		$sql .= "WHERE cur_codigo = :codigoCurso ";

		$query = parent::$connection->pdo->prepare($sql);

		$query->bindParam(':codigoCurso', $objCurso->getCodigo(), PDO::PARAM_INT);

		if (!$query->execute()) {
			$collectionErro = $query->errorInfo();
			throw new Exception("CursoDAO->excluirCurso " . $collectionErro[2]);
		}
		return true;
	}





}