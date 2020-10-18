
<div class="row">
    <div class="col-6 m-auto">
        <h1>Регистрация</h1>
<form method="post" action="/user/signup">
    <div class="form-group">
        <label for="login">Логин</label>
        <input type="text" name="login" class="form-control" id="login" placeholder="Логин">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Пароль</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Имя">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</div>