<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar servicio</title>
    <link rel="stylesheet" href="../css/GallardoDouglas/style.css">
    <link rel="stylesheet" href="../css/PreciadoRonald/misEstilos.css">
</head>
<body class="font-body">

    <div>
        <?php
            include_once "../php/templates/header-2.php"
        ?>
    </div>


    <div id="info-servicio" class="columna">
        <section>
            <h2>Servicios Hospitalarios</h2>
            <p> <br/> Contamos con equipamiento médico de <br> última tecnología  destinado 
                a la atención de calidad. <br/> Cuidamos de ti y de los que amas.</p>
        </section>

        <div>
            <img src="../src/images/servicio_hosp_1.png" alt="Esta es una imagen de servicio hospitalario" class="img-servicios" />
        </div>

    </div>



    <div id="formulario" class="columna">
        <form class="form">
            <ul>
                <li><label>Nombres <input type="text" id="nombre" size="40"></label></li>
                <li><label>Apellidos <input type="text" id="apellido" size="40"> </label></li>
                <li><label>Correo <input type="text" id="correo" size="40"> </label></li>
                <li><label>Celular <input type="text" id="celular" size="40"> </label></li>
                <li>
                    <label>
                        Servicios
                        <select id="cmb-servicios" >
                            <option value="Seleccione" selected>Seleccione</option>
                            <option value="Emergencia">Emergencia</option>
                            <option value="Cirugía">Cirugía</option>
                        </select>
                    </label>
                </li>
                <li>
                    <label>Observación (Opcional)<textarea name="textarea" rows="8" cols="52"> </textarea> </label>
                </li>

                <li>
                    <div id="btn-solicitar">
                        <button id="btnSolicitar" class="button" type="button">Solicitar</button>
                    </div>
                </li>

            </ul>

        </form>

    </div>



    <?php
            include_once "../php/templates/footer-2.php"
        ?>
    <!--script src="../js/GallardoDouglas.js" type="text/javascript"></!--script-->
    <script>
        const nombre = document.getElementById("nombre");
        const apellido = document.getElementById("apellido");
        const correo = document.getElementById("correo");
        const celular = document.getElementById("celular");
        const servicios = document.getElementById("cmb-servicios");
        const boton = document.getElementById("btnSolicitar");

        function valicacion(){
            console.log("Enter validacion")
            if(nombre.value.length===0 || /^\s+$/.test(nombre)){
                alert("No ha ingresado correctamente su nombre");
                return false;
            }

            if(apellido.value.length==0 || /^\s+$/.test(apellido)){
                alert("No ha ingresado correctamente su apellido");
                return false;
            }

            if(correo.value.length==0 || /^\s+$/.test(correo)){
                alert("No ha ingresado correctamente su correo");
                return false;
            }

            if(celular.value.length==0 || /^\s+$/.test(celular) || !isNaN(celular)){
                alert("No ha ingresado correctamente su numero de telefono");
                return false;
            }
            console.log("final")
            if (servicios.value=="Seleccione" ) {
                alert ("Debe seleccionar un servicio");
                servicios.focus();
                return false;
            }

            

            return true;

        }

        boton.addEventListener("click", ()=>{
            if(valicacion()){
                alert("Se envió peticion con exito")
            }
            
        })
    </script>

</body>
</html>