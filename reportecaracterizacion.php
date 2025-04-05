<?php
// Incluir el archivo de conexión
require_once 'conexion.php';

try {
    // Conexión a la base de datos
    $conexion = Conexion1::conectar();

    echo "<h1>Reporte de total de caracterizaciones</h1>";

    //funcion para generar el reporte de caracterizacion

     function generarReporte($conexion, $codigo_caracterizacion, $valoracion_pedagogica, $diagnostico, $corresponsabilidad, $contexto_academico, $recomendaciones, $contexto_familiar, $contexto_escolar, $barreras_aprendizaje) {
        $sql = "SELECT codigo_caracterizacion, valoracion_pedagogica, diagnostico, corresponsabilidad, contexto_academico, recomendaciones, contexto_familiar, contexto_escolar, barreras_aprendizaje FROM caracterizaciones";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<h2>Caracterizaciones</h2>";
        if (!empty($resultados)) {
            echo "<table border='1' cellpadding='10'>
                    <tr>
                        <th>Codigo Caracterizacion</th>
                        <th>Valoracion Pedagogica</th>
                        <th>Diagnostico</th>
                        <th>Corresponsabilidad</th>
                        <th>Contexto Academico</th>
                        <th>Recomendaciones</th>
                        <th>Contexto Familiar</th>
                        <th>Contexto Escolar</th>
                        <th>Barreras Aprendizaje</th>
                    </tr>";
            foreach ($resultados as $fila) {
                echo "<tr>
                        <td>{$fila['codigo_caracterizacion']}</td>
                        <td>{$fila['valoracion_pedagogica']}</td>
                        <td>{$fila['diagnostico']}</td>
                        <td>{$fila['corresponsabilidad']}</td>
                        <td>{$fila['contexto_academico']}</td>
                        <td>{$fila['recomendaciones']}</td>
                        <td>{$fila['contexto_familiar']}</td>
                        <td>{$fila['contexto_escolar']}</td>
                        <td>{$fila['barreras_aprendizaje']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No hay datos de caracterizaciones.";
        }
    }
    // Generar el reporte de caracterizaciones
    generarReporte($conexion, "codigo_caracterizacion", "valoracion_pedagogica", "diagnostico", "corresponsabilidad", "contexto_academico", "recomendaciones", "contexto_familiar", "contexto_escolar", "barreras_aprendizaje");
} catch (PDOException $e) {
    // Manejo de errores
    echo "Error al generar el reporte: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Caracterizaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reporte de Caracterizaciones</h1>
    <p>Este es un reporte de todas las caracterizaciones registradas en la base de datos.</p>
    <table border="1" cellpadding="10">
        <tr>
            <th>Codigo Caracterizacion</th>
            <th>Valoracion Pedagogica</th>
            <th>Diagnostico</th>
            <th>Corresponsabilidad</th>
            <th>Contexto Academico</th>
            <th>Recomendaciones</th>
            <th>Contexto Familiar</th>
            <th>Contexto Escolar</th>
            <th>Barreras Aprendizaje</th>
        </tr>
        <?php
        // Aquí se generaría el contenido de la tabla con los datos obtenidos de la base de datos
        ?>
    </table>
</body>

</html>
