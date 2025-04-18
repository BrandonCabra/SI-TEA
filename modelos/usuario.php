<?php
// Clase abstracta base para los usuarios
abstract class UsuarioAbstracto
{
    protected $PRIMER_NOMBRE;
    protected $PRIMER_APELLIDO;
    protected $NUMERO_DOCUMENTO;
    protected $PASSWORD;

    public function __construct($PRIMER_NOMBRE, $PRIMER_APELLIDO, $NUMERO_DOCUMENTO,$PASSWORD)
    {
        $this->PRIMER_NOMBRE = $PRIMER_NOMBRE;
        $this->PRIMER_APELLIDO = $PRIMER_APELLIDO;
        $this->NUMERO_DOCUMENTO = $NUMERO_DOCUMENTO;
        $this->PASSWORD = $PASSWORD;
    }

    // Métodos abstractos para implementación en clases derivadas
   
    abstract public function validarNUMERO_DOCUMENTO();
    abstract public function validarPASSWORD();



    // Getters para los atributos protegidos
    public function getPRIMER_NOMBRE()
    {
        return $this->PRIMER_NOMBRE;
    }

    public function getPRIMER_APELLIDO()
    {
        return $this->PRIMER_APELLIDO;
    }
    public function getNUMERO_DOCUMENTO()
    {
        return $this->NUMERO_DOCUMENTO;
    }
    public function getPASSWORD()
    {
        return $this->PASSWORD;
    }
    // Setters para los atributos protegidos
    public function setPRIMER_NOMBRE($PRIMER_NOMBRE)
    {
        $this->PRIMER_NOMBRE = $PRIMER_NOMBRE;
    }
    public function setPRIMER_APELLIDO($PRIMER_APELLIDO)
    {
        $this->PRIMER_APELLIDO = $PRIMER_APELLIDO;
    }
    public function setNUMERO_DOCUMENTO($NUMERO_DOCUMENTO)
    {
        $this->NUMERO_DOCUMENTO = $NUMERO_DOCUMENTO;
    }
    public function setPASSWORD($PASSWORD)
    {
        $this->PASSWORD = $PASSWORD;
    }

}

// Clase Padre que hereda de UsuarioAbstracto
class Padre extends UsuarioAbstracto
{
    private $CORREO_USUARIO;
    private $DIRECCION_USUARIO;
    private $ROL_ID_ROL;
    private $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;
    private $NUMERO_DOCUMENTO_ESTUDIANTE;

    public function __construct($PRIMER_NOMBRE, $PRIMER_APELLIDO, $NUMERO_DOCUMENTO, $PASSWORD, $CORREO_USUARIO, $DIRECCION_USUARIO, $ROL_ID_ROL, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, $NUMERO_DOCUMENTO_ESTUDIANTE)
    {
        parent::__construct($PRIMER_NOMBRE, $PRIMER_APELLIDO, $NUMERO_DOCUMENTO, $PASSWORD);
        $this->CORREO_USUARIO = $CORREO_USUARIO;
        $this->DIRECCION_USUARIO = $DIRECCION_USUARIO;
        $this->ROL_ID_ROL = $ROL_ID_ROL;
        $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO = $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;
        $this->NUMERO_DOCUMENTO_ESTUDIANTE = $NUMERO_DOCUMENTO_ESTUDIANTE;
    }
    
    // Métodos de validación
    

    public function validarNUMERO_DOCUMENTO()
    {
        // Validar el número de documento (ejemplo: longitud mínima de 5 caracteres)
        return strlen($this->NUMERO_DOCUMENTO) >= 5 ? true : "El número de documento debe tener al menos 5 caracteres.";
    }

    public function validarPASSWORD()
    {
        if (strlen($this->PASSWORD) < 8) {
            return "La contraseña debe tener al menos 8 caracteres.";
        }

        if (!preg_match('/[a-z]/', $this->PASSWORD) || !preg_match('/[A-Z]/', $this->PASSWORD)) {
            return "La contraseña debe incluir mayúsculas y minúsculas.";
        }

        if (!preg_match('/[\W_]/', $this->PASSWORD)) {
            return "La contraseña debe incluir al menos un carácter especial.";
        }

        return true;
    }

