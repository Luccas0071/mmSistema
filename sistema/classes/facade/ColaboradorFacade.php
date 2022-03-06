<?php

include_once '../classes/dao/colaboradorDAO.php';

class ColaboradorFacade{

    function incluirColaborador($objColaborador){
        require_once "../database/connectDatabase.php";

        $objColaboradorDAO = ColaboradorDAO();

        try {


            $codigoColaborador = $objColaboradorDAO->incluirColaborador($objColaborador);

            foreach($objColaborador->getCollectionItemCurso() as $objItemCurso){
                $objColaboradorDAO->incluirItemCurso($objItemCurso, $codigoColaborador);
            }
           
        } catch (Exception $e) {
            //throw $th;
        }
    }

}