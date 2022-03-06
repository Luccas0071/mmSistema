<?php
include_once '../classes/form/colaboradorForm.php';
include_once '../classes/dao/colaboradorDAO.php';
include_once 'configs/config.php';
include_once '../pages/configs/config.php';
include_once '../classes/form/cursoForm.php';
include_once '../classes/facade/ColaboradorFacade.php';

class ColaboradorAction{

    public function inicio(){

        $objColaboradorDAO  = new ColaboradorDAO();
        $smarty             = new Smarty();

        $colectionColaborador = $objColaboradorDAO->listarColaborador();
        $smarty->assign("colectionColaborador", $colectionColaborador);

        $smarty->display('templates/colaborador/pesquisarColaborador.html');
	}

    public function editar($get){
        $objColaboradorForm   = new ColaboradorForm();
        $objColaboradorDAO    = new ColaboradorDAO();
        $objCursoDAO          = new CursoDAO();
        $smarty               = new Smarty();

        $acao = $get['acao'];

        /* if($acao != "I"){
            $objColaborador = $objColaboradorDAO->obterDadosColaborador($get);
            $objCursoForm->transfereModelForm($objCurso);
        } */

        $objColaboradorForm->setAcao($acao);
        $smarty->assign("objColaboradorForm", $objColaboradorForm);

        //Busca Tipo de Cargo
        $collectionCargo = $objColaboradorDAO->listarItemTabelaBasica('1');
        $smarty->assign("collectionCargo", $collectionCargo);

        //Busca Cursos
        $collectionCurso = $objCursoDAO->listarCurso();
        $smarty->assign("collectionCurso", $collectionCurso);

        if($acao == "I" || $acao == "A"){
            $smarty->display('templates/colaborador/editarColaborador.html');
        }else {
            $smarty->display('templates/colaborador/exibirColaborador.html');
        }
	
	}

    public function incluir($request){

       $objColaboradorForm      = new ColaboradorForm();
       $objColaboradorFacade    = new ColaboradorFacade();
       $smarty                  = new Smarty();

       $objColaboradorForm->transfereRequestForm($request);
       $objColaborador = $objColaboradorForm->transfereFormModel();

       $objColaboradorFacade->incluirColaborador($objColaborador);
    }

    public function alterar(){
	
	}

    public function excluir(){
	
	}


}

   