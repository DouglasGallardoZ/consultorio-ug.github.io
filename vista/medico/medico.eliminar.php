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
        <?php
            include_once "../templates/header.php"
        ?>
        </div>


    <?php
    require_once '../../config/Conexion.php';

    $pdo = Conexion::getConexion();
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
                    <label class="col-lg-12 text-center col-form-label form-control-label">¿Está seguro de eliminar al paciente con numero de cedula <?php echo $fila['cedula'] ?>?</label>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12 text-center">
                        <a href="paciente.listar.php" class="btn btn-secondary">Cancelar</a>
                        <input type="submit" class="btn btn-danger" value="Eliminar">
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
    

        if (!empty($_POST['txtid'])) {
            $data = ['id' => htmlentities($_POST['txtid'])];
            
 $sql = "delete from paciente where id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
            
            
            if ($stmt->rowCount() > 0) {// rowCount() permite conocer el numero de filas afectadas
                echo '<script language="javascript">alert("Se elimino correctamente");</script>';
                echo '<script language="javascript">window.location.replace("paciente.listar.php");</script>';
            }else{
                echo "<h1>Error</h1>";
            }
        } 
        ?>


<?php
            include_once "../templates/footer.php"
        ?>
   



</body>
</html>