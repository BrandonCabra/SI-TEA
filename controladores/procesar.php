<?php
require_once '../freddy/conexion.php'; // Clase para conectar a la base de datos
require_once "../modelos/usuario.php";   // Clases adicionales necesarias

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar los datos enviados desde el formulario
    $PRIMER_NOMBRE = $_POST['PRIMER_NOMBRE'] ?? null;
    $PRIMER_APELLIDO = $_POST['PRIMER_APELLIDO'] ?? null;
    $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO = $_POST['TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO'] ?? null;
    $ROL_ID_ROL = $_POST['ROL_ID_ROL'] ?? null;
    $NUMERO_DOCUMENTO = $_POST['NUMERO_DOCUMENTO'] ?? null;
    $PASSWORD = $_POST['PASSWORD'] ?? null;

    //variables opcionales
    $CORREO_USUARIO = $_POST['CORREO_USUARIO'] ?? null;
    $DIRECCION_USUARIO = $_POST['DIRECCION_USUARIO'] ?? null;
    $CODIGO_MATERIA = $_POST['CODIGO_MATERIA'] ?? null;
    $CODIGO_GRADO = $_POST['CODIGO_GRADO'] ?? null;
    $TELEFONO_USUARIO = $_POST['TELEFONO_USUARIO'] ?? null;
    $CORREO_INSTITUCIONAL = $_POST['CORREO_INSTITUCIONAL'] ?? null;
    $numero_documento_padre = $_POST['numero_documento_padre'] ?? null;



    // Verificar que los campos obligatorios están presentes
    if (!$PRIMER_NOMBRE || !$PRIMER_APELLIDO || !$TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO || !$ROL_ID_ROL || !$NUMERO_DOCUMENTO || !$PASSWORD) {
        echo "Error: Todos los campos obligatorios deben estar llenos.";
        exit();
    }
    
    $usuario = UsuarioFactory::crearUsuario(
        $PRIMER_NOMBRE,
        $PRIMER_APELLIDO,
        $NUMERO_DOCUMENTO,
        $PASSWORD,
        $CORREO_USUARIO,
        $DIRECCION_USUARIO,
        $ROL_ID_ROL,
        $CODIGO_MATERIA,
        $CODIGO_GRADO,
        $TELEFONO_USUARIO,
        $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO,
        $CORREO_INSTITUCIONAL,
        $numero_documento_padre
        
    );

    // Validar el objeto usuario
    $validacionNUMERO_DOCUMENTO = $usuario->validarNUMERO_DOCUMENTO();
    $validacionPASSWORD = $usuario->validarPASSWORD();

    try {
        
        if ($validacionNUMERO_DOCUMENTO === true && $validacionPASSWORD === true){
            $conexion = Conexion1::conectar();
            
            //VALIDAR QUE EL USUARIO NO EXISTA EN LA BASE DE DATOS
            $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE NUMERO_DOCUMENTO = ?");
            $stmt->execute([$NUMERO_DOCUMENTO]);
            $usuarioExistente = $stmt->fetch();

            if ($usuarioExistente) {
                echo "Error: El usuario ya existe con el número de documento proporcionado.";
                exit();
            }
            
            
            
            $stmt = $conexion->prepare("INSERT INTO usuarios 
            (PRIMER_NOMBRE, PRIMER_APELLIDO, TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, ROL_ID_ROL, NUMERO_DOCUMENTO, PASSWORD) 
            VALUES (?, ?, ?, ?, ?, ?)");
            // Ejecutar la consulta con los valores protegidos
            $stmt->execute([
            $PRIMER_NOMBRE,
            $PRIMER_APELLIDO,
            $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO,
            $ROL_ID_ROL,
            $NUMERO_DOCUMENTO,
            PASSWORD_hash($PASSWORD, PASSWORD_BCRYPT) // Encriptar la contraseña
            ]);
            
            // Mostrar el mensaje de éxito antes de la redirección
            echo "<h3>Usuario creado exitosamente</h3>";
            echo "<p>Serás redirigido a la página de inicio de sesión en breve...</p>";

            // Usar header para redirigir después de 3 segundos
            header("Refresh:3; url= ../vistas/loging.php"); // Cambia la URL según tu estructura de carpetas
            exit();
        
        } else {
        echo $validacionNUMERO_DOCUMENTO !== true ? $validacionNUMERO_DOCUMENTO : $validacionPASSWORD;
        }

        

    } catch (Exception $e) {
        // Manejo de errores en la base de datos
        echo "<h3>Error en la base de datos:</h3>";
        echo "<p>" . $e->getMessage() . "</p>";
    }
}

?> 