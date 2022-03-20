<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promocion</title>
    <link rel="stylesheet" href="assets/style/normalize.css">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="../css/PreciadoRonald/misEstilos.css">
    <link rel="stylesheet" href="assets/style/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style/main.css">



</head>

<body>

    <div>
    <?php
    include_once "vista/templates/header.php"
    ?>
    </div>
    <div class="carousel slide" id="mainSlider" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/Img/promo1.jpg" alt="" class="d-block w-100">


            </div>

            <div class="carousel-item">
                <img src="assets/Img/promo2.jpg" alt="" class="d-block w-100">


            </div>

            <div class="carousel-item">
                <img src="assets/Img/promo3.jpg" alt="" class="d-block w-100">


            </div>
        </div>

    </div>



    <div id="games">
        <div class="conteiner-md p-5">
            <div class="row pt-5">
                <h3 class="text-center pb-5 pt-5 h1 bg-light">Promociones del dia</h3>

            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="card w-100 card-border mb-5">
                        <img src="assets/Img/oferta3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Promocion Dia de la Mujer</h5>
                            <p class="card-text">Esta Promocio es por el dia de la mujer tiene un descuento del 50%</p>
                            <a href="index.php?c=promocion&f=nuevo" class="btn btn-primary">Link de la oferta</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm">
                    <div class="card w-100 card-border mb-5">
                        <img src="assets/Img/oferta1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Promocion para adulto mayores</h5>
                            <p class="card-text">Esta Promocio es por el dia de la mujer tiene un descuento del 30%</p>
                            <a href="index.php?c=promocion&f=nuevo" class="btn btn-primary">Link de la oferta</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm">
                    <div class="card w-100 card-border mb-5">
                        <img src="assets/Img/oferta4.jpg" class="card-img-top" alt="..." height="315px">
                        <div class="card-body">
                            <h5 class="card-title">Promcion de discapacitado</h5>
                            <p class="card-text">Aprovehca las oferta para los discapacitado.</p>
                            <a href="index.php?c=promocion&f=nuevo" class="btn btn-primary">Link de la oferta</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <?php
    include_once "vista/templates/footer.php"
    ?>

    <script src="assets/progra/bootstrap.min.js"></script>
    <script src="assets/progra/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/d0b7dbd55d.js" crossorigin="anonymous"></script>





</body>

</html>