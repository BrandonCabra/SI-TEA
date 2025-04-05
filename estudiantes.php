<?php

class estudiantes
{
    public $id_estudiante;
    public $tipo_documento;
    public $numero_documento;
    public $primer_nombre;
    public $segundo_nombre;
    public $primer_apellido;
    public $segundo_apellido;
    public $fecha_nacimiento;
    public $direccion;
    public $telefono;
    public $correo_institucional;
    public $foto;

    public function __construct($id_estudiante, $tipo_documento, $numero_documento, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $direccion, $telefono, $correo_institucional, $foto)
    {
        $this->id_estudiante = $id_estudiante; 
        $this->tipo_documento = $tipo_documento;
        $this->numero_documento = $numero_documento;
        $this->primer_nombre = $primer_nombre;
        $this->segundo_nombre = $segundo_nombre;
        $this->primer_apellido = $primer_apellido;
        $this->segundo_apellido = $segundo_apellido;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->correo_institucional = $correo_institucional;
        $this->foto = $foto;
    }

    public function getIdEstudiante()
    {
        return $this->id_estudiante;
    }

    public function setIdEstudiante($id_estudiante):self{
        $this->id_estudiante = $id_estudiante;
        return $this;
    }

    public function getTipoDocumento()
    {
        return $this->tipo_documento;
    }
    public function setTipoDocumento($tipo_documento): self
    {
        $this->tipo_documento = $tipo_documento;

        return $this;
    }
    public function getNumeroDocumento()
    {
        return $this->numero_documento;
    }
    public function setNumeroDocumento($numero_documento): self
    {
        $this->numero_documento = $numero_documento;

        return $this;
    }
    public function getPrimerNombre()
    {
        return $this->primer_nombre;
    }
    public function setPrimerNombre($primer_nombre): self
    {
        $this->primer_nombre = $primer_nombre;

        return $this;
    }
    public function getSegundoNombre()
    {
        return $this->segundo_nombre;
    }
    public function setSegundoNombre($segundo_nombre): self
    {
        $this->segundo_nombre = $segundo_nombre;

        return $this;
    }
    public function getPrimerApellido()
    {
        return $this->primer_apellido;
    }
    public function setPrimerApellido($primer_apellido): self
    {
        $this->primer_apellido = $primer_apellido;

        return $this;
    }
    public function getSegundoApellido()
    {
        return $this->segundo_apellido;
    }
    public function setSegundoApellido($segundo_apellido): self
    {
        $this->segundo_apellido = $segundo_apellido;

        return $this;
    }
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }
    public function setFechaNacimiento($fecha_nacimiento): self
    {
        $this->fecha_nacimiento = $fecha_nacimiento;

        return $this;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }
    public function getCorreoInstitucional()
    {
        return $this->correo_institucional;
    }
    public function setCorreoInstitucional($correo_institucional): self
    {
        $this->correo_institucional = $correo_institucional;

        return $this;
    }
    public function getFoto()
    {
        return $this->foto;
    }
    public function setFoto($foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function conectar($conexion) 
    {
        $sql = "INSERT INTO estudiantes (id_estudiante, tipo_documento, numero_documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento, direccion, telefono, correo_institucional, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(0, $this->id_estudiante, PDO::PARAM_INT);
        $stmt->bindValue(1, $this->tipo_documento, PDO::PARAM_STR);
        $stmt->bindValue(2, $this->numero_documento, PDO::PARAM_STR);
        $stmt->bindValue(3, $this->primer_nombre, PDO::PARAM_STR);
        $stmt->bindValue(4, $this->segundo_nombre, PDO::PARAM_STR);
        $stmt->bindValue(5, $this->primer_apellido, PDO::PARAM_STR);
        $stmt->bindValue(6, $this->segundo_apellido, PDO::PARAM_STR);
        $stmt->bindValue(7, $this->fecha_nacimiento, PDO::PARAM_STR);
        $stmt->bindValue(8, $this->direccion, PDO::PARAM_STR);
        $stmt->bindValue(9, $this->telefono, PDO::PARAM_STR);
        $stmt->bindValue(10, $this->correo_institucional, PDO::PARAM_STR);
        $stmt->bindValue(11, $this->foto, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function guardarEstudiante($conexion) 
    {
        $sql = "INSERT INTO estudiantes (id_estudiante, tipo_documento, numero_documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento, direccion, telefono, correo_institucional, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(0, $this->id_estudiante, PDO::PARAM_INT);
        $stmt->bindValue(1, $this->tipo_documento, PDO::PARAM_STR);
        $stmt->bindValue(2, $this->numero_documento, PDO::PARAM_STR);
        $stmt->bindValue(3, $this->primer_nombre, PDO::PARAM_STR);
        $stmt->bindValue(4, $this->segundo_nombre, PDO::PARAM_STR);
        $stmt->bindValue(5, $this->primer_apellido, PDO::PARAM_STR);
        $stmt->bindValue(6, $this->segundo_apellido, PDO::PARAM_STR);
        $stmt->bindValue(7, $this->fecha_nacimiento, PDO::PARAM_STR);
        $stmt->bindValue(8, $this->direccion, PDO::PARAM_STR);
        $stmt->bindValue(9, $this->telefono, PDO::PARAM_STR);
        $stmt->bindValue(10, $this->correo_institucional, PDO::PARAM_STR);
        $stmt->bindValue(11, $this->foto, PDO::PARAM_STR);

        return $stmt->execute();
    }
    public function eliminarEstudiante($conexion, $numero_documento) 
    {
        $sql = "DELETE FROM estudiantes WHERE numero_documento = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1, $numero_documento, PDO::PARAM_STR);

        return $stmt->execute();
    }
    public function obtenerEstudiante($conexion, $numero_documento) 
    {
        $sql = "SELECT * FROM estudiantes WHERE numero_documento = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1, $numero_documento, PDO::PARAM_STR);
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
        $sql = "UPDATE estudiantes SET primer_nombre = ?, segundo_nombre = ?, primer_apellido = ?, segundo_apellido = ?, fecha_nacimiento = ?, direccion = ?, telefono = ?, correo_institucional = ?, foto = ? WHERE numero_documento = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1, $this->primer_nombre, PDO::PARAM_STR);
        $stmt->bindValue(2, $this->segundo_nombre, PDO::PARAM_STR);
        $stmt->bindValue(3, $this->primer_apellido, PDO::PARAM_STR);
        $stmt->bindValue(4, $this->segundo_apellido, PDO::PARAM_STR);
        $stmt->bindValue(5, $this->fecha_nacimiento, PDO::PARAM_STR);
        $stmt->bindValue(6, $this->direccion, PDO::PARAM_STR);
        $stmt->bindValue(7, $this->telefono, PDO::PARAM_STR);
        $stmt->bindValue(8, $this->correo_institucional, PDO::PARAM_STR);
        $stmt->bindValue(9, $this->foto, PDO::PARAM_STR);
        $stmt->bindValue(10, $this->numero_documento, PDO::PARAM_STR);

        return $stmt->execute();
    }
    public function buscarEstudiante($conexion, $numero_documento) 
    {
        $sql = "SELECT * FROM estudiantes WHERE numero_documento = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1, $numero_documento, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function validarNumeroDocumento($numero_documento) 
    {
        return preg_match('/^\d{10}$/', $numero_documento); 
    }
    public function validarCorreoInstitucional($correo_institucional) 
    {
        return filter_var($correo_institucional, FILTER_VALIDATE_EMAIL);
    }
    public function validarTelefono($telefono) 
    {
        return preg_match('/^\d{10}$/', $telefono);
    }
    public function validarFechaNacimiento($fecha_nacimiento) 
    {
        $fecha = DateTime::createFromFormat('Y-m-d', $fecha_nacimiento);
        return $fecha && $fecha->format('Y-m-d') === $fecha_nacimiento;
    }
    public function validarDireccion($direccion) 
    {
        return !empty($direccion);
    }
    public function validarNombre($nombre) 
    {
        return preg_match('/^[a-zA-Z\s]+$/', $nombre);
    }
    public function validarApellido($apellido) 
    {
        return preg_match('/^[a-zA-Z\s]+$/', $apellido);
    }
    public function validarTipoDocumento($tipo_documento) 
    {
        $tipos_validos = ['CC', 'TI', 'CE', 'RC'];
        return in_array($tipo_documento, $tipos_validos);
    }
    public function validarFoto($foto) 
    {
        $tipos_validos = ['image/jpeg', 'image/png', 'image/gif'];
        return in_array($foto['type'], $tipos_validos);
    }
    public function validarEstudiante() 
    {
        if (!$this->validarNumeroDocumento($this->numero_documento)) {
            return "El número de documento debe tener 10 dígitos.";
        }
        if (!$this->validarCorreoInstitucional($this->correo_institucional)) {
            return "El correo institucional no es válido.";
        }
        if (!$this->validarTelefono($this->telefono)) {
            return "El teléfono debe tener 10 dígitos.";
        }
        if (!$this->validarFechaNacimiento($this->fecha_nacimiento)) {
            return "La fecha de nacimiento no es válida.";
        }
        if (!$this->validarDireccion($this->direccion)) {
            return "La dirección no puede estar vacía.";
        }
        if (!$this->validarNombre($this->primer_nombre) || !$this->validarNombre($this->segundo_nombre)) {
            return "Los nombres solo pueden contener letras y espacios.";
        }
        if (!$this->validarApellido($this->primer_apellido) || !$this->validarApellido($this->segundo_apellido)) {
            return "Los apellidos solo pueden contener letras y espacios.";
        }
        if (!$this->validarTipoDocumento($this->tipo_documento)) {
            return "El tipo de documento no es válido.";
        }
        if (!$this->validarFoto($this->foto)) {
            return "La foto no es válida.";
        }

        return true;
    }

    // función factory
    public static function crearEstudiante($id_estudiante, $tipo_documento, $numero_documento, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $direccion, $telefono, $correo_institucional, $foto) 
    {
        return new Estudiantes($id_estudiante,$tipo_documento, $numero_documento, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $direccion, $telefono, $correo_institucional, $foto);
    }

     

}




?>