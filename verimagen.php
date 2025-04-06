<?php
require 'freddy/conexion.php';

$conexion = Conexion1::conectar();
$idEstudiante = $_GET['ID_ESTUDIANTE']; // Pasar el ID como parámetro

$sql = "SELECT FOTOGRAFIA_ESTUDIANTE FROM estudiante WHERE ID_ESTUDIANTE = ?";
$stmt = $conexion->prepare($sql);
$stmt->execute([$idEstudiante]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    header("Content-Type: image/jpeg"); // Cambia esto si la imagen es PNG (image/png)
    echo $row['FOTOGRAFIA_ESTUDIANTE']; // Muestra la imagen binaria
} else {
    echo "No se encontró la imagen.";
}

//http://localhost/ProyectoSITEA/SI-TEA/verimagen.php?ID_ESTUDIANTE=1

?>