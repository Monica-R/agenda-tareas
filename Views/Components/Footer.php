<?php
/**
 *  * En este archivo he creado una clase Footer. No tiene ningún parámetro porque se verá igual
 * a todas las vistas.
 * Esta clase la llamo a través de las vistas gracias al autoload de Composer.
 */
    namespace Views\Components;
    class Footer{
        public static function footer(){
            print <<<HTML
            </body>
                <footer class="footer">
                    <div class="footer__item">
                        Developed with <i class="fa-sharp fa-solid fa-heart"></i> by Mónica Roka
                    </div>
                </footer>
            </html>
            HTML;
        }
    }
?>