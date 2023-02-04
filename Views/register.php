<?php 
    use Views\Components\Header;
    Header::header('register');
    
    require_once '../controller/UserController.php';
?>

<?php
    
    if(isset($_SESSION["message"]) && (isset($_POST["submit"]))) {
    ?>
        <div class="message">
            <p class="message__p">
                <?=$_SESSION["message"]["message"]; 
                    unset ($_SESSION["message"]);
                ?>
            </p>
        </div>
    <?php
    }
?>
<header class="header">
    <nav class="header__nav">
        <p class="header__p">Already have an account?</p>
        <a class="header__a"href="login">Log in</a>
    </nav>
</header>

<main class="main">
    <div class="main__form">
        <h2 class="main__title">Create your account</h2>
        <form action="register" method="post" class="form">
            <label for="name">Username</label>
            <input type="text" name="name" required />
    
            <label for="email">Email</label>
            <input type="text" name="email" required />
    
            <label for="pass">Password</label>
            <input type="text" name="pass" required />
    
            <input type="submit" name="submit" value="Create">
        </form>
    </div>
</main>
<?php 
    use Views\components\Footer;
    Footer::footer();
?>