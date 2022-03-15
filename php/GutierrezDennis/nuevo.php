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
   
            <h3 style="text-align: center; padding-top: 25px;"><b>Inventario de medicamentos</b></h3>
            <h2 style="text-align: center; padding-top: 25px;">En esta sección se ingresa la información necesaria del inventario de medicamentos del consultorio.</h2><br>
            <a href="index.php" class="btn btn-primary float-left "style="position: absolute;top: 32%; right: 3%;">Regresar</a>
        </div>
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <h4>Por favor, proceda a insertar la información del medicamento</h4>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="row g-3" method="POST" action="guarda.php" autocomplete="off">

                        <div class="col-md-4">
                            <label for="codigo" class="form-label">Código del medicamento</label>
                            <input type="text" id="codigo" name="codigo" class="form-control" required autofocus>
                        </div>

                        <div class="col-md-8">
                            <label for="descripcion" class="form-label">Descripción del medicamento</label>
                            <input type="text" id="descripcion" name="descripcion" class="form-control" required>
                        </div>

                        <h5>Inventario</h5>

                        <div class="col-md-12">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="inventariable" name="inventariable" value="1">
                                <label for="inventariable" class="form-check-label">¿Priorizar?</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="stock" class="form-label">¿Cuántos existen en stock?</label>
                            <input type="number" id="stock" name="stock" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label for="fabricacion" class="form-label">Año de fabricación</label>
                            <input type="number" id="fabricacion" name="fabricacion" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label for="caducidad" class="form-label">Año de caducidad</label>
                            <input type="number" id="caducidad" name="caducidad" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <a class="btn btn-secondary" href="index.php">Regresar</a>
                            <button type="submit" class="btn btn-primary" name="registro">Guardar</button>
                        </div>

                    </form>
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