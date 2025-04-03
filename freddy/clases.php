<?php
abstract class UsuarioAbstracto
{
    protected $primer_nombre; // Cambiado para coincidir con el formulario
    protected $username;
    protected $password;

    public function __construct($primer_nombre, $username, $password)
    {
        $this->primer_nombre = $primer_nombre; // Ajuste en el nombre de variable
        $this->username = $username;
        $this->password = $password;
    }

    abstract public function validarUsuario();
    abstract public function validarPassword();
}

class Usuario extends UsuarioAbstracto
{
    private $correo;
    private $direccion;
    private $numero_documento; // Nuevo atributo
    private $telefono_usuario; // Nuevo atributo

    public function __construct($primer_nombre, $correo, $direccion, $numero_documento, $telefono_usuario, $username, $password)
    {
        parent::__construct($primer_nombre, $username, $password);
        $this->correo = $correo;
        $this->direccion = $direccion;
        $this->numero_documento = $numero_documento; // Nuevo atributo
        $this->telefono_usuario = $telefono_usuario; // Nuevo atributo
    }

    public function validarUsuario()
    {
        return strlen($this->username) >= 5 ? true : "El nombre de usuario debe tener al menos 5 caracteres.";
    }

    public function validarPassword()
    {
        // Validar la longitud mínima de la contraseña
        if (strlen($this->password) < 8) {
            return "La contraseña debe tener al menos 8 caracteres.";
        }

        // Validar la presencia de letras minúsculas y mayúsculas
        if (!preg_match('/[a-z]/', $this->password) || !preg_match('/[A-Z]/', $this->password)) {
            return "La contraseña debe incluir mayúsculas y minúsculas.";
        }

        // Validar la presencia de al menos un carácter especial
        if (!preg_match('/[\W_]/', $this->password)) {
            return "La contraseña debe incluir al menos un carácter especial (ej. !, @, #, $, etc.).";
        }

        // Si pasa todas las validaciones, retorna true
        return true;
    }
}

class UsuarioFactory
{
    public static function crearUsuario($primer_nombre, $correo, $direccion, $numero_documento, $telefono_usuario, $username, $password)
    {
        return new Usuario($primer_nombre, $correo, $direccion, $numero_documento, $telefono_usuario, $username, $password);
    }
}
