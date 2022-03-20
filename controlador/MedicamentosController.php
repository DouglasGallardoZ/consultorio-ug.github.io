<?php

require_once 'modelo/dao/MedicamentoDAO.php';
require_once 'modelo/dto/Medicamento.php';

class MedicamentosController {

    private $modelo;
    private $vista;

    public function __construct() {
        $this->modelo = new MedicamentoDAO();
    }

    public function index() {
        // llamar al modelo, obtener los datos de Medicamentos
        $resultados = $this->modelo->listar();
        // llama a la vista para que muestre los datos
        require_once 'vista/medicamento/medicamentos.list.php';
    }

    public function buscar() {
        // leer parametros
        $busq = $_POST['busqueda'];
        //comunicarse con el modelo
        $resultados = $this->modelo->buscar($busq);

        // comunicarse con la vista
        require_once 'vista/medicamento/medicamentos.list.php';
    }

    public function nuevo() {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el medicamento
            // leer los parametros del formulario
            // verificaciones
            //if(!isset($_POST['codigo'])){ header('');}
            $cod = htmlentities($_POST['codigo']);
            $nom = htmlentities($_POST['nombre']);
            $desc = htmlentities($_POST['descripcion']);
            $precio = htmlentities($_POST['precio']);
            $idCat = htmlentities($_POST['categoria']);
            $estado = (isset($_POST['estado'])) ? 1 : 0;
            $usu = 'usuario'; //$_SESSION['usuario'];
            //comuncarme con el modelo
            $exito = $this->modelo->insertar($cod, $nom, $desc, $estado, $precio, $idCat, $usu);
            $msj = 'Medicamento guardado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar el guardado";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            //   $this->index();
            header('Location:index.php?c=Medicamentos&f=index');
        } else {// mostrar el fomulario de nuevo medicamento
            // cuando la solicitud es por get
            //comunicarse con el modelo
            require_once 'modelo/dao/CategoriasDAO.php';
            $modeloCat = new CategoriasDAO();
            $categorias = $modeloCat->listar();

            // comunicarse con la vista
            require_once 'vista/medicamento/medicamentos.nuevo.php';
        }
    }

    // metodo que usa DTO medicamento
    public function nuevo2() {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el medicamento producto
            // leer los parametros del formulario
            // verificaciones
            //if(!isset($_POST['codigo'])){ header('');}
            $med = new Medicamento();
            $med->setCodigo(htmlentities($_POST['codigo']));
            $med->setNombre(htmlentities($_POST['nombre']));
            $med->setDescripcion(htmlentities($_POST['descripcion']));
            $med->setPrecio(htmlentities($_POST['precio']));
            $med->setIdCategoria(htmlentities($_POST['categoria']));
            $estado = (isset($_POST['estado'])) ? 1 : 0;
            $med->setEstado($estado);
            $med->setUsuario('usuario'); //$_SESSION['usuario'];
            //comunicarme con el modelo
            $exito = $this->modelo->insertar2($med);
            $msj = 'Medicamento guardado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar el guardado";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            //   $this->index();
            header('Location:index.php?c=Medicamentos&f=index');
        } else {// mostrar el fomulario de nuevo medicamento
            // cuando la solicitud es por get
            //comunicarse con el modelo
            require_once 'modelo/dao/CategoriasDAO.php';
            $modeloCat = new CategoriasDAO();
            $categorias = $modeloCat->listar();

            // comunicarse con la vista
            require_once 'vista/medicamento/medicamentos.nuevo.php';
        }
    }

    public function editar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {// editar
            // leer los parametros del formulario
            // verificaciones
            //if(!isset($_POST['codigo'])){ header('');}
             $id = htmlentities($_POST['id']);
            $cod = htmlentities($_POST['codigo']);
            $nom = htmlentities($_POST['nombre']);
            $desc = htmlentities($_POST['descripcion']);
            $precio = htmlentities($_POST['precio']);
            $idCat = htmlentities($_POST['categoria']);
            $estado = (isset($_POST['estado'])) ? 1 : 0;
            $usu = 'usuario'; //$_SESSION['usuario'];
            //comuncarme con el modelo
            $exito = $this->modelo->actualizar($cod, $nom, $desc, $estado, $precio, $idCat, $usu, $id);
            $msj = 'Medicamento actualizado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar la actualizacion";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            //   $this->index();
            header('Location:index.php?c=Medicamentos&f=index');        
            
        } else {//mostrar el formulario de edicion cuando la solicitud es por get
            //comunicarse con el modelo
            require_once 'modelo/dao/CategoriasDAO.php';
            $modeloCat = new CategoriasDAO();
            $categorias = $modeloCat->listar();

            // leer parametros
            $id = $_GET['id'];
            //comunicarse con el modelo
            $med = $this->modelo->buscarxId($id);

            // comunicarse con la vista
            require_once 'vista/medicamento/medicamentos.editar.php';
        }
    }

    public function eliminar() {
        // leer parametros
        $id = htmlentities($_GET['id']);
        $usu = 'usuario'; //$_SESSION['usuario'];
        //llamar al modelo
        $exito = $this->modelo->eliminar($id, $usu);
        $msj = 'Medicamento eliminado exitosamente';
        $color = 'primary';
        if (!$exito) {
            $msj = "No se pudo realizar la eliminacion";
            $color = "danger";
        }
        session_start();
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;

        //llamar a la vista
        // $this->index();
        //llamar a la vista
        header('Location:index.php?c=medicamentos&f=index'); // redireccionamiento, causa un cambio en la url
    }

}
