


<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box m-auto" data-animate-effect="fadeInLeft">

                <h1>Создать пост</h1>
                <form enctype="multipart/form-data" method="post" action="/posts/create">
                    <div class="form-group">
                        <label for="login">Логин</label>
                        <input type="login" name="login" class="form-control" id="login" placeholder="Логин">
                    </div>



                    <div class="form-group">

                        <textarea name="editor1"></textarea>
                    </div>



                    <button type="submit" class="btn btn-primary">Войти</button>
                </form>
                <script>
                    CKEDITOR.replace( 'editor1', {
                        filebrowserBrowseUrl: '/vendor/ckfinder/ckfinder.html',
                        filebrowserUploadUrl: '/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                    } );
                </script>
            </div>
        </div>



