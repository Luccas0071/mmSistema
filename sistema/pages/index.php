<?php
include_once 'configs/config.php';
include_once '../classes/action/cursoAction.php';
include_once '../classes/action/colaboradorAction.php';


$smarty->display('include/header.html');
$smarty->display('include/menu.html');

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


$smarty->display('include/footer.html');


