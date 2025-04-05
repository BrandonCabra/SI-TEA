<?php
class piar {

public $estudiante_ID_ESTUDIANTE;
public $EVALUACION;
public $FLEXIBILIZACION;
public $BARRA_DE_APRENDIZAJE; // Corrige el nombre aquí
public $PERIODO;
public $DBA;

// Constructor para inicializar valores
public function __construct($estudiante_ID_ESTUDIANTE, $evaluacion, $flexibilidad, $barra, $periodo, $dba) {
    $this->estudiante_ID_ESTUDIANTE = $estudiante_ID_ESTUDIANTE;
    $this->EVALUACION = $evaluacion;
    $this->FLEXIBILIZACION = $flexibilidad;
    $this->BARRA_DE_APRENDIZAJE = $barra;
    $this->PERIODO = $periodo;
    $this->DBA = $dba;
}

// Método para mostrar los detalles del objeto
public function mostrarDetalles() {
    return [
        "Identificación Estudiante" => $this->estudiante_ID_ESTUDIANTE,
        "Evaluación" => $this->EVALUACION,
        "Flexibilización" => $this->FLEXIBILIZACION,
        "Barra de Aprendizaje" => $this->BARRA_DE_APRENDIZAJE,
        "Periodo" => $this->PERIODO,
        "DBA" => $this->DBA
    ];
}
}
?>