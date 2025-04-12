<?php

class Caracterizacion { 
    // Atributos de la clase caracterizacion
    public $ID_CARACTERIZACION;
    public $CODIGO_CARACTERIZACION;
    public $ESTUDIANTE_ID_ESTUDIANTE;
    public $VALORACION_PEDAGOGICA;
    public $DIAGNOSTICO; 
    public $CORRESPONSABILIDAD;
    public $CONTEXTO_ACADEMICO;
    public $RECOMENDACIONES;
    public $CONTEXTO_FAMILIAR;
    public $CONTEXTO_ESCOLAR;
    public $BARRA_DE_APRENDIZAJE;

    // Constructor de la clase
    public function __construct($ID_CARACTERIZACION, $CODIGO_CARACTERIZACION, $ESTUDIANTE_ID_ESTUDIANTE, $VALORACION_PEDAGOGICA, $DIAGNOSTICO, $CORRESPONSABILIDAD, $CONTEXTO_ACADEMICO, $RECOMENDACIONES, $CONTEXTO_FAMILIAR, $CONTEXTO_ESCOLAR, $BARRA_DE_APRENDIZAJE) {
        $this->ID_CARACTERIZACION = $ID_CARACTERIZACION;
        $this->CODIGO_CARACTERIZACION = $CODIGO_CARACTERIZACION;
        $this->ESTUDIANTE_ID_ESTUDIANTE = $ESTUDIANTE_ID_ESTUDIANTE;
        $this->VALORACION_PEDAGOGICA = $VALORACION_PEDAGOGICA;
        $this->DIAGNOSTICO = $DIAGNOSTICO;
        $this->CORRESPONSABILIDAD = $CORRESPONSABILIDAD;
        $this->CONTEXTO_ACADEMICO = $CONTEXTO_ACADEMICO;
        $this->RECOMENDACIONES = $RECOMENDACIONES;
        $this->CONTEXTO_FAMILIAR = $CONTEXTO_FAMILIAR;
        $this->CONTEXTO_ESCOLAR = $CONTEXTO_ESCOLAR;
        $this->BARRA_DE_APRENDIZAJE = $BARRA_DE_APRENDIZAJE;
    }
    // GETTERS Y SETTERS
    public function getID_CARACTERIZACION()
    {
        return $this->ID_CARACTERIZACION;
    } 
    public function getCODIGO_CARACTERIZACION()
    {
        return $this->CODIGO_CARACTERIZACION;
    }
    public function setCODIGO_CARACTERIZACION($CODIGO_CARACTERIZACION): self
    {
        $this->CODIGO_CARACTERIZACION = $CODIGO_CARACTERIZACION;

        return $this;
    }
    public function getESTUDIANTE_ID_ESTUDIANTE()
    {
        return $this->ESTUDIANTE_ID_ESTUDIANTE;
    }
    public function setESTUDIANTE_ID_ESTUDIANTE($ESTUDIANTE_ID_ESTUDIANTE): self
    {
        $this->ESTUDIANTE_ID_ESTUDIANTE = $ESTUDIANTE_ID_ESTUDIANTE;

        return $this;
    }
    public function getVALORACION_PEDAGOGICA()
    {
        return $this->VALORACION_PEDAGOGICA;
    }
    public function setVALORACION_PEDAGOGICA($VALORACION_PEDAGOGICA): self
    {
        $this->VALORACION_PEDAGOGICA = $VALORACION_PEDAGOGICA;

        return $this;
    }
    public function getDIAGNOSTICO()
    {
        return $this->DIAGNOSTICO;
    }
    public function setDIAGNOSTICO($DIAGNOSTICO): self
    {
        $this->DIAGNOSTICO = $DIAGNOSTICO;

        return $this;
    }

