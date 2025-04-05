<?php

class Caracterizacion {
    public $codigo_caracterizacion;
    public $valoracion_pedagogica;
    public $diagnostico; 
    public $corresponsabilidad;
    public $contexto_academico;
    public $recomendaciones;
    public $contexto_familiar;
    public $contexto_escolar;
    public $barreras_aprendizaje;

    public function __construct($codigo_caracterizacion, $valoracion_pedagogica, $diagnostico, $corresponsabilidad, $contexto_academico, $recomendaciones, $contexto_familiar, $contexto_escolar, $barreras_aprendizaje) {
        $this->codigo_caracterizacion = $codigo_caracterizacion;
        $this->valoracion_pedagogica = $valoracion_pedagogica;
        $this->diagnostico = $diagnostico;
        $this->corresponsabilidad = $corresponsabilidad;
        $this->contexto_academico = $contexto_academico;
        $this->recomendaciones = $recomendaciones;
        $this->contexto_familiar = $contexto_familiar;
        $this->contexto_escolar = $contexto_escolar;
        $this->barreras_aprendizaje = $barreras_aprendizaje;
    }
    public function getCodigo()
    {
        return $this->codigo_caracterizacion;
    }
    public function setCodigo($codigo): self
    {
        $this->codigo_caracterizacion = $codigo;

        return $this;
    }
    public function getValoracionPedagogica()
    {
        return $this->valoracion_pedagogica;
    }
    public function setValoracionPedagogica($valoracion_pedagogica): self
    {
        $this->valoracion_pedagogica = $valoracion_pedagogica;

        return $this;
    }
    public function getDiagnostico()
    {
        return $this->diagnostico;
    }
    public function setDiagnostico($diagnostico): self
    {
        $this->diagnostico = $diagnostico;

        return $this;
    }

    public function getCorresponsabilidad()
    {
        return $this->corresponsabilidad;
    }
    public function setCorresponsabilidad($corresponsabilidad): self
    {
        $this->corresponsabilidad = $corresponsabilidad;

        return $this;
    }
    public function getContextoAcademico()
    {
        return $this->contexto_academico;
    }
    public function setContextoAcademico($contexto_academico): self
    {
        $this->contexto_academico = $contexto_academico;

        return $this;
    }
    public function getRecomendaciones()
    {
        return $this->recomendaciones;
    }
    public function setRecomendaciones($recomendaciones): self
    {
        $this->recomendaciones = $recomendaciones;

        return $this;
    }
    public function getContextoFamiliar()
    {
        return $this->contexto_familiar;
    }
    public function setContextoFamiliar($contexto_familiar): self
    {
        $this->contexto_familiar = $contexto_familiar;

        return $this;
    }
    public function getContextoEscolar()
    {
        return $this->contexto_escolar;
    }
    public function setContextoEscolar($contexto_escolar): self
    {
        $this->contexto_escolar = $contexto_escolar;

        return $this;
    }
    public function getBarrerasAprendizaje()
    {
        return $this->barreras_aprendizaje;
    }
    public function setBarrerasAprendizaje($barreras_aprendizaje): self
    {
        $this->barreras_aprendizaje = $barreras_aprendizaje;

        return $this;
    }
    public function guardarCaracterizacion($conexion) {
        $sql = "INSERT INTO caracterizacion (codigo_caracterizacion, valoracion_pedagogica, diagnostico, corresponsabilidad, contexto_academico, recomendaciones, contexto_familiar, contexto_escolar, barreras_aprendizaje) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("issssssss", $this->codigo_caracterizacion, $this->valoracion_pedagogica, $this->diagnostico, $this->corresponsabilidad, $this->contexto_academico, $this->recomendaciones, $this->contexto_familiar, $this->contexto_escolar, $this->barreras_aprendizaje);
        return $stmt->execute();
    }
    public function obtenerCaracterizacion($conexion, $codigo_caracterizacion) {
        $sql = "SELECT * FROM caracterizacion WHERE codigo_caracterizacion = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $codigo_caracterizacion);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function actualizarCaracterizacion($conexion) {
        $sql = "UPDATE caracterizacion SET valoracion_pedagogica = ?, diagnostico = ?, corresponsabilidad = ?, contexto_academico = ?, recomendaciones = ?, contexto_familiar = ?, contexto_escolar = ?, barreras_aprendizaje = ? WHERE codigo_caracterizacion = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssssssssi", $this->valoracion_pedagogica, $this->diagnostico, $this->corresponsabilidad, $this->contexto_academico, $this->recomendaciones, $this->contexto_familiar, $this->contexto_escolar, $this->barreras_aprendizaje, $this->codigo_caracterizacion);
        return $stmt->execute();
    }
    public function eliminarCaracterizacion($conexion, $codigo_caracterizacion) {
        $sql = "DELETE FROM caracterizacion WHERE codigo_caracterizacion = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $codigo_caracterizacion);
        return $stmt->execute();
    }
    public function listarCaracterizaciones($conexion) {
        $sql = "SELECT * FROM caracterizacion";
        $result = $conexion->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function buscarCaracterizacion($conexion, $codigo_caracterizacion) {
        $sql = "SELECT * FROM caracterizacion WHERE codigo_caracterizacion = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $codigo_caracterizacion);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function validarCaracterizacion() {
        if (empty($this->valoracion_pedagogica) || empty($this->diagnostico) || empty($this->corresponsabilidad) || empty($this->contexto_academico) || empty($this->recomendaciones) || empty($this->contexto_familiar) || empty($this->contexto_escolar) || empty($this->barreras_aprendizaje)) {
            return "Todos los campos son obligatorios.";
        }
        return true;
    }
    public function validarCodigoCaracterizacion() {
        if (empty($this->codigo_caracterizacion)) {
            return "El código de caracterización es obligatorio.";
        }
        return true;
    }

    
}
 
//funcion factory
function crearCaracterizacion($codigo_caracterizacion, $valoracion_pedagogica, $diagnostico, $corresponsabilidad, $contexto_academico, $recomendaciones, $contexto_familiar, $contexto_escolar, $barreras_aprendizaje) {
    return new Caracterizacion($codigo_caracterizacion, $valoracion_pedagogica, $diagnostico, $corresponsabilidad, $contexto_academico, $recomendaciones, $contexto_familiar, $contexto_escolar, $barreras_aprendizaje);
}


$caracterizacion = crearCaracterizacion(1, "Valoración 1", "Diagnóstico 1", "Corresponsabilidad 1", "Contexto Académico 1", "Recomendaciones 1", "Contexto Familiar 1", "Contexto Escolar 1", "Barreras de Aprendizaje 1");

?>





