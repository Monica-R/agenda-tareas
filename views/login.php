<?php 
    use Views\Components\Header;
    Header::header('login');
?>

<header class="header">
    <nav class="header__nav">
        <h1 class="header__h1 header__h1--login">One<span>t</span>ask</h1>
        <a href="index" class="header__a">Volver</a>
    </nav>
</header>

<main class="main main__login">
    <div class="main__form">
        <h2 class="main__title title--login">Log in</h2>
        <form action="login" class="form" method="POST">
    
            <label for="email">Email</label>
            <input class="input--register" type="text" name="email" required />
    
            <label for="pass">Password</label>
            <input class="input--register" type="text" name="pass" required />
    
            <input class="form form--submit" type="submit" name="submit" value="Entrar">
        </form>
    </div>
</main>

<?php 
    use Views\components\Footer;
    Footer::footer();
?>