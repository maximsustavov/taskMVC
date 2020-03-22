<div class="row task">
    <div class="col">имя пользователя</div>
    <div class="col">email</div>
    <div class="col">текст задачи</div>
    <div class="col">статус</div>
    <div class="col" style="border: none;"></div>
</div>
<?php

if(!empty($data['task'])){
    foreach($data['task'] as $task){
        echo '<form class="mt-1 row" id="editTask">';
        
        echo '<div class="col form-group"><input type="text" required class="form-control" value="' . htmlentities($task['Name']) . '" id="name" placeholder="Олег"></div>';
        
        echo '<div class="col form-group d-none"><input type="text" class="form-control" value="' . htmlentities($task['id']) . '" id="id"></div>';
        
        echo '<div class="col form-group"><input type="email" required class="form-control" id="email" value="' . htmlentities($task['Email']) . '" placeholder="name@example.com"></div>';
        
        echo '<div class="col form-group"><textarea class="form-control" required id="task" rows="3">' . htmlentities($task['Task']) . '</textarea></div>';
        
        echo '<div class="col form-group custom-control custom-checkbox text-center"> <input type="checkbox" class="custom-control-input" ' . ($task['status'] ? 'checked' : '') .' id="status' . $task['id'] . '">
        <label class="custom-control-label" for="status' . $task['id'] . '">' . ($task['status'] ? 'выполнена' : 'не выполнена') . '</label>
      ';
        echo ($task['edit_admin'] ? '<br><div class="alert alert-warning" role="alert">*Отредактировано администратором</div></div>' : '</div>');
        echo '<a href="#" class="col btn btn-primary"  onclick="saveTask(this);" style="max-height: 40px;">Сохранить</a>';
        echo '</form>';
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
?>

<script>
    function saveTask(e) {

        var $data = {};

        ($(e).parent()).find('input, textarea').each(function() {
            $data[this.id] = $(this).val();
            if (this.type == 'checkbox') {

                if ($(this).is(':checked')) {
                    $data['status'] = 1;
                } else {
                    $data['status'] = 0;
                }

            }
        });

        let formData = new FormData();
        formData.append('id', $data['id']);
        formData.append('name', $data['name']);
        formData.append('email', $data['email']);
        formData.append('task', $data['task']);
        formData.append('status', $data['status']);

        $.ajax({
            type: "POST",
            url: "/Task/editTask",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success: function(data) {
                var $data = JSON.parse(data);
                
                $('#error').addClass('d-none');

                if ($data.result == "success") {
                    $('.adminAllTask').load('/allTask/adminAllTask');
                    $("#success").addTemporaryClass("d-block", 3000);

                } else if ($data.result == "Authorization") {
                
                    location.href = '/admin/logout';
                    
                } else {
                    $('#error').addTemporaryClass("d-block", 3000);
                }
            },
            error: function(request) {
                $('#error').text('Произошла ошибка ' + request.responseText + ' при отправке данных.');
                $('#error').addTemporaryClass("d-block", 3000);
            }
        });


    }

</script>
