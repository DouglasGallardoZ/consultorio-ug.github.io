<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link rel="stylesheet" href="../../assets/css/GallardoDouglas/style.css">
    <link rel="stylesheet" href="../../assets/css/GallardoDouglas/paciente.css">
    <link rel="stylesheet" href="../../assets/css/PreciadoRonald/misEstilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
		href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="font-body">

    
    <div>
        <?php
            include_once "../templates/header.php"
        ?>
    </div>
    <div class="card">
    <?php
       require_once '../../config/Conexion.php';

        $pdo = Conexion::getConexion();
        $sql = "select * from paciente";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        ?>
					<div class="card-header">
						<h4>Pacientes</h4>
					</div>
					<div class="card-body">
                        <div>
                        <a href="paciente.insertar.php"  class="btnAgregar btn btn-success" >Agregar</a>
                        </div>
						<div class="table-responsive">
							<table id="userList" class="table table-bordered table-hover table-striped">
								<thead class="thead-light">
								<tr>
									<th scope="col">Id</th>
                                    <th scope="col">Cedula</th>
									<th scope="col">Nombres</th>
									<th scope="col">Apellidos</th>
                                    <th scope="col">Celular</th>
									<th scope="col">Genero</th>
                                    <th scope="col">Estado Civil</th>
									<th scope="col">Acciones</th>
									<th></th>
								</tr>
								</thead>
								<tbody>
                                <?php
                                $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($filas as $fila) {
                                    ?>
                                    <tr>
                                        <td><?php echo $fila['id'] ?></td>
                                        <td><?php echo $fila['cedula'] ?></td>
                                        <td><?php echo $fila['nombres'] ?></td>
                                        <td><?php echo $fila['apellidos'] ?></td>
                                        <td><?php echo $fila['celular'] ?></td>
                                        <td><?php echo $fila['genero'] ?></td>
                                        <td><?php echo $fila['estado_civil'] ?></td>
                                        <td>
                                        <a href="paciente.editar.php?id=<?php echo $fila['id'] ?>" class="btn btn-success">Editar</a>
                                        <a href="paciente.eliminar.php?id=<?php echo $fila['id'] ?>" class="btn btn-danger">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php } ?>
								</tbody>
							</table>
						</div>

					</div>
				</div>


    <?php
    include_once "../templates/footer.php"
    ?>
    


</body>
</html>