<?php 
    use Views\components\Header;
    Header::header();
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