<?php 
    use Views\components\Header;
    Header::header();
    echo 'Hola, ' . $_SESSION["user"][1];
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


<a href="logout">Cerrar sesión</a>

<main class="main">
    <h2 class="main__title">¿Qué quieres hacer?</h2>
    <a href="tasks">Mostrar tareas</a>
    <form action="profile" class="form" method="POST">

        <label for="title">Título</label>
        <input type="text" name="title"/>

        <label for="init_date">Fecha de inicio</label>
        <input type="date" name="init_date"/>

        <label for="end_date">Fecha de fin</label>
        <input type="date" name="end_date"/>

        <label for="description">Descripción</label>
        <input type="text" name="description"/>

        <input type="submit" name="submit" value="Añadir tarea">
    </form>
</main>

<?php 
    use Views\components\Footer;
    Footer::footer();
?>