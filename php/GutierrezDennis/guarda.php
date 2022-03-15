<?php

require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $inventariable = isset($_POST['inventariable']) ? $_POST['inventariable'] : 0;
    $fabricacion = $_POST['fabricacion'];
    $caducidad = $_POST['caducidad'];

    if ($stock == '') {
        $stock = 0;
    }

    $query = $con->prepare("UPDATE medicamentos SET codigo=?, descripcion=?, inventariable=?, stock=?, fabricacion=?, caducidad=? WHERE id=?");
    $resultado = $query->execute(array($codigo, $descripcion, $inventariable, $stock, $fabricacion, $caducidad, $id));

    if ($resultado) {
        $correcto = true;
    }
} else {
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $inventariable = isset($_POST['inventariable']) ? $_POST['inventariable'] : 0;
    $fabricacion = $_POST['fabricacion'];
    $caducidad = $_POST['caducidad'];

    if ($stock == '') {
        $stock = 0;
    }

    $query = $con->prepare("INSERT INTO medicamentos (codigo, descripcion, inventariable, stock, fabricacion, caducidad, activo) VALUES (:cod, :descr, :inv, :sto, :fab, :cad, 1)");
    $resultado = $query->execute(array('cod' => $codigo, 'descr' => $descripcion, 'inv' => $inventariable, 'sto' => $stock, 'fab' => $fabricacion, 'cad' => $caducidad));

    if ($resultado) {
        $correcto = true;
        echo $con->lastInsertId();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicamentos</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/GutierrezDennis/style.css">
    <link rel="stylesheet" href="../../css/PreciadoRonald/misEstilos.css">
</head>

<body class="py-3">
<script src="../../js/Form-GutierrezDennis.js"></script>
        <div>
        <?php
            include_once "../templates/header.php"
        ?>
   
            <h3 style="text-align: center; padding-top: 25px;"><b>Inventario sobre medicamentos</b></h3>
            <h2 style="text-align: center; padding-top: 25px;">En esta seccion se visualiza el estado del inventario de medicamentos del consultorio.</h2><br>
            <a href="../../html/GutierrezDennis.html" class="btn btn-primary float-left "style="position: absolute;top: 32%; right: 3%;">Regresar</a>
        </div>
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <?php if ($correcto) { ?>
                        <h3>Registro guardado</h3>
                    <?php } else { ?>
                        <h3>Error al guardar</h3>
                    <?php }  ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="index.php">Regresar</a>
                </div>
            </div>
        </div>
    </main>

    <br><br>
    <?php
            include_once "../templates/footer.php"
        ?>
   

</body>

</html>