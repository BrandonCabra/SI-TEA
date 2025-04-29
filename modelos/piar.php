<?php
class piar {

public $CODIGO_PIAR;
public $PERIODO;
public $EVALUACION;
public $DBA;
public $BARRA_DE_APRENDIZAJE; //Barrera de aprendizaje y de participación
public $FLEXIBILIZACION; //Flexibilización o ajuste
public $ESTUDIANTE_ID_ESTUDIANTE;
public $SEGUIMIENTO_EVALUATIVO;

// Constructor para inicializar valores
public function __construct($CODIGO_PIAR, $PERIODO, $EVALUACION, $DBA, $BARRA_DE_APRENDIZAJE, $FLEXIBILIZACION, $ESTUDIANTE_ID_ESTUDIANTE, $SEGUIMIENTO_EVALUATIVO) {
    $this->CODIGO_PIAR = $CODIGO_PIAR;
    $this->PERIODO = $PERIODO;
    $this->EVALUACION = $EVALUACION;
    $this->DBA = $DBA;
    $this->BARRA_DE_APRENDIZAJE = $BARRA_DE_APRENDIZAJE;
    $this->FLEXIBILIZACION = $FLEXIBILIZACION;
    $this->ESTUDIANTE_ID_ESTUDIANTE = $ESTUDIANTE_ID_ESTUDIANTE;
    $this->SEGUIMIENTO_EVALUATIVO = $SEGUIMIENTO_EVALUATIVO;
}

// Getters y setters

public function getCODIGO_PIAR() {
    return $this->CODIGO_PIAR;
}
public function setCODIGO_PIAR($CODIGO_PIAR) {
    $this->CODIGO_PIAR = $CODIGO_PIAR;
}
public function getPERIODO() {
    return $this->PERIODO;
}
public function setPERIODO($PERIODO) {
    $this->PERIODO = $PERIODO;
}
public function getEVALUACION() {
    return $this->EVALUACION;
}
public function setEVALUACION($EVALUACION) {
    $this->EVALUACION = $EVALUACION;
}
public function getDBA() {
    return $this->DBA;
}
public function setDBA($DBA) {
    $this->DBA = $DBA;
}
public function getBARRA_DE_APRENDIZAJE() {
    return $this->BARRA_DE_APRENDIZAJE;
}
public function setBARRA_DE_APRENDIZAJE($BARRA_DE_APRENDIZAJE) {
    $this->BARRA_DE_APRENDIZAJE = $BARRA_DE_APRENDIZAJE;
}
public function getFLEXIBILIZACION() {
    return $this->FLEXIBILIZACION;
}

public function setFLEXIBILIZACION($FLEXIBILIZACION) {
    $this->FLEXIBILIZACION = $FLEXIBILIZACION;
}
public function getESTUDIANTE_ID_ESTUDIANTE() {
    return $this->ESTUDIANTE_ID_ESTUDIANTE;
}

public function setESTUDIANTE_ID_ESTUDIANTE($ESTUDIANTE_ID_ESTUDIANTE) {
    $this->ESTUDIANTE_ID_ESTUDIANTE = $ESTUDIANTE_ID_ESTUDIANTE;
}
public function getSEGUIMIENTO_EVALUATIVO() {
    return $this->SEGUIMIENTO_EVALUATIVO;
}

public function setSEGUIMIENTO_EVALUATIVO($SEGUIMIENTO_EVALUATIVO) {
    $this->SEGUIMIENTO_EVALUATIVO = $SEGUIMIENTO_EVALUATIVO;
}

// Método para mostrar los detalles del objeto
public function mostrarDetalles() {
    return [
        "Identificación Estudiante" => $this->ESTUDIANTE_ID_ESTUDIANTE,
        "Evaluación" => $this->EVALUACION,
        "Flexibilización" => $this->FLEXIBILIZACION,
        "Barra de Aprendizaje" => $this->BARRA_DE_APRENDIZAJE,
        "Periodo" => $this->PERIODO,
        "DBA" => $this->DBA
    ];
}

// Método para guardar PIAR en la base de datos
public function guardarPiar($conexion) {
    $sql = "INSERT INTO piar (CODIGO_PIAR, PERIODO, EVALUACION, DBA, BARRA_DE_APRENDIZAJE, FLEXIBILIZACION, ESTUDIANTE_ID_ESTUDIANTE, SEGUIMIENTO_EVALUATIVO) 
            VALUES (:CODIGO_PIAR, :PERIODO, :EVALUACION, :DBA, :BARRA_DE_APRENDIZAJE, :FLEXIBILIZACION, :ESTUDIANTE_ID_ESTUDIANTE, :SEGUIMIENTO_EVALUATIVO)";
    
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':CODIGO_PIAR', $this->CODIGO_PIAR);
    $stmt->bindParam(':PERIODO', $this->PERIODO);
    $stmt->bindParam(':EVALUACION', $this->EVALUACION);
    $stmt->bindParam(':DBA', $this->DBA);
    $stmt->bindParam(':BARRA_DE_APRENDIZAJE', $this->BARRA_DE_APRENDIZAJE);
    $stmt->bindParam(':FLEXIBILIZACION', $this->FLEXIBILIZACION);
    $stmt->bindParam(':ESTUDIANTE_ID_ESTUDIANTE', $this->ESTUDIANTE_ID_ESTUDIANTE);
    $stmt->bindParam(':SEGUIMIENTO_EVALUATIVO', $this->SEGUIMIENTO_EVALUATIVO);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

}
 //otros metodos con la base


 // instanciar PIAR
    public function crearPiar($CODIGO_PIAR, $PERIODO, $EVALUACION, $DBA, $BARRA_DE_APRENDIZAJE, $FLEXIBILIZACION, $ESTUDIANTE_ID_ESTUDIANTE, $SEGUIMIENTO_EVALUATIVO) {
        return new piar($CODIGO_PIAR, $PERIODO, $EVALUACION, $DBA, $BARRA_DE_APRENDIZAJE, $FLEXIBILIZACION, $ESTUDIANTE_ID_ESTUDIANTE, $SEGUIMIENTO_EVALUATIVO);

    }
}

?>