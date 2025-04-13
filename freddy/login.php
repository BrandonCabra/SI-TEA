<?php
session_start(); // Iniciar sesión para guardar datos del usuario

// Configuración de conexión a la base de datos
$host = 'localhost';
$db = 'sitea4'; // Nombre de tu base de datos
$user = 'root'; // Usuario de la base de datos
$password = ''; // Contraseña de la base de datos

$conn = new mysqli($host, $user, $password, $db);

// Verificar si la conexión es exitosa
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Procesar los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero_identificacion = isset($_POST['validationDefault02']) ? trim($_POST['validationDefault02']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (!empty($numero_identificacion) && !empty($password)) {
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE numero_documento = ?");
        $stmt->bind_param("s", $numero_identificacion);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();

            // Usar la clave correcta en mayúsculas: 'PASSWORD'
            if (password_verify($password, $usuario['PASSWORD'])) {
                $_SESSION['usuario'] = $usuario['PRIMER_NOMBRE'];
                echo "¡Inicio de sesión exitoso! Bienvenido, " . $_SESSION['usuario'] . ".";
                header("Location: Modulos.html");
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "El número de identificación no existe.";
        }

        $stmt->close();
    } else {
        echo "Por favor, completa todos los campos.";
    }
}

$conn->close();
?>