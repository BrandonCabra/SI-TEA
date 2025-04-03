<?php
class piar {

public $CODIGO_PIAR;
public $EVALUACION;
public $FLEXIBILIZACION;
public $BARRA_DE_APRENDIZAJE; // Corrige el nombre aquí
public $PERIODO;
public $DBA;

// Constructor para inicializar valores
public function __construct($codigo, $evaluacion, $flexibilidad, $barra, $periodo, $dba) {
    $this->CODIGO_PIAR = $codigo;
    $this->EVALUACION = $evaluacion;
    $this->FLEXIBILIZACION = $flexibilidad;
    $this->BARRA_DE_APRENDIZAJE = $barra;
    $this->PERIODO = $periodo;
    $this->DBA = $dba;
}

// Método para mostrar los detalles del objeto
public function mostrarDetalles() {
    return [
        "Código PIAR" => $this->CODIGO_PIAR,
        "Evaluación" => $this->EVALUACION,
        "Flexibilización" => $this->FLEXIBILIZACION,
        "Barra de Aprendizaje" => $this->BARRA_DE_APRENDIZAJE,
        "Periodo" => $this->PERIODO,
        "DBA" => $this->DBA
    ];
}
}
?>