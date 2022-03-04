<?php
include("db.php");
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query= "DELETE FROM datos_pacient WHERE id= $id";
    $result= mysqli_query($conn,$query);
    if(!$result){
        die("QUERY FAILDE");

    }
    $_SESSION['message']='Dato eliminado Correctamente';
    $_SESSION['message_type']='danger';
    header("Location:Form-Tapia Ramos.php ");
}
?>
