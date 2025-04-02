document.getElementById("registroForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevenir la recarga de la página

    // Obtener los valores del formulario
    const nombres = document.getElementById("nombres").value;
    const apellidos = document.getElementById("apellidos").value;
    const tipoDocumento = document.getElementById("tipoDocumento").value;
    const numeroDocumento = document.getElementById("numeroDocumento").value;
    const colegio = document.getElementById("colegio").value;
    const cargo = document.getElementById("cargo").value;
    const contrasena = document.getElementById("contrasena").value;

    // Validar que el campo de número de documento solo contenga números
    if (!/^\d+$/.test(numeroDocumento)) {
        alert("El número de documento solo debe contener números.");
        return;
    }

    // Crear un objeto con los datos del registro
    const nuevoRegistro = {
        nombres: nombres,
        apellidos: apellidos,
        tipoDocumento: tipoDocumento,
        numeroDocumento: numeroDocumento,
        colegio: colegio,
        cargo: cargo,
        contrasena: contrasena
    };

    // Obtener registros guardados en el almacenamiento local
    const registros = JSON.parse(localStorage.getItem("registros")) || [];

    // Verificar si el registro ya existe
    const registroExistente = registros.find(registro => registro.numeroDocumento === numeroDocumento);
    if (registroExistente) {
        alert("El registro ya existe. Por favor, verifique la información ingresada.");
    } else {
        // Guardar el nuevo registro
        registros.push(nuevoRegistro);
        localStorage.setItem("registros", JSON.stringify(registros));
        alert("Registro exitoso");
        // Limpiar el formulario
        document.getElementById("registroForm").reset();
    }
});

document.getElementById("numeroDocumento").addEventListener("input", function(event) {
    this.value = this.value.replace(/\D/g, ''); // Eliminar cualquier carácter no numérico
});