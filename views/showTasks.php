<?php
    use Controller\TaskController;
    use Views\components\Header;
    Header::header('tasks');
    $tasks = new TaskController();
    $taskList = $tasks->readAllTasks();

?>
<a href="logout">Cerrar sesión</a>
<a href="profile">Volver a mi perfil</a>
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
                        <?php 
                            $status = (new TaskController)->getStatus($taskList[$i]["task_id"]); 
                            echo $status ? "<td style='background-color:green;'></td>" : "<td style='background-color:tomato;'></td>";
                        ?>
                        <td>
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
    </div>
</div>

<?php 
    use Views\components\Footer;
    Footer::footer();
?>