<?php 
    use Views\components\Header;
    use Controller\TaskController;
    Header::header("edit");
    $getURL = $_SERVER['REQUEST_URI']; //te da la URL teniendo en cuenta la "personalización" de los URL's
    
    $url = explode('/', $getURL);
    $lastValue = end($url);

    if (isset($_REQUEST["editSubmit"])){
        (new TaskController)->updateTask($_REQUEST["id"]);
    }

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

<main class="main">
    <h2 class="main__title">What do you want to do?</h2>
    <form action="tasks" class="form" method="POST">

        <label for="id">ID</label>
        <input type="text" readonly name="id" value="<?= $lastValue ?>">

        <label for="title">Title</label>
        <input type="text" name="title"/>

        <label for="init_date">Start date</label>
        <input type="date" name="init_date"/>

        <label for="end_date">Ends on</label>
        <input type="date" name="end_date"/>

        <label for="description">Description</label>
        <input type="text" name="description"/>

        <input type="submit" name="editSubmit" value="Edit">
    </form>
</main>

<?php 
    use Views\components\Footer;
    Footer::footer();
?>