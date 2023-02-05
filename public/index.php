<?php
/**
 * This is a PHP script that implements a switch statement to handle various URL resources.
 * 
 * @param slug - the path of the URL that the user is trying to access.
 * 
 */

    // Include the autoloader file to load dependencies
    require_once '../vendor/autoload.php';
    // Start a session
    session_start();

    // Use the Controller classes
    use Controllers\UserController;
    use Controllers\LoginController;
    use Controllers\TaskController;
    
    // Get the `slug` from the URL, splitting it by `/` and storing it in an array
    $slug = $_GET['slug'] ?? '';
    $slug = explode('/', $slug);

    // Get the first element of the array, which is the `resource`, and default it to `/` if the array is empty
    $resource = $slug[0] === '' ? '/' : $slug[0];
    // Get the second element of the array, which is the `id`, and default it to `null` if not provided
    $id = $slug[1] ?? null;

    // Initialize instances of the Controller classes
    $user = new UserController();
    $user1 = new LoginController();
    $task = new TaskController();

    // Use a switch statement to handle the different `resource` values
    switch($resource) {
        case "/":
        case "index":
            // If the resource is `/` or `index`, include the `index.php` view file
            require_once '../Views/index.php';
            break;

        case "register":
            // If the resource is `register`, include the `register.php` view file
            require_once '../Views/register.php';

            // If a POST request is made, create a user using the `createUser` method of the `UserController` instance
            if($_POST){
                $user->createUser();
            }
            break;

        case "login":
            // If the resource is `login`, include the `login.php` view file
            require_once '../Views/login.php';
            // If a POST request is made, login using the `login` method of the `LoginController` instance, passing the email and password from the request
            if($_POST){
                $user1->login($_REQUEST["email"], $_REQUEST["pass"]);
            }
            break;
            
        case "profile":
            // If the resource is `profile`, include the `profile_user.php` view file
            require_once '../Views/profile_user.php';
            // If a POST request is made, create a task using the `createTask` method of the `TaskController` instance
            if($_POST){
                $task->createTask();
            }
            break;

        case "tasks":
            require_once '../Views/showTasks.php';
            break;

        case "complete":
            // If the resource is `complete`, change the task status using the `changeStatus` method of a new `TaskController` instance and redirect the user to the `tasks` resource
            (new TaskController)->changeStatus($id);
            header("refresh: 0; url = ../tasks");
            break;
            
        case "delete":
            // If the resource is `delete`, create a taskController instance using the `deleteTask` method.
            (new TaskController)->deleteTask($id);
            header("refresh: 0; url = ../tasks");
            break;

        case "edit":
            require_once '../Views/editTask.php';
            break;

        case 'config':
            require_once '../Views/config.php';
            break;

        case "logout":     
            (new LoginController)->logout();
            break;
        
        case "close":
            // If the resource is `close`, create a userController instance using the `deleteUser` method..
            (new UserController)->deleteUser($_SESSION["user"][0]);
            break;

        default:
            require_once '../Views/error.php';

    }
?>