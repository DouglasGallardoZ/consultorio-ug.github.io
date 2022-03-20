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
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Cedula</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="txtCedula" maxlength="10">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Nombres</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" name="txtNombres">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Apellidos</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" name="txtApellidos">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Celular</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" name="txtCelular" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Estado Civil</label>
                    <div class="col-lg-9">
                        <select name="txtEstadoCivil" class="form-control">
                        <option class="form-control" value="Soltero">Soltero</option>
                        <option class="form-control" value="Casado">Casado</option>
                        <option class="form-control" value="Divorciado">Divorciado</option>
                        <option class="form-control" value="Viudo">Viudo</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"> Genero </label>
                    <div class="col-lg-9">
                        <label>Masculino<input class="form-control" type="radio" name="cbGenero" value="Masculino"></label>
                        <label>Femenino<input class="form-control" type="radio" name="cbGenero" value="Femenino"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12 text-center">
                        <a href="index.php?c=paciente&f=index" class="btn btn-secondary">Cancelar</a>
                        <input type="submit" class="btn btn-primary" value="Guardar">
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