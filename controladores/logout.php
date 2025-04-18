<?php

// Iniciar o reanudar la sesión
session_start();

// Limpiar todas las variables de sesión
$_SESSION = array();

// Expirar la cookie de sesión en el navegador
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, // Tiempo en el pasado
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_unset(); // Elimina todas las variables de sesión
// Destruye la sesión en el servidor
session_destroy();

// Añade cabeceras anti-caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false); // Compatibilidad con navegadores antiguos
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT"); // Fecha en el pasado

// Redirigir a la página de inicio (o login)
$baseUrl = '/check.inc';
header('Location: ../vistas/loging.php'); // Cambia la URL según tu estructura de carpetas
exit; // Detener ejecución
?>