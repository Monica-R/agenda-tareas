<?php
/**
 * @author Monica Roka
 * @param Header
 * @return 
 */
    namespace Views\Components;
    class Header{
        public static function header($ruta){
            switch($ruta){
                case '/':
                case 'index':
                    print <<<HTML
                        <!DOCTYPE html>
                        <html lang="es">
                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                            <link rel="stylesheet" type="text/css" href="../assets/css/reset.css"/>
                            <link rel="stylesheet" type="text/css" href="../assets/css/index.css"/>
                            <title>Onetask | Agenda de tareas</title>
                        </head>
                        <body>
                    HTML;
                    break;
                
                case 'login':
                    print <<<HTML
                        <!DOCTYPE html>
                        <html lang="es">
                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                            <link rel="stylesheet" type="text/css" href="../assets/css/reset.css"/>
                            <link rel="stylesheet" type="text/css" href="../assets/css/login.css"/>
                            <title>Login | Onetask</title>
                        </head>
                        <body>
                    HTML;
                    break;
                
                case 'register':
                    print <<<HTML
                    <!DOCTYPE html>
                    <html lang="es">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                        <link rel="stylesheet" type="text/css" href="../assets/css/reset.css"/>
                        <link rel="stylesheet" type="text/css" href="../assets/css/register.css"/>
                        <title>Create account | Onetask</title>
                    </head>
                    <body>
                    HTML;
                    break;
            }
           

            
        }
    }

?>