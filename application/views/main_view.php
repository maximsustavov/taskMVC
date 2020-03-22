<div class="container">
    <div class="d-flex justify-content-between mt-5 mb-5">
        <div>MVC Задачник</div>
        <a href="/admin" type="button" class="btn btn-primary">Войти в админку</a>
    </div>

    <div class="sort d-flex mb-1">сортировать по:
        <select class="custom-select" style="max-width: 220px;  margin-left: 20px;">
            <option value="name ASC" selected>Имени пользователя &uarr;</option>
            <option value="name DESC" selected>Имени пользователя &darr;</option>
            <option value="email ASC">Email &uarr;</option>
            <option value="email DESC">Email &darr;</option>
            <option value="task ASC">Тексту задачи &uarr;</option>
            <option value="task DESC">Тексту задачи &darr;</option>
            <option value="status ASC">Статусу &uarr;</option>
            <option value="status DESC">Статусу &darr;</option>
        </select>
    </div>

    <div class="allTask">

    </div>

    <div id="error" class="d-none alert alert-danger mt-5" role="alert">Произошли ошибки при отправке формы на сервер.</div>
    <div id="success" class="d-none alert alert-success mt-5" role="alert">Задача успешно сохранена!</div>
    <form class="mt-5" id="addTask">

        <div class="form-group">
            <label for="name">Имя пользователя</label>
            <input type="text" required class="form-control" value="valera" id="name" placeholder="Олег">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" required class="form-control" id="email" value="test@test.ru" placeholder="name@example.com">
        </div>



        <div class="form-group">
            <label for="task">Текст задачи</label>
            <textarea class="form-control" required id="task" rows="3">написать MVC задачник</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Добавить задание</button>
    </form>
</div>
