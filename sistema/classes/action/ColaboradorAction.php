<?php
include_once '../classes/form/colaboradorForm.php';
include_once '../classes/facade/colaboradorFacade.php';
include_once '../classes/model/Colaborador.php';
include_once '../classes/dao/colaboradorDAO.php';
include_once '../pages/configs/config.php';
class ColaboradorAction{

    public function inicio(){

        $objColaboradorFacade   = new ColaboradorFacade();
        $smarty                 = new Smarty();

        try {
            
            $colectionColaborador = $objColaboradorFacade->listarColaborador();
            $smarty->assign("colectionColaborador", $colectionColaborador);

        } catch (Exception $e) {
            throw new Exception("ColaboradorAction->inicio " . $e);
        }
        

        $smarty->display('templates/colaborador/pesquisarColaborador.html');
	}

    public function editar($get){
        $objColaboradorForm     = new ColaboradorForm();
        $objColaboradorFacade   = new ColaboradorFacade();
        $objCursoFacade         = new CursoFacade();
        $smarty                 = new Smarty();

        $acao = $get['acao'];

        if($acao != "I"){
            $objColaborador = $objColaboradorFacade->obterDadosColaborador($get);
            $objColaboradorForm->transfereModelForm($objColaborador);
        }

        $objColaboradorForm->setAcao($acao);
        $smarty->assign("objColaboradorForm", $objColaboradorForm);

        //Busca Tipo de Cargo
        $collectionCargo = $objColaboradorFacade->listarItemTabelaBasica('1');
        $smarty->assign("collectionCargo", $collectionCargo);

        //Busca Cursos
        $collectionCurso = $objCursoFacade->listarCurso();
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

    public function listarItemColaborador($get){
        $objColaboradorFacade = new ColaboradorFacade();
        $objItemColaboradorCurso = new ItemColaboradorCurso();

        $codigoColaborador = $get['codigoColaborador'];
      
        try {
            $collectionItemColaborador = $objColaboradorFacade->listarItemColaborador($codigoColaborador);
            $arrayItemColaborador = $objItemColaboradorCurso->transfereCollectionItemColaboradorArray($collectionItemColaborador);
        } catch (Exception $e) {
            //throw $th;
        }

        echo json_encode($arrayItemColaborador);
	}


}

   