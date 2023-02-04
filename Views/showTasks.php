<?php
    use Controllers\TaskController;
    use Views\components\Header;
    Header::header('tasks');
    $tasks = new TaskController();
    $taskList = $tasks->readAllTasks($_SESSION["user"][0]);

?>
<header class="header">
    <nav class="header__nav header__nav--profile">
        <a href="logout" class="header__a">Logout</a>
        <a href="profile" class="header__a">Back to my profile</a>
    </nav>
</header>
<main class="main__container">

    <div class="main__div">
        <h2 class="main__h2">Your tasks</h2>
        <table class="main__table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Start date</th>
                    <th>Ends on</th>
                    <th>Creation date</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (count($taskList) > 0){
                        for($i = 0; $i < count($taskList); $i++){
                            
                ?>
                <tr>
                    <td><?php echo $taskList[$i]["title"] ?></td>
                    <td><?php echo $taskList[$i]["input_date"] ?></td>
                    <td><?php echo $taskList[$i]["expiration_date"] ?></td>
                    <td><?php echo $taskList[$i]["creation_date"] ?></td>
                    <td><?php echo $taskList[$i]["description"] ?></td>
                    <?php 
                        $status = (new TaskController)->getStatus($taskList[$i]["task_id"]); 
                        echo $status ? "<td style='color:#86B1A1;'><span class='material-symbols-outlined'>event_available</span></td>" : "<td style='color:#e84855;'><span class='material-symbols-outlined'>event_busy</span></td>";
                    ?>
                    <td class="table__a--buttons">
                        <a href="complete/<?= $taskList[$i]['task_id'] ?>">Marcar</a>
                        <a href="delete/<?= $taskList[$i]['task_id'] ?>">Borrar</a>
                        <a href="edit/<?= $taskList[$i]['task_id'] ?>">Actualizar</a>                          
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</main>

<?php 
    use Views\components\Footer;
    Footer::footer();
?>