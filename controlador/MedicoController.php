<?php

require_once 'modelo/dao/MedicoDAO.php';

class MedicoController {

    private $modelo;
    private $vista;

    public function __construct() {
        $this->modelo = new MedicoDAO();
    }

     public function filtroPrecio() {      
            // mostrar el formulario de buscar por precio producto
            require_once 'vista/producto/productos.precios.php';
        
    }
    
    
    public function index() {
        // llamar al modelo, obtener los datos de productos
        $resultados = $this->modelo->listar();
        // llama a la vista para que muestre los datos
        require_once 'vista/medico/medico.listar.php';
    }

    public function buscar() {
        // leer parametros
        $busq = $_POST['busqueda'];
        //comunicarse con el modelo
        $resultados = $this->modelo->buscar($busq);

        // comunicarse con la vista
        require_once 'vista/producto/productos.list.php';
    }
  public function buscarAjax() {
        //lectura de parametros
        $busqueda = $_GET['b'];
        //llamar al modelo
        $resultados = $this->modelo->buscar($busqueda);
        //no llama a la vista 
        //    require_once 'views/productos/listaproductosView.php'; 
          
        //si no que imprime resultados para que la vista pueda leerlos a traves de js
        echo json_encode($resultados);
    }

    public function filtrarAjax() {
        //lectura de parametros
        $min = $_GET['b'];
        $max = $_GET['d'];
        //llamar al modelo
        $resultados = $this->modelo->filtrar($min, $max);
        //no llama a la vista 
        //    require_once 'views/productos/listaproductosView.php'; 
          
        //si no que imprime resultados para que la vista pueda leerlos a traves de js
        echo json_encode($resultados);
    }

    public function nuevo() {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
            // leer los parametros del formulario
            $cedula = htmlentities($_POST['txtCedula']);
            $nombre = htmlentities($_POST['txtNombres']);
            $apellido = htmlentities($_POST['txtApellidos']);
            $celular = htmlentities($_POST['txtCelular']);
            $genero = htmlentities($_POST['cbGenero']);
            $estadoCivil = htmlentities($_POST['txtEstadoCivil']);
            //comuncarme con el modelo
            $exito = $this->modelo->insertar($cedula, $nombre, $apellido, $celular, $genero, $estadoCivil);
            $msj = 'Producto guardado exitosamente';
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
            header('Location:index.php?c=medico&f=index');
        } else {

            // comunicarse con la vista
            require_once 'vista/medico/medico.insertar.php';
        }
    }

    // metodo que usa DTO Producto
    public function nuevo2() {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
            // leer los parametros del formulario
            // verificaciones
            //if(!isset($_POST['codigo'])){ header('');}
            $prod = new Producto();
            $prod->setCodigo(htmlentities($_POST['codigo']));
            $prod->setNombre(htmlentities($_POST['nombre']));
            $prod->setDescripcion(htmlentities($_POST['descripcion']));
            $prod->setPrecio(htmlentities($_POST['precio']));
            $prod->setIdCategoria(htmlentities($_POST['categoria']));
            $estado = (isset($_POST['estado'])) ? 1 : 0;
            $prod->setEstado($estado);
            $prod->setUsuario('usuario'); //$_SESSION['usuario'];
            //comunicarme con el modelo
            $exito = $this->modelo->insertar2($prod);
            $msj = 'Producto guardado exitosamente';
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
            header('Location:index.php?c=Productos&f=index');
        } else {// mostrar el fomulario de nuevo producto
            // cuando la solicitud es por get
            //comunicarse con el modelo
            require_once 'modelo/dao/CategoriasDAO.php';
            $modeloCat = new CategoriasDAO();
            $categorias = $modeloCat->listar();

            // comunicarse con la vista
            require_once 'vista/producto/productos.nuevo.php';
        }
    }

    public function editar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {// editar
            // leer los parametros del formulario
            // verificaciones
            //if(!isset($_POST['codigo'])){ header('');}
            $id = htmlentities($_POST['txtid']);
            $cedula = htmlentities($_POST['txtCedula']);
            $nombre = htmlentities($_POST['txtNombres']);
            $apellido = htmlentities($_POST['txtApellidos']);
            $celular = htmlentities($_POST['txtCelular']);
            $genero = htmlentities($_POST['cbGenero']);
            $estadoCivil = htmlentities($_POST['txtEstadoCivil']);
            //comuncarme con el modelo
            $exito = $this->modelo->actualizar($cedula, $nombre, $apellido, $celular, $genero, $id, 
                    $estadoCivil);
            $msj = 'Producto actualizado exitosamente';
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
            header('Location:index.php?c=medico&f=index');        
            
        } else {//mostrar el formulario de edicion cuando la solicitud es por get
            //comunicarse con el modelo
            
            $id = $_GET['id'];
            //comunicarse con el modelo
            $fila = $this->modelo->buscarxId($id);

            // comunicarse con la vista
            require_once 'vista/medico/medico.editar.php';
        }
    }

    public function eliminar() {
        // leer parametros
        $id = htmlentities($_GET['id']);
        
        //llamar al modelo
        $exito = $this->modelo->eliminar($id);
        $msj = 'Producto eliminado exitosamente';
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
        header('Location:index.php?c=medico&f=index'); // redireccionamiento, causa un cambio en la url
    }

}
