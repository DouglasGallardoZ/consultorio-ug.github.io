<?php
include("db.php");
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $query= "SELECT *FROM datos_pacient WHERE id= $id";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
        $row= mysqli_fetch_array($result);
        $nombre=$row['name_pac'];
        $apellido=$row['apellido_pac'];
        $direccion=$row['direccion_pac'];
        $correo=$row['corre_pac'];
        $celular=$row['celular_pac'];
        $opinion=$row['opinion_pac'];
        
    }
}
 if(isset($_POST['update'])){
     
     $id= $_GET['id'];
     $nombre=$_POST['nombre'];
     $apellido=$_POST['apellido'];
     $direccion=$_POST['direccion'];
     $correo=$_POST['correo'];
     $celular=$_POST['celular'];
     $opinion=$_POST['opinion'];

     $query = "UPDATE datos_pacient SET name_pac = '$nombre',apellido_pac='$apellido',corre_pac='$correo',celular_pac='$celular',opinion_pac='$opinion',direccion_pac='$direccion' where id= $id";
     mysqli_query($conn,$query);
     $_SESSION['message']="Datos Actualizado";
     $_SESSION['message_type']='warning';
     header("Location: Form-Tapia Ramos.php");
 }
?>

<?php include("include/header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $_GET['id'];?>" method="POST">
                <div class="form-group p-2">
                        <input type="text" name="nombre" class="form-control" value="<?php echo $nombre;?>" placeholder="Escriba su nombre" autofocus>
                    </div>

                    <div class="form-group p-2">
                        <input type="text" name="apellido" class="form-control" value="<?php echo $apellido; ?>" placeholder="Escriba su apellido" autofocus>
                    </div>

                    <div class="form-group p-2">
                        <input type="text" name="direccion" class="form-control" value="<?php echo $direccion; ?>" placeholder="Escriba su direccion" autofocus>
                    </div>

                    <div class="form-group p-2">
                        <input type="text" name="correo" class="form-control" value="<?php echo $correo; ?>" placeholder="Escriba su correo" autofocus>
                    </div>

                    <div class="form-group p-2">
                        <input type="text" name="celular" class="form-control" value="<?php echo $celular; ?>" placeholder="Escriba su celular" autofocus>
                    </div>

                    <div class="form-group p-2">
                        <textarea name="opinion" rows="2" class="form-control" placeholder="Escriba su opinion"  autofocus>
                        <?php echo $opinion;?>
                        </textarea>
                    </div>
                
                <button class="btn btn-success" name="update">
                    update
                </button>
                
               
                </form>
               
                
            </div>
        </div>
    </div>
</div>

<?php
            include_once "../php/templates/footer-2.php"
        ?>
   