# Onestack

Una aplicación CRUD sobre una agenda de tareas con PHP, MVC, POO; un usuario registrado puede crear tareas, gestionarlas (editar, borrar tareas), y configurar su cuenta.



![](https://i.imgur.com/5xyRme0.jpg)


## Instalación

Instala el proyecto desde github:

```bash
  git clone https://github.com/Monica-R/agenda-tareas.git
```
- También es necesario que instales Composer, que está disponible tanto para Windows como para Linux. Página oficial Composer: [página oficial](https://getcomposer.org/). Para empezar a usarlo debes escribir en el terminal `composer init`, te saldrá un pequeño banner de bienvenida, y seguirás las instrucciones. Adjuntaré un pequeño manual sobre Composer.
- Tener git instalado.
- Esta aplicación está desarrollada en php, por lo que también necesitas instalarla.
## Insignias

Add badges from somewhere like: [shields.io](https://shields.io/)

![GitHub last commit](https://img.shields.io/github/last-commit/Monica-R/agenda-tareas?style=for-the-badge)



## Uso

Mostraré un ejemplo del código desarrollado, en este caso, el de eliminar tareas del usuario

````=php
    class TaskController {
        public function deleteTask($task_id){

            $delete = "DELETE FROM task WHERE task_id=:task_id";
            $query = $this->connection->prepare($delete);
            $query->bindValue(':task_id', $task_id, \PDO::PARAM_INT);
            $query->execute();

        }
    }

````


## Autora

[@Monica-R](https://github.com/Monica-R)

## Licencia

Esta aplicación usa la licencia MIT. Para más info mirar en [LICENSE MIT](https://github.com/Monica-R/agenda-tareas/blob/main/LICENSE)

