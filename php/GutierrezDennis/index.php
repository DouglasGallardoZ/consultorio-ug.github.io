<?php

require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$activo = 1;

$comando = $con->prepare("SELECT id, codigo, descripcion, stock, fabricacion, caducidad FROM medicamentos WHERE activo=:mi_activo ORDER BY codigo ASC");
$comando->execute(['mi_activo' => $activo]);
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

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
   
        </div>
    <main class="container contenedor">

        <div class="p-3 rounded">
            <div class="row">
                <div class="col-12">
                    <h4>Medicamentos
                        <a href="nuevo.php" class="btn btn-primary float-right">Insertar registro</a>
                    </h4>
                </div>
            </div>

            <div class="row py-3">
                <div class="col">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Stock</th>
                                <th>A. fabricación</th>
                                <th>A. Caducidad</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($resultado as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['codigo']; ?></td>
                                    <td><?php echo $row['descripcion']; ?></td>
                                    <td><?php echo $row['stock']; ?></td>
                                    <td><?php echo $row['fabricacion']; ?></td>
                                    <td><?php echo $row['caducidad']; ?></td>
                                    <td><a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Editar</a></td>
                                    <td><a href="eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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