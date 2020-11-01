<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box m-auto" data-animate-effect="fadeInLeft">

                <h1>Регистрация</h1>
                <form method="post" action="/user/signup">
                    <div class="form-group">
                        <label for="login">Логин</label>
                        <input type="text" name="login" class="form-control" id="login" placeholder="Логин"
                               value="<?= isset($_SESSION['form_data']['login']) ? htmlStr($_SESSION['form_data']['login']) : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Пароль</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                               placeholder="Пароль">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="Email"
                               value="<?= isset($_SESSION['form_data']['email']) ? htmlStr($_SESSION['form_data']['email']) : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Имя"
                               value="<?= isset($_SESSION['form_data']['name']) ? htmlStr($_SESSION['form_data']['name']) : '' ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <div class="row animate-box" data-animate-effect="fadeInRight">
                    <div class="col-1 m-auto">
                        <a href="/user/login" class="button-login">Войти</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-md-8 animate-box m-auto" data-animate-effect="fadeInLeft">
                <? if ($_SESSION['success']) : ?>
                    <div class="alert alert-success p-auto" role="alert">
                        Вы успешно зарегестрированы
                    </div>
                <? endif; ?>
                <? if ($_SESSION['errorsAuth']): ?>
                    <div class="alert alert-danger mt-4" role="alert">
                        <?= debug($_SESSION['errorsAuth']) ?>
                    </div>
                <? endif; ?>
            </div>
        </div>

    </div>
</div>

<? if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']) ?>
<? if (isset($_SESSION['success'])) unset($_SESSION['success']) ?>
<? if (isset($_SESSION['errorsAuth'])) unset($_SESSION['errorsAuth']) ?>