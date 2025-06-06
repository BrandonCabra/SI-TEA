<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

session_start();
//var_dump($_SESSION); // Muestra todas las variables de sesión
// Verificar la sesión
if (!isset($_SESSION['NUMERO_DOCUMENTO']) || !isset($_SESSION['ROL_ID_ROL'])) {
    ob_start();
    echo "Sesión no establecida. Redirigiendo a la página de inicio de sesión...";
    header("Location: ../vistas/iniciodesesion2.html");
    ob_end_flush();
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulos</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="icon" type="image/svg+xml" href="imagenes/iconsitea.svg">
</head>

<body>
    <header>
        <hr>
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">
                    <div class="col-12 col-md-10">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <img src="IMAGENES/logositeasf 3.png" alt="logo" class="header-logo">
                            <div class="d-flex align-items-center flex-grow-1">
                                <nav class="navbar bg-body-tertiary me-auto">
                                    <div class="container-fluid">
                                        <form class="d-flex" role="search">
                                            <input class="form-control me-2 w-100" type="search" placeholder="Buscar..."
                                                aria-label="Search">
                                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                                        </form>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-1 d-flex flex-column align-items-center justify-content-center mt-3 mt-md-0">
                    <div>
                        <img src="IMAGENES/Perfil.png.png" alt="Perfil" class="img-fluid mb-2" style="width: 62px;">
                    </div>
                </div>
                <div class="col-12 col-md-1 d-flex flex-column align-items-center text-primary justify-content-center mt-3 mt-md-0">
                    <div>
                        <p>Usuario 1 Psicoorientador</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="m-lg-1 bg-primary text-white p-5 rounded-3">
                    <div class="list-group">
                        <img src="IMAGENES/Perfil.png.png" alt="Perfil" class="img-fluid w-50 mb-3 d-block mx-auto">
                        <span class="text-center bg-primary text-white">Nombre</span>
                        <span class="text-center bg-primary text-white">correo@correo.com</span>
                        <div class="mt-lg-3"></div>
                        <a href="Dashboard.html" class="list-group-item list-group-item-action bg-primary text-white">
                            <img src="IMAGENES/dash.png" alt="Dashboard" class="img-fluid me-2"
                                style="width: 20px; height: auto;"> Dashboard </a>
                        <a href="Dashboard.html" class="list-group-item list-group-item-action bg-primary text-white">
                            <img src="IMAGENES/ajustes.png" alt="" class="img-fluid me-2"
                                style="width: 20px; height: auto;">Ajustes</a>
                        <a href="#" class="list-group-item list-group-item-action bg-primary text-white"> <img
                                src="IMAGENES/mensajes.png" alt="" class="img-fluid me-2"
                                style="width: 20px; height: auto;">Mensajes</a>
                        <a href="#" class="list-group-item list-group-item-action bg-primary text-white"> <img
                                src="IMAGENES/calendario.png" alt="" class="img-fluid me-2"
                                style="width: 20px; height: auto;">Calendario</a>
                        <a href="#" class="list-group-item list-group-item-action bg-primary text-white"> <img
                                src="IMAGENES/perfil.png" alt="" class="img-fluid me-2"
                                style="width: 20px; height: auto;">Perfil</a>
                        <a href="Modulos.html" class="list-group-item list-group-item-action bg-primary text-white">
                            <img src="IMAGENES/modulos.png" alt="" class="img-fluid me-2"
                                style="width: 20px; height: auto;">Módulos</a>
                        <a href="#" class="list-group-item list-group-item-action bg-primary text-white"> <img
                                src="IMAGENES/informes.png" alt="" class="img-fluid me-2"
                                style="width: 20px; height: auto;">Informes</a>
                        <a href="#" class="list-group-item list-group-item-action bg-primary text-white"> <img
                                src="IMAGENES/gestion estudiantes.png" alt="Dashboard" class="img-fluid me-2"
                                style="width: 20px; height: auto;">Gestión estudiantes</a>
                        <a href="#" class="list-group-item list-group-item-action bg-primary text-white"> <img
                                src="IMAGENES/incidencias.png" alt="" class="img-fluid me-2"
                                style="width: 20px; height: auto;">Incidencia</a>
                        <a href="INDEX.html" class="list-group-item list-group-item-action bg-primary text-white"><img
                                src="IMAGENES/sitio.png" alt="" class="img-fluid me-2"
                                style="width: 20px; height: auto;">Sitio web</a>

                        <div class="mt-5">
                            <a href="Inicio_Sesion.html"
                                class="list-group-item list-group-item-action bg-primary text-white"><img
                                    src="IMAGENES/cerrar.png" alt="Dashboard" class="img-fluid me-2"
                                    style="width: 20px; height: auto;">Cerrar
                                Sesión</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card" style="width: 23rem; height: 412px">
                    <img src="IMAGENES/Caracterización.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Caracterización</h5>
                        <p class="card-text">En este módulo encontrara la caracterización pedagógica y social de los
                            EcTEA.</p>
                        <a href="Caracterizacion.html" class="btn btn-primary">Ir</a>
                    </div>
                </div>
                <br>
                <div class="card" style="width: 23rem; height: 412px">
                    <img src="IMAGENES/Protocolos.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Protocolos y Rutas de Atención</h5>
                        <p class="card-text">Módulo donde se encontrara los protocolos, rutas de atención y su gestión.
                        </p>
                        <a href="Protocolos.html" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card" style="width: 23rem; height: 412px">
                    <img src="IMAGENES/Estrategias.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Estrategias Educativas</h5>
                        <p class="card-text">Repositorio de estrategias educativas para estudiantes con Trastornos
                            especificos de Aprendizaje.</p>
                        <a href="Estrategias.html" class="btn btn-primary">Ir</a>
                    </div>
                </div>
                <br>
                <div class="card" style="width: 23rem; height: 412px">
                    <img src="IMAGENES/PIAR.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-primary">PIAR</h5>
                        <p class="card-text">Módulo de gestión, validación y visualización del Plan Individual de
                            Ajustes Razonables.</p>
                        <a href="PIAR.html" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card" style="width: 23rem; height: 412px">
                    <img src="IMAGENES/Gestion.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Gestión de estudiantes</h5>
                        <p class="card-text">Reportes e informes de Estudiantes registrados.</p>
                        <a href="GestionEstudiantes.html" class="btn btn-primary">Ir</a>
                    </div>
                </div>
                <br>
                <div class="card" style="width: 23rem; height: 412px">
                    <img src="IMAGENES/Reportes.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Reporte de Novedades</h5>
                        <p class="card-text">Reportes, gestión de novedades y preregistros de EcTEA.</p>
                        <a href="Novedades.html" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<div style="background-color: #F4F9FF;">
    <hr>
    <footer class="container-fluid">
        <div class="col-12">
            <DIV>
                <P>Todos los derechos reservados. Ninguna reproducción externa copia o transmisión digital de esta
                    publicación puede ser hecha sin permiso escrito. Ningún párrafo de esta publicación puede ser
                    reproducido, copiado o transmitido digitalmente sin un consentimiento escrito o de acuerdo con las
                    leyes que regulan los derechos de autor y con base en la regulación vigente.</P>
            </DIV>
            <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">@ 2024 SITEA. Todos los derechos reservados.</a></li>
                    <li class="breadcrumb-item"><a href="#">Politica de Privacidad</a></li>
                    <li class="breadcrumb-item"><a href="#">Terminos de servicio</a></li>
                    <li class="breadcrumb-item"><a href="#">Configuración de Cookies</a></li>
                </ol>
            </nav>
        </div>
    </footer>


</html>