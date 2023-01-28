<?php 
    use Views\components\Header;
    Header::header();
    
    require_once '../controller/UserController.php';
?>

<?php
    
    if(isset($_SESSION["message"]) && (isset($_POST["submit"]))) {
    ?>
        <div class="message">
            <p class="message__p">
                <?=$_SESSION["message"]["message"]; 
                    //unset ($_SESSION["message"]);
                ?>
            </p>
        </div>
    <?php
    }
?>
<header class="header">
    <h1 class="header__h1">Unirse</h1>
    <a href="login">Entrar</a>
</header>

<main class="main">
    <form action="register" method="post" class="form">
        <label for="name">Nombre</label>
        <input type="text" name="name"/>

        <label for="email">Correo</label>
        <input type="text" name="email"/>

        <label for="pass">Contraseña</label>
        <input type="text" name="pass"/>

        <input type="submit" name="submit" value="Crear cuenta">
    </form>
</main>
<?php 
    use Views\components\Footer;
    Footer::footer();
?>