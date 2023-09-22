<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/css/all.min.css">
    <title>Subir imganes</title>
</head>

<body>
    <ul class="nav nav-tabs justify-content-center mt-1">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php"><i class="fa fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="gallery.php"><i class="fa-solid fa-file-image"></i> Galeria</a>
        </li>
    </ul>

    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-12 m-auto" style="margin-top: 12vw !important;">
                <form action="config.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <input class="form-control" type="hidden" name="form_insert">

                        <div class="card-header"> Subir Imagen</div>

                        <div class="card-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-solid fa-images"></i>
                                </span>
                                <input type="file" class="form-control" name="imagen"
                                    placeholder="Seleccione un archivo" aria-label="imagen"
                                    aria-describedby="basic-addon1" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-outline-primary"> Subir Imagen</button>
                                <button type="reset" class="btn btn-outline-danger">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="fonts/js/all.min.js"></script>
</body>

</html>