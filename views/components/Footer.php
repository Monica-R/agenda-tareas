<?php
    namespace Views\components;
    class Footer{
        public static function footer(){
            print <<<HTML
            </body>
                <footer class="footer">
                    <div class="footer__item">
                        Desarrollado con <i class="fa-sharp fa-solid fa-heart"></i> por Mónica Roka
                    </div>
                </footer>
            </html>
            HTML;
        }
    }
?>