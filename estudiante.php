<?php

class estudiante
{
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
    public $FOTOGRAFIA_ESTUDIANTEGRAFIA_ESTUDIANTE;
    public $numero_documento_padre;


    public function __construct($ID_ESTUDIANTE, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, $NUMERO_DOCUMENTO_ESTUDIANTE, $PRIMER_NOMBRE_ESTUDIANTE, $SEGUNDO_NOMBRE_ESTUDIANTE, $PRIMER_APELLIDO_ESTUDIANTE, $SEGUNDO_APELLIDO_ESTUDIANTE, $FECHA_NACIMIENTO, $DIRECCION_ESTUDIANTE, $TELEFONO_ESTUDIANTE, $CORREO_INSTITUCIONAL_ESTUDIANTE, $FOTOGRAFIA_ESTUDIANTE)
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
    }

    public function getIdEstudiante()
    {
        return $this->ID_ESTUDIANTE;
    }

    public function setIdEstudiante($ID_ESTUDIANTE):self{
        $this->ID_ESTUDIANTE = $ID_ESTUDIANTE;
        return $this;
    }

    public function getTipoDocumento()
    {
        return $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;
    }
    public function setTipoDocumento($TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO): self
    {
        $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO = $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;

        return $this;
    }
    public function getNumeroDocumento()
    {
        return $this->NUMERO_DOCUMENTO_ESTUDIANTE;
    }
    public function setNumeroDocumento($NUMERO_DOCUMENTO_ESTUDIANTE): self
    {
        $this->NUMERO_DOCUMENTO_ESTUDIANTE = $NUMERO_DOCUMENTO_ESTUDIANTE;

        return $this;
    }
    public function getPrimerNombre()
    {
        return $this->PRIMER_NOMBRE_ESTUDIANTE;
    }
    public function setPrimerNombre($PRIMER_NOMBRE_ESTUDIANTE): self
    {
        $this->PRIMER_NOMBRE_ESTUDIANTE = $PRIMER_NOMBRE_ESTUDIANTE;

        return $this;
    }
    public function getSegundoNombre()
    {
        return $this->SEGUNDO_NOMBRE_ESTUDIANTE;
    }
    public function setSegundoNombre($SEGUNDO_NOMBRE_ESTUDIANTE): self
    {
        $this->SEGUNDO_NOMBRE_ESTUDIANTE = $SEGUNDO_NOMBRE_ESTUDIANTE;

        return $this;
    }
    public function getPrimerApellido()
    {
        return $this->PRIMER_APELLIDO_ESTUDIANTE;
    }
    public function setPrimerApellido($PRIMER_APELLIDO_ESTUDIANTE): self
    {
        $this->PRIMER_APELLIDO_ESTUDIANTE = $PRIMER_APELLIDO_ESTUDIANTE;

        return $this;
    }
    public function getSegundoApellido()
    {
        return $this->SEGUNDO_APELLIDO_ESTUDIANTE;
    }
    public function setSegundoApellido($SEGUNDO_APELLIDO_ESTUDIANTE): self
    {
        $this->SEGUNDO_APELLIDO_ESTUDIANTE = $SEGUNDO_APELLIDO_ESTUDIANTE;

        return $this;
    }
    public function getFechaNacimiento()
    {
        return $this->FECHA_NACIMIENTO;
    }
    public function setFechaNacimiento($FECHA_NACIMIENTO): self
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
    public function getCorreoInstitucional()
    {
        return $this->CORREO_INSTITUCIONAL_ESTUDIANTE;
    }
    public function setCorreoInstitucional($CORREO_INSTITUCIONAL_ESTUDIANTE): self
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

    public function conectar($conexion) 
    {
        $sql = "INSERT INTO estudiantes (ID_ESTUDIANTE, TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, NUMERO_DOCUMENTO_ESTUDIANTE, PRIMER_NOMBRE_ESTUDIANTE, SEGUNDO_NOMBRE_ESTUDIANTE, PRIMER_APELLIDO_ESTUDIANTE, SEGUNDO_APELLIDO_ESTUDIANTE, FECHA_NACIMIENTO, DIRECCION_ESTUDIANTE, TELEFONO_ESTUDIANTE, CORREO_INSTITUCIONAL_ESTUDIANTE, FOTOGRAFIA_ESTUDIANTE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(0, $this->ID_ESTUDIANTE, PDO::PARAM_INT);
        $stmt->bindValue(1, $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, PDO::PARAM_STR);
        $stmt->bindValue(2, $this->NUMERO_DOCUMENTO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(3, $this->PRIMER_NOMBRE_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(4, $this->SEGUNDO_NOMBRE_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(5, $this->PRIMER_APELLIDO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(6, $this->SEGUNDO_APELLIDO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(7, $this->FECHA_NACIMIENTO, PDO::PARAM_STR);
        $stmt->bindValue(8, $this->DIRECCION_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(9, $this->TELEFONO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(10, $this->CORREO_INSTITUCIONAL_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(11, $this->FOTOGRAFIA_ESTUDIANTE, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function guardarEstudiante($conexion) 
    {
        $sql = "INSERT INTO estudiantes (ID_ESTUDIANTE, TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, NUMERO_DOCUMENTO_ESTUDIANTE, PRIMER_NOMBRE_ESTUDIANTE, SEGUNDO_NOMBRE_ESTUDIANTE, PRIMER_APELLIDO_ESTUDIANTE, SEGUNDO_APELLIDO_ESTUDIANTE, FECHA_NACIMIENTO, DIRECCION_ESTUDIANTE, TELEFONO_ESTUDIANTE, CORREO_INSTITUCIONAL_ESTUDIANTE, FOTOGRAFIA_ESTUDIANTE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(0, $this->ID_ESTUDIANTE, PDO::PARAM_INT);
        $stmt->bindValue(1, $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, PDO::PARAM_STR);
        $stmt->bindValue(2, $this->NUMERO_DOCUMENTO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(3, $this->PRIMER_NOMBRE_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(4, $this->SEGUNDO_NOMBRE_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(5, $this->PRIMER_APELLIDO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(6, $this->SEGUNDO_APELLIDO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(7, $this->FECHA_NACIMIENTO, PDO::PARAM_STR);
        $stmt->bindValue(8, $this->DIRECCION_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(9, $this->TELEFONO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(10, $this->CORREO_INSTITUCIONAL_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(11, $this->FOTOGRAFIA_ESTUDIANTE, PDO::PARAM_STR);

        return $stmt->execute();
    }
    public function eliminarEstudiante($conexion, $NUMERO_DOCUMENTO_ESTUDIANTE) 
    {
        $sql = "DELETE FROM estudiantes WHERE NUMERO_DOCUMENTO_ESTUDIANTE = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1, $NUMERO_DOCUMENTO_ESTUDIANTE, PDO::PARAM_STR);

        return $stmt->execute();
    }
    public function obtenerEstudiante($conexion, $NUMERO_DOCUMENTO_ESTUDIANTE) 
    {
        $sql = "SELECT * FROM estudiantes WHERE NUMERO_DOCUMENTO_ESTUDIANTE = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1, $NUMERO_DOCUMENTO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function listarEstudiantes($conexion) 
    {
        $sql = "SELECT * FROM estudiantes";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarEstudiante($conexion) 
    {
        $sql = "UPDATE estudiantes SET PRIMER_NOMBRE_ESTUDIANTE = ?, SEGUNDO_NOMBRE_ESTUDIANTE = ?, PRIMER_APELLIDO_ESTUDIANTE = ?, SEGUNDO_APELLIDO_ESTUDIANTE = ?, FECHA_NACIMIENTO = ?, DIRECCION_ESTUDIANTE = ?, TELEFONO_ESTUDIANTE = ?, CORREO_INSTITUCIONAL_ESTUDIANTE = ?, FOTOGRAFIA_ESTUDIANTE = ? WHERE NUMERO_DOCUMENTO_ESTUDIANTE = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1, $this->PRIMER_NOMBRE_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(2, $this->SEGUNDO_NOMBRE_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(3, $this->PRIMER_APELLIDO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(4, $this->SEGUNDO_APELLIDO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(5, $this->FECHA_NACIMIENTO, PDO::PARAM_STR);
        $stmt->bindValue(6, $this->DIRECCION_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(7, $this->TELEFONO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(8, $this->CORREO_INSTITUCIONAL_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(9, $this->FOTOGRAFIA_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->bindValue(10, $this->NUMERO_DOCUMENTO_ESTUDIANTE, PDO::PARAM_STR);

        return $stmt->execute();
    }
    public function buscarEstudiante($conexion, $NUMERO_DOCUMENTO_ESTUDIANTE) 
    {
        $sql = "SELECT * FROM estudiantes WHERE NUMERO_DOCUMENTO_ESTUDIANTE = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1, $NUMERO_DOCUMENTO_ESTUDIANTE, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function validarNumeroDocumento($NUMERO_DOCUMENTO_ESTUDIANTE) 
    {
        return preg_match('/^\d{10}$/', $NUMERO_DOCUMENTO_ESTUDIANTE); 
    }
    public function validarCorreoInstitucional($CORREO_INSTITUCIONAL_ESTUDIANTE) 
    {
        return filter_var($CORREO_INSTITUCIONAL_ESTUDIANTE, FILTER_VALIDATE_EMAIL);
    }
    public function validarTELEFONO_ESTUDIANTE($TELEFONO_ESTUDIANTE) 
    {
        return preg_match('/^\d{10}$/', $TELEFONO_ESTUDIANTE);
    }
    public function validarFechaNacimiento($FECHA_NACIMIENTO) 
    {
        $fecha = DateTime::createFromFormat('Y-m-d', $FECHA_NACIMIENTO);
        return $fecha && $fecha->format('Y-m-d') === $FECHA_NACIMIENTO;
    }
    public function validarDIRECCION_ESTUDIANTE($DIRECCION_ESTUDIANTE) 
    {
        return !empty($DIRECCION_ESTUDIANTE);
    }
    public function validarNombre($nombre) 
    {
        return preg_match('/^[a-zA-Z\s]+$/', $nombre);
    }
    public function validarApellido($apellido) 
    {
        return preg_match('/^[a-zA-Z\s]+$/', $apellido);
    }
    public function validarTipoDocumento($TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO) 
    {
        $tipos_validos = ['CC', 'TI', 'CE', 'RC'];
        return in_array($TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, $tipos_validos);
    }
    public function validarFOTOGRAFIA_ESTUDIANTE($FOTOGRAFIA_ESTUDIANTE) 
    {
        $tipos_validos = ['image/jpeg', 'image/png', 'image/gif'];
        return in_array($FOTOGRAFIA_ESTUDIANTE['type'], $tipos_validos);
    }
    public function validarEstudiante() 
    {
        if (!$this->validarNumeroDocumento($this->NUMERO_DOCUMENTO_ESTUDIANTE)) {
            return "El número de documento debe tener 10 dígitos.";
        }
        if (!$this->validarCorreoInstitucional($this->CORREO_INSTITUCIONAL_ESTUDIANTE)) {
            return "El correo institucional no es válido.";
        }
        if (!$this->validarTELEFONO_ESTUDIANTE($this->TELEFONO_ESTUDIANTE)) {
            return "El teléfono debe tener 10 dígitos.";
        }
        if (!$this->validarFechaNacimiento($this->FECHA_NACIMIENTO)) {
            return "La fecha de nacimiento no es válida.";
        }
        if (!$this->validarDIRECCION_ESTUDIANTE($this->DIRECCION_ESTUDIANTE)) {
            return "La dirección no puede estar vacía.";
        }
        if (!$this->validarNombre($this->PRIMER_NOMBRE_ESTUDIANTE) || !$this->validarNombre($this->SEGUNDO_NOMBRE_ESTUDIANTE)) {
            return "Los nombres solo pueden contener letras y espacios.";
        }
        if (!$this->validarApellido($this->PRIMER_APELLIDO_ESTUDIANTE) || !$this->validarApellido($this->SEGUNDO_APELLIDO_ESTUDIANTE)) {
            return "Los apellidos solo pueden contener letras y espacios.";
        }
        if (!$this->validarTipoDocumento($this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO)) {
            return "El tipo de documento no es válido.";
        }
        if (!$this->validarFOTOGRAFIA_ESTUDIANTE($this->FOTOGRAFIA_ESTUDIANTE)) {
            return "La FOTOGRAFIA_ESTUDIANTE no es válida.";
        }

        return true;
    }

    // función factory
    public static function crearEstudiante($ID_ESTUDIANTE, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, $NUMERO_DOCUMENTO_ESTUDIANTE, $PRIMER_NOMBRE_ESTUDIANTE, $SEGUNDO_NOMBRE_ESTUDIANTE, $PRIMER_APELLIDO_ESTUDIANTE, $SEGUNDO_APELLIDO_ESTUDIANTE, $FECHA_NACIMIENTO, $DIRECCION_ESTUDIANTE, $TELEFONO_ESTUDIANTE, $CORREO_INSTITUCIONAL_ESTUDIANTE, $FOTOGRAFIA_ESTUDIANTE) 
    {
        return new Estudiantes($ID_ESTUDIANTE,$TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, $NUMERO_DOCUMENTO_ESTUDIANTE, $PRIMER_NOMBRE_ESTUDIANTE, $SEGUNDO_NOMBRE_ESTUDIANTE, $PRIMER_APELLIDO_ESTUDIANTE, $SEGUNDO_APELLIDO_ESTUDIANTE, $FECHA_NACIMIENTO, $DIRECCION_ESTUDIANTE, $TELEFONO_ESTUDIANTE, $CORREO_INSTITUCIONAL_ESTUDIANTE, $FOTOGRAFIA_ESTUDIANTE);
    }

     

}




?>