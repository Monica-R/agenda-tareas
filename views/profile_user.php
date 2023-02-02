<?php 
    use Views\Components\Header;
    Header::header('profile');
?>

<?php
    
    if(isset($_SESSION["message"]) && (isset($_POST["submit"]))) {
    ?>
        <div class="message">
            <p class="message__p" style="background-color: lightblue;">
                <?=$_SESSION["message"]["message"]; 
                    unset ($_SESSION["message"]);
                ?>
            </p>
        </div>
    <?php
    }
?>

<div class="header">
    <nav class="header__nav">
        <a class="header__a" href="tasks">Show tasks</a>
    </nav>
    <div class="header__div">
        <a href="config" class="header__a"><?php echo 'Hi, ' . $_SESSION["user"][1]; ?></a>
        <a href="logout" class="header__a">Logout</a>
    </div>
</div>

<main class="main">
    <h2 class="main__title">Edit task</h2>
    <form action="profile" class="form" method="POST">

        <div class="main__form--title">
            <label for="title">Title</label>
            <input type="text" name="title" required/>
        </div>

        <div class="main__form">            
            <label for="init_date">Start date</label>
            <input type="date" name="init_date" required/>
        </div>

        <div class="main__form">
            <label for="end_date">Ends on</label>
            <input type="date" name="end_date" required/>
        </div>

        <div class="main__form--description">
            <label for="description">Description</label>
            <input type="text" name="description" required/>
        </div>

        <input type="submit" name="submit" value="Add task">
    </form>
</main>

<?php 
    use Views\Components\Footer;
    Footer::footer();
?>