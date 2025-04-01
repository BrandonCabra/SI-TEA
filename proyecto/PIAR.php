<?php

class PIAR {

public $codigo_PIAR;
public $evaluacion;
public $flexibilidad;
public $barreras_aprendizaje;
public $periodo;
public $DBA;

public function _construct($codigo_PIAR, $evaluacion, $flexibilidad, $barreras_aprendizaje, $periodo, $DBA){
    $this->codigo_PIAR = $codigo_PIAR;
    $this->evaluacion = $evaluacion;
    $this->flexibilidad = $flexibilidad;
    $this->periodo = $periodo;
    $this->DBA = $DBA;
}
public function getCodigoPIAR()
{
return $this->codigo_PIAR;
}
public function setCodigoPIAR($codigo_PIAR): self
{
$this->codigo_PIAR = $codigo_PIAR;
return $this;
}
public function getEvalucacion()
{
return $this->evaluacion;
}
public function setEvalucacion($evaluacion): self
{
$this->evaluacion = $evaluacion;
return $this;
}
public function getFlexibilidad()
{
return $this->flexibilidad;
}
public function setFlexibilidad($flexibilidad): self
{
$this->flexibilidad = $flexibilidad;
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
public function getPeriodo()
{
return $this->periodo;
}
public function setPeriodo($periodo): self
{
$this->periodo = $periodo;
return $this;
}
public function getDBA()
{
return $this->DBA;
}
public function setDBA($DBA): self
{
$this->DBA = $DBA;
return $this;
}
}