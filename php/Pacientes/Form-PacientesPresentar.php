<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar servicio</title>
    <link rel="stylesheet" href="../../css/GallardoDouglas/style.css">
    <link rel="stylesheet" href="../../css/GallardoDouglas/paciente.css">
    <link rel="stylesheet" href="../../css/PreciadoRonald/misEstilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
		href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="font-body">

    <h2 style="text-align: center; padding-top: 40px;">Consultorio Médico Universitario</h2>
       
    <div>
        <nav>
            
            <ul class="menuSuperior">  
                <li><a href="" class="menuSuperior"><img src="../src/images/Ug.png" alt="ug" width="100" height="100"/></a></li>    
                <li> <a  href ="index.html" class="menuSuperior">Inicio</a></li><!--  <img src="../src/images/../src/images/omicron.jpeg" alt="omicronn"/> -->
                <li> <a href ="GutierrezDennis.html" class="menuSuperior">Consejos médicos</a></li><!-- comment -->
                <li> <a href ="GallardoDouglas.html" class="menuSuperior">Servicios clínicos</a></li><!-- comment -->
                <li> <a href ="TapiaJonathan.html" class="menuSuperior">Promociones</a></li>  
                <li> <a href ="GallardoDouglasEspecialidades.html" class="menuSuperior">Especialidades</a></li> 
           </ul>
       
        </nav>
    </div>
    <div class="card">
    <?php
       require_once '../Conexion/Conexion.php';


        $sql = "select * from paciente";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        ?>
					<div class="card-header">
						<h4>Pacientes</h4>
					</div>
					<div class="card-body">
                        <div>
                        <a href="insertar.php"  class="btnAgregar btn btn-success" >Agregar</a>
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
                                        <a href="editar.php?id=<?php echo $fila['id'] ?>" class="btn btn-success">Editar</a>
                                        <a href="eliminar.php?id=<?php echo $fila['id'] ?>" class="btn btn-danger">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php } ?>
								</tbody>
							</table>
						</div>

					</div>
				</div>



    <footer class="footer">
        <div class="container_all">
            
        
             
        <div class="container_body">
           
          <div class="column1">
              <h1>
                  Politicas de calidad
              </h1>
              <p>
            Brindamos servicio de arrendamiento de consultorios por consulta
            para ello tenemos consultorios implementados para que usted pueda
            atender cómodamente a sus pacientes, además, servicio de garaje 
            por el tiempo que tome su consulta.
     
                 
              </p>
        </div>
            <div class="column2">
                 <h1>
                  Redes Sociales
              </h1>
                <div class="row1">
                    <img src="../src/images/fcbk.png" alt="facebook"><!-- Av. Delta s/n y Av. Kennedy Guayaquil, Guayas, Ecuador-->
                    <label>
                        Universidad de Guayaquil
                    </label>
                </div>
                 <div class="row2">
                    <img src="../src/images/instagram.jpeg" alt="instagram"><!-- Av. Delta s/n y Av. Kennedy Guayaquil, Guayas, Ecuador-->
                    <label>
                        Universidad de Guayaquil
                    </label>
                </div>
            </div>
            <div class="column3">
                <h1>
                    Informacion Contacto
                </h1>
                <div class="row3"> 
                     <img src="../src/images/ubicacion.png"  alt="ubicacion"><!---->
                    <label>
                         Av. Delta s/n y Av. Kennedy 
                         Guayaquil, Guayas, Ecuador
                    </label>
                </div>
                
            </div>
           
            
        </div>
       <div class="container-footer">
                <div class="copyrigth">
                    2021 Taller Grupal #6 |<a
                        href="">Desarrollo Web</a>
                </div>
                <div class="information">
                    <a href="" class="information">Informacion Universidad </a>|
                    <a href="" class="information"> Privacion y Politica </a>|
                    <a href="" class="information"> Terminos y condiciones</a>|
                </div>
            </div>
        </div>
          
    </footer>


</body>
</html>