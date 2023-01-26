<?php 
    use Views\components\Header;
    Header::header();
?>

<header class="header">
    <h1 class="header__h1"><\app_title\></h1>
</header>

<main class="main">
    <h2 class="main__title">Conectarse</h2>
    <form action="" class="form">

        <label for="email">Correo</label>
        <input type="text" name="email"/>

        <label for="pass">Contraseña</label>
        <input type="text" name="pass"/>

        <input type="submit" value="Entrar">
    </form>
</main>

<?php 
    use Views\components\Footer;
    Footer::footer();
?>