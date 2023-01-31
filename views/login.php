<?php 
    use Views\Components\Header;
    Header::header('login');
?>

<header class="header">
    <h1 class="header__h1"><\app_title\></h1>
</header>

<main class="main main__login">
    <h2 class="main__title">Conectarse</h2>
    <form action="login" class="form" method="POST">

        <label for="email">Correo</label>
        <input type="text" name="email" required />

        <label for="pass">Contraseña</label>
        <input type="text" name="pass" required />

        <input type="submit" name="submit" value="Entrar">
    </form>
</main>

<?php 
    use Views\components\Footer;
    Footer::footer();
?>