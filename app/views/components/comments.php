<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

<br><br><br>

<style>
    body {
        background: url(/images/bg/bg-1.png)
    }

    .img-sm {
        width: 46px;
        height: 46px;
    }

    .panel {
        box-shadow: 0 2px 0 rgba(0, 0, 0, 0.075);
        border-radius: 0;
        border: 0;
        margin-bottom: 15px;
    }

    .panel .panel-footer, .panel > :last-child {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .panel .panel-heading, .panel > :first-child {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .panel-body {
        padding: 25px 20px;
    }

    .media-block .media-left {
        display: block;
        float: left
    }

    .media-block .media-right {
        float: right
    }

    .media-block .media-body {
        display: block;
        overflow: hidden;
        width: auto
    }

    .middle .media-left,
    .middle .media-right,
    .middle .media-body {
        vertical-align: middle
    }

    .thumbnail {
        border-radius: 0;
        border-color: #e9e9e9
    }

    .tag.tag-sm, .btn-group-sm > .tag {
        padding: 5px 10px;
    }

    .tag:not(.label) {
        background-color: #fff;
        padding: 6px 12px;
        border-radius: 2px;
        border: 1px solid #cdd6e1;
        font-size: 12px;
        line-height: 1.42857;
        vertical-align: middle;
        -webkit-transition: all .15s;
        transition: all .15s;
    }

    .text-muted, a.text-muted:hover, a.text-muted:focus {
        color: #acacac;
    }

    .text-sm {
        font-size: 0.9em;
    }

    .text-5x, .text-4x, .text-5x, .text-2x, .text-lg, .text-sm, .text-xs {
        line-height: 1.25;
    }

    .btn-trans {
        background-color: transparent;
        border-color: transparent;
        color: #929292;
    }

    .btn-icon {
        padding-left: 9px;
        padding-right: 9px;
    }

    .btn-sm, .btn-group-sm > .btn, .btn-icon.btn-sm {
        padding: 5px 10px !important;
    }

    .mar-top {
        margin-top: 15px;
    }
</style>

<section class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <textarea class="form-control" rows="2" placeholder="Добавьте Ваш комментарий"></textarea>
                    <div class="mar-top clearfix">
                        <button class="btn btn-sm btn-primary pull-right" type="submit"><i
                                    class="fa fa-pencil fa-fw"></i> Добавить
                        </button>
                        <a class="btn btn-trans btn-icon fa fa-video-camera add-tooltip" href="#"></a>
                        <a class="btn btn-trans btn-icon fa fa-camera add-tooltip" href="#"></a>
                        <a class="btn btn-trans btn-icon fa fa-file add-tooltip" href="#"></a>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                    <!-- Содержание Новостей -->
                    <!--===================================================-->
                    <div class="media-block">
                        <a class="media-left" href="#"><img class="img-circle img-sm" alt="Профиль пользователя"
                                                            src="https://bootstraptema.ru/snippets/icons/2016/mia/1.png"></a>
                        <div class="media-body">
                            <div class="mar-btm">
                                <a href="#" class="btn-link text-semibold media-heading box-inline">Максим</a>
                                <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - 19-06-2016</p>
                            </div>
                            <p>Секция с комментариями для сайта с подключенным Bootstrap!!!</p>
                            <div class="pad-ver">
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-default btn-hover-success" href="#"><i
                                                class="fa fa-thumbs-up"></i></a>
                                    <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i
                                                class="fa fa-thumbs-down"></i></a>
                                </div>
                                <a class="btn btn-sm btn-default btn-hover-primary" href="#">Ответить</a>
                            </div>
                            <hr>

                            <!-- Комментарий -->
                            <div>
                                <div class="media-block">
                                    <a class="media-left" href="#"><img class="img-circle img-sm"
                                                                        alt="Профиль пользователя"
                                                                        src="https://bootstraptema.ru/snippets/icons/2016/mia/2.png"></a>
                                    <div class="media-body">
                                        <div class="mar-btm">
                                            <a href="#" class="btn-link text-semibold media-heading box-inline">Вася</a>
                                            <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> -
                                                19-06-2016</p>
                                        </div>
                                        <p>Дада. С формой добавления нового комментария!</p>
                                        <div class="pad-ver">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-default btn-hover-success active" href="#"><i
                                                            class="fa fa-thumbs-up"></i> Нравится</a>
                                                <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i
                                                            class="fa fa-thumbs-down"></i></a>
                                            </div>
                                            <a class="btn btn-sm btn-default btn-hover-primary" href="#">Ответить</a>
                                        </div>
                                        <hr>
                                    </div>
                                </div>

                                <div class="media-block">
                                    <a class="media-left" href="#"><img class="img-circle img-sm"
                                                                        alt="Профиль пользователя"
                                                                        src="https://bootstraptema.ru/snippets/icons/2016/mia/3.png">
                                    </a>
                                    <div class="media-body">
                                        <div class="mar-btm">
                                            <a href="#"
                                               class="btn-link text-semibold media-heading box-inline">Денис</a>
                                            <p class="text-muted text-sm"><i class="fa fa-globe fa-lg"></i> - 20-06-2016
                                            </p>
                                        </div>
                                        <p>Просто так что нибудь напишу</p>
                                        <div class="pad-ver">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-default btn-hover-success" href="#"><i
                                                            class="fa fa-thumbs-up"></i></a>
                                                <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i
                                                            class="fa fa-thumbs-down"></i></a>
                                            </div>
                                            <a class="btn btn-sm btn-default btn-hover-primary" href="#">Ответить</a>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!-- Конец Содержания Новостей -->


                    <!-- Содержание Новостей -->
                    <!--===================================================-->
                    <div class="media-block pad-all">
                        <a class="media-left" href="#"><img class="img-circle img-sm" alt="Профиль пользователя"
                                                            src="https://bootstraptema.ru/snippets/icons/2016/mia/4.png"></a>
                        <div class="media-body">
                            <div class="mar-btm">
                                <a href="#" class="btn-link text-semibold media-heading box-inline">Ирина</a>
                                <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - 20-06-2016</p>
                            </div>
                            <p>А я добавлю картинку</p>
                            <img class="img-responsive thumbnail"
                                 src="https://drawings-girls.ucoz.net/2015/05/krasivaya-devushka-albinos.jpg"
                                 alt="Image">
                            <div class="pad-ver">
                                <span class="tag tag-sm"><i class="fa fa-heart text-danger"></i> 250 Лайков</span>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-default btn-hover-success" href="#"><i
                                                class="fa fa-thumbs-up"></i></a>
                                    <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i
                                                class="fa fa-thumbs-down"></i></a>
                                </div>
                                <a class="btn btn-sm btn-default btn-hover-primary" href="#">Ответить</a>
                            </div>
                            <hr>

                            <!-- Комментарий -->
                            <div>
                                <div class="media-block pad-all">
                                    <a class="media-left" href="#"><img class="img-circle img-sm"
                                                                        alt="Профиль пользователя"
                                                                        src="https://bootstraptema.ru/snippets/icons/2016/mia/5.png"></a>
                                    <div class="media-body">
                                        <div class="mar-btm">
                                            <a href="#" class="btn-link text-semibold media-heading box-inline">Коля</a>
                                            <p class="text-muted text-sm"><i class="fa fa-globe fa-lg"></i> - 20-06-2016
                                            </p>
                                        </div>
                                        <p><a href="http://bootstraptema.ru/" target="_blank" class="btn">Всё для
                                                Bootstrap</a></p>
                                        <div>
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-default btn-hover-success" href="#"><i
                                                            class="fa fa-thumbs-up"></i></a>
                                                <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i
                                                            class="fa fa-thumbs-down"></i></a>
                                            </div>
                                            <a class="btn btn-sm btn-default btn-hover-primary" href="#">Ответить</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!-- Конец Содержания Новостей -->
                </div>
            </div>
        </div>

    </div><!-- /.row -->
</section><!-- /.container -->