    // Getters para atributos privados
    public function getCORREO_USUARIO()
    {
        return $this->CORREO_USUARIO;
    }

    public function getDIRECCION_USUARIO()
    {
        return $this->DIRECCION_USUARIO;
    }
    public function getROL_ID_ROL()
    {
        return $this->ROL_ID_ROL;
    }
    public function getTIPO_DOCUMENTO_ID_TIPO_DOCUMENTO()
    {
        return $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;
    }
    public function getNUMERO_DOCUMENTO_ESTUDIANTE()
    {
        return $this->NUMERO_DOCUMENTO_ESTUDIANTE;
    }
}

// Clases específicas para roles
class Estudiante extends UsuarioAbstracto
{
    private $CODIGO_GRADO;
    private $NUMERO_DOCUMENTO_ESTUDIANTE;
    private $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;
    private $ROL_ID_ROL;
    private $CORREO_INSTITUCIONAL;
    private $numero_documento_padre;


    public function __construct($PRIMER_NOMBRE, $PRIMER_APELLIDO, $NUMERO_DOCUMENTO, $PASSWORD, $CORREO_INSTITUCIONAL, $CODIGO_GRADO, $NUMERO_DOCUMENTO_ESTUDIANTE, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, $ROL_ID_ROL, $numero_documento_padre)
    {
        parent::__construct($PRIMER_NOMBRE, $PRIMER_APELLIDO, $NUMERO_DOCUMENTO, $PASSWORD);
        $this->CORREO_INSTITUCIONAL = $CORREO_INSTITUCIONAL;
        $this->CODIGO_GRADO = $CODIGO_GRADO;
        $this->NUMERO_DOCUMENTO_ESTUDIANTE = $NUMERO_DOCUMENTO_ESTUDIANTE;
        $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO = $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;
        $this->ROL_ID_ROL = $ROL_ID_ROL;
        $this->numero_documento_padre = $numero_documento_padre;
    }

    // Métodos de validación
    
    public function validarNUMERO_DOCUMENTO()
    {
        // Validar el número de documento (ejemplo: longitud mínima de 5 caracteres)
        return strlen($this->NUMERO_DOCUMENTO) >= 5 ? true : "El número de documento debe tener al menos 5 caracteres.";
    }
    public function validarPASSWORD()
    {
        if (strlen($this->PASSWORD) < 8) {
            return "La contraseña debe tener al menos 8 caracteres.";
        }

        if (!preg_match('/[a-z]/', $this->PASSWORD) || !preg_match('/[A-Z]/', $this->PASSWORD)) {
            return "La contraseña debe incluir mayúsculas y minúsculas.";
        }

        if (!preg_match('/[\W_]/', $this->PASSWORD)) {
            return "La contraseña debe incluir al menos un carácter especial.";
        }

        return true;
    }
    // Getters para atributos privados
    public function getCORREO_INSTITUCIONAL()
    {
        return $this->CORREO_INSTITUCIONAL;
    }
    public function getNUMERO_DOCUMENTO_ESTUDIANTE()
    {
        return $this->NUMERO_DOCUMENTO_ESTUDIANTE;
    }
    public function getTIPO_DOCUMENTO_ID_TIPO_DOCUMENTO()
    {
        return $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;
    }
    public function getROL_ID_ROL()
    {
        return $this->ROL_ID_ROL;
    }
    public function getNUMERO_DOCUMENTO_PADRE()
    {
        return $this->numero_documento_padre;
    }

    public function getCODIGO_GRADO()
    {
        return $this->CODIGO_GRADO;
    }
}

class Profesor extends UsuarioAbstracto
{
    private $CODIGO_MATERIA;
    private $ROL_ID_ROL;
    private $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;


