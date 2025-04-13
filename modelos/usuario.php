<?php
// Clase abstracta base para los usuarios
abstract class UsuarioAbstracto
{
    protected $primer_nombre;
    protected $username;
    protected $password;

    public function __construct($primer_nombre, $username, $password)
    {
        $this->primer_nombre = $primer_nombre;
        $this->username = $username;
        $this->password = $password;
    }

    // Métodos abstractos para implementación en clases derivadas
    abstract public function validarUsuario();
    abstract public function validarPassword();

    // Getters para los atributos protegidos
    public function getPrimerNombre()
    {
        return $this->primer_nombre;
    }

    public function getUsername()
    {
        return $this->username;
    }
}

// Clase Usuario que hereda de UsuarioAbstracto
class Usuario extends UsuarioAbstracto
{
    private $correo;
    private $direccion;

    public function __construct($primer_nombre, $correo, $direccion, $username, $password)
    {
        parent::__construct($primer_nombre, $username, $password);
        $this->correo = $correo;
        $this->direccion = $direccion;
    }

    public function validarUsuario()
    {
        return strlen($this->username) >= 5 ? true : "El nombre de usuario debe tener al menos 5 caracteres.";
    }

    public function validarPassword()
    {
        if (strlen($this->password) < 8) {
            return "La contraseña debe tener al menos 8 caracteres.";
        }

        if (!preg_match('/[a-z]/', $this->password) || !preg_match('/[A-Z]/', $this->password)) {
            return "La contraseña debe incluir mayúsculas y minúsculas.";
        }

        if (!preg_match('/[\W_]/', $this->password)) {
            return "La contraseña debe incluir al menos un carácter especial.";
        }

        return true;
    }

    // Getters para atributos privados
    public function getCorreo()
    {
        return $this->correo;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
}

// Clases específicas para roles
class Estudiante extends Usuario
{
    private $grado;

    public function __construct($primer_nombre, $correo, $direccion, $username, $password, $grado)
    {
        parent::__construct($primer_nombre, $correo, $direccion, $username, $password);
        $this->grado = $grado;
    }

    public function getGrado()
    {
        return $this->grado;
    }
}

class Profesor extends Usuario
{
    private $materia;

    public function __construct($primer_nombre, $correo, $direccion, $username, $password, $materia)
    {
        parent::__construct($primer_nombre, $correo, $direccion, $username, $password);
        $this->materia = $materia;
    }

    public function getMateria()
    {
        return $this->materia;
    }
}

class Psicoorientador extends Usuario
{
    private $especialidad;

    public function __construct($primer_nombre, $correo, $direccion, $username, $password, $especialidad)
    {
        parent::__construct($primer_nombre, $correo, $direccion, $username, $password);
        $this->especialidad = $especialidad;
    }

    public function getEspecialidad()
    {
        return $this->especialidad;
    }
}

class Administrador extends Usuario
{
    private $nivel_acceso;

    public function __construct($primer_nombre, $correo, $direccion, $username, $password, $nivel_acceso)
    {
        parent::__construct($primer_nombre, $correo, $direccion, $username, $password);
        $this->nivel_acceso = $nivel_acceso;
    }

    public function getNivelAcceso()
    {
        return $this->nivel_acceso;
    }
}

// Clase UsuarioFactory para instanciar usuarios
class UsuarioFactory
{
    public static function crearEstudiante($primer_nombre, $correo, $direccion, $username, $password, $grado)
    {
        return new Estudiante($primer_nombre, $correo, $direccion, $username, $password, $grado);
    }

    public static function crearProfesor($primer_nombre, $correo, $direccion, $username, $password, $materia)
    {
        return new Profesor($primer_nombre, $correo, $direccion, $username, $password, $materia);
    }

    public static function crearPsicoorientador($primer_nombre, $correo, $direccion, $username, $password, $especialidad)
    {
        return new Psicoorientador($primer_nombre, $correo, $direccion, $username, $password, $especialidad);
    }

    public static function crearAdministrador($primer_nombre, $correo, $direccion, $username, $password, $nivel_acceso)
    {
        return new Administrador($primer_nombre, $correo, $direccion, $username, $password, $nivel_acceso);
    }
}
?>