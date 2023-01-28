<?php
/**
 * @param slug
 * 
 */
    require_once '../vendor/autoload.php';
    session_start();
    use Controller\UserController;
    use Controller\LoginController;
    use Controller\TaskController;
    
    // Get path by url
    $slug = $_GET['slug'] ?? '';
    $slug = explode('/', $slug);

    $resource = $slug[0] === '' ? '/' : $slug[0];
    $id = $slug[1] ?? null;

    $user = new UserController();
    $user1 = new LoginController();
    $task = new TaskController();

    switch($resource) {
        case "/":
        case "index":
            require_once '../views/index.php';
            break;

        case 'register':
            require_once '../views/register.php';
            if($_POST){
                $user->createUser();
            }
            break;

        case 'login':
            require_once '../views/login.php';
            if($_POST){
                $user1->login($_REQUEST["email"], $_REQUEST["pass"]);
            }
            break;
            
        case 'profile':
            require_once '../views/profile_user.php';
            if($_POST){
                $task->createTask();
            }
            break;

        case 'tasks':
            require_once '../views/showTasks.php';
            break;

        case 'check':
            $task->setStatus();
            break;

        case 'delete':
            $task->deleteTask();
            break;

        case 'edit':
            $task->updateTask();
            break;

        case 'logout':
            if($_POST){
                $user1->logout();
            }
            break;

        default:
            echo 'error';

    }
?>