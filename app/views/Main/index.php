
<div class="row">
    <div class="col">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4"><?=$name?></h1>
                <p class="lead">Это модифицированный jumbotron, который занимает все горизонтальное пространство
                    своего родителя.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div id="carouselExampleCaptions" class="carousel slide mb-5" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://misea.ru/images/u/pages/rabochij-stol-foto-kartinki-podborki-kartinki-kosmosa-na-rabochij-stol-cover-155.jpg"
                         class="d-block vh-100 w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://misea.ru/images/u/pages/rabochij-stol-foto-kartinki-podborki-kartinki-kosmosa-na-rabochij-stol-cover-155.jpg"
                         class="d-block vh-100 w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>


<main class="row">
    <div class="col-10">
        <button type="button" class="btn btn-primary btn-sm"><a href="/main/create">Добавить</a></button>
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Название карточки</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Переход куда-нибудь</a>
            </div>
        </div>

    </div>

    <div class="col-2">
        <nav class="nav flex-column ">
            <a class="nav-link active" href="#">Active</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </nav>
    </div>
</main>