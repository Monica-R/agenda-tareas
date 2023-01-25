<?php
/**
 * @author Monica Roka
 * @param Header
 * @return 
 */
    namespace Views\components;
    class Header{
        public static function header(){
            print <<<HTML
                <!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Agenda de tareas</title>
                </head>
                <body>
            HTML;
        }
    }

?>