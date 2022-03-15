<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio médico / Sintomas y causas</title>
    <link rel="stylesheet" href="../css/GutierrezDennis/style.css">
    <link rel="stylesheet" href="../css/PreciadoRonald/misEstilos.css">
</head>
<body class="font-body">
    <script src="../js/Form-GutierrezDennis.js"></script>
    <div>
    <?php
            include_once "../php/templates/header-2.php"
        ?>
   
    </div>

    <header>
        <div id="Encabezado"><br>
            <h1 style="color: black;">Síntomas y Causas</h1>
            <p>En este apartado de nuestra página hemos de encontrar la información necesaria para tomar acciones frente a algunas de las enfermedades comunes entre nuestros pacientes.</p>
        </div>
    </header>

    <div>
        <img src="../src/images/darOpinion.jpg" alt="Danos tu opinión" width="600" height="480" style="position: absolute;top: 50%; left: 50%;">
    </div>
    <div id="formulario" class="columna">
        <form class="form" action="">
            <ul>
                <li><label for="name">Nombres <input type="text"  size="40" id="name"></label></li>
                <li><label for="lastName">Apellidos <input type="text" name="apellido" size="40" id="lastName"> </label></li>
                <li><label for="email">Correo <input type="text" name="correo" size="40" id="email"> </label></li>
                <li><label for="phone">Celular <input type="text" name="celular" size="40" id="phone"> </label></li>
                <li>
                    <label for="age">
                        ¿Eres mayor de edad?
                        <select name="cmb-edad" id="age">
                            <option value="0" selected>Seleccione</option>
                            <option value="1">Si</option>
                            <option value="2">No</option>
                        </select>
                    </label>
                </li>
                <li>
                    <label for="comment">Dinos tu opinión<textarea name="textarea" rows="8" cols="52" id="comment"> </textarea> </label>
                </li>
                <li>
                    <div id="btn-darOpinion">
                        <button class="button" type="button" value="validar" onclick="validar()">Enviar opinión</button>
                    </div>
                </li>
            </ul>
        </form>
    </div>

    <?php
            include_once "../php/templates/footer-2.php"
        ?>
   
</body>
</html>