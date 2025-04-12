<?php

class estudiante
{
    //Atributos de la clase estudiante
    public $ID_ESTUDIANTE;
    public $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;
    public $NUMERO_DOCUMENTO_ESTUDIANTE;
    public $PRIMER_NOMBRE_ESTUDIANTE;
    public $SEGUNDO_NOMBRE_ESTUDIANTE;
    public $PRIMER_APELLIDO_ESTUDIANTE;
    public $SEGUNDO_APELLIDO_ESTUDIANTE;
    public $FECHA_NACIMIENTO;
    public $DIRECCION_ESTUDIANTE;
    public $TELEFONO_ESTUDIANTE;
    public $CORREO_INSTITUCIONAL_ESTUDIANTE;
    public $FOTOGRAFIA_ESTUDIANTE;
    public $numero_documento_padre;
//Funcion constructora
    public function __construct($ID_ESTUDIANTE, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, $NUMERO_DOCUMENTO_ESTUDIANTE, $PRIMER_NOMBRE_ESTUDIANTE, $SEGUNDO_NOMBRE_ESTUDIANTE, $PRIMER_APELLIDO_ESTUDIANTE, $SEGUNDO_APELLIDO_ESTUDIANTE, $FECHA_NACIMIENTO, $DIRECCION_ESTUDIANTE, $TELEFONO_ESTUDIANTE, $CORREO_INSTITUCIONAL_ESTUDIANTE, $FOTOGRAFIA_ESTUDIANTE, $numero_documento_padre)
    {
        $this->ID_ESTUDIANTE = $ID_ESTUDIANTE; 
        $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO = $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;
        $this->NUMERO_DOCUMENTO_ESTUDIANTE = $NUMERO_DOCUMENTO_ESTUDIANTE;
        $this->PRIMER_NOMBRE_ESTUDIANTE = $PRIMER_NOMBRE_ESTUDIANTE;
        $this->SEGUNDO_NOMBRE_ESTUDIANTE = $SEGUNDO_NOMBRE_ESTUDIANTE;
        $this->PRIMER_APELLIDO_ESTUDIANTE = $PRIMER_APELLIDO_ESTUDIANTE;
        $this->SEGUNDO_APELLIDO_ESTUDIANTE = $SEGUNDO_APELLIDO_ESTUDIANTE;
        $this->FECHA_NACIMIENTO = $FECHA_NACIMIENTO;
        $this->DIRECCION_ESTUDIANTE = $DIRECCION_ESTUDIANTE;
        $this->TELEFONO_ESTUDIANTE = $TELEFONO_ESTUDIANTE;
        $this->CORREO_INSTITUCIONAL_ESTUDIANTE = $CORREO_INSTITUCIONAL_ESTUDIANTE;
        $this->FOTOGRAFIA_ESTUDIANTE = $FOTOGRAFIA_ESTUDIANTE;
        $this->numero_documento_padre = $numero_documento_padre;
    }
//Getters y Setters
    public function getID_ESTUDIANTE()
    {
        return $this->ID_ESTUDIANTE;
    }
    public function setID_ESTUDIANTE($ID_ESTUDIANTE):self{
        $this->ID_ESTUDIANTE = $ID_ESTUDIANTE;
        return $this;
    }
    public function getTIPO_DOCUMENTO_ID_TIPO_DOCUMENTO()
    {
        return $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;
    }
    public function setTIPO_DOCUMENTO_ID_TIPO_DOCUMENTO($TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO): self
    {
        $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO = $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;

        return $this;
    }
    public function getNUMERO_DOCUMENTO_ESTUDIANTE()
    {
        return $this->NUMERO_DOCUMENTO_ESTUDIANTE;
    }
    public function setNUMERO_DOCUMENTO_ESTUDIANTE($NUMERO_DOCUMENTO_ESTUDIANTE): self
    {
        $this->NUMERO_DOCUMENTO_ESTUDIANTE = $NUMERO_DOCUMENTO_ESTUDIANTE;

        return $this;
    }
    public function getPRIMER_NOMBRE_ESTUDIANTE()
    {
        return $this->NUMERO_DOCUMENTO_ESTUDIANTE;
    }
    public function setPRIMER_NOMBRE_ESTUDIANTE($NUMERO_DOCUMENTO_ESTUDIANTE): self
    {
        $this->NUMERO_DOCUMENTO_ESTUDIANTE = $NUMERO_DOCUMENTO_ESTUDIANTE;

        return $this;
    }
    public function getSEGUNDO_NOMBRE_ESTUDIANTE()
    {
        return $this->SEGUNDO_NOMBRE_ESTUDIANTE;
    }
    public function setSEGUNDO_NOMBRE_ESTUDIANTE($SEGUNDO_NOMBRE_ESTUDIANTE): self
    {
        $this->SEGUNDO_NOMBRE_ESTUDIANTE = $SEGUNDO_NOMBRE_ESTUDIANTE;

        return $this;
    }
    public function getPRIMER_APELLIDO_ESTUDIANTE()
    {
        return $this->PRIMER_APELLIDO_ESTUDIANTE;
    }
    public function setPRIMER_APELLIDO_ESTUDIANTE($PRIMER_APELLIDO_ESTUDIANTE): self
    {
        $this->PRIMER_APELLIDO_ESTUDIANTE = $PRIMER_APELLIDO_ESTUDIANTE;

        return $this;
    }
    public function getSEGUNDO_APELLIDO_ESTUDIANTE()
    {
        return $this->SEGUNDO_APELLIDO_ESTUDIANTE;
    }
    public function setSEGUNDO_APELLIDO_ESTUDIANTE($SEGUNDO_APELLIDO_ESTUDIANTE): self
    {
        $this->SEGUNDO_APELLIDO_ESTUDIANTE = $SEGUNDO_APELLIDO_ESTUDIANTE;

        return $this;
    }
    public function getFECHA_NACIMIENTO()
    {
        return $this->FECHA_NACIMIENTO;
    }
    public function setFECHA_NACIMIENTO($FECHA_NACIMIENTO): self
    {
        $this->FECHA_NACIMIENTO = $FECHA_NACIMIENTO;

        return $this;
    }
    public function getDIRECCION_ESTUDIANTE()
    {
        return $this->DIRECCION_ESTUDIANTE;
    }
    public function setDIRECCION_ESTUDIANTE($DIRECCION_ESTUDIANTE): self
    {
        $this->DIRECCION_ESTUDIANTE = $DIRECCION_ESTUDIANTE;

        return $this;
    }
    public function getTELEFONO_ESTUDIANTE()
    {
        return $this->TELEFONO_ESTUDIANTE;
    }
    public function setTELEFONO_ESTUDIANTE($TELEFONO_ESTUDIANTE): self
    {
        $this->TELEFONO_ESTUDIANTE = $TELEFONO_ESTUDIANTE;

        return $this;
    }
    public function getCORREO_INSTITUCIONAL()
    {
        return $this->CORREO_INSTITUCIONAL_ESTUDIANTE;
    }
    public function setCORREO_INSTITUCIONAL($CORREO_INSTITUCIONAL_ESTUDIANTE): self
    {
        $this->CORREO_INSTITUCIONAL_ESTUDIANTE = $CORREO_INSTITUCIONAL_ESTUDIANTE;

        return $this;
    }
    public function getFOTOGRAFIA_ESTUDIANTE()
    {
        return $this->FOTOGRAFIA_ESTUDIANTE;
    }
    public function setFOTOGRAFIA_ESTUDIANTE($FOTOGRAFIA_ESTUDIANTE): self
    {
        $this->FOTOGRAFIA_ESTUDIANTE = $FOTOGRAFIA_ESTUDIANTE;

        return $this;
    }
    public function getnumero_documento_padre()
    {
        return $this->numero_documento_padre;
    }
    public function setnumero_documento_padre($numero_documento_padre): self
    {
        $this->numero_documento_padre = $numero_documento_padre;

        return $this;
    }
    //Metodos para la base de datos
    //Método para guardar un estudiante en la base de datos
    public function guardarEstudiante($conexion) 
    {
        $sql = "INSERT INTO estudiante (TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, NUMERO_DOCUMENTO_ESTUDIANTE, PRIMER_NOMBRE_ESTUDIANTE, SEGUNDO_NOMBRE_ESTUDIANTE, PRIMER_APELLIDO_ESTUDIANTE, SEGUNDO_APELLIDO_ESTUDIANTE, FECHA_NACIMIENTO, DIRECCION_ESTUDIANTE, TELEFONO_ESTUDIANTE, CORREO_INSTITUCIONAL_ESTUDIANTE, FOTOGRAFIA_ESTUDIANTE, numero_documento_padre) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $conexion = Conexion1::conectar();
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1, $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, PDO::PARAM_INT);
        $stmt->bindValue(2, $this->NUMERO_DOCUMENTO_ESTUDIANTE, PDO::PARAM_INT);
        $stmt->bindValue(3, $this->PRIMER_NOMBRE_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(4, $this->SEGUNDO_NOMBRE_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(5, $this->PRIMER_APELLIDO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(6, $this->SEGUNDO_APELLIDO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(7, $this->FECHA_NACIMIENTO, PDO::PARAM_STR);
        $stmt->bindValue(8, $this->DIRECCION_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(9, $this->TELEFONO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(10, $this->CORREO_INSTITUCIONAL_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(11, $this->FOTOGRAFIA_ESTUDIANTE, PDO::PARAM_LOB);
        $stmt->bindValue(12, $this->numero_documento_padre, PDO::PARAM_INT);
        $id = $conexion->lastInsertId();
        return $stmt->execute();
        
    }
    //Método para actualizar un estudiante en la base de datos
    public function actualizarEstudiante($conexion, $ID_ESTUDIANTE):void 
    {
        $sql = "UPDATE estudiante SET NUMERO_DOCUMENTO_ESTUDIANTE = ?, PRIMER_NOMBRE_ESTUDIANTE = ?, SEGUNDO_NOMBRE_ESTUDIANTE = ?, PRIMER_APELLIDO_ESTUDIANTE = ?, SEGUNDO_APELLIDO_ESTUDIANTE = ?, FECHA_NACIMIENTO = ?, DIRECCION_ESTUDIANTE = ?, TELEFONO_ESTUDIANTE = ?, CORREO_INSTITUCIONAL_ESTUDIANTE = ?, FOTOGRAFIA_ESTUDIANTE = ?, TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO = ?, numero_documento_padre = ? WHERE ID_ESTUDIANTE = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1, $this->PRIMER_NOMBRE_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(2, $this->SEGUNDO_NOMBRE_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(3, $this->PRIMER_APELLIDO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(4, $this->SEGUNDO_APELLIDO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(5, $this->FECHA_NACIMIENTO, PDO::PARAM_STR);
        $stmt->bindValue(6, $this->DIRECCION_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(7, $this->TELEFONO_ESTUDIANTE, PDO::PARAM_INT);
        $stmt->bindValue(8, $this->CORREO_INSTITUCIONAL_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(9, $this->FOTOGRAFIA_ESTUDIANTE, PDO::PARAM_LOB);
        $stmt->bindValue(10, $this->NUMERO_DOCUMENTO_ESTUDIANTE, PDO::PARAM_INT);
        $stmt->bindValue(11, $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, PDO::PARAM_INT);
        $stmt->bindValue(12, $ID_ESTUDIANTE, PDO::PARAM_INT);
        $stmt->bindValue(13, $this->numero_documento_padre, PDO::PARAM_INT);

        
    }
    public function borrarEstudiante($conexion):void{
   try {
    // Iniciar transacción
    $conexion->beginTransaction();

     // Eliminar de la tabla general
    $sqlGeneral = "DELETE FROM estudiante WHERE ID_ESTUDIANTE = ?";
    $stmtGeneral = $conexion->prepare($sqlGeneral);
    $stmtGeneral->execute([$this->ID_ESTUDIANTE]);
       
    // Confirmar transacción
    $conexion->commit();
    echo "Estudiante borrado exitosamente!";
} catch (Exception $e) {
    // Revertir transacción si algo falla
    $conexion->rollBack();
    echo "Error al borrar el estudiante: " . $e->getMessage();
}
}


   
}
    
    // función factory
    class EstudianteFactory{
        public static function crearEstudiante($ID_ESTUDIANTE, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, $NUMERO_DOCUMENTO_ESTUDIANTE, $PRIMER_NOMBRE_ESTUDIANTE, $SEGUNDO_NOMBRE_ESTUDIANTE, $PRIMER_APELLIDO_ESTUDIANTE, $SEGUNDO_APELLIDO_ESTUDIANTE, $FECHA_NACIMIENTO, $DIRECCION_ESTUDIANTE, $TELEFONO_ESTUDIANTE, $CORREO_INSTITUCIONAL_ESTUDIANTE, $FOTOGRAFIA_ESTUDIANTE, $numero_documento_padre)   {
        return new estudiante($ID_ESTUDIANTE,$TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, $NUMERO_DOCUMENTO_ESTUDIANTE, $PRIMER_NOMBRE_ESTUDIANTE, $SEGUNDO_NOMBRE_ESTUDIANTE, $PRIMER_APELLIDO_ESTUDIANTE, $SEGUNDO_APELLIDO_ESTUDIANTE, $FECHA_NACIMIENTO, $DIRECCION_ESTUDIANTE, $TELEFONO_ESTUDIANTE, $CORREO_INSTITUCIONAL_ESTUDIANTE, $FOTOGRAFIA_ESTUDIANTE, $numero_documento_padre);
    }  

}

?>