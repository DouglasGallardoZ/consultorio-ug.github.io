<?php 
include("db.php");
if(isset($_POST['guardar'])){
    $nombre= $_POST['nombre'];
    $apellido= $_POST['apellido'];
    $direccion= $_POST['direccion'];
    $correo= $_POST['correo'];
    $celular= $_POST['celular'];
    $opinion= $_POST['opinion'];
    

  

    $query= "INSERT INTO datos_pacient(name_pac,apellido_pac,corre_pac,celular_pac,opinion_pac,direccion_pac) VALUES('$nombre','$apellido','$correo','$celular','$opinion','$direccion')";
    $result=mysqli_query($conn,$query);
    if(!$result){
        die("Query Failed");
    }
    $_SESSION['message']='Tarea Guardada Exitosamente';
    $_SESSION['message_type']='success';
    header("Location:Form-Tapia Ramos.php");
}
?>