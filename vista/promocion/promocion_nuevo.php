
<?php
    include_once "vista/templates/header.php"
    ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
        <?php if(isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        
        
        <?php session_unset(); } ?>
        
            
            <div class="card card-body">
            



             <form action="index.php?c=promocion&f=guarda" method="POST">
                    
                    <div class="form-group p-2">
                        <input type="text" name="nombre" class="form-control" placeholder="Escriba su nombre" autofocus>
                    </div>

                    <div class="form-group p-2">
                        <input type="text" name="apellido" class="form-control" placeholder="Escriba su apellido" autofocus>
                    </div>

                    <div class="form-group p-2">
                        <input type="text" name="direccion" class="form-control" placeholder="Escriba su direccion" autofocus>
                    </div>

                    <div class="form-group p-2">
                        <input type="text" name="correo" class="form-control" placeholder="Escriba su correo" autofocus>
                    </div>

                    <div class="form-group p-2">
                        <input type="text" name="celular" class="form-control" placeholder="Escriba su celular" autofocus>
                    </div>

                    <div class="form-group p-2">
                        <textarea name="opinion" rows="2" class="form-control" placeholder="Escriba su opinion" autofocus></textarea>
                    
                  
                    </div>
                    <input type="submit" class="btn btn-success btn-block p-2" name="guarda" value="guardar">
                </form>  
            </div>
        </div>
    
        
    </div>
    
</div>


<?php
    include_once "vista/templates/footer.php"
    ?>