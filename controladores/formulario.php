<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrarse</title>
  <link rel="stylesheet" href="estilo.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container-fluid">
    <header>
      <hr>
      <div class="header-container">
        <img src="IMAGENES/logositeasf 3.png" alt="logo" class="header-logo">
        <nav>
          <ul>
            <li><a href="INDEX.html">Inicio</a></li>
            <li><a href="Sobre_Nosotros.html">Acerca de SI TEA</a></li>
            <li><a href="Servicios.html">Servicios</a></li>
            <li><a href="Manuales.html">Manuales</a></li>
            <li><a href="Equipo.html">Equipo</a></li>
            <li><a href="Contacto.html">Contacto</a></li>
            <li><a href="Inicio_Sesion.html" class="boton">Ingresar</a></li>
          </ul>
        </nav>
      </div>
      <hr>
    </header>
    <main>
      <div class="imagen-container"></div>
      <div class="login-container">
        <form class="row g-1 login-form1" action="controladores/procesar.php" method="POST">
          <h2>Regístrate</h2>
          <div class="col-12">
            <label for="PRIMER_NOMBRE">Nombres:</label>
            <input type="text" id="PRIMER_NOMBRE" name="PRIMER_NOMBRE" class="form-control" required>
          </div>
          <div class="col-12">
            <label for="PRIMER_APELLIDO">Apellidos:</label>
            <input type="text" id="PRIMER_APELLIDO" name="PRIMER_APELLIDO" class="form-control" required>
          </div>
          <div class="col-12">
            <label for="NUMERO_DOCUMENTO">Número de Documento:</label>
            <input type="text" id="NUMERO_DOCUMENTO" name="NUMERO_DOCUMENTO" class="form-control" required>
          </div>
          <div class="col-12">
            <label for="TELEFONO_USUARIO">Teléfono:</label>
            <input type="tel" id="TELEFONO_USUARIO" name="TELEFONO_USUARIO" class="form-control" required>
          </div>
          <div class="col-12">
            <label for="DIRECCION_USUARIO">Dirección:</label>
            <input type="text" id="DIRECCION_USUARIO" name="DIRECCION_USUARIO" class="form-control" required>
          </div>
          <div class="col-12">
            <label for="CORREO_INSTITUCIONAL">Correo Institucional:</label>
            <input type="email" id="correo_institucional" name="correo_institucional" class="form-control" required>
          </div>
          <div class="col-12">
            <label for="PASSWORD">Contraseña:</label>
            <input type="PASSWORD" id="PASSWORD" name="PASSWORD" class="form-control" required>
          </div>
          <div class="col-12">
            <label for="rol">Rol:</label>
            <select id="rol" name="ROL_ID_ROL" class="form-select" required>
              <option value="5">Estudiante</option>
              <option value="1">Profesor</option>
              <option value="2">Psicoorientador</option>
              <option value="4">Administrador</option>
              <option value="3">Padre familia</option>
            </select>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Registrar</button>
          </div>
        </form>
      </div>
    </main>
    <hr>
    <footer class="container">
      <div class="col-12">
        <p>Todos los derechos reservados. Ninguna reproducción externa copia o transmisión digital de esta publicación
          puede ser hecha sin permiso escrito. Ningún párrafo de esta publicación puede ser reproducido, copiado o
          transmitido digitalmente sin un consentimiento escrito o de acuerdo con las leyes que regulan los derechos de
          autor y con base en la regulación vigente.</p>
        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">@ 2024 SITEA. Todos los derechos reservados.</a></li>
            <li class="breadcrumb-item"><a href="#">Política de Privacidad</a></li>
            <li class="breadcrumb-item"><a href="#">Términos de servicio</a></li>
            <li class="breadcrumb-item"><a href="#">Configuración de Cookies</a></li>
          </ol>
        </nav>
      </div>
    </footer>
  </div>
</body>

</html>