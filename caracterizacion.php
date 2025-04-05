<?php

class Caracterizacion { 
    // Atributos de la clase
    public $ID_CARACTERIZACION;
    public $CODIGO_CARACTERIZACION;
    public $VALORACION_PEDAGOGICA;
    public $DIAGNOSTICO; 
    public $CORRESPONSABILIDAD;
    public $CONTEXTO_ACADEMICO;
    public $RECOMENDACIONES;
    public $CONTEXTO_FAMILIAR;
    public $CONTEXTO_ESCOLAR;
    public $BARRA_DE_APRENDIZAJE;

    // Constructor de la clase
    public function __construct($ID_CARACTERIZACION, $CODIGO_CARACTERIZACION, $VALORACION_PEDAGOGICA, $DIAGNOSTICO, $CORRESPONSABILIDAD, $CONTEXTO_ACADEMICO, $RECOMENDACIONES, $CONTEXTO_FAMILIAR, $CONTEXTO_ESCOLAR, $BARRA_DE_APRENDIZAJE) {
        $this->ID_CARACTERIZACION = $ID_CARACTERIZACION;
        $this->CODIGO_CARACTERIZACION = $CODIGO_CARACTERIZACION;
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
    public function getCodigo()
    {
        return $this->CODIGO_CARACTERIZACION;
    }
    public function setCodigo($codigo): self
    {
        $this->CODIGO_CARACTERIZACION = $codigo;

        return $this;
    }
    public function getValoracionPedagogica()
    {
        return $this->VALORACION_PEDAGOGICA;
    }
    public function setValoracionPedagogica($VALORACION_PEDAGOGICA): self
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
    public function getContextoAcademico()
    {
        return $this->CONTEXTO_ACADEMICO;
    }
    public function setContextoAcademico($CONTEXTO_ACADEMICO): self
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
    public function getContextoFamiliar()
    {
        return $this->CONTEXTO_FAMILIAR;
    }
    public function setContextoFamiliar($CONTEXTO_FAMILIAR): self
    {
        $this->CONTEXTO_FAMILIAR = $CONTEXTO_FAMILIAR;

        return $this;
    }
    public function getContextoEscolar()
    {
        return $this->CONTEXTO_ESCOLAR;
    }
    public function setContextoEscolar($CONTEXTO_ESCOLAR): self
    {
        $this->CONTEXTO_ESCOLAR = $CONTEXTO_ESCOLAR;

        return $this;
    }
    public function getBarrerasAprendizaje()
    {
        return $this->BARRA_DE_APRENDIZAJE;
    }
    public function setBarrerasAprendizaje($BARRA_DE_APRENDIZAJE): self
    {
        $this->BARRA_DE_APRENDIZAJE = $BARRA_DE_APRENDIZAJE;

        return $this;
    }
    // Métodos para interactuar con la base de datos
    // Métodos para guardar, obtener, actualizar y eliminar (CRUD) caracterizaciones
    public function guardarCaracterizacion($conexion) {
        $sql = "INSERT INTO caracterizacion (CODIGO_CARACTERIZACION, VALORACION_PEDAGOGICA, DIAGNOSTICO, CORRESPONSABILIDAD, CONTEXTO_ACADEMICO, RECOMENDACIONES, CONTEXTO_FAMILIAR, CONTEXTO_ESCOLAR, BARRA_DE_APRENDIZAJE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
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
        return $stmt->execute();
    }
    public function obtenerCaracterizacion($conexion, $ID_CARACTERIZACION) {
        $sql = "SELECT * FROM caracterizacion WHERE ID_CARACTERIZACION = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1, $ID_CARACTERIZACION, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
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
    public function eliminarCaracterizacion($conexion) {
        $sql = "DELETE FROM caracterizacion WHERE ID_CARACTERIZACION = ?";
        $conexion = Conexion1::conectar();
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1, $this->ID_CARACTERIZACION, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function listarCaracterizaciones($conexion) {
        $sql = "SELECT * FROM caracterizacion";
        $result = $conexion->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function buscarCaracterizacion($conexion, $ID_CARACTERIZACION) {
        $sql = "SELECT * FROM caracterizacion WHERE ID_CARACTERIZACION = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1, $ID_CARACTERIZACION, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function validarCaracterizacion() {
        if (empty($this->VALORACION_PEDAGOGICA) || empty($this->DIAGNOSTICO) || empty($this->CORRESPONSABILIDAD) || empty($this->CONTEXTO_ACADEMICO) || empty($this->RECOMENDACIONES) || empty($this->CONTEXTO_FAMILIAR) || empty($this->CONTEXTO_ESCOLAR) || empty($this->BARRA_DE_APRENDIZAJE)) {
            return "Todos los campos son obligatorios.";
        }
        return true;
    }
    public function validarCodigoCaracterizacion() {
        if (empty($this->CODIGO_CARACTERIZACION)) {
            return "El código de caracterización es obligatorio.";
        }
        return true;
    }

    
}
 
//funcion factory
function crearCaracterizacion($ID_CARACTERIZACION, $CODIGO_CARACTERIZACION, $VALORACION_PEDAGOGICA, $DIAGNOSTICO, $CORRESPONSABILIDAD, $CONTEXTO_ACADEMICO, $RECOMENDACIONES, $CONTEXTO_FAMILIAR, $CONTEXTO_ESCOLAR, $BARRA_DE_APRENDIZAJE) {
    return new Caracterizacion($ID_CARACTERIZACION, $CODIGO_CARACTERIZACION, $VALORACION_PEDAGOGICA, $DIAGNOSTICO, $CORRESPONSABILIDAD, $CONTEXTO_ACADEMICO, $RECOMENDACIONES, $CONTEXTO_FAMILIAR, $CONTEXTO_ESCOLAR, $BARRA_DE_APRENDIZAJE);
}


?>





