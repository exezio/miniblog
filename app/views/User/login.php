<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box m-auto" data-animate-effect="fadeInLeft">

        <h1>Авторизация</h1>
        <form method="post" action="/user/login">

            <div class="form-group">
                <label for="login">Логин</label>
                <input type="login" name="login" class="form-control" id="login" placeholder="Логин">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                       placeholder="Пароль">
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
</div>
<? if (isset($_SESSION['error'])) : ?>
    <div class="row mt-4 animate-box" data-animate-effect="fadeInLeft"">
        <div  class="col-5 alert alert-danger m-auto" role="alert">
            Неверный логин или пароль
        </div>
    </div>
    <? unset($_SESSION['error']) ?>
<? endif; ?>
<div class="row mt-2 animate-box" data-animate-effect="fadeInRight"">
    <div class="col-1 m-auto">
        <a href="/user/signup">Зарегестрироваться</a>
    </div>
</div>
    </div>
</div>

