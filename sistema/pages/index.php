<?php
include_once 'configs/Config.php';
include_once '../classes/action/CourseAction.php';
include_once '../classes/action/UserAction.php';
include_once '../classes/action/ModuleAction.php';
include_once '../classes/action/MainAction.php';


    MainAction::header();

    $do = $_GET['do'];
    $action = $_GET['action'];

    if($do == "index" || $do == ""){
        include('templates/home.php');
    } 

    if($do == "user"){
        $userAction = new UserAction();
        if($action == "start"){
            $userAction->start();
        }
   
        if($action == "edit"){
            $userAction->edit($_GET);
        }
        
        if($action == "include"){
            $userAction->include($_POST);
        }

        if($action == "change"){
            $userAction->change($_POST);
        }

        if($action == "delete"){
            $userAction->delete($_GET);
        } 
    } 
    
    if($do == "course"){
        $courseAction = new CourseAction();
        if($action == "start"){
            $courseAction->start();
        }
   
        if($action == "edit"){
            $courseAction->edit($_GET);
        }
        
        if($action == "include"){
           $courseAction->include($_POST);
        }

        if($action == "change"){
            $courseAction->change($_POST);
        }

        if($action == "delete"){
            $courseAction->delete($_GET);
        }
    } 

    if($do == "module"){
        $moduleAction = new ModuleAction();
        if($action == "start"){
            $moduleAction->start($_GET);
        }
   
        if($action == "edit"){
            $moduleAction->edit($_GET);
        }
        
        if($action == "include"){
           $moduleAction->include($_POST);
        }

        if($action == "change"){
            $moduleAction->change($_POST);
        }

        if($action == "delete"){
            $moduleAction->delete($_GET);
        }
    } 

    


    MainAction::footer();


