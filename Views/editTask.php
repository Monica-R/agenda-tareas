<?php 
    use Views\components\Header;
    use Controllers\TaskController;
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
    <form action="tasks" class="form form--edit" method="POST">
        <h2 class="main__title">Edit task</h2>

        <input type="hidden" readonly name="id" value="<?= $lastValue ?>">

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