    public function getCORRESPONSABILIDAD()
    {
        return $this->CORRESPONSABILIDAD;
    }
    public function setCORRESPONSABILIDAD($CORRESPONSABILIDAD): self
    {
        $this->CORRESPONSABILIDAD = $CORRESPONSABILIDAD;

        return $this;
    }
    public function getCONTEXTO_ACADEMICO()
    {
        return $this->CONTEXTO_ACADEMICO;
    }
    public function setCONTEXTO_ACADEMICO($CONTEXTO_ACADEMICO): self
    {
        $this->CONTEXTO_ACADEMICO = $CONTEXTO_ACADEMICO;

        return $this;
    }
    public function getRECOMENDACIONES()
    {
        return $this->RECOMENDACIONES;
    }
    public function setRECOMENDACIONES($RECOMENDACIONES): self
    {
        $this->RECOMENDACIONES = $RECOMENDACIONES;

        return $this;
    }
    public function getCONTEXTO_FAMILIAR()
    {
        return $this->CONTEXTO_FAMILIAR;
    }
    public function setCONTEXTO_FAMILIAR($CONTEXTO_FAMILIAR): self
    {
        $this->CONTEXTO_FAMILIAR = $CONTEXTO_FAMILIAR;

        return $this;
    }
    public function getCONTEXTO_ESCOLAR()
    {
        return $this->CONTEXTO_ESCOLAR;
    }
    public function setCONTEXTO_ESCOLAR($CONTEXTO_ESCOLAR): self
    {
        $this->CONTEXTO_ESCOLAR = $CONTEXTO_ESCOLAR;

        return $this;
    }
    public function getBARRA_DE_APRENDIZAJE()
    {
        return $this->BARRA_DE_APRENDIZAJE;
    }
    public function setBARRA_DE_APRENDIZAJE($BARRA_DE_APRENDIZAJE): self
    {
        $this->BARRA_DE_APRENDIZAJE = $BARRA_DE_APRENDIZAJE;

        return $this;
    }
    // Métodos para interactuar con la base de datos
    // Métodos para guardar, obtener, actualizar y eliminar (CRUD) caracterizaciones
    public function guardarCaracterizacion($conexion) {
        $sql = "INSERT INTO caracterizacion (CODIGO_CARACTERIZACION, ESTUDIANTE_ID_ESTUDIANTE, VALORACION_PEDAGOGICA, DIAGNOSTICO, CORRESPONSABILIDAD, CONTEXTO_ACADEMICO, RECOMENDACIONES, CONTEXTO_FAMILIAR, CONTEXTO_ESCOLAR, BARRA_DE_APRENDIZAJE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $conexion = Conexion1::conectar();          
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1, $this->CODIGO_CARACTERIZACION, PDO::PARAM_INT);
        $stmt->bindValue(2, $this->ESTUDIANTE_ID_ESTUDIANTE, PDO::PARAM_INT);
        $stmt->bindValue(3, $this->VALORACION_PEDAGOGICA, PDO::PARAM_STR);
        $stmt->bindValue(4, $this->DIAGNOSTICO, PDO::PARAM_STR);
        $stmt->bindValue(5, $this->CORRESPONSABILIDAD, PDO::PARAM_STR);
        $stmt->bindValue(6, $this->CONTEXTO_ACADEMICO, PDO::PARAM_STR);
        $stmt->bindValue(7, $this->RECOMENDACIONES, PDO::PARAM_STR);
        $stmt->bindValue(8, $this->CONTEXTO_FAMILIAR, PDO::PARAM_STR);
        $stmt->bindValue(9, $this->CONTEXTO_ESCOLAR, PDO::PARAM_STR);
        $stmt->bindValue(10, $this->BARRA_DE_APRENDIZAJE, PDO::PARAM_STR);
        $ID_CARACTERIACION = $conexion->lastInsertId();
        return $stmt->execute();
    }

    // Método para actualizar una caracterización
    public function actualizarCaracterizacion($conexion) {
        $sql = "UPDATE caracterizacion SET CODIGO_CARACTERIZACION=?, VALORACION_PEDAGOGICA = ?, DIAGNOSTICO = ?, CORRESPONSABILIDAD = ?, CONTEXTO_ACADEMICO = ?, RECOMENDACIONES = ?, CONTEXTO_FAMILIAR = ?, CONTEXTO_ESCOLAR = ?, BARRA_DE_APRENDIZAJE = ? WHERE ID_CARACTERIZACION = ?";
        $conexion = Conexion1::conectar();
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1, $this->CODIGO_CARACTERIZACION, PDO::PARAM_INT);
        $stmt->bindValue(2, $this->VALORACION_PEDAGOGICA, PDO::PARAM_STR);
        $stmt->bindValue(3, $this->DIAGNOSTICO, PDO::PARAM_STR);
        $stmt->bindValue(4, $this->CORRESPONSABILIDAD, PDO::PARAM_STR);
        $stmt->bindValue(5, $this->CONTEXTO_ACADEMICO, PDO::PARAM_STR); 
        $stmt->bindValue(6, $this->RECOMENDACIONES, PDO::PARAM_STR);
        $stmt->bindValue(7, $this->CONTEXTO_FAMILIAR, PDO::PARAM_STR);
        $stmt->bindValue(8, $this->CONTEXTO_ESCOLAR, PDO::PARAM_STR);
        $stmt->bindValue(9, $this->BARRA_DE_APRENDIZAJE, PDO::PARAM_STR);
        $stmt->bindValue(10, $this->ID_CARACTERIZACION, PDO::PARAM_INT);    
        return $stmt->execute();
    }
    // Método para eliminar una caracterización
    public function borrarCaracterizacion($conexion) {
        try {
            // Iniciar transacción
            $conexion->beginTransaction();
        
             // Eliminar de la tabla caracterizacion
            $sqlCaracterizacion = "DELETE FROM caracterizacion WHERE ID_CARACTERIZACION = ?";
            $stmtCaracterizacion = $conexion->prepare($sqlCaracterizacion);
            $stmtCaracterizacion->execute([$this->ID_CARACTERIZACION]);
               
            // Confirmar transacción
            $conexion->commit();
            echo "Caracterización de borrada exitosamente!";
        } catch (Exception $e) {
            // Revertir transacción si algo falla
            $conexion->rollBack();
            echo "Error al borrar la caracterización: " . $e->getMessage();
        }
    }
    
    public function buscarCaracterizacion($conexion, $ID_CARACTERIZACION) {
        $sql = "SELECT * FROM caracterizacion WHERE ID_CARACTERIZACION = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1, $ID_CARACTERIZACION, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    //obtener estudiantes
    

    public function obtenerEstudiantes($conexion) {
        $sql = "SELECT * FROM estudiantes";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
}
 
//funcion factory
function crearCaracterizacion($ID_CARACTERIZACION, $CODIGO_CARACTERIZACION, $ESTUDIANTE_ID_ESTUDIANTE, $VALORACION_PEDAGOGICA, $DIAGNOSTICO, $CORRESPONSABILIDAD, $CONTEXTO_ACADEMICO, $RECOMENDACIONES, $CONTEXTO_FAMILIAR, $CONTEXTO_ESCOLAR, $BARRA_DE_APRENDIZAJE) {
    return new Caracterizacion($ID_CARACTERIZACION, $CODIGO_CARACTERIZACION, $ESTUDIANTE_ID_ESTUDIANTE, $VALORACION_PEDAGOGICA, $DIAGNOSTICO, $CORRESPONSABILIDAD, $CONTEXTO_ACADEMICO, $RECOMENDACIONES, $CONTEXTO_FAMILIAR, $CONTEXTO_ESCOLAR, $BARRA_DE_APRENDIZAJE);
}


?>





