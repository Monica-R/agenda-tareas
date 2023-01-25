<?php
    namespace Views\components;
    class Footer{
        public static function footer(){
            print <<<HTML
            </body>
                <footer class="footer">
                    <div class="footer__item">Desarrollado con esfuerzo y amor por Mónica Roka</div>
                </footer>
            </html>
            HTML;
        }
    }
?>