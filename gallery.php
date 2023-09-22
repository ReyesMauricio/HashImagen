<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/css/all.min.css">
    <title>Gallery</title>
</head>

<body>
    <ul class="nav nav-tabs justify-content-center mt-1">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php"><i class="fa fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="gallery.php"><i class="fa-solid fa-file-image"></i> Galeria</a>
        </li>
    </ul>

    <div class="container">
        <div class="row mt-2">
            <?php 
                require_once ("controllers/FileController.php");
                $controller = new FileController();

                $imagenes = $controller->Index();

                foreach ($imagenes as $imagen) {
            ?>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-3" >
                    <div class="card">
                        <div class="card-header">
                            <span class="fw-bold">Fecha Creación</span>: <?php echo $imagen->create_at; ?>
                        </div>
                        <div class="card-body col-lg-12" style="background-position: center;height: 250px; background-image: url('<?php echo $controller->path."/".$imagen->file_name;?>'); background-size: contain; background-repeat: no-repeat;">
                            
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="fonts/js/all.min.js"></script>
</body>

</html>