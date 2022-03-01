<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <li><a href="" class="menuSuperior"><img src="../../src/images/Ug.png" alt="ug" width="100" height="100"/></a></li>    
                    <li> <a  href ="index.html" class="menuSuperior">Inicio</a></li><!--  <img src="../../src/images/../src/images/omicron.jpeg" alt="omicronn"/> -->
                    <li> <a href ="GutierrezDennis.html" class="menuSuperior">Consejos médicos</a></li><!-- comment -->
                    <li> <a href ="GallardoDouglas.html" class="menuSuperior">Servicios clínicos</a></li><!-- comment -->
                    <li> <a href ="TapiaJonathan.html" class="menuSuperior">Promociones</a></li>  
                    <li> <a href ="GallardoDouglasEspecialidades.html" class="menuSuperior">Especialidades</a></li> 
            </ul>
        
            </nav>
        </div>


    <?php
    require_once '../Conexion/Conexion.php';

    if (isset($_GET['id'])) {

        $data = ['id' => htmlentities($_GET['id'])];
        $sql = "select * from paciente where id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($filas as $fila) {
            ?>
            <div class="card">
        <div class="card-header">
            <h4>Información Paciente</h4>
        </div>
        <div class="card-body formulario">
            <form class="form" role="form" autocomplete="off" method="post">
            <input type="hidden" name="txtid" value="<?php echo $fila['id'] ?>">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Cedula</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" name="txtCedula" value="<?php echo $fila['cedula'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Nombres</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" name="txtNombres" value="<?php echo $fila['nombres'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Apellidos</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" name="txtApellidos" value="<?php echo $fila['apellidos'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Celular</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" name="txtCelular" value="<?php echo $fila['celular'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Estado Civil</label>
                    <div class="col-lg-9">
                        <select name="txtEstadoCivil" class="form-control">
                        <option selected="true" value="<?php echo $fila['estado_civil']?>"><?php echo $fila['estado_civil']?></option>
                        <option class="form-control" value="Soltero">Soltero</option>
                        <option class="form-control" value="Casado">Casado</option>
                        <option class="form-control" value="Divorciado">Divorciado</option>
                        <option class="form-control" value="Viudo">Viudo</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Genero</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="select" name="cbGenero" value="<?php echo $fila['genero'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12 text-center">
                        <a href="Form-PacientesPresentar.php" class="btn btn-secondary">Cancelar</a>
                        <input type="submit" class="btn btn-primary" value="Actualizar">
                    </div>
                </div>
            </form>
        </div>
	</div>
            <?php
        }
    }   
?>


    

    <?php
    

        if (!empty($_POST['txtCedula']) && !empty($_POST['txtNombres']) && 
                !empty($_POST['txtApellidos']) && !empty($_POST['cbGenero'])) {
  
          
            $cedula = htmlentities($_POST['txtCedula']);
            $nombre = htmlentities($_POST['txtNombres']);
            $apellido = htmlentities($_POST['txtApellidos']);
            $celular = htmlentities($_POST['txtCelular']);
            $genero = htmlentities($_POST['cbGenero']);
            $estadoCivil = htmlentities($_POST['txtEstadoCivil']);
            
            $data = [
                'id' => htmlentities($_POST['txtid']),
                'cedula' => $cedula,
                'nombres' => $nombre,
                'apellidos' =>$apellido,
                'celular' => $celular,
                'genero'=>$genero,
                'estado_civil' => $estadoCivil
            ];
            
 $sql = "update paciente set cedula = :cedula, nombres = :nombres, 
    apellidos =:apellidos, celular = :celular, genero = :genero, estado_civil = :estado_civil
    where id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
            
            
            if ($stmt->rowCount() > 0) {// rowCount() permite conocer el numero de filas afectadas
                echo '<script language="javascript">alert("Se actualizo correctamente");</script>';
                echo '<script language="javascript">window.location.replace("Form-PacientesPresentar.php");</script>';
            }else{
                echo "<h1>Error</h1>";
            }
        } else{
            echo '<script language="javascript">alert("Debe llenar los campos");</script>';
        }
        ?>



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
                    <img src="../../src/images/fcbk.png" alt="facebook"><!-- Av. Delta s/n y Av. Kennedy Guayaquil, Guayas, Ecuador-->
                    <label>
                        Universidad de Guayaquil
                    </label>
                </div>
                 <div class="row2">
                    <img src="../../src/images/instagram.jpeg" alt="instagram"><!-- Av. Delta s/n y Av. Kennedy Guayaquil, Guayas, Ecuador-->
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
                     <img src="../../src/images/ubicacion.png"  alt="ubicacion"><!---->
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