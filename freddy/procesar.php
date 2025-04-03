<?php
require_once 'conexion.php';
require_once 'clases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar datos enviados desde el formulario
    $primer_nombre = $_POST['primer_nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $numero_documento = $_POST['numero_documento'];
    $telefono_usuario = $_POST['telefono_usuario'];
    $direccion_usuario = $_POST['direccion_usuario'];
    $correo_institucional = $_POST['correo_institucional'];
    $password = $_POST['password'];

    // Crear un usuario utilizando la clase UsuarioFactory (opcional si es necesaria)
    $usuario = UsuarioFactory::crearUsuario(
        $primer_nombre,
        $primer_apellido,
        $numero_documento,
        $telefono_usuario,
        $direccion_usuario,
        $correo_institucional,
        $password
    );

    // Validar los datos del usuario (implementación opcional)
    $validacionUsuario = $usuario->validarUsuario();
    $validacionPassword = $usuario->validarPassword();

    // Solo continuar si las validaciones son exitosas
    if ($validacionUsuario === true && $validacionPassword === true) {
        try {
            // Establecer conexión con la base de datos
            $conexion = Conexion1::conectar();

            // Consulta preparada para insertar los datos en la tabla 'usuario'
            $stmt = $conexion->prepare("
                INSERT INTO usuario 
                (PRIMER_NOMBRE, PRIMER_APELLIDO, NUMERO_DOCUMENTO, TELEFONO_USUARIO, DIRECCION_USUARIO, CORREO_INSTITUCIONAL, PASSWORD) 
                VALUES (?, ?, ?, ?, ?, ?, ?)
            ");

            // Ejecutar la consulta con los valores protegidos
            $stmt->execute([
                $primer_nombre,
                $primer_apellido,
                $numero_documento,
                $telefono_usuario,
                $direccion_usuario,
                $correo_institucional,
                password_hash($password, PASSWORD_BCRYPT) // Encriptar la contraseña
            ]);

            echo "¡Usuario registrado exitosamente!";
        } catch (PDOException $e) {
            // Capturar y mostrar errores de la base de datos
            echo "Error: " . $e->getMessage();
        }
    } else {
        // Mostrar errores de validación si fallan
        echo $validacionUsuario !== true ? $validacionUsuario : $validacionPassword;
    }
}
?>