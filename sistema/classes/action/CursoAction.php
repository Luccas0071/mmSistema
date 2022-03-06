<?php
include_once '../classes/form/cursoForm.php';
include_once '../classes/model/curso.php';
include_once '../classes/dao/CursoDAO.php';
include_once '../pages/configs/config.php';
 

class CursoAction{
    
    public function inicio(){

        $objCursoFacade   = new CursoFacade();
        $smarty             = new Smarty();

        $colectionCurso = $objCursoFacade->listarCurso();
        $smarty->assign("colectionCurso", $colectionCurso);

        $smarty->display('templates/curso/pesquisarCurso.html');
    }

    public function editar($get){
     
        $objCursoForm   = new CursoForm();
        $objCursoFacade    = new CursoFacade();
        $smarty         = new Smarty();

        $acao = $get['acao'];

        if($acao != "I"){
            $objCurso = $objCursoFacade->obterDadosCurso($get);
            $objCursoForm->transfereModelForm($objCurso);
        }
        $objCursoForm->setAcao($acao);
        $smarty->assign("objCursoForm", $objCursoForm);

        if($acao == "I" || $acao == "A"){
            $smarty->display('templates/curso/editarCurso.html');
        }else {
            $smarty->display('templates/curso/exibirCurso.html');
        }
        
    }

    public function incluir($request){

        $objCursoForm   = new CursoForm();
        $objCursoFacade    = new CursoFacade();

        $objCursoForm->transfereRequestForm($request);
        $objCurso = $objCursoForm->transfereFormModel();

        $objCursoFacade->incluirCurso($objCurso);
    }

    public function alterar($request){

        $objCursoForm = new CursoForm();
        $objCursoFacade = new CursoFacade();

        $objCursoForm->transfereRequestForm($request);
        $objCurso = $objCursoForm->transfereFormModel();

        $objCursoFacade->alterarCurso($objCurso);
    }

    public function excluir($request){

        $objCursoFacade = new CursoFacade();
        $objCursoForm = new CursoForm();

        $objCursoForm->transfereRequestForm($request);
        $objCurso = $objCursoForm->transfereFormModel();

        $objCursoFacade->excluirCurso($objCurso);
        
        header('Location: index.php?do=curso&action=inicio&sucesso');
    }


}