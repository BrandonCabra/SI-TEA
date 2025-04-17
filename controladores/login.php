<?php
require_once '../freddy/conexion.php';
require_once '../modelos/usuario.php';
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); // evitar cacheo
header("Cache-Control: post-check=0, pre-check=0", false); // evitar cacheo
header("Pragma: no-cache"); //


session_start(); // Iniciar sesión para guardar datos del usuario



// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $NUMERO_DOCUMENTO = $_POST['NUMERO_DOCUMENTO'] ?? null;
    $password = $_POST['PASSWORD'] ?? null;
    // Validar que los campos no estén vacíos

    $conexion = Conexion1::conectar();

    // Buscar el usuario en la base de datos
    // Buscar el usuario por el numero de documento

    $sql = "SELECT * FROM usuarios WHERE NUMERO_DOCUMENTO = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$NUMERO_DOCUMENTO]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    // Verificar si el usuario existe

    if ($usuario) {
        // Verificar la contraseña
        if (password_verify($password, $usuario['PASSWORD'])) {
            // Iniciar sesión y redirigir al usuario
            $_SESSION['usuarios'] = $usuario['PRIMER_NOMBRE'];
            $_SESSION['NUMERO_DOCUMENTO'] = $usuario['NUMERO_DOCUMENTO'];
            $_SESSION['ID_ROL'] = $usuario['ID_ROL'];

            

            echo "¡Inicio de sesión exitoso! Bienvenido, " . $_SESSION['usuarios'] . ".";
            header('Location: ../vistas/Modulos.html');
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "El número de identificación no existe.";
    }
}


?>