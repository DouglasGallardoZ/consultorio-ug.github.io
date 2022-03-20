<?php 


require_once 'controlador/FrontController.php';
if(isset($_GET['c']) && isset($_GET['f'])){
    $control = $_GET['c'];
    $funcion = $_GET['f'];
} else {
    $control = "paciente";
    $funcion = "index";
}
$frontController = new FrontController();
$frontController->ruteo($control, $funcion);