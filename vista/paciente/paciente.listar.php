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
            include_once "vista/templates/header.php"
        ?>
    </div>
    <div class="card">
    <?php
       
        ?>
					<div class="card-header">
						<h4>Pacientes</h4>
					</div>
					<div class="card-body">
                        <div>
                        <a href="index.php?c=paciente&f=nuevo"  class="btnAgregar btn btn-success" >Agregar</a>
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
                                foreach ($resultados as $fila) {
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
                                        <a href="index.php?c=paciente&f=editar&id=<?php echo $fila['id']; ?>"  class="btn btn-success">Editar</a>
                                        <a href="index.php?c=paciente&f=eliminar&id=<?php echo $fila['id'] ?>" class="btn btn-danger" onclick="if (!confirm('Esta seguro de eliminar el producto?'))
                                        return false;">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php } ?>
								</tbody>
							</table>
						</div>

					</div>
				</div>


    <?php
    include_once "vista/templates/footer.php"
    ?>
    


</body>
</html>