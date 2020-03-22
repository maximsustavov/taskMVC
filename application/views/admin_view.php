<div class="container">
    <div class="d-flex justify-content-between mt-5 mb-5">
        <div>MVC Задачник</div>
        <a href="/admin/logout" type="button" class="btn btn-primary">Выйти из админки</a>
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
    <div class="adminAllTask">

    </div>
    <div id="error" class="d-none alert alert-danger mt-5" role="alert">Произошли ошибки при отправке формы на сервер.</div>
    <div id="success" class="d-none alert alert-success mt-5" role="alert">Задача успешно сохранена!</div>
</div>
