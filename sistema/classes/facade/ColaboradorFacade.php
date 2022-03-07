<?php
include_once '../classes/factory/DAOFactory.php';
include_once '../classes/dao/colaboradorDAO.php';

class ColaboradorFacade{

    /* Listar */
    public function listarColaborador(){
        
        DAOFactory::getDAOFactory();
        
        $objColaboradorDAO  = new  ColaboradorDAO();

        try {
            DAOFactory::$connection->pdo->beginTransaction();

            $colectionColaborador = $objColaboradorDAO->listarColaborador();

            DAOFactory::$connection->pdo->commit();
			DAOFactory::$connection->closePDO();
        } catch (Exception $e) {
            DAOFactory::$connection->pdo->rollBack();
			DAOFactory::$connection->closePDO();
            throw new Exception($e->getMessage());
        }
        return $colectionColaborador;
    }

    /* Incluir */
    public function incluirColaborador($objColaborador){
        DAOFactory::getDAOFactory();

        $objColaboradorDAO  = new  ColaboradorDAO();

        try {
            DAOFactory::$connection->pdo->beginTransaction();

            $codigoColaborador = $objColaboradorDAO->incluirColaborador($objColaborador);

            foreach ($objColaborador->getCollectionItemCurso() as $objItemCurso) {
				$objColaboradorDAO->incluirItemCurso($objItemCurso, $codigoColaborador);
			}
            DAOFactory::$connection->pdo->commit();
			DAOFactory::$connection->closePDO();
        } catch (Exception $e) {
            DAOFactory::$connection->pdo->rollBack();
			DAOFactory::$connection->closePDO();
            echo $e;
        }
        return true;
    }

    /* Obter */
    public function obterDadosColaborador($get){
        DAOFactory::getDAOFactory();

        $objColaboradorDAO  = new  ColaboradorDAO();

        try {
            DAOFactory::$connection->pdo->beginTransaction();

            $objColaborador = $objColaboradorDAO->obterDadosColaborador($get);

            DAOFactory::$connection->pdo->commit();
			DAOFactory::$connection->closePDO();
        } catch (Exception $e) {
            DAOFactory::$connection->pdo->rollBack();
			DAOFactory::$connection->closePDO();
            throw new Exception($e->getMessage());
        }
        return $objColaborador;
    }


    /* Alterar */
    public function alterarCurso($objCurso){
        DAOFactory::getDAOFactory();

        $objCursoDAO  = new  CursoDAO();

        try {
            DAOFactory::$connection->pdo->beginTransaction();

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
            DAOFactory::$connection->pdo->beginTransaction();

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

    //Listar Tabela Basica
    public function listarItemTabelaBasica($codigoTipo){
        DAOFactory::getDAOFactory();

        $objColaboradorDAO  = new  ColaboradorDAO();

        try {
            DAOFactory::$connection->pdo->beginTransaction();

            $colectionCargo = $objColaboradorDAO->listarItemTabelaBasica($codigoTipo);

            DAOFactory::$connection->pdo->commit();
			DAOFactory::$connection->closePDO();
        } catch (Exception $e) {
            DAOFactory::$connection->pdo->rollBack();
			DAOFactory::$connection->closePDO();
            throw new Exception($e->getMessage());
        }
        return $colectionCargo;;
    }

    //Listar Item Colaborador
    public function listarItemColaborador($codigoColaborador){
        DAOFactory::getDAOFactory();

        $objColaboradorDAO  = new  ColaboradorDAO();

        try {
            DAOFactory::$connection->pdo->beginTransaction();

            $collectionCurso = $objColaboradorDAO->listarItemColaborador($codigoColaborador);

            DAOFactory::$connection->pdo->commit();
			DAOFactory::$connection->closePDO();
        } catch (Exception $e) {
            DAOFactory::$connection->pdo->rollBack();
			DAOFactory::$connection->closePDO();
            throw new Exception($e->getMessage());
        }
        return $collectionCurso;
    }
}