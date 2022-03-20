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
    
        <div>
        <?php
            include_once "vista/templates/header.php"
        ?>
        </div>


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
                        <input class="form-control" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="txtCedula" maxlength="10" value="<?php echo $fila['cedula'] ?>">
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
                        <input class="form-control" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" name="txtCelular" value="<?php echo $fila['celular'] ?>">
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
                        <a href="index.php?c=paciente&f=index" class="btn btn-secondary">Cancelar</a>
                        <input type="submit" class="btn btn-primary" value="Actualizar">
                    </div>
                </div>
            </form>
        </div>
	</div>
           

    <?php
            include_once "vista/templates/footer.php"
        ?>



</body>
</html>