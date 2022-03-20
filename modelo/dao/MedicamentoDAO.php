<?php
require_once 'config/Conexion.php';
require_once 'modelo/dto/Medicamento.php';
class MedicamentoDAO {
    // operaciones de acceso y manejo de datos
    private $con;
    
    public function __construct() {
        $this->con = Conexion::getConexion();
    }
    
    public function listar(){// listar todos los medicamentos
        // sql
        $sql = "select * from medicamentos, categoria where med_idCategoria= cat_id and med_estado=1 ";
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
          $sql = "SELECT * FROM medicamentos, categoria  where med_idCategoria = cat_id and med_estado=1  and 
		(med_nombre like :b1 or cat_nombre =:b2)";
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
    
    
      public function insertar($cod, $nom, $desc, $estado, $precio, $idCat, $usu) {
        //sentencia sql
        $sql = "INSERT INTO medicamentos (med_id, med_codigo, med_nombre, med_descripcion, med_estado, med_precio, 
            med_idCategoria, med_usuarioActualizacion, med_fechaActualizacion) VALUES 
            (NULL, :cod, :nom, :desc, :estado, :precio, :idCat, :usu, :fecha)";
       
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $fechaActual = new DateTime('NOW');
        $strfecha = $fechaActual->format('Y-m-d H:i:s');
        $data = [
            'cod' => $cod,
            'nom' => $nom,
            'desc' => $desc,
            'estado' => $estado,
            'precio' => $precio,
            'idCat' => $idCat,
            'usu' => $usu,
            'fecha' => $strfecha
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
     // metodo que usa DTO Medicamento
     public function insertar2(Medicamento $med) {
        //sentencia sql
        $sql = "INSERT INTO medicamentos (med_id, med_codigo, med_nombre, med_descripcion, med_estado, med_precio, 
            med_idCategoria, med_usuarioActualizacion, med_fechaActualizacion) VALUES 
            (NULL, :cod, :nom, :desc, :estado, :precio, :idCat, :usu, :fecha)";
       
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $fechaActual = new DateTime('NOW');
        $med->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));
        $data = [
            'cod' =>  $med->getCodigo(),
            'nom' =>  $med->getNombre(),
            'desc' =>  $med->getDescripcion(),
            'estado' =>  $med->getEstado(),
            'precio' =>  $med->getPrecio(),
            'idCat' =>  $med->getIdCategoria(),
            'usu' =>  $med->getUsuario(),
            'fecha' =>  $med->getFechaActualizacion()
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
    
   public function actualizar($cod, $nom, $desc, $estado, $precio, $idCat, $usu, $id) {
        //prepare
        $sql = "UPDATE `medicamentos` SET `med_codigo`=:cod,`med_nombre`=:nom,`med_descripcion`=:desc," .
                "`med_estado`=:estado,`med_precio`=:precio,`med_idCategoria`=:idCat,`med_usuarioActualizacion`=:usu," .
                "`med_fechaActualizacion`=:fecha WHERE med_id=:id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $fechaActual = new DateTime('NOW');
        $strfecha = $fechaActual->format('Y-m-d H:i:s');
        $data = [
            'cod' => $cod,
            'nom' => $nom,
            'desc' => $desc,
            'estado' => $estado,
            'precio' => $precio,
            'idCat' => $idCat,
            'usu' => $usu,
            'fecha' => $strfecha,
            'id' => $id,
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

    public function eliminar($id, $usu) {
        //prepare
        $sql = "UPDATE `medicamentos` SET `med_estado`=0,`med_usuarioActualizacion`=:usu," .
                "`med_fechaActualizacion`=:fecha WHERE med_id=:id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $fechaActual = new DateTime('NOW');
        $strfecha = $fechaActual->format('Y-m-d H:i:s');
        $data = [
            'usu' => $usu,
            'fecha' => $strfecha,
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
    
      public function buscarxId($id) { // buscar un medicamento por su id
        $sql = "select * from medicamentos, categoria where med_idCategoria = cat_id and med_estado=1 and med_id=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $medicamento = $stmt->fetch(PDO::FETCH_ASSOC);// fetch retorna el primer registro
        // retornar resultados
        return $medicamento;
    }
}
