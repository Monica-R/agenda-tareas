<?php 
    use Views\components\Header;
    Header::header();
?>
<header class="header">
    <h1 class="header__h1">Unirse</h1>
</header>

<main class="main">
    <form action="" class="form">
        <label for="name">Nombre</label>
        <input type="text" name="name"/>

        <label for="email">Correo</label>
        <input type="text" name="email"/>

        <label for="pass">Contraseña</label>
        <input type="text" name="pass"/>
    </form>
</main>
<?php 
    use Views\components\Footer;
    Footer::footer();
?>