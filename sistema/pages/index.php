<?php
include_once 'configs/Config.php';
include_once '../classes/action/CursoAction.php';
include_once '../classes/action/ColaboradorAction.php';
include_once '../classes/action/MainAction.php';


    MainAction::header();

    $do = $_GET['do'];
    $action = $_GET['action'];
    //$acao = $_GET['acao'];

 
    /* 
    Verifica qual action e qual 
        função deve ser chamada
        -- Colaborador
     */
    if($do == "colaborador"){
        $colaboradorAction = new ColaboradorAction();
        if($action == "inicio"){
            $colaboradorAction->inicio();
        }
   
        if($action == "editar"){
            $colaboradorAction->editar($_GET);
        }
        
        if($action == "incluir"){
            $colaboradorAction->incluir($_POST);
        }

        if($action == "alterar"){
            $colaboradorAction->alterar($_POST);
        }

        if($action == "excluir"){
            $colaboradorAction->excluir($_POST);
        } 

        if($action == "listarItemColaborador"){
            $colaboradorAction->listarItemColaborador($_GET);
        }
    } 
    
    /* 
    Verifica qual action e qual 
        função deve ser chamada
        -- Curso
     */
    if($do == "curso"){
        $cursoAction = new CursoAction();
        if($action == "inicio"){
            $cursoAction->inicio();
        }
   
        if($action == "editar"){
            $cursoAction->editar($_GET);
        }
        
        if($action == "incluir"){
           $cursoAction->incluir($_POST);
        }

        if($action == "alterar"){
            $cursoAction->alterar($_POST);
        }

        if($action == "excluir"){
            $cursoAction->excluir($_POST);
        }
    } 


    if($do == "index"){
        include('templates/home.php');
    } 


    MainAction::footer();


