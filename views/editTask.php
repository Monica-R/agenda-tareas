<?php 
    use Views\components\Header;
    use Controller\TaskController;
    Header::header();
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

<form action="profile" class="form" method="POST">

    <label for="id">ID</label>
    <input type="text" readonly name="id" value="<?= $lastValue ?>">

    <label for="title">Título</label>
    <input type="text" name="title"/>

    <label for="init_date">Fecha de inicio</label>
    <input type="date" name="init_date"/>

    <label for="end_date">Fecha de fin</label>
    <input type="date" name="end_date"/>

    <label for="description">Descripción</label>
    <input type="text" name="description"/>

    <input type="submit" name="editSubmit" value="Editar tarea">
</form>

<?php 
    use Views\components\Footer;
    Footer::footer();
?>