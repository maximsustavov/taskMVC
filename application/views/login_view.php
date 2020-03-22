<div class="container">
    <div class="d-flex justify-content-between mt-5 mb-5">
        <div>MVC Задачник вход в админку</div>
        <a href="/" type="button" class="btn btn-primary">Вернуться на сайт</a>
    </div>


    <form method="POST">
        <div class="form-group">
            <label for="login">Логин</label>
            <input required name="login" type="text" class="form-control" id="login">
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input required name="password" type="password" class="form-control" id="password">
        </div>

        <input name="submit" type="submit" class="btn btn-primary" value="Войти">
    </form>
</div>
