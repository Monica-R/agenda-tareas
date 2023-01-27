<?php
/**
 * @param slug
 * 
 */
    require_once '../vendor/autoload.php';
    use Controller\UserController;
    
    // Get path by url
    $slug = $_GET['slug'] ?? '';
    $slug = explode('/', $slug);

    $resource = $slug[0] === '' ? '/' : $slug[0];
    $id = $slug[1] ?? null;

    $user = new UserController();

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
            break;
            
        default:
            echo 'error';

    }
?>