    public function __construct($PRIMER_NOMBRE, $PRIMER_APELLIDO, $NUMERO_DOCUMENTO, $PASSWORD, $CODIGO_MATERIA, $ROL_ID_ROL, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO)
    {
        parent::__construct($PRIMER_NOMBRE, $PRIMER_APELLIDO, $NUMERO_DOCUMENTO, $PASSWORD);
        $this->CODIGO_MATERIA = $CODIGO_MATERIA;
        $this->ROL_ID_ROL = $ROL_ID_ROL;
        $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO = $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;
    }

    public function getCODIGO_MATERIA()
    {
        return $this->CODIGO_MATERIA;
    }
    public function getROL_ID_ROL()
    {
        return $this->ROL_ID_ROL;
    }
    public function getTIPO_DOCUMENTO_ID_TIPO_DOCUMENTO()
    {
        return $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;
    }

    // Métodos de validación
        public function validarNUMERO_DOCUMENTO()
    {
        // Validar el número de documento (ejemplo: longitud mínima de 5 caracteres)
        return strlen($this->NUMERO_DOCUMENTO) >= 5 ? true : "El número de documento debe tener al menos 5 caracteres.";
    }
    public function validarPASSWORD()
    {
        if (strlen($this->PASSWORD) < 8) {
            return "La contraseña debe tener al menos 8 caracteres.";
        }

        if (!preg_match('/[a-z]/', $this->PASSWORD) || !preg_match('/[A-Z]/', $this->PASSWORD)) {
            return "La contraseña debe incluir mayúsculas y minúsculas.";
        }

        if (!preg_match('/[\W_]/', $this->PASSWORD)) {
            return "La contraseña debe incluir al menos un carácter especial.";
        }

        return true;
    }
}

class Psicoorientador extends UsuarioAbstracto
{
    private $TELEFONO_USUARIO;
    private $CORREO_INSTITUCIONAL;
    private $ROL_ID_ROL;
    private $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;

    public function __construct($PRIMER_NOMBRE, $PRIMER_APELLIDO, $NUMERO_DOCUMENTO, $PASSWORD, $TELEFONO_USUARIO, $CORREO_INSTITUCIONAL, $ROL_ID_ROL, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO)
    {
        parent::__construct($PRIMER_NOMBRE, $PRIMER_APELLIDO, $NUMERO_DOCUMENTO, $PASSWORD);
        $this->TELEFONO_USUARIO = $TELEFONO_USUARIO;
        $this->CORREO_INSTITUCIONAL = $CORREO_INSTITUCIONAL;
        $this->ROL_ID_ROL = $ROL_ID_ROL;
        $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO = $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;
    }
    public function validarNUMERO_DOCUMENTO()
    {
        // Validar el número de documento (ejemplo: longitud mínima de 5 caracteres)
        return strlen($this->NUMERO_DOCUMENTO) >= 5 ? true : "El número de documento debe tener al menos 5 caracteres.";
    }

    public function validarPASSWORD()
    {
        if (strlen($this->PASSWORD) < 8) {
            return "La contraseña debe tener al menos 8 caracteres.";
        }

        if (!preg_match('/[a-z]/', $this->PASSWORD) || !preg_match('/[A-Z]/', $this->PASSWORD)) {
            return "La contraseña debe incluir mayúsculas y minúsculas.";
        }

        if (!preg_match('/[\W_]/', $this->PASSWORD)) {
            return "La contraseña debe incluir al menos un carácter especial.";
        }

        return true;
    }
    public function getTELEFONO_USUARIO()
    {
        return $this->TELEFONO_USUARIO;
    }
    public function getCORREO_INSTITUCIONAL()
    {
        return $this->CORREO_INSTITUCIONAL;
    }
    public function getROL_ID_ROL()
    {
        return $this->ROL_ID_ROL;
    }
    public function getTIPO_DOCUMENTO_ID_TIPO_DOCUMENTO()
    {
        return $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;
    }

}

class Administrador extends UsuarioAbstracto
{
    private $TELEFONO_USUARIO;
    private $ROL_ID_ROL;
    private $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;

