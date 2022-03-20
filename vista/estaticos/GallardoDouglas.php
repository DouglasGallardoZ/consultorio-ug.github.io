<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios Hospitalarios</title>
    <link rel="stylesheet" href="../../assets//GallardoDouglas/style.css">
    <link rel="stylesheet" href="../../assets/PreciadoRonald/misEstilos.css">
</head>
<body class="font-body">

        <?php
            include_once "../templates/header-2.php"
        ?>
   


    <div id="container-main">

        <div class="service-container">
            <section>
                <h2>Servicios Hospitalarios</h2>
                <p> <br/> Contamos con equipamiento médico de última tecnología destinado 
                    a la atención de calidad. <br/> Cuidamos de ti y de los que amas.</p>
            </section>
        </div>
    
        <section class="section-servicios">
            <h2>Emergencia</h2>
    
            <div class="fila">
    
                <div class="columna">
                    <img src="../../assets/src/images/servicio_hosp_1.png" alt="Esta es una imagen de servicio hospitalario" class="img-servicios" />
                </div>
        
                <div class="columna">
                    <img src="../../assets/src/images/servicio_hosp_2.png" alt="Esta es una imagen de servicio hospitalario" class="img-servicios" />
                </div>
            </div>
    
            <p>
                El sistema de atención de emergencias y urgencias médicas basa su operación
                en la acción coordinada para atender oportunamente a los pacientes acorde a los diagnósticos.. <br/> 
            </p>
    
            <p> Nuestras áreas de emergencia cuentan con: </p>
    
            <ul>
                <li>3 Servicios de Emeregencia</li>
                <li>3 Unidades de Trauma</li>
                <li>6 cubículos en emergencia, 1 cubículo de labores y 1 cubículo pediátrico</li>
            </ul>
    
            <p>
                El protocolo de atención comienza con el proceso de Triage, dictado por el
                 Ministerio de Salud Pública del Ecuador, en el cuál se clasifica a los pacientes 
                 por diferentes grados de complejidad , y así, aquellos que estén más graves sean 
                 atendidos primero.
            </p>
    
        </section>
    
        <section class="section-servicios">
            <h2>Cirugía</h2>
            <div class="fila">
    
                <div class="columna">
                    <img src="../../assets/src/images/cirugia-1.jpg" alt="Esta es una imagen de cirugía" class="img-servicios"/>
                </div>
        
                <div class="columna">
                    <img src="../../assets/src/images/cirugia-2.jpg" alt="Esta es una imagen de cirugía" class="img-servicios"/>
                </div>
            </div>
            <p>
                Los servicios de cirugía tienen a disposición de los 
                pacientes y médicos especialistas:
            </p>
            <ul>
                <li>4 quirófanos</li>
                <li>Salas de parto y pre-parto</li>
                <li>Salas de pre y post-operatorio</li>
                <li>Equipos de laparoscopia y artroscopia de última tecnología</li>
            </ul>
    
            <p>
                Todos los quirófanos disponen de lámparas cielíticas, máquinas de anestesia,
                 mesas quirúrgicas, monitoreo, pisos de vinil conductivo, acondicionadores de 
                 aire con filtros EPA y difusores de flujo laminar, presión positiva del flujo de 
                 aire y la tecnología médica necesaria para la realización de procedimientos de alta complejidad.
            </p>
        </section>
    

        <div id="btn-solicitar">

            <form action="Form-GallardoDouglas.php">
                <button class="button">Solicitar servicio</button>
            </form>

        </div>


    </div>


    <?php
            include_once "../templates/footer-2.php"
        ?>

</body>
</html>