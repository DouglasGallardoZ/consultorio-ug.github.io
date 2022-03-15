<?php
include("db.php");?>
<?php include("include/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
        <?php if(isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        
        </div>
        <?php session_unset(); } ?>
            
            <div class="card card-body">
                <form action="save_task.php" method="POST">
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
                    <input type="submit" class="btn btn-success btn-block p-2" name="guardar" value="guardar">
                </form>
            </div>

        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>DIRECCION</th>
                    <th>CORREO</th>
                    <th>CELULAR</th>
                    <th>OPINION</th>
                    <th>ACCION</th>
                    </tr>
                </thead>

                <tbody>
                     <?php
                    $query= "SELECT *FROM datos_pacient" ;
                    $result_dato= mysqli_query($conn,$query);
                    while($row= mysqli_fetch_array($result_dato)){ ?>
                    <tr>
                        <td> <?php echo $row['id']?> </td>
                        <td> <?php echo $row['name_pac']?> </td> 
                        <td> <?php echo $row['apellido_pac']?> </td>
                        <td> <?php echo $row['direccion_pac']?> </td>
                        <td> <?php echo $row['corre_pac']?> </td>
                        <td> <?php echo $row['celular_pac']?> </td>
                        <td> <?php echo $row['opinion_pac']?> </td>
                        <td>
                            <a class="btn btn-secondary" href="edit_task.php?id= <?php echo $row['id']?>">
                            <i class="fas fa-marker"></i>
                            </a>
                            
                            <a class="btn btn-danger" style="text-decoration:none" href="delete_task.php?id= <?php echo $row['id']?>">
                            <i class="far fa-trash-alt"></i>
                            </a>
                        </td>

                      
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            

        </div>
    </div>
</div>
<?php include("include/footer.php")?>

   







