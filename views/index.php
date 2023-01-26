<?php
    require '../vendor/autoload.php';

    use Views\components\Header;

    Header::header();
?>

<header class="header">
    <h1 class="header__h1">Titulo</h1>
</header>

<main class="main">
    <div class="main__card">
        <button class="button">Entrar</button>
        <button class="button">Me uno</button>
    </div>
</main>

<?php
    use Views\components\Footer;

    Footer::footer();
?>