<?php
require_once '../database/Connection.php';
include_once '../classes/dao/CursoDAO.php';
include_once '../classes/factory/DAOFactory.php';

class CursoFacade{

    /* Listar */
    public function listarCurso(){
        
        DAOFactory::getDAOFactory();
        
        $objCursoDAO  = new  CursoDAO();

        try {
            DAOFactory::$connection->pdo->beginTransaction();

            $colectionCurso = $objCursoDAO->listarCurso();

            DAOFactory::$connection->pdo->commit();
			DAOFactory::$connection->closePDO();
        } catch (Exception $e) {
            DAOFactory::$connection->pdo->rollBack();
			DAOFactory::$connection->closePDO();
            throw new Exception($e->getMessage());
        }

        return $colectionCurso;
 
    }

    /* Incluir */
    public function incluirCurso($objCurso){
        DAOFactory::getDAOFactory();

        $objCursoDAO  = new  CursoDAO();

        try {
            DAOFactory::$connection->pdo->beginTransaction();
            
            $colectionCurso = $objCursoDAO->incluirCurso($objCurso);

            DAOFactory::$connection->pdo->commit();
			DAOFactory::$connection->closePDO();
        } catch (Exception $e) {
            DAOFactory::$connection->pdo->rollBack();
			DAOFactory::$connection->closePDO();
            throw new Exception($e->getMessage());
        }
        return true;
    }

    /* Obter */
    public function obterDadosCurso($get){
        DAOFactory::getDAOFactory();

        $objCursoDAO  = new  CursoDAO();

        try {

            $objCurso = $objCursoDAO->obterDadosCurso($get);

            DAOFactory::$connection->pdo->commit();
			DAOFactory::$connection->closePDO();
        } catch (Exception $e) {
            DAOFactory::$connection->pdo->rollBack();
			DAOFactory::$connection->closePDO();
            throw new Exception($e->getMessage());
        }
        return $objCurso;
    }


    /* Alterar */
    public function alterarCurso($objCurso){
        DAOFactory::getDAOFactory();

        $objCursoDAO  = new  CursoDAO();

        try {

            $objCursoDAO->alterarCurso($objCurso);

            DAOFactory::$connection->pdo->commit();
			DAOFactory::$connection->closePDO();
        } catch (Exception $e) {
            DAOFactory::$connection->pdo->rollBack();
			DAOFactory::$connection->closePDO();
            throw new Exception($e->getMessage());
        }
        return true;
    }

    /* Exluir */
    public function excluirCurso($objCurso){
        DAOFactory::getDAOFactory();

        $objCursoDAO  = new  CursoDAO();

        try {

            $objCursoDAO->excluirCurso($objCurso);

            DAOFactory::$connection->pdo->commit();
			DAOFactory::$connection->closePDO();
        } catch (Exception $e) {
            DAOFactory::$connection->pdo->rollBack();
			DAOFactory::$connection->closePDO();
            throw new Exception($e->getMessage());
        }

        return true;
    }
}