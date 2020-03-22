<div class="row task">
    <div class="col">имя пользователя</div>
    <div class="col">email</div>
    <div class="col">текст задачи</div>
    <div class="col">статус</div>
</div>
<?php

if(!empty($data['task'])){
    foreach($data['task'] as $task){
        echo '<div class="row task">';
        echo '<div class="col">' . htmlentities($task['Name']) . '</div>';
        echo '<div class="col">' . htmlentities($task['Email']) . '</div>';
        echo '<div class="col">' . htmlentities($task['Task']) . '</div>';
        echo '<div class="col">' . ($task['status'] ? '<div class="alert alert-success" role="alert">&#9989; выполнена</div>' : '<div class="alert alert-danger" role="alert">&times; не выполнена</div>');
        echo ($task['edit_admin'] ? '<br><div class="alert alert-warning" role="alert">*Отредактировано администратором</div>' : '') . '</div>';
        echo '</div>';
    }
} else {
    echo 'Добавьте задачи!';
}

if(!empty($data['total']) && $data['pagination'] > 1){
    echo '<nav aria-label="Page navigation example" class="mt-2">';
    echo '<ul class="pagination">';
    for ($i = 1; $i <= $data['pagination']; $i++){
        echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
    }
}