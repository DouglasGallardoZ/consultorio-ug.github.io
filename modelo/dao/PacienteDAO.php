<?php
require_once 'config/Conexion.php';
require_once 'modelo/dto/Producto.php';
class PacienteDAO {
    // operaciones de acceso y manejo de datos
    private $con;
    
    public function __construct() {
        $this->con = Conexion::getConexion();
    }
    
    public function listar(){// listar todos los productos
        // sql
        $sql = "select * from paciente";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecutar la sentencia
        $stmt->execute();
        // recuperar los resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retornar los resultados al controlador
        return $resultados; 
        
    }
    
    public function buscar($busq){
          $sql = "SELECT * FROM productos, categoria  where prod_idCategoria = cat_id and prod_estado=1  and 
		(prod_nombre like :b1 or cat_nombre =:b2)";
        $stmt = $this->con->prepare($sql);
        // preparar la sentencia
        $conlike = '%' . $busq . '%';
        $data = ['b1' => $conlike, 'b2' => $conlike];
        // ejecutar la sentencia
        $stmt->execute($data);
        //obtener y retornar resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;      
    }

    public function filtrar($min, $max){
      $sql = "SELECT prod_codigo, prod_nombre, prod_precio FROM productos where prod_precio between :min and :max";
      $stmt = $this->con->prepare($sql);
      // preparar la sentencia
      
      $data = ['min' => $min, 'max' => $max];
      // ejecutar la sentencia
      $stmt->execute($data);
      //obtener y retornar resultados
      $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $resultados;      
  }
    
    
      public function insertar($cedula, $nombre, $apellido, $celular, $genero, $estadoCivil) {
        //sentencia sql
        $data = [
            'cedula' => $cedula,
            'nombres' => $nombre,
            'apellidos' =>$apellido,
            'celular' => $celular,
            'genero'=>$genero,
            'estado_civil' => $estadoCivil
        ];
        
        $sql = "insert into paciente(cedula, nombres, apellidos, celular, genero, estado_civil)
        values(:cedula, :nombres, :apellidos,:celular,:genero, :estado_civil)";

        //bind parameters
        $sentencia = $this->con->prepare($sql);
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
            return false;
        }
        return true;
    }
     // metodo que usa DTO Producto
     public function insertar2(Producto $prod) {
        //sentencia sql
        $sql = "INSERT INTO productos (prod_id, prod_codigo, prod_nombre, prod_descripcion, prod_estado, prod_precio, 
            prod_idCategoria, prod_usuarioActualizacion, prod_fechaActualizacion) VALUES 
            (NULL, :cod, :nom, :desc, :estado, :precio, :idCat, :usu, :fecha)";
       
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $fechaActual = new DateTime('NOW');
        $prod->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));
        $data = [
            'cod' =>  $prod->getCodigo(),
            'nom' =>  $prod->getNombre(),
            'desc' =>  $prod->getDescripcion(),
            'estado' =>  $prod->getEstado(),
            'precio' =>  $prod->getPrecio(),
            'idCat' =>  $prod->getIdCategoria(),
            'usu' =>  $prod->getUsuario(),
            'fecha' =>  $prod->getFechaActualizacion()
        ];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
            return false;
        }
        return true;
    }
    
   public function actualizar($cedula, $nombre, $apellido, $celular, $genero, $id, $estadoCivil) {
        //prepare
        $sql = "update paciente set cedula = :cedula, nombres = :nombres, 
        apellidos =:apellidos, celular = :celular, genero = :genero, estado_civil = :estado_civil
        where id = :id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
    
        $data = [
            'id' => $id,
            'cedula' => $cedula,
            'nombres' => $nombre,
            'apellidos' =>$apellido,
            'celular' => $celular,
            'genero'=>$genero,
            'estado_civil' => $estadoCivil
        ];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
            return false;
        }
        return true;
    }

    public function eliminar($id) {
        //prepare
        $sql = "delete from paciente where id = :id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'id' => $id
        ];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
            return false;
        }
        return true;
    }
    
      public function buscarxId($id) { // buscar un producto por su id
        $sql = "select * from paciente where id = :id";
          // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $filas = $stmt->fetch(PDO::FETCH_ASSOC);// fetch retorna el primer registro
        // retornar resultados
        return $filas;
    }
}
