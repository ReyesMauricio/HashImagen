<?php 
    require_once ("controllers/FileController.php");
    $controller = new FileController();

    if (isset($_REQUEST["form_insert"])) {
        $controller->Store($_FILES["imagen"]);
    }else {
        header("Location: index.php");
    }
?>