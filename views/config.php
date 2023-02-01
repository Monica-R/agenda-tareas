<?php 
    use Views\components\Header;
    use Controller\UserController;
    Header::header('config');
    
    if (isset($_REQUEST["editSubmit"])){
        (new UserController)->updateUser($_REQUEST["userID"]);
    }
?>
<header class="header">
    <nav class="header__nav">
        <p class="header__p">Configuration</p>
        <a class="header__a"href="close">Close account</a>
    </nav>
</header>

<main class="main">
    <div class="main__form">
        <h2 class="main__title">Onetask</h2>
        <form action="config" method="post" class="form">
            <input type="hidden" name="userID" value="<?= $_SESSION["user"][0] ?>">
            <label for="name">Username</label>
            <input type="text" name="name" required />
    
            <label for="email">Email</label>
            <input type="text" name="email" required />
    
            <label for="pass">Password</label>
            <input type="text" name="pass" required />
    
            <input type="submit" name="editSubmit" value="Save">
        </form>
    </div>
</main>
<?php 
    use Views\Components\Footer;
    Footer::footer();
?>