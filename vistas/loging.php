<?php
require_once '../freddy/conexion.php';
require_once '../modelos/usuario.php';
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); // evitar cacheo
header("Cache-Control: post-check=0, pre-check=0", false); // evitar cacheo
header("Pragma: no-cache"); //


session_start(); // Iniciar sesión para guardar datos del usuario
var_dump($_POST);


// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO = $_POST['TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO'] ?? null;
    $NUMERO_DOCUMENTO = $_POST['NUMERO_DOCUMENTO'] ?? null;
    $PASSWORD = $_POST['PASSWORD'] ?? null;

    // Validar que los campos no estén vacíos
    if (empty($NUMERO_DOCUMENTO) || empty($PASSWORD)) {
        die("Los campos Número de Documento y Contraseña son obligatorios.");
    }
    if (!ctype_digit($NUMERO_DOCUMENTO)) {
        die("El número de documento debe contener solo dígitos.");
    }


    try{
        $conexion = Conexion1::conectar();
        // Buscar el usuario en la base de datos por el numero de documento
        $sql = "SELECT * FROM usuarios WHERE NUMERO_DOCUMENTO = ? AND TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$NUMERO_DOCUMENTO, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        // Verificar si el usuario existe

        if ($usuario) {    
            // Verificar la contraseña
            if (password_verify($PASSWORD, $usuario['PASSWORD'])) {
                // Iniciar sesión y redirigir al usuario
                $_SESSION['PRIMER_NOMBRE'] = $usuario['PRIMER_NOMBRE'];
                $_SESSION['PRIMER_APELLIDO'] = $usuario['PRIMER_APELLIDO'];
                $_SESSION['TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO'] = $usuario['TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO'];
                $_SESSION['NUMERO_DOCUMENTO'] = $usuario['NUMERO_DOCUMENTO'];
                $_SESSION['ROL_ID_ROL'] = $usuario['ROL_ID_ROL'];

                session_regenerate_id(true);


                
                //redireccionar segun rol
                // Redirigir según rol
                switch ($_SESSION['ROL_ID_ROL']) {
                    case 4:
                        header('Location: ../vistas/moduloPadre.php');
                    break;
                    case 1: // profesor
                        header('Location: ../vistas/moduloProfesor.php');
                    break;
                    case 2: //psicoorientador
                        header('Location: ../vistas/Modulos.php');
                    break;
                    case 5: // administrador
                        header('Location: ../vistas/moduloAdministrador.php');
                    break;
                    default:
                        header('Location: ../vistas/moduloEstudiante.php');
                    break;
                }
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "El número de identificación no existe.";
        }
    } catch (Exception $e) {
    echo "Error de conexión: " . $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - SITEA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="iniciodesesion2.css">
    <link rel="icon" type="image/svg+xml" href="IMAGENES/iconsitea.svg">
</head>
<body> class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="IMAGENES/logositeasf 3.png" alt="logo" class="header-logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="../index2.html">Inicio</a></li> 
                        <li class="nav-item"><a class="nav-link" href="sobrenosotros2.html">Acerca de SI TEA</a></li>
                        <li class="nav-item"><a class="nav-link" href="servicios2.html">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link" href="manuales2.html">Manuales</a></li>
                        <li class="nav-item"><a class="nav-link" href="equipo2.html">Equipo</a></li>
                        <li class="nav-item"><a class="nav-link" href="contacto2.html">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link boton" href="iniciodesesion2.html">Ingresar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-4 text-center">
            <h1>Inicio de Sesión</h1>
        </div>
    </header>
    <main class="container mt-4 d-flex align-items-center justify-content-center flex-grow-1">
        <div class="row w-100">
            <div class="col-md-6">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="../vistas/IMAGENES/FONDO8.PNG" alt="Imagen de Inicio de Sesión" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4 shadow-sm">
                    <div class="text-center">
                        <img src="IMAGENES/logositeasf 3.png" class="img-reducida">
                    </div>
                    <form method="post">
                    <div class="mb-3">
                            <label for="TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO" class="form-label">Tipo de Documento</label>
                            <select id="TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO" name="TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO" class="form-select" required>
                                <option selected>Seleccione...</option>
                                <option value="1">Cédula de Ciudadanía</option>
                                <option value="2">Cédula de Extranjería</option>
                                <option value="3">Pasaporte</option>
                                <option value="4">Tarjeta de Identidad</option>
                                <option value="5">Registro Civil de Nacimiento</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="NUMERO_DOCUMENTO" class="form-label">Número de identificación:</label>
                            <input type="number" class="form-control" id="NUMERO_DOCUMENTO" name="NUMERO_DOCUMENTO" required placeholder="0123456789">
                        </div>
                        
                        <div class="mb-3">
                            <label for="PASSWORD" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="PASSWORD" name="PASSWORD" placeholder="Ingrese su contraseña" required>
                        </div>

                        <button type="submit" class="btn boton w-100">Ingresar</button>
                        <div class="d-flex flex-column align-items-center mt-3">
                            <a href="registrarse2.html" class="link-primary">Regístrate</a>
                            <a href="cambiarcontraseña2.html" class="link-primary mb-2">¿Olvidaste tu contraseña?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="container text-center mt-4 py-4 bg-light rounded">
        <div>
            <p>Todos los derechos reservados. Ninguna reproducción externa copia o transmisión digital de esta publicación puede ser hecha sin permiso escrito. Ningún párrafo de esta publicación puede ser reproducido, copiado o transmitido digitalmente sin un consentimiento escrito o de acuerdo con las leyes que regulan los derechos de autor y con base en la regulación vigente.</p>
        </div>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">&copy; 2024 SITEA. Todos los derechos reservados.</a></li>
                <li class="breadcrumb-item"><a href="#">Politica de Privacidad</a></li>
                <li class="breadcrumb-item"><a href="#">Terminos de servicio</a></li>
                <li class="breadcrumb-item"><a href="#">Configuración de Cookies</a></li>
            </ul>
        </nav>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="iniciodesesion2.js"></script>
</body>
</html>