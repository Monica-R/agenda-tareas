<?php
/**
 * @author Monica Roka
 * @param Header
 * @return
 * En este archivo he creado una clase Header, con un método estático al que se le pasa 
 * un parámentro,
 * que es la ruta personalizada (ver index.php de la carpeta public, en el switch)
 * Dependiendo de la ruta que tome el usuario, pintará el header correspondiente.
 * Esta clase la llamo a través de las vistas gracias al autoload de Composer.
 */
    namespace Views\Components;

    class Header{
        public static function header($ruta){
            switch($ruta){
                case '/':
                case 'index':
                    echo <<<HTML
                        <!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                            <link rel="stylesheet" type="text/css" href="../assets/css/reset.css">
                            <link rel="stylesheet" type="text/css" href="../assets/css/index.css">
                            <title>Onetask | Agenda de tareas</title>
                        </head>
                        <body>
                    HTML;
                    break;
                
                case 'login':
                    echo <<<HTML
                        <!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                            <link rel="stylesheet" type="text/css" href="../assets/css/reset.css">
                            <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
                            <title>Login | Onetask</title>
                        </head>
                        <body>
                    HTML;
                    break;
                
                case 'register':
                    echo <<<HTML
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                        <link rel="stylesheet" type="text/css" href="../assets/css/reset.css">
                        <link rel="stylesheet" type="text/css" href="../assets/css/register.css">
                        <title>Create account | Onetask</title>
                    </head>
                    <body>
                    HTML;
                    break;

                case 'profile':
                    echo <<<HTML
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                        <link rel="stylesheet" type="text/css" href="../assets/css/reset.css">
                        <link rel="stylesheet" type="text/css" href="../assets/css/profile.css">
                        <title>Profile | Onetask</title>
                    </head>
                    <body>
                    HTML;
                    break;

                case 'tasks':
                    echo <<<HTML
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
                        <link rel="stylesheet" type="text/css" href="../assets/css/reset.css">
                        <link rel="stylesheet" type="text/css" href="../assets/css/tasks.css">
                        <title>My tasks | Onetask</title>
                    </head>
                    <body>
                    HTML;
                    break;
                    
                case 'edit':
                    echo <<<HTML
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                        <title>Edit task | Onetask</title>
                        <style>
                            /* CARGANDO LAS FUENTES */
                            @import url('https://fonts.googleapis.com/css2?family=Rufina:wght@400;700&display=swap');
                            @import url('https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');

                            /* DEFINIENDO LAS CUSTOM PROPERTIES */

                            :root {
                                --color-primario: #181818;
                                --color-secundario: #f0f0f0;
                                --primer-color: #263C33;
                                --segundo-color: #86B1A1;
                                --tercer-color: #ececec;
                                --cuarto-color: #A3CBBC;

                                /* TIPOGRAFÍAS */
                                --tipo-principal: 'Rufina', serif;
                                --tipo-secundario: 'Alegreya Sans', sans-serif;
                            }
                            *{
                                margin: 0;
                                padding: 0;
                                box-sizing: border-box;
                            }
                            body {
                                width: 100%;
                                height: 100vh;
                                display: flex;
                                flex-direction: column;
                                justify-content: center;
                                align-items: center;
                                background-color: var(--primer-color);
                            }

                            .main {
                                width: 100%;
                                height: 100%;
                                display: flex;
                                flex-direction: column;
                                justify-content: center;
                                align-items: center;
                            }

                            .main__title{
                                font-family: var(--tipo-principal);
                            }

                            .form--edit{
                                width: 30%;
                                height: 80vh;
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                justify-content: center;
                                font-family: var(--tipo-secundario);
                                font-size: calc(.6em + .6vw);
                                gap: 1em;
                                background-color: var(--cuarto-color);
                            }

                            input[type="text"], label{
                                width: 70%;
                            }

                            input[type="text"]{
                                background-color: transparent;
                                font-size: calc(.8em + .8vw);
                                padding: 2%;
                                border-style: none;
                                border: 2px solid var(--segundo-color);
                                border-radius: .2em;
                                outline: none;
                            }

                            input[type="date"]{
                                background-color: transparent;
                                border-style: none;
                                outline: none;
                                width: 40%;
                                font-size: calc(.5em + .5vw);
                            }

                            input[type="submit"] {
                                width: 30%;
                                height: calc(2em + 2vh);
                                font-weight: bold;
                                border: .2em solid var(--segundo-color);
                                text-transform: uppercase;
                                cursor: pointer;
                                transition-property: background-color, color, transform;
                                transition-duration: 400ms;
                            }

                            input[type="submit"]:hover {
                                background-color: var(--primer-color);
                                color: var(--tercer-color);
                                transform: scale(.9);
                            }

                            .footer {
                                width: 100%;
                                height: 10vh;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                font-family: var(--tipo-secundario);
                                color: var(--primer-color);
                                font-weight: bold;
                                background-color: var(--cuarto-color);
                            }
                        </style>
                    </head>
                    <body>
                    HTML;
                    break;
                case 'config':
                    echo <<<HTML
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                        <link rel="stylesheet" type="text/css" href="../assets/css/reset.css">
                        <link rel="stylesheet" type="text/css" href="../assets/css/config.css">
                        <title>Configuration | Onetask</title>
                    </head>
                    <body>
                    HTML;
                    break;

                default:
                    echo <<<HTML
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                        <link rel="stylesheet" type="text/css" href="../assets/css/reset.css">
                        <link rel="stylesheet" type="text/css" href="../assets/css/error.css">
                        <title>Error</title>
                    </head>
                    <body>
                    HTML;
                    break;

            }
            
        }
    }

?>