    public function __construct($PRIMER_NOMBRE, $PRIMER_APELLIDO, $NUMERO_DOCUMENTO, $PASSWORD, $TELEFONO_USUARIO, $ROL_ID_ROL, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO)
    {
        parent::__construct($PRIMER_NOMBRE, $PRIMER_APELLIDO, $NUMERO_DOCUMENTO, $PASSWORD);
        $this->TELEFONO_USUARIO = $TELEFONO_USUARIO;
        $this->ROL_ID_ROL = $ROL_ID_ROL;
        $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO = $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;
    }

    public function validarNUMERO_DOCUMENTO()
    {
        // Validar el número de documento (ejemplo: longitud mínima de 5 caracteres)
        return strlen($this->NUMERO_DOCUMENTO) >= 5 ? true : "El número de documento debe tener al menos 5 caracteres.";
    }
    public function validarPASSWORD()
    {
        if (strlen($this->PASSWORD) < 8) {
            return "La contraseña debe tener al menos 8 caracteres.";
        }

        if (!preg_match('/[a-z]/', $this->PASSWORD) || !preg_match('/[A-Z]/', $this->PASSWORD)) {
            return "La contraseña debe incluir mayúsculas y minúsculas.";
        }

        if (!preg_match('/[\W_]/', $this->PASSWORD)) {
            return "La contraseña debe incluir al menos un carácter especial.";
        }

        return true;
    }
    public function getTELEFONO_USUARIO()
    {
        return $this->TELEFONO_USUARIO;
    }
    public function getROL_ID_ROL()
    {
        return $this->ROL_ID_ROL;
    }
    public function getTIPO_DOCUMENTO_ID_TIPO_DOCUMENTO()
    {
        return $this->TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO;
    }


}

// Clase UsuarioFactory para instanciar usuarios
class UsuarioFactory
{
    public static function crearUsuario($PRIMER_NOMBRE, $PRIMER_APELLIDO, $NUMERO_DOCUMENTO, $PASSWORD, $CORREO_USUARIO = null, $DIRECCION_USUARIO = null, $ROL_ID_ROL,$CODIGO_MATERIA = null, $CODIGO_GRADO = null, $TELEFONO_USUARIO = null, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, $CORREO_INSTITUCIONAL = null, $numero_documento_padre = null)
    {
     // Validar parámetros básicos
        if (empty($PRIMER_NOMBRE) || empty($PRIMER_APELLIDO) || empty($NUMERO_DOCUMENTO) || empty($PASSWORD)) {
            throw new Exception("Los parámetros básicos son obligatorios para crear un usuario.");
        }
        // Crear usuario según rol

        switch ($ROL_ID_ROL) {
            case 3: //padre
                return new Padre($PRIMER_NOMBRE, $PRIMER_APELLIDO, $NUMERO_DOCUMENTO, $PASSWORD, $CORREO_USUARIO, $DIRECCION_USUARIO, $ROL_ID_ROL, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, $numero_documento_padre);
             case 4:
                return new Estudiante($PRIMER_NOMBRE, $PRIMER_APELLIDO, $NUMERO_DOCUMENTO, $PASSWORD, $CORREO_INSTITUCIONAL, $CODIGO_GRADO, $NUMERO_DOCUMENTO, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, $ROL_ID_ROL, $numero_documento_padre);
            case 1: //profesor
                return new Profesor($PRIMER_NOMBRE, $PRIMER_APELLIDO, $NUMERO_DOCUMENTO, $PASSWORD, $CODIGO_MATERIA, $ROL_ID_ROL, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO);
            case 2: //psicoorientador
                return new Psicoorientador($PRIMER_NOMBRE, $PRIMER_APELLIDO, $NUMERO_DOCUMENTO, $PASSWORD, $TELEFONO_USUARIO, $CORREO_INSTITUCIONAL, $ROL_ID_ROL, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO);
             case 5: //administrador
                return new Administrador($PRIMER_NOMBRE, $PRIMER_APELLIDO, $NUMERO_DOCUMENTO, $PASSWORD, $TELEFONO_USUARIO, $ROL_ID_ROL, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO);
             default:
                throw new Exception("Rol no válido: $ROL_ID_ROL");
        
        }
      
    }
}

?>