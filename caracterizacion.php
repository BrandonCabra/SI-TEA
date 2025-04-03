<?php
class Caracterizacion {
    public $codigo;
    public $valoracion_pedagogica;
    public $diagnostico; 
    public $corresponsabilidad;
    public $contexto_academico;
    public $recomendaciones;
    public $contexto_familiar;
    public $contexto_escolar;
    public $barreras_aprendizaje;

    public function __construct($codigo, $valoracion_pedagogica, $diagnostico, $corresponsabilidad, $contexto_academico, $recomendaciones, $contexto_familiar, $contexto_escolar, $barreras_aprendizaje) {
        $this->codigo = $codigo;
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
        return $this->codigo;
    }
    public function setCodigo($codigo): self
    {
        $this->codigo = $codigo;

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
}