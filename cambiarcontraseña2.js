document.getElementById("recuperarContrasenaForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevenir la recarga de la página

  // Obtener los valores del formulario
  const correoElectronico = document.getElementById("correoElectronico").value;
  const nuevaContrasena = document.getElementById("nuevaContrasena").value;
  const confirmarContrasena = document.getElementById("confirmarContrasena").value;

  // Validar que las contraseñas coincidan
  if (nuevaContrasena !== confirmarContrasena) {
      alert("Las contraseñas no coinciden. Por favor, inténtelo de nuevo.");
      return;
  }

  // Simulación de almacenamiento de contraseña nueva (esto se debe manejar en el servidor en una aplicación real)
  // Aquí solo se muestra un mensaje de éxito
  alert("Contraseña reestablecida exitosamente.");

  // Limpiar el formulario
  document.getElementById("recuperarContrasenaForm").reset();
});