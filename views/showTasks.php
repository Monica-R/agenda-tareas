<?php
    use Controller\TaskController;
    use Views\components\Header;
    Header::header();
    $tasks = new TaskController();
    $taskList = $tasks->readAllTasks();
?>

<div class="container">
    <div>
        <div>
            <h2 >Mis tareas</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha creación</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (count($taskList) > 0){
                            for($i = 0; $i < count($taskList); $i++){
                                
                    ?>
                    <tr>
                        <td><?php echo $taskList[$i]["task_id"] ?></td>
                        <td><?php echo $taskList[$i]["title"] ?></td>
                        <td><?php echo $taskList[$i]["input_date"] ?></td>
                        <td><?php echo $taskList[$i]["creation_date"] ?></td>
                        <td><?php echo $taskList[$i]["description"] ?></td>
                        <?php if($taskList[$i]['status']) : ?>
                            <td style='background-color:green;'></td>
                        <?php else: ?>
                            <td style='background-color:tomato;'></td>
                        <?php endif; ?> 
                        <td>
                            <form action="check" method="POST">
                                <input type="hidden" name="idHidden" value="<?= $taskList[$i]['task_id'] ?>">
                                <input type="submit" name="checkSubmit" value="status">
                            </form>
                            <form action="delete" method="POST">
                                <input type="hidden" name="idHidden" value="<?= $taskList[$i]['task_id'] ?>">
                                <input type="submit" name="deleteSubmit" value="delete">
                            </form>
                            <form action="edit" method="POST">
                                <input type="hidden" name="idHidden" value="<?= $taskList[$i]['task_id'] ?>">
                                <input type="submit" name="editSubmit" value="edit">
                            </form>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
    use Views\components\Footer;
    Footer::footer();
?>