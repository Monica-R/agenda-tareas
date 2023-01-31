<?php
    require '../vendor/autoload.php';

    use Views\components\Header;

    Header::header("index");
?>

<header class="header">
    <nav class="header__nav">
        <p class="header__p">Don't have an account?</p>
        <a href="register" class="header__a">Join us</a>
    </nav>
</header>
    
<main class="main">
    <div class="main__card">
        <h1 class="main__h1"><span class="main__h1--color">O</span>ne<span class="main__h1--color">t</span>ask</h1>
        <p class="main__p">An easy to-do list app</p>
        <a href="login" class="main__a">Let's start!</a>
    </div>
</main>

<?php
    use Views\components\Footer;

    Footer::footer();
?>